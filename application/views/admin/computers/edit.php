<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">
<!-- Page -->
<div class="page">
  <div class="page-header">
    <h1 class="page-title">Computers</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/real_estate">Computers</a></li>
      <li class="breadcrumb-item active">Edit Computers</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Edit Computers</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                <form class="form-signin cv-form" action="admin/updateComputers" enctype="multipart/form-data" method="post" name="posts_form" id="posts_form">
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
                       <?php $category = getComputersCategories(); if($category){ foreach($category as $val){  
                      $selected = '';
                      if($edit->category == $val->id){
                        $selected = 'selected';
                      }?>
                        <option value="<?php echo $val->id ?>" <?php echo $selected; ?>><?php echo $val->category; ?></option>
                        <?php }} ?>
                      </select>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control" data-plugin="select2" data-placeholder="Choose Sub Category" data-allow-clear="true" name="subcategory" id="subcategory">
                        <option value="">Select Sub Category</option>
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
                  </div>
                  <div class="row">
                    <div class="col-md-4 used">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control used" data-plugin="select2" data-placeholder="Choose Age" data-allow-clear="true" name="age" id="age" >
                         <option value="">Select Age</option>
                        <?php $age = array('Brand New','0-1 month','1-6 months','6-12 months','1-2 years','2-5 years','5-10 years','10+ years');
                        foreach ($age as $val) {
                        $selected = '';
              if($edit->age == $val){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 used">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control used" data-plugin="select2" data-placeholder="Choose Usage" data-allow-clear="true" name="usage" id="usage" >
                        <option value="">Select Usage</option>
                        <?php $usage = array('Still in original packaging','Out of original packaging, but only used once','Used only a few times','Used an average amount, as frequently as would be expected','Used an above average amount since purchased');
foreach ($usage as $val) { 
              $selected = '';
              if($edit->usage == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 used">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control used" data-plugin="select2" data-placeholder="Choose Condition" data-allow-clear="true" name="condition" id="condition" >
                       <option value="">Select Condition</option>
                        <?php $condition = array('Perfect inside and out','Almost no noticeable problems or flaws','A bit of wear and tear, but in good working condition','Normal wear and tear for the age of the item, a few problems here and there','Above average wear and tear.  The item may need a bit of repair to work properly');
foreach ($condition as $val) { 
              $selected = '';
              if($edit->condition == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row new">
                    <div class="col-md-4 new">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control new" data-plugin="select2" data-placeholder="Choose Warranty" data-allow-clear="true" name="brand" id="tv_brand" >
                        <option value="">Select Warranty</option>
                        <?php $warranty = array('Yes','No','Does not apply');
foreach ($warranty as $val) { 
              $selected = '';
              if($edit->warranty == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row hard">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control hard" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="hd_brand" >
                         <option value="">Select Brand</option>
                        <?php $hd_brand = getBrands('HD'); 
            if($hd_brand){ foreach($hd_brand as $val){
              $selected = '';
              if($edit->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 hard">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control hard" data-plugin="select2" data-placeholder="Choose Storage Device Type" data-allow-clear="true" name="category_type" id="hd_category_type" >
                       <option value="">Select Storage Device Type</option>
                        <?php $card_type = array('External','Internal','Internal Laptop','Internal PC','Internal Xbox','Multi','Nas Box','Server');
foreach ($card_type as $val) { 
              $selected = '';
              if($edit->category_type == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 hard">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control hard" data-plugin="select2" data-placeholder="Choose Storage Capacity" data-allow-clear="true" name="storage" id="hd_storage" >
                      <option value="">Select Storage Capacity</option>
                        <?php $storage = array('1 Tb','1.2 Tb','1.5 Tb','2 Tb','3 Tb','4 Tb','5 Tb','6 Tb','8 Tb','10 Tb','12 Tb','16 Tb','20 GB','48 Tb','60 GB','64 GB','120 Tb','120 GB','128 GB','146 GB','180 GB','200 GB','240 GB','250 GB','256 GB','275 GB','300 GB','320 GB','480 GB','500 GB','512 GB','525 GB','600 GB','640 GB','750 GB','900 GB','960 GB');
foreach ($storage as $val) { 
              $selected = '';
              if($edit->storage == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                <div class="row headsets">
                  <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control headsets" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="h_brand" >
                        <option value="">Select Brand</option>
                        <?php $cbrand = getBrands('H'); 
            if($cbrand){ foreach($cbrand as $val){
              $selected = '';
              if($edit->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                  </div>
                  <div class="col-md-4 headsets">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control headsets" data-plugin="select2" data-placeholder="Choose Type" data-allow-clear="true" name="category_type" id="h_category_type" >
                       <option value="">Select Type</option>
                        <?php $h_type = array('Convertible','Earphones','Handset','Headband','Headphone & Headset Accessories','In Ear','Neckband','On Ear','Over Ear');
            if($h_type){ foreach ($h_type as $val) { 
              $selected = '';
              if($edit->category_type == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } }?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                  </div>
                  <div class="col-md-4 headsets">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control headsets" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="h_color" >
                      <option value="">Select Color</option>
                        <?php $color = getColors(); 
            if($color){ foreach($color as $val){
              $selected = '';
              if($edit->color == $val->name){
                $selected = 'selected';
              }?>
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
              }?>
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
                    <div class="col-md-4 memory">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control memory" data-plugin="select2" data-placeholder="Choose Compatible with" data-allow-clear="true" name="category_type" id="m_category_type" >
                        <option value="">Select Card Type</option>
                        <?php $card_type = array('Compact Flash Cards','Memory Sticks','Micro Sd Cards','Micro Sd Extended Capacity','Micro Sd High Capacity Cards','Mini Sd Cards','Mini Sd High Capacity Cards','Multimedia Cards','Secure Digital Cards','Secure Digital Extended Capacity','Secure Digital High Capacity Cards');
                        foreach ($card_type as $val) { 
                         $selected = '';
              if($edit->category_type == $val){
                $selected = 'selected';
              }
                        ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                          </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 memory">
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
                        <select class="form-control memory" data-plugin="select2" data-placeholder="Choose Storage" data-allow-clear="true" name="storage" id="m_storage" >
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
                  <div class="row keyboard">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control keyboard" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="k_brand" >
                        <option value="">Select Brand</option>
                        <?php $k_brand = getBrands('K'); 
                        if($k_brand){ foreach($k_brand as $val){
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
                    <div class="col-md-4 keyboard">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control keyboard" data-plugin="select2" data-placeholder="Choose Connectivity" data-allow-clear="true" name="connectivity" id="k_connectivity" >
                         <option value="">Select Connectivity</option>
                          <?php $connectivity = array('Wireless','Usb','Unavailable','Bluetooth','PS/2');
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
                    <div class="col-md-4 keyboard">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control keyboard" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="k_color" >
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
                   <div class="row keyboard">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control keyboard" data-plugin="select2" data-placeholder="Choose Compatible with" data-allow-clear="true" name="compatible" id="k_compatible" >
                          <option value="">Select Compatible with</option>
                          <?php $compatible = getCompatible();
              if($compatible){ foreach ($compatible as $val) { 
                $selected = '';
              if($edit->compatible == $val->name){
                $selected = 'selected';
              }?>
                          <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                          <?php } }?>
                        </select>
                          <label class="floating-label"></label>
                      </div>
                    </div>
                 </div>
                 <div class="row mouse">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control mouse" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="mo_brand" >
                         <option value="">Select Brand</option>
                        <?php $mo_brand = getBrands('MO'); 
            if($mo_brand){ foreach($mo_brand as $val){
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
                    <div class="col-md-4 mouse">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control mouse" data-plugin="select2" data-placeholder="Choose Type" data-allow-clear="true" name="category_type" id="mo_category_type" >
                         <option value="">Select Type</option>
                        <?php $mo_category_type = array('Gaming Mouse','Gaming Mouse For Esports','Gstick Mouse','Laser Mouse','Mechanical Mouse','Optical Mouse','Trackball Mouse','Vertical Mouse','3D Mouse','6D Gaming Mouse','6D Gaming Mouse 3200DPI Resolution','6D - Gaming Mouse 3200 Dpi Resolution');
            if($mo_category_type){ foreach ($mo_category_type as $val) {
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
                    <div class="col-md-4 charger">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control charger" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="mo_color" >
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
                  <div class="row mouse">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control mouse" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="compatible" id="mo_compatible" >
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
                    <div class="col-md-4 mouse">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control mouse" data-plugin="select2" data-placeholder="Choose Connectivity" data-allow-clear="true" name="connectivity" id="mo_connectivity" >
                         <option value="">Select Connectivity</option>
                        <?php $connectivity = array('Usb','Wireless','Bluetooth','Wired & Wireless','Bluetooth 4.0, 4.1','PS/2','Wireless & Wired','Wired');
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
                    <div class="col-md-4 speakers">
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
                    <div class="col-md-4 speakers">
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
                    <div class="col-md-4 speakers">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control speakers" data-plugin="select2" data-placeholder="Choose Connectivity" data-allow-clear="true" name="connectivity" id="s_connectivity" >
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
                <div class="row usb">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control usb" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="u_brand" >
                         <option value="">Select Brand</option>
                        <?php $u_brand = getBrands('M'); 
            if($u_brand){ foreach($m_brand as $val){
              $selected = '';
              if($edit->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 usb">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control usb" data-plugin="select2" data-placeholder="Choose Storage" data-allow-clear="true" name="storage" id="u_storage" >
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
                  <div class="row desktop">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control desktop" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="d_brand" >
                         <option value="">Select Brand</option>
                        <?php $d_brand = getBrands('D'); 
            if($d_brand){ foreach($d_brand as $val){
              $selected = '';
              if($edit->brand == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 desktop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control desktop" data-plugin="select2" data-placeholder="Choose Type" data-allow-clear="true" name="category_type" id="d_category_type" >
                        <option value="">Select Type</option>
                        <?php $d_category_type = array('All-in-one','All In One','Desktop Computer','Keyboard Computer','Micro Computer','Mini Computer','Mirco Computer','Tower Computer');
            if($d_category_type){ foreach ($d_category_type as $val) {
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
                    <div class="col-md-4 desktop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control desktop" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="d_color" >
                         <option value="">Select Color</option>
                        <?php $color = getColors(); 
            if($color){ foreach($color as $val){
              $selected = '';
              if($edit->color == $val->name){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val->name; ?>" <?php echo $selected; ?>><?php echo $val->name; ?></option>
                        <?php }} ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row desktop">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control desktop" data-plugin="select2" data-placeholder="Choose Memory Size" data-allow-clear="true" name="memory" id="dsk_memory" >
                        <option value="">Select Memory Size</option>
                        <?php $memory = array('512 Mb','1 Gb','2 Gb','4 Gb','6 Gb','8 Gb','12 Gb','16 Gb','32 Gb','64 Gb','128 Gb','224 Gb','500 Gb','1000 Gb','Other');
foreach ($memory as $val) {
$selected = '';
              if($edit->memory == $val){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 desktop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control desktop" data-plugin="select2" data-placeholder="Choose Memory Size" data-allow-clear="true" name="operating_system" id="d_operating_system" >
                        <option value="">Select Operating System</option>
                        <?php $operating_system = array('Android','Dos','Linux','Mac Os Sierra','Mac Os X 10.10 Yosemite','Freedos','Mac Os X 10.11 El Capitan','Mac Os X 10.8 Mountain Lion','Mac Os X Mavericks','Microsoft Windows 10','Microsoft Windows 10 Enterprise','Microsoft Windows 10 Home','Microsoft Windows 10 Pro','Microsoft Windows 7','Microsoft Windows 7 Professional','Microsoft Windows 8','Microsoft Windows 8.1','Microsoft Windows Xp, Vista');
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
                    <div class="col-md-4 desktop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control desktop" data-plugin="select2" data-placeholder="Choose Processor Family" data-allow-clear="true" name="processor" id="d_processor" >
                        <option value="">Select Processor Family</option>
                        <?php $processor = array('Intel Xeon','Intel Quad Core','Intel Pentium Dual Core','Intel Dual Core','Intel Core I7','Intel Core I5','Intel Core I3','Intel Core 2 Duo','Intel Celeron Dual Core','Intel Celeron','Intel Atom','AMD Fx-series','AMD E-series','AMD A-series');
foreach ($processor as $val) {
$selected = '';
              if($edit->processor == $val){
                $selected = 'selected';
              } ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="row desktop">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control desktop" data-plugin="select2" data-placeholder="Choose Graphics Card Capacity" data-allow-clear="true" name="graphics" id="d_graphics" >
                       <option value="">Select Graphics Card Capacity</option>
                        <?php $graphics = array('Shared - Built In','2 GB','8 GB','4 GB','6 GB','Radeon Pro 580 With 8GB Video Memory','Intel HD Graphics 520','Intel HD Graphics','512 Mb','11 GB');
foreach ($graphics as $val) { 
  $selected = '';
              if($edit->graphics == $val){
                $selected = 'selected';
              }?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 desktop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control desktop" data-plugin="select2" data-placeholder="Choose Hard Disk Capacity" data-allow-clear="true" name="storage" id="dsk_storage" >
                       <option value="">Select Hard Disk Capacity</option>
                        <?php $storage = array('1 Tb','1.2 Tb','1.5 Tb','2 Tb','3 Tb','4 Tb','5 Tb','6 Tb','8 Tb','10 Tb','12 Tb','16 Tb','20 GB','48 Tb','60 GB','64 GB','120 Tb','120 GB','128 GB','146 GB','180 GB','200 GB','240 GB','250 GB','256 GB','275 GB','300 GB','320 GB','480 GB','500 GB','512 GB','525 GB','600 GB','640 GB','750 GB','900 GB','960 GB');
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
                  <div class="row monitor">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control monitor" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="mt_brand" >
                       <option value="">Select Brand</option>
                        <?php $mt_brand = getBrands('MT'); 
            if($mt_brand){ foreach($mt_brand as $val){
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
                    <div class="col-md-4 monitor">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control monitor" data-plugin="select2" data-placeholder="Choose Monitor Type" data-allow-clear="true" name="category_type" id="mt_category_type" >
                        <option value="">Select Monitor Type</option>
                        <?php $mt_category_type = array('Led','Lcd','Curved','Uhd','Lcd Touchscreen','Wxga','Fhd');
foreach ($mt_category_type as $val) { 
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
                    <div class="col-md-4 monitor">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control monitor" data-plugin="select2" data-placeholder="Choose Screen Size" data-allow-clear="true" name="screen_size" id="mt_screen_size" >
                         <option value="">Select Screen Size</option>
                        <?php $screen_size = array('5 Inch','14 Inch','15 Inch','15.6 Inch','17 Inch','18.5 Inch','19 Inch','19.5 Inch','20 Inch','21 Inch','21.5 Inch','22 Inch','23 Inch','23.5 Inch','23.6 Inch','23.8 Inch','24 Inch','24.5 Inch','25 Inch','25.5 Inch','27 Inch','28 Inch','29 Inch','31.5 Inch','32 Inch','34 Inch','35 Inch','38 Inch','43 Inch','49 Inch');
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
                  </div>
                  <div class="row laptop">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control laptop" data-plugin="select2" data-placeholder="Choose Brand" data-allow-clear="true" name="brand" id="l_brand" >
                        <option value="">Select Brand</option>
                        <?php $l_brand = getBrands('L'); 
            if($l_brand){ foreach($l_brand as $val){
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
                    <div class="col-md-4 laptop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control laptop" data-plugin="select2" data-placeholder="Choose Type" data-allow-clear="true" name="category_type" id="l_category_type" >
                        <option value="">Select Type</option>
                        <?php $l_category_type = array('Laptop','Macbook Air','Mobile Workstation','Netbook','Notebook','Ultrabook','2 In 1');
            if($l_category_type){ foreach ($l_category_type as $val) { 
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
                    <div class="col-md-4 laptop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control laptop" data-plugin="select2" data-placeholder="Choose Screen Size" data-allow-clear="true" name="screen_size" id="l_screen_size" >
                         <option value="">Select Screen Size</option>
                        <?php $screen_size = array('Less Than 10 Inch','10 - 10.9 Inch','11 - 11.9 Inch','12 - 12.9 Inch','13 - 13.9 Inch','14 - 14.9 Inch','15 - 15.9 Inch','15.6 Inch','16 - 16.9 Inch','17 - 17.9 Inch','18 - 18.9 Inch','19 - 19.9 Inch','20 Inch & Above');
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
                  </div>
                  <div class="row laptop">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control laptop" data-plugin="select2" data-placeholder="Choose Color" data-allow-clear="true" name="color" id="l_color" >
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
                    <div class="col-md-4 laptop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control laptop" data-plugin="select2" data-placeholder="Choose Memory Size" data-allow-clear="true" name="memory" id="d_memory" >
                        <option value="">Select Memory Size</option>
                        <?php $memory = array('512 Mb','1 Gb','2 Gb','4 Gb','6 Gb','8 Gb','12 Gb','16 Gb','32 Gb','64 Gb','128 Gb','Other');
foreach ($memory as $val) { 
$selected = '';
              if($edit->memory == $val){
                $selected = 'selected';
              }
  ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 laptop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control laptop" data-plugin="select2" data-placeholder="Choose Operating System" data-allow-clear="true" name="operating_system" id="l_operating_system" >
                         <option value="">Select Operating System</option>
                        <?php $operating_system = array('Android','Chrome','Ubuntu','Dos','Linux','Mac Os Sierra','Mac Os X 10.10 Yosemite','Freedos','Mac Os X 10.11 El Capitan','Mac Os X 10.8 Mountain Lion','Mac Os X Mavericks','Microsoft Windows 10','Microsoft Windows 10 Enterprise','Microsoft Windows 10 Home','Microsoft Windows 10 Pro','Microsoft Windows 7','Microsoft Windows 7 Professional','Microsoft Windows 8','Microsoft Windows 8.1','Microsoft Windows Xp, Vista');
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
                  <div class="row laptop">
                    <div class="col-md-4">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control laptop" data-plugin="select2" data-placeholder="Choose Processor Family" data-allow-clear="true" name="processor" id="l_processor" >
                         <option value="">Select Processor Family</option>
                        <?php $processor = array('Intel Quad Core','Intel Pentium N4200','Intel Pentium Dual Core','Intel Pentium 4','Intel Pentium 3','Intel Pentium','Intel Kaby Lake Core I7','Intel Core M5','Intel Core M3','Intel Core M','Intel Core I7','Intel Core I5','Intel Core I3','Intel Cherrytrail','Intel Celeron','Intel Atom','Cherrytrail','AMD Quad Core','AMD E Series','AMD Dual Core','AMD Athlon 64 Fx','AMD A6 Series','AMD A6-9220','AMD A4 Series','AMD A10 Series');
foreach ($processor as $val) { 
$selected = '';
              if($edit->processor == $val){
                $selected = 'selected';
              }
  ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 laptop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control laptop" data-plugin="select2" data-placeholder="Choose Graphics Card Capacity" data-allow-clear="true" name="graphics" id="l_graphics" >
                         <option value="">Select Graphics Card Capacity</option>
                        <?php $graphics = array('Shared - Built In','2 GB','8 GB','4 GB','6 GB','12 GB','16 GB','Intel HD Graphics','512 Mb','11 GB');
foreach ($graphics as $val) { 
 $selected = '';
              if($edit->graphics == $val){
                $selected = 'selected';
              }
  ?>
                        <option value="<?php echo $val; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                        <?php } ?>
                        </select>
                        <label class="floating-label"></label>
                      </div>
                    </div>
                    <div class="col-md-4 laptop">
                      <div class="form-group form-material floating" data-plugin="formMaterial">
                        <select class="form-control laptop" data-plugin="select2" data-placeholder="Choose Hard Disk Capacity" data-allow-clear="true" name="storage" id="d_storage" >
                         <option value="">Select Hard Disk Capacity</option>
                        <?php $storage = array('1 Tb','1.2 Tb','1.5 Tb','2 Tb','3 Tb','4 Tb','5 Tb','6 Tb','8 Tb','10 Tb','12 Tb','16 Tb','20 GB','48 Tb','60 GB','64 GB','120 Tb','120 GB','128 GB','146 GB','180 GB','200 GB','240 GB','250 GB','256 GB','275 GB','300 GB','320 GB','480 GB','500 GB','512 GB','525 GB','600 GB','640 GB','750 GB','900 GB','960 GB');
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
                        <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $edit->mobile; ?>" />
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
        latitude: {
                validators: {
                    notEmpty: {
                        warranty: 'latitude is required'
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

    $('.new').hide();
    $('.hard').hide();
    $('.memory').hide();
    $('.headsets').hide();
    $('.keyboard').hide();
    $('.mouse').hide();
    $('.speakers').hide();
    $('.usb').hide();
    $('.desktop').hide();
    $('.monitor').hide();
    $('.laptop').hide();
    if($('#category').val() != '' || $('#category').val() != 0){
         if ($('#category').val() == 6) {
            $('.laptop').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .usb, .speakers, .desktop, .monitor").prop('disabled', true);
            $(".laptop").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
        } else {
            $('.memory').hide();
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        }
        $.ajax({
            'url': '<?php echo base_url(); ?>get_computers_subcategory/' +$('#category').val()+'/<?php if($edit->subcategory) echo $edit->subcategory; else echo 0; ?>',
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
        if ($('#subcategory').val() == 13) {
            $('.hard').fadeIn('slow');
            $(".headsets, .memory, .keyboard, .mouse, .speakers, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".hard").prop('disabled', false);
            $('.memory').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 14) {
            $('.headsets').fadeIn('slow');
            $(".hard, .memory, .keyboard, .mouse, .speakers, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".headsets").prop('disabled', false);
            $('.hard').hide();
            $('.memory').hide();
            $('.keyboard').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 15) {
            $('.keyboard').fadeIn('slow');
            $(".headsets, .hard, .memory, .mouse, .speakers, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".keyboard").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 16) {
            $('.memory').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .mouse, .speakers, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".memory").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 19) {
            $('.mouse').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .speakers, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".mouse").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 21) {
            $('.speakers').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".speakers").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 22) {
            $('.usb').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .speakers, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".usb").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 24) {
            $('.desktop').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .usb, .speakers, .monitor, .laptop").prop('disabled', true);
            $(".desktop").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 27) {
            $('.monitor').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .usb, .speakers, .desktop, .laptop").prop('disabled', true);
            $(".monitor").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.laptop').hide();
        } else if ($('#category').val() == 6) {
            $('.laptop').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .usb, .speakers, .desktop, .monitor").prop('disabled', true);
            $(".laptop").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
        } else {
            $('.memory').hide();
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
            $(".headsets, .hard, .memory, .keyboard, .mouse, .usb, .speakers, .desktop, .monitor, .laptop").prop('disabled', true);
        }
    }



    $('#category').change(function(e) {
        if ($('#category').val() == 6) {
            $('.laptop').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .usb, .speakers, .desktop, .monitor").prop('disabled', true);
            $(".laptop").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
        } else {
            $('.memory').hide();
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        }
        $.ajax({
            'url': '<?php echo base_url(); ?>get_computers_subcategory/' + this.value,
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
        if ($('#subcategory').val() == 13) {
            $('.hard').fadeIn('slow');
            $(".headsets, .memory, .keyboard, .mouse, .speakers, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".hard").prop('disabled', false);
            $('.memory').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 14) {
            $('.headsets').fadeIn('slow');
            $(".hard, .memory, .keyboard, .mouse, .speakers, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".headsets").prop('disabled', false);
            $('.hard').hide();
            $('.memory').hide();
            $('.keyboard').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 15) {
            $('.keyboard').fadeIn('slow');
            $(".headsets, .hard, .memory, .mouse, .speakers, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".keyboard").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 16) {
            $('.memory').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .mouse, .speakers, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".memory").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 19) {
            $('.mouse').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .speakers, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".mouse").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 21) {
            $('.speakers').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .usb, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".speakers").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 22) {
            $('.usb').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .speakers, .desktop, .monitor, .laptop").prop('disabled', true);
            $(".usb").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 24) {
            $('.desktop').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .usb, .speakers, .monitor, .laptop").prop('disabled', true);
            $(".desktop").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.monitor').hide();
            $('.laptop').hide();
        } else if ($('#subcategory').val() == 27) {
            $('.monitor').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .usb, .speakers, .desktop, .laptop").prop('disabled', true);
            $(".monitor").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.laptop').hide();
        } else if ($('#category').val() == 6) {
            $('.laptop').fadeIn('slow');
            $(".headsets, .hard, .keyboard, .memory, .mouse, .usb, .speakers, .desktop, .monitor").prop('disabled', true);
            $(".laptop").prop('disabled', false);
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.memory').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
        } else {
            $('.memory').hide();
            $('.hard').hide();
            $('.headsets').hide();
            $('.keyboard').hide();
            $('.mouse').hide();
            $('.speakers').hide();
            $('.usb').hide();
            $('.desktop').hide();
            $('.monitor').hide();
            $('.laptop').hide();
            $(".headsets, .hard, .memory, .keyboard, .mouse, .usb, .speakers, .desktop, .monitor, .laptop").prop('disabled', true);
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
function getCity(country,location){
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