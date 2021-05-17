<div class="nav-boton">
  <img id="menu" src="<?= base_url()?>/assets/img/menu.png" width="60" heigth="60">
</div>

<nav class=" navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <ul class="navbar-nav mr-auto">
    
      <li class="nav-item ">
        <a class="navbar-brand px-4 nav-link rounded <?= $this->uri->segment(2) == 'dashboarduser' ? 'active bg-success' : '';?>" href="<?= base_url('users/dashboarduser');?>"><span class="fa fa-home"></span> Inicio</a>  
      </li>
      <?php
     if($this->session->userdata('rango') == "2"){?>
           <li class="nav-item ">
        <a class="navbar-brand px-4 nav-link rounded <?= $this->uri->segment(2) == 'listas' ? 'active bg-success' : '';?>" href="<?= base_url('profesores/listas');?>"><span class="fa fa-home"></span>Listas</a>
      </li>

    <?php }?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item ">
        <a class="navbar-brand text-muted rounded <?= $this->uri->segment(2) == 'cuenta' ? 'active bg-success' : '';?> " href="<?=base_url('users/cuenta/')?>"><span class="fa fa-user"></span> <?php echo $this->session->userdata('nombre') . ' '. $this->session->userdata('apellido_p');?></a>
      </li> -->
      <li class="nav-item ">
        <a class="navbar-brand nav-link px-4 rounded" href="<?= base_url('login/logout');?>"><span class="fa fa-power-off"></span> Cerrar session</a>
      </li>
    </ul>
  </div>
</nav>


<script src="<?=base_url('assets/js/auth/targeton.js')?>"></script>

<script >
$(document).ready(function(){
 
  $('#menu').click(function(){
    $('.navbar').slideToggle();
  });
})
</script>