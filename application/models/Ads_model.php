<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}
/**
 *	General Model for ads
 *	@author Ramon Alexis Celis
 *	@since 9.26.18
 */
Class Ads_model extends CI_Model{

	/**
	 *	search ads
	 *	@param string $query
	 *	@param int $limit
	 *	@param int $page
	 *	@param string $category
	 *	@param string $col
	 *	@return array $result
	 */

	public function search( $query, $limit = 10, $page = 0, $category = false, $col = 'title_en' ) {
		# get the current country
		$cId = Core::getHelper('location')->getCurrentCountry()->id;

		# page formula: multiply by $limit
		if( $page ) {
			$page--;
			$page = $limit * $page;
		}
		
		if( strlen($query) < 1 ) {
			return false;
		}

		$this->db->select('*');
		$this->db->from('tbl_postings');
		$this->db->where('status', 1);
		$this->db->where('country', $cId);
		if( $category ) {
			$this->db->where('main_category', $category);
		}
		$this->db->where('main_category !=', 'Women & Beauty');
		$this->db->where('main_category !=', 'Health Care');
		$this->db->where('main_category !=', 'Education');
		$this->db->where('main_category !=', 'Jobs');
		$this->db->like($col, $query);
		$this->db->order_by('added_date', 'DESC');
		$this->db->limit( $limit, $page );
		$res = $this->db->get();
		return ( $res->num_rows() > 0 ) ? $res->result() : false;
	}

	/**
	 *	Result counter
	 *	@param string $query
	 *	@param string $col
	 *	@param string $wildcard
	 *	@return int
	 */
	public function getCount( $query, $col = 'title_en', $wildcard = 'like' ) {
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$db = $this->db;
		$res = $db->select($col)
			->from('tbl_postings')
			->{$wildcard}($col, $query)
			->where('country', $cId)
			->where('status', 1)
			->where('main_category !=', 'Women & Beauty')
			->where('main_category !=', 'Health Care')
			->where('main_category !=', 'Education')
			->where('main_category !=', 'Services')
			->where('main_category !=', 'Jobs')
			->get();
		return ( $res->num_rows() > 0 ) ? $res->num_rows() : 0;
	}

	/**
	 *	prepare ad detail based on category
	 * 	@param array|object $ad
	 *	@return object $ad
	 */
	public function prepare( $ad ) {
		# check if the ad is array and convert it to object
		if( is_array($ad) ) {
			$ad = (object)$ad;
		}

		# then we will correct the category string
		# by the help of string helper
		$str = Core::getHelper('str');

		# now we have the model name based on the category
		$model = $str->catToModel($ad->main_category);

		# now we get the basic data needed
		return (object)Core::getModel( $model )->prepare( [$ad] )[0];
	}

	/**
	 *	Get specific cat
	 */
	public function getCatAds( $cat, $limit = 11 ) {
		//$this->db->cache_on();
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		$res = $this->db->select( '*' )
			->from('tbl_postings')
			->where('country', $cId)
			->where('status', 1)
			->where('country !=', 0)
			->where('main_category', $cat)
			->order_by('rand()')
			->limit($limit)
			->get();
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}
		//$this->db->cache_off();
		return $ads;
	}

/**
	 *	Get Just for u mobile home
	 */
	public function getjustfor($limit = 11 ) {
		//$this->db->cache_on();
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
	
		$res = $this->db->select( '*', FALSE )
			->join('tbl_auto AS b', 'a.id = b.post_id', 'left')
			->join('tbl_services AS c', 'a.id = c.post_id', 'left')
			->join('tbl_realestate AS d', 'a.id = d.post_id', 'left')
			->where('country', $cId)
			->where('status', 1)
			->where('country !=', 0)
			->where( 'a.main_category','Services')
			->where( 'a.main_category','Real Estate')
			->where( 'a.main_category','Auto')
			->where('b.category !=', 1)
			->where('b.category !=', 5)
			->order_by('rand()')
			->limit($limit)
			->get('tbl_postings as a');
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}
	//	$this->db->cache_off();
		return $ads;

	}
		/**
	 *	Get specia offer ads
	 */
	public function getAuto( $limit = 11 ) {
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		$res = $this->db->select( '*', FALSE )
			->join('tbl_auto AS b', 'a.id = b.post_id', 'left')
			->where('a.country', $cId)
			->where('a.status', 1)
			->where('a.country !=', 0)
			->where('a.main_category', 'Auto')
			->where('b.category', 1)
			->order_by('rand()')
			->limit($limit)
			->get('tbl_postings as a');
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}
		return $ads;
	}

/*
*get vip number
*/
public function getAutoVip( $limit = 11 ) {
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		$res = $this->db->select( '*', FALSE )
			->join('tbl_auto AS b', 'a.id = b.post_id', 'left')
			->where('a.country', $cId)
			->where('a.status', 1)
			->where('a.country !=', 0)
			->where('a.main_category', 'Auto')
			->where('b.category', 5)
			->order_by('rand()')
			->limit($limit)
			->get('tbl_postings as a');
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}
		return $ads;
	}



	/**
	 *	Get specia offer ads
	 */
	public function getMostViewedPhone( $limit = 11 ) {
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		$res = $this->db->select( '*' )
			->from('tbl_postings')
			->where('country', $cId)
			->where('status', 1)
			->where('country !=', 0)
			->where('main_category', 'Phones')
			->order_by('likes','DESC')
			->limit($limit)
			->get();
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}
		return $ads;
	}

	/**
	 *	Get specia offer ads
	 */
	public function getMostViewedAuto( $limit = 11 ) {
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		$res = $this->db->select( '*' )
			->from('tbl_postings')
			->where('country', $cId)
			->where('status', 1)
			->where('country !=', 0)
			->where('main_category', 'Auto')
			->order_by('likes','DESC')
			->limit($limit)
			->get();
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}
		return $ads;
	}

	/**
	 *	Get specia offer ads
	 */
	public function getMostViewedRealEstate( $limit = 11 ) {
		//$this->db->cache_on();
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		$res = $this->db->select( '*' )
			->from('tbl_postings')
			->where('country', $cId)
			->where('status', 1)
			->where('country !=', 0)
			->where('main_category', 'Real Estate')
			->order_by('rand()')
			->limit($limit)
			->get();
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}
	//	$this->db->cache_off();
		return $ads;
	}

	/**
	 *	Get specia offer ads
	 */
	public function getMostViewedAds( $limit = 11 ) {
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		
		$res = $this->db->select( '*' )
			->from('tbl_postings')
			->where('country', $cId)
			->where('status', 1)
			->where('country !=', 0)
			->where('main_category !=', 'Jobs')
			->where('main_category !=', 'Education')
			->where('main_category !=', 'Services')
			->order_by('rand()')
			->limit($limit)
			->get();
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}

		return $ads;
	}

	/**
	 *	Get specia offer ads
	 *	@param string $cat
	 *	@param int $limit
	 *	@return array $ads
	 */
	public function getSpecialAds( $cat = false, $limit = 11 ) {
		//$this->db->cache_on();
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		$this->db->select( '*' )
			->from('tbl_postings')
			->where('country', $cId)
			->where('ad_type', 'special_offers')
			->where('status', 1)
			->where('country !=', 0)
			->where('main_category !=', 'Jobs')
			->where('main_category !=', 'Education')
			->where('main_category !=', 'Services')
			->order_by('added_date','DESC')
			->limit($limit);
		if( $cat ) {
			$this->db->where('main_category', $cat);
		}
		$res = $this->db->get();
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}
		//$this->db->cache_off();
		return $ads;
	}

	/**
	 *	Get the latest Posts
	 */
	public function getLatestAds( $limit = 11 ) {
		//$this->db->cache_on();
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		$res = $this->db->select( '*' )
			->from('tbl_postings')
			->where('country', $cId)
			// ->where('ad_type', 'hot_deals')
			->where('status', 1)
			->where('country !=', 0)
			->where('main_category !=', 'Jobs')
			->where('main_category !=', 'Education')
			->where('main_category !=', 'Services')
			->order_by('added_date','DESC')
			->limit($limit)
			->get();
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}
	//	$this->db->cache_off();
		return $ads;
	}

	/**
	 *	Get Deals of the week
	 */
	public function getWeekDeal( $limit = 1 ) {
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		$res = $this->db->select( '*' )
			->from('tbl_postings')
			->where('country', $cId)
			->where('ad_type', 'weakdeal')
			->where('status', 1)
			->where('country !=', 0)
			->where('main_category !=', 'Jobs')
			->where('main_category !=', 'Education')
			->where('main_category !=', 'Services')
			->order_by('added_date','DESC')
			->limit($limit)
			->get();
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = Core::getModel($model)->prepare([$ad])[0];
			}
		}
		return $ads;
	}

	/**
	 *	Get hot deals ads
	 *	@param int $country
	 *	@param int $limit
	 *	@return array $res
	 */
	public function getHotDeals( $cat = false, $limit = 24 ) {
		//$this->db->cache_on();
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$str = Core::getHelper('str');
		$this->db->select( '*' )
			->from('tbl_postings')
			->where('country', $cId)
			->where('ad_type', 'hot_deals')
			->where('status', 1)
			->where('country !=', 0)
			->where('main_category !=', 'Jobs')
			->where('main_category !=', 'Education')
			->where('main_category !=', 'Women & Beauty')
			->where('main_category !=', 'Services')
			->where('price !=', 0)
			->order_by('rand()')
			->order_by('added_date','DESC')
			->limit($limit);
		if( $cat ) {
			$this->db->where('main_category', $cat);
		}
		$res = $this->db->get();
		$qrs = ( $res->num_rows() > 0 ) ? $res->result() : false;
		$ads = false;
		if( $qrs ) {
			foreach( $qrs as $ad ){
				$model = $str->catToModel($ad->main_category);
				$ads[] = (object)Core::getModel($model)->prepare([$ad])[0];
			}
		}
		//$this->db->cache_off();
		return $ads;
	}

	/**
	 *	Get ads from different countries
	 */
	public function getAdsFromDiffCountry() {
	//	$this->db->cache_on();
		$places = Core::getHelper('location');
		$currentCountryId = $places->getCurrentCountry()->id;
		$cIds = $places->getCountries([$currentCountryId]);
		$ads = [];
		foreach( $cIds as $cId ) {
			$ads[] = $this->getLatestAdsFromCountry( $cId->id );
		}
		return $ads;
		//$this->db->cache_off();
	}

	/**
	 *	Get latest ad from the country
	 *	@param int $country
	 *	@param int $limit
	 *	@return obj $res
	 */
	public function getLatestAdsFromCountry( $country, $limit = 1 ) {
		$cId = Core::getHelper('location')->getCurrentCountry()->id;
		$res = $this->db->select('*')
			->from('tbl_postings')
			->where('status', 1)
			->where('country !=', 0)
			->where('country !=',$cId )
			->where( 'country', $country )
			->where('main_category !=', 'Jobs')
			->where('main_category !=', 'Education')
			->where('main_category !=', 'Services')
			->order_by('added_date','DESC')
			->limit( $limit )
			->get();
		return ( $res->num_rows() > 0 ) ? $res->result()[0] : false;
	}
}