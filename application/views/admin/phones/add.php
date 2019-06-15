<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<!-- Page -->
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Phone</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/real_estate">Phone</a></li>
      <li class="breadcrumb-item active">Add Phone</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Add New Phone</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                <form class="form-signin cv-form" action="admin/insertPhones" enctype="multipart/form-data" method="post" name="posts_form" id="posts_form">
                  <div class="row">
                    <div class="col-md-4"> 
                      <!-- Example Radios -->
                      <div class="example-wrap">
                        <h4 class="example-title">Choose Type</h4>
                        <div class="radio-custom radio-primary">
                          <input type="radio"  name="type" id="type_1" value="New" />
                          <label for="type_1">New</label>
                        </div>
                        <div class="radio-custom radio-primary">
                          <input type="radio"  name="type" id="type_2" value="Used" checked />
                          <label for="type_2">Used</label>
                        </div>
                      </div>
                      <!-- End Example Radios --> 
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="title_en" id="title_en"/>
                        <label class="floating-label">Title In English</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="title_ar" id="title_ar"/>
                        <label class="floating-label">Title In Arabic</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="brand" >
                         <option value="">Select Brand</option>
                        <?php $brand = getBrands('P'); 
                       if($brand){ foreach($brand as $val){?>
                        <option value="<?php echo $val->id ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                       <input type="text" class="form-control" name="model" id="model"/>
                        <label class="floating-label">Model</label>
                      </div>
                    </div>
                    <div class="col-md-4 used">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Age" data-allow-clear="true" name="age" id="age" >
                        <option value="">Select Age</option>
                        <?php $age = array('Brand New','0-1 month','1-6 months','6-12 months','1-2 years','2-5 years','5-10 years','10+ years');
                        foreach ($age as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 used">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Usage" data-allow-clear="true" name="usage" id="usage" >
                        <option value="">Select Usage</option>
                        <?php $usage = array('Still in original packaging','Out of original packaging, but only used once','Used only a few times','Used an average amount, as frequently as would be expected','Used an above average amount since purchased');
                        foreach ($usage as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 used">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Condition" data-allow-clear="true" name="condition" id="condition" >
                       <option value="">Select Condition</option>
                        <?php $condition = array('Perfect inside and out','Almost no noticeable problems or flaws','A bit of wear and tear, but in good working condition','Normal wear and tear for the age of the item, a few problems here and there','Above average wear and tear.  The item may need a bit of repair to work properly');
                        foreach ($condition as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Warranty" data-allow-clear="true" name="warranty" id="warranty" >
                        <option value="">Select Warranty</option>
                        <?php $warranty = array('Yes','No','Does not apply');
                        foreach ($warranty as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="color" >
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
                        if($color){ foreach($color as $val){?>
                        <option value="<?php echo $val->name ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Storage" data-allow-clear="true" name="storage" id="storage" >
                       <option value="">Select Storage</option>
                        <?php $storage = array('Less Than 512 Mb','512 Mb','1 Gb','2 Gb','4 Gb','8 Gb','16 Gb','32 Gb','64 Gb','128 Gb','256 Gb','Other');
                        foreach ($storage as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Operating System" data-allow-clear="true" name="operating_system" id="operating_system" >
                      <option value="">Select Operating System</option>
                        <?php $operating_system = array('Android','Symbian','Ios','Blackberry Os','Windows','Other');
                        foreach ($operating_system as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Camera Resolution" data-allow-clear="true" name="camera_resolution" id="camera_resolution" >
                          <option value="">Select Camera Resolution</option>
                          <?php $camera_resolution = array('Less Than 2 Mp','2 Mp','5 Mp','8 Mp','12 Mp','13 Mp','16 Mp','19 Mp','20.7 Mp','21 Mp','23 Mp','Other');
                          foreach ($camera_resolution as $val) { ?>
                          <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Ram" data-allow-clear="true" name="ram" id="ram" >
                          <option value="">Select Ram</option>
                        <?php $ram = array('4 Mb','8 Mb','16 Mb','32 Mb','64 Mb','128 Mb','512 Mb','1 Gb','1.5 Gb','2 Gb','3 Gb','4 Gb','6 Gb','8 Gb','Other');
                          foreach ($ram as $val) { ?>
                          <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                          <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Battery Capacity" data-allow-clear="true" name="capacity" id="capacity" >
                         <option value="">Select Battery Capacity</option>
                        <?php $capacity = array('Below 1000 Mah','1000 - 2000 Mah','2000 - 3000 Mah','3000 - 4000 Mah','4000 - 5000 Mah','Other');
                        foreach ($capacity as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                       <input type="text" class="form-control" name="dimensions" id="dimensions"/>
                        <label class="floating-label">Dimensions (mm)</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                       <input type="text" class="form-control" name="weight" id="weight"/>
                        <label class="floating-label">Weight (g)</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Removable battery" data-allow-clear="true" name="removable_battery" id="removable_battery" >
                          <option value="">Select Removable battery</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="screen_size" id="screen_size"/>
                        <label class="floating-label">Screen size</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Touchscreen" data-allow-clear="true" name="touchscreen" id="touchscreen" >
                          <option value="">Select Touchscreen</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="resolution" id="resolution"/>
                        <label class="floating-label">Resolution</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Compass/ Magnetometer" data-allow-clear="true" name="compass" id="compass" >
                          <option value="">Select Compass/ Magnetometer</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Proximity sensor" data-allow-clear="true" name="proximity" id="proximity" >
                          <option value="">Select Proximity sensor</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Accelerometer" data-allow-clear="true" name="accelerometer" id="accelerometer" >
                          <option value="">Select Accelerometer</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Ambient light sensor" data-allow-clear="true" name="light" id="light" >
                            <option value="">Select Accelerometer</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Gyroscope" data-allow-clear="true" name="gyroscope" id="gyroscope" >
                          <option value="">Select Gyroscope</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Barometer" data-allow-clear="true" name="barometer" id="barometer" >
                          <option value="">Select Barometer</option>
                          <option value="Yes">Yes</option>
                          <option value="No">No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Temperature sensor" data-allow-clear="true" name="temperature" id="temperature" >
                            <option value="">Select Temperature sensor</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="form_factor" id="form_factor"/>
                        <label class="floating-label">Form factor</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Release Year" data-allow-clear="true" name="release_year" id="release_year" >
                         <option value="">Select Release Year</option>
                        <?php $earliest_year = 1900;
                        foreach (range(date('Y'), $earliest_year) as $x) { ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php } ?>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="price" id="price"/>
                        <label class="floating-label">Price</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="contact" id="contact"/>
                        <label class="floating-label">Contact Number</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="email" id="email"/>
                        <label class="floating-label">Email</label>
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
                        <label class="floating-label">Latitude</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="longitude" id="longitude"/>
                        <label class="floating-label">Longitude</label>
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
                        //$selected = '';
            //if($res->country_code == $val->code){
              //$selected = 'selected';
            //}?>
                        <option value="<?php echo $val->id; ?>" <?php //echo $selected; ?>><?php echo $val->name; ?></option>
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
                        <textarea type="text" id="description" name="description" class="form-control md-textarea  mat-txt" rows="3" placeholder="Description"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="input-group">
                        <label for="image" class="bmd-label-floating"></label>
                        <label class="btn btn-raised btn-info"> <i class="fa fa-camera" aria-hidden="true" >&nbsp;</i> Add Image
                          <input type="file" class="ngo_proof_attach_input_file form-control image-upload" name="image[]" id="image" accept="image/png, image/jpeg, image/jpg" data-fv-file-type="image/png, image/jpeg, image/jpg" required="" multiple style="display: none;" />
                        </label>
                        <input type="text" class="form-control text-count" readonly>
                        <br>
                      </div>
                      <span class="help-block"> Allowed type (.jpg, .png, .jpeg) <br>
                      Max Size: 5MB </span> </div>
                  </div>
                  <div class="row dvPreview"> </div>
                  <div class="row">&nbsp;</div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Type" data-allow-clear="true" name="ad_type" id="ad_type" >
                          <option value="normal">Normal</option>
                          <option value="hot_deals">Hot Deals</option>
                          <option value="special_offers">Special Offers</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select User" data-allow-clear="true" name="userid" id="userid" disabled>
                          <option></option>
                          <?php if($websiteusers){ foreach($websiteusers as $val){ ?>
                          <option value="<?php echo $val->id; ?>">
                          <?php if($val->company_name != '') { echo $val->company_name; }else{ echo $val->first_name.' '.$val->last_name; }?>
                          </option>
                          <?php } } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
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
        brand: {
            validators: {
                notEmpty: {
                    message: 'brand is required'
                }
            }
        },
        model: {
            validators: {
                notEmpty: {
                    message: 'model type is required'
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
        usage: {
                validators: {
                    notEmpty: {
                        message: 'usage is required'
                    }
                }
        },
        condition: {
                validators: {
                    notEmpty: {
                        message: 'condition is required'
                    }
                }
        },
        warranty: {
                validators: {
                    notEmpty: {
                        message: 'warranty is required'
                    }
                }
        },
        color: {
                validators: {
                    notEmpty: {
                        message: 'color condition is required'
                    }
                }
        },
        storage: {
                validators: {
                    notEmpty: {
                        message: 'storage condition is required'
                    }
                }
        },
        operating_system: {
                validators: {
                    notEmpty: {
                        message: 'operating system is required'
                    }
                }
        },
        camera_resolution: {
                validators: {
                    notEmpty: {
                        message: 'camera resolution is required'
                    }
                }
        },
        ram: {
                validators: {
                    notEmpty: {
                        message: 'ram is required'
                    }
                }
        },
        capacity: {
                validators: {
                    notEmpty: {
                        message: 'capacity is required'
                    }
                }
        },
        dimensions: {
                validators: {
                    notEmpty: {
                        message: 'dimensions is required'
                    }
                }
        },
        weight: {
                validators: {
                    notEmpty: {
                        message: 'weight is required'
                    }
                }
        },
        removable_battery: {
                validators: {
                    notEmpty: {
                        message: 'removable battery is required'
                    }
                }
        },
        screen_size: {
                validators: {
                    notEmpty: {
                        message: 'screen size is required'
                    }
                }
        },
        touchscreen: {
                validators: {
                    notEmpty: {
                        warranty: 'touchscreen is required'
                    }
                }
        },
        resolution: {
                validators: {
                    notEmpty: {
                        warranty: 'resolution is required'
                    }
                }
        },
        compass: {
                validators: {
                    notEmpty: {
                        warranty: 'compass is required'
                    }
                }
        },
        proximity: {
                validators: {
                    notEmpty: {
                        warranty: 'proximity is required'
                    }
                }
        },
        accelerometer: {
                validators: {
                    notEmpty: {
                        warranty: 'accelerometer is required'
                    }
                }
        },
        light: {
                validators: {
                    notEmpty: {
                        warranty: 'light is required'
                    }
                }
        },
        gyroscope: {
                validators: {
                    notEmpty: {
                        warranty: 'gyroscope is required'
                    }
                }
        },
        barometer: {
                validators: {
                    notEmpty: {
                        warranty: 'barometer is required'
                    }
                }
        },
        temperature: {
                validators: {
                    notEmpty: {
                        warranty: 'temperature is required'
                    }
                }
        },
        form_factor: {
                validators: {
                    notEmpty: {
                        warranty: 'form factor is required'
                    }
                }
        },
        release_year: {
                validators: {
                    notEmpty: {
                        warranty: 'release year is required'
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
        contact: {
                validators: {
                    notEmpty: {
                        warranty: 'contact is required'
                    }
                }
        },
        email: {
                validators: {
                    notEmpty: {
                        warranty: 'email is required'
                    }
                }
        },
        country: {
                validators: {
                    notEmpty: {
                        warranty: 'country is required'
                    }
                }
        },
        area: {
                validators: {
                    notEmpty: {
                        warranty: 'area is required'
                    }
                }
        },
        latitude: {
                validators: {
                    notEmpty: {
                        warranty: 'latitude is required'
                    }
                }
        },
        location: {
                validators: {
                    notEmpty: {
                        warranty: 'location is required'
                    }
                }
        },
        longitude: {
                validators: {
                    notEmpty: {
                        warranty: 'longitude is required'
                    }
                }
        },
        description: {
                validators: {
                    notEmpty: {
                        warranty: 'description is required'
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
	$('#map_canvas').hide();
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
  $('#type_1').click(function(e) {
        if ($('#type_1').val() == 'New') {
            $('.used').fadeOut();
        }
    });
  $('#type_2').click(function(e) {
        if ($('#type_2').val() == 'Used') {
            $('.used').fadeIn('slow');
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
});
</script>