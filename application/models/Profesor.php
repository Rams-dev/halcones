<?php
class Profesor extends CI_model{
	
	 function __construct()
	{
		$this->load->database();
    }


    public function guardarProfesor($data){
    
        if($this->db->insert('usuarios',$data)){
            return true;
        }else{
            return false;
        }
    }
}