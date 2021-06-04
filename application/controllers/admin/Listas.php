<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listas extends CI_Controller {
    public function __Construct(){
        parent::__Construct();
        $this->load->model(array('Tutorias','Alumno','Lista'));
        $this->load->helper(array('rules'));
        
    }
	public function index()
    {
        $carreras = array(
            "ag" => "AGRICULTURA SUSTENTABLE Y PROTEGIDA",
            "de" => "DESARROLLO DE NEGOCIOS",
            "dmi" => "DISEÑO Y MODA INDUSTRIAL",
            "er" => "ENERGIAS RENOVABLES",
            "ga" => "GASTRONOMIA",
            "me" => "MECATRONICA",
            "pa" => "PROCESOS ALIMENTARIOS",
            "ti" => "TECNOLOGIAS DE LA INFORMCION Y COMUNICACION",
        );
        $data['carreras'] = $carreras;
        $this->load->view("comm/head");
        $this->load->view("comm/nav1");
        $this->load->view('listas/listas',$data);
        $this->load->view("comm/foot");
    }

    
    public function agregarListas($carrera = ""){
        $data=array();
        if($carrera !=""){
            $data['carrera']=str_replace('_',' ',$carrera);
        }

        $this->load->view("comm/head");
        $this->load->view("comm/nav1");
        $this->load->view('listas/agregarListas',$data);
        $this->load->view("comm/foot");

    }

    public function subirListas(){
        $this->load->library('upload');
        $carrera= $this->input->post('carrera');
        $config['upload_path']          = 'assets/pdf/listas';
        $config['allowed_types']        = '*';
        $variable = $_FILES;
        $up = 0; 
        $down = 0; 
        $files = count($_FILES['listas']['name']);
        for ($file=0; $file < $files; $file++) { 
            # code...
            $_FILES['listas']['name'] = $variable['listas']['name'][$file]; 
            $_FILES['listas']['type'] = $variable['listas']['type'][$file]; 
            $_FILES['listas']['size'] = $variable['listas']['size'][$file]; 
            $_FILES['listas']['tmp_name'] = $variable['listas']['tmp_name'][$file]; 
            $_FILES['listas']['error'] = $variable['listas']['error'][$file]; 
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('listas')) {
                 //*** ocurrio un error
                 $data['uploadError'] = $this->upload->display_errors();
                 echo json_encode(array('errors' => 'selecciona un archivo pdf'));
                 $this->output->set_status_header(400);
                 exit;
             }

            $data['uploadSuccess'] = $this->upload->data();
                $data = array('upload_data' => $this->upload->data());	
                    $lista = $data['upload_data']['file_name'];
                    if($this->Lista->insertList($carrera, $lista)){
                        $up++;
                    }else{
                        $down++;
                        echo json_encode(array('fail' => 'no se pudo subir tu targeton, intenta nuevamente'));
                    }
        }
        echo json_encode(array('success' => 'se subieron '.$up. ' archivos con exito. '. $down. ' no subidos'));
                        
    }

    public function carrera($carrera){
        $value = str_replace("_", " ", $carrera);
        $data['listas'] = $this->Lista->ObtenerListasPorCarrera($value);
        $data['carrera'] = $value;
        $this->load->view("comm/head");
        $this->load->view("comm/nav1");
        $this->load->view('admin/listas/detalles',$data);
        $this->load->view("comm/foot");
        
    }

    public function eliminarLista(){
        $data = $this->input->post();
        if($sql = $this->Lista->existId($data["id"])){
            foreach($sql as $s){
                unlink('assets/pdf/listas/'. $s['lista']);

            }
            if($this->Lista->deleteLista($data["id"])){
                echo json_encode(array('mensaje'=>'Lista elimianda correctamente!'));
            }else{
            echo json_encode(array("error"=> "ha ocurrido un error"));
            }

        }else{
            echo json_encode(array("error"=> "no existe ese id"));
        }


    }

}