<?php $this->load->view('board/blocks/header', ['navigation' => true]); ?>
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
				<?php #$this->load->view('board/blocks/leftsidemenu'); ?>
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<?php $this->load->view('board/blocks/breadcrumbs', [
						'title' => 'Create',
						'b1' => [
							'Corporate', 
							Core::getBaseUrl() . 'board/corporate'
						],
						'b2' => [
							'Create Account', 
							Core::getBaseUrl() . 'board/corporate'
						],
					]); ?>
					<div class="m-content">
						<div class="row">
							Coporate Dashboard
						</div>
					</div>
				</div>
		</div>
		<!-- end::Body -->
<?php $this->load->view('board/blocks/footer', ['footermisc' => true]); ?>