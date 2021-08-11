<?php

     $count = 0;
     foreach ($tutoria as $limite ) {
     }
?>

<div class="container">
    <div class="text-center"> 
        <h1 class="text-white ">Inscritos a <?= $limite['nombre'];?> </h1>
        <?php if($limite['limite'] != "null"){?>
            <small class="text-warning d-block">limite: <?php echo $limite['limite'];?></small>
        <?php }?>
        <?php 
        if(empty($inscritos)){
            echo '<div class="container">';
            echo '<h2 class="mt-5 text-center"> Sin inscripciones </h2>';
            echo '</div>';

        }else{
        ?>
    </div>
    <div class="d-flex justify-content-between align-items-end">
        <div>
            <b class="d-block"> Días:</b>
    <?php
    
                    if ($limite['lunes'] > 3){
                    echo '<small>Lunes: '. $limite['lunes'] .' </small><br>';
                    }
                    if ($limite['martes'] > 3){
                        echo '<small>Martes: '. $limite['martes'] .' </small><br>';
                    }
                    if ($limite['miercoles'] > 3){
                        echo '<small>Miercoles: '. $limite['miercoles'] .' </small><br>';    
                    }
                    if ($limite['jueves'] > 3){
                        echo '<small>Jueves: '. $limite['jueves'] .' </small><br>';
                    }
                    if ($limite['viernes'] > 3){
                        echo '<small>Viernes: '. $limite['viernes'] .' </small>';
                    }
                    if ($limite['sabado'] > 3){
                        echo '<small>Sabado: '. $limite['sabado'] .' </small>';
                    }
                   
                ?>
    </div>
<div class="">
    <a href="<?= base_url('admin/pdfTutoria/descargarListaAlumnosPorTutoria/'.$limite['id'] )?>" class="btn btn-default btn-sm mt-5 mb-2" target="_blank">Imprimir pdf</a>
</div>

    </div>
<div class="table" id="table">
            <table class="table table-responsive table-bordered">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellios</th>
                <th scope="col">Carrera</th>
                <th scope="col">Grupo</th>
                <th scope="col">Matrícula</th>
                <th scope="col">Télefono</th>
                <th scope="col">Encargado de tutorpia</th>
                <th scope="col">Quitar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                $i=1;
                foreach($inscritos as $alumno):?>
                <td><?= $i++;?></td>
                <td><?= $alumno['nombre'];?></td>
                <td><?= $alumno['apellido_p']. ' '. $alumno['apellido_m'];?></td>
                <td><?= $alumno['carrera'];?></td>
                <td><?= $alumno['grupo'];?></td>
                <td><?= $alumno['matricula'];?></td>
                <td><?= $alumno['telefono'];?></td>
                <td><?= $alumno['encargado'];?></td>
                <td><button class="btn btn-danger" id="quitar" onclick="quitar(<?= $alumno['id'];?>)">Quitar</button></td>
                </tr>
                <?php endforeach;?>
            </tbody>
         </table>
            </div>
                <?php } ?>
    </div>
</div>
<script>
        function quitar(id){
        var alumno_id = id;

        $.ajax({
            url: '<?php echo base_url('admin/alumnos/removefromtutoria')?>',
            type: 'POST',
            data: {id:alumno_id},
            dataType: 'JSON',
        })
        .done(function(data){
            location.reload();
            sleep(5000)
            alertify.success(data.mensaje);
            
        })
        .fail(function(fail){
            alertify.error(fail.mensaje);

        })
        .always(function(data){

        });

    }
</script>