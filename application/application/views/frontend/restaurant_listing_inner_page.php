<?php $food_menus = $this->db->get_where('food_menu', array('listing_id' => $listing_details['id']))->result_array(); ?>
<h5><?php echo get_phrase('special_food_menus'); ?></h5>
<div class="row add_bottom_15">
    <?php foreach ($food_menus as $food_menu): ?>
        <div class="col-lg-6 col-md-12">

            <ul class="menu_list">

                <li>
                    <div class="thumb">
                        <img src="<?php echo base_url('uploads/restaurant_menu_images/'.$food_menu['photo']); ?>" alt="" style="height: 88px; width: 88px;">
                    </div>
                    <h6><?php echo $food_menu['name']; ?> <span><?php echo currency($food_menu['price']); ?> </span></h6>
                    <p>
                        <?php echo str_replace(',', ' / ', $food_menu['items']); ?>
                    </p>
                </li>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
