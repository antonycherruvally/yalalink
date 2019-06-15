<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); ?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">

<div class="full-wrap bg-ad">
  <div class="container">
    <div class="row"  style="margin-top: 50px;border: 1px solid #4fc3c533;margin-bottom: 15px;padding: 18px;">
      <div class="col-md-12">
        <div class="post-ad-wrap">
          
            <h3 style="color:black;">Update Your House Maids Ad </h3>
       
              <form class="m-t-15" action="updateHouseMaids" enctype="multipart/form-data" method="post" name="post-form" id="post-form">
                <input type="hidden" name="main_category" value="<?php echo $this->input->get('category'); ?>">
                <input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <label class="form-check-label mat-label-color" for="type">Choose Type:</label>
                  
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type_1" value="Abroad" <?php if($edit->type == 'Abroad'){ echo 'checked'; }?>>
                        Abroad </label>
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type_2" value="Domestic"  <?php if($edit->type == 'Domestic'){ echo 'checked'; }?>>
                        Domestic </label>
                   
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
                      <input type="text" value="<?php echo $edit->title_ar; ?>" class="form-control no-border mat-txt mat-font first-txt" style="direction:rtl;" name="title_ar" id="title_ar">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-check-label mat-label-color" for="type">Choose Marital Status:</label>
                    <div class="col-md-8 inline-block radio-wrap">
                      <label class="radio-inline">
                        <input type="radio" name="maritial" id="marital_1" value="Married" <?php if($details->maritial == 'Married'){ echo 'checked'; }?>>
                        Married </label>
                      <label class="radio-inline">
                        <input type="radio" name="maritial" id="marital_2" value="Single" <?php if($details->maritial == 'Single'){ echo 'checked'; }?>>
                        Single </label>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="nationality" class="bmd-label-floating mat-label-color">Choose Nationality:</label>
                      <select class="form-control" name="nationality" id="nationality">
                        <option value="">Select Nationality</option>
                        <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){$selected = '';
              if($details->nationality == $val->id){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="gender" class="bmd-label-floating mat-label-color">Choose Gender:</label>
                      <select class="form-control" name="gender" id="gender">
                        <option value="">Select Gender</option>
                        <option value="Female" <?php if($details->gender == 'Female'){ echo 'selected'; }?>>Female</option>
                        <option value="Male" <?php if($details->gender == 'Male'){ echo 'selected'; }?>>Male</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="age" class="bmd-label-floating mat-label-color">Choose Age Group:</label>
                      <select class="form-control" name="age" id="age">
                        <option value="">Select Age Group</option>
                        <option value="25-35" <?php if($details->age == '25-35'){ echo 'selected'; }?>>25-35 Age</option>
                        <option value="35-45" <?php if($details->age == '35-45'){ echo 'selected'; }?>>35-45 Age</option>
                        <option value="45-55" <?php if($details->age == '45-55'){ echo 'selected'; }?>>45-55 Age</option>
                        <option value="55-65" <?php if($details->age == '55-65'){ echo 'selected'; }?>>45-55 Age</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="religion" class="bmd-label-floating mat-label-color">Choose Religion :</label>
                      <select class="form-control" name="religion" id="religion">
                        <option value="">Select Religion </option>
                        <option value="Judaism" <?php if($details->religion == 'Judaism'){ echo 'selected'; }?>>Judaism</option>
                        <option value="Christianity" <?php if($details->religion == 'Christianity'){ echo 'selected'; }?>>Christianity</option>
                        <option value="Islam" <?php if($details->religion == 'Islam'){ echo 'selected'; }?>>Islam</option>
                        <option value="Hinduism" <?php if($details->religion == 'Hinduism'){ echo 'selected'; }?>>Hinduism</option>
                        <option value="Taoism" <?php if($details->religion == 'Taoism'){ echo 'selected'; }?>>Taoism</option>
                        <option value="Buddhism" <?php if($details->religion == 'Buddhism'){ echo 'selected'; }?>>Buddhism</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="visa" class="bmd-label-floating mat-label-color">Choose Visa Type :</label>
                      <select class="form-control" name="visa" id="visa">
                        <option value="">Select Visa Type </option>
                        <option value="Citizen" <?php if(@$details->visa == 'Citizen') echo 'selected' ;?>>Citizen</option>
                        <option value="Student" <?php if(@$details->visa == 'Student') echo 'selected' ;?>>Student</option>
                        <option value="Visit / Tourist" <?php if(@$details->visa == 'Visit / Tourist') echo 'selected' ;?>>Visit / Tourist</option>
                        <option value="Residence (Employment)" <?php if(@$details->visa == 'Residence (Employment)') echo 'selected' ;?>>Residence (Employment)</option>
                        <option value="Residence (Personal / Family)" <?php if(@$details->visa == 'Residence (Personal / Family)') echo 'selected' ;?>>Residence (Personal / Family)</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="experience" class="bmd-label-floating mat-label-color">Years of Experience:</label>
                      <select class="form-control" name="experience" id="experience">
                        <option value="">Select Experience</option>
                        <option value="0-1 Year" <?php if(@$details->experience == '0-1 Year') echo 'selected' ;?>>0-1 Year</option>
                        <option value="1-2 Years" <?php if(@$details->experience == '1-2 Years') echo 'selected' ;?>>1-2 Years</option>
                        <option value="2-3 Years" <?php if(@$details->experience == '2-3 Years') echo 'selected' ;?>>2-3 Years</option>
                        <option value="3-4 Years" <?php if(@$details->experience == '3-4 Years') echo 'selected' ;?>>3-4 Years</option>
                        <option value="4-5 Years" <?php if(@$details->experience == '4-5 Years') echo 'selected' ;?>>4-5 Years</option>
                        <option value="5-6 Years" <?php if(@$details->experience == '5-6 Years') echo 'selected' ;?>>5-6 Years</option>
                        <option value="6-7 Years" <?php if(@$details->experience == '6-7 Years') echo 'selected' ;?>>6-7 Years</option>
                        <option value="7-8 Years" <?php if(@$details->experience == '7-8 Years') echo 'selected' ;?>>7-8 Years</option>
                        <option value="8-9 Years" <?php if(@$details->experience == '8-9 Years') echo 'selected' ;?>>8-9 Years</option>
                        <option value="9-10 Years" <?php if(@$details->experience == '9-10 Years') echo 'selected' ;?>>9-10 Years</option>
                        <option value="10+ Years" <?php if(@$details->experience == '10+ Years') echo 'selected' ;?>>10+ Years</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="current_location" class="bmd-label-floating mat-label-color">Current Location:</label>
                      <select class="form-control looking" name="current_location" id="current_location">
                        <option value="">Select Current Location</option>
                        <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){ $selected = '';
              if($details->current_location == $val->id){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="current_location" class="bmd-label-floating mat-label-color">Mobile Number:</label>
                      <input type="text" value="<?php echo $details->mobile; ?>" class="form-control no-border mat-txt mat-font first-txt" name="mobile" id="mobile">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="current_location" class="bmd-label-floating mat-label-color">Email:</label>
                      <input type="text" value="<?php echo $details->email; ?>" class="form-control no-border mat-txt mat-font first-txt" name="email" id="email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label for="languages" class="bmd-label-floating">Languages: English, Arabic...</label>
                      <input type="text" value="<?php echo $details->languages; ?>" class="form-control no-border mat-txt mat-font first-txt" name="languages" id="languages">
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
                      <label for="longitute" class="bmd-label-floating">Longitude:</label>
                      <input type="text" value="<?php echo $edit->longitude; ?>" class="form-control no-border mat-txt mat-font first-txt" id="longitude" name="longitude">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card-header" id="locationadd">Drag Location</div>
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Search Location:</label>
                      <input type="text" value="<?php echo $edit->address; ?>" class="form-control no-border mat-txt mat-font first-txt" id="address" name="address" autocomplete="off">
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
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group input-group">
                      <label for="exampleInputFile" class="bmd-label-floating"></label>
                      <label class="btn btn-raised hero-radius btn-644e97 mat-submit"> <i class="fa fa-camera" aria-hidden="true" style="font-size: 20px;">&nbsp;</i> Add Images&hellip;
                        <input type="file" class="ngo_proof_attach_input_file form-control image-upload" name="image" id="image" accept="image/png, image/jpeg, image/jpg" data-fv-file-type="image/png, image/jpeg, image/jpg" required="" style="display: none;"/>
                      </label>
                      <input type="text" class="form-control text-count" readonly>
                      <br>
                      <span class="help-block"> Allowed type (.jpg, .png, .jpeg) <br>
                      Max Size: 5MB </span>
                <div class="row dvPreview">
                    <?php if($images){ foreach($images as $val){
                    $checked = '';
                    if($val->main == 1)
                      $checked = 'checked="checked"'; 
              $img = 'uploads/images/thumb/'.$val->image;?>
                    <span class="text-center preview-span" id="image_<?php echo $val->id; ?>">
                    <div class="col-md-12 box text-center" id="<?php echo $val->id; ?>">
                     <label class="btn main-label <?php if($val->main == 1){ echo 'check-active'; } ?>"><img src="<?php if(file_exists($img)){ echo $img; }else{ echo 'assets/img/no_image_available.jpg'; } ?>" alt="..." class="img-thumbnail img-check">
                     <input type="radio" name="image_main" value="id_<?php echo $val->id; ?>" id="image_main_<?php echo $val->id; ?>" <?php echo $checked; ?> class="d-none" autocomplete="off">
                     <?php if($val->main == 1){ ?>
                     <span class="text-main"><i class="fa fa-check-circle">&nbsp;</i></span>
                     <?php }else{ ?>
                     <span class="text-main set_<?php echo $val->id; ?>" style="display:none;"><i class="fa fa-check-circle">&nbsp;</i></span>
                     <?php } ?>
                     </label><input type="checkbox" id="image_delete_<?php echo $val->id; ?>" name="image_delete[]" value="<?php echo $val->id; ?>" style="display:none;" />
                    <a class="btn btn-danger btn-xs delete-image" href="javascript:void(0);">Delete</a>
                    </div>
                    </span>
                    <?php }} ?>
                </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group input-group">
                      <label for="user_cv" class="bmd-label-floating"></label>
                      <label class="btn btn-raised hero-radius btn-644e97 mat-submit"> <i class="fa fa-file-text-o" aria-hidden="true" style="font-size: 20px;">&nbsp;</i> Add CV&hellip;
                        <input type="file" class="form-control" name="user_cv" id="user_cv" accept="application/pdf, application/doc, application/docx, application/xlsx" data-fv-file-type="application/pdf, application/doc, application/docx, application/xlsx" style="display: none;"/>
                      </label>
                      <input type="text" class="form-control text-count" readonly>
                      <br>
                      <span class="help-block"> Allowed type ( .pdf, .doc ) <br>
                      Max Size: 5MB </span> </div>
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
<div class="modal fade email-to-modal" id="deletePost'.@$val->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash" aria-hidden="true"></i>Delete Post</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
  <div class="modal-confirm">Are you sure, you want to delete this post?...</div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit mail-btn">Yes
    </button>
    <button type="button" data-dismiss="modal" aria-label="Close" class="close btn btn-raised hero-radius btn-FF9800 mat-submit mail-btn">No
    </button>
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
				nationality: "required",
				country: "required",
				gender: "required",
				title_en: {
					required: true,
					minlength: 6
				}
			},
			messages: {
				type: "Please select type",
				nationality: "Please select nationality",
				country: "Please select country",
				gender: "Please select gender",
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
                        dvPreview.append('<span id="image_' + i + '" class="text-center preview-span"><a href="' + e.target.result + '" data-fancybox data-caption=""><img src="' + e.target.result + '" style="height:60px; width:60px;" /></a><div class="radio"><input class="form-check-input" name="main_image" type="radio" id="main_image_' + i + '" ' + radioChecked + '" value="1"><a class="btn btn-raised hero-radius btn-f44336 mat-submit delete-image" href="javascript:void(0);">Delete</a></div></span>');
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
$(document).on('click','.delete-image',function(e){
    var image_id = $(this).prev().val();
    if ($(this).prev().attr('id').toLowerCase().indexOf("news") >= 0){
      var type = 'news';
    }else{
      var type = 'image';
    }
    $('.modal-body').html('<p>Are you sure! you want to delete this image</p>');
    $('.modal-footer').html('<button type="button" class="btn btn-success ladda-button" data-dismiss="modal" onclick="deleteImage('+image_id+',\''+type+'\');">Yes</button><button type="button" class="btn btn btn-danger" data-dismiss="modal">No</button>');
    $('.modal').modal('show');
    });
});
function deleteImage(id,type){
  $('#'+type+'_delete_'+id).prop('checked', true);
  $('#'+type+'_main_'+id).prop('disabled',true);
  $('#'+type+'_'+id).hide();
    if($('input[name=image_main]:checked').val() == 'id_'+id){
      $('input[name=image_main]:enabled:first').prop('checked',true);
      $('.text-main:first', this).show();
      $(".text-main").first().show();
      $('.text-main:enabled:first').show();
    } 
}
</script>