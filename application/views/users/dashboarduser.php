<div class="container">
  <h1 class="text-center m-0">Tutorías</h1>
    <?php
      if($status){?>
        <div class="alert alert-primary" role="alert">
        <h1 class="text-center"> ¡Ya has sido liberado!</h1>
        </div>
      <?php }?>

      <?php if(empty($tutorias)){?>
        <div class="jumbotron jumbotron-fluid bg-info text-white text-center">
        <div class="container">
          <h1 class="display-4">Hola!</h1>
          <p class="lead"><p>Aún no se registran las tutorías, espera algunos días más .</p>
        </div>
      </div>
      <?php } ?>

     <div class="row mt-5">
        <?php foreach($tutorias as $tutoria): ?>
          <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 p-1 <?= $tutoria['limite'] != "null" ? 'border-danger' : ""?>">
            <div class="card p-2 mb-1">
            <?php if($tutoria['limite'] != "null"){ ?>
              <span class="limite"> <span>Limite: </span><?=$tutoria['limite']?></span>
            <?php }?>
              <h3 class="titulo-tutoria "><?= $tutoria['nombre']; ?></h3>
              <hr class="my-0">
              <div class="content-tutoria">
                <p class="text-dark"><i class="fa fa-user"></i> <?= $tutoria['encargado'];?></p>              
                  <p class="horarios-title">horarios</p>
                  <?= $tutoria['lunes'] != ' - ' ? ' <p class="horario"> <span>Lunes:</span> <span>'.$tutoria['lunes']. ' hrs </span> </p>' : ""?>
                  <?= $tutoria['martes'] != ' - ' ? '<p class="horario"> <span>Martes:</span> <span> '.$tutoria['martes']. ' hrs </span></p>' : ""?>
                  <?= $tutoria['miercoles'] != ' - ' ? '<p class="horario"> <span>Miercoles:</span> <span> '.$tutoria['miercoles']. ' </span> hrs </p>' : ""?>
                  <?= $tutoria['jueves'] != ' - ' ? '<p class="horario"> <span>Jueves:</span> <span> '.$tutoria['jueves']. ' hrs </span></p>' : ""?>
                  <?= $tutoria['viernes'] != ' - ' ? '<p class="horario"> <span>Viernes:</span> <span> '.$tutoria['viernes']. ' hrs </span></p>' : ""?>
                  <?= $tutoria['sabado'] != ' - ' ? '<p class="horario"> <span>Sabado:</span> <span> '.$tutoria['sabado']. ' hrs </span></p>' : ""?>
              </div>

                  <?php if(!$isSignedUp){
                    if(isset($tutoria['numeroInscritos'])){
                        if($tutoria['limite'] == $tutoria['numeroInscritos']){?>
                      <button class="btn btn-danger btn-lg btn-block btn-tutorias" disabled>Tutoria LLena</button>
                    <?php } else{?>
                      <button class="btn btn-success btn-lg btn-block btn-tutorias" onclick="Inscribirme(<?= $tutoria['id'] ?>)">Inscribirme</button>
                    <?php }}else{?>
                      <button class="btn btn-success btn-lg btn-block btn-tutorias" onclick="Inscribirme(<?= $tutoria['id'] ?>)">Inscribirme</button>
                    <?php } } ?>

                    <?php if($tutoriaUser != null and $tutoriaUser->id == $tutoria['id'] ){?>
                      <p class="message-inscrito-tutorias"> Inscrito</p>

                    <?php }?>
           </div>
        </div>
        <?php endforeach;?>
    </div>
</div>

<script>

  let buttons = document.querySelectorAll('.btn-tutorias')

  function disableButtons(){
    buttons.forEach(button => {
      button.setAttribute('disabled',true)
      button.classList.add('btn-danger')
    });
  }

  function Inscribirme(tutoria_id){
    console.log(tutoria_id)
    disableButtons()
    $.ajax({
      url: '<?php echo base_url('users/dashboarduser/inscribirme/')?>',
      data: {tutoria_id},
      type: 'post'
    })
    .done(function(response){
      let res = JSON.parse(response)
      alertify.success(res.mensaje)
    })
    .fail(function(err){
      alertify.error("Ocurrio un error")
    })
    .always(function(response){
      setTimeout(() => {
        window.location.replace(window.location.href)

      }, 1000);
    })
  }

</script>
