<section class="box-typical hero-radius">
 <?php if($countrylatest3){
	 foreach($countrylatest3 as $val){
	 
	 $country = $val->country;
	 if($country == 3) {
		$img = "assets/front_end/images/saudi.jpg";
		$c_code = "Saudi";
		$cur_code = "SAR";
		$arabic = "السعودية";
		$realCountryCode = 'SA';
	 }else if($country == 1){ 
		$img = "assets/front_end/images/uae.jpg";
		$c_code = "UAE";
		$cur_code = "AED";
		$arabic = "الامارات";
		$realCountryCode = 'AE';
	 }
	 else if($country == 2){ 
		$img = "assets/front_end/images/oman.jpg";
		$c_code = "Oman";
		$cur_code = "OMR";
		$arabic = "عمان";
		$realCountryCode = 'OM';
	 }
	 else if($country == 4){ 
		$img = "assets/front_end/images/kuwait.jpg";
		$c_code = "Kuwait";
		$cur_code = "KD";
		$arabic = "الكويت";
		$realCountryCode = 'KW';
	 }
 break;
	 
 }
 }
 
 ?>
<!-- <h3 class="widget-title">Latest Products <?php echo $c_code ?></h3> -->
<h3 class="widget-title">
	<?php echo $main_category ?> <?php echo $c_code ?>
	<img src="<?php echo $img ?>" style="margin-left: 10px;margin-left: 8px; width: 48px;height: 39px;margin-top: -9px;">
	<span style="margin-left: 7px;">
		<?php echo $c_code_ar ?> <?php echo $arabic ?>
	</span>
	<a href="<?= Core::getBaseUrl() ?>api/?changecountry=<?= $realCountryCode ?>&redirect=<?= strtolower(str_replace(" ", "-", $main_category)) ?>">
		<span class="cGoThere">Go There</span>
	</a>
</h3>	
  <ul class="product_list_widget">
	<?php if($countrylatest3){
		$rt =  Core::getModel(str_replace(" ", "_", $main_category));
		$data = $rt->prepare( [$rt->getDetails($countrylatest3[0]->id)] );
		?>
			<li>
				<?php $this->load->view('front_end/include/countrywise', [ 'data' => $data[0] ]); ?>
			</li>
		<?php
	} ?>
		  </ul>
</section>
