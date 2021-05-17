<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista</title>
    <style>
        body{
            font-family: 'poppins';
        }
        .nombre{
            display: block;
            text-align: center;
        }
        .encargado{
            display: block;
            

        }
        .thead-success{
            background: #158050;
            color: white;
        }
        .table{
            font-size: 14px;
        }

    </style>
</head>
<body>
    <?php foreach($inscritos as $dato){
    } ?>

        <h1 class="nombre"><?=$dato['nombre_tutoria'];?></h1>
        <hr>
        <h4 class="encargado">Encargado: <u><?=$dato['encargado'];?></u></h4>
        <h5>Dias</h5>
         <p> <?php
            if(strlen($dato['lunes']) > 3){
               echo 'lunes: '. $dato['lunes'] .'<br>';
            }
            if(strlen($dato['martes']) > 3){
                echo 'martes: '. $dato['martes'].'<br>';
            }
            if(strlen($dato['miercoles']) > 3){
                echo 'miercoles: '. $dato['miercoles'].'<br>';
            }
            if(strlen($dato['jueves']) > 3){
                echo 'jueves: '. $dato['jueves'].'<br>';
            }
            if(strlen($dato['viernes']) > 3){
                echo 'viernes: '. $dato['viernes'].'<br>';
            }
        ?></p>




    </div>
    <table class="table table-bordered">
  <thead class="thead-success">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Grupo</th>
      <th scope="col">carrera</th>
      <th scope="col">Teléfono</th>
    </tr>
  </thead>
  <tbody>
      <?php $val = 1;
      foreach($inscritos as $Alumno): ?>
        
      <tr>
      <th scope="row"><?php echo $val;?></th>
      <td><?=$Alumno['nombre'];?></td>
      <td><?=$Alumno['apellido_p'] . " " .$Alumno['apellido_m'] ;?></td>
      <td><?=$Alumno['grupo'];?></td>
      <td><?=$Alumno['carrera'];?></td>
      <td><?=$Alumno['telefono'];?></td>
      </tr>
    <?php $val++;
     endforeach;
      ?>
  </tbody>
</table>
</body>
</html>