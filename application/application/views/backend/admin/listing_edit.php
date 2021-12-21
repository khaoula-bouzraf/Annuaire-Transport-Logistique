<?php
$listing_details = $this->crud_model->get_listings($listing_id)->row_array();
$time_configuration_details = $this->crud_model->get_time_configuration_by_listing_id($listing_id)->row_array();
$social_links = json_decode($listing_details['social'], true);
$countries  = $this->db->get('country')->result_array();
$categories = $this->db->get('category')->result_array();
$listing_amenities = json_decode($listing_details['amenities'], false);
$listing_categories = json_decode($listing_details['categories'], false);
?>

<div class="row ">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="page-title"> <i class="mdi mdi-account-circle title_icon"></i> <?php echo get_phrase('edit_listing'); ?></h4>
            </div>
        </div>
    </div>
</div>
<form action="<?php echo site_url('admin/listings/edit/'.$listing_id); ?>" method="post" role="form" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
    <div class="row justify-content-md-center">
        <!-- First Portion Starts -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12">
                        <h4 class="header-title"><?php echo get_phrase('basic_information'); ?></h4>
                        <hr>
                        <div class="form-group">
                            <label for="title"> <span class="required">*</span> <?php echo get_phrase('title'); ?></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $listing_details['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description"> <span class="required">*</span> <?php echo get_phrase('description'); ?></label>
                            <textarea name="description" rows="5" class="form-control" id = "description" required><?php echo $listing_details['description']; ?></textarea>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <h4 class="header-title mt-3"><?php echo get_phrase('location'); ?></h4>
                        <hr>
                        <div class="form-group">
                            <label for="country_id"> <span class="required">*</span> <?php echo get_phrase('country'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="country_id" id="country_id" onchange="getCityList(this.value)">
                                <option value=""><?php echo get_phrase('select_country'); ?></option>
                                <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo $country['id']; ?>" <?php if($listing_details['country_id'] == $country['id']): ?> selected <?php endif;?>><?php echo $country['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city_id"> <span class="required">*</span> <?php echo get_phrase('city'); ?></label>
                            <select class="form-control select2" data-toggle="select2" name="city_id" id="city_id">
                                <?php foreach ($this->crud_model->get_cities_by_country_id($listing_details['country_id'])->result_array() as $city): ?>
                                    <option value="<?php echo $city['id']; ?>" <?php if($listing_details['city_id'] == $city['id']): ?> selected <?php endif;?>><?php echo $city['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address"> <span class="required">*</span> <?php echo get_phrase('address'); ?></label>
                            <textarea name="address" rows="5" class="form-control" id = "address" required><?php echo $listing_details['address']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="latitude"><?php echo get_phrase('latitude'); ?></label>
                            <input type="text" class="form-control" id="latitude" name="latitude" placeholder="<?php echo get_phrase('you_can_provide_latitude_for_getting_the_exact_result'); ?>" value="<?php echo $listing_details['latitude']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="longitude"><?php echo get_phrase('longitude'); ?></label>
                            <input type="text" class="form-control" id="longitude" name="longitude" placeholder="<?php echo get_phrase('you_can_provide_longitude_for_getting_the_exact_result'); ?>" value="<?php echo $listing_details['longitude']; ?>">
                        </div>
                    </div>


                    <div class="col-xl-12">
                        <h4 class="header-title mt-3"><?php echo get_phrase('amenities'); ?></h4>
                        <hr>
                        <div class="row">
                            <?php $amenities = $this->crud_model->get_amenities();
                            foreach ($amenities->result_array() as $amenity):?>
                            <div class="col-xl-6 mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="amenities[]" id="<?php echo $amenity['id']; ?>" value="<?php echo $amenity['id']; ?>" <?php echo in_array($amenity['id'], $listing_amenities) ? "checked" : "";;?>>
                                    <label class="custom-control-label" for="<?php echo $amenity['id']; ?>"><i class="<?php echo $amenity['icon']; ?>" style="color: #636363;"></i> <?php echo $amenity['name']; ?></label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-xl-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('thumbnail'); ?></h4>
                    <hr>
                    <div class="d-flex">
                        <div class="">
                            <img class = "rounded-circle img-thumbnail" src="<?php echo base_url('uploads/thumbnails/listing_thumbnails/'.$listing_details['thumbnail']); ?>" alt="" style="height: 50px; width: 50px;">
                        </div>
                        <div class="flex-grow-1 mt-1 pl-3">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name = "listing_thumbnail" id="listing_thumbnail" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                    <label class="custom-file-label ellipsis" for="listing_thumbnail"><?php echo $listing_details['thumbnail']; ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('video'); ?></h4>
                    <hr>
                    <div class="form-group">
                        <label for="video_url"><?php echo get_phrase('video_url'); ?></label>
                        <input type="text" class="form-control" id="video_url" name="video_url" placeholder="<?php echo get_phrase('you_can_provide_video_url'); ?>" value="<?php echo $listing_details['video_url'] ?>">
                    </div>
                </div>

                <div class="col-xl-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('photo_gallery'); ?></h4>
                    <hr>
                    <div id="photos_area">
                        <?php foreach (json_decode($listing_details['photos']) as $key => $photo): ?>

                            <?php if ($key == 0): ?>
                                <div class="d-flex mb-1">
                                    <div class="">
                                        <img class = "rounded-circle img-thumbnail" src="<?php echo base_url('uploads/listing_images/'.$photo); ?>" alt="" style="height: 50px; width: 50px;">
                                    </div>
                                    <div class="flex-grow-1 px-3">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name = "listing_images[]" id="" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                                <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="<?php echo $photo; ?>">
                                                <label class="custom-file-label ellipsis" for=""><?php echo $photo; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendPhotoUploader()"> <i class="fa fa-plus"></i> </button>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="d-flex mb-1 appendedPhotoUploader">
                                    <div class="">
                                        <img class = "rounded-circle img-thumbnail" src="<?php echo base_url('uploads/listing_images/'.$photo); ?>" alt="" style="height: 50px; width: 50px;">
                                    </div>
                                    <div class="flex-grow-1 px-3">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name = "listing_images[]" id="" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                                <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="<?php echo $photo; ?>">
                                                <label class="custom-file-label ellipsis" for=""><?php echo $photo; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removePhotoUploader(this)"> <i class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </div>

                    <div id="blank_photo_uploader">
                        <div class="d-flex mt-2 appendedPhotoUploader">
                            <div class="">
                                <img class = "rounded-circle img-thumbnail" src="<?php echo base_url('uploads/placeholder.png'); ?>" alt="" style="height: 50px; width: 50px;">
                            </div>
                            <div class="flex-grow-1 px-3">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name = "listing_images[]" id="" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                        <input type="hidden" class="name_of_previous_image" name="new_listing_images[]" value="">
                                        <label class="custom-file-label ellipsis" for=""><?php echo get_phrase('choose_file'); ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removePhotoUploader(this)"> <i class="fa fa-minus"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('tags'); ?></h4>
                    <hr>
                    <div class="form-group">
                        <label for="tags"><?php echo get_phrase('tags'); ?></label>
                        <input type="text" class="form-control" id = "tags" name="tags" data-role="tagsinput" style="width: 100%;" value="<?php echo $listing_details['tags']; ?>"/>
                    </div>
                </div>

                <div class="col-xl-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('SEO_meta_tags'); ?></h4>
                    <hr>
                    <div class="form-group">
                        <label for="seo_meta_tags"><?php echo get_phrase('SEO_meta_tags'); ?></label>
                        <input type="text" class="form-control" id = "seo_meta_tags" name="seo_meta_tags" data-role="tagsinput" style="width: 100%;" value="<?php echo $listing_details['seo_meta_tags']; ?>"/>
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
                <div class="col-xl-12">
                    <h4 class="header-title"><?php echo get_phrase('category'); ?></h4>
                    <hr>
                    <div id="category_area">
                        <?php foreach ($listing_categories as $key => $listing_category): ?>
                            <?php if ($key == 0): ?>
                            <div class="row">
                                <div class="col-xl-10 pr-0">
                                    <select class="form-control select2" data-toggle="select2" name="categories[]" id = "category_default" required>
                                        <option value=""><?php echo get_phrase('select_category'); ?></option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $listing_category): ?> selected <?php endif; ?>><?php echo $category['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-xl-2">
                                    <button type="button" class="btn btn-primary btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="appendCategory()"> <i class="fa fa-plus"></i> </button>
                                </div>
                            </div>

                            <?php else: ?>
                                <div class="row mt-2 appendedCategoryFields">
                                    <div class="col-xl-10 pr-0">
                                        <select class="form-control select2" data-toggle="select2" name="categories[]">
                                            <option value=""><?php echo get_phrase('select_category'); ?></option>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?php echo $category['id']; ?>" <?php if ($category['id'] == $listing_category): ?> selected <?php endif; ?>><?php echo $category['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-xl-2">
                                        <button type="button" class="btn btn-danger btn-sm" style="margin-top: 2px; float: right;" name="button" onclick="removeCategory(this)"> <i class="fa fa-minus"></i> </button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
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

                <div class="col-xl-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('opening_and_closing_schedule'); ?></h4>
                    <hr>
                    <div class="row">
                        <?php $days = array('saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'); ?>
                        <?php foreach($days as $day):
                        $interval_array = explode('-', $time_configuration_details[$day]); ?>

                            <div class="col-xl-6">
                                <label><?php echo get_phrase($day.'_opening'); ?></label>
                                <select class="form-control select2" data-toggle="select2" name="<?php echo $day.'_opening'; ?>" id="<?php echo $day.'_opening'; ?>">
                                    <?php for($i = 0; $i < 24; $i++): ?>
                                        <option value="<?php echo $i; ?>" <?php if($interval_array[0] == $i): ?> selected <?php endif; ?>> <?php echo date('h a', strtotime("$i:00:00")) ?> </option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                            <div class="col-xl-6">
                                <label><?php echo get_phrase($day.'_closing'); ?></label>
                                <select class="form-control select2" data-toggle="select2" name="<?php echo $day.'_closing'; ?>" id="<?php echo $day.'_closing'; ?>">
                                    <?php for($i = 0; $i < 24; $i++): ?>
                                        <option value="<?php echo $i; ?>" <?php if($interval_array[1] == $i): ?> selected <?php endif; ?>><?php echo date('h a', strtotime("$i:00:00")) ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-xl-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('contact_information'); ?></h4>
                    <hr>
                    <div class="form-group">
                        <label for="website"><?php echo get_phrase('website'); ?></label>
                        <input type="text" class="form-control" id="website" name="website" placeholder="<?php echo get_phrase('website'); ?>" value="<?php echo $listing_details['website']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="email"><?php echo get_phrase('email'); ?></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo get_phrase('email'); ?>" value="<?php echo $listing_details['email']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="phone_number"><?php echo get_phrase('phone_number'); ?></label>
                        <input type="text" class="form-control" id="phone_number" name="phone" placeholder="<?php echo get_phrase('phone_number'); ?>" value="<?php echo $listing_details['phone']; ?>">
                    </div>

                    <div class="form-group">
                        <label><?php echo get_phrase('facebook'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-facebook"> <i class="mdi mdi-facebook"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="facebook" placeholder="www.facebook.com/xyz/" aria-label="facebook" aria-describedby="basic-addon-facebook" value="<?php echo $social_links['facebook']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?php echo get_phrase('twitter'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-twitter"> <i class="mdi mdi-twitter"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="twitter" placeholder="www.twitter.com/xyz/" aria-label="twitter" aria-describedby="basic-addon-twitter" value="<?php echo $social_links['twitter']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label><?php echo get_phrase('linkedin'); ?></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon-linkedin"> <i class="mdi mdi-linkedin"></i> </span>
                            </div>
                            <input type="text" class="form-control" name="linkedin" placeholder="www.linkedin.com/xyz/" aria-label="linkedin" aria-describedby="basic-addon-linkedin" value="<?php echo $social_links['linkedin']; ?>">
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <h4 class="header-title mt-3"><?php echo get_phrase('listing_type'); ?></h4>
                    <hr>
                    <div class="row">
                        <div class="col-xl-6 mb-1">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="hotel_room" name="listing_type" class="custom-control-input" value="hotel_room" <?php if($listing_details['listing_type'] == 'hotel_room'): ?> checked = "checked" <?php endif; ?>>
                                <label class="custom-control-label" for="hotel_room"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('hotel_room'); ?></label>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-1">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="food_menu" name="listing_type" class="custom-control-input" value="food_menu" <?php if($listing_details['listing_type'] == 'food_menu'): ?> checked = "checked" <?php endif; ?>>
                                <label class="custom-control-label" for="food_menu"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('food_menu'); ?></label>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-1">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="shop" name="listing_type" class="custom-control-input" value="shop" <?php if($listing_details['listing_type'] == 'shop'): ?> checked = "checked" <?php endif; ?>>
                                <label class="custom-control-label" for="shop"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('shop'); ?></label>
                            </div>
                        </div>
                        <div class="col-xl-6 mb-1">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="general" name="listing_type" class="custom-control-input" value="general" <?php if($listing_details['listing_type'] == 'general'): ?> checked = "checked" <?php endif; ?>>
                                <label class="custom-control-label" for="general"><i class="fa fa-hotel" style="color: #636363;"></i> <?php echo get_phrase('general'); ?></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Second Portion Ends -->
</div>
<div class="row justify-content-md-center">
    <div class="col-xl-3">
        <button type="submit" class="btn btn-block btn-primary" name="button"><?php echo get_phrase('update_listing'); ?></button>
    </div>
</div>
</form>

<script type="text/javascript">
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
var blank_category = $('#blank_category_field').html();
var blank_photo_uploader = $('#blank_photo_uploader').html();

$(document).ready(function() {
    $('#blank_category_field').hide();
    $('#blank_photo_uploader').hide();
});

function appendCategory() {
    jQuery('#category_area').append(blank_category);
}

function removeCategory(categoryElem) {
    jQuery(categoryElem).closest('.appendedCategoryFields').remove();
}

function appendPhotoUploader() {
    jQuery('#photos_area').append(blank_photo_uploader);
}

function removePhotoUploader(photoElem) {
    jQuery(photoElem).closest('.appendedPhotoUploader').remove();
}
</script>
