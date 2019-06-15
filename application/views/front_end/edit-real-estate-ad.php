<?php
$this->load->view('blocks/header');
$userdata = $this->session->userdata( 'logged_yalalink_userdata' );
$currency = $this->session->userdata( 'currency' );
?>
<!--<link rel="stylesheet" href="assets/admin/vendor/formvalidation/formValidation.css">
<link rel="stylesheet" href="assets/admin/css/forms/validation.min.css">-->
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">

<div class="full-wrap bg-ad">
	<div class="container">
		<div class="row" style="margin-top: 50px;border: 1px solid #4fc3c533;margin-bottom: 15px;padding: 18px;">
			<div class="col-md-12">
				<div class="post-ad-wrap">
				
						<h3 style="color:black;">Update Your Real Estate Ad </h3>
						
							<form class="m-t-15" action="updateRealestate" enctype="multipart/form-data" method="post" name="post-form" id="post-form">
								<input type="hidden" name="main_category" value="<?php echo $this->input->get('category'); ?>">
								<input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">
								<div class="row">
									<div class="col-md-12">
										<label class="form-check-label mat-label-color" for="type">Choose Type:</label>
										<div class="col-md-6 inline-block radio-wrap">
											<label class="radio-inline">
                        <input type="radio" name="type" id="type_1" value="New" <?php if($edit->type == 'New'){ echo 'checked'; }?>>
                        New </label>
										
											<label class="radio-inline">
                        <input type="radio" name="type" id="type_2" value="Used" <?php if($edit->type == 'Used'){ echo 'checked'; }?>>
                        Used </label>
										
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group bmd-form-group">
											<label for="title_en" class="bmd-label-floating">Title in English:</label>
											<input type="text" class="form-control no-border mat-txt mat-font first-txt" name="title_en" id="title_en" value="<?php echo $edit->title_en; ?>">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group bmd-form-group">
											<label for="title_ar" class="bmd-label-floating">Title in Arabic:</label>
											<input type="text" class="form-control no-border mat-txt mat-font first-txt" style="direction:rtl;" name="title_ar" id="title_ar" value="<?php echo $edit->title_ar; ?>">
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
						if($details->purpose == $val->id){
							$selected = 'selected';
						}?>
												<option value="<?php echo $val->id; ?>" <?php echo $selected; ?>>
													<?php echo $val->category; ?>
												</option>
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
						if($details->property_type == $val->id){
							$selected = 'selected';
						}?>
												<option value="<?php echo $val->id; ?>" <?php echo $selected; ?>>
													<?php echo $val->subcategory; ?>
												</option>
												<?php } } ?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group bmd-form-group">
											<label for="price" class="bmd-label-floating">Price (<?php echo @$currency; ?>):</label>
											<input type="text" class="form-control no-border mat-txt mat-font first-txt" id="price" name="price" value="<?php echo $edit->price; ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group select-box-search bmd-form-group mat-select">
											<label for="price_per" class="bmd-label-floating mat-label-color">Price Per Year/Month:</label>
											<select class="form-control" name="price_per" id="price_per">
												<option value="">Select Price Per Year/Month</option>
												<option value="Year" <?php if($details->price_per == 'Year'){ echo 'selected'; }?>>Year</option>
												<option value="Month" <?php if($details->price_per == 'Month'){ echo 'selected'; }?>>Month</option>
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
												<option value="Studio" <?php if($details->bedroom == 'Studio'){ echo 'checked'; }?>
													<?php if($details->price_per == 'Year'){ echo 'checked'; }?>>Studio</option>
												<option value="1" <?php if($details->bedroom == 1){ echo 'selected'; }?>>1</option>
												<option value="2" <?php if($details->bedroom == 2){ echo 'selected'; }?>>2</option>
												<option value="3" <?php if($details->bedroom == 3){ echo 'selected'; }?>>3</option>
												<option value="4" <?php if($details->bedroom == 4){ echo 'selected'; }?>>4</option>
												<option value="5" <?php if($details->bedroom == 5){ echo 'selected'; }?>>5</option>
												<option value="5+" <?php if($details->bedroom == '5+'){ echo 'selected'; }?>>5+</option>
											</select>
										</div>
									</div>
									<div class="col-md-3 residential">
										<div class="form-group select-box-search bmd-form-group mat-select">
											<label for="bathrooms" class="bmd-label-floating mat-label-color">Choose Bathrooms:</label>
											<select class="form-control" name="bathroom" id="bathroom">
												<option value="">Select Bathrooms</option>
												<option value="1" <?php if($details->bathroom == 1){ echo 'selected'; }?>>1</option>
												<option value="2" <?php if($details->bathroom == 2){ echo 'selected'; }?>>2</option>
												<option value="3" <?php if($details->bathroom == 3){ echo 'selected'; }?>>3</option>
												<option value="4" <?php if($details->bathroom == 4){ echo 'selected'; }?>>4</option>
												<option value="5" <?php if($details->bathroom == 5){ echo 'selected'; }?>>5</option>
												<option value="5+" <?php if($details->bathroom == '5+'){ echo 'selected'; }?>>5+</option>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group bmd-form-group">
											<label for="size" class="bmd-label-floating">Size (SqFt):</label>
											<input type="text" class="form-control no-border mat-txt mat-font first-txt" id="size" name="size" value="<?php echo $details->size; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="form-group bmd-form-group">
											<label for="size" class="bmd-label-floating">Contact Number:</label>
											<input type="text" class="form-control no-border mat-txt mat-font first-txt" id="contact" name="contact" value="<?php echo $edit->mobile; ?>">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group bmd-form-group">
											<label for="size" class="bmd-label-floating">Email:</label>
											<input type="text" class="form-control no-border mat-txt mat-font first-txt" id="email" name="email" value="<?php echo $edit->email; ?>">
										</div>
									</div>
								</div>
								<div class="row residential">
									<div class="col-md-12">
										<div class="card-header" style="background-color: #662d91a1;color:white;">Facilities & Amenities</div>
										<div class="form-group bmd-form-group mat-select">
											<label for="amenities" class="mat-label-color">Choose Facilities & Amenities:</label>
											<select multiple="multiple" size="10" name="amenities[]" id="re_amenities">
												<?php $amenity = getPropertyAmenities('Residential');
						$amenitiess = array();
						foreach($amenities as $val) {
						 $amenitiess[] = $val->amenity_id;
						}
						if($amenity){
						  foreach($amenity as $val){
							  $selected = '';
							  if(in_array($val->id, $amenitiess))
							  $selected = 'selected="selected"';
							echo '<option value="'.$val->id.'" '.$selected.'>'.$val->name.'</option>';
						}} ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row commercial">
									<div class="col-md-12">
										<div class="card-header">Facilities & Amenities</div>
										<div class="form-group bmd-form-group mat-select">
											<label for="amenities" class="mat-label-color">Choose Facilities & Amenities:</label>
											<select multiple="multiple" size="10" name="amenities[]" id="co_amenities">
												<?php $amenity = getPropertyAmenities('Commercial');
							$amenitiess = array();
							foreach($amenities as $val) {
							 $amenitiess[] = $val->amenity_id;
							}
							if($amenity){
							  foreach($amenity as $val){
								  $selected = '';
								  if(in_array($val->id, $amenitiess))
								  $selected = 'selected="selected"';
								echo '<option value="'.$val->id.'" '.$selected.'>'.$val->name.'</option>';
							}} ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="card-header" style="background-color: #662d91a1;color:white;">Location </div>
										<div class="form-group select-box-search bmd-form-group mat-select">
											<label for="country" class="bmd-label-floating mat-label-color">Choose Country:
                        <?php //$getloc = json_decode(file_get_contents("http://ipinfo.io/")); ?>
                      </label>
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
                        <option value="<?php echo $val->id; ?>" <?php echo $selected; ?> ><?php echo $val->name; ?></option>
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
											<input type="text" class="form-control no-border mat-txt mat-font first-txt" id="latitude" name="latitude">
										</div>
									</div>
									<div class="col-md-3">
										<div class="card-header" style="background:none;>&nbsp;</div>
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
										<div class="card-header"  style="background-color: #662d91a1;color:white;">Description</div>
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
<?php $this->load->view('front_end/include/footer'); ?>
<script src="assets/ckeditor/ckeditor.js"></script>
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script>
<script src="assets/front_end/js/jquery.validate.js"></script>
<script src="assets/front_end/js/jquery.bootstrap-duallistbox.js"></script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCb8mnr3T1fcU8UgpCWylaH3rqfVdBsPbk&libraries=places'></script>
<script src="assets/front_end/js/locationpicker.jquery.js"></script>
<script type="application/javascript">
	var demo1 = $( 'select[name="amenities[]"]' ).bootstrapDualListbox();
	var roxyFileman = 'assets/fileman/index.html';
	$( function () {
		CKEDITOR.replace( 'description', {
			enterMode: CKEDITOR.ENTER_BR,
			shiftEnterMode: CKEDITOR.ENTER_P,
			filebrowserBrowseUrl: 'assets/fileman/index.html?integration=ckeditor',
			filebrowserImageBrowseUrl: 'assets/fileman/index.html?integration=ckeditor&type=image',
			removeDialogTabs: 'link:upload;image:upload'
		} );
	} );
	<?php $lat = $res->latitude;
	  $long = $res->longitude;
	  if($lat == 0 || $lat == ''){
		$lat = '25.1968143';  
	  }
	  if($long == 0 || $long == ''){
		$long = '55.2709185';  
	  }?>

	function updateControls( addressComponents ) {
		$( '#country' ).val( addressComponents.country );
	}
	$( '#map' ).locationpicker( {
		location: {
			latitude: <?php echo $lat; ?>,
			longitude: <?php echo $long; ?>
		},
		radius: 800,
		zoom: 13,
		onchanged: function ( currentLocation, radius, isMarkerDropped ) {
			var addressComponents = $( this ).locationpicker( 'map' ).location.addressComponents;
			updateControls( addressComponents );
		},
		inputBinding: {
			latitudeInput: $( '#latitude' ),
			longitudeInput: $( '#longitude' ),
			radiusInput: $( '#us3-radius' ),
			locationNameInput: $( '#address' )
		},
		enableAutocomplete: true,
		oninitialized: function ( component ) {
			var addressComponents = $( component ).locationpicker( 'map' ).location.addressComponents;
			updateControls( addressComponents );
		}
	} );
	<!--getCity($("#country").val());-->
	function getCity( country ) {
		$( '.area' ).hide();
		$.ajax( {
			'url': '<?php echo base_url(); ?>get_location/' + country,
			'async': false,
			'type': "get",
			'dataType': "html",
			'success': function ( data ) {
				if ( data != 'empty' ) {
					$( '#location' ).html( data );
				} else {
					$( '#location' ).html( data );
				}
			}
		} );
	}
	<!--getArea($("#location").val());-->
	function getArea( city ) {
		$( '.area' ).show();
		$.ajax( {
			'url': '<?php echo base_url(); ?>get_area/' + city,
			'async': false,
			'type': "get",
			'dataType': "html",
			'success': function ( data ) {
				if ( data != 'empty' ) {
					$( '.area' ).fadeIn( 'slow' );
					$( '#area' ).html( data );
				} else {
					$( '.area' ).hide();
					$( '#area' ).html( data );
				}
			}
		} );
	}
	$( document ).ready( function ( e ) {
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
		$( "#post-form" ).validate( {
			rules: {
				type: "required",
				purpose: "required",
				property_type: "required",
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
				price: "Please enter price",
				title_en: {
					required: "Please enter title",
					minlength: "Your title must consist of at least 6 characters"
				}
			}
		} );
		$( '#country' ).change( function ( e ) {
			$( '.area' ).hide();
			getCity( this.value );
		} );
		$( '#location' ).change( function ( e ) {
			getArea( this.value );
		} );
		$( '#map_canvas' ).hide();
		$( document ).on( 'click', '.img-check', function ( e ) {
			$( '.check-active' ).removeClass( 'check-active' );
			$( '.text-main' ).hide();
			$( '.set-main' ).hide();
			$( this ).siblings( '.set-main' ).hide();
			$( this ).parent().addClass( 'check-active' );
			$( this ).siblings( '.text-main' ).show();
			$( '.img-check' ).not( this ).removeClass( 'check' ).siblings( 'input' ).prop( 'checked', false );
			$( this ).addClass( 'check' ).siblings( 'input' ).prop( 'checked', true );
		} );
		$( document ).on( 'click', '.set-main', function ( e ) {
			$( '.check-active' ).removeClass( 'check-active' );
			$( '.text-main' ).hide();
			$( '.set-main' ).hide();
			$( this ).hide();
			$( this ).parent().addClass( 'check-active' );
			$( this ).siblings( '.text-main' ).show();
			$( '.img-check' ).not( this ).removeClass( 'check' ).siblings( 'input' ).prop( 'checked', false );
			$( this ).addClass( 'check' ).siblings( 'input' ).prop( 'checked', true );
		} );
		$( document ).on( 'change', ':file', function () {
			var input = $( this ),
				numFiles = input.get( 0 ).files ? input.get( 0 ).files.length : 1,
				label = input.val().replace( /\\/g, '/' ).replace( /.*\//, '' );
			input.trigger( 'fileselect', [ numFiles, label ] );
		} );
		$( ':file' ).on( 'fileselect', function ( event, numFiles, label ) {

			var input = $( this ).parents( '.input-group' ).find( ':text' ),
				log = numFiles > 1 ? numFiles + ' files selected' : label;

			if ( input.length ) {
				input.val( log );
			} else {
				if ( log ) alert( log );
			}

		} );
		$( '#purpose' ).change( function ( e ) {
			if ( $( '#category' ).val() == 6 ) {} else {}
		} );
		$( '.residential' ).hide();
		$( '.commercial' ).hide();
		$( '#property_type' ).change( function ( e ) {
			if ( $( '#property_type' ).val() == 4 || $( '#property_type' ).val() == 8 || $( '#property_type' ).val() == 9 || $( '#property_type' ).val() == 11 || $( '#property_type' ).val() == 14 || $( '#property_type' ).val() == 15 ) {
				$( '.residential' ).show();
				$( '.commercial' ).hide();
				$( "#co_amenities" ).prop( 'disabled', true );
				$( "#re_amenities" ).prop( 'disabled', false );
			} else if ( $( '#property_type' ).val() == 5 || $( '#property_type' ).val() == 6 || $( '#property_type' ).val() == 7 ) {
				$( '.residential' ).hide();
				$( '.commercial' ).show();
				$( "#co_amenities" ).prop( 'disabled', false );
				$( "#re_amenities" ).prop( 'disabled', true );
			}
		} );
		if ( $( '#property_type' ).val() == 4 || $( '#property_type' ).val() == 8 || $( '#property_type' ).val() == 9 || $( '#property_type' ).val() == 11 || $( '#property_type' ).val() == 14 || $( '#property_type' ).val() == 15 ) {
			$( '.residential' ).show();
			$( '.commercial' ).hide();
			$( "#co_amenities" ).prop( 'disabled', true );
			$( "#re_amenities" ).prop( 'disabled', false );
		} else if ( $( '#property_type' ).val() == 5 || $( '#property_type' ).val() == 6 || $( '#property_type' ).val() == 7 ) {
			$( '.residential' ).hide();
			$( '.commercial' ).show();
			$( "#co_amenities" ).prop( 'disabled', false );
			$( "#re_amenities" ).prop( 'disabled', true );
		}
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
							dvPreview.append( '<span class="text-center preview-span"><div class="col-md-12 box text-center" id="' + i + '"><label class="btn main-label"><img src="' + e.target.result + '" alt="..." class="img-thumbnail img-check"><input type="radio" name="' + inputName + '" value="' + index + '" id="main_image_' + i + '" ' + radioChecked + '" class="d-none" autocomplete="off"><span class="text-main" style="display:none;"><i class="fa fa-check-circle">&nbsp;</i></span><span class="set-main"><i class="fa fa-check">&nbsp;</i>Set main</span></label></div></span>' );
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