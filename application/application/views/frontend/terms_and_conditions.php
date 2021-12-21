<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-5">
			<div id="confirm">
				<div class="icon icon--order-success svg add_bottom_15">
					<!-- <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
						<g fill="none" stroke="#8EC343" stroke-width="2">
							<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
							<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
						</g>
					</svg> -->
					<img src="<?php echo base_url('assets/frontend/images/terms-and-conditions.svg'); ?>" alt="" style="height: 72px; width: 72px;">
				</div>
				<h2><?php echo get_phrase('terms_and_conditions'); ?></h2>
				<!-- <p>Lorem Ipsum Dolor Emmet</p> -->
			</div>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<div class="bg_color_1">
	<div class="container margin_60_35">
		<div class="row">
			<p>
				<?php echo get_frontend_settings('terms_and_condition'); ?>
			</p>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
