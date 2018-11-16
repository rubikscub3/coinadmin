<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->data = null;

        $this->load->model('common_model');
    }

	public function index(){

        if (($this->session->userdata('logged_in') == 1) && !empty($this->session->userdata('username')) || !empty($this->session->userdata('userid')) || !empty($this->session->userdata('usermobile')) || !empty($this->session->userdata('useremail'))){

            redirect('Dashboard');
        }

        if($this->input->post()){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('captcha','Captcha','required');

            $inputCaptcha = trim($this->input->post('captcha'));
            $sessCaptcha = trim($this->input->post('sessCaptcha'));

            $email = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));
            
            if(!($inputCaptcha === $sessCaptcha)){
                $this->form_validation->run();
                $this->session->set_flashdata('failure', 'Captcha Code does not match');
            } else{
                if($this->form_validation->run()) {
                    $where = "UserName = '".$email."' AND Pwd = '".$password."' AND isAdmin = '1' ";
                    $sql = "SELECT * FROM tbl_login WHERE $where";
                    
                    $user_data = $this->common_model->get_single_row_by_query($sql);
                    if(count($user_data) > 0){
                        $usersession = array(
                                'username'      => $user_data['UserName'],
                                'userid'        => $user_data['User_ID'],
                                'logged_in'     => TRUE,
                        );

                        $this->session->set_userdata($usersession);
                        redirect("Dashboard");
                    } else{
                        $this->session->set_flashdata('failure', 'Invalid Email or Password!');
                        redirect("Home");
                    }
                }
            }
        }

		$this->data['title'] = 'CoinXchange';

		/*CAPTCHA*/
		// Load the captcha helper
        $this->load->helper('captcha');

		$path = 'upload/captcha_images/';
        if(!is_dir($path)){
            mkdir($path,0777);
        }
        // Captcha configuration
        $config = array(
            'img_path'      => $path,
            'img_url'       => base_url().$path,
            'font_path'     => 'system/fonts/texb.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 4,
            'font_size'     => 22,
            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(240, 120, 180)
            )
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        
        // Pass captcha image to view
        $this->data['captchaImg'] = $captcha['image'];

		$this->load->view('front/includes/header',$this->data);
		$this->load->view('front/login',$this->data);
		$this->load->view('front/includes/footer',$this->data);
	}

	public function refresh(){

        // Load the captcha helper
        $this->load->helper('captcha');
        
        $path = 'upload/captcha_images/';
        if(!is_dir($path)){
            mkdir($path,0777);
        }
        // Captcha configuration
        $config = array(
            'img_path'      => $path,
            'img_url'       => base_url().$path,
            'font_path'     => 'system/fonts/texb.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 4,
            'font_size'     => 22,
            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(240, 120, 180)
            )
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        
        // Display captcha image
        echo $captcha['image'] . "~".$captcha['word'];
    }

    public function register(){

        if($this->input->post()){

            $this->load->library('form_validation');

            $this->form_validation->set_rules('username','Username','required');
            $this->form_validation->set_rules('cnic','Cnic','required');
            $this->form_validation->set_rules('mobile','Mobile','required');
            $this->form_validation->set_rules('city','City','required');
            $this->form_validation->set_rules('address','Address','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
            $this->form_validation->set_rules('captcha', 'Captcha', 'required');
            $this->form_validation->set_rules('terms','Terms of Service','required');
            
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->input->post('sessCaptcha');
            if(!($inputCaptcha === $sessCaptcha)){
                $this->form_validation->run();
                $this->session->set_flashdata('failure', 'Captcha Code does not match');
            } else{
                if($this->form_validation->run()) {

                    $email = trim($this->input->post('email'));
                    $cnic = trim($this->input->post('cnic'));

                    $where = "email = '".$email."' OR cnic = '".$cnic."' ";

                    $sql = "SELECT * FROM users WHERE $where";
                    $user_data = $this->common_model->get_single_row_by_query($sql);
                    if($user_data && $user_data['user_id'] > 0){
                        $this->session->set_flashdata('failure', 'Email ID or CNIC already exists');
                        redirect('home/register');
                    }

                    $data = array(
                                  'username'    => trim(ucwords($this->input->post('username'))),
                                  'cnic'        => trim($this->input->post('cnic')),
                                  'ntn'         => trim($this->input->post('ntn')),
                                  'phone'       => trim($this->input->post('phone')),
                                  'mobile'      => trim($this->input->post('mobile')),
                                  'city'        => trim($this->input->post('city')),
                                  'address'     => trim($this->input->post('address')),
                                  'email'       => trim($this->input->post('email')),
                                  'reg_entity'  => trim($this->input->post('entity')),
                                  'password'    => trim(md5($this->input->post('password'))),
                                  'accept_terms'=> ($this->input->post('terms'))?1:0,
                                  'user_status' => 0,
                                  'user_created_date' => date('Y-m-d'),
                                  'user_updated_date' => date('Y-m-d')
                            );

                    $user_id = $this->common_model->insert('users', $data);

					$get_token_expire_time = $this->config->item('token_expire_time');
					
                    $mobileToken = rand(1000,9999);
                    $tokenTime = strtotime("now");
                    $tokenExpireTime = strtotime("+".$get_token_expire_time." minutes", $tokenTime);

                    $email = trim($this->input->post('email'));
                    $name = trim(ucwords($this->input->post('username')));
                    $mobile = trim($this->input->post('mobile'));

                    $data = array(
                                  'user_id'     => $user_id,
                                  'token'       => $mobileToken,
                                  'mobile'      => $mobile,
                                  'email'       => $email,
                                  'token_type'  => 'register',
                                  'token_time'  => $tokenTime,
                                  'token_expiry_time' => $tokenExpireTime,
                                  'token_status'=> 0
                            );
                    $token_id = $this->common_model->insert('user_tokens', $data);
                    
                    $raw_msg = $this->config->item('register_sms');

                    $msg1 = str_replace('{NAME}', $name, $raw_msg);
                    $message = str_replace('{OTP}', $mobileToken, $msg1);
                    sendsms($mobile, $message);

                    $this->session->set_flashdata('success', 'Your Registration is successful!');
                    $this->session->set_flashdata('email', $email);
                    $this->session->set_flashdata('mobile', $mobile);
                    redirect('home/verify_token');
                }
            }

            
        }

        $this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';

        /*CAPTCHA*/
        // Load the captcha helper
        $this->load->helper('captcha');

        $path = 'upload/captcha_images/';
        if(!is_dir($path)){
            mkdir($path,0777);
        }
        // Captcha configuration
        $config = array(
            'img_path'      => $path,
            'img_url'       => base_url().$path,
            'font_path'     => 'system/fonts/texb.ttf',
            'img_width'     => '160',
            'img_height'    => 50,
            'word_length'   => 4,
            'font_size'     => 22,
            // White background and border, black text and red grid
            'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(240, 120, 180)
            )
        );
        $captcha = create_captcha($config);
        
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        
        // Pass captcha image to view
        $this->data['captchaImg'] = $captcha['image'];

        $this->load->view('front/includes/header',$this->data);
        $this->load->view('front/register',$this->data);
        $this->load->view('front/includes/footer',$this->data);
    }

    public function verify_token(){

        if($this->input->post()){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('token','Token','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('mobile','Mobile','required');
            $this->form_validation->set_rules('token_type','Token Type','required');

            if($this->form_validation->run()) {
                $email = trim($this->input->post('email'));
                $mobile = trim($this->input->post('mobile'));
                $token_type = trim($this->input->post('token_type'));
                $token = trim($this->input->post('token'));

                $where = "token = '".$token."' AND mobile = '".$mobile."' AND email = '".$email."' AND token_type = '".$token_type."' ";

                $sql = "SELECT token_id, user_id, token, mobile, email, token_time, token_expiry_time FROM user_tokens WHERE $where ORDER BY token_id DESC LIMIT 1";
                
                $token_data = $this->common_model->get_single_row_by_query($sql);
                if($token_data){
                    $token_id = $token_data['token_id'];
                    $token_update_time = strtotime('now');
                    $data = array('token_status' => 1, 'token_update_time' => $token_update_time);
                    $where = array('token_id' => $token_id);

                    $this->common_model->update('user_tokens', $data, $where);

                    $data = array('user_status' => 1);
                    $where = "user_id = '".$token_data['user_id']."' ";
                    $this->common_model->update('users', $data, $where);

                    $sql = "SELECT user_id, username, email, mobile FROM users WHERE $where";
                    $user_data = $this->common_model->get_single_row_by_query($sql);

                    $usersession = array(
                            'username'      => $user_data['username'],
                            'userid'        => $user_data['user_id'],
                            'usermobile'    => $user_data['mobile'],
                            'useremail'     => $user_data['email'],
                            'logged_in'     => TRUE,
                    );

                    $this->session->set_userdata($usersession);
                    redirect("Dashboard");
                }
            }
        }

        $this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';

        $this->load->view('front/includes/header',$this->data);
        $this->load->view('front/verify_token',$this->data);
        $this->load->view('front/includes/footer',$this->data);
    }
	
	public function forgot(){
		if($this->input->post()){
		
			$this->load->library('form_validation');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('mobile_no','Mobile No','required');
			
			if($this->form_validation->run()) {
				
				$email = $this->input->post('email');
				$mobile = $this->input->post('mobile_no');
				
				$where = "mobile = '".$mobile."' AND email = '".$email."' AND user_status = 1";
				$sql = "SELECT * FROM users WHERE $where";
				
                $user_info = $this->common_model->get_single_row_by_query($sql);
				
				if($user_info){
					$mobileToken = rand(1000,9999);
                    $tokenTime = strtotime("now");
                    $tokenExpireTime = strtotime("+10 minutes", $tokenTime);

                    $name = $user_info['username'];
                    $user_id = $user_info['user_id'];
                    
                    $data = array(
                                  'user_id'     => $user_id,
                                  'token'       => $mobileToken,
                                  'mobile'      => $mobile,
                                  'email'       => $email,
                                  'token_type'  => 'forgot',
                                  'token_time'  => $tokenTime,
                                  'token_expiry_time' => $tokenExpireTime,
                                  'token_status'=> 0
                            );
                    $token_id = $this->common_model->insert('user_tokens', $data);
                    
                    $raw_msg = $this->config->item('forgot_sms');

                    $msg1 = str_replace('{NAME}', $name, $raw_msg);
                    $message = str_replace('{OTP}', $mobileToken, $msg1);
                    sendsms($mobile, $message);
					
					$this->session->set_flashdata('success', 'OTP send to your mobile number, Please check and enter');
                    $this->session->set_flashdata('email', $email);
                    $this->session->set_flashdata('mobile', $mobile);
                    redirect('home/verify_token_forgot');
				}
				else{
					$this->session->set_flashdata('failure', 'Please enter correct email and mobile number');
				}
				
			}
			
			
		}
		
		$this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';
		
		$this->load->view('front/includes/header',$this->data);
        $this->load->view('front/forgot',$this->data);
        $this->load->view('front/includes/footer',$this->data);
	}
	
	public function verify_token_forgot(){

        if($this->input->post()){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('token','Token','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('mobile','Mobile','required');
            $this->form_validation->set_rules('token_type','Token Type','required');

            if($this->form_validation->run()) {
                $email = trim($this->input->post('email'));
                $mobile = trim($this->input->post('mobile'));
                $token_type = trim($this->input->post('token_type'));
                $token = trim($this->input->post('token'));

                $where = "token = '".$token."' AND mobile = '".$mobile."' AND email = '".$email."' AND token_type = '".$token_type."' ";

                $sql = "SELECT token_id, user_id, token, mobile, email, token_time, token_expiry_time FROM user_tokens WHERE $where ORDER BY token_id DESC LIMIT 1";
                
				$token_data = $this->common_model->get_single_row_by_query($sql);
                if($token_data){
                    $token_id = $token_data['token_id'];
                    $token_update_time = strtotime('now');
                    $data = array('token_status' => 1, 'token_update_time' => $token_update_time);
                    $where = array('token_id' => $token_id);

                    $this->common_model->update('user_tokens', $data, $where);
				
					$this->session->set_flashdata('email', $email);
                    $this->session->set_flashdata('mobile', $mobile);
                    redirect('home/reset_password');
                }
				else{
					$this->session->set_flashdata('email', $email);
                    $this->session->set_flashdata('mobile', $mobile);
					$this->session->set_flashdata('failure', 'OTP verification failed');
				}
            }
        }

        $this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';

        $this->load->view('front/includes/header',$this->data);
        $this->load->view('front/verify_token_forgot',$this->data);
        $this->load->view('front/includes/footer',$this->data);
    }
	
	public function reset_password(){
		
		if($this->input->post())
		{
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('password','Password','required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            $pass = $this->input->post('password');
            $confirm = $this->input->post('confirm_password');
			
            if(!($pass === $confirm)){
                $this->form_validation->run();
                $this->session->set_flashdata('email', $this->input->post('email'));
                $this->session->set_flashdata('mobile', $this->input->post('mobile'));
            } else{
    			if($this->form_validation->run()) {
    				$password = md5($this->input->post('password'));
    				$email = $this->input->post('email');
    				$mobile = $this->input->post('mobile');
    				
    				$data = array('password' => $password);
                    $where = array('mobile' => $mobile , 'email' => $email);
    				$this->common_model->update('users', $data, $where);
    				
    				$this->session->set_flashdata('success', 'Password Updated Successfully.');
    				redirect('home/');
    			}
            }
			
			
		}
		
		$this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';

        $this->load->view('front/includes/header',$this->data);
        $this->load->view('front/reset_password',$this->data);
        $this->load->view('front/includes/footer',$this->data);
	}
	
	public function resend_otp(){
	
		if($this->input->post()){
		
            $this->load->library('form_validation');
			
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('mobile','Mobile','required');

            if($this->form_validation->run()) {
		
				$mobile = $this->input->post('mobile');
				$email = $this->input->post('email');
				$tokenType = $this->input->post('tokenType');
				
				$where_user = "mobile = '".$mobile."' AND email = '".$email."'";
				$sql_user = "SELECT * FROM users WHERE $where_user";
				
				$user_info = $this->common_model->get_single_row_by_query($sql_user);

				// START: generate new token
				$get_token_expire_time = $this->config->item('token_expire_time');
				
				$mobileToken = rand(1000,9999);
				$tokenTime = strtotime("now");
				$tokenExpireTime = strtotime("+".$get_token_expire_time." minutes", $tokenTime);

				$data = array(
							  'user_id'     => $user_info['user_id'],
							  'token'       => $mobileToken,
							  'mobile'      => $mobile,
							  'email'       => $email,
							  'token_type'  => 'register',
							  'token_time'  => $tokenTime,
							  'token_expiry_time' => $tokenExpireTime,
							  'token_status'=> 0
						);
						
				$token_id = $this->common_model->insert('user_tokens', $data);
				// END: generate new token
				
				$name = $user_info['username'];
				
				//if($token_info){
				if($token_id){
					$raw_msg = $this->config->item('register_sms');

					$msg1 = str_replace('{NAME}', $name, $raw_msg);
					$message = str_replace('{OTP}', $mobileToken, $msg1);
					$sms_response = sendsms($mobile, $message);
					
					$arr = array('sms_response' => $sms_response, 'message' => 'OTP has been resent to your mobile number', 'error' => 0);
					echo json_encode($arr);
				}else{
					$arr = array('message' => 'Failed', 'error' => 1);
					echo json_encode($arr);
				}
			}
		}
	}
}
