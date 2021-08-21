<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	 class Profesores extends CI_Controller {
			
		private $carreras;
		public function __Construct(){
			parent::__Construct();
			$this->load->model('Tutorias');
			$this->load->model('Alumno');
			$this->load->model('Profesor');
			$this->load->model('Log_in');
			$this->load->model('Lista');
			$this->load->helper(array('rules'));

			$app="";
			$apm="";

			$this->carreras = array(
				"ag" => "AGRICULTURA SUSTENTABLE Y PROTEGIDA",
				"de" => "DESARROLLO DE NEGOCIOS",
				"dmi" => "DISEÑO Y MODA INDUSTRIAL",
				"er" => "ENERGÍAS RENOVABLES",
				"ga" => "GASTRONOMÍA",
				"me" => "MECATRÓNICA",
				"pa" => "PROCESOS ALIMENTARIOS",
				"ti" => "TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN",
			);
		}

        public function registro(){
			$this->load->view('comm/head');
            $this->load->view('profesores/registro');
			$this->load->view('comm/foot');
        }

		public function validateRegistro(){
			// $this->form_validation->set_error_delimiters('','');
			// $registerRules = getRegistroProfesoresRules();
			// var_dump($registerRules);
			// exit;
			// $this->form_validation->set_rules($registerRules);
			// if($this->form_validation->run() == false){
			// 	$errors = array(
			// 		'nombre' => form_error('nombre'),
			// 		'apellido_p' => form_error('apellido_p'),
			// 		'apellido_m' => form_error('apellido_m'),
			// 		'carrera' => form_error('carrera'),
			// 		'grupo' => form_error('grupo'),
			// 		'contrasena' => form_error('contrasena')
			// 	);
	
			// 	echo json_encode($errors);
			// 	$this->output->set_status_header(400);
			// 	return 0;
			//}

			$data = $this->input->post();

			$this->app = strtoupper($this->input->post("apellido_p")); 
			$this->apm = strtoupper($this->input->post("apellido_m")); 
			
			
			$matricula = $this->obtenerMatricula();
			$data['matricula'] = $matricula;
			$data['rango'] = 2;
			$this->Profesor->guardarProfesor($data);
			$datos['matricula'] = $matricula;
			echo json_encode([
				"message" => "Registo exitoso",
				"matricula" => $datos['matricula']
			]);
			
		}

		public function obtenerMatricula(){
			$ut = "UT";

			$ap = substr($this->app,0,1);
			$am = substr($this->apm,0,1);
			$year = Date('y');
			$matricula = $ut.$ap.$am.$year.rand(1000,9999);

			if(empty($this->Log_in->existeMatricula($matricula))){
				return $matricula;
			}else{
				return $this->obtenerMatricula();
			}
		}

		public function listas(){
			if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "2" ){
				
				$data['carreras'] = $this->carreras;
				$this->load->view('comm/head');
				$this->load->view('comm/nav1');
				$this->load->view('profesores/listas',$data);
				$this->load->view('comm/foot');
			}else{
				redirect('login');
			}
			
		}

		public function carrera($carrera){
			if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "2" ){
				// $value = str_replace("_", " ", $carrera);
				$value = $this->carreras[$carrera];
				$data['carrera'] = $value;
				$data['listas'] = $this->Lista->ObtenerListasPorCarrera($value);
				$this->load->view("comm/head");
				$this->load->view("comm/nav1");
				$this->load->view('profesores/detalles',$data);
				$this->load->view("comm/foot");

			}else{
				redirect('login');
			}
		}
}