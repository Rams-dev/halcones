<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	                                                                                         class Dashboard extends CI_Controller {
			
		public function __Construct(){
			parent::__Construct();
			$this->load->model('Tutorias');
		}
				public function index()
			{
				if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
				 $tutorias = $this->Tutorias->showTutorias();
				 $data['datostutoria'] = $this->Tutorias->detallesTutorias();	
				 $alumnosPorTutoria = $this->Tutorias->getNumeroDeAlumnosPorTutoria();	
				 if($alumnosPorTutoria != ""){
					 for($t = 0; $t < count($tutorias); $t++){
						for($c = 0; $c < count($alumnosPorTutoria); $c++){
							if($tutorias[$t]['id'] == $alumnosPorTutoria[$c]['tutoria_id'] ){
								$tutorias[$t]['numeroInscritos'] = $alumnosPorTutoria[$c]['numeroInscritos'];
							}
						}
					 }
				 }
				 $data['tutorias'] = $tutorias;
				$this->load->view('comm/head');
				$this->load->view('comm/nav1');
				$this->load->view('admin/dashboard',$data);
				$this->load->view('comm/foot');
				}else{
					redirect('login');
				}
			}
			public function inscritos($id){
				if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
					$data['inscritos'] = $this->Tutorias->getAlumnosinscritos($id);
					$data['tutoria'] = $this->Tutorias->showTutoria($id);
					// $data['titulo'] = $id;
					$this->load->view('comm/head');
					$this->load->view('comm/nav1');
					$this->load->view('admin/inscritos',$data);
					$this->load->view('comm/foot');
				}else{
					redirect('login');
				}
			}

			public function eliminar_tutoria(){
				if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
				$postdata = $this->input->post();
				$id= implode('',$postdata);
				$alumnos=$this->Tutorias->getAlumnosInscritosPorTutoriaId($id);
					for($t=0; $t<count($alumnos); $t++){
						$this->Tutorias->eliminarTargetones($alumnos[$t]["id"]);
					}
					for($i=0; $i< count($alumnos) ;$i++){
						$this->Tutorias->eliminarLiberadosDeTutoria($alumnos[$i]["id"]);
					}
					$query = $this->Tutorias->deleteTutoria($id);

					if($query){
						echo json_encode(array('mensaje' => 'eliminado'));
					}else{
						echo json_encode(array('mensaje' => 'error'));
					}
				}else{
					redirect('login');
				}
			}
	}
