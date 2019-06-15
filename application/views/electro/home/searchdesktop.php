 <?php 
	$this->load->view('blocks/header');
?>
<style type="text/css">
.col .bottom-list {
    margin-top: 230px;
    height: 30px;
}

.card-img-top-grid {
    object-fit: contain;
}
</style>
<!--this mobile view header --->
<?php $this->load->view('blocks/body/scrolltop'); ?>
			<div id="content" class="site-content" tabindex="-1">
				<div class="container">
				
					<nav class="woocommerce-breadcrumb" ><!--<a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets--></nav>
					<nav class="woocommerce-breadcrumb" ><!--<a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets--></nav>
					<div id="primary" class="content-area">
						<main id="main" class="site-main zoomcont">
						<div class="home-v2-banner-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">
					</div>
							<header class="page-header pcrealhead">
								<h1 class="page-title" style="font-size: 30px;">Showing <span style="color: #654e95;"><?= $resCount ?></span> results in {elapsed_time} seonds</h1>
							</header>
						  

							<div class="shop-control-bar pcrealcntrl">
								<ul class="shop-view-switcher nav nav-tabs types mobinav" role="tablist" style="display:none;">
									<li class="nav-item insidelist"><a class="nav-link switcher" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
									
								</ul>
							</div>
							<div class="tab-content pctabview">
								<div role="tabpanel" class="tab-pane active" id="list-view" aria-expanded="true">
									<ul class="products columns-3">
										<div class="tab-pane active result-div" id="post-results-list">
											<?php
												if( $resCount ) {
													$ads = Core::getModel( 'ads');
													foreach( $res as $rs ) {
														$ad = $ads->prepare($rs);
														?>
														<div class="col col-sm-12 col-md-12 col-xs-12"
>															<div class="card listcard" style="border: 1px solid #2d2e2e47 !important;">
																<div class="row">
																	<div class="col-md-6">
																		<img class="card-img-top-grid instarun" data-groups="post-results-list" id="<?= $ad->id ?>" src="<?= $ad->img ?>" alt="">
																		<span class="countimg"><i class="fa fa-camera" aria-hidden="true"></i> <?= $ad->imgCount ?> </span>
																		<span class="instaheart" id="insta-<?= $ad->id ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
																	</div>
																	<div class="col-md-6">
																		<div class="card-body">
																			<p class="card-text small-list">
																				<a href="<?= $ad->url ?>"><?= $ad->title_en ?></a>
																			</p>
																			<h5 class="card-title3"><?= $ad->currency ?> <?= $ad->price ?></h5>
																			<a href="<?= $ad->url ?>">
																				<p class="card-text-list-main"><?= Core::getHelper('str')->strDots($ad->description, 800, true) ?></p>
																			</a>
																		</div>
																		<div class="bottom-list" style="margin-left: 0px !important;">
																			<table class="table12">
																				<tbody>
																					<tr>
																						<td style="text-align: left;">
																							<div class="rating" style="display: -webkit-inline-box;font-size: 16px;">
																								<a class="favorites favorites_<?= $ad->id ?>" href="login" id="<?= $ad->id ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
																							</div>
																							<span class="count-like-<?= $ad->id ?>" style="font-size: 15px;color: #000000b5;"><?= $ad->likes ?></span>
																						</td>
																						<td colspan="5"><span class="added-date"><?= $ad->dateAdded ?></span></td>
																					</tr>
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<?php
													}
												}
											?>

										</div>
									</ul>
								</div>
							</div>
						   

							<!-- pagination -->
							
						</main><!-- #main -->
						<link rel="stylesheet" type="text/css" href="<?= Core::getBaseUrl() ?>assets/css/light.css">
						<?php
							// determine page (based on <_GET>)
							$page = isset($_GET['page']) ? ((int) $_GET['page']) : 1;
							$this->load->library('pagination');
							// instantiate; set current page; set number of records
							$pagination = (new Pagination());
							$pagination->setTarget('search');
							$pagination->setCurrent($page);
							$pagination->setTotal($resCount);

							// grab rendered/parsed pagination markup
							$markup = $pagination->parse();
						?>
						<div class="col-md-12" style="z-index: 1; margin-left: 31%;">
							<div class="row pages">
								<?= $markup ?>
							</div>
						</div>

						 <?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
					</div><!-- #primary -->

					<div id="sidebar" class="sidebar categories" role="complementary">


						<aside class="widget widget_text mobsidewidgetreal">
							<div class="textwidget">
								<a href="http://yalafun.com/"><img src="assets/front_end/images/bannerad3.jpg" alt="Banner" class="bannerfull"></a>
							</div>
						</aside>
						
						<h4 style="text-align: center;color: orange;">نظرة على الأسواق الأخرى</h4>
						 <h4 style="text-align: center;color: orange;">LOOK AROUND ELSEWHERE</h4>
							<?php
								$ads = Core::getModel('ads');
								$str = Core::getHelper('str');
								$img = Core::getHelper('image');
								$date = Core::getHelper('date');
								$loc = Core::getHelper('location');
								$ads = $ads->getAdsFromDiffCountry();
								shuffle($ads);
								foreach( $ads as $ad ) {
									$ad->url = $str->makeUrlFromAd( $ad );
									$ad->img = $img->getMainImage( $ad->id );
									$ad->imgCount = count($img->getImages( $ad->id ));
									$ad->mobdateAdded = $date->getMobileDate($ad->added_date);
									// $this->load->view('blocks/sidebar/adsfromothercountry', $ad);
									$this->load->view('blocks/sidebar/adsdiffc', $ad);
								}
								?>
						<?php $this->load->view('blocks/body/categorymenu'); ?>
					</div>

				</div><!-- .container -->
			</div><!-- #content -->
			
  </div>
</div>
</div>

<?php $this->load->view('front_end/include/footer'); ?>