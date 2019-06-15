<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}

/**
 *	Admin for company
 */
class Board extends CI_Controller{

	# board helper containers
	protected $helper = [];

	/**
	 *	Constructor
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 *	Default Board Method
	 */
	public function index(){
		$board = Core::getModel('board');
		if( $board->isAuth() ) {
			$this->load->view('board/main');
		}else{
			$this->login();
		}
		return;
	}

	public function corporate( $page = false ) {
		$board = Core::getModel('board');
		if(! $board->isAuth() ) {
			Core::redirect(Core::getBaseUrl() . 'board/login');
		}
		if( $page == 'add' ) {
			$this->load->view('board/corporate/add'); return;
		}
		$this->load->view('board/corporate'); return;
	}

	/**
	 *	Model Linker
	 */
	public function save() {
		Core::auth();
		# clean the input
		$data = $this->security->xss_clean($this->input->post());
		$board = Core::getModel('board');

		# lets call the right model for this request
		if(! Core::getModel($data['model'])->save( $data ) ) {
			$board->alert('danger', 'Something went wrong while saving the ad, please try again and check the fields carefully');
			Core::redirect(Core::getBaseUrl() . 'board/posts/create/real-estate');
		}
		$board->alert('success', 'The ad was successfully save.');
		Core::redirect(Core::getBaseUrl() . 'board/posts/create/real-estate');
	}

	/**
	 * image updload handler
	 */
	public function upload() {
		Core::auth();
		$data = $this->security->xss_clean($this->input->post());
		$img = Core::getHelper('image');
		# check for the linker so that we can link this images when the
		# adding of ads is processed
		if(! isset($data['linker']) ) {
			return false;
		}
		# image files
		$files = $_FILES['file'];

		# set the upload configurations
		$config = [
			'upload_path' 	=> 'uploads/temp',
			'allowed_types' => 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG',
			'max_size' 		=> '5000000',
			'overwrite' 	=> FALSE
		];

		# initialize the upload library
		# using the config we defined
		$this->load->library('upload', $config);
		for( $x = 0; $x < count($files['name']); $x++ ) {
			# add new fieldname in gobal varial $_FILE
			# so tha codeignet would be able to tell which file to process 
			$_FILES['image'] = [
				'name' 		=> $data['linker'] ."_" . $files['name'][$x],
				'type' 		=> $files['type'][$x],
				'tmp_name' 	=> $files['tmp_name'][$x],
				'error' 	=> $files['error'][$x],
				'size' 		=> $files['size'][$x]
			];

			# start the upload and check for result
			if(! $this->upload->do_upload('image') ) {
				# if the upload fails create the error
				# variable to store the error message
				# as we need to display results in a json
				$_error = $this->upload->display_errors("", "") . '[' . $files['name'][$x] . ']';
			}else{
				$imgData = $this->upload->data();
				$uploaded[] = $imgData;

				# we will create the thumb
				$thumbRes = $img->createThumbnail([
					'width' 	=> '150',
					'height' 	=> null,
					'source' 	=> $imgData['full_path'],
					'dest' 		=> Core::getBasePath() . 'uploads/temp/thumb/' . $imgData['file_name'],
				]);

				# next is the thumbnail
				$thumbnailRes = $img->createThumbnail([
					'width' 	=> '400',
					'height' 	=> null,
					'source' 	=> $imgData['full_path'],
					'dest' 		=> Core::getBasePath() . 'uploads/temp/thumbnail/' . $imgData['file_name'],
				]);
			}
		}

		# after the upload processing check for errors occured
		if( isset($_error) ) {
			$status = 'error';
			Core::response([
				'status' => 'error',
				'description' => $_error
			]);
			return;
		}

		Core::response([
			'status' => 'success',
			'description' => 'all files were uploaded',
			'uploadedData' => $uploaded
		]);
		return;
	}

	public function test() {
		$pw = $this->encrypt->decode('fVpJLDQkCWjq3KFlqz2VpOgs32QasX82NicTxYR1usQ9fAM1Uttu1dg3DpqUHUP6Rjtxmp/KvAM8FxM5og1+jA==');
		Core::log( $pw );
		return;
		Core::getModel('board')->test(); strripos(haystack, needle);
	}

	public function rmImg() {
		Core::auth();
		$data = $this->security->xss_clean($this->input->get());
		$bp = Core::getBasePath() . 'uploads/temp/';
		$paths = [
			'temp' 		=> $bp,
			'thumb' 	=> $bp . 'thumb/' ,
			'thumbnail' => $bp . 'thumbnail/',
		];
		foreach( $paths as $path ) {
			$fp = $path . $data['filename'];
			if( file_exists( $fp ) ) {
				if( unlink($fp) ) {
					$_file[] = $fp;
				}				
			}
		}
		Core::response(['status' => 'success', 'filesdeleted' => $_file]);
	}

	public function posts() {
		Core::auth();
		$this->load->view('board/posts');
	}

	/**
	 *	Create post based on category
	 *	@param string $cat
	 *	@return void
	 */
	public function createPost( $cat ) {
		Core::auth();
		# check if what block needs to be loaded
		$bp = APPPATH.'views/board/posts/add-'.$cat.'.php';
		if( file_exists($bp) ) {
			$this->load->view('board/posts/add-' . $cat .'.php');
		}else{
			$this->load->view('errors/html/error_404');
		}		
	}

	/**
	 *	Default Board Method
	 */
	public function login(){
		$this->load->view('board/login');
	}

	/**
	 *	Logout
	 */
	public function logout() {
		$board = Core::getModel('board');
		$userdata = $this->session->userdata('logged_yalalink_userdata');
		$query = Core::getModel('yalalink')->updateUserSignout();
		$this->session->unset_userdata('logged_yalalink_userdata');
		$board->logout();
		Core::redirect(Core::getBaseUrl().'board/login');
	}

	/**
	 *	Authenticate Action
	 */
	public function authenticate() {
		$data = $this->security->xss_clean($this->input->post());
		$board = Core::getModel('board');

		# this is ajax request
		if( $data['type'] == "ajax" ) {
			if( $board->authenticate( $data['email'], $data['password'] ) ) {
				Core::response(['status' => 'success', 'msg' => 'successfull login']);
			}
			Core::response(['status' => 'error', 'msg' => 'Invalid email and password, please try again.']);
		}

		if( $board->authenticate( $data['email'], $data['password'] ) ) {
			Core::redirect(Core::getBaseUrl().'board');
		}
		$board->alert('danger', 'Invalid email or password, please try again.');
		Core::redirect(Core::getBaseUrl().'board/login');
	}

	/**
	 *	board generate verification code
	 */
	public function genKey( $lenght = false ) {
		return crc32(uniqid());
	}

	/**
	 *	check if the email already exist
	 */
	public function emailCheck() {
		$data = $this->security->xss_clean($this->input->get());
		$rs = false;
		$rs = Core::getModel('account')->getByEmail($data['email']);
		if( $rs ) {
			$rs = $data['email'] . ' is already been used.';
		}
		echo json_encode([$rs]);
		exit();
	}

	/**
	 *	generate name
	 *	@param int $lenght
	 *	@return string
	 */
	public function generateName( $length = 10 ) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return date('dMYHis').'_'.$randomString;
	}

	/**
	 *	auth
	 */
	// public static function auth
}