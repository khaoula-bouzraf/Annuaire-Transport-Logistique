<!-- start page title -->
<div class="row ">
	<div class="col-lg-12">
		<a href="<?php echo site_url('admin/package_form/add'); ?>" class="btn btn-primary alignToTitle"><i class="mdi mdi-plus"></i><?php echo get_phrase('add_new_package'); ?></a>
	</div><!-- end col-->
</div>
<div class="row">
	<div class="col-lg-12">
		<!-- Pricing Title-->
		<div class="text-center">
			<h3 class="mb-2"><?php echo get_phrase('our_plans_and_pricings'); ?></h3>
			<p class="text-muted w-50 m-auto">
				<?php echo get_phrase('we_have_plans_and_prices_that_fit_your_business_perfectly').'. '; ?>
			</p>
		</div>
		<div class="gallery-env">
			<div class="row">
				<?php foreach ($packages as $package): ?>
					<div class="col-sm-4">
						<article class="album">
							<section class="album-info text-center">
								<h2><a href="extra-gallery-single.html"><?php echo $package['name']; ?></a></h2>
								<p>
									<h4>
										<i>
											<?php if ($package['package_type'] == 0): ?>
												<div class="label label-success"><?php echo get_phrase('free'); ?></div>
											<?php else: ?>
												<?php echo currency($package['price']); ?> <span>/ <?php echo $package['validity'].' '.get_phrase('days'); ?></span>
											<?php endif; ?>
										</i>
									</h4>
								</p>
								<p>
									<?php if ($package['is_recommended'] == 1): ?>
										<div class="label label-info"><?php echo get_phrase('recommended'); ?></div>
									<?php endif; ?>
								</p>
							</section>

							<footer class="text-center">
								<div class="album-images-count"> <?php echo $package['number_of_listings'].' '.get_phrase('listings'); ?> <?php echo get_phrase('this_package'); ?> </div>
							</footer>
							<footer>
								<div class="album-images-count"> <?php echo $package['number_of_categories'].' '.get_phrase('categories'); ?> <?php echo get_phrase('per_listing'); ?> </div>
							</footer>
							<footer>
								<div class="album-images-count"> <?php echo $package['number_of_photos'].' '.get_phrase('photos'); ?>  <?php echo get_phrase('per_listing'); ?> </div>
							</footer>
							<footer>
								<div class="album-images-count"> <?php echo $package['number_of_tags'].' '.get_phrase('tags'); ?> <?php echo get_phrase('per_listing'); ?> </div>
							</footer>
							<footer>
								<div class="album-images-count"> <?php echo $package['ability_to_add_contact_form'] == 1 ? get_phrase('availability_of') : get_phrase('unavailability_of'); ?> <?php echo get_phrase('contact_form'); ?> </div>
							</footer>
							<footer>
								<div class="album-images-count"> <?php echo $package['ability_to_add_video'] == 1 ? get_phrase('availability_of') : get_phrase('unavailability_of'); ?> <?php echo get_phrase('video'); ?> </div>
							</footer>
							<footer>
								<div class="album-images-count"> <?php echo $package['featured'] == 1 ? get_phrase('featured_listings_allowed') : get_phrase('featured_listings_unallowed'); ?> </div>
							</footer>
							<footer>
								<div class="album-images-count"> <?php echo $package['validity'].' '.get_phrase('days'); ?> <?php echo get_phrase('listing'); ?> </div>
							</footer>
							<div class="category-actions">
		            <a href = "<?php echo site_url('admin/package_form/edit/'.$package['id']); ?>" class="btn btn-info" style="margin-right:5px;">
		  						<?php echo get_phrase('edit'); ?>
		  					</a>

		            <a href = "javascript::" class="btn btn-red" style="float: right; margin-right:5px;" onclick="confirm_modal('<?php echo site_url('admin/packages/delete/'.$package['id']); ?>');">
		  						<?php echo get_phrase('delete'); ?>
		  					</a>
		          </div>
						</article>
					</div>
					<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
