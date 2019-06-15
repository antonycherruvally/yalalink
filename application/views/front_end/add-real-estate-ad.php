<?php $this->load->view('blocks/header'); 
$userdata = $this->session->userdata('logged_yalalink_userdata');
$currency = $this->session->userdata('currency');?>
<!--<link rel="stylesheet" href="assets/admin/vendor/formvalidation/formValidation.css">
<link rel="stylesheet" href="assets/admin/css/forms/validation.min.css">-->
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">


<div class="full-wrap bg-ad">
  <div class="container">
    <div class="row" style="margin-top: 50px;border: 1px solid #4fc3c533;margin-bottom: 15px;padding: 18px;">
      <div class="col-md-12">
        <div class="post-ad-wrap">
         
           <h3 style="color:black;"> Posting Your Real Estate Ad</h3>
           
              <form class="m-t-15" action="insertRealestate" enctype="multipart/form-data" method="post" name="post-form" id="post-form">
                <input type="hidden" name="main_category" value="<?php echo $this->input->get('category'); ?>">
                <div class="row">
                  <div class="col-md-12">
                  <div class="col-md-6">
                    <label class="form-check-label mat-label-color" for="type">Choose Type:</label>
                    
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type_1" value="New">
                        New </label>
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type_2" value="Used" checked>
                        Used </label>
                    </div>
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
                      <label for="purpose" class="bmd-label-floating mat-label-color">Purpose:</label>
                      <select class="form-control" name="purpose" id="purpose">
                        <option value="">Select Purpose</option>
                        <?php $category = getRealEstatePurpose(); 
						if($category){ foreach($category as $val){
						$selected = '';
						if($this->input->get('purpose') == $val->category){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->category; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="property_type" class="bmd-label-floating mat-label-color">Choose Property Type:</label>
                      <select class="form-control" name="property_type" id="property_type">
                        <option value="">Select Property Type</option>
                        <?php $category = getRealEstateCategory(); 
						if($category){ foreach($category as $val){
						$selected = '';
						if($this->input->get('property-type') == $val->id){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->subcategory; ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Price (<?php echo @$currency; ?>):</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="price" name="price">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="price_per" class="bmd-label-floating mat-label-color">Price Per Year/Month:</label>
                      <select class="form-control" name="price_per" id="price_per">
                        <option value="">Select Price Per Year/Month</option>
                        <option value="Year">Year</option>
                        <option value="Month">Month</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 residential">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="bedrooms" class="bmd-label-floating mat-label-color">Choose Bedrooms:</label>
                      <select class="form-control" name="bedroom" id="bedroom">
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
                  <div class="col-md-3 residential">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="bathrooms" class="bmd-label-floating mat-label-color">Choose Bathrooms:</label>
                      <select class="form-control" name="bathroom" id="bathroom">
                        <option value="">Select Bathrooms</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="5+">5+</option>
                      </select>
                    </div>
                  </div>
                   <div class="col-md-3 residential">
                      <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="bathrooms" class="bmd-label-floating mat-label-color">Choose Garage:</label>
                      <select class="form-control" name="garage" id="garage">
                          <option></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3+</option>
                         
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-3 residential">
                      <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="bathrooms" class="bmd-label-floating mat-label-color">Choose Swimming pool:</label>
                      <select class="form-control" name="pool" id="pool">
                          <option></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3+</option>
                         
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-3 residential">
                     <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="bathrooms" class="bmd-label-floating mat-label-color">Choose balcony:</label>
                      <select class="form-control" name="balcony" id="balcony">
                          <option></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3+</option>
                         
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="size" class="bmd-label-floating">Size (SqFt):</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="size" name="size">
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
                <div class="row residential">
                  <div class="col-md-12">
                    <div class="card-header" style="background-color: #662d91a1;color:white;">Facilities & Amenities</div>
                    <div class="form-group bmd-form-group mat-select">
                      <label for="amenities" class="mat-label-color">Choose Facilities & Amenities:</label>
                      <select multiple="multiple" size="10" name="duallistbox_demo1[]" id="re_amenities">
                        <?php $amenity = getPropertyAmenities('Residential');
								if($amenity){
								foreach($amenity as $val){
									echo '<option value="'.$val->id.'">'.$val->name.'</option>';
								}} ?>
                      </select>
                    </div>
                  </div>
                
                 <!-- <div class="col-md-12">
                    <div class="card-header">Facilities & Amenities</div>
                    <div class="form-group bmd-form-group mat-select">
                      <label for="amenities" class="mat-label-color">Choose Facilities & Amenities:</label>
                      <select multiple="multiple" size="10" name="duallistbox_demo1[]" id="co_amenities">
                        <?php $amenity = getPropertyAmenities('Commercial');
								if($amenity){
								foreach($amenity as $val){
									echo '<option value="'.$val->id.'">'.$val->name.'</option>';
								}} ?>
                      </select>
                    </div>
                  </div>-->
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="card-header" style="background-color: #662d91a1;color:white;">Location </div>
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="country" class="bmd-label-floating mat-label-color">Choose Country:
                        <?php //$getloc = json_decode(file_get_contents("http://ipinfo.io/")); ?>
                      </label>
                      <select class="form-control" name="country" id="country"<?php /*?> onchange="changeMap(this.value)"<?php */?>>
                      <option value="">Select Country</option>
                        <?php $res = file_get_contents('https://www.iplocate.io/api/lookup/'.$this->input->ip_address());
                        $res = json_decode($res);?>
                        <?php $country = getCountries(); 
						if($country){ foreach($country as $val){ 
                        //$selected = '';
						//if($res->country_code == $val->code){
							//$selected = 'selected';
						//}?>
                        <option value="<?php echo $val->id; ?>" <?php //echo $selected; ?> ><?php echo $val->name; ?></option>
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
                    <div class="card-header" style="background:none;">&nbsp;</div>
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
                    <div class="card-header" style="background-color: #662d91a1;color:white;">Drag Location</div>
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
                    <div class="card-header" style="background-color: #662d91a1;color:white;">Description</div>
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
                      <input type="text" class="form-control text-count" readonly style="height:40px;">
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
<?php $this->load->view('front_end/include/footer'); ?>
<script src="assets/ckeditor/ckeditor.js"></script> 
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
<script src="assets/front_end/js/jquery.validate.js"></script>
<script src="assets/front_end/js/jquery.bootstrap-duallistbox.js"></script> 
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCb8mnr3T1fcU8UgpCWylaH3rqfVdBsPbk&libraries=places'></script> 
<script src="assets/front_end/js/locationpicker.jquery.js"></script> 
<script type="application/javascript"> 

//var demo1 = $('select[name="amenities[]"]').bootstrapDualListbox();
 var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();
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
<!--getCity($("#country").val());-->
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
<!--getArea($("#location").val());-->
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
    /*$('#post-form').formValidation({
        framework: "bootstrap4",
        fields: {
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
            purpose: {
                validators: {
                    notEmpty: {
                        message: 'purpose is required'
                    }
                }
            },
            property_type: {
                validators: {
                    notEmpty: {
                        message: 'property type is required'
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
            price: {
                validators: {
                    notEmpty: {
                        message: 'price is required'
                    },
                    numeric: {
                        message: 'The price must be a number',
                        transformer: function($field, validatorName, validator) {
                            var value = $field.val();
                            return value.replace(',', '');
                        }
                    }
                }
            },
            image: {
                validators: {
                    notEmpty: {
                        message: 'The images is required'
                    },
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 5097152,
                        message: 'The selected file is not valid'
                    }
                }
            }
        }
    });*/
$(document).ready(function(e) {
	$("#post-form").validate({
			rules: {
				type: "required",
				purpose: "required",
				property_type: "required",
				country: "required",
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
				purpose: "Please select purpose",
				property_type: "Please select property type",
				country: "Please select country",
				price: "Please enter price",
				title_en: {
					required: "Please enter title",
					minlength: "Your title must consist of at least 6 characters"
				}
			}
		});
	$('#country').change(function(e) {
        $('.area').hide();
		getCity(this.value);
        });
	$('#location').change(function(e) {
		getArea(this.value);
	});
	$('#map_canvas').hide();
    $(document).on('click', '.img-check', function(e) {
      console.log(this.id);
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
      console.log(this.id);
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
	$('#purpose').change(function(e) {
        if ($('#category').val() == 6) {
        } else {
        }
    });
	$('.residential').hide();
	$('.commercial').hide();
	$('#property_type').change(function(e) {
		
		if ($('#property_type').val() == 4 || $('#property_type').val() == 5) {
            $('.residential').show();
            $('.commercial').hide();
            $("#co_amenities").prop('disabled', true);
            $("#re_amenities").prop('disabled', false);
		}else if ($('#property_type').val() == 12 || $('#property_type').val() == 6 || $('#property_type').val() == 7) {
            $('.residential').hide();
            $('.commercial').show();
            $("#co_amenities").prop('disabled', false);
            $("#re_amenities").prop('disabled', true);
		}
	});
	if ($('#property_type').val() == 4 || $('#property_type').val() == 5) {
            $('.residential').show();
            $('.commercial').hide();
            $("#co_amenities").prop('disabled', true);
            $("#re_amenities").prop('disabled', false);
		}else if ($('#property_type').val() == 12 || $('#property_type').val() == 6 || $('#property_type').val() == 7) {
            $('.residential').hide();
            $('.commercial').show();
            $("#co_amenities").prop('disabled', false);
            $("#re_amenities").prop('disabled', true);
		}
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
});
</script> 
