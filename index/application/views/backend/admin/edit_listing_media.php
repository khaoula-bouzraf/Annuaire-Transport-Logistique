<div class="form-group">
  <label class="col-sm-3 control-label"><?php echo get_phrase('listing_thumbnail'); ?> <br/> <small>(460 X 306)</small> </label>
  <div class="col-sm-7">
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
        <img src="<?php echo base_url('uploads/listing_thumbnails/'.$listing_details['listing_thumbnail']); ?>" alt="...">
      </div>
      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
      <div>
        <span class="btn btn-white btn-file">
          <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
          <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
          <input type="file" name="listing_thumbnail" accept="image/*">
        </span>
        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label"><?php echo get_phrase('listing_cover'); ?> <br/> <small>(1600 X 600)</small> </label>
  <div class="col-sm-7">
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
        <img src="<?php echo base_url('uploads/listing_cover_photo/'.$listing_details['listing_cover']); ?>" alt="...">
      </div>
      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
      <div>
        <span class="btn btn-white btn-file">
          <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
          <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
          <input type="file" name="listing_cover" accept="image/*">
        </span>
        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
      </div>
    </div>
  </div>
</div>

<div class="form-group">
  <label for="video_provider" class="col-sm-3 control-label"><?php echo get_phrase('video_provider'); ?></label>
  <div class="col-sm-7">
    <select name="video_provider" id = "video_provider" class="selectboxit" required>
      <option value="youtube" <?php if($listing_details['video_provider'] == 'youtube'): ?> selected <?php endif; ?>>YouTube</option>
      <option value="vimeo" <?php if($listing_details['video_provider'] == 'vimeo'): ?> selected <?php endif; ?>>Vimeo</option>
      <option value="html5" <?php if($listing_details['video_provider'] == 'html5'): ?> selected <?php endif; ?>>HTML5</option>
		</select>
  </div>
</div>

<div class="form-group">
  <label for="video_url" class="col-sm-3 control-label"><?php echo get_phrase('video_url'); ?></label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="video_url" name="video_url" placeholder="<?php echo get_phrase('you_can_provide_video_url'); ?>" value="<?php echo $listing_details['video_url']; ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="listing_images"><?php echo get_phrase('listing_gallery_images'); ?><br/> <small>(960 X 640)</small> </label>
  <div class="col-sm-7">
    <div id="photos_area">
      <?php if (count(json_decode($listing_details['photos'])) > 0): ?>
        <?php foreach (json_decode($listing_details['photos']) as $key => $photo): ?>
          <?php if ($key == 0): ?>
            <div class="row">
              <div class="col-sm-7">
                <div class="form-group">
                  <div class="col-sm-12">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                        <img src="<?php echo base_url('uploads/listing_images/'.$photo); ?>" alt="...">
                        <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="<?php echo $photo; ?>">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                      <div>
                        <span class="btn btn-white btn-file">
                          <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                          <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                          <input type="file" name="listing_images[]" accept="image/*">
                        </span>
                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendPhotoUploader()"> <i class="fa fa-plus"></i> </button>
              </div>
            </div>
          <?php else: ?>
            <div class="row appendedPhotoUploader">
              <div class="col-sm-7">
                <div class="form-group">
                  <div class="col-sm-12">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                        <img src="<?php echo base_url('uploads/listing_images/'.$photo); ?>" alt="...">
                        <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="<?php echo $photo; ?>">
                      </div>
                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                      <div>
                        <span class="btn btn-white btn-file">
                          <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                          <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                          <input type="file" name="listing_images[]" accept="image/*">
                        </span>
                        <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-2">
                <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removePhotoUploader(this)"> <i class="fa fa-minus"></i> </button>
              </div>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="row">
          <div class="col-sm-7">
            <div class="form-group">
              <div class="col-sm-12">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                    <img src="<?php echo base_url('uploads/placeholder.png'); ?>" alt="...">
                    <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                  <div>
                    <span class="btn btn-white btn-file">
                      <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                      <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                      <input type="file" name="listing_images[]" accept="image/*">
                    </span>
                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-2">
            <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendPhotoUploader()"> <i class="fa fa-plus"></i> </button>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <div id="blank_photo_uploader">
      <div class="row appendedPhotoUploader">
        <div class="col-sm-7">
          <div class="form-group">
            <div class="col-sm-12">
              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                  <img src="<?php echo base_url('uploads/placeholder.png'); ?>" alt="...">
                  <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                <div>
                  <span class="btn btn-white btn-file">
                    <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                    <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                    <input type="file" name="listing_images[]" accept="image/*">
                  </span>
                  <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removePhotoUploader(this)"> <i class="fa fa-minus"></i> </button>
        </div>
      </div>
    </div>
  </div>
</div>
