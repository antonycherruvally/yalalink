<?php $country = Core::getHelper('location')->getCountryDetails( $country ); ?>
<aside class="widget widget_products country_wisesecnd" id="country-sidebar" style="border: 1px solid #d3d3d07d;
    padding: 1px 1px 405px 1px;">
	
		<h3 class="widget-title widgetsend" style="font-size: 14px;">
			<?= $country['cCode'] ?> Yalalink
			<img src="<?= $country['img'] ?>" style="width: 57px;height: 40px;margin-top: -12px;margin-left: 10px;">
			<span style="margin-left: 10px;">
				<?= $country['ar'] ?> يلا لينك
			</span>
			<a href="<?= Core::getBaseUrl() ?>api/?changecountry=<?= $country['code'] ?>&redirect=<?= strtolower(str_replace(" ", "-", $main_category)) ?>">
				<span class="cGoThere">Go There إذهب إلى</span>
			</a>
		</h3>
			<ul class="product_list_widget">

<div class="col col-sm-12 col-md-12 col-xs-12">
	<div class="card diffCountry mobcardview" style="border: 1px solid #2d2e2e47;background: #f1f1ee!important;">
		<div class="card-body">
			<p class="card-text small">
				<a href="<?= $url ?>"><?= substr($title_en,0,20) ?> </a>
			</p>
		</div>
		<img class="card-img-top gridmobviewimg instarun" id="<?= $id ?>" data-groups="country-sidebar" src="<?= $img ?>" alt="">
		<span class="instaheart" id="insta-<?= $id  ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
		<div>
			<div class="card-body">
				<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
					<a class="favorites favorites_<?= $id  ?>" href="#" id="<?= $id  ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
					<span class="count-like-<?= $id  ?>"><?= $likes ?></span>
					<span style="margin-left: 34px;"><a href="whatsapp://send?text=<?= $url ?>" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
					<span style="margin-left:14px;"><a href="" target="_blank" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
					<span style="margin-left:14px;"><a href="twitter://post?message=<?= $url ?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
					<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('<?= $url ?>')" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
					<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="#sendMail" data-placement="top" title="Mail togalious@reborn.com" class="btn-shadow icon-btn detail-btn btn-FF9800"><i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
					<span class="calllist" style="margin-left:14px;"><a href="tel:<?= $mobile ?>" data-placement="bottom" title="call" data-original-title="call">call <i class="fa fa-phone" style="font-size:12px;" aria-hidden="true"></i></a></span>
					<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"><?= $mobdateAdded ?></span>
				</div>
				<p class="card-text small titmobview" style="display:none;">
					<a style="font-weight:100" href="<?= $url ?>"><?= $title_en ?></a>
				</p>
				<h5 class="card-title2"><a href="<?= $url ?>" style="color:red"><?= $country['curCode'] ?> <?= $price ?></a></h5>
				<p class="card-text"><a href="<?= $url ?>"> <?= strip_tags(substr($description, 0, 30)) ?>...</a>
					<br>
				</p><span class="rd_more"><a href="<?= $url ?>?>">details التفاصيل</a></span>
			</div>
		</div>
		<div class="bottom">
			<div class="rating gridfav">
				<a class="favorites favorites_<?= $id  ?>" href="#" id="<?= $id  ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
			</div>
			<span class="count-like-<?= $id  ?> gridcnt"><?= $data['likes'] ?></span><span class="added-date griddt"><?= $dateAdded ?></span>
			<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="http://demo.yalalink.com/real-estate/view/brand-new-6-br-villa-in-abu-dhabi-hills-ad-<?= $id  ?>" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?= $data['bedroom'] ?></span>
			<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="http://demo.yalalink.com/real-estate/view/brand-new-6-br-villa-in-abu-dhabi-hills-ad-<?= $id  ?>" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?= $data['bathroom'] ?></span>
			<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="http://demo.yalalink.com/real-estate/view/brand-new-6-br-villa-in-abu-dhabi-hills-ad-<?= $id  ?>" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?= $data['garage'] ?></span>
			<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="http://demo.yalalink.com/real-estate/view/brand-new-6-br-villa-in-abu-dhabi-hills-ad-<?= $id  ?>" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?= $data['pool'] ?></span>
			<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="http://demo.yalalink.com/real-estate/view/brand-new-6-br-villa-in-abu-dhabi-hills-ad-<?= $id  ?>" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?= $data['balcony'] ?></span>
			<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;<?= $imgCount ?></span>
		</div>
	</div>
</div>
		</ul>
	
</aside>