<div class="row">
  <div class="col-sm-offset-3 col-sm-3">
    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="general" name="listing_type" class="custom-control-input" value="general" onclick="showListingTypeForm('general')" <?php if($listing_details['listing_type'] == 'general'): ?> checked = "checked" <?php endif; ?>>
        <label class="custom-control-label" for="general"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('general'); ?></label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="hotel" name="listing_type" class="custom-control-input" value="hotel" onclick="showListingTypeForm('hotel')" <?php if($listing_details['listing_type'] == 'hotel'): ?> checked = "checked" <?php endif; ?>>
        <label class="custom-control-label" for="hotel"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('hotel'); ?> </label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="restaurant" name="listing_type" class="custom-control-input" value="restaurant" onclick="showListingTypeForm('restaurant')" <?php if($listing_details['listing_type'] == 'restaurant'): ?> checked = "checked" <?php endif; ?>>
        <label class="custom-control-label" for="restaurant"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('restaurant'); ?></label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="shop" name="listing_type" class="custom-control-input" value="shop" onclick="showListingTypeForm('shop')" <?php if($listing_details['listing_type'] == 'shop'): ?> checked = "checked" <?php endif; ?>>
        <label class="custom-control-label" for="shop"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('shop'); ?></label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="beauty" name="listing_type" class="custom-control-input" value="beauty" onclick="showListingTypeForm('beauty')" <?php if($listing_details['listing_type'] == 'beauty'): ?> checked = "checked" <?php endif; ?>>
        <label class="custom-control-label" for="beauty"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('beauty'); ?></label>
      </div>
    </div>
  </div>

  <div class="col-sm-3 text-left">
    <a href="#" id = "demo-btn" class="btn btn-primary mt-4" onclick="showListingTypeWiseDemo($('.listing-type-radio').val())"> <i class="entypo-eye"></i> <?php echo get_phrase('no_preview_available'); ?> </a>
  </div>
</div>

<?php include 'special_offer_form_for_editing.php'; ?>
<?php include 'restaurant_food_menu_form_for_editing.php'; ?>
<?php include 'beauty_service_form_for_editing.php'; ?>
<?php include 'hotel_room_specification_form_for_editing.php'; ?>
