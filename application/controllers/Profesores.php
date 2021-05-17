<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	 class Profesores extends CI_Controller {
			
		public function __Construct(){
			parent::__Construct();
			$this->load->model('Tutorias');
			$this->load->model('Alumno');
			$this->load->model('Profesor');
			$this->load->model('Log_in');
			$this->load->model('Lista');
			$app="";
			$apm="";
		}


        public function registro(){
			$this->load->view('comm/head');
            $this->load->view('profesores/registro');
			$this->load->view('comm/foot');
        }

		public function validateRegistro(){
			$data = $this->input->post();

			$this->app = strtoupper($this->input->post("apellido_p")); 
			$this->apm = strtoupper($this->input->post("apellido_m")); 
			// var_dump($this->obtenerMatricula());
			$matricula = $this->obtenerMatricula();
			$data['matricula'] = $matricula;
			$data['rango'] = 2;
			$this->Profesor->guardarProfesor($data);
			$datos['matricula'] = $matricula;
			$this->load->view('comm/head');
			$this->load->view('profesores/registro',$datos);
			
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

				$this->load->view('comm/head');
				$this->load->view('comm/nav2');
				$this->load->view('profesores/listas',$data);
				$this->load->view('comm/foot');
			}else{
				redirect('login');
			}
			
		}

		public function carrera($carrera){
			if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "2" ){
				$value = str_replace("_", " ", $carrera);
				$data['listas'] = $this->Lista->ObtenerListasPorCarrera($value);
				$data['carrera'] = $value;
				$this->load->view("comm/head");
				$this->load->view("comm/nav2");
				$this->load->view('profesores/detalles',$data);
				$this->load->view("comm/foot");

			}else{
				redirect('login');
			}
			

		}


    }