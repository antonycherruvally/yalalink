<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Auto extends CI_Controller{
	public $websiteemail = 'info@yalalink.com';
	public $websitename = 'Yalalink';
	public function __construct(){
        parent::__construct();
        // $this->output->enable_profiler(TRUE);
    }
	public function index(){
		$data = new stdClass();
		$data->page_title = 'Find All Types of Auto Motives, Cars, Boats, RVs, Motorcyles, etc.. Used and New';
		$data->hotdeals = $this->yalalink_model->DealsPostsPage('Auto');
		$data->special = $this->yalalink_model->SpecialPostsPage('Auto');
		$_SESSION["dcountries"] = array();
		$data->countrylatest = $this->yalalink_model->countrylatest('Auto', 1);
		$data->countrylatest1 = $this->yalalink_model->countrylatest('Auto', 1);
		$data->countrylatest2 = $this->yalalink_model->countrylatest('Auto', 1);
			$data->metas['description'] = "Free Classified Site, Post your Used/New Cars for FREE Now! We operate in United Arab Emirates, Oman, Jordan, Kuwait, Saudi Arabia, Eygpt, and Lebonan. Cheap Used and New Cars offered on our listings. Mint condition cars for a cheap price. Post your cars now, quick, fast, and easy sale. Used or new Yachts, Cheap Insurance, Used or New Motocycles. Cheap Premium Number Plates. We will help you find cheap car rental companies. ";
		$this->load->view('electro/auto/main', $data);
		// $this->load->view('front_end/auto', $data);
	}
	public function getListings(){ 
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
		$data['results'] = $this->auto_model->getListings($config['per_page'], $offset, $type, $category, $subcategory);
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
			  $main_image = $this->auto_model->getMainImage($val->id);
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
              		$favorites = '<a class="favorites favorites_'.$val->id.' d-none" href="'.$link.'" id="'.$val->id.'"><i class="far fa-heart" aria-hidden="true"></i></a> 
								  <a class="unfavorites unfavorites_'.$val->id.'" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart" aria-hidden="true"></i></a> ';
			  }else{
				   $favorites = '<a class="favorites favorites_'.$val->id.'" href="'.$link.'" id="'.$val->id.'"><i class="far fa-heart" aria-hidden="true"></i></a> 
							     <a class="unfavorites unfavorites_'.$val->id.' d-none" href="'.$link.'" id="'.$val->id.'"><i class="fa fa-heart" aria-hidden="true"></i></a> ';
			  }
			   if($val->title_ar!='' || $val->title_ar == 'NULL'){ 
			  	  $ar = '<a href="auto/view/'.@$latest.'" class="ar-txt add-ar card-ar">'.'...'.substr($val->title_ar,0,40).'</a>';
			  }else{
				  $ar = '';
			  }
			  if($val->title_en){
				  if($val->title_ar!='' || $val->title_ar == 'NULL'){ 
			  	  	  $en = '<a href="auto/view/'.@$latest.'">'.substr($val->title_en,0,40).'</a>';
				  }else{
					  $en = '<a href="auto/view/'.@$latest.'">'.substr($val->title_en,0,40).'</a>';
				  }
			  }else{
				  $en = '';
			  }
			$result .= '<div class="col col-sm-6 col-md-4 col-xs-12">';
			if($val->featured){
            $result .= '<div class="featured-wrap">';
			}
            $result .= '<div class="card" style="border: 1px solid #2d2e2e47 !important;"> '.$featured.'
			<div class="card-body">
			
			<p class="card-text small"> '.$en.$ar.'</p></div>
               
				
			 <a href="auto/view/'.@$latest.'"><img class="card-img-top-auto" src="'.$image.'" alt="'.substr($val->title_en,0,100).'"></a>
                  <div class="card-body">
				  
                   
                    <h5 class="card-title2">'.$currency.' '.number_format(@$val->price).'</h5>
                    <p class="card-text">'.substr(strip_tags($val->description),0,100).'...</p>
                  </div>'.$show_user.'
                  <div class="bottom">
                    <div class="rating">
					 '.$favorites.' </div>
                    <span class="count-like-'.$val->id.'">'.$count.'</span> 
					<span class ="year" style="color: black;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="Year" style="color: #00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>'.@$val->year.'  </span>
                    <span class ="kilometer" style="color: black;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="kilometer" style="color: #00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>'.@$val->kilometers.'  </span>
					<span class="added-date">'.date("j, F Y", strtotime($val->added_date)).'</span> </div>
                </div>';
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
	/*****For List View*************************/
	public function getListingslist(){ 
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
		$data['results'] = $this->auto_model->getListings($config['per_page'], $offset, $type, $category, $subcategory);
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
			  $main_image = $this->auto_model->getMainImage($val->id);
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
			  	  $ar = '<a href="auto/view/'.@$latest.'" class="ar-txt add-ar card-ar">'.'...'.substr($val->title_ar,0,40).'</a>';
			  }else{
				  $ar = '';
			  }
			  if($val->title_en){
				  if($val->title_ar!='' || $val->title_ar == 'NULL'){ 
			  	  	  $en = '<a href="auto/view/'.@$latest.'">'.substr($val->title_en,0,40).'</a>';
				  }else{
					  $en = '<a href="auto/view/'.@$latest.'">'.substr($val->title_en,0,40).'</a>';
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
	  
	   
               
				
			 <a href="auto/view/'.@$latest.'"><img class="card-img-top-list-auto" src="'.$image.'" alt="'.substr($val->title_en,0,100).'"></a></div>
                  <div class="col-md-6"> <div class="card-body">
                   
                    <p class="card-text small-list"> '.$en.$ar.'</p>
                    <h5 class="card-title2">'.$currency.' '.number_format(@$val->price).'</h5>
                    <p class="card-text">'.substr(strip_tags($val->description),0,500).'...</p>
                  </div>'.$show_user.'
                  <div class="bottom-list">
                    <div class="rating" > '.$favorites.' </div>
                    <span class="count-like-'.$val->id.'">'.$count.'</span> 
					<span class ="year" style="color: black;font-size: 13px;"><a href="auto/view/'.@$latest.'" title="Year" style="color: #00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>'.@$val->year.'  </span>
                    <span class ="kilometer" style="color: black;font-size: 13px;    margin-right: 122px;"><a href="auto/view/'.@$latest.'" title="kilometer" style="color: #00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 17px;" alt="bedroom">  </i></a>'.@$val->kilometers.'  </span>
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
		$data['results'] = $this->auto_model->getListings($config['per_page'], $offset, $type, $category, $subcategory);
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
			  $main_image = $this->auto_model->getMainImage($val->id);
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
			  	  $ar = '<a href="auto/view/'.@$latest.'" class="ar-txt add-ar card-ar">'.'...'.substr($val->title_ar,0,40).'</a>';
			  }else{
				  $ar = '';
			  }
			  if($val->title_en){
				  if($val->title_ar!='' || $val->title_ar == 'NULL'){ 
			  	  	  $en = '<a href="auto/view/'.@$latest.'">'.substr($val->title_en,0,60).'...</a>';
				  }else{
					  $en = '<a href="auto/view/'.@$latest.'">'.substr($val->title_en,0,60).'...</a>';
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
      
               
				
			<div class="col-md-4"> <a href="auto/view/'.@$latest.'"><img class="card-img-top-list" src="'.$image.'" alt="'.substr($val->title_en,0,100).'"></a></div>
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
			$ads = Core::getModel('ads');
			$pid = end($cat);	
			$userdata = $this->session->userdata('logged_yalalink_userdata');
			if($userdata){
			$id = $userdata['userid'];
			$data->login_user = $this->yalalink_model->getUserDetails($id);			
			}
			$data->view = $this->auto_model->getDetails($pid);
			
			$data->amenities = $this->auto_model->getAmenities($pid);
			$data->postdate = $this->auto_model->getPostDate($pid);
			
			$data->user = $this->yalalink_model->getUserDetails($data->view->user_id);
			$data->images = $this->auto_model->getImages($pid);
			$data->title = $data->view->title_en.' - '.@$data->view->title_ar.' - Auto in Dubai, Sharjah, Abu Dhabi, Ajman, Ras Al Khaimah - | Yalalink';
			$data->meta_desc =  '';
			$data->page_title = 'Auto';
			$data->meta_keyword = 'cars, auto, trucks, number plates';
			$data->meta_url = 'auto/view/'.$category;
			$data->hotdeals = $ads->getHotDeals('Auto', 6);
		    $data->special = $ads->getSpecialAds('Auto', 6);
			$this->load->view('front_end/auto-detail',$data);
	}
	function paginationStyling($type, $category, $subcategory){
		$type = $this->input->get('type');
		$category = $this->input->get('category');
		$subcategory = $this->input->get('subcategory');
		$per_page = $this->input->get('per_page');
        $config = array();		
		$config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'/auto?type='.$type.'&category='.$category.'&subcategory='.$subcategory;
		$config['total_rows'] = $this->auto_model->getListingsCount($type, $category, $subcategory);
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