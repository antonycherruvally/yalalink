<?php $this->load->view('front_end/include/header'); ?>
<?php $image = $this->yalalink_model->getUserDetails($view->user_id);
  $position = $this->yalalink_model->getPosition($view->position);
  $industry = $this->yalalink_model->getIndustry($view->industry);
  $nationality = $this->yalalink_model->getNationality($image->nationality);
  $current = $this->yalalink_model->getNationality($view->current_location);
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
  <style type="text/css">
  .amentity-box span i{
	  float:left;
  }
  </style>
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-12">
  <div class="full-wrap store-detail-wrap mob-margin-cmn">
    <div class="row node-breadcrumb text-muted">
      <ol class="breadcrumb">
        <li><a href="index">Home</a></li>
        <li><a href="jobs">Jobs</a></li>
        <li><a href="jobs?type=Looking">Talents Available</a></li>
        <li><a class="text-muted"><?php echo $image->first_name.' '.$image->last_name; ?></a></li>
      </ol>
    </div>
    <div class="personal-detail">
      <figure class="img-box-detail"><img src="<?php echo $img; ?>"> </figure>
      <h2 class="store-head"><?php echo $image->first_name.' '.$image->last_name; ?></h2>
      <h4 class="inline-block pos"><i class="fa fa-briefcase" aria-hidden="true"></i><?php echo $position->title; ?></h4>
      <span class="hero-radius status"><!-- <i class="fa fa-map-marker" aria-hidden="true"></i> -->Current Location: <b><?php echo $current->name; ?></b></span> </div>
    <div class="full-wrap store-detail-box-wrap">
      <div class="col-md-6 store-detail-box inline-block hero-radius">
        <div class="head">
          <figure><i class="fa fa-star" aria-hidden="true"></i></figure>
          <i>Highlights</i></div>
        <ul class="list-inline row gnralbox amentity-box-wrap">
          <li class="amentity-box inline-block">
            <p> <span><i class="show_color"><?php echo $view->title_en; ?></i></span> </p>
          </li>
			<?php if($view->mobile){ ?>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Contact Number:</label>
              <span><i class="show_color"><?php echo $view->mobile; ?></i></span> </p>
          </li>
			<?php } ?>
          <li class="amentity-box inline-block">
            <p> <span><i class="show_color"><?php echo $view->experience; ?> Experience</i></span> </p>
          </li>
          <li class="amentity-box inline-block">
            <p> <span><i class="show_color"><?php echo $view->qualification; ?></i></span> </p>
          </li>
          <li class="amentity-box inline-block">
            <p> <span><i class="show_color"><?php echo $view->level; ?></i></span> </p>
          </li>
        </ul>
      </div>
      <!-- store-detail-box -->
      
      <div class="col-md-6 store-detail-box inline-block hero-radius">
        <div class="head">
          <figure><i class="fa fa-pencil-square-o" aria-hidden="true"></i></figure>
          <i>Personal Details</i></div>
        <ul class="list-inline row gnralbox">
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Nationality:</label>
              <span><i class="show_color"><?php echo $nationality->name; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Age:</label>
              <span><i class="show_color"><?php $dateOfBirth = $image->dob;
			  $today = date("Y-m-d");
			  $diff = date_diff(date_create($dateOfBirth), date_create($today));
			  echo @$diff->format('%y'); ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Gender:</label>
              <span><i class="show_color"><?php echo $view->gender; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Salary Expectations:</label>
              <span><i class="show_color"><?php echo $view->salary; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Visa Status:</label>
              <span><i class="show_color"><?php echo $view->visa_status; ?></i></span> </p>
          </li>
          <li class="col-xs-12 col-sm-6 col-md-6 inline-block">
            <p>
              <label>Languages:</label>
              <span><i class="show_color"><?php echo $view->languages; ?></i></span> </p>
          </li>
        </ul>
      </div>
      <!-- store-detail-box -->
      
      <div class="col-md-12 full-description">
        <div class="head">Description</div>
        <?php $description = $this->yalalink_model->makeLinks($view->description); echo @$description; ?>
      </div>
      <br>
      <br>
    </div>
    <div class="detail-btn-wrap pos-center three-btn-wrap"> <?php if(@$user_details->cv) { ?><a href="<?php echo 'uploads/user-cv/'.$user_details->cv; ?>" class="hero-button btn-shadow icon-btn detail-btn btn-FF9800"> <span><i class="fa fa-eye bounce-ani" aria-hidden="true"></i>View CV</span></a> <?php } ?><!--<a href="" class="hero-button btn-shadow icon-btn detail-btn btn-FF9800"> <span><i class="fa fa-phone bounce-ani" aria-hidden="true"></i>Call</span></a> <a href="tel:+971 56383400" class="hero-button btn-shadow icon-btn detail-btn btn-FF9800"> <span><i class="fa fa-paper-plane bounce-ani" aria-hidden="true"></i>E-mail</span></a>--> </div>
  </div>
</div>
<!-- col -->
<div class="col-md-4 add-wrap pull-right filter-right-boxes">
<section class="box-typical hero-radius">
  <div class="box-typical-header hero-radius">Advance Search</div>
  <ul class="list-group filter-left">
    <li class="list-group-item">
      <form id="searchbox" class="searchbox" role="form" action="jobs" method="get" enctype="multipart/form-data">
      <div class="bmd-form-group bmd-form-allign">
        <input type="text" class="form-control bmd-placeholder" name="keyword" id="keyword" placeholder="Keywords">
      </div>
      <div class="" id="adv-search">
      <div id="advance-filter" class="accordion-body">
      <div class="accordion-inner">
      <div class="row">
      <div class="col-md-12 col-xs-12">
      <form class="form-inline">
        <?php /*?><div class="select-box-search">
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
        </div><?php */?>
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
      <!--<label for="filter">Price</label>
      <div class="col col-md-6 col-xs-6">
        <input type="text" class="form-control bmd-placeholder" placeholder="From" aria-label="From">
      </div>
      <div class="col col-md-6 col-xs-6">
        <input type="text" class="form-control bmd-placeholder" placeholder="To" aria-label="To">
      </div>-->
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
</div>
<!-- col -->

</div>
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
  <form id="send_email" role="form" action="sendMail" method="post" enctype="multipart/form-data">
  <input type="hidden" name="userid" value="<?php echo $userdata['userid']; ?>">
  <input type="hidden" name="postid" value="<?php echo $view->id; ?>">
  <div class="modal-body">
    <div class="row">
      <div class="col-md-6">
      <div class="form-group bmd-form-group">
        <label for="formGroupExampleInput2" class="bmd-label-floating">Name:</label>
        <input type="text" class="form-control no-border mat-txt mat-font first-txt" id="name" name="name">
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
<textarea class="form-control" id="message" name="message" rows="3"></textarea>
</div>
</div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-raised hero-radius btn-FF9800 mat-submit mail-btn">Submit
    </button>
  </div>
</form>
  </div>
</div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
