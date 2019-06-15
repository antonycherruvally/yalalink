<!-- <aside class="widget woocommerce widget_product_categories electro_widget_product_categories categ">
	<ul class="product-categories category-single">
		<li class="product_cat">
			<ul class="show-all-cat">
				<!--<li class="cat-item current-cat">
					<a href="javascript:void(0)">Category &nbsp;&nbsp;الفئة</a> 
				</li>-->
			<!-- </ul>
			<ul class='children' style="padding:unset !important;">
				<?php 
				/*$act = 'active';
					foreach( $cats as $ct ) {*/
						
						?>
						<li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link active category" data-toggle="tab" id="6" href="javascript:void(0)" role="tab" style="text-align: justify;">Lap & notebook<span style="float:right;    padding-right: 48px;">لابتوب و اجهزة لوحية   </span></a>
						</li>
                        <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="2" href="javascript:void(0)" role="tab" style="text-align: justify;">Computers & Servers<span style="float:right;    padding-right: 48px;">  كمبيوترات و سيرفرات   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="3" href="javascript:void(0)" role="tab" style="text-align: justify;">Parts & Components<span style="float:right;    padding-right: 48px;">قطع و ادوات   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="4" href="javascript:void(0)" role="tab" style="text-align: justify;">Networking<span style="float:right;padding-right: 48px;">شبكات   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="5" href="javascript:void(0)" role="tab" style="text-align: justify;">Printer & Scanners<span style="float:right; padding-right: 48px;"> طابعات و ماسحات  </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="1" href="javascript:void(0)" role="tab" style="text-align: justify;">PC & Lap Accessories<span style="float:right;    padding-right: 48px;"> اكسسوارات   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="7" href="javascript:void(0)" role="tab" style="text-align: justify;">Software<span style="float:right;    padding-right: 48px;">برامج  </span></a>
						</li>
                        
						<?php
						/*$act = "";
					}*/
					?>
					
				
			</ul>
		</li>
	</ul>
</aside>  -->
<aside class="widget woocommerce widget_product_categories electro_widget_product_categories catautoeg">
	<?php
//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 3;
$rowCount = 0;
$bootstrapColWidth = 12 / $numOfCols;
?>
 <div class="row" style="    margin-left: 0.4em;
    margin-right: 0;
">
		
				<?php 
				$act = 'active';
					// foreach( $cats as $ct ) {
						
						?>
						 <div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link active category" data-toggle="tab" id="6" href="javascript:void(0)" role="tab" style="width: 112%;
    font-size: 9px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="6" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Lap & notebook<br><span style="margin: inherit;"> لابتوب و اجهزة لوحية     </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="2" href="javascript:void(0)" role="tab" style=" width: 112%;

    font-size: 9px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="2" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Computers & Servers<br><span style="margin: inherit;">كمبيوترات و سيرفرات</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="3" href="javascript:void(0)" role="tab" style=" width: 112%;

    font-size: 9px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="3" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Parts & Components <br><span style="margin: inherit;">قطع و ادوات</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="4" href="javascript:void(0)" role="tab" style=" width: 112%;

    font-size: 9px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="4" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Networking<br><span style="margin: inherit;">شبكات</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="5" href="javascript:void(0)" role="tab" style=" width: 112%;

    font-size: 9px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="5" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Printer & Scanners<br><span style="margin: inherit;">طابعات و ماسحات</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="1" href="javascript:void(0)" role="tab" style=" width: 112%;

    font-size: 9px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="1" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">PC & Lap Accessories<br><span style="margin: inherit;">اكسسوارات</span></a>
						</div>
					</div>
					<div class="col-sm-12 col-xs-12 ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="7" href="javascript:void(0)" role="tab" style=" width: 112%;

    font-size: 9px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="7" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Software<br><span style="margin: inherit;">برامج</span></a>
						</div>
					</div>
					
					<?php
    $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row nextrow" >';
						
						$act = "";

					// }
					?>
					
				
		 </div> 

		<div class="filterbtn filterbtncomp">Filter بحث متقدم
</div>
</aside>