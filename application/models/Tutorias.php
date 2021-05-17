<?php
class Tutorias extends CI_model{
	
	 function __construct()
	{
		$this->load->database();
    }

     public function showTutorias(){
       $sql = $this->db->get('tutorias');
       return $sql->result_array();
     }
     
     public function detallesTutorias(){
      $this->db->select('*');
      $this->db->from('tutorias');
      $this->db->join('inscripciones','inscripciones.tutoria_id = tutorias.id');
      $sql = $this->db->get();
      return $sql->result_array();
    }


     public function addTutoria($datos){
       $query = $this->db->insert('tutorias',$datos);
       if($query){
         return true;
       }else{
        return false;
       }
        
     }

     public function showTutoria($tutoria_id){
       $sql = $this->db->get_where('tutorias',array('id' => $tutoria_id));
       return $sql->result_array();
     }


     public function inscribiralumno($tutoria_id){
       $data=array(
        'alumno_id' => $this->session->userdata('id'),
        'tutoria_id' => $tutoria_id
       );
       $sql = $this->db->insert('inscripciones',$data);
       if($sql){
         return true;
       }else{
         return false;
       }
     }

     public function getAlumnosinscritos($id){
       $this->db->select('usuarios.id, usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, telefono, carrera, matricula,rango, grupo');
       $this->db->from('usuarios');
       $this->db->join('inscripciones', 'inscripciones.alumno_id = usuarios.id');
       $this->db->select('tutorias.id AS tutoria_id, tutorias.nombre AS nombre_tutoria, encargado, lunes, martes,miercoles,jueves,viernes,limite');
       $this->db->join('tutorias','tutorias.id = inscripciones.tutoria_id');
       $this->db->where('tutorias.id',$id);
       $sql = $this->db->get();
       return $sql->result_array();
     }

     public function getAlumnosInscritosPorTutoriaId($tutoria_id){
      $this->db->select('usuarios.id, usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, telefono, carrera, matricula,rango, grupo');
      $this->db->from('usuarios');
      $this->db->join('inscripciones', 'inscripciones.alumno_id = usuarios.id');
      $this->db->select('tutorias.id AS tutoria_id, tutorias.nombre AS nombre_tutoria, encargado,limite');
      $this->db->join('tutorias','tutorias.id = inscripciones.tutoria_id');
      $this->db->where('tutorias.id',$tutoria_id);
      $sql = $this->db->get();
      return $sql->result_array();
    }

     public function get_inscripciones(){
       $sql = $this->db->get('inscripciones');
       return $sql->result_array();
     }

     public function getAlumnos(){
      $this->db->select('usuarios.id, usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, carrera, matricula, grupo, telefono');
       $this->db->from('usuarios');
       $this->db->join('inscripciones','usuarios.id = inscripciones.alumno_id');
       $this->db->select('tutorias.id AS tutoria_id, tutorias.nombre AS nombre_tutoria, encargado');
       $this->db->join('tutorias','tutorias.id = inscripciones.tutoria_id');
       $this->db->order_by('usuarios.id');
       $sql = $this->db->get();
       return $sql->result_array();
     }

     public function getTargetones($id=""){
       if(!empty($id)){
         $data = array('alumno_id' => $this->session->userdata('id'));
        $sql = $this->db->get_where('targetones',$data);
       }else{
       $sql = $this->db->get('targetones');
       }
       return $sql->result_array();

     }

     

    public function eliminarTargetones($alumno_id){
      $sql = $this->db->delete('targetones', array('alumno_id' => $alumno_id));
      if($sql){
          return true;
      }else{
          return false;
      }

    }

     public function get_datos_alumnos(){
      $this->db->select('usuarios.id, usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, carrera, matricula, grupo');
       $this->db->from('usuarios');
       $this->db->join('inscripciones','usuarios.id = inscripciones.alumno_id');
       $this->db->select('tutorias.id AS tutoria_id, tutorias.nombre AS nombre_tutoria, encargado');
       $this->db->join('tutorias','tutorias.id = inscripciones.tutoria_id');
       $this->db->order_by('usuarios.id');
       $this->db->where('usuarios.id', $this->session->userdata('id'));
       $sql = $this->db->get();
       return $sql->result_array();

     }

    //  public function getAlumnosnNoInscritos(){
    //   $this->db->select('usuarios.id, usuarios.nombre, usuarios.apellido_p, usuarios.apellido_m, carrera, matricula, grupo');
    //    $this->db->from('usuarios');
    //    $this->db->join('inscripciones','usuarios.id = inscripciones.alumno_id');
    //   //  $this->db->where('usuarios.rango != 1');
    //    $this->db->where_not_in('usuarios.id = inscripciones.alumno_id');
    //    $sql = $this->db->get();
    //    return $sql->result_array();
      
    //  }
     
     public function get_tutoriauser(){
       $data=array(
         'alumno_id' => $this->session->userdata('id')
       );
     $sql = $this->db->get_where('inscripciones',$data);
        if($sql){
          return $sql->result_array();
        }else{
            return false;
          }
     }
/* ----------------------alumnos inscritos por tutoria-------------------------------------- */
     public function numeroinscritos($id){
       $this->db->select('*');
       $this->db->from('inscripciones');
       $this->db->join('tutorias','tutorias.id = inscripciones.tutoria_id');
       $this->db->where('tutorias.id',$id);
       $sql = $this->db->count_all_results();
       return $sql;

     }


     /*-------------------- subir targeton----------------------------------------------- */

     public function subir_targeton($targeton){
       $alumno_id = $this->session->userdata('id');
       $data = array(
                    'nombre' => $targeton,
                    'alumno_id' => $alumno_id);
      $sql = $this->db->insert('targetones',$data);
      if($sql){
        return true;
      }else{
        return false;
      }
     }

/*------------------------------eliminar tutoria------------------------------------------------------- */

public function eliminarLiberadosDeTutoria($alumno_id){
  $sql = $this->db->delete('liberados', array('alumno_id' => $alumno_id));
  if($sql){
    return true;
  }else{
    return false;
  }
}


public function deleteTutoria($tutoria_id){
  $this->db->delete('inscripciones',array('tutoria_id' => $tutoria_id));
  $sql = $this->db->delete('tutorias', array('id' => $tutoria_id));
  if($sql){
    return true;
  }else{
    return false;
  }

}


/**++++++++++ verificar el estado del alumno */

public function estado_alumno(){
  $sql = $this->db->get_where('liberados', array('alumno_id' => $this->session->userdata('id')),1);
  if($sql->result()){
    return true;
  }else{
    return false;
  }
}
}