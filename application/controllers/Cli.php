<?php if(!defined('BASEPATH')){exit('No direct script access allowed');}

class Cli extends CI_Controller{
	public function __construct() {
		if(! is_cli() ) {
			exit('CLI command only.');
		}
	}

	public function update() {
		print_r('updating ...');
	}
}