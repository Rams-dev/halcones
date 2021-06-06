<div class="container">
<h1 class="text-white text-center">Alumnos inscritos </h1>

<?php 
        if(empty($alumnos)){
            echo '<div class="container">';
            echo '<h2 class="mt-5 text-center"> Sin inscripciones </h2>';
            echo '</div>';

        }else{
        ?>
            <div class="d-flex justify-content-between align-items-end mb-2">
            <input type="text" class="form-control col-md-3 rounded-pill busquedad" placeholder="buscar..." id="busquedad">
            <a href="<?= base_url('admin/pdfTutoria/descargarAlumnosTutoria')?>" class="btn btn-default btn-sm " target="_blank">Imprimir pdf</a>
            </div>
            <div class="table p-0" id='tableAlumnos'>
        <table class="table table-bordered table-responsive" id="tabla">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Carrera</th>
                <th scope="col">Grupo</th>
                <th scope="col">Matrícula</th>
                <th scope="col">Tutoría</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Encargado de tutoría</th>
                <th scope="col">Estado</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Targeton</th>
                <th scope="col">restaurar contraseña</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php 
                

                ?>
                <?php
                $i=1;
                foreach($alumnos as $alumno):?>
                
                
                <td><?= $i++;?></td>
                <td><?= $alumno['nombre'];?></td>
                <td><?= $alumno['apellido_p']. ' '. $alumno['apellido_m'];?></td>
                <td><?= $alumno['carrera'];?></td>
                <td><?= $alumno['grupo'];?></td>
                <td><?= $alumno['matricula'];?></td>
                <td><?= $alumno['nombre_tutoria'];?></td>
                <td><?= $alumno['telefono'];?></td>
                <td><?= $alumno['encargado'];?></td>
                <td>
                <?php if(array_search($alumno['id'],$alumnosliberados)){?>   
                <button class="btn btn-success btn-sm" type="button"  >Liberado</button></td>
                <?php }else{?>
                <button class="btn btn-info btn-sm" type="button" id="liberar" onclick="liberar('<?= $alumno['id'];?>')">Liberar</button>
                <?php }?>
                </td>

                <td><button class="btn btn-danger btn-sm" onclick="eliminar('<?= $alumno['id'];?>')">Eliminar</button></td>
                <?php if(isset($alumno["0"])){?>
                <td><a target="_blank" class="btn btn-success btn-sm" href="<?= base_url('assets/pdf/targetones/'.$alumno['0'])?>">Entregado</a></td>
                <?php }else{?>
                <td><button class="btn btn-default btn-sm"> Sin entregar</button></td>                
                <?php }?>
                <td><button class="btn btn-default" onclick="restorePassword(<?= $alumno['id'];?>)"><i class="fa fa-window-restore"></i></button></td>
                </tr>
                <?php endforeach;?>
            </tbody>
         </table>
        <?php } ?>
</div>
</div>

<script>
    const table = document.querySelector("#tabla").tBodies[0];
     $('#busquedad').keyup(function(e){
        e.preventDefault()
        var value= e.currentTarget.value
        var r=0;
        while(row = table.rows[r++])
        {
        if ( row.innerText.toLowerCase().indexOf(value) !== -1 )
            row.style.display = null;
        else
            row.style.display = 'none';
        }


    })

    function eliminar(id){
        var alumno_id = id;

        $.ajax({
            url: '<?php echo base_url('admin/alumnos/eliminar')?>',
            type: 'POST',
            data: {id:alumno_id},
            dataType: 'JSON',
        })
        .done(function(data){
            alertify.success(data.mensaje);
                location.reload();
            
        })
        .fail(function(fail){
            alertify.error(fail.mensaje);

        })
        .always(function(data){

        });

    }


    function liberar(id){
        var alumno_id = id;
        
        $.ajax({
            url: '<?php echo base_url('admin/alumnos/liberar')?>',
            type: 'POST',
            data: {id:alumno_id},
            dataType: 'JSON',
        })
        .done(function(data){
            alertify.success(data.mensaje);
                location.reload();
          
        })
        .fail(function(fail){
            alertify.error(fail.mensaje);

        })
        .always(function(data){

        });

        
    }

    function restorePassword(id){
            $.ajax({
                url:'alumnos/restorePassword',
                data:{id},
                type:'post'
            })
            .done(function(res){
                let response = JSON.parse(res)
                alertify.success(response.mensaje)
            })
            .fail(function(err){
                alertify.error(err)
            })
        }



</script>