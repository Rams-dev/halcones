<div class="container">

    <div class="row">
        <?php foreach ($carreras as $key => $value) : ?>
            <a class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-3 p-2 list-item" href="<?= base_url('profesores/carrera/' . $key) ?>">
                <div class="card">
                    <h5 class="card-list-carrer-title"><?= $value ?></h5>
                </div>
            </a>
        <?php endforeach ?>
    </div>
</div>