<?php $this->load->view('board/blocks/header'); ?>
<style type="text/css">
.m-login.m-login--1 .m-login__wrapper {
    padding: 5% 2rem 2rem 2rem;
}
.m-login.m-login--2 .m-login__wrapper {
    padding: 3% 2rem 1rem 2rem;
}
.m-login.m-login--2 .m-login__wrapper .m-login__container .m-login__logo {
    margin: 0 auto 1rem auto;
}
</style>
<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url(<?= Core::getBaseUrl() ?>assets/board/app/media/img//bg/bg-3.jpg);">
	<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
		<div class="m-login__container">
			<div class="m-login__logo">
				<a href="#">
					<img src="<?= Core::getBaseUrl() ?>assets/admin/images/logo.jpg" width="160px";>
				</a>
			</div>
			<div class="m-login__signin">
				<div class="m-login__head">
					<h3 class="m-login__title">
						Login to Corporate Account
					</h3>
				</div>
				<?php $this->load->view('board/blocks/alert'); ?>
				<form class="m-login__form m-form" action="<?= Core::getBaseUrl() ?>authenticate" method="POST" name="frnLogin">
					<input type="hidden" name="type" value="ajax">
					<div class="form-group m-form__group">
						<input class="form-control m-input"   type="text" placeholder="Email" name="email" autocomplete="off">
					</div>
					<div class="form-group m-form__group">
						<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
					</div>
					<div class="row m-login__form-sub">
						<div class="col m--align-left m-login__form-left">
							<label class="m-checkbox  m-checkbox--focus">
								<input type="checkbox" name="remember">
								Remember me
								<span></span>
							</label>
						</div>
						<div class="col m--align-right m-login__form-right" style="display: none;">
							<a href="javascript:;" id="m_login_forget_password" class="m-link">
								Forget Password ?
							</a>
						</div>
					</div>
					<div class="m-login__form-action">
						<button type="submit" id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
							Sign In
						</button>
					</div>
				</form>
			</div>
			<div class="m-login__signup">
				<div class="m-login__head">
					<h3 class="m-login__title">
						Sign Up
					</h3>
					<div class="m-login__desc">
						Enter your details to create your account:
					</div>
				</div>
				<form class="m-login__form m-form" action="">
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="text" placeholder="Fullname" name="fullname" >
					</div>
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
					</div>
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="password" placeholder="Password" name="password">
					</div>
					<div class="form-group m-form__group">
						<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="rpassword">
					</div>
					<div class="row form-group m-form__group m-login__form-sub">
						<div class="col m--align-left">
							<label class="m-checkbox m-checkbox--focus">
								<input type="checkbox" name="agree">
								I Agree the
								<a href="#" class="m-link m-link--focus">
									terms and conditions
								</a>
								.
								<span></span>
							</label>
							<span class="m-form__help"></span>
						</div>
					</div>
					<div class="m-login__form-action">
						<button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
							Sign Up
						</button>
						&nbsp;&nbsp;
						<button id="m_login_signup_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn">
							Cancel
						</button>
					</div>
				</form>
			</div>
			<div class="m-login__forget-password">
				<div class="m-login__head">
					<h3 class="m-login__title">
						Forgotten Password ?
					</h3>
					<div class="m-login__desc">
						Enter your email to reset your password:
					</div>
				</div>
				<form class="m-login__form m-form" action="">
					<div class="form-group m-form__group">
						<input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
					</div>
					<div class="m-login__form-action">
						<button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primaryr">
							Request
						</button>
						&nbsp;&nbsp;
						<button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom m-login__btn">
							Cancel
						</button>
					</div>
				</form>
			</div>
			<div class="m-login__account" style="display: none;">
				<span class="m-login__account-msg">
					Don't have an account yet ?
				</span>
				&nbsp;&nbsp;
				<a href="javascript:;" id="m_login_signup" class="m-link m-link--light m-login__account-link">
					Sign Up
				</a>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('board/blocks/footer'); ?>
<script src="<?= Core::getBaseUrl() ?>assets/board/snippets/custom/pages/user/login.js" type="text/javascript"></script>