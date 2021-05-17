<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	 class Targeton extends CI_Controller {
			
		public function __Construct(){
			parent::__Construct();
            $this->load->model('Tutorias');
			$this->load->model('Alumno');
		}
				public function index()
			{
                if($this->session->userdata('is_logged')){
                    $data['tutorias'] = $this->Tutorias->showTutorias();	
                    $this->load->view('comm/head');
                    $this->load->view('comm/nav2',$data);
                    $this->load->view('users/targeton',$data);
                    $this->load->view('comm/foot');
                    }else{
                        redirect('login');
                    }
            }

            function cargar_targeton() {
                $targeton = $this->input->post('targeton');
                
                $data['datos']=$this->Tutorias->getTargetones($this->session->userdata('id'));
              
                $config['upload_path'] = "assets/pdf/targetones";
                $config['allowed_types'] = "*";        
                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload('targeton')) {
                    //*** ocurrio un error
                    $data['uploadError'] = $this->upload->display_errors();
                    //echo $this->upload->display_errors();
                    echo json_encode(array('errors' => 'selecciona un archivo pdf'));
                    $this->output->set_status_header(400);
                    exit;
                }
        
                $data['uploadSuccess'] = $this->upload->data();
                    $data = array('upload_data' => $this->upload->data());
        				
                        $targeton = $data['upload_data']['file_name'];
                    
                        if($this->Tutorias->subir_targeton($targeton)){
                            
                            echo json_encode(array('mensaje' => 'targeton subido con éxito'));
                           
                        }else{
                            echo json_encode(array('fail' => 'no se pudo subir tu targeton, intenta nuevamente'));
                        }
                

            }

            public function descargarTargeton(){
                $data['datosAlumno'] = $this->Tutorias->get_datos_alumnos();
                    //$html = $this->load->view('reports/reports_users',$data);
                    $html=$this->load->view('targetonAlumno',$data);
                   // echo $html;
                    $this->Alumno->generatePdf($html);
                
            }
}