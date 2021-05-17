<?php
class Lista extends CI_model{
	
	 function __construct()
	{
		$this->load->database();
    }


    public function insertList($carrer, $list){
        $data = array(
            'carrera' => $carrer,
            'lista' => $list
        );

        if($this->db->insert('listas',$data)){
            return true;
        }else{
            return false;
        }
    }

    public function ObtenerListasPorCarrera($carrera){
        $sql = $this->db->get_where('listas',array('carrera' => $carrera));
        return $sql->result_array();
    }
}