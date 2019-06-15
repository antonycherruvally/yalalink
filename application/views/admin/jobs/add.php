<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<!-- Page -->
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Jobs</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/real_estate">Jobs</a></li>
      <li class="breadcrumb-item active">Add New Job</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Add New Job</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                <form class="form-signin cv-form" action="admin/insertJob" enctype="multipart/form-data" method="post" name="posts_form" id="posts_form">
                  <div class="row">
                    <div class="col-md-4"> 
                      <!-- Example Radios -->
                      <div class="example-wrap">
                        <h4 class="example-title">Choose Type</h4>
                        <div class="radio-custom radio-primary">
                          <input type="radio"  name="type" id="type" value="Hiring" />
                          <label for="type">Hiring</label>
                        </div>
                        <div class="radio-custom radio-primary">
                          <input type="radio" name="type" id="type_1" value="Looking" checked />
                          <label for="type_1">Looking for job</label>
                        </div>
                      </div>
                      <!-- End Example Radios --> 
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="title_en" id="title_en"/>
                        <label class="floating-label">Title In English</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="title_ar" id="title_ar"/>
                        <label class="floating-label">Title In Arabic</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Job Industry" data-allow-clear="true" name="industry" id="industry" >
                          <option></option>
                          <?php $industry = getIndustry(); if($industry){ foreach($industry as $val){  ?>
                          <option value="<?php echo $val->id ?>"><?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$val->title)))); ?></option>
                          <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Job Position" data-allow-clear="true" name="position" id="position" >
                          <option></option>
                          <?php $positions = getPositions(); if($positions){ foreach($positions as $val){  ?>
                        <option value="<?php echo $val->id ?>"><?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$val->title)))); ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Job Level" data-allow-clear="true" name="level" id="level" >
                          <option></option>
                        <option value="Internship">Internship</option>
                        <option value="Entry Level">Entry Level</option>
                        <option value="Associate">Associate</option>
                        <option value="Supervisory">Supervisory</option>
                        <option value="Mid-Senior Level">Mid-Senior Level</option>
                        <option value="Director">Director</option>
                        <option value="C-Suite">C-Suite</option>
                        <option value="Others">Others</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Job Type" data-allow-clear="true" name="job_type" id="job_type" >
                          <option></option>
                          <option value="Full-time">Full-time</option>
                        <option value="Part-time">Part-time</option>
                        <option value="Contract">Contract</option>
                        <option value="Temporary">Temporary</option>
                        <option value="Other">Other</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 hiring">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control hiring" data-plugin="select2" data-placeholder="Select Qualification" data-allow-clear="true" name="qualification" id="qualification" >
                          <option></option>
                          <option value="Any Qualification">Any Qualification</option>
                        <option value="High school or equivalent">High school or equivalent</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Bachelors degree">Bachelors degree</option>
                        <option value="Masters degree">Masters degree</option>
                        <option value="Doctorate">Doctorate</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 looking">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control looking" data-plugin="select2" data-placeholder="Select Qualification" data-allow-clear="true" name="qualification" id="l_qualification" >
                          <option></option>
                        <option value="High school or equivalent">High school or equivalent</option>
                        <option value="Diploma">Diploma</option>
                        <option value="Bachelors degree">Bachelors degree</option>
                        <option value="Masters degree">Masters degree</option>
                        <option value="Doctorate">Doctorate</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 hiring">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control hiring" data-plugin="select2" data-placeholder="Select Gender" data-allow-clear="true" name="gender" id="gender" >
                          <option></option>
                          <option value="Any Gender">Any Gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 looking">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control looking" data-plugin="select2" data-placeholder="Select Gender" data-allow-clear="true" name="gender" id="l_gender" >
                          <option></option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 hiring">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control hiring" data-plugin="select2" data-placeholder="Select Nationality" data-allow-clear="true" name="nationality" id="nationality" multiple >
                          <option></option>
                          <option value="Any Nationality">Any Nationality</option>
                        <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){ ?>
                        <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                        <?php } } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 looking">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control looking" data-plugin="select2" data-placeholder="Select Nationality" data-allow-clear="true" name="nationality" id="l_nationality" >
                          <option></option>
                        <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){ ?>
                        <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                        <?php } } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Years of Experience" data-allow-clear="true" name="experience" id="experience" >
                          <option></option>
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
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 hiring">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control hiring" name="salary" id="salary"/>
                        <label class="floating-label">Salary</label>
                      </div>
                    </div>
                    <div class="col-md-4 looking">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Salary Expectations" data-allow-clear="true" name="salary" id="l_salary" >
                          <option></option>
                          <option value="0 - 1,999">0 - 1,999</option>
                        <option value="2,000 - 3,999">2,000 - 3,999</option>
                        <option value="4,000 - 5,999">4,000 - 5,999</option>
                        <option value="6,000 - 7,999">6,000 - 7,999</option>
                        <option value="8,000 - 11,999">8,000 - 11,999</option>
                        <option value="12,000 - 19,999">12,000 - 19,999</option>
                        <option value="20,000 - 29,999">20,000 - 29,999</option>
                        <option value="30,000 - 49,999">30,000 - 49,999</option>
                        <option value="50,000 - 99,999">50,000 - 99,999</option>
                        <option value="100,000+">100,000+</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 looking">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control looking" data-plugin="select2" data-placeholder="Select Current Location" data-allow-clear="true" name="current_location" id="current_location" >
                          <option></option>
                          <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){ ?>
                        <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                        <?php } } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 looking">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control looking" data-plugin="select2" data-placeholder="Select Visa Status" data-allow-clear="true" name="visa_status" id="visa_status" >
                          <option></option>
                         <option value="Not Applicable">Not Applicable</option>
                        <option value="Business">Business</option>
                        <option value="Employment">Employment</option>
                        <option value="Residence">Residence</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Student">Student</option>
                        <option value="Tourist">Tourist</option>
                        <option value="Visit">Visit</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 looking">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control looking" name="skills" id="skills"/>
                        <label class="floating-label">Skills</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 looking">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control looking" name="languages" id="languages"/>
                        <label class="floating-label">Languages: English, Arabic...</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="contact" id="contact"/>
                        <label class="floating-label">Phone</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="email" id="email"/>
                        <label class="floating-label">Email</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card-header">Drag Location</div>
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" id="address" name="address" autocomplete="off">
                        <label class="floating-label">Search Location:</label>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12" id="map" style="height:250px;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="latitude" id="latitude"/>
                        <label class="floating-label">Latitude:</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="longitude" id="longitude"/>
                        <label class="floating-label">Longitude:</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Country" data-allow-clear="true" name="country" id="country" >
                          <option></option>
                          <?php $country = getCountries(); 
              if($country){ foreach($country as $val){ ?>
                          <option value="<?php echo $val->id; ?>"><?php echo $val->name; ?></option>
                          <?php } } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Location" data-allow-clear="true" name="location" id="location" >
                          <option></option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Area" data-allow-clear="true" name="area" id="area" >
                          <option></option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card-header">Description</div>
                      <div class="form-group">
                        <textarea type="text" id="description" name="description" class="form-control md-textarea  mat-txt" rows="3" placeholder="Description"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group">
                        <label for="image" class="bmd-label-floating"></label>
                        <label class="btn btn-raised btn-info"> <i class="fa fa-camera" aria-hidden="true" >&nbsp;</i> Add CV&hellip;
                          <input type="file" class="ngo_proof_attach_input_file form-control image-upload" name="user_cv" id="user_cv" accept="application/pdf, application/doc, application/docx, application/xlsx" data-fv-file-type="application/pdf, application/doc, application/docx, application/xlsx" style="display: none;"/>
                        </label>
                        <input type="text" class="form-control text-count" readonly>
                        <br>
                      </div>
                      <span class="help-block"> Allowed type Allowed type ( .pdf, .doc ) <br>
                      Max Size: 5MB </span> 
                      <?php if(@$user_details->cv) { ?>
                      <a class="view-cv" href="<?php echo 'uploads/user-cv/'.$user_details->cv; ?>" target="_blank"><i class="fa fa-download fa-3" aria-hidden="true">&nbsp;</i>View CV</a>
                      <?php } ?>
                      </div>
                  </div>
                  <div class="row">&nbsp;</div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Type" data-allow-clear="true" name="ad_type" id="ad_type" >
                          <option value="normal">Normal</option>
                          <option value="hot_deals">Hot Deals</option>
                          <option value="special_offers">Special Offers</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Featured" data-allow-clear="true" name="featured" id="featured" >
                          <option value="0">Normal</option>
                          <option value="1">Featured</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select User" data-allow-clear="true" name="userid" id="userid" disabled>
                          <option></option>
                          <?php if($websiteusers){ foreach($websiteusers as $val){ ?>
                          <option value="<?php echo $val->id; ?>">
                          <?php if($val->company_name != '') { echo $val->company_name; }else{ echo $val->first_name.' '.$val->last_name; }?>
                          </option>
                          <?php } } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group form-material">
                    <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" id="submit_ads">Save</button>
                    <button type="button" class="btn btn-danger ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" name="cancel" value="cancel" onClick="window.location.href='admin/advertisements';">Cancel</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- End Example Basic Form --> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Page -->
<?php $this->load->view('admin/common/footer'); ?>
<script src="assets/ckeditor/ckeditor.js"></script> 
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
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
$(document).ready(function(e) {
	$(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
    $(':file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }
    });
});
(function (global, factory) {
  if (typeof define === "function" && define.amd) {
    define('/forms/validation', ['jquery', 'Site'], factory);
  } else if (typeof exports !== "undefined") {
    factory(require('jquery'), require('Site'));
  } else {
    var mod = {
      exports: {}
    };
    factory(global.jQuery, global.Site);
    global.formsValidation = mod.exports;
  }
})(this, function (_jquery, _Site) {
  'use strict';

  var _jquery2 = babelHelpers.interopRequireDefault(_jquery);

  (0, _jquery2.default)(document).ready(function ($$$1) {
    (0, _Site.run)();
  });
  // Advertisement Validataion Full
  // ------------------------
  (function () {
    (0, _jquery2.default)('#posts_form').formValidation({
      framework: "bootstrap4",
      button: {
        selector: '#submit_ads',
        disabled: 'disabled'
      },
      icon: null,
        fields: {
			userid: {
                validators: {
                    notEmpty: {
                        message: 'user is required'
                    }
                }
            },
      type: {
              validators: {
                notEmpty: {
                  message: 'type is required'
                }
              }
            },
      title_en: {
              validators: {
                notEmpty: {
                  message: 'title is required'
                },
                stringLength: {
                  min: 6
                }
              }
            },
			industry: {
              validators: {
                notEmpty: {
                  message: 'industry is required'
                }
              }
            },
    	position: {
              validators: {
                notEmpty: {
                  message: 'position is required'
                }
              }
            },
			level: {
              validators: {
                notEmpty: {
                  message: 'level is required'
                }
              }
            },
			job_type: {
              validators: {
                notEmpty: {
                  message: 'job type is required'
                }
              }
            },
      contact: {
              validators: {
                notEmpty: {
                  message: 'Mobile is required'
                }
              }
            },
      email: {
              validators: {
                notEmpty: {
                  message: 'email is required'
                }
              }
            },
			country: {
                validators: {
                    notEmpty: {
                        message: 'country is required'
                    }
                }
            },
      location: {
                validators: {
                    notEmpty: {
                        message: 'location is required'
                    }
                }
            },
      area: {
                validators: {
                    notEmpty: {
                        message: 'area is required'
                    }
                }
            }
        },
      err: {
        clazz: 'invalid-feedback'
      },
      control: {
        // The CSS class for valid control
        valid: 'is-valid',

        // The CSS class for invalid control
        invalid: 'is-invalid'
      },
      row: {
        invalid: 'has-danger'
      }
    });
  })();
  
});

<?php $lat = '25.1968143';  
	  $long = '55.2709185'; ?>
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
$(document).ready(function(e) {
	$('#country').change(function(e) {
        $('.area').hide();
		getCity(this.value);
        });
	$('#location').change(function(e) {
		getArea(this.value);
	});
	$('#map_canvas').hide();
    $(document).on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });
    $(':file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });
     $('.hiring').hide();
	 $('#type').click(function(e) {
        if ($('#type').val() == 'Hiring') {
            $('.hiring').fadeIn('slow');
            $('.looking').hide();
			$(".looking").prop('disabled', true);
			$(".hiring").prop('disabled', false);
			$("#salary").prop('disabled', false);
			$("#l_salary").prop('disabled', true);
        }
    });
     $('#type_1').click(function(e) {
        if ($('#type_1').val() == 'Looking') {
            $('.looking').fadeIn('slow');
            $('.hiring').hide();
			$(".hiring").prop('disabled', true);
			$(".looking").prop('disabled', false);
			$("#salary").prop('disabled', true);
			$("#l_salary").prop('disabled', false);
        }
    });
});
</script>