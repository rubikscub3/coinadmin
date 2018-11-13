<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tax extends CI_Controller {

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
		$this->load->library("phpmailer_library");
        $objMail = $this->phpmailer_library->load();
		
		$user_id = $this->session->userdata('userid');
		
		if($this->input->post()){
			$this->load->library('form_validation');
            $this->form_validation->set_rules('beneficiary','Beneficiary','required');
            $this->form_validation->set_rules('slab','Tax Period','required');
            $this->form_validation->set_rules('amount','Amount','required');
			
			if($this->form_validation->run()) {

				$registration_no = $this->input->post('beneficiary');

				$where = array('registration_no' => $registration_no , 'ben_status' => '1');
		        $ben_info = $this->common_model->get_single_row('beneficiary' , '*' , $where);
		        if(!(count($ben_info) > 0)){
		            $this->session->set_flashdata("failure", "Registration NO. $registration_no is not added in your beneficiary list");
		            redirect("Beneficiary");
		        }

			
				$where = "user_id = '".$user_id."' AND user_status = 1";
				$sql = "SELECT * FROM users WHERE $where";
				$user_info = $this->common_model->get_single_row_by_query($sql);
				
				$service = "GENERATE_OTPN";
                $token = check_token();
				
				$slab = $this->input->post('slab');
				$amount = $this->input->post('amount');
				$email = $user_info['email'];
				$mobile = $user_info['mobile'];
				$name = $user_info['username'];
				
				if($token){
					$body = "<osb:".$service."_REQ>
                                <osb:_REGISTRATION_NO_>".$registration_no."</osb:_REGISTRATION_NO_>
                                <osb:_SLAB_ID_>".$slab."</osb:_SLAB_ID_>
                                <osb:_TOTAL_AMOUNT_>".$amount."</osb:_TOTAL_AMOUNT_>
                                <osb:_USER_ID_>".$user_id."</osb:_USER_ID_>
                                <osb:_EMAIL_>".$email."</osb:_EMAIL_>
                                <osb:_MOBILE_>".$mobile."</osb:_MOBILE_>
                             </osb:".$service."_REQ>";

                    // REQUEST TO GET VEHICLE DETAILS
					
                    $response = soap_request($service,$body);
                    $soap_status = $response->GENERATE_OTPN_OUT->MESSAGE_HEADER->_MESSAGE_STATUS_;
					
					// echo "<pre>"; print_r($response); exit; 
					
					if($soap_status == "SUCCESS"){
						$otpn = $response->GENERATE_OTPN_OUT->GENERATE_OTPN_RES->_OTPN_;
						
						$data = array(
							'otpn'       	    => $otpn,
							'registration_no'   => $this->input->post('beneficiary'),
							'slab'      	    => $this->input->post('slab'),
							'tax_amount'  	    => $this->input->post('amount'),
							'otpn_created_date' => date("Y-m-d H:i:s"),
							'user_id'     	    => $user_id,
						);
						$otpn_id = $this->common_model->insert('otpn', $data);
						
						// SEND SMS
                        $raw_msg = $this->config->item('otpn_sms');
                        $msg1 = str_replace('{NAME}', $name, $raw_msg);
                        $message = str_replace('{OTP}', $otpn, $msg1);
                        sendsms($mobile, $message);
						
						if($otpn_id){
							$this->session->set_flashdata('success', 'OTPN has been generated successfully!');
						} else{
							$this->session->set_flashdata('failure', 'Error generating OTPN, please try again!');
						}
						
						redirect("Dashboard");
					}
				}
				
			}
			
		}
		
		$where = array('user_id' => $user_id , 'ben_status' => '1');
		$ben_info = $this->common_model->get_all_rows('beneficiary' , '*' , $where);
		
		$this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';
		$this->data['ben_info'] = $ben_info;
		
		$this->load->view('dashboard/includes/header',$this->data);
		$this->load->view('dashboard/tax_payment',$this->data);
		$this->load->view('dashboard/includes/footer',$this->data);
	}
	
	public function get_slab(){
				$registration_no = $this->input->post('registration_no');

				$where = array('registration_no' => $registration_no , 'ben_status' => '1');
		        $ben_info = $this->common_model->get_single_row('beneficiary' , '*' , $where);
		        if(!(count($ben_info) > 0)){
		        	$res_info_array = array("registration_failure" => "registration_failure");
		            echo json_encode($res_info_array);die();
		        }

                $service = "GET_VEHICLE_INQUIRY";
                $token = check_token();
				
				if($token){
					$body = "<osb:".$service."_REQ>
                                <osb:_REGISTRATION_NO_>".$registration_no."</osb:_REGISTRATION_NO_>
                             </osb:".$service."_REQ>";

                    // REQUEST TO GET VEHICLE DETAILS
                    $response = soap_request($service,$body);
                    $soap_status = $response->GET_VEHICLE_INQUIRY_OUT->MESSAGE_HEADER->_MESSAGE_STATUS_;
					// echo "<pre>"; print_r($response); exit; 
					
					if($soap_status == "SUCCESS"){
						$res_info = $response->GET_VEHICLE_INQUIRY_OUT->GET_VEHICLE_INQUIRY_RES;
						$res_info_array = (array) $res_info;
						echo json_encode($res_info_array['_LIST_OF_SLABS_']);
					}
					else{
						echo false;
					}
				}
	}
	
	public function get_tax_inquiry(){
				$slab = $this->input->post('slab');
				$registration_no = $this->input->post('registration_no');

				$where = array('registration_no' => $registration_no , 'ben_status' => '1');
		        $ben_info = $this->common_model->get_single_row('beneficiary' , '*' , $where);
		        if(!(count($ben_info) > 0)){
		        	$res_info_array = array("registration_failure" => "registration_failure");
		            echo json_encode($res_info_array);die();
		        }

                $service = "GET_TAX_INQUIRY";
                $token = check_token();
				
				if($token){
					$body = "<osb:".$service."_REQ>
                                <osb:_REGISTRATION_NO_>".$registration_no."</osb:_REGISTRATION_NO_>
                                <osb:_SLAB_ID_>".$slab."</osb:_SLAB_ID_>
                             </osb:".$service."_REQ>";

                    // REQUEST TO GET VEHICLE DETAILS
                    $response = soap_request($service,$body);
                    $soap_status = $response->GET_TAX_INQUIRY_OUT->MESSAGE_HEADER->_MESSAGE_STATUS_;
					// echo "<pre>"; print_r($response); exit; 
					
					if($soap_status == "SUCCESS"){
						$res_info = $response->GET_TAX_INQUIRY_OUT->GET_TAX_INQUIRY_RES;
						$res_info_array = (array) $res_info;
						echo json_encode($res_info_array);
					}
					else{
						echo false;
					}
				}
	}

}
