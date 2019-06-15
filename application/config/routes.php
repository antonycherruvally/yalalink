<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$default_controller = 'home';
$route['default_controller'] = $default_controller;
// API CALLS
$route['api'] = "api/handler";
$route['real-estate'] 			= "real_estate/index";
$route['single-product'] 		= "real_estate/single-product.php";
$route['real-estate']			= "real_estate/index";
$route['real-estate/(:num)'] 	= "real_estate/index/$1";
$route['real-estate/(:any)'] 	= "real_estate/index/$1";
$route['real-estate/view/(:any)'] = "real_estate/view/$1";
$route['stock-share'] 			= "home/stock_share";
$route['post-an-ad'] 			= "home/post_an_ad";
$route['about-us'] 				= "home/about_us";
$route['contact-us']			= "home/contact_us";
$route['privacy-policy'] 		= "home/privacy_policy";
$route['edit-ad'] 				= "home/edit_ad";
$route['women-beauty'] 			= "women_beauty";
$route['women-beauty/(:any)'] 	= "women_beauty/$1";
$route['women-beauty/view/(:any)'] = "women_beauty/view/$1";

# board route 
$route['board/corporate/(:any)'] = "board/corporate/$1";
$route['board/posts/create/(:any)'] = "board/createPost/$1";

$controller_exceptions 			= array('board','admin','real_estate','jobs','auto','classifieds','housemaids','phones','electronics','computers','education','services','healthcare','women_beauty');
$route['default_controller'] 	= $default_controller;
$route['^((?!\b'.implode('\b|\b', $controller_exceptions).'\b).*)$'] = $default_controller.'/$1';
$route['404_override'] = 'home/pageNotFound';
$route['translate_uri_dashes'] = FALSE;