<div class="container">
<div class="d-flex mr-auto p-4">
    <a href="<?=base_url('admin/listas/agregarListas')?>" class="btn btn-warning rounded-circle"><i class="fa fa-plus"></i></a>
</div>       
<div class="row">
    <?php foreach ($carreras as $key => $value) :?>
    <div class="col-lg-3 col-md-4 col-sm-6  mb-3 p-2">
        <a href="<?=base_url('admin/listas/carrera/'.str_replace(" ",'_',$value))?>" class="list-group-item bg-white h-100">
            <h5><?=$value?></h5>
        </a>
    </div>
    <?php endforeach?>
</div>
</div>

