<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    <title><?php echo @$page_title; ?> | Yalalink Admin</title>
    <base href="<?php echo base_url(); ?>" />
    <link rel="apple-touch-icon" href="assets/admin/images/fav-icon.png">
    <link rel="shortcut icon" href="assets/admin/images/fav-icon.png">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/admin/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="assets/admin/css/site.min.css?<?php echo date('l jS \of F Y h:i:s A'); ?>">

    <!-- Plugins -->
    <link rel="stylesheet" href="assets/admin/vendor/animsition/animsition.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/asscrollable/asScrollable.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/switchery/switchery.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/intro-js/introjs.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/slidepanel/slidePanel.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/flag-icon-css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/admin/vendor/waves/waves.min.css">
	<?php if(@$page_title == 'Login'){ ?>
    <link rel="stylesheet" href="assets/admin/css/login-v3.min.css">
    <?php } ?>
	<?php if(@$page_title == 'Dashboard'){ ?>
    <link rel="stylesheet" href="assets/admin/css/dashboard.min.css">
    <?php } ?>
    <link rel="stylesheet" href="assets/admin/vendor/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/admin/css/lightbox.min.css">
    <link rel="stylesheet" href="assets/admin/css/layouts.css">
    <link rel="stylesheet" href="assets/admin/css/basic.css">
    <link rel="stylesheet" href="assets/admin/vendor/ladda/ladda.css">
    <link rel="stylesheet" href="assets/admin/vendor/select2/select2.css">
    <link rel="stylesheet" href="assets/admin/vendor/formvalidation/formValidation.css">
    <link rel="stylesheet" href="assets/admin/css/forms/validation.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="assets/admin/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="assets/admin/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
	<link href="assets/front_end/css/fonts/font-awesome.min.css" rel="stylesheet">

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
    
<body class="animsition dashboard">
<!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar"> <span class="sr-only">Toggle navigation</span> <span class="hamburger-bar"></span> </button>
    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse"> <i class="icon md-more" aria-hidden="true"></i> </button>
    <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu"> <img class="navbar-brand-logo" src="assets/front_end/images/mob-logo.png" title="Yalalink" style="background-color: #fff;border-radius: 50%;"> <span class="navbar-brand-text hidden-xs-down"> Yalalink Admin</span> </div>
    <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
          data-toggle="collapse"> <span class="sr-only">Toggle Search</span> <i class="icon md-search" aria-hidden="true"></i> </button>
  </div>
  <div class="navbar-container container-fluid"> 
    <!-- Navbar Collapse -->
    <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse"> 
      <!-- Navbar Toolbar -->
      <ul class="nav navbar-toolbar">
        <li class="nav-item hidden-float" id="toggleMenubar"> <a class="nav-link" data-toggle="menubar" href="#" role="button"> <i class="icon hamburger hamburger-arrow-left"> <span class="sr-only">Toggle menubar</span> <span class="hamburger-bar"></span> </i> </a> </li>
        <li class="nav-item hidden-sm-down" id="toggleFullscreen"> <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button"> <span class="sr-only">Toggle fullscreen</span> </a> </li>
        <li class="nav-item hidden-float"> <a class="nav-link icon md-search" data-toggle="collapse" href="#" data-target="#site-navbar-search"
                role="button"> <span class="sr-only">Toggle Search</span> </a> </li>
      </ul>
      <!-- End Navbar Toolbar --> 
      
      <!-- Navbar Toolbar Right -->
      <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
        <li class="nav-item dropdown"> <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="scale-up" role="button"> <span class="avatar avatar-online"> <img src="uploads/admin-users/superadmin.png" alt="..."> <i></i> </span> </a>
          <div class="dropdown-menu" role="menu"> <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> Profile</a> <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-settings" aria-hidden="true"></i> Settings</a>
            <div class="dropdown-divider" role="presentation"></div>
            <a class="dropdown-item" href="admin/signout" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a> </div>
        </li>
      </ul>
      <!-- End Navbar Toolbar Right --> 
    </div>
    <!-- End Navbar Collapse --> 
    
    <!-- Site Navbar Seach -->
    <div class="collapse navbar-search-overlap" id="site-navbar-search">
      <form role="search">
        <div class="form-group">
          <div class="input-search"> <i class="input-search-icon md-search" aria-hidden="true"></i>
            <input type="text" class="form-control" name="site-search" placeholder="Search...">
            <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
          </div>
        </div>
      </form>
    </div>
    <!-- End Site Navbar Seach --> 
  </div>
</nav>