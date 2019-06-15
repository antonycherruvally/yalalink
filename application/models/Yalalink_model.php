<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Yalalink_model extends CI_Model{
	
	protected $lastCountry;

	/**
	 *	get special ads
	 */
	public function getSpecialAds() {
		$cId = Core::getHelper('location')->getCurrentCountry();
		$sql = 'SELECT * 
				from tbl_postings 
				where main_category <> "Education" 
				and "main_category" <> "Jobs"
				and "main_category" <> "Health Care"
				and "main_category" <> "Classifieds"
				and "main_category" <> "Computers"
				and "main_category" <> "Women & Beauty"
				and ad_type="special_offers" 
				and country="$cId->id" 
				and status <> "0" 
				ORDER BY updated_date DESC
				LIMIT 11';
		$query = $this->db->query($sql);
		return $query->result();
	}

	/**
	 *	Get the latest post
	 */
	public function getLatestAds() {
		return $ads = $this->getAds( ['Real Estate', 'Auto'], 'special_offers' );
	}

	/**
	 *	Get Ads base on the paramaters given
	 *	@param string $tpye
	 *	@param int $country
	 *	@param int $limit
	 *	@return $ads
	 */
	public function getAds( $category = [], $type, $country = false, $limit = 11 ) {
		# available categories
		$cats = [
			'Education',
			'Jobs',
			'Health Care',
			'Classifieds',
			'Computers',
			'Women & Beauty',
			'Real Estate',
			'Auto',
			'Phones',
			'Electronics',
			'Housemaids'
		];
		$sql = 'SELECT *  from tbl_postings where ';

		# itirate to banned categories
		# this is in hope that the query speed will be better
		foreach( $cats as $cat ) {
			++$c;
			# exclude needed categories
			if( in_array($cat, $category) ) {
				continue;
			}
			if( $c and $c > 1 ) {
				$sql .= ' and main_category <> "' . $cat . '"';
			}else{
				$sql .= 'main_category <> ' . $cat . '"';
			}
		}

		# if the country is false then we will just use
		# the current user country
		if(! $country ) {
			$country = Core::getHelper('location')->getCurrentCountry();
		}

		# add some stuffs.
		$sql .= ' and ad_type = ' . $type;
		$sql .= ' and country = ' . $country->id;
		$sql .= ' and status <> 4';
		$sql .= ' and status <> 0';
		$sql .= ' ORDER BY updated_date DESC';
		$sql .= ' LIMIT ' . $limit;
		$query = $this->db->query($sql);
		Core::log( $query, 1 );
		return $query->result();
	}


	/**
	 *	get latest postings from each countries
	 */
	public function getLatestCountryPostings() {
		$db = $this->db;
		$query = $db->select('id, DISTINCT(country)')
			->where([
				'country !=' => 0,
				'country !=' => "",
			])
			->get('tbl_postings');
		Core::log( $query->result() );
	}
	
	/**
	 *	Add Likes to postings
	 *	@author Ramon Alexis Celis
	 *	@since 9.24.18
	 *	@param array $data
	 *	@return int $likes
	 */
	public function likes( $data ) {
		$db = $this->db;
		if( $data['likes'] == "add" ) {
			$query = $db->select('likes')
				->from('tbl_postings')
				->where('id', $data['id'])
				->get();
			$res = ($query->num_rows() > 0) ? $query->result() : false;

			if( $res ) {
				$base = $res[0]->likes + 1;
				$nLikes = $db->where('id', $data['id'])
					->update('tbl_postings', ['likes' => $base]);
				Core::response($base);
			}else{
				Core::response([
					'status' => 'error',
					'message' => 'Invalid action.'
				]);
			}
			
		}
	}

	/**
	 *	Get posting details based on category
	 *	@author Ramon Alexis Celis
	 *	@since 9.24.18
	 *	@param int $id
	 *	@return obj
	 */
	public function getAdData( $id, $category, $country ) {
		$db = $this->db;
		
	}

	function validateEmail(){
		$values = $this->security->xss_clean($this->input->post());
		$count = $this->db->where(array('email' => @$values['email'],'user_type' => 'website'))->from('tbl_users')->count_all_results();
        return ($count > 0) ? false : true;
	}
	function checkEmail($email){
		$count = $this->db->where(array('email' => $email,'status !=' => 4))->from('tbl_users')->count_all_results();
        return ($count > 0) ? true : false;
	}
	function checkStatus($email){
		$count = $this->db->where(array('email' => $email, 'status' => 1))->from('tbl_users')->count_all_results();
        return ($count > 0) ? true : false;
	}
	public function facebook_time_ago($timestamp) {  
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "one minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "an hour ago";  
     }  
           else  
           {  
       return "$hours hrs ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return date("jS F Y", strtotime($timestamp));//"a week ago";  
     }  
           else  
           {  
       return date("jS F Y", strtotime($timestamp));//"$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return date("jS F Y", strtotime($timestamp));//"a month ago";  
     }  
           else  
           {  
       return date("jS F Y", strtotime($timestamp));//"$months months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return date("jS F Y", strtotime($timestamp));//"one year ago";  
     }  
           else  
           {  
       return date("jS F Y", strtotime($timestamp));//"$years years ago";  
     }  
   }  
 } 
	function getSessionUsers(){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$this->load->library('user_agent');
				if ($this->agent->is_browser())
				{
						$agent = $this->agent->browser().' '.$this->agent->version();
				}
				elseif ($this->agent->is_robot())
				{
						$agent = $this->agent->robot();
				}
				elseif ($this->agent->is_mobile())
				{
						$agent = $this->agent->mobile();
				}
	$query = $this->db->select('*')->where(array('user_agent'=>$_SERVER['HTTP_USER_AGENT']))->or_where(array('user_data'=>$agent))->order_by('id', 'desc')->get('tbl_ci_sessions');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function insertUser(){
		$values = $this->security->xss_clean($this->input->post());
		$now = date('Y-m-d H:i:s');
		$select = $this->db->where(array('email' => @$values['email'],'user_type' => 'website'))->get('tbl_users');
		
		if($select->num_rows()==0){
		$mob = ltrim($values['mobile'], '0');
		$insertData = array(
		    'first_name' => @$values['first_name'],	
		    'last_name' => @$values['last_name'],
			'email' => @$values['email1'],	
		    'password' => $this->encrypt->encode(@$values['reg_password']),
			'area_code' => '+'.@$values['country_code'],
			'mobile' => @$mob,
			'user_type' => 'website',
			'added_date' => $now,
			'updated_date' => $now	
		);
		//print_r($insertData);
		$query = $this->db->insert('tbl_users', $insertData);
	
		$user_id = $this->db->insert_id();
		
		if($values['newsletter']){
		$insertData = array(
		    'user_id' => @$user_id,	
			'added_date' => $now
		);
		$query = $this->db->insert('tbl_newsletters', $insertData);
		}
		return $user_id;
		}else{
			return false; 
		}

	}
	function insertReply(){
		$values = $this->security->xss_clean($this->input->post());
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'post_id' => @$values['postid'],	
		    'userid' => @$values['userid'],
			'name' => @$values['name'],	
			'phone' => @$values['phone'],
			'email' => @$values['email'],
			'message' => @$values['message'],
			'added_date' => $now,
		);
		$query = $this->db->insert('tbl_post_reply', $insertData);
		$id = $this->db->insert_id();
		return $id;
	}
	function InsertCount(){
		$values = $this->security->xss_clean($this->input->post());
		$now = date('Y-m-d H:i:s');
        $query = $this->db->select('website_count')->where(array('id' => 1))->get('tbl_website_details');
        if($query->num_rows() == 1){
		$result = $query->row();
		$count = $result->website_count+1;
		$insertData = array(
		    'website_count' => @$count
		);
		$query = $this->db->where('id',1)->update('tbl_website_details', $insertData);
		}
		return true;
	}
	function updateprofile(){
		$values = $this->security->xss_clean($this->input->post());
		$now = date('Y-m-d H:i:s');
		$mob = ltrim($values['mobile'], '0');
		$insertData = array(
		    'first_name' => @$values['first_name'],	
		    'last_name' => @$values['last_name'],
			'area_code' => '+'.@$values['country_code'],
			'mobile' => @$mob,
		    'gender' => @$values['gender'],
		    'position' => @$values['position'],
		    'company_name' => @$values['company'],
		    'website' => @$values['website'],
		    'nationality' => @$values['nationality'],
		    'country' => @$values['country'],
		    'visa' => @$values['visa_status'],
			'updated_date' => $now	
		);
		$query = $this->db->where('id',$values['id'],'user_type','website')->update('tbl_users', $insertData);
		$image = @$_FILES['image'];
		if($image['size'] > 0){
			$delete = $this->db->select('*')->where(array('id' => $values['id'], 'user_type' => 'website'))->get('tbl_users')->row();
			if($delete){
			unlink('uploads/users/'.$delete->image);
			unlink('uploads/users/thumb/'.$delete->image);
			}
			$image = $this->profile_image('image', $image);
			$insertImage = array('image' => $image);
			$query = $this->db->where('id',$values['id'],'user_type','website')->update('tbl_users', $insertImage);
		}
		return true;
	}
	function getUserPosts($limit = NULL, $offset = NULL){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$this->db->select('*',FALSE);
		$query = $this->db->where(array('user_id'=>$userdata['userid']))->limit($limit,$offset)->order_by('id', 'desc')->get('tbl_postings');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getUserPostsCount(){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$this->db->select('*',FALSE);
		$count = $this->db->where(array('user_id'=>$userdata['userid']))->from('tbl_postings')->count_all_results();
		return $count;
	}
	function getUserFav($limit = NULL, $offset = NULL){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_favorites AS b', 'a.id = b.post_id', 'left');
		$query = $this->db->where(array('b.user_id'=>8))->limit($limit,$offset)->order_by('a.id', 'desc')->get('tbl_postings as a');
        return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getUserFavCount(){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$this->db->select('a.*',FALSE);
		$this->db->join('tbl_favorites AS b', 'a.id = b.post_id', 'left');
		$count = $this->db->where(array('b.user_id'=>$userdata['userid']))->from('tbl_postings as a')->count_all_results();
		return $count;
	}
	function profile_image($fieldName = NULL, $file = NULL){
		$_FILES = array();
		$this->load->library('upload');
		$this->load->library('image_lib');
		$tmp = explode('.', $file['name']);
		$ext = end($tmp);
		$values = $this->security->xss_clean($this->input->post());
		$string = str_replace(' ', '-', strtolower(substr($values['first_name'].$values['last_name'], 0, 100))); // Replaces all spaces with hyphens.
   		$string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string);
		$name = url_title(@$string);
		$name = 'yalalink-user-'.$name.'-';
		$filename = $name.'_'.$this->generateName().'.'.$ext;
		$_FILES[$fieldName]['name']= $filename;
		$_FILES[$fieldName]['type']= $file['type'];
		$_FILES[$fieldName]['tmp_name']= $file['tmp_name'];
		$_FILES[$fieldName]['error']= $file['error'];
		$_FILES[$fieldName]['size']= $file['size']; 
		$this->upload->initialize($this->set_profile_image_upload_options());
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
	function ActivateUser($id = NULL, $authcode = NULL){
		$insertData = array(
			'status' => 1	
		);
		$query = $this->db->where(array('id'=>$id,'authcode'=>$authcode,'user_type' => 'website'))->update('tbl_users', $insertData);
		return true;
	}
	function loginValidate($email = NULL,$password = NULL){
		$values = $this->security->xss_clean($this->input->post());
        $query = $this->db->select('id,password,email,image,first_name,last_name')->where(array('email' => $email,'status' => 1))->get('tbl_users');
        if($query->num_rows() == 1){
            $row = $query->row();
			$decoded_pass = $this->encrypt->decode($row->password);
			if($password == $decoded_pass){
				$now = date('Y-m-d H:i:s');
				$this->load->library('user_agent');
				if ($this->agent->is_browser())
				{
						$agent = $this->agent->browser().' '.$this->agent->version();
				}
				elseif ($this->agent->is_robot())
				{
						$agent = $this->agent->robot();
				}
				elseif ($this->agent->is_mobile())
				{
						$agent = $this->agent->mobile();
				}
				$sessionid = $row->id.$row->email.rand(1, 100000);
				$userdata['logged_yalalink_userdata'] = array(
					'userid' => $row->id,
					'email' => $row->email,
					'name' => $row->first_name.' '.$row->last_name,
					'image' => $row->image,              
					'validated' => true,
					'user_logged_in' => true,
					'session_id' => md5($sessionid),
					'ip_address' => $this->input->ip_address(),
					'user_agent' => $_SERVER['HTTP_USER_AGENT'],
					'user_data' => $agent,
					'last_activity' => $now,
				);
				$updateSession = array('user_logged_in' => 0);
			    $query = $this->db->where(array('userid'=>$row->id,'user_data'=>$agent,'user_agent'=>$_SERVER['HTTP_USER_AGENT']))->update('tbl_ci_sessions', $updateSession);
				$query = $this->db->insert('tbl_ci_sessions', $userdata['logged_yalalink_userdata']);
				$this->session->set_userdata($userdata);
				return true;
			}
        }
        return false;
	}
	function updateUserSignout(){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$updateSession = array('user_logged_in' => 0,'login_date' => $now);
		$query = $this->db->where('session_id',$userdata['session_id'])->update('tbl_ci_sessions', $updateSession);
	}
	function getFeatures($id = NULL){
		$query = $this->db->select('a.*,b.name')->join('tbl_auto_features AS b', 'a.features_id = b.id', 'left')->where('a.post_id',$id)->get('tbl_auto_features_added as a');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getUserDetails($id = NULL){
		$values = $this->security->xss_clean($this->input->post());
		$query = $this->db->select('*')->where(array('id' => @$id))->get('tbl_users');
			return ($query->num_rows()) ? $query->row() : false;
	}
	function getPostDetails($id = NULL){
		$values = $this->security->xss_clean($this->input->post());
		$query = $this->db->select('*')->where(array('id' => @$id))->get('tbl_postings');
			return ($query->num_rows()) ? $query->row() : false;
	}
	function getDetails($id = NULL, $category = NULL){
		$values = $this->security->xss_clean($this->input->post());
		if($category=='Real Estate'){
		$query = $this->db->select('*',FALSE)->where(array('post_id' => @$id))->get('tbl_realestate');
		}elseif($category=='Jobs'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_jobs');
		}elseif($category=='Auto'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_auto');
		}elseif($category=='Classifieds'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_classifieds');
		}elseif($category=='Health Care'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_healthcare');
		}elseif($category=='Women Beauty'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_womenbeauty');
		}elseif($category=='House Maids'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_house_maids');
		}elseif($category=='Phones'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_phones');
		}elseif($category=='Electronics'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_electronics');
		}elseif($category=='Computers'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_computers');
		}elseif($category=='Education'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_educations');
		}elseif($category=='Services'){
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_services');
		}
		return ($query->num_rows()) ? $query->row() : false;
	}
	function getAmenities($id = NULL){
		$query = $this->db->select('a.*,b.name')->join('tbl_property_amenities AS b', 'a.amenity_id = b.id', 'left')->where('a.post_id',$id)->get('tbl_property_amenities_added as a');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getImages($id = NULL){
		$values = $this->security->xss_clean($this->input->post());
		$query = $this->db->select('*')->where(array('post_id' => @$id))->get('tbl_post_images');
			return ($query->num_rows()) ? $query->result() : false;
	}
	function getEmailDetails($email = NULL){
		$values = $this->security->xss_clean($this->input->post());
		$query = $this->db->select('*')->where(array('email' => @$email))->get('tbl_users');
			return ($query->num_rows()) ? $query->row() : false;
	}
	public function makeLinks($str) {
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		$urls = array();
		$urlsToReplace = array();
		if(preg_match_all($reg_exUrl, $str, $urls)) {
			$numOfMatches = count($urls[0]);
			$numOfUrlsToReplace = 0;
			for($i=0; $i<$numOfMatches; $i++) {
				$alreadyAdded = false;
				$numOfUrlsToReplace = count($urlsToReplace);
				for($j=0; $j<$numOfUrlsToReplace; $j++) {
					if($urlsToReplace[$j] == $urls[0][$i]) {
						$alreadyAdded = true;
					}
				}
				if(!$alreadyAdded) {
					array_push($urlsToReplace, $urls[0][$i]);
				}
			}
			$numOfUrlsToReplace = count($urlsToReplace);
			for($i=0; $i<$numOfUrlsToReplace; $i++) {
				$str = str_replace($urlsToReplace[$i], "<a class=\"post-title-link\" target=\"_blank\" href=\"".$urlsToReplace[$i]."\">".$urlsToReplace[$i]."</a> ", $str);
			}
			return $str;
		} else {
			return $str;
		}
	}
	function deletePost(){
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
			return $values['url'];
		}else{
			return false;
		}		
		
	}
	function insertRealestate(){
		
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
			'user_id' => $userdata['userid'],	
			'added_date' => $now,
			'updated_date' => $now	
		);
		
		$query = $this->db->insert('tbl_postings', $insertData);
		
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		//print_r($image);
		if($image['size'][0] > 0){
			//echo "hii";
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'real-estate-');
			
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertRealestate = array(
		    'post_id' => @$post_id,
		    'purpose' => @$values['purpose'],
		    'property_type' => @$values['property_type'],
		    'year' => @$values['year'],
		    'size' => @$values['size'],
		    'bedroom' => @$values['bedroom'],
		    'bathroom' => @$values['bathroom'],
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
	function updateRealestate(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],	
			'updated_date' => $now	
		);
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
		    'bedroom' => @$values['bedroom'],
		    'bathroom' => @$values['bathroom'],
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
		return $values['id'];
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
			
			// $exif = exif_read_data($config_thumbnail['source_image']);
			// if($exif && isset($exif['Orientation']))
			// {
			// 	$ort = $exif['Orientation'];
			 
			// 	if ($ort == 6 || $ort == 5)
			// 		$config_thumbnail['rotation_angle'] = '270';
			// 	if ($ort == 3 || $ort == 4)
			// 		$config_thumbnail['rotation_angle'] = '180';
			// 	if ($ort == 8 || $ort == 7)
			// 		$config_thumbnail['rotation_angle'] = '90';
			// }
			 
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
		$string = str_replace(' ', '-', strtolower(substr($values['title'], 0, 100))); // Replaces all spaces with hyphens.
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
			/*$config['image_library'] = 'gd2';
			$config['source_image'] = 'uploads/images/'.$filename;
			$config['wm_type'] = 'overlay';
			$config['wm_overlay_path'] = 'assets/front_end/images/watermark.png';
			$config['wm_opacity'] = 10;
			$config['wm_vrt_alignment'] = 'middle';
			$this->image_lib->initialize($config);
			$this->image_lib->watermark();*/
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
	private function set_user_image_upload_options(){
		$config = array();
		$config['upload_path'] = 'uploads/images/';
		$config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG|JPEG';
		$config['max_size']	= '50000000';
		$config['overwrite']     = FALSE;
		return $config;
	}
	private function set_profile_image_upload_options(){
		$config = array();
		$config['upload_path'] = 'uploads/users/';
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
	function insertJobs(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$nationality = implode(', ', $values['nationality']);
		//echo $values['country'].$values['salary']; exit;
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
			'user_id' => $userdata['userid'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],	
			'added_date' => $now,
			'updated_date' => $now	
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
			$query = $this->db->where('id',$userdata['userid'])->update('tbl_users', $updateCv);
		}
		return $post_id;
	}
	function updateJobs(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$nationality = implode(', ', $values['nationality']);
		//echo $values['country'].$values['salary']; exit;
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
			'user_id' => $userdata['userid'],
			'updated_date' => $now	
		);
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
			$query = $this->db->select('user_cv')->where_in('id', @$userdata['userid'])->get('tbl_users');
			$results = $query->row();
			if($results){
				unlink('uploads/user-cv/'.$results->cv);
			}
			$cv = $this->user_cv('user_cv', $cv);
			$updateCv = array('cv' => $cv);
			$query = $this->db->where('id',$userdata['userid'])->update('tbl_users', $updateCv);
		}
		return $values['id'];
	}
	function insertAuto(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
			'user_id' => $userdata['userid'],	
			'price' =>preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
			'added_date' => $now,
			'updated_date' => $now	
		);
		
		$query = $this->db->insert('tbl_postings', $insertData);
		
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			if(! isset($values['main_image']) ) {
				$values['main_image'] = $values['realMainImage'];
			}
			echo "hiii";
			print_r($values['main_image']);
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
			'usage' => @$values['usage'],
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
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
			'user_id' => $userdata['userid'],
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
			'updated_date' => $now
		);
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
		return $post_id;
	}
	function insertClassifieds(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
			'user_id' => $userdata['userid'],	
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
			'added_date' => $now,
			'updated_date' => $now	
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
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
			'updated_date' => $now	
		);
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
		$insertClassifieds = array(
		    'category' => @$values['category'],
		    'subcategory' => @$values['subcategory']
		);
		$query = $this->db->where('post_id',$values['id'])->update('tbl_classifieds', $insertClassifieds);
		return true;
	}
	function insertHouseMaids(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['mobile'],
		    'email' => @$values['email'],
			'user_id' => $userdata['userid'],	
			'added_date' => $now,
			'updated_date' => $now	
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
	function updateHouseMaids(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['mobile'],
		    'email' => @$values['email'],
			'updated_date' => $now	
		);
		$query = $this->db->where('id',$values['id'])->update('tbl_postings', $insertData);
		$insertHousemaids = array(
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
		$query = $this->db->where('post_id',$values['id'])->update('tbl_house_maids', $insertHousemaids);
		$image = @$_FILES['image'];
		$cv = @$_FILES['user_cv'];
		if($image['size'] > 0){
			$image = $this->user_image('image', $image);
			$insertImage = array('image' => $image,'main'=>1,'post_id'=>$post_id);
			$query = $this->db->insert('tbl_post_images', $insertImage);
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
		if($cv['size'] > 0){
			$cv = $this->user_cv('user_cv', $cv);
			$updateCv = array('cv' => $cv);
			$query = $this->db->where('post_id',$post_id)->update('tbl_house_maids', $updateCv);
		}
		return $post_id;
	}
	function insertPhones(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
			'user_id' => $userdata['userid'],	
			'added_date' => $now,
			'updated_date' => $now	
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
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
			'updated_date' => $now	
		);
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
		$insertPhones = array(
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
		$query = $this->db->where('post_id',$values['id'])->update('tbl_phones', $insertPhones);
		return true;
	}
	function insertElectronics(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
			'user_id' => $userdata['userid'],	
			'added_date' => $now,
			'updated_date' => $now	
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
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
			'updated_date' => $now	
		);
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
		$insertElectronics = array(
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
		$query = $this->db->where('post_id',$values['id'])->update('tbl_electronics', $insertElectronics);
		return $post_id;
	}
	function insertComputers(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
			'user_id' => $userdata['userid'],	
			'added_date' => $now,
			'updated_date' => $now	
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
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['contact'],
		    'email' => @$values['email'],
			'updated_date' => $now	
		);
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
		$insertComputers = array(
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
		$query = $this->db->where('post_id',$values['id'])->update('tbl_computers', $insertComputers);
		return true;
	}
	function insertEducations(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['mobile'],
		    'email' => @$values['email'],
			'user_id' => $userdata['userid'],	
			'added_date' => $now,
			'updated_date' => $now	
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
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
		    'mobile' => @$values['mobile'],
		    'email' => @$values['email'],
			'updated_date' => $now	
		);
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
		$insertEducations = array(
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
		$query = $this->db->where('post_id',$values['id'])->update('tbl_educations', $insertEducations);
		return true;
	}
	function insertServices(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
			'user_id' => $userdata['userid'],	
			'added_date' => $now,
			'updated_date' => $now	
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
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
			'updated_date' => $now	
		);
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
		$insertServices = array(
		    'category' => @$values['category'],
		    'phone' => @$values['phone'],
		    'fax' => @$values['fax'],
		    'email' => @$values['email'],
		    'website' => @$values['website']
		);
		$query = $this->db->where('post_id',$values['id'])->update('tbl_services', $insertServices);
		return true;
	}
	function insertHealthcare(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
			'user_id' => $userdata['userid'],	
			'added_date' => $now,
			'updated_date' => $now	
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'healthcare-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertHealthcare = array(
		    'post_id' => @$post_id,
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
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
			'updated_date' => $now	
		);
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
		$insertHealthcare = array(
		    'phone' => @$values['phone'],
		    'fax' => @$values['fax'],
		    'email' => @$values['email'],
		    'website' => @$values['website']
		);
		$query = $this->db->where('post_id',$values['id'])->update('tbl_healthcare', $insertHealthcare);
		return true;
	}
	function insertWomenbeauty(){
		$values = $this->security->xss_clean($this->input->post());
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'main_category' => @$values['main_category'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'country' => @$values['country'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
			'user_id' => $userdata['userid'],	
			'added_date' => $now,
			'updated_date' => $now	
		);
		$query = $this->db->insert('tbl_postings', $insertData);
		$post_id = $this->db->insert_id();
		$image = @$_FILES['image'];
		if($image['size'][0] > 0){
			$insertImage = $this->multiple_image_upload('image',$image,$post_id,$values['main_image'],'womenbeauty-');
			$query = $this->db->insert_batch('tbl_post_images', $insertImage);
		}
		$insertWomenbeauty = array(
		    'post_id' => @$post_id,
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
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$now = date('Y-m-d H:i:s');
		$insertData = array(
		    'title_en' => @$values['title_en'],
		    'title_ar' => @$values['title_ar'],
		    'type' => @$values['type'],	
			'price' => preg_replace("/[^0-9\.]/", "",@$values['price']),
		    'description' => @$values['description'],
		    'location' => @$values['location'],
		    'area' => @$values['area'],
		    'latitude' => @$values['latitude'],
		    'longitude' => @$values['longitude'],
			'updated_date' => $now	
		);
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
		$insertWomenbeauty = array(
		    'phone' => @$values['phone'],
		    'fax' => @$values['fax'],
		    'email' => @$values['email'],
		    'website' => @$values['website']
		);
		$query = $this->db->where('post_id',$values['id'])->update('tbl_womenbeauty', $insertWomenbeauty);
		return true;
	}
	function setfavorites(){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$values = $this->security->xss_clean($this->input->post());
		$now = date('Y-m-d H:i:s');
		$insertData = array(
			'user_id' => $userdata['userid'],
			'post_id' => @$values['id'],
			'added_date' => $now
		);
		$query = $this->db->insert('tbl_favorites', $insertData);
		return true;
	}
	function unsetfavorites(){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$values = $this->security->xss_clean($this->input->post());
		$query = $this->db->where(array('user_id'=>$userdata['userid'], 'post_id'=>@$values['id']))->delete('tbl_favorites');
		return true;
	}
	function countfavorites($id = NULL){
		$this->db->where(array('post_id'=>$id));
		$count = $this->db->from('tbl_favorites')->count_all_results();
		return $count;
	}
	function checkfavorites($id = NULL){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$query = $this->db->select('*')->where(array('post_id'=>$id,'user_id'=>$userdata['userid']))->get('tbl_favorites');
		return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function getAutoCategory($id = NULL){
		$query = $this->db->select('*')->where(array('subcategory <>'=> '','parent_id'=> $id))->order_by('subcategory', 'asc')->get('tbl_auto_category');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getClassifiedsSubCategory($id = NULL){
		$query = $this->db->select('*')->where(array('subcategory <>'=> '','parent_id'=> $id))->order_by('subcategory', 'asc')->get('tbl_classifieds_category');
		return ($query->num_rows()) ? $query->result() : false;
	}
	function getElectronicsSubCategory($id = NULL){
		$query = $this->db->select('*')->where(array('subcategory <>'=> '','parent_id'=> $id))->order_by('subcategory', 'asc')->get('tbl_electronics_category');
		return ($query->num_rows()) ? $query->result() : false;
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
	function LatestPosts(){
		$country_code = $this->session->userdata('country_code');
		$shuffle_country =array('KW','AE','OM','SA');
		shuffle($shuffle_country);
		$c_code = $shuffle_country[0];
		
		if($c_code == $country_code)
		{
		$c_code = $shuffle_country[1];
		}
		
		$_SESSION["c_codefirst"] = $c_code;
		$query = $this->db->select('*')->where(array('code'=>$c_code))->get('tbl_countries');
		
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$query = $this->db->select('*')->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'main_category <>'=>'Jobs'))->order_by('id','DESC')->get('tbl_postings',5);
		return ($query->num_rows()) ? $query->result() : false;
	}
	function LatestPosts1(){
		$country_code = $this->session->userdata('country_code');
		$shuffle_country_next =array('SA','OM','AE','KW');
		shuffle($shuffle_country_next);
		$c_code1 = $shuffle_country_next[0];
		
		$c_codefirst = $_SESSION["c_codefirst"];
		
		if($c_codefirst == $c_code1)
		{
			$c_code1 = $shuffle_country_next[2];
			
		
		}
		if($c_code1 == $country_code)
		{
		$c_code1 = $shuffle_country_next[3];
		
		}
		
		
		$query1 = $this->db->select('*')->where(array('code'=>$c_code1))->get('tbl_countries');
		
		if($query1->num_rows()>0) {
			$c_code1 = $query1->row();
		}
		$query1 = $this->db->select('*')->where(array('status !='=>4,'status !='=>0,'country'=>$c_code1->id,'main_category <>'=>'Jobs'))->order_by('id','DESC')->get('tbl_postings',5);
		return ($query1->num_rows()) ? $query1->result() : false;
	}
	function LatestPosts_new(){
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		
		$this->db->select('a.*,b.year,b.horsepower,b.kilometers,b.color,b.body_type,b.regional_specs,b.horsepower,c.bathroom,c.bedroom,c.balcony,c.pool,c.garage,c.size',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate AS c', 'a.id = c.post_id', 'left');
		
		
		
		
		$query = $this->db->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'main_category <>'=>'Jobs'))->order_by('id','DESC')->get('tbl_postings AS a',11);
		return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function DealsPosts(){
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		
		$this->db->select('a.*,b.year,b.horsepower,b.kilometers,b.color,b.body_type,b.regional_specs,b.horsepower,c.bathroom,c.bedroom,c.balcony,c.pool,c.garage,c.size',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate AS c', 'a.id = c.post_id', 'left');
		
		
		$query = $this->db->where(array(
			'status !=' => 4,
			'status !=' => 0,
			'country' => $c_code->id,
			'ad_type' => 'hot_deals',
			'main_category !=' => 'Jobs',
		))
		->where('main_category', 'Auto')
		->or_where('main_category', 'Real Estate')
		->where('main_category !=', 'Services')
		->order_by('updated_date','DESC')->get('tbl_postings AS a',11);
		
		return ($query->num_rows() > 0) ? $query->result() : false;
	}
	
	function Dealsweek(){
		$this->db->cache_on();
		$date = Core::getHelper('date');
		$db = $this->db;
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		
		$this->db->select('a.*,b.year,b.horsepower,b.kilometers,b.color,b.body_type,b.regional_specs,b.horsepower,c.bathroom,c.bedroom,c.balcony,c.pool,c.garage,c.size',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate AS c', 'a.id = c.post_id', 'left');
		$query = $this->db->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'ad_type'=>'weakdeal'))->order_by('updated_date','DESC')->get('tbl_postings AS a',11);
		$res = ($query->num_rows()) ? $query->result() : false;
		$fdata = null;
		if( $res ) {
			// lets remove expire deals of the week
			foreach( $res as $rs ) {
				if( $date->timePassed($rs->updated_date, true)['days'] >= 7 ) {
					// change the ad_type back to normal
					$db->where('id', $rs->id)
						->update('tbl_postings', ['ad_type' => 'normal']);
					continue;
				}
				$fdata[] = $rs;
			}
			return $fdata;
		}
		$this->db->cache_off();
		return false;
		
	}
	function DealsPostshomefooter(){
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$query = $this->db->select('*')->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'ad_type'=>'hot_deals'))->order_by('updated_date','DESC')->get('tbl_postings',4);
		return ($query->num_rows()) ? $query->result() : false;
	}
	function SpecialPosts(){
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$query = $this->db->select('*')
		->where('main_category', 'Real Estate')
		->or_where('main_category', 'Auto')
		->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'ad_type'=>'special_offers'))->order_by('updated_date','DESC')->get('tbl_postings',11);
		return ($query->num_rows()) ? $query->result() : false;
	}
	function SpecialPostshomefooter(){
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$query = $this->db->select('*')->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'ad_type'=>'special_offers'))->order_by('updated_date','DESC')->get('tbl_postings',4);
		return ($query->num_rows()) ? $query->result() : false;
	}
	function DealsPostsPage($category){
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$query = $this->db->select('*')->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'ad_type'=>'hot_deals','main_category'=>$category))->limit(15,0)->order_by('updated_date','DESC')->get('tbl_postings',15);
		return ($query->num_rows()) ? $query->result() : false;
	}
	function rmCurrCountry( $code, $arr ) {
		foreach( $arr as $ar ) {
			if( $ar == $code ) {
				continue;
			}
			$newCode[] = $ar;
		}
		return $newCode;
	}
	function getLatestCountryBased( $c_code, $category = false, $exclude = false, $resLimit = 3 ) {
		$query = $this->db->select('*')->where(array('code'=>$c_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		if($exclude) {
			foreach( $exclude as $exk => $exv) {
				$this->db->where( $exk .' !=', $exv );
			}
			
		}
		if($category) {
			$this->db->where('main_category', $category);
		}
		$query = $this->db->select('*')
						->where([
							'title_en !=' 	=> '',
							'status !=' 	=> 4,
							'status !=' 	=> 0,
							'country !=' 	=> "",
							'country' 		=> $c_code->id
						])
						->order_by('id','DESC')
						->get('tbl_postings', $resLimit);
		
		return ($query->num_rows()) ? $query->result() : false;		
	}
	
	function countrylatest($category, $unique = false, $exclude = [], $resLimit = 3){
		$this->lastCountry++;
		$shuffle_country_next = array('SA','OM','AE','KW','BH');
		$shuffle_country_next = $this->rmCurrCountry($this->session->userdata('country_code'), $shuffle_country_next);
		if($unique) {
			if( $_SESSION['dcountries'] !== "" and count($_SESSION['dcountries']) > 0 ){
				foreach($_SESSION['dcountries'] as $dc) {
					$shuffle_country_next = $this->rmCurrCountry($dc, $shuffle_country_next);
				}
			}
		}

		shuffle($shuffle_country_next);
		$country_code = $shuffle_country_next[0];	
		$_SESSION["dcountries"][] = $country_code;
		if($this->lastCountry >= 3) {
			$_SESSION["dcountries"] = null;
		}
		return $this->getLatestCountryBased( $country_code, $category, $exclude = false, $resLimit );
	}
	

	function getMainImage($id = NULL){
        $query = $this->db->select('image')->where(array('post_id'=>$id, 'main'=>1))->get('tbl_post_images');
			return ($query->num_rows()) ? $query->row() : false;
	}
	function mostviewers(){
		
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*,b.year,b.horsepower,b.kilometers,b.color,b.body_type,b.regional_specs,b.horsepower,c.bathroom,c.bedroom,c.balcony,c.pool,c.garage,c.size',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate AS c', 'a.id = c.post_id', 'left');
		$this->db->where('main_category <>', 'Health Care');
		
		$query = $this->db->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'main_category <>'=>'Jobs' ))->order_by('featured','DESC')->get('tbl_postings AS a',4);
		return ($query->num_rows()) ? $query->result() : false;
	
	}
	function mostviewersreal(){
		
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*,b.year,b.horsepower,b.kilometers,b.color,b.body_type,b.regional_specs,b.horsepower,c.bathroom,c.bedroom,c.balcony,c.pool,c.garage,c.size',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate AS c', 'a.id = c.post_id', 'left');
		$query = $this->db->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'main_category'=>'Real Estate'))->order_by('featured','DESC')->get('tbl_postings AS a',4);
		return ($query->num_rows()) ? $query->result() : false;
	
	}
	function mostviewersauto(){
		
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*,b.year,b.horsepower,b.kilometers,b.color,b.body_type,b.regional_specs,b.horsepower,c.bathroom,c.bedroom,c.balcony,c.pool,c.garage,c.size',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate AS c', 'a.id = c.post_id', 'left');
		$query = $this->db->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'main_category'=>'Auto'))->order_by('featured','DESC')->get('tbl_postings AS a',4);
		return ($query->num_rows()) ? $query->result() : false;
	
	}
	function mostviewersphones(){
		
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$this->db->select('a.*,b.year,b.horsepower,b.kilometers,b.color,b.body_type,b.regional_specs,b.horsepower,c.bathroom,c.bedroom,c.balcony,c.pool,c.garage,c.size',FALSE);
		$this->db->join('tbl_auto AS b', 'a.id = b.post_id', 'left');
		$this->db->join('tbl_realestate AS c', 'a.id = c.post_id', 'left');
		$query = $this->db->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'main_category'=>'Phones'))->order_by('featured','DESC')->get('tbl_postings AS a',4);
		return ($query->num_rows()) ? $query->result() : false;
	
	}
	function SpecialPostsPage($category){
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$query = $this->db->select('*')->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'ad_type'=>'special_offers','main_category'=>$category))->limit(15,0)->order_by('updated_date','DESC')->get('tbl_postings',25);
		return ($query->num_rows()) ? $query->result() : false;
	}
	function SpecialPostsPage_similar($category){
		if($this->session->userdata('country_code')){
			$country_code = $this->session->userdata('country_code');
		}else{
			$country_code = 'AE';
		}
		$query = $this->db->select('*')->where(array('code'=>$country_code))->get('tbl_countries');
		if($query->num_rows()>0) {
			$c_code = $query->row();
		}
		$query = $this->db->select('*')->where(array('status !='=>4,'status !='=>0,'country'=>$c_code->id,'main_category'=>$category))->limit(15,0)->order_by('updated_date','DESC')->get('tbl_postings',25);
		return ($query->num_rows()) ? $query->result() : false;
	}
	
	/*function getImages($id = NULL){
        $query = $this->db->select('image')->where(array('post_id'=>$id))->order_by('main', 'DESC')->get('tbl_post_images');
			return ($query->num_rows()) ? $query->result() : false;
	}*/
}
?>