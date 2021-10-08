<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

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
        $this->load->model('Reports_model');
        $employeeAgeGroupList=$this->Reports_model->employeeAgeGroupList($this->input->get('id'));
        $monthlysalary=$this->Reports_model->monthlysalary();
        $monthlydeduct=$this->Reports_model->monthlydeduct();
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('reports',array('employeeAgeGroupList' => $employeeAgeGroupList,'monthlysalary' => $monthlysalary,'monthlydeduct' => $monthlydeduct, ));
        $this->load->view('components/footer');
    }

}
        
