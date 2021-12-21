<?php
// Paypal Keys
$paypal_settings = get_settings('paypal');
$paypal = json_decode($paypal_settings);

// Stripe Keys
$stripe_settings = get_settings('stripe');
$stripe = json_decode($stripe_settings);
?>

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

							<div class="category-actions text-center">
								<?php
									$package_type = $package['package_type'];

									$total_submited_package = 0;
									$sumited_packages = $this->db->get_where('listing', array('user_id' => $this->session->userdata('user_id')))->result_array();
									foreach($sumited_packages as $sumited_package){
										$total_submited_package++;
									}

									if($package_type == 0){

										if($total_submited_package > $package['number_of_listings']){
											echo "<span style = 'color: red;'>".get_phrase('listings_capacity_limited').', '.get_phrase('please_choose_a_upper_level_package')."</span>";
										}else{
								?>
											<a href="<?php echo site_url('user/free_package/free/'.$this->session->userdata('user_id').'/'.$package['id'].'/0') ?>" class="btn btn-primary mt-4 mb-2 btn-rounded"><?php echo get_phrase('choose_plan'); ?></a>
								<?php
										}
									}else{

										if($total_submited_package > $package['number_of_listings']){
											echo "<span style = 'color: red;'>".get_phrase('listings_capacity_limited').', '.get_phrase('please_choose_a_upper_level_package')."</span>";
										}else{
								?>
											<a href="<?php echo site_url('user/payment_gateway/'.$package['id']); ?>" class="btn btn-orange mt-4 mb-2 btn-rounded"><?php echo get_phrase('purchase_plan'); ?></a>
								<?php
										}
									}
								?>
		          			</div>
						</article>
					</div>
					<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>