<?php $food_menus = $this->db->get_where('food_menu', array('listing_id' => $listing_details['id']))->result_array(); ?>
<div id="food_menu_parent_div" style="display: none; padding-top: 10px;">
  <div id = "food_menu_div">
    <?php foreach ($food_menus as $key => $food_menu): ?>
      <div class="food_menu_div">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-primary" data-collapsed="0">
              <div class="panel-body">
                <h5 class="card-title mb-0"><?php echo get_phrase('food_menu'); ?>
                  <?php if ($key > 0 ): ?>
                    <button type="button" class="btn btn-danger btn-sm btn-rounded alignToTitleOnPreview" name="button" id = "<?php echo $food_menu['id']; ?>" onclick="removeFoodMenu(this)"><?php echo get_phrase('remove_this_food_menu'); ?></button>
                  <?php endif; ?>
                </h5>
                <div class="collapse show" style="padding-top: 10px;">
                  <div class="row no-margin">
                    <div class="col-lg-8">
                      <input type="hidden" name="food_menu_id[]" value="<?php echo $food_menu['id']; ?>">
                      <div class="form-group">
                        <label for="menu_name"><?php echo get_phrase('menu_name'); ?></label>
                        <input type="text" name="menu_name[]" class="form-control" value="<?php echo $food_menu['name']; ?>" />
                      </div>

                      <div class="form-group">
                        <label for="items"><?php echo get_phrase('items'); ?> <small>(<?php echo get_phrase('press_Enter_after_entering_every_variant'); ?>)</small></label>
                        <input type="text" class="form-control bootstrap-tag-input" name="items[]" data-role="tagsinput" value="<?php echo $food_menu['items']; ?>" />
                      </div>

                      <div class="form-group">
                        <label for="menu_price"><?php echo get_phrase('menu_price').' ('.currency_code_and_symbol().')'; ?></label>
                        <input type="text" name="menu_price[]" class="form-control" value="<?php echo $food_menu['price']; ?>" />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="wrapper-image-preview">
                        <div class="box">
                          <div class="js--image-preview" style="background-image: url('<?php echo base_url('uploads/restaurant_menu_images/').$food_menu['photo']; ?>')"></div>
                          <div class="upload-options">
                            <label for="menu-image-<?php echo $food_menu['id']; ?>" class="btn"> <i class="entypo-camera"></i> <?php echo get_phrase('upload_menu_image'); ?> <small>(200 X 200) </small>  </label>
                            <input id="menu-image-<?php echo $food_menu['id']; ?>" style="visibility:hidden;" type="file" class="image-upload" name="menu_image[]" accept="image/*">
                            <input type="hidden" class="" name="old_food_menu_images[]" value="<?php echo $food_menu['photo']; ?>">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- end card-->
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="row text-center">
    <button type="button" class="btn btn-primary" name="button" onclick="appendFoodMenu()"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_new_food_menu'); ?></button>
  </div>
</div>

<div id = "blank_food_menu_div">
  <div class="food_menu_div">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary" data-collapsed="0">
          <div class="panel-body">
            <h5 class="card-title mb-0"><?php echo get_phrase('food_menu'); ?>
              <button type="button" class="btn btn-danger btn-sm btn-rounded alignToTitleOnPreview" name="button" onclick="removeFoodMenu(this)"><?php echo get_phrase('remove_this_food_menu'); ?></button>
            </h5>
            <div class="collapse show" style="padding-top: 10px;">
              <div class="row no-margin">
                <div class="col-lg-8">
                  <input type="hidden" name="food_menu_id[]" value="0">
                  <div class="form-group">
                    <label for="menu_name"><?php echo get_phrase('menu_name'); ?></label>
                    <input type="text" name="menu_name[]" class="form-control" />
                  </div>

                  <div class="form-group">
                    <label for="items"><?php echo get_phrase('items'); ?> <small>(<?php echo get_phrase('press_Enter_after_entering_every_variant'); ?>)</small></label>
                    <input type="text" class="form-control bootstrap-tag-input" name="items[]" data-role="tagsinput"/>
                  </div>

                  <div class="form-group">
                    <label for="menu_price"><?php echo get_phrase('menu_price').' ('.currency_code_and_symbol().')'; ?></label>
                    <input type="text" name="menu_price[]" class="form-control" />
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="wrapper-image-preview">
                    <div class="box">
                      <div class="js--image-preview"></div>
                      <div class="upload-options">
                        <label for="" class="btn"> <i class="entypo-camera"></i> <?php echo get_phrase('upload_menu_image'); ?> <small>(200 X 200) </small>  </label>
                        <input id="" style="visibility:hidden;" type="file" class="image-upload" name="menu_image[]" accept="image/*">
                        <input type="hidden" class="" name="old_food_menu_images[]" value="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- end card-->
    </div>
  </div>
</div>
