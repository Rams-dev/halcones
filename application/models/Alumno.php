<?php
class Alumno extends CI_model{
	
	 function __construct()
	{
		$this->load->database();
    }



    public function get_datos_user(){

        $sql = $this->db->get_where('usuarios', array('id' => $this->session->userdata('id')));
        return $sql->row_array();
    }

    public function delete($id){
        $sql = $this->db->delete('usuarios',array('id' => $id));
        if($sql){
            return true;
        }else{
            return false;
        }
    }


    public function deletealumnofromtutoria($id){
        $sql = $this->db->delete('inscripciones',array('alumno_id' => $id));
        if($sql){
            return true;
        }else{
            return false;
        }
    }

    public function updateuser($id, $data){
        $this->db->where('id',$id);
        $sql = $this->db->update('usuarios',$data);
        if($sql){
            return true;
        }else{
            return $sql;
        }
    }


    public function liberaralumnofromtutoria($id){
        $sql = $this->db->insert('liberados',array('alumno_id' => $id));
        if($sql){
            return true;
        }else{
            return false;
        }
    }


    public function getalumnosliberados(){
        $sql = $this->db->get('liberados');
        return $sql->result_array();
    }

    public function editarPerfilAdmin($formData){
        $data = array(
            'nombre' => $formData['nombre'],
            'apellido_p'  => $formData['ap'],
            'apellido_m'  => $formData['am'],
            'matricula'  => $formData['matricula'],
            'contrasena'  => $formData['contrasena']
        );
    
    $this->db->where('id', $formData['id']);
    $query = $this->db->update('usuarios', $data);
    if($query){
        return true;
    }else{
        return false;
    }
    }

    public function exist($id){
        $sql = $this->db->get_where('usuarios',array('id' => $id));
        if($sql){
            return $sql->row();
        }else{
            return false;
        }


    }

    public function restorePassword($idAlumno, $maticula){
        $this->db->where('id',$idAlumno);
        $this->db->update('usuarios', array('contrasena' => $maticula));
    }



    public function generatePdf($html){

        // Get output html
        $html = $this->output->get_output();
        // Load pdf library
        $this->load->library('pdf');
        // Load HTML content
        $this->dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $this->dompdf->setPaper('A4', 'portrai');
        
        // Render the HTML as PDF
        $this->dompdf->render();
        
        // Output the generated PDF (1 = download and 0 = preview)
        $this->dompdf->stream("olv.pdf", array("Attachment"=>0));
    
 	}
}