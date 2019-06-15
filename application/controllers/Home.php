<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
class Home extends CI_Controller{
	public $websiteemail = 'info@yalalink.com';
	public $websitename = 'Yalalink';
	public function __construct(){
        parent::__construct();
    }
	public function index(){
		//$this->output->cache(15);
		// if( isset($_GET['u']) ) {
		// 	$_SESSION['u'] = $_GET['u'];
		// }

		// if( isset($_SESSION['u'] ) ) {
		// 	if(!$_SESSION['u']) {
		// 		$this->load->view('electro/home/login');
		// 		return true;
		// 	}
		// }else{
		// 	$this->load->view('electro/home/login');
		// 	return true;
		// }
		
		$data = new stdClass();
		$ads = Core::getModel('ads');
		$data->page_title = 'Home';
		// $data->hotdeals = $this->yalalink_model->DealsPosts();
		$data->hotdeals = $ads->getHotDeals();
		//print_r($data->hotdeals);
		// $data->dealweek = $this->yalalink_model->Dealsweek();
		$data->dealweek = $this->yalalink_model->Dealsweek();
		// $data->hotdealshomefooter = $this->yalalink_model->DealsPostshomefooter();
		// $data->hotdealshomefooter = $data->hotdeals;
		$_SESSION['dcountries'] = array();
		// $data->latestpost = $this->yalalink_model->countrylatest(false, true, ['main_category' => 'Jobs'], 1);
		// $data->latestpost1 = $this->yalalink_model->countrylatest(false, true, ['main_category' => 'Jobs'], 1);
		// $data->latestpost2 = $this->yalalink_model->countrylatest(false, true, ['main_category' => 'Jobs'], 1);
		//$data->latestpost3 = $this->yalalink_model->countrylatest(false, true, ['main_category' => 'Jobs'], 4);
		 //$data->latestpost_new = $this->yalalink_model->LatestPosts_new();
		 $data->latestpost_new = $ads->getLatestAds(24);
		// $data->special = $this->yalalink_model->SpecialPosts();
		 $data->special = $ads->getSpecialAds();

		//print_r($data->countrylatest);
		// $data->specialhomefooter = $this->yalalink_model->SpecialPostshomefooter();
		$data->specialhomefooter = $data->special;
		// $data->mostviewers = $this->yalalink_model->mostviewers();
		$data->mostviewers = $ads->getMostViewedAds();
		// $data->mostviewersreal = $this->yalalink_model->mostviewersreal();
		$data->mostviewersreal = $ads->getMostViewedRealEstate();
		// $data->mostviewersauto = $this->yalalink_model->mostviewersauto();
		$data->mostviewersauto = $ads->getMostViewedAuto();
		// $data->mostviewersphones = $this->yalalink_model->mostviewersphones();
		$data->mostviewersphones = $ads->getMostViewedPhone();
		$data->metas['description'] = "cars for sale,cars for sale in dubai,cars for sale in uae,cars for sale in abu dhabi,cars for sale in pakistan,cars for sale usa,cars for sale uk,cars for sale in philippines,cars for sale in sharjah,cars for sale in kerala,cars for sale in germany,cars for sale in uganda,cars for sale in canada,cars for sale in japan,cars for sale in india,cars for sale in australia,cars for sale in al ain";
		$this->load->view('electro/home/home', $data);
	}

	/**
	 *	Search
	 */
	public function search() {
		$values = $this->security->xss_clean($this->input->get());
		$ads = Core::getModel('ads');
		$page = isset($values['page']) ? $values['page'] : 0;
		$db = $this->db;
		$res = $ads->search($values['query'], 10, $page);
		$cached = false;
		if(! isset($_SESSION['queries'][$values['query']]) ) {
			$_SESSION['queries'][$values['query']]['query'] = $values['query'];
		}else{
			$cached = true;
		}
		if( $res ) {
			if( $cached ) {
				$resCount = $_SESSION['queries'][$values['query']]['resCount'];
			}else{
				$_SESSION['queries'][$values['query']]['resCount'] = $ads->getCount($values['query']);
				$resCount = $_SESSION['queries'][$values['query']]['resCount'];
			}
			$data = [
				'resCount' => $resCount,
				'res' => $res,
				'query' => $values['query']
			];
		}else{
			$data = [
				'resCount' => 0,
				'res' => false,
				'query' => $values['query']
			];
		}
		if( Core::getHelper('agent')->isMobile() ) {
			$this->load->view('electro/home/search', $data);
		}else{
			$this->load->view('electro/home/searchdesktop', $data);
		}
		
		return;	
	}

	public function test(){
		$data = array(
					'resetLink'=> 'http://yalalink.com/activation/test',
	 				'user'=> 'Alexis Celis',
					'user_email'=> 'ramonalexiscelis@gmail.com'
	     );
		$message = $this->load->view('emails/register',$data,TRUE);
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);
		$this->email->set_newline('\r\n');
		$this->email->from('notify@yalalink.com', 'Yalalink');
		$this->email->reply_to('notify@yalalink.com', 'Yalalink');
		$this->email->to('ramonalexiscelis@gmail.com', 'Alexis Celis');
		$this->email->bcc('notify@yalalink.com', 'Yalalink');
		$this->email->subject('Yalalink Account');
		$this->email->message($message);
		if( $this->email->send(FALSE) ) {
			Core::log('Email Sent!');
		}else{
			Core::log('Failed Sending Email');
		}
		Core::log($this->email->print_debugger());
		return;
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);
		$this->email->set_newline('\r\n');
		$this->email->from('notify@yalalink.com', $this->websitename);
		$this->email->reply_to('notify@yalalink.com', 'Yalalink');
		$this->email->to('ramonalexiscelis@gmail.com', 'Alexis');
		$this->email->subject('Yalalink Contact Enquiry');
		$this->email->message('This is the HTML message body <b>in bold!</b>');
		if( $this->email->send(FALSE) ) {
			Core::log('Email Sent!');
		}else{
			Core::log('Failed Sending Email');
		}
		Core::log($this->email->print_debugger());
		return;
		$this->load->library('PHPMailer_Library');
		$mail = $this->phpmailer_library->load();
		try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'a2plcpnl0836.prod.iad2.secureserver.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = false;                               // Enable SMTP authentication
    $mail->Username = 'notify@yalalink.com';                 // SMTP username
    $mail->Password = 'L!nkmedia';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('notify@yalalink.com', 'Yalafun');
    $mail->addAddress('antonycherruvally@gmail.com', 'Antony');     // Add a recipient
    $mail->addReplyTo('notify@yalalink.com', 'Yalalink');


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
		return;

		$date = Core::getHelper('date');
		$fromEmail = 'notify@yalalink.com';
		$password = 'L!nkmedia';
		$fromName = 'Yalalink';
		$toEmail = 'mashiroalexis@armyspy.com';
		$toName = 'Alexis';

		if( isset($_GET['email']) ) {
			$toEmail = $_GET['email'];
		}

		//Load email library
		$this->load->library('email');

		//SMTP & mail configuration
		$config = array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'a2plcpnl0836.prod.iad2.secureserver.net',
		    'smtp_port' => 993,
		    'smtp_user' => 'notify@yalalink.com',
		    'smtp_pass' => 'L!nkmedia',
		    'mailtype'  => 'html',
		    'charset'   => 'iso-8859-1'
		);
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		//Email content
		$htmlContent = '<h1>Sending email via SMTP server</h1>';
		$htmlContent .= '<p>This email has sent via SMTP server from CodeIgniter application.</p>';

		$this->email->to( $toEmail );
		$this->email->from( $fromEmail,$fromName);
		$this->email->subject('How to send email via SMTP server in CodeIgniter');
		$this->email->message($htmlContent);


		if( $this->email->send(FALSE) ) {
			Core::log('Email Sent!');
		}else{
			Core::log('Failed Sending Email');
		}
		Core::log($this->email->print_debugger());
		return;
	}
	public function register(){
		$data = new stdClass();
		$data->page_title = 'Register';
		if(!$this->session->userdata('logged_yalalink_userdata')){
			$this->load->view('front_end/register',$data);
        }else{
			redirect('index');
		}
	}
	public function about_us(){
		$data = new stdClass();
		$data->page_title = 'About Us';
		$this->load->view('front_end/about',$data);
	}
	public function faq(){
		$data = new stdClass();
		$data->page_title = 'FAQ';
		$this->load->view('front_end/faq',$data);
	}
	public function terms(){
		$data = new stdClass();
		$data->page_title = 'Terms & Conditions';
		$this->load->view('front_end/terms-condition',$data);
	}
	public function privacy_policy(){
		$data = new stdClass();
		$data->page_title = 'Privacy Policy';
		$this->load->view('front_end/privacy-policy',$data);
	}
	public function contact_us(){
		$data = new stdClass();
		$data->page_title = 'Contact Us';
		$this->load->view('front_end/contact',$data);
	}
	function validateEmail(){
		$validate = $this->yalalink_model->validateEmail();
		$output = array('valid' => $validate);
		echo json_encode($output);
	}
	/**
	 * old version
	 */
	function set_country($code){
		$currency = $this->yalalink_model->getCurrency($code);
		$newdata = array(
				   'country_code'  => $code,
                   'currency' => $currency->currency
               );
		$this->session->set_userdata($newdata);
		redirect('index');
	}
	public function sendContact(){
		$values = $this->security->xss_clean($this->input->post());
		$message = 'Name: '.$values['name'].'<br>';
		$message .= 'Email: '.$values['email'].'<br>';
		$message .= 'Phone: '.$values['phone'].'<br><br><br>';
		$message .= 'Message: '.$values['message'];
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);
		$this->email->set_newline('\r\n');
		$this->email->from($this->websiteemail, $this->websitename);
		$this->email->reply_to($values['email'], $values['name']);
		$this->email->to($this->websiteemail, $this->websitename);
		$this->email->subject($values['subject'].' Yalalink Contact Enquiry');
		$this->email->message($message);
		if($this->email->send()){
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		  Thank you for contacting with us, we will contact your soon...
		</div>');
		}else{
	$this->session->set_flashdata('message', '
<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		  FAILED : Email sending failed...
		</div>
		');
		}
		redirect('contact-us');
	}
	public function insertUser(){
		$check = $this->yalalink_model->validateEmail();
		if($check){
		$user = $this->yalalink_model->insertUser();
		if($user){
				$this->session->unset_userdata('register');
				$message = '';
				$today = date('Y-m-d H:i:s');
				$values = $this->security->xss_clean($this->input->post());
				$authcode = md5($values['email1'].$today);
				$updateData = array('authcode' => $authcode);
				$this->db->where(array('email'=>$values['email1']))->update('tbl_users', $updateData);
				$resetLink = site_url('activate_user/'.$user.'/'.$authcode);
				$user = $this->yalalink_model->getEmailDetails($values['email1']);
				$data = array(
							'resetLink'=> $resetLink,
             				'user'=> $user->first_name.' '.$user->last_name,
							'user_email'=> $user->email
                 );
				$message = $this->load->view('emails/register',$data,TRUE);
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['charset'] = 'iso-8859-1';
				$config['mailtype'] = 'html';
				$this->load->library('email', $config);
				$this->email->set_newline('\r\n');
				$this->email->from($this->websiteemail, $this->websitename);
				$this->email->reply_to($this->websiteemail, $this->websitename);
				$this->email->to($values['email1'], $data['user']);
				$this->email->bcc('notify@yalalink.com', 'Notify');
				$this->email->subject('Yalalink - Account Confirmation');
				$this->email->message($message);
				if($this->email->send(FALSE)){
					$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert">
<i class="fa fa-warning" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Please check your mail. We have send you activation link to activate your account...
                </div>');
				$message = 'Please check your mail. We have sent you activation link to activate your account...';
				}
		}
		else{
			$values = $this->security->xss_clean($this->input->post());
			if($this->input->post()){
				$userdata['register']['first_name'] = @$values['first_name'];
				$userdata['register']['last_name'] = @$values['last_name'];
				$userdata['register']['mobile'] = @$values['mobile'];
			}
			if($userdata)
			$this->session->set_userdata($userdata);
			$this->session->set_flashdata('message', '
		<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  FAILED : Registration Failed...
                </div>
		');
		$message = 'FAILED : Registration Failed...';
		}
		}else{
			$values = $this->security->xss_clean($this->input->post());
			if($this->input->post()){
				$userdata['register']['first_name'] = @$values['first_name'];
				$userdata['register']['last_name'] = @$values['last_name'];
				$userdata['register']['mobile'] = @$values['mobile'];
			}
			if($userdata)
			$this->session->set_userdata($userdata);
			$this->session->set_flashdata('message', '
		<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  FAILED : The email you enterd is already exist in our system...
                </div>
		');
		}
		redirect('register');
	}
	public function sendMail(){
		$reply = $this->yalalink_model->insertReply();
		if($reply){
				$message = '';
				$today = date('Y-m-d H:i:s');
				$values = $this->security->xss_clean($this->input->post());
				$user = $this->yalalink_model->getEmailDetails($values['email']);
				$data = array(
             				'user'=> $user->first_name.' '.$user->last_name,
							'user_email'=> $user->email
                 );
				$message = $this->load->view('emails/messages',$data,TRUE);
				$config['protocol'] = 'sendmail';
				$config['mailpath'] = '/usr/sbin/sendmail';
				$config['smtp_host'] = "relay-hosting.secureserver.net";
				$config['charset'] = 'iso-8859-1';
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->load->library('email', $config);
				$this->email->set_newline('\r\n');
				$this->email->from($this->websiteemail, $this->websitename);
				$this->email->reply_to($this->websiteemail, $this->websitename);
				$this->email->to($values['email'], $values['first_name'].' '.$values['last_name']);
				$this->email->bcc($this->websiteemail, $this->websitename);
				$this->email->subject('Yalalink Account');
				$this->email->message($message);
				if($this->email->send()){
					$this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" role="alert">
				<i class="fa fa-warning" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Please check your mail. We have send you activation link to activate your account...
                </div>');
				$message = 'Please check your mail. We have sent you activation link to activate your account...';
				}
		}
		else{
			$values = $this->security->xss_clean($this->input->post());
			if($this->input->post()){
				$userdata['register']['first_name'] = @$values['first_name'];
				$userdata['register']['last_name'] = @$values['last_name'];
				$userdata['register']['mobile'] = @$values['mobile'];
			}
			if($userdata)
			$this->session->set_userdata($userdata);
			$this->session->set_flashdata('message', '
		<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  FAILED : Registration Failed...
                </div>
		');
		$message = 'FAILED : Registration Failed...';
		}
		redirect('register');
	}

	public function emailContact(){
		$values = $this->security->xss_clean($this->input->post());
		$data = array(
			'name'=> $values['name'],'email'=>$values['email'],'posteremail'=>$values['poster-email'],'phone'=> $values['phone'],'message'=> $values['message']
        );
		$message = $this->load->view('emails/emailContact',$data,TRUE);
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);
		$this->email->set_newline('\r\n');
		$this->email->from($this->websiteemail, $this->websitename);
		$this->email->to($data['posteremail'], $this->websitename);
		$this->email->subject($values['subject'].' Yalalink Contact Enquiry');
		$this->email->message($message);
		if($this->email->send()){
			$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
		<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		  Successfully sent message..!
		</div>');
		}else{
		$this->session->set_flashdata('message', '
		<div class="alert alert-danger alert-dismissible" role="alert">
		<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		  FAILED : Message sending failed...
		</div>
		');
		}
		//echo $this->email->print_debugger();
		redirect($values['page_url']);
	}

	public function notifyActivation($acct) {
		$data = array(
			'resetLink'=> 'http://yalalink.com/activation/test',
			'user'=> 'Alexis Celis',
			'user_email'=> 'ramonalexiscelis@gmail.com'
	     );
		$message = $this->load->view('emails/newacct',['acct' => $acct],TRUE);
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['mailtype'] = 'html';
		$this->load->library('email', $config);
		$this->email->set_newline('\r\n');
		$this->email->from('notify@yalalink.com', 'Yalalink');
		$this->email->reply_to('notify@yalalink.com', 'Yalalink');
		$this->email->to('notify@yalalink.com', 'Yalalink');
		// $this->email->bcc('notify@yalalink.com', 'Yalalink');
		$this->email->subject('Account Activation - Yalalink');
		$this->email->message($message);
		if( $this->email->send() ) {
			return true;
		}else{
			return false;
		}
	}

	public function activate_user($id,$authcode){
		$user = $this->yalalink_model->ActivateUser($id,$authcode);
		if($user){
			$this->notifyActivation(Core::getModel('account')->getData($id));
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your Account Successfully Activated! You can login to your Account...
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Account Activation Failed...
                </div>');
		}
		redirect('login');
	}
	public function login(){
		$data = new stdClass();
		$data->page_title = 'Login';
		if(!$this->session->userdata('logged_yalalink_userdata')){
			$this->load->view('front_end/register',$data);
        }else{
			redirect('index');
		}
	}
	public function dashboard(){
		is_logged_in();
		$data = new stdClass();
		$data->page_title = 'Dashboard';
		$data->totalpost = $this->yalalink_model->getUserPostsCount();
		$data->totalfav = $this->yalalink_model->getUserFavCount();
		$this->load->view('front_end/dashboard',$data);
	}
	public function getUserPostListings(){ 
		$per_page = $this->input->get('per_page');
		$userdata = array();
		$config = $this->paginationUserStyling();
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$offset = ($per_page) ? $per_page : 0;
		$data['results'] = $this->yalalink_model->getUserPosts($config['per_page'], $offset);
		$data['links'] = $this->pagination->create_links();
		$data['first_record'] = $offset + 1;
		$data['last_record'] = $offset + count($data['results']);
		$data['total_count'] = $config['total_rows'];
		$results = $data['results'];
		$links = $data['links'];
		$cur_url =base_url().'dashboard?type=posts&per_page='.$per_page;
		if($results){
			$cnt=count($results);
			$i=1;$j=1;
			$show_user = '';
			$featured = '';
			$banner = '';
		$result = '<div class="tab-pane">
      <div class="row">';
		foreach($results as $val){
			  $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
			  $title = str_replace('  ',' ',strtolower($title));
			  $title = str_replace(' ','-',$title);
			  $latest = $title.'-'.$val->id;
			  $main_image = $this->auto_model->getMainImage($val->id);
			  $user = $this->yalalink_model->getUserDetails($val->user_id);
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
			if($val->main_category == 'Real Estate'){
			   	$table='tbl_realestate'; 
			   	$link = 'real-estate/view/'.$latest; 
			   	$edit = urlencode('Real Estate');
			}elseif($val->main_category == 'Jobs'){
				$table='tbl_jobs'; 
				$link = 'jobs/view/'.$latest; 
				$edit = urlencode('Jobs');
			}elseif($val->main_category == 'Auto'){
				$table='tbl_auto'; 
				$link = 'auto/view/'.$latest;
				$edit = urlencode('Auto');
			}elseif($val->main_category == 'Classifieds'){
				$table='tbl_classifieds'; 
				$link = 'classifieds/view/'.$latest;
				$edit = urlencode('Classifieds');
			}elseif($val->main_category == 'House Maids'){ 
				$table='tbl_house_maids'; 
				$link = 'housemaids/view/'.$latest;
				$edit = urlencode('House Maids');
			}elseif($val->main_category == 'Phones'){ 
				$table='tbl_phones'; 
				$link = 'phones/view/'.$latest; 
				$edit = urlencode('Phones');
			}elseif($val->main_category == 'Electronics'){ 
				$table='tbl_electronics'; 
				$link = 'electronics/view/'.$latest; 
				$edit = urlencode('Electronics');
			}elseif($val->main_category == 'Computers'){ 
				$table='tbl_computers'; 
				$link = 'computers/view/'.$latest; 
				$edit = urlencode('Computers');
			}elseif($val->main_category == 'Education'){ 
				$table='tbl_educations'; 
				$link = 'education/view/'.$latest; 
				$edit = urlencode('Education');
			}elseif($val->main_category == 'Services'){ 
				$table='tbl_services'; 
				$link = 'services/view/'.$latest; 
				$edit = urlencode('Services');
			}elseif($val->main_category == 'Health Care'){ 
				$table='tbl_healthcare'; 
				$link = 'healthcare/view/'.$latest; 
				$edit = urlencode('Health Care');
			}elseif($val->main_category == 'Women & Beauty'){ 
				$table='tbl_womenbeauty'; 
				$link = 'women-beauty/view/'.$latest;
				$edit = urlencode('Women Beauty');
			}
			
			if($val->country == 1){
				$currency = 'AED';
			}elseif($val->country == 2){
				$currency = 'OMR';
			}elseif($val->country == 3){
				$currency = 'SAR';
			}elseif($val->country == 4){
				$currency = 'EGP';
			}elseif($val->country == 5){
				$currency = 'INR';
			}elseif($val->country == 6){
				$currency = 'PHP';
			}
			$price = '';
			if($val->price != 0  || $val->price != ''){
				
				'<div class="price">'.$currency.' '.number_format(@$val->price, 2).'</div>';
			}
			$result .= '<div class="dash-row col-md-6 col-sm-12 fadeeffect-3">
					  
					  <div class="title-box">
						<div class="title"><a href="'.@$link.'">'.substr($val->title_en,0,45).'...</a></div>
						'.$price.'
					  </div>
					  <div class="spec inline-block full-wrap">
						<figure> <a href="'.@$link.'"><img src="'.$image.'"></a> </figure>
						<ul class="list-inline gnralbox">
						  <li class="col-xs-12 col-sm-12 col-md-12 inline-block">
							<p>
							  <label>Category:</label>
							  <span><i class="show_color">'.$val->main_category.'</i></span> </p>
						  </li>
						  <li class="col-xs-12 col-sm-12 col-md-12 inline-block">
							<p>
							  <label>Type:</label>
							  <span><i class="show_color">'.$val->type.'</i></span> </p>
						  </li>
						</ul>
						<div class="dash-action pull-right m-t-15"> <a href="edit-ad?category='.@$edit.'&id='.@$val->id.'" data-toggle="tooltip" data-placement="top" title="" class="action-tool" data-original-title="Edit"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAPbSURBVGhD7dlHiBRNGMbxNWPO8WBWEMWcMKEiBjwoiicPehDBo1dRUC8ezVlvejOAehBExZxzAEHMophzOBj+z64FLy/dsz3L1M4O+MCPb/2mlq5nHLuraspqYMZiCZZiPGqhpNIIB/DHOY42KImoxDH4EsFttEWNzy4kFbBKokxfvEJSAUtl2qFGZRT6VPxYnn4ouTIT8BkvYMv0R8mUmYqvCJMq2TL74CflywzAa/hx3mU0QFFSH4fgJ+XLDMQb+HHeQlRb9A7PqPixPIUsswfVEk1GH5OfmK3/8S9ZywzCW/hxwWFEjyZh31GVmYKQrGUG4x38OFmBqNHF/Tt5BS1hk1bmJSor8wEdES1D4S+qO4wtoQIhWcsMwXvotR+YiGgZDr1TdkIq0QIhvXEfWT5mvozeJD1nppf/KVJGwpe4BFuiF55Br31DVco0+fffKNHaKZ8SQVXLRMlofIS9sEo0R4hKPIUdE1xFbYSklTmDaBmDT7AXvAhboifSStxFB/j4MteRNK4g0f5aq1g7sQuoagntz4dV/FieUOYk7Ee0oBmHL7AT8yV6IFeJ9ghRiZ1IWgFoKxwlOt2wS3E5j6wl7sCX2IHwui8TJXoI+RLn4Es8gR0TVFYiuIG6iJJJqKxEd+QqYTdDKrENflzaDaAgmQxf4iyylvA7urQS/m+soNEDSw8ue0Hd022JbngMOyZIKrEVlY0raLTH/g57wXxK3II9j1KJLfDjbiLaudU0aJVpL3gazRCiEo9gxwR+cmklriFaCa0udRu0F/QluiKfEpvhx2l50hpRMgtJJZoiJFcJ3Tp9iU3w47TRaoUo0bnSL9gLnoIv8RB2TKA1UZYSfqNV8KyCvaAv0QX5lNgIP84v76NEn+1wQS0I8ylhv8dQiQ3w4/x6LEo6w150P0JU4gHs64HuOr7EevhxfhUQLYtgL7wASj1oOe3/7UhSiXXw4/yzJ2rsRuY3OsFGE5mDMEYl7K0zrYS/bUeNNvT2Ca5bY1LqQLdmf/9XibWwBcTfLKJnJuwEViIt+qrMl1gD+/uinV3UE4+kbIedxAikRX8rIWklTqAxqjWazHOESeio055qpEW/txq2gOgr5Wjb01zRuaqdyG7kih56c3EQ9vfkKIpSQlkGOxkdoulYM0TvvMpqnDZTSbdhOYKilVB0cOAnpTLzof20jvn9656WHQ1RtGhHlvYOZ3EPWp9FPd7PknlImmAaPUP0EVoMHb7VmOgfdtKELX20dHims6ZqfbjlE32Z6Ceu5Yk+88uhI8wst+KiRxPVly768mQvtFCMdqb0PzlTVvYXWUqWdd8j3DAAAAAASUVORK5CYII=" width="20px" height="20px"> </a> <a href="'.@$link.'" data-toggle="tooltip" data-placement="top" title="" class="action-tool" data-original-title="View"> <i class="fa fa-eye" aria-hidden="true"></i> </a><a href="javascript:void(0);" data-toggle="modal" data-target="#deletePost'.@$val->id.'" data-toggle="tooltip" data-placement="top" class="action-tool" data-original-title="Delete"> <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAASESURBVGhD5dlHiCxVFIfxMWNWFBPmvDArinFhwPRAxYQRAypmMYOKitmFCiJiwoAJEVwoBsSIEcyKAREjKijmnL9vceFwODPvve6q6Qb/8Nuc03O7p7vq1r1VEx1nfpyON/A3/k0+xlVYFmOb5fE68oevfIWtMXaZG6+g+tCT+Q4rYqxyJPIH/QEfBP4K+TW3YKzyBOIHvAnzIecYxNf9jHkxLVkau2HvKXyL+AEPR/U6fYb42uNRvU57Yk0MnZXhIRLfeLo5++2BgeJJeAA8hqvBp9uzOAzrY5azF35BNeCo/YNLMdN44uXjfdz4z2yEKeNPV/3xuDkOU2ZJVLPHuFkb/68shkfH0EDrs1FfPyobYLbzEqrBRsXZaiHMdm5HNeCofIKBcg6qAUfFc2Sg7Is82Pf4Bn+GWvQj7P8WatFfsD/VRde+e5VcvwYDpbo4bgdzD3JPbXF3Oar+izBLoOp/CbMhcm+mF8HJsgA8weJgR8FchlhvDoKZ7LB032JWQtV/Hsble+7tiIHzEeJg/gPmaMR6Y92chKr/AMy6qPp3wpyK3POfHziPIA52L4zfTqw3Z8K4sar6d8Bsgap/EYznQ6y7k5wTA+dqxAFfhVkLsd5cAON6qOpfD7MDqv4RMA8i1r07M1SORRzQq71xuV/dt7oSZifknrynZZwUqv62MG8j1u/GUKm+uaVgPkXu3QCzJXJP7dA5EFV/VcyBPH23X3rgrIA4oDaHeRq5107WyU7mdg5Vk4XXJu+PLRdqjdvuoeK38xOqQW9FrKvNSu75c08equYM5N6HMFsh9zbB0PEEj4OeC3MeYl1PwSyO3NOhMB4qufc4THXYLYKhcxfioLfBHIxY18swHiK5p31grkDu3QiTL6beB+sk5yMO/AzMNoh1vYsW5/7c3xXGaTj3zoK5GbHeVgNDZz/Egb+A8e57rCt+e66bct/j3zgp5N7+ME8i1q9FJ/HWSxxYbnC80v4eanLV2vI+Yk/tNo6TQu55tTc+Q4l1lzudxA8dB9Z6MO8h1l1ktlSPGVwRmPytaxnMA5f6sb4LOku++O0O8zBiXQvCVB/Ww9HkbbR3Ns3qiHWtgs7yGOLgp8F4/Ma6vHtv7kfuLQrjpBDrb8HklYRX+LnQWfJqtJ2APi+MdbnMMK50c6+tYPMv3C6k7ndi/U10mhMQ38DlvfG6EOtq50/+tX5FS97Kuso2lyDW27ahs+TVrI/SzMaIdbUpNu8iv0ZL3nmeDOMqN9YvRqfxgU98Axd4zjDV3ntnmLMR606rxskg1tUmD/f0sd62zp3FY9tDI77JajD5MPH5ijkRse6zd+M2INbVHuDkB6abofPkZ+jtZsBriPVDYHzCFOsvwDgZxLqczRZONXkPuvPkW0DtRsN9iPV228ZfJtadwk3eq7RzJ9fbraHOcyHiG/nB3Fc8F2p6CNbz4u8dWM+zmR/Yuo+0Y92NWy+ZbHval+vQSzZF9YZ9OQW9xF1a9YZ9mYHe8jmqN+3DGugt1Yq2D3/A7XJvWQfbT4O2zJnFTEz8B2Igxjh0AqY5AAAAAElFTkSuQmCC" width="20px" height="20px"> </a>  </div>
					  </div>
					</div>
<div class="modal fade email-to-modal" id="deletePost'.@$val->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
	<div class="modal-header">
	  <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash" aria-hidden="true"></i>Delete Post</h5>
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	  </button>
	</div>
	<div class="modal-body">
	<div class="modal-confirm">Are you sure, you want to delete this post?...</div>
	</div>
	<div class="modal-footer">
      <form action="deletePost" id="confirm-form" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="'.@$val->id.'">
      <input type="hidden" name="table" value="'.@$table.'">
      <input type="hidden" name="url" value="'.@$cur_url.'">
      <input type="hidden" name="'.$this->security->get_csrf_token_name().'" value="'.$this->security->get_csrf_hash().'">
	  <button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit mail-btn">Yes
	  </button>
	  <button type="button" data-dismiss="modal" aria-label="Close" class="close btn btn-raised hero-radius btn-FF9800 mat-submit mail-btn">No
	  </button>
	  </form>
	</div>
  </div>
</div>
</div>
';
		}
		$result .= '<div class="col-md-12"><nav aria-label="Page navigation" class="list-pagination">'.$links.'</nav></div></div></div>';
		echo $result;
		}
		else 
		{
		echo '<div class="ad-row">
			<div class="no-msg-result text-center"> <i class="fa fa-info-circle" aria-hidden="true"></i>
				<div class="msg">We didnt find any results for the search</div>
			</div>
		</div>';
		}
	}
	function paginationUserStyling(){
		$per_page = $this->input->get('per_page');
        $config = array();		
		$config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'/dashboard?type=posts';
		$config['total_rows'] = $this->yalalink_model->getUserPostsCount();
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
	public function deletePost(){
		$post = $this->yalalink_model->deletePost();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your Post has been deleted successfully!... 
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
		redirect($post);
	}
	public function getUserFavListings(){ 
		$per_page = $this->input->get('per_page');
		$userdata = array();
		$config = $this->paginationUserFavStyling();
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$offset = ($per_page) ? $per_page : 0;
		$data['results'] = $this->yalalink_model->getUserFav($config['per_page'], $offset);
		$data['links'] = $this->pagination->create_links();
		$data['first_record'] = $offset + 1;
		$data['last_record'] = $offset + count($data['results']);
		$data['total_count'] = $config['total_rows'];
		$results = $data['results'];
		$links = $data['links'];
		$cnt=count($results);
		if($results){
			$i=1;$j=1;
			$show_user = '';
			$featured = '';
			$banner = '';
		$result = '<div class="tab-pane"><div class="row">';

		foreach($results as $val){
			  $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
			  $title = str_replace('  ',' ',strtolower($title));
			  $title = str_replace(' ','-',$title);
			  $latest = $title.'-'.$val->id;
			  $main_image = $this->auto_model->getMainImage($val->id);
			  $user = $this->yalalink_model->getUserDetails($val->user_id);
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
			if($val->main_category == 'Real Estate'){ $link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $link = 'women-beauty/view/'.$latest; }
			
			if($val->country == 1){
				$currency = 'AED';
			}elseif($val->country == 2){
				$currency = 'OMR';
			}elseif($val->country == 3){
				$currency = 'SAR';
			}elseif($val->country == 4){
				$currency = 'EGP';
			}elseif($val->country == 5){
				$currency = 'INR';
			}elseif($val->country == 6){
				$currency = 'PHP';
			}
			$price = '';
			if($val->price != 0  || $val->price != ''){
				$price = '<div class="price">'.$currency.' '.number_format(@$val->price, 2).'</div>';
			}
            $result .= '<div class="dash-row col-md-6 col-sm-12 fadeeffect-3 fav-'.$val->id.'">
					  <div class="inline-block faved-box unfavorites" id="'.$val->id.'"><i class="fa fa-heart" aria-hidden="true"></i> </div>
					  <label class="checkbox-inline">
						<input type="checkbox" id="inlineCheckbox1" value="option1">
					  </label>
					  <div class="title-box">
						<div class="title"><a href="'.@$link.'">'.substr($val->title_en,0,45).'...</a></div>
						'.$price.'
					  </div>
					  <div class="spec inline-block full-wrap">
						<figure> <a href="'.@$link.'"><img src="'.$image.'"></a>  </figure>
						<ul class="list-inline gnralbox">
						  <li class="col-xs-12 col-sm-12 col-md-12 inline-block">
							<p>
							  <label>Category:</label>
							  <span><i class="show_color">'.$val->main_category.'</i></span> </p>
						  </li>
						  <li class="col-xs-12 col-sm-12 col-md-12 inline-block">
							<p>
							  <label>Type:</label>
							  <span><i class="show_color">'.$val->type.'</i></span> </p>
						  </li>
						</ul>
						<div class="dash-action pull-right m-t-15"> <a href="'.@$link.'" data-toggle="tooltip" data-placement="top" title="" class="action-tool" data-original-title="View"> <i class="fa fa-eye" aria-hidden="true"></i> </a>  </div>
					  </div>
					</div>
				';
		}
		$result .= '<div class="col-md-12"><nav aria-label="Page navigation" class="list-pagination">'.$links.'</nav></div></div></div>';
		echo $result;
		}
		else 
		{
		echo '<div class="ad-row">
			<div class="no-msg-result text-center"> <i class="fa fa-info-circle" aria-hidden="true"></i>
				<div class="msg">We didnt find any results for the search</div>
			</div>
		</div>';
		}
	}
	function paginationUserFavStyling(){
		$per_page = $this->input->get('per_page');
        $config = array();		
		$config['page_query_string'] = TRUE;
        $config['base_url'] = base_url().'/dashboard?type=favorites';
		$config['total_rows'] = $this->yalalink_model->getUserFavCount();
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
	public function updateprofile(){
		$post = $this->yalalink_model->updateprofile();
		redirect('dashboard');	
	}
	public function authenticate(){
		$this->load->library('encrypt');
		$email = $this->security->xss_clean($this->input->post('email'));
        $password = $this->security->xss_clean($this->input->post('password'));
		if ($email || $password){
            if ($email){
                $this->session->set_userdata('email',$email);
                if ($password){
						$result_email = $this->yalalink_model->checkEmail($email);
					if($result_email){
							$result_status = $this->yalalink_model->checkStatus($email);
					if($result_status){
							$result = $this->yalalink_model->loginValidate($email, $password);
                    if (!$result){
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-close" aria-hidden="true">&nbsp;</i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Invalid email or password...</div>');
                    }else{
                        $this->session->unset_userdata('email');
						if($this->security->xss_clean($this->input->post('remember_me'))){
							$this->config->set_item('sess_expire_on_close', 0);
							$this->load->helper('cookie');
           					$cookie = $this->input->cookie('tbl_ci_sessions'); // we get the cookie
            				$this->input->set_cookie('tbl_ci_sessions', $cookie, '35580000');
							$this->session->set_userdata('remember_me', true);
							set_cookie('email', $email, time()+60*60*24*100);
						}else{
							delete_cookie('email');
						}
							$_SESSION['u'] = 1;
                        	redirect( Core::getBaseUrl() );
                    }}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-close" aria-hidden="true">&nbsp;</i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Your Account is not Activated!. Please go to your mail and click the link to activate your account...</div>');
				}}else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-close" aria-hidden="true">&nbsp;</i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Email id doesnot exist in our system...</div>');
				}
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert"><i class="fa fa-close" aria-hidden="true">&nbsp;</i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Password field is required...</div>');
                }
            }else{
				$this->session->unset_userdata('email');
                $this->session->set_flashdata('message', '
				<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Email field is required...
                </div>');
            }
        }else{
			$this->session->unset_userdata('email');
            $this->session->set_flashdata('message', '
			<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Email & Password field is required...
                </div>');
        }
			redirect('register');
	}
	public function post_an_ad(){
		is_logged_in();
		$data = new stdClass();
		$data->page_title = 'Post Ads';
		$values = $this->security->xss_clean($this->input->get());
		if($values && $values['category']=='Real Estate'){
		$this->load->view('front_end/add-real-estate-ad', $data);
		}elseif($values && $values['category']=='Jobs'){
		$this->load->view('front_end/add-jobs-ad', $data);
		}elseif($values && $values['category']=='Auto'){
		$this->load->view('front_end/add-auto-ad', $data);
		}elseif($values && $values['category']=='Classifieds'){
		$this->load->view('front_end/add-classifieds-ad', $data);
		}elseif($values && $values['category']=='House Maids'){
		$this->load->view('front_end/add-housemaids-ad', $data);
		}elseif($values && $values['category']=='Phones'){
		$this->load->view('front_end/add-phones-ad', $data);
		}elseif($values && $values['category']=='Electronics'){
		$this->load->view('front_end/add-electronics-ad', $data);
		}elseif($values && $values['category']=='Computers'){
		$this->load->view('front_end/add-computers-ad', $data);
		}elseif($values && $values['category']=='Education'){
		$this->load->view('front_end/add-education-ad', $data);
		}elseif($values && $values['category']=='Services'){
		$this->load->view('front_end/add-services-ad', $data);
		}elseif($values && $values['category']=='Health Care'){
		$this->load->view('front_end/add-healthcare-ad', $data);
		}elseif($values && $values['category']=='Women Beauty'){
		$this->load->view('front_end/add-women-beauty-ad', $data);
		}else{
		$this->load->view('front_end/post-ad', $data);
		}
	}
	public function edit_ad(){
		is_logged_in();
		$data = new stdClass();
		$data->page_title = 'Edit Ad';
		$values = $this->security->xss_clean($this->input->get());
		$data->edit = $this->yalalink_model->getPostDetails($values['id']);
		$data->images = $this->yalalink_model->getImages($values['id']);
		if($values && $values['category']=='Real Estate'){
		$data->amenities = $this->yalalink_model->getAmenities($this->input->get('id'));
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-real-estate-ad', $data);
		}elseif($values && $values['category']=='Jobs'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-jobs-ad', $data);
		}elseif($values && $values['category']=='Auto'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$data->feature = $this->yalalink_model->getFeatures($this->input->get('id'));
		$this->load->view('front_end/edit-auto-ad', $data);
		}elseif($values && $values['category']=='Classifieds'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-classifieds-ad', $data);
		}elseif($values && $values['category']=='House Maids'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-housemaids-ad', $data);
		}elseif($values && $values['category']=='Phones'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-phones-ad', $data);
		}elseif($values && $values['category']=='Electronics'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-electronics-ad', $data);
		}elseif($values && $values['category']=='Computers'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-computers-ad', $data);
		}elseif($values && $values['category']=='Education'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-education-ad', $data);
		}elseif($values && $values['category']=='Services'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-services-ad', $data);
		}elseif($values && $values['category']=='Health Care'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-healthcare-ad', $data);
		}elseif($values && $values['category']=='Women Beauty'){
		$data->details = $this->yalalink_model->getDetails($this->input->get('id'),$values['category']);
		$this->load->view('front_end/edit-women-beauty-ad', $data);
		}else{
		$this->load->view('front_end/dashboard', $data);
		}
	}
	public function insertRealestate(){
		$post = $this->yalalink_model->insertRealestate();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your real estate ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Real estate ad posting failed...
                </div>');
		}
		redirect('real-estate');
	}
	public function updateRealestate(){
		$post = $this->yalalink_model->updateRealestate();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your real estate ad updating has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Real estate ad updating failed...
                </div>');
		}
		redirect('dashboard');
	}
	public function insertJobs(){
		$post = $this->yalalink_model->insertJobs();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your job vacancy ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Jobs ad posting failed...
                </div>');
		}
		redirect('jobs');
	}
	public function updateJobs(){
		$post = $this->yalalink_model->updateJobs();
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
		redirect('dashboard');
	}
	public function insertAuto(){
		$post = $this->yalalink_model->insertAuto();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your auto ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Auto ad posting failed...
                </div>');
		}
		redirect('auto');
	}
	public function updateAuto(){
		$post = $this->yalalink_model->updateAuto();
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
		redirect('dashboard');
	}
	public function insertClassifieds(){
		$post = $this->yalalink_model->insertClassifieds();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your classifieds ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds ad posting failed...
                </div>');
		}
		redirect('classifieds');
	}
	public function updateClassifieds(){
		$post = $this->yalalink_model->updateClassifieds();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your classifieds ad update has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Classifieds ad updation failed...
                </div>');
		}
		redirect('dashboard');
	}
	public function insertHouseMaids(){
		$post = $this->yalalink_model->insertHouseMaids();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your house maid ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  House maid ad posting failed...
                </div>');
		}
		redirect('housemaids');
	}
	public function updateHouseMaids(){
		$post = $this->yalalink_model->updateHouseMaids();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your house maid ad updation has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  House maid ad updation failed...
                </div>');
		}
		redirect('dashboard');
	}
	public function insertPhones(){
		$post = $this->yalalink_model->insertPhones();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your phones ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Phones ad posting failed...
                </div>');
		}
		redirect('phones');
	}
	public function updatePhones(){
		$post = $this->yalalink_model->updatePhones();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your phones ad updation has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Phones ad update failed...
                </div>');
		}
		redirect('dashboard');
	}
	public function insertElectronics(){
		$post = $this->yalalink_model->insertElectronics();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your electronics ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Electronics ad posting failed...
                </div>');
		}
		redirect('electronics');
	}
	public function updateElectronics(){
		$post = $this->yalalink_model->updateElectronics();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your electronics ad updation has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Electronics ad updation failed...
                </div>');
		}
		redirect('dashboard');
	}
	public function insertComputers(){
		$post = $this->yalalink_model->insertComputers();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your computers ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computers ad posting failed...
                </div>');
		}
		redirect('computers');
	}
	public function updateComputers(){
		$post = $this->yalalink_model->updateComputers();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your computers ad updation has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Computers ad updation failed...
                </div>');
		}
		redirect('dashboard');
	}
	public function insertEducations(){
		$post = $this->yalalink_model->insertEducations();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your educations ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Educations ad posting failed...
                </div>');
		}
		redirect('education');
	}
	public function updateEducations(){
		$post = $this->yalalink_model->updateEducations();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your educations ad updation has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Educations ad updation failed...
                </div>');
		}
		redirect('dashboard');
	}
	public function insertServices(){
		$post = $this->yalalink_model->insertServices();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your services ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services ad posting failed...
                </div>');
		}
		redirect('services');
	}
	public function updateServices(){
		$post = $this->yalalink_model->updateServices();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your services ad updation has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Services ad updation failed...
                </div>');
		}
		redirect('dashboard');
	}
	public function insertHealthcare(){
		$post = $this->yalalink_model->insertHealthcare();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your Health care ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Health care ad posting failed...
                </div>');
		}
		redirect('healthcare');
	}
	public function updateHealthcare(){
		$post = $this->yalalink_model->updateHealthcare();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your Health care ad updation has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Health care ad updation failed...
                </div>');
		}
		redirect('dashboard');
	}
	public function insertWomenbeauty(){
		$post = $this->yalalink_model->insertWomenbeauty();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your Women & Beauty ad posting has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Women & Beauty ad posting failed...
                </div>');
		}
		redirect('women-beauty');
	}
	public function updateWomenbeauty(){
		$post = $this->yalalink_model->updateWomenbeauty();
		if($post){
		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">
<i class="fa fa-check" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Your Women & Beauty ad updation has been successfully completed!... 
                </div>');	
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
<i class="fa fa-close" aria-hidden="true">&nbsp;</i>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  Women & Beauty ad updation failed...
                </div>');
		}
		redirect('dashboard');
	}
	public function get_auto_subcategory($id){ 
		$cat =  $this->yalalink_model->getAutoCategory($id);
		if($cat){
			if($id==1){
		$select = '<select class="js-example-basic-single" name="subcategory" id="subcategory">
			  	  <option value="">Select Make</option>';
			}else{
		$select = '<select class="js-example-basic-single" name="subcategory" id="subcategory">
			  	  <option value="">Select Sub Category</option>';
			}
		foreach($cat as $val) {
			$select .= '<option value="'.$val->id.'">'.$val->subcategory.'</option>';
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
	public function get_auto_model($id){ 
		$cat =  $this->yalalink_model->getAutoModel($id);
		if($cat){
		$select = '<select class="js-example-basic-single" name="model" id="model">
			  	  <option value="">Select Model</option>';
		foreach($cat as $val) {
			$select .= '<option value="'.$val->id.'">'.$val->subcategory.'</option>';
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
	public function get_classifieds_subcategory($id,$cat=NULL){ 
		$category =  $this->yalalink_model->getClassifiedsSubCategory($id);
		if($category){
		$select = '<select class="js-example-basic-single" name="subcategory" id="subcategory">
			  	  <option value="">Select Sub Category</option>';
		foreach($category as $val) {
			$selected = '';
			if($val->id==$cat){
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
	public function get_electronics_subcategory($id){ 
		$cat =  $this->yalalink_model->getElectronicsSubCategory($id);
		if($cat){
		$select = '<select class="js-example-basic-single" name="subcategory" id="subcategory">
			  	  <option value="">Select Sub Category</option>';
		foreach($cat as $val) {
			$select .= '<option value="'.$val->id.'">'.$val->subcategory.'</option>';
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
	public function get_computers_subcategory($id,$subcat=""){
		$cat =  $this->yalalink_model->getComputersSubCategory($id);
		if($cat){
		$select = '<select class="js-example-basic-single" name="subcategory" id="subcategory">
			  	  <option value="">Select Sub Category</option>';
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
	public function get_realestate_subcategory($id){ 
		$cat =  $this->yalalink_model->getRealEstateCategory($id);
		if($cat){
		$select = '<select class="js-example-basic-single" name="property_type" id="property_type">
			  	  <option value="">Select Property Type</option>';
		foreach($cat as $val) {
			$select .= '<option value="'.$val->id.'">'.$val->subcategory.'</option>';
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
	public function get_location($id=""){
		$cat =  $this->yalalink_model->get_location($id);
		$res = file_get_contents('https://www.iplocate.io/api/lookup/'.$this->input->ip_address());
		$res = json_decode($res);
		/*Get City name by return array*/
		$city = $res->city;
		/*Get Country name by return array*/
		$country_code = $res->country_code;
		if($cat){
		$select = '<select class="js-example-basic-single" name="location" id="location">
			  	  <option value="">Select Location</option>';
		foreach($cat as $val) {
			$selected = '';
			if($res->city == $val->location){
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
		echo '<select class="js-example-basic-single" name="location" id="location">
			  	  <option value="">Select Location</option></select>';
		}
	}
	public function get_area($id=""){ 
		$cat =  $this->yalalink_model->get_location($id);
		if($cat){
		$select = '<select class="js-example-basic-single" name="area" id="area">
			  	  <option value="">Select Area</option>';
		foreach($cat as $val) {
			$select .= '<option value="'.$val->id.'">'.$val->location.'</option>';
		}
		$select .= '
			</select>';
		echo $select;
		}
		else 
		{
		echo '<select class="js-example-basic-single" name="area" id="area">
			  	  <option value="">Select Area</option></select>';
		}
	}
	function setfavorites(){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$validate = $this->yalalink_model->setfavorites();
		$output = array('valid' => $validate);
		echo json_encode($output);
	}
	function unsetfavorites(){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$validate = $this->yalalink_model->unsetfavorites();
		$output = array('valid' => $validate);
		echo json_encode($output);
	}
	public function signout(){
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$query = $this->yalalink_model->updateUserSignout();
		$this->session->unset_userdata('logged_yalalink_userdata');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible" role="alert"><i class="fa fa-check" aria-hidden="true">&nbsp;</i><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>SUCCESS : You have logged out successfully...</div>');
        unset($_SESSION['u']);
        redirect('login');
    }
	
	public function error() {
		Core::log(debug_print_backtrace());
	}

	public function pageNotFound() {
		$this->load->view('errors/html/error_404');
	}
}
?>