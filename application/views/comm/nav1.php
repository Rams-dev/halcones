    <div class="nav-boton">
      <img id="menu" src="<?= base_url()?>/assets/img/menu.png" width="60" heigth="60">
    </div>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
      <div class="container">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="navbar-brand px-4 nav-link rounded<?= $this->uri->segment(2) == 'dashboard' ? 'active bg-success' : '';?>" href="<?= base_url('admin/dashboard');?>"><span class="fa fa-home"></span> inicio</a>
        </li>
        <li class="nav-item ">
          <a class="navbar-brand px-4 nav-link rounded <?= $this->uri->segment(2) == 'agregartutoria' ? 'active bg-success' : '';?>" href="<?= base_url('admin/agregartutoria')?>"><span class="fa fa-plus-circle"></span> Agregar tutoría</a>
        </li>
        <li class="nav-item">
          <a id="alumnos" class="navbar-brand px-4 rounded nav-link <?= $this->uri->segment(2) == 'alumnos' ? 'active bg-success' : '';?>" href="<?= base_url('admin/alumnos')?>"><span class="fa fa-users"></span> Alumnos</a>
        </li>
        <li class="nav-item ">
          <a id="liberaciones" class="navbar-brand px-4 rounded nav-link <?= $this->uri->segment(2) == 'listas' ? 'active bg-success' : '';?>" href="<?= base_url('admin/listas')?>"><span class="fa fa-users"></span> Listas</a>
        </li>
      </ul>


      <ul class="navbar-nav ml-auto">
        <li class="nav-item ml-3">
          <a id="" class="navbar-brand nav-link rounded px-4 <?= $this->uri->segment(2) == 'cuenta' ? 'active bg-success' : '';?>" href="<?=base_url('admin/cuenta/')?>"><?php echo $this->session->userdata('nombre') . ' '. $this->session->userdata('apellido_p');?></a> 
        </li>
        <li class="nav-item ml-3">
          <a id = "session" class="navbar-brand nav-link px-4 rounded " href="<?php echo base_url('login/logout');?>"><span class="fa fa-power-off"></span> Cerrar session</a>
        </li>
      </ul>
      </div>
    </nav>  
<script >
$(document).ready(function(){
  $('#menu').click(function(){
    $('.navbar').slideToggle();
  });
})
</script>
 <script src="<?=base_url('assets/js/auth/targeton.js')?>"></script>
