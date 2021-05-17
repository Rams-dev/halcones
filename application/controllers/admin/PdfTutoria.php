<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	 class PdfTutoria extends CI_Controller {
			
		public function __Construct(){
			parent::__Construct();
            $this->load->model('Tutorias');
			$this->load->model('Alumno');
		}
                public function index(){
                  
                    
                }

				public function descargarListaAlumnosPorTutoria($id)
			{
				$data['inscritos'] = $this->Tutorias->getAlumnosinscritos($id);
                //$html = $this->load->view('reports/reports_users',$data);
                $html=$this->load->view('admin/listaAlumnosPorTutoria',$data);
                //echo $html;
                $this->Alumno->generatePdf($html);

            }

            public function descargarAlumnosTutoria()
			{
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
                // $data['datos'] = $this->Tutorias->detallesTutorias();
                //$html = $this->load->view('reports/reports_users',$data);
                $html=$this->load->view('admin/listaAlumnos',$data);
                //echo $html;
                $this->Alumno->generatePdf($html);

            }

    }