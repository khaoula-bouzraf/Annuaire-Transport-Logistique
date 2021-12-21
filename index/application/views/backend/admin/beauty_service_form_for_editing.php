<?php $beauty_services = $this->db->get_where('beauty_service', array('listing_id' => $listing_details['id']))->result_array(); ?>
<div id="beauty_service_parent_div" style="display: none; padding-top: 10px;">
  <div id = "beauty_service_div">
    <?php foreach ($beauty_services as $key => $beauty_service): ?>
      <div class="beauty_service_div">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="panel panel-primary" data-collapsed="0">
              <div class="panel-body">
                <h5 class="card-title mb-0"><?php echo get_phrase('beauty_service'); ?>
                  <?php if ($key > 0 ): ?>
                    <button type="button" class="btn btn-danger btn-sm btn-rounded alignToTitleOnPreview" name="button" id = "<?php echo $beauty_service['id']; ?>" onclick="removeBeautyService(this)"><?php echo get_phrase('remove_this_beauty_service'); ?></button>
                  <?php endif; ?>
                </h5>
                <div class="collapse show" style="padding-top: 10px;">
                  <div class="row no-margin">
                    <div class="col-lg-8">
                      <input type="hidden" name="beauty_service_id[]" value="<?php echo $beauty_service['id']; ?>">
                      <div class="form-group">
                        <label for="service_name"><?php echo get_phrase('service_name'); ?></label>
                        <input type="text" name="service_name[]" class="form-control" value="<?php echo $beauty_service['name']; ?>" />
                      </div>


                      <?php $times = explode(',', $beauty_service['service_times']); ?>
                      <div class="row">
                        <div class="col-12"><label><?php echo get_phrase('service_time'); ?></label></div>
                        <div class="form-group  mb-2 col-md-5">
                          <div class="input-group">
                              <input type="time" id = "service_time_from_<?php echo $beauty_service['id']; ?>" onchange = "checkServiceTimeRange('<?php echo $beauty_service['id']; ?>')" value="<?php echo $times[0]; ?>" name="starting_time[]" class="form-control" required>
                              <div class="input-group-append">
                                  <span class="input-group-text"><i class="dripicons-clock"></i></span>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-2  mb-2 text-center pt-1"><?php echo get_phrase('to'); ?></div>
                        <div class="form-group  mb-2 col-md-5">
                          <div class="input-group">
                              <input type="time" id = "service_time_to_<?php echo $beauty_service['id']; ?>" value="<?php echo $times[1]; ?>" name="ending_time[]" class="form-control" onchange = "checkServiceTimeRange('<?php echo $beauty_service['id']; ?>')" required>
                              <div class="input-group-append">
                                  <span class="input-group-text"><i class="dripicons-clock"></i></span>
                              </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group  mb-2">
                        <label><?php echo get_phrase('service_duration'); ?></label>
                        <div class="input-group">
                            <input type="number" value="<?php echo $times[2]; ?>" name="duration[]" placeholder="Minute" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="service_price"><?php echo get_phrase('service_price').' ('.currency_code_and_symbol().')'; ?></label>
                        <input type="text" name="service_price[]" class="form-control" value="<?php echo $beauty_service['price']; ?>" />
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="wrapper-image-preview">
                        <div class="box">
                          <div class="js--image-preview" style="background-image: url('<?php echo base_url('uploads/beauty_service_images/').$beauty_service['photo']; ?>')"></div>
                          <div class="upload-options">
                            <label for="service-image-<?php echo $beauty_service['id']; ?>" class="btn"> <i class="entypo-camera"></i> <?php echo get_phrase('upload_service_image'); ?> <small>(200 X 200) </small>  </label>
                            <input id="service-image-<?php echo $beauty_service['id']; ?>" style="visibility:hidden;" type="file" class="image-upload" name="service_image[]" accept="image/*">
                            <input type="hidden" class="" name="old_beauty_service_images[]" value="<?php echo $beauty_service['photo']; ?>">
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
    <button type="button" class="btn btn-primary" name="button" onclick="appendBeautyService()"> <i class="mdi mdi-plus"></i> <?php echo get_phrase('add_new_beauty_service'); ?></button>
  </div>
</div>

<div id = "blank_beauty_service_div">
  <div class="beauty_service_div">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="panel panel-primary" data-collapsed="0">
          <div class="panel-body">
            <h5 class="card-title mb-0"><?php echo get_phrase('beauty_service'); ?>
              <button type="button" class="btn btn-danger btn-sm btn-rounded alignToTitleOnPreview" name="button" onclick="removeBeautyService(this)"><?php echo get_phrase('remove_this_beauty_service'); ?></button>
            </h5>
            <div class="collapse show" style="padding-top: 10px;">
              <div class="row no-margin">
                <div class="col-lg-8">
                  <input type="hidden" name="beauty_service_id[]" value="0">
                  <div class="form-group">
                    <label for="service_name"><?php echo get_phrase('service_name'); ?></label>
                    <input type="text" name="service_name[]" class="form-control" />
                  </div>

                  <div class="row">
                    <div class="col-12"><label><?php echo get_phrase('service_time'); ?></label></div>
                    <div class="form-group  mb-2 col-md-5">
                      <div class="input-group">
                          <input type="time" name="starting_time[]" class="form-control timepicker" required>
                          <div class="input-group-append">
                              <span class="input-group-text"><i class="dripicons-clock"></i></span>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-2  mb-2 text-center pt-1"><?php echo get_phrase('to'); ?></div>
                    <div class="form-group  mb-2 col-md-5">
                      <div class="input-group">
                          <input type="time" name="ending_time[]" class="form-control timepicker" required>
                          <div class="input-group-append">
                              <span class="input-group-text"><i class="dripicons-clock"></i></span>
                          </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group  mb-2">
                    <label><?php echo get_phrase('service_duration'); ?></label>
                    <div class="input-group">
                        <input type="number" name="duration[]" placeholder="Minute" class="form-control" required>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="service_price"><?php echo get_phrase('service_price').' ('.currency_code_and_symbol().')'; ?></label>
                    <input type="text" name="service_price[]" class="form-control" />
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="wrapper-image-preview">
                    <div class="box">
                      <div class="js--image-preview"></div>
                      <div class="upload-options">
                        <label for="" class="btn"> <i class="entypo-camera"></i> <?php echo get_phrase('upload_service_image'); ?> <small>(200 X 200) </small>  </label>
                        <input id="" style="visibility:hidden;" type="file" class="image-upload" name="service_image[]" accept="image/*">
                        <input type="hidden" class="" name="old_beauty_service_images[]" value="">
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
