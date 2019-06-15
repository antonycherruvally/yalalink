<?php

// REST API
class Api extends CI_Controller {

	private $method = null;

	public function __construct() {
		parent::__construct();

		$this->load->model('real_estate_model');
		$this->load->model('yalalink_model');
	}

	// Api handler
	public function handler() {
		$db = $this->real_estate_model;

		// handler for the realstate 
		if( $this->isGet() and $this->cmd("realestate") ) {
			$page = 0;
			$limit = 100;
			if( isset($_GET['page']) and $_GET['page'] > 0 ) {
				$page = $_GET['page'] * 10 ;
				$limit = 10;
			}

			if( $_GET['type'] == 1 ) {
				$type = 'New';
			}else{
				$type = 'Used';
			}
			
			$data = $db->getListings($limit, $page, $type, $_GET['category']);
			// $feat = $db->getFeaturedAds();
			# this will add featured ads
			// $data = array_merge($feat, $data);
			$prep = $db->prepareResult($data);
			// output json encoded data
			Core::response($prep);
		}

		// handler for getting the rent
		if( $this->isGet() and $this->cmd('realestaterent') ) {
			$page = 0;
			$limit = 100;
			if( isset($_GET['page']) and $_GET['page'] > 0 ) {
				$page = $_GET['page'] * 10 ;
				$limit = 10;
			}

			if($_GET['purpose'] == 2){
				$type ='Used';
			}else{
				$type = 1;
			}
			
			$data = $db->getListings($limit, $page, $type, $_GET['category']);
			# this is for adding featured
			// $feat = $db->getFeaturedAds();
			// $data = array_merge($feat, $data);
			$prep = $db->prepareResult($data);

			// output json encoded data
			Core::response($prep);
		}

		// realestate search
		if( $this->isGet() and $this->cmd('realestatesearch') ) {
			$mode = $_GET['realestatesearch'];
			// format the data
			unset($_GET['realestatesearch']); $data = $_GET; unset($_GET);
			//  exclude all null values and format location data
			foreach( $data as $dtk => $dtv ) {
				if(! empty($dtv) ) {
					if( $dtk == 'location' ) {
						if( strpos($dtv, '-') ) {
							$dtv = explode('-', $dtv)[0];
						}
						if( strpos($dtv, ',') ) {
							$dtv = explode(',', $dtv)[0];
						}
						if( substr($dtv, -1) === " " ) {
							$dtv = substr($dtv, 0, -1);
						}
					}
					$fdata[$dtk] = $dtv;
				}
			}

			if( $mode == 'rescount' ) {
				$rs = $db->search( $fdata, 'rescount' );
			}else{
				$rs = $db->search( $fdata );
			}
			
			Core::response( $rs );
		}

		/**
		 *	get for Auto
		 */
		if( $this->isGet() and $this->cmd('auto') ) {
			Core::getModel('auto')->get($_GET);
		}

		/**
		 *	Search for auto
		 */
		if( $this->isGet() and $this->cmd('searchauto') ) {
			Core::getModel('auto')->search($_GET);
		}

		/**
		 *	get auto brands
		 */
		if( $this->isGet() and $this->cmd('autoGetBrands') ) {
			Core::getModel('auto')->getBrand($_GET['catId']);
		}

		/**
		 *	get auto Model 
		 */
		if( $this->isGet() and $this->cmd('autoGetModels') ) {
			Core::getModel('auto')->getModel($_GET['catId']);
		}

		/**
		 *	get classifieds 
		 */
		if( $this->isGet() and $this->cmd('classifieds') ) {
			Core::getModel('classifieds')->get($_GET);
		}

		/**
		 *	search classifieds 
		 */
		if( $this->isGet() and $this->cmd('searchclassifieds') ) {
			Core::getModel('classifieds')->search($_GET);
		}

		/**
		 *	get subcategory classifieds 
		 */
		if( $this->isGet() and $this->cmd('clsGetSubCat') ) {
			Core::getModel('classifieds')->getSubCat($_GET['catId']);
		}

		/**
		 *	get electronics
		 */
		if( $this->isGet() and $this->cmd('electronics') ) {
			Core::getModel('electronics')->get($_GET);
		}

		/**
		 *	get electronics
		 */
		if( $this->isGet() and $this->cmd('searchelectronics') ) {
			Core::getModel('electronics')->search($_GET);
		}

		/**
		 *	get phones
		 */
		if( $this->isGet() and $this->cmd('phones') ) {
			Core::getModel('phones')->get($_GET);
		}

		/**
		 *	search phones
		 */
		if( $this->isGet() and $this->cmd('searchphones') ) {
			Core::getModel('phones')->search($_GET);
		}

         /**
		 *	get computers
		 */
		 if( $this->isGet() and $this->cmd('computers') ) {
			Core::getModel('computers')->getComputers($_GET);
		}
		 
		if( $this->isGet() and $this->cmd('computerGetBrands') ) {
			Core::getModel('computers')->get($_GET['catId']);
		}
		
		if( $this->isGet() and $this->cmd('searchcomputer') ) {
			Core::getModel('computers')->search($_GET);
		}

		if( $this->isGet() and $this->cmd('models') ) {
			$db = Core::getHelper('db')->get('tbl_phones');
			$db->distinct('model');
			$rs = $db->get();
			$rs = $rs->result();
			foreach( $rs as $phone ) {
				Core::log( $phone->model );

			}
			exit();
			// Core::response( $rs );
		}
		
		// get areas based on city
		if( $this->isGet() and $this->cmd('getareas') ) {
			$rs = Core::getHelper('location')->getAreas($_GET['id']);
			Core::response( $rs );
		}

		// get housemaids
		if( $this->isGet() and $this->cmd('housemaids') ) {
			Core::getModel('housemaids')->get($_GET);
		}

		// search housemaids
		if( $this->isGet() and $this->cmd('searchhousemaids') ) {
			Core::getModel('housemaids')->search($_GET);
		}

		// get womenbeauty
		if( $this->isGet() and $this->cmd('womenbeauty') ) {
			Core::getModel('Women_beauty')->get($_GET);
		}

		// search housemaids
		if( $this->isGet() and $this->cmd('searchwomenbeauty') ) {
			Core::getModel('Women_beauty')->search($_GET);
		}

		// get healthcare
		if( $this->isGet() and $this->cmd('healthcare') ) {
			Core::getModel('healthcare')->get($_GET);
		}

		// search housemaids
		if( $this->isGet() and $this->cmd('searchhealthcare') ) {
			Core::getModel('healthcare')->search($_GET);
		}

		// get education
		if( $this->isGet() and $this->cmd('education') ) {
			Core::getModel('education')->get($_GET);
		}

		// search housemaids
		if( $this->isGet() and $this->cmd('searcheducation') ) {
			Core::getModel('education')->search($_GET);
		}

		// get services
		if( $this->isGet() and $this->cmd('services') ) {
			Core::getModel('services')->get($_GET);
		}

		// search services
		if( $this->isGet() and $this->cmd('searchservices') ) {
			Core::getModel('services')->search($_GET);
		}

		// get jobs
		if( $this->isGet() and $this->cmd('jobs') ) {
			Core::getModel('jobs')->get($_GET);
		}

		// search jobs
		if( $this->isGet() and $this->cmd('searchjobs') ) {
			Core::getModel('jobs')->search($_GET);
		}

		// add likes
		if( $this->isGet() and $this->cmd('likes') ) {
			Core::getModel('yalalink')->likes($_GET);
		}

		// Chagne country
		if( $this->isGet() and $this->cmd('changecountry') ) {
			$red = isset($_GET['redirect']) ? $_GET['redirect'] : false;
			Core::getHelper('location')->changeCountry($_GET['changecountry'], $red);
			return;
		}

		// get country location
		if( $this->isGet() and $this->cmd('getLocations') ) {
			$loc = Core::getHelper('location');
			if(  isset($_GET['id']) ) {
				$cities = $loc->getCities( $_GET['id'] );
				if( $cities ) {
					Core::response( $cities );
				}else{
					Core::response(false);
				}
			}
		}

		// Chagne country
		if( $this->isGet() and $this->cmd('test') ) {
			Core::log( file_get_contents('https://ifconfig.co/json') );
			Core::limiter('AE', true);
			exit();
		}

		return Core::response(['status' => 'error', 'msg' => 'no data has been processed.', 'data' => isset($_GET) ? $_GET:$_POST ]);
	}

	/**
	 * get the request data
	 */
	public function getData() {

	}

	/**
	 *	check if the api command exist in the parameter
	 *	@param string $cmd
	 *	@return bool
	 */
	public function cmd( $cmd ) {
		$data;
		if( $this->method == null ) {
			return false;
		}

		if( $this->method == "GET" ) {
			$data = $_GET;
		}

		if( $this->method == "POST" ) {
			$data = $_POST;
		}

		if( isset($data[$cmd]) ) {
			return true;
		}
		return false;
	}

	/**
	 *	check if the request method is post
	 */
	public function isPost() {
		if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
			$this->method = 'POST';
			return true;
		}
		return false;
	}

	/**
	 *	check if the get is the request method
	 */
	public function isGet() {
		if( $_SERVER['REQUEST_METHOD'] == "GET" ) {
			$this->method = 'GET';
			return true;
		}
		return false;
	}
}