<?php
/**
 *	Auto blocks
 */
$ads = Core::getModel('ads')->getAutoVip(30);
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'vip',
	'title_en' => 'Vip Number',
	'title_ae' => ' ارقام مميزة  ',
	'actionlink'=> base_url().'/auto',
]);