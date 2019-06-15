<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');
$country = $this->admin_model->getLocation($view->country);
$location = $this->admin_model->getLocation($view->location);
$area = $this->admin_model->getLocation($view->area);?>
<!-- Page -->

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Auto</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/auto">Auto</a></li>
      <li class="breadcrumb-item active">View Auto</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Auto</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Type</label>
                        <h4><?php echo $view->type; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Title in English</label>
                        <h4><?php echo $view->title_en; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Title in Arabic</label>
                        <h4><?php echo $view->title_ar; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Category</label>
                        <?php $category = $this->admin_model->getAutoCategoryDetails($view->category); ?>
                        <h4><?php echo $category->category; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Sub Category</label>
                        <?php $subcategory = $this->admin_model->getAutoCategoryDetails($view->subcategory); ?>
                        <h4><?php echo $subcategory->subcategory; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Price</label>
                        <h4><?php if($view->offer_price!=0) { echo number_format(@$view->offer_price, 2); }else{ echo number_format(@$view->price, 2); }?> <span><?php if($view->offer_price!=0) { echo number_format(@$view->price, 2); } ?></h4>
                      </div>
                    </div>
                    <?php if($view->category == 2){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Boat Type</label>
                        <h4><?php echo $view->body_type; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Price</label>
                        <h4><?php echo $view->price; ?></h4>
                      </div>
                    </div>
                  </div>
                    <?php if($view->category == 1){ ?>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Kilometers</label>
                        <h4><?php echo $view->kilometers; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Body Condition:</label>
                        <h4><?php echo $view->body_condition; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Mechanical Condition:</label>
                        <h4><?php echo $view->mechanical_condition; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Year:</label>
                        <h4><?php echo $view->year; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Body Type</label>
                        <h4><?php echo $view->body_type; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Color:</label>
                        <h4><?php echo $view->color; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Transmission Type:</label>
                        <h4><?php echo $view->transmission_type; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Regional Specs:</label>
                        <h4><?php echo $view->regional_specs; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Doors</label>
                        <h4><?php echo $view->doors; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Cylinders:</label>
                        <h4><?php echo $view->cylinders; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Horsepower:</label>
                        <h4><?php echo $view->horsepower; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Warranty:</label>
                        <h4><?php echo $view->warranty; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Fuel Type</label>
                        <h4><?php echo $view->fuel_type; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-material floating">
                        <label class="form-label">Features</label>
                        <h4><?php if($features){ $featuress = ''; foreach($features as $val){ $featuress .= $val->name.', '; } echo $featuress; }?></h4>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php if($view->category == 2){ ?>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Age</label>
                        <h4><?php echo $view->age; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Usage:</label>
                        <h4><?php echo $view->usage; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Condition:</label>
                        <h4><?php echo $view->body_condition; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Warranty:</label>
                        <h4><?php echo $view->warranty; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Length</label>
                        <h4><?php echo $view->length; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Kilometers:</label>
                        <h4><?php echo $view->kilometers; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Mechanical Condition:</label>
                        <h4><?php echo $view->mechanical_condition; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Year:</label>
                        <h4><?php echo $view->year; ?></h4>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php if($view->category == 3){ ?>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Make</label>
                        <h4><?php echo $view->make; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Capacity/Weight:</label>
                        <h4><?php echo $view->capacity; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Cylinders:</label>
                        <h4><?php echo $view->cylinders; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Horsepower:</label>
                        <h4><?php echo $view->horsepower; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Warranty</label>
                        <h4><?php echo $view->warranty; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Fuel Type:</label>
                        <h4><?php echo $view->fuel_type; ?></h4>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <?php if($view->category == 4){ ?>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Kilometers</label>
                        <h4><?php echo $view->kilometers; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Usage:</label>
                        <h4><?php echo $view->usage; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Year:</label>
                        <h4><?php echo $view->year; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Final Drive System:</label>
                        <h4><?php echo $view->drive_system; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Wheels</label>
                        <h4><?php echo $view->wheels; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Manufacturer:</label>
                        <h4><?php echo $view->manufacturer; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Engine Size:</label>
                        <h4><?php echo $view->size; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Warranty:</label>
                        <h4><?php echo $view->warranty; ?></h4>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Country</label>
                        <h4><?php echo $country->name; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Location</label>
                        <h4><?php echo $location->location; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Area</label>
                        <h4><?php echo $area->location; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-material floating">
                        <label class="form-label">Description</label>
                        <?php echo $view->description; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row dvPreview">
                    <?php if($images){ foreach($images as $val){ ?>
                    <span class="text-center preview-span">
                    <div class="col-md-12 box text-center">
                    <a class="inline-block" href="<?php echo 'uploads/images/'.$val->image; ?>" title="view-7" data-source="<?php echo 'uploads/images/'.$val->image; ?>" data-plugin="magnificPopup"
                      data-main-class="mfp-img-mobile">
                      <img class="img-fluid" src="<?php echo 'uploads/images/thumb/'.$val->image; ?>" alt="..." width="220"
                      />
                    </a>
                    </div>
                    </span>
                    <?php } }?>
                  </div>
                  <div class="form-group form-material">
                    <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" id="submit_ads" onclick="location.href='admin/edit_auto/<?php echo $view->post_id; ?>';">Edit</button>
                    <button type="button" class="btn btn-danger ladda-button" name="cancel" value="cancel" onClick="window.location.href='admin/auto';" data-style="zoom-in" data-plugin="ladda" data-type="progress">Cancel</button>
                  </div>
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
