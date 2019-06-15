<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata');?>
<div class="container">
		<div class="row">
		  <div class="col-md-12 col-sm-12 mx-auto">
			<div class="full-wrap innerpage-wrap">
				<div class="inner-header-box">
				  <div class="header-box-headerText">ABOUT US</div>
				  	<p class="text-muted about-content">
					<a href="<?= Core::getBaseUrl() ?>">yalalink.com</a> is a website which provides complete satisfaction to the people living in the same locality and worldwide by helping them to meet their day to day needs. It is a site which provides a common platform to the local and international community to meet, trade and help each other.</p>
					<p class="text-muted about-content">Our vision was to build the best classified and auction site on the web! To accomplish this, we took the best features of the most popular sites and combined them with many new custom features, not offered by competitors, and put them into one place. That’s yalalink.com!</p>
					<p class="text-muted about-content">yalalink.com delivers a better user experience while allowing more user control over your ads and auctions. We offer FREE Classified Ads and Auctions, along with the ability to upgrade to our premium features for a small fee. We encourage our business users to use our Storefront subscription service. A Storefront allows your business to have custom presence on our site.</p>
					<p class="text-muted about-content">Thank you <i class="fa fa-smile-o" aria-hidden="true"></i></p>
					<p class="text-muted about-content">Do let us know your experience or suggestions by <a href="contact-us">Contact us</a></p>
				</div>
			  </div>
			</div>
		  </div>
	  </div>
<?php $this->load->view('front_end/include/footer'); ?>