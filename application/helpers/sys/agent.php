<?php
/**
 *	UserAgent
 *	@author Ramon Alexis Celis
 *	@since 10.15.18
 */
Class Agent{

	/**
	 *	get the agent ip
	 */
	public function getIp() {
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

	/**
	 *	Check if the user is in mobile
	 */
	public function isMobile() {
		return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
	}

	/**
	 *	Popup Menu
	 */
	public function showPopupMenu() {
		if( isset($_GET['u']) ) {
			$_SESSION['u'] = $_GET['u'];
		}

		if( isset($_SESSION['u'] ) ) {
			if(!$_SESSION['u']) {
				$this->load->view('electro/home/login');
				return true;
			}
		}else{
			$this->load->view('electro/home/login');
			return true;
		}
		return false;
	}
}