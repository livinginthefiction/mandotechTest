<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){

        // Construct the parent class
        parent::__construct();

        $id = $this->session->userdata('id');
        $this->load->helper(['jwt', 'authorization']);
        $auth_token = $this->session->userdata('auth_token');
        $dec=AUTHORIZATION::validateToken($auth_token);
        if(empty($dec)  || ($dec->id !=$id)) {redirect();}
    }

    public function index()
    {
        $this->load->model('Employee_model');
        $employeeList=$this->Employee_model->employeeList();
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('dashboard', array('employeeList' => $employeeList));
        $this->load->view('components/footer');
    }

    public function toggleStatus()
    {
        $this->load->model('Employee_model');
        $this->Employee_model->toggleStatus($this->input->get('id'));
        redirect('dashboard');
    }

    public function generateSalary()
    {
        $this->load->model('Employee_model');
        $this->Employee_model->generateSalary($this->input->post('date'));
        redirect('dashboard');
    }

}
        
