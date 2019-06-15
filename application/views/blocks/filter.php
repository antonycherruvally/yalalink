<div class="full-wrap bg-filter">
	<div class="container">
		
			
				<div class="row bg_sec" >
					<!--<div class="col col-md-3  col-sm-4 col-xs-4 mobrealpurpo">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat typeoptauto" name="category" id="purpose">
									<option value="">Type</option>
									<option value="rent">Rent</option>
									<option value="buy">Buy</option>
								</select>
							</div>
						</div>-->
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat typeoptauto" name="property_type" id="property_type" style="padding-top: 1px;">
									<option value="">Type</option>
									<option value="8">Villas</option>
									<option value="8">Lands</option>
									<option value="4">Apartments</option>
									<option value="5">Showrooms</option>
									<option value="0">Shops</option>
									<option value="6">Wearhouse</option>
									<option value="6">Labour camps</option>
								</select>
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select mobpadfilter">
								<select class="form-control filtercat typeoptauto" name="price_per" id="price_per">
									<option value="">Yr/Mnth</option>
									<option value="Year">Year</option>
									<option value="Month">Month</option>
								</select>
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select mobpadfilter">
								<select class="form-control filtercat typeoptauto" name="bedroom" id="bedroom">
									<option value="">Bedrooms</option>
									<option value="Studio">Studio</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="5+">5+</option>
								</select>
							</div>
						</div>
					<div class="col col-md-3  col-sm-4 col-xs-4 mobcity">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd citypc">
								<select class="form-control filtercat typeoptauto" name="city" id="city">
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
								</select>
							</div>
						</div>
					<div class="col col-md-3  col-sm-4 col-xs-4 ">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="max_price" id="max_price" placeholder="Max.Price">
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="min_price" id="min_price" placeholder="Min.Price">
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="max_area" id="max_area" placeholder="Max_area">
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="min_area" id="min_area" placeholder="Min_area">
							</div>
						</div>
                       
						<!--<div class="col col-md-3  col-sm-6 col-xs-6 mobrealloc">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="location" id="location" placeholder="Location">
								</div>
							</div>-->
							<div class="col col-md-3  col-sm-12 col-xs-12">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt fullkeywid" name="keyword" id="keyword" placeholder="Keyword">
								</div>
							</div>
							<div class="col col-md-3  col-sm-6 col-xs-6">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="button" class="btn btn-raised btnAdvanceSearch hero-radius btn-FF9800 mat-submit filt-sub" id="btnAdvanceSearch" style="width: 100%; color:white">Find</button>
								</div>
							</div>
                           <div class="col col-md-2  col-sm-6 col-xs-6">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="button" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" onclick="clearSearchFields()" id="btnClear" style="width: 160%;; color:white">Clear Filter</button>
								</div>
							</div>
						
					</div>
				</div>
			</div>
		


