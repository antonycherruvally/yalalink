<?php
$this->load->view( 'front_end/include/header' );
$userdata = $this->session->userdata( 'logged_yalalink_userdata' );
$currency = $this->session->userdata( 'currency' );
$user = $this->yalalink_model->getUserDetails( $userdata[ 'userid' ] );
if ( @$user->image ) {
	$timg = 'uploads/users/thumb/' . @$user->image;
	$img = 'uploads/users/' . @$user->image;
} else {
	$timg = 'assets/front_end/images/user-thumb.jpg';
	$img = 'assets/front_end/images/user-thumb.jpg';
}
?>

<link rel="stylesheet" href="assets/front_end/css/intlTelInput.css">
<link rel="stylesheet" href="assets/front_end/css/isValidNumber.css">

<div class="container" id="dashboard">
<?php if($this->session->flashdata('message')){ ?>
<?php echo $this->session->flashdata('message'); ?>
<?php } ?>
  <div class="row">
    <div class="col-md-12">
      <div class="post-ad-wrap dashboard-hero">
        <div class="card">
          <div class="card-header">Dashboard</div>
          <div class="row dashboard-wrap">
            <div class="personal-body col-md-4 col-sm-12">
              <div class="mobile-pbody">
                <div class="profile-userpic inline-block"><a <?php if(@$user->image){ ?> href="<?php echo $img; ?>" data-fancybox="gallery" data-caption="<?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$user->first_name.@$user->last_name))));?>" <?php }else{ ?> href="javascript:void(0);" <?php } ?>><img src="<?php if(file_exists(@$timg)) echo $timg; else echo $img; ?>" class="img-responsive" alt="<?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$user->first_name.@$user->last_name)))); ?>"></a> </div>
                <div class="info inline-block">
                  <h3> <?php echo $user->first_name.' '.$user->last_name; ?> </h3>
                  <span class="help-txt inline-block"> <?php echo $user->email; ?> </span> </div>
                <button type="button" id="edit-profile" class="btn btn-raised hero-radius btn-FF9800 mat-submit mat-cmn-btn inline-block pull-right z-0">Edit Profile</button>
              </div>
              <div class="primary-info m-t-15">
                <h4>Primary Information</h4>
                <div class="row mobile-row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="form-row personal-info">
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">First Name:</label>
                            <input type="text" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->first_name; ?>" disabled>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Last Name:</label>
                            <input type="text" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->last_name; ?>" disabled>
                          </div>
                          <?php if($user->company_name){ ?>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Company Name:</label>
                            <input type="text" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->company_name; ?>" disabled>
                          </div>
                          <?php } ?>
                          <?php if($user->website){ ?>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Website URL:</label>
                            <input type="text" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->website; ?>" disabled>
                          </div>
                          <?php } ?>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Email:</label>
                            <input type="email" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->email; ?>" disabled>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Mobile Number:</label>
                            <input type="text" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->area_code.$user->mobile; ?>" disabled>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Gender:</label>
                            <input type="text" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->gender; ?>" disabled>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Position:</label>
                            <input type="text" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->position; ?>" disabled>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Nationality:</label>
                            <input type="text" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->nationality; ?>" disabled>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Current Location:</label>
                            <input type="text" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->country; ?>" disabled>
                          </div>
                          <div class="form-group col-md-12">
                            <label for="inputEmail4">Visa:</label>
                            <input type="text" class="form-control no-border mat-txt" id="inputEmail4" placeholder="<?php echo $user->visa; ?>" disabled>
                          </div>
                        </div>
                      </div>
                      <div id="update-pills-home" style="display:none;">
                        <form action="updateprofile" enctype="multipart/form-data" method="post" id="update-form">
                          <input type="hidden" name="id" id="id" value="<?php echo $user->id; ?>">
                          <div class="form-row">
                            <div class="form-group col-md-12 is-filled is-focused">
                              <label for="inputEmail4">First Name:</label>
                              <input type="text" class="form-control no-border mat-txt" name="first_name" id="first_name" value="<?php echo $user->first_name; ?>">
                            </div>
                            <div class="form-group col-md-12 is-filled is-focused">
                              <label for="inputEmail4">Last Name:</label>
                              <input type="text" class="form-control no-border mat-txt" name="last_name" id="last_name" value="<?php echo $user->last_name; ?>">
                            </div>
                            <div class="form-group col-md-12 is-filled is-focused">
                              <label for="inputEmail4">Company Name:</label>
                              <input type="text" class="form-control no-border mat-txt" name="company" id="company" value="<?php echo $user->company_name; ?>" placeholder="www.campany.com">
                            </div>
                            <div class="form-group col-md-12 is-filled is-focused">
                              <label for="inputEmail4">Website URL:</label>
                              <input type="text" class="form-control no-border mat-txt" name="website" id="website" value="<?php echo $user->website; ?>">
                            </div>
                            <div class="form-group col-md-12 is-filled is-focused">
                              <label for="inputEmail4" class="intl-label">Mobile Number:</label>
                              <input type="hidden" class="form-control country_code" name="country_code" id="country_code" value="<?php echo $user->area_code; ?>">
                              <input type="text" class="form-control no-border mat-txt" name="mobile" id="mobile" value="<?php echo $user->area_code.$user->mobile; ?>">
                              <span id="p-valid-msg" class="hide">✓ Valid</span> <span id="p-error-msg" class="hide">Invalid number</span> </div>
                            <div class="form-group col-md-12 is-filled is-focused edit-select-profile">
                              <label for="inputEmail4">Gender:</label>
                              <select class="js-example-basic-single" name="gender" id="l_gender">
                                <option value="">Select Gender</option>
                                <option value="Female" <?php if($user->gender=='Female') echo 'selected'; ?>>Female</option>
                                <option value="Male" <?php if($user->gender=='Male') echo 'selected'; ?>>Male</option>
                              </select>
                            </div>
                            <div class="form-group col-md-12 is-filled is-focused edit-select-profile">
                              <label for="inputEmail4">Position:</label>
                              <select class="js-example-basic-single" name="position" id="position">
                                <option value="">Select Position</option>
                                <?php $positions = getPositions(); 

							  if($positions){ 

							  foreach($positions as $val){

								  $selected = '';

								  if($user->position == $val->title){

									  $selected = 'selected';

								  }?>
                                <option value="<?php echo $val->title; ?>" <?php echo $selected; ?>> <?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$val->title)))); ?> </option>
                                <?php }} ?>
                              </select>
                            </div>
                            <div class="form-group col-md-12 is-filled is-focused edit-select-profile">
                              <label for="inputEmail4">Nationality:</label>
                              <select class="js-example-basic-single" name="nationality" id="nationality">
                                <option value="">Select Nationality</option>
                                <?php $country = getNationalities(); 

								  if($country){ foreach($country as $val){

								  $selected = '';

								  if($user->nationality == $val->name){

									  $selected = 'selected';

								  }?>
                                <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>> <?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$val->name)))); ?> </option>
                                <?php }} ?>
                              </select>
                            </div>
                            <div class="form-group col-md-12 is-filled is-focused edit-select-profile">
                              <label for="inputEmail4">Current Location:</label>
                              <select class="js-example-basic-single" name="country" id="country">
                                <option value="">Select Current Location</option>
                                <?php $country = getNationalities(); 

                                if($country){ foreach($country as $val){ 

								 $selected = '';

								  if($user->country == $val->name){

									  $selected = 'selected';

								  }?>
                                <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>> <?php echo $val->name; ?> </option>
                                <?php } } ?>
                              </select>
                            </div>
                            <div class="form-group col-md-12 is-filled is-focused edit-select-profile">
                              <label for="inputEmail4">Visa:</label>
                              <select class="js-example-basic-single" name="visa_status" id="visa_status">
                                <option value="">Select Visa Status</option>
                                <option value="Not Applicable" <?php if($user->visa=='Not Applicable') echo 'selected'; ?>>Not Applicable</option>
                                <option value="Business" <?php if($user->visa=='Business') echo 'selected'; ?>>Business</option>
                                <option value="Employment" <?php if($user->visa=='Employment') echo 'selected'; ?>>Employment</option>
                                <option value="Residence" <?php if($user->visa=='Residence') echo 'selected'; ?>>Residence</option>
                                <option value="Spouse" <?php if($user->visa=='Spouse') echo 'selected'; ?>>Spouse</option>
                                <option value="Student" <?php if($user->visa=='Student') echo 'selected'; ?>>Student</option>
                                <option value="Tourist" <?php if($user->visa=='Tourist') echo 'selected'; ?>>Tourist</option>
                                <option value="Visit" <?php if($user->visa=='Visit') echo 'selected'; ?>>Visit</option>
                              </select>
                            </div>
                            <div class="form-group input-group col-md-12">
                              <label for="image" class="bmd-label-floating"></label>
                              <label class="btn btn-raised hero-radius btn-644e97 mat-submit edit-upload-btn"><i class="fa fa-camera" aria-hidden="true">&nbsp;</i> Add Image
                                <input type="file" class="ngo_proof_attach_input_file form-control image-upload" name="image" id="image" accept="image/png, image/jpeg, image/jpg" data-fv-file-type="image/png, image/jpeg, image/jpg" multiple required="" style="display: none;" max="10" />
                              </label>
                              <br>
                              <span class="help-block allow-txt"> Allowed type (.jpg, .png, .jpeg) 
                              
                              Max Size: 5MB </span> </div>
                            <div class="form-group dvPreview"> </div>
                            <div class="form-group col-md-12 ad-btn-wrap mx-auto edit-profile-btn">
                              <button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit profile-btn" id="submit">Submit</button>
                              <button type="button" class="btn btn-raised hero-radius btn-FF9800 mat-submit profile-btn" id="cancel">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- personal-info -->
            
            <div class="col-md-8 col-sm-12 col-xs-12 dashboard-right-wrap">
              <div class="dashboard-right">
                <nav>
                  <div class="nav nav-pills" id="nav-tab" role="tablist"> <a class="nav-item nav-link  <?php if($this->input->get('type') == 'posts') echo 'active show'; elseif($this->input->get('type') == '') echo 'active show'; ?>" id="nav-home-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="nav-home" aria-selected="true">My Ads (<?php echo $totalpost; ?>) <span></span></a> <a class="nav-item nav-link <?php if($this->input->get('type') == 'favorites') echo 'active show'; ?>" id="nav-profile-tab" data-toggle="tab" href="#nav-fav" role="tab" aria-controls="nav-profile" aria-selected="false">My Favorites (<?php echo $totalfav; ?>)<span></span></a> <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-notific" role="tab" aria-controls="nav-contact" aria-selected="false">Notifications <span></span></a> </div>
                </nav>
                <div class="tab-content">
                  <div class="tab-pane fade show active <?php if($this->input->get('type') == 'posts') echo 'active show'; ?>" id="posts" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="tab-title inline-block"></div>
                    
                    <div class="fav-list-wrap">
                      <div class="row my-posts-div" id="my-posts">
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane dashboard-switch fade <?php if($this->input->get('type') == 'favorites') echo 'active show'; ?>" id="nav-fav" role="tabpanel" aria-labelledby="nav-profile-tab"> 
                    
                    <div class="fav-list-wrap">
                      <div class="row my-fav-div" id="my-fav"> </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
<script src="assets/front_end/js/intlTelInput.js"></script> 
<script src="assets/front_end/js/defaultCountryIp.js"></script> 
<script src="assets/front_end/js/jquery.validate.js"></script> 
<script type="application/javascript">
	$( document ).ready( function ( e ) {
		var per_page = <?php if($this->input->get('per_page')) echo $this->input->get('per_page').';'; else echo '0;'; ?>
			<?php if($this->input->get('type') == '' || $this->input->get('type') == 'posts') { ?>
		$.ajax( {
			'url': '<?php echo base_url(); ?>/getUserPostListings?per_page=' + per_page,
			'async': false,
			'type': "get",
			'dataType': "html",
			'success': function ( data ) {
				if ( data != '' ) {
					$( '.my-posts-div' ).fadeIn( 'slow' );
					$( '.fadeeffect-3' ).fadeIn( 5000 );
					$( '#my-posts' ).html( data );
				} else {
					$( '#my-posts' ).html( data );
				}
			}
		} );
		<?php } ?>
		<?php if($this->input->get('type') == 'favorites') { ?>
		$.ajax( {
				'url': '<?php echo base_url(); ?>/getUserFavListings?per_page=' + per_page,
				'async': false,
				'type': "get",
				'dataType': "html",
				'success': function ( data ) {
					if ( data != '' ) {
						$( '.my-fav-div' ).fadeIn( 'slow' );
						$( '.fadeeffect-3' ).fadeIn( 5000 );
						$( '#my-fav' ).html( data );
					} else {
						$( '#my-fav' ).html( data );
					}
				}
			} );
		<?php } ?>
		$( '#nav-profile-tab' ).click( function ( e ) {
			$.ajax( {
				'url': '<?php echo base_url(); ?>/getUserFavListings?per_page=' + per_page,
				'async': false,
				'type': "get",
				'dataType': "html",
				'success': function ( data ) {
					if ( data != '' ) {
						$( '.my-fav-div' ).fadeIn( 'slow' );
						$( '.fadeeffect-3' ).fadeIn( 5000 );
						$( '#my-fav' ).html( data );
					} else {
						$( '#my-fav' ).html( data );
					}
				}
			} );
		} );
		$(document).on('click','.unfavorites',function(e){
		var id = $(this).attr('id');
		$.ajax({
			url:'<?php echo base_url(); ?>unsetfavorites',
			type: "POST", //The type which you want to use: GET/POST
			data: { 'id' : id },
			success: function(data){
				$(".fav-"+id).fadeOut('slow');
		   },
		   error:function (xhr, ajaxOptions, thrownError){
           }
		});
		e.preventDefault();
 	});
		$( "#update-form" ).validate( {

			rules: {

				first_name: "required",

				last_name: "required"

			},

			messages: {

				first_name: "Please enter the first name",

				last_name: "Please enter the last name"

			}

		} );

		$( document ).on( 'click', '#edit-profile', function ( e ) {

			$( "#edit-profile" ).hide();

			$( "#v-pills-home" ).hide();

			$( "#update-pills-home" ).fadeIn( 'slow' );

		} );

		$( document ).on( 'click', '#cancel', function ( e ) {

			$( "#edit-profile" ).fadeIn( 'slow' );

			$( "#v-pills-home" ).fadeIn( 'slow' );

			$( "#update-pills-home" ).hide();

			$( 'html, body' ).animate( {

				scrollTop: $( "#sticky-hero" ).offset().top

			}, 500 );

		} );

		$( ".image-upload" ).change( function () {

			var fileupload = $( this );

			var i = 0;

			if ( typeof ( FileReader ) != "undefined" ) {

				var id = fileupload.attr( 'id' );

				var inputName = 'main_image';

				var dvPreview = $( '.dvPreview' );

				dvPreview.children( 'span' ).each( function ( index, element ) {

					if ( $( this ).attr( 'id' ) == undefined ) {

						$( this ).remove();

					}

				} );

				var regex = /^([a-zA-Z0-9\s_\\.\-:()])+(.jpg|.jpeg|.gif|.png|.bmp)$/;

				$( $( this )[ 0 ].files ).each( function ( index, element ) {

					var file = $( this );

					if ( regex.test( file[ 0 ].name.toLowerCase() ) ) {

						var radioChecked = '';

						if ( index == 0 && $( 'input[name=' + inputName + ']:checked' ).val() == undefined ) {

							radioChecked = 'checked="checked"';

						}

						var reader = new FileReader();

						reader.onload = function ( e ) {

							dvPreview.append( '<span class="text-center preview-span"><div class="col-md-12 box text-center" id="' + i + '"><img src="' + e.target.result + '" alt="..." class="img-thumbnail img-check"></div></span>' );

						};

						reader.readAsDataURL( file[ 0 ] );

					} else {

						alert( "Please select only images!" );

						fileupload.val( '' );

						dvPreview.children( 'span' ).each( function ( index, element ) {

							if ( $( this ).attr( 'id' ) == undefined ) {

								$( this ).remove();

							}

						} );

						return false;

					}

				} );

			} else {

				alert( "This browser does not support HTML5 FileReader." );

			}

		} );

	} );
</script>