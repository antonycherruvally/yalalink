<div class="full-wrap bg-phonefilter">
	<div class="container">
		
				<div class="row bg_sec">
					<div class="row">
					
						<!--<div class="col col-md-3  col-sm-4 col-xs-4 mobrealpurpo">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat" name="category" id="category">
									<option value="">Type</option>
									<option value="Used">Used</option>
									<option value="Buy">New</option>
								</select>
							</div>
						</div>-->
						<div class="col col-md-3  col-sm-3 col-xs-3">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control typeoptauto" name="brand" id="brand">
									<option value="">Brand</option>
									<?php $brand = getBrands('P'); 
												if($brand){ foreach($brand as $val){?>
										<option value="<?php echo $val->id ?>">
											<?php echo $val->name; ?>
										</option>
										<?php }} ?>
								</select>
							</div>
						</div>
						<div class="col col-md-3  col-sm-3 col-xs-3">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="model" id="model" placeholder="model">
							</div>
						</div>
						<div class="col col-md-3  col-sm-3 col-xs-3">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control typeoptauto" name="age" id="age">
									<option value=""> Age</option>
									<?php $age = array('Brand New','0-1 month','1-6 months','6-12 months','1-2 years','2-5 years','5-10 years','10+ years');
										foreach ($age as $val) { ?>
										<option value="<?php echo $val; ?>">
											<?php echo $val; ?>
										</option>
										<?php } ?>
								</select>
							</div>
						</div>
					
					
						<div class="col col-md-3  col-sm-3 col-xs-3">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd phoneclr" style="margin-top: -1px;">
								<select class="form-control typeoptauto" name="color" id="color">
									<option value=""> Color</option>
									<?php $color = getColors(); 
						if($color){ foreach($color as $val){?>
										<option value="<?php echo $val->name ?>">
											<?php echo $val->name; ?>
										</option>
										<?php }} ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<select class="form-control typeoptauto" name="touchscreen" id="touchscreen">
									<option value="">Touchscreen</option>
									<option value="Yes">Yes</option>
									<option value="No">No</option>
								</select>
							</div>
						</div>
                        <div class="col col-md-3  col-sm-4 col-xs-4 mobcity">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
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
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="max_price" id="max_price" placeholder="Max_price">
							</div>
						</div>
						<div class="col col-md-3  col-sm-6 col-xs-6">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="min_price" id="min_price" placeholder="Min_price" style="margin-left: 0px;">
							</div>
						</div>
						
							<!--<div class="col col-md-3  col-sm-4 col-xs-4 mobrealloc">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="location" id="location" placeholder="Location">
								</div>
							</div>-->
							<div class="col col-md-3  col-sm-12 col-xs-12">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd classikey">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt fullkeywid" name="keyword" id="keyword" placeholder="Key Word">
								</div>
							</div>
							<div class="col col-md-3  col-sm-6 col-xs-6">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="searchPhoneFilter" style="width:237px; color:white">Find</button>
								</div>
							</div>
							<div class="col col-md-3  col-sm-6 col-xs-6">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="submit" onclick="clearSearchPhone()" style="width:237px; color:white">Clear Filter</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		