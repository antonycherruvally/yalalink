<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Healthcare_model extends CI_Model{
	/**
	 *	Search Housemaids
	 */
	public function search( $data ) {
		$string = Core::getHelper('str');
		$db = $this->db;
		$c_code = Core::getModel('login')->getCountry();
		$mode = $data['searchhealthcare'];
		unset($data['searchhealthcare']);
		$data = $string->cleanArray( $data );

		$db->select('*', FALSE);
		$db->from('tbl_postings AS a');
		$db->join('tbl_healthcare AS b', 'a.id = b.post_id', 'LEFT');

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

		// check area
		if( isset($data['area']) ) {
			$db->where('a.area', $data['area']);
		}

		// check keyword
		if( isset($data['keyword']) ) {
			$db->like('a.title_en', $data['keyword']);
		}
		$query = $this->db->where(array(
			'a.main_category' => 'Health Care',
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
		unset($data['healthcare']);
		$page = isset($data['page']) ? $data['page'] : 0;
		$lists = $this->getListings(1000,  $page, $data['purpose']);
		if(! $lists ) {
			return false;
		}
		Core::response( $this->prepare($lists) );
	}

	/**
	 *	Prepare Custom results
	 *	@param obj $data
	 */
	public function prepare( $data ) {
		$string = Core::getHelper('str')->setLinker('healthcare/view/');
		$img = Core::getHelper('image');

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
				'dateAdded' 	=> date("j, F Y", strtotime($dt->added_date)),
				'mobdateAdded' 	=> date("j, M", strtotime($dt->added_date))
			];
		}
		return $fdata;
	}
	function getListings($limit = NULL, $offset = NULL,$type = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_healthcare AS b', 'a.id = b.post_id', 'left');
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Hospitals');
		}
		$query = $this->db->where(array('a.main_category'=>'Health Care','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->limit($limit,$offset)->order_by('a.id', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getListingsCount($type = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_healthcare AS b', 'a.id = b.post_id', 'left');
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Hospitals');
		}
		$count = $this->db->where(array('a.main_category'=>'Health Care','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->from('tbl_postings as a')->count_all_results();
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
        $this->db->select('a.*,b.post_id, b.phone, b.fax, b.email as health_email, b.website',FALSE);
		$this->db->join('tbl_healthcare AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
}
?>