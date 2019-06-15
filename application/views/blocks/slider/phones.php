<?php
/**
 *	Phones blocks
 */
$ads = Core::getModel('ads')->getCatAds('Phones',25);
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'phones',
	'title_en' => 'Phones',
	'title_ae' => ' موبايلات   ',
	'actionlink'=> base_url().'/phones',
]);