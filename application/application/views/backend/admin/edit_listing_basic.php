<div class="form-group">
  <label for="title" class="col-sm-3 control-label"><?php echo get_phrase('title'); ?></label>
  <div class="col-sm-7">
    <input type="hidden" name="user_id" value="<?php echo $listing_details['user_id']?>">
    <input type="text" class="form-control" id="title" name="title" value="<?php echo $listing_details['name']; ?>" required>
  </div>
</div>

<div class="form-group">
  <label for="description" class="col-sm-3 control-label"><?php echo get_phrase('description'); ?></label>
  <div class="col-sm-7">
    <textarea name="description" id = "description" class="form-control" rows="8" cols="80" required><?php echo $listing_details['description']; ?></textarea>
  </div>
</div>
<div class="form-group">
  <label for="featured_type" class="col-sm-3 control-label"><?php echo get_phrase('featured_type'); ?></label>
  <div class="col-sm-7">
    <select name="is_featured" id = "featured_type" class="selectboxit" required>
      <option value=""><?php echo get_phrase('select_featured_type'); ?></option>
      <option value="1"  <?php if($listing_details['is_featured'] == 1) echo 'selected'; ?>><?php echo get_phrase('featured'); ?></option>
      <option value="0" <?php if($listing_details['is_featured'] == 0) echo 'selected'; ?>><?php echo get_phrase('none_featured'); ?></option>
		</select>
  </div>
</div>
<div class="form-group">
  <label for="google_analytics_id" class="col-sm-3 control-label"><?php echo get_phrase('google_analytics_id'); ?></label>
  <div class="col-sm-7">
    <input type="text" class="form-control" value="<?php echo $listing_details['google_analytics_id']; ?>" id="google_analytics_id" name="google_analytics_id" placeholder="GA_MEASUREMENT_ID">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3 control-label" for="category"> <?php echo get_phrase('category'); ?></label>
  <div class="col-sm-7">
    <div id="category_area">
        <?php foreach ($listing_categories as $key => $listing_category): ?>
            <?php if ($key == 0): ?>
            <div class="row">
                <div class="col-sm-7 pr-0">
                    <select class="form-control select2" data-toggle="select2" name="categories[]" id = "category_default" required>
                        <option value=""><?php echo get_phrase('select_category'); ?></option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $listing_category): ?> selected <?php endif; ?>><?php echo $category['name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendCategory()"> <i class="fa fa-plus"></i> </button>
                </div>
            </div>

            <?php else: ?>
                <div class="row mt-2 appendedCategoryFields" style="margin-top: 10px;">
                    <div class="col-sm-7 pr-0">
                        <select class="form-control select2" name="categories[]">
                            <option value=""><?php echo get_phrase('select_category'); ?></option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $listing_category): ?> selected <?php endif; ?>><?php echo $category['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removeCategory(this)"> <i class="fa fa-minus"></i> </button>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <div id="blank_category_field">
      <div class="row appendedCategoryFields" style="margin-top: 10px;">
        <div class="col-sm-7 pr-0">
          <select class="form-control" name="categories[]">
            <option value=""><?php echo get_phrase('select_category'); ?></option>
            <?php foreach ($categories as $category): ?>
              <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-sm-2">
          <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removeCategory(this)"> <i class="fa fa-minus"></i> </button>
        </div>
      </div>
    </div>
  </div>
</div>
