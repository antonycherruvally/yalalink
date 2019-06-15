<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Yalalink | Board
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="<?= Core::getBaseUrl() ?>assets/board/js/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });

          site = {
          	'baseUrl':'<?= Core::getBaseUrl() ?>',
          };
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="<?= Core::getBaseUrl() ?>assets/board/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= Core::getBaseUrl() ?>assets/board/demo/demo2/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?= Core::getBaseUrl() ?>assets/board/css/override.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="<?= Core::getBaseUrl() ?>favicon.ico" />
	</head>

		<body  class="m-page--wide m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<?php
				if( $navigation ) {
					$data = [
						'profileImage' => Core::getHelper('image')->getUserImage(),
						'board' => Core::getModel('board')->getSession()
					];
					$this->load->view('board/blocks/navigation', $data);
				}
			?>