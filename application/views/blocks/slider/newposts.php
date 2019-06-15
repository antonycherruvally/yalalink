<?php
/**
 *	new posts
 */
$ads = Core::getModel('ads')->getLatestAds(25);
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'newposts',
	'title_en' => 'New Posts',
	'title_ae' => '  إعلانات جديدة   ',
	 'actionlink'=> base_url(),
]);