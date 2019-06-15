<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<!-- Page -->
<div class="page">
  <div class="page-header">
    <h1 class="page-title">Users</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="admin/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active">Users</li>
    </ol>
    <div class="page-header-actions">
      <button type="button" onclick="location.href='admin/add_users';" class="btn btn-floating btn-success waves-effect waves-classic btn-sm"  data-toggle="tooltip" data-original-title="Add New"> <i class="icon md-plus" aria-hidden="true"></i> </button>
    </div>
  </div>
  <div class="page-content"> 
    <!-- Panel -->
    <div class="panel">
      <div class="panel-body container-fluid">
        <div class="row row-lg">
          <div class="col-lg-12"> 
            <!-- Example Hover Table -->
            <div class="example-wrap">
              <h4 class="example-title">Users</h4>
              <div class="example table-responsive">
                <?php if($results){ ?>
                <form action="admin/deleteAllUser" id="list-form" method="post" enctype="multipart/form-data">
                  <table class="table table-hover table-responsive-md table-fixed table-striped text-center" data-plugin="selectable">
                    <thead>
                      <tr>
                        <th scope="col" class="w-50"> <span class="checkbox-custom checkbox-primary" data-toggle="tooltip" data-placement="top" title="Select All">
                          <input class="selectable-all select-checkbox select-all" type="checkbox" name="ids">
                          <label></label>
                          </span> </th>
                        <th scope="col">Sl no.</th>
                        <th scope="col">User Type</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Post Count</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = $this->uri->segment(3)+1; foreach($results as $val){  
                      $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->first_name.$val->last_name);
                      $title = str_replace('  ',' ',strtolower($title));
                      $title = str_replace(' ','-',$title);
                      $latest = $title.'-'.$val->id; 
                      ?>
                      <tr id="<?php echo $val->id; ?>">
                        <td><span class="checkbox-custom checkbox-primary" data-toggle="tooltip" data-placement="top" title="Select <?php echo $i; ?>">
                          <input class="selectable-item select-checkbox check-sel delete-single" type="checkbox" name="ids" id="row-<?php echo $val->id; ?>" value="<?php echo $val->id; ?>">
                          <label for="row-<?php echo $val->id; ?>"></label>
                          </span></td>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $val->user_type; ?></td>
                        <td><?php echo $val->first_name.' '.$val->last_name; ?></td>
                        <td><?php echo $val->email; ?></td>
                        <td><?php if($val->added_by > 0) echo '<a href="admin/user_posts/'.$val->id.'">'.$val->added_by.'</a>'; else echo $val->added_by;?></td>
                        <td class="ads-status<?php echo $val->id; ?>"><?php if($val->status == 1) { echo '<a href="javascript:UserstatusActivation('.$val->id.',0);"><span class="badge badge-round badge-success">Active</span></a>'; }else{ echo '<a href="javascript:UserstatusActivation('.$val->id.',1);"><span class="badge badge-round badge-danger">InActive</span></a>'; } ?></td>
                        <td><a class="btn btn-floating btn-info btn-sm ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" data-toggle="tooltip" data-placement="top" title="Edit" href="admin/edit_user/<?php echo $val->id; ?>"><i class="icon md-edit" aria-hidden="true"></i></a>
                          <a class="btn btn-floating btn-primary btn-sm ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress" data-toggle="tooltip" data-placement="top" title="View" href="admin/view_user/<?php echo $val->id; ?>"><i class="icon md-eye" aria-hidden="true"></i></a>
                          <a data-target="#DeleteRow" data-toggle="modal" class="btn btn-floating btn-danger btn-sm delete" data-toggle="tooltip" data-placement="top" title="Delete" href="javascript:void(0);">
                          <i class="icon md-delete" aria-hidden="true"></i>
                          </a></td>
                      </tr>
                      <?php $i++;} ?>
                    </tbody>
                  </table>
                </form>
                <div class="full-wrap">
                  <h5><?php echo 'Showing '.$first_record.' to '.$last_record.' of '.$total_count.' Users'; ?></h5>
                  <?php echo $links; ?> </div>
                <?php }else{ ?>
                <div class="full-wrap job-ad-item border-down">
                  <p>Users not found!...</p>
                </div>
                <?php } ?>
              </div>
            </div>
            <!-- End Example Hover Table --> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Page --> 
<!-- Modal Popup -->
<div class="modal fade modal-info modal-3d-sign" id="DeleteRow" aria-hidden="true" aria-labelledby="DeleteRow" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-center">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        <h4 class="modal-title">Delete Users</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure, you want to delete this Users?…</p>
      </div>
      <div class="modal-footer">
        <form action="admin/deleteUser" method="post" enctype="multipart/form-data">
          <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <input type="hidden" name="id" id="id" >
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon md-close mr-10" aria-hidden="true"></i>No</button>
          <button type="submit" class="btn btn-success ladda-button" data-style="zoom-in" data-plugin="ladda" data-type="progress"><span class="ladda-label"><i class="icon md-check mr-10" aria-hidden="true"></i>Yes</span></button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('admin/common/footer'); ?>
