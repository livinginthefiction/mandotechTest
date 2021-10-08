<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deductions extends CI_Controller {

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
        $this->load->model('Deduction_model');
        $deductionsList=$this->Deduction_model->employeeDeductionList($this->input->get('id'));
        $this->load->view('components/header');
        $this->load->view('components/sidebar');
        $this->load->view('components/navbar');
        $this->load->view('deductions', array('id' => $this->input->get('id'),'deductionsList' => $deductionsList['list'],'salarylog' => $deductionsList['salarylog']));
        $this->load->view('components/footer');
    }

    public function toggleStatus()
    {
        $this->load->model('Deduction_model');
        $this->Deduction_model->toggleStatus($this->input->get('id'));
        redirect('deductions?id='.$this->input->get('id'));
    }

    public function addDeductions($id)
    {
        $this->load->model('Deduction_model');
        $this->Deduction_model->addDeductions($_POST);
        redirect('deductions?id='.$id);
    }

}
        
