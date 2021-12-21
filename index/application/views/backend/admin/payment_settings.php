<?php
// Paypal Keys
$paypal_settings = get_settings('paypal');
$paypal = json_decode($paypal_settings);

// Stripe Keys
$stripe_settings = get_settings('stripe');
$stripe = json_decode($stripe_settings);
?>
<!-- start page title -->
<div class="row">
  <div class="col-lg-7">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('system_currency_settings'); ?>
        </div>
      </div>
      <div class="panel-body">
        <form action="<?php echo site_url('admin/payment_settings/system_currency_settings'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
          <div class="form-group">
            <label for="system_currency" class="col-sm-3 control-label"><?php echo get_phrase('system_currency'); ?></label>

            <div class="col-sm-7">
              <select name="system_currency" id = "system_currency" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('system_currency'); ?>">
                <option value=""><?php echo get_phrase('select_system_currency'); ?></option>
                <?php
                $currencies = $this->crud_model->get_currencies();
                foreach ($currencies as $currency):?>
                <option value="<?php echo $currency['code'];?>"
                  <?php if (get_settings('system_currency') == $currency['code'])echo 'selected';?>> <?php echo $currency['code'];?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="currency_position" class="col-sm-3 control-label"><?php echo get_phrase('currency_position'); ?></label>

          <div class="col-sm-7">
            <select name="currency_position" id = "currency_position" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('currency_position'); ?>">
              <option value="left" <?php if (get_settings('currency_position') == 'left') echo 'selected';?> ><?php echo get_phrase('left'); ?></option>
              <option value="right" <?php if (get_settings('currency_position') == 'right') echo 'selected';?> ><?php echo get_phrase('right'); ?></option>
              <option value="left-space" <?php if (get_settings('currency_position') == 'left-space') echo 'selected';?> ><?php echo get_phrase('left_with_a_space'); ?></option>
              <option value="right-space" <?php if (get_settings('currency_position') == 'right-space') echo 'selected';?> ><?php echo get_phrase('right_with_a_space'); ?></option>
            </select>
          </div>
        </div>

        <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
          <button type="submit" class="btn btn-info"><?php echo get_phrase('update_system_currency'); ?></button>
        </div>
      </form>
    </div>
  </div>
</div><!-- end col-->
<div class="col-md-5">
  <div class="alert alert-info" role="alert">
    <h4 class="alert-heading"><?php echo get_phrase('heads_up'); ?>!</h4>
    <p><?php echo get_phrase('please_make_sure_that').' "'.get_phrase('system_currency').'", '.'"'.get_phrase('paypal_currency').'" and '.'"'.get_phrase('stripe_currency').'" '.get_phrase('are_same'); ?>.</p>
  </div>
</div>
</div>

<div class="row">
  <div class="col-lg-7">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('setup_paypal_settings'); ?>
        </div>
      </div>
      <div class="panel-body">
        <form action="<?php echo site_url('admin/payment_settings/paypal_settings'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
          <div class="form-group">
            <label for="paypal_active" class="col-sm-3 control-label"><?php echo get_phrase('active'); ?></label>

            <div class="col-sm-7">
              <select name="paypal_active" id = "paypal_active" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('paypal_active'); ?>">
                <option value="0" <?php if ($paypal[0]->active == 0) echo 'selected';?>> <?php echo get_phrase('no');?></option>
                <option value="1" <?php if ($paypal[0]->active == 1) echo 'selected';?>> <?php echo get_phrase('yes');?></option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="paypal_mode" class="col-sm-3 control-label"><?php echo get_phrase('mode'); ?></label>

          <div class="col-sm-7">
            <select name="paypal_mode" id = "paypal_mode" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('paypal_mode'); ?>">
              <option value="sandbox" <?php if ($paypal[0]->mode == 'sandbox') echo 'selected';?>> <?php echo get_phrase('sandbox');?></option>
              <option value="production" <?php if ($paypal[0]->mode == 'production') echo 'selected';?>> <?php echo get_phrase('production');?></option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="paypal_currency" class="col-sm-3 control-label"><?php echo get_phrase('paypal_currency'); ?></label>

          <div class="col-sm-7">
            <select name="paypal_currency" id = "paypal_currency" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('paypal_currency'); ?>">
              <option value=""><?php echo get_phrase('select_paypal_currency'); ?></option>
              <?php
              $currencies = $this->crud_model->get_paypal_supported_currencies();
              foreach ($currencies as $currency):?>
              <option value="<?php echo $currency['code'];?>"
                <?php if (get_settings('paypal_currency') == $currency['code'])echo 'selected';?>> <?php echo $currency['code'];?>
              </option>
            <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
      		<label for="name" class="col-sm-3 control-label"><?php echo get_phrase('client_id').' ('.get_phrase('sandbox').')'; ?></label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="sandbox_client_id" id="sandbox_client_id" placeholder="<?php echo get_phrase('sandbox_client_id'); ?>"  value="<?php echo $paypal[0]->sandbox_client_id;?>" required >
      		</div>
      	</div>

        <div class="form-group">
      		<label for="production_client_id" class="col-sm-3 control-label"><?php echo get_phrase('client_id').' ('.get_phrase('production').')'; ?></label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="production_client_id" id="production_client_id" placeholder="<?php echo get_phrase('sandbox_client_id'); ?>"  value="<?php echo $paypal[0]->production_client_id;?>" required >
      		</div>
      	</div>

        <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
          <button type="submit" class="btn btn-info"><?php echo get_phrase('update_paypal_keys'); ?></button>
        </div>
      </form>
    </div>
  </div>
</div><!-- end col-->
</div>

<div class="row">
  <div class="col-lg-7">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('setup_stripe_settings'); ?>
        </div>
      </div>
      <div class="panel-body">
        <form action="<?php echo site_url('admin/payment_settings/stripe_settings'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
          <div class="form-group">
            <label for="stripe_active" class="col-sm-3 control-label"><?php echo get_phrase('active'); ?></label>

            <div class="col-sm-7">
              <select name="stripe_active" id = "stripe_active" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('stripe_active'); ?>">
                <option value="0" <?php if ($stripe[0]->active == 0) echo 'selected';?>> <?php echo get_phrase('no');?></option>
                <option value="1" <?php if ($stripe[0]->active == 1) echo 'selected';?>> <?php echo get_phrase('yes');?></option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="testmode" class="col-sm-3 control-label"><?php echo get_phrase('test_mode'); ?></label>

          <div class="col-sm-7">
            <select name="testmode" id = "testmode" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('test_mode'); ?>">
              <option value="on" <?php if ($stripe[0]->testmode == 'on') echo 'selected';?>> <?php echo get_phrase('on');?></option>
              <option value="off" <?php if ($stripe[0]->testmode == 'off') echo 'selected';?>> <?php echo get_phrase('off');?></option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="stripe_currency" class="col-sm-3 control-label"><?php echo get_phrase('stripe_currency'); ?></label>

          <div class="col-sm-7">
            <select name="stripe_currency" id = "stripe_currency" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('stripe_currency'); ?>">
              <option value=""><?php echo get_phrase('select_stripe_currency'); ?></option>
              <?php
              $currencies = $this->crud_model->get_stripe_supported_currencies();
              foreach ($currencies as $currency):?>
              <option value="<?php echo $currency['code'];?>"
                <?php if (get_settings('stripe_currency') == $currency['code'])echo 'selected';?>> <?php echo $currency['code'];?>
              </option>
            <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-group">
      		<label for="secret_key" class="col-sm-3 control-label"><?php echo get_phrase('test_secret_key'); ?></label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="secret_key" id="secret_key" value="<?php echo $stripe[0]->secret_key;?>" >
      		</div>
      	</div>

        <div class="form-group">
      		<label for="public_key" class="col-sm-3 control-label"><?php echo get_phrase('test_public_key'); ?></label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="public_key" id="public_key" value="<?php echo $stripe[0]->public_key;?>" >
      		</div>
      	</div>

        <div class="form-group">
      		<label for="secret_live_key" class="col-sm-3 control-label"><?php echo get_phrase('live_secret_key'); ?></label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="secret_live_key" id="secret_live_key" value="<?php echo $stripe[0]->secret_live_key;?>" >
      		</div>
      	</div>

        <div class="form-group">
      		<label for="public_live_key" class="col-sm-3 control-label"><?php echo get_phrase('live_public_key'); ?></label>
      		<div class="col-sm-7">
      			<input type="text" class="form-control" name="public_live_key" id="public_live_key" value="<?php echo $stripe[0]->public_live_key;?>" >
      		</div>
      	</div>

        <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
          <button type="submit" class="btn btn-info"><?php echo get_phrase('update_stripe_keys'); ?></button>
        </div>
      </form>
    </div>
  </div>
</div><!-- end col-->
</div>
