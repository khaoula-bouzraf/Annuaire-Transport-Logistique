<?php $user_details = $this->user_model->get_all_users($listing_details['user_id'])->row_array(); ?>
<div class="row mb-3">
	<div class="col-12">
		<h5 class="mb-3"><?php echo get_phrase('contact'); ?></h5>

		<div class="row mb-1">
			<div class="col-md-12">
				<img src="<?php echo $this->user_model->get_user_thumbnail($this->session->userdata('user_id')); ?>" alt="" class="float-left mr-3" width="80">
			
				<p class="m-0 pt-1"><b><?= $user_details['name']; ?></b></p>
				<p class="m-0 p-0"><i class="fas fa-home text-13 border-bottom pb-1"> <?= $user_details['address']; ?></i></p>
				<p class="text-12 m-0 text-muted"><?= $user_details['about']; ?></p>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-12">
				
			</div>
		</div>

		<?php if($listing_details['website'] != ""){ ?>
			<a href="<?php echo $listing_details['website']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-globe-6 mr-2"></i><?php echo get_phrase('website'); ?></a>
		<?php } ?>

		<?php if($listing_details['email'] != ""){ ?>
			<a href="mailto:<?php echo $listing_details['email']; ?>" target="" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-email mr-2"></i><?php echo get_phrase('email_us'); ?></a>
		<?php } ?>

		<?php if($listing_details['phone'] != ""){ ?>
			<a href="tel:<?php echo $listing_details['phone']; ?>" target="" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-phone mr-2"></i><?php echo get_phrase('call_now'); ?></a>
		<?php } ?>


		<?php $social = $listing_details['social']; ?>
		<?php $social = json_decode($social, true); ?>

		<?php if($social['facebook'] != ""){ ?>
			<a href="<?php echo $social['facebook']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-facebook-6 mr-2"></i><?php echo get_phrase('facebook'); ?></a>
		<?php } ?>

		<?php if($social['twitter'] != ""){ ?>
			<a href="<?php echo $social['twitter']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-twitter mr-2"></i><?php echo get_phrase('twitter'); ?></a>
		<?php } ?>

		<?php if($social['linkedin'] != ""){ ?>
			<a href="<?php echo $social['linkedin']; ?>" target="blank" class="btn_1 full-width outline wishlist social-button" id = "btn-wishlist-social"><i class="icon-linkedin mr-2"></i><?php echo get_phrase('linkedin'); ?></a>
		<?php } ?>
	</div>
</div>
