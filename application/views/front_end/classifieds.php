<?php $this->load->view('blocks/header');
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$searchestate = $this->session->userdata('searchestate');
$country_code = $this->session->userdata('country_code');
$currency = $this->session->userdata('currency');?>

 

        
       
           <!-- /.top-bar -->

           
           
<div class="ultypes" style="display:none;">
           <ul class="nav nav-tabs listing-wrap" role="tablist">
    <li class="nav-item"> <a class="nav-link link-radius <?php if($this->input->get('type')=='Used'){ echo 'active'; }elseif($this->input->get('type')==''){ echo 'active'; } ?> category" id="Used" data-toggle="tab" href="#used" role="tab">Used</a> </li>
    <li class="nav-item"> <a class="nav-link <?php if($this->input->get('type')=='New'){ echo 'active'; } ?> category" id="New" data-toggle="tab" href="#new" role="tab">New</a> </li>
  </ul>
  <input type="hidden" value="<?php if($this->input->get('type')){ echo $this->input->get('type'); }else{ echo 'Used'; }?>" name="type" id="type">
  <input type="hidden" value="<?php if($this->input->get('category')){ echo $this->input->get('category'); }?>" name="category" id="category">
</div>
<?php $this->load->view('blocks/classifilter.php');?>
            <div id="content" class="site-content" tabindex="-1">
            <ul class="social_icons" id="fixed-social">
        <li><a href="http://facebook.com/yallalink" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:white;"></i> </a></li>
    <li><a href="http://twitter.com/yalalink" target="_blank"  data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:white;"></i> </a></li>
    <li><a href="http://instagram.com/yallalink" target="_blank"  data-placement="bottom" title="Instagram" data-original-title="Instagram"><i class="fab fa-instagram" aria-hidden="true" style="color:white;"></i> </a></li>
    <li><a href="https://www.youtube.com/channel/UCUMQgk6eeTzQFtptXd81kDA" target="_blank"  data-placement="bottom" title="Youtube" data-original-title="Youtube"><i class="fab fa-youtube-square" aria-hidden="true" style="color:white;"></i> </a></li>
  </ul>
                <div class="container">

                    <nav class="woocommerce-breadcrumb" ><!--<a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Smart Phones &amp; Tablets--></nav>

                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">

                            <section class="section-product-cards-carousel" >
                            <header class="page-header">
                                <h1 class="page-title">Classifieds</h1>
                                <p class="woocommerce-result-count">Showing 1&ndash;15 of 20 results</p>
                            </header>

                            <div class="shop-control-bar">
                                <ul class="shop-view-switcher nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
                                 
                                    <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
                                    <li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                              <ul class="shop-view-switcher nav nav-tabs tabtypes" role="tablist">
                                       <li class="typestab" ><a class="nav-link link-radius1 <?php if($this->input->get('type')=='Used' || $this->input->get('type')==''){ echo 'active'; } ?> category" id="used" href="javascript:void(0);" role="tab">Used</a>  </li>
                                       <li class="typestab1"><a class="nav-link link-radius1 <?php if($this->input->get('type')=='New'){ echo 'active'; } ?> category" id="New" data-toggle="tab" href="#new" role="tab">New</a> </li>
                                        </ul>
                                <form class="form-electro-wc-ppp"><select name="ppp" onchange="this.form.submit()" class="electro-wc-wppp-select c-select"><option value="15"  selected='selected'>Show 15</option><option value="-1" >Show All</option></select></form>
                                <!--<nav class="electro-advanced-pagination">
                                    <form method="post" class="form-adv-pagination"><input id="goto-page" size="2" min="1" max="2" step="1" type="number" class="form-control" value="1" /></form> of 2<a class="next page-numbers" href="#">&rarr;</a>			<script>
                                    jQuery(document).ready(function($){
                                        $( '.form-adv-pagination' ).on( 'submit', function() {
                                            var link 		= '#',
                                            goto_page 	= $( '#goto-page' ).val(),
                                            new_link 	= link.replace( '%#%', goto_page );

                                            window.location.href = new_link;
                                            return false;
                                        });
                                    });
                                    </script>
                                </nav>-->
                            </div>
                            </section>
                                
   <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="grid" aria-expanded="true">

                                    <ul class="products columns-3">
                                    
                                      <div class="tab-pane active result-div" id="post-results">
    </div>
                                    </ul>
                                </div>
                               

                                <div role="tabpanel" class="tab-pane" id="list-view" aria-expanded="true">
                                    <ul class="products columns-3">
                                      <div class="tab-pane active result-div" id="post-results-list">
    </div>
                                    </ul>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="list-view-small" aria-expanded="true">

                                    <ul class="products columns-3">
                                      <div class="tab-pane active result-div" id="post-results-listsmall">
    </div>
                                    </ul>
                                </div>
                            </div>
                            
                            <!--<div class="shop-control-bar-bottom">
                                <form class="form-electro-wc-ppp">
                                    <select class="electro-wc-wppp-select c-select" onchange="this.form.submit()" name="ppp"><option selected="selected" value="15">Show 15</option><option value="-1">Show All</option></select>
                                </form>
                                <p class="woocommerce-result-count">Showing 1&ndash;15 of 20 results</p>
                                <nav class="woocommerce-pagination">
                                    <ul class="page-numbers">
                                        <li><span class="page-numbers current">1</span></li>
                                        <li><a href="#" class="page-numbers">2</a></li>
                                        <li><a href="#" class="next page-numbers">→</a></li>
                                    </ul>
                                </nav>
                            </div>-->

                        </main><!-- #main -->
                         <?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
                    </div><!-- #primary -->

                    <div id="sidebar" class="sidebar" role="complementary">
                        <aside class="widget woocommerce widget_product_categories electro_widget_product_categories">
                            <ul class="product-categories category-single">
                                <li class="product_cat">
                                    <ul class="show-all-cat">
                                        <li class="product_cat"><span class="show-all-cat-dropdown">Show All Categories</span>
                                           
                                        </li>
                                    </ul>
                                    <ul>
                                        <li class="cat-item current-cat"><a href="product-category.html">Classifieds</a> 
                                            <ul class='children'>
                                                <li class="nav-item"> Accessories </li>
      											<li class="nav-item"> Baby</li>
                                                <li class="nav-item"> Bags & Wallets</li>
                                                 <li class="nav-item"> Beauty</li>
                                                  <li class="nav-item"> Clothing</li>
                                                   <li class="nav-item">Furniture</li>
                                                   <li class="nav-item">Gaming</li>
                                                   <li class="nav-item">Stationaries</li>
    
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </aside>
                       <!-- <aside class="widget widget_electro_products_filter">
                            <h3 class="widget-title">Filters</h3>
                            <aside class="widget woocommerce widget_layered_nav">
                                <h3 class="widget-title">Brands</h3>
                                <ul>
                                    <li style=""><a href="#">Apple</a> <span class="count">(4)</span></li>
                                    <li style=""><a href="#">Gionee</a> <span class="count">(2)</span></li>
                                    <li style=""><a href="#">HTC</a> <span class="count">(2)</span></li>
                                    <li style=""><a href="#">LG</a> <span class="count">(2)</span></li>
                                    <li style=""><a href="#">Micromax</a> <span class="count">(1)</span></li>
                                </ul>
                                <p class="maxlist-more"><a href="#">+ Show more</a></p>
                            </aside>
                            <aside class="widget woocommerce widget_layered_nav">
                                <h3 class="widget-title">Color</h3>
                                <ul>
                                    <li style=""><a href="#">Black</a> <span class="count">(4)</span></li>
                                    <li style=""><a href="#">Black Leather</a> <span class="count">(2)</span></li>
                                    <li style=""><a href="#">Turquoise</a> <span class="count">(2)</span></li>
                                    <li style=""><a href="#">White</a> <span class="count">(4)</span></li>
                                    <li style=""><a href="#">Gold</a> <span class="count">(4)</span></li>
                                </ul>
                                <p class="maxlist-more"><a href="#">+ Show more</a></p>
                            </aside>
                            <aside class="widget woocommerce widget_price_filter">
                                <h3 class="widget-title">Price</h3>
                                <form action="#">
                                    <div class="price_slider_wrapper">
                                        <div style="" class="price_slider ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                                            <span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span>
                                            <span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;"></span>
                                        </div>
                                        <div class="price_slider_amount">
                                            <a href="#" class="button">Filter</a>
                                            <div style="" class="price_label">Price: <span class="from">$428</span> &mdash; <span class="to">$3485</span></div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </form>
                            </aside>
                        </aside>-->
                        <aside class="widget widget_text">
                            <div class="textwidget">
                                <a href="#"><img src="assets/images/looza1.jpg" alt="Banner"></a>
                            </div>
                        </aside>
                         <aside class="widget widget_products">
                            
                                <?php $this->load->view('front_end/include/latest_countrywise.php'); ?>
                            
                        </aside>
                        <aside class="widget widget_products">
                            
                                <?php $this->load->view('front_end/include/latest_countrywise1.php'); ?>
                            
                        </aside>
                        <aside class="widget widget_products">
                            
                                <?php $this->load->view('front_end/include/latest_countrywise2.php'); ?>
                            
                        </aside>
                    </div>

                </div><!-- .container -->
            </div><!-- #content -->

           <!-- <section class="brands-carousel">
            	<h2 class="sr-only">Brands Carousel</h2>
            	<div class="container">
            		<div id="owl-brands" class="owl-brands owl-carousel unicase-owl-carousel owl-outer-nav">

            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Acer</h4>
            							</div>
            						</figcaption>

            						 <img src="assets/images/blank.gif" data-echo="assets/images/brands/1.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Apple</h4>
            							</div>
            						</figcaption>

            						 <img src="assets/images/blank.gif" data-echo="assets/images/brands/2.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Asus</h4>
            							</div>
            						</figcaption>

            						 <img src="assets/images/blank.gif" data-echo="assets/images/brands/3.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Dell</h4>
            							</div>
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/4.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Gionee</h4>
            							</div>
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/5.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>HP</h4>
            							</div>
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/6.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>HTC</h4>
            							</div>
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/3.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>IBM</h4>
            							</div>
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/5.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Lenova</h4>
            							</div>
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/2.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>LG</h4>
            							</div>
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/1.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Micromax</h4>
            							</div>
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/6.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            			<div class="item">

            				<a href="#">

            					<figure>
            						<figcaption class="text-overlay">
            							<div class="info">
            								<h4>Microsoft</h4>
            							</div>
            						</figcaption>

            						<img src="assets/images/blank.gif" data-echo="assets/images/brands/4.png" class="img-responsive" alt="">

            					</figure>
            				</a>
            			</div>


            		</div>

            	</div>
            </section>-->

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
            				
            			</div>
            		</div>
            	</div>

            	<div class="footer-newsletter1">
            		
            	<div class="container">
            			<div class="row">
            				
            				            			</div>
            		</div>
            	</div>

            	
            		
            	
            </footer><!-- #colophon -->
            
  <!-- Choose country -->
 

  </div>
  <!-----col------->
</div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
<script type="application/javascript">

 


$(document).ready(function(e) {
	<?php if($userdata['userid']) { ?>
	$(document).on('click','.favorites',function(e){
		var id = $(this).attr('id');
		$(".count-like-"+id).html(parseInt($(".count-like-"+id).html()) + 1);
		$.ajax({
			url:'<?php echo base_url(); ?>setfavorites',
			type: "POST", //The type which you want to use: GET/POST
			data: { 'id' : id },
			success: function(data){
				$(".favorites_"+id).hide();
				$(".unfavorites_"+id).removeClass('d-none');
				$(".unfavorites_"+id).fadeIn('slow');
		   },
		   error:function (xhr, ajaxOptions, thrownError){
           }
		});
		e.preventDefault();
 	});
	$(document).on('click','.unfavorites',function(e){
		var id = $(this).attr('id');
		$(".count-like-"+id).html(parseInt($(".count-like-"+id).html()) - 1);
		$.ajax({
			url:'<?php echo base_url(); ?>unsetfavorites',
			type: "POST", //The type which you want to use: GET/POST
			data: { 'id' : id },
			success: function(data){
				$(".unfavorites_"+id).hide();
				$(".favorites_"+id).removeClass('d-none');
				$(".favorites_"+id).fadeIn('slow');
		   },
		   error:function (xhr, ajaxOptions, thrownError){
           }
		});
		e.preventDefault();
 	});
		
		<?php } ?>
		var type = $('#type').val();
		var category = $('#category').val();
		var subcategory = $('#subcategory').val();
		var per_page = <?php if($this->input->get('per_page')) echo $this->input->get('per_page').';'; else echo '0;'; ?>
        $.ajax({
            'url': '<?php echo base_url(); ?>classifieds/getListings?type='+type+'&category='+category+'&subcategory='+subcategory+'&per_page='+per_page,
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != '') {
					$('.result-div').fadeIn('slow');
					$('.fadeeffect-3').fadeIn(5000);
                    $('#post-results').html(data);
                } else {
                    $('#post-results').html(data);
                }
            }
        });
		var type = $('#type').val();
	
		var category = $('#category').val();
		var subcategory = $('#subcategory').val();
		var per_page = <?php if($this->input->get('per_page')) echo $this->input->get('per_page').';'; else echo '0;'; ?>
        $.ajax({
            'url': '<?php echo base_url(); ?>classifieds/getListingslist?type='+type+'&category='+category+'&subcategory='+subcategory+'&per_page='+per_page,
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != '') {
					$('.result-div').fadeIn('slow');
					$('.fadeeffect-3').fadeIn(5000);
                    $('#post-results-list').html(data);
                } else {
                    $('#post-results-list').html(data);
                }
            }
        });
		var type = $('#type').val();
	
		var category = $('#category').val();
		var subcategory = $('#subcategory').val();
		var per_page = <?php if($this->input->get('per_page')) echo $this->input->get('per_page').';'; else echo '0;'; ?>
        $.ajax({
            'url': '<?php echo base_url(); ?>classifieds/getListingslistsmall?type='+type+'&category='+category+'&subcategory='+subcategory+'&per_page='+per_page,
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != '') {
					$('.result-div').fadeIn('slow');
					$('.fadeeffect-3').fadeIn(5000);
                    $('#post-results-listsmall').html(data);
                } else {
                    $('#post-results-listsmall').html(data);
                }
            }
        });
	$('.category').click(function(e) {
		var id = $(this).attr('id');
		$('#type').val(id);
		var type = $('#type').val();
		var category = $('#category').val();
		$('.result-div').hide();
        $.ajax({
            'url': '<?php echo base_url(); ?>classifieds/getListings?type='+type+'&category='+category/*+'&per_page='+per_page*/,
            'async': false,
            'type': "get",
            'dataType': "html",
            'success': function(data) {
                if (data != '') {
					$('.result-div').fadeIn('slow');
					$('.fadeeffect-3').fadeIn(5000);
                    $('#post-results').html(data);
                } else {
                    $('#post-results').html(data);
                }
            }
        });
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

   
