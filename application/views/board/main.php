<?php 
$this->load->view('board/blocks/header', ['navigation' => true]); 
?>
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<?php $this->load->view('board/blocks/widgets'); ?>
				</div>
			</div>
		<!-- end::Body -->
<?php
$this->load->view('board/blocks/footer', ['footermisc' => true]); 
?>