
<div class="container">
    <h1 class="text-center pb-4"><?=$carrera?></h1>
    <?php if(empty($listas)){?>

<div class="alert alert-warning" role="alert">
    <h1 class="text-dark text-center">Aún no estan disponibles las listas</h1>
</div>
<?php }else{ ?>
    <div class="row">
        <?php foreach ($listas as $key) :?>
        <div class="col-lg-3 col-md-4 col-sm-6  mb-3">
            <a target= "_blank" href="<?=base_url('assets/pdf/listas/'.$key['lista'])?>" class="list-group-item bg-white card-pdf">
                    <img src="<?=base_url('assets/img/pdf-img.png')?>" alt="<?=$key['lista']?>" class="img-pdf">
                <h5 class="list-name"><?=$key['lista']?></h5>
            </a>
        </div>
        <?php endforeach?>
    </div>
</div>
<?php } ?>
