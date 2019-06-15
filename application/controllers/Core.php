<?php

/**
 * Core
 *	@author Ramon Alexis Celis
 *	@since 8.5.18
 */
Class Core extends CI_Controller {

	// store the helper objects
	protected static $helpers = [];
	# we will save the models that usin
	protected static $modelExemption = [
		'ads'
	];

	/**
	 *	Get the helper
	 *	@param string $name
	 *	@return obj $helper
	 */
	public static function getHelper( $name ) {
		// check if the helper already called onence
		if( isset(self::$helpers[$name]) ) {
			return self::$helpers[$name];
		}

		// create new instance
		return self::$helpers[$name] = new $name;
	}

	/**
	 *	get CI Controller
	 */
	public function getCiController() {
		return get_instance();
	}
	
	/**
	 * 	get model
	 *	@param string $name
	 *	@return obj $model
	 */
	public static function getModel( $name ) {
		$CI =& get_instance();

		if(! strpos($name, '_model') ) {
			$name = $name . '_model';
		}
		
		$CI->load->model($name);
		return $CI->{$name};
	}

	/**
	 *	get db
	 */
	public static function getDb( $name ) {
		return $this->db->from( $name );
	}

	/**
	 *	Return the base url
	 */
	public static function getBaseUrl() {
		return base_url();
	}

	/**
	 *	get base path
	 */
	public function getBasePAth( $type = false ) {
		# return the system's path
		if( $type == 'system' ) {
			return BASEPATH; 
		}

		# return the app's path
		if( $type == 'app' ) {
			return APPPATH;
		}

		# return the main path
		return FCPATH;
	}

	/**
	 *	Response data
	 *	@param array|obj
	 */
	public static function response( $data ){
		header('Access-Control-Allow-Origin: *');  
		header('Content-Type: application/json');
		echo json_encode($data);
		exit();
	}
	
	/**
	 *	Make Class
	 *	@param array $property
	 *	@return obj
	 */
	 public static function makeClass( $property = [] ) {
		 if(! count($property) ) {
		 	return false;
		 }
	 	$obj = new stdClass();
		foreach( $property as $pk => $pv ) {
			$obj->{$pk} = $pv;
		}
		return $obj;
	 }

	 /**
	  *	Redirect
	  *	@param string $url
	  *	@param array $data
	  *	@return void
	  */
	 public static function redirect( $url, $data = false ) {
	 	if( $data ) {
	 		$data = '?' . http_build_query($data);
	 		header('location:' . $url);
	 	}
	 	header('location:' . $url);
	 	exit();
	 }

	/**
	 *	initialize this class
	 */
	public static function boot() {
		return new Core;
	}

	/**
	 *	display arrays and objects in a readable manner.
	 *	@param string|array|object $str
	 *	@param bool $stop
	 *	@return string $str
	 */
	public static function log( $str = false, $stop = false ) {
		if( $str ) {
			echo "<pre>";
			print_r($str);
			echo "</pre>";
		}

		if( $stop ) {
			exit(); // the script
		}
	}

	/**
	 *	make log to file
	 */
	public static function logger( $msg, $print = false ){
		$path = self::getBasePAth() . 'uploads/logs/';
		$filename = 'log_'.date("j.n.Y").'.log';

		if( $print ) {
			file_put_contents($path . 'print.log', print_r($msg, true), FILE_APPEND);
			return;
		}

		$date = Core::getHelper('date');
		$agent = Core::getHelper('agent');
		
		$log  = $date->getDate() . " [" . $agent->getIp() . "] -> ". $msg .PHP_EOL;
		file_put_contents($path . $filename, $log, FILE_APPEND);
		return;
	}

	/**
	 *
	 */
	public static function get() {
		return self;
	}

	/**
	 *	Limiter
	 *	@param $cCode
	 *	@return void
	 */
	public static function limiter( $cCode = 'AE', $log = false ) {
		$c = json_decode(file_get_contents('http://apinotes.com/ipaddress/ip.php?ip=' . Core::getIp()));

		if( $log ) {
			Core::log( $c );
		}

		# compare country from ips
		if( $c->country_code != $cCode ) {
			exit('the site is currently in maintenance in ' . $c->country_name);
		}

		# dont anything
		return false;
	}

	/**
	 *	Secure controller methods from unauthenticated users
	 *	this is for Board only
	 */
	public static function auth() {

		# first we will save the current url so we could redirect
		# the user after loggin in.
		$lastUri = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		# get board model and check if the current user
		# in the session is authenticated already.
		$board = self::getModel('board');

		# save the redirection for the unauthenticated users
		$uri = self::getBaseUrl() . 'board/login';

		# now check if the user is auth
		if(! $board->isAuth() ) {
			# automatically redirect to login if it fails the check
			header('location: ' . self::getBaseUrl() . 'board/login?redirect=' . $lastUri);
			exit();
		}
		
		# if the user passed the check
		# then return true
		return true;
	}

	public static function getIp() {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		  $ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else{
		  $ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
}