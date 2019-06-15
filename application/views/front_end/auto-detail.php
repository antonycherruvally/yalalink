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
 <ul class="social_icons" id="fixed-social">
		<li><a href="http://facebook.com/yallalink" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:white;"></i> </a></li>
	<li><a href="http://twitter.com/yalalink" target="_blank"  data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:white;"></i> </a></li>
	<li><a href="http://instagram.com/yallalink" target="_blank"  data-placement="bottom" title="Instagram" data-original-title="Instagram"><i class="fab fa-instagram" aria-hidden="true" style="color:white;"></i> </a></li>
	<li><a href="https://www.youtube.com/channel/UCUMQgk6eeTzQFtptXd81kDA" target="_blank"  data-placement="bottom" title="Youtube" data-original-title="Youtube"><i class="fab fa-youtube-square" aria-hidden="true" style="color:white;"></i> </a></li>
  </ul>
				<div class="container">

					<nav class="woocommerce-breadcrumb">
						<a href="index">Home</a>
						<span class="delimiter"><i class="fa fa-angle-right"></i></span>
						<a href="auto">Auto</a>
						<span class="delimiter"><i class="fa fa-angle-right"></i></span>
						<a href="auto?category=<?php echo $view->category; ?>&type=<?php echo $view->type; ?>"><?php echo $view->cat; ?></a>
						<span class="delimiter"><i class="fa fa-angle-right"></i>
						<a href="auto?category=<?php echo $view->category; ?>&subcategory=<?php echo $view->subcategory; ?>&type=<?php echo $view->type; ?>"><?php echo $view->subcat; ?></a>
					</nav><!-- /.woocommerce-breadcrumb -->

					<div id="primary" class="content-area leftpadding">
						<main id="main" class="site-main">

							<div class="product autoproduct">

								<div class="single-product-wrapper">
									<div class="product-images-wrapper">
									   
										<div class="images electro-gallery mobiledetailview" style="margin-top: 70px;">

<div class="row">
	<div class="col-md-10 col-sm-12">
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
	  <span class="heart"><a href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a></span>
  </div>
	
	<!-- Carousel nav --> 
	<a class="left carousel-control" href="#cat-slider" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#cat-slider" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
  </div>
</div>

<!-- carousel slide -->
<div class="row" id="slider-thumbs">
	<!-- <div class="row"> -->
		<div class="col-md-12">
			<ul class="hide-bullets store-bullets autothumb">
				<?php  
					if( $images ){ 
						$i = 0; 
						foreach( $images as $val ) {
								if($i >= 10)
	 {
	 	break;
	 }
							if( $val->image ) {
								$img ='uploads/images/thumb/'.$val->image;
							}else {
								$img = 'assets/img/no_image_available.jpg';
							} 
						?>
							<li>
								<a class="thumbnail" id="carousel-selector-<?php echo $i; ?>">
									<img src="<?php echo $img; ?>" class="store-thumb-img" alt="<?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$view->title_en)))); if($view->title_ar!=''){ echo '  ( '.@$view->title_ar.' )'; }?>">
								</a>
							</li>
				<?php 
							$i++;
						}
					} ?>
			</ul>
		</div>
	<!-- </div> -->
</div>
										</div><!-- .electro-gallery -->
									</div><!-- /.product-images-wrapper -->

									<div class="summary entry-summary">

										<span class="loop-product-categories">
											  <a href="auto?category=<?php echo $view->category; ?>&type=<?php echo $view->type; ?>"><?php echo $view->cat; ?></a>
										</span><!-- /.loop-product-categories -->

										<h1 itemprop="name" class="product_title entry-title mobi_tit_det" style="color: #662d91;"><?php echo @$view->title_en; ?></h1>
										
										 <h3 itemprop="name" class="product_title entry-title mobi_tit_entrydet"  style="color: red;"><?= Core::getHelper('location')->getCountryDetails($view->country)['curCode'] ?> <?php if($view->offer_price!=0) { echo number_format(@$view->offer_price); }else{ echo number_format(@$view->price); }?> <span><?php if($view->offer_price!=0) { echo number_format(@$view->price); }?></span></h3>
                                         <p>Post date: <?= Core::getHelper('date')->timePassed($postdate->added_date) ?></p>
										</div><!-- .woocommerce-product-rating -->

										<div itemprop="description">
										 <table class="table tablicn">
										  
													<tbody>
													<tr style="height: 100px;">
													<td style="border:none;width: 164px;"><span><a href="#" title="Year"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 36px;" alt="bedroom">  </i></a><?php echo @$view->year?> </span></td>
													<td style="border:none;width: 177px; "> <span><a href="#" title="color"><i class="fas fa-palette" aria-hidden="true" style="font-size: 36px;" alt="bedroom"> </i></a><?php echo @$view->color; ?></span> </td>
													<td style="border:none;"><span><a href="#" title="kilometer"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 36px;" alt="bedroom"></i></a><?php echo @$view->kilometers; ?></span></td>
												  
													
													</tr>
													<tr>&nbsp;</tr>
													<tr></tr>
													<tr></tr>
													<tr>
													<td style="border:none;"><span><a href="#" title="HP"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 36px;" alt="bedroom"></i></a><?php echo @substr($view->horsepower, 0,3); ?></span></td>
													<td style="border:none;"><span><a href="#" title="specification"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 36px;" alt="bedroom"></i></a><?php echo @substr($view->regional_specs, 0,3); ?></span></td>
													 <td style="border:none;"><span><a href="#" title="body type"><i class="fas fa-car" aria-hidden="true" style="font-size: 36px;" alt="bedroom"></i></a><?php echo @$view->body_type; ?></span></td>
													</tr>
													</tbody>
													</table>
													<!---mobile view--->
										  <table class="table  mobtablicn" style="display:none; margin-bottom: 0px;">
										  
													<tbody>
													<tr>
													<td style="border:none;width: 164px;"><span style="display: flex;"><a href="#" title="Year" style="font-size: 11px;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 12px;color: orange;" alt="bedroom">  </i></a><a style="font-size: 11px;margin-left: 4px;"><?php echo @$view->year?> </a></span></td>
													<td style="border:none;width: 177px; "> <span style="display: flex;"><a href="#" title="color" style="font-size: 11px;"><i class="fas fa-palette" aria-hidden="true" style="color: orange;" alt="bedroom"> </i></a><br><a style="font-size: 11px;margin-left: 4px;"><?php echo @$view->color; ?></a></span> </td>
													<td style="border:none;"><span style="display: flex;"><a href="#" title="kilometer" style="font-size: 12px;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 12px;color: orange;" alt="bedroom"></i></a><a style="font-size: 11px;margin-left: 4px;"><?php echo @$view->kilometers; ?></a></span></td>
												  
													
													
													<td style="border:none;"><span style="display: flex;"><a href="#" title="HP" style="font-size: 12px;"> <i class="fab fa-superpowers" aria-hidden="true" style="font-size: 12px;color: orange;" alt="bedroom"></i></a><a style="font-size: 11px;margin-left: 4px;"><?php echo @substr($view->horsepower, 0,3); ?></a></span></td>
													<td style="border:none;"><span style="display: flex;"><a href="#" title="specification" style="font-size: 12px;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 12px;color: orange;" alt="bedroom"></i></a><a style="font-size: 11px;margin-left: 4px;"><?php echo @substr($view->regional_specs, 0,3); ?></a></span></td>
													 <td style="border:none;"><span style="display: flex;"><a href="#" title="body type" style="font-size: 12px;"><i class="fas fa-car" aria-hidden="true" style="font-size: 12px;color: orange;" alt="bedroom"></i></a><a style="font-size: 11px;margin-left: 4px;"><?php echo @$view->body_type; ?></a></span></td>
													</tr>
													</tbody>
													</table>
										  

										   
										   
										</div><!-- .description -->

									</div><!-- .summary -->
								</div><!-- /.single-product-wrapper -->


								<div class="woocommerce-tabs wc-tabs-wrapper">
									<ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">
										<li class="nav-item description_tab">
											<a href="#tab-description"  class="active" data-toggle="tab">Vehicle Description</a>
										</li>
										<li class="nav-item accessories_tab">
											<a href="#tab-accessories" data-toggle="tab">Highlights</a>
										</li>
										<li class="nav-item specification_tab">
											<a href="#tab-specification" data-toggle="tab">Performance</a>
										</li>
										<li class="nav-item reviews_tab">
											<a href="#tab-reviews_tab" data-toggle="tab">Location</a>
										</li>

									</ul>

									<div class="tab-content rightcontent">
										<div class="tab-pane in panel entry-content wc-tab" id="tab-accessories">

											<div class="accessories">

												<div class="electro-wc-message"></div>
												<div class="row">
													<div class="col-xs-12 col-sm-9 col-left">
														 
														 <table class="table">
													<tbody>
														<tr>
			  <td>Type:</td>
			  <td><?php echo @$view->type; ?></td>
		  </tr>
		  
		  <?php if($view->category == 1){ ?>
		  <tr>
		 <td>Colour:</td>
			  <td><?php echo @$view->color; ?></td>
			  </tr>
		 <tr><td>Body Type:</td>
			<td><?php echo @$view->body_type; ?></td>
			</tr>
		 <tr>
		 <td>Transmission:</td>
			  <td><?php echo @$view->transmission_type; ?></td>
			  </tr>
		  <tr>
		  <td>Warranty:</td>
			  <td><?php echo @$view->warranty; ?></td>
			  </tr>
			 
		  <?php } ?>
		 
		 
		  <?php if($view->category == 2){ ?>
		  <tr>
		 <td>Body Type:</td>
		   <td><?php echo @$view->body_type; ?></td>
		  <tr>
		  <tr>
			  <td>Warranty:</td>
			  <td><?php echo @$view->warranty; ?></td>
			  </tr>
		  
		  <?php } ?>          
		  <?php if($view->category == 3){ ?>
		  <tr>
		  <td>Fuel Type:</td>
			  <td><?php echo @$view->fuel_type; ?></td>
		  </tr>
		  <tr>
			  <td>Warranty:</td>
			  <td><?php echo @$view->warranty; ?></td>
		  </tr>
		  <?php } ?>
		  <?php if($view->category == 4){ ?>
		  <tr>
		  <td>Manufacturer:</td>
			  <td><?php echo @$view->manufacturer; ?></td>
		 </tr>
		 <tr><td>Warranty:</td>
			  <td><?php echo @$view->warranty; ?></td>
			</tr>
		  <?php } ?>
		
		  </tbody>
		  </table>
		  
	  
		</ul><!-- /.products -->

														

													</div><!-- /.col -->

												   <!-- /.col -->
												</div><!-- /.row -->

											</div><!-- /.accessories -->
										</div>

										<div class="tab-pane active panel entry-content wc-tab" id="tab-description">
											<div class="electro-description">

											 
												 <?php $description = $this->yalalink_model->makeLinks($view->description); echo @$description; ?>
												  <table class="table">
													<tbody>
														<tr>
														  
												
		<?php if($view->body_type){ ?>
		  <td>Kilometers</td>
		 <td><?php echo @$view->kilometers; ?></td>
		  <?php } ?>
		  </tr>
		   <tr>
		 
		 <?php if($view->body_condition){ ?>
		  <td>Body Condition</td>
			 <td><?php echo @$view->body_condition; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->mechanical_condition){ ?>
		  
			 <td>Mechanical Condition</td>
			 <td><?php echo @$view->mechanical_condition; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->year){ ?>
		  
			  <td>Year</td>
			 <td><?php echo @$view->year; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->body_type){ ?>
		  
		  <td>Body Type</td>
			  <td><?php echo @$view->body_type; ?></td>
		
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->color){ ?>
		  <td>Color</td>
			 <td><?php echo @$view->color; ?></td>
		
		  <?php } ?>
		  </tr>
		  <tr>
		  
		  <?php if($view->transmission_type){ ?>
		  <td> Transmission Type</td>
		  <td>
			  <?php echo @$view->transmission_type; ?></td>
			 
		
		  <?php } ?>
		   </tr>
			  <tr>
		  <?php if($view->regional_specs){ ?>
		  <td>Regional Specs</td>
			  <td><?php echo @$view->regional_specs; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  
		  <?php if($view->doors){ ?>
		  <td>Doors</td>
			 <td><?php echo @$view->doors; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->cylinders){ ?>
		  <td>Cylinders</td>
			 <td><?php echo @$view->cylinders; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  
		  <?php if($view->horsepower){ ?>
		  <td>
		  Horsepower</td>
			  <td><?php echo @$view->horsepower; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->fuel_type){ ?>
		  <td>Fuel Type</td>
		  <td>
			  <?php echo @$view->fuel_type; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->auto_type){ ?>
		  <td>Auto Type:</td>
			  <td><?php echo @$view->auto_type; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->age){ ?>
		  <td>Age:</td>
			  <td><?php echo @$view->age; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->usage){ ?>
		  <td>Usage:</td>
			  <td><?php echo @$view->usage; ?></td>
	   
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->length){ ?>
		<td>Length:</td>
		   <td><?php echo @$view->length; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->make){ ?>
		  <td>Make:</td>
			 <td><?php echo @$view->make; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->capacity){ ?>
		  <td>Capacity:</td>
			 <td><?php echo @$view->capacity; ?></td>
		 
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->drive_system){ ?>
		  <td>Drive System:</td>
			  <td><?php echo @$view->drive_system; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->wheels){ ?>
		  <td>Wheels:</td>
			<td><?php echo @$view->wheels; ?></td>
		  <?php } ?>
		  </tr>
		  <tr>
		  
		  <?php if($view->manufacturer){ ?>
		 <td>Manufacturer:</td>
			  <td><?php echo @$view->manufacturer; ?></td>
		  
		  <?php } ?>
		  </tr>
		  <tr>
		  <?php if($view->engine_size){ ?>
		  <td>
		 Engine Size:</td>
		 <td><?php echo @$view->engine_size; ?></td>
		
		  <?php } ?>
		  </tr>
		  
	   </tbody>
	   </table>
		
	  
						 
												
											</div><!-- /.electro-description -->

										   
										</div>

										<div class="tab-pane panel entry-content wc-tab" id="tab-specification">
										  
											  <table class="table">
													<tbody>
														<tr>
											 <td>Cylinders:</td>
			  <td><?php echo @$view->cylinders; ?></td>
		  </tr>
		  <tr>
		  <td>Horse Power:</td>
			 <td><?php echo @$view->horsepower; ?></td>
		  </tr>
		  </tbody>
		  </table>
										</div><!-- /.panel -->

										<div class="tab-pane panel entry-content wc-tab" id="tab-reviews_tab">
											 <div class="col-sm-12" id="map" style="height:200px;margin-bottom: 26px;"></div>
										</div><!-- /.panel -->
									</div>
								</div><!-- /.woocommerce-tabs -->
								 <div class="detail-btn-wrap pos-center" style="margin-top: 33px;     margin-left: -4px;"> 
<?php if($view->mobile){ ?>
<a href="tel:<?php echo @$view->mobile; ?>" class="hero-button btn-shadow icon-btn call-show-nmb detail-btn btn-FF9800 realsub"><span class="">Call<i class="fa fa-phone bounce-ani" aria-hidden="true" ></i></span></a> 
<?php } ?>
<?php if($view->email){ ?>
<a href="javascript:void(0);" data-toggle="modal" data-target="#sendMail" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo @$view->email; ?>" class="hero-button btn-shadow icon-btn detail-btn btn-FF9800 submail"> <span><i class="fa fa-paper-plane bounce-ani" aria-hidden="true"></i>E-mail</span></a>
<?php }else{?>
	<a href="javascript:void(0);" data-toggle="modal" data-target="" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo @$view->email; ?>" class="hero-button-grey btn-shadow icon-btn detail-btn btn-FF9800 submail"> <span><i class="fa fa-paper-plane bounce-ani" aria-hidden="true"></i>E-mail</span></a>

<?php }
 ?>

</div>                          

							  
							</div><!-- /.product -->

						</main><!-- /.site-main -->
					</div><!-- /.content-area -->
					  <div id="sidebar1" class="sidebar" role="complementary" style="margin-top: 15px;">
					   <!--<aside class="widget widget_text">
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
										</aside>-->
										<aside class="widget widget_text">
											<?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/";?>
                          <div class="social" style="display: none;">
                                <span style="margin-left: 73px;"><a href="whatsapp://send?text=<?=$actual_link ?>" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color: green; font-size: 30px;"></i> </a></span>

							<span style="margin-left: 46px;"><a href="#" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color: #3b5998; font-size: 30px;"></i> </a></span>

							<span style="margin-left: 46px;"><a href="twitter://post?message=<?=$actual_link ?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color: #1da1f2; font-size: 30px;"></i> </a></span>
						</div>


							<div class="textwidget mobiadsview" style="margin-top: 19px;">
								 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
       <ins class="adsbygoogle"
        style="display:inline-block;width:420px;height:100px"
        data-ad-client="ca-pub-8267866280490368"
        data-ad-slot="4614962273"></ins> 
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
							</div>
						</aside>
						<aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
							<ul class="product-categories category-single icontabl">
								<table class="tableside" style="text-align:start">
									<th colspan="2" style="text-align:center">Icons</th>
									<tbody>
										<tr>
										<td>Year</td>
											<td><i class="fas fa-calendar" aria-hidden="true" style="font-size: 20px;" alt="bedroom">  </i></td>
											<td style="text-align: end;">سنة</td>
										</tr>
										<tr>
										<td>Kilometer</td>
											<td><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 20px;" alt="bathroom"></i></td>
											<td style="text-align: end;">كيلومتر</td>
										</tr>
										<tr>
										<td>Color</td>
											<td><i class="fas fa-palette" aria-hidden="true" style="font-size: 20px;"></i></td>
											<td style="text-align: end;">لون</td>
										</tr>
									   <tr>
									   <td>Horse power</td>
									   <td><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 20px;"></i></td>
									   <td style="text-align: end;">قوة حصان</td>
									   </tr>
									   <tr>
									   <td>Specification</td>
									   <td><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 20px;"></i></td>
									   <td style="text-align: end;">المواصفات</td>
									   </tr>
									   <tr>
									   <td>Body Type</td>
									   <td><i class="fas fa-car" aria-hidden="true" style="font-size: 20px;"></i></td>
									   <td style="text-align: end;">نوع المجسم</td>
									   </tr>
									   
													
										
									</tbody>
								</table>
							   </ul>
							   </aside>
							   <aside class="widget widget_text mobgoogleadview">
							   	<div class="textwidget">
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
							   <?php $this->load->view('blocks/slider/similarads', ['category' => 'Auto']); ?>
							   <?php $this->load->view('blocks/slider/ualsolike',['category' => 'Auto']);?>
						</div>
						 
				</div><!-- /.container -->

                  

	<div class="container categ" id="adslistings" style="padding: 0px;">

			   <?php $this->load->view('blocks/body/categorymenu'); ?>	

</div> 
			   
			</div><!-- /.site-content -->

		   

			 <footer id="colophon" class="site-footer" style="display:none">
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

	   