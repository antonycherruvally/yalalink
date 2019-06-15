<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$searchestate = $this->session->userdata('searchestate');
$country_code = $this->session->userdata('country_code');
$currency = $this->session->userdata('currency');?>
<?php $this->load->view('blocks/body/scrolltop'); ?>

<header class="page-header mobirealhed" style="display:none">
								<h1 class="page-title" style="font-size: 20px;padding-left: 20%;">
									Auto
									<span>
										<img src="assets/front_end/images/cat/AUTO.png" width="60px" height="60px" style="margin-top: -36px;margin-left: 24%;">
									</span>
									<span class="homeright" style="margin-top: -40px; margin-right: 23%;font-size: 22px;">
										مركبات
									</span>
								</h1>
								<p class="woocommerce-result-count"></p>
							</header>
                          

							<div class="shop-control-bar mobiautocontrol" style="display:none">
								<ul class="shop-view-switcher nav nav-tabs types navview" role="tablist">
									<li class="nav-item insidelist"><a class="nav-link switcher active" id="switcher-listview" data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                                    <li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
									<li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									
								</ul>
                                <ul class="shop-view-switcher nav nav-tabs types mobinav" role="tablist" style="display:none;">
									<li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									
								</ul>
								<ul class="shop-view-switcher nav nav-tabs tabtypes" role="tablist">
									<li class="typestab typesautotab" >
										<a class="nav-link link-radius1 purpose <?php if($this->input->get('type')=='Used' || $this->input->get('type')==''){ echo 'active'; } ?>" data-toggle="tab" id="Used" href="javascript:void(0);" role="tab">Used<span style="margin-left: 4%;"> مستعمل</span></a>
									</li>
									<li class="typestab1 typeautotab1">
										<a class="nav-link link-radius1 purpose <?php if($this->input->get('type')=='New' && $this->input->get('type')!='New'){ echo 'active'; } ?>" data-toggle="tab" id="New" href="javascript:void(0);" role="tab">New<span style="margin-left: 4%;">جديد</span></a>
									</li>
								</ul>
										
		<?php 
							/**
							 *	Sidebard Category Listings
							 */
							$cat = Core::getHelper('db')
										->get('tbl_auto_category')
										->where('parent_id', 0)
										->get();
								$cats = $cat->result();
							$this->load->view('blocks/sidebar/categorylistauto', ['cats' => $cats]); 
						?>
                        
								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>


							</div>


<?php $this->load->view('blocks/autofilter.php');?>

			<div id="content" class="site-content autocontent" tabindex="-1">
    			
				<div class="container">

					<!--<nav class="woocommerce-breadcrumb" --><!--<a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets--><!--</nav>-->

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
								<h1 class="page-title" style="font-size: 30px;">Auto<span class="homeright">مركبات</span></h1>
								<p class="woocommerce-result-count"></p>
							</header>

							<div class="shop-control-bar pcrealcntrl">
								<ul class="shop-view-switcher nav nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
									<li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
									<li class="nav-item"><a class="nav-link " data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
								</ul>
							   <ul class="shop-view-switcher nav nav-tabs tabtypes" role="tablist">
									   <li class="typestab" ><a class="nav-link link-radius1 purpose <?php if($this->input->get('type')=='Used' || $this->input->get('type')==''){ echo 'active'; } ?>" data-toggle="tab" id="Used" href="javascript:void(0);" role="tab">Used<span style="margin-left: 7%;">مستعمل</span></a>  </li>
									   <li class="typestab1"><a class="nav-link link-radius1 purpose <?php if($this->input->get('type')=='New' && $this->input->get('type')!='New'){ echo 'active'; } ?>" data-toggle="tab" id="New" href="javascript:void(0);" role="tab">New<span style="margin-left: 7%;">جديد</span></a> </li>
										</ul>
								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>

							</div>
							
								
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane " id="grid" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results">
											<!-- silence is golden -->
										</div>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane active" id="list-view" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results-list">
											<!-- silence is golden -->
										</div>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane" id="list-view-small" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results-listsmall">
											<!-- silence is golden -->
										</div>
									</ul>
								</div>
							</div>

							<!-- pagination -->
							<?php $this->load->view('blocks/body/pagination'); ?>

						</main>
						 <?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
					</div><!-- #primary -->

					<div id="sidebar" class="sidebar" role="complementary">
						<aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
							<?php 
								/**
								 *	Sidebar Category Listings
								 */
								$cat = Core::getHelper('db')
										->get('tbl_auto_category')
										->where('parent_id', 0)
										->get();
								$cats = $cat->result();
								$this->load->view('blocks/sidebar/categorylist', ['cats' => $cats]); 
							?>
						</aside>
                        <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
						    <ul class="product-categories category-single icontabl">
						        <table class="tableside" style="text-align:start">
						            <th colspan="3" style="text-align: center;">Icons</th>
						            <tbody>
						                <tr>
                                        <td>year</td>
						                    <td><i class="fas fa-calendar" aria-hidden="true" style="font-size: 20px;" alt="bedroom">  </i></td>
						                    <td style="text-align: end;">سنة</td>
						                </tr>
						                <tr>
                                        <td>Kilometer</td>
						                    <td><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 20px;" alt="bathroom"></i></td>
						                    <td style="text-align: end;">كيلومتر</td>
						                </tr>
						                <tr>
                                        <td>color</td>
						                    <td><i class="fas fa-palette" aria-hidden="true" style="font-size: 20px;"></i></td>
						                    <td style="text-align: end;">لون</td>
						                </tr>
						               
                                        
						            </tbody>
						        </table>
                               </ul>
                               </aside>
						<aside class="widget widget_text mobsidewidget">
							<div class="textwidget">
								<a href="http://yalafun.com/FunTv/"><img src="assets/front_end/images/bannerad2.jpg" alt="Banner" class="bannerfull"></a>
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

				<div class="footer-newsletter1">
					<div class="container">
						<div class="row">
							
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
<script type="text/javascript">
function clearAutoSearch() {
	$('#auto_property_type').val("");
	$('#auto_brand').val("");
	$('#auto_model').val("");
	$('#auto_year').val("");
	$('#auto_max_price').val("");
	$('#auto_min_price').val("");
	$('#auto_location').val("");
	$('#auto_keyword').val("");
}
function getAutoParams( mode = 'search' ) {
	param = { 
			'searchauto': mode, 
			'purpose'	: $('#auto_purpose').val(),
			'category'	: $('#auto_property_type').val(),
			'brand'		: $('#auto_brand').val(),
			'model'		: $('#auto_model').val(),
			'maxYear'	: $('#auto_maxyear').val(),
			'minYear'	: $('#auto_minyear').val(),
			'maxPrice'	: $('#auto_max_price').val(),
			'minPrice'	: $('#auto_min_price').val(),
			'location'	: $('#auto_location').val(),
			'keyword'	: $('#auto_keyword').val()
		};
	return param;
}
// display how many results
function resCounter() {
	$.getJSON( apiUrl + parse(getAutoParams('rescount')), function( data ) {
		if( data == false ){
			$("button#btnSearchAuto").text('Find (0)');
		}else{
			$("button#btnSearchAuto").text('Find (' + data + ')');
		}
	});
}
// default category and purpose
var category = 1;
var subcategory = 0;
var purpose = 'Used';

$( document ).ready(function() {

	param = { 
		'auto'		: 'getListings', 
		'purpose'	: purpose, 
		'category'	: category, 
		'subcategory':subcategory 
	};

	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeAutoListings(data);
		makePagination(data, "makeAutoListings");
	});


	// load the listing based on the category id
	$(document).on('click','.category',function(e){
		category = this.id;
		param = { 
			'auto'		: 'getListings', 
			'purpose'	: purpose, 
			'category'	: category, 
			'subcategory':subcategory 
		};
		var id = $(this).attr('id');
		listingsuri = parse(param);
		$.getJSON( apiUrl + parse(param), function( data ) {
			makeAutoListings(data);
			makePagination(data, "makeAutoListings");
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
			'auto'		: 'getListings', 
			'purpose'	: purpose, 
			'category'	: category, 
			'subcategory':subcategory 
		};
		listingsuri = parse(param);
		$.getJSON( apiUrl + parse(param), function( data ) {
			makeAutoListings(data);
			makePagination(data, "makeAutoListings");
		});
	});

	// load the listing based on the category id and purpose
	$(document).on('click', 'button#btnSearchAuto', function(e){
		listingsuri = parse(getAutoParams());
		$.getJSON( apiUrl + parse(getAutoParams()), function( data ) {
			makeAutoListings(data);
			makePagination(data, "makeAutoListings");
		});
	});



$( "#auto_purpose, #auto_property_type, #auto_brand, #auto_property_type, #auto_model, #auto_maxyear, #auto_minyear" ).change(function() {
	resCounter();
});

$( "#auto_minyear" ).change(function(e) {
	var mxyr = $('#auto_maxyear');
	var mnyr = $('#auto_minyear');
	if( mxyr.val() == "" ) {
		return false;
	}
	if( mnyr.val() > mxyr.val() ) {
		alertError('Invalid selection.');
		mnyr.val("");
		return false;
	}
});

$( "#auto_maxyear" ).change(function(e) {
	var mxyr = $('#auto_maxyear');
	var mnyr = $('#auto_minyear');
	if( mnyr.val() == "" ) {
		return false;
	}
	if( mxyr.val() < mnyr.val() ) {
		alertError('Invalid selection.');
		mxyr.val("");
		return false;
	}
});

$( "#auto_property_type" ).change(function() {
	params = {
		'autoGetBrands':true,
		'catId':$( "#auto_property_type" ).val()
	};
	$.getJSON( apiUrl + parse(params), function( data ) {
		$("#auto_brand").empty();
		$("#auto_brand").append('<option value="">Select Brand</option>');
		$.each(data, function( field, rs ) {
			$("#auto_brand").append('<option value="'+rs.id+'">'+ rs.subcategory +'</option>');
		});
	});
});

$( "#auto_brand" ).change(function() {
	params = {
		'autoGetModels':true,
		'catId':$( "#auto_brand" ).val()
	};
	$.getJSON( apiUrl + parse(params), function( data ) {
		$("#auto_model").empty();
		$("#auto_model").append('<option value="">Select Model</option>');
		$.each(data, function( field, rs ) {
			$("#auto_model").append('<option value="'+rs.id+'">'+ rs.subcategory +'</option>');
		});
	});
});

$('#auto_max_price, #auto_min_price, #auto_location, #auto_keyword').bind('input', function(){
  resCounter();
});

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