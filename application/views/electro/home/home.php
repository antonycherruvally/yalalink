<?php $this->load->view('blocks/header'); 
$country_code = $this->session->userdata('country_code');
// $this->output->enable_profiler(TRUE);
?>
	<div id="content" class="site-content" tabindex="-1">
		<ul class="social_icons" id="fixed-social">
			<li><a href="" target="_blank" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:white;"></i> </a></li>
			<li><a href="http://facebook.com/yallalink" target="_blank" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:white;"></i> </a></li>
			<li><a href="http://twitter.com/yalalink" target="_blank" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:white;"></i> </a></li>
			<li><a href="http://instagram.com/yallalink" target="_blank" data-placement="bottom" title="Instagram" data-original-title="Instagram"><i class="fab fa-instagram" aria-hidden="true" style="color:white;"></i> </a></li>
		</ul>
<?php
		$images = array('caronic.mp4', 'Kandoora.mp4');
     $random_image = array_rand($images);
     $video = array('grassitup furniture.mp4','Comp 2.mp4','Cap.mp4','Comp 4.mp4','caracc.mp4');
     $random_video = array_rand($video);
     ?>
		<div class="loozaabanner"><a href="https://loozaa.com" target="_blank"><video width="380" height="400" autoplay muted loop>
  <source src="assets/images/<?php echo $images[$random_image];?>" type="video/mp4">
  <!-- <source src="movie.ogg" type="video/ogg"> -->
  
</video></a></div>
		<!-- <div class="lozzabansecond"><a href="https://loozaa.com"><img src="assets/images/carnoic.jpg"></a></div> -->
				<div class="lozzabansecond"><a href="https://loozaa.com" target="_blank" ><video width="380" height="400" autoplay muted loop>
  <source src="assets/images/<?php echo $video[$random_video];?>" type="video/mp4">
  <!-- <source src="movie.ogg" type="video/ogg"> -->
  
</video></a></div>
		<div class="container">

			<div id="primary" class="content-area">
				<main id="main" class="site-main">

					
						<!-- <?php $this->load->view('blocks/body/categorymenu'); ?> -->
                             <!-- <div class="ad col-xs-12 col-sm-12 mobileflash" style="display: none;">

                             	<a href="https://loozaa.com/m" target="_blank">
                             	<img src="https://loozaa.com/wp-content/uploads/2019/01/flashsale-new.jpg"></a>
						
						
					</div> -->
					<div class="home-v2-ads-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">

                           <div class="container" id="just4you" style="display: none;">
	<?php $this->load->view('blocks/slider/newposts'); ?>
	
</div>
						<div class="ads-block row">
							<div class="ad col-xs-12 col-md-12 col-sm-12">
						<div class="adsmobile">		  
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:inline-block;width:728px;height:90px; margin-left: 61px;"
		data-ad-client="ca-pub-8267866280490368"
		data-ad-slot="4614962273"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>



								 <div class="media mediamobgoogle" style="display: none;">
									 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
       <ins class="adsbygoogle"
        style="display:inline-block;width:468px;height:280px"
        data-ad-client="ca-pub-8267866280490368"
        data-ad-slot="4614962273"></ins> 
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <!-- <a href="https://loozaa.com">
			<img src="https://loozaa.com/wp-content/uploads/2018/12/2-14.jpg">
		</a> -->
								</div> 
							</div>
							<!-- <div class="ad col-xs-12 col-md-6 col-sm-12 mobpcview">
								<div class="media mediamob">
									
								</div>
							</div> -->
						</div>
					</div>

<?php $this->load->view('blocks/slider/auto'); ?>
<style type="text/css">
div.polaroid {
  background-color: white;
  /*box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  /*margin-left: -11px;*/
 box-shadow: 4px 9px 13px rgba(0, 0, 0, 0.2);
  margin-bottom: 15px;
  width: 100%;
}

div#just4you {
  text-align: center;
}

#just4you p{
	margin-bottom: 0px;
	font-size: 11px;
}

.polaroid img {
    height: 120px;
    object-fit: contain;
}

@media only screen and (max-width: 742px) {
	div.polaroid {
		/*width: 160px;*/
	}
}
</style>


<section class="products-carousel-tabs animate-in-view fadeIn animated prodCats specialdesk" data-animation="fadeIn">
                    <div class="bordersection">
                    <div class="mask">
						<h2 class="sr-only">Post Carousel Tabs</h2>
						<ul class="nav nav-inline bordernomob bgtopmob">
							<li class="nav-item mob-nav">
								<a class="nav-link navmob-font active" href="#tab-products-1" data-toggle="tab">Hot Deals12<span class="" style="margin-left:10px"> عروض مميزة‎</a>
							</li>
							<li class="nav-item mob-nav">
								<a class="nav-link navmob-font" href="#tab-products-2" data-toggle="tab">Latest Post &nbsp;&nbsp; أحدث الإعلانات</a>
							</li>
							<li class="nav-item mob-nav">
								<a class="nav-link navmob-font" href="#tab-products-3" data-toggle="tab">Special Offers عروض خاصة</a>
							</li>
						</ul>
						<div class="tab-content mobtabcontent">
							<div class="tab-pane active" id="tab-products-1" role="tabpanel">
								<section class="section-products-carousel">
									<div class="home-v2-owl-carousel-tabs">
										<div class="woocommerce columns-3 mobidealsnopadd">

											<div class="products owl-carousel home-v2-carousel-tabs products-carousel columns-3" id="products">
												
												<?php if($hotdeals){
													
													
		$i=1;
		foreach($hotdeals as $val){
		$val = (object)$val;
		$title = $val->title_en;
		$link = $val->url;
		
		$image = $val->img;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		
		if($val->email)
		{
			$target = "#sendMail";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
			
		}else{
			$target = " ";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
		}
		
		
		$timestamp = $val->dateAdded;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		

		  if($i==1){
			  $whatsappUrl = "whatsapp://send?text=".Core::getBaseUrl().$link;
				$twitterUrl = "twitter://post?message=" .Core::getBaseUrl().$link
			  ?>
          

													<div class="product first">
														<div class="product-outer" style="height: 359px;">
															<div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																<div class="card cardmobhome" style="background: #dadad261!important;">
																	<div class="small dealheadhome">
																		<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$link; ?>"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
																	</div>
																	<img class="card-img-top gridmobviewimg dealimghome instarun" id="<?= $val->id ?>" data-groups="products" src="<?php echo @$image; ?>" alt="">
																	<span class="instaheart" id="insta-<?= $val->id ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
																	<div class="card-body">
																		<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a>
																			<span class="count-like-<?= $val->id ?>" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																			<span style="margin-left: 46px;"><a href="<?php echo $whatsappUrl;?> " data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="<?php echo $twitterUrl;?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="<?php echo $target;?>" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo $val->email;?>" class="btn-shadow icon-btn detail-btn btn-FF9800"><?php echo $emailpic; ?></a></span>
																			<span class="calllist" style="margin-left:14px;"><a href="tel:<?php echo $val->mobile; ?>"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
																			<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
																		</div>

																		<a href="<?php echo @$link; ?>">
																			<h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30); if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
					}?></h3></a>

																		<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.$val->price; ?></span><?php }?></a></h5>
																		<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,150).'...'; ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white">details التفاصيل</a></span>
																	</div>
																	<div class="bottom bottommobhome bottompchome ">
																		<div class="rating gridfav">
																			<a class="favorites favorites_<?= $val->id ?>" href="login" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
																		</div>
																		<span class="count-like-<?= $val->id ?> gridcnt" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																		<?php if($val->main_category == 'Real Estate')
						{?>
																			<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
																			<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>

																			<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="<?php echo @$link; ?>" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
																			<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="<?php echo @$link; ?>" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
																			<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="<?php echo @$link; ?>" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
																			<?php

						}else if($val->main_category == 'Auto')
						{?>

																				<span class="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
																				<span class="bathroom gridbath" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;"><a href="<?php echo @$link; ?>" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>

																				<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="<?php echo @$link; ?>" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
																				<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
																				<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
																				<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->

																				<?php
						}
						?>
                        <span><div style="color:#4fc3c5;">1</div></span>
																	</div>
																</div>
																

															</div>
															
														</div>
														
													</div>
													
													<?php }}$i++;  } ?>

											</div>
										</div>
									</div>
								</section>
							</div>
							<!-- /.tab-pane -->

							<div class="tab-pane" id="tab-products-2" role="tabpanel">
								<section class="section-products-carousel">
									<div class="home-v2-owl-carousel-tabs">
										<div class="woocommerce columns-3">

											<div class="products owl-carousel home-v2-carousel-tabs products-carousel columns-3" id="products" >
<?php $i=1; if($latestpost_new){ 
	foreach($latestpost_new as $val){
		$title = $val->title_en;
		$l_link = $val->url;
		$image = $val->img;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		if($val->email)
		{
			$target = "#sendMail";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
			
		}else{
			$target = " ";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
		}
$timestamp = $val->dateAdded;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		
		  if($i==1){
			   $whatsappUrl = "whatsapp://send?text=".Core::getBaseUrl().$link;
				$twitterUrl = "twitter://post?message=" .Core::getBaseUrl().$link
			  ?>
													<div class="product first">
														<div class="product-outer" style="height: 359px;">
															<!--<div class="product-inner">-->
															<div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																<div class="card cardmobhome" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																	<div class="small dealheadhome">
																		<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$l_link; ?>"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
																	</div>
						 										<img class="card-img-top gridmobviewimg dealimghome instarun" id="<?= $val->id ?>" data-groups="products" src="<?php echo @$image; ?>" alt="">
																	<span class="instaheart" id="insta-<?= $val->id ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
																	<div class="card-body">
																		<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>;"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></span>
																			<span class="count-like-<?= $val->id ?>" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																			<span style="margin-left: 46px;"><a href="<?php echo $whatsappUrl;?> " data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="<?php echo $twitterUrl;?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="<?php echo $target;?>" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo $val->email;?>" class="btn-shadow icon-btn detail-btn btn-FF9800"><?php echo $emailpic; ?></a></span>
																			<span class="calllist" style="margin-left:14px;"><a href="tel:<?php echo $val->mobile; ?>"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
																			<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
																		</div>

																		<a href="<?php echo @$l_link; ?>">
																			<h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>

																		<h5 class="card-title2"><a href="<?php echo @$l_link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.$val->price; ?></span><?php }?></a></h5>
																		<p class="card-text"><a href="<?php echo @$l_link; ?>"><?php echo substr(strip_tags($val->description),0,45); ?></a></p><span class="rd_more"><a href="<?php echo @$l_link; ?>" style="color:white">details التفاصيل</a></span>
																	</div>
																	<div class="bottom bottommobhome bottompchome ">
																		<div class="rating gridfav">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
																		</div>
																		<span class="count-like-<?= $val->id ?> gridcnt" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																		<?php if($val->main_category == 'Real Estate')
						{?>
																			<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
																			<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>

																			<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
																			<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
																			<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
																			<?php

						}else if($val->main_category == 'Auto')
						{?>

																				<span class="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
																				<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>

																				<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
																				<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
																				

																				<?php
						}
						?>
                        <span><div style="color:#4fc3c5;">1</div></span>
																	</div>
																</div>
																
															</div>
														
														</div>
														
													</div><!-- /.product -->

													<?php }}$i++;  } ?>

											</div>
										</div>
									</div>
								</section>
							</div>
							<!-- /.tab-pane -->

							<div class="tab-pane" id="tab-products-3" role="tabpanel">
								<section class="section-products-carousel">
									<div class="home-v2-owl-carousel-tabs">
										<div class="woocommerce columns-3">

											<div class="products owl-carousel home-v2-carousel-tabs products-carousel columns-3" id="products">
<?php $i=1; if($special){ 
	foreach($special as $val){
		$title = $val->title_en;
		$s_link = $val->url;
		$image = $val->img;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		if($val->email)
		{
			$target = "#sendMail";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
			
		}else{
			$target = " ";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
		}
		$timestamp = $val->dateAdded;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		
		  if($i==1){
			  $whatsappUrl = "whatsapp://send?text=".Core::getBaseUrl().$s_link;
				$twitterUrl = "twitter://post?message=" .Core::getBaseUrl().$s_link
			  ?>

													<div class="product first">
														<div class="product-outer" style="height: 359px;">
															<!--<div class="product-inner">-->
															<div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																<div class="card cardmobhome" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																	<div class="small dealheadhome">
																		<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$s_link; ?>"><?php echo substr($val->title_en,0,30);?> <?= $val->ad_type ?></a>
							</h3>
																	</div>
						 											<img class="card-img-top gridmobviewimg dealimghome instarun" id="<?= $val->id ?>" data-groups="products" src="<?php echo @$image; ?>" alt="">
																	<span class="instaheart" id="insta-<?= $val->id ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
																	<div class="card-body">
																		<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a>
																			<span class="count-like-<?= $val->id ?>" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																			<span style="margin-left: 46px;"><a href="<?php echo $whatsappUrl;?> " data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="<?php echo $twitterUrl;?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="<?php echo $target;?>" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo $val->email;?>" class="btn-shadow icon-btn detail-btn btn-FF9800"><?php echo $emailpic; ?></a></span>
																			<span class="calllist" style="margin-left:14px;"><a href="tel:<?php echo $val->mobile; ?>"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
																			<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
																		</div>

																		<a href="<?php echo @$s_link; ?>">
																			<h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30); if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>

																		<h5 class="card-title2"><a href="<?php echo @$s_link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.$val->price; ?></span><?php }?></a></h5>
																		<p class="card-text"><a href="<?php echo @$s_link; ?>"><?php echo substr(strip_tags($val->description),0,45); ?></a></p><span class="rd_more"><a href="<?php echo @$s_link; ?>" style="color:white;">details التفاصيل</a></span>
																	</div>
																	<div class="bottom bottommobhome bottompchome ">
																		<div class="rating gridfav">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
																		</div>
																		<span class="count-like-<?= $val->id ?> gridcnt" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																		<?php if($val->main_category == 'Real Estate')
						{?>
																			<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
																			<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>

																			<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
																			<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
																			<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
																			<?php

						}else if($val->main_category == 'Auto')
						{?>

																				<span class="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
																				<span class="bathroom gridbath" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>

																				<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
																				<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
																				

																				<?php
						}
						?>
                        <span><div style="color:#4fc3c5;">1</div></span>
																	</div>
																</div>
																
															</div>
														
														</div>
														
													</div>
													

													<?php }}$i++;  } ?>

											</div>
										</div>
								</section>
								</div>
								
							</div>
                            </div>
                            </div>
							
					</section>

					<section class="prodCats section-onsale-product-carousel dealsoftheweek" data-animation="fadeIn">

                      <div class="bgbak">
						<header>
							<h1 class="h1 mobh1">Deals of the week  </h1>
							<span class="headright mobrighth1">عروض الأسبوع</span>
						</header>
						<div class="owl-nav">
							<a href="#onsale-products-carousel-prev" data-target="#onsale-products-carousel-57176fb23fad9" class="slider-prev mob-prev"><i class="fa fa-angle-left"></i>Previous Deal</a>
							<a href="#onsale-products-carousel-next" data-target="#onsale-products-carousel-57176fb23fad9" class="slider-next mob-next">Next Deal<i class="fa fa-angle-right"></i></a>
						</div>
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
        if($val->email)
		{
			$target = "#sendMail";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
			
		}else{
			$target = " ";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
		}
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

		  if($i=1){
			  $whatsappUrl = "whatsapp://send?text=".Core::getBaseUrl().$link;
				$twitterUrl = "twitter://post?message=" .Core::getBaseUrl().$link
			  ?>

									<div class="onsale-product mobitopdeal">
										<div class="onsale-product-thumbnails mobifullimg">
											<div class="images dealmobview"><a href="<?php echo @$link; ?>" itemprop="image" class="woocommerce-main-image" title=""><img width="600" height="600" src="<?php echo @$image; ?>" class="wp-post-image" alt="GamePad" title="GamePad"/></a>
											</div>
											<div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal mobviewdealnon" style="display:none">
												<div class="card cardmobhome" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
													<div class="small">
														<h3 style="font-size: 14px;margin-left: 15px;">
																<a href="<?php echo @$link; ?>"><?php echo substr($val->title_en,0,30);?> </a>
															</h3>
															</div>
														<img src="<?php echo @$image; ?>" data-echo="<?php echo @$image; ?>" class="img-responsive homemobweakdeal homepcdealtop instarun" id="<?= $val->id ?>" data-groups="onsale-products-carousel-57176fb23fad9" alt="">
														<span class="instaheart" id="insta-<?= $val->id ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
													<div class="card-body">
														<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a>
																			<span class="count-like-<?= $val->id ?>" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																			<span style="margin-left: 46px;"><a href="<?php echo $whatsappUrl;?> " data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="<?php echo $twitterUrl;?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="<?php echo $target;?>" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo $val->email;?>" class="btn-shadow icon-btn detail-btn btn-FF9800"><?php echo $emailpic; ?></a></span>
																			<span class="calllist" style="margin-left:14px;"><a href="tel:<?php echo $val->mobile; ?>"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
																			<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
																		</div>
														<a href="<?php echo @$link; ?>">
															<h3 class="titmobview" style="display:none;"><?php echo substr($val->title_en,0,30); if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
														<h5 class="card-title2"><a href="<?php echo @$link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
														<span><?php echo $this->session->userdata('currency').' '.$val->price; ?></span><?php }?></a></h5>
														<p class="card-text"><a href="<?php echo @$link; ?>"><?php echo substr(strip_tags($val->description),0,45); ?></a></p><span class="rd_more"><a href="<?php echo @$link; ?>" style="color:white;">details التفاصيل</a></span>
													</div>
													<div class="bottom bottommobhome bottompchome ">
														<div class="rating gridfav">
															<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
														</div>
														<span class="count-like-<?= $val->id ?> gridcnt" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
														<?php if($val->main_category == 'Real Estate')
						{?>
															<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
															<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>
															<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
															<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
															<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
															<?php
						}else if($val->main_category == 'Auto')
						{?>

																<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
																<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>
																<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
																<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
																<?php
						}
						?>
                        <span><div style="color:#4fc3c5;">1</div></span>
													</div>
												</div>
											</div>
										</div>
										<div class="onsale-product-content mobviewonsale-product">
											<a href="<?php echo @$link; ?>"><h3><?php echo substr($val->title_en,0,70).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>
											<span class="price">
												<span class="electro-price">
													<ins>
														<span class="amount"><?php if($val->price!=0 || $val->price!=''){ ?>
															<span><?php echo $this->session->userdata('currency').' '.$val->price; ?></span>
																<?php }?>
														</span>
													</ins>
												</span>
											</span>
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

<!-- /.products-carousel-tabs -->
 <div class="home-v2-banner-block animate-in-view fadeIn animated homepcad" data-animation=" animated fadeIn">
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
<!-- ================= -->
	<!-- 
		Real Estate Slider block
	 -->
<!-- ================= -->
<?php $this->load->view('blocks/slider/realestate'); ?>
<?php $this->load->view('blocks/slider/vipno'); ?>

<div class="home-v2-banner-block animate-in-view fadeIn animated homemobad" data-animation=" animated fadeIn" style="display: none;">
	<!-- <div class="textwidget">
								<a href="http://yalafun.com/"><img src="assets/front_end/images/bannerad3.jpg" alt="Banner" class="bannerfull"></a>
							</div> -->
	 <div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 30px">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:inline-block;width:420px;height:100px"
		data-ad-client="ca-pub-8267866280490368"
		data-ad-slot="4614962273"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div> 
</div>
<?php $this->load->view('blocks/slider/classifieds'); ?>
<?php $this->load->view('blocks/slider/Electronics'); ?>
<div class="home-v2-banner-block animate-in-view fadeIn animated homemobad" data-animation=" animated fadeIn" style="display: none;">
	<!-- <div class="textwidget">
								<a href="http://yalafun.com/"><img src="assets/front_end/images/bannerad3.jpg" alt="Banner" class="bannerfull"></a>
							</div> -->
	 <div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: 30px">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:inline-block;width:420px;height:100px"
		data-ad-client="ca-pub-8267866280490368"
		data-ad-slot="4614962273"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div> 
</div>
<?php $this->load->view('blocks/slider/phones'); ?>
<?php $this->load->view('blocks/slider/computer'); ?>

					<section class="products-carousel-tabs section-product-cards-carousel animate-in-view fadeIn animated mobilescalemost mostborder" data-animation="fadeIn">
						<div class="bordersection_most">
						<header class="mostheader">

							<h2 class="h1 mobh1">Most Viewed</h2>
							<span class="headrightview mobiletitlehomemob" style="display:none;">الأكثر مشاهدة </span>

							<ul class="nav nav-inline mobilemostview">
								<li class="nav-item"><a class="nav-link mostview active" href="#tab-products7" data-toggle="tab">Top 20</a></li>
								<li class="nav-item mobilemostli"><a class="nav-link mostview" href="#tab-realestate" data-toggle="tab">Realestate</a></li>
								<li class="nav-item mobilemostli"><a class="nav-link mostview" href="#tab-phones" data-toggle="tab">Phones</a></li>
								<li class="nav-item mobilemostli"><a class="nav-link mostview" href="#tab-auto" data-toggle="tab">Auto</a></li>
								<span class="headrightview mobiletitlehome">الأكثر مشاهدة </span>
							</ul>
							<ul class="nav nav-inline mobilemostviewlist" style="display: none;">
								<!-- <li class="nav-item"><a class="nav-link mostview active" href="#tab-products7" data-toggle="tab">Top 20</a></li> -->
								
								<span class="headrightview mobiletitlehome" >الأكثر مشاهدة </span>
							</ul>
						</header>

						<div class="tab-content mosttabmob">

<!--------------------------Mobile View in Most Viewers---------------------------------------->

<div class="tab-pane active mob_mostview_tabs_firstimage" id="tab-products" role="tabpanel" style="display: none;">

								<div id="home-v1-product-cards-careousel">
									<div class="woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel">

										<ul class="products columns-2 mobproductview" id="products">
											<?php $i=1; if($mostviewers){ 
												shuffle($mostviewers);

										foreach($mostviewers as $val){

											if($i == 2){break;}

											//echo $i;
		$title = $val->title_en;
		$image = $val->img;
		$s_link = $val->url;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		if($val->email)
		{
			$target = "#sendMail";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
			
		}else{
			$target = " ";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
		}

		$timestamp = $val->dateAdded;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
                       $whatsappUrl = "whatsapp://send?text=".Core::getBaseUrl().$s_link;
				$twitterUrl = "twitter://post?message=" .Core::getBaseUrl().$s_link
								?>
												<?php
											if($i == 3)
											{
												?>
													<li class="product product-card first">
														<?php
											}elseif($i == 4){
											?>
															<li class="product product-card last">
																<?php
											}else{?>
																	<li class="product product-card mobproductmost">
																		<?php } ?>

																			<div class="product-outer mostviewcardtop">
																				<div class="media product-inner mostboxhov">

																					<div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																						<div class="card cardmobhomemost" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																							<div class="small">
																								<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$s_link; ?>"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
																							</div>
																						 <img class="card-img-top gridmobviewimg dealimghome_new instarun" id="<?= $val->id ?>" data-groups="products" src="<?php echo @$image; ?>" alt="">
																						 <span class="instaheart" id="insta-<?= $val->id ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
																							<div class="card-body">
																								<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a>
																			<span class="count-like-<?= $val->id ?>" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																			<span style="margin-left: 46px;"><a href="<?php echo $whatsappUrl;?> " data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="<?php echo $twitterUrl;?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="<?php echo $target;?>" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo $val->email;?>" class="btn-shadow icon-btn detail-btn btn-FF9800"><?php echo $emailpic; ?></a></span>
																			<span class="calllist" style="margin-left:14px;"><a href="tel:<?php echo $val->mobile; ?>"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
																			<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
																		</div>

																								<a href="<?php echo @$s_link; ?>">
																									<h3 class="titmobviewmost" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>

																								<h5 class="card-title2"><a href="<?php echo @$s_link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.$val->price; ?></span><?php }?></a></h5>
																								<p class="card-text"><a href="<?php echo @$s_link; ?>"><?php echo substr(strip_tags($val->description),0,120); ?></a></p><span class="rd_more"><a href="<?php echo @$s_link; ?>" style="color:white">details التفاصيل</a></span>
																							</div>
																							<div class="bottom bottommobhome bottompchome ">
																								<div class="rating gridfav">
																									<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
																								</div>
																								<span class="count-like-<?= $val->id ?> gridcnt" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																								<?php if($val->main_category == 'Real Estate')
						{?>
																									<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
																									<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>

																									<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
																									<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
																									<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
																									<?php

						}else if($val->main_category == 'Auto')
						{?>

																										<span class="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
																										<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>

																										<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
																										<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
																										<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
																										<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->

																										<?php
						}
						?>
                        <span><div style="color:#4fc3c5;">1</div></span>
																							</div>
																						</div>
																						<!--</div>-->

																						<!-- /.price-add-to-cart -->
																						<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->

																					</div>
																					<!-- /.product-inner -->
																				</div>
																				<!-- /.product-inner -->
																			</div>
																			<!-- /.product-outer -->
																	</li>
																	<!-- /.products -->
																	<?php
 $i++;
		  }
		  }?>

<style type="text/css">
	.mostviewedcontrainermob .col:nth-child(1) {
		display: none;
	}
</style>								
<div class="container mostviewedcontrainermob" id="just4you" style="">
	
	<div class="row">
		<?php
			$curCurrency = Core::getHelper('location')->getCurrentCountry()->currency;
			//$tCounter = 2;
			$i=1;
			shuffle($mostviewers);
			foreach( $mostviewers as $msmo ) {
				if($i==6){ break;}
				//$tCounter--;
				//if($tCounter ) { continue;} 
			?>
				<div class="col col-sm-6 col-xs-6 col-md-6">
					<div class="polaroid">
						<a href="<?= $msmo->url ?>">
							<img src="<?= $msmo->img ?>" alt="5 Terre" style="width:100%">
						</a>
						<div class="container" style="color: red; font-weight: 600;">
							<a href="<?= $msmo->url ?>">
								<p><?= $curCurrency ?> <?= $msmo->price ?> <i style="color: #654e95;" class="fa fa-play" aria-hidden="true"></i></p>
							</a>
						</div>
					</div>
				</div>
			<?php
			$i++;
			}
		?>
		
	</div>
</div>
										</ul>


									</div>
								</div>
								<!-- #home-v1-product-cards-careousel -->

							</div>



<!----------------------------------------------------------------------------------------------->


							<div class="tab-pane active tab_most_pcview" id="tab-products7" role="tabpanel">

								<div id="home-v1-product-cards-careousel">
									<div class="woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel">

										<ul class="products columns-2 mobproductview" id="products">
											<?php $i=1; if($mostviewers){ 

										foreach($mostviewers as $val){

											if($i == 5){break;}

											//echo $i;
		$title = $val->title_en;
		$image = $val->img;
		$s_link = $val->url;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		if($val->email)
		{
			$target = "#sendMail";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
			
		}else{
			$target = " ";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
		}

		$timestamp = $val->dateAdded;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
                       $whatsappUrl = "whatsapp://send?text=".Core::getBaseUrl().$s_link;
				$twitterUrl = "twitter://post?message=" .Core::getBaseUrl().$s_link
								?>
												<?php
											if($i == 3)
											{
												?>
													<li class="product product-card first">
														<?php
											}elseif($i == 4){
											?>
															<li class="product product-card last">
																<?php
											}else{?>
																	<li class="product product-card mobproductmost">
																		<?php } ?>

																			<div class="product-outer mostviewcardtop">
																				<div class="media product-inner mostboxhov">

																					<div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																						<div class="card cardmobhomemost" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																							<div class="small">
																								<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$s_link; ?>"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
																							</div>
																						 <img class="card-img-top gridmobviewimg dealimghome_new instarun" id="<?= $val->id ?>" data-groups="products" src="<?php echo @$image; ?>" alt="">
																						 <span class="instaheart" id="insta-<?= $val->id ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
																							<div class="card-body">
																								<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a>
																			<span class="count-like-<?= $val->id ?>" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																			<span style="margin-left: 46px;"><a href="<?php echo $whatsappUrl;?> " data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="<?php echo $twitterUrl;?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="<?php echo $target;?>" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo $val->email;?>" class="btn-shadow icon-btn detail-btn btn-FF9800"><?php echo $emailpic; ?></a></span>
																			<span class="calllist" style="margin-left:14px;"><a href="tel:<?php echo $val->mobile; ?>"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
																			<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
																		</div>

																								<a href="<?php echo @$s_link; ?>">
																									<h3 class="titmobviewmost" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>

																								<h5 class="card-title2"><a href="<?php echo @$s_link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.$val->price; ?></span><?php }?></a></h5>
																								<p class="card-text"><a href="<?php echo @$s_link; ?>"><?php echo substr(strip_tags($val->description),0,120); ?></a></p><span class="rd_more"><a href="<?php echo @$s_link; ?>" style="color:white">details التفاصيل</a></span>
																							</div>
																							<div class="bottom bottommobhome bottompchome ">
																								<div class="rating gridfav">
																									<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
																								</div>
																								<span class="count-like-<?= $val->id ?> gridcnt" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																								<?php if($val->main_category == 'Real Estate')
						{?>
																									<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
																									<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>

																									<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
																									<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
																									<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
																									<?php

						}else if($val->main_category == 'Auto')
						{?>

																										<span class="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
																										<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>

																										<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
																										<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
																										<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
																										<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->

																										<?php
						}
						?>
                        <span><div style="color:#4fc3c5;">1</div></span>
																							</div>
																						</div>
																						<!--</div>-->

																						<!-- /.price-add-to-cart -->
																						<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->

																					</div>
																					<!-- /.product-inner -->
																				</div>
																				<!-- /.product-inner -->
																			</div>
																			<!-- /.product-outer -->
																	</li>
																	<!-- /.products -->
																	<?php
 $i++;
		  }
		  }?>

										</ul>
									</div>
								</div>
								<!-- #home-v1-product-cards-careousel -->

							</div>

							<div class="tab-pane" id="tab-realestate" role="tabpanel">
								<div id="home-v1-product-cards-careousel">
									<div class="woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel">

										<ul class="products columns-2">
											<?php $i=1; if($mostviewersreal){ 

										foreach($mostviewersreal as $val){

											if($i == 5){break;}

											//echo $i;
		$title = $val->title_en;
		$s_link = $val->url;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		$image = $val->img;
		if($val->email)
		{
			$target = "#sendMail";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
			
		}else{
			$target = " ";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
		}

		$timestamp = $val->dateAdded;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		// if($val->main_category == 'Real Estate'){ $s_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $s_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $s_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $s_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $s_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $s_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $s_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $s_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $s_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $s_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  //echo $i;
			  //echo sizeof($i);
			  $whatsappUrl = "whatsapp://send?text=".Core::getBaseUrl().$s_link;
				$twitterUrl = "twitter://post?message=" .Core::getBaseUrl().$s_link

								?>
												<?php
											if($i == 3)
											{
												?>
													<li class="product product-card first">
														<?php
											}elseif($i == 4){
											?>
															<li class="product product-card last">
																<?php
											}else{?>
																	<li class="product product-card mobproductmost">
																		<?php } ?>

																			<div class="product-outer">
																				<div class="media product-inner">

																					<div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																						<div class="card cardmobhomemost" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																							<div class="small">
																								<h3 style="font-size: 14px;margin-left: 15px;">
								<a href=<?php echo @$s_link; ?>><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
																							</div>
																								 <img class="card-img-top gridmobviewimg dealimghome_new instarun" id="<?= $val->id ?>" data-groups="products" src="<?php echo @$image; ?>" alt="">
																								 <span class="instaheart" id="insta-<?= $val->id ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
																							<div class="card-body">
																								<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a>
																			<span class="count-like-<?= $val->id ?>" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																			<span style="margin-left: 46px;"><a href="<?php echo $whatsappUrl;?> " data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="<?php echo $twitterUrl;?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="<?php echo $target;?>" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo $val->email;?>" class="btn-shadow icon-btn detail-btn btn-FF9800"><?php echo $emailpic; ?></a></span>
																			<span class="calllist" style="margin-left:14px;"><a href="tel:<?php echo $val->mobile; ?>"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
																			<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
																		</div>

																								<a href="<?php echo @$s_link; ?>">
																									<h3 class="titmobviewmost" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>

																								<h5 class="card-title2"><a href="<?php echo @$s_link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.$val->price; ?></span><?php }?></a></h5>
																								<p class="card-text"><a href="<?php echo @$s_link;?>"><?php echo substr(strip_tags($val->description),0,120); ?></a></p><span class="rd_more"><a href="<?php echo @$s_link; ?>" style="color:white">details التفاصيل</a></span>
																							</div>
																							<div class="bottom bottommobhome bottompchome ">
																								<div class="rating gridfav">
																									<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
																								</div>
																								<span class="count-like-<?= $val->id ?> gridcnt" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																								<?php if($val->main_category == 'Real Estate')
						{?>
																									<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
																									<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>

																									<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
																									<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
																									<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
																									<?php

						}else if($val->main_category == 'Auto')
						{?>

																										<span class="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
																										<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>

																										<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
																										<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
																										<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
																										<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->

																										<?php
						}
						?>
                        <span><div style="color:#4fc3c5;">1</div></span>
																							</div>
																						</div>
																						<!--</div>-->

																						<!-- /.price-add-to-cart -->
																						<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->

																					</div>
																					<!-- /.product-inner -->
																				</div>
																				<!-- /.product-outer -->
																	</li>
																	<!-- /.products -->
																	<?php
 $i++;
		  }
		  }?>

										</div>
									</div>
									<!-- #home-v1-product-cards-careousel -->
								</div>

								<div class="tab-pane" id="tab-auto" role="tabpanel">
									<div id="home-v1-product-cards-careousel">
										<div class="woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel">

											<ul class="products columns-2">
												<?php $i=1; if($mostviewersauto){ 

										foreach($mostviewersauto as $val){

											if($i == 5){break;}

											//echo $i;
		$title = $title_en;
		$s_link = $val->url;
		$image = $val->img;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		if($val->email)
		{
			$target = "#sendMail";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
			
		}else{
			$target = " ";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
		}

		$timestamp = $val->dateAdded;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		// if($val->main_category == 'Real Estate'){ $s_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $s_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $s_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $s_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $s_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $s_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $s_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $s_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $s_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $s_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  //echo $i;
			  //echo sizeof($i);
                    $whatsappUrl = "whatsapp://send?text=".Core::getBaseUrl().$s_link;
				$twitterUrl = "twitter://post?message=" .Core::getBaseUrl().$s_link
								?>
													<?php
											if($i == 3)
											{
												?>
														<li class="product product-card first">
															<?php
											}elseif($i == 4){
											?>
																<li class="product product-card last">
																	<?php
											}else{?>
																		<li class="product product-card mobproductmost">
																			<?php } ?>

																				<div class="product-outer">
																					<div class="media product-inner">

																						<div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																							<div class="card cardmobhomemost" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																								<div class="small">
																									<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$s_link; ?>"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
																								</div>
						 <img class="card-img-top gridmobviewimg dealimghome_new instarun" id="<?= $val->id ?>" data-groups="products" src="<?php echo @$image; ?>" alt="">
						 <span class="instaheart" id="insta-<?= $val->id ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
																								<div class="card-body">
																									<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a>
																			<span class="count-like-<?= $val->id ?>" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																			<span style="margin-left: 46px;"><a href="<?php echo $whatsappUrl;?> " data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="<?php echo $twitterUrl;?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="<?php echo $target;?>" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo $val->email;?>" class="btn-shadow icon-btn detail-btn btn-FF9800"><?php echo $emailpic; ?></a></span>
																			<span class="calllist" style="margin-left:14px;"><a href="tel:<?php echo $val->mobile; ?>"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
																			<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
																		</div>

																									<a href="<?php echo @$s_link; ?>">
																										<h3 class="titmobviewmost" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>

																									<h5 class="card-title2"><a href="<?php echo @$s_link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.$val->price; ?></span><?php }?></a></h5>
																									<p class="card-text"><a href="<?php echo @$s_link; ?>"><?php echo substr(strip_tags($val->description),0,120); ?></a></p><span class="rd_more"><a href="<?php echo @$s_link; ?>" style="color:white">details التفاصيل</a></span>
																								</div>
																								<div class="bottom bottommobhome bottompchome ">
																									<div class="rating gridfav">
																										<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
																									</div>
																									<span class="count-like-<?= $val->id ?> gridcnt" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																									<?php if($val->main_category == 'Real Estate')
						{?>
																										<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
																										<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>

																										<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
																										<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
																										<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
																										<?php

						}else if($val->main_category == 'Auto')
						{?>

																											<span class="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
																											<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>

																											<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
																											<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
																											<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
																											<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->

																											<?php
						}
						?>
                        <span><div style="color:#4fc3c5;">1</div></span>
																								</div>
																							</div>
																							<!--</div>-->

																							<!-- /.price-add-to-cart -->
																							<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->

																						</div>
																						<!-- /.product-inner -->
																					</div>
																					<!-- /.product-outer -->
																		</li>
																		<!-- /.products -->
																		<?php
 $i++;
		  }
		  }?>

											</ul>
											</div>
										</div>
										<!-- #home-v1-product-cards-careousel -->
									</div>
									<div class="tab-pane" id="tab-phones" role="tabpanel">
										<div id="home-v1-product-cards-careousel">
											<div class="woocommerce columns-2 home-v1-product-cards-carousel product-cards-carousel owl-carousel">

												<ul class="products columns-2">
													<?php $i=1; if($mostviewersphones){ 

										foreach($mostviewersphones as $val){

											if($i == 5){break;}

											//echo $i;
		$title = $title_en;
		$s_link = $val->url;
		$image = $val->img;
		$user = $this->yalalink_model->getUserDetails($val->user_id);
		if($val->email)
		{
			$target = "#sendMail";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i>';
			
		}else{
			$target = " ";
			$emailpic = '<i class="fas fa-envelope" aria-hidden="true" style="color:#b9c1c1b3;"></i>';
		}
		$timestamp = $val->dateAdded;
		  $times = $this->yalalink_model->facebook_time_ago($timestamp);
		// if($val->main_category == 'Real Estate'){ $s_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $s_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $s_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $s_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $s_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $s_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $s_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $s_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $s_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $s_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
		  //echo $i;
			  //echo sizeof($i);
                      $whatsappUrl = "whatsapp://send?text=".Core::getBaseUrl().$s_link;
				$twitterUrl = "twitter://post?message=" .Core::getBaseUrl().$s_link
								?>
														<?php
											if($i == 3)
											{
												?>
															<li class="product product-card first">
																<?php
											}elseif($i == 4){
											?>
																	<li class="product product-card last">
																		<?php
											}else{?>
																			<li class="product product-card mobproductmost">
																				<?php } ?>

																					<div class="product-outer">
																						<div class="media product-inner">

																							<div class="col col-sm-12 col-md-12 col-xs-12 pchomedeal">
																								<div class="card cardmobhomemost" style="border: 1px solid #2d2e2e47 !important;    background: #dadad261!important;">
																									<div class="small">
																										<h3 style="font-size: 14px;margin-left: 15px;">
								<a href="<?php echo @$s_link;?>"><?php echo substr($val->title_en,0,30);?> </a>
							</h3>
																									</div>
						 <img class="card-img-top gridmobviewimg dealimghome_new instarun" id="<?= $val->id ?>" data-groups="products" src="<?php echo @$image; ?>" alt="">
						 <span class="instaheart" id="insta-<?= $val->id ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
																									<div class="card-body">
																										<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
																			<a class="favorites favorites_<?= $val->id ?>" href="#" id="<?= $val->id ?>"><i class="far fa-heart" aria-hidden="true" style="font-size: 19px;color:#4fc3c5b3;"></i></a>
																			<span class="count-like-<?= $val->id ?>" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																			<span style="margin-left: 46px;"><a href="<?php echo $whatsappUrl;?> " data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px;"><a href="<?php echo $twitterUrl;?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
																			<span style="margin-left:24px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="<?php echo $target;?>" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo $val->email;?>" class="btn-shadow icon-btn detail-btn btn-FF9800"><?php echo $emailpic; ?></a></span>
																			<span class="calllist" style="margin-left:14px;"><a href="tel:<?php echo $val->mobile; ?>"   data-placement="bottom" title="call" data-original-title="call">call </a></span>
																			<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"></span>
																		</div>

																										<a href="<?php echo @$s_link; ?>">
																											<h3 class="titmobviewmost" style="display:none;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span><?php
																		}?></h3></a>

																										<h5 class="card-title2"><a href="<?php echo @$s_link; ?>" style="color:red"> <?php if($val->price!=0 || $val->price!=''){ ?>
					<span><?php echo $this->session->userdata('currency').' '.$val->price; ?></span><?php }?></a></h5>
																										<p class="card-text"><a href="<?php echo @$s_link; ?>"><?php echo substr(strip_tags($val->description),0,120); ?></a></p><span class="rd_more"><a href="<?php echo @$s_link; ?>" style="color:white">details التفاصيل</a></span>
																									</div>
																									<div class="bottom bottommobhome bottompchome ">
																										<div class="rating gridfav">
																											<a class="favorites favorites_<?= $val->id ?>" href="login" id="4696"><i class="far fa-heart" aria-hidden="true"></i></a>
																										</div>
																										<span class="count-like-<?= $val->id ?> gridcnt" style="font-size: 15px;color: #000000b5;"><?= $val->likes ?></span>
																										<?php if($val->main_category == 'Real Estate')
						{?>
																											<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->bedroom ?></span>
																											<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->bathroom ?></span>

																											<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->garage ?></span>
																											<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->pool ?></span>
																											<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->size ?></span>
																											<?php

						}else if($val->main_category == 'Auto')
						{?>

																												<span class="bedroom gridbed" style="color: #000000b0;font-size:10px;margin-left: 10px;display: -webkit-inline-box;"><a href="" title="bedroom" style="color:#00000096;"><i class="fas fa-calendar" aria-hidden="true" style="font-size: 11px;" alt="bedroom">  </i></a>&nbsp;<?php echo $val->year ?> </span>
																												<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="" title="bathroom" style="color:#00000096;"><i class="fas fa-tachometer-alt" aria-hidden="true" style="font-size: 11px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->kilometers ?></span>

																												<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="" title="Garage" style="color:#00000096;"><i class="fas fa-palette" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo $val->color ?></span>
																												<span class="pool" style="color: #000000b0;font-size:10px;display: -webkit-inline-box;height: 11px;"><a href="#" title="HP" style="color:#00000096;"><i class="fab fa-superpowers" aria-hidden="true" style="font-size: 11px;" alt="bathroom"></i></a>&nbsp;<?php echo substr(strip_tags($val->horsepower),0,3) ?></span>
																												<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="specification" style="color:#00000096;"><i class="fas fa-globe-asia" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i>&nbsp;<?php echo substr(strip_tags($val->regional_specs),0,3) ?></a></span>-->
																												<!-- <span class ="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 11px;"><a href="#" title="body type" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;</span>-->

																												<?php
						}
						?>
                         <span><div style="color:#4fc3c5;">1</div></span>
																									</div>
																								</div>
																								<!--</div>-->

																								<!-- /.price-add-to-cart -->
																								<!--<div class="carddescription"><?php //echo substr(strip_tags($val->description),0,15).'...'; ?> <em><?php echo $times; ?></em></div>-->

																							</div>
																							<!-- /.product-inner -->
																						</div>
																						<!-- /.product-outer -->
																			</li>
																			<!-- /.products -->
																			<?php
 $i++;
		  }
		  }?>

												</ul>
												</div>
											</div>
											<!-- #home-v1-product-cards-careousel -->
										</div>
									</div>
                                    </div>

					</section>

<!-- ================= -->
	<!-- 
		Loozaa Products Slider block
	 -->
<!-- ================= -->
 <!-- <div class="loozaahala"><a href="https://loozaa.com" target="_blank"><img src="https://loozaa.com/wp-content/uploads/2019/01/970x90.jpg"></a></div>  -->
<?php //$this->load->view('blocks/slider/loozaanewprod'); ?>
 <!-- <div class="loozaahala"><a href="https://loozaa.com" target="_blank"><img src="https://loozaa.com/wp-content/uploads/2019/01/970x90.jpg"></a></div>  -->
 <div class="home-v2-banner-block animate-in-view fadeIn animated homepcad" data-animation=" animated fadeIn">
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

<div class="home-v2-banner-block animate-in-view fadeIn animated homemobad" data-animation=" animated fadeIn" style="display: none;">
	 <div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: -21px;">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:inline-block;width:420px;height:100px"
		data-ad-client="ca-pub-8267866280490368"
		data-ad-slot="4614962273"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div> 
	<!-- <div class="textwidget">
								<a href="http://yalafun.com/"><img src="assets/front_end/images/bannerad3.jpg" alt="Banner" class="bannerfull"></a>
							</div> -->
</div>


<!-- <div class="ads-block row mediamobgoogle test" style="display: none;">
							
								<div class="home-v2-fullbanner-ad fullbanner-ad" style="margin-bottom: -28px; margin-top: -7px;">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:inline-block;width:420px;height:100px"
		data-ad-client="ca-pub-8267866280490368"
		data-ad-slot="4614962273"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div> 
								</div> -->
							

							<div class="container" id="just4you" style="display: none;">
								<?php $this->load->view('blocks/slider/justforu'); ?>

	<!-- <h5 style="color: orange; float: left;">JUST FOR YOU </h5>
	<h5 style="color: orange; float: right;">إخترنا لكم</h5>
	<div class="row">
		<?php
			$curCurrency = Core::getHelper('location')->getCurrentCountry()->currency;
			$i = 0;
			foreach( $hotdeals as $hd ) {
				if( ++$i > 6 ) {
					break;
				}
			?>
				<div class="col col-sm-6 col-xs-6 col-md-6">
					<div class="polaroid">
						<a href="<?= $hd->url ?>">
							<img src="<?= $hd->img ?>" alt="5 Terre" style="width:100%">
						</a>
						<div class="container" style="color: red; font-weight: 600;">
							<a href="<?= $hd->url ?>">
								<p><?= $curCurrency ?> <?= $hd->price ?> <i style="color: #654e95;" class="fa fa-play" aria-hidden="true"></i></p>
							</a>
						</div>
					</div>
				</div>
			<?php
			}
		?>
		
	</div> -->
</div>
<div class="media mediamobgoogle" style="display: none;">
									 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
       <ins class="adsbygoogle"
        style="display:inline-block;width:468px;height:280px"
        data-ad-client="ca-pub-8267866280490368"
        data-ad-slot="4614962273"></ins> 
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <!-- <a href="https://loozaa.com">
			<img src="https://loozaa.com/wp-content/uploads/2018/12/2-14.jpg">
		</a> -->
								</div> 


					<section class="home-v2-categories-products-carousel section-products-carousel animate-in-view fadeIn animated animation mobregview" data-animation="fadeIn">

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
													<div class="full-wrap pull-left">
														<a href="login" class="hero-button btn-place-ad reg-button"> <span>Register / Sign Up</span> <i class="fa fa-user-plus bounce-ani" aria-hidden="true"></i> </a>
													</div>
												</div>
											</section>
										</div>
									</div>
								</div>
								<?php } ?>
									<div class="viewcountryflag">
										<?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
									</div>

									<div class="home-v2-banner-block animate-in-view fadeIn animated homepcad" data-animation=" animated fadeIn">
	<div class="logo-sec-add12" id="add-load"> 
		
		<!-- <img src="assets/front_end/images/new-add.jpg" class="img-fluid">  -->
		
	  </div>
</div>

						</div>
					</section>

				</main>
				<!-- #main -->
				</div>
				<!-- #primary -->

<div id="sidebar" class="sidebar" role="complementary" style="margin-top: 15px;">
	<aside class="widget widget_text mobbanner">
		<div class="textwidget">
			 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:inline-block;width:300px;height:600px"
		data-ad-client="ca-pub-8267866280490368"
		data-ad-slot="4614962273"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script> 
		<!-- <a href="http://yalafun.com"><img src="assets/images/YALAFUN2.jpg" class="img-fluid"></a> -->
		</div>
	</aside>
	<div class="lookaroundmain">
	 <h4 style="text-align: center;color: orange;" class="lookaround">نظرة على الأسواق الأخرى</h4>
	<h4 style="text-align: center;color: orange;" class="lookaround">LOOK AROUND ELSEWHERE</h4> 

	<?php
	 $ads = Core::getModel('ads');
	 $str = Core::getHelper('str');
	 $ads = $ads->getAdsFromDiffCountry();
	 shuffle($ads);
	 foreach( $ads as $ad ) {
	 	$country = $ad->country;
	 	$ad = Core::getModel($str->catToModel($ad->main_category))->prepare([$ad])[0];
		$ad['country'] = $country;
	 	$this->load->view('blocks/sidebar/adsdiffc', $ad);
	 }
	?>
</div>
<aside class="widget widget_text mobbanner">
		<div class="textwidget">
			 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<ins class="adsbygoogle"
		style="display:inline-block;width:300px;height:600px"
		data-ad-client="ca-pub-8267866280490368"
		data-ad-slot="4614962273"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script> 
		<!-- <a href="http://yalafun.com"><img src="assets/images/YALAFUN2.jpg" class="img-fluid"></a> -->
		</div>
	</aside>

					<aside class="widget widget_text mobileviewflag" style="display:none;">
					<?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
					</aside>
					<aside class="widget widget_text mobileviewflag" style="display:none;">
					<?php $this->load->view('blocks/body/categorymenu'); ?>
					</aside>

				</div>

			</div><!-- .container -->
		</div><!-- #content -->
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