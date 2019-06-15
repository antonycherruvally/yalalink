<?php

$loozaa = file_get_contents('https://loozaa.com/api/?app=products/getProducts');
$this->load->view('blocks/slider/main', [
	'id' 		=> 'loozaa',
	'title_en' 	=> 'Loozaa.com',
	'title_ae' 	=> ' موقع لووزا.كوم   ',
	'actionlink'=> 'https://loozaa.com/m',
	'linktarget' => '_blank',
	'ads' 	=> json_decode($loozaa)
]);