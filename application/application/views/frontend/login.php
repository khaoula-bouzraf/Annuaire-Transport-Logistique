<div class="container margin_60">
	<div class="row justify-content-center">
		<div class="col-xl-6 col-lg-6 col-md-8">
			<div class="box_account">
				<h3 class="client"><?php echo get_phrase('already_registered'); ?></h3>
				<form class="" action="<?php echo site_url('login/validate_login'); ?>" method="post">
					<div class="form_container">
						<div class="divider"><span><?php echo get_phrase('login_credentials'); ?></span></div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email*">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" name="password" id="password" value="" placeholder="Password*">
						</div>
						<div class="clearfix add_bottom_15">
							<div class="float-right"><a id="forgot-pass" href="<?php echo site_url('home/forgot_password'); ?>"> <small><?php echo get_phrase('lost_password'); ?>?</small> </a></div>
						</div>
						

						<div class="row">
							<div class="col-md-12 mb-2">
								<input type="submit" value="Log In" class="btn_1 w-100">
							</div>
							<div class="col-md-12">
								<a id="sign_up" class="btn_1 full-width outline wishlist icon-login" href="<?php echo site_url('home/sign_up'); ?>"><?php echo get_phrase("sign_up"); ?></a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>