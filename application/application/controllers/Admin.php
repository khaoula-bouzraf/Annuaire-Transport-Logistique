<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		/*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');

		// Set the timezone
		date_default_timezone_set(get_settings('timezone'));
	}

	public function index() {
		if ($this->session->userdata('admin_login') == true) {
			$this->dashboard();
		}else {
			redirect(site_url('login'), 'refresh');
		}
	}

	public function dashboard() {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$page_data['page_name'] = 'dashboard';
		$page_data['page_title'] = get_phrase('dashboard');
		$this->load->view('backend/index.php', $page_data);
	}

	public function categories($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'add') {
			$this->crud_model->add_category();
			$this->session->set_flashdata('flash_message', get_phrase('category_added'));
			redirect(site_url('admin/categories'), 'refresh');
		}
		elseif ($param1 == 'edit') {
			$this->crud_model->edit_category($param2);
			$this->session->set_flashdata('flash_message', get_phrase('category_updated'));
			redirect(site_url('admin/categories'), 'refresh');
		}elseif ($param1 == 'delete') {
			$this->crud_model->delete_from_table('category', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('category_deleted'));
			redirect(site_url('admin/categories'), 'refresh');
		}
		$page_data['page_name'] = 'categories';
		$page_data['page_title'] = get_phrase('categories');
		$page_data['categories'] = $this->crud_model->get_categories()->result_array();
		$this->load->view('backend/index.php', $page_data);
	}

	public function sub_categories() {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		$page_data['page_name'] = 'sub_categories';
		$page_data['page_title'] = get_phrase('sub_categories');
		$page_data['sub_categories'] = $this->crud_model->get_categories()->result_array();
		$this->load->view('backend/index.php', $page_data);
	}

	public function category_form($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if($param1 == 'add'){
			$page_data['page_name'] = 'category_add';
			$page_data['page_title'] = get_phrase('add_new_category');
			$page_data['categories'] = $this->crud_model->get_categories()->result_array();
		}elseif ($param1 == 'edit') {
			$page_data['category_id'] = $param2;
			$page_data['page_name'] = 'category_edit';
			$page_data['page_title'] = get_phrase('update_category');
			$page_data['categories'] = $this->crud_model->get_categories()->result_array();
		}
		$this->load->view('backend/index.php', $page_data);
	}

	public function cities($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'add') {
			$this->crud_model->add_city();
			$this->session->set_flashdata('flash_message', get_phrase('city_added'));
			redirect(site_url('admin/cities'), 'refresh');
		}
		else if ($param1 == 'edit') {
			$this->crud_model->edit_city($param2);
			$this->session->set_flashdata('flash_message', get_phrase('city_updated'));
			redirect(site_url('admin/cities'), 'refresh');
		}
		else if ($param1 == 'delete') {
			$this->crud_model->delete_from_table('city', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('city_deleted'));
			redirect(site_url('admin/cities'), 'refresh');
		}
		$page_data['page_name'] = 'cities';
		$page_data['page_title'] = get_phrase('cities');
		$page_data['cities'] = $this->crud_model->get_cities()->result_array();
		$this->load->view('backend/index', $page_data);
	}

	public function city_form($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'add') {
			$page_data['page_name']  = 'city_add';
			$page_data['page_title'] = get_phrase('add_new_city');
			$page_data['countries']  = $this->crud_model->get_countries()->result_array();

		}elseif ($param1 == 'edit') {
			$page_data['page_name']  = 'city_edit';
			$page_data['city_id']    = $param2;
			$page_data['page_title'] = get_phrase('update_city');
			$page_data['countries']  = $this->crud_model->get_countries()->result_array();
		}
		$this->load->view('backend/index.php', $page_data);
	}

	public function packages($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'add') {
			$this->crud_model->add_package();
			$this->session->set_flashdata('flash_message', get_phrase('package_added'));
			redirect(site_url('admin/packages'), 'refresh');

		}elseif ($param1 == 'edit') {
			$this->crud_model->edit_package($param2);
			$this->session->set_flashdata('flash_message', get_phrase('package_updated'));
			redirect(site_url('admin/packages'), 'refresh');

		}elseif ($param1 == 'delete') {
			$this->crud_model->delete_from_table('package', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('package_deleted'));
			redirect(site_url('admin/packages'), 'refresh');
		}

		$page_data['page_name'] = 'packages';
		$page_data['page_title'] = get_phrase('packages');
		$page_data['packages'] = $this->crud_model->get_packages()->result_array();
		$this->load->view('backend/index', $page_data);
	}

	public function package_form($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'add') {
			$page_data['page_name']  = 'package_add';
			$page_data['page_title'] = get_phrase('add_new_package');
		}elseif ($param1 == 'edit') {
			$page_data['page_name']  = 'package_edit';
			$page_data['page_title'] = get_phrase('update_package');
			$page_data['package_id'] = $param2;
		}
		$this->load->view('backend/index.php', $page_data);
	}


	public function users($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 == 'add') {
			$this->user_model->add_user();
			redirect(site_url('admin/users'), 'refresh');
		}
		elseif ($param1 == 'edit') {
			$this->user_model->edit_user($param2);
			redirect(site_url('admin/users'), 'refresh');
		}elseif ($param1 == 'delete') {
			$this->crud_model->delete_from_table('user', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('user_has_been_deleted'));
			redirect(site_url('admin/users'), 'refresh');
		}

		$page_data['page_name'] = 'users';
		$page_data['page_title'] = get_phrase('users');
		$page_data['users'] = $this->user_model->get_users();
		$this->load->view('backend/index', $page_data);

	}

	function claimed_listings($param1 = '', $param2 = '', $param3 = ''){
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if($param1 == 'approved'){
			$status = $this->db->get_where('claimed_listing', array('listing_id' => $param3, 'status' => 1))->row('status');
			if($status != 1):
				$data['status'] = 1;
				$this->db->where('id', $param2);
				$this->db->update('claimed_listing', $data);
				$this->session->set_flashdata('flash_message', get_phrase('claim_approved_successfully'));
			else:
				$this->session->set_flashdata('error_message', get_phrase('this_listing_already_claimed'));
			endif;
			redirect(site_url('admin/claimed_listings'), 'refresh');
		}

		if($param1 == 'delete'){
			$this->db->where('id', $param2);
			$this->db->delete('claimed_listing');
			$this->session->set_flashdata('flash_message', get_phrase('claim_deleted_successfully'));
			redirect(site_url('admin/claimed_listings'), 'refresh');
		}

		$page_data['page_name'] = 'claimed_listings';
		$page_data['page_title'] = get_phrase('claimed_listing');
		$this->load->view('backend/index', $page_data);
	}

	function report($param1 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 != "") {
			$date_range                   = $_GET['date_range'];
			$date_range                   = explode(" - ", $date_range);
			$page_data['timestamp_start'] = strtotime($date_range[0]);
			$page_data['timestamp_end']   = strtotime($date_range[1]);
		}else {
			$page_data['timestamp_start'] = strtotime('-29 days', time());
			$page_data['timestamp_end']   = strtotime(date("m/d/Y"));
		}

		$page_data['page_name'] = 'report';
		$page_data['purchase_histories'] = $this->crud_model->get_purchase_history_with_date_range($page_data['timestamp_start'], $page_data['timestamp_end']);
		$page_data['page_title'] = get_phrase('report');
		$this->load->view('backend/index', $page_data);
	}


	function package_invoice($package_purchase_history_id = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$page_data['page_name'] = 'package_invoice';
		$page_data['page_title'] = get_phrase('invoice');
		$page_data['purchase_history'] = $this->db->get_where('package_purchased_history', array('id' => $package_purchase_history_id))->row_array();
		$this->load->view('backend/index.php', $page_data);
	}

	public function user_form($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'add') {
			$page_data['page_name']  = 'user_add';
			$page_data['page_title'] = get_phrase('add_new_user');
		}elseif ($param1 == 'edit') {
			$page_data['page_name']  = 'user_edit';
			$page_data['page_title'] = get_phrase('update_user');
			$page_data['user_id'] = $param2;
		}
		$this->load->view('backend/index.php', $page_data);
	}


	public function listings($param1 = '', $param2 = '') {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'add') {
			$this->crud_model->add_listing();
			redirect(site_url('admin/listings'), 'refresh');
		}elseif ($param1 == 'edit') {
			$this->crud_model->update_listing($param2);
			redirect(site_url('admin/listings'), 'refresh');
		}elseif ($param1 == 'delete') {
			$this->crud_model->delete_from_table('listing', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('listing_deleted'));
			redirect(site_url('admin/listings'), 'refresh');
		}elseif ($param1 == 'make_active'){
			$this->crud_model->update_listings_single_column('status', 'active', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('listing_updated'));
			redirect(site_url('admin/listings'), 'refresh');
		}elseif ($param1 == 'make_pending'){
			$this->crud_model->update_listings_single_column('status', 'pending', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('listing_updated'));
			redirect(site_url('admin/listings'), 'refresh');
		}elseif ($param1 == 'make_none_featured'){
			$this->crud_model->update_listings_single_column('is_featured', 0, $param2);
			$this->session->set_flashdata('flash_message', get_phrase('listing_updated'));
			redirect(site_url('admin/listings'), 'refresh');
		}elseif ($param1 == 'make_featured'){
			$this->crud_model->update_listings_single_column('is_featured', 1, $param2);
			$this->session->set_flashdata('flash_message', get_phrase('listing_updated'));
			redirect(site_url('admin/listings'), 'refresh');
		}elseif ($param1 == 'listings_delete'){
			 $listings_id = "',".$param2."'";
			 $listings_id = explode(',', $listings_id);
			 foreach($listings_id as $listing_id){
			 	$this->db->where('id', $listing_id);
			 	$this->db->delete('listing');
			 }
			 $this->session->set_flashdata('flash_message', get_phrase('listings_deleted_successfully'));
		}

		$page_data['timestamp_start'] = strtotime('-29 days', time());
		$page_data['timestamp_end']   = strtotime(date("m/d/Y"));
		$page_data['page_name']  = 'listings';
		$page_data['page_title'] = get_phrase('directories');
		//$page_data['listings'] = $this->crud_model->get_listings(0, $page_data['timestamp_start'], $page_data['timestamp_end'])->result_array();
		$page_data['listings'] = $this->crud_model->get_listings(0, $page_data['timestamp_start'], $page_data['timestamp_end'])->result_array();
		$this->load->view('backend/index', $page_data);
	}

	public function listing_form($param1 = '', $param2 = '') {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'add') {
			$page_data['page_name']  = 'listing_add_wiz';
			$page_data['page_title'] = get_phrase('add_new_listing');
		}elseif ($param1 == 'edit') {
			$page_data['page_name']  = 'listing_edit_wiz';
			$page_data['page_title'] = get_phrase('listing_edit');
			$page_data['listing_id'] = $param2;
		}
		$this->load->view('backend/index.php', $page_data);
	}

	function booking_request_hotel($param1 ='', $param2 = ''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'), 'refresh');

		if($param1 == 'approved'){
			$data['status'] = 1;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->email_model->request_approved_mail($param2);
			$this->session->set_flashdata('flash_message', get_phrase('request_approved_successfully'));
			redirect(site_url('admin/booking_request_hotel'), 'refresh');
		}
		if($param1 == 'pending'){
			$data['status'] = 0;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->session->set_flashdata('flash_message', get_phrase('request_pending_successfully'));
			redirect(site_url('admin/booking_request_hotel'), 'refresh');
		}
		if($param1 == 'delete'){
			$this->db->where('id', $param2);
			$this->db->delete('booking');
			$this->session->set_flashdata('flash_message', get_phrase('booking_request_deleted_successfully'));
			redirect(site_url('admin/booking_request_hotel'), 'refresh');
		}
		$page_data['page_name'] = 'booking_request_hotel';
		$page_data['page_title'] = get_phrase('booking_request');
		$this->load->view('backend/index.php', $page_data);
	}

	function booking_request_restaurant($param1 ='', $param2 = ''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'), 'refresh');

		if($param1 == 'approved'){
			$data['status'] = 1;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->email_model->request_approved_mail($param2);
			$this->session->set_flashdata('flash_message', get_phrase('request_approved_successfully'));
			redirect(site_url('admin/booking_request_restaurant'), 'refresh');
		}
		if($param1 == 'pending'){
			$data['status'] = 0;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->session->set_flashdata('flash_message', get_phrase('request_pending_successfully'));
			redirect(site_url('admin/booking_request_restaurant'), 'refresh');
		}
		if($param1 == 'delete'){
			$this->db->where('id', $param2);
			$this->db->delete('booking');
			$this->session->set_flashdata('flash_message', get_phrase('booking_request_deleted_successfully'));
			redirect(site_url('admin/booking_request_restaurant'), 'refresh');
		}
		$page_data['page_name'] = 'booking_request_restaurant';
		$page_data['page_title'] = get_phrase('booking_request');
		$this->load->view('backend/index.php', $page_data);
	}

	function booking_request_beauty($param1 ='', $param2 = ''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'), 'refresh');

		if($param1 == 'approved'){
			$data['status'] = 1;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->email_model->request_approved_mail($param2);
			$this->session->set_flashdata('flash_message', get_phrase('request_approved_successfully'));
			redirect(site_url('admin/booking_request_beauty'), 'refresh');
		}
		if($param1 == 'pending'){
			$data['status'] = 0;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->session->set_flashdata('flash_message', get_phrase('request_pending_successfully'));
			redirect(site_url('admin/booking_request_beauty'), 'refresh');
		}
		if($param1 == 'delete'){
			$this->db->where('id', $param2);
			$this->db->delete('booking');
			$this->session->set_flashdata('flash_message', get_phrase('booking_request_deleted_successfully'));
			redirect(site_url('admin/booking_request_beauty'), 'refresh');
		}
		$page_data['page_name'] = 'booking_request_beauty';
		$page_data['page_title'] = get_phrase('booking_request');
		$this->load->view('backend/index', $page_data);
	}

	public function blogs(){
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$page_data['blogs'] = $this->crud_model->get_blogs()->result_array();
		$page_data['page_name'] = 'blogs';
		$page_data['page_title'] = get_phrase('posts');
		$this->load->view('backend/index', $page_data);
	}

	public function blog_form($param1 = "", $param2 = ""){
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if($param1 == 'add'):
			$page_data['categories'] = $this->crud_model->get_categories()->result_array();
			$page_data['page_name'] = 'add_blog_form';
			$page_data['page_title'] = get_phrase('add_new_blog');
			$this->load->view('backend/index', $page_data);
		elseif($param1 == 'edit'):
			$page_data['blog'] = $this->crud_model->get_blogs($param2)->row_array();
			$page_data['categories'] = $this->crud_model->get_categories()->result_array();
			$page_data['page_name'] = 'edit_blog_form';
			$page_data['page_title'] = get_phrase('blog_edit');
			$this->load->view('backend/index', $page_data);
		endif;
	}

	public function add_blog(){
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$this->crud_model->add_blog();
		$this->session->set_flashdata('flash_message', get_phrase('new_blog_added_successfully'));
		redirect(site_url('admin/blogs'), 'refresh');
	}

	public function edit_blog($param1 = ""){
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$this->crud_model->edit_blog($param1);
		$this->session->set_flashdata('flash_message', get_phrase('blog_updated_successfully'));
		redirect(site_url('admin/blogs'), 'refresh');
	}

	public function blog_status($param1 = "", $param2 = ""){
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$this->crud_model->blog_status($param1, $param2);
		if($param1 == 'active'):
		    $this->session->set_flashdata('flash_message', get_phrase('blog_activated_successfully'));
		elseif($param1 == 'inactive'):
			$this->session->set_flashdata('flash_message', get_phrase('blog_inactivated_successfully'));
		endif;
		redirect(site_url('admin/blogs'), 'refresh');
	}

	public function delete_blog($param1 = ""){
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$this->crud_model->delete_blog($param1);
		$this->session->set_flashdata('flash_message', get_phrase('blog_deleted_successfully'));
		redirect(site_url('admin/blogs'), 'refresh');
	}

	public function offline_payment($param1 = '', $param2 = ''){
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if($param1 == 'pay'){
			$this->crud_model->offline_payment();
			$this->session->set_flashdata('flash_message', get_phrase('offline_payment_success'));
			redirect(site_url('admin/report'), 'refresh');
		}
		$page_data['page_name']  = 'offline_payment';
		$page_data['page_title'] = get_phrase('offline_payment');
		$this->load->view('backend/index', $page_data);
	}

	public function reported_listings($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'mark_as_active') {
			$this->crud_model->update_listings_single_column('status', 'active', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('listing_updated'));
			redirect(site_url('admin/reported_listings'), 'refresh');
		}elseif ($param1 == 'mark_as_pending') {
			$this->crud_model->update_listings_single_column('status', 'pending', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('listing_updated'));
			redirect(site_url('admin/reported_listings'), 'refresh');
		}elseif ($param1 == 'delete') {
			$this->crud_model->delete_from_table('reported_listing', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('listing_deleted'));
			redirect(site_url('admin/reported_listings'), 'refresh');
		}
		$page_data['page_name']  = 'reported_listings';
		$page_data['page_title'] = get_phrase('reported_listings');
		$page_data['reported_listings'] = $this->crud_model->get_reported_listings()->result_array();
		$this->load->view('backend/index.php', $page_data);
	}

	public function amenities($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 == 'add') {
			$this->crud_model->add_amenity();
			$this->session->set_flashdata('flash_message', get_phrase('amenity_added'));
			redirect(site_url('admin/amenities'), 'refresh');
		}
		else if ($param1 == 'edit') {
			$this->crud_model->edit_amenity($param2);
			$this->session->set_flashdata('flash_message', get_phrase('amenity_updated'));
			redirect(site_url('admin/amenities'), 'refresh');
		}
		else if ($param1 == 'delete') {
			$this->crud_model->delete_from_table('amenities', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('amenity_deleted'));
			redirect(site_url('admin/amenities'), 'refresh');
		}

		$page_data['page_name'] = 'amenities';
		$page_data['page_title'] = get_phrase('amenities');
		$page_data['amenities'] = $this->crud_model->get_amenities()->result_array();
		$this->load->view('backend/index.php', $page_data);
	}

	public function amenity_form($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'add') {
			$page_data['page_name']  = 'amenity_add';
			$page_data['page_title'] = get_phrase('add_new_amenity');

		}elseif ($param1 == 'edit') {
			$page_data['page_name']  = 'amenity_edit';
			$page_data['amenity_id']    = $param2;
			$page_data['page_title'] = get_phrase('update_amenity');
		}
		$this->load->view('backend/index.php', $page_data);
	}

	// Settings portion
	public function system_settings($param1 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 == 'system_update') {
			$this->crud_model->update_system_settings();
			$this->session->set_flashdata('flash_message', get_phrase('system_settings_updated'));
			redirect(site_url('admin/system_settings'), 'refresh');
		}elseif($param1 == 'recaptcha_update'){
			$this->crud_model->update_recaptcha_settings();
			redirect(site_url('admin/system_settings'), 'refresh');
		}
		$page_data['languages']	 = $this->get_all_languages();
		$page_data['page_name']  = 'system_settings';
		$page_data['page_title'] = get_phrase('system_settings');
		$this->load->view('backend/index', $page_data);
	}

	// Settings portion
	public function map_settings($param1 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 == 'map_update') {
			$this->crud_model->update_map_settings();
			$this->session->set_flashdata('flash_message', get_phrase('map_settings_updated_successfully'));
			redirect(site_url('admin/map_settings'), 'refresh');
		}
		$page_data['page_name']  = 'map_settings';
		$page_data['page_title'] = get_phrase('map_settings');
		$this->load->view('backend/index', $page_data);
	}

	public function frontend_settings($param1 = "", $uploaded_image = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 == 'frontend_update') {
			$this->crud_model->update_frontend_settings();
			$this->session->set_flashdata('flash_message', get_phrase('frontend_settings_updated'));
			redirect(site_url('admin/frontend_settings'), 'refresh');
		}elseif($param1 == 'image_upload') {
			if (isset($_FILES[$uploaded_image]) && $_FILES[$uploaded_image]['name'] != "") {
				$this->crud_model->website_images_uploader($uploaded_image);
			}
			$this->session->set_flashdata('flash_message', get_phrase('frontend_settings_updated'));
			redirect(site_url('admin/frontend_settings'), 'refresh');
		}

		$page_data['page_name'] = 'frontend_settings';
		$page_data['page_title'] = get_phrase('frontend_settings');
		$this->load->view('backend/index', $page_data);
	}
	public function payment_settings($param1 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 == 'system_currency_settings') {
			$this->crud_model->update_system_currency_settings();
			$this->session->set_flashdata('flash_message', get_phrase('system_currency_settings_updated'));
			redirect(site_url('admin/payment_settings'), 'refresh');
		}
		if ($param1 == 'paypal_settings') {
			$this->crud_model->update_paypal_settings();
			$this->session->set_flashdata('flash_message', get_phrase('paypal_settings_updated'));
			redirect(site_url('admin/payment_settings'), 'refresh');
		}
		if ($param1 == 'stripe_settings') {
			$this->crud_model->update_stripe_settings();
			$this->session->set_flashdata('flash_message', get_phrase('stripe_settings_updated'));
			redirect(site_url('admin/payment_settings'), 'refresh');
		}

		$page_data['page_name'] = 'payment_settings';
		$page_data['page_title'] = get_phrase('payment_settings');
		$this->load->view('backend/index', $page_data);
	}

	public function smtp_settings($param1 = "") {
		if ($this->session->userdata('admin_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		if ($param1 == 'update') {
			$this->crud_model->update_smtp_settings();
			$this->session->set_flashdata('flash_message', get_phrase('smtp_settings_updated'));
			redirect(site_url('admin/smtp_settings'), 'refresh');
		}

		$page_data['page_name'] = 'smtp_settings';
		$page_data['page_title'] = get_phrase('smtp_settings');
		$this->load->view('backend/index', $page_data);
	}


	// Ajax calls
	function get_city_list_by_country_id() {
		$page_data['country_id'] = sanitizer($this->input->post('country_id'));
		return $this->load->view('backend/admin/city_list_dropdown', $page_data);
	}

	function filter_listing_table() {
		$page_data['status'] 	= $_GET['status'];
		$page_data['user_id'] 		= $_GET['user_id'];
		$page_data['verify_status'] 		= $_GET['verify_status'];
		$page_data['listings'] = $this->crud_model->filter_listing_table($page_data)->result_array();
		$page_data['page_name']  = 'listings';
		$page_data['page_title'] = get_phrase('listings');
		$this->load->view('backend/index', $page_data);
		//$this->load->view('backend/admin/filter_listing_table', $page_data);
	}

	function remove_listing_image() {
		echo $this->input->post('image_name');
	}

	function get_list_of_directories_and_files($dir = APPPATH, &$results = array()) {
		$files = scandir($dir);
		foreach($files as $key => $value){
			$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
			if(!is_dir($path)) {
				$results[] = $path;
			} else if($value != "." && $value != "..") {
				$this->get_list_of_directories_and_files($path, $results);
				$results[] = $path;
			}
		}
		return $results;
	}

	function get_all_php_files() {
		$all_files = $this->get_list_of_directories_and_files();
		foreach ($all_files as $file) {
			$info = pathinfo($file);
			if( isset($info['extension']) && strtolower($info['extension']) == 'php') {
				// echo $file.' <br/> ';
				if ($fh = fopen($file, 'r')) {
					while (!feof($fh)) {
						$line = fgets($fh);
						preg_match_all('/get_phrase\(\'(.*?)\'\)\;/s', $line, $matches);
						foreach ($matches[1] as $matche) {
							get_phrase($matche);
						}
					}
					fclose($fh);
				}
			}
		}

		echo 'I Am So Lit';
	}

	function get_list_of_language_files($dir = APPPATH.'/language', &$results = array()) {
		$files = scandir($dir);
		foreach($files as $key => $value){
			$path = realpath($dir.DIRECTORY_SEPARATOR.$value);
			if(!is_dir($path)) {
				$results[] = $path;
			} else if($value != "." && $value != "..") {
				$this->get_list_of_directories_and_files($path, $results);
				$results[] = $path;
			}
		}
		return $results;
	}

	function get_all_languages() {
		$language_files = array();
		$all_files = $this->get_list_of_language_files();
		foreach ($all_files as $file) {
			$info = pathinfo($file);
			if( isset($info['extension']) && strtolower($info['extension']) == 'json') {
				$file_name = explode('.json', $info['basename']);
				array_push($language_files, $file_name[0]);
			}
		}

		return $language_files;
	}

	// Language Functions
	public function manage_language($param1 = '', $param2 = '', $param3 = ''){
		if ($param1 == 'add_language') {
			saveDefaultJSONFile(sanitizer($this->input->post('language')));
			$this->session->set_flashdata('flash_message', get_phrase('language_added_successfully'));
			redirect(site_url('admin/manage_language'), 'refresh');
		}

		if ($param1 == 'delete_language') {
		    if (file_exists('application/language/'.$param2.'.json')) {
		        unlink('application/language/'.$param2.'.json');
		        $this->session->set_flashdata('flash_message', get_phrase('language_deleted_successfully'));
			    redirect(site_url('admin/manage_language'), 'refresh');
		    }
		}

		if ($param1 == 'add_phrase') {
			$new_phrase = get_phrase(sanitizer($this->input->post('phrase')));
			$this->session->set_flashdata('flash_message', $new_phrase.' '.get_phrase('has_been_added_successfully'));
			redirect(site_url('admin/manage_language'), 'refresh');
		}

		if ($param1 == 'edit_phrase') {
			$page_data['edit_profile'] = $param2;
		}

		$page_data['languages']				= $this->get_all_languages();
		$page_data['page_name']				=	'manage_language';
		$page_data['page_title']			=	get_phrase('multi_language_settings');
		$this->load->view('backend/index', $page_data);
	}

	public function update_phrase_with_ajax() {
		$current_editing_language = sanitizer($this->input->post('currentEditingLanguage'));
		$updatedValue = sanitizer($this->input->post('updatedValue'));
		$key = sanitizer($this->input->post('key'));
		saveJSONFile($current_editing_language, $key, $updatedValue);
		echo $current_editing_language.' '.$key.' '.$updatedValue;
	}

	function remove_listing_inner_feature() {
		return $this->crud_model->remove_listing_inner_feature();
	}


	/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
	function manage_profile($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
		redirect(site_url('login'), 'refresh');
		if ($param1 == 'update_profile_info') {
			$this->user_model->edit_user($param2);
			redirect(site_url('admin/manage_profile'), 'refresh');
		}
		if ($param1 == 'change_password') {
			$this->user_model->change_password($param2);
			redirect(site_url('admin/manage_profile'), 'refresh');
		}
		$page_data['page_name']  = 'manage_profile';
		$page_data['page_title'] = get_phrase('manage_profile');
		$page_data['user_info']  = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
		$this->load->view('backend/index', $page_data);
	}

	function review_modify($param1 = '', $param2 = '', $param3 = '', $param4 = ''){
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'), 'refresh');

        if($param1 == 'edit'){

        }
        if($param1 == 'delete'){
            $this->db->where('review_id', $param2);
            $this->db->delete('review');
            $this->session->set_flashdata('flash_message', get_phrase('review_deleted'));
        }
        redirect(get_listing_url($param4),'refresh');

	}

	function rating_wise_quality($param1 = "", $param2 = "", $param3 = '', $param4 = '') {
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'), 'refresh');
		if ($param1 == 'edit') {
			$this->crud_model->update_rating_wise_quality($param2);
			$this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
			redirect(site_url('admin/rating_wise_quality'), 'refresh');
		}
		if ($param1 == 'delete') {
			$this->crud_model->delete_from_table('review_wise_quality', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
			redirect(site_url('admin/rating_wise_quality'), 'refresh');
		}
		$page_data['page_name']  = 'rating_wise_quality';
		$page_data['page_title'] = get_phrase('rating_wise_quality');
		$page_data['qualities']  = $this->crud_model->get_rating_wise_quality()->result_array();
		$this->load->view('backend/index', $page_data);
	}

	function rating_wise_quality_form($param1 = "", $param2 = "") {
		if ($this->session->userdata('admin_login') != 1)
			redirect(site_url('login'), 'refresh');

		if ($param1 == 'edit') {
			$page_data['page_name']  = 'edit_rating_wise_quality';
			$page_data['id']    = $param2;
			$page_data['page_title'] = get_phrase('edit_rating_wise_quality');
		}
		$this->load->view('backend/index.php', $page_data);
	}

	function about() {
		if ($this->session->userdata('admin_login') != 1)
		redirect(site_url('login'), 'refresh');

		$page_data['application_details'] = $this->crud_model->get_application_details();
		$page_data['page_name']  = 'about';
		$page_data['page_title'] = get_phrase('about');
		$this->load->view('backend/index', $page_data);
	}

	function add_listing_validity(){
		if ($this->session->userdata('admin_login') != 1)
		redirect(site_url('login'), 'refresh');
		$this->crud_model->add_listing_validity();
	}

	function approve_listing_validation($claim_request_id = ''){
		if ($this->session->userdata('admin_login') != 1)
		redirect(site_url('login'), 'refresh');
		$this->crud_model->approve_listing_validation($claim_request_id);
	}

	function discard_claim_request($claim_request_id = "", $param2 = "", $listing_id = ""){
		// echo $param2.'<br>';
		// echo $listing_id.'<br>';
		// die();
		if ($this->session->userdata('admin_login') != 1)
		redirect(site_url('login'), 'refresh');
		if($param2 == 'wrong_approve'):
			$this->crud_model->discard_wrong_approve($claim_request_id);
			$this->session->set_flashdata('flash_message', get_phrase('the_claim_request_was_successfully_canceled'));
			redirect(site_url('admin/listing_form/edit/'.$listing_id), 'refresh');
		else:
			$this->crud_model->discard_claim_request($claim_request_id);
			$this->session->set_flashdata('flash_message', get_phrase('the_claim_request_was_successfully_canceled'));
			redirect(site_url('admin/listing_form/edit/'.$param2), 'refresh');
		endif;
	}


	//ADDON part
	function addon_manager($param = ''){
		if ($this->session->userdata('admin_login') != 1)
		redirect(site_url('login'), 'refresh');

		$page_data['addons'] = $this->addon_model->get_addons()->result_array();
		$page_data['page_name']  = 'addon_manager';
		$page_data['page_title'] = get_phrase('addon_manager');
		$this->load->view('backend/index', $page_data);
	}

	function add_addon(){
		if ($this->session->userdata('admin_login') != 1)
		redirect(site_url('login'), 'refresh');

		$page_data['page_name']  = 'addon_add';
		$page_data['page_title'] = get_phrase('add_addon');
		$this->load->view('backend/index', $page_data);
	}
	function addon_status($param1 = "", $param2 = ""){
		if ($this->session->userdata('admin_login') != 1)
		redirect(site_url('login'), 'refresh');
	
		if($param2 == 'active'):
			$this->addon_model->addon_activate($param1);
		else:
			$this->addon_model->addon_deactivate($param1);
		endif;
		$this->session->set_flashdata('flash_message', get_phrase('addon_updated_successfully'));
		redirect(site_url('admin/addon_manager'), 'refresh');
	}
	function addon_delete($param1 = ""){
		if ($this->session->userdata('admin_login') != 1)
		redirect(site_url('login'), 'refresh');
	
		$this->addon_model->addon_delete($param1);
		$this->session->set_flashdata('flash_message', get_phrase('addon_deleted_successfully'));
		redirect(site_url('admin/addon_manager'), 'refresh');
	}

	//Available Addon
	function available_addon(){
		$page_data['page_name']  = 'available_addon';
		$page_data['page_title'] = get_phrase('available_addon');
		$this->load->view('backend/index', $page_data);
	}

	function install_addon(){
		if ($this->session->userdata('admin_login') != 1)
		redirect(site_url('login'), 'refresh');
		$response = $this->addon_model->install_addon();
		$this->session->set_flashdata('flash_message', $response);
		redirect(site_url('admin/addon_manager'), 'refresh');
	}
}
