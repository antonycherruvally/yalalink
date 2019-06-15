<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<?php
	if(@$page_title) { 
		$mainTitle = str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$page_title)))); 
	}  

	if(@$title) { 
		$mainTitle .= str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$title)))); 
	} 

	if(@$website) { 
		$mainTitle .= ' | '.str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$website->meta_title)))); 
	}
?>
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
		<meta name="google-site-verification" content="mfYhvWPfUsZlPWAQxt7eSC2Mk637BX93UTtgLSaFut8" />

		<!-- prview meta start -->
			<meta name="twitter:card" content="summary">
			<meta property="og:site_name" content="Yalalink"/> 	
			<meta property="og:title" content="<?= $mainTitle ?>" />
			<meta property="og:url" content="<?= 'https://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>" />
			<meta property="og:description" content="<?= $mainTitle ?>"> 
			<meta property="og:image" itemprop="image" content="<?=base_url()?><?php if(@$images){ echo 'uploads/images/'.@$images[0]->image; }else{ echo 'assets/front_end/images/logo-WEB.png'; }?>">
			<meta property="og:type" content="article" />
			<meta property="og:image:width" content="300" />
			<meta property="og:image:height" content="300" />

			<meta name="twitter:domain" content="<?= base_url() ?>">
			<meta name="twitter:site" content="@mashiro_alexis"/>
			<meta property="twitter:title" content="<?= $mainTitle ?>">
			<meta property="twitter:description" content="<?= substr($mainTitle, 0, 150) ?>...">
			<meta name="twitter:url" content="<?= 'https://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"] ?>" />
			<meta name="twitter:image" content="<?=base_url()?><?php if(@$images){ echo 'uploads/images/'.@$images[0]->image; }else{ echo 'assets/front_end/images/logo-WEB.png'; }?>" />
			<meta property="twitter:image:src" content="<?=base_url()?><?php if(@$images){ echo 'uploads/images/'.@$images[0]->image; }else{ echo 'assets/front_end/images/logo-WEB.png'; }?>" />
		<!-- prview meta end -->

        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125041898-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125041898-1');
</script>
<?php
$userdata = $this->session->userdata('logged_yalalink_userdata');	
$website_count = $this->yalalink_model->InsertCount();
$res = @file_get_contents('https://www.iplocate.io/api/lookup/'.$this->input->ip_address());
$res = json_decode($res);
if($this->session->userdata('country_code')){
	$country_code = $this->session->userdata('country_code');
	$currency = $this->session->userdata('currency');
}else{
	$country = array('AE','OM','SA','KW','BH','EG','LB','JR');
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
<title>
<?php if(@$page_title) { echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$page_title)))); }  if(@$title) { echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$title)))); } 

if(@$website) { echo ' | '.str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$website->meta_title)))); } ?>
</title>
<base href="<?php echo base_url(); ?>" />


		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">



		<!--<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" media="all" />-->
		<link rel="stylesheet" type="text/css" href="assets/css/animate.min.css" media="all" />
		<link rel="stylesheet" type="text/css" href="assets/css/font-electro.css" media="all" />
		<link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css" media="all" />
		<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
		<link rel="stylesheet" type="text/css" href="assets/css/colors/yellow.css" media="all" />
		<link rel="stylesheet" type="text/css" href="assets/css/override.css?v=<?= strtotime('now') ?>" media="all" />
		<!-- <link href="assets/front_end/css/hero.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet"> -->
<link rel="stylesheet" type="text/css" href="assets/front_end/css/hero.css" media="all" />
	  <link href="assets/front_end/css/jquery.fancybox.min.css" rel="stylesheet">
	  <link rel="stylesheet" href="assets/front_end/css/intlTelInput.css">
<link rel="stylesheet" href="assets/front_end/css/isValidNumber.css">
<link href="assets/front_end/css/dashboard.css" rel="stylesheet">


		 
	  <!-- <link rel="stylesheet" type="text/css" href="assets/front_end/css/material-form.css" media="all" />-->
		 <!-- <link rel="stylesheet" type="text/css" href="assets/front_end/css/material-custom.css" media="all" />-->
		  <!-- <link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css" media="all" />-->
			<!--<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-material-design.min.css" media="all" />-->
			 <link rel="stylesheet" type="text/css" href="assets/front_end/css/card.css" media="all" />

<!-- ===============
	Mobile CSS
=============== -->
<link rel="stylesheet" type="text/css" href="assets/css/override-sm.css?v=<?= strtotime('now') ?>" media="all" />		 

		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>

		<!-- <link rel="shortcut icon" href="assets/images/fav-icon.png"> -->
		<!-- <link rel="shortcut icon" href="favicon.ico"> -->
<link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
<link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png" />
		<script type="text/javascript">
			var baseurl = "<?= Core::getBaseUrl() ?>";
			var currency = "<?= $currency ?>";
		</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125888044-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125888044-1');
</script>
<!-- Global site tag (gtag.js) - Google Ads: 830568813 --> <script async src="https://www.googletagmanager.com/gtag/js?id=AW-830568813"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'AW-830568813'); </script>
<script type="text/javascript">
	gtag('config', 'AW-830568813');
</script>
<!-- Event snippet for YalaLink Conversion conversion page --> <script> gtag('event', 'conversion', {'send_to': 'AW-830568813/22lmCMKY3YwBEO3yhYwD'}); </script>
		
	</head>

<body class="home-v2">
	<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
			<a class="skip-link screen-reader-text" href="#content">Skip to content</a>

			<?php $this->load->view('blocks/top'); ?>

			<header id="masthead" class="site-header header-v2 fixedmob">
				<div class="container">
					

						<div class="mob_header_img">
						<!-- ============================================================= Header Logo ============================================================= -->
						<div class="header-logo">
							<a href="<?=base_url()?>" class="header-logo-link">
								<img src="<?=base_url()?>assets/front_end/images/logo-M.png">
							</a>
							<span class="brand_logo">A Linkmedia Brand</span>
						</div>
						<div class="post-add-forall postmobadd mobilenav">
			  <div class="sidebar-ad"> <a href="post-an-ad" class="hero-button btn-place-ad add-forall-btn" style="padding: 2px 5px 2px 4px !important; left: 5%;
			   top: 17px;"> 
			  <span class="ar-txt add-ar pull-right" style="margin-left: 7px;">أضف إعلانك مجانا </br>post free ad</span></a> </div>
			</div>
						 <span class="stickyserch" style="font-size: 20px;"><i class="fa fa-search" aria-hidden="true" style="margin-top: 17px;font-weight: 600;"></i></span>
						
						 <!-- <span class="user" style="font-size: 20px;"><i class="fa fa-user-o" aria-hidden="true" style="margin-top: 17px;font-weight: 600;"></i></span> -->
						<!-- ============================================================= Header Logo : End============================================================= -->
						<!-- <span class="stickyserch" style="font-size: 28px;"><i class="fa fa-search" aria-hidden="true" style="margin-top: 30px;
    padding-left: 57px;"></i></span>  -->

<!-- <ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip"> -->
				<!-- <li class="menu-item animate-dropdown"><a title="Store Locator" href="#"><i class="ec ec-map-pointer"></i>Store Locator</a></li>
				<li class="menu-item animate-dropdown"><a title="Track Your Order" href="track-your-order.html"><i class="ec ec-transport"></i>Track Your Order</a></li>
				<li class="menu-item animate-dropdown"><a title="Shop" href="shop.html"><i class="ec ec-shopping-bag"></i>Shop</a></li> -->
                 <?php if($userdata){
			if ( @$userdata['image'] ) {
	$timg = 'uploads/users/thumb/' . @$userdata['image'];
	$img = 'uploads/users/' . @$userdata['image'];
} else {
	$timg = 'assets/front_end/images/user-thumb.jpg';
	$img = 'assets/front_end/images/user-thumb.jpg';
} ?>
        <div class="header-login dropdown"> <a class="login-link logged-avathar dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="pro-image" src="<?php if(file_exists(@$timg)) echo $timg; else echo $img; ?>"> <!-- <?php echo $userdata['name']; ?> --> <span class="logged-angle d-inline"><i class="" aria-hidden="true"></i></span> </a>
		  <div class="dropdown-menu profile-open">
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
		<!-- <li class="menu-item animate-dropdown mobilelnone"> -->
         <a href="<?= Core::getBaseUrl() ?>login">
                    		<div class="useraccount" style="
	                    	position: absolute;
	                    	top: 18px;
	                    	right: 10%;
	                    	font-size: 20px;
	                    	color: #989191;
	                    	display: none;
	                    	">
	                    		<i class="fa fa-user" aria-hidden="true"></i>
	                    	</div>
                    	</a>
			<!-- <a title="My Account" href="<?=Core::getBaseUrl()?>login"><i class="ec ec-user"></i>Login / Sign Up</a> -->
		<?php } ?>
				
                
              <!--  </li>  -->
			<!-- </ul> -->

                    	<!-- <a href="<?= Core::getBaseUrl() ?>login">
                    		<div class="useraccount" style="
	                    	position: absolute;
	                    	top: 18px;
	                    	right: 10%;
	                    	font-size: 20px;
	                    	color: #989191;
	                    	display: none;
	                    	">
	                    		<i class="fa fa-user" aria-hidden="true"></i>
	                    	</div>
                    	</a> -->
                      <span class="mobilenav" style="color:#989191;font-size:22px;cursor:pointer;float: right;margin-top: 18px;margin-right: 8px;" onclick="openNav()">&#9776;<br><div style="margin-left: -9px;"></div></span>
                      
                      <div class="mobserach" style="
                      		position: fixed;
                      		opacity: 0;
                      		width: 100%;
    						top: 0px;
    						background: white;
   							padding-left: 4em;
   							padding-right: 4em;
						    padding-bottom: 5px;
    						padding-top: 5px;">
						<form name="frmSearch" action="<?= Core::getBaseUrl() ?>search" method="GET" >
							<input type="text" name="query" placeholder="Search.." style="font-size: 16px">
								<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
			
 
             

                     
				
					  </div>


                     <!--  <div class="mob_head_view" style="display: none;"><div class="mob_head_icon"> -->
                      	<!-- <span style="" class="mobhome_icons"><a title="Home" href="<?=Core::getBaseUrl()?>"><i class="fa fa-home" aria-hidden="true"></i>home</a></span>
                      	<span class="mobhome_icons"> <a href="http://yalafun.com" style=" margin-left: 10px;font-size: 12px;"><img src="<?=base_url()?>assets/front_end/images/yalafun.png" height="10px" width="15px" style="display: -webkit-inline-box;">Yalafun.com</a></span>
                      	<span> <a href="http://loozaa.com" style=" margin-left: 10px;"><img src="<?=base_url()?>assets/front_end/images/loozaa.png" height="10px" width="50px" style="display: -webkit-inline-box;"></a></span>
                         <span style="margin-left: 13px;"><a href="https://www.youtube.com/user/nojoomtube1?sub_confirmation=1" style="display: inline-block;"><img src="<?=base_url()?>assets/front_end/images/subscribe2.png" height="10px" width="40px" style="display: -webkit-inline-box;"></a></span> -->
                        <!--   <div class="mobile-profile">
					  
					 <?php if($userdata){
			if ( @$userdata['image'] ) {
	$timg = 'uploads/users/thumb/' . @$userdata['image'];
	$img = 'uploads/users/' . @$userdata['image'];
} else {
	$timg = 'assets/front_end/images/user-thumb.jpg';
	$img = 'assets/front_end/images/user-thumb.jpg';
}?>
						<div class="header-login-mob dropdown"> <a class="login-link-mob logged-avathar dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="pro-image" src="<?php if(file_exists(@$timg)) echo $timg; else echo $img; ?>"> <span class="logged-angle d-inline"><i class="" aria-hidden="true"></i></span> </a>
		  <div class="dropdown-menu profile-open">
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
		  <div class="mobilelogin" ><a title="My Account" href="<?=Core::getBaseUrl()?>login" style="margin-left: 21px;"><i class="fa fa-user" style="font-size: 12px;"></i><div style="margin-bottom: -22px;display: -webkit-inline-box;">Login</div></a></div>
		<?php } ?></div>

                      	</div>
                      	
                      </div> -->

						<div class="primary-nav animate-dropdown">
							<div class="clearfix">
								 <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#default-header">
										&#9776;
								 </button>
							 </div>

							<div class="collapse navbar-toggleable-xs" id="default-header">
							   <!-- <form class="navbar-search" method="get" action="/">-->
					<form class="navbar-search" role="search" action="<?= Core::getBaseUrl() ?>search" >
						<label class="sr-only screen-reader-text" for="search">Search for:</label>
						<div class="input-group">
							<input type="text" id="search" class="form-control search-field" dir="ltr" name="query" placeholder="Search for products..." />
							<div class="input-group-addon search-categories">
								<select name='product_cat' id='product_cat' class='postform resizeselect' >
									<option value='0' selected='selected'>All Categories</option>
									<option class="level-0" value="realestate">RealEstate</option>
									<option class="level-0" value="jobs">Jobs</option>
									<option class="level-0" value="auto">Auto</option>
									<option class="level-0" value="classifieds">Classifieds</option>
									<option class="level-0" value="electronics">Electronics</option>
									<option class="level-0" value="phones">Phones</option>
									<option class="level-0" value="computer">Computer</option>
									  <option class="level-0" value="services">Services</option>
								</select>
							</div>
							<div class="input-group-btn">
								<button type="submit" class="btn btn-secondary"><i class="ec ec-search"></i></button>
							</div>
						</div>
					</form>
							 <div class ="toggle_menu_mobile">
							 <!--<ul style="list-style:none;">
						 
						  
							   <li><a title="Home" href="<?=Core::getBaseUrl()?>">Home</a></li>
							  <li><a title="Real Estate new" href="<?=Core::getBaseUrl()?>real-estate">Real Estate</a></li>
							  <li><a title="Jobs" href="<?=Core::getBaseUrl()?>jobs">Jobs</a></li>
							  <li> <a title="Auto" href="<?=Core::getBaseUrl()?>auto">Auto</a></li>
								<li><a title="Classifieds" href="<?=Core::getBaseUrl()?>classifieds">Classifieds</a></li>
							<li><a title="Health Care" href="<?=Core::getBaseUrl()?>healthcare">Health Care</a></li>
								<li><a title="Woman & Beauty" href="<?=Core::getBaseUrl()?>women-beauty">Woman & Beauty</a></li>
								<li><a title="House Maids" href="<?=Core::getBaseUrl()?>housemaids">House Maids</a></li>
								<li><a title="Phones" href="<?=Core::getBaseUrl()?>phones">Phones</a></li>
								<li><a title="Electronics" href="<?=Core::getBaseUrl()?>electronics">Electronics</a></li>
							   <li><a title="Computers" href="<?=Core::getBaseUrl()?>computers">Computers</a></li>
								<li><a title="Education" href="<?=Core::getBaseUrl()?>education">Education</a></li>
							   <li><a title="Services" href="<?=Core::getBaseUrl()?>services">Services</a></li>
							   <li><a title="Services" href="<?=Core::getBaseUrl()?>services">About us</a></li>
							   <li><a title="Services" href="<?=Core::getBaseUrl()?>services">Contact us</a></li>
							   <li><a title="Services" href="<?=Core::getBaseUrl()?>services">Privacy policy</a></li>
							</ul>-->
							</div>
							</div>
						</div>

						<div class="header-support-info">
							<div class="media1">
								<!-- <span class="media-left support-icon media-middle"><i class="ec ec-support"></i></span> -->
								<div class="media-body desktopviewpost">
									<div class="hero-action-btn" >
										<a href="<?=Core::getBaseUrl()?>post-an-ad" class="big le-button ">أضف إعلانك مجانا  <br/> POST FREE AD</a>
									</div>
									</div>
									 
							
						
						
					   
						<!--<div class="header-login dropdown"> <a class="login-link logged-avathar dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="pro-image" src="<?php if(file_exists(@$timg)) echo $timg; else echo $img; ?>"> <?php echo $userdata['name']; ?> <span class="logged-angle d-inline"><i class="" aria-hidden="true"></i></span> </a>
		  <div class="dropdown-menu profile-open">
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
		</div>-->
		
		</div>
		</div>
  <!-- <div class="logo-sec-add" id="add-load"> 
		
		<img src="assets/front_end/images/new-add.jpg" class="img-fluid"> 
		
	  </div> -->
	  <div class="logo-sec-add_goog"> 
	  	<div class="home-v2-banner-block animate-in-view fadeIn animated homepcad" data-animation=" animated fadeIn">
	  		
	 <div class="home-v2-fullbanner-ad fullbanner-ad" style="">
		<!-- <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:inline-block;width:728px;height:90px"
		data-ad-client="ca-pub-8267866280490368"
		data-ad-slot="4614962273"></ins> 
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script> -->
		<?php $video = array('cap2.mp4','furniture2.mp4');
     $random_video = array_rand($video);
     ?>
		<a href="https://loozaa.com" target="_blank"><video width="700" height="150" autoplay muted loop>
  <source src="assets/images/<?php echo $video[$random_video];?>" type="video/mp4">
  <!-- <source src="movie.ogg" type="video/ogg"> -->
  
</video></a>
	</div> 
</div>
	  </div>  <!-- /.row -->

 <!-- <div class="container-fluid" style="padding: 0px; margin-bottom: 10px;">
	<div class="row">
		<div class="col col-md-12">
			
		</div>
	</div>
</div>  -->
		</header><!-- #masthead -->
<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	<a title="Home" href="<?=Core::getBaseUrl()?>">Home</a>
	<a title="Auto" href="<?=Core::getBaseUrl()?>auto">Auto</a>
	<a title="Real Estate new" href="<?=Core::getBaseUrl()?>real-estate">Real Estate</a>
	<a title="Classifieds" href="<?=Core::getBaseUrl()?>classifieds">Classifieds</a>
	<a title="Jobs" href="<?=Core::getBaseUrl()?>jobs">Jobs</a>
	<a title="Electronics" href="<?=Core::getBaseUrl()?>electronics">Electronics</a>
	<a title="Phones" href="<?=Core::getBaseUrl()?>phones">Phones</a>
	<a title="Computers" href="<?=Core::getBaseUrl()?>computers">Computers</a>
	<a title="Services" href="<?=Core::getBaseUrl()?>services">Services</a>
	<a title="Services" href="<?=Core::getBaseUrl()?>about-us">About us</a>
	<a title="Services" href="<?=Core::getBaseUrl()?>contact-us">Contact us</a>
	<a title="Services" href="<?=Core::getBaseUrl()?>privacy-policy">Privacy policy</a>
</div>
			<?php $this->load->view('blocks/navigation'); ?>