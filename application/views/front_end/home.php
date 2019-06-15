<?php $this->load->view('front_end/include/header'); 
$userdata = $this->session->userdata('logged_yalalink_userdata'); 
$country_code = $this->session->userdata('country_code');
$currency = $this->session->userdata('currency');?>

<div class="full-wrap slider-sec">
  <ul class="social_icons" id="fixed-social">
    <li><a href="" target="_blank"   title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fa fa fa-facebook" aria-hidden="true"></i> </a></li>
    <li><a href="" target="_blank"  data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
    <li><a href="" target="_blank"  data-placement="bottom" title="Instagram" data-original-title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i> </a></li>
    <li><a href="" target="_blank"  data-placement="bottom" title="Youtube" data-original-title="Youtube"><i class="fab fa-youtube-square" aria-hidden="true"></i> </a></li>
  </ul>
  <div class="container">
    <div class="row">
      <div class="col-md-8 pull-left">
       
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-8267866280490368"
             data-ad-slot="4614962273"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active"> <img class="d-block img-fluid" src="assets/front_end/images/1.jpg" alt="First slide">
			  <!--<div class="carousel-item active"><video width="320" height="240" autoplay>
  <source src="assets/front_end/ramadan-wishes.mp4" type="video/mp4">
  <source src="assets/front_end/ramadan-wishes.ogg" type="video/ogg">
Your browser does not support the video tag.
</video></div>-->
			  </div>
        <div class="carousel-item"><a href= 'auto'> <img class="d-block img-fluid" src="assets/front_end/images/home-banner-1.jpg" alt="Auto"></a></div>
        <div class="carousel-item"> <a href= 'real-estate'><img class="d-block img-fluid" src="assets/front_end/images/home-banner-2.jpg" alt="Real estate"></a></div>
        <div class="carousel-item"> <a href= 'classifieds'><img class="d-block img-fluid" src="assets/front_end/images/home-banner-3.jpg" alt="Classifieds"></a></div>
        </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
       
        

        <!-- col -->
      <div class="add-wrap pull-right indexcolleft">
        <section class="box-typical hero-radius">
          <div class="box-typical-header hero-radius">Hot Deals <span class="typical-box-ar pull-right">عروض مميزة‎</span></div>
        <?php if($hotdeals){
        $i=1;
        foreach($hotdeals as $val){
        $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
        $title = str_replace('  ',' ',strtolower($title));
        $title = str_replace(' ','-',$title);
        $latest = $title.'-'.$val->id;
        $main_image = $this->yalalink_model->getMainImage($val->id);
        $user = $this->yalalink_model->getUserDetails($val->user_id);
        if($main_image) {
         $img = 'uploads/images/thumbnail/'.@$main_image->image;
         $r_img = 'uploads/images/'.@$main_image->image;
         if(file_exists(@$img)){ 
         $image = $img; 
         }elseif(file_exists(@$r_img)){ 
         $image = $r_img; 
         }else{
         $image = 'assets/front_end/images/no_image_available.jpg'; 
         }
         if(file_exists(@$image)){
           $image = $image;
         }else{
           $image = 'assets/front_end/images/no_image_available.jpg';
         }
        }else{
          $img = 'assets/front_end/images/no_image_available.jpg';
          $image = 'assets/front_end/images/no_image_available.jpg';
        } 
        $timestamp = $val->added_date;
          $times = $this->yalalink_model->facebook_time_ago($timestamp);
        if($val->main_category == 'Real Estate'){ $link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
          if($i==1){?>
          <div class="list-item list-item-full-width"> 
           <a href="<?php echo @$link; ?>">
           <div class="tbl-cell tbl-cell-photo"> <img src="<?php echo @$image; ?>"> </div><div class="item-row">
             <div class="tbl-row">
               <div class="content">
                 <div class="head">
                   <?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span>
                    <?php }elseif($val->price!=0 || $val->price!=''){ ?>
                    <span><?php echo $currency.' '.number_format(@$val->price); ?></span>
                    <?php } ?>
                 </div>
                 <p><?php echo substr(strip_tags($val->description),0,70).'...'; ?> <em><?php echo $times; ?></em> </p>
               </div>
             </div>
           </div>
           </a> 
          </div>
          <?php }else{ ?>
          <div class="list-item"> <a href="<?php echo @$link; ?>" >
            <div class="item-row">
              <div class="tbl-row">
                <div class="tbl-cell tbl-cell-photo"> <img src="<?php echo @$image; ?>"> </div>
                <div class="content">
                  <div class="head"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span>
                    <?php }elseif($val->price!=0 || $val->price!=''){ ?>
                    <span><?php echo $currency.' '.number_format(@$val->price); ?></span>
                    <?php } ?>
                  </div>
                  <p><?php echo substr(strip_tags($val->description),0,70).'...'; ?> <em><?php echo $times; ?></em> </p>
                </div>
              </div>
            </div>
            </a> </div>
          <?php } ?>
          <?php $i++; } } ?>
          <div class="list-item">
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <ins class="adsbygoogle"
           style="display:block"
           data-ad-format="fluid"
           data-ad-layout-key="-h8+n-2m-a3+sm"
           data-ad-client="ca-pub-8267866280490368"
           data-ad-slot="8254399351"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
           </script></div>
          <div class="list-item"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <ins class="adsbygoogle"
          style="display:block"
          data-ad-format="fluid"
          data-ad-layout-key="-h8+n-2m-a3+sm"
          data-ad-client="ca-pub-8267866280490368"
          data-ad-slot="8254399351"></ins>
          <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
          </script></div>
        </section>
        <section class="box-typical hero-radius">
          <div class="box-typical-header hero-radius">Latest Posts<span class="typical-box-ar pull-right">أحدث الإعلانات‎  </span></div>
          <?php $i=1; if($latestpost){ foreach($latestpost as $val){
        $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
        $title = str_replace('  ',' ',strtolower($title));
        $title = str_replace(' ','-',$title);
        $latest = $title.'-'.$val->id;
        $main_image = $this->yalalink_model->getMainImage($val->id);
        $user = $this->yalalink_model->getUserDetails($val->user_id);
        if($main_image) {
         $img = 'uploads/images/thumbnail/'.@$main_image->image;
         $r_img = 'uploads/images/'.@$main_image->image;
         if(file_exists(@$img)){ 
         $image = $img; 
         }elseif(file_exists(@$r_img)){ 
         $image = $r_img; 
         }else{
         $image = 'assets/front_end/images/no_image_available.jpg'; 
         }
         if(file_exists(@$image)){
           $image = $image;
         }else{
           $image = 'assets/front_end/images/no_image_available.jpg';
         }
        }else{
          $img = 'assets/front_end/images/no_image_available.jpg';
          $image = 'assets/front_end/images/no_image_available.jpg';
        } 
        $timestamp = $val->added_date;
          $times = $this->yalalink_model->facebook_time_ago($timestamp);
        if($val->main_category == 'Real Estate'){ $l_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $l_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $l_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $l_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $l_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $l_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $l_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $l_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $l_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $l_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
          if($i==1){?>
          <div class="list-item list-item-full-width"> 
           <a href="<?php echo @$l_link; ?>">
           <div class="tbl-cell tbl-cell-photo"> <img src="<?php echo @$image; ?>"> </div><div class="item-row">
             <div class="tbl-row">
               <div class="content">
                 <div class="head">
                   <?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span>
                    <?php }elseif($val->price!=0 || $val->price!=''){ ?>
                    <?php if($val->price){ ?>
                    <span><?php echo $currency.' '.number_format(@$val->price); ?></span>
                    <?php } } ?>
                 </div>
                 <p><?php echo substr(strip_tags($val->description),0,70).'...'; ?> <em><?php echo $times; ?></em> </p>
               </div>
             </div>
           </div>
           </a> 
          </div>
           <?php }else{ ?>

          <div class="list-item"> <a href="<?php echo @$l_link; ?>" >
            <div class="item-row">
              <div class="tbl-row">
                <div class="tbl-cell tbl-cell-photo"> <img src="<?php echo @$image; ?>"> </div>
                <div class="content">
                  <div class="head"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span>
                    <?php }elseif($val->price!=0 || $val->price!=''){ ?>
                    <?php if($val->price){ ?>
                    <span><?php echo $currency.' '.number_format(@$val->price); ?></span>
                    <?php } } ?>
                  </div>
                  <p><?php echo substr(strip_tags($val->description),0,70).'...'; ?> <em><?php echo $times; ?></em> </p>
                </div>
              </div>
            </div>
            </a> </div>
            <?php } ?>
          <?php $i++; } } ?>
        </section>
        <div class="row">
              <div class="col-md-12 cat-add"> <img src="assets/front_end/images/SPL-1.jpg"> </div>
        </div>
        <section class="box-typical hero-radius">
        <div class="box-typical-header hero-radius">Special Offers<span class="typical-box-ar pull-right">عروض خاصة  </span></div>
          <?php $i=1; if($special){ foreach($special as $val){
        $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
        $title = str_replace('  ',' ',strtolower($title));
        $title = str_replace(' ','-',$title);
        $latest = $title.'-'.$val->id;
        $user = $this->yalalink_model->getUserDetails($val->user_id);
        $main_image = $this->yalalink_model->getMainImage($val->id);
        if($main_image) {
        $img = 'uploads/images/thumbnail/'.@$main_image->image;
         $r_img = 'uploads/images/'.@$main_image->image;
         if(file_exists(@$img)){ 
         $image = $img; 
         }elseif(file_exists(@$r_img)){ 
         $image = $r_img; 
         }else{
         $image = 'assets/front_end/images/no_image_available.jpg'; 
         }
         if(file_exists(@$image)){
           $image = $image;
         }else{
           $image = 'assets/front_end/images/no_image_available.jpg';
         }
        }else{
          $img = 'assets/front_end/images/no_image_available.jpg';
          $image = 'assets/front_end/images/no_image_available.jpg';
        } 
        $timestamp = $val->added_date;
          $times = $this->yalalink_model->facebook_time_ago($timestamp);
        if($val->main_category == 'Real Estate'){ $s_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $s_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $s_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $s_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $s_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $s_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $s_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $s_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $s_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $s_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $l_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $l_link = 'women-beauty/view/'.$latest; }
          if($i==1){?>
          <div class="list-item list-item-full-width"> 
           <a href="<?php echo @$s_link; ?>">
           <div class="tbl-cell tbl-cell-photo"> <img src="<?php echo @$image; ?>"> </div><div class="item-row">
             <div class="tbl-row">
               <div class="content">
                 <div class="head">
                   <?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span>
                    <?php }elseif($val->price!=0 || $val->price!=''){ ?>
                    <?php if($val->price){ ?>
                    <span><?php echo $currency.' '.number_format(@$val->price); ?></span>
                    <?php } } ?>
                 </div>
                 <p><?php echo substr(strip_tags($val->description),0,70).'...'; ?> <em><?php echo $times; ?></em> </p>
               </div>
             </div>
           </div>
           </a> 
          </div>
           <?php }else{ ?>
          <div class="list-item"> <a href="<?php echo @$s_link; ?>" >
            <div class="item-row">
              <div class="tbl-row">
                <div class="tbl-cell tbl-cell-photo"> <img src="<?php echo @$image; ?>"> </div>
                <div class="content">
                  <div class="head"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span>
                    <?php }elseif($val->price!=0 || $val->price!=''){ ?>
                    <?php if($val->price){ ?>
                    <span><?php echo $currency.' '.number_format(@$val->price); ?></span>
                    <?php }} ?>
                  </div>
                  <p><?php echo substr(strip_tags($val->description),0,70).'...'; ?> <em><?php echo $times; ?></em> </p>
                </div>
              </div>
            </div>
            </a> </div>
            <?php } ?>
          <?php $i++; } } ?>
        </section>

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Banner -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:728px;height:90px"
             data-ad-client="ca-pub-8267866280490368"
             data-ad-slot="4614962273"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

        <?php if(!$userdata['userid']) { ?>
        <div class="full-wrap free-reg">
          <div class="row">
            <div class="col-md-3 col-sm-12"> <img src="assets/front_end/images/web-add-33.jpg" class="index-bottom-add"> </div>
            <div class="col-md-9 col-sm-12 reg-box">
              <section class="box-typical hero-radius">
                <div class="head"> <span>Yalalink Membership</span> <span class="ar-txt ar-lang">عضوية  يلا لينك </span>
                  <div class="free-ico"></div>
                </div>
                <div class="full-wrap content">
                  <div class="col-md-8 col-sm-12 desc no-padding">
                    <div class="point"> <i class="fa fa-check-square-o" aria-hidden="true"></i> Members Get Free Advertising </div>
                    <div class="point"> <i class="fa fa-check-square-o" aria-hidden="true"></i> Get Special Discount From Participating Brands & stores </div>
                  </div>
                  <div class="col-md-4 col-sm-12 desc no-padding ar-txt ar-lang">
                    <div class="point"> <i class="fa fa-check-square-o" aria-hidden="true"></i>إعلانات مجانية للأعضاء المسجلين</div>
                    <div class="point"> <i class="fa fa-check-square-o" aria-hidden="true"></i>أحصل على خصومات خاصة من الشركات و المتاجر</div>
                  </div>
                  <div class="full-wrap pull-left"> <a href="register" class="hero-button btn-place-ad reg-button"> <span>Register / Sign Up</span> <i class="fa fa-user-plus bounce-ani" aria-hidden="true"></i> </a> </div>
                </div>
              </section>
            </div>
        </div>
        </div>
        <?php } ?>
        <?php $this->load->view('front_end/include/country-flag',compact('country_code')); ?>
      </div>
      <!-- col -->
      </div>
      
      


       <div class="col-md-4 cat-wrap">
          <ul>
            <div class="row">
              <div class="col-md-12">
                <li> <a href="real-estate" class="full-click"> <span class="hero-bg-img cat-icon real-estate-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Real Estate</div>
                    <div class="ar-txt cat-ar">عقارات </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="real-estate?type=New">New</a> <a href="real-estate?type=Used">Used</a> </div>
                </li>
                <li> <a href="jobs" class="full-click"> <span class="hero-bg-img cat-icon job-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Jobs</div>
                    <div class="ar-txt cat-ar">وظائف </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="jobs?type=Hiring">Job Offers</a> <a href="jobs?type=Looking">Talents</a> </div>
                </li>
                <li> <a href="auto" class="full-click"> <span class="hero-bg-img cat-icon auto-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Auto</div>
                    <div class="ar-txt cat-ar">سيارات </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="auto?type=New">New</a> <a href="auto?type=Used">Used</a> </div>
                </li>
                <li> <a href="classifieds" class="full-click"> <span class="hero-bg-img cat-icon classi-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Classifieds</div>
                    <div class="ar-txt cat-ar">إعلانات مبوبة </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="classifieds?type=New">New</a> <a href="classifieds?type=Used">Used</a> </div>
                </li>
              </div>
            </div>
            
            <!-- row -->
            <!-- Google Ads -->
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-format="fluid"
                 data-ad-layout-key="-h3-w+1w-8r+gw"
                 data-ad-client="ca-pub-8267866280490368"
                 data-ad-slot="2040100943"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            
            <div class="row">
              <div class="col-md-12">
                <li> <a href="real-estate?property-type=Commercial RealEstate" class="full-click"> <span class="hero-bg-img cat-icon commercial-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Commercial RealEstate</div>
                    <div class="ar-txt cat-ar">عقارات تجارية </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="real-estate?property-type=2&type=New">New</a> <a href="real-estate?property-type=2&type=Used">Pre - Owned</a> </div>
                </li>
                <li> <a href="real-estate?property-type=Villas & Lands" class="full-click"> <span class="hero-bg-img cat-icon villa-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Villas & Lands</div>
                    <div class="ar-txt cat-ar">فلل و أراضي </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="real-estate?property-type=5&type=New">New</a> <a href="real-estate?property-type=2&type=Used">Pre - Owned</a> </div>
                </li>
                <li> <a href="real-estate?property-type=Appartments" class="full-click"> <span class="hero-bg-img cat-icon apart-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Appartments</div>
                    <div class="ar-txt cat-ar">شقق </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="real-estate?property-type=1&type=New">New</a> <a href="real-estate?property-type=1&type=Used">Pre - Owned</a> </div>
                </li>
                <li> <a href="real-estate?property-type=Construction" class="full-click"> <span class="hero-bg-img cat-icon construct-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Construction</div>
                    <div class="ar-txt cat-ar">أعمال البناء </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="real-estate?property-type=3&type=New">New</a> <a href="real-estate?property-type=3&type=Used">Pre - Owned</a> </div>
                </li>
              </div>
            </div>
            
            <!-- row -->
            
            <div class="row">
              <div class="col-md-12 cat-add"> <img src="assets/front_end/images/SPL-1.jpg"> </div>
            </div>
            
            <!-- row -->
            
            <div class="row">
              <div class="col-md-12">
                <li> <a href="housemaids" class="full-click"> <span class="hero-bg-img cat-icon hm-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">House Maids</div>
                    <div class="ar-txt cat-ar">خادمات منازل </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="housemaids?type=Domestic">Domestic</a> <a href="housemaids?type=Abroad">Abroad </a> </div>
                </li>
                <li> <a href="phones" class="full-click"> <span class="hero-bg-img cat-icon phone-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Phones</div>
                    <div class="ar-txt cat-ar">هواتف </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="phones?type=New">New</a> <a href="phones?type=Used">Used</a> </div>
                </li>
                <li> <a href="electronics" class="full-click"> <span class="hero-bg-img cat-icon electro-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Electronics</div>
                    <div class="ar-txt cat-ar">إلكترونيات </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="electronics?type=New">New</a> <a href="electronics?type=Used">Used</a> </div>
                </li>
                <li> <a href="computers" class="full-click"> <span class="hero-bg-img cat-icon computer-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Computers</div>
                    <div class="ar-txt cat-ar">كمبيوترات / حواسيب </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="computers?type=New">New</a> <a href="computers?type=Used">Used</a> </div>
                </li>
              </div>
            </div>
            
            <!-- row -->
            <!-- Google Ads -->
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-format="fluid"
                 data-ad-layout-key="-h3-w+1w-8r+gw"
                 data-ad-client="ca-pub-8267866280490368"
                 data-ad-slot="2040100943"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            
            <div class="row">
              <div class="col-md-12">
                <li> <a href="auto?category=5" class="full-click"> <span class="hero-bg-img cat-icon vip-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">VIP Numbers</div>
                    <div class="ar-txt cat-ar">أرقام مميزة </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="auto?category=5&vehicle-type=Vehicles">Vehicles</a> <a href="auto?category=5&vehicle-type=Motorcycles">Motorcycles</a> </div>
                </li>
                <li> <a href="auto?category=5" class="full-click"> <span class="hero-bg-img cat-icon boat-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Boats & Yachts</div>
                    <div class="ar-txt cat-ar">قوارب و يخوت </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="auto?category=2&type=New">New</a> <a href="auto?category=2&type=Used">Used</a> </div>
                </li>
                <li> <a href="auto?category=3" class="full-click"> <span class="hero-bg-img cat-icon truck-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Trucks & Trailers</div>
                    <div class="ar-txt cat-ar">شاحنات و مقطورات </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="auto?category=3&type=New">New</a> <a href="auto?category=3&type=Used">Used</a> </div>
                </li>
                <li> <a href="education" class="full-click"> <span class="hero-bg-img cat-icon edu-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Education</div>
                    <div class="ar-txt cat-ar">تعليمي </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="education?type=Universities">Schools</a> <a href="education?type=Institutes">Training</a> </div>
                </li>
              </div>
            </div>
            
            <!-- row -->

            <!-- Google Ads -->
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-format="fluid"
                 data-ad-layout-key="-h3-w+1w-8r+gw"
                 data-ad-client="ca-pub-8267866280490368"
                 data-ad-slot="2040100943"></ins>
            <script>
                 (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            
            <div class="row">
              <div class="col-md-12">
                <li> <a href="classifieds?category=18" class="full-click"> <span class="hero-bg-img cat-icon homei-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Home Improvement</div>
                    <div class="ar-txt cat-ar">تحسين المنزل </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="classifieds?category=18&type=New">New</a> <a href="classifieds?category=18&type=Used">Used</a> </div>
                </li>
                <li> <a href="services" class="full-click"> <span class="hero-bg-img cat-icon services-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Services</div>
                    <div class="ar-txt cat-ar">خدمات </div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> <a href="services?type=Maintenance">New</a> <a href="services?type=Services">Used</a> </div>
                </li>
                <li> <a href="healthcare" class="full-click"> <span class="hero-bg-img cat-icon healthcare-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Health Care</div>
                    <div class="ar-txt cat-ar">الرعاية الصحية</div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"> </div>
                </li>
                <li> <a href="women-beauty" class="full-click"> <span class="hero-bg-img cat-icon womenbeauty-ico"></span>
                  <div class="full-wrap cat-txt">
                    <div class="eng-txt">Women & Beauty</div>
                    <div class="ar-txt cat-ar">المرأة و الجمال</div>
                  </div>
                  </a>
                  <div class="cat-switch-btn"></div>
                </li>
              </div>
            </div>
            <!-- row -->
          </ul>

          
        <!-- Google Ads -->
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <ins class="adsbygoogle block-large"
             style="display:inline-block;width:400px;height:400px"
             data-ad-client="ca-pub-8267866280490368"
             data-ad-slot="1270369789"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

        </div>
        <!-- cat-wrap--> 
      
    </div>
    
    <!-- row --> 
    
  </div>
</div>
<?php $this->load->view('front_end/include/footer'); ?>
