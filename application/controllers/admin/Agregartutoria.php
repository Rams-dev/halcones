<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agregartutoria extends CI_Controller {
    public function __Construct(){
        parent::__Construct();
        $this->load->model('Tutorias');
        $this->load->helper(array('rules'));
    }
	public function index()
	{
        if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
		$this->load->view('comm/head');
		$this->load->view('comm/nav1');
		$this->load->view('admin/agregartutoria');
        $this->load->view('comm/foot');
        }else{
            redirect('login');
        }
    }
    
    public function addTutoria(){
        if($this->session->userdata('is_logged') and $this->session->userdata('rango') == "1" ){
            $this->form_validation->set_error_delimiters('','');
            $rules = getTutoriaRules();
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run()==false){
                $errors = array(
                    'tutoria' => form_error('tutoria'),
                    'encargado' => form_error('encargado')
                );

                echo json_encode($errors);
                $this->output->set_status_header(400);
                }else{ 
                    $tutoria = $this->input->post('tutoria');
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
                        'nombre' => $tutoria,
                        'encargado' => $encargado,
                        'lunes' => $lu . ' - ' . $lu2,
                        'martes' => $ma . ' - ' . $ma2,
                        'miercoles' => $mi . ' - ' . $mi2,
                        'jueves' => $ju . ' - ' . $ju2,
                        'viernes' => $vi . ' - ' . $vi2,
                        'limite' => $limite,
                    );
                    
                    
                        if($this->Tutorias->addTutoria($datos)){
                            echo json_encode(array('mensaje' => 'Tutoría agregada con éxito'));
                        }else{
                            echo json_encode(array('mensaje' => 'la tutoria no se agrego correctamente'));
                        }
                    //echo $tutoria,$encargado,$dia,$hora_inicio,$hora_termino;
                }
        }else{
            redirect('login');
        }
    }
}
