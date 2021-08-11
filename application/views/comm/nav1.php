<nav class="navbar navbar-dark bg-dark">
  <div class="nav-boton">
    <i class="fa fa-bars " id="menu"></i>
  </div>
  <div class="container">
    <?php if ($this->session->userdata('rango')  == '1') { ?>
      <ul class="navbar-nav mr-auto">
        <li class="nav-li">
          <a class="nav-a <?= $this->uri->segment(2) == 'dashboard' ? 'active-nav-a' : ''; ?>" href="<?= base_url('admin/dashboard'); ?>"> <i class="fa fa-home"></i> inicio</a>
        </li>
        <li class="nav-li ">
          <a class="nav-a  <?= $this->uri->segment(2) == 'agregartutoria' ? 'active-nav-a' : ''; ?>" href="<?= base_url('admin/agregartutoria') ?>"><i class="fa fa-plus"></i> Agregar tutoría</a>
        </li>
        <li class="nav-li">
          <a id="alumnos" class="nav-a <?= $this->uri->segment(2) == 'alumnos' ? 'active-nav-a' : ''; ?>" href="<?= base_url('admin/alumnos') ?>"><i class="fa fa-users"></i> Alumnos</a>
        </li>
        <li class="nav-li ">
          <a id="liberaciones" class="nav-a  <?= $this->uri->segment(2) == 'listas' ? 'active-nav-a' : ''; ?>" href="<?= base_url('admin/listas') ?>"><i class="fas fa-file-pdf"></i> Listas</a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-li ">
        <a class="nav-a <?= $this->uri->segment(2) == 'cuenta' ? 'active-nav-a' : ''; ?>" href="<?= base_url('admin/cuenta/') ?>"><i class="fa fa-user"></i> <?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido_p'); ?></a>
      </li>
      <li class="nav-li ">
        <a id="session" class="nav-a " href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out-alt"></i> Salir</a>
      </li>
    </ul>
      <?php } ?>

    <?php if ($this->session->userdata('rango')  == '0' || $this->session->userdata('rango')  == '2') { ?>
      <ul class="navbar-nav mr-auto">
      <li class="nav-li m-0">
        <a class="nav-a <?= $this->uri->segment(2) == 'dashboarduser' ? 'active-nav-a' : ''; ?>" href="<?= base_url('users/dashboarduser'); ?>"><i class="fa fa-home"></i> Inicio</a>
      </li>
      <!-- <li class="nav-li m-0">
        <a class="nav-a <?= $this->uri->segment(2) == 'targeton' ? 'active-nav-a' : ''; ?>" href="<?= base_url('users/targeton'); ?>"><i class="fa fa-address-card"></i> targeton</a>
      </li> -->
      <?php
      if ($this->session->userdata('rango') == "2") { ?>
        <li class="nav-li ">
          <a class="nav-a <?= $this->uri->segment(2) == 'listas' ? 'active-nav-a' : ''; ?>" href="<?= base_url('profesores/listas'); ?>"><i class="fas fa-file-pdf"></i> Listas</a>
        </li>
      <?php } ?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-li">
        <a class="nav-a  <?= $this->uri->segment(2) == 'cuenta' ? 'active-nav-a' : ''; ?> " href="<?= base_url('users/cuenta/') ?>"><i class="fa fa-user"> </i> <?php echo $this->session->userdata('nombre') . ' ' . $this->session->userdata('apellido_p'); ?></a>
      </li>
      <li class="nav-li ">
        <a class="nav-a " href="<?= base_url('login/logout'); ?>"><i class="fa fa-sign-out-alt"></i> Salir</a>
      </li>
    </ul>
    <?php } ?>
</nav>
     <script>
       $(document).ready(function() {
         $('#menu').click(function() {
           $('.navbar-nav').slideToggle();
         });
       })
     </script>
     <script src="<?= base_url('assets/js/auth/targeton.js') ?>"></script>