<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">
<!-- Page -->

<div class="page">
  <div class="page-header">
    <h1 class="page-title">House Maids</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/housemaids">House Maids</a></li>
      <li class="breadcrumb-item active">Edit House Maids</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Edit House Maids</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                <form class="form-signin cv-form" action="admin/updateHousemaids" enctype="multipart/form-data" method="post" name="posts_form" id="posts_form">
                  <input type="hidden" value="<?php echo $edit->post_id; ?>" name="id">
                  <div class="row">
                    <div class="col-md-4"> 
                      <!-- Example Radios -->
                      <div class="example-wrap">
                        <h4 class="example-title">Choose Type</h4>
                        <div class="radio-custom radio-primary">
                          <input type="radio" name="type" id="type_1" value="Abroad" <?php if($edit->type == 'Abroad'){ echo 'checked'; } ?>>
                          <label for="type_1">Abroad </label>
                        </div>
                        <div class="radio-custom radio-primary">
                          <input type="radio" name="type" id="type_2" value="Domestic" <?php if($edit->type == 'Domestic'){ echo 'checked'; } ?>>
                          <label for="type_2">Domestic </label>
                        </div>
                      </div>
                      <!-- End Example Radios -->

                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="title_en" id="title_en" value="<?php echo $edit->title_en; ?>"/>
                        <label class="floating-label">Title In English</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="title_ar" id="title_ar" value="<?php echo $edit->title_ar; ?>"/>
                        <label class="floating-label">Title In Arabic</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                      <div class="example-wrap">
                        <h4 class="example-title">Choose Marital Status: </h4>
                        <div class="radio-custom radio-primary">
                          <input type="radio" name="maritial" id="marital_1" value="Married" <?php if($edit->maritial == 'Married'){ echo 'checked'; } ?>>
                          <label for="type">Married </label>
                        </div>
                        <div class="radio-custom radio-primary">
                          <input type="radio" name="maritial" id="marital_2" value="Single" <?php if($edit->maritial == 'Single'){ echo 'checked'; } ?>>
                          <label for="type_1">Single </label>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Nationality" data-allow-clear="true" name="nationality" id="nationality" >
                          <option></option>
                          <?php $country = getNationalities(); 
						if($country){ foreach($country as $val){
						$selected = '';
						if($edit->country == $val->id){
							$selected = 'selected';
						}?>
                          <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                          <?php } } ?>
                        </select>
                        <label class="floating-label"</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                     <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Gender" data-allow-clear="true" name="gender" id="gender" >
                          <option value="">Select Gender</option>
                            <option value="Female" <?php if($edit->gender == 'Female'){ echo 'selected'; } ?>>Female</option>
                            <option value="Male" <?php if($edit->gender == 'Male'){ echo 'selected'; } ?>>Male</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Age Group" data-allow-clear="true" name="age" id="age" >
                          <option value="">Select Age Group</option>
                          <option value="25-35" <?php if($edit->age == '25-35'){ echo 'selected'; } ?>>25-35 Age</option>
                          <option value="35-45" <?php if($edit->age == '35-45'){ echo 'selected'; } ?>>35-45 Age</option>
                          <option value="45-55" <?php if($edit->age == '45-55'){ echo 'selected'; } ?>>45-55 Age</option>
                          <option value="55-65" <?php if($edit->age == '55-65'){ echo 'selected'; } ?>>55-65 Age</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Religion" data-allow-clear="true" name="religion" id="religion" >
                          <option value="">Select Religion </option>
                          <option value="Judaism" <?php if($edit->religion == 'Judaism'){ echo 'selected'; } ?>>Judaism</option>
                          <option value="Christianity" <?php if($edit->religion == 'Christianity'){ echo 'selected'; } ?>>Christianity</option>
                          <option value="Islam" <?php if($edit->religion == 'Islam'){ echo 'selected'; } ?>>Islam</option>
                          <option value="Hinduism" <?php if($edit->religion == 'Hinduism'){ echo 'selected'; } ?>>Hinduism</option>
                          <option value="Taoism" <?php if($edit->religion == 'Taoism'){ echo 'selected'; } ?>>Taoism</option>
                          <option value="Buddhism" <?php if($edit->religion == 'Buddhism'){ echo 'selected'; } ?>>Buddhism</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Visa Type" data-allow-clear="true" name="visa" id="visa" >
                          <option value="">Select Visa Type </option>
                          <option value="Citizen" <?php if(@$edit->visa == 'Citizen') echo 'selected' ;?>>Citizen</option>
                          <option value="Student" <?php if(@$edit->visa == 'Student') echo 'selected' ;?>>Student</option>
                          <option value="Visit / Tourist" <?php if(@$edit->visa == 'Visit / Tourist') echo 'selected' ;?>>Visit / Tourist</option>
                          <option value="Residence (Employment)" <?php if(@$edit->visa == 'Residence (Employment)') echo 'selected' ;?>>Residence (Employment)</option>
                          <option value="Residence (Personal / Family)" <?php if(@$edit->visa == 'Residence (Personal / Family)') echo 'selected' ;?>>Residence (Personal / Family)</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Years of Experience" data-allow-clear="true" name="experience" id="experience" >
                        <option value="">Select Experience</option>
                        <option value="0-1 Year" <?php if(@$edit->experience == '0-1 Year') echo 'selected' ;?>>0-1 Year</option>
                        <option value="1-2 Years" <?php if(@$edit->experience == '1-2 Years') echo 'selected' ;?>>1-2 Years</option>
                        <option value="2-3 Years" <?php if(@$edit->experience == '2-3 Years') echo 'selected' ;?>>2-3 Years</option>
                        <option value="3-4 Years" <?php if(@$edit->experience == '3-4 Years') echo 'selected' ;?>>3-4 Years</option>
                        <option value="4-5 Years" <?php if(@$edit->experience == '4-5 Years') echo 'selected' ;?>>4-5 Years</option>
                        <option value="5-6 Years" <?php if(@$edit->experience == '5-6 Years') echo 'selected' ;?>>5-6 Years</option>
                        <option value="6-7 Years" <?php if(@$edit->experience == '6-7 Years') echo 'selected' ;?>>6-7 Years</option>
                        <option value="7-8 Years" <?php if(@$edit->experience == '7-8 Years') echo 'selected' ;?>>7-8 Years</option>
                        <option value="8-9 Years" <?php if(@$edit->experience == '8-9 Years') echo 'selected' ;?>>8-9 Years</option>
                        <option value="9-10 Years" <?php if(@$edit->experience == '9-10 Years') echo 'selected' ;?>>9-10 Years</option>
                        <option value="10+ Years" <?php if(@$edit->experience == '10+ Years') echo 'selected' ;?>>10+ Years</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Current Location" data-allow-clear="true" name="current_location" id="current_location" >
                          <option value="">Select Current Location</option>
                          <?php $country = getNationalities(); 
                          if($country){ foreach($country as $val){
                          $selected = '';
                          if($edit->country == $val->id){
                            $selected = 'selected';
                          }
                           ?>
                          <option value="<?php echo $val->id; ?>" <?php echo $selected;?>><?php echo $val->name; ?></option>
                          <?php } } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo @$edit->mobile; ?>"/>
                        <label class="floating-label">Mobile Number:</label>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo @$edit->email; ?>"/>
                        <label class="floating-label">Email:</label>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="languages" id="languages" value="<?php echo @$edit->languages; ?>"/>
                        <label class="floating-label">Languages: English, Arabic...</label>
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
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Country" data-allow-clear="true" name="country" id="country" >
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
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Location" data-allow-clear="true" name="location" id="location" >
                          <option value="">Select Location</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Area" data-allow-clear="true" name="area" id="area" >
                          <option value="">Select Area</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card-header">Description</div>
                      <div class="form-group">
                        <textarea type="text" id="description" name="description" class="form-control md-textarea  mat-txt" rows="3" placeholder="Description"><?php echo $edit->description; ?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group">
                        <label for="image" class="bmd-label-floating"></label>
                        <label class="btn btn-raised btn-info"> <i class="fa fa-camera" aria-hidden="true" >&nbsp;</i> Add Image
                          <input type="file" class="ngo_proof_attach_input_file form-control image-upload" name="image" id="image" accept="image/png, image/jpeg, image/jpg" data-fv-file-type="image/png, image/jpeg, image/jpg" required="" multiple style="display: none;" />
                        </label>
                        <input type="text" class="form-control text-count" readonly>
                        <br>
                      </div>
                      <span class="help-block"> Allowed type (.jpg, .png, .jpeg) <br>
                      Max Size: 5MB </span> </div>

                      <div class="col-md-4">
                      <div class="input-group">
                        <label for="cv" class="bmd-label-floating"></label>
                        <label class="btn btn-raised btn-info"> <i class="fa fa-camera" aria-hidden="true" >&nbsp;</i> Add CV
                          <input type="file" class="ngo_proof_attach_input_file form-control" name="user_cv" id="user_cv" accept="application/pdf, application/doc, application/docx, application/xlsx" data-fv-file-type="application/pdf, application/doc, application/docx, application/xlsx" required="" multiple style="display: none;" />
                        </label>
                        <input type="text" class="form-control text-count" readonly>
                        <br>
                      </div>
                      <span class="help-block"> Allowed type (.PDF, .DOC) <br>
                      Max Size: 5MB </span> </div>
                  </div>
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
                    <?php if($edit->cv){ ?>
                    <span class="text-center cv-box">
                    <div class="col-md-12 box text-center">
                    <label class="btn main-label"><a class="inline-block" target="_blank" href="<?php echo 'uploads/user-cv/'.$edit->cv; ?>" title="<?php echo $edit->cv; ?>">
                      <img class="img-fluid" src="<?php echo 'assets/admin/images/cv.png'; ?>" alt="..." width="220"
                      />
                    </a>
                    </label>
                    <a class="btn btn-danger btn-xs delete-cv" href="javascript:void(0);">Delete</a>
                    </div>
                    </span>
                    <?php } ?>
                  </div>

                  <div class="row">&nbsp;</div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select User" data-allow-clear="true" name="userid" id="userid" disabled>
                          <option></option>
                          <?php if($websiteusers){ foreach($websiteusers as $val){ 
								$selected = '';
								if($edit->user_id == $val->id){
									$selected = 'selected';
								}?>
                          <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>>
                          <?php if($val->company_name != '') { echo $val->company_name; }else{ echo $val->first_name.' '.$val->last_name; }?>
                          </option>
                          <?php } } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Type" data-allow-clear="true" name="ad_type" id="ad_type" >
                          <option value="normal">Normal</option>
                          <option value="hot_deals" <?php if($edit->ad_type =='hot_deals'){ echo 'selected'; } ?>>Hot Deals</option>
                          <option value="special_offers" <?php if($edit->ad_type =='special_offers'){ echo 'selected'; } ?>>Special Offers</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Status" data-allow-clear="true" name="status" id="status" >
                          <option></option>
                          <option value="1" <?php if($edit->status == 1){ echo 'selected'; } ?>>Active</option>
                          <option value="0" <?php if($edit->status == 0){ echo 'selected'; } ?>>InActive</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group form-material">
                    <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" id="submit_ads">Save</button>
                    <button type="button" class="btn btn-danger ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" name="cancel" value="cancel" onClick="window.location.href='admin/housemaids';">Cancel</button>
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
<div class="modal fade modal-info modal-3d-sign" id="DeleteImage" aria-hidden="true" aria-labelledby="DeleteAll" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        <h4 class="modal-title">Are you sure! you want to delete this image</h4>
      </div>
      <div class="modal-body">
      <button type="button" class="btn share yes-btn">Yes</button>
          <button type="button" class="btn share no-btn" data-dismiss="modal">No</button>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/common/footer'); ?>
<script src="assets/front_end/js/jquery.bootstrap-duallistbox.js"></script> 
<script src="assets/ckeditor/ckeditor.js"></script> 
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCb8mnr3T1fcU8UgpCWylaH3rqfVdBsPbk&libraries=places'></script> 
<script src="assets/front_end/js/locationpicker.jquery.js"></script> 
<script type="application/javascript">
var demo1 = $('select[name="amenities[]"]').bootstrapDualListbox();
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
  $(document).on('click','.delete-cv',function(e){
    $('.modal-body').html('<p>Are you sure! you want to delete this CV</p>');
    $('.modal-footer').html('<button type="button" class="btn btn-success ladda-button" data-dismiss="modal" onclick="deleteCv();">Yes</button><button type="button" class="btn btn btn-danger" data-dismiss="modal">No</button>');
    $('.modal').modal('show');
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
            nationality: {
                validators: {
                    notEmpty: {
                        message: 'nationality is required'
                    }
                }
            },
            gender: {
                validators: {
                    notEmpty: {
                        message: 'gender type is required'
                    }
                }
            },
        age: {
                validators: {
                    notEmpty: {
                        message: 'age is required'
                    }
                }
            },
        religion: {
                validators: {
                    notEmpty: {
                        message: 'religion is required'
                    }
                }
            },
        visa: {
                validators: {
                    notEmpty: {
                        message: 'visa is required'
                    }
                }
            },
            experience: {
                validators: {
                    notEmpty: {
                        message: 'experience is required'
                    }
                }
            },
             current_location: {
                validators: {
                    notEmpty: {
                        message: 'current location is required'
                    }
                }
            },
            mobile: {
                validators: {
                    notEmpty: {
                        message: 'mobile location is required'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'email location is required'
                    }
                }
            },
            languages: {
                validators: {
                    notEmpty: {
                        message: 'languages location is required'
                    }
                }
            },
            country: {
                validators: {
                    notEmpty: {
                        message: 'country location is required'
                    }
                }
            },
            location: {
                validators: {
                    notEmpty: {
                        message: 'location location is required'
                    }
                }
            },
            area: {
                validators: {
                    notEmpty: {
                        message: 'area location is required'
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


<?php $lat = $edit->latitude;
	  $long = $edit->longitude;
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
$(document).ready(function(e) {
		getCity(<?php echo $edit->country; ?>,<?php if($edit->location) echo $edit->location; else echo 0; ?>);
		getArea(<?php if($edit->location) echo $edit->location; else echo 0; ?>,<?php if($edit->area) echo $edit->area; else echo 0;; ?>);
	$('#country').change(function(e) {
        $('.area').hide();
		getCity(this.value);
        });
	$('#location').change(function(e) {
		getArea(this.value);
	});
	$('#map_canvas').hide();
    $(document).on('click', '.img-check', function(e) {
        $('.check-active').removeClass('check-active');
        $('.text-main').hide();
        $('.set-main').hide();
        $(this).siblings('.set-main').hide();
        $(this).parent().addClass('check-active');
        $(this).siblings('.text-main').show();
        $('.img-check').not(this).removeClass('check');
		$('.img-check').not(this).siblings('input').prop('checked', false);
        $(this).addClass('check').siblings('input').prop('checked', true);
    });
    /*$(document).on('click', '.set-main', function(e) {
        $('.check-active').removeClass('check-active');
        $('.text-main').hide();
        $('.set-main').hide();
        $(this).hide();
        $(this).parent().addClass('check-active');
        $(this).siblings('.text-main').show();
        $('.img-check').not(this).removeClass('check').siblings('input').prop('checked', false);
        $(this).addClass('check').siblings('input').prop('checked', true);
    });*/
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
		if ($('#property_type').val() == 4 || $('#property_type').val() == 8 || $('#property_type').val() == 9 || $('#property_type').val() == 11 || $('#property_type').val() == 14 || $('#property_type').val() == 15) {
            $('.residential').show();
            $('.commercial').hide();
            $("#co_amenities").prop('disabled', true);
            $("#re_amenities").prop('disabled', false);
		}else if ($('#property_type').val() == 5 || $('#property_type').val() == 6 || $('#property_type').val() == 7) {
            $('.residential').hide();
            $('.commercial').show();
            $("#co_amenities").prop('disabled', false);
            $("#re_amenities").prop('disabled', true);
		}
	});
	if ($('#property_type').val() == 4 || $('#property_type').val() == 8 || $('#property_type').val() == 9 || $('#property_type').val() == 11 || $('#property_type').val() == 14 || $('#property_type').val() == 15) {
            $('.residential').show();
            $('.commercial').hide();
            $("#co_amenities").prop('disabled', true);
            $("#re_amenities").prop('disabled', false);
		}else if ($('#property_type').val() == 5 || $('#property_type').val() == 6 || $('#property_type').val() == 7) {
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
            var inputName = 'image_main';
            var dvPreview = $('.dvPreview');
            dvPreview.children('span.preview-span').each(function(index, element) {
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
                        dvPreview.append('<span class="text-center preview-span"><div class="col-md-12 box text-center" id="' + i + '"><label class="btn main-label"><img src="' + e.target.result + '" alt="..." class="img-thumbnail img-check"><input type="radio" name="' + inputName + '" value="' + index + '" id="image_main_' + i + '" ' + radioChecked + '" class="d-none" autocomplete="off"><span class="text-main" style="display:none;"><i class="fa fa-check-circle">&nbsp;</i></span><span class="set-main"><i class="fa fa-check">&nbsp;</i>Set main</span></label></div></span>');
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
function deleteCv(){
  $('.cv-box').remove();
}
function getCity(country,location) {
    $('.area').hide();
	$.ajax({
            'url': '<?php echo base_url(); ?>admin/get_location/'+country+'/'+location,
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
function getArea(city,area) {
$('.area').show();
$.ajax({
            'url': '<?php echo base_url(); ?>admin/get_area/'+city+'/'+area,
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
</script>