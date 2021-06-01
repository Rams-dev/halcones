<div class="container">
    <h1 class="text-center pb-4"><?=$carrera?></h1>
<!-- <?php var_dump($listas)?>  -->
<?php if(empty($listas)){?>
<div class="alert alert-warning" role="alert">
    <h1 class="text-dark text-center">Aún no has subido listas en esta sección</h1>
</div>
<?php }else{ ?>
  
    <div class="row">
        <?php foreach ($listas as $key) :?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <button type="button" onclick="eliminarLista(<?=$key['id'];?>)" class="close m-2" data-toggle="tooltip" data-placement="top" title="Eliminar lista" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    <a target= "_blank" href="<?=base_url('assets/pdf/listas/'.$key['lista'])?>" class="bg-dark">
                        <img src="<?=base_url('assets/img/pdf-img.png')?>" alt="<?=$key['lista']?>" class="img-pdf">
                        <h5 class="list-name"><?=$key['lista']?></h5>
                        </a>
                    </div>
        <?php endforeach?>
    </div>
</div>
<?php } ?>


<script >

    function eliminarLista(id){
        $.ajax({
            url:'../eliminarLista',
            data:{id},
            type: 'post'
        })
        .done(function(response){
            console.log(response)
        })
    }


</script>