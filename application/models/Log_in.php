<?php
class Log_in extends CI_model{
	
	 function __construct()
	{
		$this->load->database();
    }

    public function validate($name, $pass){
      $sql = $this->db->get_where('usuarios',array('matricula' => $name, 'contrasena' => $pass),1);
      if(!$sql->result()){
        return false;
      }else{
      return $sql->row();
    }
  }

    public function addUser($val){
      $sql = $this->db->insert('usuarios', $val);
      if($sql){
        return true;
      }else{
        return false;
      }
    }

    public function existeMatricula($matricula){
      $query = $this->db->get_where('usuarios',array('matricula' => $matricula));
      return $query->result_array();
    }
  
}