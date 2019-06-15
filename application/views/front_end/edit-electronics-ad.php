<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata');?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">

<div class="full-wrap bg-ad">
  <div class="container">
    <div class="row"  style="margin-top: 50px;border: 1px solid #4fc3c533;margin-bottom: 15px;padding: 18px;">
      <div class="col-md-12">
        <div class="post-ad-wrap">
         
           <h3 style="color:black;"> Update Your Electronics Ad </h3>
            
              <form class="m-t-15" action="updateElectronics" enctype="multipart/form-data" method="post" name="post-form" id="post-form">
                <input type="hidden" name="main_category" value="<?php echo $this->input->get('category'); ?>">
                <input type="hidden" name="id" value="<?php echo $this->input->get('id'); ?>">
                <div class="row">
                  <div class="col-md-12">
                    <label class="form-check-label mat-label-color" for="type">Choose Type:</label>
                    
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type" value="New" <?php if($edit->type == 'New'){ echo 'checked'; }?>>
                        New </label>
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type1" value="Used" <?php if($edit->type == 'Used'){ echo 'checked'; }?>>
                        Used </label>
                   
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
                      <input type="text" value="<?php echo $edit->title_ar; ?>" class="form-control no-border mat-txt mat-font first-txt" name="title_ar" id="title_ar">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="category" class="bmd-label-floating mat-label-color">Choose Category:</label>
                      <select class="form-control" name="category" id="category">
                        <option value="">Select Category</option>
                        <?php $category = getElectronicsCategories(); 
						if($category){ foreach($category as $val){
              $selected = '';
              if($details->category == $val->id){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->id ?>" <?php echo $selected; ?>><?php echo $val->category; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Price:</label>
                      <input type="text" value="<?php echo $edit->price; ?>" class="form-control no-border mat-txt mat-font first-txt" name="price" id="price">
                    </div>
                  </div>
                  <div class="col-md-3 used">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="age" class="bmd-label-floating mat-label-color">Choose Age:</label>
                      <select class="form-control" name="age" id="age">
                        <option value="">Select Age</option>
                        <?php $age = array('Brand New','0-1 month','1-6 months','6-12 months','1-2 years','2-5 years','5-10 years','10+ years');
foreach ($age as $val) { 
              $selected = '';
              if($details->age == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="usage" class="bmd-label-floating mat-label-color">Choose Usage:</label>
                      <select class="form-control" name="usage" id="usage">
                        <option value="">Select Usage</option>
                        <?php $usage = array('Still in original packaging','Out of original packaging, but only used once','Used only a few times','Used an average amount, as frequently as would be expected','Used an above average amount since purchased');
foreach ($usage as $val) { 
              $selected = '';
              if($details->usage == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 used">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="condition" class="bmd-label-floating mat-label-color">Choose Condition:</label>
                      <select class="form-control" name="condition" id="condition">
                        <option value="">Select Condition</option>
                        <?php $condition = array('Perfect inside and out','Almost no noticeable problems or flaws','A bit of wear and tear, but in good working condition','Normal wear and tear for the age of the item, a few problems here and there','Above average wear and tear.  The item may need a bit of repair to work properly');
foreach ($condition as $val) { 
              $selected = '';
              if($details->condition == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3 new">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="warranty" class="bmd-label-floating mat-label-color">Choose Warranty:</label>
                      <select class="form-control" name="warranty" id="warranty">
                        <option value="">Select Warranty</option>
                        <?php $warranty = array('Yes','No','Does not apply');
foreach ($warranty as $val) { 
              $selected = '';
              if($details->warranty == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row television">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="tv_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control television" name="brand" id="tv_brand">
                        <option value="">Select Brand</option>
                        <?php $tvbrand = getBrands('T'); 
						if($tvbrand){ foreach($tvbrand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="t_screen_size" class="bmd-label-floating mat-label-color">Choose Screen Size:</label>
                      <select class="form-control television" name="screen_size" id="t_screen_size">
                        <option value="">Select Screen Size</option>
                        <?php $screen_size = array('7 Inch','9.5 Inch','10.2 Inch','17 Inch','19 Inch','20 Inch','21.5 Inch','22 Inch','23 Inch','24 Inch','26 Inch','28 Inch','32 Inch','39 Inch','40 Inch','42 Inch','43 Inch','46 Inch','48 Inch','49 Inch','50 Inch','55 Inch','58 Inch','60 Inch','65 Inch','70 Inch','75 Inch','78 Inch','79 Inch','80 Inch','82 Inch','85 Inch','86 Inch','Other');
foreach ($screen_size as $val) {
              $selected = '';
              if($details->screen_size == $val){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="t_category_type" class="bmd-label-floating mat-label-color">Choose TV Type:</label>
                      <select class="form-control television" name="category_type" id="t_category_type">
                        <option value="">Select TV Type</option>
                        <?php $category_type = array('Andriod Tv','Android Smart Tv','Full HD','Smart 3D Tv','Smart Tv','Standard Tv','Ultra HD 4K','Ultra Slim Uhd Tv','3D Tv','Other');
foreach ($category_type as $val) {
              $selected = '';
              if($details->category_type == $val){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="t_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control television" name="color" id="t_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){
              $selected = '';
              if($details->color == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row television">
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="tv_weight" class="bmd-label-floating">Weight:</label>
                      <input type="text" value="<?php echo $details->weight; ?>" class="form-control no-border mat-txt mat-font first-txt" name="weight" id="tv_weight">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="t_display_type" class="bmd-label-floating">Display Type (LED, LCD...):</label>
                      <input type="text" value="<?php echo $details->display_type; ?>" class="form-control no-border mat-txt mat-font first-txt" name="display_type" id="t_display_type">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="t_dimension" class="bmd-label-floating">Dimension (mm):</label>
                      <input type="text" value="<?php echo $details->dimension; ?>" class="form-control no-border mat-txt mat-font first-txt" name="dimension" id="t_dimension">
                    </div>
                  </div>
                </div>
                <div class="row washing">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="w_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control washing" name="brand" id="w_brand">
                        <option value="">Select Brand</option>
                        <?php $wbrand = getBrands('W'); 
						if($wbrand){ foreach($wbrand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="w_category_type" class="bmd-label-floating mat-label-color">Choose Type:</label>
                      <select class="form-control washing" name="category_type" id="w_category_type">
                        <option value="">Select Type</option>
                        <?php $w_type = array('Front Load','Top Load');
						foreach ($w_type as $val) { 
              $selected = '';
              if($details->category_type == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="w_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control washing" name="color" id="w_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){
              $selected = '';
              if($details->color == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="w_material" class="bmd-label-floating mat-label-color">Choose Material:</label>
                      <select class="form-control washing" name="material" id="w_material">
                        <option value="">Select Material</option>
                        <?php $material = array('Metal','Plastic','Stainless Steel','Other');
						foreach ($material as $val) { 
              $selected = '';
              if($details->material == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row battery">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="b_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control battery" name="brand" id="b_brand">
                        <option value="">Select Brand</option>
                        <?php $bbrand = getBrands('B'); 
						if($bbrand){ foreach($bbrand as $val){ 
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="b_compatible" class="bmd-label-floating mat-label-color">Choose Compatible with:</label>
                      <select class="form-control battery" name="compatible" id="b_compatible">
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
						if($compatible){ foreach ($compatible as $val) {
              $selected = '';
              if($details->compatible == $val->name){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row charger">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="c_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control charger" name="brand" id="c_brand">
                        <option value="">Select Brand</option>
                        <?php $cbrand = getBrands('C'); 
						if($cbrand){ foreach($cbrand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="c_category_type" class="bmd-label-floating mat-label-color">Choose Type:</label>
                      <select class="form-control charger" name="category_type" id="c_category_type">
                        <option value="">Select Type</option>
                        <?php $c_type = array('Adapter','Battery Chargers','Car Chargers','Case Battery Chargers','Charger Clip','Charger Kit','Controller Chargers','Dock Chargers','Laptop Charger','Night Lights','Power Converter & Inverter','Rechargeable Batteries','Reject 30 35','Solar Powered Chargers','Travel Adapter','Usb Charger','Usb Charger With External Power Bank','Vehicle Charger','Wall Charger','Wireless Chargers');
						if($c_type){ foreach ($c_type as $val) { 
              $selected = '';
              if($details->category_type == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="c_compatible" class="bmd-label-floating mat-label-color">Choose Compatible with:</label>
                      <select class="form-control charger" name="compatible" id="c_compatible">
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
						if($compatible){ foreach ($compatible as $val) { 
              $selected = '';
              if($details->compatible == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row theater">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="t_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control theater" name="brand" id="t_brand">
                        <option value="">Select Brand</option>
                        <?php $cbrand = getBrands('C'); 
						if($cbrand){ foreach($cbrand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="player" class="bmd-label-floating mat-label-color">Choose DVD player / recorder:</label>
                      <select class="form-control theater" name="player" id="player">
                        <option value="">Select DVD player / recorder</option>
                        <?php $player = array('Dvd Player & Recorder','Dvd Player','Blu-ray Player','Unavailable','Blu-ray Player & Recorder');
						if($player){ foreach ($player as $val) { 
              $selected = '';
              if($details->player == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row power">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="p_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control theater" name="brand" id="p_brand">
                        <option value="">Select Brand</option>
                        <?php $cbrand = getBrands('PB'); 
						if($cbrand){ foreach($cbrand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="p_compatible" class="bmd-label-floating mat-label-color">Choose Compatible with:</label>
                      <select class="form-control theater" name="compatible" id="p_compatible">
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
						if($compatible){ foreach ($compatible as $val) {
              $selected = '';
              if($details->compatible == $val->name){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row headsets">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="h_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control headsets" name="brand" id="h_brand">
                        <option value="">Select Brand</option>
                        <?php $cbrand = getBrands('H'); 
						if($cbrand){ foreach($cbrand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="h_category_type" class="bmd-label-floating mat-label-color">Choose Type:</label>
                      <select class="form-control headsets" name="category_type" id="h_category_type">
                        <option value="">Select Type</option>
                        <?php $h_type = array('Convertible','Earphones','Handset','Headband','Headphone & Headset Accessories','In Ear','Neckband','On Ear','Over Ear');
						if($h_type){ foreach ($h_type as $val) {
              $selected = '';
              if($details->category_type == $val){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="h_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control headsets" name="color" id="h_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){
              $selected = '';
              if($details->color == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="h_compatible" class="bmd-label-floating mat-label-color">Choose Compatible with:</label>
                      <select class="form-control headsets" name="compatible" id="h_compatible">
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
						if($compatible){ foreach ($compatible as $val) {
              $selected = '';
              if($details->compatible == $val->name){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row speakers">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="s_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control speakers" name="brand" id="s_brand">
                        <option value="">Select Brand</option>
                        <?php $s_brand = getBrands('S'); 
						if($s_brand){ foreach($s_brand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="s_category_type" class="bmd-label-floating mat-label-color">Choose Type:</label>
                      <select class="form-control speakers" name="category_type" id="s_category_type">
                        <option value="">Select Type</option>
                        <?php $s_type = array('Bluetooth Speakers','Computer Speakers','Sound Bar','Outdoor Speakers','Floor Standing Speakers','Center Channel Speakers','In Ceiling & Wall Speakers','Docking Speakers','Passive Speakers','Karaoke Speakers','Subwoofers','Amplifier');
						if($s_type){ foreach ($s_type as $val) { 
              $selected = '';
              if($details->category_type == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="s_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control speakers" name="color" id="s_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){
              $selected = '';
              if($details->color == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="s_compatible" class="bmd-label-floating mat-label-color">Choose Compatible with:</label>
                      <select class="form-control speakers" name="compatible" id="s_compatible">
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
						if($compatible){ foreach ($compatible as $val) { 
              $selected = '';
              if($details->compatible == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row speakers">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="connectivity" class="bmd-label-floating mat-label-color">Choose Connectivity:</label>
                      <select class="form-control speakers" name="connectivity" id="connectivity">
                        <option value="">Select Connectivity</option>
                        <?php $connectivity = array('Wireless','Wired','Wired/wireless','Bluetooth','Wired & Wireless');
						if($connectivity){ foreach ($connectivity as $val) { 
              $selected = '';
              if($details->connectivity == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row refrigerators">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="r_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control refrigerators" name="brand" id="r_brand">
                        <option value="">Select Brand</option>
                        <?php $r_brand = getBrands('R'); 
						if($r_brand){ foreach($r_brand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="r_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control refrigerators" name="color" id="r_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){
              $selected = '';
              if($details->color == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="r_material" class="bmd-label-floating mat-label-color">Choose Material:</label>
                      <select class="form-control refrigerators" name="material" id="r_material">
                        <option value="">Select Material</option>
                        <?php $material = array('Glass','Glass Black','Glass Doors Plastic Inside','Metal','Metal With Glass','Plastic','Stainless Platinum','Stainless Steel','Vcm');
						if($material){ foreach ($material as $val) { 
              $selected = '';
              if($details->material == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="style" class="bmd-label-floating mat-label-color">Choose Style:</label>
                      <select class="form-control refrigerators" name="style" id="style">
                        <option value="">Select Style</option>
                        <?php $style = array('Beverage Refrigerator','Chest Freezer','Compact','Freezer','Freezerless','Freezer On Bottom','Freezer On Top','French Door','Glass Door Chest Freezer','Mini Bar Refrigerator','Showcase Chiller','Showcase Refrigerator','Side By Side','Single Door Refrigerator','Single Top Refrigerator','Upright Freezer');
						if($style){ foreach ($style as $val) {
              $selected = '';
              if($details->style == $val){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row fans">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="f_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control fans" name="brand" id="f_brand">
                        <option value="">Select Brand</option>
                        <?php $f_brand = getBrands('F'); 
						if($f_brand){ foreach($f_brand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="f_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control fans" name="color" id="f_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){
              $selected = '';
              if($details->color == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="f_category_type" class="bmd-label-floating mat-label-color">Choose Fan Type:</label>
                      <select class="form-control fans" name="category_type" id="f_category_type">
                        <option value="">Select Fan Type</option>
                        <?php $fan_type = array('Table Fans','Handheld Fans','Pedestal Fans','Wall Mount Fans','Tower Fans','Exhaust Fans','Ceiling Fans','Rechargable Fan','Bladeless Fans');
						if($fan_type){ foreach ($fan_type as $val) { 
              $selected = '';
              if($details->category_type == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="power_source" class="bmd-label-floating mat-label-color">Choose Power Source:</label>
                      <select class="form-control fans" name="power_source" id="power_source">
                        <option value="">Select Power Source</option>
                        <?php $power_source = array('Ac/dc','Battery','Battery & Electric','Electric','Manual','Solar Power','Usb','Other');
						if($power_source){ foreach ($power_source as $val) {
              $selected = '';
              if($details->power_source == $val){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row camera">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="dc_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control camera" name="brand" id="dc_brand">
                        <option value="">Select Brand</option>
                        <?php $dc_brand = getBrands('DC'); 
						if($dc_brand){ foreach($dc_brand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="dc_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control camera" name="color" id="dc_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){
              $selected = '';
              if($details->color == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="megapixel" class="bmd-label-floating mat-label-color">Choose Megapixel:</label>
                      <select class="form-control camera" name="megapixel" id="megapixel">
                        <option value="">Select Megapixel</option>
                        <?php $megapixel = array('24.2 MP','12 MP','20.1 MP','20 MP','24.3 MP','20.2 MP','10 MP','16 MP','18 MP','13 MP','24 MP','20.4 MP','16.1 MP','5 MP','14 MP','26.2 MP','20.3 MP','16.2 MP','18.2 MP','20.9 MP','16.4 MP','6 MP','16.3 MP','12.2 MP','13.3 MP','8 MP','24.4 MP','13.2 MP','10.8 MP','30.4 MP','42.4 MP','22.3 MP','12.1 MP','2.1 MP','10.2 MP','12.8 MP','45.7 MP','36.3 MP','50.6 MP','18.9 MP','24.1 MP','2 MP','20.8 MP','3 MP','21.1 MP','22 MP','36.4 MP','51.4 MP','21 MP','7.1 MP','4.2 MP','1.3 MP','11.1 MP','1 MP','0.3 MP','12.3 MP','14.1 MP','15 MP','14.2 MP','15.1 MP','Other');
						if($megapixel){ foreach ($megapixel as $val) { 
              $selected = '';
              if($details->megapixel == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="dc_category_type" class="bmd-label-floating mat-label-color">Choose Camera Type:</label>
                      <select class="form-control camera" name="category_type" id="dc_category_type">
                        <option value="">Select Camera Type</option>
                        <?php $camera_type = array('Compact Camera','Long Zoom Camera','Mirrorless Camera','Point & Shoot','SLR Camera','Underwater Digital Camera','Other');
						if($camera_type){ foreach ($camera_type as $val) { 
              $selected = '';
              if($details->category_type == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row camera">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="dc_screen_size" class="bmd-label-floating mat-label-color">Choose Screen Size:</label>
                      <select class="form-control camera" name="screen_size" id="dc_screen_size">
                        <option value="">Select Screen Size</option>
                        <?php $screen_size = array('No Screen','0.5 Inch','1 Inch','1.1 Inch','1.4 Inch','1.5 Inch','1.7 Inch','2 Inch','2.3 Inch','2.5 Inch','2.7 Inch','2.9 Inch','2.95 Inch','3 Inch','3.2 Inch','3.3 Inch','3.5 Inch','3.97 Inch','Other');
						if($screen_size){ foreach($screen_size as $val){
              $selected = '';
              if($details->screen_size == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="optical_zoom" class="bmd-label-floating mat-label-color">Choose Optical Zoom:</label>
                      <select class="form-control camera" name="optical_zoom" id="optical_zoom">
                        <option value="">Select Optical Zoom</option>
                        <?php $optical_zoom = array('4X','5X','3X','1X','8X','10X','1.6X','7X','50X','2X','63X','65X','30X','40X','42X','60X','6X','35X','4.2X','3.1X','18X','3.6X','3.3X','9X','83X','25X','24X','2.9X','0.7X','20X','7.8X','5.8X','0.5X','12X','28X','Other');
						if($optical_zoom){ foreach($optical_zoom as $val){
              $selected = '';
              if($details->optical_zoom == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row memory">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="m_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control memory" name="brand" id="m_brand">
                        <option value="">Select Brand</option>
                        <?php $m_brand = getBrands('M'); 
						if($m_brand){ foreach($m_brand as $val){
              $selected = '';
              if($details->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="m_category_type" class="bmd-label-floating mat-label-color">Choose Card Type:</label>
                      <select class="form-control memory" name="category_type" id="m_category_type">
                        <option value="">Select Card Type</option>
                        <?php $card_type = array('Compact Flash Cards','Memory Sticks','Micro Sd Cards','Micro Sd Extended Capacity','Micro Sd High Capacity Cards','Mini Sd Cards','Mini Sd High Capacity Cards','Multimedia Cards','Secure Digital Cards','Secure Digital Extended Capacity','Secure Digital High Capacity Cards');
foreach ($card_type as $val) { 
              $selected = '';
              if($details->category_type == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="m_compatible" class="bmd-label-floating mat-label-color">Choose Compatible with:</label>
                      <select class="form-control memory" name="compatible" id="m_compatible">
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
						if($compatible){ foreach ($compatible as $val) { 
              $selected = '';
              if($details->compatible == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="storage" class="bmd-label-floating mat-label-color">Choose Storage:</label>
                      <select class="form-control memory" name="storage" id="storage">
                        <option value="">Select Storage</option>
                        <?php $storage = array('Less Than 512 Mb','512 Mb','1 Gb','2 Gb','4 Gb','8 Gb','16 Gb','28 GB','32 Gb','64 Gb','128 Gb','256 Gb','512 GB','1 TB','Other');
foreach ($storage as $val) { 
              $selected = '';
              if($details->storage == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
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
                    <div class="card-header" style="background:none;">&nbsp;</div>
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

<div class="modal fade email-to-modal" id="deletePost'.@$val->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash" aria-hidden="true"></i>Delete Post</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
  <div class="modal-confirm">Are you sure, you want to delete this post?...</div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit mail-btn">Yes
    </button>
    <button type="button" data-dismiss="modal" aria-label="Close" class="close btn btn-raised hero-radius btn-FF9800 mat-submit mail-btn">No
    </button>
  </div>
  </div>
</div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
<script src="assets/ckeditor/ckeditor.js"></script> 
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
<script src="assets/front_end/js/jquery.validate.js"></script>
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCb8mnr3T1fcU8UgpCWylaH3rqfVdBsPbk&libraries=places'></script> 
<script src="assets/front_end/js/locationpicker.jquery.js"></script> 
<script type="application/javascript"> 
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
    $('#type').click(function(e) {
        if ($('#type').val() == 'New') {
            $('.used').fadeOut();
        }
    });
    $('#type1').click(function(e) {
        if ($('#type1').val() == 'Used') {
            $('.used').fadeIn('slow');
        }
    });
    $('.text-main').hide();
    $('.television').hide();
    $('.washing').hide();
    $('.battery').hide();
    $('.theater').hide();
    $('.charger').hide();
    $('.power').hide();
    $('.headsets').hide();
    $('.speakers').hide();
    $('.refrigerators').hide();
    $('.fans').hide();
    $('.camera').hide();
    $('.memory').hide();
    $('#category').change(function(e) {
        if ($('#category').val() == 42) {
            $('.television').fadeIn('slow');
            $(".washing, .battery, .theater, .charger, .power, .headsets, .speakers, .refrigerators, .fans, .camera, .memory").prop('disabled', true);
            $(".television").prop('disabled', false);
            $('.washing').hide();
            $('.battery').hide();
            $('.theater').hide();
            $('.charger').hide();
            $('.power').hide();
            $('.headsets').hide();
            $('.speakers').hide();
            $('.refrigerators').hide();
            $('.fans').hide();
            $('.camera').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 77) {
            $('.washing').fadeIn('slow');
            $(".television, .battery, .theater, .charger, .power, .headsets, .speakers, .refrigerators, .fans, .camera, .memory").prop('disabled', true);
            $(".washing").prop('disabled', false);
            $('.battery').hide();
            $('.television').hide();
            $('.theater').hide();
            $('.charger').hide();
            $('.power').hide();
            $('.headsets').hide();
            $('.speakers').hide();
            $('.refrigerators').hide();
            $('.fans').hide();
            $('.camera').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 1) {
            $('.battery').fadeIn('slow');
            $(".television, .washing, .theater, .charger, .power, .headsets, .speakers, .refrigerators, .fans, .camera, .memory").prop('disabled', true);
            $(".battery").prop('disabled', false);
            $('.television').hide();
            $('.washing').hide();
            $('.theater').hide();
            $('.charger').hide();
            $('.power').hide();
            $('.headsets').hide();
            $('.speakers').hide();
            $('.refrigerators').hide();
            $('.fans').hide();
            $('.camera').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 8) {
            $('.theater').fadeIn('slow');
            $(".television, .washing, .battery, .charger, .power, .headsets, .speakers, .refrigerators, .fans, .camera, .memory").prop('disabled', true);
            $(".theater").prop('disabled', false);
            $('.battery').hide();
            $('.television').hide();
            $('.washing').hide();
            $('.charger').hide();
            $('.power').hide();
            $('.headsets').hide();
            $('.speakers').hide();
            $('.refrigerators').hide();
            $('.fans').hide();
            $('.camera').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 5) {
            $('.charger').fadeIn('slow');
            $(".television, .washing, .battery, .theater, .power, .headsets, .speakers, .refrigerators, .fans, .camera, .memory").prop('disabled', true);
            $(".charger").prop('disabled', false);
            $('.theater').hide();
            $('.battery').hide();
            $('.television').hide();
            $('.washing').hide();
            $('.power').hide();
            $('.headsets').hide();
            $('.speakers').hide();
            $('.refrigerators').hide();
            $('.fans').hide();
            $('.camera').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 10) {
            $('.power').fadeIn('slow');
            $(".television, .washing, .battery, .theater, .charger, .headsets, .speakers, .refrigerators, .fans, .camera, .memory").prop('disabled', true);
            $(".power").prop('disabled', false);
            $('.charger').hide();
            $('.theater').hide();
            $('.battery').hide();
            $('.television').hide();
            $('.washing').hide();
            $('.headsets').hide();
            $('.speakers').hide();
            $('.refrigerators').hide();
            $('.fans').hide();
            $('.camera').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 19) {
            $('.headsets').fadeIn('slow');
            $(".television, .washing, .battery, .theater, .charger, .power, .speakers, .refrigerators, .fans, .camera, .memory").prop('disabled', true);
            $(".headsets").prop('disabled', false);
            $('.power').hide();
            $('.charger').hide();
            $('.theater').hide();
            $('.battery').hide();
            $('.television').hide();
            $('.washing').hide();
            $('.speakers').hide();
            $('.refrigerators').hide();
            $('.fans').hide();
            $('.camera').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 39) {
            $('.speakers').fadeIn('slow');
            $(".television, .washing, .battery, .theater, .charger, .power, .headsets, .refrigerators, .fans, .camera, .memory").prop('disabled', true);
            $(".speakers").prop('disabled', false);
            $('.power').hide();
            $('.charger').hide();
            $('.theater').hide();
            $('.battery').hide();
            $('.television').hide();
            $('.washing').hide();
            $('.headsets').hide();
            $('.refrigerators').hide();
            $('.fans').hide();
            $('.camera').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 59) {
            $('.refrigerators').fadeIn('slow');
            $(".television, .washing, .battery, .theater, .charger, .power, .headsets, .speakers, .fans, .camera, .memory").prop('disabled', true);
            $(".refrigerators").prop('disabled', false);
            $('.power').hide();
            $('.charger').hide();
            $('.theater').hide();
            $('.battery').hide();
            $('.television').hide();
            $('.washing').hide();
            $('.speakers').hide();
            $('.headsets').hide();
            $('.fans').hide();
            $('.camera').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 68) {
            $('.fans').fadeIn('slow');
            $(".television, .washing, .battery, .theater, .charger, .power, .headsets, .speakers, .refrigerators, .camera, .memory").prop('disabled', true);
            $(".fans").prop('disabled', false);
            $('.power').hide();
            $('.charger').hide();
            $('.theater').hide();
            $('.battery').hide();
            $('.television').hide();
            $('.washing').hide();
            $('.speakers').hide();
            $('.headsets').hide();
            $('.refrigerators').hide();
            $('.camera').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 85) {
            $('.camera').fadeIn('slow');
            $(".television, .washing, .battery, .theater, .charger, .power, .headsets, .speakers, .refrigerators, .fans, .memory").prop('disabled', true);
            $(".camera").prop('disabled', false);
            $('.fans').hide();
            $('.power').hide();
            $('.charger').hide();
            $('.theater').hide();
            $('.battery').hide();
            $('.television').hide();
            $('.washing').hide();
            $('.speakers').hide();
            $('.headsets').hide();
            $('.refrigerators').hide();
            $('.memory').hide();
        } else if ($('#category').val() == 88) {
            $('.memory').fadeIn('slow');
            $(".television, .washing, .battery, .theater, .charger, .power, .headsets, .speakers, .refrigerators, .fans, .camera").prop('disabled', true);
            $(".memory").prop('disabled', false);
            $('.camera').hide();
            $('.fans').hide();
            $('.power').hide();
            $('.charger').hide();
            $('.theater').hide();
            $('.battery').hide();
            $('.television').hide();
            $('.washing').hide();
            $('.speakers').hide();
            $('.headsets').hide();
            $('.refrigerators').hide();
        } else {
            $('.camera').hide();
            $('.power').hide();
            $('.theater').hide();
            $('.television').hide();
            $('.battery').hide();
            $('.washing').hide();
            $('.charger').hide();
            $('.speakers').hide();
            $('.refrigerators').hide();
            $('.fans').hide();
            $('.memory').hide();
            $('.headsets').hide();
            $(".television, .washing, .battery, .theater, .charger, .power, .headsets, .speakers, .refrigerators, .fans, .camera, .memory").prop('disabled', true);
        }
    });
		$("#post-form").validate({
			rules: {
				type: "required",
				category: "required",
				country: "required",
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
				country: "Please select country",
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