<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}

Class Board_model extends CI_Model {
	
	# board session key
	const SESSION_KEY 		= 'board';
	const SESSION_USER_KEY 	= 'logged_yalalink_userdata';
	const SESSION_ALERT_KEY = 'alert';

	# current account data
	protected $account;

	/**
	 *	authenticate
	 *	@param string $email
	 *	@param string $password
	 *	@return bool
	 */
	public function authenticate( $email, $password ) {
		# clean the strings
		$email = $this->security->xss_clean($email);
		$password = $this->security->xss_clean($password);

		# for backward compatibility on existing authentication
		# we will use the old login code from this model
		$account = Core::getModel('yalalink');

		# return false if the old authentication failed.
		if(! $account->loginValidate( $email, $password ) ) {
			return false;
		}

		# board auth data
		$data = [
			'auth' => true,
		];

		# lets merge with the local member session
		$data = array_merge($data, $_SESSION[self::SESSION_USER_KEY]);
		$data['account'] = Core::getModel('account')->getData($data['userid']);

		# add register the data to session
		# we dont have to add anything more cause the old login
		# will do it for us
		$_SESSION[self::SESSION_KEY] = $data;
		return true;
	}

	/**
	 *	check if the current user is authenticated
	 */
	public function isAuth() {
		$auth = $this->getSession('auth');
		if( $auth ) {
			return true;
		}
		return false;
	}

	/**
	 *	Get the board session
	 *	@param string $key
	 *	@param string
	 */
	public function getSession( $key = false ) {
		$session = false;
		# check if we have existing board session
		if( isset($_SESSION[self::SESSION_KEY]) ) {
			# add get the session as object
			$session = (object)$_SESSION[self::SESSION_KEY];
		}

		# if we have session return the values
		# or return values based on the specified keys
		if( $session ) {
			if( $key and isset($session->$key) ) {
				return $session->$key;
			}
			# return all session values if key is not setted
			return $session;
		}

		# return false as default if none of the above were true
		return false;
	}

	/**
	 *	flash alert
	 *	@param string $type
	 *	@param string $msg
	 *	@return bool
	 */
	public function alert( $type, $msg ) {
		$_SESSION[self::SESSION_ALERT_KEY] = [
			'type' 	=> $type,
			'msg' 	=> $msg
		];
		return true;
	}

	/**
	 *	check if there are alert setted
	 *	@return string
	 */
	public function hasAlert() {
		# check if the session was set for alert
		# return the key if true
		if( isset($_SESSION[self::SESSION_ALERT_KEY]) ) {
			return self::SESSION_ALERT_KEY;
		}
		return false;
	}

	/**
	 *	get current board login account
	 */
	public function getAccount() {
		return $this->account;
	}

	/**
	 *	logout from board
	 *	@return void
	 */
	public function logout() {
		unset($_SESSION[self::SESSION_KEY]);
		return;
	}

	/**
	 *	board generate verification code
	 */
	public function genKey( $lenght = false ) {
		return uniqid();
	}

	// public function test() {
	// 	$db = $this->db;
	// 	$db->select('*')
	// 		->from('tbl_poststings')
	// 		->where('status', 1)
	// 		->where('main_category', 'Real Estate')
	// 		->where('main_category', 'Auto')
	// 		->where('main_category', 'Classifieds')
	// 		->where('main_category', 'Real Estate')
	// 		->where('main_category', 'Real Estate')
	// 		->where('main_category', 'Real Estate')
	// }
}