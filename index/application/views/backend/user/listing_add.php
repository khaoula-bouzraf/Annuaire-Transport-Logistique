<?php
$countries  = $this->db->get('country')->result_array();
$categories = $this->db->get('category')->result_array();

?>
<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('add_new_listing'); ?></h4>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo site_url('user/listings/add'); ?>" method="post" role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
    <div class="row justify-content-md-center">
        <!-- First Portion Starts -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <h4 class="header-title"><?php echo get_phrase('basic_information'); ?></h4>
                        <hr>
                        <div class="form-group">
                            <label for="title"> <span class="required">*</span> <?php echo get_phrase('title'); ?></label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description"> <span class="required">*</span> <?php echo get_phrase('description'); ?></label>
                            <textarea name="description" rows="5" class="form-control" id = "description" required></textarea>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <h4 class="header-title mt-3"><?php echo get_phrase('location'); ?></h4>
                        <hr>
                        <div class="form-group">
                            <label for="country_id"> <span class="required">*</span> <?php echo get_phrase('country'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="country_id" id="country_id" onchange="getCityList(this.value)">
                                <option value=""><?php echo get_phrase('select_country'); ?></option>
                                <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo $country['id']; ?>"><?php echo $country['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city_id"> <span class="required">*</span> <?php echo get_phrase('city'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="city_id" id="city_id">
                                <option value=""><?php echo get_phrase('select_city'); ?></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address"> <span class="required">*</span> <?php echo get_phrase('address'); ?></label>
                            <textarea name="address" rows="5" class="form-control" id = "address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="latitude"><?php echo get_phrase('latitude'); ?></label>
                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="<?php echo get_phrase('you_can_provide_latitude_for_getting_the_exact_result'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="longitude"><?php echo get_phrase('longitude'); ?></label>
                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="<?php echo get_phrase('you_can_provide_longitude_for_getting_the_exact_result'); ?>">
                        </div>
                    </div>


                    <div class="col-lg-12">
                        <h4 class="header-title mt-3"><?php echo get_phrase('amenities'); ?></h4>
                        <hr>
                        <div class="row">
                            <?php $amenities = $this->crud_model->get_amenities();
                            foreach ($amenities->result_array() as $amenity):?>
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="amenities[]" id="<?php echo $amenity['id']; ?>" value="<?php echo $amenity['id']; ?>">
                                    <label class="custom-control-label" for="<?php echo $amenity['id']; ?>"><i class="<?php echo $amenity['icon']; ?>" style="color: #636363;"></i> <?php echo $amenity['name']; ?></label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('thumbnail'); ?></h4>
                    <hr>
                    <div class="col-xl-10 p-0">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name = "listing_thumbnail" id="listing_thumbnail" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                <label class="custom-file-label ellipsis" for="listing_thumbnail"><?php echo get_phrase('choose_thumbnail'); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (has_package_feature('ability_to_add_video') == 1): ?>
                    <div class="col-lg-12">
                        <h4 class="header-title mt-3"><?php echo get_phrase('video'); ?></h4>
                        <hr>
                        <div class="form-group">
                            <label for="video_url"><?php echo get_phrase('video_url'); ?></label>
                            <input type="text" class="form-control" id="video_url" name="video_url" placeholder="<?php echo get_phrase('you_can_provide_video_url'); ?>">
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('photo_gallery'); ?></h4>
                    <hr>
                    <div id="photos_area">
                        <div class="row">
                            <div class="col-xl-10 pr-0">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name = "listing_images[]" id="" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                        <label class="custom-file-label ellipsis" for=""><?php echo get_phrase('choose_file'); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendPhotoUploader()"> <i class="fa fa-plus"></i> </button>
                            </div>
                        </div>
                    </div>

                    <div id="blank_photo_uploader">
                        <div class="row mt-2 appendedPhotoUploader">
                            <div class="col-xl-10 pr-0">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name = "listing_images[]" id="" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                        <label class="custom-file-label ellipsis" for=""><?php echo get_phrase('choose_file'); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removePhotoUploader(this)"> <i class="fa fa-minus"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('tags'); ?></h4>
                    <hr>
                    <div class="form-group">
                        <label for="tags"><?php echo get_phrase('tags'); ?></label>
                        <input type="text" class="form-control" id = "tags" name="tags" data-role="tagsinput" style="width: 100%;"/>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('SEO_meta_tags'); ?></h4>
                    <hr>
                    <div class="form-group">
                        <label for="seo_meta_tags"><?php echo get_phrase('SEO_meta_tags'); ?></label>
                        <input type="text" class="form-control" id = "seo_meta_tags" name="seo_meta_tags" data-role="tagsinput" style="width: 100%;"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- First Portion Ends -->
    <!-- Second Portion Starts -->
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <h4 class="header-title"><?php echo get_phrase('category'); ?></h4>
                    <hr>
                    <div id="category_area">
                        <div class="row">
                            <div class="col-xl-10 pr-0">
                                <select class="form-control select2" data-toggle="select2" name="categories[]" id = "category_default" required>
                                    <option value=""><?php echo get_phrase('select_category'); ?></option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="col-xl-2">
                                <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendCategory()"> <i class="fa fa-plus"></i> </button>
                            </div>
                        </div>
                    </div>

                    <div id="blank_category_field">
                        <div class="row mt-2 appendedCategoryFields">
                            <div class="col-xl-10 pr-0">
                                <select class="form-control select2" data-toggle="select2" name="categories[]">
                                    <option value=""><?php echo get_phrase('select_category'); ?></option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-xl-2">
                                <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removeCategory(this)"> <i class="fa fa-minus"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('opening_and_closing_schedule'); ?></h4>
                    <hr>
                    <div class="row">
                        <?php $days = array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'); ?>
                        <?php foreach($days as $day): ?>
                            <div class="col-xl-6">
                                <label><?php echo get_phrase($day.'_opening'); ?></label>
                                <select class="form-control select2" data-toggle="select2" name="<?php echo $day.'_opening'; ?>" id="<?php echo $day.'_opening'; ?>">
                                    <?php for($i = 0; $i < 24; $i++): ?>
                                        <option value="<?php echo $i; ?>"> <?php echo date('h a', strtotime("$i:00:00")) ?> </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <label><?php echo get_phrase($day.'_closing'); ?></label>
                                <select class="form-control select2" data-toggle="select2" name="<?php echo $day.'_closing'; ?>" id="<?php echo $day.'_closing'; ?>">
                                    <?php for($i = 0; $i < 24; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo date('h a', strtotime("$i:00:00")) ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('contact_information'); ?></h4>
                    <hr>
                    <div class="form-group">
                        <label for="website"><?php echo get_phrase('website'); ?></label>
                        <input type="text" class="form-control" id="website" name="website" placeholder="<?php echo get_phrase('website'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="email"><?php echo get_phrase('email'); ?></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo get_phrase('email'); ?>">
                    </div>

                    <div class="form-group">
                        <label for="phone_number"><?php echo get_phrase('phone_number'); ?></label>
                        <input type="text" class="form-control" id="phone_number" name="phone" placeholder="<?php echo get_phrase('phone_number'); ?>">
                    </div>

                    <div class="form-group">
                        <label><?php echo get_phrase('facebook'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-facebook"> <i class="mdi mdi-facebook"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="facebook" placeholder="www.facebook.com/xyz/" aria-label="facebook" aria-describedby="basic-addon-facebook">
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?php echo get_phrase('twitter'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-twitter"> <i class="mdi mdi-twitter"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="twitter" placeholder="www.twitter.com/xyz/" aria-label="twitter" aria-describedby="basic-addon-twitter">
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?php echo get_phrase('linkedin'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-linkedin"> <i class="mdi mdi-linkedin"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="linkedin" placeholder="www.linkedin.com/xyz/" aria-label="linkedin" aria-describedby="basic-addon-linkedin">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('listing_type'); ?></h4>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6 mb-1">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="hotel_room" name="listing_type" class="custom-control-input" value="hotel_room">
                                <label class="custom-control-label" for="hotel_room"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('hotel_room'); ?></label>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-1">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="food_menu" name="listing_type" class="custom-control-input" value="food_menu">
                                <label class="custom-control-label" for="food_menu"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('food_menu'); ?></label>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-1">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="shop" name="listing_type" class="custom-control-input" value="shop">
                                <label class="custom-control-label" for="shop"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('shop'); ?></label>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-1">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="general" name="listing_type" class="custom-control-input" value="general">
                                <label class="custom-control-label" for="general"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('general'); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (has_package_feature('ability_to_add_contact_form') == 1): ?>
                    <div class="col-lg-12">
                        <h4 class="header-title mt-3"><?php echo get_phrase('contact_form_type'); ?></h4>
                        <hr>
                        <div class="row">
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="general_contact_form" name="contact_form_type" class="custom-control-input" value="general">
                                    <label class="custom-control-label" for="general_contact_form"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('general_contact_form'); ?></label>
                                </div>
                            </div>
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="hotel_booking" name="contact_form_type" class="custom-control-input" value="hotel_booking">
                                    <label class="custom-control-label" for="hotel_booking"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('hotel_booking'); ?></label>
                                </div>
                            </div>
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="restaurant_booking" name="contact_form_type" class="custom-control-input" value="restaurant_booking">
                                    <label class="custom-control-label" for="restaurant_booking"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('restaurant_booking'); ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Second Portion Ends -->
</div>
<div class="row justify-content-md-center">
    <div class="col-xl-3">
        <button type="submit" class="btn btn-block btn-primary" name="button"><?php echo get_phrase('add_listing'); ?></button>
    </div>
</div>
</form>

<script type="text/javascript">
var highestNumberOfCategories = parseInt('<?php echo get_feature_limit('number_of_categories'); ?>');
var highestNumberOfPhotos     = parseInt('<?php echo get_feature_limit('number_of_photos'); ?>');
var highestNumberOfTags       = parseInt('<?php echo get_feature_limit('number_of_tags'); ?>');
var blank_category = $('#blank_category_field').html();
var blank_photo_uploader = $('#blank_photo_uploader').html();

$(document).ready(function() {
    $('#blank_category_field').hide();
    $('#blank_photo_uploader').hide();
    $("input[name='tags']").tagsinput({
        maxTags: highestNumberOfTags
    });
});

function countElements(class_name) {
    var numItems = $('.'+class_name).length
    return numItems;
}
function getCityList(country_id) {
    $.ajax({
        type : 'POST',
        url : '<?php echo site_url('home/get_city_list_by_country_id'); ?>',
        data : {country_id : country_id},
        success : function(response) {
            $('#city_id').html(response);
        }
    });
}



function appendCategory() {
    if (countElements('appendedCategoryFields') >= highestNumberOfCategories) {
        error_notify('<?php echo get_phrase('upgrade_your_package_for_adding_more_category'); ?>')
    }else {
        jQuery('#category_area').append(blank_category);
    }
}

function removeCategory(categoryElem) {
    jQuery(categoryElem).closest('.appendedCategoryFields').remove();
}

function appendPhotoUploader() {
    if (countElements('appendedPhotoUploader') >= highestNumberOfPhotos) {
        error_notify('<?php echo get_phrase('upgrade_your_package_for_adding_more_photos'); ?>')
    }else {
        jQuery('#photos_area').append(blank_photo_uploader);
    }
}

function removePhotoUploader(photoElem) {
    jQuery(photoElem).closest('.appendedPhotoUploader').remove();
}
</script>
