<?php
/**
 *	Auto blocks
 */
$ads = Core::getModel('yalalink_model')->SpecialPostsPage($category,25);
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'similar',
	'title_en' => 'Similar Ads',
	'title_ae' => ' إعلانات مشابهه   ',
	'actionlink'=> base_url().'/auto',
]);