<?php $this->load->view('blocks/header'); 
$currency = $this->session->userdata('currency');?>
<style type="text/css">
.store-sec-detail-img{
	/*object-fit:cover !important;*/
	height:400px;
}
</style>
<div class="container">
<?php if($this->session->flashdata('message')){ ?>
<?php echo $this->session->flashdata('message'); ?>
<?php } ?>
 <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    <nav class="woocommerce-breadcrumb">
                        <a href="index">Home</a>
                        <span class="delimiter"><i class="fa fa-angle-right"></i></span>
                        <a href="woman-beauty">Woman & Beauty</a>
                        <span class="delimiter"><i class="fa fa-angle-right"></i></span>
                       <a href="woman-beauty?type=<?php echo $view->type; ?>"><?php echo $view->type; ?></a>
                       
                    </nav><!-- /.woocommerce-breadcrumb -->

                    <div id="primary" class="content-area leftpadding">
                        <main id="main" class="site-main">

                            <div class="product">

                                <div class="single-product-wrapper">
                                    <div class="product-images-wrapper">
                                       
                                        <div class="images electro-gallery">
                                        
                                        <div class="col-md-8 col-sm-12">
  <div class="carousel slide" id="cat-slider" data-ride="carousel"> 
    <!-- Carousel items -->
    <div class="carousel-inner hero-radius">
      <?php  if($images){ $i = 0;
	 
	 
	   foreach($images as $val){
		  
		   if($val->image){
			 $img ='uploads/images/'.$val->image;
			 $timg ='uploads/images/thumbnail/'.$val->image;
		   }else{
			 $img = 'assets/img/no_image_available.jpg';
			 $timg = 'assets/img/no_image_available.jpg';
			} ?>
      <div class="<?php if($i==0) echo 'active';  ?> item carousel-item" data-slide-number="<?php echo $i; ?>"> <a href="<?php echo $img; ?>" data-fancybox="gallery"  data-caption="<?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$view->title_en)))); if($view->title_ar!=''){ echo '  ( '.@$view->title_ar.' )'; }?>"><img src="<?php if(file_exists(@$timg)) echo $timg; else echo $img; ?>" alt="<?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$view->title_en)))); if($view->title_ar!=''){ echo '  ( '.@$view->title_ar.' )'; }?>" class="store-sec-detail-img"></a></div>
      <?php $i++;}}else{ ?>
      <div class="active item carousel-item" data-slide-number="0"> <a href="assets/front_end/images/no_image_available.jpg" data-fancybox="gallery"  data-caption=""><img src="assets/front_end/images/no_image_available.jpg" alt="image" class="store-sec-detail-img"></a></div>
                    <?php } ?>
      <span class="heart"><a href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a></span> </div>
    
    <!-- Carousel nav --> 
    <a class="left carousel-control" href="#cat-slider" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#cat-slider" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
  
  <!-- carousel slide -->
  <div class="row" id="slider-thumbs">
    <div class="col-md-12">
      <ul class="hide-bullets store-bullets">
       <?php  if($images){ $i = 0; foreach($images as $val){
		   if($val->image){
			 $img ='uploads/images/thumb/'.$val->image;
		   }else{
			 $img = 'assets/img/no_image_available.jpg';
		   } ?>
        <li> <a class="thumbnail" id="carousel-selector-<?php echo $i; ?>"> <img src="<?php echo $img; ?>" class="store-thumb-img" alt="<?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$view->title_en)))); if($view->title_ar!=''){ echo '  ( '.@$view->title_ar.' )'; }?>"> </a> </li>
        <?php $i++;}} ?>
      </ul>
    </div>
  </div>
                                        
                                        
                                         <!--<div class="thumbnails-single owl-carousel">
                                                <a href="images/single-product/s1-1.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="test/assets/images/single-product/s1-1.jpg" data-echo="test/assets/images/single-product/s1-1.jpg" class="wp-post-image" alt=""></a>

                                                <a href="images/single-product/s1.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s1.jpg" class="wp-post-image" alt=""></a>

                                                <a href="images/single-product/s2.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s2.jpg" class="wp-post-image" alt=""></a>

                                                <a href="images/single-product/s3.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s3.jpg" class="wp-post-image" alt=""></a>

                                                <a href="images/single-product/s4.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s4.jpg" class="wp-post-image" alt=""></a>

                                                <a href="images/single-product/s5.jpg" class="zoom" title="" data-rel="prettyPhoto[product-gallery]"><img src="assets/images/blank.gif" data-echo="assets/images/single-product/s5.jpg" class="wp-post-image" alt=""></a>
                                            </div>--><!-- .thumbnails-single -->


                                            
                                        </div><!-- .electro-gallery -->
                                    </div><!-- /.product-images-wrapper -->

                                    <div class="summary entry-summary">

                                        <span class="loop-product-categories">
                                              <a href="auto?category=<?php echo $view->category; ?>&type=<?php echo $view->type; ?>"><?php echo $view->cat; ?></a>
                                        </span><!-- /.loop-product-categories -->

                                        <h1 itemprop="name" class="product_title entry-title mobi_tit_det" style="color: #662d91;"><?php echo @$view->title_en; ?></h1>
                                         <h3 itemprop="name" class="product_title entry-title mobi_tit_entrydet"  style="color: red;"><?php echo @$currency; ?> <?php if($view->offer_price!=0) { echo number_format(@$view->offer_price); }else{ echo number_format(@$view->price); }?> <span><?php if($view->offer_price!=0) { echo number_format(@$view->price); }?></span></h3>

                                        <div class="woocommerce-product-rating">
                                           <!-- <div class="star-rating" title="Rated 4.33 out of 5">-->
                                                <!--<span style="width:86.6%">
                                                    <strong itemprop="ratingValue" class="rating">4.33</strong>
                                                    out of <span itemprop="bestRating">5</span>				based on
                                                    <span itemprop="ratingCount" class="rating">3</span>
                                                    customer ratings
                                                </span>-->
                                            </div>

                                           
                                        </div><!-- .woocommerce-product-rating -->

                                      <!--  <div class="brand">
                                            <a href="file:///F|/yalalink/yalalink/HTML/product-category.html">
                                                <img src="file:///F|/yalalink/yalalink/HTML/assets/images/single-product/brand.png" alt="Gionee" />
                                            </a>
                                        </div>--><!-- .brand -->

                                       <!-- <div class="availability in-stock">Availablity: <span>In stock</span></div>--><!-- .availability -->

                                        <!--<hr class="single-product-title-divider" />-->

                                        <!--<div class="action-buttons">

                                            <a href="#" class="add_to_wishlist" >
                                                Wishlist
                                            </a>


                                            <a href="#" class="add-to-compare-link" data-product_id="2452">Compare</a>
                                        </div>--><!-- .action-buttons -->

                                        <div itemprop="description">
                                           

                                           
                                           
                                        </div><!-- .description -->

                                        <!--<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

                                            <p class="price"><span class="electro-price"><ins><span class="amount">&#36;1,215.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span></p>

                                            <meta itemprop="price" content="1215" />
                                            <meta itemprop="priceCurrency" content="USD" />
                                            <link itemprop="availability" href="http://schema.org/InStock" />

                                        </div>--><!-- /itemprop -->

                                        <!--<form class="variations_form cart" method="post">

                                            <table class="variations">
                                                <tbody>
                                                    <tr>
                                                        <td class="label"><label>Color</label></td>
                                                        <td class="value">
                                                            <select class="" name="attribute_pa_color">
                                                                <option value="">Choose an option</option>
                                                                <option value="black-with-red" >Black with Red</option>
                                                                <option value="white-with-gold"  selected='selected'>White with Gold</option>
                                                            </select>
                                                            <a class="reset_variations" href="#">Clear</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <div class="single_variation_wrap">
                                                <div class="woocommerce-variation single_variation"></div>
                                                <div class="woocommerce-variation-add-to-cart variations_button">
                                                    <div class="quantity">
                                                        <label>Quantity:</label>
                                                        <input type="number" name="quantity" value="1" title="Qty" class="input-text qty text"/>
                                                    </div>
                                                    <button type="submit" class="single_add_to_cart_button button">Add to cart</button>
                                                    <input type="hidden" name="add-to-cart" value="2452" />
                                                    <input type="hidden" name="product_id" value="2452" />
                                                    <input type="hidden" name="variation_id" class="variation_id" value="0" />
                                                </div>
                                            </div>
                                        </form>-->

                                    </div><!-- .summary -->
                                </div><!-- /.single-product-wrapper -->


                                <div class="woocommerce-tabs wc-tabs-wrapper">
                                    <ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">
                                        <li class="nav-item accessories_tab">
                                            <a href="#tab-description" data-toggle="tab">Description</a>
                                        </li>

                                       <li class="nav-item reviews_tab">
                                            <a href="#tab-reviews_tab" data-toggle="tab">Location</a>
                                        </li>

                                        

                                    </ul>

                                    <div class="tab-content">
                                        
                                      <div class="tab-pane active in panel entry-content wc-tab" id="tab-description">
                                            <div class="electro-description">

                                                <h3>Details</h3>
                                                 <?php $description = $this->yalalink_model->makeLinks($view->description); echo @$description; ?>
                                               
                                                
                                            </div><!-- /.electro-description -->

                                           
                                        </div>

                                        <div class="tab-pane active in panel entry-content wc-tab" id="tab-reviews_tab">
                                            <div class="col-sm-12" id="map" style="height:200px;margin-bottom: 26px;"></div>
                                        </div><!-- /.panel -->
                                    </div>

                                </div><!-- /.woocommerce-tabs -->

                              
                           <div class="detail-btn-wrap pos-center" style="margin-top: 33px;"> 
<?php if($view->mobile){ ?>
<a href="javascript:void(0);" class="hero-button btn-shadow icon-btn call-show-nmb detail-btn btn-FF9800 realsub nummobdesk" x="<?php echo @$view->mobile; ?>"><span class="show-number"><i class="fa fa-phone bounce-ani" aria-hidden="true" ></i>Call</span></a> 
<a href="tel:<?php echo @$view->mobile; ?>"><span class="hero-button btn-shadow icon-btn call-show-nmb detail-btn btn-FF9800 realsub nummob" style="display:none;"><i class="fa fa-phone bounce-ani" aria-hidden="true" ></i>Call</span></a> 
<?php } ?>
<?php if($view->email){ ?>
<a href="javascript:void(0);" data-toggle="modal" data-target="#sendMail" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo @$view->email; ?>" class="hero-button btn-shadow icon-btn detail-btn btn-FF9800 submail"> <span><i class="fa fa-paper-plane bounce-ani" aria-hidden="true"></i>E-mail</span></a>
<?php } ?>

</div> 

                        </main><!-- /.site-main -->
                    </div><!-- /.content-area -->
                      <div id="sidebar1" class="sidebar" role="complementary" style="margin-top: 15px;">
                        <aside class="widget widget_text">
                            <div class="textwidget">
                                <a href="#">
                                    <img src="assets/images/banner/YALAFUN1.jpg" alt="Banner">
                                </a>
                            </div>
                        </aside>
                        </div>
                </div><!-- /.container -->
               
            </div><!-- /.site-content -->

           

              <footer id="colophon" class="site-footer">
            	<div class="footer-widgets">
            		<div class="container">
            			<div class="row">
            				<!--<div class="col-lg-4 col-md-4 col-xs-12">
            					<aside class="widget clearfix">
            						<div class="body">
            							<h4 class="widget-title">Special Deals</h4>
            							
            								
            									<?php include('include/special_deals.php'); ?>
            								
            							</ul>
            						</div>
            					</aside>
            				</div>
            				<div class="col-lg-4 col-md-4 col-xs-12">
            					<aside class="widget clearfix">
            						<div class="body"><h4 class="widget-title">Hot Deals</h4>
            							
            								<?php include('include/hot_deals.php'); ?>
            							
            						</div>
            					</aside>
            				</div>-->
            			<!--	<div class="col-lg-4 col-md-4 col-xs-12">
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
             <div class="tab-content col-md-12 real-estate-tab result-div" id="post-results"> </div>
  <!-- Choose country -->
 

  </div>
  <!-----col------->
</div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
<script type="text/javascript" src='https://maps.google.ae/maps/api/js?key=AIzaSyCb8mnr3T1fcU8UgpCWylaH3rqfVdBsPbk&libraries=places'></script> 
<script src="assets/front_end/js/locationpicker.jquery.js"></script> 
<script type="application/javascript"> 
<?php $lat =  @$view->latitude;
	  $long = @$view->longitude;
	 
	  if($lat == 0 || $lat == ''){
		$lat = '25.1968143';  
	  }
	  if($long == 0 || $long == ''){
		$long = '55.2709185';  
	  }?>
function updateControls(addressComponents) {
    $('#country').val(addressComponents.country);
}
$('#map').locationpicker({
    location: {
        latitude: <?php echo $lat; ?>,
        longitude: <?php echo $long; ?>
    },
    radius: 800,
    zoom: 13,
    onchanged: function(currentLocation, radius, isMarkerDropped) {
        var addressComponents = $(this).locationpicker('map').location.addressComponents;
        updateControls(addressComponents);
    },
    inputBinding: {
        latitudeInput: $('#latitude'),
        longitudeInput: $('#longitude'),
        radiusInput: $('#us3-radius'),
        locationNameInput: $('#address')
    },
    enableAutocomplete: true,
    oninitialized: function(component) {
        var addressComponents = $(component).locationpicker('map').location.addressComponents;
        updateControls(addressComponents);
    }
});
</script>

       

       

       

       