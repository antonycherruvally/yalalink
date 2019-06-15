		<?php
			if( isset($footermisc) ) {
				$this->load->view('board/blocks/footermisc');
			}
		?>		
    	<!--begin::Base Scripts -->
	<script src="<?= Core::getBaseUrl() ?>assets/board/vendors/base/vendors.bundle.js" type="text/javascript"></script>
	<script src="<?= Core::getBaseUrl() ?>assets/board/demo/demo2/base/scripts.bundle.js" type="text/javascript"></script>
	<!--end::Base Scripts -->   
        <!--begin::Page Snippets -->
	<script src="<?= Core::getBaseUrl() ?>assets/board/js/global.js" type="text/javascript"></script>
	<script src="<?= Core::getBaseUrl() ?>assets/board/app/js/dashboard.js" type="text/javascript"></script>
	<!--end::Page Snippets -->
	<?php
		# js file injection at the bottom
		if( isset($js) ) {
			foreach( $js as $jsf ) {
				?>
				<script src="<?= Core::getBaseUrl() ?>assets/board/<?= $jsf ?>" type="text/javascript"></script>
				<?php
			}
		}
	?>
</body>
<!-- end::Body -->
</html>
