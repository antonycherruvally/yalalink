<?php $userdata = $this->session->userdata('logged_yalalink_userdata');	?>
<nav class="navbar navbar-primary navbar-full">
				<div class="container">
				<div class="navlogo">
			  <a href="<?=base_url()?>" class="header-logo-link">
								<img src="<?=base_url()?>assets/front_end/images/logo-w.png">
							</a>
				</div>
					<ul class="nav navbar-nav departments-menu animate-dropdown">
						<li class="nav-item dropdown ">
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="departments-menu-toggle" >Menu</a>
							<ul id="menu-vertical-menu" class="dropdown-menu yamm departments-menu-dropdown" style="display:none;">
								<li class="menu-item animate-dropdown"><a title="Home" href="<?=Core::getBaseUrl()?>">Home</a></li>
								<li class="menu-item animate-dropdown"><a title="Real Estate" href="<?=Core::getBaseUrl()?>about_us">About us</a></li>
								<li class="menu-item animate-dropdown"><a title="Jobs" href="<?=Core::getBaseUrl()?>contact_us">Contact us</a></li>
								<li class="menu-item animate-dropdown"><a title="Auto" href="<?=Core::getBaseUrl()?>privacy_policy">Privacy Policy</a></li>
							</ul>
						</li>
					</ul>
					<ul class="navbar-mini-cart navbar-nav animate-dropdown nav flip">
						<li class="nav-item dropdown">
								 <a href="<?=Core::getBaseUrl()?>real-estate" class="nav-link" data-toggle="">
							   Real Estate
							</a>
							</a>
							<ul class="dropdown-menu dropdown-menu-mini-cart">
								<li>
									<div class="widget_shopping_cart_content">
										<ul class="cart_list product_list_widget ">
											<li class="mini_cart_item">
												<a title="Remove this item" class="remove" href="#">×</a>
												<a href="single-product.html">
													<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart1.jpg" alt="">White lumia 9001&nbsp;
												</a>
												<span class="quantity">2 × <span class="amount">£150.00</span></span>
											</li>
											<li class="mini_cart_item">
												<a title="Remove this item" class="remove" href="#">×</a>
												<a href="single-product.html">
													<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart2.jpg" alt="">PlayStation 4&nbsp;
												</a>
											</li>
											<li class="mini_cart_item">
												<a data-product_sku="" data-product_id="34" title="Remove this item" class="remove" href="#">×</a>
												<a href="single-product.html">
												<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart3.jpg" alt="">POV Action Cam HDR-AS100V&nbsp;
												</a>
												<span class="quantity">1 × <span class="amount">£269.99</span></span>
											</li>
										</ul><!-- end product list -->
									</div>
								</li>
							</ul>
						</li>
					</ul>
					 <ul class="navbar-wishlist nav navbar-nav  flip">
						<li class="nav-item">
							<a href="<?=base_url()?>jobs" class="nav-link">Jobs</a>
						</li>
					</ul>
					 <ul class="navbar-wishlist nav navbar-nav  flip">
						<li class="nav-item">
							<a href="<?=base_url()?>auto" class="nav-link">Auto</a>
						</li>
					</ul>
					 <ul class="navbar-wishlist nav navbar-nav  flip">
						<li class="nav-item">
							<a href="<?=base_url()?>classifieds" class="nav-link">Classifieds</a>
						</li>
					</ul>
 <ul class="navbar-wishlist nav navbar-nav  flip">
						<li class="nav-item">
							<a href="<?=base_url()?>electronics" class="nav-link">Electronics</a>
						</li>
					</ul> <ul class="navbar-wishlist nav navbar-nav  flip">
						<li class="nav-item">
							<a href="<?=base_url()?>phones" class="nav-link">Phones</a>
						</li>
					</ul>
				   <ul class="navbar-wishlist nav navbar-nav  flip">
						<li class="nav-item">
							<a href="<?=base_url()?>computers" class="nav-link">Computers</a>
						</li>
					</ul>
					<ul class="navbar-compare nav navbar-nav  flip">
					   <li class="nav-item">
							<a href="<?=base_url()?>services" class="nav-link">Services</a>
						</li>
					</ul>
					 <span class="mobilenav"></span>
					 <div class="post-add-forall postmobadd mobilenav">
			  <!-- <div class="sidebar-ad"> <a href="post-an-ad" class="hero-button1 btn-place-ad add-forall-btn" style="padding: 8px 5px 8px 5px !important; left: -44px;"> 
			  <span class="ar-txt add-ar pull-right" style="margin-left: 7px;">أضف إعلانك مجانا  </span> <span class="pull-left"> post free ad</span></a> </div> -->
			</div>
					 <!--  <div class="mobile-profile">
					  
					 <?php if($userdata){
			if ( @$userdata['image'] ) {
	$timg = 'uploads/users/thumb/' . @$userdata['image'];
	$img = 'uploads/users/' . @$userdata['image'];
} else {
	$timg = 'assets/front_end/images/user-thumb.jpg';
	$img = 'assets/front_end/images/user-thumb.jpg';
}?>
						<div class="header-login-mob dropdown"> <a class="login-link-mob logged-avathar dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="pro-image" src="<?php if(file_exists(@$timg)) echo $timg; else echo $img; ?>"><br>  <span class="logged-angle d-inline"><i class="" aria-hidden="true"></i></span> </a>
		  <div class="dropdown-menu profile-open">
			<div class="content-info">
			  <div class="hero"><a href="dashboard"><?php echo $userdata['name']; ?></div>
			  <a href="dashboard" class="info-mail"><?php echo $userdata['email']; ?></a>
			  <div class="divider"></div>
			  <div class="info-sections"> <a href="dashboard">My Ads</a> <a href="dashboard">My Favourites</a>
				<div class="divider"></div>
			  </div>
			  <div class="info-sections acc-actions"> <a href="dashboard">Edit Profile</a> <a href="signout">Logout</a> </div>
			</div>
		  </div>
		</div>
		<?php }else{ ?>
		  <div class="mobilelogin" ><a title="My Account" href="<?=Core::getBaseUrl()?>login" style="color:white;margin-left: 7px;"><i class="fa fa-user" style="font-size: 18px;color: white;"></i><br><div style="margin-bottom: -22px;">Login</div></a></div>
		<?php } ?></div> -->
		
				</div>
			</nav>