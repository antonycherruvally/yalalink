<?php $country = Core::getHelper('location')->getCountryDetails( $country ); ?>
<div class="container lookaround" id="adslistings" style="padding: 0px;">
	<div class="row">
		<div class="col col-xs-12 col-sm-12">
			<div class="clearfix-prodlist adslist">
				<a href="<?= Core::getBaseUrl() ?>api/?changecountry=<?= $country['code'] ?>&redirect=<?= strtolower(str_replace(" ", "-", $main_category)) ?>">
				<div class="imgcontainer">
					<img class="img2" src="<?= $img ?>" alt="Pineapple" width="170" height="170">
				</div>
				<p class="cDetails">
					<?= $country['cCode'] ?> Yalalink
					<img src="<?= $country['img'] ?>" class="cFlag" >
					<span style="margin-left: 10px;">
						<?= $country['ar'] ?> يلا لينك
					</span>
				</p>
				<a href="<?= $url ?>">
					<p class="title-prodside"><?= Core::getHelper('str')->strDots($title_en) ?></p>
					<p class="price-prodside"><?= $currency ?> <?= $price ?></p>
				</a>
				<a href="<?= Core::getBaseUrl() ?>api/?changecountry=<?= $country['code'] ?>&redirect=<?= strtolower(str_replace(" ", "-", $main_category)) ?>">
					<span class="rd_more sidebar-prodlist">Yala let's go there يلا نذهب هناك</span>
				</a>
				</a>
			</div>
		</div>
	</div>
</div>