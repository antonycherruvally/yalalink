<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');
$country = $this->admin_model->getLocation($view->country);
$location = $this->admin_model->getLocation($view->location);
$area = $this->admin_model->getLocation($view->area);?>
<!-- Page -->

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Classifieds</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/classifieds">Classifieds</a></li>
      <li class="breadcrumb-item active">View Classifieds</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Classifieds</h4>
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
                        <label class="form-label">Marital Status</label>
                        <h4><?php echo $view->maritial; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Nationality</label>
                        <?php
                        $country = $this->admin_model->getNationality($view->nationality);?>
                        <h4><?php echo $country->name; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Gender</label>
                        <h4><?php echo $view->gender; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Age group</label>
                        <h4><?php echo $view->age; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Religion</label>
                        <h4><?php echo $view->religion; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Visa Type</label>
                        <h4><?php echo $view->visa; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Year of Experience</label>
                        <h4><?php echo $view->experience; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Current Location</label>
                        <?php
                        $country = $this->admin_model->getNationality($view->current_location);?>
                        <h4><?php echo $country->name; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Mobile Number</label>
                        <h4><?php echo $view->mobile; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Email</label>
                        <h4><?php echo $view->email; ?></h4>
                      </div>
                    </div>
                     <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Languages Known</label>
                        <h4><?php echo $view->languages; ?></h4>
                      </div>
                    </div>
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
                        <label class="form-label">Description</label>
                        <h5><?php echo $view->description; ?></h5>
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

                     <?php if($view->cv){ ?>
                    <span class="text-center preview-span">
                    <div class="col-md-12 box text-center">
                    <a class="inline-block" target="_blank" href="<?php echo 'uploads/user-cv/'.$view->cv; ?>" title="<?php echo $view->cv; ?>">
                      <img class="img-fluid" src="<?php echo 'assets/admin/images/cv.png'; ?>" alt="..." width="220"
                      />
                    </a>
                    </div>
                    </span>
                    <?php } ?>
                  </div>
                  <div class="form-group form-material">
                    <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" id="submit_ads" onclick="location.href='admin/edit_housemaids/<?php echo $view->post_id; ?>';">Edit</button>
                    <button type="button" class="btn btn-danger ladda-button" name="cancel" value="cancel" onClick="window.location.href='admin/housemaids';" data-style="zoom-in" data-plugin="ladda" data-type="progress">Cancel</button>
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
