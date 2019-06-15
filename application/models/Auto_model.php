<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Auto_model extends CI_Model{

	/**
	 *	Get models by id
	 *	@param int $id
	 *	@return obj $brands
	 */
	public function getModel( $id ) {
		$db = $this->db;
		$rs = $db->select("id, subcategory")
			->from("tbl_auto_category")
			->where('parent_id', $id)
			->get();
		Core::response( $rs->result() );
	}

	/**
	 *	Get brands by id
	 *	@param int $id
	 *	@return obj $brands
	 */
	public function getBrand( $id ) {
		$db = $this->db;
		$rs = $db->select("id, subcategory")
			->from("tbl_auto_category")
			->where('parent_id', $id)
			->get();
		Core::response( $rs->result() );
	}

	/**
	 *	Search Handler
	 *	@param array $params
	 *	@return json $result
	 */
	public function search( $params ) {
		
		$str 		= Core::getHelper('str');
		$db 		= $this->db;
		$c_code 	= Core::getModel('login')->getCountry();
		$page = isset($params['page']) ? $params['page'] * 10: 0;
		$mode = $params['searchauto'];
		// remove the api command
		unset($params['searchauto']);
		// remove null parameters
		$params = $str->cleanArray( $params );
		// Core::log( $params, true );
		$db->select('a.*,b.year,b.horsepower,b.kilometers, b.category, c.parent_id',FALSE);
		$db->from('tbl_postings AS a');
		$db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$db->join('tbl_auto_category AS c', 'b.category = c.id', 'left');
		// $db->join('tbl_countries AS d', 'a.location = d.parent_id', 'left');
		$db->where([ 'a.price <>'=> 0 ]);

		if( isset($params['purpose']) ) {
			$db->where('a.type', $params['purpose']);
		}

		if( isset($params['category']) ) {
			$db->where('b.category', $params['category']);
		}

		if( isset($params['brand']) ) {
			$db->where('b.subcategory', $params['brand']);
		}

		if( isset($params['model']) ) {
			$db->where('b.model', $params['model']);
		}

		if( isset($params['minYear']) ) {
			$db->where('b.year >=', $params['minYear']);
		}

		if( isset($params['maxYear']) ) {
			$db->where('b.year <=', $params['maxYear']);
		}

		if( isset($params['maxPrice']) ) {
			$db->where('a.price <=', $params['maxPrice']);
		}

		if( isset($params['minPrice']) ) {
			$db->where('a.price >=', $params['minPrice']);
		}

		// if( isset($params['location']) ) {
		// 	$db->like('d.location', $params['location']);
		// }

		if( isset($params['keyword']) ) {
			$db->like('a.title_en', $params['keyword']);
		}

		
		$query = $db->where(array('a.main_category'=>'Auto','status !='=>4,'status !='=>0,'a.country'=>$c_code->id));
		
		if( $mode == 'rescount' ) {
			$db->limit(5000,$page);
        	Core::response($query->count_all_results());
        	return;
        }else{
        	$db->limit(100,$page);
        }
        // Core::log( $params, true );
        
		$res = $query->get();
        $rs = ($res->num_rows() > 0) ? $res->result() : false;
        if( $rs ) {
        	$rs = $this->prepare( $rs );
        }
		Core::response($rs);
	}

	/**
	 *	get auto listings
	 *	@author Ramon Alexis Celis
	 *	@param array $data
	 *	@return json results
	 */
	public function get( $data ) {
		$purpose 		= isset($data['purpose']) ? $data['purpose'] : NULL;
		$category 		= isset($data['category']) ? $data['category'] : NULL;
		$subcategory 	= isset($data['subcategory']) ? $data['subcategory'] : NULL;
		$page 			= isset($data['page']) ? $data['page'] : NULL;
		$limit 			= 100;
		if( $page != NULL ) {
			$limit = 10;
		}
		$listings 		= $this->getListings($limit, $page * 10, $purpose, $category, $subcategory);
			# adding feature ads on the list
		# $listings 		= array_merge($this->getFeaturedAds(), $listings);
		Core::response( $this->prepare( $listings ) );
	}

	/**
	 * prepare result
	 *	@param obj $data
	 *	@return obj
	 */
	public function prepare( $data ) {
		$string = Core::getHelper('str')->setLinker('auto/view/');
		$img = Core::getHelper('image');
		$date = Core::getHelper('date');

		# check if there are data passed
		if( empty($data) ) {
			log_message('error', __CLASS__ . ' in ' . __FUNCTION__ . ' there are no data passed.');
			return false;
		}

		// iterate the data
		foreach( $data as $dt ) {
			// correct the ids
			if( isset($dt->post_id) ) {
				$dt->id = $dt->post_id;
			}
			$fdata[] = [
				'id' 			=> $dt->id,
				'title_en' 		=> $dt->title_en,
				'url'			=> $string->makeUrl($string->urlFormat( $dt->title_en ) . "-" . $dt->id),
				'img' 			=> $img->getMainImage( $dt->id ),
				'imgCount'		=> count($this->getImages($dt->id)),
				'description' 	=> $dt->description,
				'price' 		=> number_format($dt->price),
				'dateAdded' 	=> $date->timePassed($dt->added_date),
				'mobdateAdded' 	=> $date->timePassed($dt->added_date),
				'currency' 		=> Core::getHelper('location')->getCountryDetails($dt->country)['curCode'],
				'featured'		=> $dt->featured,
				'main_category' => $dt->main_category,
				'year'          => $dt->year,
				'kilometers'    => $dt->kilometers,
				'color'         => $dt->color,
				'phoneno'       => $dt->mobile,
				'email'         => $dt->email,
				'bodytype'      => $dt->body_type,
				'spec'          => $dt->regional_specs,
				'horsepower'    => $dt->horsepower,
				'likes'			=> $dt->likes,
				'type'			=> $dt->type,
			];
		}
		return $fdata;
	}

	/**
	 *	get featured ads
	 *	@author Ramon Alexis Celis
	 *	@param int $limit
	 *	@param int $page
	 *	@return array $result
	 */
	public function getFeaturedAds( $limit = 3, $page = 0 ) {
		$db = $this->db;
		$loc = Core::getHelper('location');
		$country = $loc->getCurrentCountry();
		$query = $db->select('*', FALSE)
			->from('tbl_postings AS a')
			->join('tbl_auto AS b', 'a.id = b.post_id', 'left')
			->where([
				'a.featured' => 1,
				'a.main_category' => 'Auto',
				'a.country' => $country->id
			])
			->limit($limit, $page)
			->get();
		return $query->result();
	}

	function getListings($limit = NULL, $offset = NULL,$type = NULL, $category = NULL, $subcategory = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}

		$this->db->select('a.*,b.year,b.horsepower,b.kilometers,b.color,b.body_type,b.regional_specs,b.horsepower',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_auto_category AS c', 'b.category = c.id', 'left');
		// $this->db->where(array('a.price <>'=>0));
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Used');
		}
		if($category){
			$this->db->where('b.category',$category);
		}else{
			$this->db->where('b.category',1);
		}
		if($subcategory){
			$this->db->where('b.subcategory',$subcategory);
		}
		$query = $this->db->where(array('a.main_category'=>'Auto','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->limit($limit,$offset)->order_by('a.updated_date', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getListingsCount($type = NULL, $category = NULL, $subcategory = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*,b.*',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_auto_category AS c', 'b.category = c.id', 'left');
		$this->db->where(array('a.price <>'=>0));
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Used');
		}
		if($category){
			$this->db->where('b.category',$category);
		}else{
			$this->db->where('b.category',1);
		}
		if($subcategory){
			$this->db->where('b.subcategory',$subcategory);
		}
		$count = $this->db->where(array('a.main_category'=>'Auto','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->from('tbl_postings as a')->count_all_results();
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
	function getUserDetails($id = NULL){
        $query = $this->db->select('*')->where(array('user_id'=>$id))->get('tbl_postings');
			return ($query->num_rows()) ? $query->row() : false;
	}
	function getDetails($id = NULL){
        $this->db->select('a.*,b.*,c.category as cat,d.subcategory as subcat,f.first_name,f.last_name,f.company_name,f.image',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_auto_category AS c', 'b.category = c.id', 'left');
		$this->db->join('tbl_auto_category AS d', 'b.subcategory = d.id', 'left');
		$this->db->join('tbl_auto_category AS e', 'b.model = e.id', 'left');
		$this->db->join('tbl_users AS f', 'a.user_id = f.id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function getAmenities($id = NULL){
		$query = $this->db->select('*')->where('post_id', $id)->get('tbl_auto_features_added');
		return ($query->num_rows()) ? $query->result() : false;
			
	}
	function getAmemityTitle($id = NULL){
		$query = $this->db->select('*')->where('id', $id)->get('tbl_auto_features');
		return ($query->num_rows()) ? $query->row() : false;
			
	}
	function getPostDate($id = NULL){
		$query = $this->db->select('added_date')->where('id', $id)->get('tbl_postings');
		return ($query->num_rows()) ? $query->row() : false;
	}

	/**
	 *	get the sub cat
	 */
	public function getSubCat( $id ) {
		$str = Core::getHelper('str');
		$res = $this->db->select( 'category' )
			->from('tbl_auto')
			->where('post_id', $id)
			->get();
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		if( $qrs ) {
			return $qrs[0]->category;
		}
		return false;
	}
}
?>