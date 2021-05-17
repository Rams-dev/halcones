<div class="container mt-3">
    
    <h1 class="text-center" >Registro de alumnos</h1>
    <div class="row justify-content-lg-between mt-5">
        <div class="col-lg-4">
            <form action="<?= base_url("login/registrarUsuario")?>" method="post" id="registroUsuarios" >
                <div class="form-group" id="nombre">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Juan">
                    <div class="invalid-feedback" id="error">

                    </div>                
                </div>

                <div class="form-group" id="ap">
                    <label for="">Primer Apellido</label>
                    <input type="text" name="apellido_p" id="apellido_p" class="form-control" placeholder="Hernandez">
                    <div class="invalid-feedback" id="error">

                    </div>                
                </div>

                <div class="form-group" id="am">
                    <label for="">Segundo Apellido</label>
                    <input type="text" name="apellido_m" id="apellido_m" class="form-control" placeholder="Ramirez">
                    <div class="invalid-feedback" id="error">

                    </div>                
                </div>

                <div class="form-group" id="carrera">
                    <label for="">Carrera</label>
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
                    <div class="invalid-feedback" id="error">

                    </div>                
                </div>
                </div>

                <div class="col-lg-4">
                <div class="form-group" id="grupo">
                    <label for="">Grupo</label>
                    <input type="text" name="grupo" id="grupo" class="form-control" placeholder="T101">
                    <div class="invalid-feedback" id="error">

                    </div>                
                </div>

                <div class="form-group" id="matricula">
                    <label for="">Matricula</label>
                    <input type="text" name="matricula" id="matricula"  class="form-control" placeholder="UTTI162038">
                    <div class="invalid-feedback" id="error">
                    </div>                
                </div>

                <div class="form-group" id="telefono">
                    <label for="">número telefónico</label>
                    <input type="phone" name="telefono" id="telefono"  class="form-control" placeholder="9511986720">
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
            <input type="submit" value="Registrarme" id="registrar" class="btn btn-primary mt-5" >
        </div>
        
        </form>

</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script> -->
<script src="<?=base_url('assets/js/auth/registro.js')?>"></script>
<script src="<?php echo base_url()?>assets/js/auth/mask.js"></script>
