<div class="col col-sm-12 col-md-12 col-xs-12">
	<div class="card mobcardview" style="border: 1px solid #2d2e2e47;background:#ffa50026!important;">
		<div class="card-body">
			<p class="card-text small">
				<a href="<?= $data['url'] ?>"><?= $data['title_en'] ?> | <?= $data['id'] ?> </a>
			</p>
		</div>
		<img class="card-img-top gridmobviewimg instarun" id="<?= $data['id'] ?>" data-groups="post-results" src="<?= $data['img'] ?>" alt="">
		<!--<span class="countimg_grid pccountimg"><i class="fa fa-camera" aria-hidden="true"></i>&nbsp;<?= $data['imgCount'] ?></span>-->
		<span class="instaheart" id="insta-<?= $data['id'] ?>"><i class="fa fa-heart" aria-hidden="true"></i></span>
		<div>
			<div class="card-body">
				<div class="rating gridmobfav" style="display:none;color: #4fc3c5b3;">
					<a class="favorites favorites_<?= $data['id'] ?>" href="login" id="<?= $data['id'] ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
					<span class="count-like-<?= $data['id'] ?>"><?= $data['likes'] ?></span>
					<span style="margin-left: 34px;"><a href="whatsapp://send?text=<?= $data['url'] ?>" data-placement="bottom" title="whatsup" data-original-title="whatsup"><i class="fab fa-whatsapp" aria-hidden="true" style="color:#4fc3c5b3;font-size: 19px;"></i> </a></span>
					<span style="margin-left:14px;"><a href="" target="_blank" title="Facebook" data-placement="bottom" data-original-title="Facebook"><i class="fab fa-facebook-f" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
					<span style="margin-left:14px;"><a href="twitter://post?message=<?= $data['url'] ?>" data-placement="bottom" title="Twitter" data-original-title="Twitter"><i class="fab fa-twitter" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
					<span style="margin-left:14px;"><a href="javascript:void(0)" onclick="copyLink('<?= $data['url'] ?>')" title="Twitter" data-original-title="Twitter"><i class="far fa-clone" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
					<span style="margin-left:14px; display:-webkit-inline-box"><a href="javascript:void(0);" data-toggle="modal" data-target="#sendMail" data-placement="top" title="Mail togalious@reborn.com" class="btn-shadow icon-btn detail-btn btn-FF9800"><i class="fas fa-envelope" aria-hidden="true" style="color:#4fc3c5b3;"></i> </a></span>
					<span class="calllist" style="margin-left:14px;"><a href="tel:026411656" data-placement="bottom" title="call" data-original-title="call">call <i class="fa fa-phone" style="font-size:12px;" aria-hidden="true"></i></a></span>
					<span class="added-date" style="float:right;margin-right: 4px;font-size: 11px;"><?= $data['mobdateAdded'] ?></span>
				</div>
				<p class="card-text small titmobview" style="display:none;">
					<a href="<?= $data['url'] ?>"><?= $data['title_en'] ?></a>
				</p>
				<h5 class="card-title2"><a href="<?= $data['url'] ?>" style="color:red"><?= $data['currency'] ?> <?= $data['price'] ?></a></h5>
				<p class="card-text"><a href="<?= $data['url'] ?>"> <?= strip_tags(substr($data['description'], 0, 100)) ?>...</a>
					<br>
				</p><span class="rd_more"><a href="<?= $data['url'] ?>">details التفاصيل</a></span>
			</div>
		</div>
		<div class="bottom">
			<div class="rating gridfav">
				<a class="favorites favorites_<?= $data['id'] ?>" href="#" id="<?= $data['id'] ?>"><i class="far fa-heart" aria-hidden="true"></i></a>
			</div>
			<span class="count-like-<?= $data['id'] ?> gridcnt"><?= $data['likes'] ?></span><span class="added-date griddt"><?= $data['dateAdded'] ?></span>
			<span class="bedroom gridbed" style="color: #000000b0;font-size:13px;margin-left: 10px;display: -webkit-inline-box;"><a href="http://demo.yalalink.com/real-estate/view/brand-new-6-br-villa-in-abu-dhabi-hills-ad-<?= $data['id'] ?>" title="bedroom" style="color:#00000096;"><i class="fa fa-bed" aria-hidden="true" style="font-size: 14px;" alt="bedroom">  </i></a>&nbsp;<?= $data['bedroom'] ?></span>
			<span class="bathroom gridbath" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;"><a href="http://demo.yalalink.com/real-estate/view/brand-new-6-br-villa-in-abu-dhabi-hills-ad-<?= $data['id'] ?>" title="bathroom" style="color:#00000096;"><i class="fa fa-bath" aria-hidden="true" style="font-size: 14px;margin-top: 8px;" alt="bathroom"></i></a>&nbsp;<?= $data['bathroom'] ?></span>
			<span class="pool" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="http://demo.yalalink.com/real-estate/view/brand-new-6-br-villa-in-abu-dhabi-hills-ad-<?= $data['id'] ?>" title="Garage" style="color:#00000096;"><i class="fas fa-car" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?= $data['garage'] ?></span>
			<span class="pool1" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="http://demo.yalalink.com/real-estate/view/brand-new-6-br-villa-in-abu-dhabi-hills-ad-<?= $data['id'] ?>" title="pool" style="color:#00000096;"><i class="fas fa-swimming-pool" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?= $data['pool'] ?></span>
			<span class="balcony" style="color: #000000b0;font-size:13px;display: -webkit-inline-box;height: 15px;"><a href="http://demo.yalalink.com/real-estate/view/brand-new-6-br-villa-in-abu-dhabi-hills-ad-<?= $data['id'] ?>" title="balcony" style="color:#00000096;"><i class="fas fa-hotel" aria-hidden="true" style="font-size: 14px;" alt="bathroom"></i></a>&nbsp;<?= $data['balcony'] ?></span>
			<span class="countimg_grid imgcnt_mob" style="display:none"><i class="fa fa-camera" aria-hidden="true" style="font-size: 14px;"></i>&nbsp;<?= $data['imgCount'] ?></span>
		</div>
	</div>

</div>