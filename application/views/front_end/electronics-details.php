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
					   <a href="electronics">Electronics</a>
						<span class="delimiter"><i class="fa fa-angle-right"></i></span>
					   <a href="electronics?category=<?php echo $view->category; ?>&type=<?php echo $view->type; ?>"><?php echo $view->cat; ?></a>
					   <span class="delimiter"><i class="fa fa-angle-right"></i></span>
					   <a href="electronics?category=<?php echo $view->category; ?>&type=<?php echo $view->type; ?>"><?php echo $view->type; ?></a>
					</nav><!-- /.woocommerce-breadcrumb -->

					<div id="primary" class="content-area leftpadding">
						<main id="main" class="site-main">

							<div class="product">

								<div class="single-product-wrapper">
									<div class="product-images-wrapper">
										
										<div class="images electro-gallery mobiledetailview">
										
										<div class="col-md-10 col-sm-12">
  <div class="carousel slide" id="cat-slider" data-ride="carousel"> 
	<!-- Carousel items -->
	<div class="carousel-inner hero-radius  mobidetailsviewelect ">
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
										 <h3 itemprop="name" class="product_title entry-title mobi_tit_entrydet"  style="color: red;"><?= Core::getHelper('location')->getCountryDetails($view->country)['curCode'] ?> <?php if($view->offer_price!=0) { echo number_format(@$view->offer_price); }else{ echo number_format(@$view->price); }?> <span><?php if($view->offer_price!=0) { echo number_format(@$view->price); }?></span></h3>
										<p>Post date: <?= Core::getHelper('date')->timePassed($postdate->added_date) ?></p>

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
											<a href="#tab-accessories" class="active" data-toggle="tab">Key features</a>
										</li>

										<li class="nav-item description_tab">
											<a href="#tab-description"  data-toggle="tab">Details</a>
										</li>

										 <li class="nav-item reviews_tab">
											<a href="#tab-reviews_tab" data-toggle="tab">Location</a>
										</li>

									</ul>

									<div class="tab-content">
										<div class="tab-pane active in panel entry-content wc-tab" id="tab-accessories">

											<div class="accessories">

												<div class="electro-wc-message"></div>
												<div class="row">
													<div class="col-xs-12 col-sm-9 col-left">
													   
													   <table class="table">
													   <tbody>
													   <tr>
													   
		<?php if($view->weight){ ?>
		
		  <td>Weight:</td>
			  <td><?php echo @$view->weight; ?></td>
		 
		  <?php } ?></tr>
		  <tr>
		  <?php if($view->weight){ ?>
		 <td>Display Type:</td>
			 <td><?php echo @$view->display_type; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->weight){ ?>
		 <td>TV Type:</td>
			  <td><?php echo @$view->category_type; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->color){ ?>
		  <td>Color:</td>
			 <td><?php echo @$view->color; ?></td>
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->screen_size){ ?>
		 <td>Screen Size:</td>
			  <td><?php echo @$view->screen_size; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->dimension){ ?>
		 <td>Dimension:</td>
			  <td><?php echo @$view->dimension; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->warranty){ ?>
		  <td>Warranty:</td>
			  <td><?php echo @$view->warranty; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->megapixel){ ?>
		 <td>Megapixel:</td>
			  <td><?php echo @$view->megapixel; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->power_source){ ?>
		 <td>Power Source:</td>
			<td><?php echo @$view->power_source; ?></td>
		  
		  <?php } ?></tr>
		  <tr>
		  <?php if($view->connectivity){ ?>
		  <td>Connectivity:</td>
			  <td><?php echo @$view->connectivity; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		
		<?php if($view->brand){ ?>
		  <td>Brand:</td>
			  <td><?php echo @$view->brand; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  
		  <?php if($view->storage){ ?>
		  <td>Storage:</td>
			  <td><?php echo @$view->storage; ?></td>
		  
		  <?php } ?></tr>
		  <tr>
		  <?php if($view->optical_zoom){ ?>
		  <td>Optical Zoom:</td>
			  <td><?php echo @$view->optical_zoom; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->style){ ?>
		  <td>Style:</td>
			  <td><?php echo @$view->style; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->material){ ?>
		  <td>Material:</td>
			  <td><?php echo @$view->material; ?></td>
		  
		  <?php } ?></tr>
		  <tr>
		  <?php if($view->compatible){ ?>
		 <td>Compatible:</td>
			  <td><?php echo @$view->compatible; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->player){ ?>
		  <td>Player:</td>
			  <td><?php echo @$view->player; ?></td>
		  
		  <?php } ?>
		  </tr>
		  
		   </tbody></table>
		
		
		<!-- /.products -->

														<div class="check-products">
														   

															

														   
														</div><!-- /.check-products -->

													</div><!-- /.col -->

												   <!-- /.col -->
												</div><!-- /.row -->

											</div><!-- /.accessories -->
										</div>

										<div class="tab-pane panel entry-content wc-tab" id="tab-description">
											<div class="electro-description">

												<h3>Details</h3>
												 <?php $description = $this->yalalink_model->makeLinks($view->description); echo @$description; ?>
											  <table class="table">
											  <tbody>
											   <tr>
		
		<?php if($view->brand){ ?>
		  <td>Brand:</td>
			  <td><?php echo @$view->brand; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  
		  <?php if($view->storage){ ?>
		  <td>Storage:</td>
			  <td><?php echo @$view->storage; ?></td>
		  
		  <?php } ?></tr>
		  <tr>
		  <?php if($view->optical_zoom){ ?>
		  <td>Optical Zoom:</td>
			  <td><?php echo @$view->optical_zoom; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->style){ ?>
		  <td>Style:</td>
			  <td><?php echo @$view->style; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->material){ ?>
		  <td>Material:</td>
			  <td><?php echo @$view->material; ?></td>
		  
		  <?php } ?></tr>
		  <tr>
		  <?php if($view->compatible){ ?>
		 <td>Compatible:</td>
			  <td><?php echo @$view->compatible; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->player){ ?>
		  <td>Player:</td>
			  <td><?php echo @$view->player; ?></td>
		  
		  <?php } ?>
		  </tr>
		</tbody>
		</table>
												
											</div><!-- /.electro-description -->

										   
										</div>

									   <!-- <div class="tab-pane panel entry-content wc-tab" id="tab-specification">
											<h3>Performance</h3>
											 <ul class="list-inline row gnralbox">
		  <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
			<p>
			  <label>Cylinders:</label>
			  <span><i class="show_color"><?php echo @$view->cylinders; ?></i></span> </p>
		  </li>
		  <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
			<p>
			  <label>Horse Power:</label>
			  <span><i class="show_color"><?php echo @$view->horsepower; ?></i></span> </p>
		  </li>
		</ul>
										</div>--><!-- /.panel -->

										<div class="tab-pane panel entry-content wc-tab" id="tab-reviews_tab">
									 <div class="col-sm-12" id="map" style="height:200px;margin-bottom: 26px;"></div>

										</div><!-- /.panel -->
									</div>

								</div><!-- /.woocommerce-tabs -->
<div class="detail-btn-wrap pos-center" style="margin-top: 33px;"> 
<?php if($view->mobile){ ?>
<a href="tel:<?php echo @$view->mobile; ?>" class="hero-button btn-shadow icon-btn call-show-nmb detail-btn btn-FF9800 realsub" x="<?php echo @$view->mobile; ?>">Call<i class="fa fa-phone bounce-ani" aria-hidden="true" ></i></a> 
<?php } ?>
<?php if($view->email){ ?>
<a href="javascript:void(0);" data-toggle="modal" data-target="#sendMail" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo @$view->email; ?>" class="hero-button btn-shadow icon-btn detail-btn btn-FF9800 submail"> <span><i class="fa fa-paper-plane bounce-ani" aria-hidden="true"></i>E-mail</span></a>
<?php } ?>

</div>                       
							  
							</div><!-- /.product -->

						</main><!-- /.site-main -->
					</div><!-- /.content-area -->
					 <div id="sidebar1" class="sidebar" role="complementary" style="margin-top: 15px;">
					   <aside class="widget widget_text" style="display:none">
						<div class="agentinfo">
											<div class="ag_image">
											<?php $image = @$view->image;
											
											if($image == 'null' || $image == 0)
											{
												$image = 'assets/front_end/images/no_image_available.jpg';
											}
											else{
												$image = 'uploads/view/users/thumb/'.@$view->image;
											}
											?>
                                        		<img src="<?php echo $image ?>">
                                        	</div>
                                        <div class="ag_details">
                                        <div class="agentname">Agent :<span> <?php echo @$view->first_name ?> <?php echo @$view->last_name ?></span></div>
                                        <div class="cmpnyname">Company :<span> <?php @$view->company_name ?></span></div>
                                        
                                        <div class="phonebg"> <?php $this->load->view('front_end/include/call_email'); ?></div>
                                        </div>
                                        </div>
                                        </aside>
                        <aside class="widget widget_text">
                            <div class="textwidget">
                <a href="http://yalafun.com/"><img src="assets/front_end/images/bannerad3.jpg" alt="Banner" class="bannerfull"></a>
              </div>
                        </aside>
                        <aside class="widget widget_text mobgoogleadview">
                                <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/";?>
                               <div class="social" style="display: none;">
                                <span style="margin-left: 73px;"><a href="whatsapp://send?text=<?=$actual_link ?>" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color: green; font-size: 30px;"></i> </a></span>

                            <span style="margin-left: 46px;"><a href="#" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color: #3b5998; font-size: 30px;"></i> </a></span>

                            <span style="margin-left: 46px;"><a href="twitter://post?message=<?=$actual_link ?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color: #1da1f2; font-size: 30px;"></i> </a></span>
                         </div>

                            <div class="textwidget mobiadsview" style="margin-top: 19px;">
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
        style="display:inline-block;width:300px;height:600px"
        data-ad-client="ca-pub-8267866280490368"
        data-ad-slot="4614962273"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        </div>
                               </aside>
                       	<?php $this->load->view('blocks/slider/similarads', ['category' => 'Electronics']); ?>
                               <?php $this->load->view('blocks/slider/ualsolike',['category' => 'Electronics']);?>
                        </div>
                </div><!-- /.container -->
                 	
                  <div class="container categ" id="adslistings" style="padding: 0px;">

               <?php $this->load->view('blocks/body/categorymenu'); ?>  

</div> 
            </div><!-- /.site-content -->

           

              <footer id="colophon" class="site-footer" style="display:none>
            	<div class="footer-widgets">
            		<div class="container">
            			<div class="row">
            				<div class="col-lg-4 col-md-6 col-xs-12">
            					<aside class="widget clearfix">
            						<div class="body">
            							<h4 class="widget-title">Special Deals</h4>
            							
            								
            									<?php include('include/special_deals.php'); ?>
            								
            							</ul>
            						</div>
            					</aside>
            				</div>
            				<div class="col-lg-4 col-md-6 col-xs-12">
            					<aside class="widget clearfix">
            						<div class="body"><h4 class="widget-title">Hot Deals</h4>
            							
            								<?php include('include/hot_deals.php'); ?>
            							
            						</div>
            					</aside>
            				</div>
            				
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

	   

	   