<div class="full-wrap bg-filter">
	<div class="container">
		<div class="row">
			<div class="col-md-12" style="padding: 11px 120px 29px 67px;">
				<div class="row bg_sec" >
					<div class="col-md-12">
						<div class="col-md-3">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat" name="category" id="purpose">
									<option value="rent">Rent</option>
									<option value="buy">Buy</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat" name="property_type" id="property_type">
									<option value="">Property Type</option>
									<?php 
										$category = getRealEstateCategory(); 
										if($category){ 
											foreach($category as $val){
												$selected = '';
												if($this->input->get('property-type') == $val->id){
													$selected = 'selected';
												}
									?>
											<option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->subcategory; ?></option>
									<?php 
											} 
										} 
									?>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat" name="price_per" id="price_per">
									<option value="">Year/Month</option>
									<option value="Year">Year</option>
									<option value="Month">Month</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group select-box-search bmd-form-group mat-select">
								<select class="form-control filtercat" name="bedroom" id="bedroom">
									<option value="">Select Bedrooms</option>
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
					</div>
					<div class="col-md-12">
						<div class="col-md-3">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="max_price" id="max_price" placeholder="Max.Price">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="min_price" id="min_price" placeholder="Min.Price">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="max_area" id="max_area" placeholder="Max_area">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
								<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="min_area" id="min_area" placeholder="Min_area">
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-4">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="location" id="location" placeholder="Location">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="keyword" id="keyword" placeholder="Key Word">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
									<button type="button" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="btnAdvanceSearch" style="width:237px; color:white">Find</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>