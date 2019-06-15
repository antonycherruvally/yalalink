<!-- <aside class="widget woocommerce widget_product_categories electro_widget_product_categories categ">
 --><!-- 	<ul class="product-categories category-single">
		<li class="product_cat">
			<ul class="show-all-cat">
				<!--<li class="cat-item current-cat">
					<a href="javascript:void(0)">Category &nbsp;&nbsp;الفئة</a> 
				</li>-->
			<!-- /ul>
			<ul class='children' style="padding:unset !important;">
				<?php 
				/*$act = 'active';
					foreach( $cats as $ct ) {*/
						
						?>
						<li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link active category" data-toggle="tab" id="0" href="javascript:void(0)" role="tab" style="text-align: justify;">All<span style="float:right;    padding-right: 48px;">الجميع   </span></a>
						</li>
                        <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="90" href="javascript:void(0)" role="tab" style="text-align: justify;">Pc<span style="float:right;    padding-right: 48px;">كمبيوترات   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="91" href="javascript:void(0)" role="tab" style="text-align: justify;">Laptop<span style="float:right;    padding-right: 48px;">لاب توب   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="8" href="javascript:void(0)" role="tab" style="text-align: justify;">Home Theatre<span style="float:right;padding-right: 48px;">مسرح منزلي   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="42" href="javascript:void(0)" role="tab" style="text-align: justify;">TV<span style="float:right; padding-right: 48px;">تلفاز   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="39" href="javascript:void(0)" role="tab" style="text-align: justify;">Speakers<span style="float:right;    padding-right: 48px;">سماعات    </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="59" href="javascript:void(0)" role="tab" style="text-align: justify;">Refrigerator<span style="float:right;    padding-right: 48px;">ثلاجات    </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="77" href="javascript:void(0)" role="tab" style="text-align: justify;">Washing machine<span style="float:right;    padding-right: 48px;">غسالات   </span></a>
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
							<a class="nav-link" data-toggle="tab" id="42" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">All<br><span style="margin: inherit;"> الجميع </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link  category" data-toggle="tab" id="90" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="<?= $ct->id ?>" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Pc<br><span style="margin: inherit;">كمبيوترات</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="91" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="91" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Laptop <br><span style="margin: inherit;">لاب توب</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="8" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="8" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Home Theatre<br><span style="margin: inherit;">مسرح منزلي   </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="42" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="42" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">TV<br><span style="margin: inherit;">تلفاز   </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="<?= $ct->id ?>" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="39" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Speakers<br><span style="margin: inherit;">سماعات </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="<?= $ct->id ?>" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="59" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Refrigerator<br><span style="margin: inherit;">ثلاجات</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="<?= $ct->id ?>" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="77" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Wash. machine<br><span style="margin: inherit;">غسالات</span></a>
						</div>
					</div>
					<?php
    $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row nextrow" >';
						
						$act = "";

					// }
					?>
					
				
		 </div> 

		<div class="filterbtn filterbtnelect">Filter بحث متقدم
</div>
</aside>