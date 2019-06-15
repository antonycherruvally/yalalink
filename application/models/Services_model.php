<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Services_model extends CI_Model{
	/**
	 *	Search Housemaids
	 */
	public function search( $data ) {
		$string = Core::getHelper('str');
		$db = $this->db;
		$c_code = Core::getModel('login')->getCountry();
		$mode = $data['searchservices'];
		unset($data['searchservices']);
		$data = $string->cleanArray( $data );

		$db->select('*', FALSE);
		$db->from('tbl_postings AS a');
		$db->join('tbl_services AS b', 'a.id = b.post_id', 'LEFT');

		// check purpose
		if( isset($data['purpose']) ) {
			$db->where('a.type', $data['purpose']);
		}

		// check experience
		if( isset($data['experience']) ) {
			$db->where('b.experience', $data['experience']);
		}

		// check location
		if( isset($data['location']) ) {
			$db->where('a.location', $data['location']);
		}

		// check category
		if( isset($data['category']) ) {
			$db->where('b.category', $data['category']);
		}

		// check area
		if( isset($data['area']) ) {
			$db->where('a.area', $data['area']);
		}

		// check keyword
		if( isset($data['keyword']) ) {
			$db->like('a.title_en', $data['keyword']);
		}
		$query = $this->db->where(array(
			'a.main_category' => 'Services',
			'status !=' => 4,
			'status !=' => 0,
			'a.country' => $c_code->id
		))->get();
		$res = ($query->num_rows() > 0) ? $query->result() : false;
		if( $res ) {
			if( $mode == 'rescount' ) {
				Core::response(count($res));
				return;
			}
			Core::response($this->prepare($res));
		}
		Core::response(false);
	}
	/**
	 *	Get list of housemaids
	 *	@param array $data
	 *	@return obj $housemaids
	 */
	public function get( $data ) {
		$string = Core::getHelper('str');
		$data = $string->cleanArray( $data );
		unset($data['services']);
		$page = isset($data['page']) ? $data['page'] : 0;
		$category = isset($data['category']) ? $data['category'] : null;
		$lists = $this->getListings(100,  $page * 10, $data['purpose'], $category);

		if(! $lists ) {
			Core::response(false);
		}
		Core::response( $this->prepare($lists) );
	}

	/**
	 *	Prepare Custom results
	 *	@param obj $data
	 */
	public function prepare( $data ) {
		$string = Core::getHelper('str')->setLinker('services/view/');
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
				'currency' 		=> Core::getHelper('location')->getCountryDetails($dt->country)['curCode'],
				'main_category' => $dt->main_category,
				'price' 		=> number_format($dt->price),
				'dateAdded' 	=> $date->timePassed($dt->added_date),
				'mobdateAdded' 	=> $date->timePassed($dt->added_date),
				'likes'			=> $dt->likes,
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
		$this->db->join('tbl_services AS b', 'a.id = b.post_id', 'left');
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Maintenance');
		}
		if($category){
			$this->db->where('b.category',$category);
		}
		$query = $this->db->where(array('a.main_category'=>'Services','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->limit($limit,$offset)->order_by('a.id', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getListingsCount($type = NULL, $category = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_services AS b', 'a.id = b.post_id', 'left');
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','New');
		}
		if($category){
			$this->db->where('b.category',$category);
		}
		$count = $this->db->where(array('a.main_category'=>'Services','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->from('tbl_postings as a')->count_all_results();
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
        $this->db->select('a.*,b.post_id, b.phone, b.fax, b.email as s_email, b.website,c.category as cat',FALSE);
		$this->db->join('tbl_services AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_services_category AS c', 'b.category = c.id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
}
?>