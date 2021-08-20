<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __Construct(){
		parent::__Construct();
		$this->load->model('Log_in');
		$this->load->helper(array('rules'));
	}
	public function index()
	{
		$this->load->view('login');
	}

	public function validate(){
		$this->form_validation->set_error_delimiters('','');
		$loginRules = getLoginRules();
		$this->form_validation->set_rules($loginRules);
		if($this->form_validation->run()==false){
			$errors = array(
				'matricula' => form_error('matricula'),
				'password' => form_error('password')
			);
			echo json_encode($errors);
			$this->output->set_status_header(400);
		}else{
			$mat = $this->input->post('matricula');
			$pass = $this->input->post('password');
			if(!$datos = $this->Log_in->validate($mat,$pass)){
				echo json_encode(array('mensaje' => 'Usuario o contraseña incorrectos, verifica!'));
				$this->output->set_status_header(401);
				exit;
			}
			$data= array(
				'id' => $datos->id,
				'nombre' => $datos->nombre,
				'apellido_p' => $datos->apellido_p,
				'apellido_m' => $datos->apellido_m,
				'matricula' => $datos->matricula,
				'rango' => $datos->rango,
				'is_logged' => TRUE,
			);
			if($data['rango'] == '0' || $data['rango'] == '2'){
			$this->session->set_userdata($data);
			$this->session->set_flashdata('mensaje', 'Bienvenido ' . $data['nombre']);
			echo json_encode(array("url" => base_url('users/dashboarduser')));
			}elseif($data['rango'] == '1'){
				$this->session->set_userdata($data);
			$this->session->set_flashdata('mensaje', 'Bienvenido al registro de tutorias ' . $data['nombre']);
			echo json_encode(array("url" => base_url('admin/dashboard')));
			}
		}
	}

	public function registro(){
		$this->load->view('comm/head');
		$this->load->view('registro');
		$this->load->view('comm/foot');
            
	}

	public function registrarUsuario(){
		$this->form_validation->set_error_delimiters('','');
		$rules = getRegistroUsersRules();
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run() == false){
			$errors = array(
				'nombre' => form_error('nombre'),
				'ap' => form_error('ap'),
				'am' => form_error('am'),
				'carrera' => form_error('carrera'),
				'grupo' => form_error('grupo'),
				'matricula' => form_error('matricula'),
				'telefono' => form_error('telefono'),
				'contrasena' => form_error('contrasena')
			);

			echo json_encode($errors);
			$this->output->set_status_header(400);
		}else{
		$nombre = $this->input->post('nombre');
		$ap = $this->input->post('ap');
		$am = $this->input->post('am');
		$carrera = $this->input->post('carrera');
		$grupo = $this->input->post('grupo');
		$matricula = $this->input->post('matricula');
		$telefono = $this->input->post('telefono');
		$contrasena = $this->input->post('contrasena');
		$data = array(
			'nombre' => $nombre,
			'apellido_p' => $ap,
			'apellido_m' => $am,
			'carrera' => $carrera,
			'grupo' => $grupo,
			'matricula' => $matricula,
			'telefono' => trim($telefono),
			'contrasena' => $contrasena,
			'rango' => 0
			
		);
		if($this->Log_in->addUser($data)){
			echo json_encode(array('mensaje' => 'Registro exitoso, Bienvenido al Sistema de tutorias'));
		}else{
			echo json_encode(array('mensaje' => 'Error en el egistro'));

		}
		}
		

	}


	public function logout(){
		$vars = array('id',
		'nombre',
		'apellido_p',
		'apellido_m',
		'matricula',
		'rango',
		'telefono',
		'is_logged');
		$this->session->unset_userdata($vars);
		$this->session->sess_destroy();

		redirect('login');
	}
}
