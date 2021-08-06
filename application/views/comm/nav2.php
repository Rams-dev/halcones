
<nav class=" navbar navbar-expand-lg navbar-dark bg-dark text-white">
  <div class="nav-boton">
      <i class="fa fa-bars" id="menu"></i>
  </div>
  <div class="container">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item m-0">
        <a class="navbar-brand px-4 nav-link <?= $this->uri->segment(2) == 'dashboarduser' ? 'active bg-success' : '';?>" href="<?= base_url('users/dashboarduser');?>"><span class="fa fa-home"></span> Inicio</a>
      </li>
      <!-- <li class="nav-item m-0">
        <a class="navbar-brand px-4 nav-link <?= $this->uri->segment(2) == 'targeton' ? 'active bg-success' : '';?>" href="<?= base_url('users/targeton');?>"><span class="fa fa-address-card"></span> targeton</a>
      </li> -->
      <?php
     if($this->session->userdata('rango') == "2"){?>
           <li class="nav-item ">
        <a class="navbar-brand px-4 nav-link <?= $this->uri->segment(2) == 'listas' ? 'active bg-success' : '';?>" href="<?= base_url('profesores/listas');?>"><span class="fa fa-home"></span>Listas</a>
      </li>
    <?php }?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="navbar-brand text-muted px-4 <?= $this->uri->segment(2) == 'cuenta' ? 'active bg-success' : '';?> " href="<?=base_url('users/cuenta/')?>"><span class="fa fa-user"></span> <?php echo $this->session->userdata('nombre') . ' '. $this->session->userdata('apellido_p');?></a>
      </li>
      <li class="nav-item ">
        <a class="navbar-brand nav-link px-4" href="<?= base_url('login/logout');?>"><span class="fa fa-power-off"></span> Cerrar session</a>
      </li>
    </ul>
  </div>
</nav>


<script src="<?=base_url('assets/js/auth/targeton.js')?>"></script>

<script >
$(document).ready(function(){
  $('#menu').click(function(){
    $('.navbar-nav').slideToggle();
  });
})
</script>