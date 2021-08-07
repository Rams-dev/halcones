<div class="container">
  <?php 
        if(empty($tutorias)){
          echo '<div class="text-center">';
          echo "<h1>Aún no agregas tutorías</h1> <br>";
          echo " <p>Agrega una tutoría para que los alumnos puedan verla :)</h1></p>";
          echo '</div>';

        }
  ?>
    <div class="row mt-5">  
      <?php foreach($tutorias as $tutoria): ?>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 p-1 target" >
          <div class="card p-2 mb-1 ">
            <button type="button" onclick="eliminarTutoria(<?=$tutoria['id'];?>)" class="close" data-toggle="tooltip" data-placement="top" title="Eliminar tutoria" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="titulo-tutoria text-success"><?= $tutoria['nombre']; ?></h3>
            <p class="text-dark"><i class="fa fa-user"></i> <span class="font-weight-lighter text-dark"><?= $tutoria['encargado'];?></span></p>
              <hr class="my-3">
            <a href="<?= base_url('admin/dashboard/inscritos/'. $tutoria['id'])?>"  value="ver horarios" class="btn btn-success btn-block btn-tutorias">Detalles</a>
          </div>
        </div>
      <?php endforeach;?>
    </div>
</div>

<script>

function eliminarTutoria(id){
  console.log(id);

  $.ajax({
    url: 'dashboard/eliminar_tutoria',
    type: 'POST',
    dataType: 'json',
    data:{id:id},
  })
  .done(function(data){
    alertify.success(data.mensaje);
    setTimeout(() => {
      location.reload();
    }, 1000);
  })
  .fail(function(error){
    alertify.error(error.mensaje);

  })
  .always(function(data){
  location.reload();


  });
}

</script>