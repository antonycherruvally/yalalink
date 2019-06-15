<?php $this->load->view('blocks/header'); 
$userdata = $this->session->userdata('logged_yalalink_userdata'); ?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">

<div class="full-wrap bg-ad">
  <div class="container">
        <div class="row" style="margin-top: 50px;border: 1px solid #4fc3c533;margin-bottom: 15px;padding: 18px;">

      <div class="col-md-12">
        <div class="post-ad-wrap">
         
            <h3 style="color:black;">Posting Your Phones Ad </h3>
            
              <form class="m-t-15" action="insertPhones" enctype="multipart/form-data" method="post" name="post-form" id="post-form">
                <input type="hidden" name="main_category" value="<?php echo $this->input->get('category'); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <label class="form-check-label mat-label-color" for="type">Choose Type:</label>
                   
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type" value="New">
                        New </label>
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type1" value="Used" checked>
                        Used </label>
                    
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
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="title_ar" id="title_ar">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control" name="brand" id="brand">
                        <option value="">Select Brand</option>
                        <?php $brand = getBrands('P'); 
						            if($brand){ foreach($brand as $val){?>
                        <option value="<?php echo $val->id ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="model" class="bmd-label-floating">Model:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="model" id="model">
                    </div>
                  </div>
                  <div class="col-md-3 used">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="age" class="bmd-label-floating mat-label-color">Choose Age:</label>
                      <select class="form-control" name="age" id="age">
                        <option value="">Select Age</option>
                        <?php $age = array('Brand New','0-1 month','1-6 months','6-12 months','1-2 years','2-5 years','5-10 years','10+ years');
foreach ($age as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="usage" class="bmd-label-floating mat-label-color">Choose Usage:</label>
                      <select class="form-control" name="usage" id="usage">
                        <option value="">Select Usage</option>
                        <?php $usage = array('Still in original packaging','Out of original packaging, but only used once','Used only a few times','Used an average amount, as frequently as would be expected','Used an above average amount since purchased');
foreach ($usage as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="condition" class="bmd-label-floating mat-label-color">Choose Condition:</label>
                      <select class="form-control" name="condition" id="condition">
                        <option value="">Select Condition</option>
                        <?php $condition = array('Perfect inside and out','Almost no noticeable problems or flaws','A bit of wear and tear, but in good working condition','Normal wear and tear for the age of the item, a few problems here and there','Above average wear and tear.  The item may need a bit of repair to work properly');
foreach ($condition as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="warranty" class="bmd-label-floating mat-label-color">Choose Warranty:</label>
                      <select class="form-control" name="warranty" id="warranty">
                        <option value="">Select Warranty</option>
                        <?php $warranty = array('Yes','No','Does not apply');
foreach ($warranty as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control" name="color" id="color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){?>
                        <option value="<?php echo $val->name ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="storage" class="bmd-label-floating mat-label-color">Choose Storage:</label>
                      <select class="form-control" name="storage" id="storage">
                        <option value="">Select Storage</option>
                        <?php $storage = array('Less Than 512 Mb','512 Mb','1 Gb','2 Gb','4 Gb','8 Gb','16 Gb','32 Gb','64 Gb','128 Gb','256 Gb','Other');
foreach ($storage as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="operating_system" class="bmd-label-floating mat-label-color">Choose Operating System:</label>
                      <select class="form-control" name="operating_system" id="operating_system">
                        <option value="">Select Operating System</option>
                        <?php $operating_system = array('Android','Symbian','Ios','Blackberry Os','Windows','Other');
foreach ($operating_system as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="camera_resolution" class="bmd-label-floating mat-label-color">Choose Camera Resolution:</label>
                      <select class="form-control" name="camera_resolution" id="camera_resolution">
                        <option value="">Select Camera Resolution</option>
                        <?php $camera_resolution = array('Less Than 2 Mp','2 Mp','5 Mp','8 Mp','12 Mp','13 Mp','16 Mp','19 Mp','20.7 Mp','21 Mp','23 Mp','Other');
foreach ($camera_resolution as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="ram" class="bmd-label-floating mat-label-color">Choose Ram:</label>
                      <select class="form-control" name="ram" id="ram">
                        <option value="">Select Ram</option>
                        <?php $ram = array('4 Mb','8 Mb','16 Mb','32 Mb','64 Mb','128 Mb','512 Mb','1 Gb','1.5 Gb','2 Gb','3 Gb','4 Gb','6 Gb','8 Gb','Other');
foreach ($ram as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="capacity" class="bmd-label-floating mat-label-color">Choose Battery Capacity:</label>
                      <select class="form-control" name="capacity" id="capacity">
                        <option value="">Select Battery Capacity</option>
                        <?php $capacity = array('Below 1000 Mah','1000 - 2000 Mah','2000 - 3000 Mah','3000 - 4000 Mah','4000 - 5000 Mah','Other');
foreach ($capacity as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="dimensions" class="bmd-label-floating">Dimensions (mm):</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="dimensions" id="dimensions">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="weight" class="bmd-label-floating">Weight (g):</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="weight" id="weight">
                    </div>
                  </div>
                  <div class="col-md-3">
                      <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="removable_battery" class="bmd-label-floating mat-label-color">Choose Removable battery:</label>
                      <select class="form-control" name="removable_battery" id="removable_battery">
                        <option value="">Select Removable battery</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                    </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="screen_size" class="bmd-label-floating">Screen size:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="screen_size" id="screen_size">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                  <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="touchscreen" class="bmd-label-floating mat-label-color">Choose Touchscreen:</label>
                      <select class="form-control" name="touchscreen" id="touchscreen">
                        <option value="">Select Touchscreen</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="resolution" class="bmd-label-floating">Resolution:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="resolution" id="resolution">
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="compass" class="bmd-label-floating mat-label-color">Choose Compass/ Magnetometer:</label>
                      <select class="form-control" name="compass" id="compass">
                        <option value="">Select Compass/ Magnetometer</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="proximity" class="bmd-label-floating mat-label-color">Choose Proximity sensor:</label>
                      <select class="form-control" name="proximity" id="proximity">
                        <option value="">Select Proximity sensor</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                  <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="accelerometer" class="bmd-label-floating mat-label-color">Choose Accelerometer:</label>
                      <select class="form-control" name="accelerometer" id="accelerometer">
                        <option value="">Select Accelerometer</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="light" class="bmd-label-floating mat-label-color">Choose Ambient light sensor:</label>
                      <select class="form-control" name="light" id="light">
                        <option value="">Select Accelerometer</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="gyroscope" class="bmd-label-floating mat-label-color">Choose Gyroscope:</label>
                      <select class="form-control" name="gyroscope" id="gyroscope">
                        <option value="">Select Gyroscope</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                  <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="barometer" class="bmd-label-floating mat-label-color">Choose Barometer:</label>
                      <select class="form-control" name="barometer" id="barometer">
                        <option value="">Select Barometer</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                  <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="temperature" class="bmd-label-floating mat-label-color">Choose Temperature sensor:</label>
                      <select class="form-control" name="temperature" id="temperature">
                        <option value="">Select Temperature sensor</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="form_factor" class="bmd-label-floating">Form factor:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="form_factor" id="form_factor">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="release_year" class="bmd-label-floating mat-label-color">Choose Release Year:</label>
                      <select class="form-control" name="release_year" id="release_year">
                        <option value="">Select Release Year</option>
                        <?php $earliest_year = 1900;
foreach (range(date('Y'), $earliest_year) as $x) { ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Price:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="price" id="price">
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
                    <div class="card-header" id="locayionadd">Location</div>
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
                    <div class="card-header" id="locayionadd">Drag Location</div>
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
                    <div class="card-header" id="locayionadd">Description</div>
                    <div class="form-group">
                      <textarea type="text" id="description" name="description" class="form-control md-textarea  mat-txt" rows="3" placeholder="Description"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group input-group">
                      <label for="image" class="bmd-label-floating"></label>
                      <label class="btn btn-raised hero-radius btn-644e97 mat-submit"> <i class="fa fa-camera" aria-hidden="true" style="font-size: 20px;">&nbsp;</i> Add Images&hellip;
                        <input type="file" class="ngo_proof_attach_input_file form-control image-upload" name="image[]" id="image" accept="image/png, image/jpeg, image/jpg" data-fv-file-type="image/png, image/jpeg, image/jpg" multiple required="" style="display: none;" max="10" />
                      </label>
                      <input type="text" class="form-control text-count" readonly>
                      <br>
                      <span class="help-block"> Allowed type (.jpg, .png, .jpeg) <br>
                      Max Size: 5MB </span> </div>
                  </div>
                </div>
                <div class="row dvPreview"> </div>
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
$(document).ready(function(e) {
	$('#country').change(function(e) {
        $('.area').hide();
		getCity(this.value);
        });
	$('#location').change(function(e) {
		getArea(this.value);
	});
    $(document).on('click', '.img-check', function(e) {
        $('.check-active').removeClass('check-active');
        $('.text-main').hide();
        $('.set-main').hide();
        $(this).siblings('.set-main').hide();
        $(this).parent().addClass('check-active');
        $(this).siblings('.text-main').show();
        $('.img-check').not(this).removeClass('check').siblings('input').prop('checked', false);
        $(this).addClass('check').siblings('input').prop('checked', true);
    });
    $(document).on('click', '.set-main', function(e) {
        $('.check-active').removeClass('check-active');
        $('.text-main').hide();
        $('.set-main').hide();
        $(this).hide();
        $(this).parent().addClass('check-active');
        $(this).siblings('.text-main').show();
        $('.img-check').not(this).removeClass('check').siblings('input').prop('checked', false);
        $(this).addClass('check').siblings('input').prop('checked', true);
    });
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
    $('#type').click(function(e) {
        if ($('#type').val() == 'New') {
            $('.used').fadeOut();
        }
    });
    $('#type1').click(function(e) {
        if ($('#type1').val() == 'Used') {
            $('.used').fadeIn('slow');
        }
    });
    $('#category').change(function(e) {
        $.ajax({
            'url': '<?php echo base_url(); ?>get_classifieds_subcategory/' + this.value,
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != 'empty') {
                    $('#subcategory').html(data);
                } else {
                    $('#subcategory').html(data);
                }
            }
        });
    });
	$("#post-form").validate({
			rules: {
				type: "required",
				brand: "required",
				country: "required",
        storage: "required",
        color: "required",
				price: {
				  required: true,
				  number: true
				},
				title_en: {
					required: true,
					minlength: 6
				}
			},
			messages: {
				type: "Please select type",
				brand: "Please select brand",
				country: "Please select country",
				price: "Please enter price",
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
            var dvPreview = $('.dvPreview');
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
                        dvPreview.append('<span class="text-center preview-span"><div class="col-md-12 box text-center" id="' + i + '"><label class="btn main-label"><img src="' + e.target.result + '" alt="..." class="img-thumbnail img-check"><input type="radio" name="' + inputName + '" value="' + index + '" id="main_image_' + i + '" ' + radioChecked + '" class="d-none" autocomplete="off"><span class="text-main" style="display:none;"><i class="fa fa-check-circle">&nbsp;</i></span><span class="set-main"><i class="fa fa-check">&nbsp;</i>Set main</span></label></div></span>');
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
    $(document).on('click', '.delete-image', function(e) {
        $(this).prev().prop('disabled', true);
        $(this).parent().parent().parent().hide();
        var input = $('.text-count').val();
        var out = input.match(/\d+/g).map(Number);
        var final = out - 1;
        if (final == 0) {
            $('.text-count').val('');
        } else {
            $('.text-count').val(final + ' files selected');
        }
        if ($('input[name=main_image]:checked').val() == 1) {
            $('input[name=main_image]:enabled:first').prop('checked', true);
        }
    });
});
</script> 