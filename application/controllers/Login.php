<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
         
    }
	 
 

	public function index()
	{
		$login=$this->login_model->login($this->input->post('username'),$this->input->post('password'));
		if ($login) {
	    	$this->session->set_userdata('id', $login->id);
        	$this->session->set_userdata('username', $login->name);
        	$this->load->helper(['jwt', 'authorization']);
			$token = AUTHORIZATION::generateToken($login);
			$this->session->set_userdata('auth_token', $token);
			redirect('dashboard');
		} else {
			 $this->session->set_flashdata('login','The username and password doesnt match'); 
			redirect('');
		}
		
	}
	
	public function logout(){
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('auth_token');
        $this->session->sess_destroy();
        redirect();
	}

	
}
