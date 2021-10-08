<?php 

class Login_model extends CI_Model {

  function login($username,$password){ 
    echo $sql = "SELECT id,fullName as name,password FROM admin WHERE username = '".$username."'";
    $result = $this->db->query($sql);
    if ($result->num_rows() > 0) {
      $data = $result->row();
      echo json_encode($data);
      if($data->password == md5($password)){
        unset($data->password);
        return $data;
      }else {return false;}
    } else {return false;}
  }
}