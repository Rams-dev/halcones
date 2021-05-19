
<?php var_dump($datos);?>

<div class="container mt-3">
    
    <h1 class="text-center" >Registro de alumnos</h1>
    <div class="row justify-content-lg-between mt-5">
        <div class="col-lg-4">
            <form action="<?= base_url("users/cuenta/actualizarUsuario/".$datos['id'])?>" method="post" id="frm-update" >
                <div class="form-group" id="nombre">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?=$datos['nombre']?>" class="form-control" placeholder="Juan">
                    <div class="invalid-feedback" id="error">
                    </div>                
                </div>

                <div class="form-group" id="ap">
                    <label for="">Primer Apellido</label>
                    <input type="text" name="apellido_p" id="apellido_p" class="form-control" value="<?=$datos['apellido_p']?>" placeholder="Hernandez">
                    <div class="invalid-feedback" id="error">
                    </div>                
                </div>

                <div class="form-group" id="am">
                    <label for="">Segundo Apellido</label>
                    <input type="text" name="apellido_m" id="apellido_m" class="form-control" value="<?=$datos['apellido_m']?>" placeholder="Ramirez">
                    <div class="invalid-feedback" id="error">

                    </div>                
                </div>

                <div class="form-group" id="carrera">
                    <label for="">Carrera</label>
                    <select name="carrera" id="carrera" class="form-control">
                    <option value="<?= $datos['carrera']?>"><?= $datos['carrera']?></option>
                    </select>
                    <div class="invalid-feedback" id="error">
                    </div>                
                </div>
                </div>

                <div class="col-lg-4">
                <div class="form-group" id="grupo">
                    <label for="">Grupo</label>
                    <input type="text" name="grupo" id="grupo" class="form-control" value="<?=$datos['grupo']?>" placeholder="T101">
                    <div class="invalid-feedback" id="error">

                    </div>                
                </div>

                <div class="form-group" id="matricula">
                    <label for="">Matricula</label>
                    <input type="text" name="matricula" id="matricula"  class="form-control" value="<?=$datos['matricula']?>" placeholder="UTTI162038">
                    <div class="invalid-feedback" id="error">
                    </div>                
                </div>

                <div class="form-group" id="telefono">
                    <label for="">número telefónico</label>
                    <input type="phone" name="telefono" id="telefono"  class="form-control" value="<?=$datos['telefono']?>" placeholder="9511986720">
                    <div class="invalid-feedback" id="error">
                    </div>                
                </div>

                <div class="form-group" id="contrasena">
                    <label for="">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" class="form-control">
                    <div class="invalid-feedback" id="error"></div>                
                </div>
                
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" value="Actualizar" id="registrar" class="btn btn-primary mt-5" >
        </div>
        
        </form>

</div>

<script src="<?=base_url()?>assets/js/auth/alumnos.js"></script>
<script src="<?php echo base_url()?>assets/js/auth/mask.js"></script>

