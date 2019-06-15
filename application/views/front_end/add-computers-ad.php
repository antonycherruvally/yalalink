<?php $this->load->view('blocks/header'); 
$userdata = $this->session->userdata('logged_yalalink_userdata'); ?>
<link rel="stylesheet" type="text/css" href="assets/front_end/css/bootstrap-duallistbox.css">

<div class="full-wrap bg-ad">
  <div class="container">
    <div class="row" style="margin-top: 50px;border: 1px solid #4fc3c533;margin-bottom: 15px;padding: 18px;">
      <div class="col-md-12">
        <div class="post-ad-wrap">
          <h3 style="color:black;"> Posting Your Computers Ad </h3>
            
              <form class="m-t-15" action="insertComputers" enctype="multipart/form-data" method="post" name="post-form" id="post-form">
                <input type="hidden" name="main_category" value="<?php echo $this->input->get('category'); ?>">
                <div class="row">
                  <div class="col-md-6">
                    <label class="form-check-label mat-label-color" for="type">Choose Type:</label>
                    
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type" value="New">
                        New </label>
                      <label class="radio-inline">
                        <input type="radio" name="type" id="type1" value="Used" checked>
                        Used </label>
                  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label for="title_en" class="bmd-label-floating">Title in English:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="title_en" id="title_en">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group bmd-form-group">
                      <label for="title_ar" class="bmd-label-floating">Title in Arabic:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="title_ar" id="title_ar">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="category" class="bmd-label-floating mat-label-color">Choose Category:</label>
                      <select class="form-control" name="category" id="category">
                        <option value="">Select Category</option>
                        <?php $category = getComputersCategories(); if($category){ foreach($category as $val){  
						$selected = '';
						if($this->input->get('subcategory') == $val->category){
							$selected = 'selected';
						}?>
                        <option value="<?php echo $val->id ?>" <?php echo $selected; ?>><?php echo $val->category; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="subcategory" class="bmd-label-floating mat-label-color subcategory">Choose Sub Category:</label>
                      <select class="form-control" name="subcategory" id="subcategory">
                        <option value="">Select Category</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Price:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" name="price" id="price">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3 used">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="age" class="bmd-label-floating mat-label-color">Choose Age:</label>
                      <select class="form-control" name="age" id="age">
                        <option value="">Select Age</option>
                        <?php $age = array('Brand New','0-1 month','1-6 months','6-12 months','1-2 years','2-5 years','5-10 years','10+ years');
foreach ($age as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
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
foreach ($usage as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
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
foreach ($condition as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
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
foreach ($warranty as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row hard">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="hd_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control hard" name="brand" id="hd_brand">
                        <option value="">Select Brand</option>
                        <?php $hd_brand = getBrands('HD'); 
						if($hd_brand){ foreach($hd_brand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="hd_category_type" class="bmd-label-floating mat-label-color">Choose Storage Device Type:</label>
                      <select class="form-control hard" name="category_type" id="hd_category_type">
                        <option value="">Select Storage Device Type</option>
                        <?php $card_type = array('External','Internal','Internal Laptop','Internal PC','Internal Xbox','Multi','Nas Box','Server');
foreach ($card_type as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="hd_storage" class="bmd-label-floating mat-label-color">Choose Storage Capacity:</label>
                      <select class="form-control hard" name="storage" id="hd_storage">
                        <option value="">Select Storage Capacity</option>
                        <?php $storage = array('1 Tb','1.2 Tb','1.5 Tb','2 Tb','3 Tb','4 Tb','5 Tb','6 Tb','8 Tb','10 Tb','12 Tb','16 Tb','20 GB','48 Tb','60 GB','64 GB','120 Tb','120 GB','128 GB','146 GB','180 GB','200 GB','240 GB','250 GB','256 GB','275 GB','300 GB','320 GB','480 GB','500 GB','512 GB','525 GB','600 GB','640 GB','750 GB','900 GB','960 GB');
foreach ($storage as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
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
						if($cbrand){ foreach($cbrand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
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
						if($h_type){ foreach ($h_type as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
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
						if($color){ foreach($color as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
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
						if($compatible){ foreach ($compatible as $val) { ?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php } }?>
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
						if($m_brand){ foreach($m_brand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
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
foreach ($card_type as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
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
						if($compatible){ foreach ($compatible as $val) { ?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="m_storage" class="bmd-label-floating mat-label-color">Choose Storage:</label>
                      <select class="form-control memory" name="storage" id="m_storage">
                        <option value="">Select Storage</option>
                        <?php $storage = array('Less Than 512 Mb','512 Mb','1 Gb','2 Gb','4 Gb','8 Gb','16 Gb','28 GB','32 Gb','64 Gb','128 Gb','256 Gb','512 GB','1 TB','Other');
foreach ($storage as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row keyboard">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="k_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control keyboard" name="brand" id="k_brand">
                        <option value="">Select Brand</option>
                        <?php $k_brand = getBrands('K'); 
						if($k_brand){ foreach($k_brand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="k_connectivity" class="bmd-label-floating mat-label-color">Choose Connectivity:</label>
                      <select class="form-control keyboard" name="connectivity" id="k_connectivity">
                        <option value="">Select Connectivity</option>
                        <?php $connectivity = array('Wireless','Usb','Unavailable','Bluetooth','PS/2');
						if($connectivity){ foreach ($connectivity as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="k_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control keyboard" name="color" id="k_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="k_compatible" class="bmd-label-floating mat-label-color">Choose Compatible with:</label>
                      <select class="form-control keyboard" name="compatible" id="k_compatible">
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
						if($compatible){ foreach ($compatible as $val) { ?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mouse">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="mo_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control mouse" name="brand" id="mo_brand">
                        <option value="">Select Brand</option>
                        <?php $mo_brand = getBrands('MO'); 
						if($mo_brand){ foreach($mo_brand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="mo_category_type" class="bmd-label-floating mat-label-color">Choose Type:</label>
                      <select class="form-control mouse" name="category_type" id="mo_category_type">
                        <option value="">Select Type</option>
                        <?php $mo_category_type = array('Gaming Mouse','Gaming Mouse For Esports','Gstick Mouse','Laser Mouse','Mechanical Mouse','Optical Mouse','Trackball Mouse','Vertical Mouse','3D Mouse','6D Gaming Mouse','6D Gaming Mouse 3200DPI Resolution','6D - Gaming Mouse 3200 Dpi Resolution');
						if($mo_category_type){ foreach ($mo_category_type as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="mo_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control mouse" name="color" id="mo_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="mo_compatible" class="bmd-label-floating mat-label-color">Choose Compatible with:</label>
                      <select class="form-control mouse" name="compatible" id="mo_compatible">
                        <option value="">Select Compatible with</option>
                        <?php $compatible = getCompatible();
						if($compatible){ foreach ($compatible as $val) { ?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mouse">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="mo_connectivity" class="bmd-label-floating mat-label-color">Choose Connectivity:</label>
                      <select class="form-control mouse" name="connectivity" id="mo_connectivity">
                        <option value="">Select Connectivity</option>
                        <?php $connectivity = array('Usb','Wireless','Bluetooth','Wired & Wireless','Bluetooth 4.0, 4.1','PS/2','Wireless & Wired','Wired');
						if($connectivity){ foreach ($connectivity as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
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
						if($s_brand){ foreach($s_brand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
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
						if($s_type){ foreach ($s_type as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
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
						if($color){ foreach($color as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
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
						if($compatible){ foreach ($compatible as $val) { ?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row speakers">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="s_connectivity" class="bmd-label-floating mat-label-color">Choose Connectivity:</label>
                      <select class="form-control speakers" name="connectivity" id="s_connectivity">
                        <option value="">Select Connectivity</option>
                        <?php $connectivity = array('Wireless','Wired','Wired/wireless','Bluetooth','Wired & Wireless');
						if($connectivity){ foreach ($connectivity as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row usb">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="u_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control usb" name="brand" id="u_brand">
                        <option value="">Select Brand</option>
                        <?php $u_brand = getBrands('M'); 
						if($u_brand){ foreach($m_brand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="u_storage" class="bmd-label-floating mat-label-color">Choose Storage:</label>
                      <select class="form-control usb" name="storage" id="u_storage">
                        <option value="">Select Storage</option>
                        <?php $storage = array('Less Than 512 Mb','512 Mb','1 Gb','2 Gb','4 Gb','8 Gb','16 Gb','28 GB','32 Gb','64 Gb','128 Gb','256 Gb','512 GB','1 TB','Other');
foreach ($storage as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row desktop">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="d_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control desktop" name="brand" id="d_brand">
                        <option value="">Select Brand</option>
                        <?php $d_brand = getBrands('D'); 
						if($d_brand){ foreach($d_brand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="d_category_type" class="bmd-label-floating mat-label-color">Choose Type:</label>
                      <select class="form-control desktop" name="category_type" id="d_category_type">
                        <option value="">Select Type</option>
                        <?php $d_category_type = array('All-in-one','All In One','Desktop Computer','Keyboard Computer','Micro Computer','Mini Computer','Mirco Computer','Tower Computer');
						if($d_category_type){ foreach ($d_category_type as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="d_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control desktop" name="color" id="d_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="dsk_memory" class="bmd-label-floating mat-label-color">Choose Memory Size:</label>
                      <select class="form-control desktop" name="memory" id="dsk_memory">
                        <option value="">Select Memory Size</option>
                        <?php $memory = array('512 Mb','1 Gb','2 Gb','4 Gb','6 Gb','8 Gb','12 Gb','16 Gb','32 Gb','64 Gb','128 Gb','Other');
foreach ($memory as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row desktop">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="d_operating_system" class="bmd-label-floating mat-label-color">Choose Operating System:</label>
                      <select class="form-control desktop" name="operating_system" id="d_operating_system">
                        <option value="">Select Operating System</option>
                        <?php $operating_system = array('Android','Dos','Linux','Mac Os Sierra','Mac Os X 10.10 Yosemite','Freedos','Mac Os X 10.11 El Capitan','Mac Os X 10.8 Mountain Lion','Mac Os X Mavericks','Microsoft Windows 10','Microsoft Windows 10 Enterprise','Microsoft Windows 10 Home','Microsoft Windows 10 Pro','Microsoft Windows 7','Microsoft Windows 7 Professional','Microsoft Windows 8','Microsoft Windows 8.1','Microsoft Windows Xp, Vista');
foreach ($operating_system as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="d_processor" class="bmd-label-floating mat-label-color">Choose Processor Family:</label>
                      <select class="form-control desktop" name="processor" id="d_processor">
                        <option value="">Select Processor Family</option>
                        <?php $processor = array('Intel Xeon','Intel Quad Core','Intel Pentium Dual Core','Intel Dual Core','Intel Core I7','Intel Core I5','Intel Core I3','Intel Core 2 Duo','Intel Celeron Dual Core','Intel Celeron','Intel Atom','AMD Fx-series','AMD E-series','AMD A-series');
foreach ($processor as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="d_graphics" class="bmd-label-floating mat-label-color">Choose Graphics Card Capacity:</label>
                      <select class="form-control desktop" name="graphics" id="d_graphics">
                        <option value="">Select Graphics Card Capacity</option>
                        <?php $graphics = array('Shared - Built In','2 GB','8 GB','4 GB','6 GB','Radeon Pro 580 With 8GB Video Memory','Intel HD Graphics 520','Intel HD Graphics','512 Mb','11 GB');
foreach ($graphics as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="dsk_storage" class="bmd-label-floating mat-label-color">Choose Hard Disk Capacity:</label>
                      <select class="form-control desktop" name="storage" id="dsk_storage">
                        <option value="">Select Hard Disk Capacity</option>
                        <?php $storage = array('1 Tb','1.2 Tb','1.5 Tb','2 Tb','3 Tb','4 Tb','5 Tb','6 Tb','8 Tb','10 Tb','12 Tb','16 Tb','20 GB','48 Tb','60 GB','64 GB','120 Tb','120 GB','128 GB','146 GB','180 GB','200 GB','240 GB','250 GB','256 GB','275 GB','300 GB','320 GB','480 GB','500 GB','512 GB','525 GB','600 GB','640 GB','750 GB','900 GB','960 GB');
foreach ($storage as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row monitor">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="mt_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control monitor" name="brand" id="mt_brand">
                        <option value="">Select Brand</option>
                        <?php $mt_brand = getBrands('MT'); 
						if($mt_brand){ foreach($mt_brand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="mt_category_type" class="bmd-label-floating mat-label-color">Choose Monitor Type:</label>
                      <select class="form-control monitor" name="category_type" id="mt_category_type">
                        <option value="">Select Monitor Type</option>
                        <?php $mt_category_type = array('Led','Lcd','Curved','Uhd','Lcd Touchscreen','Wxga','Fhd');
foreach ($mt_category_type as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="mt_screen_size" class="bmd-label-floating mat-label-color">Choose Screen Size:</label>
                      <select class="form-control monitor" name="screen_size" id="mt_screen_size">
                        <option value="">Select Screen Size</option>
                        <?php $screen_size = array('5 Inch','14 Inch','15 Inch','15.6 Inch','17 Inch','18.5 Inch','19 Inch','19.5 Inch','20 Inch','21 Inch','21.5 Inch','22 Inch','23 Inch','23.5 Inch','23.6 Inch','23.8 Inch','24 Inch','24.5 Inch','25 Inch','25.5 Inch','27 Inch','28 Inch','29 Inch','31.5 Inch','32 Inch','34 Inch','35 Inch','38 Inch','43 Inch','49 Inch');
						if($screen_size){ foreach($screen_size as $val){?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row laptop">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_brand" class="bmd-label-floating mat-label-color">Choose Brand:</label>
                      <select class="form-control laptop" name="brand" id="l_brand">
                        <option value="">Select Brand</option>
                        <?php $l_brand = getBrands('L'); 
						if($l_brand){ foreach($l_brand as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_category_type" class="bmd-label-floating mat-label-color">Choose Type:</label>
                      <select class="form-control laptop" name="category_type" id="l_category_type">
                        <option value="">Select Type</option>
                        <?php $l_category_type = array('Laptop','Macbook Air','Mobile Workstation','Netbook','Notebook','Ultrabook','2 In 1');
						if($l_category_type){ foreach ($l_category_type as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } }?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_screen_size" class="bmd-label-floating mat-label-color">Choose Screen Size:</label>
                      <select class="form-control laptop" name="screen_size" id="l_screen_size">
                        <option value="">Select Screen Size</option>
                        <?php $screen_size = array('Less Than 10 Inch','10 - 10.9 Inch','11 - 11.9 Inch','12 - 12.9 Inch','13 - 13.9 Inch','14 - 14.9 Inch','15 - 15.9 Inch','15.6 Inch','16 - 16.9 Inch','17 - 17.9 Inch','18 - 18.9 Inch','19 - 19.9 Inch','20 Inch & Above');
						if($screen_size){ foreach($screen_size as $val){?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_color" class="bmd-label-floating mat-label-color">Choose Color:</label>
                      <select class="form-control laptop" name="color" id="l_color">
                        <option value="">Select Color</option>
                        <?php $color = getColors(); 
						if($color){ foreach($color as $val){?>
                        <option value="<?php echo $val->name; ?>"><?php echo $val->name; ?></option>
                        <?php }} ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row laptop">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="d_memory" class="bmd-label-floating mat-label-color">Choose Memory Size:</label>
                      <select class="form-control laptop" name="memory" id="d_memory">
                        <option value="">Select Memory Size</option>
                        <?php $memory = array('512 Mb','1 Gb','2 Gb','4 Gb','6 Gb','8 Gb','12 Gb','16 Gb','32 Gb','64 Gb','128 Gb','Other');
foreach ($memory as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_operating_system" class="bmd-label-floating mat-label-color">Choose Operating System:</label>
                      <select class="form-control laptop" name="operating_system" id="l_operating_system">
                        <option value="">Select Operating System</option>
                        <?php $operating_system = array('Android','Chrome','Ubuntu','Dos','Linux','Mac Os Sierra','Mac Os X 10.10 Yosemite','Freedos','Mac Os X 10.11 El Capitan','Mac Os X 10.8 Mountain Lion','Mac Os X Mavericks','Microsoft Windows 10','Microsoft Windows 10 Enterprise','Microsoft Windows 10 Home','Microsoft Windows 10 Pro','Microsoft Windows 7','Microsoft Windows 7 Professional','Microsoft Windows 8','Microsoft Windows 8.1','Microsoft Windows Xp, Vista');
foreach ($operating_system as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_processor" class="bmd-label-floating mat-label-color">Choose Processor Family:</label>
                      <select class="form-control laptop" name="processor" id="l_processor">
                        <option value="">Select Processor Family</option>
                        <?php $processor = array('Intel Quad Core','Intel Pentium N4200','Intel Pentium Dual Core','Intel Pentium 4','Intel Pentium 3','Intel Pentium','Intel Kaby Lake Core I7','Intel Core M5','Intel Core M3','Intel Core M','Intel Core I7','Intel Core I5','Intel Core I3','Intel Cherrytrail','Intel Celeron','Intel Atom','Cherrytrail','AMD Quad Core','AMD E Series','AMD Dual Core','AMD Athlon 64 Fx','AMD A6 Series','AMD A6-9220','AMD A4 Series','AMD A10 Series');
foreach ($processor as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="l_graphics" class="bmd-label-floating mat-label-color">Choose Graphics Card Capacity:</label>
                      <select class="form-control laptop" name="graphics" id="l_graphics">
                        <option value="">Select Graphics Card Capacity</option>
                        <?php $graphics = array('Shared - Built In','2 GB','8 GB','4 GB','6 GB','12 GB','16 GB','Intel HD Graphics','512 Mb','11 GB');
foreach ($graphics as $val) { ?>
                        <option value="<?php echo $val; ?>"><?php echo $val; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row laptop">
                  <div class="col-md-3">
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="d_storage" class="bmd-label-floating mat-label-color">Choose Hard Disk Capacity:</label>
                      <select class="form-control laptop" name="storage" id="d_storage">
                        <option value="">Select Hard Disk Capacity</option>
                        <?php $storage = array('1 Tb','1.2 Tb','1.5 Tb','2 Tb','3 Tb','4 Tb','5 Tb','6 Tb','8 Tb','10 Tb','12 Tb','16 Tb','20 GB','48 Tb','60 GB','64 GB','120 Tb','120 GB','128 GB','146 GB','180 GB','200 GB','240 GB','250 GB','256 GB','275 GB','300 GB','320 GB','480 GB','500 GB','512 GB','525 GB','600 GB','640 GB','750 GB','900 GB','960 GB');
foreach ($storage as $val) { ?>
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
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="contact" name="contact">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group bmd-form-group">
                      <label for="size" class="bmd-label-floating">Email:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="email" name="email">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3">
                    <div class="card-header" id="locationadd">Location</div>
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="country" class="bmd-label-floating mat-label-color">Choose Country:</label>
                      <select class="form-control" name="country" id="country">
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
                    </div>
                    <div class="form-group select-box-search bmd-form-group mat-select area1">
                      <label for="area" class="bmd-label-floating mat-label-color">Choose Area:</label>
                      <select class="form-control" name="area" id="area">
                        <option value="">Select Area</option>
                      </select>
                    </div>
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Latitude:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="latitude" name="latitude">
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="card-header" style="background:none;">&nbsp;</div>
                    <div class="form-group select-box-search bmd-form-group mat-select">
                      <label for="location" class="bmd-label-floating mat-label-color">Choose Location:</label>
                      <select class="form-control" name="location" id="location">
                        <option value="">Select Location</option>
                      </select>
                    </div>
                    <div class="form-group bmd-form-group">
                      <label for="price" class="bmd-label-floating">Longitude:</label>
                      <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="longitude" name="longitude">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="card-header" id="locationadd">Drag Location</div>
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
                    <div class="card-header" id="locationadd">Description</div>
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
                      <input type="text" class="form-control text-count" readonly>
                      <br>
                      <span class="help-block"> Allowed type (.jpg, .png, .jpeg) <br>
                      Max Size: 5MB </span> </div>
                  </div>
                </div>
                <div class="row dvPreview"> </div>
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
        /*var $this = $(this);
        $this.closest('label').addClass('check-active');*/
        $('.check-active').removeClass('check-active');
        $('.text-main').hide();
        $('.set-main').hide();
        //$('.set-main').show();
        $(this).siblings('.set-main').hide();
        $(this).parent().addClass('check-active');
        $(this).siblings('.text-main').show();
        $('.img-check').not(this).removeClass('check').siblings('input').prop('checked', false);
        $(this).addClass('check').siblings('input').prop('checked', true);
    });
    $(document).on('click', '.set-main', function(e) {
        /*var $this = $(this);
        $this.closest('label').addClass('check-active');*/
        $('.check-active').removeClass('check-active');
        $('.text-main').hide();
        $('.set-main').hide();
        //$('.set-main').show();
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
});
</script>