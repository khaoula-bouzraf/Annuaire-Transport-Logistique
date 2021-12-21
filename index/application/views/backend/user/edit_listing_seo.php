<div class="form-group">
  <label class="col-sm-3 control-label" for="seo_meta_tags"><?php echo get_phrase('meta_keywords'); ?></label>
  <div class="col-sm-7">
    <div class="form-group">
      <input type="text" class="form-control" id = "seo_meta_tags" name="seo_meta_tags" data-role="tagsinput" style="width: 100%;" value="<?php echo $listing_details['seo_meta_tags']; ?>"/>
    </div>
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3 control-label" for="meta_description"><?php echo get_phrase('meta_description'); ?></label>
  <div class="col-sm-7">
    <div class="form-group">
      <textarea class="form-control" id="meta_description" name="meta_description" rows="4"><?php echo $listing_details['meta_description']; ?></textarea>
    </div>
  </div>
</div>