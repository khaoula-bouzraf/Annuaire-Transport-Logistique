
<header class="header_in <?php if($this->session->userdata('listings_view') == 'list_view') echo 'map_view' ?>">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-12">
				<div id="logo">
					<a href="<?php echo site_url('home'); ?>">
						<img src="<?php echo base_url();?>assets/global/dark_logo.png" width="165" height="35" alt="" class="logo_sticky">
					</a>
				</div>
			</div>
			<div class="col-lg-9 col-12">
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
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
	<!-- search_mobile -->
	<div class="layer"></div>
	<div id="search_mobile">
		<a href="#" class="side_panel"><i class="icon_close"></i></a>
		<div class="custom-search-input-2">
			<div class="form-group">
				<input class="form-control" type="text" placeholder="What are you looking..">
				<i class="icon_search"></i>
			</div>
			<div class="form-group">
				<input class="form-control" type="text" placeholder="Where">
				<i class="icon_pin_alt"></i>
			</div>
			<select class="wide">
				<option>All Categories</option>
				<option>Shops</option>
				<option>Hotels</option>
				<option>Restaurants</option>
				<option>Bars</option>
				<option>Events</option>
				<option>Fitness</option>
			</select>
			<input type="submit" value="Search">
		</div>
	</div>
	<!-- /search_mobile -->
</header>
