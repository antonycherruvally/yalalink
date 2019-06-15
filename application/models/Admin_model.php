<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Admin_model extends CI_Model{
	function UpdateWebsiteDetails(){
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$values = $this->security->xss_clean($this->input->post());
		$update = array(
		'email' => @$values['email'],
		'phone' => @$values['phone'],
		'mobile' => @$values['mobile'],
		'fb_link' => @$values['fb_link'],
		'tw_link' => @$values['tw_link'],
		'ln_link' => @$values['ln_link'],
		'yt_link' => @$values['yt_link'],
		'in_link' => @$values['in_link']);
		$query = $this->db->update('tbl_website_details', $update);
		return true;
	}
	function WebsiteDetails(){
		$query = $this->db->select('*')->get('tbl_website_details');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function AdsDetails($id = NULL){
		$query = $this->db->select('*')->where('id',$id)->get('tbl_advertisements');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getWebsiteUsersCount(){
		$searchdata = $this->session->userdata('searchdata');
		$userdata = $this->session->userdata('logged_admin_userdata');
		$count = $this->db->where(array('user_type !='=>'superadmin','status !='=>4))->from('tbl_users')->count_all_results();
		return $count;
	}
	function getWebsiteVisitorsCount(){
		$searchdata = $this->session->userdata('searchdata');
		$userdata = $this->session->userdata('logged_admin_userdata');
		$query = $this->db->select('*')->get('tbl_website_details');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getTotalPostsCount(){
		$searchdata = $this->session->userdata('searchdata');
		$userdata = $this->session->userdata('logged_admin_userdata');
		$count = $this->db->from('tbl_postings')->count_all_results();
		return $count;
	}
	function getAdvertisementsCount(){
		$searchdata = $this->session->userdata('searchdata');
		$userdata = $this->session->userdata('logged_admin_userdata');
		$count = $this->db->from('tbl_advertisements')->count_all_results();
		return $count;
	}
	function getPurposeDetail($id = NULL){
		$query = $this->db->select('*')->where('id',$id)->get('tbl_realestate_category');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getIndustryDetail($id = NULL){
		$query = $this->db->select('*')->where('id',$id)->get('tbl_industry');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getPositionDetail($id = NULL){
		$query = $this->db->select('*')->where('id',$id)->get('tbl_jobs_positions');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function RealEstateDetails($id = NULL){
		$this->db->select('a.*,b.*',FALSE);
		$this->db->join('tbl_realestate AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function JobsDetails($id = NULL){
		$this->db->select('a.*,b.*',FALSE);
		$this->db->join('tbl_jobs AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function AutoDetails($id = NULL){
		$this->db->select('a.*,b.*',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function ClassifiedsDetails($id = NULL){
		$this->db->select('a.*,b.post_id,b.category,b.subcategory',FALSE);
		$this->db->join('tbl_classifieds AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function HousemaidsDetails($id = NULL){
		$this->db->select('a.*,b.*',FALSE);
		$this->db->join('tbl_house_maids AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function PhonesDetails($id = NULL){
		$this->db->select('a.*,b.*',FALSE);
		$this->db->join('tbl_phones AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function ElectronicsDetails($id = NULL){
		$this->db->select('a.*,b.*',FALSE);
		$this->db->join('tbl_electronics AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function ComputersDetails($id = NULL){
		$this->db->select('a.*,b.*',FALSE);
		$this->db->join('tbl_computers AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function EducationsDetails($id = NULL){
		$this->db->select('a.*,b.*',FALSE);
		$this->db->join('tbl_educations AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function ServicesDetails($id = NULL){
		$this->db->select('a.*,b.post_id,b.category,b.category,b.fax,b.website',FALSE);
		$this->db->join('tbl_services AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function HealthcareDetails($id = NULL){
		$this->db->select('a.*,b.post_id,b.category,b.category,b.fax,b.website',FALSE);
		$this->db->join('tbl_healthcare AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function WomenBeautyDetails($id = NULL){
		$this->db->select('a.*,b.post_id,b.category,b.category,b.fax,b.website',FALSE);
		$this->db->join('tbl_womenbeauty AS b', 'a.id = b.post_id', 'left');
		$this->db->where(array('a.id'=>$id));
		$query = $this->db->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function UserDetails($id = NULL){
		$query = $this->db->select('*')->where('id',$id)->get('tbl_users');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getCountry($id = NULL){
		$query = $this->db->select('*')->where('id',$id)->get('tbl_countries');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getImages($id = NULL){
        $query = $this->db->select('*')->where(array('post_id'=>$id))->get('tbl_post_images');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function AdsPage($id = NULL){
		$query = $this->db->select('page')->where('post_id',$id)->get('tbl_ads_pages');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getAmenities($id = NULL){
		$query = $this->db->select('a.*,b.name')->join('tbl_property_amenities AS b', 'a.amenity_id = b.id', 'left')->where('a.post_id',$id)->get('tbl_property_amenities_added as a');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getFeatures($id = NULL){
		$query = $this->db->select('a.*,b.name')->join('tbl_auto_features AS b', 'a.features_id = b.id', 'left')->where('a.post_id',$id)->get('tbl_auto_features_added as a');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getWebsiteUsers(){
		$query = $this->db->select('*')->where(array('status'=>1))->get('tbl_users');
			return ($query->num_rows()) ? $query->result() : false;
	}
	function validateEmail(){
		$values = $this->security->xss_clean($this->input->post());
		$count = $this->db->where(array('email' => @$values['email']))->from('tbl_users')->count_all_results();
        return ($count > 0) ? false : true;
	}
	function getUsersList($limit = NULL, $offset = NULL){
		$searchads = $this->session->userdata('searchads');
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->select('*',FALSE);
		$query = $this->db->where(array('user_type' => 'website','status !=' =>4))->limit($limit,$offset)->order_by('id', 'desc')->get('tbl_users');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getInternalUsersList($limit = NULL, $offset = NULL){
		$searchads = $this->session->userdata('searchads');
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->select('*',FALSE);
		$query = $this->db->where(array('user_type' => 'internal','status !=' =>4))->limit($limit,$offset)->order_by('id', 'desc')->get('tbl_users');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getUsersCount(){
		$searchdata = $this->session->userdata('searchdata');
		$userdata = $this->session->userdata('logged_admin_userdata');
		$count = $this->db->where(array('user_type' => 'website'))->from('tbl_users')->count_all_results();
		return $count;
	}
	function getIntUsersCount(){
		$searchdata = $this->session->userdata('searchdata');
		$userdata = $this->session->userdata('logged_admin_userdata');
		$count = $this->db->where(array('user_type' => 'internal'))->from('tbl_users')->count_all_results();
		return $count;
	}
	function insertUser(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'first_name' => @$values['first_name'],	
		    'last_name' => @$values['last_name'],
			'email' => @$values['email'],	
		    'password' => $this->encrypt->encode(@$values['password']),
			'user_type' => @$values['user_type'],
			'added_by' => $userdata['id'],	
			'status' => 1,
			'added_date' => $now,
			'updated_date' => $now	
		);
		$query = $this->db->insert('tbl_users', $insertData);
		$id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'] > 0){
			$image = $this->users_image('image', $image);
			$updateImage = array('image' => $image);
			$query = $this->db->where('id',$id)->update('tbl_users', $updateImage);
		}
		return $id;
	}
	function updateUser(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		    'first_name' => @$values['first_name'],	
		    'last_name' => @$values['last_name'],
			'email' => @$values['email'],
			'user_type' => @$values['user_type'],
			'updated_by' => $userdata['id'],
			'updated_date' => $now	
		);
		$query = $this->db->where('id',$values['id'])->update('tbl_users', $updateData);
		$image = @$_FILES['image'];
		if($image['size'] > 0){
			$delete = $this->db->select('*')->where(array('id' => $values['id'], 'user_type' => $values['user_type']))->get('tbl_users')->row();
			if($delete){
			unlink('uploads/users/'.$delete->image);
			}
			$image = $this->users_image('image', $image);
			$updateImage = array('image' => $image);
			$query = $this->db->where('id',$values['id'])->update('tbl_users', $updateImage);
		}
		return $id;
	}
	/*function deleteUser(){
		$values = $this->security->xss_clean($this->input->post());
		$delete = $this->db->select('*')->where(array('id' => $values['id'], 'user_type' => $values['user_type']))->get('tbl_users')->row();
		if($delete){
			unlink('uploads/users/'.$delete->image);
			$this->db->where('user_id',$values['id'])->delete('tbl_newsletters');
			$this->db->where('id',$values['id'])->delete('tbl_users');
		}
		return true;
	}*/
	function deleteUser(){
		$values = $this->security->xss_clean($this->input->post());
		$delete = $this->db->select('*')->where(array('id' => $values['id']))->get('tbl_users')->row();
		if($delete){
			$updateStatus = array('status' => 4);
			$this->db->where('user_id',$values['id'])->update('tbl_newsletters', $updateStatus);
			$query = $this->db->where('id',$values['id'])->update('tbl_users', $updateStatus);
		}
		return true;
	}
	function deleteAllUser(){
		$values = $this->security->xss_clean($this->input->post());
		$delete = $this->db->select('*')->where_in('id' , array($values['ids']))->get('tbl_users')->result();
		if($delete){
			foreach($delete as $val){
			/*unlink('uploads/users/'.$val->image);
			$this->db->where('user_id',$val->id)->delete('tbl_newsletters');
			$this->db->where('id',$val->id)->delete('tbl_users');*/
			$updateStatus = array('status' => 4);
			$this->db->where('user_id',$val->id)->update('tbl_newsletters', $updateStatus);
			$query = $this->db->where('id',$val->id)->update('tbl_users', $updateStatus);
			}
		}
		return true;
	}
	function getAdsList($limit = NULL, $offset = NULL){
		$searchads = $this->session->userdata('searchads');
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->select('*',FALSE);
		$query = $this->db->limit($limit,$offset)->order_by('id', 'desc')->get('tbl_advertisements');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getAdsCount(){
		$searchdata = $this->session->userdata('searchdata');
		$userdata = $this->session->userdata('logged_admin_userdata');
		$count = $this->db->from('tbl_advertisements')->count_all_results();
		return $count;
	}
	function getPostsList($limit = NULL, $offset = NULL, $category = NULL){
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_realestate AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate_category AS c', 'b.property_type = c.id', 'left');
		if($this->input->get('country')){
			$this->db->where(array('a.country'=>$this->input->get('country')));
		}
		if($this->input->get('from_date')){
			$this->db->where('a.added_date <=',$this->input->get('from_date'));
		}
		if($this->input->get('to_date')){
			$this->db->where('a.added_date >=',$this->input->get('to_date'));
		}
		$query = $this->db->where(array('a.main_category'=>$category,'a.status !='=>4))->limit($limit,$offset)->order_by('a.id', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getUserPosts($limit = NULL, $offset = NULL, $id = NULL){
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_realestate AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate_category AS c', 'b.property_type = c.id', 'left');
		$query = $this->db->where(array('a.user_id'=>$id))->limit($limit,$offset)->order_by('a.added_date', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getPostsCount($category = NULL){
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_realestate AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate_category AS c', 'b.property_type = c.id', 'left');
		if($this->input->get('country')){
			$this->db->where(array("a.country"=>$this->input->get('country')));
		}
		if($this->input->get('from_date')){
			$this->db->where("a.added_date <=",$this->input->get('from_date'));
		}
		if($this->input->get('to_date')){
			$this->db->where("a.added_date >=",$this->input->get('to_date'));
		}
		$count = $this->db->where(array('a.main_category'=>$category))->from('tbl_postings as a')->count_all_results();
		return $count;
	}
	function getUserPostsCount($id = NULL){
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_realestate AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate_category AS c', 'b.property_type = c.id', 'left');
		$count = $this->db->where(array('a.user_id'=>$id))->from('tbl_postings as a')->count_all_results();
		return $count;
	}
	function insertAdvertisement(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title' => @$values['title'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
			'added_user' => $userdata['id'],	
			'added_date' => $now
		);
		$query = $this->db->insert('tbl_advertisements', $insertData);
		$id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'] > 0){
			$image = $this->ads_image('image', $image);
			$updateImage = array('image' => $image);
			$query = $this->db->where('id',$id)->update('tbl_advertisements', $updateImage);
		}
		if($values['page']){
			$insertPage = array();
			foreach($values['page'] as $page){
				$array = array(
					'post_id' => $id,
					'page' => $page
				);
				array_push($insertPage,$array);
			}
			$query = $this->db->insert_batch('tbl_ads_pages', $insertPage);
		}
		return $id;
	}
	function updateAdvertisement($id = NULL){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		    'title' => @$values['title'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
			'added_date' => $now
		);
		$query = $this->db->where('id',$id)->update('tbl_advertisements', $updateData);
		$id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'] > 0){
			$image = $this->ads_image('image', $image);
			$updateImage = array('image' => $image);
			$query = $this->db->where('id',$id)->update('tbl_advertisements', $updateImage);
		}
		$query = $this->db->where('post_id',$id)->delete('tbl_ads_pages');
		if($values['page']){
			$insertPage = array();
			foreach($values['page'] as $page){
				$array = array(
					'post_id' => $id,
					'page' => $page
				);
				array_push($insertPage,$array);
			}
			$query = $this->db->insert_batch('tbl_ads_pages', $insertPage);
		}
		return $id;
	}
	function deleteAdvertisement(){
		$values = $this->security->xss_clean($this->input->post());
		$delete = $this->db->select('*')->where('id' , $values['id'])->get('tbl_advertisements')->row();
		if($delete){
			unlink('uploads/ads/'.$delete->image);
			$this->db->where('post_id',$values['id'])->delete('tbl_ads_pages');
			$this->db->where('id',$values['id'])->delete('tbl_advertisements');
		}
		return true;
	}
	function deleteAllAdvertisement(){
		$values = $this->security->xss_clean($this->input->post());
		$delete = $this->db->select('*')->where_in('id' , array($values['ids']))->get('tbl_advertisements')->result();
		if($delete){
			foreach($delete as $val){
			unlink('uploads/ads/'.$val->image);
			$this->db->where('post_id',$val->id)->delete('tbl_ads_pages');
			$this->db->where('id',$val->id)->delete('tbl_advertisements');
			}
		}
		return true;
	}
	function deleteAdsPost(){
		$values = $this->security->xss_clean($this->input->post());
		$delete = $this->db->select('*')->where('id', $values['id'])->get('tbl_postings')->row();
		if($delete){
			$now = date('Y-m-d H:i:s');
			$updateStatus = array('status' => 4,'updated_date'=>$now);
			$this->db->where('id',$values['id'])->update('tbl_postings', $updateStatus);
		}			
		return true;
	}
	function deleteAllAdsPost(){
		$values = $this->security->xss_clean($this->input->post());
		$ids = $values['ids'];
	    $delete =$this->db->query('SELECT * FROM tbl_postings WHERE id IN ('.implode(",",$ids).')')->result();
	    $cnt=count($delete);
		if($cnt>0){
			$now = date('Y-m-d H:i:s');
			$updateStatus = array('status' => 4,'updated_date'=>$now);
			$this->db->where_in('id',$ids)->update('tbl_postings', $updateStatus);
		}
		return true;
	}
	function multiple_image_upload($fieldName = NULL,$files = NULL,$postId = NULL,$main = NULL,$img_name){
		$_FILES = array();
		$data = array();
		$this->load->library('upload');
		$this->load->library('image_lib');
		$count = count($files['name']);
		for($i=0; $i<$count; $i++){
			$name = explode('.',$files['name'][$i]);
			$ext = end($name);
			$values = $this->security->xss_clean($this->input->post());
			$string = str_replace(' ', '-', strtolower(substr($values['title_en'], 0, 100))); // Replaces all spaces with hyphens.
   			$string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);
			$name = url_title(@$string);
			$prefix = 'yalalink-'.$img_name.$name.'-';
			$filename = $prefix.$this->generateName().'.'.$ext;
			$_FILES[$fieldName]['name']= $filename;
			$_FILES[$fieldName]['type']= $files['type'][$i];
			$_FILES[$fieldName]['tmp_name']= $files['tmp_name'][$i];
			$_FILES[$fieldName]['error']= $files['error'][$i];
			$_FILES[$fieldName]['size']= $files['size'][$i];   
			$this->upload->initialize($this->set_upload_options($fieldName));
			if($this->upload->do_upload($fieldName) == false){
				return false;
			}else{
			$config_thumbnail = array(
			'image_library' => 'gd2',
			'source_image' => 'uploads/images/'.$filename,
			'new_image' => 'uploads/images/thumb/',
			'maintain_ratio' => TRUE,
			'width' => 140,
			'height' => 100,
			'quality' => 100
			);
			$exif = exif_read_data($config_thumbnail['source_image']);
			if($exif && isset($exif['Orientation']))
			{
				$ort = $exif['Orientation'];
			 
				if ($ort == 6 || $ort == 5)
					$config_thumbnail['rotation_angle'] = '270';
				if ($ort == 3 || $ort == 4)
					$config_thumbnail['rotation_angle'] = '180';
				if ($ort == 8 || $ort == 7)
					$config_thumbnail['rotation_angle'] = '90';
			}
			 
			$this->image_lib->initialize($config_thumbnail);
			$this->image_lib->resize();
			if ( ! $this->image_lib->rotate())
			{
			}
			$this->image_lib->clear();
			if (!$this->image_lib->crop())
			{
			}
			$config_thumbnail = array(
			'image_library' => 'gd2',
			'source_image' => 'uploads/images/'.$filename,
			'new_image' => 'uploads/images/thumbnail/',
			'maintain_ratio' => TRUE,
			'width' => 700,
			'height' => 300,
			'quality' => 100
			);
			// -- Check EXIF
			if($ext == 'jpg' || $ext == 'jpeg' ||  $ext == 'JPG'  || $ext == 'JPEG'){
			$exif = exif_read_data($config_thumbnail['source_image']);
			if($exif && isset($exif['Orientation']))
			{
				$ort = $exif['Orientation'];
			 
				if ($ort == 6 || $ort == 5)
					$config_thumbnail['rotation_angle'] = '270';
				if ($ort == 3 || $ort == 4)
					$config_thumbnail['rotation_angle'] = '180';
				if ($ort == 8 || $ort == 7)
					$config_thumbnail['rotation_angle'] = '90';
			}
			 
			$this->image_lib->initialize($config_thumbnail);
			$this->image_lib->resize();
			if ( ! $this->image_lib->rotate())
			{
			}
			}
			$this->image_lib->clear();
			if (!$this->image_lib->crop())
			{
			}
				$mainImage = 0;
				if($i == $main && is_numeric($main))
				$mainImage = 1;
			  	$array = array(
					'post_id' => $postId,
					'image' => $filename,
					'main' => $mainImage
			  	);
				array_push($data,$array);
			}
		}
		return $data;
	}
	private function set_upload_options($fieldName){
		$config = array();
		$config['upload_path'] = 'uploads/images/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
		$config['max_size']	= '5000000';
		$config['overwrite']     = FALSE;
		return $config;
	}
	function user_image($fieldName = NULL, $file = NULL){
		$_FILES = array();
		$this->load->library('upload');
		$this->load->library('image_lib');
		$tmp = explode('.', $file['name']);
		$ext = end($tmp);
		$values = $this->security->xss_clean($this->input->post());
		$string = str_replace(' ', '-', strtolower(substr($values['title_en'], 0, 100))); // Replaces all spaces with hyphens.
   		$string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);
		$name = url_title(@$string);
		$name = 'yalalink-housemaids-'.$name.'-';
		$filename = $name.'_'.$this->generateName().'.'.$ext;
		$_FILES[$fieldName]['name']= $filename;
		$_FILES[$fieldName]['type']= $file['type'];
		$_FILES[$fieldName]['tmp_name']= $file['tmp_name'];
		$_FILES[$fieldName]['error']= $file['error'];
		$_FILES[$fieldName]['size']= $file['size']; 
		$this->upload->initialize($this->set_user_image_upload_options());
		if($this->upload->do_upload($fieldName) == false){
			return false;
		}else{
			$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/'.$filename;
			$config['wm_type'] = 'overlay';
			$config['wm_overlay_path'] = 'assets/front_end/images/watermark.png';
			$config['wm_opacity'] = 10;
			$config['wm_vrt_alignment'] = 'middle';
			$this->image_lib->initialize($config);
			$this->image_lib->watermark();
			$config_thumbnail = array(
			'image_library' => 'gd2',
			'source_image' => 'uploads/images/'.$filename,
			'new_image' => 'uploads/images/thumb/',
			'maintain_ratio' => TRUE,
			'width' => 140,
			'height' => 100,
			'quality' => 100
			);
			$exif = exif_read_data($config_thumbnail['source_image']);
			if($exif && isset($exif['Orientation']))
			{
				$ort = $exif['Orientation'];
			 
				if ($ort == 6 || $ort == 5)
					$config_thumbnail['rotation_angle'] = '270';
				if ($ort == 3 || $ort == 4)
					$config_thumbnail['rotation_angle'] = '180';
				if ($ort == 8 || $ort == 7)
					$config_thumbnail['rotation_angle'] = '90';
			}
			$this->image_lib->initialize($config_thumbnail);
			$this->image_lib->resize();
			if ( ! $this->image_lib->rotate())
			{
			}
			$this->image_lib->clear();
			if (!$this->image_lib->crop())
			{
			}
			return $filename;
		}		
	}
	function ads_image($fieldName = NULL, $file = NULL){
		$_FILES = array();
		$this->load->library('upload');
		$string = str_replace(' ', '-', strtolower(substr($values['title'], 0, 100))); // Replaces all spaces with hyphens.
   		$string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);
		$name = 'image';
		$tmp = explode('.', $file['name']);
		$ext = end($tmp);
		$filename = $name.'.'.$ext;
		$_FILES[$fieldName]['name']= $filename;
		$_FILES[$fieldName]['type']= $file['type'];
		$_FILES[$fieldName]['tmp_name']= $file['tmp_name'];
		$_FILES[$fieldName]['error']= $file['error'];
		$_FILES[$fieldName]['size']= $file['size']; 
		$this->upload->initialize($this->set_ads_image_upload_options());
		if($this->upload->do_upload($fieldName) == false){
			return false;
		}else{
			return $filename;
		}		
	}
	function user_cv($fieldName = NULL, $file = NULL){
		$_FILES = array();
		$this->load->library('upload');
		$userdata = $this->session->userdata('logged_businessid_userdata');
		$name = 'yalalink_user_cv';
		$tmp = explode('.', $file['name']);
		$ext = end($tmp);
		$filename = $name.'_'.$this->generateName().'.'.$ext;
		$_FILES[$fieldName]['name']= $filename;
		$_FILES[$fieldName]['type']= $file['type'];
		$_FILES[$fieldName]['tmp_name']= $file['tmp_name'];
		$_FILES[$fieldName]['error']= $file['error'];
		$_FILES[$fieldName]['size']= $file['size']; 
		$this->upload->initialize($this->set_user_cv_upload_options());
		if($this->upload->do_upload($fieldName) == false){
			return false;
		}else{
			return $filename;
		}		
	}
	function users_image($fieldName = NULL, $file = NULL){
		$_FILES = array();
		$this->load->library('upload');
		$this->load->library('image_lib');
		$tmp = explode('.', $file['name']);
		$ext = end($tmp);
		$values = $this->security->xss_clean($this->input->post());
		$string = str_replace(' ', '-', strtolower(substr($values['first_name'].$values['last_name'], 0, 50))); // Replaces all spaces with hyphens.
   		$string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);
		$name = url_title(@$string);
		$name = 'yalalink-users-'.$name.'-';
		$filename = $name.'_'.$this->generateName().'.'.$ext;
		$_FILES[$fieldName]['name']= $filename;
		$_FILES[$fieldName]['type']= $file['type'];
		$_FILES[$fieldName]['tmp_name']= $file['tmp_name'];
		$_FILES[$fieldName]['error']= $file['error'];
		$_FILES[$fieldName]['size']= $file['size']; 
		$this->upload->initialize($this->set_users_image_upload_options());
		if($this->upload->do_upload($fieldName) == false){
			return false;
		}else{
			$config_thumbnail = array(
			'image_library' => 'gd2',
			'source_image' => 'uploads/users/'.$filename,
			'new_image' => 'uploads/users/thumb/',
			'maintain_ratio' => TRUE,
			'width' => 140,
			'height' => 100,
			'quality' => 100
			);
			$exif = exif_read_data($config_thumbnail['source_image']);
			if($exif && isset($exif['Orientation']))
			{
				$ort = $exif['Orientation'];
			 
				if ($ort == 6 || $ort == 5)
					$config_thumbnail['rotation_angle'] = '270';
				if ($ort == 3 || $ort == 4)
					$config_thumbnail['rotation_angle'] = '180';
				if ($ort == 8 || $ort == 7)
					$config_thumbnail['rotation_angle'] = '90';
			}
			$this->image_lib->initialize($config_thumbnail);
			$this->image_lib->resize();
			if ( ! $this->image_lib->rotate())
			{
			}
			$this->image_lib->clear();
			if (!$this->image_lib->crop())
			{
			}
			return $filename;
		}		
	}
	private function set_user_image_upload_options(){
		$config = array();
		$config['upload_path'] = 'uploads/images/';
		$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
		$config['max_size']	= '50000000';
		$config['overwrite']     = FALSE;
		return $config;
	}
	private function set_users_image_upload_options(){
		$config = array();
		$config['upload_path'] = 'uploads/users/';
		$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
		$config['max_size']	= '50000000';
		$config['overwrite']     = FALSE;
		return $config;
	}
	private function set_ads_image_upload_options(){
		$config = array();
		$config['upload_path'] = 'uploads/ads/';
		$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
		$config['max_size']	= '50000000';
		$config['overwrite']     = FALSE;
		return $config;
	}
	private function set_user_cv_upload_options(){
		$config = array();
		$config['upload_path'] = 'uploads/user-cv/';
		$config['allowed_types'] = 'pdf|doc|docx|dot|dotx|xlsx|word';
		$config['max_size']	= '50000000';
		$config['overwrite']     = FALSE;
		return $config;
	}
	function generateName($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return date('dMYHis').'_'.$randomString;
	}

    /*Realestate start*/
	function insertRealestate(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Real Estate',
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],	
			'price' => @$values['price'],
			'featured' => @$values['featured'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],	
		    'user_id' => $userdata['id'],
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1
			
		);
		
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'real-estate-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertRealestate = array(
		    'post_id' => @$post_id,
		    'purpose' => @$values['purpose'],
		    'property_type' => @$values['property_type'],
		    'year' => @$values['year'],
		    'size' => @$values['size'],
		    'bedroom' => @$values['bedrooms'],
		    'bathroom' => @$values['bathrooms'],
			'garage' => @$values['garage'],
			'pool' => @$values['pool'],
			'balcony' => @$values['balcony'],
		    'price_per' => @$values['price_per']
		);
		$query = $this->db->insert('tbl_realestate', $insertRealestate);
		if($values['amenities']){
			$insertAmenities = array();
			foreach($values['amenities'] as $amenities){
				$array = array(
					'post_id' => $post_id,
					'amenity_id' => $amenities
				);
				array_push($insertAmenities,$array);
			}
			$query = $this->db->insert_batch('tbl_property_amenities_added', $insertAmenities);
		}
		return $post_id;
	}
	function updateRealEstate(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Real Estate',
		    'type' => @$values['type'],
		    'description' => @$values['description'],
			'price' => @$values['price'],
			'featured' => @$values['featured'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],	
			'added_by' => $userdata['id'],
			'updated_date' => $now,
			'status' => @$values['status'],	
		);
		
        if($values['location']){
        	$insertData['location'] =$values['location'];
        }
        if($values['country']){
        	$insertData['country'] =$values['country'];
        }
        if($values['area']){
        	$insertData['area'] =$values['area'];
        }
		$query = $this->db->where('id',@$values['id'])->update('tbl_postings', $insertData);
		$this->db->where('post_id',@$values['id'])->update('tbl_post_images', array('main'=>0));
		$arr = explode('_',$this->input->post('image_main'));
		if($arr[0] == 'id')
		$this->db->where('id',$arr[1])->update('tbl_post_images', array('main'=>1));
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$values['id'],$values['main_image'],'real-estate-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if(@$values['image_delete']){
			$query = $this->db->select('image')->where_in('id', @$values['image_delete'])->get('tbl_post_images');
			$results = $query->result();
			if($results){
			foreach($results as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
			$this->db->where_in('id', @$values['image_delete'])->delete('tbl_post_images');
			}
		}
		$insertRealestate = array(
		    'purpose' => @$values['purpose'],
		    'property_type' => @$values['property_type'],
		    'year' => @$values['year'],
		    'size' => @$values['size'],
		    'bedroom' => @$values['bedrooms'],
		    'bathroom' => @$values['bathrooms'],
		    'garage' => @$values['garage'],
			'pool' => @$values['pool'],
			'balcony' => @$values['balcony'],
		    'price_per' => @$values['price_per']
		);
		$query = $this->db->where('post_id',@$values['id'])->update('tbl_realestate', $insertRealestate);
		if($values['amenities']){
			$this->db->where('post_id',@$values['id'])->delete('tbl_property_amenities_added');
			$insertAmenities = array();
			foreach($values['amenities'] as $amenities){
				$array = array(
					'post_id' => $values['id'],
					'amenity_id' => $amenities
				);
				array_push($insertAmenities,$array);
			}
			$query = $this->db->insert_batch('tbl_property_amenities_added', $insertAmenities);
		}
		return $query;
	}

	/*Jobs start*/
	function insertJob(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$nationality = implode(', ', $values['nationality']);
		//echo $values['country'].$values['salary']; exit;
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Jobs',
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'featured' => @$values['featured'],
		    'ad_type' => @$values['ad_type'],
		    'user_id' => $userdata['id'],	
			'added_by' => $userdata['id'],	
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1	
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$insertJobs = array(
		    'post_id' => @$post_id,
		    'industry' => @$values['industry'],
		    'position' => @$values['position'],
		    'level' => @$values['level'],
		    'job_type' => @$values['job_type'],
		    'experience' => @$values['experience'],
		    'salary' => @$values['salary'],
		    'qualification' => @$values['qualification'],
		    'gender' => @$values['gender'],
		    'current_location' => @$values['current_location'],
		    'visa_status' => @$values['visa_status'],
		    'skills' => @$values['skills'],
		    'languages' => @$values['languages'],
		    'nationality' => @$nationality
		);
		$query = $this->db->insert('tbl_jobs', $insertJobs);
		if($post_id){
				$p = '';
				$l = '';
				$c = '';
				$cty = '';
				$postn = '';
				$loct = '';
				$position = $this->db->select('*')->where('id', $values['position'])->get('tbl_jobs_positions');
				if($position->num_rows()){
					 $position = $position->row();
				}else{
					$position = '';
				}
				if($position){
					 $postn = $position->title;
					 $p = strtoupper($postn[0]);
				}
				$location = $this->db->select('*')->where('id', $values['location'])->get('tbl_countries');
				if($location->num_rows()){
					 $location = $location->row();
				}else{
					$location = '';
				}
				if($location){
					 $loct = $location->location_en;
					 $l = strtoupper($loct[0]);
				}
				$country = $this->db->select('*')->where('id', $values['country'])->get('tbl_countries');
				if($country->num_rows()){
					 $country = $country->row();
				}else{
					$country = '';
				}
				if($country){
					 $cty = $country->name;
					 $c = strtoupper($cty[0]);
				}
				$title = strtoupper($values['title_en']);
				$length = 4;
				$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$charactersLength = strlen($characters);
				$randomString = '';
				for ($i = 0; $i < $length; $i++) {
					$randomString .= $characters[rand(0, $charactersLength - 1)];
				}
				$num =  $randomString;
				$ref_no	= 'YLJ-'.$c.$l.$p.$title[0].'-'.$post_id;
				$insertRef = array(
					'ref_no' => @$ref_no,	
				);
				$query = $this->db->where(array('post_id'=>$post_id))->update('tbl_jobs', $insertRef);
				}
		$cv = @$_FILES['user_cv'];
		if($cv['size'] > 0){
			$cv = $this->user_cv('user_cv', $cv);
			$updateCv = array('cv' => $cv);
			$query = $this->db->where('id',$userdata['id'])->update('tbl_users', $updateCv);
		}
		return $post_id;
	}
	function updateJobs(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$nationality = implode(', ', $values['nationality']);
		//echo $values['country'].$values['salary']; exit;
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'featured' => @$values['featured'],
		    'ad_type' => @$values['ad_type'],
			'updated_by' => $userdata['id'],
			'updated_date' => $now,
			'status' => $values['status']	
		);
		if($values['location']){
        	$insertData['location'] =$values['location'];
        }
        if($values['country']){
        	$insertData['country'] =$values['country'];
        }
        if($values['area']){
        	$insertData['area'] =$values['area'];
        }
		$query = $this->db->where('id',$values['id'])->update('tbl_postings', $insertData);
		$insertJobs = array(
		    'industry' => @$values['industry'],
		    'position' => @$values['position'],
		    'level' => @$values['level'],
		    'job_type' => @$values['job_type'],
		    'experience' => @$values['experience'],
		    'salary' => @$values['salary'],
		    'qualification' => @$values['qualification'],
		    'gender' => @$values['gender'],
		    'current_location' => @$values['current_location'],
		    'visa_status' => @$values['visa_status'],
		    'skills' => @$values['skills'],
		    'languages' => @$values['languages'],
		    'nationality' => @$nationality
		);
		$query = $this->db->where('post_id',$values['id'])->update('tbl_jobs', $insertJobs);
		$cv = @$_FILES['user_cv'];
		if($cv['size'] > 0){
			$query = $this->db->select('user_cv')->where_in('id', @$values['userid'])->get('tbl_users');
			$results = $query->row();
			if($results){
				unlink('uploads/user-cv/'.$results->cv);
			}
			$cv = $this->user_cv('user_cv', $cv);
			$updateCv = array('cv' => $cv);
			$query = $this->db->where('id',$values['userid'])->update('tbl_users', $updateCv);
		}
		return $values['id'];
	}
	
	/*Auto start*/
	function insertAuto(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Auto',
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'featured' => @$values['featured'],
		    'ad_type' => @$values['ad_type'],
		    'user_id' => $userdata['id'],	
			'added_by' => $userdata['id'],
			'price' => @$values['price'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1		
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			if(! isset($values['main_image']) ) {
				$values['main_image'] = $values['realMainImage'];
			}
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'auto-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if($values['category'] == 1){
			$kilometers = $values['kilometers'];
			$condition = $values['body_condition'];
			$mechanical = $values['mechanical_condition'];
			$year = $values['year'];
			$cylinders = $values['cylinders'];
			$horsepower = $values['horsepower'];
			$warranty = $values['warranty'];
			$fuel_type = $values['fuel_type'];
			$body_type = $values['body_type'];
		}elseif($values['category'] == 2){
			$body_type = $values['boat_type'];
			$warranty = $values['boat_warranty'];
			$condition = $values['boat_condition'];
			$usage = $values['usage'];
		}elseif($values['category'] == 3){
			$kilometers = $values['heavy_kilometers'];
			$condition = $values['heavy_condition'];
			$mechanical = $values['heavy_mechanical'];
			$year = $values['heavy_year'];
			$cylinders = $values['heavy_cylinders'];
			$horsepower = $values['heavy_horsepower'];
			$warranty = $values['heavy_warranty'];
			$fuel_type = $values['heavy_fuel_type'];
		}elseif($values['category'] == 4){
			$kilometers = $values['motorcycles_kilometers'];
			$usage = $values['motorcycles_usage'];
			$year = $values['motorcycles_year'];
			$warranty = $values['motorcycles_warranty'];
		}
		$insertAuto = array(
		    'post_id' => @$post_id,
			'category' => @$values['category'],
			'subcategory' => @$values['subcategory'],
			'model' => @$values['model'],
			'type' => @$values['type'],
			'body_type' => @$body_type,
			'color' => @$values['color'],
			'transmission_type' => @$values['transmission_type'],
			'regional_specs' => @$values['regional_specs'],
			'doors' => @$values['doors'],
			'length' => @$values['length'],
			'age' => @$values['age'],
			'usage' => @$usage,
			'make' => @$values['make'],
			'capacity' => @$values['capacity'],
			'drive_system' => @$values['drive_system'],
			'wheels' => @$values['wheels'],
			'engine_size' => @$values['size'],
			'manufacturer' => @$values['manufacturer'],
			'kilometers' => @$kilometers,	
			'body_condition' => @$condition,
			'mechanical_condition' => @$mechanical,
			'year' => @$year,
			'cylinders' => @$cylinders,
			'horsepower' => @$horsepower,
			'warranty' => @$warranty,
			'fuel_type' => @$fuel_type,
		);
		$query = $this->db->insert('tbl_auto', $insertAuto);
		if($values['features']){
			$insertFeatures = array();
			foreach($values['features'] as $features){
				$array = array(
					'post_id' => $post_id,
					'features_id' => $features
				);
				array_push($insertFeatures,$array);
			}
			$query = $this->db->insert_batch('tbl_auto_features_added', $insertFeatures);
		}
		return $post_id;
	}
	function updateAuto(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Auto',
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'featured' => @$values['featured'],
		    'ad_type' => @$values['ad_type'],	
			'added_by' => $userdata['id'],
			'price' => @$values['price'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => $values['status']
		);
		if($values['country']){
        	$insertData['country'] =$values['country'];
        }
		if($values['location']){
        	$insertData['location'] =$values['location'];
        }
        if($values['area']){
        	$insertData['area'] =$values['area'];
        }

		$query = $this->db->where('id',$values['id'])->update('tbl_postings', $insertData);
		$this->db->where('post_id',@$values['id'])->update('tbl_post_images', array('main'=>0));
		$arr = explode('_',$this->input->post('image_main'));
		if($arr[0] == 'id')
		$this->db->where('id',$arr[1])->update('tbl_post_images', array('main'=>1));
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$values['id'],$values['main_image'],'auto-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if(@$values['image_delete']){
			$query = $this->db->select('image')->where_in('id', @$values['image_delete'])->get('tbl_post_images');
			$results = $query->result();
			if($results){
			foreach($results as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
			$this->db->where_in('id', @$values['image_delete'])->delete('tbl_post_images');
			}
		}
		if($values['category'] == 1){
			$kilometers = $values['kilometers'];
			$condition = $values['body_condition'];
			$mechanical = $values['mechanical_condition'];
			$year = $values['year'];
			$cylinders = $values['cylinders'];
			$horsepower = $values['horsepower'];
			$warranty = $values['warranty'];
			$fuel_type = $values['fuel_type'];
			$body_type = $values['body_type'];
		}elseif($values['category'] == 2){
			$body_type = $values['boat_type'];
			$warranty = $values['boat_warranty'];
			$condition = $values['boat_condition'];
			$usage = $values['usage'];
		}elseif($values['category'] == 3){
			$kilometers = $values['heavy_kilometers'];
			$condition = $values['heavy_condition'];
			$mechanical = $values['heavy_mechanical'];
			$year = $values['heavy_year'];
			$cylinders = $values['heavy_cylinders'];
			$horsepower = $values['heavy_horsepower'];
			$warranty = $values['heavy_warranty'];
			$fuel_type = $values['heavy_fuel_type'];
		}elseif($values['category'] == 4){
			$kilometers = $values['motorcycles_kilometers'];
			$usage = $values['motorcycles_usage'];
			$year = $values['motorcycles_year'];
			$warranty = $values['motorcycles_warranty'];
		}
		$insertAuto = array(
			'category' => @$values['category'],
			'subcategory' => @$values['subcategory'],
			'model' => @$values['model'],
			'type' => @$values['type'],
			'body_type' => @$body_type,
			'color' => @$values['color'],
			'transmission_type' => @$values['transmission_type'],
			'regional_specs' => @$values['regional_specs'],
			'doors' => @$values['doors'],
			'length' => @$values['length'],
			'age' => @$values['age'],
			'usage' => @$usage,
			'make' => @$values['make'],
			'capacity' => @$values['capacity'],
			'drive_system' => @$values['drive_system'],
			'wheels' => @$values['wheels'],
			'engine_size' => @$values['size'],
			'manufacturer' => @$values['manufacturer'],
			'kilometers' => @$kilometers,	
			'body_condition' => @$condition,
			'mechanical_condition' => @$mechanical,
			'year' => @$year,
			'cylinders' => @$cylinders,
			'horsepower' => @$horsepower,
			'warranty' => @$warranty,
			'fuel_type' => @$fuel_type,
		);
		$query = $this->db->where('post_id',$values['id'])->update('tbl_auto', $insertAuto);
		if($values['features']){
			$this->db->where('post_id',@$values['id'])->delete('tbl_auto_features_added');
			$insertFeatures = array();
			foreach($values['features'] as $features){
				$array = array(
					'post_id' => $values['id'],
					'features_id' => $features
				);
				array_push($insertFeatures,$array);
			}
			$query = $this->db->insert_batch('tbl_auto_features_added', $insertFeatures);
		}
		return $query;
	}
	/*Classifieds start*/
	function insertClassifieds(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
			'type' => @$values['type'],
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' =>"Classifieds",
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'price' => @$values['price'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
		    'featured' => @$values['featured'],
		    'user_id' => $userdata['id'],		
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'classifieds-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertClassifieds = array(
		    'post_id' => @$post_id,
		    'category' => @$values['category'],
		    'subcategory' => @$values['subcategory']
		);
		$query = $this->db->insert('tbl_classifieds', $insertClassifieds);
		return $post_id;
	}
	function updateClassifieds(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->trans_start();
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		    'type' => @$values['type'],
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'description' => @$values['description'],
		    'price' => @$values['price'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
		    'featured' => @$values['featured'],	
			'added_by' => $userdata['id'],
			'updated_date' => $now,
			'status' => $values['status']
		);
		if($values['country']){
        	$updateData['country'] =$values['country'];
        }
		if($values['location']){
        	$updateData['location'] =$values['location'];
        }
        if($values['area']){
        	$updateData['area'] =$values['area'];
        }
		$query = $this->db->where('id',@$values['id'])->update('tbl_postings', $updateData);
		$updateClassifieds = array(
			'post_id' => @$values['id'],
		    'category' => @$values['category'],
		    'subcategory' => @$values['subcategory']
		);
		$delete=$this->db->where('post_id', @$values['id'])->delete('tbl_classifieds');
		if($delete){
			$this->db->insert('tbl_classifieds', $updateClassifieds);
		}
		//Start image
		$this->db->where('post_id',@$values['id'])->update('tbl_post_images', array('main'=>0));
		$arr = explode('_',$this->input->post('image_main'));
		if($arr[0] == 'id')
		$this->db->where('id',$arr[1])->update('tbl_post_images', array('main'=>1));
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$values['id'],$values['main_image'],'real-estate-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if(@$values['image_delete']){
			$query = $this->db->select('image')->where_in('id', @$values['image_delete'])->get('tbl_post_images');
			$results = $query->result();
			if($results){
			foreach($results as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
			$this->db->where_in('id', @$values['image_delete'])->delete('tbl_post_images');
			}
		}

		if ($this->db->trans_status() === TRUE)
		{
		  return true;     
		}else{
		  return false; 
		}
	}
    
    /*House Maids Start*/
	function insertHouseMaids(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'House Maids',
		    'type' => @$values['type'],
		    'mobile' => @$values['mobile'],
		    'email' => @$values['email'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'ad_type' => @$values['ad_type'],
		    'user_id' => $userdata['id'],	
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1	
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$insertHousemaids = array(
		    'post_id' => @$post_id,
		    'maritial' => @$values['maritial'],
		    'nationality' => @$values['nationality'],
		    'gender' => @$values['gender'],
		    'age' => @$values['age'],
		    'religion' => @$values['religion'],
		    'experience' => @$values['experience'],
		    'languages' => @$values['languages'],
		    'current_location' => @$values['current_location'],
		    'mobile' => @$values['mobile'],
		    'email' => @$values['email'],
		    'visa' => @$values['visa']
		);
		$query = $this->db->insert('tbl_house_maids', $insertHousemaids);
		$image = @$_FILES['image'];
		$cv = @$_FILES['user_cv'];
		if($image['size'] > 0){
			$image = $this->user_image('image', $image);
			$insertImage = array('image' => $image,'main'=>1,'post_id'=>$post_id);
			$query = $this->db->insert('tbl_post_images', $insertImage);
		}
		if($cv['size'] > 0){
			$cv = $this->user_cv('user_cv', $cv);
			$updateCv = array('cv' => $cv);
			$query = $this->db->where('post_id',$post_id)->update('tbl_house_maids', $updateCv);
		}
		return $post_id;
	}
	function updateHousemaids(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->trans_start();
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'House Maids',
		    'type' => @$values['type'],
		    'mobile' => @$values['mobile'],
		    'email' => @$values['email'],
		    'description' => @$values['description'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'ad_type' => @$values['ad_type'],		
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => $values['status']
		);
		if($values['country']){
        	$updateData['country'] =$values['country'];
        }
		if($values['location']){
        	$updateData['location'] =$values['location'];
        }
        if($values['area']){
        	$updateData['area'] =$values['area'];
        }
		$query = $this->db->where('id',@$values['id'])->update('tbl_postings', $updateData);
		$updateHousemaids = array(
		    'post_id' => @$values['id'],
		    'maritial' => @$values['maritial'],
		    'nationality' => @$values['nationality'],
		    'gender' => @$values['gender'],
		    'age' => @$values['age'],
		    'religion' => @$values['religion'],
		    'experience' => @$values['experience'],
		    'languages' => @$values['languages'],
		    'current_location' => @$values['current_location'],
		    'mobile' => @$values['mobile'],
		    'email' => @$values['email'],
		    'visa' => @$values['visa']
		);
		$query = $this->db->where('post_id',@$values['id'])->update('tbl_house_maids', $updateHousemaids);
		$image = @$_FILES['image'];
		if($image['size'] > 0){
			$exist_image = $this->db->select('image')->where('post_id', @$values['id'])->get('tbl_post_images')->row();
			if($exist_image){
				unlink('uploads/images/'.$exist_image->image);
				unlink('uploads/images/thumb/'.$exist_image->image);
				unlink('uploads/images/thumbnail/'.$exist_image->image);
			}
			$this->db->where('post_id',$values['id'])->delete('tbl_post_images');
			$image = $this->user_image('image', $image);
			$insertImage = array('image' => $image,'main'=>1,'post_id'=>$values['id']);
			$query = $this->db->insert('tbl_post_images', $insertImage);
		}
		$cv = @$_FILES['user_cv'];
		if($cv['size'] > 0){
			$exist_cv = $this->db->select('cv as cv')->where('post_id', @$values['id'])->get('tbl_house_maids')->row();
			if($exist_cv){
              unlink('uploads/user-cv/'.$exist_cv->cv);
			}
			$cv = $this->user_cv('user_cv', $cv);
			$updateCv = array('cv' => $cv);
			$query = $this->db->where('post_id',@$values['id'])->update('tbl_house_maids', $updateCv);
		}

		if ($this->db->trans_status() === TRUE)
		{
		  return true;     
		}else{
		  return false; 
		}
	}
    
    /*Phones start */
	function insertPhones(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Phones',
		    'type' => @$values['type'],	
			'price' => @$values['price'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
		    'user_id' => $userdata['id'],		
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1	
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'phones-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertPhones = array(
		    'post_id' => @$post_id,
		    'brand' => @$values['brand'],
		    'model' => @$values['model'],
		    'age' => @$values['age'],
		    'usage' => @$values['usage'],
		    'condition' => @$values['condition'],
		    'warranty' => @$values['warranty'],
		    'color' => @$values['color'],
		    'storage' => @$values['storage'],
		    'operating_system' => @$values['operating_system'],
		    'camera_resolution' => @$values['camera_resolution'],
		    'ram' => @$values['ram'],
		    'dimensions' => @$values['dimensions'],
		    'weight' => @$values['weight'],
		    'removable_battery' => @$values['removable_battery'],
		    'screen_size' => @$values['screen_size'],
		    'touchscreen' => @$values['touchscreen'],
		    'resolution' => @$values['resolution'],
		    'compass' => @$values['compass'],
		    'proximity' => @$values['proximity'],
		    'accelerometer' => @$values['accelerometer'],
		    'light' => @$values['light'],
		    'gyroscope' => @$values['gyroscope'],
		    'barometer' => @$values['barometer'],
		    'temperature' => @$values['temperature'],
		    'form_factor' => @$values['form_factor'],
		    'release_year' => @$values['release_year'],
		    'capacity' => @$values['capacity']
		);
		$query = $this->db->insert('tbl_phones', $insertPhones);
		return $post_id;
	}
	function updatePhones(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->trans_start();
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		   'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Phones',
		    'type' => @$values['type'],	
			'price' => @$values['price'],
		    'description' => @$values['description'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],		
			'added_by' => $userdata['id'],
			'updated_date' => $now,
			'status' => $values['status']
		);
		if($values['country']){
        	$updateData['country'] =$values['country'];
        }
		if($values['location']){
        	$updateData['location'] =$values['location'];
        }
        if($values['area']){
        	$updateData['area'] =$values['area'];
        }

		$query = $this->db->where('id',@$values['id'])->update('tbl_postings', $updateData);
		$updatePhones = array(
		    'post_id' => @$values['id'],
		    'brand' => @$values['brand'],
		    'model' => @$values['model'],
		    'age' => @$values['age'],
		    'usage' => @$values['usage'],
		    'condition' => @$values['condition'],
		    'warranty' => @$values['warranty'],
		    'color' => @$values['color'],
		    'storage' => @$values['storage'],
		    'operating_system' => @$values['operating_system'],
		    'camera_resolution' => @$values['camera_resolution'],
		    'ram' => @$values['ram'],
		    'dimensions' => @$values['dimensions'],
		    'weight' => @$values['weight'],
		    'removable_battery' => @$values['removable_battery'],
		    'screen_size' => @$values['screen_size'],
		    'touchscreen' => @$values['touchscreen'],
		    'resolution' => @$values['resolution'],
		    'compass' => @$values['compass'],
		    'proximity' => @$values['proximity'],
		    'accelerometer' => @$values['accelerometer'],
		    'light' => @$values['light'],
		    'gyroscope' => @$values['gyroscope'],
		    'barometer' => @$values['barometer'],
		    'temperature' => @$values['temperature'],
		    'form_factor' => @$values['form_factor'],
		    'release_year' => @$values['release_year'],
		    'capacity' => @$values['capacity']
		);
		$query = $this->db->where('post_id',@$values['id'])->update('tbl_phones',$updatePhones);
		/*Start Image*/
		$this->db->where('post_id',@$values['id'])->update('tbl_post_images', array('main'=>0));
		$arr = explode('_',$this->input->post('image_main'));
		if($arr[0] == 'id')
		$this->db->where('id',$arr[1])->update('tbl_post_images', array('main'=>1));
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$values['id'],$values['main_image'],'real-estate-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if(@$values['image_delete']){
			$query = $this->db->select('image')->where_in('id', @$values['image_delete'])->get('tbl_post_images');
			$results = $query->result();
			if($results){
			foreach($results as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
			$this->db->where_in('id', @$values['image_delete'])->delete('tbl_post_images');
			}
		}

		if ($this->db->trans_status() === TRUE)
		{
		  return true;     
		}else{
		  return false; 
		}
	}

    /*Electronics start  */
	function insertElectronics(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' =>'Electronics',
		    'type' => @$values['type'],	
			'price' => @$values['price'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
		    'user_id' => $userdata['id'],		
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1	
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'electronics-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertElectronics = array(
		    'post_id' => @$post_id,
		    'category' => @$values['category'],
		    'screen_size' => @$values['screen_size'],
		    'category_type' => @$values['category_type'],
		    'brand' => @$values['brand'],
		    'model' => @$values['model'],
		    'age' => @$values['age'],
		    'usage' => @$values['usage'],
		    'condition' => @$values['condition'],
		    'warranty' => @$values['warranty'],
		    'color' => @$values['color'],
		    'optical_zoom' => @$values['optical_zoom'],
		    'megapixel' => @$values['megapixel'],
		    'power_source' => @$values['power_source'],
		    'storage' => @$values['storage'],
		    'style' => @$values['style'],
		    'material' => @$values['material'],
		    'compatible' => @$values['compatible'],
		    'player' => @$values['player'],
		    'weight' => @$values['weight'],
		    'display_type' => @$values['display_type'],
		    'dimension' => @$values['dimension'],
		    'connectivity' => @$values['connectivity']
		);
		$query = $this->db->insert('tbl_electronics', $insertElectronics);
		return $post_id;
	}
	function updateElectronics(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->trans_start();
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' =>'Electronics',
		    'type' => @$values['type'],	
			'price' => @$values['price'],
		    'description' => @$values['description'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],	
			'added_by' => $userdata['id'],
			'updated_date' => $now,
			'status' => $values['status']
		);
		if($values['country']){
        	$updateData['country'] =$values['country'];
        }
		if($values['location']){
        	$updateData['location'] =$values['location'];
        }
        if($values['area']){
        	$updateData['area'] =$values['area'];
        }

		$query = $this->db->where('id',@$values['id'])->update('tbl_postings', $updateData);
		$updateElectronics = array(
		   'post_id' => @$values['id'],
		    'category' => @$values['category'],
		    'screen_size' => @$values['screen_size'],
		    'category_type' => @$values['category_type'],
		    'brand' => @$values['brand'],
		    'model' => @$values['model'],
		    'age' => @$values['age'],
		    'usage' => @$values['usage'],
		    'condition' => @$values['condition'],
		    'warranty' => @$values['warranty'],
		    'color' => @$values['color'],
		    'optical_zoom' => @$values['optical_zoom'],
		    'megapixel' => @$values['megapixel'],
		    'power_source' => @$values['power_source'],
		    'storage' => @$values['storage'],
		    'style' => @$values['style'],
		    'material' => @$values['material'],
		    'compatible' => @$values['compatible'],
		    'player' => @$values['player'],
		    'weight' => @$values['weight'],
		    'display_type' => @$values['display_type'],
		    'dimension' => @$values['dimension'],
		    'connectivity' => @$values['connectivity']
		);
		$query = $this->db->where('post_id',@$values['id'])->update('tbl_electronics',$updateElectronics);
		/*Start Image*/
		$this->db->where('post_id',@$values['id'])->update('tbl_post_images', array('main'=>0));
		$arr = explode('_',$this->input->post('image_main'));
		if($arr[0] == 'id')
		$this->db->where('id',$arr[1])->update('tbl_post_images', array('main'=>1));
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$values['id'],$values['main_image'],'real-estate-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if(@$values['image_delete']){
			$query = $this->db->select('image')->where_in('id', @$values['image_delete'])->get('tbl_post_images');
			$results = $query->result();
			if($results){
			foreach($results as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
			$this->db->where_in('id', @$values['image_delete'])->delete('tbl_post_images');
			}
		}

		if ($this->db->trans_status() === TRUE)
		{
		  return true;     
		}else{
		  return false; 
		}
	}

	/*Computer start*/
	function insertComputers(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => "Computers",
		    'type' => @$values['type'],	
			'price' => @$values['price'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
			'user_id' => $userdata['userid'],	
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'computers-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertComputers = array(
		    'post_id' => @$post_id,
		    'category' => @$values['category'],
		    'category_type' => @$values['category_type'],
		    'subcategory' => @$values['subcategory'],
		    'storage' => @$values['storage'],
		    'brand' => @$values['brand'],
		    'model' => @$values['model'],
		    'age' => @$values['age'],
		    'usage' => @$values['usage'],
		    'condition' => @$values['condition'],
		    'warranty' => @$values['warranty'],
		    'color' => @$values['color'],
		    'screen_size' => @$values['screen_size'],
		    'memory' => @$values['memory'],
		    'processor' => @$values['processor'],
		    'operating_system' => @$values['operating_system'],
		    'graphics' => @$values['graphics'],
		    'compatible' => @$values['compatible'],
		    'connectivity' => @$values['connectivity']
		);
		$query = $this->db->insert('tbl_computers', $insertComputers);
		return $post_id;
	}
	function updateComputers(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->trans_start();
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],	
			'price' => @$values['price'],
		    'description' => @$values['description'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
			'added_by' => $userdata['id'],
			'updated_date' => $now,
			'status' => $values['status']
		);
		if($values['country']){
        	$updateData['country'] =$values['country'];
        }
		if($values['location']){
        	$updateData['location'] =$values['location'];
        }
        if($values['area']){
        	$updateData['area'] =$values['area'];
        }
		$query = $this->db->where('id',@$values['id'])->update('tbl_postings', $updateData);
		$updateComputers = array(
		    'category' => @$values['category'],
		    'category_type' => @$values['category_type'],
		    'subcategory' => @$values['subcategory'],
		    'storage' => @$values['storage'],
		    'brand' => @$values['brand'],
		    'model' => @$values['model'],
		    'age' => @$values['age'],
		    'usage' => @$values['usage'],
		    'condition' => @$values['condition'],
		    'warranty' => @$values['warranty'],
		    'color' => @$values['color'],
		    'screen_size' => @$values['screen_size'],
		    'memory' => @$values['memory'],
		    'processor' => @$values['processor'],
		    'operating_system' => @$values['operating_system'],
		    'graphics' => @$values['graphics'],
		    'compatible' => @$values['compatible'],
		    'connectivity' => @$values['connectivity']
		);
		$query = $this->db->where('post_id',@$values['id'])->update('tbl_computers',$updateComputers);
		/*Start Image*/
		$this->db->where('post_id',@$values['id'])->update('tbl_post_images', array('main'=>0));
		$arr = explode('_',$this->input->post('image_main'));
		if($arr[0] == 'id')
		$this->db->where('id',$arr[1])->update('tbl_post_images', array('main'=>1));
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$values['id'],$values['main_image'],'real-estate-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if(@$values['image_delete']){
			$query = $this->db->select('image')->where_in('id', @$values['image_delete'])->get('tbl_post_images');
			$results = $query->result();
			if($results){
			foreach($results as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
			$this->db->where_in('id', @$values['image_delete'])->delete('tbl_post_images');
			}
		}

		if ($this->db->trans_status() === TRUE)
		{
		  return true;     
		}else{
		  return false; 
		}
	}

	/*Educations start*/
	function insertEducations(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Education',
		    'type' => @$values['type'],
		    'mobile' => @$values['mobile'],
			'price' => @$values['price'],
			'email' => @$values['email'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'ad_type' => @$values['ad_type'],
			'user_id' => $values['userid'],		
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'educations-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertEducations = array(
		    'post_id' => @$post_id,
		    'school_type' => @$values['school_type'],
		    'curriculum' => @$values['curriculum'],
		    'inspection_rating' => @$values['inspection_rating'],
		    'availability' => @$values['availability'],
		    'education_status' => @$values['status'],
		    'mobile' => @$values['mobile'],
		    'email' => @$values['email'],
		    'principal' => @$values['principal'],
		    'website' => @$values['website']
		);
		$query = $this->db->insert('tbl_educations', $insertEducations);
		return $post_id;
	}
	function updateEducations(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->trans_start();
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],
		    'mobile' => @$values['mobile'],
			'price' => @$values['price'],
		    'description' => @$values['description'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'ad_type' => @$values['ad_type'],	
			'added_by' => $userdata['id'],
			'updated_date' => $now,
			'status' => $values['status']
		);
		if($values['country']){
        	$updateData['country'] =$values['country'];
        }
		if($values['location']){
        	$updateData['location'] =$values['location'];
        }
        if($values['area']){
        	$updateData['area'] =$values['area'];
        }
		$query = $this->db->where('id',@$values['id'])->update('tbl_postings', $updateData);
		$updateEducations = array(
		    'school_type' => @$values['school_type'],
		    'curriculum' => @$values['curriculum'],
		    'inspection_rating' => @$values['inspection_rating'],
		    'availability' => @$values['availability'],
		    'education_status' => @$values['status'],
		    'mobile' => @$values['mobile'],
		    'email' => @$values['email'],
		    'principal' => @$values['principal'],
		    'website' => @$values['website']
		);
		$query = $this->db->where('post_id',@$values['id'])->update('tbl_educations',$updateEducations);
		/*Start Image*/
		$this->db->where('post_id',@$values['id'])->update('tbl_post_images', array('main'=>0));
		$arr = explode('_',$this->input->post('image_main'));
		if($arr[0] == 'id')
		$this->db->where('id',$arr[1])->update('tbl_post_images', array('main'=>1));
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$values['id'],$values['main_image'],'real-estate-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if(@$values['image_delete']){
			$query = $this->db->select('image')->where_in('id', @$values['image_delete'])->get('tbl_post_images');
			$results = $query->result();
			if($results){
			foreach($results as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
			$this->db->where_in('id', @$values['image_delete'])->delete('tbl_post_images');
			}
		}

		if ($this->db->trans_status() === TRUE)
		{
		  return true;     
		}else{
		  return false; 
		}
	}

	/*Service start*/
	function insertServices(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Services',
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['phone'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
			'user_id' => $values['userid'],
			'featured' => @$values['featured'],	
			'ad_type' => @$values['ad_type'],
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'services-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertServices = array(
		    'post_id' => @$post_id,
		    'category' => @$values['category'],
		    'phone' => @$values['phone'],
		    'fax' => @$values['fax'],
		    'email' => @$values['email'],
		    'website' => @$values['website']
		);
		$query = $this->db->insert('tbl_services', $insertServices);
		return $post_id;
	}
	function updateServices(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->trans_start();
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['phone'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
			'featured' => @$values['featured'],	
			'ad_type' => @$values['ad_type'],
			'added_by' => $userdata['id'],
			'status' => 1,
			'updated_date' => $now,
			'status' => $values['status']
		);
		if($values['country']){
        	$updateData['country'] =$values['country'];
        }
		if($values['location']){
        	$updateData['location'] =$values['location'];
        }
        if($values['area']){
        	$updateData['area'] =$values['area'];
        }
		$query = $this->db->where('id',@$values['id'])->update('tbl_postings', $updateData);
		$updateServices = array(
		    'post_id' => @$post_id,
		    'category' => @$values['category'],
		    'phone' => @$values['phone'],
		    'fax' => @$values['fax'],
		    'email' => @$values['email'],
		    'website' => @$values['website']
		);
		$query = $this->db->where('post_id',@$values['id'])->update('tbl_services',$updateServices);
		/*Start Image*/
		$this->db->where('post_id',@$values['id'])->update('tbl_post_images', array('main'=>0));
		$arr = explode('_',$this->input->post('image_main'));
		if($arr[0] == 'id')
		$this->db->where('id',$arr[1])->update('tbl_post_images', array('main'=>1));
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$values['id'],$values['main_image'],'real-estate-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if(@$values['image_delete']){
			$query = $this->db->select('image')->where_in('id', @$values['image_delete'])->get('tbl_post_images');
			$results = $query->result();
			if($results){
			foreach($results as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
			$this->db->where_in('id', @$values['image_delete'])->delete('tbl_post_images');
			}
		}

		if ($this->db->trans_status() === TRUE)
		{
		  return true;     
		}else{
		  return false; 
		}
	}

	/*Healthcare start*/
	function insertHealthcare(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Health Care',
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['phone'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
			'user_id' => $values['userid'],
			'featured' => @$values['featured'],	
			'ad_type' => @$values['ad_type'],
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'services-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertHealthcare = array(
		    'post_id' => @$post_id,
		    'category' => @$values['category'],
		    'phone' => @$values['phone'],
		    'fax' => @$values['fax'],
		    'email' => @$values['email'],
		    'website' => @$values['website']
		);
		$query = $this->db->insert('tbl_healthcare', $insertHealthcare);
		return $post_id;
	}
	function updateHealthcare(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->trans_start();
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['phone'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
			'featured' => @$values['featured'],	
			'ad_type' => @$values['ad_type'],
			'added_by' => $userdata['id'],
			'status' => 1,
			'updated_date' => $now,
			'status' => $values['status']
		);
		if($values['country']){
        	$updateData['country'] =$values['country'];
        }
		if($values['location']){
        	$updateData['location'] =$values['location'];
        }
        if($values['area']){
        	$updateData['area'] =$values['area'];
        }
		$query = $this->db->where('id',@$values['id'])->update('tbl_postings', $updateData);
		$updateHealthcare = array(
		    'post_id' => @$post_id,
		    'category' => @$values['category'],
		    'phone' => @$values['phone'],
		    'fax' => @$values['fax'],
		    'email' => @$values['email'],
		    'website' => @$values['website']
		);
		$query = $this->db->where('post_id',@$values['id'])->update('tbl_healthcare',$updateHealthcare);
		/*Start Image*/
		$this->db->where('post_id',@$values['id'])->update('tbl_post_images', array('main'=>0));
		$arr = explode('_',$this->input->post('image_main'));
		if($arr[0] == 'id')
		$this->db->where('id',$arr[1])->update('tbl_post_images', array('main'=>1));
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$values['id'],$values['main_image'],'real-estate-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if(@$values['image_delete']){
			$query = $this->db->select('image')->where_in('id', @$values['image_delete'])->get('tbl_post_images');
			$results = $query->result();
			if($results){
			foreach($results as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
			$this->db->where_in('id', @$values['image_delete'])->delete('tbl_post_images');
			}
		}

		if ($this->db->trans_status() === TRUE)
		{
		  return true;     
		}else{
		  return false; 
		}
	}

	/*Women & beauty start*/
	function insertWomenbeauty(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => 'Women & Beauty',
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['phone'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
			'user_id' => $values['userid'],
			'featured' => @$values['featured'],	
			'ad_type' => @$values['ad_type'],
			'added_by' => $userdata['id'],
			'added_date' => $now,
			'updated_date' => $now,
			'status' => 1
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'services-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertWomenbeauty = array(
		    'post_id' => @$post_id,
		    'category' => @$values['category'],
		    'phone' => @$values['phone'],
		    'fax' => @$values['fax'],
		    'email' => @$values['email'],
		    'website' => @$values['website']
		);
		$query = $this->db->insert('tbl_womenbeauty', $insertWomenbeauty);
		return $post_id;
	}
	function updateWomenbeauty(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_admin_userdata');
		$this->db->trans_start();
		$now = date('Y-m-d H:i:s');
		$updateData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['phone'],
		    'email' => @$values['email'],
		    'ad_type' => @$values['ad_type'],
			'featured' => @$values['featured'],	
			'ad_type' => @$values['ad_type'],
			'added_by' => $userdata['id'],
			'status' => 1,
			'updated_date' => $now,
			'status' => $values['status']
		);
		if($values['country']){
        	$updateData['country'] =$values['country'];
        }
		if($values['location']){
        	$updateData['location'] =$values['location'];
        }
        if($values['area']){
        	$updateData['area'] =$values['area'];
        }
		$query = $this->db->where('id',@$values['id'])->update('tbl_postings', $updateData);
		$updateWomenbeauty = array(
		    'post_id' => @$post_id,
		    'category' => @$values['category'],
		    'phone' => @$values['phone'],
		    'fax' => @$values['fax'],
		    'email' => @$values['email'],
		    'website' => @$values['website']
		);
		$query = $this->db->where('post_id',@$values['id'])->update('tbl_womenbeauty',$updateWomenbeauty);
		/*Start Image*/
		$this->db->where('post_id',@$values['id'])->update('tbl_post_images', array('main'=>0));
		$arr = explode('_',$this->input->post('image_main'));
		if($arr[0] == 'id')
		$this->db->where('id',$arr[1])->update('tbl_post_images', array('main'=>1));
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$values['id'],$values['main_image'],'real-estate-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		if(@$values['image_delete']){
			$query = $this->db->select('image')->where_in('id', @$values['image_delete'])->get('tbl_post_images');
			$results = $query->result();
			if($results){
			foreach($results as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
			$this->db->where_in('id', @$values['image_delete'])->delete('tbl_post_images');
			}
		}

		if ($this->db->trans_status() === TRUE)
		{
		  return true;     
		}else{
		  return false; 
		}
	}


	function getAutoCategory($id = NULL){
		$query = $this->db->select('*')->where(array('subcategory <>'=> '','parent_id'=> $id))->order_by('subcategory', 'asc')->get('tbl_auto_category');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getAutoCategoryDetails($id = NULL){
		$query = $this->db->select('*')->where(array('id'=> $id))->get('tbl_auto_category');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getClassifiedsCategory($id = NULL){
		$query = $this->db->select('*')->where(array('subcategory <>'=> '','parent_id'=> $id))->order_by('subcategory', 'asc')->get('tbl_classifieds_category');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getClassifiedsSubCategory($id = NULL){
		$query = $this->db->select('*')->where(array('id'=> $id))->get('tbl_classifieds_category');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getElectronicsCategory($id = NULL){
		$query = $this->db->select('*')->where(array('id'=> $id))->order_by('category', 'asc')->get('tbl_electronics_category');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getElectronicsSubCategory($id = NULL){
		$query = $this->db->select('*')->where(array('subcategory <>'=> '','parent_id'=> $id))->order_by('subcategory', 'asc')->get('tbl_electronics_category');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getComputersCategory($id = NULL){
		$query = $this->db->select('*')->where(array('category <>'=> '','id'=> $id))->order_by('category', 'asc')->get('tbl_computer_categories');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getComputersSubCategory($id = NULL){
		$query = $this->db->select('*')->where(array('subcategory <>'=> '','parent_id'=> $id))->order_by('subcategory', 'asc')->get('tbl_computer_categories');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getRealEstateCategory($id = NULL){
		$query = $this->db->select('*')->where(array('subcategory <>'=> '','parent_id'=> $id))->order_by('subcategory', 'asc')->get('tbl_realestate_category');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getAutoModel($id = NULL){
		$query = $this->db->select('*')->where(array('subcategory <>'=> '','parent_id'=> $id))->order_by('subcategory', 'asc')->get('tbl_auto_category');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function get_location($id = NULL){
		$query = $this->db->select('*')->where(array('location <>'=> '','parent_id'=> $id))->order_by('location', 'asc')->get('tbl_countries');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getLocation($id = NULL){
		$query = $this->db->select('*')->where(array('id'=> $id))->get('tbl_countries');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getPosition($id = NULL){
		$query = $this->db->select('*')->where(array('id'=> $id))->get('tbl_jobs_positions');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getIndustry($id = NULL){
		$query = $this->db->select('*')->where(array('id'=> $id))->get('tbl_industry');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getNationality($id = NULL){
		$query = $this->db->select('*')->where(array('id'=> $id))->get('tbl_nationality');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getBrand($id = NULL){
		$query = $this->db->select('*')->where(array('id'=> $id))->get('tbl_brands');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getCurrency($code = NULL){
		$query = $this->db->select('*')->where(array('code'=> $code))->get('tbl_countries');
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getMainImage($id = NULL){
        $query = $this->db->select('image')->where(array('post_id'=>$id, 'main'=>1))->get('tbl_post_images');
			return ($query->num_rows()) ? $query->row() : false;
	}
	function getTrashList($limit = NULL, $offset = NULL, $category = NULL){
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_realestate AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate_category AS c', 'b.property_type = c.id', 'left');
		$query = $this->db->where(array('a.status'=>4))->limit($limit,$offset)->order_by('a.updated_date', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getTrashCount(){
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_realestate AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate_category AS c', 'b.property_type = c.id', 'left');
		$count = $this->db->where(array('a.status'=>4))->from('tbl_postings as a')->count_all_results();
		return $count;
	}
	function recoverTash($id){
		$updateStatus = array('status' => 1);
		$query = $this->db->where('id',$id)->update('tbl_postings', $updateStatus);
		return $query;
	}
	function deleteTrashAds(){
		$values = $this->security->xss_clean($this->input->post());
		$delete = $this->db->select('image')->where('post_id', $values['id'])->get('tbl_post_images')->result();
		if($delete){
			foreach($delete as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
		$this->db->where('post_id',$values['id'])->delete('tbl_post_images');
		}
		$this->db->where('post_id',$values['id'])->delete('tbl_property_amenities_added');
		$this->db->where('post_id',$values['id'])->delete('tbl_realestate');
		$this->db->where('post_id',$values['id'])->delete('tbl_auto');
		$this->db->where('post_id',$values['id'])->delete('tbl_auto_features_added');
		$this->db->where('post_id',$values['id'])->delete('tbl_classifieds');
		$this->db->where('post_id',$values['id'])->delete('tbl_computers');
		$this->db->where('post_id',$values['id'])->delete('tbl_educations');
		$this->db->where('post_id',$values['id'])->delete('tbl_electronics');
		$this->db->where('post_id',$values['id'])->delete('tbl_favorites');
		$this->db->where('post_id',$values['id'])->delete('tbl_healthcare');
		$this->db->where('post_id',$values['id'])->delete('tbl_house_maids');
		$this->db->where('post_id',$values['id'])->delete('tbl_jobs');
		$this->db->where('post_id',$values['id'])->delete('tbl_phones');
		$this->db->where('post_id',$values['id'])->delete('tbl_services');
		$this->db->where('post_id',$values['id'])->delete('tbl_womenbeauty');	
		$res=$this->db->where('id',$values['id'])->delete('tbl_postings');
		if($res){
			return true;
		}else{
			return false;
		}		
	}
	function deleteAllTrashAds(){
		$values = $this->security->xss_clean($this->input->post());
		$delete = $this->db->select('image')->where_in('post_id', $values['ids'])->get('tbl_post_images')->result();
		if($delete){
			foreach($delete as $val){
				unlink('uploads/images/'.$val->image);
				unlink('uploads/images/thumb/'.$val->image);
				unlink('uploads/images/thumbnail/'.$val->image);
			}
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_post_images');
		}
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_property_amenities_added');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_realestate');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_auto');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_auto_features_added');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_classifieds');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_computers');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_educations');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_electronics');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_favorites');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_healthcare');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_house_maids');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_jobs');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_phones');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_services');
		$this->db->where_in('post_id',$values['ids'])->delete('tbl_womenbeauty');	
		$res=$this->db->where_in('id',$values['ids'])->delete('tbl_postings');
		if($res){
			return true;
		}else{
			return false;
		}		
	}
	function changeAdsStatus(){
		$id = $this->input->get('id');
		$status = $this->input->get('status');
		$updateStatus = array('status' => $status);
		$query = $this->db->where('id',$id)->update('tbl_postings', $updateStatus);
		if($query){
			return true;
		}else{
			return false;
		}
	}
	function changeUserStatus(){
		$id = $this->input->get('id');
		$status = $this->input->get('status');
		$updateStatus = array('status' => $status);
		$query = $this->db->where('id',$id)->update('tbl_users', $updateStatus);
		if($query){
			return true;
		}else{
			return false;
		}
	}
}
?>