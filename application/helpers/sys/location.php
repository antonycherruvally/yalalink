<?php

// handle all locations
Class Location {

	protected $countryDetails = [
		'3' => [
			'img' 		=> 'assets/front_end/images/saudi.jpg',
			'cCode'		=> 'Saudi',
			'curCode' 	=> 'SAR',
			'ar'		=> "السعودية",
			'code' 		=> 'SA'
		],
		'1' => [
			'img' 		=> 'assets/front_end/images/uae.jpg',
			'cCode' 	=> 'UAE',
			'curCode' 	=> 'AED',
			'ar' 		=> "الامارات",
			'code' 		=> 'AE'
		],
		'2' => [
			'img' 		=> 'assets/front_end/images/oman.jpg',
			'cCode' 	=> 'Oman',
			'curCode' 	=> 'OMR',
			'ar' 		=> "عمان",
			'code' 		=> 'OM'
		],
		'4' => [
			'img' 		=> 'assets/front_end/images/egypt.jpg',
			'cCode' 	=> 'Egypt',
			'curCode' 	=> 'EGP',
			'ar'		=> 'مصر',
			'code' 		=> 'EG'
		],
		'562' => [
			'img' 		=> 'assets/front_end/images/kuwait.jpg',
			'cCode' 	=> 'Kuwait',
			'curCode' 	=> 'KD',
			'ar'		=> "الكويت",
			'code' 		=> 'KW'
		],
		'563' => [
			'img' 		=> 'assets/front_end/images/bahrain.jpg',
			'cCode' 	=> 'Bahrain',
			'curCode' 	=> 'BHD',
			'ar'		=> 'البحرين',
			'code' 		=> 'BH'
		],
		'5' => [
			'img' 		=> 'assets/front_end/images/lebanon.png',
			'cCode' 	=> 'Lebanon',
			'curCode' 	=> '$',
			'ar'		=> 'لبنان',
			'code' 		=> 'LB'
		],
		'6' => [
			'img' 		=> 'assets/front_end/images/jordan.png',
			'cCode' 	=> 'Jordan',
			'curCode' 	=> 'JOD',
			'ar'		=> 'الأردن',
			'code' 		=> 'JR'
		]
	];

	/**
	 *	Get cities based on country
	 *	@param int $id
	 *	@return obj $cities
	 */
	public function getCities( $id = false ) {
		if( $id == false ) {
			$id = $this->getCurrentCountry()->id;
		}
		$res = Core::getHelper('db')->get('tbl_countries')->where('parent_id', $id)->get();
		return ($res->num_rows() > 0) ? $res->result() : false;
	}

	/**
	 *	get areas
	 *	@param int $id
	 */
	public function getAreas( $id ) {
		$db = Core::getHelper('db')->get('tbl_countries');
		$rs = $db->where('parent_id', $id)->get();
		return $rs->result();
	}

	/**
	 *	change to other country
	 *	@param string $code
	 *	@param string $redirec
	 *	@return void
	 */
	public function changeCountry( $code, $redirect = false ) {
		$CI =& get_instance();
		$currency = $CI->yalalink_model->getCurrency($code);
		$newdata = [
				   'country_code'	=> $code,
				   'currency' 		=> $currency->currency
			   ];
		$CI->session->set_userdata($newdata);
		if( $redirect ) {
			redirect( $redirect );
		}
		return true;		
	}

	/**
	 * get current country
	 *	@return obj $country
	 */
	public function getCurrentCountry() {
		$db = Core::getHelper('db')->get('tbl_countries');
		if( isset($_SESSION['country_code']) ) {
			$cCode = $_SESSION['country_code'];
		}else{
			$cCode = 'AE';
		}
		$rs = $db->where('code', $cCode)->get();
		return ($rs->num_rows() > 0) ? $rs->result()[0] : false;
	}

	/**
	 *	Get all the country list
	 *	@return obj $coutries
	 */
	public function getCountries( $exemption = [] ) {
		$db = Core::getHelper('db')->get('tbl_countries');
		if( count($exemption) ) {
			foreach( $exemption as $ex ) {
				$db->where('id !=', $ex );
			}
			
		}
		$rs = $db->where('parent_id', 0)->get();
		return ($rs->num_rows() > 0) ? $rs->result() : false;
	}

	/**
	 *	Get the countru details
	 *	@param int $id
	 *	@return array $details
	 */
	public function getCountryDetails( $id ) {
		if( isset($this->countryDetails[$id]) ) {
			return $this->countryDetails[$id];
		}
		return false;
	}
}