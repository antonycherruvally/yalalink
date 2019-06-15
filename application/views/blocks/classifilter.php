<div class="full-wrap bg-classifilter">
	<div class="container">
		<div class="row">
			
			<div class="row bg_sec bg_classi" >
		 

   <!-- <div class="col col-md-2  col-sm-4 col-xs-4 mobrealpurpo">
   
		<div class="form-group select-box-search bmd-form-group mat-select">
			<select class="form-control filtercat typeoptauto" name="category" id="cls_purpose">
				<option value="Used">Used</option>
				<option value="New">New</option>
			</select>
		</div>
	</div>-->
	<div class="col col-md-3  col-sm-4 col-xs-4">
		<div class="form-group select-box-search bmd-form-group mat-select">
			<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="Choose Category" data-allow-clear="true" name="category" id="cls_category" style="border-radius: inherit;">
				<option value="">Category</option>
				<?php $category = getClassifiedsCategories(); 
						if($category){ 
						foreach($category as $val){
							$selected = '';
						if($this->input->get('sub-category') == $val->id){
							$selected = 'selected';
						}  ?>
					<option value="<?php echo $val->id ?>" <?php echo $selected; ?>>
						<?php echo $val->category; ?>
					</option>
					<?php }} ?>
			</select>
		</div>
	</div>
		<div class="col col-md-3  col-sm-4 col-xs-4">
			<div class="form-group select-box-search bmd-form-group mat-select">
				<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="Choose Category" data-allow-clear="true" name="category" id="cls_sub_category" style="border-radius: inherit;">
					<option value="">Sub Category</option>
				</select>
			</div>
		</div>
	<div class="col col-md-3  col-sm-4 col-xs-4">
		<div class="form-group select-box-search bmd-form-group mat-select">
			<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="City" data-allow-clear="true" name="category" id="cls_location" style="border-radius: inherit;">
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

	 <div class="col col-md-3  col-sm-4 col-xs-4 mobcity">
		<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
			<select class="form-control filtercat typeoptauto classicity" name="city" id="cls_area">
				<option value="">Area</option>
			</select>
		</div>
	</div>
		<div class="col-md-2 col-sm-4 col-xs-4">
			<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
				<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice classimprice" name="price" id="minPrice" placeholder="Min. Price">
			</div>
		</div>
		<div class="col-md-2 col-sm-4 col-xs-4">
			<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
				<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice classimprice" name="maxPrice" id="maxPrice" placeholder="Max. Price">
			</div>
		</div>
													 
													

   <!-- <div class="col col-md-3  col-sm-4 col-xs-12">
		<div class="form-group select-box-search bmd-form-group mat-select filterpadd classiloc">
			<input type="text" class="form-control no-border mat-txt mat-font first-txt fullkeywid" name="location" id="location" placeholder="Location">
		</div>
	</div>-->
	<div class="col col-md-2  col-sm-4 col-xs-12">
		<div class="form-group select-box-search bmd-form-group mat-select filterpadd classikey">

			<input type="text" class="form-control no-border mat-txt mat-font first-txt fullkeywid" name="keyword" id="cls_keyword" placeholder="Key Word">
		</div>
	</div>
	<div class="col col-md-3  col-sm-6 col-xs-6">
		<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
			<button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="searchClassifieds" style="width:237px; color:white">Find</button>
		</div>
	</div>
	<div class="col col-md-3  col-sm-6 col-xs-6">
		<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
			<button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="clearFilter" onclick="clsClearFilter()" style="width:237px; color:white">Clear Filter</button>
		</div>
	</div>

										
			</div>
		 </div>
		</div>
	</div>
	