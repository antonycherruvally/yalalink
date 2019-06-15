<?php
/**
 *	new posts
 */
$ads = Core::getModel('ads')->getMostViewedAds(25);
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'justforu ',
	'title_en' => 'JUST FOR YOU',
	'title_ae' => '  إخترنا لكم ',
	 'actionlink'=> base_url(),
]);