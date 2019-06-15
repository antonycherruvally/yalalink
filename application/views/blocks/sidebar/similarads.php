<?php if(! $hotdeals) { return; } ?>
<aside class="widget widget_text">
	<div class="row similarinsidepost" style="display: none;">
		<div style="font-size: 20px;font-weight: 600; margin-bottom: 14px;color: orange;    margin-left: 11px;">Similar Ads<span class="pull-right;" style="margin-left: 25%;">إعلانات مشابهه</span></div>
	<?php 
		foreach($hotdeals as $val){
			$title = $val->title_en;
        	$link = $val->url;
    ?>
		<div class="col col-xs-12 col-sm-12">
			<a href="<?php echo @$link; ?>" >
			<div class="clearfix-prodlist adslist">
				<div class="imgcontainer">
					<img class="img2" src="<?= $val->img ?>" alt="Pineapple" width="170" height="170">
				</div>
				<a href="<?php echo @$link; ?>" ><p class="title-prodsideinside"><?php echo substr($val->title_en,0,35) ?></p>
				<p class="price-prodsideinside"><?= $val->currency.' '. $val->price; ?></p>
				<p class="postdate-prodsideinside"><?= $val->mobdateAdded ?></p></a>
			</div>
		</a>
		</div>
	<?php 
		}
	?>
	</div>	
</aside>