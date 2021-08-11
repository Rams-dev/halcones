<div class="container">
    <h1 class="text-center pb-4"><?=$carrera?></h1>
    <?php if(empty($listas)){?>

    <div class="alert alert-warning" role="alert">
        <h1 class="text-center">Aún no estan disponibles las listas</h1>
    </div>
    <?php }else{ ?>
    <div class="row">
        <?php foreach ($listas as $key) :?>
        <a class="col-lg-2 col-md-3 col-sm-3 mb-3 p-2 col-xs-3 list-item" target="_blank"
            href="<?=base_url('assets/pdf/listas/'.$key['lista'])?>">
            <div class="card card-pdf position-relative">
                <img src="<?=base_url('assets/img/pdf-img.png')?>" alt="<?=$key['lista']?>" class="img-pdf">
                <h5 class="list-name"><?=$key['lista']?></h5>
            </div>
        </a>
        <?php endforeach?>
    </div>
</div>
<?php } ?>