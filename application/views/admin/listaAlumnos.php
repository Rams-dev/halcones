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
            font-family: sans-serif;
        }
        .encargado{
            display: block;
            

        }
        .thead-success{
            background: #158050;
            color: white;
        }
         .table{
            font-size: 13px;
            max-width: 100%;

        }
        .table > td{
            width: auto;
            height: auto;
        }

    </style>
</head>
<body>
        <h3 class="nombre">Lista de alumnos registrados a tutorías</h3>
        <hr>
  <table class="table table-bordered table-striped">
  <thead class="thead-success">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Grupo</th>
      <th scope="col">carrera</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Tutoría</th>
      <th scope="col">Encargado</th>
      <th scope="col">Estado</th>
    </tr>
  </thead>
  <tbody>
      <?php $val = 1;
      foreach($alumnos as $datos): ?>
        
      <tr>
      <th scope="row"><?php echo $val;?></th>
      <td><?=$datos['nombre'];?></td>
      <td><?=$datos['apellido_p'] . " " .$datos['apellido_m'] ;?></td>
      <td><?=$datos['grupo'];?></td>
      <td><?=$datos['carrera'];?></td>
      <td><?=$datos['telefono'];?></td>
      <td><?=$datos['nombre_tutoria'];?></td>
      <td><?=$datos['encargado'];?></td>
      <td>
      <?php if(array_search($datos['id'],$alumnosliberados)){?>   
                <p >Liberado</p>
                <?php }else{?>
                <p style="color: red; ">No liberado</p>
                <?php }?>
      </td>
      </tr>
    <?php $val++;
     endforeach;
      ?>
  </tbody>
</table>
</body>
</html>