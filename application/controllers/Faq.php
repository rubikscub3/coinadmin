<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->data = null;

        if (($this->session->userdata('logged_in') != 1) && empty($this->session->userdata('username')) || empty($this->session->userdata('userid')) || empty($this->session->userdata('usermobile')) || empty($this->session->userdata('useremail'))){

        	$this->session->set_flashdata('failure', 'Please login to access FAQ Page');
        	redirect('/');
        }
    }

	public function index(){
		$this->data['title'] = 'Excise, Taxation and Narcotics  - Government of Sindh';

		$this->load->view('dashboard/includes/header',$this->data);
		$this->load->view('dashboard/faq',$this->data);
		$this->load->view('dashboard/includes/footer',$this->data);
	}
}
