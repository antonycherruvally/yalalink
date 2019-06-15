<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Electronics_model extends CI_Model{

	/**
	 *	Search Electronics
	 *	@param array $params
	 *	@return json $results
	 */
	public function search( $params ) {
		$string = Core::getHelper('str');
		$db = $this->db;
		$mode = isset($params['searchelectronics']) ? $params['searchelectronics'] : false;
		$c_code 	= Core::getModel('login')->getCountry();
		unset($params['mode']);
		unset($params['searchelectronics']);
		$params = $string->cleanArray( $params );

		$db->select('*', FALSE);
		$db->from('tbl_postings AS a');
		$db->join('tbl_electronics AS b', 'a.id = b.post_id', 'LEFT');

		// check the purpose
		if( isset($params['purpose']) ) {
			$db->where('a.type', $params['purpose']);
		}

		// check the category
		if( isset($params['category']) ) {
			$db->where('b.category', $params['category']);
		}

		// check the age
		if( isset($params['age']) ) {
			$db->where('b.age', $params['age']);
		}

		// check the usage
		if( isset($params['usage']) ) {
			$db->where('b.usage', $params['usage']);
		}

		// check the condition
		if( isset($params['condition']) ) {
			$db->where('b.condition', $params['condition']);
		}

		// check the warranty
		if( isset($params['warranty']) ) {
			$db->where('b.warranty', $params['warranty']);
		}

		// check the maxPrice
		if( isset($params['maxPrice']) ) {
			$db->where('a.price <=', $params['maxPrice']);
		}

		// check the minPrice
		if( isset($params['minPrice']) ) {
			$db->where('a.price >=', $params['minPrice']);
		}

		// check the location
		// if( isset($params['location']) ) {
		// 	$db->where('a.type', $params['location']);
		// }

		// check the keyword
		if( isset($params['keyword']) ) {
			$db->like('a.title_en', $params['keyword']);
		}

		$query = $db->where(['a.main_category'=>'Electronics','status !='=>4,'status !='=>0,'a.country'=>$c_code->id]);
		if( $mode == 'rescount' ) {
        	Core::response($query->count_all_results());
        	return;
        }

        $res = $query->get();
        $rs = ($res->num_rows() > 0) ? $res->result() : false;
        if( $rs ) {
        	$rs = Core::getModel('auto')->prepare( $rs );
        }
		Core::response($rs);
	}

	/**
	 *	Get the electronics
	 */
	public function get( $params ) {
		$string = Core::getHelper('str');
		unset($params['electronics']);
		$params 	= $string->cleanArray($params);
		$category 	= $params['category'];
		$purpose	= isset($params['purpose']) ? $params['purpose'] : "Used";
		$page 		= isset($params['page']) ? $params['page'] : 0;
		$lists 		= $this->getListings(50, $page * 10, $purpose, $category);
		if( $lists ) {
			Core::response( $this->prepare($lists) );
		}
		Core::response(false);	
	}

	/**
	 *	Prepare the data
	 */
	public function prepare( $data ) {
		$string = Core::getHelper('str')->setLinker('electronics/view/');
		$img = Core::getHelper('image');
		$date = Core::getHelper('date');

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
				'year'          => $dt->year,
				'main_category' => $dt->main_category,
				'kilometers'    => $dt->kilometers,
				'color'         => $dt->color,
				'likes'			=> $dt->likes,
				'type'			=> $dt->type,
			];
		}
		return $fdata;
	}
	
	function getListings($limit = NULL, $offset = NULL,$type = NULL, $category = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_electronics AS b', 'a.id = b.post_id', 'left');
		if( $type != 'all' ) {
			if($type){
				$this->db->where('a.type',$type);
			}else{
				$this->db->where('a.type','Used');
			}
		}
		if($category != 'all'){
			$this->db->where('b.category',$category);
		}
		$query = $this->db->where(array('a.main_category'=>'Electronics','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->limit($limit,$offset)->order_by('a.id', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getListingsCount($type = NULL, $category = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_electronics AS b', 'a.id = b.post_id', 'left');
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Used');
		}
		if($category){
			$this->db->where('b.category',$category);
		}
		$count = $this->db->where(array('a.main_category'=>'Electronics','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->from('tbl_postings as a')->count_all_results();
		return $count;
	}
	function getMainImage($id = NULL){
        $query = $this->db->select('image')->where(array('post_id'=>$id, 'main'=>1))->get('tbl_post_images');
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
        $this->db->select('a.*,b.*,c.category as cat,f.first_name,f.last_name,f.company_name,f.image',FALSE);
		$this->db->join('tbl_electronics AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_electronics_category AS c', 'b.category = c.id', 'left');
		$this->db->join('tbl_users AS f', 'a.user_id = f.id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
}
?>