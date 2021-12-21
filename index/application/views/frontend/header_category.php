    <header class="header_in is_sticky menu_fixed">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12">
					<div id="logo">
						<a href="<?php echo site_url('home'); ?>">
							<img src="<?php echo base_url();?>assets/frontend/img/dark_logo.png" width="165" height="35" alt="" class="logo_sticky">
						</a>
					</div>
				</div>
				<div class="col-lg-9 col-12">
					<ul id="top_menu">
						<li><a href="<?php echo base_url();?>home/add_listing" class="btn_add"><?= get_phrase('add_listing'); ?></a></li>
						<li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In"><?= get_phrase('sign_in'); ?></a></li>
					</ul>
					<!-- /top_menu -->
					<a href="#menu" class="btn_mobile">
						<div class="hamburger hamburger--spin" id="hamburger">
							<div class="hamburger-box">
								<div class="hamburger-inner"></div>
							</div>
						</div>
					</a>
					<?php include 'menu.php';?>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->

	<div class="sub_header_in sticky_header">
		<div class="container">
			<h1><?= get_phrase('categories'); ?></h1>
		</div>
		<!-- /container -->
	</div>
	<!-- /sub_header -->
