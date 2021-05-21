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
        if($this->session->userdata('is_logged')){
           $data['datos'] = $this->Alumno->get_datos_user();
           $this->load->view('comm/head');
           $this->load->view('comm/nav2');
           $this->load->view('users/cuenta',$data);
           $this->load->view('comm/foot');
           }else{
               redirect('login');
           }
    }

    
	public function actualizarUsuario($id_user){
		if($this->session->userdata('is_logged')){
			$formData = $this->input->post();
            $password = $this->input->post('contrasena');
			if($password == "********"){
                unset($formData['contrasena']);
			}
            if($this->Alumno->updateuser($id_user, $formData)){
                echo json_encode('actualizado correctamente');
            }else{
                echo json_encode('ha ocurrido un error');
            }			
		}else{
			redirect('login');
		}
	}
}