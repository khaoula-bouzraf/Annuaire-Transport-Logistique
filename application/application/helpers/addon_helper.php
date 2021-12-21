<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

if (! function_exists('get_addon_details')) {
  function get_addon_details($unique_identifier = '') {
  	$CI	=&	get_instance();
    $CI->load->database();
  	$addon = $CI->db->get_where('addons', array('unique_identifier' => $unique_identifier));
  	if($addon->num_rows() > 0){
  		return $addon->row()->status;
  	}else{
  		return 0;
  	}
  }
}


  //Only addon
if (! function_exists('check_facebook_page_data')) {
  function check_facebook_page_data($listing_id = '') {
    $CI =&  get_instance();
    $CI->load->database();
    $facebook_page_data = $CI->db->get_where('facebook_messenger', array('listing_id' => $listing_id));
    if($facebook_page_data->num_rows() > 0){
      if($facebook_page_data->row()->logged_in_greeting != null && $facebook_page_data->row()->page_id != null){
        return 1;
      }else{
        return 0;
      }
    }else{
      return 0;
    }
  }
}

if (! function_exists('get_facebook_page_data')) {
  function get_facebook_page_data($listing_id = ""){
    $CI =&  get_instance();
    $CI->load->database();
    if($listing_id != ""){
      $facebook_page_data = $CI->db->get_where('facebook_messenger', array('listing_id' => $listing_id));
      if($facebook_page_data->num_rows() > 0){
        return $facebook_page_data->row_array();
      }else{
        return false;
      }
    }
  }
}