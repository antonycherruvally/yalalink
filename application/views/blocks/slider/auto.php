<?php
/**
 *	Auto blocks
 */
$ads = Core::getModel('ads')->getAuto(30);
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'car',
	'title_en' => 'Cars',
	'title_ae' => 'سيارات  ',
	'actionlink'=> base_url().'/auto',
]);