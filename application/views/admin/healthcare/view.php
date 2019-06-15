<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');
$country = $this->admin_model->getLocation($view->country);
$location = $this->admin_model->getLocation($view->location);
$area = $this->admin_model->getLocation($view->area);?>
<!-- Page -->

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Healthcare</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/healthcare">Healthcare</a></li>
      <li class="breadcrumb-item active">View Healthcare</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Healthcare</h4>
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
                        <label class="form-label">Featured</label>
                        <h4><?php if($view->featured==1) echo 'Yes'; else echo 'No'; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Mobile</label>
                        <h4><?php echo $view->mobile; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Email</label>
                        <h4><?php echo $view->email; ?></h4>
                      </div>
                    </div>
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
                    <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" id="submit_ads" onclick="location.href='admin/edit_healthcare/<?php echo $view->post_id; ?>';">Edit</button>
                    <button type="button" class="btn btn-danger ladda-button" name="cancel" value="cancel" onClick="window.location.href='admin/healthcare';" data-style="zoom-in" data-plugin="ladda" data-type="progress">Cancel</button>
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
