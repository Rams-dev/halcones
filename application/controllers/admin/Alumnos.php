<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {
    public function __Construct(){
        parent::__Construct();
        $this->load->model(array('Tutorias','Alumno'));
        $this->load->helper(array('rules'));
    }
	public function index()
    {
        if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
            $nombre = array('0' => '0');
            $alumnosliberados = $this->Alumno->getalumnosliberados();
           foreach ($alumnosliberados as $key) {
            array_push($nombre,$key['alumno_id']);
           }
           $data['alumnosliberados'] = $nombre;
            $alumnos = $this->Tutorias->getAlumnos();	
            $targetones = $this->Tutorias->getTargetones();
            for($i=0;$i<count($alumnos);$i++){
                for($j=0; $j<count($targetones); $j++){
                    if($alumnos[$i]['id'] == $targetones[$j]['alumno_id']){
                        array_push($alumnos[$i],$targetones[$j]['nombre']);
                    }
                }

            }
            $data['alumnos'] = 	$alumnos;
            // $data['noinscritos']= $this->Tutorias->getAlumnosnNoInscritos();
           $this->load->view('comm/head');
           $this->load->view('comm/nav1');
           $this->load->view('admin/alumnos',$data);
           $this->load->view('comm/foot');
        }else{
               redirect('login');
           }
           
    }

    


    public function eliminar(){
        if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){

        $postdata = $this->input->post();
        
        if($this->Alumno->delete($postdata['id']) and $this->Alumno->deletealumnofromtutoria($postdata['id'])){
            echo json_encode(array('mensaje' => 'Alumno eliminado con exito'));
        }else{
            echo json_encode(array('mensaje' => 'no se pudo eliminar el alumno'));
        }
        }else{
            redirect('login');
        }
    }

    public function removefromtutoria(){
        if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
            $postdata = $this->input->post();
            if($this->Alumno->deletealumnofromtutoria($postdata['id'])){
                echo json_encode(array('mensaje' => 'Alumno eliminado con exito'));
            }else{
                echo json_encode(array('mensaje' => 'no se pudo eliminar el alumno'));
            }
        }else{
            redirect('login');
        }
    }

    public function liberar(){
        if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
            $postdata = $this->input->post(); 
            if($this->Alumno->liberaralumnofromtutoria($postdata['id'])){
                echo json_encode(array('mensaje' => 'Este Alumno ha sido liberado'));
            }else{
                echo json_encode(array('mensaje' => 'no se pudo liberar el alumno'));
            }
        }else{
            redirect('login');
        }

    }

}