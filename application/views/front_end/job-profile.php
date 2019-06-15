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
                        <a href="jobs?type=Looking">Talents Available</a>
                        <span class="delimiter"><i class="fa fa-angle-right"></i>
                        <a class="text-muted"><?php echo $image->first_name.' '.$image->last_name; ?></a>
                    </nav><!-- /.woocommerce-breadcrumb -->

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">

                            <div class="product">

                                <div class="single-product-wrapper">
                                    <div class="product-images-wrapper">
                                      
                                        <div class="images electro-gallery">
                                        
                                        <div class="col-md-8 col-sm-12">
  <!-- /.product-images-wrapper -->

                                    <div class="summary entry-summary">

                                        <span class="loop-product-categories">
                                              <a href="auto?category=<?php echo $view->category; ?>&type=<?php echo $view->type; ?>"><?php echo $view->cat; ?></a>
                                        </span><!-- /.loop-product-categories -->

                                        <h1 itemprop="name" class="product_title entry-title" style="color: #662d91;"><?php echo @$view->title_en; ?></h1>
<!--                                         <h3 itemprop="name" class="product_title entry-title"  style="color: red;"><?php echo @$currency; ?> <?php if($view->offer_price!=0) { echo number_format(@$view->offer_price); }else{ echo number_format(@$view->price); }?> <span><?php if($view->offer_price!=0) { echo number_format(@$view->price); }?></span></h3>
-->
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
                                    <ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">
                                        <li class="nav-item accessories_tab">
                                            <a href="#tab-accessories" data-toggle="tab">Contact</a>
                                        </li>

                                        <li class="nav-item description_tab">
                                            <a href="#tab-description" class="active" data-toggle="tab">Details</a>
                                        </li>

                                        

                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane panel entry-content wc-tab" id="tab-accessories">

                                            <div class="accessories">

                                                <div class="electro-wc-message"></div>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-9 col-left">
                                                         <ul class="list-inline row gnralbox">
        <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Type:</label>
              <span><i class="show_color"><?php echo @$view->type; ?></i></span> </p>
          </li>
          <?php if($view->category == 1){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Colour:</label>
              <span><i class="show_color"><?php echo @$view->color; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Body Type:</label>
              <span><i class="show_color"><?php echo @$view->body_type; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Transmission:</label>
              <span><i class="show_color"><?php echo @$view->transmission_type; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Warranty:</label>
              <span><i class="show_color"><?php echo @$view->warranty; ?></i></span> </p>
          </li>
          <?php } ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Contact Number:</label>
              <span><i class="show_color"><?php echo @$view->mobile; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Email:</label>
              <span><i class="show_color"><?php echo @$view->email; ?></i></span> </p>
          </li>
          <?php if($view->category == 2){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Body Type:</label>
              <span><i class="show_color"><?php echo @$view->body_type; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Warranty:</label>
              <span><i class="show_color"><?php echo @$view->warranty; ?></i></span> </p>
          </li>
          <?php } ?>          
          <?php if($view->category == 3){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Fuel Type:</label>
              <span><i class="show_color"><?php echo @$view->fuel_type; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Warranty:</label>
              <span><i class="show_color"><?php echo @$view->warranty; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->category == 4){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Manufacturer:</label>
              <span><i class="show_color"><?php echo @$view->manufacturer; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Warranty:</label>
              <span><i class="show_color"><?php echo @$view->warranty; ?></i></span> </p>
          </li>
          <?php } ?>
        </ul><!-- /.products -->

                                                        <div class="check-products">
                                                           

                                                            

                                                           
                                                        </div><!-- /.check-products -->

                                                    </div><!-- /.col -->

                                                   <!-- /.col -->
                                                </div><!-- /.row -->

                                            </div><!-- /.accessories -->
                                        </div>

                                        <div class="tab-pane active in panel entry-content wc-tab" id="tab-description">
                                            <div class="electro-description">

                                                <h3>Details</h3>
                                                 <?php $description = $this->yalalink_model->makeLinks($view->description); echo @$description; ?>
                                                 <ul class="list-inline row gnralbox">
        <?php if($view->body_type){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Kilometers:</label>
              <span><i class="show_color"><?php echo @$view->kilometers; ?></i></span> </p>
          </li>
          <?php } ?>
         <?php if($view->body_condition){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Body Condition:</label>
              <span><i class="show_color"><?php echo @$view->body_condition; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->mechanical_condition){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Mechanical Condition:</label>
              <span><i class="show_color"><?php echo @$view->mechanical_condition; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->year){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Year:</label>
              <span><i class="show_color"><?php echo @$view->year; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->body_type){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Body Type:</label>
              <span><i class="show_color"><?php echo @$view->body_type; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->color){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Color:</label>
              <span><i class="show_color"><?php echo @$view->color; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->transmission_type){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Transmission Type:</label>
              <span><i class="show_color"><?php echo @$view->transmission_type; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->regional_specs){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Regional Specs:</label>
              <span><i class="show_color"><?php echo @$view->regional_specs; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->doors){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Doors:</label>
              <span><i class="show_color"><?php echo @$view->doors; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->cylinders){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Cylinders:</label>
              <span><i class="show_color"><?php echo @$view->cylinders; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->horsepower){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Horsepower:</label>
              <span><i class="show_color"><?php echo @$view->horsepower; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->fuel_type){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Fuel Type:</label>
              <span><i class="show_color"><?php echo @$view->fuel_type; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->auto_type){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Auto Type:</label>
              <span><i class="show_color"><?php echo @$view->auto_type; ?></i></span> </p>

          </li>
          <?php } ?>
          <?php if($view->age){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Age:</label>
              <span><i class="show_color"><?php echo @$view->age; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->usage){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Usage:</label>
              <span><i class="show_color"><?php echo @$view->usage; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->length){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Length:</label>
              <span><i class="show_color"><?php echo @$view->length; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->make){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Make:</label>
              <span><i class="show_color"><?php echo @$view->make; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->capacity){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Capacity:</label>
              <span><i class="show_color"><?php echo @$view->capacity; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->drive_system){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Drive System:</label>
              <span><i class="show_color"><?php echo @$view->drive_system; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->wheels){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Wheels:</label>
              <span><i class="show_color"><?php echo @$view->wheels; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->manufacturer){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Manufacturer:</label>
              <span><i class="show_color"><?php echo @$view->manufacturer; ?></i></span> </p>
          </li>
          <?php } ?>
          <?php if($view->engine_size){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Engine Size:</label>
              <span><i class="show_color"><?php echo @$view->engine_size; ?></i></span> </p>
          </li>
          <?php } ?>
			<?php if($view->mobile){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Contact Number:</label>
              <span><i class="show_color"><?php echo $view->mobile; ?></i></span> </p>
          </li>
			<?php } ?>
        </ul>
                                                
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
                                            <div id="reviews" class="electro-advanced-reviews">
                                                <div class="advanced-review row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <h2 class="based-title">Based on 3 reviews</h2>
                                                        <div class="avg-rating">
                                                            <span class="avg-rating-number">4.3</span> overall
                                                        </div>

                                                        <div class="rating-histogram">
                                                            <div class="rating-bar">
                                                                <div class="star-rating" title="Rated 5 out of 5">
                                                                    <span style="width:100%"></span>
                                                                </div>
                                                                <div class="rating-percentage-bar">
                                                                    <span style="width:33%" class="rating-percentage">

                                                                    </span>
                                                                </div>
                                                                <div class="rating-count">1</div>
                                                            </div><!-- .rating-bar -->

                                                            <div class="rating-bar">
                                                                <div class="star-rating" title="Rated 4 out of 5">
                                                                    <span style="width:80%"></span>
                                                                </div>
                                                                <div class="rating-percentage-bar">
                                                                    <span style="width:67%" class="rating-percentage"></span>
                                                                </div>
                                                                <div class="rating-count">2</div>
                                                            </div><!-- .rating-bar -->

                                                            <div class="rating-bar">
                                                                <div class="star-rating" title="Rated 3 out of 5">
                                                                    <span style="width:60%"></span>
                                                                </div>
                                                                <div class="rating-percentage-bar">
                                                                    <span style="width:0%" class="rating-percentage"></span>
                                                                </div>
                                                                <div class="rating-count zero">0</div>
                                                            </div><!-- .rating-bar -->

                                                            <div class="rating-bar">
                                                                <div class="star-rating" title="Rated 2 out of 5">
                                                                    <span style="width:40%"></span>
                                                                </div>
                                                                <div class="rating-percentage-bar">
                                                                    <span style="width:0%" class="rating-percentage"></span>
                                                                </div>
                                                                <div class="rating-count zero">0</div>
                                                            </div><!-- .rating-bar -->

                                                            <div class="rating-bar">
                                                                <div class="star-rating" title="Rated 1 out of 5">
                                                                    <span style="width:20%"></span>
                                                                </div>
                                                                <div class="rating-percentage-bar">
                                                                    <span style="width:0%" class="rating-percentage"></span>
                                                                </div>
                                                                <div class="rating-count zero">0</div>
                                                            </div><!-- .rating-bar -->
                                                        </div>
                                                    </div><!-- /.col -->

                                                    <div class="col-xs-12 col-md-6">
                                                        <div id="review_form_wrapper">
                                                            <div id="review_form">
                                                                <div id="respond" class="comment-respond">
                                                                    <h3 id="reply-title" class="comment-reply-title">Add a review
                                                                        <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a>
                                                                        </small>
                                                                    </h3>

                                                                    <form action="#" method="post" id="commentform" class="comment-form">
                                                                        <p class="comment-form-rating">
                                                                            <label>Your Rating</label>
                                                                        </p>

                                                                        <p class="stars">
                                                                            <span><a class="star-1" href="#">1</a>
                                                                                <a class="star-2" href="#">2</a>
                                                                                <a class="star-3" href="#">3</a>
                                                                                <a class="star-4" href="#">4</a>
                                                                                <a class="star-5" href="#">5</a>
                                                                            </span>
                                                                        </p>

                                                                        <p class="comment-form-comment">
                                                                            <label for="comment">Your Review</label>
                                                                            <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                        </p>

                                                                        <p class="form-submit">
                                                                            <input name="submit" type="submit" id="submit" class="submit" value="Add Review" />
                                                                            <input type='hidden' name='comment_post_ID' value='2452' id='comment_post_ID' />
                                                                            <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                                                        </p>

                                                                        <input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment_disabled" value="c7106f1f46" />
                                                                        <script>(function(){if(window===window.parent){document.getElementById('_wp_unfiltered_html_comment_disabled').name='_wp_unfiltered_html_comment';}})();</script>
                                                                    </form><!-- form -->
                                                                </div><!-- #respond -->
                                                            </div>
                                                        </div>

                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->

                                                
                                                <div class="clear"></div>
                                            </div><!-- /.electro-advanced-reviews -->
                                        </div><!-- /.panel -->
                                    </div>

                                </div><!-- /.woocommerce-tabs -->

                              
                            </div><!-- /.product -->

                        </main><!-- /.site-main -->
                    </div><!-- /.content-area -->
                      <div id="sidebar" class="sidebar" role="complementary" style="margin-top: 15px;">
                        <aside class="widget widget_text">
                            <div class="textwidget">
                                <a href="#">
                                    <img src="assets/images/banner/YALAFUN1.jpg" alt="Banner">
                                </a>
                            </div>
                        </aside>
                        </div>
                </div><!-- /.container -->
               
            </div><!-- /.site-content -->

           

              <footer id="colophon" class="site-footer">
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

       