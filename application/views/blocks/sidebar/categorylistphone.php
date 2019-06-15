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
							<a class="nav-link active category" data-toggle="tab" id="0" href="javascript:void(0)" role="tab" style="text-align: justify;">All<span style="float:right;    padding-right: 48px;">الجميع</span></a>
						</li>
                        <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="61" href="javascript:void(0)" role="tab" style="text-align: justify;">I phone<span style="float:right;    padding-right: 48px;">ايفون  </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="2" href="javascript:void(0)" role="tab" style="text-align: justify;">Samsung<span style="float:right;    padding-right: 48px;">سامسونج   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="73" href="javascript:void(0)" role="tab" style="text-align: justify;">Nokia<span style="float:right;padding-right: 48px;">نوكيا   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="72" href="javascript:void(0)" role="tab" style="text-align: justify;">Motorola<span style="float:right; padding-right: 48px;">موتورولا  </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="75" href="javascript:void(0)" role="tab" style="text-align: justify;">Oppo<span style="float:right;    padding-right: 48px;">اوبو  </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="80" href="javascript:void(0)" role="tab" style="text-align: justify;">Sony<span style="float:right;    padding-right: 48px;">سوني   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="82" href="javascript:void(0)" role="tab" style="text-align: justify;">Xiaomi<span style="float:right;    padding-right: 48px;">شايومي</span></a>
						</li>
                        <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="1" href="javascript:void(0)" role="tab" style="text-align: justify;">Lg<span style="float:right;    padding-right: 48px;"> إل جي  </span></a>
						</li>
						<?php
						/*$act = "";
					}*/
					?>
					
				
			</ul>
		</li>
	</ul>
</aside> --> 

<aside class="widget woocommerce widget_product_categories electro_widget_product_categories catautoeg">
	<?php
//Columns must be a factor of 12 (1,2,3,4,6,12)
$numOfCols = 4;
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
							<div class="sidenewbtn nav-link active category" data-toggle="tab" id="0" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="0" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">All<br><span style="margin: inherit;"> الجميع </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="61" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="61" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">I phone<br><span style="margin: inherit;">آيفون</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="2" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="2" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Samsung <br><span style="margin: inherit;">سامسونج</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="73" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="73" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Nokia<br><span style="margin: inherit;">نوكيا</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="72" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="72" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Motorola<br><span style="margin: inherit;">موتورولا</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="75" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="75" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Oppo<br><span style="margin: inherit;">اوبو</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="80" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="80" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Sony<br><span style="margin: inherit;">سوني    </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="1" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="1" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Lg<br><span style="margin: inherit;">ال جي </span></a>
						</div>
					</div>
					<?php
    $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row nextrow" >';
						
						$act = "";

					// }
					?>
					
				
		 </div> 

		<div class="filterbtn filterbtnphone">Filter بحث متقدم
</div>
</aside>