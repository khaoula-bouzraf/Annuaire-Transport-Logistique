<div class="row">
  <div class="col-sm-offset-3 col-sm-3">
    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="general" name="listing_type" class="custom-control-input listing-type-radio" value="general" onclick="showListingTypeForm('general')" checked>
        <label class="custom-control-label" for="general"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('general'); ?></label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="hotel" name="listing_type" class="custom-control-input listing-type-radio" value="hotel" onclick="showListingTypeForm('hotel')">
        <label class="custom-control-label" for="hotel"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('hotel'); ?> </label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="restaurant" name="listing_type" class="custom-control-input listing-type-radio" value="restaurant" onclick="showListingTypeForm('restaurant')">
        <label class="custom-control-label" for="restaurant"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('restaurant'); ?></label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="shop" name="listing_type" class="custom-control-input listing-type-radio" value="shop" onclick="showListingTypeForm('shop')">
        <label class="custom-control-label" for="shop"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('shop'); ?></label>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="custom-control custom-radio">
        <input type="radio" id="beauty" name="listing_type" class="custom-control-input listing-type-radio" value="beauty" onclick="showListingTypeForm('beauty')">
        <label class="custom-control-label" for="beauty"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('beauty'); ?></label>
      </div>
    </div>
  </div>

  <div class="col-sm-3 text-left">
    <a href="#" id = "demo-btn" class="btn btn-primary mt-4" onclick="showListingTypeWiseDemo($('.listing-type-radio').val())"> <i class="mdi mdi-eye"></i> <?php echo get_phrase('no_preview_available'); ?> </a>
  </div>
</div>

<?php include 'special_offer_form.php'; ?>
<?php include 'restaurant_food_menu_form.php'; ?>
<?php include 'beauty_service_form.php'; ?>
<?php include 'hotel_room_specification_form.php'; ?>
