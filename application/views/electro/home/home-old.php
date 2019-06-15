<?php $this->load->view('blocks/header'); 
$country_code = $this->session->userdata('country_code');
?>
<div id="content" class="site-content" tabindex="-1">
	<ul class="social_icons" id="fixed-social">
		<li><a href="" target="_blank" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:white;"></i> </a></li>
		<li><a href="http://facebook.com/yallalink" target="_blank" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:white;"></i> </a></li>
		<li><a href="http://twitter.com/yalalink" target="_blank" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:white;"></i> </a></li>
		<li><a href="http://instagram.com/yallalink" target="_blank" data-placement="bottom" title="Instagram" data-original-title="Instagram"><i class="fab fa-instagram" aria-hidden="true" style="color:white;"></i> </a></li>
	</ul>
				<div class="container">

					<div id="primary" class="content-area">
						<main id="main" class="site-main">
						   <!-- <div class="home-v2-slider" >
								<!-- ========================================== SECTION – HERO : END========================================= -->

							   <!-- <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

									<div class="item" style="background-image: url('<?=Core::getBaseUrl()?>assets/front_end/images/banner/13.jpg')">
									   
									</div>
<div class="item" style="background-image: url('<?=Core::getBaseUrl()?>assets/front_end/images/banner/14.jpg')"></div>

									<div class="item" style="background-image: url('<?=Core::getBaseUrl()?>assets/front_end/images/banner/12.jpg');">
									  
									</div>

									<div class="item" style="background-image: url('<?=Core::getBaseUrl()?>assets/front_end/images/banner/11.jpg');">
									   
									</div>


								</div>-->

								<!-- ========================================= SECTION – HERO : END ========================================= -->

						   <!-- </div><!-- /.home-v1-slider -->
							<div class="home-v2-ads-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
								<div class="ads-block row">
								
									<div class="ad col-xs-12 col-md-6 col-sm-12">
										<div class="media mediamob">
											<div class="media-left media-middle"><img src="uploads/view/31.png" alt="" /></div>
											<div class="media-body media-middle">
												<div class="ad-text">
													Catch Big<br> <strong>Deals</strong>of the<br> Homes
												</div>
												<div class="ad-action">
													<a href="#">Details</a>
												</div>
											</div>
										</div>
									</div>
									<div class="ad col-xs-12 col-md-6 col-sm-12">
										<div class="media mediamob">
											<div class="media-left media-middle"><img src="uploads/view/range.png" alt="" /></div>
											<div class="media-body media-middle">
												<div class="ad-text">
													SUVs, <br>Cars<br> and more
												</div>
												<div class="ad-action">
													<a href="#"><span class="from"><span class="prefix">From</span><span class="value"><sup>AED</sup>30000</span><span class="suffix"></span></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<section class="products-carousel-tabs animate-in-view fadeIn animated bordersection" data-animation="fadeIn">
								<h2 class="sr-only">Post Carousel Tabs</h2>
								<ul class="nav nav-inline">
									<li class="nav-item">
										<a class="nav-link active" href="#tab-products-1" data-toggle="tab">Hot Deals <span class="" style="margin-left:10px"> عروض مميزة‎</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="#tab-products-2" data-toggle="tab">Latest Post &nbsp;&nbsp; أحدث الإعلانات</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="#tab-products-3" data-toggle="tab">Special Offers عروض خاصة</a>
									</li>
								</ul><!-- /.nav -->

								<div class="tab-content">
									<div class="tab-pane active" id="tab-products-1" role="tabpanel">
										<section class="section-products-carousel" >
											<div class="home-v2-owl-carousel-tabs">
												<div class="woocommerce columns-3 mobidealsnopadd">


													<div class="products owl-carousel home-v2-carousel-tabs products-carousel columns-3">
														<?php if($hotdeals){
		$i=1;
		foreach($hotdeals as $val){
			
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$main_image = $this->yalalink_model->getMainImage($val->id);
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		if($main_image) {
		 $img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
		$timestamp = $val->added_date;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($val->main_category == 'Real Estate'){ $link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  
		  if($i==1){?>

														<div class="product first">
															<div class="product-outer" style="height: 359px;">
																<!--<div class="product-inner">-->
																   <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhome" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																	   <div class="small dealheadhome">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$link; ?>"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
						</div>
					<a href="<?php echo @$link; ?>">
					<img class="card-img-top gridmobviewimg dealimghome" id="" data-groups="post-results" src="<?php echo @$image; ?>" alt="">
						<!--<img src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" class="img-responsive homemobdealtop" alt="">-->
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
					
					<a href="<?php echo @$link; ?>">  <h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30); if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
					}?></h3></a>
							
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></a></h5>
						<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,150).'...'; ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="<?php echo @$link; ?>" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="<?php echo @$link; ?>" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="<?php echo @$link; ?>" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="<?php echo @$link; ?>" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
															</div><!-- /.product-outer -->
														</div><!-- /.product -->
 <?php }}$i++;  } ?>

														
												</div>
											</div>
											</div>
										</section>
									</div><!-- /.tab-pane -->
									
				

									<div class="tab-pane" id="tab-products-2" role="tabpanel">
										<section class="section-products-carousel">
											<div class="home-v2-owl-carousel-tabs">
												<div class="woocommerce columns-3">


													<div class="products owl-carousel home-v2-carousel-tabs products-carousel columns-3">
 <?php $i=1; if($latestpost_new){ foreach($latestpost_new as $val){
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$main_image = $this->yalalink_model->getMainImage($val->id);
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		if($main_image) {
		 $img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
 $timestamp = $val->added_date;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($val->main_category == 'Real Estate'){ $l_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $l_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $l_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $l_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $l_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $l_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $l_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $l_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $l_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $l_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  if($i==1){?>
																<div class="product first">
															<div class="product-outer" style="height: 359px;">
																<!--<div class="product-inner">-->
																   <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhome" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																	   <div class="small dealheadhome">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$link; ?>"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>  
							</div>
					<a href="<?php echo @$link; ?>">
						 <img class="card-img-top gridmobviewimg dealimghome" id="" data-groups="post-results" src="<?php echo @$image; ?>" alt="">
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
					
								<a href="<?php echo @$link; ?>">  <h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
							
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></a></h5>
						<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,45); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
															</div><!-- /.product-outer -->
														</div><!-- /.product -->


													   <?php }}$i++;  } ?> 


														
												</div>
											</div>
											</div>
										</section>
									</div><!-- /.tab-pane -->

									<div class="tab-pane" id="tab-products-3" role="tabpanel">
										<section class="section-products-carousel">
											<div class="home-v2-owl-carousel-tabs">
												<div class="woocommerce columns-3">


													<div class="products owl-carousel home-v2-carousel-tabs products-carousel columns-3">
															  <?php $i=1; if($special){ foreach($special as $val){
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		$main_image = $this->yalalink_model->getMainImage($val->id);
		if($main_image) {
		$img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
		$timestamp = $val->added_date;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($val->main_category == 'Real Estate'){ $s_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $s_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $s_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $s_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $s_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $s_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $s_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $s_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $s_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $s_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  if($i==1){?>

														<div class="product first">
															<div class="product-outer" style="height: 359px;">
																<!--<div class="product-inner">-->
																   <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhome" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																   <div class="small dealheadhome">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$link; ?>"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>  
							</div>
					<a href="<?php echo @$link; ?>">
						 <img class="card-img-top gridmobviewimg dealimghome" id="" data-groups="post-results" src="<?php echo @$image; ?>" alt="">
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
					
								<a href="<?php echo @$link; ?>">  <h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30); if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
							
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></a></h5>
						<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,45); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white;">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
															</div><!-- /.product-outer -->
														</div><!-- /.product -->

													 <?php }}$i++;  } ?> 
													   
												</div>
											</div>
										</section>
									</div><!-- /.tab-pane -->
								</div><!-- /.tab-content -->
							</section><!-- /.products-carousel-tabs -->
							 <div class="home-v2-banner-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
								<div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 30px">
									<a href="#">
										<img src="uploads/view/add2.jpg" class="img-fluid" alt="">
									</a>
								</div>
							</div>
							<section class=" section-onsale-product-carousel" data-animation="fadeIn">

								<header>
									<h1 class="h1 mobh1">Deals of the week </h1>
									<span class="headright mobrighth1">عروض الأسبوع</span>
								</header>
								<div class="owl-nav">
									<a href="#onsale-products-carousel-prev" data-target="#onsale-products-carousel-57176fb23fad9" class="slider-prev"><i class="fa fa-angle-left"></i>Previous Deal</a>
									<a href="#onsale-products-carousel-next" data-target="#onsale-products-carousel-57176fb23fad9" class="slider-next">Next Deal<i class="fa fa-angle-right"></i></a>
								</div>
								<div id="onsale-products-carousel-57176fb23fad9">
									<div class="onsale-product-carousel owl-carousel dealstabborder">
									 <?php if($dealweek){
										
		$i=1;
		foreach($dealweek as $val){
			
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$main_image = $this->yalalink_model->getMainImage($val->id);
		 $sub_image = $this->yalalink_model->getImages($val->id);
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		 $timestamp = $val->updated_date;
		
		  
$start  = date_create($timestamp);
$end 	= date_create(); // Current time and date
$diff  	= date_diff( $start, $end );
//print_r($diff);
$differnce = $diff->d;



		if($main_image) {
		 $img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
		
		
		 

		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($val->main_category == 'Real Estate'){ $link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  
		  if($i=1){?>
		  
										<div class="onsale-product mobitopdeal">
											<div class="onsale-product-thumbnails mobifullimg">

												<div class="images dealmobview"><a href="<?php echo @$link; ?>" itemprop="image" class="woocommerce-main-image" title=""><img width="600" height="600" src="<?php echo @$image; ?>" class="wp-post-image" alt="GamePad" title="GamePad"/></a>
												 <!--<div class="thumbnails columns-3">
											   <?php /*if($sub_image) {
													$j = 0; foreach($sub_image as $value){
														if($j == 3)
														{
															break;
														}
		 if($value->image){
			 $img ='uploads/images/thumb/'.$value->image;
		   }else{
			 $img = 'assets/img/no_image_available.jpg';
		   } */
		 ?>
		   <a href="<?php //echo @$link; ?>" class="first" title=""><img width="180" height="180" src="<?php //echo @$img; ?>" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" /></a>                                        
			  <?php// $j++; }} ?>                                     
													
													  
													</div>-->
												</div>
												
													  <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal mobviewdealnon" style="display:none">
																	 <div class="card cardmobhome" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																   <div class="small">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$link; ?>"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>  
							</div>
					<a href="<?php echo @$link; ?>">
						<img src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" class="img-responsive homemobweakdeal homepcdealtop" alt="">
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
					
								<a href="<?php echo @$link; ?>">  <h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30); if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
							
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></a></h5>
						<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,45); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white;">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
												
											   
											</div>
											<div class="onsale-product-content mobviewonsale-product">

												<a href="<?php echo @$link; ?>"><h3><?php echo substr($val->title_en,0,70).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
												<span class="price"><span class="electro-price"><ins><span class="amount"><?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></span></ins> </span></span>
											   <!--<div class="days"><span style="color: white;padding: 1px 18px 1px 14px;font-weight: 700;font-size: 42px;background-image: linear-gradient(#ffffff, #662d91,white);"><?php echo "7 "- $differnce ?></span> Days Left</div>-->
											</div>
										</div>
										
										
										
										
									   
										<?php
		  }$i++;}}
		  else
		   {
			   echo "No deals This week";
		   }
		  ?>
									</div>
								</div>
							</section>
							
							<section class="products-carousel-tabs section-product-cards-carousel animate-in-view fadeIn animated mobilescalemost mostborder" data-animation="fadeIn">

								<header class="mostheader">

									<h2 class="h1 mobh1">Most Viewed</h2>
									<span class="headrightview mobiletitlehomemob" style="display:none">الأكثر مشاهدة </span>

								   <ul class="nav nav-inline mobilemostview">
									<li class="nav-item"><a class="nav-link mostview active" href="#tab-products7" data-toggle="tab">Top 20</a></li>
										 
									   <!-- <li class="nav-item active"><span class="nav-link">Top 4</span></li>-->
										 <li class="nav-item mobilemostli"><a class="nav-link mostview" href="#tab-realestate" data-toggle="tab">Realestate</a></li>
											<li class="nav-item mobilemostli"><a class="nav-link mostview" href="#tab-phones" data-toggle="tab">Phones</a></li>
											   <li class="nav-item mobilemostli"><a class="nav-link mostview" href="#tab-auto" data-toggle="tab">Auto</a></li>

									   <!-- <li class="nav-item"><a class="nav-link" href="#tabbbbb">Real Estate</a></li>

										<li class="nav-item"><a class="nav-link" href="<?=Core::getBaseUrl()?>phones">Phones</a></li>

										<li class="nav-item"><a class="nav-link" href="<?=Core::getBaseUrl()?>auto">Auto</a></li>-->
										<span class="headrightview mobiletitlehome">الأكثر مشاهدة </span>
									</ul>
								</header>
								
								  <div class="tab-content mosttabmob">
									<div class="tab-pane active" id="tab-products7" role="tabpanel">
										
									   <div id="home-v1-product-cards-careousel">
									<div class="woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel">

										<ul class="products columns-2 mobproductview">
										<?php $i=1; if($mostviewers){ 
									
										foreach($mostviewers as $val){
											
											if($i == 5){break;}
												
											//echo $i;
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		$main_image = $this->yalalink_model->getMainImage($val->id);
		if($main_image) {
		$img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
		$timestamp = $val->added_date;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($val->main_category == 'Real Estate'){ $s_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $s_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $s_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $s_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $s_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $s_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $s_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $s_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $s_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $s_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  //echo $i;
			  //echo sizeof($i);
			 
		 
								?>        <?php
											if($i == 3)
											{
												?>
											<li class="product product-card first">
											<?php
											}elseif($i == 4){
											?>
											 <li class="product product-card last">
											 <?php
											}else{?> <li class="product product-card mobproductmost"><?php } ?>
												

												<div class="product-outer mostviewcardtop">
													<div class="media product-inner mostboxhov">

														   <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhomemost" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																	   <div class="small">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="`+ url +`"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>  
							</div>
					<a href="<?php echo @$link; ?>">
					 <img class="card-img-top gridmobviewimg dealimghome" id="" data-groups="post-results" src="<?php echo @$image; ?>" alt="">
						<!--<img src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" class="img-responsive homemobdealtopmost homepcdealtop" alt="">-->
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
					
								<a href="<?php echo @$link; ?>">  <h3 class="titmobviewmost" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
							
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></a></h5>
						<p class="card-text"><a href="`+ res.url +`"><?php echo substr(strip_tags($val->description),0,120); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
												   </div><!-- /.product-inner -->
												</div><!-- /.product-outer -->
												</li><!-- /.products -->
 <?php
 $i++;
		  }
		  }?>
											
										   
										</ul>
										<!--<ul class="products columns-2">
										 <li class="product product-card">
												

										   

												<div class="product-outer">
													<div class="media product-inner">

														<a class="media-left" href="single-product.html" title="Pendrive USB 3.0 Flash 64 GB">
															<img class="media-object wp-post-image img-responsive" src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" alt="">

														</a>

														<div class="media-body">
															<span class="loop-product-categories">
																<a href="product-category.html" rel="tag"></a>
															</span>

															<a href="single-product.html">
																<h3><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3>
															</a>

															<div class="price-add-to-cart">
																<span class="price">
																	<span class="electro-price">
																		<ins><span class="amount"><?php if($val->price!=0 || $val->price!=''){ ?>
					<span>AED<?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></span></ins>
																	   
																		<span class="amount"> </span>
																	</span>
																</span>

															   <!-- <a href="cart.html" class="button add_to_cart_button">Add to cart</a>-->
														   <!-- </div><!-- /.price-add-to-cart -->

															<!--<div class="hover-area">
																<div class="action-buttons">

																	<a href="#" class="add_to_wishlist">
																		Wishlist</a>

																 <!--   <a href="#" class="add-to-compare-link">Compare</a>-->
																<!--</div>
															</div>

														</div>
													</div><!-- /.product-inner -->
											   <!-- </div><!-- /.product-outer -->

											<!--</li><!-- /.products -->
											 
 
										   
										<!--</ul>-->
									</div>
								</div><!-- #home-v1-product-cards-careousel -->
									   
										</div>
									   
									   
									<div class="tab-pane" id="tab-realestate" role="tabpanel">
										 <div id="home-v1-product-cards-careousel">
									<div class="woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel">

										<ul class="products columns-2">
										<?php $i=1; if($mostviewersreal){ 
									
										foreach($mostviewersreal as $val){
											
											if($i == 5){break;}
												
											//echo $i;
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		$main_image = $this->yalalink_model->getMainImage($val->id);
		if($main_image) {
		$img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
		$timestamp = $val->added_date;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($val->main_category == 'Real Estate'){ $s_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $s_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $s_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $s_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $s_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $s_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $s_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $s_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $s_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $s_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  //echo $i;
			  //echo sizeof($i);
			 
		 
								?>        <?php
											if($i == 3)
											{
												?>
											<li class="product product-card first">
											<?php
											}elseif($i == 4){
											?>
											 <li class="product product-card last">
											 <?php
											}else{?> <li class="product product-card mobproductmost"><?php } ?>
												

												<div class="product-outer">
													<div class="media product-inner">

														  <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhomemost" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																	   <div class="small">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="`+ url +`"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>  
							</div>
					<a href="<?php echo @$link; ?>">
						 <img class="card-img-top gridmobviewimg dealimghome" id="" data-groups="post-results" src="<?php echo @$image; ?>" alt="">
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
					
								<a href="`+ res.url +`">  <h3 class="titmobviewmost" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
							
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></a></h5>
						<p class="card-text"><a href="`+ res.url +`"><?php echo substr(strip_tags($val->description),0,120); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
												</div><!-- /.product-outer -->
												</li><!-- /.products -->
 <?php
 $i++;
		  }
		  }?>
											
										   
										</ul>
										<!--<ul class="products columns-2">
										 <li class="product product-card">
												

										   

												<div class="product-outer">
													<div class="media product-inner">

														<a class="media-left" href="single-product.html" title="Pendrive USB 3.0 Flash 64 GB">
															<img class="media-object wp-post-image img-responsive" src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" alt="">

														</a>

														<div class="media-body">
															<span class="loop-product-categories">
																<a href="product-category.html" rel="tag"></a>
															</span>

															<a href="single-product.html">
																<h3><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3>
															</a>

															<div class="price-add-to-cart">
																<span class="price">
																	<span class="electro-price">
																		<ins><span class="amount"><?php if($val->price!=0 || $val->price!=''){ ?>
					<span>AED<?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></span></ins>
																	   
																		<span class="amount"> </span>
																	</span>
																</span>

															   <!-- <a href="cart.html" class="button add_to_cart_button">Add to cart</a>-->
														   <!-- </div><!-- /.price-add-to-cart -->

															<!--<div class="hover-area">
																<div class="action-buttons">

																	<a href="#" class="add_to_wishlist">
																		Wishlist</a>

																 <!--   <a href="#" class="add-to-compare-link">Compare</a>-->
																<!--</div>
															</div>

														</div>
													</div><!-- /.product-inner -->
											   <!-- </div><!-- /.product-outer -->

											<!--</li><!-- /.products -->
											 
 
										   
										<!--</ul>-->
									</div>
								</div><!-- #home-v1-product-cards-careousel -->
										</div>
										
										 <div class="tab-pane" id="tab-auto" role="tabpanel">
										 <div id="home-v1-product-cards-careousel">
									<div class="woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel">

										<ul class="products columns-2">
										<?php $i=1; if($mostviewersauto){ 
									
										foreach($mostviewersauto as $val){
											
											if($i == 5){break;}
												
											//echo $i;
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		$main_image = $this->yalalink_model->getMainImage($val->id);
		if($main_image) {
		$img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
		$timestamp = $val->added_date;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($val->main_category == 'Real Estate'){ $s_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $s_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $s_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $s_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $s_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $s_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $s_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $s_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $s_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $s_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  //echo $i;
			  //echo sizeof($i);
			 
		 
								?>        <?php
											if($i == 3)
											{
												?>
											<li class="product product-card first">
											<?php
											}elseif($i == 4){
											?>
											 <li class="product product-card last">
											 <?php
											}else{?> <li class="product product-card mobproductmost"><?php } ?>
												

												<div class="product-outer">
													<div class="media product-inner">

														<div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhomemost" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																	   <div class="small">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="`+ url +`"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>  
							</div>
					<a href="<?php echo @$link; ?>">
						 <img class="card-img-top gridmobviewimg dealimghome" id="" data-groups="post-results" src="<?php echo @$image; ?>" alt="">
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
					
								<a href="<?php echo @$link; ?>">  <h3 class="titmobviewmost" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
							
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></a></h5>
						<p class="card-text"><a href="`+ res.url +`"><?php echo substr(strip_tags($val->description),0,120); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
												</div><!-- /.product-outer -->
												</li><!-- /.products -->
 <?php
 $i++;
		  }
		  }?>
											
										   
										</ul>
										<!--<ul class="products columns-2">
										 <li class="product product-card">
												

										   

												<div class="product-outer">
													<div class="media product-inner">

														<a class="media-left" href="single-product.html" title="Pendrive USB 3.0 Flash 64 GB">
															<img class="media-object wp-post-image img-responsive" src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" alt="">

														</a>

														<div class="media-body">
															<span class="loop-product-categories">
																<a href="product-category.html" rel="tag"></a>
															</span>

															<a href="single-product.html">
																<h3><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3>
															</a>

															<div class="price-add-to-cart">
																<span class="price">
																	<span class="electro-price">
																		<ins><span class="amount"><?php if($val->price!=0 || $val->price!=''){ ?>
					<span>AED<?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></span></ins>
																	   
																		<span class="amount"> </span>
																	</span>
																</span>

															   <!-- <a href="cart.html" class="button add_to_cart_button">Add to cart</a>-->
														   <!-- </div><!-- /.price-add-to-cart -->

															<!--<div class="hover-area">
																<div class="action-buttons">

																	<a href="#" class="add_to_wishlist">
																		Wishlist</a>

																 <!--   <a href="#" class="add-to-compare-link">Compare</a>-->
																<!--</div>
															</div>

														</div>
													</div><!-- /.product-inner -->
											   <!-- </div><!-- /.product-outer -->

											<!--</li><!-- /.products -->
											 
 
										   
										<!--</ul>-->
									</div>
								</div><!-- #home-v1-product-cards-careousel -->
										</div>
										 <div class="tab-pane" id="tab-phones" role="tabpanel">
										 <div id="home-v1-product-cards-careousel">
									<div class="woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel">

										<ul class="products columns-2">
										<?php $i=1; if($mostviewersphones){ 
									
										foreach($mostviewersphones as $val){
											
											if($i == 5){break;}
												
											//echo $i;
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		$main_image = $this->yalalink_model->getMainImage($val->id);
		if($main_image) {
		$img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
		$timestamp = $val->added_date;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($val->main_category == 'Real Estate'){ $s_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $s_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $s_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $s_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $s_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $s_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $s_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $s_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $s_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $s_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  //echo $i;
			  //echo sizeof($i);
			 
		 
								?>        <?php
											if($i == 3)
											{
												?>
											<li class="product product-card first">
											<?php
											}elseif($i == 4){
											?>
											 <li class="product product-card last">
											 <?php
											}else{?> <li class="product product-card mobproductmost"><?php } ?>
												

												<div class="product-outer">
													<div class="media product-inner">

														  <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhomemost" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																	   <div class="small">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="`+ url +`"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>  
							</div>
					<a href="<?php echo @$link; ?>">
						 <img class="card-img-top gridmobviewimg dealimghome" id="" data-groups="post-results" src="<?php echo @$image; ?>" alt="">
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
					
								<a href="<?php echo @$link; ?>">  <h3 class="titmobviewmost" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
							
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></a></h5>
						<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,120); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
												</div><!-- /.product-outer -->
												</li><!-- /.products -->
 <?php
 $i++;
		  }
		  }?>
											
										   
										</ul>
										<!--<ul class="products columns-2">
										 <li class="product product-card">
												

										   

												<div class="product-outer">
													<div class="media product-inner">

														<a class="media-left" href="single-product.html" title="Pendrive USB 3.0 Flash 64 GB">
															<img class="media-object wp-post-image img-responsive" src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" alt="">

														</a>

														<div class="media-body">
															<span class="loop-product-categories">
																<a href="product-category.html" rel="tag"></a>
															</span>

															<a href="single-product.html">
																<h3><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3>
															</a>

															<div class="price-add-to-cart">
																<span class="price">
																	<span class="electro-price">
																		<ins><span class="amount"><?php if($val->price!=0 || $val->price!=''){ ?>
					<span>AED<?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></span></ins>
																	   
																		<span class="amount"> </span>
																	</span>
																</span>

															   <!-- <a href="cart.html" class="button add_to_cart_button">Add to cart</a>-->
														   <!-- </div><!-- /.price-add-to-cart -->

															<!--<div class="hover-area">
																<div class="action-buttons">

																	<a href="#" class="add_to_wishlist">
																		Wishlist</a>

																 <!--   <a href="#" class="add-to-compare-link">Compare</a>-->
																<!--</div>
															</div>

														</div>
													</div><!-- /.product-inner -->
											   <!-- </div><!-- /.product-outer -->

											<!--</li><!-- /.products -->
											 
 
										   
										<!--</ul>-->
									</div>
								</div><!-- #home-v1-product-cards-careousel -->
										</div>
										</div>
										
										
								

							</section>
							
							<!--<section class="section-product-cards-carousel" data-animation="fadeIn" style="margin-top: -39px;">
							<div class="col-md-12 col-xs-12">
							<div class="col-md-6">
							<div class="home-v2-banner-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
								<div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 70px">
									<a href="#">
										<img src="assets/images/banner/YALAFUN2.jpg" alt="Banner">
									</a>
								</div>
							</div>
							</div>
							<div class="col-md-6">
							<div class="home-v2-banner-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
								<div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 70px">
									<a href="#">
										<img src="assets/images/banner/YALAFUN2.jpg" alt="Banner">
									</a>
								</div>
							</div>
							</div>
							</div>
							</section>-->
							<section class="home-v2-categories-products-carousel section-products-carousel animate-in-view fadeIn animated animation" data-animation="fadeIn">
							<div class="bordersection">


								<header>
						  <h2 class="h1 mobh1">New Posts</h2>
						   <span class="headrightview mobilenewpost" style="display:none">مشاركات جديدة</span>
									<div class="owl-nav newpostowlnav">
									 
										<a href="#products-carousel-prev" data-target="#products-carousel-57176fb2c4230" class="slider-prev"><i class="fa fa-angle-left"></i></a>
										<a href="#products-carousel-next" data-target="#products-carousel-57176fb2c4230" class="slider-next"><i class="fa fa-angle-right"></i></a>
										 <span class="headrightview homenewpost">مشاركات جديدة</span>
									</div>

								</header>


								<div id="products-carousel-57176fb2c4230">
									<div class="woocommerce">
										<div class="products owl-carousel home-v2-categories-products products-carousel columns-6">
 <?php $i=1; if($latestpost_new){ 
 foreach($latestpost_new as $val){
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$main_image = $this->yalalink_model->getMainImage($val->id);
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		if($main_image) {
		 $img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
 $timestamp = $val->added_date;
 

		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		
		if($val->main_category == 'Real Estate'){ $l_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $l_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $l_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $l_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $l_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $l_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $l_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $l_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $l_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $l_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
			
		  if($i==1){?>

											<div class="">
												<div class="product-outer mobifulwidnew">
													<div class="product-inner">
													   
														  <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhome cardpchomemost" style="border: 1px solid #2d2e2e47 !important;">
																   <div class="small">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="`+ url +`"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
						</div>
					<a href="<?php echo @$link; ?>">
						<img src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" class="img-responsive homemobdealtop homepcdealtop homenewpcview" alt="">
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
						<a href="<?php echo @$link; ?>">  <h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30); if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
					}?></h3></a>
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.number_format(@$val->price); ?></span><?php }?></a></h5>
						<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,100); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>-->
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>-->
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->

													   
													</div><!-- /.product-inner -->
												</div><!-- /.product-outer -->
											</div><!-- /.products -->
<?php
		  }}$i++;}
		  ?>


										   

											


										   

										   

										   

										   

										  
										</div>
									</div>
								</div>
								</div>
							</section>
							<!--<section style="margin-top: -39px;">
							<div class="row">
							<div class="col-md-12 col-sm-12 reg-box">
							
								<div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 70px">
									<a href="#">
										<img src="assets/images/banner/YALAFUN2.jpg" alt="Banner">
									</a>
								</div>
							
						   
							
							
								<div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 70px">
									<a href="#">
										<img src="assets/images/banner/YALAFUN2.jpg" alt="Banner">
									</a>
								</div>
						   
							
							
							</section>-->
							<section class="home-v2-categories-products-carousel section-products-carousel animate-in-view fadeIn animated animation" data-animation="fadeIn">


								<header>

									

								  

								</header>


								<div id="products-carousel-57176fb2c4230">
								   


											<?php if(!$userdata['userid']) { ?>
		<div class="full-wrap free-reg">
		  <div class="row">
			<!--<div class="col-md-3 col-sm-12"> <img src="assets/front_end/images/web-add-33.jpg" class="index-bottom-add"> </div>-->
			<div class="col-md-12 col-sm-12 reg-box">
			  <section class="box-typical hero-radius">
				<div class="head"> <span>Yalalink Membership</span> <span class="ar-txt ar-lang">عضوية  يلا لينك </span>
				  <div class="free-ico"></div>
				</div>
				<div class="full-wrap content">
				  <div class="col-md-8 col-sm-12 desc no-padding">
					<div class="point"> <i class="fa fa-check-square-o" aria-hidden="true"></i> Members Get Free Advertising </div>
					<div class="point"> <i class="fa fa-check-square-o" aria-hidden="true"></i> Get Special Discount From Participating Brands & stores </div>
				  </div>
				  <div class="col-md-4 col-sm-12 desc no-padding ar-txt ar-lang">
					<div class="point"> <i class="fa fa-check-square-o" aria-hidden="true"></i>إعلانات مجانية للأعضاء المسجلين</div>
					<div class="point"> <i class="fa fa-check-square-o" aria-hidden="true"></i>أحصل على خصومات خاصة من الشركات و المتاجر</div>
				  </div>
				  <div class="full-wrap pull-left"> <a href="register" class="hero-button btn-place-ad reg-button"> <span>Register / Sign Up</span> <i class="fa fa-user-plus bounce-ani" aria-hidden="true"></i> </a> </div>
				</div>
			  </section>
			</div>
		</div>
		</div>
		<?php } ?>
		<div class="viewcountryflag">
		<?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?></div>


					   
								</div>
							</section>
							
						</main><!-- #main -->
					</div><!-- #primary -->

					<div id="sidebar" class="sidebar" role="complementary" style="margin-top: 15px;">
						<aside class="widget widget_text mobbanner">
							<div class="textwidget">
								<a href="#">
									<img src="assets/images/banner/YALAFUN1.jpg" alt="Banner">
								</a>
							</div>
						</aside>
						<aside class="widget widget_products">
						<?php $i=0; if($latestpost){ 
 foreach($latestpost as $val){
	 
	 $country = $val->country;
	
	
	 if($country == 3) {
		  $img = "assets/front_end/images/saudi.jpg";
		$c_code = "Saudi";
		$cur_code = "SAR";
		$arabic = "يلا لينك السعودية";
	 }else if($country == 1){ 
	  $img = "assets/front_end/images/uae.jpg";
		$c_code = "UAE";
		$cur_code = "AED";
		$arabic = "يلا لينك الإمارات";
	 }
	 else if($country == 2){ 
	  $img = "assets/front_end/images/oman.jpg";
		$c_code = "Oman";
		$cur_code = "OMR";
		$arabic = "يلا لينك عمان";
	 }
	 else if($country == 4){ 
	 $img = "assets/front_end/images/kuwait.jpg";
		$c_code = "Kuwait";
		$cur_code = "KD";
		$arabic = "يلا لينك الكويت";
	 }
	 
	 
	 
 break;
	 
 }}
 ?>
		   
							<h3 class="widget-title"><?= $c_code ?> Yalalink<img src="<?php echo $img ?>" style="width: 57px;height: 40px;margin-top: -12px;margin-left: 10px;"><span style="margin-left: 10px;"><?php echo $arabic ?></span></h3>
						  
							<ul class="product_list_widget" style="border: 1px solid #e5e3e2;">
							 <?php $i=1; if($latestpost){ foreach($latestpost as $val){
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$main_image = $this->yalalink_model->getMainImage($val->id);
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		
		if($main_image) {
		 $img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
 $timestamp = $val->added_date;
 //if($country == 3) {$cur_code = "SAR"; }else if($country == 1){ $cur_code = "AED";}
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($val->main_category == 'Real Estate'){ $l_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $l_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $l_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $l_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $l_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $l_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $l_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $l_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $l_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $l_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  if($i==1){?>
										   <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhome cardpchomemost" style="border: 1px solid #2d2e2e47 !important;">
																   <div class="small">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="`+ url +`"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
						</div>
					<a href="<?php echo @$link; ?>">
						<img src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" class="img-responsive homemobdealtop homemobcountry homenewpcview" alt="">
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
						<a href="<?php echo @$link; ?>">  <h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30); if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
					}?></h3></a>
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?= $cur_code; ?><?php echo $currency.' '.number_format(@$value->price); ?></span><?php }?></span></ins></span>
						<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,100); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>-->
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>-->
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
							   <?php } } $i++; } ?> 
							</ul>
						</aside>
						<aside class="widget widget_products">
						<?php $i=0; if($latestpost1){ 
 foreach($latestpost1 as $value){
	 
	 $country = $value->country;
	
	  if($country == 3) {
		  $img = "assets/front_end/images/saudi.jpg";
		$c_code = "Saudi";
		$cur_code = "SAR";
		$arabic = "يلا لينك السعودية";
	 }else if($country == 1){ 
	  $img = "assets/front_end/images/uae.jpg";
		$c_code = "UAE";
		$cur_code = "AED";
		$arabic = "يلا لينك الإمارات";
	 }
	 else if($country == 2){ 
	  $img = "assets/front_end/images/oman.jpg";
		$c_code = "Oman";
		$cur_code = "OMR";
		$arabic = "يلا لينك عمان";
	 }
	 else if($country == 4){ 
	 $img = "assets/front_end/images/kuwait.jpg";
		$c_code = "Kuwait";
		$cur_code = "KD";
		$arabic = "يلا لينك الكويت";
	 }else{
		  $img = "assets/front_end/images/kuwait.jpg";
		$c_code = "Kuwait";
		$cur_code = "KD";
		$arabic = "يلا لينك الكويت";
	 }
	 
	 
	  
		 
	 
	 
 break;
	 
 }}
 ?>
		   
							<h3 class="widget-title"><?= $c_code ?> Yalalink<img src="<?php echo $img ?>" style="width: 57px;height: 40px;margin-top: -12px;margin-left: 10px;"><span style="margin-left: 10px;"><?php echo $arabic ?></span></h3>
							<ul class="product_list_widget" style="border: 1px solid #e5e3e2;">
							 <?php $i=1; if($latestpost1){ foreach($latestpost1 as $value){
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$value->id;
		$main_image = $this->yalalink_model->getMainImage($value->id);
		$user = $this->yalalink_model->getUserDetails($value->user_id);
		
		if($main_image) {
		 $img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
 $timestamp = $val->added_date;
 if($country == 3) {$cur_code = "SAR"; }else if($country == 1){ $cur_code = "AED";}
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($value->main_category == 'Real Estate'){ $l_link = 'real-estate/view/'.$latest; }elseif($value->main_category == 'Jobs'){ $l_link = 'jobs/view/'.$latest; }elseif($value->main_category == 'Auto'){ $l_link = 'auto/view/'.$latest; }elseif($value->main_category == 'Classifieds'){ $l_link = 'classifieds/view/'.$latest; }elseif($value->main_category == 'House Maids'){ $l_link = 'housemaids/view/'.$latest; }elseif($value->main_category == 'Phones'){ $l_link = 'phones/view/'.$latest; }elseif($value->main_category == 'Electronics'){ $l_link = 'electronics/view/'.$latest; }elseif($value->main_category == 'Computers'){ $l_link = 'computers/view/'.$latest; }elseif($value->main_category == 'Education'){ $l_link = 'education/view/'.$latest; }elseif($value->main_category == 'Services'){ $l_link = 'services/view/'.$latest; }elseif($value->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($value->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  if($i==1){?>
										   <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhome cardpchomemost" style="border: 1px solid #2d2e2e47 !important;">
																   <div class="small">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="`+ url +`"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
						</div>
					<a href="<?php echo @$link; ?>">
						<img src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" class="img-responsive homemobcountry homepcdealtop homenewpcview" alt="">
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
						<a href="<?php echo @$link; ?>">  <h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30); if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
					}?></h3></a>
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
				   <span><?= $cur_code; ?><?php echo $currency.' '.number_format(@$value->price); ?></span><?php }?></span></ins></span>
						<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,100); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>-->
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>-->
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
							   <?php } } $i++; } ?> 
							</ul>
						</aside>
						
						 <aside class="widget widget_products">
						<?php $i=0; if($latestpost2){ 
 foreach($latestpost2 as $value){
	 
	 $country = $value->country;
	
	  if($country == 3) {
		  $img = "assets/front_end/images/saudi.jpg";
		$c_code = "Saudi";
		$cur_code = "SAR";
		$arabic = "يلا لينك السعودية";
	 }else if($country == 1){ 
	  $img = "assets/front_end/images/uae.jpg";
		$c_code = "UAE";
		$cur_code = "AED";
		$arabic = "يلا لينك الإمارات";
	 }
	 else if($country == 2){ 
	  $img = "assets/front_end/images/oman.jpg";
		$c_code = "Oman";
		$cur_code = "OMR";
		$arabic = "يلا لينك عمان";
	 }
	 else if($country == 4){ 
	 $img = "assets/front_end/images/kuwait.jpg";
		$c_code = "Kuwait";
		$cur_code = "KD";
		$arabic = "يلا لينك الكويت";
	 }else{
		  $img = "assets/front_end/images/kuwait.jpg";
		$c_code = "Kuwait";
		$cur_code = "KD";
		$arabic = "يلا لينك الكويت";
	 }
		 
	 
	 
	  
		 
	 
	 
 break;
	 
 }}
 ?>
		   
							<h3 class="widget-title"><?= $c_code ?> Yalalink<img src="<?php echo $img ?>" style="width: 57px;height: 40px;margin-top: -12px;margin-left: 10px;"><span style="margin-left: 10px;"><?php echo $arabic ?></span></h3>
							<ul class="product_list_widget" style="border: 1px solid #e5e3e2;">
							 <?php $i=1; if($latestpost2){ foreach($latestpost2 as $value){
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$value->id;
		$main_image = $this->yalalink_model->getMainImage($value->id);
		$user = $this->yalalink_model->getUserDetails($value->user_id);
		
		if($main_image) {
		 $img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
 $timestamp = $val->added_date;
 if($country == 3) {$cur_code = "SAR"; }else if($country == 1){ $cur_code = "AED";}
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($value->main_category == 'Real Estate'){ $l_link = 'real-estate/view/'.$latest; }elseif($value->main_category == 'Jobs'){ $l_link = 'jobs/view/'.$latest; }elseif($value->main_category == 'Auto'){ $l_link = 'auto/view/'.$latest; }elseif($value->main_category == 'Classifieds'){ $l_link = 'classifieds/view/'.$latest; }elseif($value->main_category == 'House Maids'){ $l_link = 'housemaids/view/'.$latest; }elseif($value->main_category == 'Phones'){ $l_link = 'phones/view/'.$latest; }elseif($value->main_category == 'Electronics'){ $l_link = 'electronics/view/'.$latest; }elseif($value->main_category == 'Computers'){ $l_link = 'computers/view/'.$latest; }elseif($value->main_category == 'Education'){ $l_link = 'education/view/'.$latest; }elseif($value->main_category == 'Services'){ $l_link = 'services/view/'.$latest; }elseif($value->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($value->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  if($i==1){?>
									 <div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																	 <div class="card cardmobhome cardpchomemost" style="border: 1px solid #2d2e2e47 !important;">
																   <div class="small">
							<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="`+ url +`"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
						</div>
					<a href="<?php echo @$link; ?>">
						<img src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" class="img-responsive homemobcountry homepcdealtop homenewpcview" alt="">
						<!--<span class="countimg_grid"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;`+ res.imgCount +`</span>-->
						<!--<img class="img_verify_grid" src="uploads/view/verified1.png" alt="" width="50px">-->
					</a>
					<div class="card-body">
					<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
							  
						<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a> 
						<span class="count-like-4696" style="font-size: 15px;color: #000000b5;">0</span>
						<span style="margin-left: 46px;"><a href="`+ whatsappUrl +`" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
							<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px;"><a href="`+ twitterUrl +`" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
							<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="`+ target +`" data-toggle="tooltip" data-placement="top" title="Mail to`+res.email+`" class="btn-shadow icon-btn detail-btn btn-FF9800"></a></span>
							<span class="calllist" style="margin-left:14px;"><a href="tel:`+ res.phoneno +`"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
							<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
					</div>
					
						<a href="<?php echo @$link; ?>">  <h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30); if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
					}?></h3></a>
						<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
				   <span><?= $cur_code; ?><?php echo $currency.' '.number_format(@$value->price); ?></span><?php }?></span></ins></span>
						<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,100); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
					</div>
						<div class="bottom bottommobhome bottompchome ">
							<div class="rating gridfav"> 
								<a class="favorites favorites_4696" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a> 
								<a class="unfavorites unfavorites_4696 d-none" href="login" id="4696"><i class="fa fa-heart" aria-hidden="true"></i></a> 
							</div>
						<span class="count-like-4696 gridcnt" style="font-size: 15px;color: #000000b5;">0</span>
						<?php if($val->main_category == 'Real Estate')
						{?>
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
								
							  
								<!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
								<span class ="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
								<span class ="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="`+ res.url +`" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>-->
								<?php
							
						}else if($val->main_category == 'Auto')
						{?>
						
						<span class ="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
								<span class ="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
								
								<!--<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="`+ res.url +`" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
								<span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>-->
							   <!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
								<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->
						
												  <?php
						}
						?></div>
																	</div>
																	<!--</div>-->
																	
																	
																	<!-- /.price-add-to-cart -->
																		<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->
																   
																</div><!-- /.product-inner -->
							   <?php } } $i++; } ?> 
							</ul>
						</aside>
				   
						
						<!--<aside id="electro_features_block_widget-2" class="widget widget_electro_features_block_widget">
							<div class="features-list columns-1">
								<div class="feature">
									<div class="media">
										<div class="media-left media-middle feature-icon">
											<i class="ec ec-transport"></i>
										</div>
										<div class="media-body media-middle feature-text">
											<strong>Free Classified Ads</strong> Sign in & Upload
										</div>
									</div>
								</div>
								<div class="feature">
									<div class="media">
										<div class="media-left media-middle feature-icon">
											<i class="ec ec-customers"></i>
										</div>
										<div class="media-body media-middle feature-text">
											<strong>99% Positive</strong> Feedbacks
										</div>
									</div>
								</div>
								<div class="feature">
									<div class="media">
										<div class="media-left media-middle feature-icon">
											<i class="ec ec-returning"></i>
										</div>
										<div class="media-body media-middle feature-text">
											<strong>365 days</strong> for free return
										</div>
									</div>
								</div>
								<div class="feature">
									<div class="media">
										<div class="media-left media-middle feature-icon">
											<i class="ec ec-payment"></i>
										</div>
										<div class="media-body media-middle feature-text">
											<strong>New & Used Products</strong> By Individuals & Companies
										</div>
									</div>
								</div>
								<div class="feature">
									<div class="media">
										<div class="media-left media-middle feature-icon">
											<i class="ec ec-tag"></i>
										</div>
										<div class="media-body media-middle feature-text">
											<strong>Only Best</strong> Brands
										</div>
									</div>
								</div>
							</div>
						</aside>-->
						<!--<aside class="widget widget_electro_products_carousel_widget">
							<section class="section-products-carousel" >


								<header>

									<h1>Hot Deals</h1>

									<div class="owl-nav">
										<a href="#products-carousel-prev" data-target="#products-carousel-57176fb2dc4a8" class="slider-prev"><i class="fa fa-angle-left"></i></a>
										<a href="#products-carousel-next" data-target="#products-carousel-57176fb2dc4a8" class="slider-next"><i class="fa fa-angle-right"></i></a>
									</div>

								</header>


								<div id="products-carousel-57176fb2dc4a8">
									<div class="products owl-carousel  products-carousel-widget columns-1">
										 <?php if($hotdeals){
		$i=1;
		foreach($hotdeals as $val){
			
		$title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
		$title = str_replace('  ',' ',strtolower($title));
		$title = str_replace(' ','-',$title);
		$latest = $title.'-'.$val->id;
		$main_image = $this->yalalink_model->getMainImage($val->id);
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		if($main_image) {
		 $img = 'uploads/images/thumbnail/'.@$main_image->image;
		 $r_img = 'uploads/images/'.@$main_image->image;
		 if(file_exists(@$img)){ 
		 $image = $img; 
		 }elseif(file_exists(@$r_img)){ 
		 $image = $r_img; 
		 }else{
		 $image = 'assets/front_end/images/no_image_available.jpg'; 
		 }
		 if(file_exists(@$image)){
		   $image = $image;
		 }else{
		   $image = 'assets/front_end/images/no_image_available.jpg';
		 }
		}else{
		  $img = 'assets/front_end/images/no_image_available.jpg';
		  $image = 'assets/front_end/images/no_image_available.jpg';
		} 
		$timestamp = $val->added_date;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		if($val->main_category == 'Real Estate'){ $link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  
		  if($i=1){?>
										<div class="product-carousel-alt">
											<a href="<?php echo @$link; ?>">
												<div class="product-thumbnail"><img width="250" height="232" src="<?php echo @$image; ?>" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" /></div>
											</a>

											<span class="loop-product-categories"><a href="single-product.html" rel="tag"></a></span><a href="single-product.html"><h3><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
											<span class="price"><span class="electro-price"><span class="amount"><?php if($val->price!=0 || $val->price!=''){ ?>
					<span>AED<?php echo $currency.' '.number_format(@$val->price); ?></span><?php }?></span></span></span>
										</div>

										

								<?php
		  }}$i++;}?>

										
									</div>
								</div>
							</section>
						</aside>-->
						<aside class="widget electro_posts_carousel_widget">
							<!--<section class="section-posts-carousel">
								<header>

									<h3 class="widget-title">From the Blog</h3>
									<div class="owl-nav">
										<a href="#posts-carousel-prev" data-target="#posts-carousel-57176fb2e4a7f" class="slider-prev"><i class="fa fa-angle-left"></i></a>
										<a href="#posts-carousel-next" data-target="#posts-carousel-57176fb2e4a7f" class="slider-next"><i class="fa fa-angle-right"></i></a>
									</div>

								</header>

								<div id="posts-carousel-57176fb2e4a7f" class="blog-carousel-homev2">
									<div class="owl-carousel post-carousel blog-carousel-widget">
										<div class="post-item">
											<a class="post-thumbnail" href="blog-single.html">
												<img width="270" height="180" src="assets/images/blog/blog-1.jpg" class="wp-post-image" alt="1"/>
											</a>
												<div class="post-content">
													<span class="post-category"><a href="blog-single.html" rel="category tag">Design</a>, <a href="blog-single.html" rel="category tag">Technology</a></span> -
													<span class="post-date">March 4, 2016</span>
													<a class ="post-name" href="blog-single.html">Robot Wars &#8211; Post with Gallery</a>
													<span class="comments-link"><a href="blog-single.html#comments">Leave a comment</a></span>
												</div>
										</div>
										<div class="post-item">
											<a class="post-thumbnail" href="blog-single.html">
												<img width="270" height="138" src="assets/images/blog/blog-2.jpg" class="wp-post-image" alt="6" />
											</a>
											<div class="post-content">
												<span class="post-category"><a href="blog-single.html" rel="category tag">Design</a>, <a href="blog-single.html" rel="category tag">News</a>, <a href="blog-single.html" rel="category tag">Uncategorized</a></span> -
												<span class="post-date">March 3, 2016</span>
												<a class ="post-name" href="blog-single.html">Robot Wars &#8211; Now Closed &#8211; Post with Audio</a>
												<span class="comments-link"><a href="blog-single.html#comments">Leave a comment</a></span>
											</div>
										</div>
										<div class="post-item">
											<a class="post-thumbnail" href="blog-single.html">
												<img width="270" height="152" src="assets/images/blog/blog-3.jpg" class="attachment-electro_blog_carousel size-electro_blog_carousel wp-post-image" alt="video-format"/>
											</a>
											<div class="post-content">
												<span class="post-category"><a href="blog-single.html" rel="category tag">Videos</a></span> -
												<span class="post-date">March 3, 2016</span>
												<a class ="post-name" href="blog-single.html">Robot Wars &#8211; Now Closed &#8211; Post with Video</a>
												<span class="comments-link"><a href="blog-single.html#comments">Leave a comment</a></span>
											</div>
										</div>
										<div class="post-item">
											<a class="post-thumbnail" href="blog-single.html">
												<div class="electro-img-placeholder"><img src="http://placehold.it/270x180/DDD/DDD/" alt=""><i class="fa fa-paragraph"></i></div>
											</a>
											<div class="post-content">
												<span class="post-category"><a href="blog-single.html" rel="category tag">Events</a>, <a href="blog-single.html" rel="category tag">News</a></span> -
												<span class="post-date">March 2, 2016</span>
												<a class ="post-name" href="blog-single.html">Announcement &#8211; Post without Image</a>
												<span class="comments-link"><a href="blog-single.html#comments">Leave a comment</a></span>
											</div>
										</div>
									</div>
								</div>
							</section>-->
						</aside>
						<aside class="widget widget_text">
							<div class="textwidget">
								<a href="#">
									<img src="assets/images/banner/YALAFUN1.jpg" alt="Banner">
								</a>
							</div>
						</aside>
						<aside class="widget widget_text mobileviewflag" style="display:none;">
						<?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
						</aside>
						
						
					</div>

				</div><!-- .container -->
			</div><!-- #content -->

<!--<section class="brands-carousel">
				<h2 class="sr-only">Brands Carousel</h2>
				<div class="container">
					<div id="owl-brands" class="owl-brands owl-carousel unicase-owl-carousel owl-outer-nav">

						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>Acer</h4>
										</div>
									</figcaption>

									 <img src="assets/images/blank.gif" data-echo="assets/images/brands/1.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>Apple</h4>
										</div>
									</figcaption>

									 <img src="assets/images/blank.gif" data-echo="assets/images/brands/2.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>Asus</h4>
										</div>
									</figcaption>

									 <img src="assets/images/blank.gif" data-echo="assets/images/brands/3.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>Dell</h4>
										</div>
									</figcaption>

									<img src="assets/images/blank.gif" data-echo="assets/images/brands/4.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>Gionee</h4>
										</div>
									</figcaption>

									<img src="assets/images/blank.gif" data-echo="assets/images/brands/5.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>HP</h4>
										</div>
									</figcaption>

									<img src="assets/images/blank.gif" data-echo="assets/images/brands/6.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>HTC</h4>
										</div>
									</figcaption>

									<img src="assets/images/blank.gif" data-echo="assets/images/brands/3.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>IBM</h4>
										</div>
									</figcaption>

									<img src="assets/images/blank.gif" data-echo="assets/images/brands/5.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>Lenova</h4>
										</div>
									</figcaption>

									<img src="assets/images/blank.gif" data-echo="assets/images/brands/2.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>LG</h4>
										</div>
									</figcaption>

									<img src="assets/images/blank.gif" data-echo="assets/images/brands/1.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>Micromax</h4>
										</div>
									</figcaption>

									<img src="assets/images/blank.gif" data-echo="assets/images/brands/6.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


						<div class="item">

							<a href="#">

								<figure>
									<figcaption class="text-overlay">
										<div class="info">
											<h4>Microsoft</h4>
										</div>
									</figcaption>

									<img src="assets/images/blank.gif" data-echo="assets/images/brands/4.png" class="img-responsive" alt="">

								</figure>
							</a>
						</div>


					</div>

				</div>
			</section>-->
			 <!-- <footer id="colophon" class="site-footer">
				<div class="footer-widgets">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-xs-12">
								<aside class="widget clearfix">
									<div class="body">
										<h4 class="widget-title">Special Deals</h4>
										
											
												<?php //$this->load->view('front_end/include/special_deals_homefooter'); ?>
											
										</ul>
									</div>
								</aside>
							</div>
							<div class="col-lg-6 col-md-6 col-xs-12">
								<aside class="widget clearfix">
									<div class="body"><h4 class="widget-title">Hot Deals</h4>
										
											<?php// $this->load->view('front_end/include/hot_deals_homefooter'); ?>
										
									</div>
								</aside>
							</div>
							
						</div>
					</div>
				</div>

				<div class="footer-newsletter">
					<div class="container">
						
					</div>
				</div>

				
					
				
			</footer>-->
<?php $this->load->view('front_end/include/footer'); ?>