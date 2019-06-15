<?php
/**
 *	Classifieds blocks
 */
$ads = Core::getModel('ads')->getCatAds('Classifieds',25);
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'tc',
	'title_en' => 'Classifieds',
	'title_ae' => ' الإعلانات المبوبة   ',
	'actionlink'=> base_url().'/classifieds',
]);