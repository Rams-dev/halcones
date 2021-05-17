<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Concursos extends CI_Controller {
    public function __Construct(){
        parent::__Construct();
        $this->load->model('Tutorias');
        $this->load->helper(array('rules'));
        $this->load->model('Concurso');
    }
	public function index()
	{
        if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
            $this->load->view('comm/head');
            $this->load->view('comm/nav1');
            $this->load->view('admin/concursos');
            $this->load->view('comm/foot');
        }else{
                redirect('login');
        }
    }

    public function agregarConcurso (){
        if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
            $this->load->view('comm/head');
            $this->load->view('comm/nav1');
            $this->load->view('admin/agregarConcurso');
            $this->load->view('comm/foot');
        }else{
                redirect('login');
        }
    }

    public function addConcurso(){
        if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
            $this->form_validation->set_error_delimiters('','');
            $rules = getTutoriaRules();
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run()==false){
                $errors = array(
                    'concurso' => form_error('concurso'),
                    'encargado' => form_error('encargado')
                );

                echo json_encode($errors);
                $this->output->set_status_header(400);
                }else{ 
                    $concurso = $this->input->post('concurso');
                    $encargado = $this->input->post('encargado');
                    $lim = $this->input->post('limit');
                        
                        if(!empty($lim) and $lim>0){
                            $limite = $lim;
                        }else{
                            $limite = 'null';
                        }
                    $lu= $this->input->post('hi_lu');
                    $lu2= $this->input->post('ht_lu');
                    $ma= $this->input->post('hi_ma');
                    $ma2= $this->input->post('ht_ma');
                    $mi= $this->input->post('hi_mi');
                    $mi2= $this->input->post('ht_mi');
                    $ju= $this->input->post('hi_ju');
                    $ju2= $this->input->post('ht_ju');
                    $vi= $this->input->post('hi_vi');
                    $vi2= $this->input->post('ht_vi');
                    
                    $datos= array(
                        'nombre' => $concurso,
                        'encargado' => $encargado,
                        'lunes' => $lu . ' - ' . $lu2,
                        'martes' => $ma . ' - ' . $ma2,
                        'miercoles' => $mi . ' - ' . $mi2,
                        'jueves' => $ju . ' - ' . $ju2,
                        'viernes' => $vi . ' - ' . $vi2,
                        'limite' => $limite,
                    );
                    
                    
                        if($this->Concurso->addConcurso($datos)){
                            echo json_encode(array('mensaje' => 'Curso agregado con éxito'));
                        }else{
                            echo json_encode(array('mensaje' => 'el Curso no se agregó correctamente'));
                        }
                    //echo $tutoria,$encargado,$dia,$hora_inicio,$hora_termino;
                }
        }else{
            redirect('login');
        }
    }

}