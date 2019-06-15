<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');
$country = $this->admin_model->getLocation($view->country);
$location = $this->admin_model->getLocation($view->location);
$area = $this->admin_model->getLocation($view->area);?>
<!-- Page -->

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Jobs</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/real_estate">Jobs</a></li>
      <li class="breadcrumb-item active">View Jobs</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">Jobs</h4>
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
                        <label class="form-label">Job Industry</label>
                        <?php $industry = $this->admin_model->getIndustryDetail($view->industry); ?>
                        <h4><?php echo $industry->title; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Job Position</label>
                        <?php $position = $this->admin_model->getPositionDetail($view->position); ?>
                        <h4><?php echo $position->title; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Job Level</label>
                        <h4><?php echo @$view->level; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Job Type</label>
                        <h4><?php echo $view->job_type; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Qualification</label>
                        <h4><?php echo $view->qualification; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Gender</label>
                        <h4><?php echo $view->gender; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Nationality</label>
                        <h4><?php echo $view->nationality; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group form-material floating">
                        <label class="form-label">Years of Experience</label>
                        <h4><?php echo $view->experience; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Salary</label>
                        <h4><?php echo $view->salary; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Current Location</label>
                        <?php $current = $this->admin_model->getNationality($view->current_location); ?>
                        <h4><?php echo $current->name; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Visa Status</label>
                        <h4><?php echo $view->visa_status; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Skills</label>
                        <h4><?php echo $view->skills; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group form-material floating">
                        <label class="form-label">Languages: English, Arabic...</label>
                        <h4><?php echo $view->languages; ?></h4>
                      </div>
                    </div>
                    </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group form-material floating">
                        <label class="form-label">Description</label><br>
                        <?php echo $view->description; ?>
                      </div>
                    </div>
                  </div>
                  <div class="row dvPreview">
                    <?php $user_details = getUserDetails($view->user_id); 
					$path_parts = pathinfo('uploads/user-cv/'.$user_details->cv);
					if($user_details->cv){ ?>
                    <span class="text-center preview-span">
                    <div class="col-md-12 box text-center">
                    <a class="inline-block" href="<?php echo 'uploads/user-cv/'.$user_details->cv; ?>" title="view-7" target="_blank">
                    <?php if($path_parts['extension'] == 'pdf'){ ?>
                      <img class="img-fluid" src="assets/admin/images/pdf.png" alt=""/>
                      <?php }else{ ?>
                      <img class="img-fluid" src="assets/admin/images/word.png" alt=""/>
                      <?php } ?>
                    </a>
                    </div>
                    </span>
                    <?php } ?>
                  </div>
                  <div class="form-group form-material">
                    <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" id="submit_ads" onclick="location.href='admin/edit_real_estate/<?php echo $view->post_id; ?>';">Edit</button>
                    <button type="button" class="btn btn-danger ladda-button" name="cancel" value="cancel" onClick="window.location.href='admin/real_estate';" data-style="zoom-in" data-plugin="ladda" data-type="progress">Cancel</button>
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
