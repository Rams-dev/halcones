<div class="container">
    <div class="row mt-5">
        <div class="col-lg-6 col-md-6 col-sm-6 ">
            <div class="card bg-ligh4 px-3">
                <h1 class="text-success">Descargar targeton</h1>
                <hr class="my-4">
                <a class="content-target" target="_blank" href="<?= base_url('users/Targeton/descargarTargeton/') ?>">
                    <img src="<?= base_url('assets/img/pdf-img.png') ?>" class="img-download-targeton" alt="">
                    <a target="_blank" href="<?= base_url('users/Targeton/descargarTargeton/') ?>" value="ver horarios" class="btn btn-primary btn-download" type="button">
                        <span class="fa fa-download"></span> Descargar
                    </a>
                </a>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 " id="subir_targeton">
            <div class="card bg-light px-4">
                <h1 class="text-success">Subir targeton</h1>
                <div class="input-group mb-3">
                    <form action="<?= base_url('users/targeton/cargar_targeton') ?>" method="post" id="form_subir" enctype="multipart/form-data">
                        <input type="file" class="dropify" name="targeton" id="targeton" data-height="200" data-allowed-file-extensions="pdf" />
                        <hr class="my-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" id="subir">
                            <span class="fa fa-upload"></span>
                            Subir targeton
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.dropify').dropify();
    $(document).ready(function() {

        $('#form_subir').submit(function(ev) {
            ev.preventDefault();
            if ($('#targeton').val() == '') {
                alertify.error("No te hagas el imbecil y añade tu targeton");
            } else {
                let formdata = new FormData($("#form_subir")[0]);
                $.ajax({
                        url: 'targeton/cargar_targeton',
                        type: "post",
                        data: formdata,
                        cache: false,
                        contentType: false,
                        processData: false,
                        statusCode: {
                            400: function(xhr) {
                                var json = JSON.parse(xhr.responseText);
                                console.log(json);
                                alertify.error(xhr.errors);
                                console.log(typeof(xhr.errors))
                            }
                        }
                    })
                    .done(function(data) {
                        console.log(data)
                        res = JSON.parse(data)
                        alertify.success(res.mensaje);
                    })
                    .fail(function(error) {
                        res = JSON.parse(data)
                        alertify.error(error.fail);

                    })
                    .always(function(data) {})
            }
        });
    })
</script>