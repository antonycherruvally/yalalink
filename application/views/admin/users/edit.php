<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">
<!-- Page -->

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Users</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/users">Users</a></li>
      <li class="breadcrumb-item active">Edit User</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Edit User</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                <form class="form-signin cv-form" action="admin/updateUser" enctype="multipart/form-data" method="post" name="users_form" id="users_form"> 
                <input type="hidden" value="<?php echo $edit->id; ?>" name="id">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select User Type" data-allow-clear="true" name="user_type" id="user_type">
                          <option></option>
                          <option value="website" <?php if($edit->user_type == 'website'){ echo 'selected'; } ?>>Website</option>
                          <option value="internal" <?php if($edit->user_type == 'internal'){ echo 'selected'; } ?>>Internal</option>
                          <option value="superadmin" <?php if($edit->user_type == 'superadmin'){ echo 'selected'; } ?>>Superadmin</option>
                          <option value="admin" <?php if($edit->user_type == 'admin'){ echo 'selected'; } ?>>Admin</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $edit->first_name; ?>"/>
                        <label class="floating-label">First Name</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $edit->last_name; ?>"/>
                        <label class="floating-label">Last Name</label>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $edit->email; ?>"/>
                        <label class="floating-label">Email</label>
                        <small class="email-exist" style="color:#f44336; display:none;">email already exist in our system</small>
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
                    <a class="inline-block" href="<?php echo 'uploads/users/'.$edit->image; ?>" title="view-7" data-source="<?php echo 'uploads/users/'.$edit->image; ?>" data-plugin="magnificPopup"
                      data-main-class="mfp-img-mobile">
                      <img class="img-fluid" src="<?php echo 'uploads/users/thumb/'.$edit->image; ?>" alt="..." width="220"
                      />
                    </a>
                    </div>
                    </span>
                    <?php } ?>
                  </div>
                  <div class="row">&nbsp;</div>
                  <div class="form-group form-material">
                    <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" id="submit_ads">Save</button>
                    <button type="button" class="btn btn-danger ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" name="cancel" value="cancel" onClick="window.location.href='admin/users';">Cancel</button>
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
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
<script type="application/javascript">
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
    (0, _jquery2.default)('#users_form').formValidation({
      framework: "bootstrap4",
      button: {
        selector: '#submit_users',
        disabled: 'disabled'
      },
      icon: null,
      fields: {
        user_type: {
          validators: {
            notEmpty: {
              message: 'User type is required and cannot be empty'
            }
          }
        },
		first_name: {
          validators: {
            notEmpty: {
              message: 'First Name is required and cannot be empty'
            }
          }
        },
        email: {
              validators: {
                notEmpty: {
                  message: 'Email is required'
                },
				 emailAddress: {
                        message: 'The value is not a valid email address'
                    },
					identical: {
                        field: 'confirm_email',
                        message: 'The email and confirm email are not the same'
                    }
					
              }
            },
			confirm_email: {
              validators: {
                notEmpty: {
                  message: 'Confirm Email is required'
                },
				emailAddress: {
                        message: 'The value is not a valid email address'
                    },
				identical: {
                        field: 'email',
                        message: 'The email and confirm email are not the same'
                    }
				 
              }
            },
			password: {
              validators: {
                notEmpty: {
                  message: 'Password is required'
                },
				identical: {
                        field: 'confirm_password',
                        message: 'The password and confirm password are not the same'
                    },
					stringLength: {
                        min: 6,
                        message: 'The password must be greater than 6 characters'
                    }
              }
            },
			confirm_password: {
              validators: {
                notEmpty: {
                  message: 'Confirm password is required'
                },
				identical: {
                        field: 'password',
                        message: 'The password and confirm password are not the same'
                    },
					stringLength: {
                        min: 6,
                        message: 'The password must be greater than 6 characters'
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