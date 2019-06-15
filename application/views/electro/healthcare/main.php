<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$searchestate = $this->session->userdata('searchestate');
$country_code = $this->session->userdata('country_code');
$currency = $this->session->userdata('currency');?>
<header class="page-header mobirealhed" style="display:none">
								<h1 class="page-title" style="font-size: 20px;padding-left: 17px;">Health Care<span><img src="assets/front_end/images/cat/healthcare.png" width="60px" height="60px" style="margin-top: -36px;margin-left: 164px;"></span><span class="homeright" style="margin-top: -40px;margin-right: 37px;font-size: 22px;"></span></h1>
								<p class="woocommerce-result-count"></p>
							</header>
                          

							<div class="shop-control-bar mobihealthcontrol" style="display:none">
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
								 *  Sidebard Category Listings
								 */
								$cats[] = Core::makeClass(['id' => 'Hospitals', 'category' => 'Hospitals']);
								$cats[] = Core::makeClass(['id' => 'Clinics', 'category' => 'Clinics']);
								$cats[] = Core::makeClass(['id' => 'Dental Hospitals', 'category' => 'Dental Hospitals']);
								$cats[] = Core::makeClass(['id' => 'Dentist', 'category' => 'Dentist']);
								$this->load->view('blocks/sidebar/categorylisthealth', ['cats' => $cats]); 
							?>
                        
								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>


							</div>
<?php $this->load->view('electro/healthcare/filter');?>  
			<div id="content" class="site-content" tabindex="-1">
				<div class="container">
					<nav class="woocommerce-breadcrumb" ><!--<a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets--></nav>
					<div id="primary" class="content-area">
						<main id="main" class="site-main">
							<section class="section-product-cards-carousel" >
							<header class="page-header pcrealhead">
								<h1 class="page-title ">Health Care</h1>
								
							</header>
							<div class="shop-control-bar pcrealcntrl">
								<ul class="shop-view-switcher nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
									<li class="nav-item"><a class="nav-link " data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									<li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
								</ul>

								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>
							</div>
							</section>
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
								/*$cats[] = Core::makeClass(['id' => 'Hospitals', 'category' => 'Hospitals']);
								$cats[] = Core::makeClass(['id' => 'Clinics', 'category' => 'Clinics']);
								$cats[] = Core::makeClass(['id' => 'Dental Hospitals', 'category' => 'Dental Hospitals']);
								$cats[] = Core::makeClass(['id' => 'Dentist', 'category' => 'Dentist']);*/
								$this->load->view('blocks/sidebar/categorylist', ['cats' => $cats]); 
							?>
						</aside>
						<aside class="widget widget_text">
							<div class="textwidget">
								<a href="#"><img src="assets/images/looza1.jpg" alt="Banner"></a>
							</div>
						</aside>
						
						 <?php
						 	if(! empty($countrylatest) ) {
						 		?>
						 		<aside class="widget widget_products">
									<?php $this->load->view('front_end/include/latest_countrywise.php'); ?>
								</aside>
						 		<?php
						 	}

						 	if(! empty($countrylatest1) ) {
						 		?>
						 		<aside class="widget widget_products">
									<?php $this->load->view('front_end/include/latest_countrywise1.php'); ?>
								</aside>
						 		<?php
						 	}

						 	if(! empty($countrylatest2) ) {
						 		?>
						 		<aside class="widget widget_products">
									<?php $this->load->view('front_end/include/latest_countrywise2.php'); ?>
								</aside>
						 		<?php
						 	}
						 ?>
						 <?php $this->load->view('blocks/body/categorymenu'); ?>
					</div>

				</div><!-- .container -->
			</div><!-- #content -->
			<footer id="colophon" class="site-footer">
				<div class="footer-widgets">
					<div class="container">
						<div class="row">
							<!--<div class="col-lg-4 col-md-4 col-xs-12">
								<aside class="widget clearfix">
									<div class="body">
										<h4 class="widget-title">Special Deals</h4>
												<?php $this->load->view('front_end/include/special_deals.php'); ?>
										</ul>
									</div>
								</aside>
							</div>
							<div class="col-lg-4 col-md-4 col-xs-12">
								<aside class="widget clearfix">
									<div class="body"><h4 class="widget-title">Hot Deals</h4>
											<?php $this->load->view('front_end/include/hot_deals.php'); ?>
									</div>
								</aside>
							</div>
							<div class="col-lg-4 col-md-4 col-xs-12">
								<aside class="widget clearfix">
									<div class="body">
										<h4 class="widget-title">Top Rated Products</h4>
										<ul class="product_list_widget">
											<li>
												<a href="single-product.php" title="Notebook Black Spire V Nitro  VN7-591G">
													<img class="wp-post-image" data-echo="assets/images/footer/6.jpg" src="assets/images/blank.gif" alt="">
													<span class="product-title">Notebook Black Spire V Nitro  VN7-591G</span>
												</a>
												<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
											</li>
											<li>
												<a href="single-product.php" title="Apple MacBook Pro MF841HN/A 13-inch Laptop">
													<img class="wp-post-image" data-echo="assets/images/footer/7.jpg" src="assets/images/blank.gif" alt="">
													<span class="product-title">Apple MacBook Pro MF841HN/A 13-inch Laptop</span>
												</a>
												<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><span class="amount">&#36;1,800.00</span></span>
											</li>
											<li>
												<a href="single-product.php" title="Tablet White EliteBook Revolve  810 G2">
													<img class="wp-post-image" data-echo="assets/images/footer/2.jpg" src="assets/images/blank.gif" alt="">
													<span class="product-title">Tablet White EliteBook Revolve  810 G2</span>
												</a>
												<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><span class="amount">&#36;1,999.00</span></span>
											</li>
										</ul>
									</div>
								</aside>
							</div>-->
						</div>
					</div>
				</div>
			</footer><!-- #colophon -->
  </div>
</div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
<script type="application/javascript">
function getHealtcareParams( mode = "listings" ) {
	var param = {
		'searchhealthcare': mode,
		'purpose'    : $("#type").val(),
		'keyword'    : $("#keyword").val(),
		'location'   : $("#location").val(),
		'area'   	 : $("#area").val()
	};
	return param;
}

// display how many results
function resCounter() {
	$.getJSON( apiUrl + parse(getHealtcareParams('rescount')), function( data ) {
		if( data == false ){
			$("button#searchHealthcare").text('Find (0)');
		}else{
			$("button#searchHealthcare").text('Find (' + data + ')');
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
var purpose = 'Hospitals';
$(document).ready(function() {
	param = { 
		'healthcare':'getListings',
		'purpose': purpose,
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeHealthcareListings(data);
		makePagination(data, 'makeHealthcareListings');
	});
});

// load the listing based on the category id
$(document).on('click','.category',function(e){
	param = { 
		'healthcare':'getListings', 
		'purpose':this.id, 
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeHealthcareListings(data);
		makePagination(data, 'makeHealthcareListings');
	});
});

// load the listing based on the category id and purpose
$(document).on('click', 'button#searchHealthcare', function(e){
	listingsuri = parse(getHealtcareParams());
	$.getJSON( apiUrl + parse(getHealtcareParams()), function( data ) {
		makeHealthcareListings(data);
		makePagination(data, 'makeHealthcareListings');
	});
});

$( "#type, #location, #area" ).change(function() {
	resCounter();
});

$('#keyword').bind('input', function(){
	resCounter();
});
</script>