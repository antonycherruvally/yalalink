<?php $this->load->view('blocks/header'); 
$currency = $this->session->userdata('currency');?>
<style type="text/css">
.store-sec-detail-img{
	/*object-fit:cover !important;*/
	height:400px;
}
</style>
<div class="container">
<?php if($this->session->flashdata('message')){ ?>
<?php echo $this->session->flashdata('message'); ?>
<?php } ?>
 <div id="content" class="site-content" tabindex="-1">
				<div class="container">

					<nav class="woocommerce-breadcrumb">
						<a href="index">Home</a>
						<span class="delimiter"><i class="fa fa-angle-right"></i></span>
					   <a href="jobs">Jobs</a>
						<span class="delimiter"><i class="fa fa-angle-right"></i></span>
						<a href="jobs?type=Hiring">Job Offers</a>
						<span class="delimiter"><i class="fa fa-angle-right"></i>
					   <a href="jobs?type=Hiring">Job Offers</a>
					</nav><!-- /.woocommerce-breadcrumb -->

					<div id="primary" class="content-area">
						<main id="main" class="site-main">
						<?php $image = $this->yalalink_model->getUserDetails($view->user_id);
	  $position = $this->yalalink_model->getPosition($view->position);
	  $industry = $this->yalalink_model->getIndustry($view->industry);
	  $nationality = $this->yalalink_model->getNationality($view->nationality);
	  $country = $this->yalalink_model->getLocation($view->country);
	  $location = $this->yalalink_model->getLocation($view->location);
	  $area = $this->yalalink_model->getLocation($view->area);
	  $utitle = preg_replace("/[^a-zA-Z0-9 ]+/", "", $image->company_name);
	  $utitle = str_replace('  ',' ',strtolower($utitle));
	  $utitle = str_replace(' ','-',$utitle);
	  $ulatest = $utitle.'-'.$view->id;
	  if(@$image->image) {
		 $img = 'uploads/users/thumb/'.@$image->image;
	  }else{ 
		 $img = 'assets/front_end/images/user-thumb.jpg'; 
	  }
	  if($location) {
		 $location = $location->location.', ';
	  }else{
		  $location = '';
	  }
	  if($area) {
		 $area = $area->location.', ';
	  }else{
		  $area = '';
	  }
	  if($country) {
		 $country = $country->name;
	  }else{
		  $country = '';
	  } ?>

							<div class="product">

								<div class="single-product-wrapper">
									<div class="product-images-wrapper">
									   
										<div class="images electro-gallery">
										
										<div class="col-md-8 col-sm-12">
                      <?php
                       if($view->gender == 'Male')
                        {
                           $img = "assets/front_end/images/malejob.jpg" ;
                        }
                      if($view->gender == 'Any Gender')
                        {
                           $img = "assets/front_end/images/malejob.jpg" ;
                        }
                      if($view->gender == 'Female')
                        {
                           $img = "assets/front_end/images/femalejob.jpg" ;
                        }
                        if($view->gender == '')
                        {
                           $img = "assets/front_end/images/3352.jpg" ;
                        }
        ?>
        <div class="jobimage">
        <img src="<?php echo $img;?>" style="margin-bottom: 49px;">
      </div>
									</div><!-- /.product-images-wrapper -->

									<div class="summary entry-summary">

										<span class="loop-product-categories">
											  <a href="auto?category=<?php echo $view->category; ?>&type=<?php echo $view->type; ?>"><?php echo $view->cat; ?></a>
										</span><!-- /.loop-product-categories -->
                                        <h1 itemprop="name" class="product_title entry-title" style="color: #662d91;margin-top: 62px;"><?php echo @$view->title_en; ?></h1>
<!--                                         <h3 itemprop="name" class="product_title entry-title"  style="color: red;"><?php echo @$currency; ?> <?php if($view->offer_price!=0) { echo number_format(@$view->offer_price); }else{ echo number_format(@$view->price); }?> <span><?php if($view->offer_price!=0) { echo number_format(@$view->price); }?></span></h3>
-->
<p>Post date: <?= Core::getHelper('date')->timePassed($postdate->added_date) ?></p>
										<div class="woocommerce-product-rating">
										   <!-- <div class="star-rating" title="Rated 4.33 out of 5">-->
												<!--<span style="width:86.6%">
													<strong itemprop="ratingValue" class="rating">4.33</strong>
													out of <span itemprop="bestRating">5</span>				based on
													<span itemprop="ratingCount" class="rating">3</span>
													customer ratings
												</span>-->
											</div>
                                        </div><!-- .woocommerce-product-rating -->

                                      <!--  <div class="brand">
                                            <a href="file:///F|/yalalink/yalalink/HTML/product-category.html">
                                                <img src="file:///F|/yalalink/yalalink/HTML/assets/images/single-product/brand.png" alt="Gionee" />
                                            </a>
                                        </div>--><!-- .brand -->

                                       <!-- <div class="availability in-stock">Availablity: <span>In stock</span></div>--><!-- .availability -->

                                        <!--<hr class="single-product-title-divider" />-->

                                        <!--<div class="action-buttons">

                                            <a href="#" class="add_to_wishlist" >
                                                Wishlist
                                            </a>


                                            <a href="#" class="add-to-compare-link" data-product_id="2452">Compare</a>
                                        </div>--><!-- .action-buttons -->

                                        <div itemprop="description">
                                           

                                           
                                           
                                        </div><!-- .description -->

                                        <!--<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

                                            <p class="price"><span class="electro-price"><ins><span class="amount">&#36;1,215.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span></p>

                                            <meta itemprop="price" content="1215" />
                                            <meta itemprop="priceCurrency" content="USD" />
                                            <link itemprop="availability" href="http://schema.org/InStock" />

                                        </div>--><!-- /itemprop -->

                                        <!--<form class="variations_form cart" method="post">

                                            <table class="variations">
                                                <tbody>
                                                    <tr>
                                                        <td class="label"><label>Color</label></td>
                                                        <td class="value">
                                                            <select class="" name="attribute_pa_color">
                                                                <option value="">Choose an option</option>
                                                                <option value="black-with-red" >Black with Red</option>
                                                                <option value="white-with-gold"  selected='selected'>White with Gold</option>
                                                            </select>
                                                            <a class="reset_variations" href="#">Clear</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>


                                            <div class="single_variation_wrap">
                                                <div class="woocommerce-variation single_variation"></div>
                                                <div class="woocommerce-variation-add-to-cart variations_button">
                                                    <div class="quantity">
                                                        <label>Quantity:</label>
                                                        <input type="number" name="quantity" value="1" title="Qty" class="input-text qty text"/>
                                                    </div>
                                                    <button type="submit" class="single_add_to_cart_button button">Add to cart</button>
                                                    <input type="hidden" name="add-to-cart" value="2452" />
                                                    <input type="hidden" name="product_id" value="2452" />
                                                    <input type="hidden" name="variation_id" class="variation_id" value="0" />
                                                </div>
                                            </div>
                                        </form>-->

                                    </div><!-- .summary -->
                                </div><!-- /.single-product-wrapper -->


                                <div class="woocommerce-tabs wc-tabs-wrapper">
                                    <ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs1" role="tablist" style="margin-left: 7px;">
                                       <!-- <li class="nav-item accessories_tab">
                                            <a href="#tab-accessories" data-toggle="tab">Contact</a>
                                        </li>-->

                                        <li class="nav-item2 description_tab1">
                                            <a href="#tab-description" class="active" data-toggle="tab" style="font-size: 14px;">Details</a>
                                        </li>

                                        

                                    </ul>

                                    <div class="tab-content" style="margin-left: 23px;">
                                        <div class="tab-pane panel entry-content wc-tab" id="tab-accessories">

                                            <div class="accessories">

                                                <div class="electro-wc-message"></div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-9 col-left">
                                                           <table class="table">
                                                       <tbody>
                                                       <tr><td>Industry:</td>
              <td><i class="show_color"><?php echo $industry->title; ?></i></td></tr>
          <tr><td>Position:</td>
              <td><?php echo $position->title; ?></i></td></tr>
         <tr><td>Level:</td>
              <td><?php echo $view->level; ?></i></td></tr>
          <tr><td>Type:</td>
              <td><?php echo $view->job_type; ?></i></td>
         <tr><td>Qualification:</td>
              <td><?php echo $view->qualification; ?></i></td>
          </tr><tr><td>Gender:</td>
              <td><i class="show_color"><?php echo $view->gender; ?></i></td></tr>
         <tr><td>Nationality:</td>
              <td><i class="show_color"><?php if($nationality) echo $nationality->name; ?></i></td></tr>
         <tr><td>Salary:</td>
              <td><?php echo $view->salary; ?></td></tr></tbody></table>
          

                                                        <div class="check-products">
                                                           

                                                            

                                                           
                                                        </div><!-- /.check-products -->

                                                    </div><!-- /.col -->

                                                   <!-- /.col -->
                                                </div><!-- /.row -->

                                            </div><!-- /.accessories -->
                                        </div>

                                        <div class="tab-pane active in panel entry-content wc-tab" id="tab-description">
                                            <div class="electro-description">

                                                
                                                 <?php $description = $this->yalalink_model->makeLinks($view->description); echo @$description; ?>
                                                 <table class="table">
                                                       <tbody>
                                                       <tr><td>Industry:</td>
              <td><i class="show_color"><?php echo $industry->title; ?></i></td></tr>
          <tr><td>Position:</td>
              <td><?php echo $position->title; ?></i></td></tr>
         <tr><td>Level:</td>
              <td><?php echo $view->level; ?></i></td></tr>
          <tr><td>Type:</td>
              <td><?php echo $view->job_type; ?></i></td>
         <tr><td>Qualification:</td>
              <td><?php echo $view->qualification; ?></i></td>
          </tr><tr><td>Gender:</td>
              <td><i class="show_color"><?php echo $view->gender; ?></i></td></tr>
         <tr><td>Nationality:</td>
              <td><i class="show_color"><?php if($nationality) echo $nationality->name; ?></i></td></tr>
         <tr><td>Salary:</td>
              <td><?php echo $view->salary; ?>
             </td></tr>
             <tr><td>E-mail</td><td><?php echo $view->email; ?></td></tbody></table>
                                                
                                            </div><!-- /.electro-description -->

                                           
                                        </div>
                                        

                                       <!-- <div class="tab-pane panel entry-content wc-tab" id="tab-specification">
                                            <h3>Performance</h3>
                                             <ul class="list-inline row gnralbox">
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Cylinders:</label>
              <span><i class="show_color"><?php echo @$view->cylinders; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Horse Power:</label>
              <span><i class="show_color"><?php echo @$view->horsepower; ?></i></span> </p>
          </li>
        </ul>
                                        </div>--><!-- /.panel -->

                                        <div class="tab-pane panel entry-content wc-tab" id="tab-reviews">
                                          
                                        </div><!-- /.panel -->
                                    </div>

                                </div><!-- /.woocommerce-tabs -->
                               
                                   <?php
                                   if($user->cv)
                                   { ?>
                                      
                                     <div class="dowloadfile"> 
                                      <a href="<?php echo base_url(); ?>jobs/download/<?php echo $user->cv ?>">Download CV</a>
                                   </div>
                                   <?php
                                 }
                                   ?>
                               <div class="detail-btn-wrap pos-center" style="margin-top: 33px;"> 
<?php if($view->mobile){ ?>
<a href="tel:<?php echo @$view->mobile; ?>" class="hero-button btn-shadow icon-btn call-show-nmb detail-btn btn-FF9800 realsub"><span class="">Call<i class="fa fa-phone bounce-ani" aria-hidden="true" ></i></span></a> 
<?php } ?>
<?php if($view->email){ ?>
<a href="javascript:void(0);" data-toggle="modal" data-target="#sendMail" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo @$view->email; ?>" class="hero-button btn-shadow icon-btn detail-btn btn-FF9800 submail"> <span><i class="fa fa-paper-plane bounce-ani" aria-hidden="true"></i>E-mail</span></a>
<?php }else{?>
    <a href="javascript:void(0);" data-toggle="modal" data-target="" data-toggle="tooltip" data-placement="top" title="Mail to <?php echo @$view->email; ?>" class="hero-button-grey btn-shadow icon-btn detail-btn btn-FF9800 submail"> <span style="color: white;"><i class="fa fa-paper-plane bounce-ani" aria-hidden="true"></i>E-mail</span></a>

<?php }
 ?>

</div> 
 
<div class="modal fade email-to-modal" id="sendMail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-paper-plane" aria-hidden="true"></i>Send E-mail</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<form id="send_email" role="form" action="emailContact" method="post" enctype="multipart/form-data">
		<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
		<input type="hidden" name="page_url" value="<?php echo $meta_url; ?>">
		<input type="hidden" name="userid" value="<?php if(isset($userdata['userid'])) echo $userdata['userid']; ?>">
		<input type="hidden" name="postid" value="<?php echo $view->id; ?>">
		<input type="hidden" name="poster-email" value="<?php if($view->email) echo $view->email; ?>">
		<div class="modal-body">
		  <div class="row">
			<div class="col-md-6">
			<div class="form-group bmd-form-group">
			  <label for="formGroupExampleInput2" class="bmd-label-floating">Name:</label>
			  <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="name" name="name" style="border-bottom: 1px solid;
	border-radius: inherit;">
			</div>
			</div> 
			<div class="col-md-6">
			<div class="form-group bmd-form-group">
			  <label for="formGroupExampleInput2" class="bmd-label-floating">E-mail:</label>
			  <input type="email" class="form-control no-border mat-txt mat-font first-txt" id="email" name="email">
			</div>
			</div> 
		  </div>
		  <div class="row">
		  <div class="col-md-6">
			<div class="form-group bmd-form-group">
			<label for="formGroupExampleInput2" class="bmd-label-floating">Phone:</label>
			<input type="text" class="form-control no-border mat-txt mat-font first-txt" id="phone" name="phone">
			</div>
		  </div> 
		  </div>
		  <div class="row">
		  <div class="col-md-12">
	  <div class="form-group bmd-form-group">
	  <label for="exampleTextarea" class="bmd-label-floating">Message:</label>
	  <textarea class="form-control" id="message" name="message" rows="3" style="    border-bottom: 1px solid;
	border-radius: inherit;"></textarea>
	  </div>
	  </div>
		  </div>
		</div>
		<div class="modal-footer">
		  <button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit mail-btn" style="background: #de87ab;">Submit
		  </button>
		</div>
	  </form>
		</div>
	</div>
  </div>
                            </div><!-- /.product -->

                        </main><!-- /.site-main -->
                    </div><!-- /.content-area -->
                      <div id="sidebar" class="sidebar" role="complementary" style="margin-top: 15px;">
                       <aside class="widget widget_text">
                                <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]/";?>
                                     <div class="social" style="display: none;">
                                <span style="margin-left: 73px;"><a href="whatsapp://send?text=<?=$actual_link ?>" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color: green; font-size: 30px;"></i> </a></span>

                            <span style="margin-left: 46px;"><a href="#" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color: #3b5998; font-size: 30px;"></i> </a></span>

                            <span style="margin-left: 46px;"><a href="twitter://post?message=<?=$actual_link ?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color: #1da1f2; font-size: 30px;"></i> </a></span>

                          </div>
                           <div class="textwidget mobiadsview" style="margin-top: 19px;">
                 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
       <ins class="adsbygoogle"
        style="display:inline-block;width:420px;height:100px"
        data-ad-client="ca-pub-8267866280490368"
        data-ad-slot="4614962273"></ins> 
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
              </div>
          
                               </aside>
                               <aside class="widget widget_text mobgoogleadview">
                  <div class="textwidget">
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <ins class="adsbygoogle"
    style="display:inline-block;width:300px;height:600px"
    data-ad-client="ca-pub-8267866280490368"
    data-ad-slot="4614962273"></ins>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    </div>
                         </aside>
                    	<?php $this->load->view('blocks/sidebar/similarads', ['hotdeals' => $hotdeals]); ?>
                        </div>
                </div><!-- /.container -->
                 <?php $this->load->view('blocks/body/categorymenu'); ?>	 
            </div><!-- /.site-content -->

           

              <footer id="colophon" class="site-footer" style="display:none;">
            	<div class="footer-widgets">
            		<div class="container">
            			<div class="row">
            				<div class="col-lg-4 col-md-4 col-xs-12">
            					<aside class="widget clearfix">
            						<div class="body">
            							<h4 class="widget-title">Special Deals</h4>
            							
            								
            									<?php include('include/special_deals.php'); ?>
            								
            							</ul>
            						</div>
            					</aside>
            				</div>
            				<div class="col-lg-4 col-md-4 col-xs-12">
            					<aside class="widget clearfix">
            						<div class="body"><h4 class="widget-title">Hot Deals</h4>
            							
            								<?php include('include/hot_deals.php'); ?>
            							
            						</div>
            					</aside>
            				</div>
            				<div class="col-lg-4 col-md-4 col-xs-12">
            					<aside class="widget clearfix">
            						<div class="body">
            							<h4 class="widget-title">Top Rated Products</h4>
            							<ul class="product_list_widget">
            								<li>
            									<a href="single-product.php" title="Notebook Black Spire V Nitro  VN7-591G">
            										<img class="wp-post-image" data-echo="assets/images/footer/6.jpg" src="assets/images/blank.gif" alt="">
            										<span class="product-title">Notebook Black Spire V Nitro  VN7-591G</span>
            									</a>
            									<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
            								</li>

            								<li>
            									<a href="single-product.php" title="Apple MacBook Pro MF841HN/A 13-inch Laptop">
            										<img class="wp-post-image" data-echo="assets/images/footer/7.jpg" src="assets/images/blank.gif" alt="">
            										<span class="product-title">Apple MacBook Pro MF841HN/A 13-inch Laptop</span>
            									</a>
            									<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><span class="amount">&#36;1,800.00</span></span>
            								</li>

            								<li>
            									<a href="single-product.php" title="Tablet White EliteBook Revolve  810 G2">
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

            	

            	
            		
            	
            </footer><!-- #colophon -->
             <div class="tab-content col-md-12 real-estate-tab result-div" id="post-results"> </div>
  <!-- Choose country -->
 

  </div>
  <!-----col------->
</div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>

	   