<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mi targerton</title>
</head>
<body>
<?php
//var_dump($datosAlumno);
foreach($datosAlumno as $datos){
}
?>
<div class="row">
<div class="justify-content-center" style="width:48%; border:1px solid #000;">
<table class="table table-bordered" style="width:98%; margin:10px;">
 
    <tr>
      <th scope="col">FECHA</th>
      <th scope="col">FIRMA</th>
    </tr>
    <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr> <tr>
      <td></td>
      <td></td>
    </tr>
</table> 
    <div class="row">
     <div class="" style="width:48%; margin-left:25px; margin-top:30px;">
         <p style="font-size:13px;"><small><b>LIC. JOSÉ ÁNGEL JINEZ GASPAR</b></small></p>
         <span><small style="font-size:10px; line-height:.3px;">Encargado de el area de Activiades Culturales Y Deportivas de la utvco</small></span>
     </div>
     <div class="" style="width:40%; float:right;">
         <h6 style="margin-top:45px;">firma del tutor</h6>
     </div>
    </div>   
</div>


<div class="" style="float:right; width:51%; border:1px solid #000; height:72.2%;">
<div class=""style="margin-top:25; margin-left:150px; width: 20%; height: 10%; border:1px solid #000;" >
<p class="">Insertar fotografia</p>
</div><br>
<div class="" style="margin-left: 100px;">
<label ><b> Nombre: </b></label><br>
<?php

echo '<p style="text-decoration: underline;">' .$datos['nombre']. ' '. $datos['apellido_p']. ' '. $datos['apellido_m'] . '</p>'; 
?><br>
<label> <b>Matricula: </b></label><br>
<?= '<p style="text-decoration: underline;">' .$datos['matricula']. '</p>';?><br>
<label> <b>Grupo: </b></label><br>
<?= '<p style="text-decoration: underline;">' . $datos['grupo']. '</p>';?><br>
<label> <b>Actividad: </b></label><br>
<?= '<p style="text-decoration: underline;">' . $datos['nombre_tutoria']. '</p>';?><br>
<label ><b>Encargado (a) de actividad: </b></label><br>
<?= '<p style="text-decoration: underline;">' . $datos['encargado']. '</p>';?><br>
</div>
</div>
</div>
<hr>

<div class="container" style="width:75%; margin-top:50px;">
<p style="font-size:11px; font-style: italic;"><b> Instrucciones:</b> <br> <br>
1.-Recorta la parte inferior de la hoja.<br>
2-.Dobla la hoja por la mitad y pégala.<br>
3.-Solicita que tu tutor firme en la parte inferior derecha la tarjeta de asistencia. (No se aceptara el tarjetón<br>
para la liberación sin la firma del tutor).<br>
4.-Por cada asistencia el responsable de la actividad deberá registrar en tu tarjeta la fecha y su firma. (En caso<br>
de haber solicitado permiso, hacer la anotación en el tarjetón en la fecha que fue solicitado el permiso)<br>
5.-Al finalizar el cuatrimestre deberás entregar esta tarjeta al Área de Actividades Culturales y Deportivas para tu liberación, la cual deberá estar en buen estado.<br></p>
</div>
</body>
</html>