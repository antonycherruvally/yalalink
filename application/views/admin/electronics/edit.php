<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">
<!-- Page -->
<div class="page">
  <div class="page-header">
    <h1 class="page-title">Electronics</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/real_estate">Electronics</a></li>
      <li class="breadcrumb-item active">Edit Electronics</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Edit Electronics</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                <form class="form-signin cv-form" action="admin/updateElectronics" enctype="multipart/form-data" method="post" name="posts_form" id="posts_form">
                  <input type="hidden" value="<?php echo $edit->post_id; ?>" name="id">
                  <div class="row">
                    <div class="col-md-4"> 
                      <!-- Example Radios -->
                      <div class="example-wrap">
                        <h4 class="example-title">Choose Type</h4>
                        <div class="radio-custom radio-primary">
                          <input type="radio"  name="type" id="type_1" value="New" <?php if($edit->type == 'New'){ echo 'checked'; } ?>/>
                          <label for="type_1">New</label>
                        </div>
                        <div class="radio-custom radio-primary">
                          <input type="radio"  name="type" id="type_2" value="Used" <?php if($edit->type == 'Used'){ echo 'checked'; } ?> />
                          <label for="type_2">Used</label>
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
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Category" data-allow-clear="true" name="category" id="category">
                        <option value="">Select Category</option>
                        <?php $category = getElectronicsCategories(); 
                        if($category){ foreach($category as $val){
                        $selected = '';
                        if($edit->category == $val->id){
                          $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->id ?>" <?php echo $selected; ?>><?php echo $val->category; ?></option>
                        <?php }} ?>
                      </select>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                       <input type="text" class="form-control" name="price" id="price" value="<?php if($edit->price) echo $edit->price; ?>" />
                        <label class="floating-label">Price</label>
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
                  <div class="row television">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control television" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="tv_brand" >
                         <option value="">Select Brand</option>
                        <?php $tvbrand = getBrands('T'); 
                        if($tvbrand){ foreach($tvbrand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control television" data-plugin="select2" data-placeholder="Choose Screen Size" data-allow-clear="true" name="screen_size" id="t_screen_size" >
                        <option value="">Select Screen Size</option>
                        <?php $screen_size = array('7 Inch','9.5 Inch','10.2 Inch','17 Inch','19 Inch','20 Inch','21.5 Inch','22 Inch','23 Inch','24 Inch','26 Inch','28 Inch','32 Inch','39 Inch','40 Inch','42 Inch','43 Inch','46 Inch','48 Inch','49 Inch','50 Inch','55 Inch','58 Inch','60 Inch','65 Inch','70 Inch','75 Inch','78 Inch','79 Inch','80 Inch','82 Inch','85 Inch','86 Inch','Other');
                        foreach ($screen_size as $val) { 
                        $selected = '';
                        if($edit->screen_size == $val){
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
                        <select class="form-control television" data-plugin="select2" data-placeholder="Choose TV Type" data-allow-clear="true" name="category_type" id="t_category_type" >
                        <option value="">Select TV Type</option>
                        <?php $category_type = array('Andriod Tv','Android Smart Tv','Full HD','Smart 3D Tv','Smart Tv','Standard Tv','Ultra HD 4K','Ultra Slim Uhd Tv','3D Tv','Other');
                        foreach ($category_type as $val) { 
                        $selected = '';
                        if($edit->category_type == $val){
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
                  <div class="row television">
                  <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control television" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="t_color" >
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
            if($color){ foreach($color as $val){
                      $selected = '';
                      if($edit->color == $val->name){
                      $selected = 'selected';
                      }
                      ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                  </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                       <input type="text" class="form-control" name="weight" id="tv_weight" value="<?php if($edit->weight) echo $edit->weight; ?>"/>
                        <label class="floating-label">weight</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                       <input type="text" class="form-control" name="display_type" id="t_display_type" value="<?php if($edit->display_type) echo $edit->display_type; ?>"/>
                        <label class="floating-label">Display Type (LED, LCD...)</label>
                      </div>
                    </div>
                  </div>
                  <div class="row television">
                   <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                       <input type="text" class="form-control" name="dimension" id="t_dimension" value="<?php if($edit->dimension) echo $edit->dimension; ?>"/>
                        <label class="floating-label">Dimensions (mm)</label>
                      </div>
                    </div>
                  </div>
                  <div class="row washing">
                  <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control washing" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="w_color" >
                         <option value="">Select Color</option>
                        <?php $color = getColors(); 
                        if($color){ foreach($color as $val){
                        $selected = '';
                        if($edit->color == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control washing" data-plugin="select2" data-placeholder="Choose Material" data-allow-clear="true" name="material" id="material" >
                         <option value="">Select Material</option>
                        <?php $material = array('Metal','Plastic','Stainless Steel','Other');
                        foreach ($material as $val) { 
                        $selected = '';
                        if($edit->material == $val){
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
                  <div class="row washing">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control washing" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="w_brand" >
                        <option value="">Select Brand</option>
                        <?php $bbrand = getBrands('B'); 
                        if($bbrand){ foreach($bbrand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control washing" data-plugin="select2" data-placeholder="Choose Type" data-allow-clear="true" name="category_type" id="w_category_type" >
                          <option value="">Select Type</option>
                        <?php $w_type = array('Front Load','Top Load');
            foreach ($w_type as $val) { 
                    $selected = '';
                    if($edit->category_type == $val){
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

                  <div class="row battery">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control battery" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="b_brand" >
                        <option value="">Select Brand</option>
                        <?php $bbrand = getBrands('B'); 
                        if($bbrand){ foreach($bbrand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control battery" data-plugin="select2" data-placeholder="Choose Compatible with" data-allow-clear="true" name="compatible" id="b_compatible" >
                          <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
            if($compatible){ foreach ($compatible as $val) { 
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row charger">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control charger" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="c_brand" >
                        <option value="">Select Brand</option>
                        <?php $cbrand = getBrands('C'); 
                        if($cbrand){ foreach($cbrand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control charger" data-plugin="select2" data-placeholder="Choose Type" data-allow-clear="true" name="category_type" id="c_category_type" >
                          <option value="">Select Type</option>
                        <?php $c_type = array('Adapter','Battery Chargers','Car Chargers','Case Battery Chargers','Charger Clip','Charger Kit','Controller Chargers','Dock Chargers','Laptop Charger','Night Lights','Power Converter & Inverter','Rechargeable Batteries','Reject 30 35','Solar Powered Chargers','Travel Adapter','Usb Charger','Usb Charger With External Power Bank','Vehicle Charger','Wall Charger','Wireless Chargers');
                        if($c_type){ foreach ($c_type as $val) { 
                        $selected = '';
                        if($edit->category_type == $val){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control charger" data-plugin="select2" data-placeholder="Choose Compatible with" data-allow-clear="true" name="compatible" id="c_compatible" >
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
                        if($compatible){ foreach ($compatible as $val) { 
                        $selected = '';
                        if($edit->compatible == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row theater">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control theater" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="t_brand" >
                        <option value="">Select Brand</option>
                        <?php $cbrand = getBrands('C'); 
                        if($cbrand){ foreach($cbrand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control theater" data-plugin="select2" data-placeholder="Choose DVD player / recorder" data-allow-clear="true" name="player" id="player" >
                        <option value="">Select DVD player / recorder</option>
                        <?php $player = array('Dvd Player & Recorder','Dvd Player','Blu-ray Player','Unavailable','Blu-ray Player & Recorder');
                        if($player){ foreach ($player as $val) {
                        $selected = '';
                        if($edit->player == $val){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row power">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control theater" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="p_brand" >
                        <option value="">Select Brand</option>
                        <?php $cbrand = getBrands('PB'); 
                        if($cbrand){ foreach($cbrand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control theater" data-plugin="select2" data-placeholder="Choose Compatible with" data-allow-clear="true" name="compatible" id="p_compatible" >
                       <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
                        if($compatible){ foreach ($compatible as $val) {
                        $selected = '';
                        if($edit->compatible == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row headsets">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control headsets" data-plugin="select2" data-placeholder="Choose theater" data-allow-clear="true" name="brand" id="h_brand" >
                        <option value="">Select Brand</option>
                        <?php $cbrand = getBrands('PB'); 
                        if($cbrand){ foreach($cbrand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>"  <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control headsets" data-plugin="select2" data-placeholder="Choose Type" data-allow-clear="true" name="category_type" id="h_category_type" >
                        <option value="">Select Type</option>
                        <?php $h_type = array('Convertible','Earphones','Handset','Headband','Headphone & Headset Accessories','In Ear','Neckband','On Ear','Over Ear');
                        if($h_type){ foreach ($h_type as $val) { 
                        $selected = '';
                        if($edit->category_type == $val){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control headsets" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="h_color" >
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
                        if($color){ foreach($color as $val){
                        $selected = '';
                        if($edit->color == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row headsets">
                  <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control headsets" data-plugin="select2" data-placeholder="Choose Compatible with" data-allow-clear="true" name="compatible" id="h_compatible" >
                       <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
                        if($compatible){ foreach ($compatible as $val) {
                        $selected = '';
                        if($edit->compatible == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row speakers">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control speakers" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="s_brand" >
                        <option value="">Select Brand</option>
                        <?php $s_brand = getBrands('S'); 
                        if($s_brand){ foreach($s_brand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control speakers" data-plugin="select2" data-placeholder="Choose Type" data-allow-clear="true" name="category_type" id="s_category_type" >
                         <option value="">Select Type</option>
                        <?php $s_type = array('Bluetooth Speakers','Computer Speakers','Sound Bar','Outdoor Speakers','Floor Standing Speakers','Center Channel Speakers','In Ceiling & Wall Speakers','Docking Speakers','Passive Speakers','Karaoke Speakers','Subwoofers','Amplifier');
                        if($s_type){ foreach ($s_type as $val) {
                        $selected = '';
                        if($edit->category_type == $val){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control speakers" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="s_color" >
                         <option value="">Select Color</option>
                        <?php $color = getColors(); 
                        if($color){ foreach($color as $val){
                        $selected = '';
                        if($edit->color == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row speakers">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control speakers" data-plugin="select2" data-placeholder="Choose Compatible with" data-allow-clear="true" name="compatible" id="s_compatible" >
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
                        if($compatible){ foreach ($compatible as $val) { 
                        $selected = '';
                        if($edit->compatible == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control speakers" data-plugin="select2" data-placeholder="Choose Connectivity" data-allow-clear="true" name="connectivity" id="connectivity" >
                        <option value="">Select Connectivity</option>
                        <?php $connectivity = array('Wireless','Wired','Wired/wireless','Bluetooth','Wired & Wireless');
                        if($connectivity){ foreach ($connectivity as $val) {
                        $selected = '';
                        if($edit->connectivity == $val){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row refrigerators">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control refrigerators" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="r_brand" >
                        <option value="">Select Brand</option>
                        <?php $r_brand = getBrands('R'); 
                        if($r_brand){ foreach($r_brand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control refrigerators" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="r_color" >
                         <option value="">Select Color</option>
                        <?php $color = getColors(); 
                        if($color){ foreach($color as $val){
                        $selected = '';
                        if($edit->color == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control refrigerators" data-plugin="select2" data-placeholder="Choose Material" data-allow-clear="true" name="material" id="r_material" >
                        <option value="">Select Material</option>
                        <?php $material = array('Glass','Glass Black','Glass Doors Plastic Inside','Metal','Metal With Glass','Plastic','Stainless Platinum','Stainless Steel','Vcm');
                        if($material){ foreach ($material as $val) { 
                        $selected = '';
                        if($edit->material == $val){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row refrigerators">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control refrigerators" data-plugin="select2" data-placeholder="Choose Style" data-allow-clear="true" name="style" id="style" >
                         <option value="">Select Style</option>
                        <?php $style = array('Beverage Refrigerator','Chest Freezer','Compact','Freezer','Freezerless','Freezer On Bottom','Freezer On Top','French Door','Glass Door Chest Freezer','Mini Bar Refrigerator','Showcase Chiller','Showcase Refrigerator','Side By Side','Single Door Refrigerator','Single Top Refrigerator','Upright Freezer');
                          if($style){ foreach ($style as $val) { 
                          $selected = '';
                          if($edit->style == $val){
                          $selected = 'selected';
                          }
                          ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row fans">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control fans" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="f_brand" >
                        <option value="">Select Brand</option>
                        <?php $f_brand = getBrands('F');
                        if($f_brand){ foreach($f_brand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control fans" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="f_color" >
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
                        if($color){ foreach($color as $val){
                        $selected = '';
                        if($edit->color == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control fans" data-plugin="select2" data-placeholder="Choose Fan Type" data-allow-clear="true" name="category_type" id="f_category_type" >
                       <option value="">Select Fan Type</option>
                        <?php $fan_type = array('Table Fans','Handheld Fans','Pedestal Fans','Wall Mount Fans','Tower Fans','Exhaust Fans','Ceiling Fans','Rechargable Fan','Bladeless Fans');
                          if($fan_type){ foreach ($fan_type as $val) {
                          $selected = '';
                          if($edit->category_type == $val){
                          $selected = 'selected';
                          }
                          ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row fans">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control fans" data-plugin="select2" data-placeholder="Choose Power Source" data-allow-clear="true" name="power_source" id="power_source" >
                        <option value="">Select Power Source</option>
                        <?php $power_source = array('Ac/dc','Battery','Battery & Electric','Electric','Manual','Solar Power','Usb','Other');
                          if($power_source){ foreach ($power_source as $val) { 
                          $selected = '';
                          if($edit->power_source == $val){
                          $selected = 'selected';
                          }
                          ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row camera">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control camera" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="dc_brand" >
                        <option value="">Select Brand</option>
                        <?php $dc_brand = getBrands('DC'); 
                        if($dc_brand){ foreach($dc_brand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control camera" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="dc_color" >
                       <option value="">Select Color</option>
                        <?php $color = getColors(); 
            if($color){ foreach($color as $val){
                      $selected = '';
                      if($edit->color == $val->name){
                      $selected = 'selected';
                      }
                      ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control camera" data-plugin="select2" data-placeholder="Choose Megapixel" data-allow-clear="true" name="megapixel" id="megapixel" >
                      <option value="">Select Megapixel</option>
                        <?php $megapixel = array('24.2 MP','12 MP','20.1 MP','20 MP','24.3 MP','20.2 MP','10 MP','16 MP','18 MP','13 MP','24 MP','20.4 MP','16.1 MP','5 MP','14 MP','26.2 MP','20.3 MP','16.2 MP','18.2 MP','20.9 MP','16.4 MP','6 MP','16.3 MP','12.2 MP','13.3 MP','8 MP','24.4 MP','13.2 MP','10.8 MP','30.4 MP','42.4 MP','22.3 MP','12.1 MP','2.1 MP','10.2 MP','12.8 MP','45.7 MP','36.3 MP','50.6 MP','18.9 MP','24.1 MP','2 MP','20.8 MP','3 MP','21.1 MP','22 MP','36.4 MP','51.4 MP','21 MP','7.1 MP','4.2 MP','1.3 MP','11.1 MP','1 MP','0.3 MP','12.3 MP','14.1 MP','15 MP','14.2 MP','15.1 MP','Other');
            if($megapixel){ foreach ($megapixel as $val) {
                        $selected = '';
                        if($edit->megapixel == $val){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row camera">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control camera" data-plugin="select2" data-placeholder="Choose Camera Type" data-allow-clear="true" name="category_type" id="dc_category_type" >
                        <option value="">Select Camera Type</option>
                        <?php $camera_type = array('Compact Camera','Long Zoom Camera','Mirrorless Camera','Point & Shoot','SLR Camera','Underwater Digital Camera','Other');
            if($camera_type){ foreach ($camera_type as $val) {
                        $selected = '';
                        if($edit->category_type == $val){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control camera" data-plugin="select2" data-placeholder="Choose Screen Size" data-allow-clear="true" name="screen_size" id="dc_screen_size" >
                       <option value="">Select Screen Size</option>
                        <?php $screen_size = array('No Screen','0.5 Inch','1 Inch','1.1 Inch','1.4 Inch','1.5 Inch','1.7 Inch','2 Inch','2.3 Inch','2.5 Inch','2.7 Inch','2.9 Inch','2.95 Inch','3 Inch','3.2 Inch','3.3 Inch','3.5 Inch','3.97 Inch','Other');
            if($screen_size){ foreach($screen_size as $val){
                        $selected = '';
                        if($edit->screen_size == $val){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control camera" data-plugin="select2" data-placeholder="Choose Optical Zoom" data-allow-clear="true" name="optical_zoom" id="optical_zoom" >
                       <option value="">Select Optical Zoom</option>
                        <?php $optical_zoom = array('4X','5X','3X','1X','8X','10X','1.6X','7X','50X','2X','63X','65X','30X','40X','42X','60X','6X','35X','4.2X','3.1X','18X','3.6X','3.3X','9X','83X','25X','24X','2.9X','0.7X','20X','7.8X','5.8X','0.5X','12X','28X','Other');
            if($optical_zoom){ foreach($optical_zoom as $val){
                        $selected = '';
                        if($edit->optical_zoom == $val){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row memory">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control memory" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="m_brand" >
                       <option value="">Select Brand</option>
                        <?php $m_brand = getBrands('M'); 
            if($m_brand){ foreach($m_brand as $val){
                        $selected = '';
                        if($edit->brand == $val->name){
                        $selected = 'selected';
                        }
                        ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control memory" data-plugin="select2" data-placeholder="Choose Card Type" data-allow-clear="true" name="category_type" id="m_category_type" >
                        <option value="">Select Card Type</option>
                        <?php $card_type = array('Compact Flash Cards','Memory Sticks','Micro Sd Cards','Micro Sd Extended Capacity','Micro Sd High Capacity Cards','Mini Sd Cards','Mini Sd High Capacity Cards','Multimedia Cards','Secure Digital Cards','Secure Digital Extended Capacity','Secure Digital High Capacity Cards');
foreach ($card_type as $val) { 
                      $selected = '';
                      if($edit->category_type == $val){
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
                        <select class="form-control memory" data-plugin="select2" data-placeholder="Choose Compatible with" data-allow-clear="true" name="compatible" id="m_compatible" >
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
            if($compatible){ foreach ($compatible as $val) {
                      $selected = '';
                      if($edit->compatible == $val->name){
                      $selected = 'selected';
                      }
                      ?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row memory">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control memory" data-plugin="select2" data-placeholder="Choose Storage" data-allow-clear="true" name="storage" id="storage" >
                          <option value="">Select Storage</option>
                        <?php $storage = array('Less Than 512 Mb','512 Mb','1 Gb','2 Gb','4 Gb','8 Gb','16 Gb','28 GB','32 Gb','64 Gb','128 Gb','256 Gb','512 GB','1 TB','Other');
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
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="contact" id="contact" value="<?php if($edit->mobile) echo $edit->mobile;  ?>"/>
                        <label class="floating-label">Contact Number</label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <input type="text" class="form-control" name="email" id="email" value="<?php if($edit->email) echo $edit->email;  ?>"/>
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
                    <button type="button" class="btn btn-danger ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" name="cancel" value="cancel" onClick="window.location.href='admin/electronics';">Cancel</button>
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
    category();
    });
    category();
    function category(){
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
    };

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