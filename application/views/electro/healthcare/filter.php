<div class="full-wrap bg-classifilter">
	<div class="container">
		<div class="row">
			<div class="row bg_sec bg_classi">
				<div class="col col-md-4  col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select">
						<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="Choose Area" data-allow-clear="true" name="category" id="type" style="border-radius: inherit;">
							<option value="">Type</option>
							<option value="Hospitals">Hospitals</option>
							<option value="Clinics">Clinics</option>
							<option value="Dental Hospitals">Dental Hospitals</option>
							<option value="Dentist">Dentist</option>
						</select>
					</div>
				</div>
				<div class="col col-md-4  col-sm-4 col-xs-4" style="margin-top: 2.50%;">
					<div class="form-group select-box-search bmd-form-group mat-select filterpadd wbkey">
						<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="keyword" id="keyword" placeholder="keyword">
					</div>
				</div>
				<div class="col col-md-4  col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select">
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
				<div class="col col-md-6 col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
						<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="Choose Area" data-allow-clear="true" name="category" id="area" style="border-radius: inherit;">
							<option value="">Area</option>
						</select>
					</div>
				</div>
				
				<div class="col col-md-3  col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
						<button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="searchHealthcare" style="width:237px; color:white">Find</button>
					</div>
				</div>
				<div class="col col-md-3  col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
						<button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="clearFilter" onclick="clearFilter()" style="width:237px; color:white">Clear Filter</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>