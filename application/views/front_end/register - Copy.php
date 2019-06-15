<?php $this->load->view('blocks/headerv2'); 
$register = $this->session->userdata('register'); ?>
<!--<link rel="stylesheet" href="assets/admin/vendor/formvalidation/formValidation.css">
<link rel="stylesheet" href="assets/admin/css/forms/validation.min.css">-->
<link rel="stylesheet" href="assets/front_end/css/intlTelInput.css">
<link rel="stylesheet" href="assets/front_end/css/isValidNumber.css">

 <link rel="stylesheet" type="text/css" href="assets/front_end/css/hero.css" media="all" />
        
         
         <link rel="stylesheet" type="text/css" href="assets/front_end/css/material-form.css" media="all" />
 
<div class="full-wrap bg-reg">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto">
        <div class="full-wrap reg-tab-wrap">
          <div class="reg-tab">
            <div class="list-group" id="list-tab" role="tablist"> <a class="list-group-item list-group-item-action text-center <?php if($page_title == 'Register') echo 'active'; ?>" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Register</a> <a class="list-group-item list-group-item-action text-center <?php if($page_title == 'Login') echo 'active'; ?>" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Log In</a> </div>
        <?php if($this->session->flashdata('message')){ ?>
        <?php echo $this->session->flashdata('message'); ?>
        <?php } ?>
          </div>
          <div class="col-11 tab-content-wrap mx-auto">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade <?php if($page_title == 'Register') echo 'show active'; ?>" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                <form class="m-t-15" action="insertUser" enctype="multipart/form-data" method="post" name="registration-form" id="registration-form">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  <!--<div class="google-box">
                    <p class="font-weight-normal text-center help-txt help-txt2">You Can Sign Up With</p>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend other-login-btn">
                        <button class="btn btn-outline-secondary btn-google-icon btn-icn-left" type="button">Sign Up with Google+</button>
                        <button class="btn btn-outline-secondary btn-fb-icon btn-icn-left" type="button">Sign Up with Facebook</button>
                      </div>
                    </div>
                  </div>
                  <span class="horizontal-rule space-mvxl"><span class="horizontal-rule-text">Or</span></span>--> 
                  <div class="form-group reg-form-margin">
                    <label for="first_name" class="bmd-label-floating">First Name:</label>
                    <input type="text" class="form-control no-border mat-txt mat-font" id="first_name" name="first_name" 
                    value="<?php if($register) echo $register['first_name']; ?>">
                  </div>
                  <div class="form-group reg-form-margin">
                    <label for="last_name" class="bmd-label-floating">Last Name:</label>
                    <input type="text" class="form-control no-border mat-txt mat-font" id="last_name" name="last_name" value="<?php if($register) echo $register['last_name']; ?>">
                  </div>
                  <div class="form-group is-filled reg-form-margin is-filled">
                    <label for="mobile" class="bmd-label-floating"></label>
                    <input type="hidden" class="form-control country_code" name="country_code" id="country_code" value="">
                    <input type="text" class="form-control no-border mat-txt mat-font is-filled" id="mobile" name="mobile" >
                <span id="p-valid-msg" class="hide">✓ Valid</span> <span id="p-error-msg" class="hide">Invalid number</span></div>
                  <div class="form-group reg-form-margin">
                    <label for="email" class="bmd-label-floating">Email:</label>
                    <input type="email" class="form-control no-border mat-txt mat-font" id="email" name="email">
                    <span class="bmd-help">We'll never share your email with anyone else.</span> </div>
                  <div class="form-group reg-form-margin">
                    <label for="confirm_email" class="bmd-label-floating">Confirm Email:</label>
                    <input type="email" class="form-control no-border mat-txt mat-font" id="confirm_email" name="confirm_email">
                    <span class="bmd-help">We'll never share your email with anyone else.</span> </div>
                  <div class="form-group reg-form-margin">
                    <label for="reg_password" class="bmd-label-floating">Password:</label>
                    <input type="password" class="form-control no-border mat-txt mat-font" id="reg_password" name="reg_password">
                  </div>
                  <div class="form-group reg-form-margin">
                    <label for="confirm_password" class="bmd-label-floating">Confirm Password:</label>
                    <input type="password" class="form-control no-border mat-txt mat-font" id="confirm_password" name="confirm_password">
                  </div>
                  <div class="terms-con-wrap text-center">
                    <div class="privacy-policy"> <span class="help-txt2 text-center">*Agree to our <a href="">Terms & Conditions</a> and <a href="">Privacy Policy.</a></span> </div>
                    <div class="reg-form-margin">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="newsletter" id="newsletter" value="1">
                          <span class="help-txt inline-block">I would like to receive news, offers and promotions from Yalalink</span> </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7 mx-auto">
                    <button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit reg-btn" id="registration_button">Register
                    <div class="ripple-container"></div>
                    </button>
                  </div>
                </form>
              </div>
              <div class="tab-pane fade <?php if($page_title == 'Login') echo 'show active'; ?>" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                <form class="m-t-15" action="authenticate" enctype="multipart/form-data" method="post" name="login-form" id="login-form">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  <!--<div class="google-box">
                    <p class="font-weight-normal text-center help-txt help-txt2">You Can Log In With</p>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend other-login-btn">
                        <button class="btn btn-outline-secondary btn-google-icon btn-icn-left" type="button">Log in with Google+</button>
                        <button class="btn btn-outline-secondary btn-fb-icon btn-icn-left" type="button">Log in with Facebook</button>
                      </div>
                    </div>
                  </div>
                  <span class="horizontal-rule space-mvxl"><span class="horizontal-rule-text">Or</span></span>--> 
                  <div class="form-group">
                    <label for="email" class="bmd-label-floating">Email:</label>
                    <input type="email" class="form-control no-border mat-txt mat-font" id="email" name="email">
                    <span class="bmd-help">We'll never share your email with anyone else.</span> </div>
                  <div class="form-group">
                    <label for="password" class="bmd-label-floating">Password:</label>
                    <input type="password" class="form-control no-border mat-txt mat-font" id="password" name="password">
                    <!-- <span class="bmd-help">Choose a strong password.</span> --> 
                  </div>
                  <div class="privacy-policy text-center"> <span class="help-txt2">*By using social login, you agree to our <a href="">Terms & Conditions</a> and <a href="">Privacy Policy.</a></span> </div>
                  <div class="col-md-7 mx-auto">
                    <button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit reg-btn login-btn" id="login_button">Log In
                    <div class="ripple-container"></div>
                    </button>
                  </div>
                  <div class="recover-box"> <a href="">Recover password ?</a>
                    <div class="login-right-links inline-block"> <span class="text-muted">New to Yalalink? &nbsp; <a href="javascript:void(0);" id="register">Create Account</a></span> </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
<script src="assets/front_end/js/intlTelInput.js"></script> 
<script src="assets/front_end/js/defaultCountryIp.js"></script> 
<script src="assets/front_end/js/jquery.validate.js"></script>
<script type="application/javascript">
$(document).ready(function() {
	$('#register').on('click', function(){
    $('#list-profile-list').removeClass('active');
    $('#list-home-list').addClass('active');
    $('#list-profile').removeClass('active');
    $('#list-profile').removeClass('show');
    $('#list-home').addClass('show');
    $('#list-home').addClass('active');
});
$("#login-form").validate({
			rules: {
				email: "required",
				password: "required"
			},
			messages: {
				email: "Please enter the email",
				password: "Please enter the password"
			}
		});
$("#registration-form").validate({

			rules: {
				first_name: "required",
				last_name: "required",
				/*email: {
					required: true,
					email: true
				},*/
				email: {
					required: true,
					email: true/*,
					remote: {
						url: "validateEmail",
						type: "post"
					 }*/
				},
				confirm_email: {
					required: true,
					email: true,
					equalTo: "#email"
				},
				reg_password: {
					required: true,
					minlength: 6
				},
				confirm_password: {
					required: true,
					minlength: 6,
					equalTo: "#reg_password"
				}
			},
			messages: {
				first_name: "Please enter the first name",
				last_name: "Please enter the last name",
				email: {
					required: "Please enter your email address.",
					email: "Please enter a valid email address.",
					remote: "Email already exist"
				},
				confirm_email: {
					required: "Please enter a valid email address",
					equalTo: "Please enter the same email as above"
				},
				reg_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				}
			}
		});
/*$('#login-form').formValidation({
      framework: "bootstrap4",
      button: {
        selector: '#login_button',
        disabled: 'disabled'
      },
      icon: null,
      fields: {
        email: {
          validators: {
            notEmpty: {
              message: 'The email is required'
            },
            emailAddress: {
              message: 'The email address is not valid'
            }
          }
        },
        password: {
          validators: {
            notEmpty: {
              message: 'The password is required'
            },
            stringLength: {
              min: 6
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
    });*/
/*$('#registration-form').formValidation({
      framework: "bootstrap4",
      button: {
        selector: '#registration_button',
        disabled: 'disabled'
      },
      icon: null,
      fields: {
		first_name: {
		  validators: {
			notEmpty: {
			  message: 'First name is required'
			}
		  }
		},
		last_name: {
		  validators: {
			notEmpty: {
			  message: 'Last name is required'
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
			  message: 'Email is required'
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
		reg_password: {
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
                        field: 'reg_password',
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
    });*/
});
</script>