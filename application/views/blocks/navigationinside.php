
<nav class="navbar navbar-primary navbar-full" >
				<div class="container">
				<div class="navlogo">
			  <a href="<?=base_url()?>" class="header-logo-link">
								<img src="<?=base_url()?>assets/front_end/images/logo-WEB.png">
							</a>
				</div>
					<ul class="nav navbar-nav departments-menu animate-dropdown">
						<li class="nav-item dropdown ">

							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" id="departments-menu-toggle" >Menu</a>
							<ul id="menu-vertical-menu" class="dropdown-menu yamm departments-menu-dropdown" style="display:none;">
								<li class="menu-item animate-dropdown"><a title="Home" href="<?=Core::getBaseUrl()?>">Home</a></li>
								<li class="menu-item animate-dropdown"><a title="Auto" href="<?=Core::getBaseUrl()?>auto">Auto</a></li>
								<li class="menu-item animate-dropdown"><a title="Real Estate new" href="<?=Core::getBaseUrl()?>real-estate">Real Estate</a></li>
								<li class="menu-item animate-dropdown"><a title="Classifieds" href="<?=Core::getBaseUrl()?>classifieds">Classifieds</a></li>
								<li class="menu-item animate-dropdown"><a title="Jobs" href="<?=Core::getBaseUrl()?>jobs">Jobs</a></li>
								<li class="menu-item animate-dropdown"><a title="Electronics" href="<?=Core::getBaseUrl()?>electronics">Electronics</a></li>
								<li class="menu-item animate-dropdown"><a title="Phones" href="<?=Core::getBaseUrl()?>phones">Phones</a></li>
								<li class="menu-item animate-dropdown"><a title="Computers" href="<?=Core::getBaseUrl()?>computers">Computers</a></li>
								<li class="menu-item animate-dropdown"><a title="Services" href="<?=Core::getBaseUrl()?>services">Services</a></li>
							</ul>
						</li>
					</ul>
					 
									<ul id="menu-main-menu" class="nav nav-inline yamm">
										<li class="menu-item menu-item-has-children animate-dropdown dropdown"><a title="Home" href="<?=base_url()?>" aria-haspopup="true">Home</a>
										<li class="menu-item animate-dropdown"><a title="About Us" href="<?=base_url()?>about_us">About Us</a></li>
										<li class="menu-item menu-item-has-children animate-dropdown dropdown"><a title="Blog" href="<?=base_url()?>contact_us" aria-haspopup="true">Contact Us</a></li>
										<li class="menu-item"><a title="Features" href="<?=base_url()?>privacy_policy">Privacy Policy</a></li>
									</ul>
								</nav> 

					<ul class="navbar-mini-cart navbar-nav animate-dropdown nav pull-right flip">
						<li class="nav-item dropdown">
							<a href="<?=base_url()?>privacy_policy" class="nav-link" data-toggle="">
								
								<span class="cart-items-count count"></span>
								<span class="cart-items-total-price total-price">Privacy Policy</span>
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

												<!--<span class="quantity">2 × <span class="amount">£150.00</span></span>-->
											</li>


											<li class="mini_cart_item">
												<a title="Remove this item" class="remove" href="#">×</a>
											  <a href="single-product.html">
													<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart2.jpg" alt="">PlayStation 4&nbsp;
												</a>

											   <!-- <span class="quantity">1 × <span class="amount">£399.99</span></span>-->
											</li>

											<li class="mini_cart_item">
												<a data-product_sku="" data-product_id="34" title="Remove this item" class="remove" href="#">×</a>
												<a href="single-product.html">
												<img class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" src="assets/images/products/mini-cart3.jpg" alt="">POV Action Cam HDR-AS100V&nbsp;

												</a>

											   <!-- <span class="quantity">1 × <span class="amount">£269.99</span></span>-->
											</li>


										</ul><!-- end product list -->


									   <!-- <p class="total"><strong>Subtotal:</strong> <span class="amount">£969.98</span></p>-->


										<p class="buttons">
										   <!-- <a class="button wc-forward" href="cart.html">View Cart</a>
											<a class="button checkout wc-forward" href="checkout.html">Checkout</a>-->
										</p>


									</div>
								</li>
							</ul>
						</li>
					</ul>

					<ul class="navbar-wishlist nav navbar-nav pull-right flip">
						<li class="nav-item">
							<a href="<?=base_url()?>contact_us" class="nav-link">Contact us</a>
						</li>
					</ul>
					<ul class="navbar-compare nav navbar-nav pull-right flip">
					   <li class="nav-item">
							<a href="<?=base_url()?>about_us" class="nav-link">About us</a>
						</li>
					</ul>
					<ul class="navbar-compare nav navbar-nav pull-right flip">
					   <li class="nav-item">
							<a href="<?=base_url()?>" class="nav-link">Home</a>
						</li>
					</ul>
					
					
					<div class="primary-nav animate-dropdown" style="display:none;">
							<div class="clearfix">
								 <button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#default-header" style="color: white;">
										&#9776;
								 </button>
							 </div>

							<div class="collapse navbar-toggleable-xs" id="default-header">
							 <!--<form class="navbar-search" method="get" action="/">
						<label class="sr-only screen-reader-text" for="search">Search for:</label>
						<div class="input-group">
							<input type="text" id="search" class="form-control search-field" dir="ltr" value="" name="s" placeholder="Search for products" />
							<div class="input-group-addon search-categories">
								<select name='product_cat' id='product_cat' class='postform resizeselect' >
									<option value='0' selected='selected'>All Categories</option>
									<option class="level-0" value="laptops-laptops-computers">Laptops</option>
								  
								   
								</select>
							</div>
							<div class="input-group-btn">
								<input type="hidden" id="search-param" name="post_type" value="product" />
								<button type="submit" class="btn btn-secondary"><i class="ec ec-search"></i></button>
							</div>
						</div>
					</form>-->
							<div class ="toggle_menu_mobile">
								<ul style="list-style:none;">
									<li><a title="Home" href="<?=Core::getBaseUrl()?>">Home</a></li>
									<li><a title="Real Estate new" href="<?=Core::getBaseUrl()?>real-estate">Real Estate</a></li>
									<li><a title="Jobs" href="<?=Core::getBaseUrl()?>jobs">Jobs</a></li>
									<li> <a title="Auto" href="<?=Core::getBaseUrl()?>auto">Auto</a></li>
									<li><a title="Classifieds" href="<?=Core::getBaseUrl()?>classifieds">Classifieds</a></li>
									<li><a title="Classifieds" href="<?=Core::getBaseUrl()?>classifieds">Classifieds</a></li>
									<li><a title="Electronics" href="<?=Core::getBaseUrl()?>electronics">Electronics</a></li>
									<li><a title="Phones" href="<?=Core::getBaseUrl()?>phones">Phones</a></li>
									<li><a title="Computers" href="<?=Core::getBaseUrl()?>computers">Computers</a></li>
									<li><a title="House Maids" href="<?=Core::getBaseUrl()?>housemaids">House Maids</a></li>
									<li><a title="Woman & Beauty" href="<?=Core::getBaseUrl()?>women-beauty">Woman & Beauty</a></li>
									<li><a title="Health Care" href="<?=Core::getBaseUrl()?>healthcare">Health Care</a></li>
									<li><a title="Education" href="<?=Core::getBaseUrl()?>education">Education</a></li>
									<li><a title="Services" href="<?=Core::getBaseUrl()?>services">Services</a></li>
								</ul>
							</div>
								
							</div>
						</div>
					
				</div>
			  
			</nav>
		   </div>
		   