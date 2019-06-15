<div class="full-wrap bg-classifilter">
	<div class="container">
		<div class="row">
			<div class="row bg_sec bg_classi">
				<div class="col col-md-3  col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select">
						<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="Choose Area" data-allow-clear="true" name="category" id="purpose" style="border-radius: inherit;">
							<option value="">Type</option>
							<option value="Domestic">Domestic</option>
							<option value="Abroad">Abroad</option>
						</select>
					</div>
				</div>
				<div class="col col-md-3  col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select">
						<select class="form-control filtercat typeoptauto" name="category" id="experience">
							<option value="">Experience</option>
							<option value="0-1 Year">0-1 Year</option>
							<option value="1-2 Years">1-2 Years</option>
							<option value="2-3 Years">2-3 Years</option>
							<option value="3-4 Years">3-4 Years</option>
							<option value="4-5 Years">4-5 Years</option>
							<option value="5-6 Years">5-6 Years</option>
							<option value="6-7 Years">6-7 Years</option>
							<option value="7-8 Years">7-8 Years</option>
							<option value="8-9 Years">8-9 Years</option>
							<option value="9-10 Years">9-10 Years</option>
							<option value="10+ Years">10+ Years</option>
						</select>
					</div>
				</div>
				<div class="col col-md-3  col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select">
						<select class="form-control typeoptauto" data-plugin="select2" data-placeholder="Choose Category" data-allow-clear="true" name="category" id="location" style="border-radius: inherit;">
							<option value="">Location</option>
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
				<div class="col col-md-3  col-sm-4 col-xs-4">
					<div class="form-group select-box-search bmd-form-group mat-select">
						<select class="form-control typeoptauto areahouse" data-plugin="select2" data-placeholder="Choose Area" data-allow-clear="true" name="category" id="area" style="border-radius: inherit;">
							<option value="">Area</option>
						</select>
					</div>
				</div>
				<div class="col col-md-6  col-sm-6 col-xs-8" style="margin-top: 2.50%;">
					<div class="form-group select-box-search bmd-form-group mat-select filterpadd housekey">
						<input type="text" class="form-control no-border mat-txt mat-font first-txt searchprice" name="keyword" id="keyword" placeholder="keyword">
					</div>
				</div>
				<div class="col col-md-3  col-sm-6 col-xs-6">
					<div class="form-group select-box-search bmd-form-group mat-select filterpadd">
						<button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit filt-sub" id="searchHousemaids" style="width:237px; color:white">Find</button>
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