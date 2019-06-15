<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Jobs extends CI_Controller{
	public $websiteemail = 'info@yalalink.com';
	public $websitename = 'Yalalink';
	public function __construct(){
        parent::__construct();
    }
	public function index(){
		$data = new stdClass();
		$data->title = 'Real Estate';
		$this->load->view('front_end/jobs', $data);
	}
	public function getHiring(){ 
		$type = 'Hiring';
		$per_page = $this->input->get('per_page');
		$userdata = array();
		$config = $this->paginationStyling('Hiring');
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$offset = ($per_page) ? $per_page : 0;
		$data['results'] = $this->jobs_model->getListings($config['per_page'], $offset, $type);
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
			  $image = $this->yalalink_model->getUserDetails($val->user_id);
			  $location = $this->yalalink_model->getLocation($val->location);
			  $position = $this->yalalink_model->getPosition($val->position);
			  $area = $this->yalalink_model->getLocation($val->area);
			  $utitle = preg_replace("/[^a-zA-Z0-9 ]+/", "", $image->company_name);
			  $utitle = str_replace('  ',' ',strtolower($utitle));
			  $utitle = str_replace(' ','-',$utitle);
			  $ulatest = $utitle.'-'.$val->id;
			  if(@$image->image) {
				 $img = 'uploads/users/thumb/'.@$image->image;
			  }else{ 
				 $img = 'assets/front_end/images/user-thumb.jpg'; 
			  }
			  if($location) {
				 $location = $location->location;
			  }else{
				  $location = '';
			  }
			  if($area) {
				 $area = $area->location.', ';
			  }else{
				  $area = '';
			  }
			if($val->featured){ 
              $featured = '<span class="badge"><img src="assets/front_end/images/add-icon.png"></span>';
			  $show_user = '<div class="full-wrap added-by"> <a href=""><img src="'.$logo.'">
                <label>'.substr($val->first_name.$val->last_name,0,15).'...'.'</label>
                </a> </div>';
              }
			 $result .= '<div class="col col-sm-6 col-md-4 col-xs-6 job-listing-wrap">
			  <div class="featured-wrap">
				<div class="card"> '.$featured.' <a href="profile/'.@$ulatest.'"><img class="card-img-top" src="'.$img.'" alt="Card image cap"></a>
				  <div class="card-body">
					<p class="card-text small text-center"> <a href="profile/'.@$ulatest.'">'.substr(@$image->company_name,0,15).'...</a> </p>
					<div class="full-wrap job-desc-short inline-block">
					  <h4 class="card-title"> <a href="jobs/view/'.@$latest.'">'.substr($val->title_en,0,15).'...</a> <a href="jobs/view/'.@$latest.'" class="ar-txt add-ar card-ar">'.substr($val->title_ar,0,15).'...</a> </h4>
					  <h5 class="card-title2">'.$val->salary.'</h5>
					  <h5 class="card-title2 full-wrap pos-rel location">'.$area.$location.'</h5>
					  <p class="card-text">'.substr($val->description,0,30).'...</p>
					</div>
				  </div>
				  <div class="bottom">
					<div class="rating"> <a href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a> </div>
					<span>25</span> <span class="added-date">'.date("j, F Y", strtotime($val->added_date)).'</span> </div>
				</div>
			  </div>
			</div>';
		if($i==6){ if($cnt!=$j){ 
		$result .= '<div class="col-md-12"> <img src="assets/front_end/images/gift4.jpg" class="list-sec-add"> </div>';} $i=0;} 
        $i++; $j++;
		}
		$result .= '<div class="col-md-12"><nav aria-label="Page navigation" class="list-pagination">'.$links.'</nav></div></div>';
		echo $result;
		}
		else 
		{
		echo '';
		}
	}
	public function getLooking(){ 
		$type = 'Looking';
		$per_page = $this->input->get('per_page');
		$userdata = array();
		$config = $this->paginationStyling('Looking');
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$offset = ($per_page) ? $per_page : 0;
		$data['results'] = $this->jobs_model->getListings($config['per_page'], $offset, $type);
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
			  $image = $this->yalalink_model->getUserDetails($val->user_id);
			  $location = $this->yalalink_model->getLocation($val->location);
			  $position = $this->yalalink_model->getPosition($val->position);
			  $area = $this->yalalink_model->getLocation($val->area);
			  $utitle = preg_replace("/[^a-zA-Z0-9 ]+/", "", $image->company_name);
			  $utitle = str_replace('  ',' ',strtolower($utitle));
			  $utitle = str_replace(' ','-',$utitle);
			  $ulatest = $utitle.'-'.$val->id;
			  if(@$image->image) {
				 $img = 'uploads/users/thumb/'.@$image->image;
			  }else{ 
				 $img = 'assets/front_end/images/user-thumb.jpg'; 
			  }
			  if($location) {
				 $location = $location->location;
			  }else{
				  $location = '';
			  }
			  if($area) {
				 $area = $area->location.', ';
			  }else{
				  $area = '';
			  }
			if($val->featured){ 
              $featured = '<span class="badge"><img src="assets/front_end/images/add-icon.png"></span>';
			  $show_user = '<div class="full-wrap added-by"> <a href=""><img src="'.$logo.'">
                <label>'.substr($val->first_name.$val->last_name,0,15).'...'.'</label>
                </a> </div>';
              }
			$result .= '<div class="col col-sm-6 col-md-4 col-xs-6 job-listing-wrap">
          <div class="featured-wrap">
            <div class="card wanted-people"> '.$featured.' <a href="profile/'.@$ulatest.'"><img class="card-img-top" src="'.$img.'" alt="Card image cap"></a>
              <div class="card-body">
                <p class="card-text small text-center"> <a href="profile/'.@$ulatest.'">'.substr(@$image->first_name,0,15).'...</a> </p>
                <div class="full-wrap job-desc-short inline-block">
                  <h4 class="card-title"> <a href="profile/'.@$ulatest.'">'.substr($position->title,0,15).'...</a> </h4>
                  <h5 class="card-title2">'.@$val->experience.' Experience</h5>
                  <h5 class="card-title2 full-wrap pos-rel location">'.$area.$location.'</h5>
                  <p class="card-text">'.substr($val->description,0,30).'...</p>
                </div>
              </div>
              <div class="bottom">
                <div class="rating"> <a href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a> </div>
                <span>25</span> <span class="added-date">'.date("j, F Y", strtotime($val->added_date)).'</span> </div>
            </div>
          </div>
        </div>'; 
		if($i==6){ if($cnt!=$j){ 
		$result .= '<div class="col-md-12"> <img src="assets/front_end/images/gift4.jpg" class="list-sec-add"> </div>';} $i=0;} 
        $i++; $j++;
		}
		$result .= '<div class="col-md-12"><nav aria-label="Page navigation" class="list-pagination">'.$links.'</nav></div></div>';
		echo $result;
		}
		else 
		{
		echo '';
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
			$data->view = $this->jobs_model->getDetails($pid);
			$data->user = $this->yalalink_model->getUserDetails($data->view->user_id);
			$data->images = $this->jobs_model->getImages($pid);
			$data->title = $data->view->title_en.' - '.@$data->view->title_ar.' - Jobs in Dubai, Sharjah, Abu Dhabi, Ajman, Ras Al Khaimah - | Yalalink';
			$data->meta_desc =  '';
			$positions = getPositions();
			foreach ($positions as $s){ 
				$myArray[] = '<span>'.ucfirst($s->title).'</span>';
			}
			$positions = implode( ', ', $myArray );
			$data->meta_keyword = $positions;
			$this->load->view('front_end/job-details',$data);
	}
	function paginationStyling($type){
		$per_page = $this->input->get('per_page');
        $config = array();		
		$config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'/jobs?type='.$type;
		$config['total_rows'] = $this->jobs_model->getListingsCount($type);
        $config['per_page'] = !empty($per_page)?$per_page:12;
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