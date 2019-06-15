<?php $this->load->view('blocks/header'); 
$userdata = $this->session->userdata( 'logged_yalalink_userdata' );
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 col-sm-12 mx-auto">
			<div class="full-wrap innerpage-wrap">
				<div class="inner-header-box">
					<div class="header-box-headerText">Contact Us</div>
					<div class="header-box-contentText">We are here to help you</div>
					<?php if($this->session->flashdata('message')){ ?>
					        <?php echo $this->session->flashdata('message'); ?>
					        <?php } ?>
				</div>
			<form class="m-t-15" action="sendContact" enctype="multipart/form-data" method="post" name="contact-form" id="contact-form">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group bmd-form-group">
								<label for="name" class="bmd-label-floating">Name:</label>
								<input type="text" class="form-control no-border mat-txt mat-font first-txt contname" id="name" name="name">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group bmd-form-group">
								<label for="email" class="bmd-label-floating">E-mail:</label>
								<input type="email" class="form-control no-border mat-txt mat-font first-txt" id="email" name="email">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group bmd-form-group">
								<label for="phone" class="bmd-label-floating">Phone:</label>
								<input type="text" class="form-control no-border mat-txt mat-font first-txt" id="phone" name="phone">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group bmd-form-group">
								<label for="subject" class="bmd-label-floating">Subject:</label>
								<input type="text" class="form-control no-border mat-txt mat-font first-txt contname" id="subject" name="subject">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<div class="form-group bmd-form-group">
								<label for="message" class="bmd-label-floating">Message:</label>
								<textarea class="form-control contname" id="message" name="message" rows="3"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit mx-auto contact-btn" id="submit">Submit
                </button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
<script src="assets/front_end/js/jquery.validate.js"></script>
<script type="application/javascript">
	$( document ).ready( function ( e ) {
		$( "#contact-form" ).validate( {
			rules: {
				name: "required",
				email: "required",
				subject: "required",
			},
			messages: {
				name: "Please enter name",
				email: "Please enter email",
				subject: "Please enter subject"
			}
		} );
	} );
</script>