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

    public function existId($id){
        $sql = $this->db->get_where('listas',array("id" => $id));
        if(count($sql->result_array()) > 0){
            return $sql->result_array();
        }
        return false;
    }

    public function deleteLista($id){
        $sql = $this->db->delete('listas', array('id' => $id));
        if($sql){
            return $sql;
        }else{
            return false;
        }
    }

    public function getListsByCarrer($carrer){
        $sql = $this->db->get_where('listas', array('carrera' => $carrer));
        return $sql->result_array();

    }
}