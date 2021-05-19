<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6 mt-5">
            <form action="<?php echo base_url('admin/agregartutoria/addTutoria')?>" method="POST" id="f-add-tutoria" class="form-group">
                <div class="form-group" id="tutoria">
                <label for="">Nombre de la tutoría</label>
                    <input type="text" name="tutoria" id="tutoria" class="form-control">
                    <div class="invalid-feedback" id="error"></div>
                 </div>
            
                <div class="form-group" id="encargado">
                    <label for="">Encargado de la tutoría</label>
                    <input type="text" name="encargado" id="encargado" class="form-control">
                <div class="invalid-feedback" id="error"></div>

                <div class="col-lg-12 col-md-12 mt-5 p-0">
                    <input type="checkbox" name="lim" id="lim" class="mb-3"><b> Limitar</b> <br>
                    <div class="form-group" id="limite">
                        <label for="" class="mt-2">Número límite de alumnos</label>
                        <input type="number" name="limit" id="limit"  class="form-control col-md-2 float-right" ><br>
                    </div>
                    </div>
                </div>
        </div>
    </div>
    <h4 for="" class="mt-3 d-flex justify-content-center">Días</h4>
    <hr>
    <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row justify-content-between">
                    <div class="col" id="dia">
                        <input type="checkbox" name="lu" id="lu"/> Lunes
                            <div class="justify-content-center mt-2" id="lunes">
                                <label for="">Inicio</label>
                                <input type="time" name="hi_lu" id="hi_lu" class="form-control"><br>
                                <label for="">Térmimo</label>
                                <input type="time" name="ht_lu" id="ht_lu" class="form-control">
                            </div>
                    </div>
                <div class="col">
                    <input type="checkbox" name="ma" id="ma"> Martes
                    <div class="justify-content-center mt-2" id="martes">
                        <label for="">Inicio</label>
                            <input type="time" name="hi_ma" id="hi_ma" class="form-control"><br>
                        <label for="">Térmimo</label>
                            <input type="time" name="ht_ma" id="ht_ma" class="form-control">
                    </div>
                </div>

                <div class="col">
                    <input type="checkbox" name="mi" id="mi"> Miercoles
                        <div class="justify-content-center mt-2" id="miercoles">
                            <label for="">Inicio</label>
                                <input type="time" name="hi_mi" id="hi_ma" class="form-control"><br>
                            <label for="">Térmimo</label>
                                <input type="time" name="ht_mi" id="ht_mi" class="form-control">
                        </div>
                </div>
            
                <div class="col">
                    <input type="checkbox" name="ju" id="ju"> Jueves
                        <div class="justify-content-center mt-2" id="jueves">
                           <label for="">Inicio</label>
                               <input type="time" name="hi_ju" id="hi_ju" class="form-control"><br>
                           <label for="">Térmimo</label>
                               <input type="time" name="ht_ju" id="ht_ju" class="form-control">
                        </div>
                </div>

                <div class="col">
                    <input type="checkbox" name="vi" id="vi"> Viernes
                    <div class="justify-content-center mt-2" id="viernes">
                        <label for="" disable >Inicio</label>
                            <input type="time" name="hi_vi" id="hi_vi" class="form-control"><br>
                        <label for="">Térmimo</label>
                            <input type="time" name="ht_vi" id="ht_vi" class="form-control">
                    </div>
                </div>

                <div class="col">
                    <input type="checkbox" name="sa" id="sa"> Sabado
                    <div class="justify-content-center mt-2" id="sabado">
                        <label for="" disable >Inicio</label>
                            <input type="time" name="hi_sa" id="hi_sa" class="form-control"><br>
                        <label for="">Térmimo</label>
                            <input type="time" name="ht_sa" id="ht_sa" class="form-control">
                    </div>
                </div>
                <div class="invalid-feedback" id="error"></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center my-5">
        <input type="submit" value="Guardar" id="add_tutoria" class="btn btn-primary mt-5">
    </div>
        </form>
</div>
<!-- <script src="<?= base_url()?>assets/js/auth/addTutoria.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  -->
<script src="<?= base_url('assets/js/auth/addTutoria.js')?>"></script>
<script src="<?= base_url('assets/js/auth/checkdias.js')?>"></script>
<script src="<?= base_url('assets/js/auth/mask.js')?>"></script>