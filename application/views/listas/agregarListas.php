<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
        <form action="<?= base_url('admin/listas/subirListas')?>" method="post" id="form-list" enctype="multipart/form-data">
            <div class="form-group">
                <label for="carrera ">Carrera</label>
                <select name="carrera" id="carrera" class="form-control">
                    <?php if($carrera){ ?>
                        <option value="<?=$carrera?>"><?=$carrera?></option>
                    <?php }else{?>
                    <option value="AGRICULTURA SUSTENTABLE Y PROTEGIDA">AGRICULTURA SUSTENTABLE Y PROTEGIDA</option>
                    <option value="DESARROLLO DE NEGOCIOS">DESARROLLO DE NEGOCIOS</option>
                    <option value="DISEÑO Y MODA INDUSTRIAL">DISEÑO Y MODA INDUSTRIAL</option>
                    <option value="ENERGíAS RENOVABLES">ENERGÍAS RENOVABLES</option>
                    <option value="GASTRONOMÍA">GASTRONOMÍA</option>
                    <option value="MECATRONICA">MECATRÓNICA</option>
                    <option value="PROCESOS ALIMENTARIOS">PROCESOS ALIMENTARIOS</option>
                    <option value="TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN">TECNOLOGÍAS DE LA INFORMACIÓN Y COMUNICACIÓN</option>
                    <?php }?>

                    </select>
            </div>
            <div class="form-group">
                <label for="Listas">Listas</label>
                <input type="file" name="listas[]" id="listas" class="dropify" multiple>
            </div>
            <button type="submit" class="btn btn-block btn-primary my-4">Subir <img src="<?= base_url('assets/SVG/svg-loaders/oval.svg')?>" alt="" class="loaderButton" id="loaderButton"></button>
        </form>
        </div>
    </div>
</div>

<script>
// $("#listas").dropify({
//     'default': "Arrastra o selecciona tus archivos",
// });

$('#form-list').submit(function(e){
    e.preventDefault()
    document.getElementById('loaderButton').style.display = 'inline-block'

     var formdata = new FormData($("#form-list")[0]);
     
      $.ajax({
          url:'subirListas',
          type:$("#form-list").attr("method"),
          data: formdata,
          cache: false,
          contentType: false,
          processData: false,
      })
      .done(function(response){
        console.log(response)
        let res = JSON.parse(response)
        //  console.log(res)
            if(res.success){
              alertify.success(res.success)
                  $('#form-list')[0].reset();
                      setTimeout(() => {
                      location.reload();
                  }, 2500);
            }
            if(res.error){
              alertify.error("error")
            }
        })
        .fail(function(err){
        alertify.error(err)
      })
      .always(function(res){
        document.getElementById('loaderButton').style.display = 'none'

      })
  })

</script>