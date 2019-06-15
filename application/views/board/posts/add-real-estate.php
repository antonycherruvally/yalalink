<?php
$this->load->view('board/blocks/header', ['navigation' => true]); 
$loc = Core::getHelper("location");
$curC = $loc->getCurrentCountry();
?>
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
				<?php $this->load->view('board/posts/leftsidenav'); ?>
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<?php $this->load->view('board/blocks/breadcrumbs', [
						'title' => 'Real Estate',
						'b1' => [
							'Posts', 
							Core::getBaseUrl() . 'board/posts'
						],
						'b2' => [
							'Add Real Estate', 
							Core::getBaseUrl() . 'board/posts/create/real-estate'
						],
					]); ?>
					<div class="m-content">
						<div class="row">
							<!-- start:form -->
							<div class="col-lg-12">
							<!--begin::Portlet-->
								<div class="m-portlet">
									<?php $this->load->view('board/blocks/alert'); ?>
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Enter Real Estate details below
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form id="frmAddAds" method="POST" action="<?= Core::getBaseUrl() ?>board/save" enctype="multipart/form-data" autocomplete="off" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
										<input type="hidden" name="model" value="real_estate">
										<input type="hidden" name="linker" id="linker" value="<?= crc32(uniqid()) ?>">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Choose Type:
												</label>
												<div class="col-lg-3">
													<div class="m-radio-inline">
														<label class="m-radio">
															<input type="radio" id="type" name="type" value="New" class="required">
															New
															<span></span>
														</label>
														<label class="m-radio">
															<input type="radio" id="type" name="type" value="Used">
															Used
															<span></span>
														</label>
													</div>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Title in English:
												</label>
												<div class="col-lg-4">
													<input type="text" name="title_en" id="title_en" class="form-control m-input" placeholder="Enter title in english">
												</div>
												<label class="col-lg-2 col-form-label">
													Title in Arabic:
												</label>
												<div class="col-lg-4">
													<input type="text" name="title_ar" id="title_ar" class="form-control m-input" placeholder="Enter title in arabic">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<div class="col-lg-4 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="category" name="category">
														<option value=""></option>
														<option value="1">For Sale</option>
														<option value="2">For Rest</option>
														<option value="3">For Share</option>
													</select>
												</div>
												<div class="col-lg-4 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="subcategory" name="subcategory">
														<option></option>
														<?php
															$cats = Core::getModel('real_estate')->getCategory();
															if( $cats ) {
																foreach( $cats as $ct ) {
																	?>
																	<option value="<?= $ct->id ?>"><?= $ct->subcategory ?></option>
																	<?php
																}
															}
														?>
													</select>
												</div>
												<div class="col-lg-3" style="margin-bottom: 1%;">
													<input type="text" name="price" id="price" class="form-control m-input" placeholder="Enter Price">
												</div>
											</div>

											<div class="form-group m-form__group row villas">
												<div class="col-lg-4 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="bedroom" name="bedroom">
														<option></option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="5+">5+</option>
													</select>
												</div>
												<div class="col-lg-4 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="bathroom" name="bathroom">
														<option></option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="5+">5+</option>
													</select>
												</div>
												<div class="col-lg-4 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="garage" name="garage">
														<option></option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3+">3+</option>
													</select>
												</div>
											</div>

											<div class="form-group m-form__group row villas">
												<div class="col-lg-6 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="pool" name="pool">
														<option></option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3+">3+</option>
													</select>
												</div>
												<div class="col-lg-6 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="balcony" name="balcony">
														<option></option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3+">3+</option>
													</select>
												</div>
											</div>

											<div class="form-group m-form__group row">
												<div class="col-lg-5 col-md-9 col-sm-12">
													<select class="form-control m-select2" id="price_per" name="price_per">
														<option></option>
														<option value="Year">Per Year</option>
														<option value="Month">Per Month</option>
													</select>
												</div>
												<label class="col-lg-2 col-form-label">
													Size (SqFt):
												</label>
												<div class="col-lg-3">
													<input type="text" name="size" id="size" class="form-control m-input" placeholder="Enter size">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Contact:
												</label>
												<div class="col-lg-3">
													<input type="text" name="mobile" id="mobile" class="form-control m-input" placeholder="Enter Contact Number">
												</div>
												<label class="col-lg-2 col-form-label">
													Email:
												</label>
												<div class="col-lg-3">
													<input type="email" name="email" id="email" class="form-control m-input" placeholder="Enter Email">
												</div>
											</div>

											<div class="form-group m-form__group row villas">
												<label class="col-lg-3 col-form-label">
													Facilities & Amenities:
												</label>
												<div class="col-lg-9">
													<select multiple="multiple" size="10" name="amenity[]" id="amenity">
													<?php $amenity = getPropertyAmenities('Residential');
														if($amenity){
															foreach($amenity as $val){
																echo '<option value="'.$val->id.'">'.$val->name.'</option>';
															}
														} 
													?>
												  </select>
												</div>
											</div>

											<div class="form-group m-form__group row">
												<div class="col-lg-4 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="country" name="country">
														<option></option>
														<?php
															$countries = $loc->getCountries();
															if( $countries ) {
																foreach( $countries as $ct ) {
																	?>
																	<option value="<?= $ct->id ?>"><?= $ct->name ?></option>
																	<?php
																}
															}
														?>
													</select>
												</div>
												<div class="col-lg-4 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="location" name="location">
														<option></option>
													</select>
												</div>
												<div class="col-lg-4 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="area" name="area">
														<option></option>
													</select>
												</div>
											</div>

											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Location:
												</label>
												<div class="col-lg-10">
													<div class="m-portlet__body">
														<form class="form-inline margin-bottom-10" action="#">
															<div class="input-group" style="margin-bottom: 1%;">
																<input type="text" class="form-control" value="dubai" id="m_gmap_8_address" placeholder="address...">
																<div class="input-group-append">
																	<button class="btn btn-primary" id="m_gmap_8_btn">
																		<i class="fa fa-search"></i>
																	</button>
																</div>
															</div>
														</form>
														<div id="m_gmap_8" style="height:300px;"></div>
													</div>
												</div>
											</div>

											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													latitude:
												</label>
												<div class="col-lg-3">
													<input type="text" name="latitude" id="latitude" class="form-control m-input" placeholder="latitude">
												</div>
												<label class="col-lg-2 col-form-label">
													longitude:
												</label>
												<div class="col-lg-3">
													<input type="text" name="longitude" id="longitude" class="form-control m-input" placeholder="longitude">
												</div>
											</div>

											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Description:
												</label>
												<div class="col-lg-10">
													<textarea class="form-control m-input" name="description" id="description" rows="3"></textarea>
												</div>
											</div>

											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-12">
													Upload Images
												</label>
												<div class="col-lg-9 col-md-9 col-sm-12">
													<div class="m-dropzone dropzone m-dropzone--success" action="<?= Core::getBaseUrl() ?>board/upload" id="m-dropzone-three">
														<div class="m-dropzone__msg dz-message needsclick">
															<h3 class="m-dropzone__msg-title">
																Drop files here or click to upload.
															</h3>
															<span class="m-dropzone__msg-desc">
																Maximum size is 5mb
															</span>
														</div>
													</div>
												</div>
												<label class="col-lg-3 col-form-label">
													Selected Main Image:
												</label>
												<div class="col-lg-9">
													<h3 class="m--font-success" id="mainImageText">Select the main image above.</h3>
													<input type="hidden" name="mainImage" id="mainImage">
												</div>
											</div>

											<div class="form-group m-form__group row">
												<div class="col-lg-6 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="ad_type" name="ad_type">
														<option></option>
														<option value="normal">Normal</option>
														<option value="hot_deals">Hot Deals</option>
														<option value="special_offers">Special Offers</option>
														<option value="weakdeal">Deal of the Week</option>
													</select>
												</div>
												<div class="col-lg-6 col-md-9 col-sm-12" style="margin-bottom: 1%;">
													<select class="form-control m-select2" id="featured" name="featured">
														<option></option>
														<option value="0">Normal</option>
														<option value="1">Featured</option>
													</select>
												</div>
											</div>

										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-lg-10">
														<input type="submit" name="btnAdAdds" value="Submit" class="btn btn-success">
														<button type="reset" class="btn btn-secondary">
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
									</div>
									</form>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->
							</div>
							<!-- end:form -->
						</div>
					</div>
				</div>
		</div>
		<!-- end::Body -->
<?php $this->load->view('board/blocks/footer', [
	'footermisc' => true,
]);  ?>
<script src="//maps.google.com/maps/api/js?key=AIzaSyCb8mnr3T1fcU8UgpCWylaH3rqfVdBsPbk&libraries=places" type="text/javascript"></script>
<script src="<?= Core::getBaseUrl() ?>assets/board/assets/vendors/custom/gmaps/gmaps.js" type="text/javascript"></script>
<script src="<?= Core::getBaseUrl() ?>assets/board/demo/default/custom/components/maps/google-maps.js" type="text/javascript"></script>
<script src="<?= Core::getBaseUrl() ?>assets/board/tinymce/tinymce.min.js" type="text/javascript"></script>
<script src="<?= Core::getBaseUrl() ?>assets/board/js/global.js" type="text/javascript"></script>
<script src="<?= Core::getBaseUrl() ?>assets/front_end/js/jquery.bootstrap-duallistbox.js" type="text/javascript"></script>
<script type="text/javascript">
	tinymce.init({
		selector: '#description',
		branding: false,
		height: 200,
	plugins: [
	  'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
	  'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
	  'save table contextmenu directionality emoticons template paste textcolor'
	],
	content_css: 'css/content.css',
	toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
	});
	$("#category").select2( {
			placeholder: "Select a purpose", allowClear: !0
	});

	$("#ad_type").select2( {
			placeholder: "Select Ad Type", allowClear: !0
	});

	$("#featured").select2( {
			placeholder: "Select to feature this ad", allowClear: !0
	});

	$("#country").select2( {
			placeholder: "Select Country", allowClear: !0
	});

	$("#location").select2( {
			placeholder: "Select Location", allowClear: !0
	});

	$("#area").select2( {
			placeholder: "Select Area", allowClear: !0
	});

	$("#subcategory").select2( {
			placeholder: "Select property type", allowClear: !0
	});

	$("#price_per").select2( {
			placeholder: "Select Price Per Year/Month", allowClear: !0
	});

	$("#bedroom").select2( {
			placeholder: "Select Bed Room", allowClear: !0
	});

	$("#bathroom").select2( {
			placeholder: "Select Bath Room", allowClear: !0
	});

	$("#garage").select2( {
			placeholder: "Select Garage", allowClear: !0
	});

	$("#pool").select2( {
			placeholder: "Select Pool", allowClear: !0
	});

	$("#balcony").select2( {
			placeholder: "Select Balcony", allowClear: !0
	});

/**
 * Form Validation
 */
$('#frmAddAds').validate({
	focusInvalid: true,
	rules: {
		title_en: {
			required: true,
			minlength: 3
		},
		category: {
			required:true
		},
		subcategory: {
			required:true
		},
		price: {
			required:true
		},
		price_per:{
			required:true
		},
		country: {
			required:true
		},
		location:{
			required:true
		},
		mobile:{
			required:true,
			digits:true
		},
		size:{
			required:true
		},
		mainImage: {
			required:true
		}
	}
});

/**
 *	initialize Google Map
 */
n = new GMaps({
			div: "#m_gmap_8",
			lat: 25.1968143,
			lng: 55.27091849999999,
			zoom: 13,
			disableDefaultUI: true,
		}), l = function() {
			var t = $.trim($("#m_gmap_8_address").val());
			GMaps.geocode({
				address: t,
				callback: function(t, e) {
					if ("OK" == e) {
						var o = t[0].geometry.location;
						n.removeMarker();
						n.setCenter(o.lat(), o.lng()), n.addMarker({
							lat: o.lat(),
							lng: o.lng(),
							draggable:true,
							dragend: function(event) {
								var lat = event.latLng.lat();
								var lng = event.latLng.lng();
								console.log(t[0].formatted_address);
								console.log('draggable '+lat+" - "+ lng);
							}
						});
					}
				}
			})
		}, $("#m_gmap_8_btn").click(function(t) {
			t.preventDefault(), l()
		}), $("#m_gmap_8_address").keypress(function(t) {
			"13" == (t.keyCode ? t.keyCode : t.which) && (t.preventDefault(), l())
		});

function initialize() {

  var ac = new google.maps.places.Autocomplete(
	(document.getElementById('m_gmap_8_address')), {
	  types: ['geocode']
	});

  ac.addListener('place_changed', function() {

	var place = ac.getPlace();

	if (!place.geometry) {
	  // User entered the name of a Place that was not suggested and
	  // pressed the Enter key, or the Place Details request failed.
	  // Do anything you like with what was entered in the ac field.
	  console.log('You entered: ' + place.name);
	  return;
	}

	console.log('You selected: ' + place.formatted_address);
  });
}

initialize();
l(); // auto locate the location

/**
 *	get lat and lng from string
 */
function getLatlng( str ) {
	var geocoder =  new google.maps.Geocoder();
	geocoder.geocode( { 'address': str}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) {
			$('#latitude').val(results[0].geometry.location.lat());
			$('#longitude').val(results[0].geometry.location.lng());
			// console.log("location : " + results[0].geometry.location.lat() + " " +results[0].geometry.location.lng()); 
		}
	});
}

/**
 *	Dual list box [aminities]
 */
var demo1 = $('select[name="amenity[]"]').bootstrapDualListbox();
$('.villas').css('display', 'none');
$("#subcategory").change(function (e) {
	var id = this.value;
	console.log( id );
	if( id == 4 || id == 5 ) {
		$('.villas').css('display', 'flex');
	}else{
		$('.villas').css('display', 'none');
	}
});

/**
 * Selecting country
 */
$("#country").change(function (e) {
	var id = this.value;
	var param = {
		'getLocations':1,
		'id':id
	};
	param = $.param( param );
	$('#location').empty();
	$('#location').append('<option></option>');
	$.getJSON( site.baseUrl + 'api/?' + param, function( data ) {
		$.each( data, function( key, val ) {
			$('#location').append('<option value="'+ val.id +'">'+ val.location +'</option>');
		});
	});
});

/**
 * Selecting country
 */
$("#location").change(function (e) {
	var id = this.value;
	var param = {
		'getareas':1,
		'id':id
	};
	param = $.param( param );
	$('#area').empty();
	$('#area').append('<option></option>');
	$.getJSON( site.baseUrl + 'api/?' + param, function( data ) {
		$.each( data, function( key, val ) {
			$('#area').append('<option value="'+ val.id +'">'+ val.location +'</option>');
		});
	});
});

/**
 *	Dropzone
 */
function sanitizeFname( str ) {
	return str.replace(/ /g,"_").replace(/\./g, '_');
}
Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("div#m-dropzone-three", {
	maxFiles:'15',
	acceptedFiles:'image/*',
	maxFilesize: 5,
	uploadMultiple: true,
	url:site.baseUrl + 'board/upload',
	addRemoveLinks: true,
	params: {
		 linker: $('#linker').val()
	}
});

myDropzone.on("addedfile", function(file) {
	var strName = file.name;
	var elemId = strName.split('.')[0].replace(/ /g,"_");
	if(! $('#' + elemId).length ) {
		$('<input>').attr({
			type: 'hidden',
			id: elemId,
			name: 'image[]',
			value: file.name
		}).appendTo('form#frmAddAds');
	}
	file.previewElement.addEventListener("click", function() {
		$('#mainImageText').text(file.name);
		$('#mainImage').val(file.name);
	});
});

myDropzone.on("removedfile", function(file) {
	var strName = file.name;
	name = strName.split('.')[0];
	$('#' + name).remove();

	$.getJSON( site.baseUrl + "board/rmImg?" + jQuery.param({filename: $('#linker').val() + "_" + sanitizeFname(file.name)}), function( rs ) {
		console.log( rs );
	});
});

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "1000",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};
myDropzone.on("success", function(file, rs) {
	console.log(rs);
	if( rs.status == 'error' ) {
		toastr.error(rs.description);
		// this.removeFile(file);
	}
	
});


var country;
var city;
var area;
$("#country").change(function (e) {
	country = $("#country option:selected").text();
	var rs = getLatlng( country );
	$('#m_gmap_8_address').val(country);
});

$("#location").change(function (e) {
	city = $("#location option:selected").text();
	var strAddress = city + ', ' + country;
	getLatlng( strAddress );
	$('#m_gmap_8_address').val(strAddress);
});

$("#area").change(function (e) {
	area = $("#area option:selected").text();
	var strAddress = area + ', ' + city + ', ' + country;
	getLatlng( strAddress );
	$('#m_gmap_8_address').val(strAddress);
});

</script>