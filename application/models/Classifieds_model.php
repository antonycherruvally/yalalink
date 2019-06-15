<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Classifieds_model extends CI_Model{

	/**
	 *	Search Classifieds
	 */
	public function search( $params ) {
		$string 	= Core::getHelper('str');
		$db 		= $this->db;
		$c_code 	= Core::getModel('login')->getCountry();
		$mode 		= $params['searchclassifieds'];
		$page 		= isset($params['page']) ? ($params['page'] * 10):0;
		unset($params['searchclassifieds']);
		$params = $string->cleanArray( $params );
		$db->select("*", FALSE);
		$db->from("tbl_postings AS a");
		$db->join("tbl_classifieds AS b", "a.id = b.post_id", "LEFT");

		// check the purpose
		if( isset($params['purpose']) ) {
			$db->where("a.type", $params['purpose']);
		}

		// check the category
		if( isset($params['category']) ) {
			$db->where("b.category", $params['category']);
		}

		// check the subcategory
		if( isset($params['subcategory']) ) {
			$db->where("b.subcategory", $params['subcategory']);
		}

		// check the maxPrice
		if( isset($params['maxPrice']) ) {
			$db->where("a.price <=", $params['maxPrice']);
		}

		// check the minPrice
		if( isset($params['minPrice']) ) {
			$db->where("a.price >=", $params['minPrice']);
		}

		// check the keyword
		if( isset($params['keyword']) ) {
			$db->like("a.title_en", $params['keyword']);
		}

		// check the purpose
		// if( isset($params['purpose']) ) {
		// 	$db->where("a.price", $params['purpose']);
		// }

		

		// defaults
		$db->where([
			'a.main_category' => 'Classifieds',
			'status !=' => 4,
			'status !='=> 0,
			'a.country'=> $c_code->id
		]);

		if( $mode == 'rescount' ) {
        	Core::response($db->count_all_results());
        	return;
        }
        $db->limit(100, $page);
		$query = $db->get();
		$rs = $query->result();
		Core::response($this->prepare($rs));
	}

	/**
	 *	get sub cat
	 *	@param int $id
	 */
	public function getSubCat( $id ) {
		$cat = Core::getHelper('db')->get("tbl_classifieds_category");
		$rs = $cat->where("parent_id", $id)->get();
		Core::response($rs->result());
	}
	/**
	 *	Get classifieds listings
	 *	@param array $params
	 *	@return void
	 */
	public function get( $params ) {
		// remove api command
		unset($params['classifieds']);
		// set the defaults
		$page 		= isset($params['page']) ? $params['page'] : 0;
		$purpose 	= isset($params['purpose']) ? $params['purpose'] : 'Used';
		$category 	= isset($params['category']) ? $params['category'] : 333;
		$lists = $this->getListings( 100, $page * 10, $purpose, $category );
		Core::response( $this->prepare( $lists ) );
	}

	function getListings($limit = NULL, $offset = NULL,$type = NULL, $category = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_classifieds AS b', 'a.id = b.post_id', 'left');
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Used');
		}
		if($category){
			$this->db->where('b.category',$category);
		}
		$query = $this->db->where(array('a.main_category'=>'Classifieds','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->limit($limit,$offset)->order_by('a.id', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}

	/**
	 *	Prepare data for api
	 *	@param array $data
	 *	@return
	 */
	public function prepare( $data ) {
		$string = Core::getHelper('str')->setLinker('classifieds/view/');
		$img 	= Core::getHelper('image');
		$date = Core::getHelper('date');
		$tempFeat = 0;
		foreach( $data as $dt ) {
			$tempFeat++;
			if( isset($dt->post_id) ) {
				$dt->id = $dt->post_id;
			}
			$fdata[] = [
				'id' 		=> $dt->id,
				'title_en' 	=> $dt->title_en,
				'url' 		=> $string->makeUrl($string->urlFormat( $dt->title_en ) . "-" . $dt->id ),
				'img' 		=> $img->getMainImage( $dt->id ),
				'imgCount'  => count($this->getImages($dt->id)),
				'type' 		=> $dt->type,
				'mobile' 	=> $dt->mobile,
				'price' 	=> number_format($dt->price),
				'currency' 		=> Core::getHelper('location')->getCountryDetails($dt->country)['curCode'],
				'featured' 	=> ($tempFeat > 3) ? 0:1,
				'main_category' => $dt->main_category,
				'description' 	=> $dt->description,
				'dateAdded' 	=> $date->timePassed($dt->added_date),
				'mobdateAdded' 	=> $date->timePassed($dt->added_date),
				'verified' 		=> $dt->verified,
				'status' 		=> $dt->status,
				'phoneno'       => $dt->mobile,
				'email'         => $dt->email,
				'likes'			=> $dt->likes
			];
		}
		return $fdata;
	}

	function getListingsCount($type = NULL, $category = NULL){
		$country_code = $this->session->userdata('country_code');
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_classifieds AS b', 'a.id = b.post_id', 'left');
		if($type){
			$this->db->where('a.type',$type);
		}else{
			$this->db->where('a.type','Used');
		}
		if($category){
			$this->db->where('b.category',$category);
		}
		$count = $this->db->where(array('a.main_category'=>'Classifieds','status !='=>4,'status !='=>0,'a.country'=>$c_code->id))->from('tbl_postings as a')->count_all_results();
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
        $this->db->select('a.*,b.*,c.category as cat,d.subcategory as subcat,f.first_name,f.last_name,f.company_name,f.image',FALSE);
		$this->db->join('tbl_classifieds AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_classifieds_category AS c', 'b.category = c.id', 'left');
		$this->db->join('tbl_classifieds_category AS d', 'b.subcategory = d.id', 'left');
		$this->db->join('tbl_users AS f', 'a.user_id = f.id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
}
?>