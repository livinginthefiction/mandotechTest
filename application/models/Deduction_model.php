<?php 

class Deduction_model extends CI_Model {

  function employeeDeductionList($employeeId){ 
    $sql = "SELECT d.*,sl.salaryDate FROM `deducts` d JOIN salarylog sl ON d.`salaryId`=sl.id WHERE d.status='1' AND sl.employeeId=".$employeeId." ORDER BY d.id desc";
    $result = $this->db->query($sql);
    if ($result->num_rows() > 0) {
      $data['list']=$result->result_array();
    } else {$data['list'] = [];}

    $sql = "SELECT * FROM `salarylog` WHERE employeeId=".$employeeId." ORDER BY id desc";
    $result = $this->db->query($sql);
    if ($result->num_rows() > 0) {
      $data['salarylog']=$result->result_array();
    } else {$data['salarylog'] = [];}
    return $data;
  }

  function toggleStatus($id){ 
    $sql = "UPDATE deducts SET status = IF(status='1', '0', '1') WHERE id=$id";
    $result = $this->db->query($sql);
    return true;
  }

  function addDeductions($data){ 
    $this->db->insert('deducts', $data);
    return true;
  }

  function updateDeductions($data,$id){ 
    $this->db->where('id', $id);
    $this->db->update('deducts', $data);
    return true;
  }




}