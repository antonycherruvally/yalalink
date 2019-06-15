<?php
if($this->session->userdata('country_code')){
	$country_code = $this->session->userdata('country_code');
	$currency = $this->session->userdata('currency');
}else{
	$country = array('AE','OM','SA','KW','BH','EG','LB','JR');
	if(in_array($res->country_code, $country)) {
		$currency = $this->yalalink_model->getCurrency($res->country_code);
		$newdata = array(
						   'country'  => $res->country,
								   'country_code'  => $res->country_code,
						   'city'     => $res->city,
						   'currency' => $currency->currency,
						   'latitude' => $res->latitude,
						   'longitude' => $res->longitude
					   );
		$this->session->set_userdata($newdata);
		$country_code = $this->session->userdata('country_code');
		$currency = $this->session->userdata('currency');
	}else{
		$newdata = array(
					   'country'  => 'United Arab Emirates',
					   'country_code'  => 'AE',
					   'city'     => 'Dubai',
					   'currency' => 'AED',
					   'latitude' => '25.1968143',
					   'longitude' => '55.2709185'
				   );
		$this->session->set_userdata($newdata);
		$country_code = $this->session->userdata('country_code');
		$currency = $this->session->userdata('currency');
	}
}
 $userdata = $this->session->userdata('logged_yalalink_userdata');
?>
<style type="text/css">
	.current-country {
		text-decoration: underline !important;
		background: #8080802e;
    padding: 2px 5px 1px 4px;
    border-radius: 6px;
	}
</style>
<div class="top-bar mobtopcntry">
	<div class="container">
		<nav>
			<!-- <ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
				<li class="menu-item animate-dropdown ">
					<a title="Yalalink UAE" class="<?php if($country_code=='AE') echo 'current-country'; ?>" href="set_country/AE">UAE</a>
				</li>
				<li class="menu-item animate-dropdown ">
					<a title="Yalalink OMN" class="<?php if($country_code=='OM') echo 'current-country'; ?>" href="set_country/OM">Oman</a>
				</li>
				<li class="menu-item animate-dropdown ">
					<a title="Yalalink SAK" class="<?php if($country_code=='SA') echo 'current-country'; ?>" href="set_country/SA">Saudi Arabia</a>
				</li>
				<li class="menu-item animate-dropdown ">
					<a title="Yalalink KWT" class="<?php if($country_code=='KW') echo 'current-country'; ?>" href="set_country/KW">Kuwait</a>
				</li>
				<li class="menu-item animate-dropdown ">
					<a title="Yalalink BAH" class="<?php if($country_code=='BH') echo 'current-country'; ?>" href="set_country/BH">Bahrain</a>
				</li>
                <li class="menu-item animate-dropdown ">
					<a title="Yalalink EGY" class="<?php if($country_code=='EG') echo 'current-country'; ?>" href="set_country/EG">Egypt</a>
				</li>
                <li class="menu-item animate-dropdown ">
					<a title="Yalalink LBN" class="<?php if($country_code=='LB') echo 'current-country'; ?>" href="set_country/LB">Lebanon</a>
				</li>
                <li class="menu-item animate-dropdown ">
					<a title="Yalalink JRD" class="<?php if($country_code=='JR') echo 'current-country'; ?>" href="set_country/JR">Jordan</a>
				</li>
			</ul> -->
            <ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip mobilecountry">
				<li class="menu-item animate-dropdown ">
					<a title="Yalalink UAE" class="<?php if($country_code=='AE') echo 'current-country'; ?>" href="set_country/AE">UAE<img src="assets/front_end/images/uae.jpg" width="18px" height="15px"></a>
				</li>
		
				<li class="menu-item animate-dropdown ">
					<a title="Yalalink" class="<?php if($country_code=='SA') echo 'current-country'; ?>" href="set_country/SA">KSA<img src="assets/front_end/images/saudi.jpg" width="18px" height="15px"></a>
				</li>
                <li class="menu-item animate-dropdown ">
					<a title="Yalalink" class="<?php if($country_code=='OM') echo 'current-country'; ?>" href="set_country/OM">OMN<img src="assets/front_end/images/oman.jpg" width="18px" height="15px"></a>
				</li>
				<li class="menu-item animate-dropdown ">
					<a title="Yalalink" class="<?php if($country_code=='KW') echo 'current-country'; ?>" href="set_country/KW">KWT<img src="assets/front_end/images/kuwait.jpg" width="18px" height="15px"></a>
				</li>
				<li class="menu-item animate-dropdown ">
					<a title="Yalalink" class="<?php if($country_code=='BH') echo 'current-country'; ?>" href="set_country/BH">BHR<img src="assets/front_end/images/bahrain.jpg" width="18px" height="15px"></a>
				</li>
                <li class="menu-item animate-dropdown ">
					<a title="Yalalink UAE" class="<?php if($country_code=='EG') echo 'current-country'; ?>" href="set_country/EG">EGY<img src="assets/front_end/images/egypt.jpg" width="15px" height="12px" style="margin-top: 1px;"></a>
				</li>
                 <li class="menu-item animate-dropdown ">
					<a title="Yalalink UAE" class="<?php if($country_code=='LB') echo 'current-country'; ?>" href="set_country/LB">LBN<img src="assets/front_end/images/lebanon.png" width="15px" height="15px"></a>
				</li>
                
                <li class="menu-item animate-dropdown ">

					<a title="Welcome to Worldwide Electronics Store" class="<?php if($country_code=='JR') echo 'current-country'; ?>" href="set_country/JR">JOR<img src="assets/front_end/images/jordan.png" width="15px" height="15px"></a>


				</li>
			</ul>
		</nav>
		
		<nav>
			<!-- <ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
				<!-- <li class="menu-item animate-dropdown"><a title="Store Locator" href="#"><i class="ec ec-map-pointer"></i>Store Locator</a></li>
				<li class="menu-item animate-dropdown"><a title="Track Your Order" href="track-your-order.html"><i class="ec ec-transport"></i>Track Your Order</a></li>
				<li class="menu-item animate-dropdown"><a title="Shop" href="shop.html"><i class="ec ec-shopping-bag"></i>Shop</a></li> -->
                <!--  <?php if($userdata){
			if ( @$userdata['image'] ) {
	$timg = 'uploads/users/thumb/' . @$userdata['image'];
	$img = 'uploads/users/' . @$userdata['image'];
} else {
	$timg = 'assets/front_end/images/user-thumb.jpg';
	$img = 'assets/front_end/images/user-thumb.jpg';
} ?>
        <div class="header-login dropdown"> <a class="login-link logged-avathar dropdown-toggle" href="javascript:void(0);" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="pro-image" src="<?php if(file_exists(@$timg)) echo $timg; else echo $img; ?>"> <?php echo $userdata['name']; ?> <span class="logged-angle d-inline"><i class="" aria-hidden="true"></i></span> </a>
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
		<li class="menu-item animate-dropdown mobilelnone"><a title="My Account" href="<?=Core::getBaseUrl()?>login"><i class="ec ec-user"></i>Login / Sign Up</a>
		<?php } ?>
				
                
                </li> 
			</ul> -->
		</nav>
	</div>
</div><!-- /.top-bar -->