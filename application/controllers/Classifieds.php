<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Classifieds extends CI_Controller{
	public $websiteemail = 'info@yalalink.com';
	public $websitename = 'Yalalink';
	public function __construct(){
        parent::__construct();
    }
	public function index(){
		$data = new stdClass();
		$data->page_title = 'Classifieds';
		$data->hotdeals = $this->yalalink_model->DealsPostsPage('Classifieds');
		$data->special = $this->yalalink_model->SpecialPostsPage('Classifieds');
		$_SESSION["dcountries"] = array();
		$data->countrylatest = $this->yalalink_model->countrylatest('Classifieds', 1);
		$data->countrylatest1 = $this->yalalink_model->countrylatest('Classifieds', 1);
		$data->countrylatest2 = $this->yalalink_model->countrylatest('Classifieds', 1);
		$this->load->view('electro/classifieds/main', $data);
		// $this->load->view('front_end/classifieds', $data);
	}
	public function getListings(){ 
		$type = $this->input->get('type');
		$category = $this->input->get('category');
		$per_page = $this->input->get('per_page');
		$currency = $this->session->userdata('currency');
		$userdata = array();
		$config = $this->paginationStyling($type, $category);
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$offset = ($per_page) ? $per_page : 0;
		$data['results'] = $this->classifieds_model->getListings($config['per_page'], $offset, $type, $category);
		$data['links'] = $this->pagination->create_links();
		$data['first_record'] = $offset + 1;
		$data['last_record'] = $offset + count($data['results']);
		$data['total_count'] = $config['total_rows'];
		$results = $data['results'];
		$links = $data['links'];
		if($results){
			$cnt=count($results);
			$i=1;$j=1;
			$show_user = '';
			$featured = '';
			$banner = '';
		$result = '<div class="row">';
		foreach($results as $val){
			  //$i++;
			  $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
			  $title = str_replace('  ',' ',strtolower($title));
			  $title = str_replace(' ','-',$title);
			  $latest = $title.'-'.$val->id;
			  $main_image = $this->classifieds_model->getMainImage($val->id);
			  $user = $this->yalalink_model->getUserDetails($val->user_id);
			  $count = $this->yalalink_model->countfavorites($val->id);
			  $check = $this->yalalink_model->checkfavorites($val->id);
			  if($main_image) {
				  $img = 'uploads/images/thumbnail/'.@$main_image->image;
				 $r_img = 'uploads/images/'.@$main_image->image;
				 if(file_exists(@$img)){ 
				 $image = $img; 
				 }elseif(file_exists(@$r_img)){ 
				 $image = $r_img; 
				 }else{
				 $image = 'assets/front_end/images/no_image_available.jpg'; 
				 }
				 if(file_exists(@$image)){
					 $image = $image;
				 }else{
					 $image = 'assets/front_end/images/no_image_available.jpg';
				 }
			  }else{
				  $img = 'assets/front_end/images/no_image_available.jpg';
				  $image = 'assets/front_end/images/no_image_available.jpg';
			  }
			  if($user) {
				 $logo = 'uploads/users/thumbnail/'.@$user->image;
				 if(file_exists(@$img)){ 
				 $logo = $logo; 
				 }else{ 
				 $logo = 'assets/front_end/images/user-thumb.jpg'; 
				 }
			  }else{
				  $logo = '';
			  }
			if($val->featured){ 
              $featured = '<span class="badge"><img src="assets/front_end/images/add-icon.png"></span>';
			  $show_user = '<div class="full-wrap added-by"> <a href="javascript:void(0);"><img src="'.$logo.'">
                <label>'.substr($user->company_name,0,25).'...'.'</label>
                </a> </div>';
              }else{
				  $featured = '';
				  $show_user = '';
			  }
			  $userdata = $this->session->userdata('logged_yalalink_userdata');
			  if($userdata['userid']){
				  $link = 'javascript:void(0);';
			  }else{
				  $link = 'login';
			  }
			  if($check){ 
              		$favorites = '<a class="favorites favorites_'.$val->id.' d-none" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart-o" aria-hidden="true"></i></a> 
								  <a class="unfavorites unfavorites_'.$val->id.'" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart" aria-hidden="true"></i></a> ';
			  }else{
				   $favorites = '<a class="favorites favorites_'.$val->id.'" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart-o" aria-hidden="true"></i></a> 
							     <a class="unfavorites unfavorites_'.$val->id.' d-none" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart" aria-hidden="true"></i></a> ';
			  }
			   if($val->title_ar!='' || $val->title_ar == 'NULL'){ 
			  	  $ar = '<a href="classifieds/view/'.@$latest.'" class="ar-txt add-ar card-ar">'.'...'.substr($val->title_ar,0,40).'</a>';
			  }else{
				  $ar = '';
			  }
			  if($val->title_en){
				  if($val->title_ar!='' || $val->title_ar == 'NULL'){ 
			  	  	  $en = '<a href="classifieds/view/'.@$latest.'">'.substr($val->title_en,0,40).'...</a>';
				  }else{
					  $en = '<a href="classifieds/view/'.@$latest.'">'.substr($val->title_en,0,40).'...</a>';
				  }
			  }else{
				  $en = '';
			  }
			 $result .= '<div class="col col-sm-6 col-md-4 col-xs-12">';
			if($val->featured){
            $result .= '<div class="featured-wrap">';
			}
            $result .= '<div class="card" style="border: 1px solid #2d2e2e47 !important;">'.$featured.'
			<div class="card-body">
			
			<p class="card-text small"> '.$en.$ar.'</p>

				</div>
              <a href="classifieds/view/'.@$latest.'"><img class="card-img-top" src="'.$image.'" alt="'.substr($val->title_en,0,100).'"></a>
              <div class="card-body">
                
                <h5 class="card-title2">'.$currency.' '.number_format(@$val->price).'</h5>
                <p class="card-text">'.substr(strip_tags($val->description),0,100).'...'.'</p>
              </div>'.$show_user.'
              <div class="bottom">
                <div class="rating"> '.$favorites.' </div>
                    <span class="count-like-'.$val->id.'">'.$count.'</span> <span class="added-date">'.date("j, F Y", strtotime($val->added_date)).'</span> </div>
            </div>';
			if($val->featured){
            $result .= '</div>';
			}
            $result .= '</div>';
		if($i==9){ if($cnt!=$j){ 
		$result .= '<div class="col-md-12"><a href="http://yalafun.com" target="_blank"> <img src="assets/front_end/images/gift4.jpg" class="list-sec-add"> </a></div>';} $i=0;} 
        $i++; $j++;
		}
		$result .= '<div class="col-md-12"><nav class="woocommerce-pagination"> <ul class="page-numbers"> <li>'.$links.'</li></ul></nav></div></div></div>';
		echo $result;
		}
		else 
		{
		echo '<div class="no-msg-result text-center"> <i class="fa fa-info-circle" aria-hidden="true"></i>
      <div class="msg">We didnt find any results for the search</div>
    </div>';
		}
	}
	
	/*****For List View*************************/
	public function getListingslist(){ 
		$type = $this->input->get('type');
		$category = $this->input->get('category');
		$per_page = $this->input->get('per_page');
		$currency = $this->session->userdata('currency');
		$userdata = array();
		$config = $this->paginationStyling($type, $category);
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$offset = ($per_page) ? $per_page : 0;
		$data['results'] = $this->classifieds_model->getListings($config['per_page'], $offset, $type, $category);
		$data['links'] = $this->pagination->create_links();
		$data['first_record'] = $offset + 1;
		$data['last_record'] = $offset + count($data['results']);
		$data['total_count'] = $config['total_rows'];
		$results = $data['results'];
		$links = $data['links'];
		if($results){
			$cnt=count($results);
			$i=1;$j=1;
			$show_user = '';
			$featured = '';
			$banner = '';
		$result = '<div class="row">';
		foreach($results as $val){
			  //$i++;
			  $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
			  $title = str_replace('  ',' ',strtolower($title));
			  $title = str_replace(' ','-',$title);
			  $latest = $title.'-'.$val->id;
			  $main_image = $this->classifieds_model->getMainImage($val->id);
			  $user = $this->yalalink_model->getUserDetails($val->user_id);
			  $count = $this->yalalink_model->countfavorites($val->id);
			  $check = $this->yalalink_model->checkfavorites($val->id);
			  if($main_image) {
				  $img = 'uploads/images/thumbnail/'.@$main_image->image;
				 $r_img = 'uploads/images/'.@$main_image->image;
				 if(file_exists(@$img)){ 
				 $image = $img; 
				 }elseif(file_exists(@$r_img)){ 
				 $image = $r_img; 
				 }else{
				 $image = 'assets/front_end/images/no_image_available.jpg'; 
				 }
				 if(file_exists(@$image)){
					 $image = $image;
				 }else{
					 $image = 'assets/front_end/images/no_image_available.jpg';
				 }
			  }else{
				  $img = 'assets/front_end/images/no_image_available.jpg';
				  $image = 'assets/front_end/images/no_image_available.jpg';
			  }
			  if($user) {
				 $logo = 'uploads/users/thumbnail/'.@$user->image;
				 if(file_exists(@$img)){ 
				 $logo = $logo; 
				 }else{ 
				 $logo = 'assets/front_end/images/user-thumb.jpg'; 
				 }
			  }else{
				  $logo = '';
			  }
			  if($val->featured){ 
              $featured = '<span class="badge"><img src="assets/front_end/images/add-icon.png"></span>';
			  $show_user = '<div class="full-wrap added-by"> <a href="javascript:void(0);"><img src="'.$logo.'">
                <label>'.substr($user->company_name,0,25).'...'.'</label>
                </a> </div>';
              }else{
				  $featured = '';
				  $show_user = '';
			  }
			  $userdata = $this->session->userdata('logged_yalalink_userdata');
			  if($userdata['userid']){
				  $link = 'javascript:void(0);';
			  }else{
				  $link = 'login';
			  }
			  if($check){ 
              		$favorites = '<a class="favorites favorites_'.$val->id.' d-none" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart-o" aria-hidden="true"></i></a> 
								  <a class="unfavorites unfavorites_'.$val->id.'" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart" aria-hidden="true"></i></a> ';
			  }else{
				   $favorites = '<a class="favorites favorites_'.$val->id.'" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart-o" aria-hidden="true"></i></a> 
							     <a class="unfavorites unfavorites_'.$val->id.' d-none" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart" aria-hidden="true"></i></a> ';
			  }
			   if($val->title_ar!='' || $val->title_ar == 'NULL'){ 
			  	  $ar = '<a href="classifieds/view/'.@$latest.'" class="ar-txt add-ar card-ar">'.'...'.substr($val->title_ar,0,40).'</a>';
			  }else{
				  $ar = '';
			  }
			  if($val->title_en){
				  if($val->title_ar!='' || $val->title_ar == 'NULL'){ 
			  	  	  $en = '<a href="classifieds/view/'.@$latest.'">'.substr($val->title_en,0,40).'...</a>';
				  }else{
					  $en = '<a href="classifieds/view/'.@$latest.'">'.substr($val->title_en,0,40).'...</a>';
				  }
			  }else{
				  $en = '';
			  }
			$result .= '<div class="col col-sm-6 col-md-12 col-xs-6">';
			if($val->featured){
            $result .= '<div class="featured-wrap">';
			}
            $result .= '<div class="card" style="border: 1px solid #2d2e2e47 !important;"> '.$featured.'
			
			<div class="row">
      <div class="col-md-6"> 
	    
	 
               
				
			 <a href="classifieds/view/'.@$latest.'"><img class="card-img-top-list" src="'.$image.'" alt="'.substr($val->title_en,0,100).'"></a></div>
                  <div class="col-md-6"> 
				  <div class="card-body">
                   
                 <p class="card-text small-list"> '.$en.$ar.'</p>
                    <h5 class="card-title2">'.$currency.' '.number_format(@$val->price).'</h5>
                    <p class="card-text">'.substr(strip_tags($val->description),0,500).'...</p>
                  </div>'.$show_user.'
                  <div class="bottom-list-small-classi">
                    <div class="rating" style="display: -webkit-inline-box;"> '.$favorites.' </div>
                    <span class="count-like-'.$val->id.'">'.$count.'</span> <span class="added-date">'.date("j, F Y", strtotime($val->added_date)).'</span> </div>
                </div></div></div>';
			if($val->featured){
            $result .= '</div>';
			}
            $result .= '</div>';
		if($i==9){ if($cnt!=$j){ 
		$result .= '<div class="col-md-12"><a href="http://yalafun.com" target="_blank"> <img src="assets/front_end/images/gift1.jpg" class="list-sec-add"></a> </div>';} $i=0;} 
        $i++; $j++;
		}
		$result .= '<div class="col-md-12"><nav class="woocommerce-pagination"> <ul class="page-numbers"> <li>'.$links.'</li></ul></nav></div></div></div>';
		echo $result;
		}
		else 
		{
		echo '<div class="no-msg-result text-center"> <i class="fa fa-info-circle" aria-hidden="true"></i>
      <div class="msg">We didnt find any results for the search</div>
    </div>';
		}
	}
	
	
	/************List View small*********************/
	public function getListingslistsmall(){ 
		$type = $this->input->get('type');
		$category = $this->input->get('category');
		$subcategory = $this->input->get('subcategory');
		$per_page = $this->input->get('per_page');
		$currency = $this->session->userdata('currency');
		$userdata = array();
		$config = $this->paginationStyling($type, $category, $subcategory);
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$offset = ($per_page) ? $per_page : 0;
		$data['results'] = $this->classifieds_model->getListings($config['per_page'], $offset, $type, $category, $subcategory);
		$data['links'] = $this->pagination->create_links();
		$data['first_record'] = $offset + 1;
		$data['last_record'] = $offset + count($data['results']);
		$data['total_count'] = $config['total_rows'];
		$results = $data['results'];
		$links = $data['links'];
		if($results){
			$cnt=count($results);
			$i=1;$j=1;
			$show_user = '';
			$featured = '';
			$banner = '';
		$result = '<div class="tab-pane">
      <div class="row">';
		foreach($results as $val){
			  //$i++;
			  $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
			  $title = str_replace('  ',' ',strtolower($title));
			  $title = str_replace(' ','-',$title);
			  $latest = $title.'-'.$val->id;
			  $main_image = $this->classifieds_model->getMainImage($val->id);
			  $user = $this->yalalink_model->getUserDetails($val->user_id);
			  $count = $this->yalalink_model->countfavorites($val->id);
			  $check = $this->yalalink_model->checkfavorites($val->id);
			  if($main_image) {
				  $img = 'uploads/images/thumbnail/'.@$main_image->image;
				 $r_img = 'uploads/images/'.@$main_image->image;
				 if(file_exists(@$img)){ 
				 $image = $img; 
				 }elseif(file_exists(@$r_img)){ 
				 $image = $r_img; 
				 }else{
				 $image = 'assets/front_end/images/no_image_available.jpg'; 
				 }
				 if(file_exists(@$image)){
					 $image = $image;
				 }else{
					 $image = 'assets/front_end/images/no_image_available.jpg';
				 }
			  }else{
				  $img = 'assets/front_end/images/no_image_available.jpg';
				  $image = 'assets/front_end/images/no_image_available.jpg';
			  }
			  if($user) {
				 $logo = 'uploads/users/thumbnail/'.@$user->image;
				 if(file_exists(@$img)){ 
				 $logo = $logo; 
				 }else{ 
				 $logo = 'assets/front_end/images/user-thumb.jpg'; 
				 }
			  }else{
				  $logo = '';
			  }
			if($val->featured){ 
              $featured = '<span class="badge"><img src="assets/front_end/images/add-icon.png"></span>';
			  $show_user = '<div class="full-wrap added-by"> <a href="javascript:void(0);"><img src="'.$logo.'">
                <label>'.substr($user->company_name,0,25).'...'.'</label>
                </a> </div>';
              }else{
				  $featured = '';
				  $show_user = '';
			  }
			  $userdata = $this->session->userdata('logged_yalalink_userdata');
			  if($userdata['userid']){
				  $link = 'javascript:void(0);';
			  }else{
				  $link = 'login';
			  }
			  if($check){ 
              		$favorites = '<a class="favorites favorites_'.$val->id.' d-none" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart-o" aria-hidden="true"></i></a> 
								  <a class="unfavorites unfavorites_'.$val->id.'" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart" aria-hidden="true"></i></a> ';
			  }else{
				   $favorites = '<a class="favorites favorites_'.$val->id.'" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart-o" aria-hidden="true"></i></a> 
							     <a class="unfavorites unfavorites_'.$val->id.' d-none" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart" aria-hidden="true"></i></a> ';
			  }
			   if($val->title_ar!='' || $val->title_ar == 'NULL'){ 
			  	  $ar = '<a href="classifieds/view/'.@$latest.'" class="ar-txt add-ar card-ar">'.'...'.substr($val->title_ar,0,40).'</a>';
			  }else{
				  $ar = '';
			  }
			  if($val->title_en){
				  if($val->title_ar!='' || $val->title_ar == 'NULL'){ 
			  	  	  $en = '<a href="classifieds/view/'.@$latest.'">'.substr($val->title_en,0,60).'...</a>';
				  }else{

					  $en = '<a href="classifieds/view/'.@$latest.'">'.substr($val->title_en,0,60).'...</a>';
				  }
			  }else{
				  $en = '';
			  }
			$result .= '<div class="col col-sm-6 col-md-12 col-xs-6">';
			if($val->featured){
            $result .= '<div class="featured-wrap">';
			}
            $result .= '<div class="card" style="border: 1px solid #2d2e2e47 !important;"> '.$featured.'
			
			<div class="row">
      
               
				
			<div class="col-md-4"> <a href="classifieds/view/'.@$latest.'"><img class="card-img-top-list" src="'.$image.'" alt="'.substr($val->title_en,0,100).'"></a></div>
                 <div class="col-md-3"> <p class="card-text small-list"> '.$en.$ar.'</p> <h5 class="card-title2">'.$currency.' '.number_format(@$val->price).'</h5></div>
				   <div class="col-md-5"><div class="card-body">
                    <p class="card-text small"></p>
                   
                   
                    <p class="card-text">'.substr(strip_tags($val->description),0,250).'...</p>
                  </div>'.$show_user.'
                  <div class="bottom-list-small">
                    <div class="rating"> '.$favorites.' </div>
                    <span class="count-like-'.$val->id.'">'.$count.'</span> 
					<span class ="year" style="color: black;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="Year" style="color: #00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>'.@$val->year.'  </span>
                    <span class ="kilometer" style="color: black;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="kilometer" style="color: #00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>'.@$val->kilometers.'  </span>
					<span class="added-date">'.date("j, F Y", strtotime($val->added_date)).'</span> </div>
                </div></div></div>';
			if($val->featured){
            $result .= '</div>';
			}
            $result .= '</div>';
		if($i==9){ if($cnt!=$j){ 
		$result .= '<div class="col-md-12"><a href="http://yalafun.com" target="_blank"> <img src="assets/front_end/images/gift1.jpg" class="list-sec-add"></a> </div>';} $i=0;} 
        $i++; $j++;
		}
		$result .= '<div class="col-md-12"><nav class="woocommerce-pagination"> <ul class="page-numbers"> <li>'.$links.'</li></ul></nav></div></div></div>';
		echo $result;
		}
		else 
		{
		echo '<div class="no-msg-result text-center"> <i class="fa fa-info-circle" aria-hidden="true"></i>
      <div class="msg">We didnt find any results for the search</div>
    </div>';
	}
	}
		

		
	
	public function view($category){
			$data = new stdClass();	
			$cat = explode('-',$category);
			$pid = end($cat);
			$ads = Core::getModel('ads');
			$userdata = $this->session->userdata('logged_yalalink_userdata');
			if($userdata){
			$id = $userdata['userid'];
			$data->login_user = $this->yalalink_model->getUserDetails($id);			
			}
			$data->view = $this->classifieds_model->getDetails($pid);
			
			$data->user = $this->yalalink_model->getUserDetails($data->view->user_id);
			$data->postdate = $this->auto_model->getPostDate($pid);
			$data->images = $this->classifieds_model->getImages($pid);
			$data->title = $data->view->title_en.' - Jobs in Dubai, Sharjah, Abu Dhabi, Ajman, Ras Al Khaimah ';
			$data->meta_desc =  '';
			$positions = getPositions();
			foreach ($positions as $s){ 
				$myArray[] = '<span>'.ucfirst($s->title).'</span>';
			}
			$positions = implode( ', ', $myArray );
			$data->meta_keyword = $positions;
			$data->page_title = 'Classifieds';
			$data->meta_url = 'classifieds/view/'.$category;
			$data->hotdeals = $ads->getHotDeals('Classifieds', 6);
		    $data->special = $ads->getSpecialAds('Classifieds', 6);
			$this->load->view('front_end/classifieds-details',$data);
	}
	function paginationStyling($type, $category){
		$type = $this->input->get('type');
		$category = $this->input->get('category');
		$per_page = $this->input->get('per_page');
        $config = array();		
		$config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'/classifieds?type='.$type.'&category='.$category;
		$config['total_rows'] = $this->classifieds_model->getListingsCount($type, $category);
        $config['per_page'] = !empty($per_page)?$per_page:18;
		$config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo';
        $config['last_link'] = '&raquo';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$config['uri_segment'] = $per_page;
        return $config;
    }
}
?>