
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="apple-mobile-web-app-capable" content="yes"/>
<?php
$userdata = $this->session->userdata('logged_yalalink_userdata');	
$website_count = $this->yalalink_model->InsertCount();
//$res = file_get_contents('https://www.iplocate.io/api/lookup/'.$this->input->ip_address());
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
<meta property="og:image" content="<?php if(@$images){ echo 'uploads/images/'.@$images[0]->image; }else{ echo 'assets/front_end/images/logo-WEB.png'; }?>"/>
<meta property="og:description" content="<?php if(@$website) { echo @$website->meta_description; } ?>" />
<meta property="og:url" content="<?php echo $actual_link; ?>" />
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


        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/font-electro.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/colors/yellow.css" media="all" />
        <link rel="stylesheet" type="text/css" href="assets/css/override.css" media="all" />
        
        <link rel="stylesheet" type="text/css" href="assets/front_end/css/hero.css" media="all" />
      
         
       <link rel="stylesheet" type="text/css" href="assets/front_end/css/material-form.css" media="all" />
          <link rel="stylesheet" type="text/css" href="assets/front_end/css/material-custom.css" media="all" />
           <link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css" media="all" />
             <link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-material-design.min.css" media="all" />
             <link rel="stylesheet" type="text/css" href="assets/front_end/css/card.css" media="all" />
         
         
         
        
        <!-- <link href="assets/front_end/css/hero.css?<?php echo date('l jS \of F Y h:i:s A'); ?>" rel="stylesheet"> -->


        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic' rel='stylesheet' type='text/css'>

        <!-- <link rel="shortcut icon" href="assets/images/fav-icon.png"> -->
        <link rel="shortcut icon" href="assets/front_end/images/fav-icon.png">
    </head>

<body class="home-v2">
	<div id="page" class="hfeed site">
            <a class="skip-link screen-reader-text" href="#site-navigation">Skip to navigation</a>
            <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

            <?php $this->load->view('blocks/top'); ?>

            <header id="masthead" class="site-header header-v2">
                <div class="container">
                    <div class="row">

                        <!-- ============================================================= Header Logo ============================================================= -->
                        <div class="header-logo">
                            <a href="<?=base_url()?>" class="header-logo-link">
                                <img src="<?=base_url()?>assets/front_end/images/logo-WEB.png">
                            </a>
                        </div>
                        <!-- ============================================================= Header Logo : End============================================================= -->

                        <div class="primary-nav animate-dropdown">
                            <div class="clearfix">
                                 <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#default-header">
                                        &#9776;
                                 </button>
                             </div>

                            <div class="collapse navbar-toggleable-xs" id="default-header">
                             <form class="navbar-search" method="get" action="/">
                        <label class="sr-only screen-reader-text" for="search">Search for:</label>
                        <div class="input-group">
                            <input type="text" id="search" class="form-control search-field" dir="ltr" value="" name="s" placeholder="Search for products" />
                            <div class="input-group-addon search-categories">
                                <select name='product_cat' id='product_cat' class='postform resizeselect' >
                                    <option value='0' selected='selected'>All Categories</option>
                                    <option class="level-0" value="laptops-laptops-computers">Laptops</option>
                                  
                                   
                                </select>
                            </div>
                            <div class="input-group-btn">
                                <input type="hidden" id="search-param" name="post_type" value="product" />
                                <button type="submit" class="btn btn-secondary"><i class="ec ec-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <div class ="toggle_menu_mobile">
                     
                     <ul style="list-style:none;">
                         
                          
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
                            </ul>
                    </div>
                                
                            </div>
                        </div>

                        <div class="header-support-info">
                            <div class="media">
                                <!-- <span class="media-left support-icon media-middle"><i class="ec ec-support"></i></span> -->
                                <div class="media-body">
                                    <div class="hero-action-btn" >
                                        <a href="<?=Core::getBaseUrl()?>post-an-ad" class="big le-button ">أضف إعلانك مجانا  <br/> POST FREE AD</a>
                                    </div>
                                    <!-- <span class="support-number"><strong>Support</strong> (+800) 856 800 604</span><br/>
                                    <span class="support-email">Email: info@electro.com</span> -->
                                </div>
                            </div>
                        </div>

                    </div><!-- /.row -->
                </div>
            </header><!-- #masthead -->

            <?php $this->load->view('blocks/navigationinside'); ?>
			
<style>
.stickyclass {
  padding: 10px 16px;
  
  
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}
</style>