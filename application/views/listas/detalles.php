<div class="container">
    <h1><?=$value?></h1>
    <div class="d-flex mr-auto p-4">
    <a href="<?=base_url('admin/listas/agregarListas')?>" class="btn btn-warning rounded-circle  ">+</a>
    </div>

   
    <div class="row">
        <?php foreach ($listas as $key) :?>
        <div class="col-lg-2 col-md-2 col-sm-6  mb-3">
            <a class="list-group-item bg-white h-100 card-pdf">
            <img src="<?=base_url('assets/img/pdf-img.png')?>" alt="" class="img-pdf">
                <h5><?=$value?></h5>
            </a>
        </div>
       
        <?php endforeach?>

    </div>

    
    <script>
        function eliminarListas(list_id){
            $.ajax({
                url: './elimiarListasPorCarrera',
                data:{list_id},
                type:'post'
            })
            .done(function(response){
                console.log(response)
            })
            .fail(function(err) {
                console.log(err)
            })


        }

    </script>

</div>

