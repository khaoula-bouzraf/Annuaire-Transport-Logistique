<div class="form-group">
  <label class="col-sm-3 control-label" for="website"><?php echo get_phrase('website'); ?></label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="website" name="website" placeholder="<?php echo get_phrase('website'); ?>" value="<?php echo $listing_details['website']; ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="email"><?php echo get_phrase('email'); ?></label>
  <div class="col-sm-7">
    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo get_phrase('email'); ?>" value="<?php echo $listing_details['email']; ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="phone_number"><?php echo get_phrase('phone_number'); ?></label>
  <div class="col-sm-7">
    <input type="text" class="form-control" id="phone_number" name="phone" placeholder="<?php echo get_phrase('phone_number'); ?>" value="<?php echo $listing_details['phone']; ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="facebook"><?php echo get_phrase('facebook'); ?></label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="facebook" placeholder="www.facebook.com/xyz/" aria-label="facebook" aria-describedby="basic-addon-facebook" value="<?php echo $social_links['facebook']; ?>">
  </div>
</div>

<div class="form-group">
  <label class="col-sm-3 control-label" for="twitter"><?php echo get_phrase('twitter'); ?></label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="twitter" placeholder="www.twitter.com/xyz/" aria-label="twitter" aria-describedby="basic-addon-twitter" value="<?php echo $social_links['twitter']; ?>">
  </div>
</div>
<div class="form-group">
  <label class="col-sm-3 control-label" for="linkedin"><?php echo get_phrase('linkedin'); ?></label>
  <div class="col-sm-7">
    <input type="text" class="form-control" name="linkedin" placeholder="www.linkedin.com/xyz/" aria-label="linkedin" aria-describedby="basic-addon-linkedin" value="<?php echo $social_links['linkedin']; ?>">
  </div>
</div>
