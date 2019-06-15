<?php
/**
 *  Bootstrap to more helpers
 *	use helper in OOP
 *	@author Ramon Alexis Celis
 *	@since 9.9.18
 */
spl_autoload_register(function( $cls ) {
	$ds 		= DIRECTORY_SEPARATOR;
	$basepath 	= dirname(__FILE__) . $ds . 'sys' . $ds;
	$cls 		= strtolower($cls);
	$path 		= $basepath . $cls . '.php';
	if( file_exists( $path ) ) {
		return include $path;
	}
	return false;
});