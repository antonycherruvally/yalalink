<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0, maximum-scale=1, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes"/>
<?php
$userdata = $this->session->userdata('logged_yalalink_userdata');	
$website_count = $this->yalalink_model->InsertCount();
$res = file_get_contents('https://www.iplocate.io/api/lookup/'.$this->input->ip_address());
$res = json_decode($res);
if($this->session->userdata('country_code')){
	$country_code = $this->session->userdata('country_code');
	$currency = $this->session->userdata('currency');
}else{
	$country = array('AE','OM','SA','KW','BH','EG','IN','PH');
	if(in_array($res->country_code, $country)) {
		$currency = $this->yalalink_model->getCurrency($res->country_code);
		$newdata = array(
						   'country'  => $res->country,
								   'country_code'  => $res->country_code,
						   'city'     => $res->city,
						   'currency' => $currency->currency,
						   'latitude' => $res->latitude,
						   'longitude' => $res->longitude
					   );
		$this->session->set_userdata($newdata);
		$country_code = $this->session->userdata('country_code');
		$currency = $this->session->userdata('currency');
	}else{
		$newdata = array(
					   'country'  => 'United Arab Emirates',
					   'country_code'  => 'AE',
					   'city'     => 'Dubai',
					   'currency' => 'AED',
					   'latitude' => '25.1968143',
					   'longitude' => '55.2709185'
				   );
		$this->session->set_userdata($newdata);
		$country_code = $this->session->userdata('country_code');
		$currency = $this->session->userdata('currency');
	}
}
?>
<?php $website = getWebsiteDetails($country_code); 

$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
<meta name="description" content="<?php if(@$website) { echo @$website->meta_description; } ?>">
<meta name="keywords" content="<?php if(@$website) { echo @$website->meta_keywords; } ?>">
<meta name="author" content="Yalalink">
<meta property="og:image" content="<?php if(@$images){ echo 'uploads/images/thumb'.@$images[0]->image; }else{ echo 'assets/front_end/images/logo-WEB.png'; }?>"/>
<meta property="og:description" content="<?php if(@$website) { echo @$website->meta_description; } ?>" />
<meta property="og:url" content="<?php echo base_url(); ?>" />
<meta property="og:title" content="<?php if(@$title) { echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$title)))); } 

if(@$website) { echo ' | '.str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$website->meta_title)))); } ?>" />
<meta name="twitter:card" content="summary_large_image">

<!--  Non-Essential, But Recommended -->

<meta property="og:site_name" content="Yalalink">
<meta name="twitter:image:alt" content="<?php if(@$title) { echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$title)))); } 

if(@$website) { echo ' | '.str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$website->meta_title)))); } ?>">
<title>
<?php if(@$page_title) { echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$page_title)))); }  if(@$title) { echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$title)))); } 

if(@$website) { echo ' | '.str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$website->meta_title)))); } ?>
</title>
<base href="<?php echo base_url(); ?>" />
<link rel="shortcut icon" href="assets/front_end/images/fav-icon.png">

<!-- Bootstrap core CSS -->

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="assets/front_end/css/fonts/font-awesome.min.css" rel="stylesheet">
<link href="assets/front_end/css/bootstrap-material-design.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
<?php //if($page_title == 'Login' || $page_title == 'Register' || $page_title == 'Post Ad' || $page_title == 'Edit Ad' || $page_title == 'Dashboard' || $page_title == 'Contact Us'){ ?>
<link href="assets/front_end/css/material-form.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
<?php //} ?>
<link href="assets/front_end/css/card.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
<link href="assets/front_end/css/select2.min.css" rel="stylesheet">
<link href="assets/front_end/css/jquery.fancybox.min.css" rel="stylesheet">
<link href="assets/front_end/css/develop.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">

<!-- hero style-->

<link href="assets/front_end/css/hero.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
<link href="assets/front_end/css/material-custom.css" rel="stylesheet">
<?php if($page_title == 'Dashboard'){ ?>
<link href="assets/front_end/css/dashboard.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet">
<?php } ?>
<link rel="stylesheet" media='screen and (min-width:320px) and (max-width:768px)' href="assets/front_end/css/nav-mobile.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/>
<script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js"></script>
<!-- // sweet alert 2 css -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@7.26.12/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<style type="text/css">
@font-face {
	font-family: "GE_Dinar";
	src: url("assets/front_end/css/fonts/GE-Dinar-One-Light.otf");
}
</style>

<!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
	 (adsbygoogle = window.adsbygoogle || []).push({
		  google_ad_client: "ca-pub-8267866280490368",
		  enable_page_level_ads: true
	 });
</script> -->
<body id="sticky-hero" class="flow-height">
<!-- link adds -->

<!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle link-add"
	 style="display:block"
	 data-ad-client="ca-pub-8267866280490368"
	 data-ad-slot="5841248183"
	 data-ad-format="link"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script> -->
<amp-auto-ads type="adsense" data-ad-client="ca-pub-8267866280490368"></amp-auto-ads>

<div class="navbar fixed-top hero-header"> 

  <!-- Navigation -->
  
  <div class="full-wrap header-top">
	<div class="container">
	  <ul class="country-sec">
		<li class="<?php if($country_code=='AE') echo 'current-country'; ?>"><a href="set_country/AE" class="bounce-ani map-ico uae-flag" data-toggle="tooltip" data-placement="bottom" title="UAE">UAE</a></li>
		<li class="<?php if($country_code=='OM') echo 'current-country'; ?>"><a href="set_country/OM" class="bounce-ani map-ico oman-flag"  data-toggle="tooltip" data-placement="bottom" title="Oman">Oman</a></li>
		<li class="<?php if($country_code=='SA') echo 'current-country'; ?>"><a href="set_country/SA" class="bounce-ani map-ico saudi-flag"  data-toggle="tooltip" data-placement="bottom" title="Saudi Arabia">Saudi Arabia</a></li>
		<li class="<?php if($country_code=='KW') echo 'current-country'; ?>"><a href="set_country/KW" class="bounce-ani map-ico kuwait-flag"  data-toggle="tooltip" data-placement="bottom" title="Kuwait">Kuwait</a></li>
		<li class="<?php if($country_code=='BH') echo 'current-country'; ?>"><a href="set_country/BH" class="bounce-ani map-ico bahrain-flag"  data-toggle="tooltip" data-placement="bottom" title="Bahrain">Bahrain</a></li>
	  </ul>
	  <div class="top-head-right navbar-right mr-auto">
		<form class="navbar-form" role="search">
		  <div class="input-group">
			<input type="text" class="form-control top-search" placeholder="search" name="q">
			<div class="input-group-btn">
			  <button class="btn btn-default top-search-btn" type="submit"><i class="fa fa-search"></i></button>
			</div>
		  </div>
		</form>
		<div class="place-ad-wrap"> <a href="post-an-ad" class="hero-button btn-place-ad"> <span class="ar-txt add-ar">أضف إعلانك مجانا</span> <span>post free add</span> <i class="fa fa-plus-circle bounce-ani" aria-hidden="true"></i> </a> </div>
		<?php if($userdata){
			if ( @$userdata['image'] ) {
	$timg = 'uploads/users/thumb/' . @$userdata['image'];
	$img = 'uploads/users/' . @$userdata['image'];
} else {
	$timg = 'assets/front_end/images/user-thumb.jpg';
	$img = 'assets/front_end/images/user-thumb.jpg';
}?>
		<div class="header-login dropdown"> <a class="login-link logged-avathar dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="pro-image" src="<?php if(file_exists(@$timg)) echo $timg; else echo $img; ?>"> <?php echo $userdata['name']; ?> <span class="logged-angle d-inline"><i class="fa fa-angle-down" aria-hidden="true"></i></span> </a>
		  <div class="dropdown-menu profile-open" aria-labelledby="navbarDropdown">
			<div class="content-info">
			  <div class="hero"><a href="dashboard"><?php echo $userdata['name']; ?></div>
			  <a href="dashboard" class="info-mail"><?php echo $userdata['email']; ?></a>
			  <div class="divider"></div>
			  <div class="info-sections"> <a href="dashboard">My Ads</a> <a href="dashboard">My Favourites</a>
				<div class="divider"></div>
			  </div>
			  <div class="info-sections acc-actions"> <a href="dashboard">Edit Profile</a> <a href="signout">Logout</a> </div>
			</div>
		  </div>
		</div>
		<?php }else{ ?>
		<div class="header-login"> <a href="login" class="login-link"><i class="fa fa-user-circle" aria-hidden="true"></i> Log in / Sign Up </a> </div>
		<?php } ?>
	  </div>
	</div>
  </div>
  <div class="logo-sec full-wrap">
	<div class="container"> <a class="hero-logo" href="index"></a>
	  <!-- <div class="logo-sec-add" id="add-load"> 
		
		<img src="assets/front_end/images/new-add.jpg" class="img-fluid"> 
		
	  </div> -->
	  <div class="logo-sec-add"> 
	  	<div class="home-v2-banner-block animate-in-view fadeIn animated homepcad" data-animation=" animated fadeIn">
	<div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 30px">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:inline-block;width:728px;height:90px"
		data-ad-client="ca-pub-8267866280490368"
		data-ad-slot="4614962273"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
</div>
	  </div>
	</div>
  </div>
  <div class="container">
	<nav class="navbar navbar-expand-lg navbar-white" id="mainNav">
	  <div class="nav-bar-title" id="navbarResponsive">
		<ul class="navbar-nav">
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Home') echo 'active'; ?>" href="index">Home</a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Real Estate') echo 'active'; ?>" href="real-estate">Real Estate</a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Jobs') echo 'active'; ?>" href="jobs">Jobs</a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Auto') echo 'active'; ?>" href="auto">Auto </a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Classifieds') echo 'active'; ?>" href="classifieds">Classifieds </a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Healthcare') echo 'active'; ?>" href="healthcare">Health Care</a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Woman & Beauty') echo 'active'; ?>" href="women-beauty">Woman & Beauty</a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'House Maids') echo 'active'; ?>" href="housemaids">House Maids </a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Phones') echo 'active'; ?>" href="phones">Phones </a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Electronics') echo 'active'; ?>" href="electronics">Electronics </a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Computers') echo 'active'; ?>" href="computers">Computers </a> </li>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Education') echo 'active'; ?>" href="education">Education </a> </li>
		  <?php /*?><li class="nav-item"> <a class="nav-link <?php if(@$title == 'Stock & Share') echo 'active'; ?>" href="stock-share">Stock & Share </a> </li><?php */?>
		  <li class="nav-item"> <a class="nav-link <?php if(@$page_title == 'Services') echo 'active'; ?>" href="services">Services </a> </li>
		</ul>
	  </div>
	</nav>
  </div>
</div>
<!-- hero header--> 
<!-- Mobile Menu Navigation -->
  <div class="mobile-header sticky-top-shadow">
		<div class="navbar-default topbarmobileholder">
		  <ul>
			<li class="d-inline">
			  <!-- nav-right -->
				<nav>
				<div class="nav-right">
				  <div class="button" id="btn">
					<div class="bar top"></div>
					<div class="bar secondline"></div>
					<div class="bar middle"></div>
					<div class="bar bottom"></div>
				  </div>
				</div>
			  <!-- nav-right -->
			  </nav>
			</li>
			<li class="moblogo-box">
		<div class="hero-bg-img mobile-logo"><a href="index" class="full-click"></a></div>
	  </li>

		  <div class="mobile-header-right">
			<div class="nav-item dropdown country-ico hero-bg-img globe-ico">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<!-- <img src="images/icon/globe.png"> -->
						<span class="ico-title">Country</span>
					</a>
					<div class="dropdown-menu country-list" aria-labelledby="navbarDropdown"> <a class="dropdown-item" href="set_country/AE"><?php if($country_code=='AE') echo '<b>UAE</b>'; else echo 'UAE'; ?> </a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="set_country/OM"><?php if($country_code=='OM') echo '<b>Oman</b>'; else echo 'Oman'; ?></a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="set_country/SA"><?php if($country_code=='SA') echo '<b>Saudi Arabia</b>'; else echo 'Saudi Arabia'; ?></a>
				  </div>
			</div>

				<div class="nav-item dropdown country-ico hero-bg-img user-ico">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<!-- <img src="images/icon/globe.png"> -->
						<span class="ico-title">Log in</span>
					</a>
					<div class="dropdown-menu mlogin-box-menu" aria-labelledby="navbarDropdown">
						<div class="mlogin-box">
						  <div class="info-title"><a href="dashboard">Your Account</a></div>
						  <p class="help-txt">Access your account and ads</p>
						  <div class="mlog-btn text-uppercase"><a href="login">Log In</a></div>
						  <div class="mlog-btn text-uppercase"><a href="register">Sign Up</a></div>
						</div>
					</div>
				</div>

				<div class="nav-item dropdown country-ico hero-bg-img search-ico">
				</div>
		  </div>
		  </ul>
		  <div class="mobile-search">
					<div class="mobile-search-container">
					<div class="input-group mb-3">
					  <input type="text" class="form-control mobile-searcharea" placeholder="Search here" aria-label="Recipient's username" aria-describedby="basic-addon2">
					  <div class="input-group-append">
						<button class="btn mobile-search-btn" type="button">search</button>
					  </div>
					</div>
					</div>
			</div>
			<div class="post-add-forall postaddview">
			  <div class="sidebar-ad"> <a href="post-an-ad" class="hero-button btn-place-ad add-forall-btn"> 
			  <span class="ar-txt add-ar pull-right">post free add أضف إعلانك مجانا </span></a> </div>
			</div>
		</div>
	</div>
	<!-- Mobile Menu Navigation --> 
<div class="push-wrapper">
<div class="full-wrap detail-page listing-master-wrap">
<ul class="social_icons" id="fixed-social">
  <li><a href="http://facebook.com/yallalink" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
  <li><a href="http://twitter.com/yalalink" target="_blank"  data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
  <li><a href="http://instagram.com/yallalink" target="_blank"  data-placement="bottom" title="Instagram" data-original-title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i> </a></li>
  <li><a href="https://www.youtube.com/channel/UCUMQgk6eeTzQFtptXd81kDA" target="_blank"  data-placement="bottom" title="Youtube" data-original-title="Youtube"><i class="fa fa-youtube" aria-hidden="true"></i> </a></li>
</ul>
