
<h1 class="text-center my-5">Registro de profesores</h1>
<div class="container">
    
    <?php 
        if(isset($matricula)){ 
            var_dump(($matricula));
         ?>
         <div class="alert alert-info text-center" role="alert">
            <p>Esta es tu matricula, anotala para iniciar sesion</p>
            <h2><?php echo $matricula?></h2>
            <a href="<?=base_url('login')?> "class="btn btn-outline-success">iniciar sesion</a>
        </div>
            <div></div>
         <?php 
            } else {
        ?>
    <div class="row justify-content-center mt-4">
        <form action="<?= base_url('Profesores/validateRegistro')?>" class="form-group col-lg-4 col-md-4 col-sm-10" id="frm-register-prof" method="post">
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="form-group">
                <label for="name">Apellido Paterno</label>
                <input type="text" class="form-control" name="apellido_p" id="apellido_p">
            </div>
            <div class="form-group">
                <label for="name">Apellido Materno</label>
                <input type="text" class="form-control" name="apellido_m" id="apellido_m">
            </div>
            <div class="form-group">
                <label for="carrera">Carrera</label>
                <select name="carrera" id="carrera" class="form-control">
                    <option value="AGRICULTURA SUSTENTABLE Y PROTEGIDA">AGRICULTURA SUSTENTABLE Y PROTEGIDA</option>
                    <option value="DESARROLLO DE NEGOCIOS">DESARROLLO DE NEGOCIOS</option>
                    <option value="DISEÑO Y MODA INDUSTRIAL">DISEÑO Y MODA INDUSTRIAL</option>
                    <option value="ENERGIAS RENOVABLES">ENERGÍAS RENOVABLES</option>
                    <option value="GASTRONOMIA">GASTRONOMÍA</option>
                    <option value="MECATRONICA">MECATRÓNICA</option>
                    <option value="PROCESOS ALIMENTARIOS">PROCESOS ALIMENTARIOS</option>
                    <option value="TECNOLOGIAS DE LA INFORMCION Y COMUNICACION">TECNOLOGÍAS DE LA INFORMCIÓN Y COMUNICACIÓN</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Grupo</label>
                <input type="text" class="form-control" name="grupo" id="grupo">
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" id="contrasena">
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary my-4 mx-auto">Registrarse</button>
                <a href="<?= base_url('')?>" class="btn btn-info my-4 mx-auto">Inicias sesion</a>
            </div>

        </form>
    </div>
<?php }?> 

</div>

<script>

let $nombre = document.querySelector("#nombre")
let $ap = document.querySelector("#apellido_p")
let $am = document.querySelector("#apellido_m")

const check = (e) => {
    e.preventDefault()
    let nombre = e.target.value.replace(/[<>!?¿$#%&/()=*]/g,'')
    e.target.value = nombre
    
    // console.log(e.target.value)
}
$nombre.addEventListener('keyup', (e) => check(e))
$ap.addEventListener('keyup', (e) => check(e))
$am.addEventListener('keyup', (e) => check(e))

</script>
