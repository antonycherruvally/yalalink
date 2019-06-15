<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$searchestate = $this->session->userdata('searchestate');
$country_code = $this->session->userdata('country_code');
$currency = $this->session->userdata('currency');
$register = $this->session->userdata('register'); ?>
<!--<link rel="stylesheet" href="assets/admin/vendor/formvalidation/formValidation.css">
<link rel="stylesheet" href="assets/admin/css/forms/validation.min.css">-->
<link rel="stylesheet" href="assets/front_end/css/intlTelInput.css">
<link rel="stylesheet" href="assets/front_end/css/isValidNumber.css">



            <div id="content" class="site-content" tabindex="-1">
                <div class="container">

                    <nav class="woocommerce-breadcrumb" ><a href="index">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>My Account</nav><!-- .woocommerce-breadcrumb -->

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <article id="post-8" class="hentry">

                                <div class="entry-content">
                                    <div class="woocommerce">
                                        <div class="customer-login-form">
                                            <span class="or-text">or</span>

                                            <div class="col2-set" id="customer_login">
												 <?php if($this->session->flashdata('message')){ ?>
        											<?php echo $this->session->flashdata('message'); ?>
      											  <?php } ?>
                                                <div class="col-1">


                                                    <h2>Login</h2>

                                                    <form class="m-t-15" action="authenticate" enctype="multipart/form-data" method="post" name="login-form" id="login-form">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                        <p class="before-login-text">Welcome back! Sign in to your account</p>

                                                        <p class="form-row form-row-wide">
                                                            <label for="username">Username or email address<span class="required">*</span></label>
                                                            <input type="email" class="form-control no-border mat-txt mat-font" id="email" name="email"  style="border: 1px solid #4fc3c5;border-radius: 25px;">
                                                        </p>

                                                        <p class="form-row form-row-wide">
                                                            <label for="password">Password<span class="required">*</span></label>
                                                            <input type="password" class="form-control no-border mat-txt mat-font" id="password" name="password"  style="border: 1px solid #4fc3c5;">
                                                        </p>

                                                        <p class="form-row">
                                                            <input class="button" type="submit" value="Login" name="login">
                                                            <label for="rememberme" class="inline"><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Remember me</label>
                                                        </p>

                                                       <div class="recover-box"> <a href="">Recover password ?</a></div>

                                                    </form>


                                                </div><!-- .col-1 -->

                                                <div class="col-2">

                                                    <h2>Register</h2>

                                                      <form class="m-t-15" action="insertUser" enctype="multipart/form-data" method="post" name="registration-form" id="registration-form">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                                                        <p class="before-register-text">Create your very own account</p>

                                                        <p class="form-row form-row-wide">
                                                            <label for="first_namel">First Name<span class="required">*</span></label>
                                                            <input type="text" class="form-control no-border mat-txt mat-font" id="first_name" name="first_name" 
                    value="<?php if($register) echo $register['first_name']; ?>" style="border: 1px solid #4fc3c5;">
                                                        </p>
                                                        <p class="form-row form-row-wide">
                                                            <label for="last_name">Last Name<span class="required">*</span></label>
                                                             <input type="text" class="form-control no-border mat-txt mat-font" id="last_name" name="last_name" value="<?php if($register) echo $register['last_name']; ?>" style="border: 1px solid #4fc3c5;">
                                                        </p>
                                                                                                              

                                                        <p class="form-row form-row-wide">
                                                        
                                                            <label for="mobile">Mobile<span class="bmd-label-floating">*</span></label>
                                                            <input type="hidden" class="form-control country_code" name="country_code" id="country_code" value="">
                                                             <input type="text" class="form-control no-border mat-txt mat-font is-filled" id="mobile" name="mobile" style="border: 1px solid #4fc3c5;border-radius: 25px;">
             
                                                        </p>
                                                        <p class="form-row form-row-wide">
                                                            <label for="email">Email address<span class="required">*</span></label>
                                                             <input type="email" class="form-control no-border mat-txt mat-font" id="email1" name="email1" style="border: 1px solid #4fc3c5;">
                                                        </p>
                                                        <p class="form-row form-row-wide">
                                                            <label for="confirm_email">Confirm Email <span class="required">*</span></label>
                                                             <input type="email" class="form-control no-border mat-txt mat-font" id="confirm_email" name="confirm_email" style="border: 1px solid #4fc3c5;">
                                                        </p>
                                                        <p class="form-row form-row-wide">
                                                            <label for="reg_password">Password<span class="required">*</span></label>
                                                             <input type="password" class="form-control no-border mat-txt mat-font" id="reg_password" name="reg_password" style="border: 1px solid #4fc3c5;">
                                                        </p>
                                                        <p class="form-row form-row-wide">
                                                            <label for="confirm_password">Confirm Password:<span class="required">*</span></label>
                                                              <input type="password" class="form-control no-border mat-txt mat-font" id="confirm_password" name="confirm_password" style="border: 1px solid #4fc3c5;">
                                                        </p>
														<div class="terms-con-wrap text-center">
                    <div class="privacy-policy"> <span class="help-txt2 text-center">*Agree to our <a href="">Terms & Conditions</a> and <a href="">Privacy Policy.</a></span> </div>
                    <div class="reg-form-margin">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox" name="newsletter" id="newsletter" value="1">
                          <span class="help-txt inline-block">I would like to receive news, offers and promotions from Yalalink</span> </label>
                      </div>
                    </div>
                  </div>
                                                        <p class="form-row"><input type="submit" class="button" name="register" value="Register" /></p>

                                                        

                                                    </form>

                                                </div><!-- .col-2 -->

                                            </div><!-- .col2-set -->

                                        </div><!-- /.customer-login-form -->
                                    </div><!-- .woocommerce -->
                                </div><!-- .entry-content -->

                            </article><!-- #post-## -->

                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div><!-- .col-full -->
            </div><!-- #content -->

            

            <footer id="colophon" class="site-footer">
            	<!--<div class="footer-widgets">
            		<div class="container">
            			<div class="row">
            				<div class="col-lg-4 col-md-4 col-xs-12">
            					<aside class="widget clearfix">
            						<div class="body">
            							<h4 class="widget-title">Featured Products</h4>
            							<ul class="product_list_widget">
            								<li>
            									<a href="single-product.html" title="Tablet Thin EliteBook  Revolve 810 G6">
            										<img class="wp-post-image" data-echo="assets/images/footer/1.jpg" src="assets/images/blank.gif" alt="">
            										<span class="product-title">Tablet Thin EliteBook  Revolve 810 G6</span>
            									</a>
            									<span class="electro-price"><span class="amount">&#36;1,300.00</span></span>
            								</li>

            								<li>
            									<a href="single-product.html" title="Smartphone 6S 128GB LTE">
            										<img class="wp-post-image" data-echo="assets/images/footer/2.jpg" src="assets/images/blank.gif" alt=""><span class="product-title">Smartphone 6S 128GB LTE</span>
            									</a>
            									<span class="electro-price"><span class="amount">&#36;780.00</span></span>
            								</li>

            								<li>
            									<a href="single-product.html" title="Smartphone 6S 64GB LTE">
            										<img class="wp-post-image" data-echo="assets/images/footer/3.jpg" src="assets/images/blank.gif" alt="">
            										<span class="product-title">Smartphone 6S 64GB LTE</span>
            									</a>
            									<span class="electro-price"><span class="amount">&#36;1,215.00</span></span>
            								</li>
            							</ul>
            						</div>
            					</aside>
            				</div>
            				<div class="col-lg-4 col-md-4 col-xs-12">
            					<aside class="widget clearfix">
            						<div class="body"><h4 class="widget-title">Onsale Products</h4>
            							<ul class="product_list_widget">
            								<li>
            									<a href="single-product.html" title="Notebook Black Spire V Nitro  VN7-591G">
            										<img class="wp-post-image" data-echo="assets/images/footer/3.jpg" src="assets/images/blank.gif" alt="">
            										<span class="product-title">Notebook Black Spire V Nitro  VN7-591G</span>
            									</a>
            									<span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
            								</li>

            								<li>
            									<a href="single-product.html" title="Tablet Red EliteBook  Revolve 810 G2">
            										<img class="wp-post-image" data-echo="assets/images/footer/4.jpg" src="assets/images/blank.gif" alt="">
            										<span class="product-title">Tablet Red EliteBook  Revolve 810 G2</span>
            									</a>
            									<span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
            								</li>

            								<li>
            									<a href="single-product.html" title="Widescreen 4K SUHD TV">
            										<img class="wp-post-image" data-echo="assets/images/footer/5.jpg" src="assets/images/blank.gif" alt="">
            										<span class="product-title">Widescreen 4K SUHD TV</span>
            									</a>
            									<span class="electro-price"><ins><span class="amount">&#36;2,999.00</span></ins> <del><span class="amount">&#36;3,299.00</span></del></span>
            								</li>
            							</ul>
            						</div>
            					</aside>
            				</div>
            				<div class="col-lg-4 col-md-4 col-xs-12">
            					<aside class="widget clearfix">
            						<div class="body">
            							<h4 class="widget-title">Top Rated Products</h4>
            							<ul class="product_list_widget">
            								<li>
            									<a href="single-product.html" title="Notebook Black Spire V Nitro  VN7-591G">
            										<img class="wp-post-image" data-echo="assets/images/footer/6.jpg" src="assets/images/blank.gif" alt="">
            										<span class="product-title">Notebook Black Spire V Nitro  VN7-591G</span>
            									</a>
            									<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
            								</li>

            								<li>
            									<a href="single-product.html" title="Apple MacBook Pro MF841HN/A 13-inch Laptop">
            										<img class="wp-post-image" data-echo="assets/images/footer/7.jpg" src="assets/images/blank.gif" alt="">
            										<span class="product-title">Apple MacBook Pro MF841HN/A 13-inch Laptop</span>
            									</a>
            									<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><span class="amount">&#36;1,800.00</span></span>
            								</li>

            								<li>
            									<a href="single-product.html" title="Tablet White EliteBook Revolve  810 G2">
            										<img class="wp-post-image" data-echo="assets/images/footer/2.jpg" src="assets/images/blank.gif" alt="">
            										<span class="product-title">Tablet White EliteBook Revolve  810 G2</span>
            									</a>
            									<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><span class="amount">&#36;1,999.00</span></span>
            								</li>
            							</ul>
            						</div>
            					</aside>
            				</div>
            			</div>
            		</div>
            	</div>
-->
            	

            	 </footer><!-- #colophon -->
            
 

  </div>
  <!-----col------->
</div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
<script src="assets/admin/vendor/babel-external-helpers/babel-external-helpers.js"></script> 
<script src="assets/front_end/js/intlTelInput.js"></script> 
<script src="assets/front_end/js/defaultCountryIp.js"></script> 
<script src="assets/front_end/js/jquery.validate.js"></script>


<script type="application/javascript">

$(document).ready(function() {
	$('#register').on('click', function(){
    $('#list-profile-list').removeClass('active');
    $('#list-home-list').addClass('active');
    $('#list-profile').removeClass('active');
    $('#list-profile').removeClass('show');
    $('#list-home').addClass('show');
    $('#list-home').addClass('active');
});
$("#login-form").validate({
			rules: {
				email: "required",
				password: "required"
			},
			messages: {
				email: "Please enter the email",
				password: "Please enter the password"
			}
		});
$("#registration-form").validate({
			rules: {
				first_name: "required",
				last_name: "required",
				/*email: {
					required: true,
					email: true
				},*/
				email1: {
					required: true,
					email: true/*,
					remote: {
						url: "validateEmail",
						type: "post"
					 }*/
				},
				confirm_email: {
					required: true,
					email: true,
					equalTo: "#email1"
				},
				reg_password: {
					required: true,
					minlength: 6
				},
				confirm_password: {
					required: true,
					minlength: 6,
					equalTo: "#reg_password"
				}
			},
			messages: {
				first_name: "Please enter the first name",
				last_name: "Please enter the last name",
				email: {
					required: "Please enter your email address.",
					email: "Please enter a valid email address.",
					remote: "Email already exist"
				},
				confirm_email: {
					required: "Please enter a valid email address",
					equalTo: "Please enter the same email as above"
				},
				reg_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				}
			}
		});
});
</script>
        
        <script type="text/javascript" src="assets/js/jquery.min.js"></script>
        <script type="text/javascript" src="assets/js/tether.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="assets/js/echo.min.js"></script>
        <script type="text/javascript" src="assets/js/wow.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="assets/js/electro.js"></script>

  
