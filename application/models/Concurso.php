<?php
class Concurso extends CI_model{
	
	 function __construct()
	{
		$this->load->database();
    }

    public function addConcurso($data){
        $sql = $this->db->insert('concursos',$data);
        if($sql){
            return true;
        }else{
            return false;
        }
    }
}