<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Jobs_model extends CI_Model{
	/**
	 *	Search Housemaids
	 */
	public function search( $data ) {
		$string = Core::getHelper('str');
		$db = $this->db;
		$c_code = Core::getModel('login')->getCountry();
		$mode = $data['searchjobs'];
		unset($data['searchjobs']);
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
		unset($data['jobs']);
		$page = isset($data['page']) ? $data['page'] : 0;
		$lists = $this->getListings(50,  $page, $data['purpose']);

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
		$string = Core::getHelper('str')->setLinker('jobs/view/');
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
				'img' 			=> strpos($img->getMainImage( $dt->id ),'no_image_available') ? $img->getMainImage( $dt->id ) :'assets/front_end/images/3352.jpg',
				'imgCount'		=> count($this->getImages($dt->id)),
				'description' 	=> $dt->description,
				'currency' 		=> Core::getHelper('location')->getCountryDetails($dt->country)['curCode'],
				'main_category' => $dt->main_category,
				'price' 		=> number_format($dt->price),
				'dateAdded' 	=> date("j, F Y", strtotime($dt->added_date)),
				'mobdateAdded'	=> $date->timePassed( $dt->added_date ),
				'likes'			=> $dt->likes,
				'gender'        => $dt->gender
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
		$this->db->select('a.*,b.position,b.salary,b.experience,b.gender',FALSE);
		$this->db->join('tbl_jobs AS b', 'a.id = b.post_id', 'left');
		if( $type != 'all' ) {
			if($type){
				$this->db->where('a.type',$type);
			}else{
				$this->db->where('a.type','Hiring');
			}
		}
		$query = $this->db->where(array('a.main_category'=>'Jobs','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->limit($limit,$offset)->order_by('a.id', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getListingsCount($type = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*,b.position,b.salary,b.experience',FALSE);
		$this->db->join('tbl_jobs AS b', 'a.id = b.post_id', 'left');
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Hiring');
		}
		$count = $this->db->where(array('a.main_category'=>'Jobs','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->from('tbl_postings as a')->count_all_results();
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
        $this->db->select('a.*,b.*',FALSE);
		$this->db->join('tbl_jobs AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
}
?>