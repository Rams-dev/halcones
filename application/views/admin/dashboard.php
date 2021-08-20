<div class="container">
  <?php 
        if(empty($tutorias)){
          echo '<div class="text-center">';
          echo "<h1>Aún no agregas tutorías</h1> <br>";
          echo " <p>Agrega una tutoría para que los alumnos puedan verla :)</h1></p>";
          echo '</div>';

        }
        // var_dump($tutorias);
  ?>

  
    <div class="row mt-5">  
      <?php foreach($tutorias as $tutoria): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 p-1 target" >
          <div class="card p-2 mb-1 <?= $tutoria['limite'] != "null" ? 'border border-warning' : ""?>">
            <div class="head-card">
                <span class="text-dark"><i class="fa fa-users"></i>  <?= isset($tutoria['numeroInscritos']) ? $tutoria['numeroInscritos'] : '0' ?></span>
              <button type="button" onclick="eliminarTutoria(<?=$tutoria['id'];?>)" class="close" data-toggle="tooltip" data-placement="top" title="Eliminar tutoria" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <h3 class="titulo-tutoria"><?= $tutoria['nombre']; ?></h3>
            <p class="text-dark"><i class="fa fa-user"></i> <span class="font-weight-lighter text-dark"><?= $tutoria['encargado'];?></span></p>
              <hr class="my-1">
              <div class="content-tutoria">
                  <p class="horarios-title">horarios</p>
                  <?= $tutoria['lunes'] != ' - ' ? ' <p class="horario"> <span>Lunes:</span> <span>'.$tutoria['lunes']. ' hrs </span> </p>' : ""?>
                  <?= $tutoria['martes'] != ' - ' ? '<p class="horario"> <span>Martes:</span> <span> '.$tutoria['martes']. ' hrs </span></p>' : ""?>
                  <?= $tutoria['miercoles'] != ' - ' ? '<p class="horario"> <span>Miercoles:</span> <span> '.$tutoria['miercoles']. ' </span> hrs </p>' : ""?>
                  <?= $tutoria['jueves'] != ' - ' ? '<p class="horario"> <span>Jueves:</span> <span> '.$tutoria['jueves']. ' hrs </span></p>' : ""?>
                  <?= $tutoria['viernes'] != ' - ' ? '<p class="horario"> <span>Viernes:</span> <span> '.$tutoria['viernes']. ' hrs </span></p>' : ""?>
                  <?= $tutoria['sabado'] != ' - ' ? '<p class="horario"> <span>Sabado:</span> <span> '.$tutoria['sabado']. ' hrs </span></p>' : ""?>
              </div>
            <a href="<?= base_url('admin/dashboard/inscritos/'. $tutoria['id'])?>"  value="ver horarios" class="btn btn-success btn-block btn-tutorias">Detalles</a>
          </div>
        </div>
      <?php endforeach;?>
    </div>
</div>

<script>

function eliminarTutoria(id){

  $.ajax({
    url: 'dashboard/eliminar_tutoria',
    type: 'POST',
    dataType: 'json',
    data:{id:id},
  })
  .done(function(response){
    console.log(response)
    alertify.success(response.mensaje);
  })
  .fail(function(error){
    alertify.error(error.mensaje);

  })
  .always(function(response){
      setTimeout(() => {
        window.location.replace(window.location.href)
     }, 1000);
   })
  
}

</script>