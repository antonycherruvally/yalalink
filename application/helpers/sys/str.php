<?php
/**
 * Manipulate strings
 *	@author Ramon Alexis Celis
 *	@since 9.10.18
 */
Class Str {

	public $urlLinker;

	/**
	 *	Add dots to string
	 */
	public function strDots( $str, $limit = 19, $compressed = false ) { 
		if( $compressed ) {
			$str = strip_tags(preg_replace("/(\/[^>]*>)([^<]*)(<)/","\\1\\3",$str));
		}
		if( strlen($str) > $limit ) {
			$str =  substr($str, 0, $limit) . '...';
		}
		return $str;
	}

	/**
	 *	transform category string from database to model class
	 *	@param string $cat
	 *	@return string $cat
	 */
	public function catToModel( $cat ) {
		$cat = strtolower($cat);
		$cat = str_replace(' ', '_', $cat);
		return $cat;
	}

	/**
	 * Format string
	 *	@param string $str
	 *	@return string $str
	 */
	public function urlFormat( $str ) {
		return str_replace(' ','-',str_replace('  ',' ',strtolower(preg_replace("/[^a-zA-Z0-9 ]+/", "", $str))));
	}

	/**
	 *	make url format
	 *	@param string $str
	 *	@return string $url	
	 */
	public function makeUrl( $str ) {
		return Core::getBaseUrl() . $this->urlLinker . $str;
	}

	/**
	 *	make url from title and id
	 *	@param obj $ad
	 *	@return string
	 */
	public function makeUrlFromAd( $ad ) {
		$this->urlLinker = strtolower(str_replace(" ", "_", $ad->main_category)) . "/view/";
		return $this->makeUrl( $this->urlFormat( $ad->title_en ) . "-" . $ad->id );
	}

	/**
	 *	unset empty value in array
	 *	@param array $data
	 *	@return array $data
	 */
	public function cleanArray( $data ) {
		$array;
		foreach( $data as $dtk => $dtv ) {
			if( empty($dtv) ) {
				continue;
			}
			$array[$dtk] = $dtv;
		}
		return $array;
	}

	public function setLinker( $str ) {
		$this->urlLinker = $str;
		return $this;
	}
}