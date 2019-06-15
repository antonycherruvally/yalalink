<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Computers_model extends CI_Model{
	
	public function getComputers( $data ) {
		
		$lists = $this->getListings(1000, 0, $_GET['purpose'], $_GET['category']);
		Core::response($this->prepare($lists));
	}
	
	public function get( $id ) {
		$db = $this->db;
		$rs = $db->select("id, subcategory")
			->from("tbl_computer_categories")
			->where('parent_id', $id)
			->get();
		Core::response( $this->prepare($rs->result()) );
	}
	
	
	public function search( $params ) {
		$db 	= $this->db;
		$string = Core::getHelper('str');
		$params = $string->cleanArray($params);
		$page 	= isset($params['page']) ? $params['page'] : 0;
		$mode 	= $params['searchcomputer'];
		$c_code = Core::getModel('login')->getCountry();
		unset($params['searchcomputer']);

		$db->select( "*", FALSE );
		$db->from("tbl_postings AS a");
		$db->join("tbl_computers AS b", 'a.id = b.post_id', 'LEFT');
		$db->join('tbl_computer_categories AS c', 'b.category = c.id', 'LEFT');

		// check the type
		if( isset($params['purpose']) ) {
			$db->where('a.type', $params['purpose']);
		}

		// check the type
		if( isset($params['categories']) ) {
			$db->where('b.category', $params['categories']);
		}

		// check the type
		if( isset($params['subcategory']) ) {
			$db->like('b.subcategory', $params['subcategory']);
		}

		// check the type
		if( isset($params['brand']) ) {
			$db->where('b.brand', $params['brand']);
		}

		// check the type
		if( isset($params['minprice']) ) {
			$db->where('a.price >=', $params['minprice']);
		}

		

		// check the type
		if( isset($params['maxprice']) ) {
			$db->where('a.price <=', $params['maxprice']);
		}

		// check the type
		/*if( isset($params['minPrice']) ) {
			$db->where('a.price >=', $params['minPrice']);
		}*/

		// check the type
		 if( isset($params['location']) ) {
			$db->where('a.location', $params['location']);
		 }

		// check the type
		if( isset($params['keyword']) ) {
			$db->like('a.title_en', $params['keyword']);
		}
		$db->limit(1000, $page);

        
		$query = $this->db->where(array('a.main_category'=>'Computers','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->get();
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

	
	
	public function prepare( $data ) {
		$string = Core::getHelper('str')->setLinker('computers/view/');
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
				'imgCount'		=> @count($this->getImages($dt->id)),
				'description' 	=> $dt->description,
				'currency' 		=> Core::getHelper('location')->getCountryDetails($dt->country)['curCode'],
				'price' 		=> number_format($dt->price),
				'main_category' => $dt->main_category,
				'dateAdded' 	=> $date->timePassed($dt->added_date),
				'mobdateAdded' 	=> $date->timePassed($dt->added_date),
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
		$this->db->join('tbl_computers AS b', 'a.id = b.post_id', 'left');
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Used');
		}
		if($category){
			$this->db->where('b.category',$category);
		}
		$query = $this->db->where(array('a.main_category'=>'Computers','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->limit($limit,$offset)->order_by('a.id', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getListingsCount($type = NULL, $category = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_computers AS b', 'a.id = b.post_id', 'left');
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Used');
		}
		if($category){
			$this->db->where('b.category',$category);
		}
		$count = $this->db->where(array('a.main_category'=>'Computers','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->from('tbl_postings as a')->count_all_results();
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
        $this->db->select('a.*,b.*,c.category as cat,d.subcategory as subcat',FALSE);
		$this->db->join('tbl_computers AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_computer_categories AS c', 'b.category = c.id', 'left');
		$this->db->join('tbl_computer_categories AS d', 'b.subcategory = d.id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
}
?>