<?php
/**
 *	Electronics blocks
 */
$ads = Core::getModel('ads')->getCatAds('Electronics',25);
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'electronics',
	'title_en' => 'Electronics',
	'title_ae' => '  الكترونيات  ',
	'actionlink'=> base_url().'/electronics',
]);