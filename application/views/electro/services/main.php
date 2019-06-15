<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$searchestate = $this->session->userdata('searchestate');
$country_code = $this->session->userdata('country_code');
$currency = $this->session->userdata('currency');?>
<header class="page-header mobirealhed" style="display:none">
								<h1 class="page-title" style="font-size: 20px;    padding-left: 17%;">Services<span><img src="assets/front_end/images/cat/SERVICES.png" width="60px" height="60px" style="margin-top: -36px;   margin-left: 28%;"></span><span class="homeright" style="margin-top: -40px;margin-right: 25%;font-size: 22px;">خدمات</span></h1>
								<p class="woocommerce-result-count"></p>
							</header>
                          

							<div class="shop-control-bar mobihousecontrol" style="display:none">
								<!--<ul class="shop-view-switcher nav nav-tabs types navview" role="tablist">
									<li class="nav-item insidelist"><a class="nav-link switcher active" id="switcher-listview" data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                                    <li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
									<li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									
								</ul>
                                <ul class="shop-view-switcher nav nav-tabs types mobinav" role="tablist" style="display:none;">
									<li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									
								</ul>-->
								<!--<ul class="shop-view-switcher nav nav-tabs tabtypes tabrealfull" role="tablist">
									<li class="typestab" >
										<a class="nav-link link-radius1 btnRent active" data-toggle="tab" id="2" href="#rent" role="tab">Rent<span style="margin-left: 3%;">إيجار</span></a>
									</li>
									<li class="typestab1 tabrealar">
										<a class="nav-link link-radius1 btnBuy  show" data-toggle="tab" id="1" href="#buy" role="tab">Buy<span style="margin-left: 7%;">شراء</span></a>
									</li>
								</ul>-->
										
						<?php 
								/**
								 *	Sidebard Category Listings
								 */
								$cats[] = Core::makeClass(['id' => 'Maintenance', 'category' => 'Maintenance' , 'ar_category' => 'صيانة']);
								$cats[] = Core::makeClass(['id' => 'Services', 'category' => 'Services' , 'ar_category' => 'خدمات']);
								$this->load->view('blocks/sidebar/categorylistwomen', ['cats' => $cats]); 
							?>
                        
								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>


							</div>
<?php $this->load->view('electro/services/filter');?>  
			<div id="content" class="site-content content-ser" tabindex="-1">
				<div class="container">
					<nav class="woocommerce-breadcrumb" ><!--<a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets--></nav>
					<div id="primary" class="content-area">
						<main id="main" class="site-main">
							
							<header class="page-header pcrealhead">
								
								 <h1 class="page-title" style="font-size: 30px;">Services<span class="homeright">خدمات</span></h1>
							</header>
							<div class="shop-control-bar pcrealcntrl">
								<ul class="shop-view-switcher nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
									<li class="nav-item"><a class="nav-link " data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									<li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
								</ul>
								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>
							</div>
							
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="list-view-small" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results-listsmall">
										</div>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane " id="grid" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results">
										</div>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane" id="list-view" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results-list">
										</div>
									</ul>
								</div>
							</div>
						</main><!-- #main -->
						 <?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
					</div><!-- #primary -->
					<div id="sidebar" class="sidebar" role="complementary">
						<aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
							<?php 
								/**
								 *  Sidebard Category Listings
								 */
								/*$cats[] = Core::makeClass(['id' => 'Maintenance', 'category' => 'Maintenance']);
								$cats[] = Core::makeClass(['id' => 'Services', 'category' => 'Services']);*/
								$this->load->view('blocks/sidebar/categorylist', ['cats' => $cats]); 
							?>
						</aside>
						<aside class="widget widget_text">
							<div class="textwidget">
								<a href="http://yalafun.com/"><img src="assets/front_end/images/bannerad3.jpg" alt="Banner" class="bannerfull"></a>
							</div>
						</aside>
							<!-- <h4 style="text-align: center;color: orange;">نظرة على الأسواق الأخرى</h4>
						 <h4 style="text-align: center;color: orange;">LOOK AROUND ELSEWHERE</h4> -->
							<?php
								// $ads = Core::getModel('ads');
								// $str = Core::getHelper('str');
								// $img = Core::getHelper('image');
								// $date = Core::getHelper('date');
								// $loc = Core::getHelper('location');
								// $ads = $ads->getAdsFromDiffCountry();
								// shuffle($ads);
								// foreach( $ads as $ad ) {
								// 	$ad->url = $str->makeUrlFromAd( $ad );
								// 	$ad->img = $img->getMainImage( $ad->id );
								// 	$ad->imgCount = count($img->getImages( $ad->id ));
								// 	$ad->mobdateAdded = $date->getMobileDate($ad->added_date);
								// 	// $this->load->view('blocks/sidebar/adsfromothercountry', $ad);
								// 	$this->load->view('blocks/sidebar/adsdiffc', $ad);

								//}
							$this->load->view('blocks/slider/lookaround', $ad);
								?>
						 <?php $this->load->view('blocks/body/categorymenu'); ?>
					</div>
				</div><!-- .container -->
			</div><!-- #content -->
			<footer id="colophon" class="site-footer mob-site-footer">
				<div class="footer-widgets">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-xs-12">
								<aside class="widget clearfix">
									<div class="body">
										<h4 class="widget-title">Special Deals</h4>
												<?php $this->load->view('front_end/include/special_deals.php'); ?>
										</ul>
									</div>
								</aside>
							</div>
							<div class="col-lg-6 col-md-6 col-xs-12">
								<aside class="widget clearfix">
									<div class="body"><h4 class="widget-title">Hot Deals</h4>
											<?php $this->load->view('front_end/include/hot_deals.php'); ?>
									</div>
								</aside>
							</div>
							
						</div>
					</div>
				</div>
			</footer><!-- #colophon -->
  </div>
</div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
<script type="application/javascript">
function getServicesParams( mode = "listings" ) {
	var param = {
		'searchservices': mode,
		'purpose'    : $("#type").val(),
		'category'   : $("#category").val(),
		'keyword'    : $("#keyword").val(),
		'location'   : $("#location").val(),
		'area'   	 : $("#area").val()
	};
	return param;
}

// display how many results
function resCounter() {
	$.getJSON( apiUrl + parse(getServicesParams('rescount')), function( data ) {
		if( data == false ){
			$("button#searchServices").text('Find (0)');
		}else{
			$("button#searchServices").text('Find (' + data + ')');
		}
	});
}

function clearFilter() {
	$("#type").val("");
	$("#keyword").val("");
	$("#location").val("");
	$("#area").val("");
}

$( "#location" ).change(function() {
	param = { 
		'getareas': 'getListings', 
		'id'   : $('#location').val()
	};
	$('#area').empty();
	$('#area').append('<option value="">Area</option>');
	$.getJSON( apiUrl + parse(param), function( data ) {
		$.each(data, function( index, field ) {
			$('#area').append('<option value="'+ field.id +'">'+ field.location +'</option>');
		});
		
	});
});
var category = null;
var purpose = 'Maintenance';
$(document).ready(function() {
	param = { 
		'services':'getListings',
		'purpose': purpose,
		'category': category
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeServicesListings(data);
		makePagination(data, 'makeServicesListings');
	});
});

// load the listing based on the category id
$(document).on('click','.category',function(e){
	param = { 
		'services':'getListings', 
		'purpose':this.id, 
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeServicesListings(data);
		makePagination(data, 'makeServicesListings');
	});
});

// load the listing based on the category id and purpose
$(document).on('click', 'button#searchServices', function(e){
	listingsuri = parse(getServicesParams());
	$.getJSON( apiUrl + parse(getServicesParams()), function( data ) {
		makeServicesListings(data);
		makePagination(data, 'makeServicesListings');
	});
});

$( "#type, #location, #area, #category" ).change(function() {
	resCounter();
});

$('#keyword').bind('input', function(){
	resCounter();
});
</script>