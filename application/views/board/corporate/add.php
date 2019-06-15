<?php $this->load->view('board/blocks/header', ['navigation' => true]); ?>
		<!-- begin::Body -->
			<div class="m-grid__item m-grid__item--fluid  m-grid m-grid--ver-desktop m-grid--desktop 	m-container m-container--responsive m-container--xxl m-page__container m-body">
				<?php #$this->load->view('board/blocks/leftsidemenu'); ?>
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<?php $this->load->view('board/blocks/breadcrumbs', [
						'title' => 'Create',
						'b1' => [
							'Corporate', 
							Core::getBaseUrl() . 'board/corporate'
						],
						'b2' => [
							'Create Account', 
							Core::getBaseUrl() . 'board/corporate'
						],
					]); ?>
					<div class="m-content">
						<div class="row">
							<!-- start:form -->
							<div class="col-lg-12">
							<!--begin::Portlet-->
								<div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Enter agent details below
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
									<form id="frmAddCorpAccount" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
										<input type="hidden" name="user_type" value="corporate">
										<div class="m-portlet__body">
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Firstname:
												</label>
												<div class="col-lg-3">
													<input type="text" name="first_name" id="first_name" class="form-control m-input" placeholder="Enter First Name">
												</div>
												<label class="col-lg-2 col-form-label">
													Lastname:
												</label>
												<div class="col-lg-3">
													<input type="text" name="last_name" id="last_name" class="form-control m-input" placeholder="Enter Last Name">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Company:
												</label>
												<div class="col-lg-3">
													<input type="text" name="company_name" id="company_name" class="form-control m-input" placeholder="Enter First Name">
												</div>
												<label class="col-lg-2 col-form-label">
													Gender:
												</label>
												<div class="col-lg-3">
													<div class="m-radio-inline">
														<label class="m-radio">
															<input type="radio" id="gender" name="gender" value="Male">
															Male
															<span></span>
														</label>
														<label class="m-radio">
															<input type="radio" id="gender" name="gender" value="Female">
															Female
															<span></span>
														</label>
														</div>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Email:
												</label>
												<div class="col-lg-3">
													<input type="text" name="email" id="email" class="form-control m-input" placeholder="Enter Email">
												</div>
												<label class="col-lg-2 col-form-label">
													Password:
												</label>
												<div class="col-lg-3">
													<input type="password" name="password" id="password" class="form-control m-input" placeholder="Enter Password">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Address:
												</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<input type="text" name="address" id="address" class="form-control m-input" placeholder="Enter your address">
														<span class="m-input-icon__icon m-input-icon__icon--right">
															<span>
																<i class="la la-map-marker"></i>
															</span>
														</span>
													</div>
												</div>
												<label class="col-lg-2 col-form-label">
													Postcode:
												</label>
												<div class="col-lg-3">
													<div class="m-input-icon m-input-icon--right">
														<input type="text" name="postcode" id="postcode" class="form-control m-input" placeholder="Enter your postcode">
														<span class="m-input-icon__icon m-input-icon__icon--right">
															<span>
																<i class="la la-bookmark-o"></i>
															</span>
														</span>
													</div>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-lg-2 col-form-label">
													Contact:
												</label>
												<div class="col-lg-3">
													<input type="text" name="mobile" id="mobile" class="form-control m-input" placeholder="Enter Contact">
												</div>
												<label class="col-lg-2 col-form-label">
													Verification Code:
												</label>
												<div class="col-lg-3">
													<input type="text" name="vcode" id="vcode" class="form-control m-input m--font-brand disabled" readonly="readonly" value="<?= Core::getModel('board')->genKey() ?>">
												</div>
											</div>
										</div>
										<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
											<div class="m-form__actions m-form__actions--solid">
												<div class="row">
													<div class="col-lg-2"></div>
													<div class="col-lg-10">
														<button type="submit" class="btn btn-success">
															Submit
														</button>
														<button type="reset" class="btn btn-secondary">
															Cancel
														</button>
													</div>
												</div>
											</div>
										</div>
									</form>
									<!--end::Form-->
								</div>
								<!--end::Portlet-->
							</div>
							<!-- end:form -->
						</div>
					</div>
				</div>
		</div>
		<!-- end::Body -->
<?php $this->load->view('board/blocks/footer', [
	'footermisc' => true,
	'js' => [
		'js/addcorporatevalidation.js'
	],
]);  ?>