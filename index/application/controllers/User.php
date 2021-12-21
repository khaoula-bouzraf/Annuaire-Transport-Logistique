<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
		if ($this->session->userdata('user_login') == true) {
			$this->dashboard();
		}else {
			redirect(site_url('login'), 'refresh');
		}
	}

	public function dashboard() {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$page_data['page_name'] = 'dashboard';
		$page_data['page_title'] = get_phrase('dashboard');
		$this->load->view('backend/index.php', $page_data);
	}

	public function listings($param1 = '', $param2 = '') {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if ($param1 == 'add') {
			$this->crud_model->add_listing();
			redirect(site_url('user/listings'), 'refresh');
		}elseif ($param1 == 'edit') {
			$this->crud_model->update_listing($param2);
			redirect(site_url('user/listings'), 'refresh');
		}elseif ($param1 == 'delete') {
			$this->crud_model->delete_from_table('listing', $param2);
			$this->session->set_flashdata('flash_message', get_phrase('listing_deleted'));
			redirect(site_url('user/listings'), 'refresh');
		}

		// $page_data['timestamp_start'] = strtotime('-29 days', time());
		// $page_data['timestamp_end']   = strtotime(date("m/d/Y"));
		$page_data['page_name']  = 'listings';
		$page_data['page_title'] = get_phrase('directories');
		$page_data['listings'] = $this->db->get_where('listing', array('user_id' => $this->session->userdata('user_id')))->result_array();
		$this->load->view('backend/index', $page_data);
	}

	public function listing_form($param1 = '', $param2 = '') {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		if (has_package() > 0) {
			if ($param1 == 'add') {
				$page_data['page_name']  = 'listing_add_wiz';
				$page_data['page_title'] = get_phrase('add_new_listing');
			}elseif ($param1 == 'edit') {
				$page_data['page_name']  = 'listing_edit_wiz';
				$page_data['page_title'] = get_phrase('listing_edit');
				$page_data['listing_id'] = $param2;
			}
			$this->load->view('backend/index.php', $page_data);
		}else {
			redirect(site_url('user'), 'refresh');
		}
	}

	function booking_request_hotel($param1 ='', $param2 = ''){
		if ($this->session->userdata('user_login') != 1)
			redirect(site_url('login'), 'refresh');

		if($param1 == 'approved'){
			$data['status'] = 1;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->email_model->request_approved_mail($param2);
			$this->session->set_flashdata('flash_message', get_phrase('request_approved_successfully'));
			redirect(site_url('user/booking_request_hotel'), 'refresh');
		}
		if($param1 == 'pending'){
			$data['status'] = 0;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->session->set_flashdata('flash_message', get_phrase('request_pending_successfully'));
			redirect(site_url('user/booking_request_hotel'), 'refresh');
		}
		if($param1 == 'delete'){
			$this->db->where('id', $param2);
			$this->db->delete('booking');
			$this->session->set_flashdata('flash_message', get_phrase('booking_request_deleted_successfully'));
			redirect(site_url('user/booking_request_hotel'), 'refresh');
		}
		$page_data['page_name'] = 'booking_request_hotel';
		$page_data['page_title'] = get_phrase('booking_request');
		$this->load->view('backend/index.php', $page_data);
	}

	function booking_request_restaurant($param1 ='', $param2 = ''){
		if ($this->session->userdata('user_login') != 1)
			redirect(site_url('login'), 'refresh');

		if($param1 == 'approved'){
			$data['status'] = 1;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->email_model->request_approved_mail($param2);
			$this->session->set_flashdata('flash_message', get_phrase('request_approved_successfully'));
			redirect(site_url('user/booking_request_restaurant'), 'refresh');
		}
		if($param1 == 'pending'){
			$data['status'] = 0;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->session->set_flashdata('flash_message', get_phrase('request_pending_successfully'));
			redirect(site_url('user/booking_request_restaurant'), 'refresh');
		}
		if($param1 == 'delete'){
			$this->db->where('id', $param2);
			$this->db->delete('booking');
			$this->session->set_flashdata('flash_message', get_phrase('booking_request_deleted_successfully'));
			redirect(site_url('user/booking_request_restaurant'), 'refresh');
		}
		$page_data['page_name'] = 'booking_request_restaurant';
		$page_data['page_title'] = get_phrase('booking_request');
		$this->load->view('backend/index.php', $page_data);
	}

	function booking_request_beauty($param1 ='', $param2 = ''){
		if ($this->session->userdata('user_login') != 1)
			redirect(site_url('login'), 'refresh');

		if($param1 == 'approved'){
			$data['status'] = 1;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->email_model->request_approved_mail($param2);
			$this->session->set_flashdata('flash_message', get_phrase('request_approved_successfully'));
			redirect(site_url('user/booking_request_beauty'), 'refresh');
		}
		if($param1 == 'pending'){
			$data['status'] = 0;
			$this->db->where('id', $param2);
			$this->db->update('booking', $data);
			$this->session->set_flashdata('flash_message', get_phrase('request_pending_successfully'));
			redirect(site_url('user/booking_request_beauty'), 'refresh');
		}
		if($param1 == 'delete'){
			$this->db->where('id', $param2);
			$this->db->delete('booking');
			$this->session->set_flashdata('flash_message', get_phrase('booking_request_deleted_successfully'));
			redirect(site_url('user/booking_request_beauty'), 'refresh');
		}
		$page_data['page_name'] = 'booking_request_beauty';
		$page_data['page_title'] = get_phrase('booking_request');
		$this->load->view('backend/index.php', $page_data);
	}

	function review_modify($param1 = '', $param2 = '', $param3 = '', $param4 = ''){
		if ($this->session->userdata('user_login') != 1)
			redirect(site_url('login'), 'refresh');

        if($param1 == 'edit'){
        	$data['review_rating'] = $this->input->post('review_rating');
        	$data['review_comment'] = $this->input->post('review_comment');
        	$this->db->where('review_id', $param2);
        	$this->db->update('review', $data);
        	$this->session->set_flashdata('flash_message', get_phrase('review_updated_successfully'));
        }
        if($param1 == 'delete'){
            $this->db->where('review_id', $param2);
            $this->db->delete('review');
            $this->session->set_flashdata('flash_message', get_phrase('review_deleted'));
        }
        $listing_type = $this->db->get_where('listing', array('id' => $param4))->row('listing_type');
        redirect(get_listing_url($param4),'refresh');

	}

	function wishlists() {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$page_data['page_name'] = 'wishlists';
		$page_data['page_title'] = get_phrase('wishlists');
		$this->load->view('backend/index.php', $page_data);
	}

	function packages() {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$page_data['page_name'] = 'packages';
		$page_data['page_title'] = get_phrase('packages');
		$page_data['packages'] = $this->crud_model->get_packages()->result_array();
		$this->load->view('backend/index.php', $page_data);
	}

	// Payment Stuffs
	public function paypal_checkout($package_id = "") {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		$page_data['package_details'] = $this->crud_model->get_packages($package_id)->row_array();
		$page_data['user_details']    = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
		$this->load->view('backend/user/paypal_checkout', $page_data);
	}

	public function stripe_checkout($package_id = "") {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}

		$page_data['package_details'] = $this->crud_model->get_packages($package_id)->row_array();
		$page_data['user_details']    = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
		$this->load->view('backend/user/stripe_checkout', $page_data);
	}

	// Function after payment gets done
	function payment_success($payment_method = "", $user_id = "", $package_id = "", $paid_amount = "") {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$this->crud_model->create_package_purchase_history($payment_method, $user_id, $package_id, $paid_amount);
		$this->session->set_flashdata('flash_message', get_phrase('payment_success'));
		redirect(site_url('user/purchase_history'), 'refresh');
	}

	//free package
	function free_package($payment_method = "", $user_id = "", $package_id = "", $paid_amount = "") {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$this->crud_model->create_package_purchase_history($payment_method, $user_id, $package_id, $paid_amount);
		$this->session->set_flashdata('flash_message', get_phrase('successfully_added_a_free_package'));
		redirect(site_url('user/purchase_history'), 'refresh');
	}

	// Ajax calls
	function get_city_list_by_country_id() {
		$page_data['country_id'] = sanitizer($this->input->post('country_id'));
		return $this->load->view('backend/user/city_list_dropdown', $page_data);
	}

	function filter_listing_table() {
		$data['status'] 	= sanitizer($this->input->post('status'));
		$date_range = sanitizer($this->input->post('date_range'));
		$date_range = explode(" - ", $date_range);
		$data['timestamp_start'] = strtotime($date_range[0]);
		$data['timestamp_end']   = strtotime($date_range[1]);
		$page_data['listings'] = $this->crud_model->filter_listing_table($data)->result_array();
		$this->load->view('backend/user/filter_listing_table', $page_data);
	}

	function purchase_history() {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$page_data['page_name'] = 'purchase_history';
		$page_data['page_title'] = get_phrase('purchase_history');
		$page_data['purchase_histories'] = $this->crud_model->get_user_specific_purchase_history($this->session->userdata('user_id'))->result_array();
		$this->load->view('backend/index.php', $page_data);
	}

	function package_invoice($package_purchase_history_id = "") {
		if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
		$page_data['page_name'] = 'package_invoice';
		$page_data['page_title'] = get_phrase('invoice');
		$page_data['purchase_history'] = $this->db->get_where('package_purchased_history', array('id' => $package_purchase_history_id))->row_array();
		$this->load->view('backend/index.php', $page_data);
	}

	/******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('user_login') != 1)
            redirect(site_url('login'), 'refresh');
        if ($param1 == 'update_profile_info') {
            $this->user_model->edit_user($param2);
            redirect(site_url('user/manage_profile'), 'refresh');
        }
        if ($param1 == 'change_password') {
            $this->user_model->change_password($param2);
            redirect(site_url('user/manage_profile'), 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['user_info']  = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
        $this->load->view('backend/index', $page_data);
    }

    function payment_gateway($package_id = ""){
    	if ($this->session->userdata('user_login') != true) {
			redirect(site_url('login'), 'refresh');
		}
        $page_data['package_data'] = $this->crud_model->get_packages($package_id)->row_array();
        $this->session->set_userdata('total_price_of_checking_out', $page_data['package_data']['price']);
        $page_data['title'] = get_phrase('payment_gateway');
        $this->load->view('payment/index', $page_data);
    }
}
