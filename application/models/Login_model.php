<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}

Class Login_model extends CI_Model{

	/**
	 *	get the current login country
	 *	@param string $property
	 */
	public function getCountry( $property = false ) {
		$country_code = $this->session->userdata('country_code');
		$query = $this->db
					->select('*')
					->where(['code' => $country_code])
					->get('tbl_countries');

		if( $query->num_rows() > 0 ) {
			if(! $property ) {
				return $query->row();
			}else{
				return $query->row()->{$property};
			}
		}
	}

	function loginValidate($email = NULL,$password = NULL){
        $query = $this->db->select('id,email,password')->where(array('email' => $email,'user_type <>' => 'website','user_type <>' => 'internal'))->get('tbl_users');
		if($query->num_rows() == 1){
			$row = $query->row();
			$decoded_pass = $this->encrypt->decode($row->password);
			if($password == $decoded_pass){
				$userdata['logged_admin_userdata'] = array(
					'id' => $row->id,
					'name' => $row->first_name.' '.$row->first_name,
					'email' => $row->email,
					'validated' => true
				);
				$this->session->set_userdata($userdata);
				return true;
			}
		}
		return false;
	}
}
?>