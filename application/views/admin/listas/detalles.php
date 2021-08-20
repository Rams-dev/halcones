<div class="container">
    <h1 class="text-center pb-4"><?= $carrera ?></h1>
    <!-- <?php var_dump($listas) ?>  -->
    <?php if (empty($listas)) { ?>
        <div class="alert alert-warning" role="alert">
            <h1 class="text-dark text-center">Aún no has subido listas en esta sección</h1>
        </div>
    <?php } else { ?>

        <div class="d-flex justify-content-end">
            <button class="btn btn-danger" onclick="eliminarListas('<?= $id_carrera?>')">Eliminar todo</button>
        </div>

        <div class="row">
            <?php foreach ($listas as $key) : ?>
                <a class="col-lg-2 col-md-3 col-sm-3 mb-3 p-2 col-xs-3 list-item" target="_blank" href="<?= base_url('assets/pdf/listas/' . $key['lista']) ?>">
                    <div class="card card-pdf position-relative">
                        <button type="button" onclick="eliminarLista(<?= $key['id']; ?>)" class="close ml-auto" data-toggle="tooltip" data-placement="top" title="Eliminar lista" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <img src="<?= base_url('assets/img/pdf-img.png') ?>" alt="<?= $key['lista'] ?>" class="img-pdf">
                        <h5 class="list-name"><?= $key['lista'] ?></h5>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
</div>
<?php } ?>
<script>

    function eliminarListas(carrera){
        // console.log(carrera)

        $.ajax({
                url: '../eliminarListas',
                data: {
                    carrera:carrera
                },
                type: 'post'
        })
        .done(function(response) {
            let res = JSON.parse(response);
            alertify.success(res.mensaje)
        })
        .fail(function(err){
            alertify.error('ocurrio un error' + err)
        })
        .always(function(res){
            setTimeout(() => {
                window.location.replace(window.location.href)
            }, 1000);

        })


    }


    function eliminarLista(id) {
        console.log(id)
        $.ajax({
                url: '../eliminarLista',
                data: {
                    id: id
                },
                type: 'post'
            })
            .done(function(response) {
                let res = JSON.parse(response)
                alertify.success(res.mensaje)
                setTimeout(() => {
                    location.reload();
                }, 1000);

            })
            .fail(function(err) {
                alertify.error(response.error)
            })
    }
</script>