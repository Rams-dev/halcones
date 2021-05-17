<?php

 function getTutoriaRules(){
 	return array(
      
        array(
                'field' => 'tutoria',
                'label' => 'tutoria',
                'rules' => 'required|trim',
                'errors' => array(
                	'required' => 'El campo %s es obligatio'),	
        ),    array(
                'field' => 'encargado',
                'label' => 'encargado',
                'rules' => 'required|trim',
                'errors' => array(
                        'required' => 'El campo %s es obligatio'),    
        ),    
	);

 }

 function getConcursoRules(){
    return array(
     
       array(
               'field' => 'concurso',
               'label' => 'concurso',
               'rules' => 'required|trim',
               'errors' => array(
                   'required' => 'El campo %s es obligatio'),	
       ),    array(
               'field' => 'encargado',
               'label' => 'encargado',
               'rules' => 'required|trim',
               'errors' => array(
                       'required' => 'El campo %s es obligatio'),    
       ),    
   );

}

 function getLoginRules(){
    return array(
        array(
                'field' => 'matricula',
                'label' => 'Matricula',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'el campo %s es requerido' ),
        ),
        array(
                'field' => 'password',
                'label' => 'contraseña',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'el campo %s es requerido'),    
        ),
    );

 }

  function getRegistroUsersRules(){
    return array(
        array(
                'field' => 'nombre',
                'label' => 'nombre',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'el campo %s es requerido' ),
        ),
        array(
                'field' => 'ap',
                'label' => 'Primer apellido',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'el campo %s es requerido'),    
        ),
        array(
                'field' => 'am',
                'label' => 'Segundo apellido',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'el campo %s es requerido'),    
        ),
        array(
                'field' => 'carrera',
                'label' => 'Carrera',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'el campo %s es requerido'),    
        ),
        array(
                'field' => 'grupo',
                'label' => 'Grupo',
                'rules' => 'required|trim|min_length[4]|max_length[6]',
                'errors' => array(
                    'required' => 'el campo %s es requerido',
                    'min_length' => 'el campo %s es debe tener minimo 4 caracteres',
                    'max_length' => 'el campo %s es debe tener maximo 6 caracteres'
                ),    
        ),
        array(
                'field' => 'matricula',
                'label' => 'Matricula',
                'rules' => 'required|trim|is_unique[usuarios.matricula]|min_length[10]',
                'errors' => array(
                    'required' => 'el campo %s es requerido',
                    'is_unique' => 'Esta %s ya esta registrada',
                    'min_length' => 'el campo %s es debe tener 10 caracteres'
                ),    
        ),
        array(
            'field' => 'telefono',
            'label' => 'telefono',
            'rules' => 'required|trim|max_length[10]|min_length[10]',
            'errors' => array(
                'required' => 'el campo %s es requerido',
                'min_length' => 'el campo %s es debe tener 10 caracteres',
                'max_length' => 'el campo %s es debe tener 10 caracteres'
            ),    
    ),
        array(
                'field' => 'contrasena',
                'label' => 'Contraseña',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'el campo %s es requerido'),    
        ),
    );

 }