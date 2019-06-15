<?php
/**
 *	Computer blocks
 */
$ads = Core::getModel('ads')->getCatAds('Computers',25);
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'computers',
	'title_en' => 'Computer',
	'title_ae' => ' كمبيوترات  ',
	'actionlink'=> base_url().'/computers',
]);