<div class="row">
  <div class="col-lg-8">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('smtp_settings'); ?>
        </div>
      </div>
      <div class="panel-body">
        <form action="<?php echo site_url('admin/smtp_settings/update'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
          <div class="form-group">
            <label for="smtp_protocol" class="col-sm-3 control-label"><?php echo get_phrase('smtp_protocol'); ?></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="smtp_protocol" id="smtp_protocol" placeholder="<?php echo get_phrase('smtp_protocol'); ?>" value="<?php echo get_settings('protocol'); ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="smtp_host" class="col-sm-3 control-label"><?php echo get_phrase('smtp_host'); ?></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="smtp_host" id="smtp_host" placeholder="<?php echo get_phrase('smtp_host'); ?>" value="<?php echo get_settings('smtp_host'); ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="smtp_port" class="col-sm-3 control-label"><?php echo get_phrase('smtp_port'); ?></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="smtp_port" id="smtp_port" placeholder="<?php echo get_phrase('smtp_port'); ?>" value="<?php echo get_settings('smtp_port'); ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="smtp_user" class="col-sm-3 control-label"><?php echo get_phrase('smtp_user'); ?></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="smtp_user" id="smtp_user" placeholder="<?php echo get_phrase('smtp_user'); ?>" value="<?php echo get_settings('smtp_user'); ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="smtp_pass" class="col-sm-3 control-label"><?php echo get_phrase('smtp_password'); ?></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="smtp_pass" id="smtp_pass" placeholder="<?php echo get_phrase('smtp_password'); ?>" value="<?php echo get_settings('smtp_pass'); ?>" required>
            </div>
          </div>
          <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
            <button type="submit" class="btn btn-info"><?php echo get_phrase('save'); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div><!-- end col-->
</div>
