<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');
$country = $this->admin_model->getLocation($view->country);?>
<!-- Page -->

<div class="page">
  <div class="page-header">
    <h1 class="page-title">Users</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="admin/users">Users</a></li>
      <li class="breadcrumb-item active">View User</li>
    </ol>
  </div>
  <div class="page-content">
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-md-12"> 
            <!-- Example Basic Form (Form grid) -->
            <div class="example-wrap">
              <h4 class="example-title">View User</h4>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
              <div class="example">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Name</label>
                        <h4 ><?php echo $view->first_name.' '.$view->last_name; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">User Type</label>
                        <h4 ><?php echo $view->user_type; ?></h4>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group form-material floating">
                        <label class="form-label">Email</label>
                        <h4 ><?php echo $view->email; ?></h4>
                      </div>
                    </div>
                  </div>
                  <div class="row dvPreview">
                    <?php if($view->image){ ?>
                    <span class="text-center preview-span">
                    <div class="col-md-12 box text-center">
                    <a class="inline-block" href="<?php echo 'uploads/users/'.$view->image; ?>" title="view-7" data-source="<?php echo 'uploads/ads/'.$view->image; ?>" data-plugin="magnificPopup"
                      data-main-class="mfp-img-mobile">
                      <img class="img-fluid" src="<?php echo 'uploads/users/thumb/'.$view->image; ?>" alt="..." width="220"
                      />
                    </a>
                    </div>
                    </span>
                    <?php } ?>
                  </div>
                  <div class="form-group form-material">
                    <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" id="submit_ads" onclick="location.href='admin/edit_user/<?php echo $view->id; ?>';">Edit</button>
                    <button type="button" class="btn btn-danger ladda-button" name="cancel" value="cancel" onClick="window.location.href='admin/users';" data-style="zoom-in" data-plugin="ladda" data-type="progress">Cancel</button>
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
