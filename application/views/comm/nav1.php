     <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
    <div class="nav-boton">
      <div class="text-white">
        <i class="fas fa-bars text-white" id="menu"></i>

      </div>
    </div>
      <div class="container">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item m-0">
          <a class="navbar-brand px-4 nav-link <?= $this->uri->segment(2) == 'dashboard' ? 'active bg-success' : '';?>" href="<?= base_url('admin/dashboard');?>"> <i class="fa fa-home"></i> inicio</a>
        </li>
        <li class="nav-item ">
          <a class="navbar-brand px-4 nav-link  <?= $this->uri->segment(2) == 'agregartutoria' ? 'active bg-success' : '';?>" href="<?= base_url('admin/agregartutoria')?>"><i class="fa fa-plus-circle"></i> Agregar tutoría</a>
        </li>
        <li class="nav-item">
          <a id="alumnos" class="navbar-brand px-4 nav-link <?= $this->uri->segment(2) == 'alumnos' ? 'active bg-success' : '';?>" href="<?= base_url('admin/alumnos')?>"><i class="fa fa-users"></i> Alumnos</a>
        </li>
        <li class="nav-item ">
          <a id="liberaciones" class="navbar-brand px-4 nav-link  <?= $this->uri->segment(2) == 'listas' ? 'active bg-success' : '';?>" href="<?= base_url('admin/listas')?>"> <i class="fa fa-users"></i>
          Listas</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item ml-3">
          <a id="" class="navbar-brand nav-link px-4 <?= $this->uri->segment(2) == 'cuenta' ? 'active bg-success' : '';?>" href="<?=base_url('admin/cuenta/')?>"><?php echo $this->session->userdata('nombre') . ' '. $this->session->userdata('apellido_p');?></a> 
        </li>
        <li class="nav-item ml-3">
          <a id = "session" class="navbar-brand nav-link px-4 " href="<?php echo base_url('login/logout');?>"><i class="fa fa-power-off"></i> Cerrar session</a>
        </li>
      </ul>
      </div>
    </nav>  
<script >
$(document).ready(function(){
  $('#menu').click(function(){
    $('.navbar-nav').slideToggle();
  });
})
</script>
 <script src="<?=base_url('assets/js/auth/targeton.js')?>"></script>
