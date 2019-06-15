<div class="full-wrap bg-servicefilter">
	<div class="container">
		<div class="row">
			<div class="row bg_sec bg_classi">
				<div class="col col-md-3  col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select">
						<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="Choose Area" data-allow-clear="true" name="category" id="type" style="border-radius: inherit;">
							<option value="">Type</option>
							<option value="Maintenance">Maintenance</option>
							<option value="Services">Services</option>
						</select>
					</div>
				</div>
				<div class="col col-md-3 col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select">
						<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="Choose Area" data-allow-clear="true" name="category" id="category" style="border-radius: inherit;">
							<option value="">Category</option>
							<?php 
								$lists = getServicesCategories();
								foreach( $lists as $cat ) {
									?>
									<option value="<?= $cat->id ?>"><?= $cat->category ?></option>
									<?php
								}
							?>
						</select>
					</div>
				</div>
				<div class="col col-md-3  col-sm-4 col-xs-4" style="margin-top: 2.50%;">
					<div class="form-group select-box-search bmd-form-group mat-select filterpadd classikey servicekey">
						<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="keyword" id="keyword" placeholder="keyword">
					</div>
				</div>
				<div class="col col-md-3  col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select servicecity">
						<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="Choose Category" data-allow-clear="true" name="category" id="location" style="border-radius: inherit;">
							<option value="">City</option>
						<?php
							$country = Core::getModel('login')->getCountry();
							$db = Core::getHelper('db')->get('tbl_countries');
							$res = $db->where('parent_id', $country->id)->get();
							foreach( $res->result() as $rs ) {
								?>
								<option value="<?= $rs->id ?>"><?=$rs->location?></option>
								<?php
							}
						?>
						</select>
					</div>
				</div>
				<div class="col col-md-6  col-sm-6 col-xs-6">
					<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
						<select class="form-control typeoptservce " data-plugin="select2" data-placeholder="Choose Area" data-allow-clear="true" name="category" id="area" style="border-radius: inherit;">
							<option value="">Area</option>
						</select>
					</div>
				</div>
				
				<div class="col col-md-3  col-sm-6 col-xs-6">
					<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
						<button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="searchServices" style="width:237px; color:white">Find</button>
					</div>
				</div>
				<div class="col col-md-3  col-sm-6 col-xs-6">
					<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
						<button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="clearFilter" onclick="clearFilter()" style="width:237px; color:white">Clear Filter</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>