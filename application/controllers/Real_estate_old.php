<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Real_estate extends CI_Controller{
	public $websiteemail = 'info@yalalink.com';
	public $websitename = 'Yalalink';
	public function __construct(){
        parent::__construct();
    }
	public function index(){
		$data = new stdClass();
		$userdata = array();
			if($this->input->post()){
				$userdata['searchestate']['keyword'] = $this->input->post('keyword');
				$userdata['searchestate']['property-type'] = $this->input->post('property-type');
			}
		if($userdata)
		$this->session->set_userdata($userdata);
		$data->page_title = 'Real Estate';
		$data->hotdeals = $this->yalalink_model->DealsPostsPage('Real Estate');
		$data->special = $this->yalalink_model->SpecialPostsPage('Real Estate');
		$this->load->view('front_end/real-estate_new', $data);
	}
	public function getListings(){ 
		$type = $this->input->get('type');
		$property_type = $this->input->get('property-type');
		$per_page = $this->input->get('per_page');
		$currency = $this->session->userdata('currency');
		$userdata = array();
		$config = $this->paginationStyling($type, $property_type);
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$offset = ($per_page) ? $per_page : 0;
		$data['results'] = $this->real_estate_model->getListings($config['per_page'], $offset, $type, $property_type);
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
			  $main_image = $this->real_estate_model->getMainImage($val->id);
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
				 $logo = 'uploads/users/thumb/'.@$user->image;
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
			  $country_code = $this->session->userdata('country_code');
			  if(($country_code == 'AE' || $country_code == 'OM' || $country_code == 'SA' || $country_code == 'EG') && ($val->title_ar!='' || $val->title_ar == 'NULL')){ 
			  	  $ar = '<a href="real-estate/view/'.@$latest.'" class="ar-txt add-ar card-ar">'.'...'.substr($val->title_ar,0,40).'</a>';
			  }else{
				  $ar = '';
			  }
			  if($val->title_en){
			  	  if(($country_code == 'AE' || $country_code == 'OM' || $country_code == 'SA' || $country_code == 'EG') && ($val->title_ar!='' || $val->title_ar == 'NULL')){ 
			  	  	  $en = '<a href="real-estate/view/'.@$latest.'">'.substr($val->title_en,0,15).'...</a>';
				  }else{
					  $en = '<a href="real-estate/view/'.@$latest.'">'.substr($val->title_en,0,15).'...</a>';
				  }
			  }else{
				  $en = '';
			  }
			$result .= '<div class="col col-sm-6 col-md-4 col-xs-6">';
			if($val->featured){
            $result .= '<div class="featured-wrap">';
			}
            $result .= '<div class="card">'.$featured.'
			<div class="card-body">
			 <h4 class="card-title"> '.$en.$ar.' </h4>
               
				</div>
              <a href="real-estate/view/'.@$latest.'"><img class="card-img-top" src="'.$image.'" alt="'.substr($val->title_en,0,100).'"></a>
              <div class="card-body">
                <p class="card-text small"> Lorem Ipsum is simply dummy text... </p>
               
                <h5 class="card-title2">'.$currency.' '.number_format(@$val->price).'</h5>
                <p class="card-text">'.substr(strip_tags($val->description),0,15).'...'.'</p>
              </div>'.$show_user.'
              <div class="bottom">
                <div class="rating"> 
				'.$favorites.'
				</div>
                <span class="count-like-'.$val->id.'">'.$count.'</span></br> <span class="added-date">'.date("j, F Y", strtotime($val->added_date)).'</span> </div>
            </div>';
			if($val->featured){
            $result .= '</div>';
			}
            $result .= '</div>';
		if($i==9){ if($cnt!=$j){ 
		$result .= '<div class="col-md-12"><a href="http://yalafun.com" target="_blank"><img src="assets/front_end/images/gift4.jpg" class="list-sec-add"></a></div>';} $i=0;} 
        $i++; $j++;
		}
		$result .= '<div class="col-md-12"><nav aria-label="Page navigation" class="list-pagination">'.$links.'</nav></div></div></div>';
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
			$userdata = $this->session->userdata('logged_yalalink_userdata');
			if($userdata){
			$id = $userdata['userid'];
			$data->login_user = $this->yalalink_model->getUserDetails($id);			
			}
			$data->view = $this->real_estate_model->getDetails($pid);
			$data->amenities = $this->real_estate_model->getAmenities($pid);
			$data->user = $this->yalalink_model->getUserDetails($data->view->user_id);
			$data->images = $this->real_estate_model->getImages($pid);
			$data->title = $data->view->title_en.' - '.@$data->view->title_ar.' - Properties in Dubai, Sharjah, Abu Dhabi, Ajman, Ras Al Khaimah - | Yalalink';
			$data->meta_desc =  '';
			$data->page_title = 'Real Estate';
			$data->meta_keyword = 'properties, real estate, appartments, villas, flat, commercial, residencial';
			$data->meta_url = 'real-estate/view/'.$category;
			$data->hotdeals = $this->yalalink_model->DealsPostsPage('Real Estate');
		    $data->special = $this->yalalink_model->SpecialPostsPage('Real Estate');
			$this->load->view('front_end/realestate-detail',$data);
	}
	function paginationStyling($type, $property_type){
		$type = $this->input->get('type');
		$property_type = $this->input->get('property-type');
		$per_page = $this->input->get('per_page');
        $config = array();		
		$config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'/real-estate?type='.$type.'&property-type='.$property_type;
		$config['total_rows'] = $this->real_estate_model->getListingsCount($type, $property_type);
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