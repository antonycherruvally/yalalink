<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    <title>Login | Yalalink</title>
    <base href="<?php echo base_url(); ?>" />
    <link rel="apple-touch-icon" href="assets/admin/images/fav-icon.png">
    <link rel="shortcut icon" href="assets/admin/images/fav-icon.png">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/admin/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="assets/admin/css/site.min.css">

    <!-- Plugins -->
    <link rel="stylesheet" href="assets/admin/vendor/animsition/animsition.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/asscrollable/asScrollable.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/switchery/switchery.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/intro-js/introjs.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/slidepanel/slidePanel.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/waves/waves.min.css">
    <link rel="stylesheet" href="assets/admin/css/login-v3.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="assets/admin/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="assets/admin/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="assets/admin/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

    <!--[if lt IE 10]>
    <script src="assets/admin/vendor/media-match/media.match.min.js"></script>
    <script src="assets/admin/vendor/respond/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script src="assets/admin/vendor/breakpoints/breakpoints.min.js"></script>
    <script>
      Breakpoints();
    </script>
    </head>
    <body class="animsition page-login-v3 layout-full">
<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
      <div class="page-content vertical-align-middle">
    <div class="panel">
          <div class="panel-body">
        <div class="brand"> <img class="brand-img" src="assets/admin/images/logo.jpg" alt="Yalalink Logo" width="160">
              <h2 class="brand-text font-size-18">Login</h2>
              <?php if($this->session->flashdata('message')){ ?>
              <?php echo $this->session->flashdata('message'); ?>
              <?php } ?>
            </div>
        <form class="form-signin cv-form" action="admin/authenticate" enctype="multipart/form-data" method="post" name="login-form" id="login_form">
              <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="email" class="form-control empty" id="email" name="email" autocomplete="off">
            <label class="floating-label" for="email">Email</label>
          </div>
              <div class="form-group form-material floating" data-plugin="formMaterial">
            <input type="password" class="form-control empty" id="password" name="password" autocomplete="off">
            <label class="floating-label" for="password">Password</label>
          </div>
              <div class="form-group clearfix">
            <div class="checkbox-custom checkbox-inline checkbox-primary checkbox-lg float-left">
                  <input type="checkbox" id="remember" name="checkbox" value="1">
                  <label for="remember">Remember me</label>
                </div>
            <a class="float-right" href="forgot-password.html">Forgot password?</a> </div>
              <button type="submit" id="submit_login" class="btn btn-primary btn-block btn-lg mt-40">Sign in</button>
            </form>
      </div>
        </div>
    <footer class="page-copyright page-copyright-inverse">
          <p>Admin BY Yalalink</p>
          <p>© 2018. All RIGHT RESERVED.</p>
          <div class="social"> <a class="btn btn-icon btn-pure" href="javascript:void(0)"> <i class="icon bd-twitter" aria-hidden="true"></i> </a> <a class="btn btn-icon btn-pure" href="javascript:void(0)"> <i class="icon bd-facebook" aria-hidden="true"></i> </a> <a class="btn btn-icon btn-pure" href="javascript:void(0)"> <i class="icon bd-google-plus" aria-hidden="true"></i> </a> </div>
        </footer>
  </div>
    </div>
<!-- Page --> 
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
<script src="assets/admin/vendor/jquery/jquery.js"></script> 
<script src="assets/admin/vendor/popper-js/umd/popper.min.js"></script> 
<script src="assets/admin/vendor/bootstrap/bootstrap.js"></script> 
<script src="assets/admin/vendor/animsition/animsition.min.js"></script> 
<script src="assets/admin/vendor/mousewheel/jquery.mousewheel.js"></script> 
<script src="assets/admin/vendor/asscrollbar/jquery-asScrollbar.js"></script> 
<script src="assets/admin/vendor/asscrollable/jquery-asScrollable.js"></script> 
<script src="assets/admin/vendor/ashoverscroll/jquery-asHoverScroll.js"></script> 
<script src="assets/admin/vendor/waves/waves.js"></script> 

<!-- Plugins --> 
<script src="assets/admin/vendor/switchery/switchery.js"></script> 
<script src="assets/admin/vendor/intro-js/intro.js"></script> 
<script src="assets/admin/vendor/screenfull/screenfull.js"></script> 
<script src="assets/admin/vendor/slidepanel/jquery-slidePanel.js"></script> 
<script src="assets/admin/vendor/jquery-placeholder/jquery.placeholder.js"></script> 

<!-- Scripts --> 
<script src="assets/admin/js/Component.js"></script> 
<script src="assets/admin/js/Plugin.js"></script> 
<script src="assets/admin/js/Base.js"></script> 
<script src="assets/admin/js/Config.js"></script> 
<script src="assets/admin/js/Section/Menubar.js"></script> 
<script src="assets/admin/js/Section/GridMenu.js"></script> 
<script src="assets/admin/js/Section/Sidebar.js"></script> 
<script src="assets/admin/js/Section/PageAside.js"></script> 
<script src="assets/admin/js/Plugin/menu.js"></script> 
<script src="assets/admin/js/config/colors.js"></script> 
<script src="assets/admin/js/config/tour.js"></script> 
<script>Config.set('assets', '../../assets');</script> 

<!-- Page --> 
<script src="assets/admin/js/Site.js"></script> 
<script src="assets/admin/js/Plugin/asscrollable.js"></script> 
<script src="assets/admin/js/Plugin/slidepanel.js"></script> 
<script src="assets/admin/js/Plugin/switchery.js"></script> 
<script src="assets/admin/js/Plugin/jquery-placeholder.js"></script> 
<script src="assets/admin/js/Plugin/material.js"></script> 
<script src="assets/front_end/js/jquery.validate.js"></script>
<script type="application/javascript">
(function(document, window, $){
  'use strict';

  var Site = window.Site;
  $(document).ready(function(){
	Site.run();
  });
})(document, window, jQuery);
$(document).ready(function() {
$("#login_form").validate({
      rules: {
        email: {
          required: true,
          email: true
        },
        password: "required"
      },
      messages: {
        email: {
          required: "Please enter your email address.",
          email: "Please enter a valid email address.",
          remote: "Email already exist"
        },
        password: "Please enter the password"
      }
    });
});
    </script>
</body>
</html>
