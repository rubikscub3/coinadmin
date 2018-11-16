<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		$this->data['title'] = 'CoinXchange';

		/*GET BENEFICIARY LIST OF THE LOGGED IN USER*/
		// $user_id = $this->session->userdata('userid');
		// $where = array('user_id' => $user_id , 'ben_status' => '1');
		// $order_by = array('ben_id'=> 'DESC');
        // $ben_info = $this->common_model->get_all_rows('beneficiary' , '*' , $where, array(), $order_by);
		// $this->data['ben_info'] = $ben_info;

		$this->load->view('dashboard/includes/header',$this->data);
		$this->load->view('dashboard/users_list',$this->data);
		$this->load->view('dashboard/includes/footer',$this->data);
	}
	
	public function accepted_users(){
		$this->data['title'] = 'CoinXchange';

		/*GET BENEFICIARY LIST OF THE LOGGED IN USER*/
		// $user_id = $this->session->userdata('userid');
		// $where = array('user_id' => $user_id , 'ben_status' => '1');
		// $order_by = array('ben_id'=> 'DESC');
        // $ben_info = $this->common_model->get_all_rows('beneficiary' , '*' , $where, array(), $order_by);
		// $this->data['ben_info'] = $ben_info;

		$this->load->view('dashboard/includes/header',$this->data);
		$this->load->view('dashboard/accepted_users',$this->data);
		$this->load->view('dashboard/includes/footer',$this->data);
	}
	
	public function rejected_users(){
		$this->data['title'] = 'CoinXchange';

		/*GET BENEFICIARY LIST OF THE LOGGED IN USER*/
		// $user_id = $this->session->userdata('userid');
		// $where = array('user_id' => $user_id , 'ben_status' => '1');
		// $order_by = array('ben_id'=> 'DESC');
        // $ben_info = $this->common_model->get_all_rows('beneficiary' , '*' , $where, array(), $order_by);
		// $this->data['ben_info'] = $ben_info;

		$this->load->view('dashboard/includes/header',$this->data);
		$this->load->view('dashboard/rejected_users',$this->data);
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
