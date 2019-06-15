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
							<a class="nav-link active category" data-toggle="tab" id="4" href="javascript:void(0)" role="tab" style="text-align: justify;">Villas<span style="float:right;    padding-right: 33px;">فلل  
							</span></a>
						</li>
                        <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="7" href="javascript:void(0)" role="tab" style="text-align: justify;">Lands<span style="float:right;    padding-right: 33px;">أراضي   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="5" href="javascript:void(0)" role="tab" style="text-align: justify;">Apartments<span style="float:right;    padding-right: 33px;">شقق   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="6" href="javascript:void(0)" role="tab" style="text-align: justify;">Offices<span style="float:right;padding-right: 33px;">مكاتب   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="12" href="javascript:void(0)" role="tab" style="text-align: justify;">Showrooms<span style="float:right; padding-right: 33px;">معارض    </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="9" href="javascript:void(0)" role="tab" style="text-align: justify;">Shops<span style="float:right;    padding-right: 33px;">محلات   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="10" href="javascript:void(0)" role="tab" style="text-align: justify;">Warehouse<span style="float:right;    padding-right: 33px;">مستودعات   </span></a>
						</li>
                         <li class="nav-item mainpage categorywid" style="height: 28px;">
							<a class="nav-link category" data-toggle="tab" id="11" href="javascript:void(0)" role="tab" style="text-align: justify;">Labour camps<span style="float:right;    padding-right: 33px;">سكن عمال  </span></a>
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
							<div class="sidenewbtn nav-link active category" data-toggle="tab" id="4" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        text-align: -webkit-center;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="4" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Villas<br><span style="    margin: inherit;">فلل  </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link category" data-toggle="tab" id="7" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        text-align: -webkit-center;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="7" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Lands<br><span style="    margin: inherit;">أراضي   </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link  category" data-toggle="tab" id="5" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        text-align: -webkit-center;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="5" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Apartments<br><span style="    margin: inherit;">شقق  </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link  category" data-toggle="tab" id="6" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        text-align: -webkit-center;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="6" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Offices<br><span style="    margin: inherit;">مكاتب   </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link  category" data-toggle="tab" id="12" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        text-align: -webkit-center;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="12" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Showrooms<br><span style="    margin: inherit;">معارض   </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link  category" data-toggle="tab" id="9" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        text-align: -webkit-center;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="9" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Shops<br><span style="    margin: inherit;">محلات   </span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link  category" data-toggle="tab" id="10" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        text-align: -webkit-center;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="10" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Warehouse<br><span style="    margin: inherit;">مستودعات</span></a>
						</div>
					</div>
					<div class="col-sm-<?php echo $bootstrapColWidth; ?> col-xs-<?php echo $bootstrapColWidth; ?> ">
							<div class="sidenewbtn nav-link  category" data-toggle="tab" id="11" href="javascript:void(0)" role="tab" style=" width: 87px;
    font-size: 10px;
   
    margin-bottom: 6px;
    margin-left: -16px;
    font-weight: 700;
        box-shadow: 2px 2px 4px 0px grey;
        text-align: -webkit-center;
        line-height: 12px;
    height: 34px;
    padding-top: 5px;">
							<a class="nav-link" data-toggle="tab" id="11" href="javascript:void(0)" role="tab" style="margin-left: -11px;display: initial;">Labour camps<br><span style="    margin: inherit;">سكن عمال   </span></a>
						</div>
					</div>
					<?php
    $rowCount++;
    if($rowCount % $numOfCols == 0) echo '</div><div class="row nextrow" >';
						
						$act = "";

					// }
					?>
					
				
		 </div> 

		<div class="filterbtn filterbtnreal">Filter بحث متقدم
</div>
</aside>