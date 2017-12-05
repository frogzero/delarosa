
<nav class="navbar navbar-default navbar-custom navbar-fixed-top" >
  <div class="container" >
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    </div>
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
      <li><a href="#">Selamat Datang Di Butik Malika mode</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#" data-toggle="modal" data-target="#myModal">Selamat Datang  <?=$this->session->userdata('name')?></a></li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </div>

<div class="container-bawah">
<div class="container">
  
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".b">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
 <div class="collapse navbar-collapse b">
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo site_url() ?>/home/keranjang/">Keranjang</a></li>
      <li><a href="<?php echo site_url() ?>/home/statusPesan/">Histori Pesanan</a></li>
      <li><a href="<?php echo site_url() ?>/home/Konfirmasi/">Konfirmasi Pesanan</a></li>
      <li><a href="<?php echo site_url() ?>/akun/tampilProfil/">Profil</a></li>
      <li><a href="<?php echo site_url() ?>/akun/logout">Log Out</a></li>
    </ul>
  </div>
  </div>
  </div>
</nav>