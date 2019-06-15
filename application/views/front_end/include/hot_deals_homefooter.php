<section class="box-typical hero-radius">
        <ul class="product_list_widget">
        <?php if($specialhomefooter){ foreach($specialhomefooter as $val){
        $title = preg_replace("/[^a-zA-Z0-9 ]+/", "", $val->title_en);
        $title = str_replace('  ',' ',strtolower($title));
        $title = str_replace(' ','-',$title);
        $latest = $title.'-'.$val->id;
        $currency='';
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
        if($val->main_category == 'Real Estate'){ $s_link = 'real-estate/view/'.$latest; }elseif($val->main_category == 'Jobs'){ $s_link = 'jobs/view/'.$latest; }elseif($val->main_category == 'Auto'){ $s_link = 'auto/view/'.$latest; }elseif($val->main_category == 'Classifieds'){ $s_link = 'classifieds/view/'.$latest; }elseif($val->main_category == 'House Maids'){ $s_link = 'housemaids/view/'.$latest; }elseif($val->main_category == 'Phones'){ $s_link = 'phones/view/'.$latest; }elseif($val->main_category == 'Electronics'){ $s_link = 'electronics/view/'.$latest; }elseif($val->main_category == 'Computers'){ $s_link = 'computers/view/'.$latest; }elseif($val->main_category == 'Education'){ $s_link = 'education/view/'.$latest; }elseif($val->main_category == 'Services'){ $s_link = 'services/view/'.$latest; }elseif($val->main_category == 'Health Care'){ $s_link = 'healthcare/view/'.$latest; }elseif($val->main_category == 'Women & Beauty'){ $s_link = 'women-beauty/view/'.$latest; }?>
         <li> <div class="list-item" style="width:100%;"> <a href="<?php echo @$s_link; ?>" >
            <div class="item-row">
              <div class="tbl-row">
                <div class="tbl-cell tbl-cell-photo"> <img src="<?php echo @$image; ?>"> </div>
                <div class="content">
                  <div class="head" style="margin-left: 16px;"><?php echo substr($val->title_en,0,30).'...'; if($val->offer_price!=0 || $val->offer_price!=''){ ?> <span><?php echo $currency.' '.number_format(@$val->offer_price); ?></span>
                    <?php }elseif($val->price!=0 || $val->price!=''){ ?>
                    <?php if($val->price){ ?>
                    <span><?php echo $currency.' '.number_format(@$val->price); ?></span>
                    <?php } } ?>
                  </div>
                  <p><?php //echo substr(strip_tags($val->description),0,70).'...'; ?> <em><?php// echo $times; ?></em> </p>
                </div>
              </div>
            </div>
            </a> </div></li>
          <?php } } ?></ul>
</section>