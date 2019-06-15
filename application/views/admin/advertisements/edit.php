<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">
<!-- Page -->

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Website Settings</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/advertisements">Advertisements</a></li>
      <li class="breadcrumb-item active">Add New Advertisements</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Add New Advertisement</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                <form class="form-signin cv-form" action="admin/updateAdvertisement/<?php echo $edit->id; ?>" enctype="multipart/form-data" method="post" name="advertisement_form" id="advertisement_form">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo $edit->title; ?>"/>
                        <label class="floating-label">Title</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select type" data-allow-clear="true" name="type" id="type">
                          <option></option>
                          <option value="Header Ads" <?php if($edit->type == 'Header Ads') echo 'selected'; ?>>Header Ads</option>
                          <option value="Right Side Ads" <?php if($edit->type == 'Right Side Ads') echo 'selected'; ?>>Right Side Ads</option>
                          <option value="Center Ads" <?php if($edit->type == 'Center Ads') echo 'selected'; ?>>Center Ads</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select the page" data-allow-clear="true" name="country" id="country" multiple>
                          <option></option>
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
                  </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-header">Pages</div>
                    <div class="form-group bmd-form-group mat-select">
                      <label for="amenities" class="mat-label-color">Choose Pages:</label>
                      <select multiple="multiple" size="10" name="page[]" id="page">
                        <?php $pages = array('Home','About Us','Contact Us','FAQS','Content Guidelines','Terms','Privacy','Site Map','Real Estate','Jobs','Auto','Classifieds','House Maids','Phones','Electronics','Computers','Education','Services');
						$pagess = array();
						foreach($page as $val) {
						 $pagess[] = $val->page;
						}
						if($pages){
						  foreach($pages as $val){
							  $selected = '';
							  if(in_array($val, $pagess))
							  $selected = 'selected="selected"';
							  echo '<option value="'.$val.'" '.$selected.'>'.$val.'</option>';
						  }} ?>
                      </select>
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
                          <input type="file" class="ngo_proof_attach_input_file form-control image-upload" name="image" id="image" accept="image/png, image/jpeg, image/jpg" data-fv-file-type="image/png, image/jpeg, image/jpg" required="" style="display: none;" />
                        </label>
                        <input type="text" class="form-control text-count" readonly>
                        <br>
                      </div>
                      <span class="help-block"> Allowed type (.jpg, .png, .jpeg) <br>
                      Max Size: 5MB </span> </div>
                  </div>
                  <div class="row dvPreview">
                    <?php if($edit->image){ ?>
                    <span class="text-center preview-span">
                    <div class="col-md-12 box text-center">
                    <a class="inline-block" href="<?php echo 'uploads/ads/'.$edit->image; ?>" title="view-7" data-source="<?php echo 'uploads/ads/'.$edit->image; ?>" data-plugin="magnificPopup"
                      data-main-class="mfp-img-mobile">
                      <img class="img-fluid" src="<?php echo 'uploads/ads/'.$edit->image; ?>" alt="..." width="220"
                      />
                    </a>
                    </div>
                    </span>
                    <?php } ?>
                  </div>
                  <div class="row">&nbsp;</div>
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
<script src="assets/front_end/js/jquery.bootstrap-duallistbox.js"></script> 
<script src="assets/ckeditor/ckeditor.js"></script> 
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
<script type="application/javascript">
var demo1 = $('select[name="page[]"]').bootstrapDualListbox();
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
                        dvPreview.append('<span class="text-center preview-span"><div class="col-md-12 box text-center" id="' + i + '"><label class="btn main-label"><img src="' + e.target.result + '" alt="..." class="img-thumbnail img-check"></label></div></span>');
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
    (0, _jquery2.default)('#advertisement_form').formValidation({
      framework: "bootstrap4",
      button: {
        selector: '#submit_ads',
        disabled: 'disabled'
      },
      icon: null,
      fields: {
        title: {
          validators: {
            notEmpty: {
              message: 'title is required and cannot be empty'
            }
          }
        },
        type: {
          validators: {
            notEmpty: {
              message: 'type is required and cannot be empty'
            }
          }
        },
        page: {
          validators: {
            notEmpty: {
              message: 'page is required and cannot be empty'
            }
          }
        },
        country: {
          validators: {
            notEmpty: {
              message: 'country is required and cannot be empty'
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
</script>