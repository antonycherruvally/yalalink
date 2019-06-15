<div class="full-wrap bg-computerfilter">
	<div class="container">
		<div class="row">
			
				<div class="row bg_sec">
					<div class="row">
					
						<!--<div class="col col-md-2  col-sm-4 col-xs-4 mobrealpurpo">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat electcat" name="category" id="cmp_purpose">
									<option value="">Select</option>
									<option value="Used">Used</option>
									<option value="New">New</option>
								</select>
							</div>
						</div>-->
						<div class="col col-md-2  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select" >
								<select class="form-control typeoptauto" name="category" id="computer_category" style="border-radius:inherit !important">
                        <option value="">Category</option>
                        <?php $category = getComputersCategories(); if($category){ foreach($category as $val){  
						$selected = '';
						if($this->input->get('subcategory') == $val->category){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->id ?>" <?php echo $selected; ?>><?php echo $val->category; ?></option>
                        <?php }} ?>
                      </select>
							</div>
						</div>
						<div class="col col-md-2  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select" >
								<select class="form-control typeoptauto" name="subcategory" id="computer_subcategory" style="border-radius:inherit !important">
                        <option value="">Sub Category:</option>
                      </select>
						</div>
                        </div>
						<div class="col col-md-2  col-sm-4 col-xs-4">
							<div class="form-group select-box-search bmd-form-group mat-select">
								 <select class="form-control hard typeoptauto" name="brand" id="hd_brand" style="border-radius:inherit;">
                        <option value="">Brands</option>
                         <option value="0">ALL</option>
                        <?php $hd_brand = getBrands('HD'); 
						if($hd_brand){ foreach($hd_brand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
							</div>
						</div>
                        <div class="col col-md-2  col-sm-4 col-xs-4 mobcity">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd citypc">
								<select class="form-control filtercat typeoptauto" name="city" id="location">
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
                         <div class="col col-md-2  col-sm-4 col-xs-4 mobarea">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd citypc">
								<select class="form-control filtercat typeoptauto" name="area" id="area">
									<option value="">Area</option>
								</select>
							</div>
						</div>
					<div class="col col-md-2  col-sm-4 col-xs-4">
								<div class="form-group select-box-search bmd-form-group mat-select filterpaddcomp">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice compcity" name="location" id="min_price" placeholder="Min.price">
								</div>
							</div>
						</div>
                           <div class="col col-md-2  col-sm-4 col-xs-4">
								<div class="form-group select-box-search bmd-form-group mat-select filterpaddcomp">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="location" id="max_price" placeholder="max.price">
								</div>
							</div>  
					
							<!--<div class="col col-md-3  col-sm-6 col-xs-6 mobrealloc">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd electkey">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice electcat" name="location" id="cmp_location" placeholder="Location">
								</div>
							</div>-->
							<div class="row">
							 <div class="col col-md-3  col-sm-8 col-xs-8">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd electkey">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt fullkeywidcomp" name="keyword" id="cmp_keyword" placeholder="Key Word">
								</div>
							</div> 
							 <div class="col col-md-3  col-sm-6 col-xs-6">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="button" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="searchComputers" style="width:237px; color:white">Find</button>
								</div>
							</div> 
							<div class="col col-md-3  col-sm-6 col-xs-6">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="button" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" onclick="clearSearchComputer()" id="clearFilter" style="width:237px; color:white">Clear Filter</button>
								</div>
							</div> 
						</div>
						</div>
					</div>
				</div>
			</div>
		