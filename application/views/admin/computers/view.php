<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');
$country = $this->admin_model->getLocation($view->country);
$location = $this->admin_model->getLocation($view->location);
$area = $this->admin_model->getLocation($view->area);?>
<!-- Page -->
<div class="page">
  <div class="page-header">
    <h1 class="page-title">Electronics</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/electronics">Electronics</a></li>
      <li class="breadcrumb-item active">View Electronics</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Real Estate</h4>
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
                        <label class="form-label">Main Category</label>
                        <h4><?php echo $view->main_category; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <?php if($view->category){?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Category</label>
                        <?php $category = $this->admin_model->getComputersCategory($view->category);
                         ?>
                        <h4><?php echo $category->category; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->subcategory){?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Sub Category</label>
                        <?php $subcategory = $this->admin_model->getComputersSubCategory($view->subcategory); ?>
                        <h4><?php echo $subcategory->subcategory; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->category_type){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Category Type</label>
                        <h4><?php echo $view->category_type; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->brand){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Brand</label>
                        <h4><?php echo $view->brand; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="row">
                    <?php if($view->model){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Model</label>
                        <h4><?php echo $view->model; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->age){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Age</label>
                        <h4><?php echo $view->age; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->usage){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Usage</label>
                        <h4><?php echo $view->usage; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->condition){ ?>
                     <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Condition</label>
                        <h4><?php echo $view->condition; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="row">
                  <?php if($view->warranty){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Warranty</label>
                        <h4><?php echo $view->warranty; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->color){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Color</label>
                        <h4><?php echo $view->color; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->storage){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Storage</label>
                        <h4><?php echo $view->storage; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->memory){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">memory</label>
                        <h4><?php echo $view->memory; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="row">
                  <?php if($view->processor){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Processor</label>
                        <h4><?php echo $view->processor; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->graphics){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Graphics</label>
                        <h4><?php echo $view->graphics; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->operating_system){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Operating system</label>
                        <h4><?php echo $view->operating_system; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->screen_size){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Screen size</label>
                        <h4><?php echo $view->screen_size; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="row">
                    <?php if($view->compatible){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Compatible</label>
                        <h4><?php echo $view->compatible; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->connectivity){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Connectivity</label>
                        <h4><?php echo $view->connectivity; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->mobile){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Mobile</label>
                        <h4><?php echo $view->mobile; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->email){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Email</label>
                        <h4><?php echo $view->email; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="row">
                  <?php if($view->price){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Price</label>
                        <h4><?php echo $view->price; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="row">
                   <?php if($view->offer_price){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Offer Price</label>
                        <h4><?php echo $view->offer_price; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                    <?php if($view->offer_price){ ?>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Contact</label>
                        <h4><?php echo $view->mobile; ?></h4>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Country</label>
                        <h4><?php if($country) echo $country->name; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Location</label>
                        <h4><?php if($location) echo $location->location; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Area</label>
                        <h4><?php if($area) echo $area->location; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-material floating">
                        <label class="form-label">Description : </label><br/>
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
                    <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" id="submit_ads" onclick="location.href='admin/edit_computers/<?php echo $view->post_id; ?>';">Edit</button>
                    <button type="button" class="btn btn-danger ladda-button" name="cancel" value="cancel" onClick="window.location.href='admin/computers';" data-style="zoom-in" data-plugin="ladda" data-type="progress">Cancel</button>
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
