<div id="error_page">
	<div class="wrapper">
		<div class="container">
			<div class="row justify-content-center text-center">
				<div class="col-xl-7 col-lg-9">
					<h2>404 <i class="icon_error-triangle_alt"></i></h2>
					<p><?php echo get_phrase('we_are_sorry').', '.get_phrase('but_the_page_you_are_looking_for_does_not_exist'); ?></p>
					<form action="<?php echo site_url('home/search'); ?>" method="get">
						<div class="search_bar_error">
							<input type="text" class="form-control" name="search_string" placeholder="<?php echo get_phrase('what_are_you_looking_for'); ?>?" >
							<input type="submit" value="<?php echo get_phrase('search'); ?>">
							<input type="hidden" name="selected_category_id" value="">
						</div>
					</form>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /wrapper -->
</div>
