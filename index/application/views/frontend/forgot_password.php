<div class="container margin_60">
	<div class="row justify-content-center">
		<div class="col-xl-6 col-lg-6 col-md-8">
			<div class="box_account">
				<h3 class="client"><?php echo get_phrase('retrieve_your_password'); ?></h3>
				<form class="" action="<?php echo site_url('login/forgot_password'); ?>" method="post">
					<div class="form_container">
						<div class="divider"><span><?php echo get_phrase('registered_email'); ?></span></div>
						<div class="form-group">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email*">
						</div>
						<div class="clearfix add_bottom_15">
							<div class="float-left"><a id="sign_up" href="<?php echo site_url('home/sign_up'); ?>"> <small><?php echo get_phrase("don't_have_an_account").'?'; ?></small> </a></div>
							<div class="float-right"><a id="login" href="<?php echo site_url('home/login'); ?>"> <small><?php echo get_phrase('back_to_login'); ?>?</small> </a></div>
						</div>
						<div class="text-center"><input type="submit" value="<?php echo get_phrase('send_password_through_mail'); ?>" class="btn_1 full-width"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
