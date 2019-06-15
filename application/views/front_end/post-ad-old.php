<?php $this->load->view( 'front_end/include/header' );
$userdata = $this->session->userdata( 'logged_yalalink_userdata' ); ?>
<div class="container">
	<div class="row">
		<div class="col-md-9 mx-auto postad-first">
			<div class="card">
				<div class="card-header">Choose a Category:</div>
				<div class="card-body">
					<div class="cat-wrap">
						<ul>
							<div class="row">
								<div class="col-md-12">
									<li> <a href="post-an-ad?category=<?php echo urlencode('Real Estate'); ?>" class="full-click"> <span class="hero-bg-img cat-icon real-estate-ico"></span>
                    <div class="full-wrap cat-txt">
                      <div class="eng-txt">Real Estate</div>
                      <div class="ar-txt cat-ar"> عقارات  </div>
                    </div>
                    </a> </li>
									<li> <a href="post-an-ad?category=<?php echo urlencode('Jobs'); ?>" class="full-click"> <span class="hero-bg-img cat-icon job-ico"></span>
                    <div class="full-wrap cat-txt">
                      <div class="eng-txt">Jobs</div>
                      <div class="ar-txt cat-ar">وظائف   </div>
                    </div>
                    </a> </li>
									<li> <a href="post-an-ad?category=<?php echo urlencode('Auto'); ?>" class="full-click"> <span class="hero-bg-img cat-icon auto-ico"></span>
                    <div class="full-wrap cat-txt">
                      <div class="eng-txt">Auto</div>
                      <div class="ar-txt cat-ar">سيارات   </div>
                    </div>
                    </a> </li>
									<li> <a href="post-an-ad?category=<?php echo urlencode('Classifieds'); ?>" class="full-click"> <span class="hero-bg-img cat-icon classi-ico"></span>
                    <div class="full-wrap cat-txt">
                      <div class="eng-txt">Classifieds</div>
                      <div class="ar-txt cat-ar">إعلانات مبوبة  </div>
                    </div>
                    </a>
									</li>
								</div>
							</div>
							<!-- row -->
							<div class="row">
								<div class="col-md-12">
									<li> <a href="post-an-ad?category=<?php echo urlencode('Real Estate'); ?>&property-type=5" class="full-click"> <span class="hero-bg-img cat-icon commercial-ico"></span>
                    <div class="full-wrap cat-txt">
                      <div class="eng-txt">Commercial Real Estate</div>
                      <div class="ar-txt cat-ar">عقارات تجارية  </div>
                    </div>
                    </a>
									</li>
									<li> <a href="post-an-ad?category=<?php echo urlencode('Real Estate'); ?>&property-type=8" class="full-click"> <span class="hero-bg-img cat-icon villa-ico"></span>
                    <div class="full-wrap cat-txt">
                      <div class="eng-txt">Villas & Lands</div>
                      <div class="ar-txt cat-ar">فلل و أراضي  </div>
                    </div>
                    </a>
									</li>
									<li> <a href="post-an-ad?category=<?php echo urlencode('Real Estate'); ?>&property-type=4" class="full-click"> <span class="hero-bg-img cat-icon apart-ico"></span>
                    <div class="full-wrap cat-txt">
                      <div class="eng-txt">Appartments</div>
                      <div class="ar-txt cat-ar">شقق  </div>
                    </div>
                    </a>
									</li>
									<li> <a href="post-an-ad?category=<?php echo urlencode('Real Estate'); ?>&property-type=6" class="full-click"> <span class="hero-bg-img cat-icon construct-ico"></span>
                    <div class="full-wrap cat-txt">
                      <div class="eng-txt">Construction</div>
                      <div class="ar-txt cat-ar">أعمال البناء </div>
                    </div>
                    </a>
									</li>
								</div>
							</div>
							<!-- row -->
							<div class="row">
								<div class="col-md-12">

									<li> <a href="post-an-ad?category=<?php echo urlencode('House Maids'); ?>" class="full-click"> <span class="hero-bg-img cat-icon hm-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">House Maids</div>

                      <div class="ar-txt cat-ar">خادمات منازل   </div>

                    </div>

                    </a>

									</li>

									<li> <a href="post-an-ad?category=<?php echo urlencode('Phones'); ?>" class="full-click"> <span class="hero-bg-img cat-icon phone-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Phones</div>

                      <div class="ar-txt cat-ar">هواتف    </div>

                    </div>

                    </a>

									</li>

									<li> <a href="post-an-ad?category=<?php echo urlencode('Electronics'); ?>" class="full-click"> <span class="hero-bg-img cat-icon electro-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Electronics</div>

                      <div class="ar-txt cat-ar">إلكترونيات   </div>

                    </div>

                    </a>

									</li>

									<li> <a href="post-an-ad?category=<?php echo urlencode('Computers'); ?>" class="full-click"> <span class="hero-bg-img cat-icon computer-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Computers</div>

                      <div class="ar-txt cat-ar">كمبيوترات / حواسيب   </div>

                    </div>

                    </a>

									</li>

								</div>

							</div>

							<!-- row -->



							<div class="row">

								<div class="col-md-12">

									<li> <a href="post-an-ad?category=<?php echo urlencode('Auto'); ?>&subcategory=<?php echo urlencode('VIP Numbers'); ?>" class="full-click"> <span class="hero-bg-img cat-icon vip-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">VIP Numbers</div>

                      <div class="ar-txt cat-ar">أرقام مميزة  </div>

                    </div>

                    </a>

									</li>

									<li> <a href="post-an-ad?category=<?php echo urlencode('Auto'); ?>&subcategory=<?php echo urlencode('Boats & Yachts'); ?>" class="full-click"> <span class="hero-bg-img cat-icon boat-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Boats & Yachts</div>

                      <div class="ar-txt cat-ar">قوارب و يخوت  </div>

                    </div>

                    </a>

									</li>

									<li> <a href="post-an-ad?category=<?php echo urlencode('Auto'); ?>&subcategory=<?php echo urlencode('Trucks & Trailers'); ?>" class="full-click"> <span class="hero-bg-img cat-icon truck-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Trucks & Trailers</div>

                      <div class="ar-txt cat-ar">شاحنات و مقطورات   </div>

                    </div>

                    </a>

									</li>

									<li> <a href="post-an-ad?category=<?php echo urlencode('Education'); ?>" class="full-click"> <span class="hero-bg-img cat-icon edu-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Education</div>

                      <div class="ar-txt cat-ar">تعليمي   </div>

                    </div>

                    </a>

									</li>

								</div>

							</div>

							<!-- row -->



							<div class="row">

								<div class="col-md-12">

									<?php /*?>
									<li> <a href="post-an-ad?category=<?php echo urlencode('Stock & Share'); ?>" class="full-click"> <span class="hero-bg-img cat-icon ss-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Stock & Share</div>

                      <div class="ar-txt cat-ar">كمبيوترات</div>

                    </div>

                    </a>

									</li>
									<?php */?>

									<li> <a href="post-an-ad?category=<?php echo urlencode('Classifieds'); ?>&sub-category=18" class="full-click"> <span class="hero-bg-img cat-icon homei-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Home Improvement</div>

                      <div class="ar-txt cat-ar">تحسين المنزل   </div>

                    </div>

                    </a>

									</li>

									<li> <a href="post-an-ad?category=<?php echo urlencode('Services'); ?>" class="full-click"> <span class="hero-bg-img cat-icon services-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Services</div>

                      <div class="ar-txt cat-ar">خدمات
                      </div>
                    </div>

                    </a>

									</li>


									<li> <a href="post-an-ad?category=<?php echo urlencode('Health Care'); ?>" class="full-click"> <span class="hero-bg-img cat-icon healthcare-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Health Care</div>

                      <div class="ar-txt cat-ar">الرعاية الصحية
                      </div>
                    </div>

                    </a>

									</li>
									<li> <a href="post-an-ad?category=<?php echo urlencode('Women Beauty'); ?>" class="full-click"> <span class="hero-bg-img cat-icon womenbeauty-ico"></span>

                    <div class="full-wrap cat-txt">

                      <div class="eng-txt">Women & Beauty</div>

                      <div class="ar-txt cat-ar">المرأة و الجمال
                      </div>
                    </div>

                    </a>

									</li>

								</div>

							</div>

							<!-- row -->



						</ul>

					</div>

					<!-- cat-wrap-->

				</div>

			</div>

		</div>

	</div>

</div>

<?php $this->load->view('front_end/include/footer'); ?>