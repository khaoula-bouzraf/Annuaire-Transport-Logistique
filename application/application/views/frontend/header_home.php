<header class="header menu_fixed">
		<div id="logo">
			<a href="<?php echo site_url('home'); ?>" title="<?php echo get_settings('system_title'); ?>">
				<img src="<?php echo base_url();?>assets/global/light_logo.png" width="165" height="35" alt="" class="logo_normal">
				<img src="<?php echo base_url();?>assets/global/dark_logo.png" width="165" height="35" alt="" class="logo_sticky">
			</a>
		</div>
		<ul id="top_menu">
			<?php if ($this->session->userdata('is_logged_in') != 1): ?>
				<li><a href="<?php echo site_url('home/login'); ?>" class="login" title="Sign In"><?= get_phrase('sign_in'); ?></a></li>
			<?php endif; ?>
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
	</header>
