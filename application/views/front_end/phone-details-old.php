<?php $this->load->view('front_end/include/header-detail');
$currency = $this->session->userdata('currency'); 
  $brand = $this->yalalink_model->getBrand($view->brand);?>
<style type="text/css">
.store-sec-detail-img {
	/*object-fit:cover !important;*/
	height: 400px;
}
</style>
<div class="container">
<?php if($this->session->flashdata('message')){ ?>
<?php echo $this->session->flashdata('message'); ?>
<?php } ?>
<div class="row">
<div class="col-md-8 col-sm-12">
  <div class="carousel slide" id="cat-slider" data-ride="carousel"> 
    <!-- Carousel items -->
    <div class="carousel-inner hero-radius">
      <?php  if($images){ $i = 0; foreach($images as $val){
		   if($val->image){
			 $img ='uploads/images/'.$val->image;
			 $timg ='uploads/images/thumbnail/'.$val->image;
		   }else{
			 $img = 'assets/img/no_image_available.jpg';
			 $timg = 'assets/img/no_image_available.jpg';
			} ?>
      <div class="<?php if($i==0) echo 'active';  ?> item carousel-item" data-slide-number="<?php echo $i; ?>"> <a href="<?php echo $img; ?>" data-fancybox="gallery"  data-caption="<?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$view->title_en)))); if($view->title_ar!=''){ echo '  ( '.@$view->title_ar.' )'; }?>"><img src="<?php if(file_exists(@$timg)) echo $timg; else echo $img; ?>" alt="<?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$view->title_en)))); if($view->title_ar!=''){ echo '  ( '.@$view->title_ar.' )'; }?>" class="store-sec-detail-img"></a></div>
      <?php $i++;}}else{ ?>
      <div class="active item carousel-item" data-slide-number="0"> <a href="assets/front_end/images/no_image_available.jpg" data-fancybox="gallery"  data-caption=""><img src="assets/front_end/images/no_image_available.jpg" alt="image" class="store-sec-detail-img"></a></div>
      <?php } ?>
      <span class="heart"><a href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a></span> </div>
    
    <!-- Carousel nav --> 
    <a class="left carousel-control" href="#cat-slider" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#cat-slider" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
  
  <!-- carousel slide -->
  <div class="row" id="slider-thumbs">
    <div class="col-md-12">
      <ul class="hide-bullets store-bullets">
        <?php  if($images){ $i = 0; foreach($images as $val){
		   if($val->image){
			 $img ='uploads/images/thumb/'.$val->image;
		   }else{
			 $img = 'assets/img/no_image_available.jpg';
			} ?>
        <li> <a class="thumbnail" id="carousel-selector-<?php echo $i; ?>"> <img src="<?php echo $img; ?>" class="store-thumb-img" alt="<?php echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower(@$view->title_en)))); if($view->title_ar!=''){ echo '  ( '.@$view->title_ar.' )'; }?>"> </a> </li>
        <?php $i++;}} ?>
      </ul>
    </div>
  </div>
  <div class="full-wrap store-detail-wrap">
    <div class="row node-breadcrumb text-muted">
      <ol class="breadcrumb">
        <li><a href="index">Home</a></li>
        <li><a href="phones">Phones</a></li>
        <li><a href="phones?type=<?php echo $view->type; ?>"><?php echo $view->type; ?></a></li>
        <li><a href="javascript:void(0);"><?php echo $brand->name; ?></a></li>
        <!-- <li><a class="text-muted">تويوتا كامري موديل 2003</a></li> -->
      </ol>
    </div>
    <h2 class="store-head"><?php echo @$view->title_en; ?></h2>
    <h2 class="store-head"><?php echo @$view->title_ar; ?></h2>
    <div class="full-wrap store-detail-box-wrap">
      <div class="col-md-6 store-detail-box inline-block hero-radius">
        <div class="head">
          <figure><i class="fa fa-pencil-square-o" aria-hidden="true"></i></figure>
          <i>General</i></div>
        <ul class="list-inline row gnralbox">
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Release Year:</label>
              <span><i class="show_color"><?php echo @$view->release_year; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Form factor	:</label>
              <span><i class="show_color"><?php echo @$view->form_factor; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Dimensions (mm):</label>
              <span><i class="show_color"><?php echo @$view->dimensions; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Weight (g):</label>
              <span><i class="show_color"><?php echo @$view->weight; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Battery capacity:</label>
              <span><i class="show_color"><?php echo @$view->capacity; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Removable battery :</label>
              <span><i class="show_color"><?php echo @$view->removable_battery; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Contact Number :</label>
              <span><i class="show_color"><?php echo @$view->mobile; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Email :</label>
              <span><i class="show_color"><?php echo @$view->email; ?></i></span> </p>
          </li>
        </ul>
      </div>
      <!-- store-detail-box -->
      <div class="col-md-6 store-detail-box inline-block hero-radius">
        <div class="head"><img src="assets/front_end/images/motion-sensor.png"><i>&nbsp;Sensors</i></div>
        <ul class="list-inline row gnralbox">
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Compass/ Magnetometer:</label>
              <span><i class="show_color"><?php echo @$view->compass; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Proximity sensor:</label>
              <span><i class="show_color"><?php echo @$view->proximity; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Accelerometer:</label>
              <span><i class="show_color"><?php echo @$view->accelerometer; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Ambient light sensor:</label>
              <span><i class="show_color"><?php echo @$view->light; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Gyroscope:</label>
              <span><i class="show_color"><?php echo @$view->gyroscope; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Barometer:</label>
              <span><i class="show_color"><?php echo @$view->barometer; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Temperature sensor:</label>
              <span><i class="show_color"><?php echo @$view->temperature; ?></i></span> </p>
          </li>
        </ul>
      </div>
      <!-- store-detail-box -->
      <div class="col-md-6 store-detail-box inline-block hero-radius">
        <div class="head"><img src="assets/front_end/images/smartphone-call.png"><i>&nbsp;Display</i></div>
        <ul class="list-inline row gnralbox">
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Screen size:</label>
              <span><i class="show_color"><?php echo @$view->screen_size; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Touchscreen:</label>
              <span><i class="show_color"><?php echo @$view->touchscreen; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-12 col-md-12 inline-block">
            <p>
              <label>Resolution:</label>
              <span><i class="show_color"><?php echo @$view->resolution; ?></i></span> </p>
          </li>
			<?php if($view->mobile){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Contact Number:</label>
              <span><i class="show_color"><?php echo $view->mobile; ?></i></span> </p>
          </li>
			<?php } ?>
        </ul>
      </div>
      <!-- store-detail-box -->
      
      <div class="col-md-12 full-description">
        <div class="head">Description</div>
        <?php $description = $this->yalalink_model->makeLinks($view->description); echo @$description; ?>
        <br>
        <br>
      </div>
      <!-- store-detail-box --> 
    </div>

    <!-- Call & Email -->
    <?php $this->load->view('front_end/include/call_email'); ?>

  </div>
</div>
<!-- col -->
<div class="col-md-4 add-wrap pull-right filter-right-boxes">
<section class="box-typical hero-radius">
  <div class="box-typical-header hero-radius">Advance Search</div>
  <ul class="list-group filter-left">
    <li class="list-group-item">
      <form id="searchbox" class="searchbox" role="form" action="phones" method="get" enctype="multipart/form-data">
      <div class="bmd-form-group bmd-form-allign">
        <input type="text" class="form-control bmd-placeholder" name="keyword" id="keyword" placeholder="Keywords">
      </div>
      <div class="" id="adv-search">
      <div id="advance-filter" class="accordion-body">
      <div class="accordion-inner">
      <div class="row">
      <?php /*?><div class="col-md-12 col-xs-12">
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
    </div><?php */?>
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
    
    <!--<div class="row select-box-search one-row-field filter-fieldmargin">
      <label for="filter">Price</label>
      <div class="col col-md-6 col-xs-6">
        <input type="text" class="form-control bmd-placeholder" placeholder="From" aria-label="From">
      </div>
      <div class="col col-md-6 col-xs-6">
        <input type="text" class="form-control bmd-placeholder" placeholder="To" aria-label="To">
      </div>
    </div>-->
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
<section class="box-typical hero-radius no-border"> <img src="assets/front_end/images/gift6.jpg" class="img-fluid"> </section>
<?php include('include/special_deals.php'); ?>
</div>
<!-- col -->

</div>
</div>

<?php $this->load->view('front_end/include/footer'); ?>
