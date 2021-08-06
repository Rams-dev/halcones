<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	 class Dashboarduser extends CI_Controller {
			
		public function __Construct(){
			parent::__Construct();
			$this->load->model('Tutorias');
			$this->load->model('Alumno');
		}
				public function index()
			{
				if($this->session->userdata('is_logged')){
				$data['tutorias'] = $this->Tutorias->showTutorias();	
				$data['status'] = $this->Tutorias->estado_alumno();
				$this->load->view('comm/head');
				$this->load->view('comm/nav2',$data);
				if($this->session->userdata('rango') == '2'){
					
					redirect('profesores/listas');
					// $this->load->view('profesores/listas',$data);
				}else{

					$this->load->view('users/dashboarduser',$data);
				}
				$this->load->view('comm/foot');
				}else{
					redirect('login');
				}
			}
			
			public function detalles($id_tutoria){
				// $data['tutoria'] = $this->Tutorias->showTutoria($id);
				// $data['titulo']= $name;
				if(!empty($data['usertutoria'] = $this->Tutorias->get_tutoriauser())){
				  foreach ($data['usertutoria'] as $key) {
				  	$id=$key['alumno_id'];
				  }
				}else{
					$id=0;
				}
				$data['id'] = $id;
				$data['totalinscritos'] = $this->Tutorias->numeroinscritos($id_tutoria);
				$data['tutorias'] = $this->Tutorias->showTutoria($id_tutoria);
				$this->load->view('comm/head');
				$this->load->view('comm/nav2',$data);
				$this->load->view('users/detallestutoria',$data);
				$this->load->view('comm/foot');

			}

			public function inscribirme(){
				 $data = $this->input->post();
				 if(!empty($data['usertutoria'] = $this->Tutorias->get_tutoriauser())){
					foreach ($data['usertutoria'] as $key) {
						$id=$key['alumno_id'];
					}
					}else{
					  $id=0;
				 	}
						if($id == $this->session->userdata['id']){
							echo json_encode(array('error' => 'Ya estas inscrito en esta tutoria'));
							$this->output->set_status_header(400);						
						}else{
							if($this->Tutorias->inscribiralumno($data['tutoria_id'])){
								echo json_encode(array('mensaje' => 'Registrado con exito'));
							}else{
								echo json_encode(array('error' => 'Lo siento no puedes registrarte en este grupo'));
							}
						}
				
			}
			
			
    }