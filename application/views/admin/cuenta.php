<div class="container">
    <!-- <?php 
    var_dump($datos);
    ?> -->
    <div class=" col-md-4">
        <form class="form-group" id="editarPerfil" action="">
            <div class="form-group edit">
                <input type="hidden" value="<?= $datos['id']?>" name="id">
            </div>
            <div class="form-group edit">
                <label for="nombre">nombre</label>
                <input type="text" name="nombre" class="form-control" value="<?= $datos['nombre']?>">
            </div>
            <div class="form-group edit">
                <label for="ap">Apellido paterno </label>
                <input type="text" name="ap" class="form-control" value="<?= $datos['apellido_p']?>">
            </div>
            <div class="form-group edit">
                <label for="am">Apellido Materno</label>
                <input type="text" name="am" class="form-control" value="<?= $datos['apellido_m']?>">
            </div>
            <div class="form-group edit">
                <label for="matricula">matricula o nombre de ususario</label>
                <input type="text" name="matricula" class="form-control" value="<?= $datos['matricula']?>">
            </div>
            <div class="form-group edit">
                <label for="contrasena">contraseña</label>
                <input type="text" name="contrasena" class="form-control" placeholder="*********">
            </div>
            <button class="btn btn-success">Editar</button>
        </form>
    </div>

</div>


<script>
    $(document).ready(function(){
        $('#editarPerfil').submit(function(e){
            e.preventDefault();
            var id= <?=$datos['id'];?>;
            var formData = $(this).serialize();

            $.ajax({
                method:'post',
                data: $(this).serialize(),id,
                dataType: 'json',
                url: '<?= base_url('admin/cuenta/editProfile') ?>',
            })
            .done(function(response){
                console.log(response.mensaje)
				alertify.success(response.mensaje);
                 setTimeout(function(){
				 	location.reload();
				 }, 1000)

            })
            .fail(function(err){
                alertify.error('nose')
                console.log('nose')

            })

        })

    })
</script>