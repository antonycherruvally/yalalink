<?php
/**
 *	category helper
 *	@author Ramon Alexis Celis
 *	@since 9.10.18
 */
Class Category {

	/**
	 *	get the category based on id
	 *	@param int $id
	 *	@return obj
	 */
	public function getCategory( $id ) {
		$cat = Core::getHelper('db')->get('tbl_realestate_category');

		$rs = $cat->where('id', $id)->get();
		Core::log( $rs->result() );
	}
}