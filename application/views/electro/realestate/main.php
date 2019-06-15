 <?php 
	$this->load->view('blocks/header');
	$userdata 		= $this->session->userdata('logged_yalalink_userdata'); 
	$searchestate 	= $this->session->userdata('searchestate');
	$country_code 	= $this->session->userdata('country_code');
	$currency 		= $this->session->userdata('currency');
?>
<!--this mobile view header --->
<style type="text/css">
/*IPHONE XS MAX*/
@media only screen and (max-width: 414px) {
	.ico-realestate {
		margin-left: 128px;
	}
}

</style>
<?php $this->load->view('blocks/body/scrolltop'); ?>
<header class="page-header mobirealhed" style="display:none">
								<h1 class="page-title" style="font-size: 20px;padding-left: 14%;">Real Estate<span><img src="assets/front_end/images/cat/villas.png" width="60px" height="60px" class="ico-realestate" style="margin-top: -36px;"></span><span class="homeright" style="margin-top: -40px;margin-right: 20%;font-size: 22px;">عقـــــارات</span></h1>
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
								<ul class="shop-view-switcher nav nav-tabs tabtypes tabrealfull" role="tablist">
									<li class="typestab" >
										<a class="nav-link link-radius1 btnRent active" data-toggle="tab" id="2" href="#rent" role="tab">Rent<span style="margin-left: 3%;">إيجار</span></a>
									</li>
									<li class="typestab1 tabrealar">
										<a class="nav-link link-radius1 btnBuy  show" data-toggle="tab" id="1" href="#buy" role="tab">Buy<span style="margin-left: 7%;">شراء</span></a>
									</li>
								</ul>
								

										
		<?php 
							/**
							 *	Sidebard Category Listings
							 */
							$cat = Core::getHelper('db')
									->get('tbl_realestate_category')
									->where('parent_id', 1)
									->where('subcategory !=', 'Construction')
									->order_by('id', 'DESC')
									->get();
							$cats = $cat->result();
							$this->load->view('blocks/sidebar/categorylistmob', ['cats' => $cats]); 
						?>
                        
								<form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>


							</div>


 
<?php
	/**
	 *	Advance Search Block
	 */
	$this->load->view('blocks/filter.php');
?>

			<div id="content" class="site-content site-real" tabindex="-1">
				<div class="container">
                
					<nav class="woocommerce-breadcrumb" ><!--<a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets--></nav>
					<nav class="woocommerce-breadcrumb" ><!--<a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets--></nav>
					<div id="primary" class="content-area">
						<main id="main" class="site-main zoomcont">
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
								<h1 class="page-title" style="font-size: 30px;">Real Estate<span class="homeright">عقارات</span></h1>
								<p class="woocommerce-result-count"></p>
							</header>
                          

							<div class="shop-control-bar pcrealcntrl">
								<ul class="shop-view-switcher nav nav-tabs types navview" role="tablist">
									<li class="nav-item insidelist"><a class="nav-link switcher active" id="switcher-listview" data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                                    <li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
									<li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									
								</ul>
                                <ul class="shop-view-switcher nav nav-tabs types mobinav" role="tablist" style="display:none;">
									<li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									
								</ul>
								<ul class="shop-view-switcher nav nav-tabs tabtypes" role="tablist">
									<li class="typestab" >
										<a class="nav-link link-radius1 btnRent active" data-toggle="tab" id="2" href="#rent" role="tab">Rent<span style="margin-left: 3%;">إيجار</span></a>
									</li>
									<li class="typestab1">
										<a class="nav-link link-radius1 btnBuy  show" data-toggle="tab" id="1" href="#buy" role="tab">Buy<span style="margin-left: 7%;">شراء</span></a>
									</li>
								</ul>
								<form class="form-electro-wc-ppp" style="display:none;"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>
							</div>
							<div class="tab-content pctabview">
								<div role="tabpanel mobigrid" class="tab-pane" id="grid" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results">
											<!-- Silence is golden -->
										</div>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane active" id="list-view" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results-list">
											<!-- Silence is golden -->
										</div>
									</ul>
								</div>
								<div role="tabpanel" class="tab-pane" id="list-view-small" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results-listsmall">
											<!-- Silence is golden -->
										</div>
									</ul>
								</div>
							</div>
                           

							<!-- pagination -->
							
						</main><!-- #main -->
                        <div class="col-md-12" style="z-index: 1;">
								<nav class="woocommerce-pagination mobipagination">
									<!-- <ul class="page-numbers">
										<li>
											<ul class="pagination">
												silence is golden
											</ul>
										</li>
									</ul> -->

									<ul id="pagination-demo" class="pagination-sm">
										<!-- new pagination -->
									</ul>
								</nav>
							</div>
						 <?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
					</div><!-- #primary -->

					<div id="sidebar" class="sidebar categories" role="complementary">

						<?php 
							/**
							 *	Sidebard Category Listings
							 */
							$cat = Core::getHelper('db')
									->get('tbl_realestate_category')
									->where('parent_id', 1)
									->where('subcategory !=', 'Construction')
									->order_by('id', 'DESC')
									->get();
							$cats = $cat->result();
							$this->load->view('blocks/sidebar/categorylistrealdesk', ['cats' => $cats]); 
						?>

                         <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
						    <ul class="product-categories category-single icontabl">
						        <table class="tableside" style="text-align: start;">
						            <th colspan="3" style="text-align:center">Icons</th>
						            <tbody>
						                <tr>
                                        <td>Bedrooms</td>
						                    <td><i class="fa fa-bed" aria-hidden="true" style="font-size: 20px;" alt="bedroom">  </i></td>
						                    <td style="text-align: end;">غرف نوم </td>
						                </tr>
						                <tr>
                                        <td>Bathrooms</td>
						                    <td><i class="fa fa-bath" aria-hidden="true" style="font-size: 20px;" alt="bathroom"></i></td>
						                    <td style="text-align: end;">حمامات</td>
						                </tr>
						                <tr>
                                        <td>Swimming Pool</td>
						                    <td><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 20px;"></i></td>
						                    <td style="text-align: end;">مسبح</td>
						                </tr>
						                <tr>
                                        <td>Balcony</td>
						                    <td><i class="fas fa-hotel" aria-hidden="true" style="font-size: 18px;" alt="bathroom"></i></td>
						                    <td style="text-align: end;">بلكونة</td>
						                </tr>
						                <tr>
                                         <td>Parking</td>
						                    <td><i class="fas fa-car" aria-hidden="true" style="font-size: 20px;" alt="bathroom"></i></td>
						                    <td style="text-align: end;">موقف</td>
						                </tr>
						            </tbody>
						        </table>
						    </ul>
						</aside>
						<aside class="widget widget_text mobsidewidgetreal">
							<div class="textwidget">
								<a href="http://yalafun.com/"><img src="assets/front_end/images/bannerad3.jpg" alt="Banner" class="bannerfull"></a>
							</div>
						</aside>
						
					<!-- 	<h4 style="text-align: center;color: orange;">نظرة على الأسواق الأخرى  </h4>
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
							<!--<div class="col-lg-4 col-md-4 col-xs-12">
								<aside class="widget clearfix">
									<div class="body">
										<h4 class="widget-title">Top Rated Products</h4>
										
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
<!--mobile email popup------>
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
  <!-----end------->

<?php $this->load->view('front_end/include/footer'); ?>
<script type="application/javascript">
function getListings( data, limit = 20 ) {
	var featHtml ='<img class="img_featured" src="uploads/view/featured.png" alt="" width="50px">';
	var featHtmlgrid ='<img class="img_featured_grid" src="uploads/view/featured.png" alt="" width="50px">';
	var featHtmllistsmall = '<img class="img_featured_listsmall" src="uploads/view/featured.png" alt="" width="50px">';
	var img_verify_grid = '<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">';
	var img_verify = '<img class="img_verify" src="uploads/view/verified1.png" alt="" width="50px">';
	var img_verify_listsmall = '<img class="img_verify_listsmall" src="uploads/view/verified1.png" alt="" width="50px">';
	var img_tic = '1';
	var img_tic1 = '1';
	var img_tic2 = '1';
	var background = "#ffa50026";
	var email;
	
	var c = 0;
			$('#post-results').empty();
			$('#post-results-list').empty();
			$('#post-results-listsmall').empty();
			$('#post-results').append("<row>");
			$('#post-results-list').append("<row>");
			$('#post-results-listsmall').append("<row>");
			$.each( data, function( key, res ) {
				// if( res.virefied ) {
					//console.log(res.pool);
					img_verify_grid = '';
					img_verify = '';
					img_verify_listsmall = '';
				// }
				if( res.featured  < 1 ) {
					featHtml = "";
					featHtmlgrid = "";
					featHtmllistsmall = "";
					background = "#dadad261" ;
				}
				if( res.balcony < 1) {
					img_tic = '0';
				}
				if(res.pool < 1){
					img_tic1 = '0';
				}
				if(res.garage < 1){
					img_tic2 = '0';
				}
				
				
				
				if(res.email == "")
				{
					target = " ";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
					
				}else{
					target = "#sendMail";
					email = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
				}
					
				c++;
				var post_results = `
				<div class="col col-sm-12 col-md-4 col-xs-12">
					<div class="card mobcardview" style="border: 1px solid #2d2e2e47;background:`+background+`!important;">
						<div class="card-body">
							<p class="card-text small">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						</div>
					
						<img class="card-img-top gridmobviewimg instarun" id="`+ res.id +`" data-groups="post-results" src="`+ res.img +`" alt="">
						<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
						<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						`+ img_verify_grid +`
						` + featHtmlgrid + `
					
					<div>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
							<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a>
							<span class="count-like-`+ res.id +`">`+ res.likes +`</span>
							<span style="margin-left: 34px;"><a href="whatsapp://send?text=`+ res.url +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
        					<span style="margin-left:14px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
   							<span style="margin-left:14px;"><a href="twitter://post?message=`+ res.url +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('`+ res.url +`')" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
    						<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800">`+ email +` </a></span>
    						<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call <i class="fa fa-phone" style="font-size:12px;" aria-hidden="true"></i></a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;">`+ res.mobdateAdded +`</span>
							</div>
						<p class="card-text small titmobview" style="display:none;">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
						<h5 class="card-title2"><a href="`+ res.url +`" style="color:red">`+ currency +` `+ res.price +`</a></h5>
						<p class="card-text"><a href="`+ res.url +`">`+ utf8Decode(res.description.substring(0, 100)) +` ...</a><br></p><span class="rd_more"><a href="`+ res.url +`">details التفاصيل</a></span>
					</div>
					</div>
						<div class="bottom">
							<div class="rating gridfav"> 
								<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
							</div>
							<span class="count-like-`+ res.id +` gridcnt">`+ res.likes +`</span><span class="added-date griddt">`+ res.dateAdded +`</span>
							<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;`+ res.bedroom +`</span>
							<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;`+ res.bathroom +`</span>
                            <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;`+ img_tic2 +`</span>
						    <span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;`+ res.pool +`</span>
							<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;`+ img_tic +`</span>
							<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;`+ res.imgCount +`</span>
						</div>
					</div>
					
				</div>
			`;

			var post_results_list = `
				<div class="col col-sm-12 col-md-12 col-xs-12"><div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
						<div class="col-md-6">
								<img class="card-img-top-grid instarun" data-groups="post-results-list" id="`+ res.id +`" src="`+ res.img +`" alt="">
								<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> `+ res.imgCount +` </span>
								<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
								`+ img_verify +`
								` + featHtml + `
						</div>
						<div class="col-md-6">
							<div class="card-body">
							<p class="card-text small-list">
								<a href="`+ res.url +`">`+ res.title_en +`</a>
							</p>
								<h5 class="card-title3">`+ currency +` `+ res.price +`</h5>
								<a href="`+ res.url +`"><p class="card-text-list-main">`+ utf8Decode(res.description.substring(0, 700)) +`...</p></a>
							</div>
							<div class="bottom-list" style="margin-left: 0px !important;">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="login" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 
								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ res.dateAdded +`</span></td>
							</tr>
							<tr style="text-align:center">
								<td><span class ="poollist1" style="color: #000000b0;font-size:17px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 15px;" alt="bedroom">  </i></a> &nbsp;`+ res.bedroom +`</span></td>
								<td ><span class ="poollist1" style="color: #000000b0;font-size:17px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 15px;" alt="bathroom"></i></a>&nbsp;&nbsp;` + res.bathroom +`</span></td>
								<td><span class ="poollist1" style="color: #000000b0;font-size:17px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="Swimming pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;&nbsp;<span style="display: block;margin-top:7px">` + res.pool +`</span></span></span></td>
                                <td><span class ="poollist1" style="color: #000000b0;font-size:17px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="Balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 12px;" alt="bathroom"></i></a>&nbsp;&nbsp;<span style="display: block;margin-top:7px">` + img_tic+`</span></span></td>
                                <td><span class ="poollist1" style="color: #000000b0;font-size:17px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;&nbsp;<span style="display: block;margin-top:7px">` + img_tic2 +`</span></span></td>
								

							</tr>
							</tbody>
							<table>							
							</div>
						</div>
					</div>
				</div>
			`;
			var post_results_listsmall = `
				<div class="col col-sm-6 col-md-12 col-xs-12"><div class="card" style="border: 1px solid #2d2e2e47 !important;">
					<div class="row">
					<div class="col-md-4"> 
							<img class="card-img-top-list instarun" id="`+ res.id +`" data-groups="post-results-listsmall" src="`+ res.img +`" alt="">
							<span class="countimg_listsmall"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>
							<span class="instaheart" id="insta-`+ res.id +`"><i class="fa fa-heart" aria-hidden="true"></i></span>
						`+ img_verify_listsmall +`
						` + featHtmllistsmall + `
					</div>
					<div class="col-md-3">
						<p class="card-text small-list">
							<a href="`+ res.url +`">`+ res.title_en +`</a></p>
							<p class="card-text small-list" style="color:red">`+ currency +` `+ res.price +`
						</p>
					</div>
					<div class="col-md-5">
						<div class="card-body">
							
							<a href="`+ res.url +`"><p class="card-text">`+ utf8Decode(res.description) +`</p></a>
						</div>
						<div class="bottom-list-small">
							<table class="table12">
							<tbody>
							<tr><td style="text-align: left;"><div class="rating" style="display: -webkit-inline-box;font-size: 16px;"> 
									<a class="favorites favorites_`+ res.id +`" href="#" id="`+ res.id +`"><i class="far fa-heart" aria-hidden="true"></i></a> 								</div>
								<span class="count-like-`+ res.id +`" style="font-size: 15px;color: #000000b5;">`+ res.likes +`</span>
								</td>
								<td colspan="5"><span class="added-date">`+ res.dateAdded +`</span></td>
							</tr>
							<tr style="text-align:center">
							<td>
							<span class ="poollist1" style="color: #000000b0;font-size:14px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 15px;" alt="bedroom">  </i></a>&nbsp; `+ res.bedroom +`</td>
								<td ><span class ="poollist1" style="color: #000000b0;font-size:14px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 17px;" alt="bathroom"></i></a>&nbsp;`+ res.bathroom +`</td>
								<td><span class ="poollist1" style="color: #000000b0;font-size:14px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="Swimming pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 17px;" alt="bathroom"></i></a>&nbsp;<span style="display: block;margin-top:7px">`+ res.pool +`</span></span></td>
                                <td><span class ="poollist1" style="color: #000000b0;font-size:14px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="Balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<span style="display: block;margin-top:7px">`+ img_tic +`</span></span></td>
                                <td><span class ="poollist1" style="color: #000000b0;font-size:14px;display: -webkit-inline-box;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 17px;" alt="bathroom"></i></a>&nbsp;<span style="display: block;margin-top:7px">`+ img_tic2 +`</span></span></td>
							</tr>
							</tbody>
							<table>
						</div>
					</div>
					</div>
				</div>
			`;
				if( c > 9  && c < 11) {
					$('#post-results-list').append(`
						<div class="col col-sm-12 col-md-12 col-xs-12">
							<div class="card1 listcard1">
								<div class="row1">
									<ins class="adsbygoogle"
									style="display:inline-block;width:728px;height:90px"
									data-ad-client="ca-pub-8267866280490368"
									data-ad-slot="4614962273"></ins>
								</div>
							</div>
						</div>
					`);

					$('#post-results').append(`
						<div class="col col-sm-6 col-md-4 col-xs-12">
								<ins class="adsbygoogle"
								style="display:inline-block;width:375px;height:280px"
								data-ad-client="ca-pub-8267866280490368"
								data-ad-slot="4614962273"></ins>
						</div>
					`);
					(adsbygoogle = window.adsbygoogle || []).push({})
				}
				$('#post-results-list').append(post_results_list);
				$('#post-results').append(post_results);
				$('#post-results-listsmall').append(post_results_listsmall);
				if( c >= limit ) {
					return false;
				}
			});
			$('#post-results').append("</row>");
			$('#post-results-list').append("</row>");
			$('#post-results-listsmall').append("</row>");
			$('#switcher-listview').trigger('click');
}

$( document ).ready(function() {
	$( document ).on( 'dblclick', '.card-body', function( event ) {
		console.log( 'double click!' + this.id );
		var elemId = 'insta-' + this.id;
		$(elemId).fadeIn();
		setTimeout(function(){ $(elemId).fadeOut(); }, 2000);
	});
});


// default category and purpose
var category = 4;
var purpose = 2;
var numResult = 0;
$(document).ready(function(e) {

	param = { 'realestate':'getListings', 'type':purpose, 'category':category };
	var id = $(this).attr('id');
	listingsuri = parse(param);
	$.getJSON( apiUrl + parse(param), function( data ) {
		getListings(data, 20);
		makePagination(data);
	});

$( "#city" ).change(function() {
	param = { 
		'getareas': 'getListings', 
		'id'   : $('#city').val()
	};
	$('#area').empty();
	$('#area').append('<option value="">Area</option>');
	$.getJSON( apiUrl + parse(param), function( data ) {
		$.each(data, function( index, field ) {
			$('#area').append('<option value="'+ field.id +'">'+ field.location +'</option>');
		});
		
	});
});



	// load the listing based on the category id
	$(document).on('click','.category',function(e){
		category = this.id;
		param = { 'realestate':'getListings', 'type':purpose, 'category': category };
		var id = $(this).attr('id');
		listingsuri = parse(param);
		$.getJSON( apiUrl + parse(param), function( data ) {
			getListings(data);
			makePagination(data);
		});
	});

	// load the listing based on the category id and purpose
	$(document).on('click', '.btnRent', function(e){
		purpose = this.id;
		$(".btnBuy").removeClass('active');
		var param = {"realestate":"getListings", "type": purpose, "category":category};
		listingsuri = parse(param);
		$.getJSON( apiUrl + parse(param), function( data ) {
			getListings(data);
			makePagination(data, apiUrl + parse(param));
		});
	});



	$(document).on('click', '.btnBuy', function(e){
		purpose = this.id;
		$(".btnRent").removeClass('active');
		var param = {"realestate":"getListings", "type": this.id, "category":category};
		listingsuri = parse(param);
		$.getJSON( apiUrl + parse(param), function( data ) {
			getListings(data);
			makePagination(data, apiUrl + parse(param));
		});
	});


});
</script>
<!-- 
	/**
	 *	Advansearch JS
	 */
 -->
<script type="text/javascript" src="assets/js/electro/realestate/advancesearch.js"></script>