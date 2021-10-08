<?php 

class Reports_model extends CI_Model {

  function employeeAgeGroupList(){ 
    $sql = "SELECT age_group, COUNT(*) AS age_count
            FROM
            (
                SELECT
                    CASE WHEN DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(dob, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(dob, '00-%m-%d')) < 30
                         THEN 'below30'
                         WHEN DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(dob, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(dob, '00-%m-%d')) BETWEEN 30 AND 40
                         THEN 'bet3040'
                         WHEN DATE_FORMAT(NOW(), '%Y') - DATE_FORMAT(dob, '%Y') - (DATE_FORMAT(NOW(), '00-%m-%d') < DATE_FORMAT(dob, '00-%m-%d')) > 40
                         THEN 'above40'
                         ELSE 'Other'
                    END AS age_group
                FROM employee
            ) employeelist
            GROUP BY age_group";
    $result = $this->db->query($sql);
    if ($result->num_rows() > 0) {
      $data = $result->result_array();
      foreach ($data as $key => $value) {$data[$value['age_group']]=$value['age_count'];}
    }

    $sql = 'SELECT SUM(`salaryAmount`) as salary
            FROM salarylog
            WHERE YEAR(salaryDate) = YEAR(CURRENT_DATE())
            GROUP BY DATE_FORMAT(`salaryDate`, "%Y");';
    $result = $this->db->query($sql);
    if ($result->num_rows() > 0) {
      $data['yearlySalary']=$result->row()->salary;
    }

    $sql = 'SELECT SUM(d.`amount`) as deducts
            FROM deducts d join salarylog sl ON d.salaryId=sl.id
            WHERE YEAR(salaryDate) = YEAR(CURRENT_DATE())
            GROUP BY DATE_FORMAT(`salaryDate`, "%Y");';
    $result = $this->db->query($sql);
    if ($result->num_rows() > 0) {
      $data['yearlydeducts']=$result->row()->deducts;
    }
    return $data;
  }

  function monthlysalary(){ 
    $sql = 'SELECT DATE_FORMAT(`salaryDate`, "%M-%Y") AS Month, SUM(`salaryAmount`) as salary,GROUP_CONCAT(id) as ids
            FROM salarylog
            GROUP BY DATE_FORMAT(`salaryDate`, "%m-%Y");';
    $result = $this->db->query($sql);
    if ($result->num_rows() > 0) {
      $data = $result->result_array();
      foreach ($data as $key => $value) {
        $sql = "SELECT SUM(`amount`) as deductions FROM deducts where salaryId IN (".$value['ids'].");";
        $result = $this->db->query($sql);
        if ($result->num_rows() > 0) {$data[$key]['deductions'] = $result->row()->deductions;}
        else{$data[$key]['deductions'] = 0;}
      }
      return $data;
    } else {return false;}
  }

  function monthlydeduct(){ 
    $sql = 'SELECT DATE_FORMAT(sl.`salaryDate`, "%M-%Y") AS Month, SUM(d.`amount`) as deducts
            FROM deducts d join salarylog sl ON d.salaryId=sl.id
            GROUP BY DATE_FORMAT(`salaryDate`, "%m-%Y");';
    $result = $this->db->query($sql);
    if ($result->num_rows() > 0) {
      return $result->result_array();
    } else {return false;}
  }
}