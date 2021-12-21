<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<style type="text/css">
	.map-scroll:before {
		content: '<?= get_phrase('use_ctrl'); ?> + <?= get_phrase('scroll_to_zoom_the_map'); ?>.';
		position: absolute;
		top: 40%;
		left: 40%;
		z-index: 999;
		font-size: 25px;
	}
	.map-scroll:after {
		position: absolute;
		left: 0;
		right: 0;
		bottom: 0;
		top: 0;
		content: '';
		background: #00000061;
		z-index: 999;
	}
</style>
<main>
	<div id="contact_map" class="map-full map-layout single-listing-map" style="z-index: 50;"></div>
	<!-- /map -->
	<div class="container margin_60_35">
		<div class="row justify-content-center">
			
			<div class="col-xl-5 col-lg-6 pr-xl-5">
				<div class="main_title_3">
					<span></span>
					<h2><?= get_phrase('contact_us'); ?></h2>
					<p style="font-size: 15px;"><?= get_phrase('please_complete_the_form_below_and_send_it_to_us'); ?>.</p>
				</div>
				<form method="post" action="<?= site_url('home/send_contact_message'); ?>" autocomplete="off">
					<div class="form-group">
						<label><?= get_phrase('first_name'); ?></label>
						<input class="form-control" type="text" id="name_contact" name="name_contact" required>
					</div>
					<div class="form-group">
						<label><?= get_phrase('last_name'); ?></label>
						<input class="form-control" type="text" id="lastname_contact" name="lastname_contact" required>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label><?= get_phrase('email'); ?></label>
								<input class="form-control" type="email" id="email_contact" name="email_contact" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label><?= get_phrase('mobile'); ?></label>
								<input class="form-control" type="text" id="phone_contact" name="phone_contact" required>
							</div>
						</div>
					</div>
					<!-- /row -->
					<div class="form-group">
						<label><?= get_phrase('message'); ?></label>
						<textarea class="form-control" id="message_contact" name="message_contact" style="height:120px;" required></textarea>
					</div>

					<div class="row">
						<div class="col-md-6">
							<div class="g-recaptcha" data-sitekey="<?php echo get_settings('recaptcha_sitekey'); ?>"></div>
						</div>
					</div>
					<p class="add_top_30">
						<input class="btn_1" type="submit" value="<?= get_phrase('submit'); ?>">
					</p>
				</form>
			</div>
			<div class="col-xl-5 col-lg-6 pl-xl-5">
				<div class="box_contacts">
					<i class="ti-support"></i>
					<h2><?= get_phrase('any_questions'); ?>?</h2>
					<a href="tel:<?= get_settings('phone'); ?>"><?= get_settings('phone'); ?></a> - <a href="mailto:<?= get_settings('system_email'); ?>"><?= get_settings('system_email'); ?></a>
				</div>
				<div class="box_contacts">
					<i class="ti-home"></i>
					<h2><?= get_phrase('address') ?></h2>
					<a href="#"><?= get_settings('address'); ?></a>
				</div>
			</div>
		</div>
	</div>
	<!-- /container -->
</main>
<!--/main-->

<!-- This script is needed for providing the json file which has all the listing points and required information -->
<script>
	'use strict';
	// gestureHandling: true for ctrl+scroll
    <?php if(get_settings("active_map") == 'openstreetmap'): ?>
    	//free map
        var map = L.map('contact_map').setView([<?= get_settings('default_location'); ?>], 13);
		L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}{r}.png', {
		    attribution: '<a href="<?= site_url(); ?>" target="_blank"><?= get_settings("system_title"); ?></a>',
		    gestureHandling: true
		}).addTo(map);

		L.marker([<?= get_settings('default_location'); ?>]).addTo(map)
	    .openPopup();
    <?php else: ?>
        //paid maps
        var map = L.map('contact_map').setView([<?= get_settings('default_location'); ?>], 13);
		L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		    attribution: '<a href="<?= site_url(); ?>" target="_blank"><?= get_settings("system_title"); ?></a>',
		    id: 'mapbox/streets-v11',
		    accessToken: '<?= get_settings("map_access_token"); ?>',
		    gestureHandling: true
		}).addTo(map);

		L.marker([<?= get_settings('default_location'); ?>]).addTo(map)
	    .openPopup();
    <?php endif; ?>




  	//disable default scroll 
  	map.scrollWheelZoom.disable();
	$("#contact_map").bind('mousewheel DOMMouseScroll', function (event) {
		event.stopPropagation();
		if (event.ctrlKey == true) {
	        	event.preventDefault();
	    	map.scrollWheelZoom.enable();
	    	$('#contact_map').removeClass('map-scroll');
	    	setTimeout(function(){
	        	map.scrollWheelZoom.disable();
	    	}, 1000);
	 	} else {
	    	map.scrollWheelZoom.disable();
	    	$('#contact_map').addClass('map-scroll');
		}
	});
	$(window).bind('mousewheel DOMMouseScroll', function (event) {
	   $('#contact_map').removeClass('map-scroll');
	})
</script>