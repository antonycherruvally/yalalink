<?php
$realestate = Core::getModel('ads')->getMostViewedRealEstate(25);
$this->load->view('blocks/slider/main', [
	'ads' => $realestate,
	'id' 		=> 'real-estate',
	'title_en' => 'Real Estate',
	'title_ae' => 'عقارات',
	'actionlink'=> base_url().'/real-estate',
]);