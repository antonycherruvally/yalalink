<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$corepath = dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . "Core.php";
if( file_exists($corepath) ) {
	require_once $corepath;
}else {
	exit("Error: core was missing!");
}
$bootsys = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bootstrap.php';
if( file_exists($bootsys) ) {
	require_once $bootsys;
}else{
	exit('Error: bootstrap not found!');
}
	/*function is_logged_in(){
	$CI =& get_instance();	
	$session = $CI->session->userdata('logged_yalalink_userdata');
	$query = $CI->db->where(array('session_id' => $session['session_id'],'userid' => $session['userid'],'user_logged_in' => 1,'user_agent' => $session['user_agent']))->get('tbl_ci_sessions');
	if($query->num_rows() == 0) {
		redirect('login');
	}else{
		$now = date('Y-m-d H:i:s');
		$updateSession = array(
				'user_logged_in' => 1,
				'last_activity' => $now
				);
		$query = $CI->db->where('session_id',$session['session_id'])->update('tbl_ci_sessions', $updateSession);
	}
	}*/
	function is_logged_in(){
	$CI =& get_instance();		
	if(!$CI->session->userdata('logged_yalalink_userdata'))
		redirect('login');
	}
	function is_admin_logged_in(){
	$CI =& get_instance();	
	if(!$CI->session->userdata('logged_admin_userdata'))
		redirect('admin');
	}
	function getUserDetails($id){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where(array('id' => $id))->get('tbl_users');
	return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function getWebsiteDetails($code){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where(array('country_code' => $code))->get('tbl_website_details');
	return ($query->num_rows() > 0) ? $query->row() : false;
	}
	function getRealEstatePurpose(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where('category <>','')->get('tbl_realestate_category');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getRealEstateCategory(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where('subcategory <>','')->get('tbl_realestate_category');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getCountries(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where('name <>','')->get('tbl_countries');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getLocations(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where('location <>','')->get('tbl_countries');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getNationalities(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->get('tbl_nationality');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getIndustry(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where('title <>','')->order_by('title','asc')->get('tbl_industry');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getPositions(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where('title <>','')->order_by('title','asc')->get('tbl_jobs_positions');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getAutoCategories(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where('category <>','')->order_by('category','asc')->get('tbl_auto_category');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getClassifiedsCategories(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where('category <>','')->order_by('category','asc')->get('tbl_classifieds_category');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getClassifiedsSubCategories(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where(array('subcategory <>' => '', 'parent_id' => $id))->order_by('subcategory','asc')->get('tbl_classifieds_category');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getAutoFeatures(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where('name <>','')->order_by('name','asc')->get('tbl_auto_features');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getPropertyAmenities($category = NULL){
	$CI =& get_instance();
	$field = strtolower(substr($category,0,3));
	$query = $CI->db->select('*')->where($field, 1)->order_by('name','asc')->get('tbl_property_amenities');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getElectronicsCategories(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where(array('category <>'=> ''))->order_by('category','asc')->get('tbl_electronics_category');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getComputersCategories(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where(array('category <>'=> ''))->order_by('category','asc')->get('tbl_computer_categories');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getServicesCategories(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where(array('category <>'=> ''))->order_by('category','asc')->get('tbl_services_category');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getColors(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where(array('name <>'=> ''))->order_by('name','asc')->get('tbl_colors');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getCompatible(){
	$CI =& get_instance();
	$query = $CI->db->select('*')->where(array('name <>'=> ''))->order_by('name','asc')->get('tbl_battery_compatible');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}
	function getBrands($type){
	$CI =& get_instance();
	$CI->db->select('*');
	if($type == 'P'){
		$CI->db->where('phone',1);
	}
	if($type == 'T'){
		$CI->db->where('television',1);
	}
	if($type == 'W'){
		$CI->db->where('washing',1);
	}
	if($type == 'R'){
		$CI->db->where('refrigerator',1);
	}
	if($type == 'B'){
		$CI->db->where('battery',1);
	}
	if($type == 'C'){
		$CI->db->where('charger',1);
	}
	if($type == 'PB'){
		$CI->db->where('power',1);
	}
	if($type == 'H'){
		$CI->db->where('headsets',1);
	}
	if($type == 'S'){
		$CI->db->where('speakers',1);
	}
	if($type == 'F'){
		$CI->db->where('fans',1);
	}
	if($type == 'DC'){
		$CI->db->where('camera',1);
	}
	if($type == 'M'){
		$CI->db->where('memory',1);
	}
	if($type == 'K'){
		$CI->db->where('keyboard',1);
	}
	if($type == 'MO'){
		$CI->db->where('mouse',1);
	}
	if($type == 'HD'){
		$CI->db->where('harddisk',1);
	}
	if($type == 'D'){
		$CI->db->where('desktop',1);
	}
	if($type == 'MT'){
		$CI->db->where('monitor',1);
	}
	if($type == 'L'){
		$CI->db->where('laptop',1);
	}
	$query = $CI->db->order_by('name','asc')->get('tbl_brands');
	return ($query->num_rows() > 0) ? $query->result() : false;
	}