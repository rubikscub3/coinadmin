<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beneficiary extends CI_Controller {

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
	
        $user_id = $this->session->userdata('userid');
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('registration_no','Vehicle Registration No','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('mobile','Mobile No','required');
            $this->form_validation->set_rules('nick_name','Nick Name','required');

            if($this->form_validation->run()) {
                $registration_no = $this->input->post('registration_no');
                $service = "GET_VEHICLE_INQUIRY";
                $token = check_token();
                $name = trim(ucwords($this->input->post('nick_name')));
                $number = trim($this->input->post('mobile'));
                $email = trim($this->input->post('email'));
                $mobileToken = rand(1000,9999);
                $emailToken = rand(1000,9999);
                $tokenTime = strtotime("now");
                $tokenExpireTime = strtotime("+10 minutes", $tokenTime);
				
				$where = "registration_no = '".$registration_no."' AND user_id = '".$user_id."' AND ben_status = 1 ";

                $sql = "SELECT * FROM beneficiary WHERE $where ";
                
                $ben_data = $this->common_model->get_single_row_by_query($sql);
				if(!$ben_data){
					if($token){
						$body = "<osb:".$service."_REQ>
									<osb:_REGISTRATION_NO_>".$registration_no."</osb:_REGISTRATION_NO_>
								 </osb:".$service."_REQ>";

						// REQUEST TO GET VEHICLE DETAILS
						$response = soap_request($service,$body);
						// echo "<pre>"; print_r($response); exit;
						$soap_status = $response->GET_VEHICLE_INQUIRY_OUT->MESSAGE_HEADER->_MESSAGE_STATUS_;

						if($soap_status == "SUCCESS"){
							$data = array(
									  'user_id'     => $user_id,
									  'token'       => $mobileToken,
									  'email_token' => $emailToken,
									  'mobile'      => $number,
									  'email'       => $email,
									  'token_type'  => 'add_beneficiary',
									  'token_time'  => $tokenTime,
									  'token_expiry_time' => $tokenExpireTime,
									  'token_status'=> 0
								);
							$token_id = $this->common_model->insert('user_tokens', $data);

							// SEND SMS
							$raw_msg = $this->config->item('beneficiary_sms');
							$msg1 = str_replace('{NAME}', $name, $raw_msg);
							$message = str_replace('{OTP}', $mobileToken, $msg1);
							sendsms($number, $message);

							$this->session->set_flashdata('ben_email',$email);
							$this->session->set_flashdata('ben_mobile',$number);
							$this->session->set_flashdata('ben_nick_name',$name);
							$this->session->set_flashdata('registration_no',$registration_no);
							redirect("Beneficiary/verify_token");
						} else{
							$this->session->set_flashdata("failure", "Vehicle Registration No. $registration_no does not exist");
							 redirect("Beneficiary");
						}

					}
				} else {
					$this->session->set_flashdata('failure', 'Beneficiary already added');
					redirect("Beneficiary");
				}
            }
        }
		
        $this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';
		
        $this->load->view('dashboard/includes/header',$this->data);
		$this->load->view('dashboard/beneficiary',$this->data);
		$this->load->view('dashboard/includes/footer',$this->data);
	}

    public function beneficiary_list(){
    
        $user_id = $this->session->userdata('userid');
        $where = array('user_id' => $user_id , 'ben_status' => '1');
        $order_by = array('ben_id'=> 'DESC');
        $ben_info = $this->common_model->get_all_rows('beneficiary' , '*' , $where, array(), $order_by);
        
        $this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';
        $this->data['ben_info'] = $ben_info;

        $this->load->view('dashboard/includes/header',$this->data);
        $this->load->view('dashboard/beneficiary_list',$this->data);
        $this->load->view('dashboard/includes/footer',$this->data);
    }

    public function verify_token(){
        
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('mobile_otp','Mobile OTP','required');
            $this->form_validation->set_rules('email_otp','Email OTP','required');

            if($this->form_validation->run()) {
                $mobile_token = trim($this->input->post('mobile_otp'));
                $email_token = trim($this->input->post('email_otp'));

                $registration_no = trim($this->input->post('registration_no'));
                $name = trim(ucwords($this->input->post('ben_nick_name')));
                $mobile = trim($this->input->post('ben_mobile'));
                $email = trim($this->input->post('ben_email'));
                $user_id = $this->session->userdata('userid');

                $where = "token = '".$mobile_token."' AND email_token = '".$email_token."' AND mobile = '".$mobile."' AND email = '".$email."' AND token_type = 'add_beneficiary' ";

                $sql = "SELECT token_id, user_id, token, mobile, email, token_time, token_expiry_time FROM user_tokens WHERE $where ORDER BY token_id DESC LIMIT 1";
                
                $token_data = $this->common_model->get_single_row_by_query($sql);
                if($token_data){
                    $token_id = $token_data['token_id'];
                    $token_update_time = strtotime('now');
                    $data = array('token_status' => 1, 'token_update_time' => $token_update_time);
                    $where = array('token_id' => $token_id);

                    $this->common_model->update('user_tokens', $data, $where);

                    $date = date("Y-m-d", strtotime("now"));
                    $data = array(
                                  'user_id'         => $user_id,
                                  'registration_no' => $registration_no,
                                  'ben_nick_name'   => $name,
                                  'ben_mobile'      => $mobile,
                                  'ben_email'       => $email,
                                  'ben_created_date'=> $date,
                                  'ben_updated_date'=> $date,
                                  'ben_status'      => 1
                                );
                    $ben_data = $this->common_model->insert('beneficiary', $data);

                    if($ben_data){
                        $this->session->set_flashdata('success', 'Beneficiary has been added successfully!');
                    } else{
                         $this->session->set_flashdata('failure', 'Beneficiary could not added, please try again!');
                    }
                    redirect("Beneficiary/beneficiary_list");
                } else{
                    $this->session->set_flashdata('failure', 'Token does not match!');
                        $this->session->set_flashdata('ben_email',$email);
                        $this->session->set_flashdata('ben_mobile',$mobile);
                        $this->session->set_flashdata('ben_nick_name',$name);
                        $this->session->set_flashdata('registration_no',$registration_no);
                    redirect("Beneficiary/verify_token");
                }
            }
        }
		$this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';

        $this->load->view('dashboard/includes/header',$this->data);
        $this->load->view('dashboard/beneficiary_verify',$this->data);
        $this->load->view('dashboard/includes/footer',$this->data);
    }

    public function vehicle_details($registration_no){

        $where = array('registration_no' => $registration_no , 'ben_status' => '1');
        $ben_info = $this->common_model->get_single_row('beneficiary' , '*' , $where);
        if(!(count($ben_info) > 0)){
            $this->session->set_flashdata("failure", "Registration NO. $registration_no is not added in your beneficiary list");
            redirect("Beneficiary");
        }

        $this->data['registration_no'] = $registration_no;
        $this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';

        $service = "GET_VEHICLE_INQUIRY";
        $token = check_token();
        $name = trim(ucwords($this->input->post('nick_name')));
        $number = trim($this->input->post('mobile'));
        $email = trim($this->input->post('email'));
        $mobileToken = rand(1000,9999);
        $tokenTime = strtotime("now");
        $tokenExpireTime = strtotime("+10 minutes", $tokenTime);

        if($token){
            $body = "<osb:".$service."_REQ>
                        <osb:_REGISTRATION_NO_>".$registration_no."</osb:_REGISTRATION_NO_>
                     </osb:".$service."_REQ>";

            // REQUEST TO GET VEHICLE DETAILS
            $response = soap_request($service,$body);
            if($response){
                $status = $response->GET_VEHICLE_INQUIRY_OUT->MESSAGE_HEADER->_MESSAGE_STATUS_;

                if($status == "SUCCESS"){
                    $vehicle_details = $response->GET_VEHICLE_INQUIRY_OUT->GET_VEHICLE_INQUIRY_RES;
                    $this->data['vehicleData'] = $vehicle_details;
                } else{
                    $this->session->set_flashdata('failure',"Service not responding properly! please try again!");
                    redirect("Beneficiary");
                }
            } else{
                $this->session->set_flashdata('failure',"Registration No. $registration_no does not exist!");
                redirect("Beneficiary");
            }
        }
        //echo "<pre>";
        //print_r($vehicle_details);exit;

        $this->load->view('dashboard/includes/header',$this->data);
        $this->load->view('dashboard/vehicle_details',$this->data);
        $this->load->view('dashboard/includes/footer',$this->data);
    }
	
	public function delete($id){
		
		if($id){
			$date = date("Y-m-d", strtotime("now"));
			$data = array('ben_status' => 0, 'ben_updated_date' => $date);
			$where = array('ben_id' => $id);
			$this->common_model->update('beneficiary', $data, $where);
			$this->session->set_flashdata('success', 'Beneficiary has been deleted successfully!');
			redirect("Beneficiary");
		}
		else{
			$this->session->set_flashdata('failure',"Error in deleting beneficiary. Please Try Again.");
            redirect("Beneficiary");
		}
	}

    public function resendToken(){

        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('mobile','Mobile','required');

            if($this->form_validation->run()) {
                
                $mobile = trim($this->input->post('mobile'));
                $email = trim($this->input->post('email'));
                $name = trim($this->input->post('name'));
                $user_id = $this->session->userdata('userid');

                $where = "user_id = '".$user_id."' AND mobile = '".$mobile."' AND email = '".$email."' AND token_type = 'add_beneficiary' ";

                $sql = "SELECT token_id, user_id, token, mobile, email, token_time, token_expiry_time FROM user_tokens WHERE $where ORDER BY token_id DESC LIMIT 1";
                        
                $token_data = $this->common_model->get_single_row_by_query($sql);
                if($token_data){
                    $data = array('token_status' => 1);
                    $where = array('token_id' => $token_data['token_id']);
                    $this->common_model->update('user_tokens', $data, $where);

                    $mobileToken = rand(1000,9999);
                    $emailToken = rand(1000,9999);
                    $tokenTime = strtotime("now");
					$get_token_expire_time = $this->config->item('token_expire_time');
                    $tokenExpireTime = strtotime("+".$get_token_expire_time." minutes", $tokenTime);

                    $data = array(
                              'user_id'     => $user_id,
                              'token'       => $mobileToken,
                              'email_token' => $emailToken,
                              'mobile'      => $mobile,
                              'email'       => $email,
                              'token_type'  => 'add_beneficiary',
                              'token_time'  => $tokenTime,
                              'token_expiry_time' => $tokenExpireTime,
                              'token_status'=> 0
                    );
                    $token_id = $this->common_model->insert('user_tokens', $data);

                    // SEND SMS
                    $raw_msg = $this->config->item('beneficiary_sms_resent');
                    $msg1 = str_replace('{NAME}', $name, $raw_msg);
                    $message = str_replace('{OTP}', $mobileToken, $msg1);
                    sendsms($mobile, $message);
                    echo "token_resent";
                } else{
                    echo "fail";
                }
            } else{
                echo "fail";
            }
        } else{
            echo "fail";
        }
    }
}
