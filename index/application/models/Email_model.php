<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->library('email');
	}

	function password_reset_email($new_password = '' , $email = '')
	{
		$query = $this->db->get_where('user' , array('email' => $email));
		if($query->num_rows() > 0)
		{
			$email_msg	=	$this->email_template('forgot_password', $query->row('name'), get_settings('website_title'), $new_password);
			$email_sub	=	"Password reset request";
			$email_to	=	$email;

			$this->send_smtp_mail($email_msg , $email_sub , $email_to);
			//$this->sent_smtp_mail_with_php_mailer_library($email_msg , $email_sub , $email_to);
			return true;
		}
		else
		{
			return false;
		}
	}

	public function send_email_verification_mail($to = "", $verification_code = "") {
		$query = $this->db->get_where('user' , array('verification_code' => $verification_code));
		$redirect_url = site_url('login/verify_email_address/'.$verification_code);

		$email_msg	=	$this->email_template('verify_email_address', $query->row('name'), get_settings('website_title'), $redirect_url);
		$subject 		= "Verify Email Address";
		$this->send_smtp_mail($email_msg, $subject, $to);
		//$this->sent_smtp_mail_with_php_mailer_library($email_msg, $subject, $to);
	}

	public function restaurant_booking_mail($data = "") {
		$total_people = $data['adult_guests_for_booking'] + $data['child_guests_for_booking'];
		$date = date('D, d-M-Y', strtotime($data['date']));
		$subject 		= "Table Booking Request on $date";
		$email_msg	=	"<b>Hello,</b>";
		$email_msg	.=	"<p>I would like to book a table for ". $total_people ." people. Adults in number is ".$data['adult_guests_for_booking']." and Child in number is ".$data['child_guests_for_booking'].".</p>";
		$email_msg	.=	"<p>I would like to book this on ".$date.". Please let me know from your side.</p>";

		$user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();

		$this->send_smtp_mail($email_msg, $subject, $data['to'], $user_details['email']);
		//$this->sent_smtp_mail_with_php_mailer_library($email_msg, $subject, $data['to'], $user_details['email']);
	}

	public function beauty_service_mail($data = "") {
		$date = date('D, d-M-Y', strtotime($data['date']));
		$subject 		= "Appointment Booking Request on $date";
		$user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
		$email_msg	=	"<b>Hello,</b>";
		$email_msg	.=	"<p>Time : ".$this->input->post('time')."</p>";
		$email_msg  .=  "<p>Phone: ".$user_details['phone']."</p>";
		$email_msg	.=	"<p>Service : ".$this->db->get_where('beauty_service', array('id' => $this->input->post('service')))->row('name')."</p>";
		$email_msg	.=	"<p>I need to take care of my beauty. Please accept my request and let me know from your side.</p>";

		$this->send_smtp_mail($email_msg, $subject, $data['to'], $user_details['email']);
		//$this->sent_smtp_mail_with_php_mailer_library($email_msg, $subject, $data['to'], $user_details['email']);
	}

	public function hotel_booking_mail($data = "") {
		$total_people = $data['adult_guests_for_booking'] + $data['child_guests_for_booking'];
		$book_from = $data['book_from'];
		$book_to = $data['book_to'];
		$subject 		= "Hotel Room Booking Request from $book_from to $book_to";
		$email_msg	=	"<b>Hello,</b>";
		$email_msg	.=	"<p>I would like to book a ".$data['room_type']." room for ". $total_people ." people. Adults in number is ".$data['adult_guests_for_booking']." and Child in number is ".$data['child_guests_for_booking'].".</p>";
		$email_msg	.=	"<p>I would like to book this from ".$book_from." to ".$book_to.". Please let me know from your side.</p>";

		$user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();

		$this->send_smtp_mail($email_msg, $subject, $data['to'], $user_details['email']);
		//$this->sent_smtp_mail_with_php_mailer_library($email_msg, $subject, $data['to'], $user_details['email']);
	}

	public function request_approved_mail($booking_id = "") {
		$booking = $this->db->get_where('booking', array('id' => $booking_id))->row_array();
		$email_msg = '<b>Congratulations ! </b>';
		$email_msg .= '<p>'.$this->db->get_where('listing', array('id' => $booking['listing_id']))->row('name').'</p>';
		$email_msg .= '<p>Your request has been accepted.</p>';
		$email_msg .= '<p>At the right time '.$this->db->get_where('listing', array('id' => $booking['listing_id']))->row('name').' is being asked to attend the '.$booking['listing_type'].' .</p>';
		$subject = 'Approved your request';
		$to		 = $this->db->get_where('user', array('id' => $booking['requester_id']))->row('email');
		$from	 = $this->db->get_where('user', array('id' => $booking['user_id']))->row('email');
		$this->send_smtp_mail($email_msg, $subject, $to, $from);
		//$this->sent_smtp_mail_with_php_mailer_library($email_msg, $subject, $to, $from);

	}

	public function contact_us_mail($data = "") {
		$subject 		= "Contact us";
		$email_msg	=	"Hello, This is <b>".$data['name']."</b>";
		$email_msg	.=	"<p>".$data['message']."</p>";

		$user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
		$this->send_smtp_mail($email_msg, $subject, $data['to'], $user_details['email']);
		//$this->sent_smtp_mail_with_php_mailer_library($email_msg, $subject, $data['to'], $user_details['email']);
	}

	public function send_mail_to_site_owner(){
		$firstname = $this->input->post('name_contact');
		$lastname = $this->input->post('lastname_contact');
		$email_from = $this->input->post('email_contact');
		$phone = $this->input->post('phone_contact');
		$message = $this->input->post('message_contact');

		$subject 	= "User Contact";
		$email_to 	= $this->db->get_where('user', array('role_id' => 1))->row_array();
		$email_msg	=	'<p>'.$message.'</p>';
		$email_msg	.=	'<hr style="border: 1px solid #efefef;">
						<b><u>User details</u></b><br>
						<b>Name: </b>'.$firstname.' '.$lastname.'<br>';
		$email_msg	.=	'<b>Email: </b>'.$email_from.'<br>';
		$email_msg	.=	'<b>Phone: </b>'.$phone.'<br><hr style="border: 1px solid #efefef;">';

		$email_template = $this->email_template('user_contact', $email_to['name'], get_settings('website_title'), $email_msg);
		$this->send_smtp_mail($email_template, $subject, $email_to['email'], $email_from);
	}

	// more stable function
	public function send_smtp_mail($msg=NULL, $sub=NULL, $to=NULL, $from=NULL) {
		//Load email library
		$this->load->library('email');

		if($from == NULL){
			$from		=	get_settings('system_email');
		}

		//SMTP & mail configuration
		$config = array(
			'protocol'  => get_settings('protocol'),
			'smtp_host' => get_settings('smtp_host'),
			'smtp_port' => get_settings('smtp_port'),
			'smtp_user' => get_settings('smtp_user'),
			'smtp_pass' => get_settings('smtp_pass'),
			'mailtype'  => 'html',
			'charset'   => 'utf-8'
			//,
			// 'smtp_timeout' => '30',
			// 'mailpath' => '/usr/sbin/sendmail',
			// 'wordwrap' => TRUE
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");

		$htmlContent = $msg;

		$this->email->to($to);
		$this->email->from($from, get_settings('website_title'));
		$this->email->subject($sub);
		$this->email->message($htmlContent);

		//Send email
		$this->email->send();
	}

	public function sent_smtp_mail_with_php_mailer_library($msg=NULL, $sub=NULL, $to=NULL, $from=NULL) {
		if($from == NULL){
			$from = get_settings('system_email');
		}

		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();

		$mail->isSMTP();
		$mail->Host 	  = get_settings('smtp_host');
		$mail->SMTPAuth   = true;
		$mail->Username   = get_settings('smtp_user');
		$mail->Password   = get_settings('smtp_pass');
		$mail->SMTPSecure = 'tls';
		$mail->Port 	  = get_settings('smtp_port');

		$mail->setFrom(get_settings('smtp_user'), get_settings('website_title'));
		$mail->addReplyTo($from, get_settings('website_title'));

		//Sent message
		$mail->addAddress($to);

		$mail->Subject = $sub;

		$mail->isHTML(true);

		$mail->Body = $msg;
		if($mail->send()){

		}else{
			$this->session->set_flashdata('error_message', 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo);
		}
	}

	public function email_template($email_topic = "", $receiver_name = "", $system_title= "", $param1= "", $param2= "", $param3= ""){
		if($email_topic == 'forgot_password'){
			$message_body = '<p>You recently requested to reset your password for your <b>'.$system_title.'</b> account. Your password has been changed.</p>
                <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                  <tr>
                    <td align="center">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                        <tr>
                          <td align="center">
                            <div class="f-fallback button--green" style="color: #fff;">Your new password is: '.$param1.'</div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>';
			
		}

		if($email_topic == 'verify_email_address'){
			$message_body = '<p>Thank you very much for joining our <b>'.$system_title.'</b>. Please click the link below to verify your email address.</p>
                <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                  <tr>
                    <td align="center">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                        <tr>
                          <td align="center">
                            <a href="'.$param1.'" class="f-fallback button button--green" style="color: #fff;">Verify Your email address</a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>';
		}

		if($email_topic == 'user_contact'){
			$message_body =
				'<table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                  <tr>
                    <td align="center">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" role="presentation">
                        <tr>
                          <td align="center">
                            '.$param1.'
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>';
		}

		return '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html>
				  	<head>
					    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
					    <meta name="x-apple-disable-message-reformatting" />
					    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
					    <title></title>
					    <style type="text/css" rel="stylesheet" media="all">
					    /* Base ------------------------------ */
					    
					    @import url("https://fonts.googleapis.com/css?family=Nunito+Sans:400,700&display=swap");
					    body {
					      width: 100% !important;
					      height: 100%;
					      margin: 0;
					      -webkit-text-size-adjust: none;
					    }
					    
					    a {
					      color: #3869D4;
					    }
					    
					    a img {
					      border: none;
					    }
					    
					    td {
					      word-break: break-word;
					    }
					    
					    .preheader {
					      display: none !important;
					      visibility: hidden;
					      mso-hide: all;
					      font-size: 1px;
					      line-height: 1px;
					      max-height: 0;
					      max-width: 0;
					      opacity: 0;
					      overflow: hidden;
					    }
					    /* Type ------------------------------ */
					    
					    body,
					    td,
					    th {
					      font-family: "Nunito Sans", Helvetica, Arial, sans-serif;
					    }
					    
					    h1 {
					      margin-top: 0;
					      color: #333333;
					      font-size: 22px;
					      font-weight: bold;
					      text-align: left;
					    }
					    
					    h2 {
					      margin-top: 0;
					      color: #333333;
					      font-size: 16px;
					      font-weight: bold;
					      text-align: left;
					    }
					    
					    h3 {
					      margin-top: 0;
					      color: #333333;
					      font-size: 14px;
					      font-weight: bold;
					      text-align: left;
					    }
					    
					    td,
					    th {
					      font-size: 16px;
					    }
					    
					    p,
					    ul,
					    ol,
					    blockquote {
					      margin: .4em 0 1.1875em;
					      font-size: 16px;
					      line-height: 1.625;
					    }
					    
					    p.sub {
					      font-size: 13px;
					    }
					    /* Utilities ------------------------------ */
					    
					    .align-right {
					      text-align: right;
					    }
					    
					    .align-left {
					      text-align: left;
					    }
					    
					    .align-center {
					      text-align: center;
					    }
					    /* Buttons ------------------------------ */
					    
					    .button {
					      background-color: #3869D4;
					      border-top: 10px solid #3869D4;
					      border-right: 18px solid #3869D4;
					      border-bottom: 10px solid #3869D4;
					      border-left: 18px solid #3869D4;
					      display: inline-block;
					      color: #FFF;
					      text-decoration: none;
					      border-radius: 3px;
					      box-shadow: 0 2px 3px rgba(0, 0, 0, 0.16);
					      -webkit-text-size-adjust: none;
					      box-sizing: border-box;
					    }
					    
					    .button--green {
					      background-color: #22BC66;
					      border-top: 10px solid #22BC66;
					      border-right: 18px solid #22BC66;
					      border-bottom: 10px solid #22BC66;
					      border-left: 18px solid #22BC66;
					    }
					    
					    .button--red {
					      background-color: #FF6136;
					      border-top: 10px solid #FF6136;
					      border-right: 18px solid #FF6136;
					      border-bottom: 10px solid #FF6136;
					      border-left: 18px solid #FF6136;
					    }
					    
					    @media only screen and (max-width: 500px) {
					      .button {
					        width: 100% !important;
					        text-align: center !important;
					      }
					    }
					    /* Attribute list ------------------------------ */
					    
					    .attributes {
					      margin: 0 0 21px;
					    }
					    
					    .attributes_content {
					      background-color: #F4F4F7;
					      padding: 16px;
					    }
					    
					    .attributes_item {
					      padding: 0;
					    }
					    /* Related Items ------------------------------ */
					    
					    .related {
					      width: 100%;
					      margin: 0;
					      padding: 25px 0 0 0;
					      -premailer-width: 100%;
					      -premailer-cellpadding: 0;
					      -premailer-cellspacing: 0;
					    }
					    
					    .related_item {
					      padding: 10px 0;
					      color: #CBCCCF;
					      font-size: 15px;
					      line-height: 18px;
					    }
					    
					    .related_item-title {
					      display: block;
					      margin: .5em 0 0;
					    }
					    
					    .related_item-thumb {
					      display: block;
					      padding-bottom: 10px;
					    }
					    
					    .related_heading {
					      border-top: 1px solid #CBCCCF;
					      text-align: center;
					      padding: 25px 0 10px;
					    }
					    /* Discount Code ------------------------------ */
					    
					    .discount {
					      width: 100%;
					      margin: 0;
					      padding: 24px;
					      -premailer-width: 100%;
					      -premailer-cellpadding: 0;
					      -premailer-cellspacing: 0;
					      background-color: #F4F4F7;
					      border: 2px dashed #CBCCCF;
					    }
					    
					    .discount_heading {
					      text-align: center;
					    }
					    
					    .discount_body {
					      text-align: center;
					      font-size: 15px;
					    }
					    /* Social Icons ------------------------------ */
					    
					    .social {
					      width: auto;
					    }
					    
					    .social td {
					      padding: 0;
					      width: auto;
					    }
					    
					    .social_icon {
					      height: 20px;
					      margin: 0 8px 10px 8px;
					      padding: 0;
					    }
					    /* Data table ------------------------------ */
					    
					    .purchase {
					      width: 100%;
					      margin: 0;
					      padding: 35px 0;
					      -premailer-width: 100%;
					      -premailer-cellpadding: 0;
					      -premailer-cellspacing: 0;
					    }
					    
					    .purchase_content {
					      width: 100%;
					      margin: 0;
					      padding: 25px 0 0 0;
					      -premailer-width: 100%;
					      -premailer-cellpadding: 0;
					      -premailer-cellspacing: 0;
					    }
					    
					    .purchase_item {
					      padding: 10px 0;
					      color: #51545E;
					      font-size: 15px;
					      line-height: 18px;
					    }
					    
					    .purchase_heading {
					      padding-bottom: 8px;
					      border-bottom: 1px solid #EAEAEC;
					    }
					    
					    .purchase_heading p {
					      margin: 0;
					      color: #85878E;
					      font-size: 12px;
					    }
					    
					    .purchase_footer {
					      padding-top: 15px;
					      border-top: 1px solid #EAEAEC;
					    }
					    
					    .purchase_total {
					      margin: 0;
					      text-align: right;
					      font-weight: bold;
					      color: #333333;
					    }
					    
					    .purchase_total--label {
					      padding: 0 15px 0 0;
					    }
					    
					    body {
					      background-color: #F2F4F6;
					      color: #51545E;
					    }
					    
					    p {
					      color: #51545E;
					    }
					    
					    .email-wrapper {
					      width: 100%;
					      margin: 0;
					      padding: 0;
					      -premailer-width: 100%;
					      -premailer-cellpadding: 0;
					      -premailer-cellspacing: 0;
					      background-color: #F2F4F6;
					    }
					    
					    .email-content {
					      width: 100%;
					      margin: 0;
					      padding: 0;
					      -premailer-width: 100%;
					      -premailer-cellpadding: 0;
					      -premailer-cellspacing: 0;
					    }
					    /* Masthead ----------------------- */
					    
					    .email-masthead {
					      padding: 25px 0;
					      text-align: center;
					    }
					    
					    .email-masthead_logo {
					      width: 94px;
					    }
					    
					    .email-masthead_name {
					      font-size: 16px;
					      font-weight: bold;
					      color: #A8AAAF;
					      text-decoration: none;
					      text-shadow: 0 1px 0 white;
					    }
					    /* Body ------------------------------ */
					    
					    .email-body {
					      width: 100%;
					      margin: 0;
					      padding: 0;
					      -premailer-width: 100%;
					      -premailer-cellpadding: 0;
					      -premailer-cellspacing: 0;
					    }
					    
					    .email-body_inner {
					      width: 570px;
					      margin: 0 auto;
					      padding: 0;
					      -premailer-width: 570px;
					      -premailer-cellpadding: 0;
					      -premailer-cellspacing: 0;
					      background-color: #FFFFFF;
					    }
					    
					    .email-footer {
					      width: 570px;
					      margin: 0 auto;
					      padding: 0;
					      -premailer-width: 570px;
					      -premailer-cellpadding: 0;
					      -premailer-cellspacing: 0;
					      text-align: center;
					    }
					    
					    .email-footer p {
					      color: #A8AAAF;
					    }
					    
					    .body-action {
					      width: 100%;
					      margin: 30px auto;
					      padding: 0;
					      -premailer-width: 100%;
					      -premailer-cellpadding: 0;
					      -premailer-cellspacing: 0;
					      text-align: center;
					    }
					    
					    .body-sub {
					      margin-top: 25px;
					      padding-top: 25px;
					      border-top: 1px solid #EAEAEC;
					    }
					    
					    .content-cell {
					      padding: 45px;
					    }
					    /*Media Queries ------------------------------ */
					    
					    @media only screen and (max-width: 600px) {
					      .email-body_inner,
					      .email-footer {
					        width: 100% !important;
					      }
					    }
					    
					    @media (prefers-color-scheme: dark) {
					      body,
					      .email-body,
					      .email-body_inner,
					      .email-content,
					      .email-wrapper,
					      .email-masthead,
					      .email-footer {
					        background-color: #333333 !important;
					        color: #FFF !important;
					      }
					      p,
					      ul,
					      ol,
					      blockquote,
					      h1,
					      h2,
					      h3 {
					        color: #FFF !important;
					      }
					      .attributes_content,
					      .discount {
					        background-color: #222 !important;
					      }
					      .email-masthead_name {
					        text-shadow: none !important;
					      }
					    }
					    </style>
					    <!--[if mso]>
					    <style type="text/css">
					      .f-fallback  {
					        font-family: Arial, sans-serif;
					      }
					    </style>
				  	<![endif]-->
				  </head>
				  <body>
				    <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
				      <tr>
				        <td align="center">
				          <table class="email-content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
				            <tr>
				              <td class="email-masthead" style="text-align: center;">
				                <h1 style="text-align: center;">
				                '.$system_title.'
				              	</h1>
				              </td>
				            </tr>
				            <!-- Email Body -->
				            <tr>
				              <td class="email-body" width="570" cellpadding="0" cellspacing="0">
				                <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
				                  <!-- Body content -->
				                  <tr>
				                    <td class="content-cell">
				                      <div class="f-fallback">
				                        <h1>Hello, '.$receiver_name.'</h1>
				                        '.$message_body.'
				                        <p>Thanks,
				                          <br><a href="'.site_url().'">'.$system_title.'</a></p>
				                      </div>
				                    </td>
				                  </tr>
				                </table>
				              </td>
				            </tr>
				            <tr>
				              <td>
				                <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
				                  <tr>
				                    <td class="content-cell" align="center">
				                      <p class="f-fallback sub align-center">&copy; '.$system_title.'. All rights reserved.</p>
				                      <p class="f-fallback sub align-center">
				                        '.get_settings("address").'
				                      </p>
				                    </td>
				                  </tr>
				                </table>
				              </td>
				            </tr>
				          </table>
				        </td>
				      </tr>
				    </table>
				  </body>
				</html>';
	}
}
