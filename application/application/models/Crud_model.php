<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_model extends CI_Model {

  function __construct()
  {
    parent::__construct();
    /*cache control*/
    $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    $this->output->set_header('Pragma: no-cache');
    $this->load->helper("file");
  }

  function get_categories($category_id = 0) {
    if ($category_id > 0) {
      $this->db->where('id', $category_id);
    }
    return $this->db->get('category');
  }

  function get_sub_categories($category_id = 0) {
    if ($category_id > 0) {
      $this->db->where('parent', $category_id);
    }
    $this->db->where('parent >', '0');
    return $this->db->get('category');
  }

  function add_category() {
    $data['parent'] = sanitizer($this->input->post('parent'));
    $data['name'] = sanitizer($this->input->post('name'));
    $data['slug'] = slugify($this->input->post('name'));
    $data['icon_class'] = str_replace(array("\n","\r"), '', sanitizer($this->input->post('icon_class')));
    if ($data['parent'] == 0) {
      if ($_FILES['category_thumbnail']['name'] == "") {
        $data['thumbnail'] = 'thumbnail.png';
      }else {
        $data['thumbnail'] = md5(rand(10000000, 20000000)).'.jpg';
        move_uploaded_file($_FILES['category_thumbnail']['tmp_name'], 'uploads/category_thumbnails/'.$data['thumbnail']);
      }
    }
    $this->db->insert('category', $data);
  }

  function edit_category($category_id = "") {
    $data['parent'] = sanitizer($this->input->post('parent'));
    $data['icon_class'] = str_replace(array("\n","\r"), '', sanitizer($this->input->post('icon_class')));
    $data['name'] = sanitizer($this->input->post('name'));
    $data['slug'] = slugify(sanitizer($this->input->post('name')));
    if ($_FILES['category_thumbnail']['name'] != "") {
      $data['thumbnail'] = md5(rand(10000000, 20000000)).'.jpg';;
      move_uploaded_file($_FILES['category_thumbnail']['tmp_name'], 'uploads/category_thumbnails/'.$data['thumbnail']);
    }
    $this->db->where('id',$category_id);
    $this->db->update('category', $data);
  }

  function get_cities($city_id = 0) {
    if ($city_id > 0) {
      $this->db->where('id', $city_id);
    }
    return $this->db->get('city');
  }

  function get_cities_by_country_id($country_id = 0) {
    $this->db->where('country_id', $country_id);
    return $this->db->get('city');
  }

  function add_city() {
    $data['name'] = sanitizer($this->input->post('name'));
    $data['slug'] =slugify(sanitizer($this->input->post('name')));
    $data['country_id'] = sanitizer($this->input->post('country_id'));
    $this->db->insert('city', $data);
  }
  function edit_city($city_id) {
    $data['name'] = sanitizer($this->input->post('name'));
    $data['slug'] = slugify(sanitizer($this->input->post('name')));
    $data['country_id'] = sanitizer($this->input->post('country_id'));
    $this->db->where('id', $city_id);
    $this->db->update('city', $data);
  }

  function add_amenity() {
    $data['name'] = sanitizer($this->input->post('name'));
    $data['icon'] = sanitizer($this->input->post('icon'));
    $data['slug'] = slugify(sanitizer($this->input->post('name')));
    $this->db->insert('amenities', $data);
  }
  function edit_amenity($amenity_id) {
    $data['name'] = sanitizer($this->input->post('name'));
    $data['icon'] = sanitizer($this->input->post('icon'));
    $data['slug'] = slugify(sanitizer($this->input->post('name')));
    $this->db->where('id', $amenity_id);
    $this->db->update('amenities', $data);
  }

  function get_city_list_by_country_id($country_id) {
    return $this->db->get_where('city', array('country_id' => $country_id));
  }
  function get_packages($package_id = 0) {
    if ($package_id > 0) {
      $this->db->where('id', $package_id);
    }
    return $this->db->get('package');
  }

  function add_package() {
    $data['package_type'] = sanitizer($this->input->post('package_type'));
    $data['name'] = sanitizer($this->input->post('name'));
    $data['price'] = sanitizer($this->input->post('price'));
    $data['validity'] = sanitizer($this->input->post('validity'));
    $data['number_of_listings'] = sanitizer($this->input->post('number_of_listings'));
    $data['number_of_categories'] = sanitizer($this->input->post('number_of_categories'));
    $data['number_of_tags'] = sanitizer($this->input->post('number_of_tags'));
    $data['number_of_photos'] = sanitizer($this->input->post('number_of_photos'));
    $data['featured'] = sanitizer($this->input->post('featured'));
    if (isset($_POST['ability_to_add_video'])) {
      $data['ability_to_add_video'] = sanitizer($this->input->post('ability_to_add_video'));
    }else {
      $data['ability_to_add_video'] = 0;
    }
    if (isset($_POST['ability_to_add_contact_form'])) {
      $data['ability_to_add_contact_form'] = sanitizer($this->input->post('ability_to_add_contact_form'));
    }else {
      $data['ability_to_add_contact_form'] = 0;
    }
    if (isset($_POST['is_recommended'])) {
      $data['is_recommended'] = sanitizer($this->input->post('is_recommended'));
    }else {
      $data['is_recommended'] = 0;
    }
    if (isset($_POST['featured'])) {
      $data['featured'] = sanitizer($this->input->post('featured'));
    }else {
      $data['featured'] = 0;
    }
    $this->db->insert('package', $data);
  }

  function edit_package($package_id) {
    $data['name'] = sanitizer($this->input->post('name'));
    $data['package_type'] = sanitizer($this->input->post('package_type'));
    $data['price'] = sanitizer($this->input->post('price'));
    $data['validity'] = sanitizer($this->input->post('validity'));
    $data['number_of_listings'] = sanitizer($this->input->post('number_of_listings'));
    $data['number_of_categories'] = sanitizer($this->input->post('number_of_categories'));
    $data['number_of_tags'] = sanitizer($this->input->post('number_of_tags'));
    $data['number_of_photos'] = sanitizer($this->input->post('number_of_photos'));
    $data['featured'] = sanitizer($this->input->post('featured'));
    if (isset($_POST['ability_to_add_video'])) {
      $data['ability_to_add_video'] = sanitizer($this->input->post('ability_to_add_video'));
    }else {
      $data['ability_to_add_video'] = 0;
    }
    if (isset($_POST['ability_to_add_contact_form'])) {
      $data['ability_to_add_contact_form'] = sanitizer($this->input->post('ability_to_add_contact_form'));
    }else {
      $data['ability_to_add_contact_form'] = 0;
    }
    if (isset($_POST['is_recommended'])) {
      $data['is_recommended'] = sanitizer($this->input->post('is_recommended'));
    }else {
      $data['is_recommended'] = 0;
    }
    if (isset($_POST['featured'])) {
      $data['featured'] = sanitizer($this->input->post('featured'));
    }else {
      $data['featured'] = 0;
    }

    $this->db->where('id', $package_id);
    $this->db->update('package', $data);
  }

  function make_json($param) {
    $array = array();
    if(sizeof($param) > 0){
      foreach ($param as $row) {
        if ($row != "") {
          array_push($array, $row);
        }
      }
    }
    return json_encode($array);
  }


  // This function responsible for timewise filtering in listing list
  /*function get_listings($listing_id = 0, $timestamp_start = "", $timestamp_end = "") {
  if (strtolower($this->session->userdata('role')) != 'admin') {
  $this->db->where('user_id', $this->session->userdata('user_id'));
}
if ($listing_id > 0) {
$this->db->where('id', $listing_id);
}else {
$this->db->order_by('date_added' , 'desc');
$this->db->where('date_added >=' , $timestamp_start);
$this->db->where('date_added <=' , $timestamp_end);
}
return $this->db->get('listing');
}*/

function get_listings($listing_id = 0) {
  if (strtolower($this->session->userdata('role')) != 'admin') {
    $this->db->where('user_id', $this->session->userdata('user_id'));
  }
  if ($listing_id > 0) {
    $this->db->where('id', $listing_id);
  }else {
    $this->db->order_by('date_added' , 'desc');
  }
  return $this->db->get('listing');
}

function filter_listing_table($data = array()) {

  if ($data['verify_status'] == 1){
      $verified_listing_array = array();
      $verified_listings = $this->db->get_where('claimed_listing', array('status' => $data['verify_status']))->result_array();
      foreach($verified_listings as $verified_listing):
        $verified_listing_array[] = $verified_listing['listing_id'];
      endforeach;
      $this->db->where_in('id', $verified_listing_array);
  }

  if ($data['verify_status'] == 0 && $data['verify_status'] != 'all'){
      $none_verified_listing_array = array();
      $all_listings = $this->db->get_where('listing')->result_array();
      foreach($all_listings as $all_listing):
        $none_verified_listing = $this->db->get_where('claimed_listing', array('listing_id' => $all_listing['id']));
        if($none_verified_listing->num_rows() != 0){
          if($none_verified_listing->row('status') == 0){
            $none_verified_listing_array[] = $all_listing['id'];
          }
        }else{
          $none_verified_listing_array[] = $all_listing['id'];
        }
      endforeach;
      
      $this->db->where_in('id', $none_verified_listing_array);
  }

  if ($data['status'] != 'all')
  $this->db->where('status', $data['status']);

  if ($data['user_id'] != 'all')
  $this->db->where('user_id', $data['user_id']);

  $this->db->order_by('date_added' , 'desc');
  // $this->db->where('date_added >=' , $data['timestamp_start']);
  // $this->db->where('date_added <=' , $data['timestamp_end']);
  return $this->db->get('listing');

}
function add_listing() {
  $photo_gallery  = array();

  $data['name'] = sanitizer($this->input->post('title'));
  $data['description'] = sanitizer($this->input->post('description'));

  // $value_check = $this->input->post('is_featured');
  // if(isset($value_check)){
  //   $data['is_featured'] = sanitizer($this->input->post('is_featured'));
  // }else{
  //   $data['is_featured'] = sanitizer(0);
  // }
  if($this->session->userdata('user_login') == '1'){
    $package_id = has_package($this->session->userdata('user_id'), 'package_id');
    $featured_status = $this->db->get_where('package')->row('featured');
    if($featured_status == 0){
      $data['is_featured'] = 0;
    }else{
      $data['is_featured'] = $this->input->post('is_featured');
    }
  }else{
    $data['is_featured'] = $this->input->post('is_featured');
  }

  $data['country_id'] = sanitizer($this->input->post('country_id'));
  $data['city_id'] = sanitizer($this->input->post('city_id'));
  $data['address'] = sanitizer($this->input->post('address'));
  $data['latitude'] = sanitizer($this->input->post('latitude'));
  $data['longitude'] = sanitizer($this->input->post('longitude'));
  $data['google_analytics_id'] = sanitizer($this->input->post('google_analytics_id'));

  if (sizeof(sanitizer($this->input->post('amenities'))) > 0) {
    $data['amenities'] = $this->make_json(sanitizer($this->input->post('amenities')));
  }else {
    $data['amenities'] = json_encode(array());
  }

  if (sizeof(sanitizer($this->input->post('categories'))) > 0) {
    $data['categories'] = $this->make_json(sanitizer($this->input->post('categories')));
  }else {
    $data['categories'] = json_encode(array());
  }


  $data['video_provider'] = sanitizer($this->input->post('video_provider'));
  $data['video_url'] = sanitizer($this->input->post('video_url'));
  $data['tags'] = sanitizer($this->input->post('tags'));
  $data['seo_meta_tags'] = sanitizer($this->input->post('seo_meta_tags'));
  $data['meta_description'] = sanitizer($this->input->post('meta_description'));

  $data['website'] = sanitizer($this->input->post('website'));
  $data['email'] = sanitizer($this->input->post('email'));
  $data['phone'] = sanitizer($this->input->post('phone'));
  $data['listing_type'] = sanitizer($this->input->post('listing_type'));

  $data['user_id'] = $this->session->userdata('user_id');
  $social_links = array(
    'facebook' => sanitizer($this->input->post('facebook')),
    'twitter' => sanitizer($this->input->post('twitter')),
    'linkedin' => sanitizer($this->input->post('linkedin')),
  );
  $data['social'] = json_encode($social_links);
  $data['date_added'] = strtotime(date('D, d-M-Y'));
  $time_config = array();
  $days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
  foreach ($days as $day) {
    $time_config[$day] = sanitizer($this->input->post($day.'_opening')).'-'.sanitizer($this->input->post($day.'_closing'));
  }

  if ($_FILES['listing_thumbnail']['name'] == "") {
    $data['listing_thumbnail'] = 'thumbnail.png';
  }else {
    $data['listing_thumbnail'] = md5(rand(10000000, 20000000)).'.jpg';
    move_uploaded_file($_FILES['listing_thumbnail']['tmp_name'], 'uploads/listing_thumbnails/'.$data['listing_thumbnail']);
  }

  if ($_FILES['listing_cover']['name'] == "") {
    $data['listing_cover'] = 'thumbnail.png';
  }else {
    $data['listing_cover'] = md5(rand(10000000, 20000000)).'.jpg';
    move_uploaded_file($_FILES['listing_cover']['tmp_name'], 'uploads/listing_cover_photo/'.$data['listing_cover']);
  }

  foreach ($_FILES['listing_images']['tmp_name'] as $listing_image) {
    if ($listing_image != "") {
      $random_identifier = md5(rand(10000000, 20000000)).'.jpg';
      move_uploaded_file($listing_image, 'uploads/listing_images/'.$random_identifier);
      array_push($photo_gallery, $random_identifier);
    }
  }
  $data['photos'] = json_encode($photo_gallery);
  $data['code'] = md5(rand(10000000, 20000000));

  if (strtolower($this->session->userdata('role')) == 'admin') {
    $data['status'] = 'active';
  }else {
    $data['status'] = 'pending';
  }

  $total_listing = $this->input->post('total_listing');
  $submited_listing = $this->input->post('submited_listing');

   $user_type = $this->db->get_where('user', array('id' => $this->session->userdata('user_id')))->row('role_id');

  if($total_listing > $submited_listing || $user_type == '1'){
    $this->db->insert('listing', $data);
    $listing_id = $this->db->insert_id();
    $time_config['listing_id'] = $listing_id;
    $this->db->insert('time_configuration', $time_config);

    // Add listing inner details data
    $this->add_listing_type_wise_details(sanitizer($this->input->post('listing_type')), $listing_id);
    $this->session->set_flashdata('flash_message', get_phrase('listing_added_successfully'));
  }else{
    $this->session->set_flashdata('error_message', get_phrase('there_is_no_free_space_to_add_to_the_listing'));
  }
}

// This function saves listing wise inner data
function add_listing_type_wise_details($listing_type = "", $listing_id = "") {
  $listing_photos = array();
  if ($listing_type == 'hotel') {
    $room_name_array = sanitizer($this->input->post('room_name'));
    array_pop($room_name_array);
    $room_description_array = sanitizer($this->input->post('room_description'));
    array_pop($room_description_array);
    $room_price_array = sanitizer($this->input->post('room_price'));
    array_pop($room_price_array);
    $hotel_room_amenities_array = sanitizer($this->input->post('hotel_room_amenities'));
    array_pop($hotel_room_amenities_array);
    foreach ($_FILES['room_image']['tmp_name'] as $room_image) {
      if ($room_image != "") {
        $random_identifier = md5(rand(10000000, 20000000)).'.jpg';
        move_uploaded_file($room_image, 'uploads/hotel_room_images/'.$random_identifier);
        array_push($listing_photos, $random_identifier);
      }
    }

    foreach ($room_name_array as $key => $room_name) {
      $hotel_room_specification_data['name']        = sanitizer($room_name);
      $hotel_room_specification_data['description'] = sanitizer($room_description_array[$key]);
      $hotel_room_specification_data['price']       = sanitizer($room_price_array[$key]);
      $hotel_room_specification_data['amenities']   = sanitizer($hotel_room_amenities_array[$key]);
      $hotel_room_specification_data['photo']       = sanitizer($listing_photos[$key]);
      $hotel_room_specification_data['listing_id']  = $listing_id;
      $this->db->insert('hotel_room_specification',$hotel_room_specification_data);
    }
  }
  elseif ($listing_type == 'restaurant') {
    $menu_name_array = sanitizer($this->input->post('menu_name'));
    array_pop($menu_name_array);
    $menu_items_array = sanitizer($this->input->post('items'));
    array_pop($menu_items_array);
    $menu_price_array = sanitizer($this->input->post('menu_price'));
    array_pop($menu_price_array);

    foreach ($_FILES['menu_image']['tmp_name'] as $menu_image) {
      if ($menu_image != "") {
        $random_identifier = md5(rand(10000000, 20000000)).'.jpg';
        move_uploaded_file($menu_image, 'uploads/restaurant_menu_images/'.$random_identifier);
        array_push($listing_photos, $random_identifier);
      }
    }

    foreach ($menu_name_array as $key => $menu_name) {
      $food_menu_data['name']       = sanitizer($menu_name);
      $food_menu_data['price']      = sanitizer($menu_price_array[$key]);
      $food_menu_data['items']      = sanitizer($menu_items_array[$key]);
      $food_menu_data ['photo']     = sanitizer($listing_photos[$key]);
      $food_menu_data['listing_id'] = sanitizer($listing_id);
      $this->db->insert('food_menu', $food_menu_data);
    }
  }
  elseif ($listing_type == 'beauty') {
    $service_name_array = sanitizer($this->input->post('service_name'));
    array_pop($service_name_array);

    $service_starting_time_array = $this->input->post('starting_time');
    array_pop($service_starting_time_array);

    $service_ending_time_array = $this->input->post('ending_time');
    array_pop($service_ending_time_array);

    $service_duration_array = $this->input->post('duration');
    array_pop($service_duration_array);

    $service_price_array = sanitizer($this->input->post('service_price'));
    array_pop($service_price_array);

    foreach ($_FILES['service_image']['tmp_name'] as $service_image) {
      if ($service_image != "") {
        $random_identifier = md5(rand(10000000, 20000000)).'.jpg';
        move_uploaded_file($service_image, 'uploads/beauty_service_images/'.$random_identifier);
        array_push($listing_photos, $random_identifier);
      }
    }

    foreach ($service_name_array as $key    => $service_name) {
      $beauty_service_data['name']          = sanitizer($service_name);
      $beauty_service_data['price']         = sanitizer($service_price_array[$key]);
      $beauty_service_data['service_times'] = sanitizer($service_starting_time_array[$key]).','.sanitizer($service_ending_time_array[$key]).','.sanitizer($service_duration_array[$key]);
      $beauty_service_data ['photo']        = sanitizer($listing_photos[$key]);
      $beauty_service_data['listing_id']    = sanitizer($listing_id);
      $this->db->insert('beauty_service', $beauty_service_data);
    }
  }
  elseif ($listing_type == 'shop') {
    $product_name_array = sanitizer($this->input->post('product_name'));
    array_pop($product_name_array);
    $product_variants_array = sanitizer($this->input->post('variants'));
    array_pop($product_variants_array);
    $product_price_array = sanitizer($this->input->post('product_price'));
    array_pop($product_price_array);

    foreach ($_FILES['product_image']['tmp_name'] as $product_image) {
      if ($product_image != "") {
        $random_identifier = md5(rand(10000000, 20000000)).'.jpg';
        move_uploaded_file($product_image, 'uploads/product_images/'.$random_identifier);
        array_push($listing_photos, $random_identifier);
      }
    }

    foreach ($product_name_array as $key => $product_name) {
      $product_details_data['name']       = sanitizer($product_name);
      $product_details_data['variant']    = sanitizer($product_variants_array[$key]);
      $product_details_data['price']      = sanitizer($product_price_array[$key]);
      $product_details_data ['photo']     = sanitizer($listing_photos[$key]);
      $product_details_data['listing_id'] = sanitizer($listing_id);
      $this->db->insert('product_details', $product_details_data);
    }
  }
}

function update_listing($listing_id = "") {
  $listing_details      = $this->crud_model->get_listings($listing_id)->row_array();

  $data['name'] = sanitizer($this->input->post('title'));
  $data['description'] = sanitizer($this->input->post('description'));

  // $value_check = $this->input->post('is_featured');
  // if(isset($value_check)){
  //   $data['is_featured'] = sanitizer($this->input->post('is_featured'));
  // }else{
  //   $data['is_featured'] = sanitizer(0);
  // }
  if($this->session->userdata('user_login') == '1'){
    $package_id = has_package($this->session->userdata('user_id'), 'package_id');
    $featured_status = $this->db->get_where('package')->row('featured');
    if($featured_status == 0){
      $data['is_featured'] = 0;
    }else{
      $data['is_featured'] = $this->input->post('is_featured');
    }
  }else{
    $data['is_featured'] = $this->input->post('is_featured');
  }

  $data['country_id'] = sanitizer($this->input->post('country_id'));
  $data['city_id'] = sanitizer($this->input->post('city_id'));
  $data['address'] = sanitizer($this->input->post('address'));
  $data['latitude'] = sanitizer($this->input->post('latitude'));
  $data['longitude'] = sanitizer($this->input->post('longitude'));
  $data['listing_type'] = sanitizer($this->input->post('listing_type'));
  $data['google_analytics_id'] = sanitizer($this->input->post('google_analytics_id'));

  if (sizeof(sanitizer($this->input->post('amenities'))) > 0) {
    $data['amenities'] = $this->make_json(sanitizer($this->input->post('amenities')));
  }else {
    $data['amenities'] = json_encode(array());
  }

  if (sizeof(sanitizer($this->input->post('categories'))) > 0) {
    $data['categories'] = $this->make_json(sanitizer($this->input->post('categories')));
  }else {
    $data['categories'] = json_encode(array());
  }

  $data['video_provider'] = sanitizer($this->input->post('video_provider'));
  $data['video_url'] = sanitizer($this->input->post('video_url'));
  $data['tags'] = sanitizer($this->input->post('tags'));
  $data['seo_meta_tags'] = sanitizer($this->input->post('seo_meta_tags'));
  $data['meta_description'] = sanitizer($this->input->post('meta_description'));

  $data['website'] = sanitizer($this->input->post('website'));
  $data['email'] = sanitizer($this->input->post('email'));
  $data['phone'] = sanitizer($this->input->post('phone'));
  $data['user_id'] = sanitizer($this->input->post('user_id'));
  $social_links = array(
    'facebook' => sanitizer($this->input->post('facebook')),
    'twitter' => sanitizer($this->input->post('twitter')),
    'linkedin' => sanitizer($this->input->post('linkedin')),
  );
  $data['social'] = json_encode($social_links);
  $data['date_modified'] = strtotime(date('D, d-M-Y'));
  $time_config = array();
  $days = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
  foreach ($days as $day) {
    $time_config[$day] = sanitizer($this->input->post($day.'_opening')).'-'.sanitizer($this->input->post($day.'_closing'));
  }

  if ($_FILES['listing_thumbnail']['name'] != "") {
    if ($listing_details['listing_thumbnail'] == "thumbnail.png" || $listing_details['listing_thumbnail'] == "") {
      $data['listing_thumbnail'] = md5(rand(10000000, 20000000)).'.jpg';
      move_uploaded_file($_FILES['listing_thumbnail']['tmp_name'], 'uploads/listing_thumbnails/'.$data['listing_thumbnail']);
    }else {
      $data['listing_thumbnail'] = $listing_details['listing_thumbnail'];
      move_uploaded_file($_FILES['listing_thumbnail']['tmp_name'], 'uploads/listing_thumbnails/'.$data['listing_thumbnail']);
    }
  }

  if ($_FILES['listing_cover']['name'] != "") {
    if ($listing_details['listing_cover'] == "thumbnail.png") {
      $data['listing_cover'] = md5(rand(10000000, 20000000)).'.jpg';
      move_uploaded_file($_FILES['listing_cover']['tmp_name'], 'uploads/listing_cover_photo/'.$data['listing_cover']);
    }else {
      $data['listing_cover'] = $listing_details['listing_cover'];
      move_uploaded_file($_FILES['listing_cover']['tmp_name'], 'uploads/listing_cover_photo/'.$data['listing_cover']);
    }
  }

  $old_listing_images   = json_decode($listing_details['photos']);
  $new_listing_images   = $this->input->post('new_listing_images');
  unset($new_listing_images[count($new_listing_images)-1]);
  $final_listing_images = array();

  foreach ($_FILES['listing_images']['tmp_name'] as $key => $listing_image) {

    if (in_array($new_listing_images[$key], $old_listing_images)) {
      if ($listing_image != "") {
        $random_identifier = $new_listing_images[$key];
        move_uploaded_file($listing_image, 'uploads/listing_images/'.$random_identifier);
        array_push($final_listing_images, $random_identifier);
      }else {
        $random_identifier = $new_listing_images[$key];
        array_push($final_listing_images, $random_identifier);
      }
    }else {
      if ($listing_image != "") {
        $random_identifier = md5(rand(10000000, 20000000)).'.jpg';
        //unlink('./uploads/listing_images/'.$new_listing_images[$key]);

        move_uploaded_file($listing_image, 'uploads/listing_images/'.$random_identifier);
        array_push($final_listing_images, $random_identifier);
      }else {
        //unlink('./uploads/listing_images/'.$new_listing_images[$key]);
      }
    }
  }

  $data['photos'] = json_encode($final_listing_images);

  $this->db->where('id', $listing_id);
  $this->db->update('listing', $data);


  $this->db->where('listing_id', $listing_id);
  $this->db->update('time_configuration', $time_config);

  // Update listing inner details data
  $this->update_listing_type_wise_details(sanitizer($this->input->post('listing_type')), $listing_id);

  // remove the existing listing details from other tables
  $this->remove_from_other_tables(sanitizer($this->input->post('listing_type')), $listing_id);
  $this->session->set_flashdata('flash_message', get_phrase('listing_updated_successfully'));
}

// This function updates listing wise inner data
function update_listing_type_wise_details($listing_type = "", $listing_id = "") {
  $listing_photos = array();
  // Updating listing wise image and data saving.
  if ($listing_type == 'hotel') {
    $room_name_array = sanitizer($this->input->post('room_name'));
    // print_r($room_name_array);
    array_pop($room_name_array);
    $room_description_array = sanitizer($this->input->post('room_description'));
    array_pop($room_description_array);
    $room_price_array = sanitizer($this->input->post('room_price'));
    array_pop($room_price_array);
    $hotel_room_amenities_array = sanitizer($this->input->post('hotel_room_amenities'));
    array_pop($hotel_room_amenities_array);
    $hotel_room_ids_array = sanitizer($this->input->post('hotel_room_id'));
    array_pop($hotel_room_ids_array);

    // Image Uploading functions starts here
    $old_hotel_room_images = sanitizer($this->input->post('old_hotel_room_images'));
    array_pop($old_hotel_room_images);
    // Image Uploading functions ends here

    foreach ($_FILES['room_image']['tmp_name'] as $key => $room_image) {
      if ($room_image != "") {
        $random_identifier = md5(rand(10000000, 20000000)).'.jpg';
        move_uploaded_file($room_image, 'uploads/hotel_room_images/'.$random_identifier);
        array_push($listing_photos, $random_identifier);
      }else {
        array_push($listing_photos, $old_hotel_room_images[$key]);
      }
    }

    foreach ($hotel_room_ids_array as $key => $hotel_room_id) {
      $hotel_room_specification_data['name']        = sanitizer($room_name_array[$key]);
      $hotel_room_specification_data['description'] = sanitizer($room_description_array[$key]);
      $hotel_room_specification_data['price']       = sanitizer($room_price_array[$key]);
      $hotel_room_specification_data['amenities']   = sanitizer($hotel_room_amenities_array[$key]);
      $hotel_room_specification_data['photo']       = sanitizer($listing_photos[$key]);
      $hotel_room_specification_data['listing_id']  = sanitizer($listing_id);
      if ($hotel_room_id > 0) {
        $this->db->where('id', $hotel_room_id);
        $this->db->update('hotel_room_specification', $hotel_room_specification_data);
      }else {
        $this->db->insert('hotel_room_specification',$hotel_room_specification_data);
      }
    }
  }
  elseif ($listing_type == 'restaurant') {
    $menu_name_array = sanitizer($this->input->post('menu_name'));
    array_pop($menu_name_array);
    $menu_items_array = sanitizer($this->input->post('items'));
    array_pop($menu_items_array);
    $menu_price_array = sanitizer($this->input->post('menu_price'));
    array_pop($menu_price_array);
    $menu_ids_array = sanitizer($this->input->post('food_menu_id'));
    array_pop($menu_ids_array);

    // Image Uploading functions starts here
    $old_food_menu_images = sanitizer($this->input->post('old_food_menu_images'));
    array_pop($old_food_menu_images);
    // Image Uploading functions ends here

    foreach ($_FILES['menu_image']['tmp_name'] as $key => $menu_image) {
      if ($menu_image != "") {
        $random_identifier = md5(rand(10000000, 20000000)).'.jpg';
        move_uploaded_file($menu_image, 'uploads/restaurant_menu_images/'.$random_identifier);
        array_push($listing_photos, $random_identifier);
      }else {
        array_push($listing_photos, $old_food_menu_images[$key]);
      }
    }

    foreach ($menu_ids_array as $key => $menu_id) {
      $food_menu_data['name']       = sanitizer($menu_name_array[$key]);
      $food_menu_data['price']      = sanitizer($menu_price_array[$key]);
      $food_menu_data['items']      = sanitizer($menu_items_array[$key]);
      $food_menu_data ['photo']     = sanitizer($listing_photos[$key]);
      $food_menu_data['listing_id'] = sanitizer($listing_id);
      if ($menu_id > 0) {
        $this->db->where('id', $menu_id);
        $this->db->update('food_menu', $food_menu_data);
      }else {
        $this->db->insert('food_menu', $food_menu_data);
      }
    }
  }elseif ($listing_type == 'beauty') {
    $service_name_array = sanitizer($this->input->post('service_name'));
    array_pop($service_name_array);

    $service_starting_time_array = $this->input->post('starting_time');
    array_pop($service_starting_time_array);

    $service_ending_time_array = $this->input->post('ending_time');
    array_pop($service_ending_time_array);

    $service_duration_array = $this->input->post('duration');
    array_pop($service_duration_array);

    $service_price_array = sanitizer($this->input->post('service_price'));
    array_pop($service_price_array);
    $service_ids_array = sanitizer($this->input->post('beauty_service_id'));
    array_pop($service_ids_array);

    // Image Uploading functions starts here
    $old_beauty_service_images = sanitizer($this->input->post('old_beauty_service_images'));
    array_pop($old_beauty_service_images);
    // Image Uploading functions ends here

    foreach ($_FILES['service_image']['tmp_name'] as $key => $service_image) {
      if ($service_image != "") {
        $random_identifier = md5(rand(10000000, 20000000)).'.jpg';
        move_uploaded_file($service_image, 'uploads/beauty_service_images/'.$random_identifier);
        array_push($listing_photos, $random_identifier);
      }else {
        array_push($listing_photos, $old_beauty_service_images[$key]);
      }
    }

    foreach ($service_ids_array as $key => $service_id) {
      $beauty_service_data['name']       = sanitizer($service_name_array[$key]);
      $beauty_service_data['price']      = sanitizer($service_price_array[$key]);
      $beauty_service_data['service_times']      = sanitizer($service_starting_time_array[$key]).','.sanitizer($service_ending_time_array[$key]).','.sanitizer($service_duration_array[$key]);
      $beauty_service_data ['photo']     = sanitizer($listing_photos[$key]);
      $beauty_service_data['listing_id'] = sanitizer($listing_id);
      if ($service_id > 0) {
        $this->db->where('id', $service_id);
        $this->db->update('beauty_service', $beauty_service_data);
      }else {
        $this->db->insert('beauty_service', $beauty_service_data);
      }
    }
  }
  elseif ($listing_type == 'shop') {
    $product_name_array = sanitizer($this->input->post('product_name'));
    array_pop($product_name_array);
    $product_variants_array = sanitizer($this->input->post('variants'));
    array_pop($product_variants_array);
    $product_price_array = sanitizer($this->input->post('product_price'));
    array_pop($product_price_array);
    $product_ids_array = sanitizer($this->input->post('product_id'));
    array_pop($product_ids_array);

    // Image Uploading functions starts here
    $old_product_images = sanitizer($this->input->post('old_product_images'));
    array_pop($old_product_images);
    // Image Uploading functions ends here

    foreach ($_FILES['product_image']['tmp_name'] as $key => $product_image) {
      if ($product_image != "") {
        $random_identifier = md5(rand(10000000, 20000000)).'.jpg';
        move_uploaded_file($product_image, 'uploads/product_images/'.$random_identifier);
        array_push($listing_photos, $random_identifier);
      }else {
        array_push($listing_photos, $old_product_images[$key]);
      }
    }

    foreach ($product_ids_array as $key => $product_id) {
      $product_details_data['name']       = sanitizer($product_name_array[$key]);
      $product_details_data['variant']    = sanitizer($product_variants_array[$key]);
      $product_details_data['price']      = sanitizer($product_price_array[$key]);
      $product_details_data ['photo']     = sanitizer($listing_photos[$key]);
      $product_details_data['listing_id'] = sanitizer($listing_id);
      if ($product_id > 0) {
        $this->db->where('id', $product_id);
        $this->db->update('product_details', $product_details_data);
      }else {
        $this->db->insert('product_details', $product_details_data);
      }
    }
  }
}

function add_listing_validity(){
  $data['full_name'] = sanitizer($this->input->post('full_name'));
  $data['phone'] = sanitizer($this->input->post('phone'));
  $data['additional_information'] = sanitizer($this->input->post('additional_information'));
  $data['listing_id'] = sanitizer($this->input->post('listing_id'));
  $data['user_id'] = sanitizer($this->input->post('user_id'));
  $data['status'] = 1;
  $check_status = $this->db->get_where('claimed_listing', array('listing_id' => $data['listing_id'], 'user_id' => $data['user_id']))->row('status');
  if($check_status != 1){
    $this->db->insert('claimed_listing', $data);
  }else{
    echo 1;
  }  
}

function approve_listing_validation($claim_request_id = ""){
  $data['status'] = 1;
  $check_status = $this->db->get_where('claimed_listing', array('id' => $claim_request_id))->row('status');
  if($check_status == 0){
    $this->db->where('id', $claim_request_id);
    $this->db->update('claimed_listing', $data);
    echo 1;
  }elseif($check_status == 1){
    echo 2;
  }
}

function discard_claim_request($claim_request_id = ""){
  $check_status = $this->db->get_where('claimed_listing', array('id' => $claim_request_id))->row('status');
  if($check_status == 0){
    $this->db->where('id', $claim_request_id);
    $this->db->delete('claimed_listing');
  }
}

function discard_wrong_approve($claim_request_id = ""){
  $check_status = $this->db->get_where('claimed_listing', array('id' => $claim_request_id))->row('status');
  if($check_status == 1){
    $this->db->where('id', $claim_request_id);
    $this->db->delete('claimed_listing');
  }
}

// function claim_this_listing() {
//   $data['listing_id'] = sanitizer($this->input->post('listing_id'));
//   $data['user_id'] = sanitizer($this->input->post('user_id'));
//   $data['full_name'] = sanitizer($this->input->post('full_name'));
//   $data['phone'] = sanitizer($this->input->post('phone'));
//   $data['additional_information'] = sanitizer($this->input->post('additional_information'));
//   $data['status'] = sanitizer($this->input->post('status'));
//   $this->db->insert('claimed_listing', $data);
// }

// This function removes all the exisiting data of a certain listing
function remove_from_other_tables($listing_type = "", $listing_id = "") {

  if ($listing_type != "hotel") {
    $this->db->where('listing_id', $listing_id);
    $this->db->delete('hotel_room_specification');
  }
  if ($listing_type != "shop") {
    $this->db->where('listing_id', $listing_id);
    $this->db->delete('product_details');
  }
  if ($listing_type != "restaurant") {
    $this->db->where('listing_id', $listing_id);
    $this->db->delete('food_menu');
  }
  if ($listing_type != "beauty") {
    $this->db->where('listing_id', $listing_id);
    $this->db->delete('beauty_service');
  }
}

//offline payment
function offline_payment(){
  $package_id = $this->input->post('package');
  $validity = $this->db->get_where('package', array('id' => $package_id))->row('validity');
  $purchase_date          = strtotime(date('D, d-M-Y').' 00:00:00');
  $data['purchase_date']  = $purchase_date;
  $data['expired_date']   = strtotime("+".$validity." day", $purchase_date);
  $data['package_id']     = $package_id;
  $data['user_id']        = $this->input->post('user');
  $data['amount_paid']    = $this->input->post('amount');

  $payment_method = $this->input->post('payment_method');
  if($payment_method != ''){
    $data['payment_method'] = $payment_method;
  }else{
    $data['payment_method'] = 'offline';
  }
  $this->db->insert('package_purchased_history', $data);
}

function update_listings_single_column($column_name = "", $value = "", $listing_id) {
  $data = array(
    $column_name => $value
  );
  $this->db->where('id', $listing_id);
  $this->db->update('listing', $data);
}

function check_listing_form_submission_status($data = array()) {
  if(trim($data['name']) == "" || $data['category_id'] == "" || $data['latitude'] == "" || $data['longitude'] == "" || $data['country_id'] == "" || $data['city_id'] == "" || $data['email'] == "" || $data['website'] == "" || $data['phone'] == ""){
    return false;
  }else {
    return true;
  }
}

function get_time_configuration_by_listing_id($listing_id = 0) {
  return $this->db->get_where('time_configuration', array('listing_id' => $listing_id));
}
function get_countries($country_id = 0) {
  if ($country_id > 0) {
    $this->db->where('id', $country_id);
  }
  return $this->db->get('country');
}
function delete_from_table($table_name = "", $id) {
  $this->db->where('id', $id);
  $this->db->delete($table_name);
  unlink("assets/frontend/single-listing-geojson/listing-id-".$id.".json");
}
function trim_file_name($old_file_name) {
  $new_file_name = trim(addslashes($old_file_name));
  $new_file_name = str_replace(' ', '_', $new_file_name);
  return $new_file_name;
}

function update_system_currency_settings() {
  $data['description'] = sanitizer($this->input->post('system_currency'));
  $this->db->where('type', 'system_currency');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('currency_position'));
  $this->db->where('type', 'currency_position');
  $this->db->update('settings', $data);
}

function update_paypal_settings() {
  // update paypal keys
  $paypal_info = array();

  $paypal['active'] = sanitizer($this->input->post('paypal_active'));
  $paypal['mode'] = sanitizer($this->input->post('paypal_mode'));
  $paypal['sandbox_client_id'] = sanitizer($this->input->post('sandbox_client_id'));
  $paypal['production_client_id'] = sanitizer($this->input->post('production_client_id'));
  array_push($paypal_info, $paypal);

  $data['description']    =   json_encode($paypal_info);
  $this->db->where('type', 'paypal');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('paypal_currency'));
  $this->db->where('type', 'paypal_currency');
  $this->db->update('settings', $data);
}
function update_stripe_settings() {
  $stripe_info = array();

  $stripe['active'] = sanitizer($this->input->post('stripe_active'));
  $stripe['testmode'] = sanitizer($this->input->post('testmode'));
  $stripe['public_key'] = sanitizer($this->input->post('public_key'));
  $stripe['secret_key'] = sanitizer($this->input->post('secret_key'));
  $stripe['public_live_key'] = sanitizer($this->input->post('public_live_key'));
  $stripe['secret_live_key'] = sanitizer($this->input->post('secret_live_key'));
  array_push($stripe_info, $stripe);

  $data['description']    =   json_encode($stripe_info);
  $this->db->where('type', 'stripe');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('stripe_currency'));
  $this->db->where('type', 'stripe_currency');
  $this->db->update('settings', $data);
}

public function update_map_settings() {
  $data['description'] = sanitizer($this->input->post('map'));
  $this->db->where('type', 'active_map');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('map_access_token'));
  $this->db->where('type', 'map_access_token');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('default_location'));
  $this->db->where('type', 'default_location');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('max_zoom_level'));
  $this->db->where('type', 'max_zoom_level');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('min_zoom_listings_page'));
  $this->db->where('type', 'min_zoom_listings_page');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('min_zoom_directory_page'));
  $this->db->where('type', 'min_zoom_directory_page');
  $this->db->update('settings', $data);
}

public function update_system_settings() {
  $data['description'] = sanitizer($this->input->post('website_title'));
  $this->db->where('type', 'website_title');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('system_title'));
  $this->db->where('type', 'system_title');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('meta_keyword'));
  $this->db->where('type', 'meta_keyword');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('meta_description'));
  $this->db->where('type', 'meta_description');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('language'));
  $this->db->where('type', 'language');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('text_align'));
  $this->db->where('type', 'text_align');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('system_email'));
  $this->db->where('type', 'system_email');
  $this->db->update('settings', $data);

  $data['description'] = $this->input->post('address');
  $this->db->where('type', 'address');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('phone'));
  $this->db->where('type', 'phone');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('purchase_code'));
  $this->db->where('type', 'purchase_code');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('vat_percentage'));
  $this->db->where('type', 'vat_percentage');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('country_id'));
  $this->db->where('type', 'country_id');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('timezone'));
  $this->db->where('type', 'timezone');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('footer_text'));
  $this->db->where('type', 'footer_text');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('footer_link'));
  $this->db->where('type', 'footer_link');
  $this->db->update('settings', $data);
}

public function update_frontend_settings() {
  $data['description'] = sanitizer($this->input->post('banner_title'));
  $this->db->where('type', 'banner_title');
  $this->db->update('frontend_settings', $data);

  $data['description'] = sanitizer($this->input->post('banner_sub_title'));
  $this->db->where('type', 'banner_sub_title');
  $this->db->update('frontend_settings', $data);

  $data['description'] = sanitizer($this->input->post('slogan'));
  $this->db->where('type', 'slogan');
  $this->db->update('frontend_settings', $data);

  $data['description'] = $this->input->post('about_us');
  $this->db->where('type', 'about_us');
  $this->db->update('frontend_settings', $data);

  $data['description'] = $this->input->post('terms_and_condition');
  $this->db->where('type', 'terms_and_condition');
  $this->db->update('frontend_settings', $data);

  $data['description'] = $this->input->post('privacy_policy');
  $this->db->where('type', 'privacy_policy');
  $this->db->update('frontend_settings', $data);

  $data['description'] = $this->input->post('faq');
  $this->db->where('type', 'faq');
  $this->db->update('frontend_settings', $data);

  $social_links = array(
    'facebook' => sanitizer($this->input->post('facebook')),
    'twitter' => sanitizer($this->input->post('twitter')),
    'linkedin' => sanitizer($this->input->post('linkedin')),
    'google' => sanitizer($this->input->post('google')),
    'instagram' => sanitizer($this->input->post('instagram')),
    'pinterest' => sanitizer($this->input->post('pinterest'))
  );

  $data['description'] = json_encode($social_links);
  $this->db->where('type', 'social_links');
  $this->db->update('frontend_settings', $data);

  if($this->input->post('cookie_status') == 1):
    $data['description'] = $this->input->post('cookie_status');
  else:
    $data['description'] = 0;
  endif;
  $this->db->where('type', 'cookie_status');
  $this->db->update('frontend_settings', $data);

  $data['description'] = $this->input->post('cookie_note');
  $this->db->where('type', 'cookie_note');
  $this->db->update('frontend_settings', $data);

  $data['description'] = $this->input->post('cookie_policy');
  $this->db->where('type', 'cookie_policy');
  $this->db->update('frontend_settings', $data);
}

function update_smtp_settings() {

  $data['description'] = sanitizer($this->input->post('smtp_protocol'));
  $this->db->where('type', 'protocol');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('smtp_user'));
  $this->db->where('type', 'smtp_user');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('smtp_pass'));
  $this->db->where('type', 'smtp_pass');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('smtp_host'));
  $this->db->where('type', 'smtp_host');
  $this->db->update('settings', $data);

  $data['description'] = sanitizer($this->input->post('smtp_port'));
  $this->db->where('type', 'smtp_port');
  $this->db->update('settings', $data);

}

function website_images_uploader($image_type = "") {
  if ($image_type == 'banner_image') {
    move_uploaded_file($_FILES['banner_image']['tmp_name'], 'uploads/system/home_banner.jpg');
  }
  if ($image_type == 'light_logo') {
    move_uploaded_file($_FILES['light_logo']['tmp_name'], 'assets/global/light_logo.png');
  }
  if ($image_type == 'dark_logo') {
    move_uploaded_file($_FILES['dark_logo']['tmp_name'], 'assets/global/dark_logo.png');
  }
  if ($image_type == 'small_logo') {
    move_uploaded_file($_FILES['small_logo']['tmp_name'], 'assets/global/logo-sm.png');
  }
  if ($image_type == 'favicon') {
    move_uploaded_file($_FILES['favicon']['tmp_name'], 'assets/global/favicon.png');
  }
}

// Listing cruds
public function get_listing_details($listing_id = "", $attribute = "") {
  $this->db->where('id', $listing_id);
  if ($attribute != "") {
    $this->db->select($attribute);
  }
  return $this->db->get('listing');
}

public function get_amenities($amenity_id = "") {
  if ($amenity_id > 0) {
    $this->db->where('id', $amenity_id);
  }

  return $this->db->get('amenities');
}

//blog select
public function get_blogs($blog_id = ""){
  if($blog_id > 0){
    $this->db->where('id', $blog_id);
  }
  return $this->db->get('blogs');
}

public function add_blog(){
  $data['title'] = sanitizer($this->input->post('title'));
  $data['category_id'] = sanitizer($this->input->post('categories'));
  $data['blog_text'] = $this->input->post('blog_text');
  $data['blog_thumbnail'] = md5(rand()).'.jpg';
  $data['blog_cover'] = md5(rand()).'.jpg';
  $data['user_id'] = $this->session->userdata('user_id');
  $data['status'] = 1;
  $data['added_date'] = strtotime(date('dMY'));
  $this->db->insert('blogs', $data);
  move_uploaded_file($_FILES['blog_thumbnail']['tmp_name'], 'uploads/blog_thumbnails/'.$data['blog_thumbnail']);
  move_uploaded_file($_FILES['blog_cover']['tmp_name'], 'uploads/blog_cover_images/'.$data['blog_cover']);
}

public function edit_blog($param1 = ""){
  $data['title'] = sanitizer($this->input->post('title'));
  $data['category_id'] = sanitizer($this->input->post('categories'));
  $data['blog_text'] = $this->input->post('blog_text');
  $data['blog_thumbnail'] = sanitizer($this->input->post('blog_thumbnail_name'));
  $data['blog_cover'] = sanitizer($this->input->post('blog_cover_name'));
  $data['modified_date'] = strtotime(date('dMY'));
  $this->db->where('id', $param1);
  $this->db->update('blogs', $data);
  move_uploaded_file($_FILES['blog_thumbnail']['tmp_name'], 'uploads/blog_thumbnails/'.$data['blog_thumbnail']);
  move_uploaded_file($_FILES['blog_cover']['tmp_name'], 'uploads/blog_cover_images/'.$data['blog_cover']);
}

public function blog_status($param1 = "", $param2 = ""){
  if($param1 == 'active'):
    $data['status'] = 1;
  elseif($param1 == 'inactive'):
    $data['status'] = 0;
  endif;
  $this->db->where('id', $param2);
  $this->db->update('blogs', $data);
}

public function delete_blog($param1 = ""){
  $thumbnail_image = $this->db->get_where('blogs', array('id' => $param1))->row('blog_thumbnail');
  $cover_image = $this->db->get_where('blogs', array('id' => $param1))->row('blog_cover');
  unlink('uploads/blog_thumbnails/'.$thumbnail_image);
  unlink('uploads/blog_cover_images/'.$cover_image);
  $this->db->where('id', $param1);
  $this->db->delete('blogs');
}

public function remove_listing_inner_feature() {
  $table_name = "";
  $listing_type = sanitizer($this->input->post('type'));
  $id = sanitizer($this->input->post('id'));
  if ($listing_type == 'food_menu') {
    $table_name = 'food_menu';
    unlink('uploads/restaurant_menu_images/'.$this->db->get_where($table_name, array('id' => $id))->row('photo'));
  }elseif ($listing_type == 'product') {
    $table_name = 'product_details';
    unlink('uploads/product_images/'.$this->db->get_where($table_name, array('id' => $id))->row('photo'));
  }elseif ($listing_type == 'hotel') {
    $table_name = 'hotel_room_specification';
    unlink('uploads/hotel_room_images/'.$this->db->get_where($table_name, array('id' => $id))->row('photo'));
  }elseif($listing_type == 'beauty_service'){
    $table_name = 'beauty_service';
    unlink('uploads/beauty_service_images/'.$this->db->get_where($table_name, array('id' => $id))->row('photo'));
  }
  $this->db->where('id', $id);
  $this->db->delete($table_name);
  return true;
}

function get_user_wise_wishlist() {
  $wishlists = array();
  $user_details = $this->db->get_where('user', array('id' => $this->session->userdata('user_id')))->row_array();
  $wishlists = json_decode($user_details['wishlists']);
  if (count($wishlists) > 0) {
    $this->db->where_in('id', $wishlists);
    return $this->db->get('listing')->result_array();
  }else {
    return array();
  }
}

function create_package_purchase_history($payment_method = "", $user_id = "", $package_id = "", $paid_amount = "") {
  $validity = $this->db->get_where('package', array('id' => $package_id))->row('validity');
  $purchase_date          = strtotime(date('D, d-M-Y').' 00:00:00');
  $data['purchase_date']  = $purchase_date;
  $data['expired_date']   = strtotime("+".$validity." day", $purchase_date);
  $data['package_id']     = $package_id;
  $data['user_id']        = $user_id;
  $data['amount_paid']    = $paid_amount;
  $data['payment_method'] = $payment_method;
  $this->db->insert('package_purchased_history', $data);
}

function get_user_specific_purchase_history($user_id = 0) {
  if ($user_id > 0) {
    return $this->db->get_where('package_purchased_history', array('user_id' => $user_id));
  }else {
    return $this->db->get('package_purchased_history');
  }
}

function get_purchase_history_with_date_range($timestamp_start = "", $timestamp_end = "") {
  $this->db->order_by('purchase_date' , 'desc');
  $this->db->where('purchase_date >=' , $timestamp_start);
  $this->db->where('purchase_date <=' , $timestamp_end);
  return $this->db->get('package_purchased_history');
}


function get_reported_listings() {
  return $this->db->get('reported_listing');
}

function get_rating_wise_quality() {
  return $this->db->get('review_wise_quality');
}
function update_rating_wise_quality($id = "") {
  $updater = array(
    'rating_from' => sanitizer($this->input->post('rating_from')),
    'rating_to' => sanitizer($this->input->post('rating_to')),
    'quality' => sanitizer($this->input->post('quality')),
  );

  $this->db->where('id', $id);
  $this->db->update('review_wise_quality',$updater);
}

// Currency table queries and operations
function get_currencies() {
  return $this->db->get('currency')->result_array();
}

function get_paypal_supported_currencies() {
  $this->db->where('paypal_supported', 1);
  return $this->db->get('currency')->result_array();
}

function get_stripe_supported_currencies() {
  $this->db->where('stripe_supported', 1);
  return $this->db->get('currency')->result_array();
}

function get_application_details() {
  $purchase_code = get_settings('purchase_code');
  $returnable_array = array(
    'purchase_code_status' => get_phrase('not_found'),
    'support_expiry_date'  => get_phrase('not_found'),
    'customer_name'        => get_phrase('not_found')
  );

  $personal_token = "gC0J1ZpY53kRpynNe4g2rWT5s4MW56Zg";
  $url = "https://api.envato.com/v3/market/author/sale?code=".$purchase_code;
  $curl = curl_init($url);

  //setting the header for the rest of the api
  $bearer   = 'bearer ' . $personal_token;
  $header   = array();
  $header[] = 'Content-length: 0';
  $header[] = 'Content-type: application/json; charset=utf-8';
  $header[] = 'Authorization: ' . $bearer;

  $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:'.$purchase_code.'.json';
    $ch_verify = curl_init( $verify_url . '?code=' . $purchase_code );

    curl_setopt( $ch_verify, CURLOPT_HTTPHEADER, $header );
    curl_setopt( $ch_verify, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch_verify, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt( $ch_verify, CURLOPT_CONNECTTIMEOUT, 5 );
    curl_setopt( $ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    $cinit_verify_data = curl_exec( $ch_verify );
    curl_close( $ch_verify );

    $response = json_decode($cinit_verify_data, true);

    if (count($response['verify-purchase']) > 0) {

      //print_r($response);
      $item_name 				= $response['verify-purchase']['item_name'];
      $purchase_time 			= $response['verify-purchase']['created_at'];
      $customer 				= $response['verify-purchase']['buyer'];
      $licence_type 			= $response['verify-purchase']['licence'];
      $support_until			= $response['verify-purchase']['supported_until'];
      $customer 				= $response['verify-purchase']['buyer'];

      $purchase_date			= date("d M, Y", strtotime($purchase_time));

      $todays_timestamp 		= strtotime(date("d M, Y"));
      $support_expiry_timestamp = strtotime($support_until);

      $support_expiry_date	= date("d M, Y", $support_expiry_timestamp);

      if ($todays_timestamp > $support_expiry_timestamp)
      $support_status		= get_phrase('expired');
      else
      $support_status		= get_phrase('valid');

      $returnable_array = array(
        'purchase_code_status' => $support_status,
        'support_expiry_date'  => $support_expiry_date,
        'customer_name'        => $customer
      );
    }
    else {
      $returnable_array = array(
        'purchase_code_status' => 'invalid',
        'support_expiry_date'  => 'invalid',
        'customer_name'        => 'invalid'
      );
    }

    return $returnable_array;
  }

  function curl_request($code = '') {

        $product_code = $code;

        $personal_token = "FkA9UyDiQT0YiKwYLK3ghyFNRVV9SeUn";
        $url = "https://api.envato.com/v3/market/author/sale?code=".$product_code;
        $curl = curl_init($url);

        //setting the header for the rest of the api
        $bearer   = 'bearer ' . $personal_token;
        $header   = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json; charset=utf-8';
        $header[] = 'Authorization: ' . $bearer;

        $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:'.$product_code.'.json';
        $ch_verify = curl_init( $verify_url . '?code=' . $product_code );

        curl_setopt( $ch_verify, CURLOPT_HTTPHEADER, $header );
        curl_setopt( $ch_verify, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch_verify, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch_verify, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt( $ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $cinit_verify_data = curl_exec( $ch_verify );
        curl_close( $ch_verify );

        $response = json_decode($cinit_verify_data, true);

        if (count($response['verify-purchase']) > 0) {
            return true;
        } else {
            return false;
        }
  	}

    public function beauty_service_checking_time($param1 = '', $param2 = ''){
      $times = $this->db->get_where('beauty_service', array('id' => $param1))->row('service_times');
      $time = explode(',', $times);
      $starting_hour_and_minute = explode(':', $time[0]);
      $ending_hour_and_minute = explode(':', $time[1]);

      $booking_time_hour_and_minute = explode(':', $param2);

      if($starting_hour_and_minute[0] == $booking_time_hour_and_minute[0]){
          if($starting_hour_and_minute[1] <= $booking_time_hour_and_minute[1])
          {
              echo 1;
          }else{
              echo 0;
          }

      }elseif($ending_hour_and_minute[0] == $booking_time_hour_and_minute[0]){
          if($ending_hour_and_minute[1] >= $booking_time_hour_and_minute[1]){
              echo 1;
          }else{
              echo 0;
          }
      }else{
          if($booking_time_hour_and_minute[0] == 00){
              $booking_hour = 12;
          }else{
              $booking_hour = $booking_time_hour_and_minute[0];
          }

          if($starting_hour_and_minute[0] < $ending_hour_and_minute[0]){
              if($starting_hour_and_minute[0] < $booking_hour && $ending_hour_and_minute[0] > $booking_hour){
                  echo 1;
              }else{
                  echo 0;
              }
          }elseif($starting_hour_and_minute[0] > $ending_hour_and_minute[0]){
              if($starting_hour_and_minute[0] < $booking_hour || $ending_hour_and_minute[0] > $booking_hour){
                  echo 1;
              }else{
                  echo 0;
              }
          }
      }
    }

    function check_rechaptcha(){
      if (isset($_POST["g-recaptcha-response"])) {
          $url = 'https://www.google.com/recaptcha/api/siteverify';
          $data = array(
              'secret' => get_settings('recaptcha_secretkey'),
              'response' => $_POST["g-recaptcha-response"]
          );
          $query = http_build_query($data);
          $options = array(
              'http' => array (
                  'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
                      "Content-Length: ".strlen($query)."\r\n".
                      "User-Agent:MyAgent/1.0\r\n",
                  'method' => 'POST',
                  'content' => $query
              )
          );
          $context  = stream_context_create($options);
          $verify = file_get_contents($url, false, $context);
          $captcha_success = json_decode($verify);
          if ($captcha_success->success == false) {
              return false;
          } else if ($captcha_success->success == true) {
              return true;
          }
      } else {
          return false;
      }
    }

    function update_recaptcha_settings(){
      $data['description'] = sanitizer($this->input->post('recaptcha_sitekey'));
      $this->db->where('type', 'recaptcha_sitekey');
      $this->db->update('settings', $data);

      $data['description'] = sanitizer($this->input->post('recaptcha_secretkey'));
      $this->db->where('type', 'recaptcha_secretkey');
      $this->db->update('settings', $data);
      $this->session->set_flashdata('flash_message', get_phrase('recaptcha_settings_updated'));
    }
}
