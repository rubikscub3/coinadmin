<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->data = null;

        if (($this->session->userdata('logged_in') != 1) && empty($this->session->userdata('username')) || empty($this->session->userdata('userid')) || empty($this->session->userdata('usermobile')) || empty($this->session->userdata('useremail'))){

        	$this->session->set_flashdata('failure', 'Please login to access dashboard');
        	redirect('/');
        }
        $this->load->model('common_model');
        $this->load->helper('token');
    }

	public function index(){
		$this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';

		$registration_no = $this->input->post('registration_no');
        $service = "GET_TAX_HISTORY";
        $token = check_token();
        $user_id = $this->session->userdata('userid'); // session user id
        $email = $this->session->userdata('useremail'); // session email
        

		$body = "<osb:".$service."_REQ>
					<osb:_USER_ID_>".$user_id."</osb:_USER_ID_>
					<osb:_EMAIL_>".$email."</osb:_EMAIL_>
				</osb:".$service."_REQ>";

		// REQUEST TO GET VEHICLE DETAILS
		$response = soap_request($service,$body);
		//echo "<pre>"; print_r($response); exit;
		$soap_status = $response->GET_TAX_HISTORY_OUT->MESSAGE_HEADER->_MESSAGE_STATUS_;

		if($soap_status == "SUCCESS"){
			$history_details = $response->GET_TAX_HISTORY_OUT->GET_TAX_HISTORY_RES;
			$history_details = (array) $history_details;
			if(isset($history_details['_LIST_OF_TAX_HISTORY_']) && count($history_details['_LIST_OF_TAX_HISTORY_']) > 0){
				$this->data['history'] = $history_details['_LIST_OF_TAX_HISTORY_'];
			} else{
				$this->data['history'] = false;
			}
			
		} else{
			$this->data['history'] = false;
		}

		$this->load->view('dashboard/includes/header',$this->data);
		$this->load->view('dashboard/history',$this->data);
		$this->load->view('dashboard/includes/footer',$this->data);
	}
}
