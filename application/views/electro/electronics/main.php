<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$searchestate = $this->session->userdata('searchestate');
$country_code = $this->session->userdata('country_code');
$currency = $this->session->userdata('currency');?>
<?php $this->load->view('blocks/body/scrolltop'); ?>

<header class="page-header mobirealhed" style="display:none">
								<h1 class="page-title" style="font-size: 20px;    padding-left: 15%;">Electronics<span><img src="assets/front_end/images/cat/ELECTRONICS.png" width="60px" height="60px" style="margin-top: -36px;margin-left: 31%;"></span><span class="homeright" style="margin-top: -40px;margin-right: 23%;font-size: 22px;">الكترونيات</span></h1>
								<p class="woocommerce-result-count"></p>
							</header>
                          

							<div class="shop-control-bar mobirealcontrol" style="display:none">
								<ul class="shop-view-switcher nav nav-tabs types navview" role="tablist">
									<li class="nav-item insidelist"><a class="nav-link switcher active" id="switcher-listview" data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                                    <li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
									<li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									
								</ul>
                                <ul class="shop-view-switcher nav nav-tabs types mobinav" role="tablist" style="display:none;">
									<li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									
								</ul>
								<ul class="shop-view-switcher nav nav-tabs tabtypes" role="tablist">
									   <li class="typestab" ><a class="nav-link link-radius1 purpose <?php if($this->input->get('type')=='Used'){ echo 'active'; }elseif($this->input->get('type')==''){ echo 'active'; } ?> type" id="Used" data-toggle="tab" href="#used" role="tab">Used<span style="margin-left: 7%;">مستعمل</span></a>  </li>
									   <li class="typestab1"><a class="nav-link link-radius1 purpose <?php if($this->input->get('type')=='New'){ echo 'active'; } ?> type" id="New" data-toggle="tab" href="#new" role="tab">New<span style="margin-left: 7%;">جديد</span></a> </li>
										</ul>
										
		<?php 
							/**
							 *	Sidebard Category Listings
							 */
							$class = Core::getHelper('db')
								->get('tbl_electronics_category')
								->order_by('id', 'DESC')
								->limit(7)
								->get();
							$data = $class->result();
						$this->load->view('blocks/sidebar/categorylistelect', ['cats' => $data]); 
						?>
                        
								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>


							</div>

<?php $this->load->view('blocks/electfilter.php');?>
			<div id="content" class="site-content" tabindex="-1">
				<?php $this->load->view('blocks/sidebar/socialicons'); ?>
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
								<h1 class="page-title" style="font-size: 30px;">Electronics<span class="homeright">الكترونيات</span></h1>
								<p class="woocommerce-result-count"></p>
							</header>
							

							<div class="shop-control-bar pcrealcntrl">
								<ul class="shop-view-switcher nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
									<li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
									<li class="nav-item"><a class="nav-link " data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
								</ul>
							   <ul class="shop-view-switcher nav nav-tabs tabtypes" role="tablist">
									   <li class="typestab" ><a class="nav-link link-radius1 purpose <?php if($this->input->get('type')=='Used'){ echo 'active'; }elseif($this->input->get('type')==''){ echo 'active'; } ?> type" id="Used" data-toggle="tab" href="#used" role="tab">Used<span style="margin-left: 7%;">جديد</span></a>  </li>
									   <li class="typestab1"><a class="nav-link link-radius1 purpose <?php if($this->input->get('type')=='New'){ echo 'active'; } ?> type" id="New" data-toggle="tab" href="#new" role="tab">New<span style="margin-left: 7%;">مستعمل</span></a> </li>
										</ul>
								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>
							</div>
							
								
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane " id="grid" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results">
										</div>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane active" id="list-view" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results-list">
										</div>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane" id="list-view-small" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results-listsmall">
										</div>
									</ul>
								</div>
							</div>
							<!-- pagination -->
							<?php $this->load->view('blocks/body/pagination'); ?>
						</main><!-- #main -->
						 <?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
					</div><!-- #primary -->

					<div id="sidebar" class="sidebar" role="complementary">
					<?php
						/**
						 *	Category
						 */
						$class = Core::getHelper('db')
								->get('tbl_electronics_category')
								->order_by('id', 'DESC')
								->limit(7)
								->get();
							$data = $class->result();
						$this->load->view('blocks/sidebar/categorylistelectdesk', ['cats' => $data]); 
					?>
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
							$this->load->view('blocks/slider/lookaround', $ad);
								//}
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
  <!-- Choose country -->
 

  </div>
  <!-----col------->
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
<script type="application/javascript">
var category = 'all';
var purpose = 'Used';
function getElectroParams( mode = "listings") {
	var param = {
		'searchelectronics': mode,
		'purpose'	: $("#elt_purpose").val(),
		'category'	: $("#elt_category").val(),
		'age'		: $("#elt_age").val(),
		'usage'		: $("#elt_usage").val(),
		'condition'	: $("#elt_condition").val(),
		'warranty'	: $("#elt_warranty").val(),
		'maxPrice'	: $("#elt_max_price").val(),
		'minPrice'	: $("#elt_min_price").val(),
		'location'	: $("#elt_location").val(),
		'keyword'	: $("#elt_keyword").val()
	};
	return param;
}

function clearSearchElectro() {
	$("#elt_purpose").val("");
	$("#elt_category").val("");
	$("#elt_age").val("");
	$("#elt_usage").val("");
	$("#elt_condition").val("");
	$("#elt_warranty").val("");
	$("#elt_max_price").val("");
	$("#elt_min_price").val("");
	$("#elt_location").val("");
	$("#elt_keyword").val("");
	$("button#searchElectronics").text('Find');
}

// display how many results
function resCounter() {
	$.getJSON( apiUrl + parse(getElectroParams('rescount')), function( data ) {
		if( data == false ){
			$("button#searchElectronics").text('Find (0)');
		}else{
			$("button#searchElectronics").text('Find (' + data + ')');
		}
	});
}

$(document).ready(function(e) {
	param = { 
		'electronics': 'getListings', 
		'purpose'   : purpose, 
		'category'  : category
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeElectroListings(data);
		makePagination(data, "makeElectroListings");
	});
});

// load the listing based on the category id
$(document).on('click','.category',function(e){
	category = this.id;
	param = { 
		'electronics': 'getListings', 
		'purpose'	: purpose, 
		'category'	: category,
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeElectroListings(data);
		makePagination(data, "makeElectroListings");
	});
});

// load the listing based on the category id and purpose
$(document).on('click', '.purpose', function(e){
	purpose = this.id;
	if( this.id == "New" ) {
		$("#Used").removeClass("active");
	}else{
		$("#New").removeClass("active");
	}
	param = { 
		'electronics': 'getListings', 
		'purpose'	: purpose, 
		'category'	: category,
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeElectroListings(data);
		makePagination(data, "makeElectroListings");
	});
});

// load the listing based on the category id and purpose
$(document).on('click', 'button#searchElectronics', function(e){
	listingsuri = parse(getElectroParams());
	$.getJSON( apiUrl + parse(getElectroParams()), function( data ) {
		makeElectroListings(data);
		makePagination(data, "makeElectroListings");
	});
});

$('#elt_max_price, #elt_min_price, #elt_location, #elt_keyword').bind('input', function(){
	resCounter();
});
$( "#elt_purpose, #elt_category, #elt_age, #elt_usage, #elt_condition, #elt_warranty" ).change(function() {
	resCounter();
});

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
</script>