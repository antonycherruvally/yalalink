<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">
<!-- Page -->

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Auto</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/auto">Auto</a></li>
      <li class="breadcrumb-item active">Edit Auto</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Edit Auto</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                <form class="form-signin cv-form" action="admin/updateAuto" enctype="multipart/form-data" method="post" name="posts_form" id="posts_form">
                  <input type="hidden" value="<?php echo $edit->post_id; ?>" name="id">
                  <div class="row">
                    <div class="col-md-4"> 
                      <!-- Example Radios -->
                      <div class="example-wrap">
                        <h4 class="example-title">Choose Type</h4>
                        <div class="radio-custom radio-primary">
                          <input type="radio"  name="type" id="type" value="New"  <?php if($edit->type == 'New'){ echo 'checked'; } ?>/>
                          <label for="type">New</label>
                        </div>
                        <div class="radio-custom radio-primary">
                          <input type="radio"  name="type" id="type_1" value="Used"  <?php if($edit->type == 'Used'){ echo 'checked'; } ?> />
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
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Category" data-allow-clear="true" name="category" id="category" >
                          <option></option>
                          <?php $category = getAutoCategories(); 
						if($category){ foreach($category as $val){
						$selected = '';
						if($edit->category == $val->id){
							$selected = 'selected';
						}?>
                          <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->category; ?></option>
                          <?php } } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 sub_category">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Sub Category" data-allow-clear="true" name="subcategory" id="subcategory" >
                          <option></option>                         
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 new-auto boats">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Boat Type" data-allow-clear="true" name="boat_type" id="boat_type" >
                          <option></option>
                          <?php $boat_type = array('Fishing Boat','Outboard Dayboat','Pontoon/House Boat','Racing Boat','Sleeper/Mini Yacht','Wakeboarding/Ski Boat','Yacht','Canoe/Row Boat','Paddle Boat','Catamaran','Cruiser/Day Sailor','DhowVoilier','Dinghy','Racer','Sailing Yacht','Other');
					foreach ($boat_type as $val) {
						$selected = '';
						if($edit->body_type == $val->id){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 model" style="display:none;">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Model" data-allow-clear="true" name="model" id="model" >
                          <option></option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="price" id="price" value="<?php echo $edit->price; ?>"/>
                        <label class="floating-label">Price:</label>
                      </div>
                    </div>
                  </div>
                  <div class="row cars">
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="kilometers" id="kilometers" value="<?php echo $edit->kilometers; ?>"/>
                        <label class="floating-label">Kilometers:</label>
                      </div>
                    </div>
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Body Condition" data-allow-clear="true" name="body_condition" id="body_condition" >
                          <option></option>
                          <?php $body_condition = array('Perfect inside and out','No accidents, very few faults','A bit of wear & tear, all repaired','Normal wear &amp; tear, a few issues, Lots of wear &amp; tear to the body');
						foreach ($body_condition as $val) { 
						$selected = '';
						if($edit->body_condition == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                     <select class="form-control" data-plugin="select2" data-placeholder="Select Mechanical Condition" data-allow-clear="true" name="mechanical_condition" id="mechanical_condition" >
                          <option></option>
                           <?php $mechanical_condition = array('Perfect inside and out','Minor faults, all fixed','Major faults, all fixed','Major faults fixed, small remain','Ongoing minor & major faults');
					foreach ($mechanical_condition as $val) {
						$selected = '';
						if($edit->mechanical_condition == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row cars">
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Year" data-allow-clear="true" name="year" id="year" >
                          <option></option>
                          <?php $earliest_year = 1900;
foreach (range(date('Y'), $earliest_year) as $x) {$selected = '';
						if($edit->year == $x){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $x; ?>" <?php echo $selected; ?>><?php echo $x; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Body Type" data-allow-clear="true" name="body_type" id="body_type" >
                          <option></option>
                         <?php $body_type = array('Coupe','Crossover','Hard Top Convertible','Hatchback','Pick Up Truck','Sedan','Soft Top Convertible','Sports Car','SUV','Utility Truck','Van','Wagon','Other');
foreach ($body_type as $val) { $selected = '';
						if($edit->body_type == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                     <select class="form-control" data-plugin="select2" data-placeholder="Select Color" data-allow-clear="true" name="color" id="color" >
                          <option></option>
                           <?php $color = getColors(); 
						if($color){ foreach($color as $val){$selected = '';
						if($edit->color == $val->name){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->name ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row cars">
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Transmission Type" data-allow-clear="true" name="transmission_type" id="transmission_type" >
                          <option></option>
                           <?php $transmission = array('Manual Transmission','Automatic Transmission','CVT','Other');
foreach ($transmission as $val) { $selected = '';
						if($edit->transmission_type == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Regional Specs" data-allow-clear="true" name="regional_specs" id="regional_specs" >
                          <option></option>
                         <?php $regional = array('European Specs','GCC Specs','Japanese Specs','North American Specs','Other');
					foreach ($regional as $val) {
						$selected = '';
						if($edit->regional_specs == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                     <select class="form-control" data-plugin="select2" data-placeholder="Select Doors" data-allow-clear="true" name="doors" id="doors" >
                          <option></option>
                           <?php $doors = array(2,3,4,'5+');
foreach ($doors as $val) {$selected = '';
						if($edit->doors == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row cars">
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Cylinders" data-allow-clear="true" name="cylinders" id="cylinders" >
                          <option></option>
                           <?php $cylinders = array(3,4,5,6,8,10,12,'Unknown');
foreach ($cylinders as $val) { $selected = '';
						if($edit->cylinders == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Horsepower" data-allow-clear="true" name="horsepower" id="horsepower" >
                          <option></option>
                        <?php $horsepower = array('Less than 150 HP','150 - 200 HP','200 - 300 HP','300 - 400 HP','400 - 500 HP','500 - 600 HP','600 - 700 HP','700 - 800 HP','800 - 900 HP','900+ HP','Unknown');
foreach ($horsepower as $val) {$selected = '';
						if($edit->horsepower == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                     <select class="form-control" data-plugin="select2" data-placeholder="Select Warranty" data-allow-clear="true" name="warranty" id="warranty" >
                          <option></option>
                           <?php $warranty = array('Yes','No','Does Not Apply');
foreach ($warranty as $val) {$selected = '';
						if($edit->warranty == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row cars">
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Fuel Type" data-allow-clear="true" name="fuel_type" id="fuel_type" >
                          <option></option>
                           <?php $fuel_type = array('Gasoline','Diesel','Hybrid','Electric');
foreach ($fuel_type as $val) { $selected = '';
						if($edit->fuel_type == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row cars">
                    <div class="col-md-12">
                      <div class="card-header">Features</div>
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <label for="amenities" class="mat-label-color">Choose Features:</label>
                        <select multiple="multiple" size="10" name="features[]" id="features">
                          <?php $features = getAutoFeatures();
						  		$featuress = array();
								foreach($feature as $val) {
								 $featuress[] = $val->features_id;
								}
								if($features){
								foreach($features as $val){
									$selected = '';
									  if(in_array($val->id, $featuress))
									  $selected = 'selected="selected"';
									echo '<option value="'.$val->id.'" '.$selected.'>'.$val->name.'</option>';
								}} ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row boats">
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Age" data-allow-clear="true" name="age" id="age" >
                          <option></option>
                           <?php $age = array('Brand New','0-1 month','1-6 months','6-12 months','1-2 years','2-5 years','5-10 years','10+ years');
foreach ($age as $val) { $selected = '';
						if($edit->age == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Usage" data-allow-clear="true" name="usage" id="usage" >
                          <option></option>
                           <?php $usage = array('Still with the dealer','Only used once since it was purchased new','Used only a few times since it was purchased new','Used once or twice a month since purchased','Used numerous times per week since purchased');
foreach ($usage as $val) {$selected = '';
						if($edit->usage == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Condition" data-allow-clear="true" name="boat_condition" id="boat_condition" >
                          <option></option>
                          <?php $condition = array('Perfect inside and out','Almost no noticeable problems or flaws','A bit of wear and tear, but in good working condition','Normal wear and tear for the age of the item, a few problems here and there','Above average wear and tear.  The item may need a bit of repair to work properly');
foreach ($condition as $val) { $selected = '';
						if($edit->body_condition == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row boats">
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Warranty" data-allow-clear="true" name="boat_warranty" id="boat_warranty" >
                          <option></option>
                           <?php $warranty = array('Yes','No','Does not apply');
foreach ($warranty as $val) { $selected = '';
						if($edit->warranty == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Length" data-allow-clear="true" name="length" id="length" >
                          <option></option>
                          <?php $length = array('Under 10 ft.','10-14 ft.','15-19 ft.','20-24 ft.','25-29 ft.','30-39 ft.','40-49 ft.','50-69 ft.','70-100 ft.','100+ ft.');
foreach ($length as $val) {$selected = '';
						if($edit->length == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row heavy">
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="heavy_kilometers" id="heavy_kilometers" value="<?php echo $edit->kilometers; ?>"/>
                        <label class="floating-label">Kilometers:</label>
                      </div>
                    </div>
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Body Condition" data-allow-clear="true" name="heavy_condition" id="heavy_condition" >
                          <option></option>
                           <?php $body_condition = array('Perfect inside and out','No accidents, very few faults','A bit of wear & tear, all repaired','Normal wear &amp; tear, a few issues, Lots of wear &amp; tear to the body');
foreach ($body_condition as $val) {$selected = '';
						if($edit->body_condition == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Mechanical Condition" data-allow-clear="true" name="heavy_mechanical" id="heavy_mechanical" >
                          <option></option>
                          <?php $mechanical_condition = array('Perfect inside and out','Minor faults, all fixed','Major faults, all fixed','Major faults fixed, small remain','Ongoing minor &amp; major faults');
foreach ($mechanical_condition as $val) {$selected = '';
						if($edit->mechanical_condition == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Year" data-allow-clear="true" name="heavy_year" id="heavy_year" >
                          <option></option>
                          <?php $earliest_year = 1900;
foreach (range(date('Y'), $earliest_year) as $x) {
             $selected = '';
						if($edit->heavy_year == $x){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $x; ?>" <?php echo $selected; ?> ><?php echo $x; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row heavy">
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="make" id="make" value="<?php echo $edit->make; ?>"/>
                        <label class="floating-label">Make:</label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="capacity" id="capacity" value="<?php echo $edit->capacity; ?>"/>
                        <label class="floating-label">Capacity/Weight:</label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Cylinders" data-allow-clear="true" name="heavy_cylinders" id="heavy_cylinders" >
                          <option></option>
                          <?php $cylinders = array(3,4,5,6,8,10,12,'Unknown');
foreach ($cylinders as $val) { $selected = '';
						if($edit->cylinders == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Horsepower" data-allow-clear="true" name="heavy_horsepower" id="heavy_horsepower" >
                          <option></option>
                          <?php $horsepower = array('Less than 150 HP','150 - 200 HP','200 - 300 HP','300 - 400 HP','400 - 500 HP','500 - 600 HP','600 - 700 HP','700 - 800 HP','800 - 900 HP','900+ HP','Unknown');
foreach ($horsepower as $val) {$selected = '';
						if($edit->horsepower == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row heavy">
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Warranty" data-allow-clear="true" name="heavy_warranty" id="heavy_warranty" >
                          <option></option>
                          <?php $warranty = array('Yes','No','Does Not Apply');
foreach ($warranty as $val) {$selected = '';
						if($edit->warranty == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Fuel Type" data-allow-clear="true" name="heavy_fuel_type" id="heavy_fuel_type" >
                          <option></option>
                         <?php $fuel_type = array('Gasoline','Diesel','Hybrid','Electric');
foreach ($fuel_type as $val) {$selected = '';
						if($edit->fuel_type == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row motorcycles">
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="motorcycles_kilometers" id="motorcycles_kilometers" value="<?php echo $edit->kilometers; ?>"/>
                        <label class="floating-label">Kilometers:</label>
                      </div>
                    </div>

                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Usage" data-allow-clear="true" name="motorcycles_usage" id="motorcycles_usage" >
                          <option></option>
                          <?php $usage = array('Still with the dealer','Only used once since it was purchased new','Used very rarely since it was purchased','Used once or twice a week since purchased','Used as primary mode of transportation');
foreach ($usage as $val) {$selected = '';
						if($edit->usage == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 used-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Year" data-allow-clear="true" name="motorcycles_year" id="motorcycles_year" >
                          <option></option>
                          <?php $earliest_year = 1900;
foreach (range(date('Y'), $earliest_year) as $x) {$selected = '';
						if($edit->year == $x){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Final Drive System" data-allow-clear="true" name="drive_system" id="drive_system" >
                          <option></option>
                           <?php $drive_system = array('Belt','Chain','Shaft','Does not apply');
foreach ($drive_system as $val) { $selected = '';
						if($edit->drive_system == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row motorcycles">
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Wheels" data-allow-clear="true" name="wheels" id="wheels" >
                          <option></option>
                          <?php $wheels = array('2 wheels','3 wheels','4 wheels');
foreach ($wheels as $val) {$selected = '';
						if($edit->wheels == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Manufacturer" data-allow-clear="true" name="manufacturer" id="manufacturer" >
                          <option></option>
                          <?php $manufacturer = array('Access Motor','Aprillia','Asiawing','Bajaj','Benelli','BMW','Buell','Can-am','Ducati','Gas Gas','Harley Davidson','Honda','Husaberg','Husqvarna','Indian','Kawasaki','KTM','Moto Guzzi','MV Agusta','Norton','Polaris','Royal Enfield','Suzuki','Triumph','Vespa','Victory','Yamaha','Other');
foreach ($manufacturer as $val) {$selected = '';
						if($edit->manufacturer == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Engine Size" data-allow-clear="true" name="size" id="size" >
                          <option></option>
                           <?php $size = array('Less than 250cc','250cc - 499cc','500cc - 599cc','600cc - 749cc','750cc - 999cc','1,000cc or more','Does not apply');
foreach ($size as $val) {$selected = '';
						if($edit->size == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 new-auto">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Warranty" data-allow-clear="true" name="motorcycles_warranty" id="motorcycles_warranty" >
                          <option></option>
                           <?php $warranty = array('Yes','No','Does Not Apply');
foreach ($warranty as $val) {$selected = '';
						if($edit->warranty == $val){
							$selected = 'selected';
						} ?>
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
                        <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $edit->mobile; ?>" />
                        <label class="floating-label">Phone</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="email" id="email" value="<?php echo $edit->email; ?>" />
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
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Country" data-allow-clear="true" name="country" id="country" >
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
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Location" data-allow-clear="true" name="location" id="location" >
                          <option></option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Area" data-allow-clear="true" name="area" id="area" >
                          <option></option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card-header">Description</div>
                      <div class="form-group">
                        <textarea type="text" id="description" name="description" class="form-control md-textarea  mat-txt" rows="3" placeholder="Description">
                          <?php echo $edit->description; ?> 
                        </textarea>
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
                      </label>
                      <input type="checkbox" id="image_delete_<?php echo $val->id; ?>" name="image_delete[]" value="<?php echo $val->id; ?>" style="display:none;" />
                      <a class="btn btn-danger btn-xs delete-image" href="javascript:void(0);">Delete</a> </div>
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
                          <option value="weakdeal" <?php if($edit->ad_type =='weakdeal'){ echo 'selected'; } ?>>Deal of the weak</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Select Featured" data-allow-clear="true" name="featured" id="featured" >
                          <option value="0" <?php if($edit->featured =='0'){ echo 'selected'; } ?>>Normal</option>
                          <option value="1" <?php if($edit->featured =='1'){ echo 'selected'; } ?>>Featured</option>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
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
      <div class="modal-footer"> </div>
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
var demo1 = $('select[name="features[]"]').bootstrapDualListbox();
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
            },
    		category: {
              validators: {
                notEmpty: {
                  message: 'category is required'
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
	$('#type').click(function(e) {
        if ($('#type').val() == 'New') {
            $('.used-auto').fadeOut();
        }
    });
    $('#type_1').click(function(e) {
        if ($('#type_1').val() == 'Used') {
            $('.used-auto').fadeIn('slow');
        }
    });
	if ($('#category').val() != '' || $('#category').val() != 0) {
        if ($('#category').val() == 1) {
            $('.subcategory').text('Choose Make');
            $('.model').fadeIn('slow');
            $('.cars').fadeIn('slow');
            $('.boats').hide();
            $('.heavy').hide();
            $('.vipnumber').hide();
            $('.motorcycles').hide();
        $.ajax({
            'url': '<?php echo base_url(); ?>admin/get_auto_model/<?php if($edit->subcategory) echo $edit->subcategory; else echo 0; ?>/<?php if($edit->model) echo $edit->model; else echo 0; ?>',
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != 'empty') {
                    $('#model').html(data);
                } else {
                    $('#model').html(data);
                }
            }
		});
        } else if ($('#category').val() == 2) {
            $('.boats').show();
            $('.cars').hide();
            $('.heavy').hide();
            $('.motorcycles').hide();
            $('.subcategory').text('Choose Sub Category');
            $('.model').hide();
            $('.vipnumber').hide();
        } else if ($('#category').val() == 3) {
            $('.cars').hide();
            $('.boats').hide();
            $('.heavy').fadeIn('slow');
            $('.motorcycles').hide();
            $('.subcategory').text('Choose Sub Category');
            $('.model').hide();
            $('.vipnumber').hide();
        } else if ($('#category').val() == 4) {
            $('.cars').hide();
            $('.boats').hide();
            $('.heavy').hide();
            $('.subcategory').text('Choose Sub Category');
            $('.model').hide();
            $('.vipnumber').hide();
            $('.motorcycles').fadeIn('slow');
        } else if ($('#category').val() == 5) {
            $('.sub_category').hide();
            $('.cars').hide();
            $('.boats').hide();
            $('.heavy').hide();
            $('.subcategory').text('Choose Sub Category');
            $('.model').hide();
            $('.motorcycles').hide('slow');
            $('.vipnumber').fadeIn('slow');
        }
        $.ajax({
            'url': '<?php echo base_url(); ?>admin/get_auto_subcategory/' + $('#category').val() + '/<?php if($edit->subcategory) echo $edit->subcategory; else echo 0; ?>',
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != 'empty') {
                    $('#subcategory').html(data);
                } else {
                    $('#subcategory').html(data);
                }
            }
        });
    } else {
        $('.model').hide();
        $('.cars').hide();
        $('.boats').hide();
        $('.heavy').hide();
        $('.vipnumber').hide();
        $('.motorcycles').hide();
    }
	$('#category').change(function(e) {
        if ($('#category').val() == 1) {
            $('.subcategory').text('Choose Make');
            $('.model').fadeIn('slow');
            $('.cars').fadeIn('slow');
            $('.boats').hide();
            $('.heavy').hide();
            $('.vipnumber').hide();
            $('.motorcycles').hide();
        } else if ($('#category').val() == 2) {
            $('.cars').hide();
            $('.boats').fadeIn('slow');
            $('.heavy').hide();
            $('.motorcycles').hide();
            $('.subcategory').text('Choose Sub Category');
            $('.model').hide();
            $('.vipnumber').hide();
        } else if ($('#category').val() == 3) {
            $('.cars').hide();
            $('.boats').hide();
            $('.heavy').fadeIn('slow');
            $('.motorcycles').hide();
            $('.subcategory').text('Choose Sub Category');
            $('.model').hide();
            $('.vipnumber').hide();
        } else if ($('#category').val() == 4) {
            $('.cars').hide();
            $('.boats').hide();
            $('.heavy').hide();
            $('.subcategory').text('Choose Sub Category');
            $('.model').hide();
            $('.vipnumber').hide();
            $('.motorcycles').fadeIn('slow');
        } else if ($('#category').val() == 5) {
            $('.sub_category').hide();
            $('.cars').hide();
            $('.boats').hide();
            $('.heavy').hide();
            $('.subcategory').text('Choose Sub Category');
            $('.model').hide();
            $('.motorcycles').hide('slow');
            $('.vipnumber').fadeIn('slow');
        }
        $.ajax({
            'url': '<?php echo base_url(); ?>admin/get_auto_subcategory/' + this.value,
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != 'empty') {
                    $('#subcategory').html(data);
                } else {
                    $('#subcategory').html(data);
                }
            }
        });
    });
    $('#subcategory').change(function(e) {
        $.ajax({
            'url': '<?php echo base_url(); ?>admin/get_auto_model/' + this.value,
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != 'empty') {
                    $('#model').html(data);
                } else {
                    $('#model').html(data);
                }
            }
        });
    });
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