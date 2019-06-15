<?php
// $auto = Core::getModel('auto');
// $rs = $auto->search([
// 	"purpose" => Used,
//     "category" => 1,
//     "brand" => 74,
//     "model" => 573
// ]);
// Core::log( $rs );
?>
<div class="full-wrap bg-autofilter">
	<div class="container">
		
		<div class="row">
			
				<div class="row bg_sec bgsecauto" >
					
						<!--<div class="col col-md-3  col-sm-4 col-xs-4 mobrealpurpo">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat typeoptauto" name="category" id="auto_purpose">
									<option value="null">Type</option>
									<option value="Used">Used</option>
									<option value="New">New</option>
								</select>
							</div>
						</div>-->
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat typeoptauto" name="category" id="auto_property_type" style="    padding-top: 1px;">
									<option value="">Category</option>
									<option value="1">Cars</option>
									<option value="2">Boats & Yachts</option>
									<option value="3">Trucks & Trailers</option>
									<option value="4">Motorcycles</option>
									<option value="5">VIP Numbers</option>
									<option value="893">VIP Numbers</option>
								</select>
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat typeoptauto" name="auto_brand" id="auto_brand">
									<option value="">Brand</option>
								</select>
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat typeoptauto" name="auto_model" id="auto_model">
									<option value="">Model</option>
								</select>
							</div>
						</div>
					
					
                    
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd citypc">
								<select class="form-control filtercat typeoptauto" name="year" id="auto_minyear">
									<option value="">Min. Year</option>
									<?php 
										$earliest_year = 1900;
										foreach ( range(date('Y'), $earliest_year) as $x ) { ?>
											<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<select class="form-control filtercat typeoptauto" name="year" id="auto_maxyear">
									<option value="">Max. Year</option>
									<?php 
										$earliest_year = 1900;
										foreach ( range(date('Y'), $earliest_year) as $x ) { ?>
											<option value="<?php echo $x; ?>"><?php echo $x; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
                        <div class="col col-md-3  col-sm-4 col-xs-4 mobcity">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<select class="form-control filtercat typeoptauto" name="city" id="location" style=" padding-top: 1px;">
									<option value="">City</option>
								<?php
									$location = Core::getHelper('location');
									$cities = $location->getCities();
									foreach( $cities as $ct ) {
										?>
										<option value="<?= $ct->id ?>"><?= $ct->location ?></option>
										<?php
									}
								?>
								</select>
							</div>
						</div>
                        <div class="col col-md-3  col-sm-4 col-xs-4 mobarea">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
<select class="form-control filtercat typeoptauto" name="area" id="area">
									<option value="">Area</option>
								</select>							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="max_price" id="auto_max_price" placeholder="Max_price">
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="min_price" id="auto_min_price" placeholder="Min_price">
							</div>
						</div>
                    
                        
						
							<!--<div class="col col-md-3  col-sm-4 col-xs-4 mobrealloc">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd ">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="location" id="cls_location" placeholder="Location">
								</div>
							</div>-->
							<div class="col col-md-3  col-sm-12 col-xs-12">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt fullkeywid" name="keyword" id="cls_keyword" placeholder="Key Word">
								</div>
							</div>
							<div class="col col-md-3  col-sm-6 col-xs-6">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="button" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="btnSearchAuto" style="width: 100%; color:white">Find</button>
								</div>
							</div>
                             <div class="col col-md-2  col-sm-6 col-xs-6">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="button" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" onclick="clearAutoSearch()" id="btnClear" style="width: 160%;; color:white">Clear Filter</button>
									

								</div>
							</div>
						
				</div>
			</div>
		</div>
	</div>
</div>