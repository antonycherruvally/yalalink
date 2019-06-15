<?php $this->load->view('blocks/header'); 
$userdata = $this->session->userdata('logged_yalalink_userdata'); ?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">

<div class="full-wrap bg-ad">
  <div class="container">
    <div class="row"  style="margin-top: 50px;border: 1px solid #4fc3c533;margin-bottom: 15px;padding: 18px;">
      <div class="col-md-12">
        <div class="post-ad-wrap">
         
            <h3 style="color:black;"> Update Your Auto Ad </h3>
              <form class="m-t-15" action="updateAuto" enctype="multipart/form-data" method="post" name="post-form" id="post-form">
                <input type="hidden" name="main_category" value="<?php echo $this->input->get('category'); ?>">
                <input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <label class="form-check-label mat-label-color" for="type">Choose Type:</label>
                    
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type" value="New" <?php if($edit->type == 'New'){ echo 'checked'; }?>>
                        New </label>
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type1" value="Used"  <?php if($edit->type == 'Used'){ echo 'checked'; }?>>
                        Used </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label for="title_en" class="bmd-label-floating">Title in English:</label>
                      <input type="text" value="<?php echo $edit->title_en; ?>" class="form-control no-border mat-txt mat-font first-txt" name="title_en" id="title_en">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label for="title_ar" class="bmd-label-floating">Title in Arabic:</label>
                      <input type="text" value="<?php echo $edit->title_ar; ?>" class="form-control no-border mat-txt mat-font first-txt" style="direction:rtl;" name="title_ar" id="title_ar">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="category" class="bmd-label-floating mat-label-color">Choose Category:</label>
                      <select class="form-control" name="category" id="category">
                        <option value="">Select Category</option>
                        <?php $category = getAutoCategories(); if($category){ foreach($category as $val){  
						$selected = '';
						if($details->category == $val->id){
							$selected = 'selected';
						}?>
                          <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->category; ?></option>
                          <?php } } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 sub_category">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="subcategory" class="bmd-label-floating mat-label-color subcategory">Choose Sub Category:</label>
                      <select class="form-control" name="subcategory" id="subcategory">
                        <option value="">Select Category</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto boats">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="boat_type" class="bmd-label-floating mat-label-color">Choose Boat Type:</label>
                      <select class="form-control" name="boat_type" id="boat_type">
                        <option value="">Select Boat Type</option>
                        <?php $boat_type = array('Fishing Boat','Outboard Dayboat','Pontoon/House Boat','Racing Boat','Sleeper/Mini Yacht','Wakeboarding/Ski Boat','Yacht','Canoe/Row Boat','Paddle Boat','Catamaran','Cruiser/Day Sailor','DhowVoilier','Dinghy','Racer','Sailing Yacht','Other');
foreach ($boat_type as $val) { $selected = '';
						if($details->body_type == $val->id){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 model" style="display:none;">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="model" class="bmd-label-floating mat-label-color">Choose Model:</label>
                      <select class="form-control" name="model" id="model">
                        <option value="">Select Model</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Price:</label>
                      <input type="text" value="<?php echo $edit->price; ?>" class="form-control no-border mat-txt mat-font first-txt" name="price" id="price">
                    </div>
                  </div>
                </div>
                <div class="row cars">
                  <div class="col-md-3 used-auto">
                    <div class="form-group bmd-form-group">
                      <label for="kilometers" class="bmd-label-floating">Kilometers:</label>
                      <input type="text" value="<?php echo $details->kilometers; ?>" class="form-control no-border mat-txt mat-font first-txt" name="kilometers" id="kilometers">
                    </div>
                  </div>
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="body_condition" class="bmd-label-floating mat-label-color">Choose Body Condition:</label>
                      <select class="form-control" name="body_condition" id="body_condition">
                        <option value="">Select Body Condition</option>
                        <?php $body_condition = array('Perfect inside and out','No accidents, very few faults','A bit of wear &amp; tear, all repaired','Normal wear &amp; tear, a few issues, Lots of wear &amp; tear to the body');
foreach ($body_condition as $val) { $selected = '';
						if($details->body_condition == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="mechanical_condition" class="bmd-label-floating mat-label-color">Choose Mechanical Condition:</label>
                      <select class="form-control" name="mechanical_condition" id="mechanical_condition">
                        <option value="">Select Mechanical Condition</option>
                        <?php $mechanical_condition = array('Perfect inside and out','Minor faults, all fixed','Major faults, all fixed','Major faults fixed, small remain','Ongoing minor &amp; major faults');
foreach ($mechanical_condition as $val) { $selected = '';
						if($details->mechanical_condition == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="year" class="bmd-label-floating mat-label-color">Choose Year:</label>
                      <select class="form-control" name="year" id="year">
                        <option value="">Select Year</option>
                        <?php $earliest_year = 1900;
foreach (range(date('Y'), $earliest_year) as $x) { $selected = '';
						if($details->year == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $x; ?>" <?php echo $selected; ?>><?php echo $x; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row cars">
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="body_type" class="bmd-label-floating mat-label-color">Choose Body Type:</label>
                      <select class="form-control" name="body_type" id="body_type">
                        <option value="">Select Body Type</option>
                        <?php $body_type = array('Coupe','Crossover','Hard Top Convertible','Hatchback','Pick Up Truck','Sedan','Soft Top Convertible','Sports Car','SUV','Utility Truck','Van','Wagon','Other');
foreach ($body_type as $val) { $selected = '';
						if($details->body_type == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control" name="color" id="color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){$selected = '';
						if($details->color == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->name ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="transmission_type" class="bmd-label-floating mat-label-color">Choose Transmission Type:</label>
                      <select class="form-control" name="transmission_type" id="transmission_type">
                        <option value="">Select Transmission Type</option>
                        <?php $transmission = array('Manual Transmission','Automatic Transmission','CVT','Other');
foreach ($transmission as $val) { $selected = '';
						if($details->transmission_type == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="regional_specs" class="bmd-label-floating mat-label-color">Choose Regional Specs:</label>
                      <select class="form-control" name="regional_specs" id="regional_specs">
                        <option value="">Select Regional Specs</option>
                        <?php $regional = array('European Specs','GCC Specs','Japanese Specs','North American Specs','Other');
foreach ($regional as $val) { $selected = '';
						if($details->regional_specs == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row cars">
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="doors" class="bmd-label-floating mat-label-color">Choose Doors:</label>
                      <select class="form-control" name="doors" id="doors">
                        <option value="">Select Doors</option>
                        <?php $doors = array(2,3,4,'5+');
foreach ($doors as $val) { $selected = '';
						if($details->doors == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="cylinders" class="bmd-label-floating mat-label-color">Choose Cylinders:</label>
                      <select class="form-control" name="cylinders" id="cylinders">
                        <option value="">Select Cylinders</option>
                        <?php $cylinders = array(3,4,5,6,8,10,12,'Unknown');
foreach ($cylinders as $val) { $selected = '';
						if($details->cylinders == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="horsepower" class="bmd-label-floating mat-label-color">Choose Horsepower:</label>
                      <select class="form-control" name="horsepower" id="horsepower">
                        <option value="">Select Horsepower</option>
                        <?php $horsepower = array('Less than 150 HP','150 - 200 HP','200 - 300 HP','300 - 400 HP','400 - 500 HP','500 - 600 HP','600 - 700 HP','700 - 800 HP','800 - 900 HP','900+ HP','Unknown');
foreach ($horsepower as $val) { $selected = '';
						if($details->horsepower == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="warranty" class="bmd-label-floating mat-label-color">Choose Warranty:</label>
                      <select class="form-control" name="warranty" id="warranty">
                        <option value="">Select Warranty</option>
                        <?php $warranty = array('Yes','No','Does Not Apply');
foreach ($warranty as $val) { $selected = '';
						if($details->warranty == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row cars">
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="fuel_type" class="bmd-label-floating mat-label-color">Choose Fuel Type:</label>
                      <select class="form-control" name="fuel_type" id="fuel_type">
                        <option value="">Select Fuel Type</option>
                        <?php $fuel_type = array('Gasoline','Diesel','Hybrid','Electric');
foreach ($fuel_type as $val) { $selected = '';
						if($details->fuel_type == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row cars">
                  <div class="col-md-12">
                    <div class="card-header">Features</div>
                    <div class="form-group bmd-form-group mat-select">
                      <label for="features" class="mat-label-color">Choose Features:</label>
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
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="age" class="bmd-label-floating mat-label-color">Choose Age:</label>
                      <select class="form-control" name="age" id="age">
                        <option value="">Select Age</option>
                        <?php $age = array('Brand New','0-1 month','1-6 months','6-12 months','1-2 years','2-5 years','5-10 years','10+ years');
foreach ($age as $val) { $selected = '';
						if($details->age == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="usage" class="bmd-label-floating mat-label-color">Choose Usage:</label>
                      <select class="form-control" name="usage" id="usage">
                        <option value="">Select Usage</option>
                        <?php $usage = array('Still with the dealer','Only used once since it was purchased new','Used only a few times since it was purchased new','Used once or twice a month since purchased','Used numerous times per week since purchased');
foreach ($usage as $val) { $selected = '';
						if($details->usage == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="boat_condition" class="bmd-label-floating mat-label-color">Choose Condition:</label>
                      <select class="form-control" name="boat_condition" id="boat_condition">
                        <option value="">Select Condition</option>
                        <?php $condition = array('Perfect inside and out','Almost no noticeable problems or flaws','A bit of wear and tear, but in good working condition','Normal wear and tear for the age of the item, a few problems here and there','Above average wear and tear.  The item may need a bit of repair to work properly');
foreach ($condition as $val) { $selected = '';
						if($details->body_condition == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="boat_warranty" class="bmd-label-floating mat-label-color">Choose Warranty:</label>
                      <select class="form-control" name="boat_warranty" id="boat_warranty">
                        <option value="">Select Warranty</option>
                        <?php $warranty = array('Yes','No','Does not apply');
foreach ($warranty as $val) { $selected = '';
						if($details->warranty == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="length" class="bmd-label-floating mat-label-color">Choose Length:</label>
                      <select class="form-control" name="length" id="length">
                        <option value="">Select Length</option>
                        <?php $length = array('Under 10 ft.','10-14 ft.','15-19 ft.','20-24 ft.','25-29 ft.','30-39 ft.','40-49 ft.','50-69 ft.','70-100 ft.','100+ ft.');
foreach ($length as $val) { $selected = '';
						if($details->length == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row heavy">
                  <div class="col-md-3 used-auto">
                    <div class="form-group bmd-form-group">
                      <label for="heavy_kilometers" class="bmd-label-floating">Kilometers:</label>
                      <input type="text" value="<?php echo $details->kilometers; ?>" class="form-control no-border mat-txt mat-font first-txt" name="heavy_kilometers" id="heavy_kilometers">
                    </div>
                  </div>
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="heavy_condition" class="bmd-label-floating mat-label-color">Choose Body Condition:</label>
                      <select class="form-control" name="heavy_condition" id="heavy_condition">
                        <option value="">Select Body Condition</option>
                        <?php $body_condition = array('Perfect inside and out','No accidents, very few faults','A bit of wear &amp; tear, all repaired','Normal wear &amp; tear, a few issues, Lots of wear &amp; tear to the body');
foreach ($body_condition as $val) { $selected = '';
						if($details->body_condition == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="heavy_mechanical" class="bmd-label-floating mat-label-color">Choose Mechanical Condition:</label>
                      <select class="form-control" name="heavy_mechanical" id="heavy_mechanical">
                        <option value="">Select Mechanical Condition</option>
                        <?php $mechanical_condition = array('Perfect inside and out','Minor faults, all fixed','Major faults, all fixed','Major faults fixed, small remain','Ongoing minor &amp; major faults');
foreach ($mechanical_condition as $val) { $selected = '';
						if($details->mechanical_condition == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="heavy_year" class="bmd-label-floating mat-label-color">Choose Year:</label>
                      <select class="form-control" name="heavy_year" id="heavy_year">
                        <option value="">Select Year</option>
                        <?php $earliest_year = 1900;
foreach (range(date('Y'), $earliest_year) as $x) { $selected = '';
						if($details->year == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row heavy">
                  <div class="col-md-3 new-auto">
                    <div class="form-group bmd-form-group">
                      <label for="make" class="bmd-label-floating">Make:</label>
                      <input type="text" value="<?php echo $details->make; ?>" class="form-control no-border mat-txt mat-font first-txt" name="make" id="make">
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group bmd-form-group">
                      <label for="capacity" class="bmd-label-floating">Capacity/Weight:</label>
                      <input type="text" value="<?php echo $details->capacity; ?>" class="form-control no-border mat-txt mat-font first-txt" name="capacity" id="capacity">
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="heavy_cylinders" class="bmd-label-floating mat-label-color">Choose Cylinders:</label>
                      <select class="form-control" name="heavy_cylinders" id="heavy_cylinders">
                        <option value="">Select Cylinders</option>
                        <?php $cylinders = array(3,4,5,6,8,10,12,'Unknown');
foreach ($cylinders as $val) { $selected = '';
						if($details->cylinders == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="heavy_horsepower" class="bmd-label-floating mat-label-color">Choose Horsepower:</label>
                      <select class="form-control" name="heavy_horsepower" id="heavy_horsepower">
                        <option value="">Select Horsepower</option>
                        <?php $horsepower = array('Less than 150 HP','150 - 200 HP','200 - 300 HP','300 - 400 HP','400 - 500 HP','500 - 600 HP','600 - 700 HP','700 - 800 HP','800 - 900 HP','900+ HP','Unknown');
foreach ($horsepower as $val) { $selected = '';
						if($details->horsepower == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row heavy">
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="heavy_warranty" class="bmd-label-floating mat-label-color">Choose Warranty:</label>
                      <select class="form-control" name="heavy_warranty" id="heavy_warranty">
                        <option value="">Select Warranty</option>
                        <?php $warranty = array('Yes','No','Does Not Apply');
foreach ($warranty as $val) { $selected = '';
						if($details->warranty == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="heavy_fuel_type" class="bmd-label-floating mat-label-color">Choose Fuel Type:</label>
                      <select class="form-control" name="heavy_fuel_type" id="heavy_fuel_type">
                        <option value="">Select Fuel Type</option>
                        <?php $fuel_type = array('Gasoline','Diesel','Hybrid','Electric');
foreach ($fuel_type as $val) { $selected = '';
						if($details->fuel_type == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row motorcycles">
                  <div class="col-md-3 used-auto">
                    <div class="form-group bmd-form-group">
                      <label for="motorcycles_kilometers" class="bmd-label-floating">Kilometers:</label>
                      <input type="text" value="<?php echo $details->kilometers; ?>" class="form-control no-border mat-txt mat-font first-txt" name="motorcycles_kilometers" id="motorcycles_kilometers">
                    </div>
                  </div>
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="motorcycles_usage" class="bmd-label-floating mat-label-color">Choose Usage:</label>
                      <select class="form-control" name="motorcycles_usage" id="motorcycles_usage">
                        <option value="">Select Body Condition</option>
                        <?php $usage = array('Still with the dealer','Only used once since it was purchased new','Used very rarely since it was purchased','Used once or twice a week since purchased','Used as primary mode of transportation');
foreach ($usage as $val) { $selected = '';
						if($details->usage == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="motorcycles_year" class="bmd-label-floating mat-label-color">Choose Year:</label>
                      <select class="form-control" name="motorcycles_year" id="motorcycles_year">
                        <option value="">Select Year</option>
                        <?php $earliest_year = 1900;
foreach (range(date('Y'), $earliest_year) as $x) { $selected = '';
						if($details->year == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="drive_system" class="bmd-label-floating mat-label-color">Choose Final Drive System:</label>
                      <select class="form-control" name="drive_system" id="drive_system">
                        <option value="">Select Final Drive System</option>
                        <?php $drive_system = array('Belt','Chain','Shaft','Does not apply');
foreach ($drive_system as $val) { $selected = '';
						if($details->drive_system == $val){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row motorcycles">
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="wheels" class="bmd-label-floating mat-label-color">Choose Wheels:</label>
                      <select class="form-control" name="wheels" id="wheels">
                        <option value="">Select Wheels</option>
                        <?php $wheels = array('2 wheels','3 wheels','4 wheels');
foreach ($wheels as $val) { $selected = '';
						if($details->wheels == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="manufacturer" class="bmd-label-floating mat-label-color">Choose Manufacturer:</label>
                      <select class="form-control" name="manufacturer" id="manufacturer">
                        <option value="">Select Manufacturer</option>
                        <?php $manufacturer = array('Access Motor','Aprillia','Asiawing','Bajaj','Benelli','BMW','Buell','Can-am','Ducati','Gas Gas','Harley Davidson','Honda','Husaberg','Husqvarna','Indian','Kawasaki','KTM','Moto Guzzi','MV Agusta','Norton','Polaris','Royal Enfield','Suzuki','Triumph','Vespa','Victory','Yamaha','Other');
foreach ($manufacturer as $val) { $selected = '';
						if($details->manufacturer == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="size" class="bmd-label-floating mat-label-color">Choose Engine Size:</label>
                      <select class="form-control" name="size" id="size">
                        <option value="">Select Engine Size</option>
                        <?php $size = array('Less than 250cc','250cc - 499cc','500cc - 599cc','600cc - 749cc','750cc - 999cc','1,000cc or more','Does not apply');
foreach ($size as $val) { $selected = '';
						if($details->size == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new-auto">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="motorcycles_warranty" class="bmd-label-floating mat-label-color">Choose Warranty:</label>
                      <select class="form-control" name="motorcycles_warranty" id="motorcycles_warranty">
                        <option value="">Select Warranty</option>
                        <?php $warranty = array('Yes','No','Does Not Apply');
foreach ($warranty as $val) { $selected = '';
						if($details->warranty == $val){
							$selected = 'selected';
						} ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="size" class="bmd-label-floating">Contact Number:</label>
                      <input type="text" value="<?php echo $edit->mobile; ?>" class="form-control no-border mat-txt mat-font first-txt" id="contact" name="contact">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="size" class="bmd-label-floating">Email:</label>
                      <input type="text" value="<?php echo $edit->email; ?>" class="form-control no-border mat-txt mat-font first-txt" id="email" name="email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="card-header" id="locationadd">Location</div>
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="country" class="bmd-label-floating mat-label-color">Choose Country:</label>
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
                          <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
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
                      <input type="text" value="<?php echo $edit->latitude; ?>" class="form-control no-border mat-txt mat-font first-txt" id="latitude" name="latitude">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card-header" style="display:none">&nbsp;</div>
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
                      <label for="longitute" class="bmd-label-floating">Longitude:</label>
                      <input type="text" value="<?php echo $edit->longitude; ?>" class="form-control no-border mat-txt mat-font first-txt" id="longitude" name="longitude">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card-header" id="locationadd">Drag Location</div>
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Search Location:</label>
                      <input type="text" value="<?php echo $edit->address; ?>" class="form-control no-border mat-txt mat-font first-txt" id="address" name="address" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12" id="map" style="height:200px;"></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-header" id="locationadd">Description</div>
                    <div class="form-group">
                      <textarea type="text" id="description" name="description" class="form-control md-textarea  mat-txt" rows="3" placeholder="Description"><?php echo $edit->description; ?></textarea>
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
                      <input type="text" class="form-control text-count" readonly>
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
var demo1 = $('select[name="features[]"]').bootstrapDualListbox();
$("#demoform").submit(function() {
    alert($('[name="features[]"]').val());
    return false;
});
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
    if ($('#category').val() != '' || $('#category').val() != 0) {
        if ($('#category').val() == 1) {
            $('.subcategory').text('Choose Make');
            $('.model').fadeIn('slow');
            $('.cars').fadeIn('slow');
            $('.boats').hide();
            $('.heavy').hide();
            $('.vipnumber').hide();
            $('.motorcycles').hide();
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
            'url': '<?php echo base_url(); ?>get_auto_subcategory/' + $('#category').val(),
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
    $('#nationality').select2({
        placeholder: "Select nationalities"
    });
    $('#type').click(function(e) {
        if ($('#type').val() == 'New') {
            $('.used-auto').fadeOut();
        }
    });
    $('#type1').click(function(e) {
        if ($('#type1').val() == 'Used') {
            $('.used-auto').fadeIn('slow');
        }
    });
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
            'url': '<?php echo base_url(); ?>get_auto_subcategory/' + this.value,
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
            'url': '<?php echo base_url(); ?>get_auto_model/' + this.value,
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
	$("#post-form").validate({
			rules: {
				type: "required",
				category: "required",
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
				category: "Please select category",
				price: "Please enter price",
				title_en: {
					required: "Please enter title",
					minlength: "Your title must consist of at least 6 characters"
				}
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
</script>