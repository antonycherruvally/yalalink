<!-- <aside class="widget woocommerce widget_product_categories electro_widget_product_categories categ">
	<ul class="product-categories category-single">
		<li class="product_cat">
			
			<ul class='children' style="padding:unset !important;">
				<?php 
				$act = 'active';
					foreach( $cats as $ct ) {
						
						?>
						<li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link <?= $act ?> category" data-toggle="tab" id="<?= $ct->id ?>" href="javascript:void(0)" role="tab" style="text-align: justify;	"><?= empty($ct->subcategory) ? $ct->category:$ct->subcategory ?><span style="float:right;padding-right: 53px;"><?= empty($ct->ar_subcategory) ? $ct->ar_category:$ct->ar_subcategory ?></span></a>
						</li>
						<?php
						$act = "";
					}
					?>
					
				
			</ul>
		</li>
	</ul>
</aside> -->
<aside class="widget woocommerce widget_product_categories electro_widget_product_categories catautoeg">
	<?php
//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 2;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
?>
 <div class="row" style="    margin-left: 0.4em;
    margin-right: 0;
">
		
				<?php 
				$act = 'active';
					foreach( $cats as $ct ) {
						
						?>
						 <div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn <?= $act ?> category" data-toggle="tab" id="<?= $ct->id ?>" href="javascript:void(0)" role="tab" style=" width: 100%;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
       line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="<?= $ct->id ?>" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;"><?= empty($ct->subcategory) ? $ct->category:$ct->subcategory ?><br><span><?= empty($ct->ar_subcategory) ? $ct->ar_category:$ct->ar_subcategory ?></span></a>
						</div>
					</div>
					<?php
    $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row nextrow" >';
						
						$act = "";

					}
					?>
					
				
		 </div> 

		<div class="filterbtn filterbtnser">Filter بحث متقدم
</div>
</aside>
