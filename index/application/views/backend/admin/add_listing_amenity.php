<div class="col-lg-offset-2 col-lg-8">
  <div class="row">
    <?php $amenities = $this->crud_model->get_amenities();
    foreach ($amenities->result_array() as $amenity):?>
    <div class="col-lg-4" style="margin-bottom: 10px;">
      <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" name="amenities[]" id="<?php echo $amenity['id']; ?>" value="<?php echo $amenity['id']; ?>">
        <label class="custom-control-label" for="<?php echo $amenity['id']; ?>"><i class="<?php echo $amenity['icon']; ?>" style="color: #636363;"></i> <?php echo $amenity['name']; ?></label>
      </div>
    </div>
  <?php endforeach; ?>
</div>
</div>
