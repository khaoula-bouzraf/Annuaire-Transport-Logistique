<div class="container margin_80_55">
	<div class="main_title_2">
		<span><em></em></span>
		<h2><?php echo get_phrase('price_packages'); ?></h2>
		<p><?php echo get_phrase('choose_the_best_package_that_suits_you'); ?>.</p>
	</div>
	<div class="pricing-container cd-has-margins">
		<ul class="pricing-list bounce-invert">
			<?php $packages = $this->crud_model->get_packages()->result_array();
			foreach ($packages as $key => $package):?>
			<li <?php if($package['is_recommended'] == 1):?> class="popular" <?php endif; ?>>
				<ul class="pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="pricing-header">
							<h2><?php echo $package['name']; ?></h2>
							<div class="price">
								<span class="price-value"><?php echo currency($package['price']); ?></span>
								<span class="price-duration"><?php echo $package['validity'].' '.get_phrase('days'); ?></span>
							</div>
						</header>
						<!-- /pricing-header -->
						<div class="pricing-body">
							<ul class="pricing-features">
								<li><em><?php echo $package['number_of_listings'].' '.get_phrase('listings'); ?></em> <?php echo get_phrase('this_package'); ?></li>
								<li><em><?php echo $package['number_of_categories'].' '.get_phrase('categories'); ?></em> <?php echo get_phrase('per_listing'); ?></li>
								<li><em><?php echo $package['number_of_photos'].' '.get_phrase('photos'); ?></em>  <?php echo get_phrase('per_listing'); ?></li>
								<li><em><?php echo $package['number_of_tags'].' '.get_phrase('tags'); ?></em> <?php echo get_phrase('per_listing'); ?></li>
								<li><em><?php echo $package['ability_to_add_contact_form'] == 1 ? get_phrase('availability_of') : get_phrase('unavailability_of'); ?></em> <?php echo get_phrase('contact_form'); ?></li>
								<li><em><?php echo $package['ability_to_add_video'] == 1 ? get_phrase('availability_of') : get_phrase('unavailability_of'); ?></em> <?php echo get_phrase('video'); ?></li>
								<li><?php echo $package['featured'] == 1 ?'<em>'.get_phrase('featured').' '.get_phrase('listings').' '.'</em>'.' '.get_phrase('allowed') : '<em>'.get_phrase('featured').' '.get_phrase('listings').' '.'</em>'.' '.get_phrase('unallowed'); ?>
								<li><em><?php echo $package['validity'].' '.get_phrase('days'); ?></em> <?php echo get_phrase('listing'); ?></li>
							</ul>
						</div>
						<!-- /pricing-body -->
						<footer class="pricing-footer">
							<?php
								$package_type = $package['package_type'];
								if($package_type == 0){
							?>
								<a class="select-plan" href="<?php echo site_url('user/packages'); ?>"><?php echo get_phrase('free'); ?></a>
							<?php
								}else{
							?>
							<a class="select-plan" href="<?php echo site_url('user/packages'); ?>"><?php echo get_phrase('select'); ?></a>
						<?php } ?>
						</footer>
					</li>
				</ul>
				<!-- /cd-pricing-wrapper -->
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>
