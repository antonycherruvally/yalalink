<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<!-- Page -->
    <div class="page">
      <div class="page-header">
        <h1 class="page-title">Website Settings</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
          <li class="breadcrumb-item active">Website Settingss</li>
        </ol>
      </div>

      <div class="page-content">
        <div class="panel">
          <div class="panel-body container-fluid">
            <div class="row row-lg">
              <div class="col-md-12">
                <!-- Example Basic Form (Form grid) -->
                <div class="example-wrap">
                  <h4 class="example-title">Website Settings</h4>
				  <?php if($this->session->flashdata('message')){ ?>
                  <?php echo $this->session->flashdata('message'); ?>
                  <?php } ?>
                  <div class="example">
       				<form class="form-signin cv-form" action="admin/update_website" enctype="multipart/form-data" method="post" name="website-form" id="website-form">
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-group form-material floating" data-plugin="formMaterial">
                          <input type="text" class="form-control" name="email" id="email" value="<?php echo $website->email; ?>" />
                          <label class="floating-label">Email</label>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group form-material floating" data-plugin="formMaterial">
                          <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $website->phone; ?>" />
                          <label class="floating-label">Phone</label>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group form-material floating" data-plugin="formMaterial">
                          <input type="text" class="form-control" name="mobile" id="mobile" value="<?php echo $website->mobile; ?>" />
                          <label class="floating-label">Mobile</label>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group form-material floating" data-plugin="formMaterial">
                          <input type="text" class="form-control" name="fb_link" id="fb_link" value="<?php echo $website->fb_link; ?>" />
                          <label class="floating-label">Facebook Link</label>
                        </div>
                        </div>
                        </div>
                      <div class="row">
                        <div class="col-md-3">
                        <div class="form-group form-material floating" data-plugin="formMaterial">
                          <input type="text" class="form-control" name="tw_link" id="tw_link" value="<?php echo $website->tw_link; ?>" />
                          <label class="floating-label">Twitter Link</label>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group form-material floating" data-plugin="formMaterial">
                          <input type="text" class="form-control" name="ln_link" id="ln_link" value="<?php echo $website->ln_link; ?>" />
                          <label class="floating-label">LinkedIn Link</label>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group form-material floating" data-plugin="formMaterial">
                          <input type="text" class="form-control" name="yt_link" id="yt_link" value="<?php echo $website->yt_link; ?>" />
                          <label class="floating-label">Youtube Like</label>
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group form-material floating" data-plugin="formMaterial">
                          <input type="text" class="form-control" name="in_link" id="in_link" value="<?php echo $website->in_link; ?>" />
                          <label class="floating-label">Instagram Link</label>
                        </div>
                        </div>
                      </div>
                      <div class="form-group form-material">
                        <button type="submit" class="btn btn-primary">Save</button>
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
<?php $this->load->view('admin/common/footer'); ?>
