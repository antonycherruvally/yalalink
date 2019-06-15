<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$searchestate = $this->session->userdata('searchestate');
$country_code = $this->session->userdata('country_code');
$currency = $this->session->userdata('currency');?>
<?php $this->load->view('blocks/body/scrolltop'); ?>

<header class="page-header mobirealhed" style="display:none">
								<h1 class="page-title" style="font-size: 20px;    padding-left: 12%;">Classifieds<span><img src="assets/front_end/images/cat/CLASSIFIEDS.png" width="60px" height="60px" style="margin-top: -36px;margin-left: 34%;"></span><span class="homeright" style="margin-top: -40px;margin-left: 102px;font-size: 22px;margin-right: 16%;"> الإعلانات المبوبة   </span></h1>
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
										<a class="nav-link link-radius1 purpose <?php if($this->input->get('type')=='Used' || $this->input->get('type')==''){ echo 'active'; } ?>" data-toggle="tab" id="Used" href="javascript:void(0);" role="tab">Used<span style="margin-left: 4%;">مستعمل</span></a>
									</li>
									<li class="typestab1 typeautotab1">
										<a class="nav-link link-radius1 purpose <?php if($this->input->get('type')=='New' && $this->input->get('type')!='New'){ echo 'active'; } ?>" data-toggle="tab" id="New" href="javascript:void(0);" role="tab">New<span style="margin-left: 4%;">جديد</span></a>
									</li>
								</ul>
										
		<?php 
							/*$class = Core::getHelper('db')
								->get('tbl_classifieds_category')
								->where('parent_id', 0)
								->order_by('id', 'DESC')
								->limit(5)
								->get();
							$data = $class->result();*/
							$data[] = Core::makeClass(["id" => 0, "category" => "All","ar_category" => "الجميع"]);
							$data[] = Core::makeClass(["id" => 1, "category" => "Bags & Wallets","ar_category" => "شنط و محافظ"]);
							$data[] = Core::makeClass(["id" => 4, "category" => "Beauty","ar_category" => "جمال"]);
							$data[] = Core::makeClass(["id" => 13, "category" => "Furniture","ar_category" => "مفروشات"]);
							$data[] = Core::makeClass(["id" => 18, "category" => "Home Decor","ar_category" => "ديكور منزلي"]);
							$data[] = Core::makeClass(["id" => 20, "category" => "Personal care","ar_category" => "العناية الشخصية"]);
							$data[] = Core::makeClass(["id" => 316, "category" => "Clothing","ar_category" => "ملابس"]);
							$data[] = Core::makeClass(["id" => 318, "category" => "Footwear","ar_category" => "أحذية"]);
 							$this->load->view('blocks/sidebar/categorylistalassi', ['cats' => $data]); 
						?>
                        
								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>


							</div>


<?php $this->load->view('blocks/classifilter.php');?>
            
			<div id="content" class="site-content autocontent" tabindex="-1">
  <!--<ul class="social_icons socialmobicon" id="fixed-social">
        <li><a href="http://facebook.com/yallalink" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:white;"></i> </a></li>
    <li><a href="http://twitter.com/yalalink" target="_blank"  data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:white;"></i> </a></li>
    <li><a href="http://instagram.com/yallalink" target="_blank"  data-placement="bottom" title="Instagram" data-original-title="Instagram"><i class="fab fa-instagram" aria-hidden="true" style="color:white;"></i> </a></li>
    <li><a href="https://www.youtube.com/channel/UCUMQgk6eeTzQFtptXd81kDA" target="_blank"  data-placement="bottom" title="Youtube" data-original-title="Youtube"><i class="fab fa-youtube-square" aria-hidden="true" style="color:white;"></i> </a></li>
  </ul>-->
				<div class="container">

					<!--<nav class="woocommerce-breadcrumb" >--><!--<a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets--><!--</nav>-->

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
								<h1 class="page-title" style="font-size: 30px;">Classifieds<span class="homeright"> الإعلانات المبوبة   </span></h1>
								<p class="woocommerce-result-count"></p>
							</header>

							<div class="shop-control-bar pcrealcntrl">
								<ul class="shop-view-switcher nav nav-tabs" role="tablist">
									
								 
									<li class="nav-item"><a class="nav-link active " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
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
							/*$class = Core::getHelper('db')
								->get('tbl_classifieds_category')
								->where('parent_id', 0)
								->order_by('id', 'DESC')
								->limit(5)
								->get();
							$data = $class->result();*/
						/*	$data[] = Core::makeClass(["id" => 0, "category" => "All","ar_category" => "الجميع"]);
							$data[] = Core::makeClass(["id" => 1, "category" => "Bags & Wallets","ar_category" => "شنط و محافظ"]);
							$data[] = Core::makeClass(["id" => 4, "category" => "Beauty","ar_category" => "جمال"]);
							$data[] = Core::makeClass(["id" => 13, "category" => "Furniture","ar_category" => "مفروشات"]);
							$data[] = Core::makeClass(["id" => 18, "category" => "Home Decor","ar_category" => "ديكور منزلي"]);
							$data[] = Core::makeClass(["id" => 20, "category" => "Personal care","ar_category" => "الصحة و العناية الشخصية"]);
							$data[] = Core::makeClass(["id" => 316, "category" => "Clothing","ar_category" => "ملابس"]);
							$data[] = Core::makeClass(["id" => 318, "category" => "Footwear","ar_category" => "أحذية"]);*/
 							$this->load->view('blocks/sidebar/categorylist', ['cats' => $data]); 
						?>

						<aside class="widget widget_text">
							<div class="textwidget">
								<a href="http://loozaa.com/"><img src="assets/front_end/images/bannerad1.jpg" alt="Banner" class="bannerfull"></a>
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
var category = 0;
var purpose = 'Used';
function clsClearFilter() {
	$('#cls_purpose').val("");
	$('#cls_category').val("");
	$('#cls_sub_category').val("");
	$('#maxPrice').val("");
	$('#minPrice').val("");
	$('#location').val("");
	$('#cls_keyword').val("");
}
function getClassifiedsParams( mode = 'search' ) {
	param = { 
			'searchclassifieds': mode, 
			'purpose'	: $('#cls_purpose').val(),
			'category'	: $('#cls_category').val(),
			'subcategory': $('#cls_sub_category').val(),
			'maxPrice'	: $('#maxPrice').val(),
			'minPrice'	: $('#minPrice').val(),
			'area'		: $('#cls_area').val(),
			'location'	: $('#location').val(),
			'keyword'	: $('#cls_keyword').val()
		};
	return param;
}
// display how many results
function resCounter() {
	$.getJSON( apiUrl + parse(getClassifiedsParams('rescount')), function( data ) {
		if( data == false ){
			$("button#searchClassifieds").text('Find (0)');
		}else{
			$("button#searchClassifieds").text('Find (' + data + ')');
		}
	});
}
$(document).ready(function(e) {
	param = { 
		'classifieds': 'getListings', 
		'purpose'   : purpose, 
		'category'  : category
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeClassifiedListings(data);
		makePagination(data, "makeClassifiedListings");
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
		'classifieds': 'getListings', 
		'purpose'	: purpose, 
		'category'	: category,
	};
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeClassifiedListings(data);
		makePagination(data, "makeClassifiedListings");
	});
});

// load the listing based on the category id
$(document).on('click','.category',function(e){
	category = this.id;
	param = { 
		'classifieds': 'getListings', 
		'purpose'	: purpose, 
		'category'	: category,
	};
	var id = $(this).attr('id');
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		makeClassifiedListings(data);
		makePagination(data, "makeClassifiedListings");
	});
});

// load the listing based on the category id and purpose
$(document).on('click', 'button#searchClassifieds', function(e){
	listingsuri = parse(getClassifiedsParams());
	$.getJSON( apiUrl + parse(getClassifiedsParams()), function( data ) {
		makeClassifiedListings(data);
		makePagination(data, "makeClassifiedListings");
	});
});

$('#maxPrice, #minPrice, #cls_keyword').bind('input', function(){
	resCounter();
});
$( "#cls_category, #cls_sub_category, #cls_purpose, #cls_location	" ).change(function() {
	resCounter();
});

$( "#cls_category" ).change(function() {
	var id = $("#cls_category").val();
	params = {
		'clsGetSubCat':true,
		'catId':$( "#cls_category" ).val()
	};
	$.getJSON( apiUrl + parse(params), function( data ) {
		$("#cls_sub_category").empty();
		$("#cls_sub_category").append('<option value="">Select Sub Category</option>');
		$.each(data, function( field, rs ) {
			$("#cls_sub_category").append('<option value="'+rs.id+'">'+ rs.subcategory +'</option>');
		});
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