<div class="full-wrap bg-electfilter">
	<div class="container">
		<div class="row">
			
				<div class="row bg_sec">
				
						<!--<div class="col col-md-3  col-sm-4 col-xs-4 mobrealpurpo">
						<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat electcat" name="category" id="elt_purpose">
									<option value="">Select</option>
									<option value="Used">Used</option>
									<option value="New">New</option>
								</select>
							</div>
						</div>-->
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat electcat" name="category" id="elt_category">
									<option value="">Category</option>
									<?php $category = getElectronicsCategories(); 
										if($category){ foreach($category as $val){?>
										<option value="<?php echo $val->id ?>">
											<?php echo $val->category; ?>
										</option>
										<?php }} ?>
								</select>
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat electcat" name="age" id="elt_age">
									<option value="">Age</option>
									<?php $age = array('Brand New','0-1 month','1-6 months','6-12 months','1-2 years','2-5 years','5-10 years','10+ years');
										foreach ($age as $val) { ?>
										<option value="<?php echo $val; ?>">
											<?php echo $val; ?>
										</option>
										<?php } ?>
								</select>
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4 mobrealpurpo">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat electcat" name="usage" id="elt_usage" >
									<option value="">Usage</option>
									<?php $usage = array('Still in original packaging','Out of original packaging, but only used once','Used only a few times','Used an average amount, as frequently as would be expected','Used an above average amount since purchased');
											foreach ($usage as $val) { ?>
										<option value="<?php echo $val; ?>">
											<?php echo $val; ?>
										</option>
										<?php } ?>
								</select>
							</div>
						</div>
					
					
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd citypc">
								<select class="form-control filtercat electcat elctmob" name="condition" id="elt_condition">
									<option value="">Condition</option>
									<?php $condition = array('Perfect inside and out','Almost no noticeable problems or flaws','A bit of wear and tear, but in good working condition','Normal wear and tear for the age of the item, a few problems here and there','Above average wear and tear.  The item may need a bit of repair to work properly');
										foreach ($condition as $val) { ?>
										<option value="<?php echo $val; ?>">
											<?php echo $val; ?>
										</option>
										<?php } ?>
								</select>
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<select class="form-control filtercat electcat" name="warranty" id="elt_warranty">
									<option value="">Warranty</option>
									<?php $warranty = array('Yes','No','Does not apply');
										foreach ($warranty as $val) { ?>
										<option value="<?php echo $val; ?>">
											<?php echo $val; ?>
										</option>
										<?php } ?>
								</select>
							</div>
						</div>
                        <div class="col col-md-3  col-sm-4 col-xs-4 mobcity">
							<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="City" data-allow-clear="true" name="category" id="location" style="border-radius: inherit;">
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
                        <div class="col col-md-3  col-sm-4 col-xs-4 mobarea">
							<select class="form-control filtercat electcat" name="category" id="area">
								<option value="">Area</option>
							</select>
						</div>
						<!-- <div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice electcat" name="max_price" id="elt_max_price" placeholder="Max_price">
							</div>
						</div> -->
						<!-- <div class="col col-md-3  col-sm-8 col-xs-8">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice electcat" name="min_price" id="elt_min_price" placeholder="Min_price">
							</div>
						</div>
						 -->
							<!--<div class="col col-md-3  col-sm-4 col-xs-4">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd electkey">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice electcat electlocmob" name="location" id="elt_location" placeholder="Location">
								</div>
							</div>-->
							<div class="col col-md-3  col-sm-12 col-xs-12">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd electkey">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice electcat electkeymob" name="keyword" id="elt_keyword" placeholder="Key Word">
								</div>
							</div>
							<div class="col col-md-3  col-sm-8 col-xs-8">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice electcat" name="min_price" id="elt_min_price" placeholder="Min_price">
							</div>
						</div>
						<div class="col col-md-3  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice electcat" name="max_price" id="elt_max_price" placeholder="Max_price">
							</div>
						</div>
						

							<div class="col col-md-3  col-sm-6 col-xs-6">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="button" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub electsub" id="searchElectronics" style="width:237px; color:white">Find</button>
								</div>
							</div>
							<div class="col col-md-3  col-sm-6 col-xs-6">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="button" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub electsub" onclick="clearSearchElectro()" id="clearFilter" style="width:237px; color:white">Clear Filter</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		