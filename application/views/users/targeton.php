<div class="container">
    <div class="row">
        <div class="col-lg-6 mt-5 h-100 d-inline-block">
        <div class="jumbotron bg-light">
        <h1 class="display-4 text-muted">Descargar targeton</h1>
        <p class="lead"></p>
        <p class="font-weight-lighter"></p>
        <hr class="my-4">
        <a target="_blank" href="<?= base_url('users/Targeton/descargarTargeton/')?>"  value="ver horarios" class="btn btn-primary btn-lg btn-block " type="button"><span class="fa fa-download"></span> Descargar</a>
        </div>
        </div>

        <div class="col-lg-6 mt-5" id="subir_targeton">
        <div class="jumbotron bg-light">
        <h1 class="display-4 text-muted">Subir targeton</h1>
        <p class="lead"></p>
        <p class="font-weight-lighter"></p>
        <div class="input-group mb-3">
             <form action="<?=base_url('users/targeton/cargar_targeton')?>" method="post" id="form_subir" enctype="multipart/form-data">
            <input type="file" class="mt-5" id="targeton" name="targeton">
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

 <script >
// $(document).ready(function(){
 
//     $('#form_subir').submit(function(ev){
//         ev.preventDefault();
//              var targeta = $('#targeton');
//             if(targeta == ''){
//                  alertify.error("No te hagas el imbecil y añade tu targeton");
//              }else{
//          $.ajax({
//              url: '<?= base_url('users/targeton/cargar_targeton')?>',
//              data: {targeton: targeta},
//              dataType: 'JSON',
//              type: 'POST',
//              statusCode: {
//                400: function(xhr){
//                  var json = JSON.parse(xhr.responseText);
//                  console.log(json);
//      			alertify.error(xhr.errors);
//                  console.log(typeof(xhr.errors))
//                }
//              }
//          })
//          .done(function(data){
//              alertify.success(data.mensaje);
//          })
//          .fail(function(error){
//              alertify.error(error.fail);

//          })
//          .always(function(data){

//          })
//          }
//      });
//  })


</script>