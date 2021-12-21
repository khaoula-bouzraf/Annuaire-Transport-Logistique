<?php
    $social_links = json_decode($user_info['social'], true);
 ?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('edit_profile'); ?>
				</div>
			</div>
			<div class="panel-body">
                <form action="<?php echo site_url('user/manage_profile/update_profile_info/'.$user_info['id']); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                	<div class="form-group">
                		<label for="name" class="col-sm-3 control-label"><?php echo get_phrase('name'); ?></label>
                		<div class="col-sm-7">
                			<input type="text" name="name" value="<?php echo $user_info['name'];?>" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" required>
                		</div>
                	</div>

                	<div class="form-group">
                		<label for="email" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?></label>
                		<div class="col-sm-7">
                			<input type="email" name="email" value="<?php echo $user_info['email'];?>" class="form-control" id="email" placeholder="Enter email" required>
                		</div>
                	</div>

                	<div class="form-group">
                		<label for="phone" class="col-sm-3 control-label"><?php echo get_phrase('phone'); ?></label>
                		<div class="col-sm-7">
                			<input type="text" name="phone" value="<?php echo $user_info['phone'];?>" class="form-control" id="phone" placeholder="Phone">
                		</div>
                	</div>

                	<div class="form-group">
                		<label for="facebook" class="col-sm-3 control-label"><?php echo get_phrase('facebook'); ?></label>
                		<div class="col-sm-7">
                			<input type="text" class="form-control" name="facebook" placeholder="<?php echo get_phrase('write_down_facebook_url') ?>" value="<?php echo $social_links['facebook']; ?>">
                		</div>
                	</div>

                	<div class="form-group">
                		<label for="twitter" class="col-sm-3 control-label"><?php echo get_phrase('twitter'); ?></label>
                		<div class="col-sm-7">
                			<input type="text" class="form-control" name="twitter" placeholder="<?php echo get_phrase('write_down_twitter_url') ?>" aria-describedby="twitter" value="<?php echo $social_links['twitter']; ?>">
                		</div>
                	</div>

                	<div class="form-group">
                		<label for="linkedin" class="col-sm-3 control-label"><?php echo get_phrase('linkedin'); ?></label>
                		<div class="col-sm-7">
                			<input type="text" class="form-control" name="linkedin" placeholder="<?php echo get_phrase('write_down_linkedin_url') ?>" aria-describedby="linkedin" value="<?php echo $social_links['linkedin']; ?>">
                		</div>
                	</div>

                	<div class="form-group">
                		<label for="address" class="col-sm-3 control-label"><?php echo get_phrase('address'); ?></label>
                		<div class="col-sm-7">
                			<textarea name="address" class="form-control" rows="8" cols="80"><?php echo $user_info['address'];?></textarea>
                		</div>
                	</div>


                    <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('user_image'); ?></label>

                    <div class="col-sm-7">

                      <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput">
                          <img src="<?php echo $this->user_model->get_user_thumbnail($this->session->userdata('user_id')); ?>" alt="...">
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
                		<button type="submit" class="btn btn-info"><?php echo get_phrase('update_profile'); ?></button>
                	</div>
                </form>
			</div>
		</div>
	</div><!-- end col-->
</div>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('update_password'); ?>
				</div>
			</div>
			<div class="panel-body">
                <form action="<?php echo site_url('user/manage_profile/change_password/'.$user_info['id']); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                	<div class="form-group">
                		<label for="current_password" class="col-sm-3 control-label"><?php echo get_phrase('current_password'); ?></label>
                		<div class="col-sm-7">
                			<input type="password" name="current_password" class="form-control" id="current_password" placeholder="<?php echo get_phrase('current_password'); ?>" required>
                		</div>
                	</div>

                    <div class="form-group">
                		<label for="new_password" class="col-sm-3 control-label"><?php echo get_phrase('new_password'); ?></label>
                		<div class="col-sm-7">
                			<input type="password" name="new_password" class="form-control" id="new_password" placeholder="<?php echo get_phrase('new_password'); ?>" required>
                		</div>
                	</div>

                    <div class="form-group">
                		<label for="confirm_password" class="col-sm-3 control-label"><?php echo get_phrase('confirm_password'); ?></label>
                		<div class="col-sm-7">
                			<input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="<?php echo get_phrase('confirm_password'); ?>" required>
                		</div>
                	</div>

                	<div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                		<button type="submit" class="btn btn-info"><?php echo get_phrase('update_password'); ?></button>
                	</div>
                </form>
			</div>
		</div>
	</div><!-- end col-->
</div>
