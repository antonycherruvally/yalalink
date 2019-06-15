<?php $this->load->view('blocks/header'); 
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$user_details = getUserDetails($userdata['userid']);?>

<div class="full-wrap bg-ad">
  <div class="container">
    <div class="row" style="margin-top: 50px;border: 1px solid #4fc3c533;margin-bottom: 15px;padding: 18px;">
      <div class="col-md-12">
        <div class="post-ad-wrap">
         
           <h3 style="color:black;">Posting Your Job Vacancy Ad</h3>
            
              <form class="m-t-15" action="insertJobs" enctype="multipart/form-data" method="post" name="post-form" id="post-form">
                <input type="hidden" name="main_category" value="<?php echo $this->input->get('category'); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <label class="form-check-label mat-label-color" for="type">Choose Type:</label>
                    
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type_1" value="Hiring">
                        I'm hiring </label>
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type_2" value="Looking" checked>
                        Looking for job </label>
                  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label for="title_en" class="bmd-label-floating">Title in English:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="title_en" id="title_en">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label for="title_ar" class="bmd-label-floating">Title in Arabic:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" style="direction:rtl;" name="title_ar" id="title_ar">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="industry" class="bmd-label-floating mat-label-color">Choose Job Industry:</label>
                      <select class="form-control" name="industry" id="industry">
                        <option value="">Select Job Industry</option>
                        <?php $industry = getIndustry(); if($industry){ foreach($industry as $val){  ?>
                        <option value="<?php echo $val->id ?>"><?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$val->title)))); ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="position" class="bmd-label-floating mat-label-color">Choose Job Position:</label>
                      <select class="form-control" name="position" id="position">
                        <option value="">Select Job Position</option>
                        <?php $positions = getPositions(); if($positions){ foreach($positions as $val){  ?>
                        <option value="<?php echo $val->id ?>"><?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$val->title)))); ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="level" class="bmd-label-floating mat-label-color">Choose Job Level:</label>
                      <select class="form-control" name="level" id="level">
                        <option value="">Select Job Level</option>
                        <option value="Internship">Internship</option>
                        <option value="Entry Level">Entry Level</option>
                        <option value="Associate">Associate</option>
                        <option value="Supervisory">Supervisory</option>
                        <option value="Mid-Senior Level">Mid-Senior Level</option>
                        <option value="Director">Director</option>
                        <option value="C-Suite">C-Suite</option>
                        <option value="Others">Others</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="job_type" class="bmd-label-floating mat-label-color">Choose Job Type:</label>
                      <select class="form-control" name="job_type" id="job_type">
                        <option value="">Select Job Type</option>
                        <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                        <option value="Temporary">Temporary</option>
                        <option value="Other">Other</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 hiring">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="qualification" class="bmd-label-floating mat-label-color">Choose Qualification:</label>
                      <select class="form-control hiring" name="qualification" id="qualification">
                        <option value="Any Qualification">Any Qualification</option>
                        <option value="High school or equivalent">High school or equivalent</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Bachelors degree">Bachelors degree</option>
                        <option value="Masters degree">Masters degree</option>
                        <option value="Doctorate">Doctorate</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_qualification" class="bmd-label-floating mat-label-color">Choose Qualification:</label>
                      <select class="form-control looking" name="qualification" id="l_qualification">
                        <option value="">Select Qualification</option>
                        <option value="High school or equivalent">High school or equivalent</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Bachelors degree">Bachelors degree</option>
                        <option value="Masters degree">Masters degree</option>
                        <option value="Doctorate">Doctorate</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 hiring">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="gender" class="bmd-label-floating mat-label-color">Choose Gender:</label>
                      <select class="form-control hiring" name="gender" id="gender">
                        <option value="Any Gender">Any Gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_gender" class="bmd-label-floating mat-label-color">Choose Gender:</label>
                      <select class="form-control looking" name="gender" id="l_gender">
                        <option value="">Select Gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 hiring">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="nationality" class="bmd-label-floating mat-label-color">Choose Nationality:</label>
                      <select class="form-control hiring" name="nationality[]" id="nationality" multiple>
                        <option value="Any Nationality">Any Nationality</option>
                        <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){ ?>
                        <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
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
						if($country){ foreach($country as $val){ ?>
                        <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="experience" class="bmd-label-floating mat-label-color">Years of Experience:</label>
                      <select class="form-control" name="experience" id="experience">
                        <option value="">Select Experience</option>
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
                </div>
                <div class="row">
                  <div class="col-md-3 hiring">
                    <div class="form-group bmd-form-group">
                      <label for="salary" class="bmd-label-floating">Salary:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt hiring" name="salary" id="salary">
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group bmd-form-group">
                      <label for="l_salary" class="bmd-label-floating">Salary:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt looking" name="salary" id="l_salary">
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="current_location" class="bmd-label-floating mat-label-color">Current Location:</label>
                      <select class="form-control looking" name="current_location" id="current_location">
                        <option value="">Select Current Location</option>
                        <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){ ?>
                        <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 looking">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="visa_status" class="bmd-label-floating mat-label-color">Choose Visa Status:</label>
                      <select class="form-control looking" name="visa_status" id="visa_status">
                        <option value="">Select Visa Status</option>
                        <option value="Not Applicable">Not Applicable</option>
                        <option value="Business">Business</option>
                        <option value="Employment">Employment</option>
                        <option value="Residence">Residence</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Student">Student</option>
                        <option value="Tourist">Tourist</option>
                        <option value="Visit">Visit</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 looking">
                    <div class="form-group bmd-form-group">
                      <label for="skills" class="bmd-label-floating">Skills:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt looking" name="skills" id="skills">
                    </div>
                  </div>
                  <div class="col-md-6 looking">
                    <div class="form-group bmd-form-group">
                      <label for="languages" class="bmd-label-floating">Languages: English, Arabic...</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt looking" name="languages" id="languages">
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="size" class="bmd-label-floating">Contact Number:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="contact" name="contact">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="size" class="bmd-label-floating">Email:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="email" name="email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="card-header" id="locationadd">Location</div>
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="country" class="bmd-label-floating mat-label-color">Choose Country:</label>
                      <select class="form-control" name="country" id="country">
                        <option value="">Select Country</option>
                        <?php $res = file_get_contents('https://www.iplocate.io/api/lookup/'.$this->input->ip_address());
                        $res = json_decode($res);?>
                        <?php $country = getCountries(); 
						if($country){ foreach($country as $val){ 
                        //$selected = '';
						//if($res->country_code == $val->code){
							//$selected = 'selected';
						//}?>
                        <option value="<?php echo $val->id; ?>" <?php //echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                    <div class="form-group select-box-search bmd-form-group mat-select area1">
                      <label for="area" class="bmd-label-floating mat-label-color">Choose Area:</label>
                      <select class="form-control" name="area" id="area">
                        <option value="">Select Area</option>
                      </select>
                    </div>
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Latitude:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="latitude" name="latitude">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card-header" style="background:none !important;">&nbsp;</div>
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="location" class="bmd-label-floating mat-label-color">Choose Location:</label>
                      <select class="form-control" name="location" id="location">
                        <option value="">Select Location</option>
                      </select>
                    </div>
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Longitude:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="longitude" name="longitude">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card-header" id="locationadd">Drag Location</div>
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Search Location:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="address" name="address" autocomplete="off">
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
                      <textarea type="text" id="description" name="description" class="form-control md-textarea  mat-txt" rows="3" placeholder="Description"></textarea>
                    </div>
                  </div>
                </div>
                 <div class="row hiring">
                  <div class="col-md-3">
                    <div class="form-group input-group">
                      <label for="user_cv" class="bmd-label-floating"></label>
                        <label for="user_cv" class="bmd-label-floating">Choose Icon Or Add Logo</label>
                      <label class="btn btn-raised hero-radius btn-644e97 mat-submit"> <i class="fa fa-file-text-o" aria-hidden="true" style="font-size: 20px;">&nbsp;</i>  Add Logo&hellip;
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
            var regex = /^([a-zA-Z0-9\s_\\.\-:()])+(.jpg|.jpeg|.gif|.png|.bmp|.pdf|.doc)$/;
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