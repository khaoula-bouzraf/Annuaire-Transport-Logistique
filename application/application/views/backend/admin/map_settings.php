<div class="row">
    <div class="col-md-7">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('map_settings');?>
                </div>
            </div>
            <div class="panel-body">
                <form class="" action="<?php echo site_url('admin/map_settings/map_update'); ?>" method="post">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group" style="padding-bottom: 50px;">
                          <label class="col-sm-3 control-label"><?php echo get_phrase('choose_your_map'); ?></label>
                          <div class="col-md-7">
                            <select class="form-control" name="map" onchange="change_map(this.value)">
                              <option value="openstreetmap" <?php if(get_settings('active_map') == 'openstreetmap') echo 'selected'; ?>><?= get_phrase('openstreet_map'); ?></option>
                              <option value="mapbox" <?php if(get_settings('active_map') == 'mapbox') echo 'selected'; ?>><?= get_phrase('mapbox'); ?></option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 50px; <?php if(get_settings('active_map') != 'mapbox') echo "display: none;"; ?>" id="map_access_token_section">
                          <label for="map_access_token" class="col-sm-3 control-label"><?php echo get_phrase('map_access_token'); ?></label>
                          <div class="col-md-7">
                            <input type="text" class="form-control" name="map_access_token" id="map_access_token" placeholder="pk.xxxxxxxxxxxxxxxxxxxxxxxxxxx" value="<?php echo get_settings('map_access_token'); ?>">
                          </div>
                        </div>
                        <div class="form-group" style="padding-bottom: 50px;">
                          <label for="default_location" class="col-sm-3 control-label"><?php echo get_phrase('contact_location'); ?> (<?php echo get_phrase('latitude'); ?>, <?php echo get_phrase('longitude'); ?>)</label>
                          <div class="col-md-7">
                            <input type="text" class="form-control" name="default_location" id="default_location" placeholder="16.731384, -169.531118" value="<?php echo get_settings('default_location'); ?>">
                          </div>
                        </div>

                        <div class="form-group" style="padding-bottom: 50px;">
                          <label for="max_zoom_level" class="col-sm-3 control-label"><?php echo get_phrase('max_zoom_level'); ?></label>
                          <div class="col-md-7">
                            <input type="number" class="form-control" name="max_zoom_level" id="max_zoom_level" placeholder="<?php echo get_phrase('maximum_number_19'); ?>" value="<?php echo get_settings('max_zoom_level'); ?>" max="19" min="13">
                          </div>
                        </div>

                        <div class="form-group" style="padding-bottom: 50px;">
                          <label for="min_zoom_listings_page" class="col-sm-3 control-label"><?php echo get_phrase('min_zoom_level_on_the_listings_page'); ?></label>
                          <div class="col-md-7">
                            <input type="number" class="form-control" name="min_zoom_listings_page" id="min_zoom_listings_page" placeholder="<?php echo get_phrase('minimum_number_1'); ?>" value="<?php echo get_settings('min_zoom_listings_page'); ?>" max="13" min="1">
                          </div>
                        </div>

                        <div class="form-group" style="padding-bottom: 50px;">
                          <label for="min_zoom_directory_page" class="col-sm-3 control-label"><?php echo get_phrase('min_zoom_level_on_the_directory_page'); ?></label>
                          <div class="col-md-7">
                            <input type="number" class="form-control" name="min_zoom_directory_page" id="min_zoom_directory_page" placeholder="<?php echo get_phrase('minimum_number_1'); ?>" value="<?php echo get_settings('min_zoom_directory_page'); ?>" max="13" min="1">
                          </div>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label"></label>
                            <div class="col-md-7">
                                <button class = "btn btn-success" type="submit" name="button"><?php echo get_phrase('update_map_settings'); ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="alert alert-info" role="alert">
            <h4 class="alert-heading"><?php echo get_phrase('how_do_i_get_a_map_access_token'); ?>?</h4>
            <ul>
                <li>
                    <p><?php echo get_phrase('first_create_an_account_in_the'); ?> <a href="https://www.mapbox.com/" target="_blank"><b>Mapbox</b></a>, <?php echo get_phrase('you_will_get_an_access_token') ?>. <?php echo get_phrase('copy_the_accessToken_and_paste_here') ?>.</p>
                </li>
                <li>
                    <a href="https://account.mapbox.com/auth/signup/"><b><?php echo get_phrase('click_here_to_sign_up_in'); ?> Mapbox.</b></a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script type="text/javascript">
  function change_map(map){
    if(map != 'mapbox'){
      $('#map_access_token_section').hide();
    }else{
      $('#map_access_token_section').show();
    }
  }
</script>