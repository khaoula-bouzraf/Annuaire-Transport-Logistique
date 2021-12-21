<div id = "special_offer_parent_div" style="display: none; padding-top: 10px;">
  <div id = "special_offer_div">
    <div class="special_offer_div">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-body">
              <h5 class="card-title mb-0"><?php echo get_phrase('special_offers'); ?></h5>
              <div class="collapse show" style="padding-top: 10px;">
                <div class="row no-margin">
                  <div class="col-lg-8">
                    <div class="form-group">
                      <label for="product_name"><?php echo get_phrase('product_name'); ?></label>
                      <input type="text" name="product_name[]" class="form-control" />
                    </div>

                    <div class="form-group">
                      <label for="variants"><?php echo get_phrase('variants'); ?> <small>(<?php echo get_phrase('press_Enter_after_entering_every_variant'); ?>)</small></label>
                      <input type="text" class="form-control bootstrap-tag-input" name="variants[]" data-role="tagsinput"/>
                    </div>

                    <div class="form-group">
                      <label for="product_price"><?php echo get_phrase('product_price').' ('.currency_code_and_symbol().')'; ?></label>
                      <input type="text" name="product_price[]" class="form-control" />
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="wrapper-image-preview">
                      <div class="box">
                        <div class="js--image-preview"></div>
                        <div class="upload-options">
                          <label for="product-image-1" class="btn"> <i class="entypo-camera"></i> <?php echo get_phrase('upload_product_image'); ?> <small>(200 X 200) </small> </label>
                          <input id="product-image-1" style="visibility:hidden;" type="file" class="image-upload" name="product_image[]" onchange="console.log(this.value);" accept="image/*">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end col-->
      </div>
    </div>
  </div>
  <div class="row text-center">
    <button type="button" class="btn btn-primary" name="button" onclick="appendSpecialOffer()"> <i class="entypo-plus"></i> <?php echo get_phrase('add_new_product'); ?></button>
  </div>
</div>

<div id = "blank_special_offer_div">
  <div class="special_offer_div">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary" data-collapsed="0">
          <div class="panel-body">
            <h5 class="card-title mb-0"><?php echo get_phrase('special_offers'); ?>
              <button type="button" class="btn btn-danger btn-sm btn-rounded alignToTitleOnPreview" name="button" onclick="removeSpecialOffer(this)"><?php echo get_phrase('remove_this_product'); ?></button>
            </h5>
            <div class="collapse show" style="padding-top: 10px;">
              <div class="row no-margin">
                <div class="col-lg-8">
                  <div class="form-group">
                    <label for="product_name"><?php echo get_phrase('product_name'); ?></label>
                    <input type="text" name="product_name[]" class="form-control" />
                  </div>

                  <div class="form-group">
                    <label for="variants"><?php echo get_phrase('variants'); ?> <small>(<?php echo get_phrase('press_Enter_after_entering_every_variant'); ?>)</small></label>
                    <input type="text" class="form-control bootstrap-tag-input" name="variants[]" data-role="tagsinput"/>
                  </div>

                  <div class="form-group">
                    <label for="product_price"><?php echo get_phrase('product_price').' ('.currency_code_and_symbol().')'; ?></label>
                    <input type="text" name="product_price[]" class="form-control" />
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="wrapper-image-preview">
                    <div class="box">
                      <div class="js--image-preview"></div>
                      <div class="upload-options">
                        <label for="files" class="btn"> <i class="entypo-camera"></i> <?php echo get_phrase('upload_product_image'); ?> <small>(200 X 200) </small> </label>
                        <input id="files" style="visibility:hidden;" type="file" class="image-upload" name="product_image[]" accept="image/*">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
