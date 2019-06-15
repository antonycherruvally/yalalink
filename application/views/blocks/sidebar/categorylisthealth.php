<aside class="widget woocommerce widget_product_categories electro_widget_product_categories categ">
	<ul class="product-categories category-single">
		<li class="product_cat">
			
			<ul class='children' style="padding:unset !important;">
				<?php 
				$act = 'active';
					foreach( $cats as $ct ) {
						
						?>
						<li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link <?= $act ?> category" data-toggle="tab" id="<?= $ct->id ?>" href="javascript:void(0)" role="tab" style="text-align: justify;	"><?= empty($ct->subcategory) ? $ct->category:$ct->subcategory ?><span style="float:right;padding-right: 11px;"><?= empty($ct->ar_subcategory) ? $ct->ar_category:$ct->ar_subcategory ?></span></a>
						</li>
						<?php
						$act = "";
					}
					?>
					
				
			</ul>
		</li>
	</ul>
</aside>