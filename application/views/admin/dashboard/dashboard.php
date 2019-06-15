<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidemenu');?>
<!-- Page -->
<div class="page">
  <div class="page-content container-fluid">
    <div class="row" data-plugin="matchHeight" data-by-row="true">
      <div class="col-xl-3 col-md-6"> 
        <!-- Widget Linearea One-->
        <div class="card card-shadow" id="widgetLineareaOne">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10"> <i class="icon md-accounts grey-600 font-size-24 vertical-align-bottom mr-5"></i> User </div>
              <span class="float-right grey-700 font-size-30"><?php echo $users; ?></span> </div>
            <!--<div class="mb-20 grey-500"> <i class="icon md-long-arrow-up green-500 font-size-16"></i> 15% From this yesterday </div>-->
          </div>
        </div>
        <!-- End Widget Linearea One --> 
      </div>
      <div class="col-xl-3 col-md-6"> 
        <!-- Widget Linearea Two -->
        <div class="card card-shadow" id="widgetLineareaTwo">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10"> <i class="icon md-account grey-600 font-size-24 vertical-align-bottom mr-5"></i>VISITS </div>
              <span class="float-right grey-700 font-size-30"><?php echo $visitors->website_count; ?></span> </div>
            <!--<div class="mb-20 grey-500"> <i class="icon md-long-arrow-up green-500 font-size-16"></i> 34.2% From this week </div>-->
          </div>
        </div>
        <!-- End Widget Linearea Two --> 
      </div>
      <div class="col-xl-3 col-md-6"> 
        <!-- Widget Linearea Three -->
        <div class="card card-shadow" id="widgetLineareaThree">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10"><i class="icon md-image-alt grey-600 font-size-24 vertical-align-bottom mr-5"></i> Advertisements </div>
              <span class="float-right grey-700 font-size-30"><?php echo $advertisements; ?></span> </div>
            <!--<div class="mb-20 grey-500"> <i class="icon md-long-arrow-down red-500 font-size-16"></i> 15% From this yesterday </div>-->
          </div>
        </div>
        <!-- End Widget Linearea Three --> 
      </div>
      <div class="col-xl-3 col-md-6"> 
        <!-- Widget Linearea Four -->
        <div class="card card-shadow" id="widgetLineareaFour">
          <div class="card-block p-20 pt-10">
            <div class="clearfix">
              <div class="grey-800 float-left py-10"><i class="icon md-badge-check grey-600 font-size-24 vertical-align-bottom mr-5"></i> Posts </div>
              <span class="float-right grey-700 font-size-30"><?php echo $items; ?></span> </div>
            <!--<div class="mb-20 grey-500"> <i class="icon md-long-arrow-up green-500 font-size-16"></i> 18.4% From this yesterday </div>-->
          </div>
        </div>
        <!-- End Widget Linearea Four --> 
      </div>
    </div>
  </div>
</div>
<!-- End Page -->
<?php $this->load->view('admin/common/footer'); ?>
