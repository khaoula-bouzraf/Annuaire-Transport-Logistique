<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('user_add_form'); ?>
        </div>
      </div>
      <div class="panel-body">
        <form action="<?php echo site_url('admin/users/add'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo get_phrase('name'); ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?></label>
            <div class="col-sm-7">
              <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo get_phrase('email'); ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-3 control-label"><?php echo get_phrase('password'); ?></label>
            <div class="col-sm-7">
              <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo get_phrase('password'); ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="address" class="col-sm-3 control-label"><?php echo get_phrase('address'); ?></label>
            <div class="col-sm-7">
              <textarea name="address" class="form-control" rows="8" cols="80"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="phone" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="phone" id="phone" placeholder="<?php echo get_phrase('phone'); ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="website" class="col-sm-3 control-label"><?php echo get_phrase('website'); ?></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="website" id="website" placeholder="<?php echo get_phrase('website'); ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="about" class="col-sm-3 control-label"><?php echo get_phrase('about'); ?></label>
            <div class="col-sm-7">
              <textarea name="about" class="form-control" rows="8" cols="80"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label for="facebook" class="col-sm-3 control-label"><?php echo get_phrase('facebook_link'); ?></label>

            <div class="col-sm-5">
              <div class="input-group">
                <input type="text" name="facebook" id = "facebook" class="form-control" placeholder="<?php echo get_phrase('write_down_facebook_url') ?>">
                <span class="input-group-addon"><i class="entypo-facebook"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="twitter" class="col-sm-3 control-label"><?php echo get_phrase('twitter_link'); ?></label>

            <div class="col-sm-5">
              <div class="input-group">
                <input type="text" name="twitter" id = "twitter" class="form-control" placeholder="<?php echo get_phrase('write_down_twitter_url') ?>">
                <span class="input-group-addon"><i class="entypo-twitter"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="linkedin" class="col-sm-3 control-label"><?php echo get_phrase('linkedin_link'); ?></label>

            <div class="col-sm-5">
              <div class="input-group">
                <input type="text" name="linkedin" id = "linkedin" class="form-control" placeholder="<?php echo get_phrase('write_down_linkedin_url') ?>">
                <span class="input-group-addon"><i class="entypo-linkedin"></i></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"><?php echo get_phrase('user_image'); ?></label>

            <div class="col-sm-7">

              <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                  <img src="<?php echo base_url('uploads/user_image/user.png'); ?>" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                <div>
                  <span class="btn btn-white btn-file">
                    <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                    <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                    <input type="file" name="user_image" accept="image/*">
                  </span>
                  <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
            <button type="submit" class="btn btn-info"><?php echo get_phrase('add_user'); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div><!-- end col-->
</div>
