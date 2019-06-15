<?php
/**
 *	Main Block Slider
 *	@param array $ads
 *	@param stio
 */
?>
<style type="text/css">
	.col-item
{
    border: 1px solid #E1E1E1;
    border-radius: 5px;
    background: #FFF;
}
.col-item .photo img
{
    margin: 0 auto;
    width: 100%;
}

.col-item .info
{
    padding: 10px;
    border-radius: 0 0 5px 5px;
    margin-top: 1px;
}

.col-item .price
{
    /*width: 50%;*/
    float: left;
    margin-top: 5px;
}

#carousel-example h5
{
    line-height: 20px;
    margin: 0;
    color: orange;
    padding: 10px;
}

.price-text-color
{
    color: #34c3c8;
}

.col-item .info .rating
{
    color: #777;
}

.col-item .rating
{
    /*width: 50%;*/
    float: left;
    font-size: 17px;
    text-align: right;
    line-height: 52px;
    margin-bottom: 10px;
    height: 52px;
}

.col-item .separator
{
    border-top: 1px solid #E1E1E1;
}

.clear-left
{
    clear: left;
}

.col-item .separator p
{
    line-height: 20px;
    margin-bottom: 0;
    margin-top: 10px;
    text-align: center;
}

.col-item .separator p i
{
    margin-right: 5px;
}
.col-item .btn-add
{
    width: 50%;
    float: left;
}

.col-item .btn-add
{
    border-right: 1px solid #E1E1E1;
}

.col-item .btn-details
{
    width: 50%;
    float: left;
    padding-left: 10px;
}
.controls
{
    margin-top: 20px;
}
[data-slide="prev"]
{
    margin-right: 10px;
}
.info {
	width: 100%;
}

#carousel-example .carousel-inner {
	padding-top: 10px;
}

#carousel-example {
    margin-top: 35px;
}
</style>
<div id="carousel-example" class="carousel1 slide hidden-xs <?= $id ?>" data-ride="carousel">
	<h5 style="float: left;">
		<a href="<?= $actionlink ?>">
			<?= $title_en ?>
		</a>
	</h5>
	<h5 style="float: right;">
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
					foreach( $ads as $ad ) {
						$title_en = $ad->title_en;
						if (strlen($ad->title_en) > 19) {
							$title_en = substr($ad->title_en, 0, 19) . '...';
						}
						?>
						<!-- ad item start -->
							<div class="col-sm-3 ad-item">
									<a href="<?= $ad->url ?>"><div class="col-item">
									<div class="photo">
										<img src="<?= $ad->img ?>" class="img-responsive" alt="a" />
									</div>
									<div class="info">
										<div class="row"> 
											<div class="col col-md-12">
												<h6><?= $title_en ?></h6>
												<h6 class="price-text-color"> <?= $ad->currency ?> <?= $ad->price ?> </h6>
											</div>
										</div>
										<div class="separator clear-left">
											<a href="<?= $ad->url ?>">
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
	
	<span class="seeall"><a href="<?= $actionlink ?> ">See all products شاهد المزيد من المنتجات  </a></span>
</div>