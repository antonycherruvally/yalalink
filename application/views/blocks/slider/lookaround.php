<?php
/**
 *	Auto blocks
 */
$ads = Core::getModel('ads')->getAdsFromDiffCountry();
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'look',
	'title_en' => 'LOOK AROUND ELSEWHERE',
	'title_ae' => ' نظرة على الأسواق الأخرى    ',
	'actionlink'=> base_url(),
]);