<?php
/**
 *	Main Block Slider
 *	@param array $ads
 *	@param stio
 */
?>
<div id="carousel-example" class="carousel1 slide hidden-xs <?= $id ?>" data-ride="carousel">
	<h5 style="float: left; font-size: 17px;">
		<a href="<?= $actionlink ?>">
			<?= $title_en ?>
		</a>
	</h5>
	<!-- <span class="flash_badges"> <img src="https://loozaa.com/wp-content/uploads/2019/01/flash_new.png" style="width: 53px;
    margin-top: -10px;
    display: -webkit-inline-box;opacity: 0;margin-left: 79px;"></span> -->
	<h5 style="float: right;font-size: 17px;">
		<a href="<?= $actionlink ?>">
			<?= $title_ae ?>
		</a>
	</h5>
	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		<div class="item active">
			<!-- ad slider contaier start -->
			<div class="row slider-container">
				<?php
					$img = Core::getHelper('image');
					$adModel = Core::getModel('ads');
					foreach( $ads as $ad ) {
						$ad = isset($ad->img) ? $ad : $adModel->prepare( $ad );
						if( strpos('loozaa', $ad->img) < 0 ) {
							$ad->img = $img->getMainImage( $ad->id );
						}
						$title_en = $ad->title_en;
						if (strlen($ad->title_en) > 19) {
							$title_en = substr($ad->title_en, 0, 19) . '...';
						}
						?>
						<!-- ad item start -->
							<div class="col-sm-3 ad-item">
									<a href="<?= $ad->url ?>"><div class="col-item">
									<div class="nl-image photo">
										<img src="<?= $ad->img ?>" class="img-responsive" alt="a" />
									</div>
									<div class="info">
										<div class="row"> 
											<div class="col col-md-12">
												<?= isset($ad->year) ? '<span class="ad-year">' . $ad->year . '</span>' : "" ?>
												<?php 
													$type = isset($ad->type) ? '<span class="ad-year">' . $ad->type . '</span>' : "";
													//if( $ad->main_category === 'Auto' ) {
												
														if( Core::getModel('auto')->getSubCat($ad->id)  == 5 ) {
															echo $type = '<span class="vipno">vip</span>';
															//echo $type = ' ';

														}
													//}
														else{
														echo $type;
													}
												?>
												<h5><?= $title_en ?></h5>
												<h6 class="price-text-color"> <?= $ad->currency ?> <?= $ad->price ?> </h6>
											</div>
										</div>
										<div class="separator clear-left">
											<span class="dateAdded">
												<?= isset($ad->dateAdded) ? $ad->dateAdded : "" ?>
											</span>
											<a href="<?= $ad->url ?>" <?= ($linktarget) ? 'target="_blank"' : '' ?> style="color: color: #654e95a6;font-size: 11px;">
												<i style="color: #654e95;" class="fa fa-play" aria-hidden="true"></i> View
											</a>
										</div>
									</div>
								</div></a>
							</div>
						<!-- ad item end -->
						<?php
					}
				?>
			</div>
			<!-- ad slider contaier end -->
		</div>
	</div>
	
	<span class="seeall"><a href="<?= $actionlink ?> " style="color: #808080a8;margin: auto;display: block;text-align: -webkit-center;">See all products شاهد المزيد من المنتجات  </a></span>
</div>