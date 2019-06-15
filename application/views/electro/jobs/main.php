<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$searchestate = $this->session->userdata('searchestate');
$country_code = $this->session->userdata('country_code');
$currency = $this->session->userdata('currency');?>
<?php $this->load->view('blocks/body/scrolltop'); ?>
<header class="page-header mobirealhed" style="display:none">
								<h1 class="page-title" style="font-size: 20px;padding-left: 24%;">Jobs<span><img src="assets/front_end/images/cat/JOBS.png" width="60px" height="60px" style="margin-top: -36px;margin-left: 24%;"></span><span class="homeright" style="margin-top: -40px;margin-right: 35%;font-size: 22px;">وظائف</span></h1>
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
								 *  Sidebard Category Listings
								 */
								$cats[] = Core::makeClass(['id' => 'Hiring', 'category' => 'Job Offers' , 'ar_category' =>'عروض عمل']);
								$cats[] = Core::makeClass(['id' => 'Looking', 'category' => 'Talents Available' , 'ar_category' =>'خبرات متوفرة']);
								$this->load->view('blocks/sidebar/categorylistjobs', ['cats' => $cats]); 
							?>
								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>


							</div>
<?php $this->load->view('electro/jobs/filter');?>  
		<div id="content" class="site-content contentjob" tabindex="-1">
				<div class="container">
					<nav class="woocommerce-breadcrumb" ><!--<a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets--></nav>
					<div id="primary" class="content-area">
						<main id="main" class="site-main">
                        <div class="home-v2-banner-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
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
							<header class="page-header pcrealhead">
									<h1 class="page-title" style="font-size: 30px;">Jobs<span class="homeright">وظائف</span></h1>
								
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
								//$cats[] = Core::makeClass(['id' => 'Hiring', 'category' => 'Job Offers']);
								//$cats[] = Core::makeClass(['id' => 'Looking', 'category' => 'Talents Available']);
								$this->load->view('blocks/sidebar/categorylist', ['cats' => $cats]); 
							?>
						<aside class="widget widget_text">
							<div class="textwidget">
								<a href="http://yalafun.com/FunTv/"><img src="assets/front_end/images/bannerad2.jpg" alt="Banner" class="bannerfull"></a>
							</div>
						</aside>

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
								// }
							$this->load->view('blocks/slider/lookaround', $ad);
								?>
						<?php $this->load->view('blocks/body/categorymenu'); ?>
					</div>
				</div><!-- .container -->
			</div><!-- #content -->
			<footer id="colophon" class="site-footer mob-site-footer" style="dispaly:none;">
				<div class="footer-widgets">
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-xs-12">
								<aside class="widget clearfix">
									<div class="body">
										<h4 class="widget-title">Special Deals</h4>
												<?php $this->load->view('front_end/include/special_deals.php'); ?>
										</ul>
									</div>
								</aside>
							</div>
							<div class="col-lg-4 col-md-6 col-xs-12">
								<aside class="widget clearfix">
									<div class="body"><h4 class="widget-title">Hot Deals</h4>
											<?php $this->load->view('front_end/include/hot_deals.php'); ?>            						</div>
								</aside>
							</div>
							
						</div>
					</div>
				</div>

				
			</footer><!-- #colophon -->
  </div>
</div>
</div>
<div class="modal fade email-to-modal" id="sendMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paper-plane" aria-hidden="true"></i>Send E-mail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="send_email" role="form" action="emailContact" method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="page_url" value="<?php echo $meta_url; ?>">
        <input type="hidden" name="userid" value="<?php if(isset($userdata['userid'])) echo $userdata['userid']; ?>">
        <input type="hidden" name="postid" value="<?php echo $view->id; ?>">
        <input type="hidden" name="poster-email" value="<?php if($view->email) echo $view->email; ?>">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
            <div class="form-group bmd-form-group">
              <label for="formGroupExampleInput2" class="bmd-label-floating">Name:</label>
              <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="name" name="name" style="border-bottom: 1px solid;
    border-radius: inherit;">
            </div>
            </div> 
            <div class="col-md-6">
            <div class="form-group bmd-form-group">
              <label for="formGroupExampleInput2" class="bmd-label-floating">E-mail:</label>
              <input type="email" class="form-control no-border mat-txt mat-font first-txt" id="email" name="email">
            </div>
            </div> 
          </div>
          <div class="row">
          <div class="col-md-6">
            <div class="form-group bmd-form-group">
            <label for="formGroupExampleInput2" class="bmd-label-floating">Phone:</label>
            <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="phone" name="phone">
            </div>
          </div> 
          </div>
          <div class="row">
          <div class="col-md-12">
      <div class="form-group bmd-form-group">
      <label for="exampleTextarea" class="bmd-label-floating">Message:</label>
      <textarea class="form-control" id="message" name="message" rows="3" style="    border-bottom: 1px solid;
    border-radius: inherit;"></textarea>
      </div>
      </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit mail-btn" style="background: #de87ab;">Submit
          </button>
        </div>
      </form>
        </div>
    </div>
  </div>
<?php $this->load->view('front_end/include/footer'); ?>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="application/javascript">
function getJobsParams( mode = "listings" ) {
	var param = {
		'searchjobs': mode,
		'purpose'    : $("#type").val(),
		'keyword'    : $("#keyword").val(),
		'location'   : $("#location").val(),
		'area'   	 : $("#area").val()
	};
	return param;
}

// display how many results
function resCounter() {
	$.getJSON( apiUrl + parse(getJobsParams('rescount')), function( data ) {
		if( data == false ){
			$("button#searchJobs").text('Find (0)');
		}else{
			$("button#searchJobs").text('Find (' + data + ')');
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
var purpose = 'Hiring';
$(document).ready(function() {
	param = { 
		'jobs':'getListings',
		'purpose': purpose,
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeJobsListings(data);
		makePagination(data, 'makeJobsListings');
	});
});

// load the listing based on the category id
$(document).on('click','.category',function(e){
	param = { 
		'jobs':'getListings', 
		'purpose':this.id, 
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeJobsListings(data);
		makePagination(data, 'makeJobsListings');
	});
});

// load the listing based on the category id and purpose
$(document).on('click', 'button#searchJobs', function(e){
	listingsuri = parse(getJobsParams());
	$.getJSON( apiUrl + parse(getJobsParams()), function( data ) {
		makeJobsListings(data);
		makePagination(data, 'makeJobsListings');
	});
});

$( "#type, #location, #area" ).change(function() {
	resCounter();
});

$('#keyword').bind('input', function(){
	resCounter();
});
</script>