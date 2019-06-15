<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}

Class Account_model extends CI_Model{

	/**
	 *	get data from user
	 *	@param int $id
	 */
	public function getData( $id ) {
		$db = $this->db;
		$rs = $db->select('*')
			->from('tbl_users')
			->where('id', $id)
			->get();
		$res = $rs->first_row();
		if( $res ) {
			// remove some data
			unset($res->password);
			unset($res->authcode);
			return $res;
		}
		return false;
	}

	/**
	 *	Get account by email
	 *	@param string $email
	 *	@return bool|string
	 */
	public function getByEmail( $email ) {
		$db = $this->db;
		$rs = $db->select('*')
			->from('tbl_users')
			->where('email', $email)
			->get();
		$res = $rs->first_row();
		if( $res ) {
			return $res;
		}
		return false;
	}
}