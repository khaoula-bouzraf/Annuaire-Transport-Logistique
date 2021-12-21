<?php
$social_links = json_decode(get_frontend_settings('social_links'), true);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('frontend_settings'); ?>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url('admin/frontend_settings/frontend_update'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
                    <div class="form-group">
                        <label for="banner_title" class="col-sm-3 control-label"><?php echo get_phrase('banner_title'); ?></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="banner_title" id="banner_title" placeholder="<?php echo get_phrase('banner_title'); ?>" value="<?php echo get_frontend_settings('banner_title'); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="banner_sub_title" class="col-sm-3 control-label"><?php echo get_phrase('banner_sub_title'); ?></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="banner_sub_title" id="banner_sub_title" placeholder="<?php echo get_phrase('banner_sub_title'); ?>" value="<?php echo get_frontend_settings('banner_sub_title'); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="slogan" class="col-sm-3 control-label"><?php echo get_phrase('slogan'); ?></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="slogan" id="slogan" placeholder="<?php echo get_phrase('slogan'); ?>" value="<?php echo get_frontend_settings('slogan'); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cookie_note" class="col-sm-3 control-label"><?php echo get_phrase('eu_cookie_note'); ?></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="cookie_note" id="cookie_note" placeholder="<?php echo get_phrase('cookie_note'); ?>" value="<?php echo get_frontend_settings('cookie_note'); ?>">
                        </div>
                        <div class="col-sm-1" style="margin-top: 5px;">
                            <input type="checkbox" name="cookie_status" id="cookie_status" value="1" <?php if(get_frontend_settings('cookie_status') == 1) echo "checked"; ?>> <label for="cookie_status"><?php echo get_phrase('active'); ?></label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="cookie_policy" class="col-sm-3 control-label"><?php echo get_phrase('cookie_policy'); ?></label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea class="form-control" name="cookie_policy" id="cookie_policy"><?php echo get_frontend_settings('cookie_policy'); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="about_us" class="col-sm-3 control-label"><?php echo get_phrase('about_us'); ?></label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea class="form-control" name="about_us" id="about_us"><?php echo get_frontend_settings('about_us'); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="terms_and_condition" class="col-sm-3 control-label"><?php echo get_phrase('terms_and_condition'); ?></label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea class="form-control" name="terms_and_condition" id="terms_and_condition"><?php echo get_frontend_settings('terms_and_condition'); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="privacy_policy" class="col-sm-3 control-label"><?php echo get_phrase('privacy_policy'); ?></label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea class="form-control" name="privacy_policy" id="privacy_policy"><?php echo get_frontend_settings('privacy_policy'); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="faq" class="col-sm-3 control-label"><?php echo get_phrase('faq'); ?></label>
                        <div class="col-sm-7">
                            <div class="form-group">
                                <textarea class="form-control" name="faq" id="faq"><?php echo get_frontend_settings('faq'); ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="facebook" class="col-sm-3 control-label"><?php echo get_phrase('facebook_link'); ?></label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="facebook" id = "facebook" class="form-control" placeholder="<?php echo get_phrase('write_down_facebook_url') ?>" value="<?php echo $social_links['facebook']; ?>">
                                <span class="input-group-addon"><i class="entypo-facebook"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="twitter" class="col-sm-3 control-label"><?php echo get_phrase('twitter_link'); ?></label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="twitter" id = "twitter" class="form-control" placeholder="<?php echo get_phrase('write_down_twitter_url') ?>" value="<?php echo $social_links['twitter']; ?>">
                                <span class="input-group-addon"><i class="entypo-twitter"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="linkedin" class="col-sm-3 control-label"><?php echo get_phrase('linkedin_link'); ?></label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="linkedin" id = "linkedin" class="form-control" placeholder="<?php echo get_phrase('write_down_linkedin_url') ?>" value="<?php echo $social_links['linkedin']; ?>">
                                <span class="input-group-addon"><i class="entypo-linkedin"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="google" class="col-sm-3 control-label"><?php echo get_phrase('google_link'); ?></label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="google" id = "google" class="form-control" placeholder="<?php echo get_phrase('write_down_google_url') ?>" value="<?php echo $social_links['google']; ?>">
                                <span class="input-group-addon"><i class="entypo-google-circles"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="instagram" class="col-sm-3 control-label"><?php echo get_phrase('instagram_link'); ?></label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="instagram" id = "instagram" class="form-control" placeholder="<?php echo get_phrase('write_down_instagram_url') ?>" value="<?php echo $social_links['instagram']; ?>">
                                <span class="input-group-addon"><i class="entypo-instagram"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pinterest" class="col-sm-3 control-label"><?php echo get_phrase('pinterest_link'); ?></label>

                        <div class="col-sm-5">
                            <div class="input-group">
                                <input type="text" name="pinterest" id = "pinterest" class="form-control" placeholder="<?php echo get_phrase('write_down_pinterest_url') ?>" value="<?php echo $social_links['pinterest']; ?>">
                                <span class="input-group-addon"><i class="entypo-pinterest"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('update_frontend'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>


<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('update_banner_image'); ?><small>&nbsp;( 1400 X 950 )</small>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url('admin/frontend_settings/image_upload/banner_image'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: #E0E0E0;" data-trigger="fileinput">
                                    <img src="<?php echo base_url('uploads/system/home_banner.jpg'); ?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                                        <input type="file" name="banner_image" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info btn-block"><?php echo get_phrase('upload'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->

    <div class="col-lg-4">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('update_light_logo'); ?> <small>( 330 X 70 )</small>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url('admin/frontend_settings/image_upload/light_logo'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: #E0E0E0;" data-trigger="fileinput">
                                    <img src="<?php echo base_url('assets/global/light_logo.png'); ?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                                        <input type="file" name="light_logo" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info btn-block"><?php echo get_phrase('upload'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->

    <div class="col-lg-4">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('update_dark_logo'); ?> <small>( 330 X 70 )</small>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url('admin/frontend_settings/image_upload/dark_logo'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: #E0E0E0;" data-trigger="fileinput">
                                    <img src="<?php echo base_url('assets/global/dark_logo.png'); ?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                                        <input type="file" name="dark_logo" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info btn-block"><?php echo get_phrase('upload'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->

    <div class="col-lg-4">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('update_small_logo'); ?> <small>( 49 X 58 )</small>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url('admin/frontend_settings/image_upload/small_logo'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: #E0E0E0;" data-trigger="fileinput">
                                    <img src="<?php echo base_url('assets/global/logo-sm.png'); ?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                                        <input type="file" name="small_logo" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info btn-block"><?php echo get_phrase('upload'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->

    <div class="col-lg-4">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('update_favicon'); ?> <small>( 90 X 90 )</small>
                </div>
            </div>
            <div class="panel-body">
                <form action="<?php echo site_url('admin/frontend_settings/image_upload/favicon'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; background-color: #E0E0E0;" data-trigger="fileinput">
                                    <img src="<?php echo base_url('assets/global/favicon.png'); ?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                <div>
                                    <span class="btn btn-white btn-file">
                                        <span class="fileinput-new"><?php echo get_phrase('select_image'); ?></span>
                                        <span class="fileinput-exists"><?php echo get_phrase('change'); ?></span>
                                        <input type="file" name="favicon" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('remove'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-offset-4 col-sm-4" style="padding-top: 10px;">
                        <button type="submit" class="btn btn-info btn-block"><?php echo get_phrase('upload'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end col-->
</div>

<script type="text/javascript">
$(document).ready(function() {
    initCKEditor(['about_us', 'terms_and_condition', 'privacy_policy', 'cookie_policy', 'faq']);
});
</script>
