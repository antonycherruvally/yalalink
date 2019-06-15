<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">
<!-- Page -->

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Phone</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/real_estate">Phone</a></li>
      <li class="breadcrumb-item active">Edit Phone</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Edit Phone</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                <form class="form-signin cv-form" action="admin/updatePhones" enctype="multipart/form-data" method="post" name="posts_form" id="posts_form">
                  <input type="hidden" value="<?php echo $edit->post_id; ?>" name="id">
                  <div class="row">
                    <div class="col-md-4"> 
                      <!-- Example Radios -->
                      <div class="example-wrap">
                        <h4 class="example-title">Choose Type</h4>
                        <div class="radio-custom radio-primary">
                          <input type="radio"  name="type" id="type" value="New" <?php if($edit->type == 'New'){ echo 'checked'; } ?>/>
                          <label for="type">New</label>
                        </div>
                        <div class="radio-custom radio-primary">
                          <input type="radio"  name="type" id="type_1" value="Used" <?php if($edit->type == 'Used'){ echo 'checked'; } ?> />
                          <label for="type_1">Used</label>
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
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="brand" >
                         <option value="">Select Brand</option>
                      <?php $brand = getBrands('P'); 
                      if($brand){ foreach($brand as $val){
                      $selected = '';
                      if($edit->brand == $val->id){
                        $selected = 'selected';
                      }
                        ?>
                        <option value="<?php echo $val->id ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                       <input type="text" class="form-control" name="model" id="model" value="<?php echo $edit->model; ?>"/>
                        <label class="floating-label">Model</label>
                      </div>
                    </div>
                    <div class="col-md-4 used">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Age" data-allow-clear="true" name="age" id="age" >
                        <option value="">Select Age</option>
                        <?php $age = array('Brand New','0-1 month','1-6 months','6-12 months','1-2 years','2-5 years','5-10 years','10+ years');
                        foreach ($age as $val) { 
                        $selected = '';
                        if($edit->age == $val){
                          $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
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
                        foreach ($usage as $val) { 
                        $selected = '';
                        if($edit->usage == $val){
                          $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
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
                        foreach ($condition as $val) {
                        $selected = '';
                        if($edit->condition == $val){
                          $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
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
                        foreach ($warranty as $val) { 
                        $selected = '';
                        if($edit->warranty == $val){
                          $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
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
                        if($color){ foreach($color as $val){
                        $selected = '';
                        if($edit->color == $val->name){
                          $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
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
                        foreach ($storage as $val) { 
                        $selected = '';
                        if($edit->storage == $val){
                          $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
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
                        foreach ($operating_system as $val) { 
                        $selected = '';
                        if($edit->operating_system == $val){
                          $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
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
                          foreach ($camera_resolution as $val) { 
                          $selected = '';
                          if($edit->camera_resolution == $val){
                          $selected = 'selected';
                          }
                          ?>
                          <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
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
                          foreach ($ram as $val) { 
                          $selected = '';
                          if($edit->ram == $val){
                          $selected = 'selected';
                          }
                          ?>
                          <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
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
                        foreach ($capacity as $val) {
                        $selected = '';
                        if($edit->capacity == $val){
                          $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                       <input type="text" class="form-control" name="dimensions" id="dimensions" value="<?php echo $edit->dimensions; ?>"/>
                        <label class="floating-label">Dimensions (mm)</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                       <input type="text" class="form-control" name="weight" id="weight" value="<?php echo $edit->weight; ?>"/>
                        <label class="floating-label">Weight (g)</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Removable battery" data-allow-clear="true" name="removable_battery" id="removable_battery" >
                          <option value="">Select Removable battery</option>
                          <option value="Yes"<?php if($edit->removable_battery=='Yes') echo 'selected'; ?>>Yes</option>
                          <option value="No"<?php if($edit->removable_battery=='No') echo 'selected'; ?>>No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="screen_size" id="screen_size" value="<?php echo $edit->screen_size; ?>"/>
                        <label class="floating-label">Screen size</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Touchscreen" data-allow-clear="true" name="touchscreen" id="touchscreen" >
                          <option value="">Select Touchscreen</option>
                          <option value="Yes"<?php if($edit->touchscreen=='Yes') echo 'selected'; ?>>Yes</option>
                          <option value="No"<?php if($edit->touchscreen=='No') echo 'selected'; ?>>No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="resolution" id="resolution" value="<?php echo $edit->resolution; ?>"/>
                        <label class="floating-label">Resolution</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Compass/ Magnetometer" data-allow-clear="true" name="compass" id="compass" >
                          <option value="">Select Compass/ Magnetometer</option>
                          <option value="Yes"<?php if($edit->compass=='Yes') echo 'selected'; ?>>Yes</option>
                          <option value="No"<?php if($edit->compass=='No') echo 'selected'; ?>>No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Proximity sensor" data-allow-clear="true" name="proximity" id="proximity" >
                          <option value="">Select Proximity sensor</option>
                          <option value="Yes"<?php if($edit->proximity=='Yes') echo 'selected'; ?>>Yes</option>
                          <option value="No"<?php if($edit->proximity=='No') echo 'selected'; ?>>No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Accelerometer" data-allow-clear="true" name="accelerometer" id="accelerometer" >
                          <option value="">Select Accelerometer</option>
                          <option value="Yes"<?php if($edit->accelerometer=='Yes') echo 'selected'; ?>>Yes</option>
                          <option value="No"<?php if($edit->accelerometer=='No') echo 'selected'; ?>>No</option>
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
                            <option value="Yes"<?php if($edit->light=='Yes') echo 'selected'; ?>>Yes</option>
                            <option value="No"<?php if($edit->light=='No') echo 'selected'; ?>>No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Gyroscope" data-allow-clear="true" name="gyroscope" id="gyroscope" >
                          <option value="">Select Gyroscope</option>
                          <option value="Yes"<?php if($edit->gyroscope=='Yes') echo 'selected'; ?>>Yes</option>
                          <option value="No"<?php if($edit->gyroscope=='No') echo 'selected'; ?>>No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Barometer" data-allow-clear="true" name="barometer" id="barometer" >
                          <option value="">Select Barometer</option>
                          <option value="Yes"<?php if($edit->barometer=='Yes') echo 'selected'; ?>>Yes</option>
                          <option value="No"<?php if($edit->barometer=='No') echo 'selected'; ?>>No</option>
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
                            <option value="Yes"<?php if($edit->temperature=='Yes') echo 'selected'; ?>>Yes</option>
                            <option value="No"<?php if($edit->temperature=='No') echo 'selected'; ?>>No</option>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="form_factor" id="form_factor" value="<?php echo $edit->form_factor; ?>"/>
                        <label class="floating-label">Form factor</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Release Year" data-allow-clear="true" name="release_year" id="release_year" >
                         <option value="">Select Release Year</option>
                        <?php $earliest_year = 1900;
                        foreach (range(date('Y'), $earliest_year) as $x) {
                        $selected = '';
                        if($edit->release_year == $x){
                          $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $x; ?>" <?php echo $selected; ?>><?php echo $x; ?></option>
                        <?php } ?>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="price" id="price" value="<?php echo $edit->price; ?>"/>
                        <label class="floating-label">Price</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $edit->mobile; ?>"/>
                        <label class="floating-label">Contact Number</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $edit->email; ?>"/>
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
                          <input type="file" class="ngo_proof_attach_input_file form-control image-upload" name="image[]" id="image" accept="image/png, image/jpeg, image/jpg" data-fv-file-type="image/png, image/jpeg, image/jpg" required="" multiple style="display: none;" />
                        </label>
                        <input type="text" class="form-control text-count" readonly>
                        <br>
                      </div>
                      <span class="help-block"> Allowed type (.jpg, .png, .jpeg) <br>
                      Max Size: 5MB </span> 
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
                     </label><input type="checkbox" id="image_delete_<?php echo $val->id; ?>" name="image_delete[]" value="<?php echo $val->id; ?>" style="display:none;"/>
                    <a class="btn btn-danger btn-xs delete-image" href="javascript:void(0);">Delete</a>
                    </div>
                    </span>
                    <?php }} ?>
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
                    <button type="button" class="btn btn-danger ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" name="cancel" value="cancel" onClick="window.location.href='admin/phones';">Cancel</button>
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
		    $('.img-check').not(this).siblings('input').removeAttr('checked');
        $(this).addClass('check').siblings('input').attr('checked','checked');
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
	$('#'+type+'_delete_'+id).attr('checked','checked');
	$('#'+type+'_main_'+id).prop('disabled',true);
	$('#'+type+'_'+id).hide();
		if($('input[name=image_main]:checked').val() == 'id_'+id){
			$('input[name=image_main]:enabled:first').attr('checked','checked');
			$('.text-main:first', this).show();
			$(".text-main").first().show();
			$('.text-main:enabled:first').show();
		}	
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