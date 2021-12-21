<?php $hotel_rooms = $this->db->get_where('hotel_room_specification', array('listing_id' => $listing_details['id']))->result_array(); ?>
<h5><?php echo get_phrase('hotel_room_details'); ?></h5>
<?php foreach ($hotel_rooms as $hotel_room): ?>
	<div class="room_type first">
		<div class="row">
			<div class="col-md-4">
				<img src="<?php echo base_url('uploads/hotel_room_images/'.$hotel_room['photo']); ?>" class="img-fluid" alt="">
			</div>
			<div class="col-md-8">
				<h4><?php echo $hotel_room['name']; ?></h4>
				<p style="margin-bottom: 10px;"><?php echo $hotel_room['description']; ?></p>
				<ul class="hotel_facilities">
					<?php
					$amenities = explode(',', $hotel_room['amenities']);
					foreach ($amenities as $amenity): ?>
					<li><img src="<?php echo base_url('assets/global/amenities.svg'); ?>" alt="" style="height: 20px; width: 20px;"><?php echo ucwords($amenity); ?></li>
					<?php endforeach; ?>
				</ul>
				<p style="margin-bottom: 10px;"><?php echo get_phrase('price').': '.currency($hotel_room['price']); ?></p>
			</div>
		</div>
	</div>
<?php endforeach; ?>
