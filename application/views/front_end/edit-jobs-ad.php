<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$user_details = getUserDetails($userdata['userid']);?>

<div class="full-wrap bg-ad">
  <div class="container">
        <div class="row"  style="margin-top: 50px;border: 1px solid #4fc3c533;margin-bottom: 15px;padding: 18px;">

      <div class="col-md-12">
        <div class="post-ad-wrap">
          
            <h3 style="color:black;">Update Your Job Ad</h3>
            
              <form class="m-t-15" action="updateJobs" enctype="multipart/form-data" method="post" name="post-form" id="post-form">
                <input type="hidden" name="main_category" value="<?php echo $this->input->get('category'); ?>">
                <input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <label class="form-check-label mat-label-color" for="type">Choose Type:</label>
                   
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type_1" value="Hiring" <?php if($edit->type == 'Hiring'){ echo 'checked'; }?>>
                        I'm hiring </label>
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type_2" value="Looking"  <?php if($edit->type == 'Looking'){ echo 'checked'; }?>>
                        Looking for job </label>
                   
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label for="title_en" class="bmd-label-floating">Title in English:</label>
                      <input type="text" value="<?php echo $edit->title_en; ?>" class="form-control no-border mat-txt mat-font first-txt" name="title_en" id="title_en">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label for="title_ar" class="bmd-label-floating">Title in Arabic:</label>
                      <input type="text" value="<?php echo $edit->title_en; ?>" class="form-control no-border mat-txt mat-font first-txt" style="direction:rtl;" name="title_ar" id="title_ar">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="industry" class="bmd-label-floating mat-label-color">Choose Job Industry:</label>
                      <select class="form-control" name="industry" id="industry">
                        <option value="">Select Job Industry</option>
                        <?php $industry = getIndustry(); if($industry){ foreach($industry as $val){ 
						$selected = '';
						if($details->industry == $val->id){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->id ?>" <?php echo $selected; ?>><?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$val->title)))); ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="position" class="bmd-label-floating mat-label-color">Choose Job Position:</label>
                      <select class="form-control" name="position" id="position">
                        <option value="">Select Job Position</option>
                        <?php $positions = getPositions(); if($positions){ foreach($positions as $val){
						$selected = '';
						if($details->position == $val->id){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->id ?>" <?php echo $selected; ?>><?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$val->title)))); ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="level" class="bmd-label-floating mat-label-color">Choose Job Level:</label>
                      <select class="form-control" name="level" id="level">
                        <option value="">Select Job Level</option>
                        <option value="Internship" <?php if($details->bedroom == 1){ echo 'selected'; }?>>Internship</option>
                        <option value="Entry Level" <?php if($details->bedroom == 1){ echo 'selected'; }?>>Entry Level</option>
                        <option value="Associate" <?php if($details->bedroom == 1){ echo 'selected'; }?>>Associate</option>
                        <option value="Supervisory" <?php if($details->bedroom == 1){ echo 'selected'; }?>>Supervisory</option>
                        <option value="Mid-Senior Level" <?php if($details->bedroom == 1){ echo 'selected'; }?>>Mid-Senior Level</option>
                        <option value="Director" <?php if($details->bedroom == 1){ echo 'selected'; }?>>Director</option>
                        <option value="C-Suite" <?php if($details->bedroom == 1){ echo 'selected'; }?>>C-Suite</option>
                        <option value="Others" <?php if($details->bedroom == 1){ echo 'selected'; }?>>Others</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="job_type" class="bmd-label-floating mat-label-color">Choose Job Type:</label>
                      <select class="form-control" name="job_type" id="job_type">
                        <option value="">Select Job Type</option>
                        <option value="'Full-time'" <?php if($details->job_type == 'Full-time'){ echo 'selected'; }?>>Full-time</option>
                        <option value="Part-time" <?php if($details->job_type == 'Part-time'){ echo 'selected'; }?>>Part-time</option>
                        <option value="Contract" <?php if($details->job_type == 'Contract'){ echo 'selected'; }?>>Contract</option>
                        <option value="Temporary" <?php if($details->job_type == 'Temporary'){ echo 'selected'; }?>>Temporary</option>
                        <option value="Other" <?php if($details->job_type == 'Other'){ echo 'selected'; }?>>Other</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 hiring">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="qualification" class="bmd-label-floating mat-label-color">Choose Qualification:</label>
                      <select class="form-control hiring" name="qualification" id="qualification">
                        <option value="Any Qualification" <?php if($details->qualification == 'Any Qualification'){ echo 'selected'; }?>>Any Qualification</option>
                        <option value="High school or equivalent" <?php if($details->qualification == 'High school or equivalent'){ echo 'selected'; }?>>High school or equivalent</option>
                        <option value="Diploma" <?php if($details->qualification == 'Diploma'){ echo 'selected'; }?>>Diploma</option>
                        <option value="Bachelors degree" <?php if($details->qualification == 'Bachelors degree'){ echo 'selected'; }?>>Bachelors degree</option>
                        <option value="Masters degree" <?php if($details->qualification == 'Masters degree'){ echo 'selected'; }?>>Masters degree</option>
                        <option value="Doctorate" <?php if($details->qualification == 'Doctorate'){ echo 'selected'; }?>>Doctorate</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_qualification" class="bmd-label-floating mat-label-color">Choose Qualification:</label>
                      <select class="form-control looking" name="qualification" id="l_qualification">
                        <option value="">Select Qualification</option>
                        <option value="High school or equivalent" <?php if($details->qualification == 'High school or equivalent'){ echo 'selected'; }?>>High school or equivalent</option>
                        <option value="Diploma" <?php if($details->qualification == 'Diploma'){ echo 'selected'; }?>>Diploma</option>
                        <option value="Bachelors degree" <?php if($details->qualification == 'Bachelors degree'){ echo 'selected'; }?>>Bachelors degree</option>
                        <option value="Masters degree" <?php if($details->qualification == 'Masters degree'){ echo 'selected'; }?>>Masters degree</option>
                        <option value="Doctorate" <?php if($details->qualification == 'Doctorate'){ echo 'selected'; }?>>Doctorate</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 hiring">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="gender" class="bmd-label-floating mat-label-color">Choose Gender:</label>
                      <select class="form-control hiring" name="gender" id="gender">
                        <option value="Any Gender" <?php if($details->gender == 'Any Gender'){ echo 'selected'; }?>>Any Gender</option>
                        <option value="Female" <?php if($details->gender == 'Female'){ echo 'selected'; }?>>Female</option>
                        <option value="Male" <?php if($details->gender == 'Male'){ echo 'selected'; }?>>Male</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_gender" class="bmd-label-floating mat-label-color">Choose Gender:</label>
                      <select class="form-control looking" name="gender" id="l_gender">
                        <option value="">Select Gender</option>
                        <option value="Female" <?php if($details->gender == 'Female'){ echo 'selected'; }?>>Female</option>
                        <option value="Male" <?php if($details->gender == 'Male'){ echo 'selected'; }?>>Male</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 hiring">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="nationality" class="bmd-label-floating mat-label-color">Choose Nationality:</label>
                      <select class="form-control hiring" name="nationality[]" id="nationality" multiple>
                        <option value="Any Nationality" <?php if(in_array('Any Nationality', $details->nationality)){ echo 'selected'; }?>>Any Nationality</option>
                        <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){
						  $selected = '';
						if(in_array($val->id, $details->nationality)){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_nationality" class="bmd-label-floating mat-label-color">Choose Nationality:</label>
                      <select class="form-control looking" name="nationality" id="l_nationality">
                        <option value="">Select Nationality</option>
                        <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){ 
						  $selected = '';
						if($details->nationality == $val->id){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="experience" class="bmd-label-floating mat-label-color">Years of Experience:</label>
                      <select class="form-control" name="experience" id="experience">
                        <option value="">Select Experience</option>
                        <option value="0-1 Year" <?php if($details->experience == '0-1 Year'){ echo 'selected'; }?>>0-1 Year</option>
                        <option value="1-2 Years" <?php if($details->experience == '1-2 Years'){ echo 'selected'; }?>>1-2 Years</option>
                        <option value="2-3 Years" <?php if($details->experience == '2-3 Years'){ echo 'selected'; }?>>2-3 Years</option>
                        <option value="3-4 Years" <?php if($details->experience == '3-4 Years'){ echo 'selected'; }?>>3-4 Years</option>
                        <option value="4-5 Years" <?php if($details->experience == '4-5 Years'){ echo 'selected'; }?>>4-5 Years</option>
                        <option value="5-6 Years" <?php if($details->experience == '5-6 Years'){ echo 'selected'; }?>>5-6 Years</option>
                        <option value="6-7 Years" <?php if($details->experience == '6-7 Years'){ echo 'selected'; }?>>6-7 Years</option>
                        <option value="7-8 Years" <?php if($details->experience == '7-8 Years'){ echo 'selected'; }?>>7-8 Years</option>
                        <option value="8-9 Years" <?php if($details->experience == '8-9 Years'){ echo 'selected'; }?>>8-9 Years</option>
                        <option value="9-10 Years" <?php if($details->experience == '9-10 Years'){ echo 'selected'; }?>>9-10 Years</option>
                        <option value="10+ Years" <?php if($details->experience == '10+ Years'){ echo 'selected'; }?>>10+ Years</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 hiring">
                    <div class="form-group bmd-form-group">
                      <label for="salary" class="bmd-label-floating">Salary:</label>
                      <input type="text" value="<?php echo $details->salary; ?>" class="form-control no-border mat-txt mat-font first-txt hiring" name="salary" id="salary">
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group bmd-form-group">
                      <label for="l_salary" class="bmd-label-floating">Salary:</label>
                      <input type="text" value="<?php echo $details->salary; ?>" class="form-control no-border mat-txt mat-font first-txt looking" name="salary" id="l_salary">
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="current_location" class="bmd-label-floating mat-label-color">Current Location:</label>
                      <select class="form-control looking" name="current_location" id="current_location">
                        <option value="">Select Current Location</option>
                        <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){
						  $selected = '';
						if($details->current_location == $val->id){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="visa_status" class="bmd-label-floating mat-label-color">Choose Visa Status:</label>
                      <select class="form-control looking" name="visa_status" id="visa_status">
                        <option value="">Select Visa Status</option>
                        <option value="Not Applicable" <?php if($details->visa_status == 'Not Applicable'){ echo 'selected'; }?>>Not Applicable</option>
                        <option value="Business" <?php if($details->visa_status == 'Business'){ echo 'selected'; }?>>Business</option>
                        <option value="Employment" <?php if($details->visa_status == 'Employment'){ echo 'selected'; }?>>Employment</option>
                        <option value="Residence" <?php if($details->visa_status == 'Residence'){ echo 'selected'; }?>>Residence</option>
                        <option value="Spouse" <?php if($details->visa_status == 'Spouse'){ echo 'selected'; }?>>Spouse</option>
                        <option value="Student" <?php if($details->visa_status == 'Student'){ echo 'selected'; }?>>Student</option>
                        <option value="Tourist" <?php if($details->visa_status == 'Tourist'){ echo 'selected'; }?>>Tourist</option>
                        <option value="Visit" <?php if($details->visa_status == 'Visit'){ echo 'selected'; }?>>Visit</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 looking">
                    <div class="form-group bmd-form-group">
                      <label for="skills" class="bmd-label-floating">Skills:</label>
                      <input type="text" value="<?php echo $details->skills; ?>" class="form-control no-border mat-txt mat-font first-txt looking" name="skills" id="skills">
                    </div>
                  </div>
                  <div class="col-md-6 looking">
                    <div class="form-group bmd-form-group">
                      <label for="languages" class="bmd-label-floating">Languages: English, Arabic...</label>
                      <input type="text" value="<?php echo $details->languages; ?>" class="form-control no-border mat-txt mat-font first-txt looking" name="languages" id="languages">
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="size" class="bmd-label-floating">Contact Number:</label>
                      <input type="text" value="<?php echo $details->mobile; ?>" class="form-control no-border mat-txt mat-font first-txt" id="contact" name="contact">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="size" class="bmd-label-floating">Email:</label>
                      <input type="text" value="<?php echo $details->email; ?>" class="form-control no-border mat-txt mat-font first-txt" id="email" name="email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="card-header" id="locationadd">Location</div>
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="country" class="bmd-label-floating mat-label-color">Choose Country:</label>
                      <select class="form-control" name="country" id="country" disabled>
                        <option value="">Select Country</option>
                        <?php $res = file_get_contents('https://www.iplocate.io/api/lookup/'.$this->input->ip_address());
                        $res = json_decode($res);?>
                        <?php $country = getCountries(); 
						if($country){ foreach($country as $val){ 
                        $selected = '';
						if($edit->country == $val->id){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                    <div class="form-group select-box-search bmd-form-group mat-select area">
                      <label for="area" class="bmd-label-floating mat-label-color">Choose Area:</label>
                      <select class="form-control" name="area" id="area">
                        <option value="">Select Area</option>
						  <?php $area = getLocations(); 
						if($area){ foreach($area as $val){ 
                        $selected = '';
						if($edit->area == $val->id){
							$selected = 'selected';
						}?>
												<option value="<?php echo $val->id; ?>" <?php echo $selected; ?> >
													<?php echo $val->location; ?>
												</option>
												<?php } } ?>
                      </select>
                    </div>
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Latitude:</label>
                      <input type="text" value="<?php echo $edit->latitude; ?>" class="form-control no-border mat-txt mat-font first-txt" id="latitude" name="latitude">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card-header" style="background:none !important;">&nbsp;</div>
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="location" class="bmd-label-floating mat-label-color">Choose Location:</label>
                      <select class="form-control" name="location" id="location">
                        <option value="">Select Location</option>
						  <?php $location = getLocations(); 
						if($location){ foreach($location as $val){ 
                        $selected = '';
						if($edit->location == $val->id){
							$selected = 'selected';
						}?>
												<option value="<?php echo $val->id; ?>" <?php echo $selected; ?> >
													<?php echo $val->location; ?>
												</option>
												<?php } } ?>
                      </select>
                    </div>
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Longitude:</label>
                      <input type="text" value="<?php echo $edit->longitude; ?>" class="form-control no-border mat-txt mat-font first-txt" id="longitude" name="longitude">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card-header" id="locationadd">Drag Location</div>
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Search Location:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="address" name="address" autocomplete="off" value="<?php echo $edit->address; ?>">
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12" id="map" style="height:200px;"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-header" id="locationadd">Description</div>
                    <div class="form-group">
                      <textarea type="text" id="description" name="description" class="form-control md-textarea  mat-txt" rows="3" placeholder="Description"><?php echo $edit->description; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row looking">
                  <div class="col-md-3">
                    <div class="form-group input-group">
                      <label for="user_cv" class="bmd-label-floating"></label>
                      <label class="btn btn-raised hero-radius btn-644e97 mat-submit"> <i class="fa fa-file-text-o" aria-hidden="true" style="font-size: 20px;">&nbsp;</i> Add CV&hellip;
                        <input type="file" class="form-control" name="user_cv" id="user_cv" accept="application/pdf, application/doc, application/docx, application/xlsx" data-fv-file-type="application/pdf, application/doc, application/docx, application/xlsx" style="display: none;"/>
                      </label>
                      <input type="text" class="form-control text-count" readonly>
                      <br>
                      <span class="help-block"> Allowed type ( .pdf, .doc ) <br>
                      Max Size: 5MB </span>
                      <?php if(@$user_details->cv) { ?>
                      <a class="view-cv" href="<?php echo 'uploads/user-cv/'.$user_details->cv; ?>" target="_blank"><i class="fa fa-download fa-3" aria-hidden="true">&nbsp;</i>View CV</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="ad-btn-wrap mx-auto">
                    <button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit" id="submit">Submit</button>
                    <button type="button" class="btn btn-raised hero-radius btn-FF9800 mat-submit">Cancel</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
<script src="assets/ckeditor/ckeditor.js"></script> 
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
<script src="assets/front_end/js/jquery.validate.js"></script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCb8mnr3T1fcU8UgpCWylaH3rqfVdBsPbk&libraries=places'></script> 
<script src="assets/front_end/js/locationpicker.jquery.js"></script> 
<script type="application/javascript"> 
var roxyFileman = 'assets/fileman/index.html';
$(function() {
    CKEDITOR.replace('description', {
        enterMode: CKEDITOR.ENTER_BR,
        shiftEnterMode: CKEDITOR.ENTER_P,
        filebrowserBrowseUrl: 'assets/fileman/index.html?integration=ckeditor',
        filebrowserImageBrowseUrl: 'assets/fileman/index.html?integration=ckeditor&type=image',
        removeDialogTabs: 'link:upload;image:upload'
    });
});
<?php $lat = $res->latitude;
	  $long = $res->longitude;
	  if($lat == 0 || $lat == ''){
		$lat = '25.1968143';  
	  }
	  if($long == 0 || $long == ''){
		$long = '55.2709185';  
	  }?>
function updateControls(addressComponents) {
    $('#country').val(addressComponents.country);
}
$('#map').locationpicker({
    location: {
        latitude: <?php echo $lat; ?>,
        longitude: <?php echo $long; ?>
    },
    radius: 800,
    zoom: 13,
    onchanged: function(currentLocation, radius, isMarkerDropped) {
        var addressComponents = $(this).locationpicker('map').location.addressComponents;
        updateControls(addressComponents);
    },
    inputBinding: {
        latitudeInput: $('#latitude'),
        longitudeInput: $('#longitude'),
        radiusInput: $('#us3-radius'),
        locationNameInput: $('#address')
    },
    enableAutocomplete: true,
    oninitialized: function(component) {
        var addressComponents = $(component).locationpicker('map').location.addressComponents;
        updateControls(addressComponents);
    }
});
getCity($("#country").val());
function getCity(country) {
    $('.area').hide();
	$.ajax({
            'url': '<?php echo base_url(); ?>get_location/' + country,
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != 'empty') {
                    $('#location').html(data);
                } else {
                    $('#location').html(data);
                }
            }
        });
}
getArea($("#location").val());
function getArea(city) {
$('.area').show();
$.ajax({
            'url': '<?php echo base_url(); ?>get_area/' + city,
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != 'empty') {
                    $('.area').fadeIn('slow');
                    $('#area').html(data);
                } else {
                    $('.area').hide();
                    $('#area').html(data);
                }
            }
        });
}
$(document).ready(function() {
	$('#country').change(function(e) {
        $('.area').hide();
		getCity(this.value);
        });
	$('#location').change(function(e) {
		getArea(this.value);
	});
    $('#nationality').select2({
        placeholder: "Select nationalities"
    });
     $('.hiring').hide();
	 $('#type_1').click(function(e) {
        if ($('#type_1').val() == 'Hiring') {
            $('.hiring').fadeIn('slow');
            $('.looking').hide();
			$(".looking").prop('disabled', true);
			$(".hiring").prop('disabled', false);
			$("#salary").prop('disabled', false);
			$("#l_salary").prop('disabled', true);
        }
    });
    $('#type_2').click(function(e) {
        if ($('#type_2').val() == 'Looking') {
            $('.looking').fadeIn('slow');
            $('.hiring').hide();
			$(".hiring").prop('disabled', true);
			$(".looking").prop('disabled', false);
			$("#salary").prop('disabled', true);
			$("#l_salary").prop('disabled', false);
        }
    });
	$("#post-form").validate({
			rules: {
				type: "required",
				industry: "required",
				position: "required",
				country: "required",
				title_en: {
					required: true,
					minlength: 6
				}
			},
			messages: {
				type: "Please select type",
				industry: "Please select industry",
				position: "Please select position",
				country: "Please select country",
				title_en: {
					required: "Please enter title",
					minlength: "Your title must consist of at least 6 characters"
				}
			}
		});
    $(".image-upload").change(function() {
        var fileupload = $(this);
        var i = 0;
        if (typeof(FileReader) != "undefined") {
            var id = fileupload.attr('id');
            var inputName = 'main_image';
            var dvPreview = fileupload.closest("div").find('.dvPreview');
            dvPreview.children('span').each(function(index, element) {
                if ($(this).attr('id') == undefined) {
                    $(this).remove();
                }
            });
            var regex = /^([a-zA-Z0-9\s_\\.\-:()])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
            $($(this)[0].files).each(function(index, element) {
                var file = $(this);
                if (regex.test(file[0].name.toLowerCase())) {
                    var radioChecked = '';
                    if (index == 0 && $('input[name=' + inputName + ']:checked').val() == undefined) {
                        radioChecked = 'checked="checked"';
                    }
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        i++;
                        dvPreview.append('<span id="image_' + i + '" class="text-center preview-span"><img src="' + e.target.result + '" style="height:60px; width:60px;" /><div class="radio"><div class="form-check check-main"><label class="form-check-label" for="main_image_' + i + '">main</label><input class="form-check-input" name="main_image" type="radio" id="main_image_' + i + '" ' + radioChecked + '" value="1"> <a class="btn btn-raised hero-radius btn-FF9800 mat-submit delete-image" href="javascript:void(0);">Delete</a></div></span>');
                    };
                    reader.readAsDataURL(file[0]);
                } else {
                    alert("Please select only images!");
                    fileupload.val('');
                    dvPreview.children('span').each(function(index, element) {
                        if ($(this).attr('id') == undefined) {
                            $(this).remove();
                        }
                    });
                    return false;
                }
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
});
</script>