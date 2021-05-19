<?php
     foreach ($tutorias as $limite ) {
       $quedan = intval($limite['limite']) - $totalinscritos ;
      }
?>
<div class="container">
<div class="">
<h1 class="text-white text-center display-3"><?= $limite['nombre'];?></h1>
<?php if($limite['limite'] != 0){
echo '<small class="display-5 float-right"><span  id = "quedan" class="badge badge-pill badge-danger">Quedan: '. $quedan .'</span></small>';
echo '<small class="display-5 float-left"><span class="badge badge-pill badge-secondary">Limite: '. $limite['limite'] .'</span></small>';
 }?>
<table class="table table-bordered text-white">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col">Lunes</th>
      <th scope="col">Martes</th>
      <th scope="col">Miercoles</th>
      <th scope="col">Jueves</th>
      <th scope="col">Viernes</th>
      <th scope="col">Sabado</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach($tutorias as $tutoria):?>
      <td scope="col"> Hora</td>
      <td><?= $tutoria['lunes'];?></td>
      <td><?= $tutoria['martes'];?></td>
      <td><?= $tutoria['miercoles'];?></td>
      <td><?= $tutoria['jueves'];?></td>
      <td><?= $tutoria['viernes'];?></td>
      <td><?= $tutoria['sabado'];?></td>
      
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<div class="row justify-content-center">
  
  <?php if($limite['limite'] != 0){
    if($quedan <= 0){
      echo '<button class="btn btn-warning disable">lleno</button>'; 
    }else{?>
      <button id="inscribirme" class="btn btn-info <?= $usertutoria ? 'btn-danger disabled' : 'btn-info';?>">Inscribirme</button> 
  <?php } }else{ ?>
<button id="inscribirme" class="btn btn-info <?= $usertutoria ? 'btn-danger disabled' : 'btn-info';?>">Inscribirme</button> 
  <?php } ?>
</div>
</div>
</div>
<?php foreach ($tutorias as $value) {
  $limite = $value['limite'];
}
?>

<script>
$(document).ready(function(){
  var limite = <?= $limite;?>;
  var alumnoinscrito = <?php echo $id;?>;
  if(<?= $quedan;?> <= 0 && limite != null ){
    $('#inscribirme').removeClass('btn btn-info');
    $('#inscribirme').addClass('btn btn-warning')
    $('#inscribirme').html('Cupo lleno');
  }
  
  $('#inscribirme').click(function(ev){
    // ev.preventDefault();
    if(<?= $quedan;?> == 0 && limite != null){
      alertify.error('Lo siento esta tutoria esta completa');
    }else{
    var id = <?php echo $tutoria['id'];?>;
    var alumnoinscrito = <?= $id?>

    if(alumnoinscrito == 0){
    $.ajax({
						type:'post',
						url:'<?php echo base_url('users/dashboarduser/inscribirme/')?>',
						data: {tutoria_id:id},
            dataType:'JSON',
            statusCode: {
              400: function(xhr){
                var json = JSON.parse(xhr.responseText);
                console.log(json);
    						alertify.error(json.error);

              }
            }
					})
					.done(function(data){
            alertify.success(data.mensaje);
              $('#inscribirme').removeClass('btn-info');
              $('#inscribirme').addClass('btn-danger disabled');
              var quedan = <?= $quedan;?>-1;
              $('#quedan').html('Quedan: '+ quedan);
          })
					.fail(function(data){
            console.log(data);
						alertify.error(data.error);

					})
					.always(function(data){


          });
        }
      }
          
        
  })


});
</script>