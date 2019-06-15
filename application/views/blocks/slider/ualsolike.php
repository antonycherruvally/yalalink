<?php
/**
 *	Auto blocks
 */
$ads = Core::getModel('yalalink_model')->DealsPostsPage($category,15);
$this->load->view('blocks/slider/main', [
	'ads' => $ads,
	'id' 		=> 'ualso',
	'title_en' => 'You may also like… ',
	'title_ae' => ' أشياء يمكن تحبها   ',
	'actionlink'=> base_url(),
]);