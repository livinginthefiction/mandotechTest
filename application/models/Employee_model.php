<?php 

class Employee_model extends CI_Model {

  function employeeList(){ 
    $sql = "SELECT * FROM (SELECT e.*,es.employeeSalary FROM `employee` e JOIN employeesalary es ON e.id=es.employeeId ORDER BY e.id DESC) employeeList GROUP BY id";
    $result = $this->db->query($sql);
    if ($result->num_rows() > 0) {
      return $result->result_array();
    } else {return false;}
  }

  function toggleStatus($id){ 
    $sql = "UPDATE employee SET status = IF(status='1', '0', '1') WHERE id=$id";
    $result = $this->db->query($sql);
    return true;
  }

  function generateSalary($date){ 
    $sql = "SELECT * FROM (SELECT e.*,es.employeeSalary FROM `employee` e JOIN employeesalary es ON e.id=es.employeeId WHERE e.status='1' ORDER BY e.id DESC) employeeList GROUP BY id";
    $result = $this->db->query($sql);

    if ($result->num_rows() > 0) {
      $employees = $result->result_array();
      foreach ($employees as $key => $value) {
        $salarylog =  array(
                        'employeeId' =>$value['id'],
                        'salaryAmount' =>$value['employeeSalary'],
                        'salaryDate' =>date_format(date_create($date),"Y-m-d"),
                        'creator' =>$_SESSION['id'],
                      );
        $this->db->insert('salarylog', $salarylog);
      }
      return true;
    } else {return false;}
  }


}