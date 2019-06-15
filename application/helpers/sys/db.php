<?php
/**
 *	Database Helper
 *	@author Ramon Alexis Celis
 *	@since 9.10.18
 */
Class Db {

	// instantiated database
	protected $db;

	/**
	 *
	 */
	public function __construct() {
		$this->db = get_instance()->db;
	}

	/**
	 *	Get the database based on table
	 *	@param string $table
	 *	@return $model
	 */
	public function get( $table ) {
		// $c = new CI_Controller;
		return get_instance()->db->from($table);
	}
}