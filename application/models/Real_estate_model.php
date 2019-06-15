<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}

class Real_estate_model extends CI_Model{

	/**
	 *	realestate advance search
	 *	@author Ramon Alexis Celis
	 *	@param array $data
	 *	@return obj
	 */
	public function search( $data, $mode = false ) {
		$db 		= $this->db;
		$string 	= Core::getHelper('str')->setLinker('real-estate/view/');
		$yalalinkdb = Core::getModel('yalalink');
		$cCode 		= Core::getModel('login')->getCountry();
		$page 		= 0;

		if( isset($data['page']) ) {
			$page = $data['page'];
			unset($data['page']);
		}

		$db->select('a.*,b.*, c.*, d.*', FALSE);
		$db->from('tbl_postings AS a');
		$db->join('tbl_realestate AS b', 'b.post_id = a.id','left');
		$db->join('tbl_countries AS c', 'c.id = a.location','left');
		$db->join( 'tbl_post_images AS d', 'd.post_id = a.id', 'left');

		// get the main image
		$db->where('d.main =', 1);

				// checks the purpose
		if( isset($data['purpose']) ) {
			if( $data['purpose'] == 'rent' ) {
				$type = 'Used';
			}else{
				$type = 'New';
			}
			$db->where('a.type =', $type);
		}

		// check the property type
		if( isset($data['propType']) ) {
			$db->where( 'b.property_type =', $data['propType'] );
		}

		// check per date payment
		if( isset($data['pricePerDate']) ) {
			$db->where('b.price_per =', $data['pricePerDate']);
		}

		// check beds
		if( isset($data['bed']) ) {
			$db->where( 'b.bedroom =', $data['bed'] );
		}

		// checks the max price
		if( isset($data['maxPrice']) ) {
			$db->where( 'a.price <=', $data['maxPrice'] );
		}

		// min price
		if( isset($data['minPrice']) ) {
			$db->where( 'a.price >=', $data['minPrice'] );
		}

		// check the max area
		if( isset($data['maxArea']) ) {
			$db->where( 'b.size <=', $data['maxArea'] );
		}

		// check the min area
		if( isset($data['minArea']) ) {
			$db->where('b.size >=', $data['minArea']);
		}

		// check the location
		if( isset($data['location']) ) {
			$db->like( 'c.location', $data['location']);
		}

		// check the city
		if( isset($data['city']) ) {
			$db->where( 'a.location', $data['city']);
		}

		// check the area
		if( isset($data['area']) ) {
			$db->where( 'a.area', $data['area']);
		}

		// check the keyword
		if( isset($data['keyword']) ) {
			$db->like('a.title_en', $data['keyword']);
		}

		$db->where( ['a.price <>' => 0] );
		$db->where([
			'a.main_category' => 'Real Estate',
			'a.country' => $cCode->id
		]);

		// return only the number results
		if( $mode ) {
			return $db->count_all_results();
		}

		// set the pagenation
		if( $page > 0 ) {
			$db->limit(100, $page);
		}else {
			$db->limit(100, 0);
		}

		// execute sql query
		$query = $db->get();

		// checks if there are results
		if( $query->num_rows() < 1 ) {
			return false;
		}

		// customize result
		$data = $query->result();

		// define the default image path
		$imagePaths = [
			'uploads/images/thumbnail/',
			'uploads/images/'
		];

		// start data iteration
		foreach( $data as $dt ) {
			if( isset($dt->post_id) ) {
				$dt->id = $dt->post_id;
			}
			// check the image if it exists				
			$img = $dt->image;
			foreach( $imagePaths as $imgp ) {
				if( $img == "" ) {
					$imgf = 'assets/front_end/images/no_image_available.jpg';
					return;
				}
				$dpath = FCPATH . $imgp . $img;
				if( file_exists($dpath) ) {
					$imgf = str_replace(FCPATH, Core::getBaseUrl(), $dpath);
					break;
				}else{
					$imgf = 'assets/front_end/images/no_image_available.jpg';
				}
			}

			// prepare the data
			$prep[]= [
				'id' 			=> $dt->id,
				'title_en' 		=> $dt->title_en,
				'title_ar' 		=> utf8_encode($dt->title_ar),
				'url' 			=> $string->makeUrl($string->urlFormat( $dt->title_en ) . "-" . $dt->id),
				'img' 			=> $imgf,
				'imgCount'		=> count($this->getImages($dt->id)),
				'user' 			=> $yalalinkdb->getUserDetails($dt->user_id),
				'cfav' 			=> $yalalinkdb->countfavorites($dt->id),
				'featured' 		=> $dt->featured,
				'currency' 		=> $currency,
				'price' 		=> number_format($dt->price),
				'description' 	=> utf8_encode(substr(strip_tags($dt->description),0,500)),
				'dateAdded' 	=> date("j, M Y", strtotime($dt->added_date)),
				'mobdateAdded' 	=> date("j, M", strtotime($dt->added_date)),
				'bathroom'		=> $dt->bathroom,
				'bedroom'		=> $dt->bedroom,
				'garage'		=> $dt->garage,
				'balcony'		=> $dt->balcony,
				'pool'			=> $dt->pool,
				'size'          => $dt->size,
				'phoneno'       => $dt->mobile,
				'email'         => $dt->email,
				'likes'			=> $dt->likes,
			];
		}

		// return the compiled data from the query
		return $prep;
	}

	/**
	 *	prepare result base on custom
	 *	api consumption
	 *	@author Ramon Alexis Celis
	 *	@param obj $data
	 *	@return obj
	 */
	public function prepareResult( $data ) {
		# check if there are data passed
		if( empty($data) ) {
			log_message('error', __CLASS__ . ' in ' . __FUNCTION__ . ' there are no data passed.');
			return false;
		}
		// load the models
		$date = Core::getHelper('date');
		$CI =& get_instance();
		$CI->load->model('real_estate_model');
		$CI->load->model('yalalink_model');
		$db = $CI->real_estate_model;
		$yalalinkdb = $CI->yalalink_model;
		$currency = $this->session->userdata('currency');

		// define the default image path
		$imagePaths 	= [
				'uploads/images/thumbnail/',
				'uploads/images/'
			];

		// iterate the data to customize the output
		foreach( $data as $dt ) {
			// correct the ids
			if( isset($dt->post_id) ) {
				$dt->id = $dt->post_id;
			}
			// make the title more readable
			$title = str_replace(' ','-',str_replace('  ',' ',strtolower(preg_replace("/[^a-zA-Z0-9 ]+/", "", $dt->title_en))));
			
			// check the image if it exists
			$img = Core::getHelper('image');

			# fix the ad type
			if( $dt->type  == 'New' ) {
				$dt->type = 'Buy';
			}else{
				$dt->type = 'Rent';
			}

			// prepare the data
			$prep[] = [
				'id' 			=> $dt->id,
				'title_en' 		=> $dt->title_en,
				'title_ar' 		=> utf8_encode($dt->title_ar),
				'url' 			=> Core::getBaseUrl() . 'real-estate/view/' . $title . "-" . $dt->id,
				'img' 			=> $img->getMainImage( $dt->id ),
				'imgCount'		=> $this->getImages($dt->id) ? count($this->getImages($dt->id)) : 0,
				'user' 			=> $yalalinkdb->getUserDetails($dt->user_id),
				'cfav' 			=> $yalalinkdb->countfavorites($dt->id),
				'featured' 		=> $dt->featured,
				'currency' 		=> Core::getHelper('location')->getCountryDetails($dt->country)['curCode'],
				'main_category' => $dt->main_category,
				'price' 		=> number_format($dt->price),
				'description' 	=> utf8_encode(substr(strip_tags($dt->description),0,500)),
				'dateAdded' 	=> $date->timePassed($dt->added_date),
				'mobdateAdded' 	=> $date->timePassed($dt->added_date),
				'bathroom'		=> $dt->bathroom,
				'bedroom'		=> $dt->bedroom,
				'garage'		=> $dt->garage,
				'balcony'		=> $dt->balcony,
				'pool'			=> $dt->pool,
				'phoneno'       => $dt->mobile,
				'email'         => $dt->email,
				'size'          => $dt->size,
				'likes'			=> $dt->likes,
				'type'			=> $dt->type,
			];
		}
		// Core::log( $prep );
		return $prep;
	}

	/**
	 *	Get all the real estate category
	 */
	public function getCategory() {
		$db = $this->db;
		$res = $db->select('id,subcategory')
			->from('tbl_realestate_category')
			->where('parent_id', 1)
			->get();
		if( $res->num_rows() > 0 ) {
			return $res->result();
		}
		return false;
	}

	public function prepare( $data ) {
		return $this->prepareResult( $data );
	}

	function getListings($limit = NULL, $offset = NULL, $type = NULL, $property_type = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		/*condition type to purpose*/
		if($type == 'Used'){
			$type = 2;
		}else{
			$type = 1;
		}
		$c_code = $cCode = Core::getModel('login')->getCountry();
		$this->db->select('a.*,b.bathroom,b.bedroom,b.balcony,b.pool,b.garage,b.size',FALSE);
		$this->db->join('tbl_realestate AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate_category AS c', 'b.property_type = c.id', 'left');
		$this->db->where(array('a.price <>'=>0));
		$this->db->where('b.purpose',$type);
		if($property_type){
			$this->db->where('b.property_type',$property_type);
		}else{
			$this->db->where('b.property_type',5);
		}
		$query = $this->db->where(array('a.main_category'=>'Real Estate','status !='=>4,'status !='=>0,'a.country='=>$c_code->id))->limit($limit,$offset)->order_by('a.id', 'desc')->get('tbl_postings as a');
		return ($query->num_rows() > 0) ? $query->result() : false;
	}

	function getListingsCount($type = NULL, $property_type = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		/*condition type to purpose*/
		if($type=='used'){
			$type=2;
		}else{
			$type=1;
		}

		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_realestate AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate_category AS c', 'b.property_type = c.id', 'left');
		$this->db->where(array('a.price <>'=>0));
		$this->db->where('b.purpose',$type);
		if($property_type){
			$this->db->where('b.property_type',$property_type);
		}else{
			$this->db->where('b.property_type',5);
		}
		$count = $this->db->where(array('a.main_category'=>'Real Estate','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->from('tbl_postings as a')->count_all_results();
		return $count;
	}
	function getMainImage($id = NULL){
		$query = $this->db->select('image')->where(array('post_id'=>$id))->order_by('main', 'DESC')->get('tbl_post_images');
			return ($query->num_rows()) ? $query->row() : false;
	}
	function getImages($id = NULL){
		$query = $this->db->select('image')->where(array('post_id'=>$id))->order_by('main', 'DESC')->get('tbl_post_images');
			return ($query->num_rows()) ? $query->result() : false;
	}
	public function getDetails($id = NULL){
		$this->db->select('a.*,b.*,c.category as cat,c.subcategory as subcat,e.first_name,e.last_name,e.company_name,e.image',FALSE);
		$this->db->join('tbl_realestate AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate_category AS c', 'b.purpose = c.id', 'left');
		$this->db->join('tbl_realestate_category AS d', 'b.property_type = d.id', 'left');
		$this->db->join('tbl_users AS e', 'a.user_id = e.id', 'left');
		
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
		
		return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function getAmenities($id = NULL){
		
		$query = $this->db->select('amenity_id')->where(array('post_id'=>$id))->get('tbl_property_amenities_added');
		//print_r($query);
		return ($query->num_rows()) ? $query->result() : false;
			
	}
	function getAmemityTitle($id = NULL){
		$query = $this->db->select('*')->where('id', $id)->get('tbl_property_amenities');
		return ($query->num_rows()) ? $query->row() : false;
			
	}

	/**
	 *	get featured ads
	 *	@author Ramon Alexis Celis
	 *	@param int $limit
	 *	@param int $page
	 *	@return array $result
	 */
	public function getFeaturedAds( $limit = 3, $page = 0 ) {
		$loc = Core::getHelper('location');
		$country = $loc->getCurrentCountry();
		$db = $this->db;
		$query = $db->select('*', FALSE)
			->from('tbl_postings AS a')
			->join('tbl_realestate AS b', 'a.id = b.post_id', 'LEFT')
			->where([
				'a.featured' => 1,
				'a.main_category' => 'Real Estate',
				'a.country' => $country->id
			])
			->limit($limit, $page)
			->get();
		return $query->result();
	}

	/**
	 * save real estate
	 * @param array $data
	 *	@param void
	 */
	public function save( $data ) {
		$db 		= $this->db;
		$date 		= Core::getHelper('date')->setFormat('Y-m-d H:i:s');
		# separate the some data
		$category 	= 'Real Estate';
		$linker 	= $data['linker'];
		$images 	= $data['image'];
		$mainImage 	= $data['mainImage'];

		if( isset($data['amenity']) ) {
			$amenity = $data['amenity'];
			unset($data['amenity']);
		}

		unset($data['linker']);
		unset($data['model']);
		unset($data['image']);
		unset($data['btnAdAdds']);
		unset($data['mainImage']);
		$uploaderId = $_SESSION['logged_yalalink_userdata']['userid'];

		$postingsData = [
			'title_en' 		=> $data['title_en'],
			'title_ar' 		=> $data['title_ar'],
			'main_category' => $category,
			'type' 			=> $data['type'],
			'user_id' 		=> $uploaderId,
			'mobile' 		=> $data['mobile'],
			'email' 		=> $data['email'],
			'price' 		=> $data['price'],
			'description' 	=> $data['description'],
			'country' 		=> $data['country'],
			'location' 		=> $data['location'],
			'area' 			=> $data['area'],
			'address' 		=> $data['address'],
			'latitude' 		=> $data['latitude'],
			'longitude' 	=> $data['longitude'],
			'added_by'		=> $uploaderId,
			'added_date'	=> $date->getDate(),
			'updated_date'	=> $date->getDate(),
			'status' 		=> 1,
		];

		# save the compiled data
		if(! $db->insert('tbl_postings', $postingsData) ) {
			# if it fails then stop everything and return false
			Core::logger('something went wrong while adding ' . $data['title_en']);
			return false;
		}

		# get the insert id so we could use it on the next query
		$postId = $db->insert_id();
		$realestateData = [
			'post_id' 		=> $postId,
			'purpose' 		=> $data['category'],
			'property_type' => $data['subcategory'],
			'size' 			=> $data['size'],
			'bedroom' 		=> empty($data['bedroom']) ? 0 : $data['bedroom'],
			'bathroom' 		=> empty($data['bathroom']) ? 0 : $data['bathroom'],
			'price_per' 	=> $data['price_per'],
			'garage' 		=> empty($data['garage']) ? 0 : $data['garage'],
			'balcony' 		=> empty($data['balcony']) ? 0 : $data['balcony'],
			'pool' 			=> empty($data['pool']) ? 0 : $data['pool'],
		];

		# start inserting real estate data
		if(! $db->insert('tbl_realestate', $realestateData) ) {
			# if it fails then stop everything and return false
			Core::logger('something went wrong in tbl_realestate data, while adding ' . $data['title_en']);
			return false;
		}

		# now save the aminities
		if( isset($amenity) ) {
			# loop throug the aminities and group each so that we could
			# insert them by batch
			foreach( $amenity as $am ) {
				$aminities[] = [
					'post_id' => $postId,
					'amenity_id' => $am
				];
			}
			# insert and check the result
			if(! $db->insert_batch('tbl_property_amenities_added', $aminities) ) {
				Core::logger('something went wrong in saving aminities, while adding ' . $data['title_en']);
				return false;
			}
		}

		# last step is moving the images
		$uploader = Core::getHelper('upload');
		if(! $uploader->processUplaod([
			'linker' 	=> $linker,
			'title' 	=> $data['title_en'],
			'images' 	=> $images
		]) ) {
			Core::logger('something went wrong uploading images, while adding ' . $data['title_en']);
			return false;
		}

		return true;
	}

// $db->join('tbl_realestate AS b', 'b.post_id = a.id','left');
// $db->join('tbl_countries AS c', 'c.id = a.location','left');
// $db->join( 'tbl_post_images AS d', 'd.post_id = a.id', 'left');

	/**
	 *	get data
	 *	@param int $id
	 *	@return obj
	 */
	public function getData( $id ) {
		$db = $this->db;
		return $db->select('*', FALSE)
			->from('tbl_postings AS a')
			->join( 'tbl_realestate AS b', 'b.post_id = a.id', 'left' )
			->where( 'a.id', $id )
			->where( 'a.status', 1 )
			->first_row();
	}
}
?>