<div class="container">
    <div class="d-flex justify-content-end p-4">
        <a href="<?=base_url('admin/listas/agregarListas')?>" class="btn btn-warning rounded-circle"><i class="fa fa-plus"></i></a>
    </div>       

    <div class="row">
        <?php foreach ($carreras as $key => $value) :?>
            <a class="col-lg-3 col-md-4 col-sm-6 mb-3 p-2 col-xs-6 list-item" href="<?=base_url('admin/listas/carrera/'.$key)?>">
                <div class="card">
                   <h5 class="card-list-carrer-title"><?=$value?></h5>
                </div>
            </a>
        <?php endforeach?>
    </div>
</div>

