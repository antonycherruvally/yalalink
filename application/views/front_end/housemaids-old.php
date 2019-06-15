<?php $this->load->view('front_end/include/header'); 
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$country_code = $this->session->userdata('country_code');
?>

<div class="container">
<div class="row">
<div class="col-md-8 col-sm-12 listing-wrap">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Banner -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-8267866280490368"
             data-ad-slot="4614962273"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
  
  <!-- Nav tabs -->
  <ul class="nav nav-tabs listing-wrap" role="tablist">
    <li class="nav-item"> <a class="nav-link <?php if($this->input->get('type')=='Domestic'){ echo 'active'; }elseif($this->input->get('type')==''){ echo 'active'; } ?> category" id="Domestic" data-toggle="tab" href="#domestic" role="tab">Domestic</a> </li>
    <li class="nav-item"> <a class="nav-link link-radius <?php if($this->input->get('type')=='Abroad'){ echo 'active'; } ?> category" id="Abroad" data-toggle="tab" href="#abroad" role="tab">Abroad</a> </li>
  </ul>
  <input type="hidden" value="<?php if($this->input->get('type')){ echo $this->input->get('type'); }else{ echo 'Domestic'; }?>" name="type" id="type">
  <!-- Tab panes -->
  <div class="tab-content col-md-12">
    <div class="tab-pane active result-div" id="post-results"> </div>
    <!-- Choose country -->
   <?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
  </div>
</div>
<!-- col -->
<div class="col-md-4 add-wrap pull-right indexcolleft">
<section class="box-typical hero-radius">
  <div class="box-typical-header hero-radius">Advance Search</div>
  <ul class="list-group filter-left">
    <li class="list-group-item">
      <form id="searchbox" class="searchbox" role="form" action="real-estate" method="get" enctype="multipart/form-data">
      <div class="bmd-form-group bmd-form-allign">
        <input type="text" class="form-control bmd-placeholder" name="keyword" id="keyword" placeholder="Keywords">
      </div>
      <div class="" id="adv-search">
      <div id="advance-filter" class="accordion-body">
      <div class="accordion-inner">
      <div class="row">
      <div class="col-md-12 col-xs-12">
      <form class="form-inline">
        <div class="select-box-search">
          <label for="filter">Property Type</label>
          <select class="js-example-basic-single" name="property-type" id="property_type">
            <option value="">All</option>
            <?php $category = getRealEstateCategory(); 
              if($category){ foreach($category as $val){
              $selected = '';
              if(@$this->input->get('property-type') == $val->id){
                  $selected = 'selected';
              }?>
            <option value="<?php echo $val->id; ?>" <?php echo $selected; ?>><?php echo $val->subcategory; ?></option>
            <?php } } ?>
          </select>
        </div>
    </div>
    </div>
    <!-- row --> 
    
    <!--<div class="row">
      <div class="col col-md-12 col-xs-12">
        <div class="select-box-search">
          <label for="filter">Area</label>
          <select class="js-example-basic-single" name="Distance From">
            <option value="AL">All</option>
            <option value="WY">Dubai Mall</option>
            <option value="WY">Al Barsha Dubai</option>
            <option value="WY">Al Muraqqabat</option>
            <option value="WY">Deira City Center Mall</option>
          </select>
        </div>
      </div>
    </div>--> 
    <!-- row -->
    
    <div class="row select-box-search one-row-field filter-fieldmargin">
      <label for="filter">Price</label>
      <div class="col col-md-6 col-xs-6">
        <input type="text" class="form-control bmd-placeholder" placeholder="From" aria-label="From">
      </div>
      <div class="col col-md-6 col-xs-6">
        <input type="text" class="form-control bmd-placeholder" placeholder="To" aria-label="To">
      </div>
    </div>
    <!-- row --> 
    
    <!--<div class="select-box-search">
      <div class="row">
        <div class="col col-md-6 col-xs-6">
          <label for="filter">Color</label>
          <select class="js-example-basic-single" name="City">
            <option value="AL">All</option>
            <option value="WY">White</option>
            <option value="WY">Black</option>
            <option value="WY">Matte Black</option>
            <option value="WY">Red</option>
          </select>
        </div>
        <div class="col col-md-6 col-xs-6 pr-0">
          <label for="filter">Year of Make</label>
          <select class="js-example-basic-single" name="Year of Make">
            <option value="AL">All</option>
            <option value="WY">2018</option>
            <option value="WY">2017</option>
            <option value="WY">2016</option>
            <option value="WY">2015</option>
          </select>
        </div>
      </div>
    </div>
    <div class="row select-box-search one-row-field filter-fieldmargin">
      <label for="filter">Kilometres</label>
      <div class="col col-md-6 col-xs-6">
        <input type="text" class="form-control bmd-placeholder" placeholder="From" aria-label="From">
      </div>
      <div class="col col-md-6 col-xs-6">
        <input type="text" class="form-control bmd-placeholder" placeholder="To" aria-label="To">
      </div>
    </div>-->
    </div>
    </div>
    </div>
    <!-- adv-search -->
    </li>
    <input type="submit" class="btn filter-btn hero-radius search-font" value="Search">
    </form>
  </ul>
</section>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle"
     style="display:block"
     data-ad-format="fluid"
     data-ad-layout-key="-h6+m-2d-8v+oy"
     data-ad-client="ca-pub-8267866280490368"
     data-ad-slot="7208092755"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
<!--<section class="box-typical hero-radius no-border">
  <div class="box-typical-header hero-radius wishlist-head"><i class="fa fa-heart" aria-hidden="true"></i>Wishlist</div>
  <ul class="list-group filter-left child-filter-boxes">
    <li class="list-group-item wishlist-item">
      <div class="row">
        <div class="col col-md-6 col-sm-12">
          <div class="card"> <a href=""><img class="card-img-top" src="images/car3.png" alt="Card image cap"></a>
            <div class="card-body">
              <h4 class="card-title"><a href="">Benz</a></h4>
              <h5 class="card-title2">AED 200000</h5>
              <p class="card-text">Some quick example text...</p>
            </div>
          </div>
        </div>
        <div class="col col-md-6 col-sm-12">
          <div class="card"> <a href=""><img class="card-img-top" src="images/car7.jpg" alt="Card image cap"></a>
            <div class="card-body">
              <h4 class="card-title"><a href="">Toyota Camry</a></h4>
              <h5 class="card-title2">AED 300000</h5>
              <p class="card-text">Some quick example text...</p>
            </div>
          </div>
        </div>
        <div class="col col-md-6 col-sm-12">
          <div class="card"> <a href=""><img class="card-img-top" src="images/truck/truck4.jpg" alt="Card image cap"></a>
            <div class="card-body">
              <h4 class="card-title"><a href="">Rubicon</a></h4>
              <h5 class="card-title2">AED 300000</h5>
              <p class="card-text">Some quick example text...</p>
            </div>
          </div>
        </div>
        <div class="col col-md-6 col-sm-12">
          <div class="card"> <a href=""><img class="card-img-top" src="images/car10.jpg" alt="Card image cap"></a>
            <div class="card-body">
              <h4 class="card-title"><a href="">BMW 5 Series</a></h4>
              <h5 class="card-title2">AED 480000</h5>
              <p class="card-text">Some quick example text...</p>
            </div>
          </div>
        </div>
        <div class="col-md-12 text-center"><a href="" class="hero-radius wish-more">View More</a></div>
      </div>
    </li>
    <div id="car-items" class="accordion-body">
      <div class="accordion-inner"> </div>
    </div>
  </ul>
</section>
<section class="box-typical hero-radius no-border" id="real-estate-filter">
  <div class="box-typical-header hero-radius">Cars</div>
  <ul class="list-group filter-left child-filter-boxes">
    <li class="list-group-item"> <a class="" href="">Toyota <span class="badge">177</span></a> </li>
    <li class="list-group-item"> <a class="" href="">Nissan <span class="badge">250</a> </li>
    <li class="list-group-item"> <a class="" href="">Mercedes-Benz <span class="badge">50</a> </li>
    <div id="car-items" class="accordion-body">
      <div class="accordion-inner">
        <li class="list-group-item"> <a class="" href="">BMW <span class="badge">50</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Audi<span class="badge">120</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Mitsubishi<span class="badge">200</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Lexus<span class="badge">150</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Ford<span class="badge">500</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Hyundai<span class="badge">80</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Chevrolet<span class="badge">57</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Honda<span class="badge">100</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Kia<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Kia<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Volkswagen<span class="badge">80</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Land Rover<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Infiniti<span class="badge">20</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Jeep<span class="badge">150</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Audi<span class="badge">28</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Porsche<span class="badge">27</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Mazda<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Kia<span class="badge">14</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Peugeot<span class="badge">13</span></a> </li>
        <li class="list-group-item"> <a class="" href="">GMC<span class="badge">12</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Dodge<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Cadillac<span class="badge">9</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Volvo<span class="badge">89</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Suzuki<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Isuzu<span class="badge">18</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Other Make<span class="badge">53</span></a> </li>
      </div>
    </div>
  </ul>
</section>
<section class="box-typical hero-radius no-border" id="mob-collapse-sec">
  <div class="box-typical-header hero-radius">
    <button class="full-click mob-colapse-btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Cars<i class="fa" aria-hidden="true"></i></button>
  </div>
  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
    <div id="car-items">
      <ul class="list-group filter-left child-filter-boxes">
        <li class="list-group-item"> <a class="" href="">BMW <span class="badge">50</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Audi<span class="badge">120</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Mitsubishi<span class="badge">200</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Lexus<span class="badge">150</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Ford<span class="badge">500</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Hyundai<span class="badge">80</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Chevrolet<span class="badge">57</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Honda<span class="badge">100</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Kia<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Kia<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Volkswagen<span class="badge">80</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Land Rover<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Infiniti<span class="badge">20</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Jeep<span class="badge">150</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Audi<span class="badge">28</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Porsche<span class="badge">27</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Mazda<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Kia<span class="badge">14</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Peugeot<span class="badge">13</span></a> </li>
        <li class="list-group-item"> <a class="" href="">GMC<span class="badge">12</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Dodge<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Cadillac<span class="badge">9</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Volvo<span class="badge">89</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Suzuki<span class="badge">10</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Isuzu<span class="badge">18</span></a> </li>
        <li class="list-group-item"> <a class="" href="">Other Make<span class="badge">53</span></a> </li>
      </ul>
    </div>
  </div>
</section>-->
<!-- <section class="box-typical hero-radius no-border"> <img src="assets/front_end/images/gift6.jpg" class="img-fluid"> </section> -->
<?php include('include/special_deals.php'); ?>
</div>
<!-- col -->

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
		var per_page = <?php if($this->input->get('per_page')) echo $this->input->get('per_page').';'; else echo '0;'; ?>
        $.ajax({
            'url': '<?php echo base_url(); ?>housemaids/getListings?type='+type+'&per_page='+per_page,
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
	$('.category').click(function(e) {
		var id = $(this).attr('id');
		$('#type').val(id);
		var type = $('#type').val();
		var category = $('#category').val();
		$('.result-div').hide();
        $.ajax({
            'url': '<?php echo base_url(); ?>housemaids/getListings?type='+type/*+'&per_page='+per_page*/,
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
