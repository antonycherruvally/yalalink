<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Admin extends CI_Controller{
	public function __construct(){
        parent::__construct();
    }
	public function index(){
		if(!$this->session->userdata('logged_admin_userdata')){
			$data = new stdClass();
			$data->page_title = 'Login';
			$this->load->view('admin/login/login', $data);
        }else{
			$url = $this->uri->segment(2);
			(!empty($url) && $url != '') ? redirect($url) : redirect('admin/dashboard');
		}
	}
	public function authenticate(){
		$this->load->library('encrypt');
		$email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
		if ($email || $password){
            if ($email){
                $this->session->set_userdata('email',$email);
                if ($password){
                    $result = $this->login_model->loginValidate($email, $password);
                    if (!$result){
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><i class="icon wb-close" aria-hidden="true"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>FAILED : Invalid email or password...</div>');
                    	// redirect(Core::getBaseUrl());
                    }else{
                        $this->session->unset_userdata('email');
						$userdata = $this->session->userdata('logged_admin_userdata');
						redirect('admin/dashboard');
                    }
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><i class="icon wb-close" aria-hidden="true"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>FAILED : Password field is required...</div>');
                }
            }else{
				$this->session->unset_userdata('email');
                $this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissible" role="alert">
<i class="icon wb-close" aria-hidden="true"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  FAILED : Email field is required...
                </div>');
            }
        }else{
			$this->session->unset_userdata('email');
            $this->session->set_flashdata('message', '
			<div class="alert alert-danger alert-dismissible" role="alert">
<i class="icon wb-close" aria-hidden="true"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  FAILED : Email & Password field is required...
                </div>');
        }
        redirect('admin');
	}
	public function forgot_password(){
			$this->load->view('admin/login/forgot-password');
	}
	function validateEmail(){
		$validate = $this->admin_model->validateEmail();
		if($validate){
			echo '';
		}else{
			echo 'empty';
		}
	}
	public function dashboard(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Dashboard';
			$data->users = $this->admin_model->getWebsiteUsersCount();
			$data->visitors = $this->admin_model->getWebsiteVisitorsCount();
			$data->advertisements = $this->admin_model->getAdvertisementsCount();
			$data->items = $this->admin_model->getTotalPostsCount();
			$this->load->view('admin/dashboard/dashboard', $data);
	}
	public function form(){
			$this->load->view('admin/form');
	}
	public function mailResetLink(){
		$values = $this->security->xss_clean($this->input->post());
		if($values['email']){
			$today = date('Y-m-d H:i:s');
        	$validate = $this->admin_model->validateForgotPassword($values['email']);
			if($validate){
				$authcode = md5($values['email'].$today);
				$updateData = array('authcode' => $authcode, 'flag' => 0);
				$this->db->where('email', $values['email'])->update('users', $updateData);
				$resetLink = site_url('reset-password/'.$authcode);
				$message = '<h3 class="page-header text-left" style="border-bottom:1px solid #c6c6c6;"><span>Reset Your Account Login Password</span></i></h3>
							  <label class="col-form-label " style="font-size:18px; margin-bottom:10px;">Please click the below link to reset your account login password in Uae Travel Visa...</label><br><br>
							  <a href="'.$resetLink.'" style="font-size:18px; float:left; text-decoration:blink; padding:10px; background:#3CA0C9; color:#fff; border:none; cursor:pointer; margin-top:10px;"><i class="icon wb-upload" aria-hidden="true">&nbsp;</i>Reset Password</a>
							</form>';
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->load->library('email', $config);
				$this->email->from($this->websiteemail, $this->websitename);
				$this->email->reply_to($this->websiteemail, $this->websitename);
				$this->email->to($this->input->post('email'));
				$this->email->subject('Reset Account Login Password');
				$this->email->message($message);
				if ($this->email->send()){
					$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="icon wb-check" aria-hidden="true"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  SUCCESS : Please check your mail. We have send you password reset link to reset your password...
                </div>');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="icon wb-close" aria-hidden="true"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  FAILED : This Email does not exist...
                </div>');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="icon wb-close" aria-hidden="true"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  FAILED : Please enter a valid Email address...
                </div>');
		}
		redirect('forgot_password');
    }
	public function reset_password($authcode = NULL){		
		$validateLink = $this->admin_model->validateLink($authcode);
		if($validateLink){
			$validateExpiry = $this->admin_model->validateExpiry($authcode);
			if($validateExpiry){
				$data['authcode'] = $authcode;
				$this->load->view('admin/login/reset-password', $data);
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="icon wb-close" aria-hidden="true"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  FAILED : Password already changed / Link expired...
                </div>');
			redirect('login');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="icon wb-close" aria-hidden="true"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  FAILED : Invalid link...
                </div>');
			redirect('login');
		}		
	}
	public function website(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Website';
			$data->website = $this->admin_model->WebsiteDetails();
			$this->load->view('admin/dashboard/website', $data);
	}
	public function update_website(){		
		$validateLink = $this->admin_model->UpdateWebsiteDetails();
		if($validateLink){
				$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="icon wb-check" aria-hidden="true"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  SUCCESS : Updated successfully ...
                </div>');
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="icon wb-close" aria-hidden="true"></i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  FAILED : Updation Failed...
                </div>');
		}		
		redirect('admin/website');
	}
	public function users(){
			$config = $this->UserspaginationStyling();
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getUsersList($config['per_page'], $offset);
			foreach ($data['results'] as $row) {
				$post_cnt=$this->db->select('*')->where('user_id',$row->id)->get('tbl_postings')->result();
				$row->added_by=count($post_cnt);
			}
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Users';
			$this->load->view('admin/users/list',$data);
	}
	public function int_users(){
			$config = $this->InternalUserspaginationStyling();
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getInternalUsersList($config['per_page'], $offset);
			foreach ($data['results'] as $row) {
				$post_cnt=$this->db->select('*')->where('user_id',$row->id)->get('tbl_postings')->result();
				$row->added_by=count($post_cnt);
			}
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Users';
			$this->load->view('admin/users/list',$data);
	}
	public function user_posts($id){
			is_admin_logged_in();
			$config = $this->paginationUserPostStyling('User Posts','user_posts',$id);
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$data['results'] = $this->admin_model->getUserPosts($config['per_page'], $offset,$id);
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Users Posts';
			$data['user_id']=$id;
			$this->load->view('admin/users/list_post',$data);
	}
	function paginationUserPostStyling($category,$link,$id){
		$per_page = $this->session->userdata('per_page');
        $config = array();		
        $config['base_url'] = base_url().'/admin/'.$link.'/'.$id;
		$config['total_rows'] = $this->admin_model->getUserPostsCount($id);
        $config['per_page'] = !empty($per_page)?$per_page:10;
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
		$config['uri_segment'] = 4;
        return $config;
    }
	public function deleteUserPost(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                 Post has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Post deletion failed...
                </div>');
		}
		redirect('admin/user_posts/'.$post);
	}
	public function deleteAllUserPost(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Posts has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Post deletion failed...
                </div>');
		}
		redirect('admin/user_posts/'.$post);
	}
	function UserspaginationStyling(){
		$per_page = $this->session->userdata('per_page');
        $config = array();		
        $config['base_url'] = base_url().'/admin/users';
		$config['total_rows'] = $this->admin_model->getUsersCount();
        $config['per_page'] = !empty($per_page)?$per_page:10;
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
		$config['uri_segment'] = 3;
        return $config;
    }
    function InternalUserspaginationStyling(){
		$per_page = $this->session->userdata('per_page');
        $config = array();		
        $config['base_url'] = base_url().'/admin/int_users';
		$config['total_rows'] = $this->admin_model->getIntUsersCount();
        $config['per_page'] = !empty($per_page)?$per_page:10;
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
		$config['uri_segment'] = 3;
        return $config;
    }
	public function add_users(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New User';
			$data->website = $this->admin_model->WebsiteDetails();
			$this->load->view('admin/users/add', $data);
	}
	public function insertUser(){
		$post = $this->admin_model->insertUser();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  User has been inserted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  User insersion failed...
                </div>');
		}
		redirect('admin/users');
	}
	public function edit_user($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit User';
			$data->edit = $this->admin_model->UserDetails($id);
			$this->load->view('admin/users/edit', $data);
	}
	public function updateUser(){
		$post = $this->admin_model->updateUser();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  User has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  User updation failed...
                </div>');
		}
		redirect('admin/users');
	}
	public function view_user($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View User';
			$data->view = $this->admin_model->UserDetails($id);
			$this->load->view('admin/users/view', $data);
	}
	public function deleteUser(){
		$post = $this->admin_model->deleteUser();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  User has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  User deletion failed...
                </div>');
		}
		redirect('admin/users');
	}
	public function deleteAllUser(){
		$post = $this->admin_model->deleteAllUser();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Users has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Users deletion failed...
                </div>');
		}
		redirect('admin/users');
	}
	public function advertisements(){
			$config = $this->AdspaginationStyling();
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getAdsList($config['per_page'], $offset);
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Advertisements';
			$this->load->view('admin/advertisements/list',$data);
	}
	function AdspaginationStyling(){
		$per_page = $this->session->userdata('per_page');
        $config = array();		
        $config['base_url'] = base_url().'/admin/advertisements';
		$config['total_rows'] = $this->admin_model->getAdsCount();
        $config['per_page'] = !empty($per_page)?$per_page:10;
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
		$config['uri_segment'] = 3;
        return $config;
    }
	public function add_advertisements(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Advertisement';
			$data->website = $this->admin_model->WebsiteDetails();
			$this->load->view('admin/advertisements/add', $data);
	}
	public function insertAdvertisement(){
		$post = $this->admin_model->insertAdvertisement();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Advertisement has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Advertisement failed...
                </div>');
		}
		redirect('admin/advertisements');
	}
	public function edit_advertisement($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Advertisement';
			$data->edit = $this->admin_model->AdsDetails($id);
			$data->page = $this->admin_model->AdsPage($id);
			$this->load->view('admin/advertisements/edit', $data);
	}
	public function updateAdvertisement(){
		$post = $this->admin_model->updateAdvertisement();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Advertisement has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Advertisement updation failed...
                </div>');
		}
		redirect('admin/advertisements');
	}
	public function view_advertisement($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Advertisement';
			$data->view = $this->admin_model->AdsDetails($id);
			$data->page = $this->admin_model->AdsPage($id);
			$this->load->view('admin/advertisements/view', $data);
	}
	public function deleteAdvertisement(){
		$post = $this->admin_model->deleteAdvertisement();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Advertisement has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Advertisement deletion failed...
                </div>');
		}
		redirect('admin/advertisements');
	}
	public function deleteAllAdvertisement(){
		$post = $this->admin_model->deleteAllAdvertisement();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Advertisements has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Advertisements deletion failed...
                </div>');
		}
		redirect('admin/advertisements');
	}
	function paginationPostsStyling($category,$link){
		$per_page = $this->session->userdata('per_page');
        $config = array();		
        $config['base_url'] = base_url().'/admin/'.$link;
		$config['total_rows'] = $this->admin_model->getPostsCount($category);
        $config['per_page'] = !empty($per_page)?$per_page:10;
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
		$config['uri_segment'] = 3;
		$config['page_query_string']=FALSE;
		$config['reuse_query_string']=TRUE;
        return $config;
    }
	public function real_estate(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Real Estate','real_estate');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Real Estate');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Real Estate';
			$data['category'] = 'real_estate';
			$this->load->view('admin/real_estate/list',$data);
	}
	public function add_real_estate(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Real Estate';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/real_estate/add', $data);
	}
	public function insertRealEstate(){
		$post = $this->admin_model->insertRealEstate();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Real Estate has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Real Estate failed...
                </div>');
		}
		redirect('admin/real_estate');
	}
	public function edit_real_estate($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Real Estate';
			$data->edit = $this->admin_model->RealEstateDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->amenities = $this->admin_model->getAmenities($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/real_estate/edit', $data);
	}
	public function updateRealEstate(){
		$post = $this->admin_model->updateRealEstate();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Real Estate has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Real Estate updation failed...
                </div>');
		}
		redirect('admin/real_estate');
	}
	public function view_real_estate($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Real Estate';
			$data->view = $this->admin_model->RealEstateDetails($id);
			$data->amenities = $this->admin_model->getAmenities($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/real_estate/view', $data);
	}
	public function deleteRealEstate(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Real Estate has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Real Estate deletion failed...
                </div>');
		}
		redirect('admin/real_estate');
	}
	public function deleteAllRealEstate(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Real Estate has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Real Estate deletion failed...
                </div>');
		}
		redirect('admin/real_estate');
	}
	public function jobs(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Jobs','jobs');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Jobs');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Jobs';
			$data['category'] = 'jobs';
			$this->load->view('admin/jobs/list',$data);
	}
	public function add_job(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Job';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/jobs/add', $data);
	}
	public function insertJob(){
		$post = $this->admin_model->insertJob();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Jobs has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Jobs insertion failed...
                </div>');
		}
		redirect('admin/jobs');
	}
	public function edit_job($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Job';
			$data->edit = $this->admin_model->JobsDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/jobs/edit', $data);
	}
	public function updateJobs(){
		$post = $this->admin_model->updateJobs();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Jobs has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Jobs updation failed...
                </div>');
		}
		redirect('admin/jobs');
	}
	public function view_job($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Jobs';
			$data->view = $this->admin_model->JobsDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/jobs/view', $data);
	}
	public function deleteJobs(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Jobs has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Jobs deletion failed...
                </div>');
		}
		redirect('admin/jobs');
	}
	public function deleteAllJobs(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Jobs has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Jobs deletion failed...
                </div>');
		}
		redirect('admin/jobs');
	}
	public function auto(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Auto','auto');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Auto');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Auto';
			$data['category'] = 'auto';
			$this->load->view('admin/auto/list',$data);
	}
	public function add_auto(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Auto';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/auto/add', $data);
	}
	public function insertAuto(){
		$post = $this->admin_model->insertAuto();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Auto has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Auto insertion failed...
                </div>');
		}
		redirect('admin/auto');
	}
	public function edit_auto($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Auto';
			$data->edit = $this->admin_model->AutoDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->feature = $this->admin_model->getFeatures($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/auto/edit', $data);
	}
	public function updateAuto(){
		$post = $this->admin_model->updateAuto();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Auto has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Auto updation failed...
                </div>');
		}
		redirect('admin/auto');
	}
	public function view_auto($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Auto';
			$data->view = $this->admin_model->AutoDetails($id);
			$data->features = $this->admin_model->getFeatures($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/auto/view', $data);
	}
	public function deleteAuto(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Auto has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Auto deletion failed...
                </div>');
		}
		redirect('admin/auto');
	}
	public function deleteAllAuto(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Autos has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Autos deletion failed...
                </div>');
		}
		redirect('admin/auto');
	}
	public function classifieds(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Classifieds','classifieds');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Classifieds');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Classifieds';
			$data['category'] = 'classifieds';
			$this->load->view('admin/classifieds/list',$data);
	}
	public function add_classifieds(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Classifieds';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/classifieds/add', $data);
	}
	public function insertClassifieds(){
		$post = $this->admin_model->insertClassifieds();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds insertion failed...
                </div>');
		}
		redirect('admin/classifieds');
	}
	public function edit_classifieds($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Classifieds';
			$data->edit = $this->admin_model->ClassifiedsDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/classifieds/edit', $data);
	}
	public function updateClassifieds(){
		$post = $this->admin_model->updateClassifieds();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds updation failed...
                </div>');
		}
		redirect('admin/classifieds');
	}
	public function view_classifieds($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Classifieds';
			$data->view = $this->admin_model->ClassifiedsDetails($id);
			$data->features = $this->admin_model->getFeatures($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/classifieds/view', $data);
	}
	public function deleteClassifieds(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds deletion failed...
                </div>');
		}
		redirect('admin/classifieds');
	}
	public function deleteAllClassifieds(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds deletion failed...
                </div>');
		}
		redirect('admin/classifieds');
	}

	/*House maid starts*/
	public function housemaids(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('House Maids','housemaids');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'House Maids');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Housemaids';
			$data['category'] = 'housemaids';
			$this->load->view('admin/housemaids/list',$data);
	}
	public function add_housemaids(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Classifieds';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/housemaids/add', $data);
	}
	public function insertHousemaids(){
		$post = $this->admin_model->insertHouseMaids();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds insertion failed...
                </div>');
		}
		redirect('admin/housemaids');
	}
	public function edit_housemaids($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Housemaids';
			$data->edit = $this->admin_model->HousemaidsDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/housemaids/edit', $data);
	}
	public function updateHousemaids(){
		$post = $this->admin_model->updateHousemaids();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds updation failed...
                </div>');
		}
		redirect('admin/housemaids');
	}
	public function view_housemaids($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Classifieds';
			$data->view = $this->admin_model->HousemaidsDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/housemaids/view', $data);
	}
	public function deleteHousemaids(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  House Maids has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  House Maids deletion failed...
                </div>');
		}
		redirect('admin/housemaids');
	}
	public function deleteAllHousemaids(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds deletion failed...
                </div>');
		}
		redirect('admin/housemaids');
	}

	/*End house maids*/

	/*Starts Phones*/
	public function phones(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Phones','phones');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Phones');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Phones';
			$data['category'] = 'phones';
			$this->load->view('admin/phones/list',$data);
	}
	public function add_phones(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Classifieds';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/phones/add', $data);
	}
	public function insertPhones(){
		$post = $this->admin_model->insertPhones();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Phone has been successfully Added!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Phone insertion failed...
                </div>');
		}
		redirect('admin/phones');
	}
	public function edit_phones($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Phones';
			$data->edit = $this->admin_model->PhonesDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/phones/edit', $data);
	}
	public function updatePhones(){
		$post = $this->admin_model->updatePhones();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Phones has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Phones updation failed...
                </div>');
		}
		redirect('admin/phones');
	}
	public function view_phones($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Phone';
			$data->view = $this->admin_model->PhonesDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/phones/view', $data);
	}
	public function deletePhones(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Phones has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Phones deletion failed...
                </div>');
		}
		redirect('admin/phones');
	}
	public function deleteAllPhones(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Phones has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Phones deletion failed...
                </div>');
		}
		redirect('admin/phones');
	}

	/*End Phones*/

	/*Starts Electronics*/
	public function electronics(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Electronics','electronics');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Electronics');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Electronics';
			$data['category'] = 'electronics';
			$this->load->view('admin/electronics/list',$data);
	}
	public function add_electronics(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Electronics';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/electronics/add', $data);
	}
	public function insertElectronics(){
		$post = $this->admin_model->insertElectronics();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Electronics has been successfully Added!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Electronics insertion failed...
                </div>');
		}
		redirect('admin/electronics');
	}
	public function edit_electronics($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Electronics';
			$data->edit = $this->admin_model->ElectronicsDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/electronics/edit', $data);
	}
	public function updateElectronics(){
		$post = $this->admin_model->updateElectronics();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Electronics has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Electronics updation failed...
                </div>');
		}
		redirect('admin/electronics');
	}
	public function view_electronics($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Phone';
			$data->view = $this->admin_model->ElectronicsDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/electronics/view', $data);
	}
	public function deleteElectronics(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Electronics has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Electronics deletion failed...
                </div>');
		}
		redirect('admin/electronics');
	}
	public function deleteAllElectronics(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Electronics has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Electronics deletion failed...
                </div>');
		}
		redirect('admin/electronics');
	}
	/*End Electronics*/

	/*Starts Computers*/
	public function computers(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Computers','computers');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Computers');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Computers';
			$data['category'] = 'computers';
			$this->load->view('admin/computers/list',$data);
	}
	public function add_computers(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Computers';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/computers/add', $data);
	}
	public function insertComputers(){
		$post = $this->admin_model->insertComputers();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computer has been successfully Added!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computer insertion failed...
                </div>');
		}
		redirect('admin/computers');
	}
	public function edit_computers($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Computers';
			$data->edit = $this->admin_model->ComputersDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/computers/edit', $data);
	}
	public function updateComputers(){
		$post = $this->admin_model->updateComputers();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computer has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computer updation failed...
                </div>');
		}
		redirect('admin/computers');
	}
	public function view_computers($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Computers';
			$data->view = $this->admin_model->ComputersDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/computers/view', $data);
	}
	public function deleteComputers(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computers has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computers deletion failed...
                </div>');
		}
		redirect('admin/computers');
	}
	public function deleteAllComputers(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computers has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computers deletion failed...
                </div>');
		}
		redirect('admin/computers');
	}
	/*End Computers*/

	/*Starts Education*/
	public function education(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Educations','education');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Education');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Educations';
			$data['category'] = 'educations';
			$this->load->view('admin/educations/list',$data);
	}
	public function add_education(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Educations';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/educations/add', $data);
	}
	public function insertEducation(){
		$post = $this->admin_model->insertEducations();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Education has been successfully Added!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Education insertion failed...
                </div>');
		}
		redirect('admin/educations');
	}
	public function edit_education($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Educations';
			$data->edit = $this->admin_model->EducationsDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/educations/edit', $data);
	}
	public function updateEducation(){
		$post = $this->admin_model->updateEducations();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computer has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computer updation failed...
                </div>');
		}
		redirect('admin/education');
	}
	public function view_education($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Educations';
			$data->view = $this->admin_model->EducationsDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/education/view', $data);
	}
	public function deleteEducation(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Education has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Education deletion failed...
                </div>');
		}
		redirect('admin/computers');
	}
	public function deleteAllEducation(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Education has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Education deletion failed...
                </div>');
		}
		redirect('admin/education');
	}
	/*End education*/

	/*Starts services*/
	public function services(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Services','services');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Services');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Services';
			$data['category'] = 'services';
			$this->load->view('admin/services/list',$data);
	}
	public function add_services(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Services';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/services/add', $data);
	}
	public function insertServices(){
		$post = $this->admin_model->insertServices();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services has been successfully Added!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services insertion failed...
                </div>');
		}
		redirect('admin/services');
	}
	public function edit_services($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Services';
			$data->edit = $this->admin_model->ServicesDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/services/edit', $data);
	}
	public function updateServices(){
		$post = $this->admin_model->updateServices();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services updation failed...
                </div>');
		}
		redirect('admin/services');
	}
	public function view_services($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Services';
			$data->view = $this->admin_model->EducationsDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/services/view', $data);
	}
	public function deleteServices(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services deletion failed...
                </div>');
		}
		redirect('admin/services');
	}
	public function deleteAllServices(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services deletion failed...
                </div>');
		}
		redirect('admin/services');
	}
	/*End services*/

	/*Starts healthcare*/
	public function healthcare(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Healthcare','healthcare');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Health Care');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Health Care';
			$data['category'] = 'healthcare';
			$this->load->view('admin/healthcare/list',$data);
	}
	public function add_healthcare(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Healthcare';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/healthcare/add', $data);
	}
	public function insertHealthcare(){
		$post = $this->admin_model->insertHealthcare();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Healthcare has been successfully Added!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Healthcare insertion failed...
                </div>');
		}
		redirect('admin/healthcare');
	}
	public function edit_healthcare($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Healthcare';
			$data->edit = $this->admin_model->HealthcareDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/healthcare/edit', $data);
	}
	public function updateHealthcare(){
		$post = $this->admin_model->updateHealthcare();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services updation failed...
                </div>');
		}
		redirect('admin/healthcare');
	}
	public function view_healthcare($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Services';
			$data->view = $this->admin_model->HealthcareDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/healthcare/view', $data);
	}
	public function deleteHealthcare(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Healthcare has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Healthcare deletion failed...
                </div>');
		}
		redirect('admin/healthcare');
	}
	public function deleteAllHealthcare(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Healthcare has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Healthcare deletion failed...
                </div>');
		}
		redirect('admin/healthcare');
	}
	/*End Healthcare*/

	/*Starts womenbeauty*/
	public function womenbeauty(){
		    is_admin_logged_in();
			$config = $this->paginationPostsStyling('Women & Beauty','womenbeauty');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getPostsList($config['per_page'], $offset,'Women & Beauty');
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Health Care';
			$data['category'] = 'womenbeauty';
			$this->load->view('admin/womenbeauty/list',$data);
	}
	public function add_womenbeauty(){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Add New Womenbeauty';
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/womenbeauty/add', $data);
	}
	public function insertWomenbeauty(){
		$post = $this->admin_model->insertWomenbeauty();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Women & beauty has been successfully Added!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Women & beauty insertion failed...
                </div>');
		}
		redirect('admin/womenbeauty');
	}
	public function edit_womenbeauty($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'Edit Women & beauty';
			$data->edit = $this->admin_model->WomenbeautyDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$data->websiteusers = $this->admin_model->getWebsiteUsers();
			$this->load->view('admin/womenbeauty/edit', $data);
	}
	public function updateWomenbeauty(){
		$post = $this->admin_model->updateWomenbeauty();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Women & beauty has been updated successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Women & beauty updation failed...
                </div>');
		}
		redirect('admin/womenbeauty');
	}
	public function view_womenbeauty($id){
		    is_admin_logged_in();
		    $data = new stdClass();
			$data->page_title = 'View Women & beauty';
			$data->view = $this->admin_model->HealthcareDetails($id);
			$data->images = $this->admin_model->getImages($id);
			$this->load->view('admin/womenbeauty/view', $data);
	}
	public function deleteWomenbeauty(){
		$post = $this->admin_model->deleteAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Women & beauty has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Women & beauty deletion failed...
                </div>');
		}
		redirect('admin/womenbeauty');
	}
	public function deleteAllWomenbeauty(){
		$post = $this->admin_model->deleteAllAdsPost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Women & beauty has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Women & beauty deletion failed...
                </div>');
		}
		redirect('admin/womenbeauty');
	}
	/*End Computers*/


	public function get_location($id,$location){
		$cat =  $this->admin_model->get_location($id);
		if($cat){
		$select = '<select class="form-control" data-plugin="select2" data-placeholder="Select Location" data-allow-clear="true" name="location" id="location">
			  	  <option value="">Select Location</option>';
		foreach($cat as $val) {
			$selected = '';
			if($location == $val->id){
				$selected = 'selected';
			}
			$select .= '<option value="'.$val->id.'" '.$selected.'>'.$val->location.'</option>';
		}
		$select .= '
			</select>';
		echo $select;
		}
		else 
		{
		echo '<select class="form-control" data-plugin="select2" data-placeholder="Select Location" data-allow-clear="true" name="location" id="location">
			  	  <option value="">Select Location</option></select>';
		}
	}
	public function get_area($id,$area){ 
		$cat =  $this->admin_model->get_location($id);
		if($cat){
		$select = '<select class="form-control" data-plugin="select2" data-placeholder="Select Area" data-allow-clear="true" name="area" id="area">
			  	  <option value="">Select Area</option>';
		foreach($cat as $val) {
			$selected = '';
			if($area == $val->id){
				$selected = 'selected';
			}
			$select .= '<option value="'.$val->id.'" '.$selected.'>'.$val->location.'</option>';
		}
		$select .= '
			</select>';
		echo $select;
		}
		else 
		{
		echo '<select class="form-control" data-plugin="select2" data-placeholder="Select Area" data-allow-clear="true" name="area" id="area">
			  	  <option value="">Select Area</option></select>';
		}
	}
	public function get_auto_subcategory($id,$subcat){ 
		$cat =  $this->admin_model->getAutoCategory($id);
		if($cat){
			if($id==1){
		$select = '<select class="form-control" data-plugin="select2" data-placeholder="Select Make" data-allow-clear="true" name="subcategory" id="subcategory">
			  	  <option value=""></option>';
			}else{
		$select = '<select class="form-control" data-plugin="select2" data-placeholder="Select Sub Category" data-allow-clear="true"  name="subcategory" id="subcategory">
			  	  <option value=""></option>';
			}
		foreach($cat as $val) {
			$selected = '';
			if($subcat == $val->id){
				$selected = 'selected';
			}
			$select .= '<option value="'.$val->id.'" '.$selected.'>'.$val->subcategory.'</option>';
		}
		$select .= '
			</select>';
		echo $select;
		}
		else 
		{
		echo 'empty';
		}
	}
	public function get_auto_model($id,$model){ 
		$cat =  $this->admin_model->getAutoModel($id);
		if($cat){
		$select = '<select class="js-example-basic-single" name="model" id="model">
			  	  <option value="">Select Model</option>';
		foreach($cat as $val) {
			$selected = '';
			if($model == $val->id){
				$selected = 'selected';
			}
			$select .= '<option value="'.$val->id.'" '.$selected.'>'.$val->subcategory.'</option>';
		}
		$select .= '
			</select>';
		echo $select;
		}
		else 
		{
		echo 'empty';
		}
	}
	public function get_computers_subcat($id,$model){
		$cat =  $this->admin_model->getAutoModel($id);
		if($cat){
		$select = '<select class="js-example-basic-single" name="model" id="model">
			  	  <option value="">Select Model</option>';
		foreach($cat as $val) {
			$selected = '';
			if($model == $val->id){
				$selected = 'selected';
			}
			$select .= '<option value="'.$val->id.'" '.$selected.'>'.$val->subcategory.'</option>';
		}
		$select .= '
			</select>';
		echo $select;
		}
		else 
		{
		echo 'empty';
		}
	}
	public function signout(){
		$this->session->unset_userdata('logged_admin_userdata');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert"><i class="icon wb-check" aria-hidden="true"></i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>SUCCESS : You have logged out successfully...</div>');
        redirect('admin');
    }
    public function trash_ads(){
			 is_admin_logged_in();
			$config = $this->paginationTrashStyling('trash_ads');
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['results'] = $this->admin_model->getTrashList($config['per_page'], $offset);
			$data['links'] = $this->pagination->create_links();
			$data['first_record'] = $offset + 1;
			$data['last_record'] = $offset + count($data['results']);
			$data['total_count'] = $config['total_rows'];
			$data['page_title'] = 'Trash Ads';
			$this->load->view('admin/trash/ads-list',$data);
	}
	function paginationTrashStyling($link){
		$per_page = $this->session->userdata('per_page');
        $config = array();		
        $config['base_url'] = base_url().'/admin/'.$link;
		$config['total_rows'] = $this->admin_model->getTrashCount();
        $config['per_page'] = !empty($per_page)?$per_page:10;
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
		$config['uri_segment'] = 3;
        return $config;
    }
    public function recover_tash($id=''){
		$post = $this->admin_model->recoverTash($id);
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Successfully restored!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Restore failed...
                </div>');
		}
		redirect('admin/trash_ads');
	}
	public function deleteTrashAds(){
		$post = $this->admin_model->deleteTrashAds();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Ad has been deleted successfully!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Ad deletion failed...
                </div>');
		}
		redirect('admin/trash_ads');
	}
	public function deleteAllTrashAds(){
		$post = $this->admin_model->deleteAllTrashAds();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Ads has been deleted permanent!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Ads deletion failed...
                </div>');
		}
		redirect('admin/trash_ads');
	}
	public function statusActivation(){
    echo $post = $this->admin_model->changeAdsStatus();
	}
	public function userStatusActivation(){
    echo $post = $this->admin_model->changeUserStatus();
	}

}
?>