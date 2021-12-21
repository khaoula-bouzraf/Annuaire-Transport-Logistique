<div class="form-group">
  <label for="country_id" class="col-sm-3 control-label"><?php echo get_phrase('country'); ?></label>

  <div class="col-sm-7">
    <select name="country_id" id = "country_id" class="selectboxit" data-allow-clear="true" data-placeholder="<?php echo get_phrase('select_country'); ?>" onchange="getCityList(this.value)">
      <option value="0"><?php echo get_phrase('none'); ?></option>
      <?php foreach ($countries as $country): ?>
          <option value="<?php echo $country['id']; ?>" <?php if($listing_details['country_id'] == $country['id']): ?> selected <?php endif;?>><?php echo $country['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="city_id"> <?php echo get_phrase('city'); ?></label>
  <div class="col-sm-7">
    <select class="form-control select2" name="city_id" id="city_id">
      <?php foreach ($this->crud_model->get_cities_by_country_id($listing_details['country_id'])->result_array() as $city): ?>
          <option value="<?php echo $city['id']; ?>" <?php if($listing_details['city_id'] == $city['id']): ?> selected <?php endif;?>><?php echo $city['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="address"><?php echo get_phrase('address'); ?></label>
  <div class="col-sm-7">
    <textarea name="address" rows="5" class="form-control" id = "address"><?php echo $listing_details['address']; ?></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="latitude"><?php echo get_phrase('latitude'); ?></label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="<?php echo get_phrase('you_can_provide_latitude_for_getting_the_exact_result'); ?>" value="<?php echo $listing_details['latitude']; ?>">
  </div>
</div>

<div class="form-group row mb-3">
  <label class="col-sm-3 control-label" for="longitude"><?php echo get_phrase('longitude'); ?></label>
  <div class="col-md-7">
    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="<?php echo get_phrase('you_can_provide_longitude_for_getting_the_exact_result'); ?>" value="<?php echo $listing_details['longitude']; ?>">
  </div>
</div>
