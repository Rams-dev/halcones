<div class="container">
    <?php
    // var_dump($tutorias);
      if($status){
        echo '<div class="alert alert-primary" role="alert">
        <h1 class="text-center"> ¡Ya has sido liberado!</h1>
        </div>';
      }

      if(empty($tutorias)){
        echo '<div class="jumbotron jumbotron-fluid bg-info text-white text-center">
        <div class="container">
          <h1 class="display-4">Hola!</h1>
          <p class="lead"><p>Aún no se registran las tutorías, espera algunos dias más .</p>
        </div>
      </div>';
      }
    ?>
     <div class="row mt-5">
        <?php foreach($tutorias as $tutoria): ?>
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 p-2 <?= $tutoria['limite'] != "null" ? 'border-danger' : ""?>">
            <div class="jumbotron p-2 mb-2 bg-light">
              <h3 class="titulo-tutoria text-success mt-2"><?= $tutoria['nombre']; ?></h3>
              <p class="text-dark"><i class="fas fa-chalkboard-teacher"></i> <span class="font-weight-lighter text-dark"><?= $tutoria['encargado'];?></span></p>              
                  <hr class="my-3">
              <a href="<?= base_url('users/dashboarduser/detalles/'. $tutoria['id'])?>"  value="ver horarios" class="btn btn-success btn-lg btn-block">Ver horarios</a>
           </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

