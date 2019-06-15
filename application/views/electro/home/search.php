<?php $this->load->view('blocks/header'); 
// $this->output->enable_profiler(TRUE);
$sboxval = isset($query) ? 'value="' . $query . '"' : '';
$country = Core::getHelper('location')->getCountryDetails( $country );
?>
<link rel="stylesheet" type="text/css" href="<?= Core::getBaseUrl() ?>assets/css/light.css">
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
					<div class="home-v2-ads-block animate-in-view fadeIn animated" data-animation=" animated fadeIn">

						<!-- <div class="mobserach" style="position: relative; display: none;">
							<form name="frmSearch" action="<?= Core::getBaseUrl() ?>search" method="GET" >
								<input type="text" name="query" placeholder="Search.." <?= $sboxval ?> style="font-size: 17px">
								<button type="submit"><i class="fa fa-search"></i></button>
							</form>
						</div> -->
						
					</div>
				</main>
			</div>

			<div id="primary" class="content-area">
				<div class="row">
					<span class="search-desc">
						Showing <?= $resCount ?> results in {elapsed_time} seconds
					</span>
					<?php
						if( $resCount ) {
							$ads = Core::getModel( 'ads');
							foreach( $res as $rs ) {
								$ad = $ads->prepare($rs);
								?>
								<div class="col col-xs-12 col-sm-12">
									<div class="clearfix-prodlist adslist">
										<div class="imgcontainer">
											<img class="img2" src="<?= $ad->img ?>" alt="Pineapple" width="170" height="170">
										</div>
										<a href="<?= $ad->url ?>">
											<p class="title-prodside" style="margin-top: 5%;"><?= Core::getHelper('str')->strDots($ad->title_en, 25) ?></p>
											<p class="price-prodside"><?= $ad->currency ?> <?= $ad->price ?></p>
											<!-- <p class="title-prodside">Category: <?= $ad->main_category ?></p> -->
										</a>
										<a href="<?= $ad->url ?>">
											<span class="rd_more sidebar-prodlist">Details</span>
										</a>
									</div>
								</div>
								<?php
							}
						}
					?>
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
					
				</div>
				<div class="row pages">
					<?= $markup ?>
				</div>
			</div>

		</div>
	</div>


<?php $this->load->view('front_end/include/footer'); ?>