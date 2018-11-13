<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->data = null;

        if (($this->session->userdata('logged_in') != 1) && empty($this->session->userdata('username'))){

        	$this->session->set_flashdata('failure', 'Please login to access dashboard');
        	die('aa');
			redirect('/');
        }
        $this->load->model('common_model');
        $this->load->helper('token');
    }

	public function index(){
		$this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';

		/*GET BENEFICIARY LIST OF THE LOGGED IN USER*/
		$user_id = $this->session->userdata('userid');
		$where = array('user_id' => $user_id , 'ben_status' => '1');
		$order_by = array('ben_id'=> 'DESC');
        $ben_info = $this->common_model->get_all_rows('beneficiary' , '*' , $where, array(), $order_by);
		$this->data['ben_info'] = $ben_info;

		$this->load->view('dashboard/includes/header',$this->data);
		$this->load->view('dashboard/dashboard',$this->data);
		$this->load->view('dashboard/includes/footer',$this->data);
	}
	
	public function profile(){
		
		$user_id = $this->session->userdata('userid');
		
		if($this->input->post()){
			
			$this->load->library('form_validation');
            $this->form_validation->set_rules('username','User Name','required');
            $this->form_validation->set_rules('cnic','CNIC','required');
            $this->form_validation->set_rules('mobile','Mobile','required');
            $this->form_validation->set_rules('email','Email','required');
            $this->form_validation->set_rules('address','Address','required');
            $this->form_validation->set_rules('entity','Entity','required');
			
			if($this->form_validation->run()) {
				$data = array(
					'username' => $this->input->post('username'),
					'cnic' => $this->input->post('cnic'),
					'email' => $this->input->post('email'),
					'mobile' => $this->input->post('mobile'),
					'address' => $this->input->post('address'),
					'ntn' => $this->input->post('ntn'),
					'phone' => $this->input->post('phone'),
					'reg_entity' => $this->input->post('entity'),
				);
				
				$where = array('user_id' => $user_id);
				$this->common_model->update('users', $data, $where);
				
				$this->session->set_flashdata('success', 'Profile Updated Successfully.');
				redirect('Dashboard/');
			}
			
		}
		
		$where = "user_id = '".$user_id."' AND user_status = 1";
		$sql = "SELECT * FROM users WHERE $where";
		$user_info = $this->common_model->get_single_row_by_query($sql);
		$this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';
		$this->data['user_info'] = $user_info;
		
		$this->load->view('dashboard/includes/header',$this->data);
		$this->load->view('dashboard/profile',$this->data);
		$this->load->view('dashboard/includes/footer',$this->data);
	}
	
	public function view_profile(){
		
		$user_id = $this->session->userdata('userid');
		
		$where = "user_id = '".$user_id."' AND user_status = 1";
		$sql = "SELECT * FROM users WHERE $where";
		$user_info = $this->common_model->get_single_row_by_query($sql);
		$this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';
		$this->data['user_info'] = $user_info;
		
		$this->load->view('dashboard/includes/header',$this->data);
		$this->load->view('dashboard/view_profile',$this->data);
		$this->load->view('dashboard/includes/footer',$this->data);
	}

    public function logout(){
        $this->session->unset_userdata('userid');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('usermobile');
        $this->session->unset_userdata('logged_in');
        $this->session->sess_destroy();
        
        $this->session->set_flashdata('success', 'You have been logged out successfully');
        redirect('/');
    }
}
