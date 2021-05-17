<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuenta extends CI_Controller {
    public function __Construct(){
        parent::__Construct();
        $this->load->model(array('Tutorias','Alumno'));
        $this->load->helper(array('rules'));
    }
	public function index()
    {
        if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
           $data['datos'] = $this->Alumno->get_datos_user();
           $this->load->view('comm/head');
           $this->load->view('comm/nav1');
           $this->load->view('admin/cuenta',$data);
           $this->load->view('comm/foot');
           }else{
               redirect('login');
           }
    }

    public function editProfile(){
        $formData=$this->input->post();
        if($this->Alumno->editarPerfilAdmin($formData)){
            echo json_encode(array('mensaje' => 'Editado con exito'));
        }else{
            echo json_encode(array('error' => 'hubo un error'));
        }

    }
}