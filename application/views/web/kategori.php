
 <nav class="navbar navbar-default navbar-custom">
  <div class="container">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Home</a>
  </div>
  <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
     <?php foreach ($kategori as $row) {?>
      <li><a href="<?php echo site_url().'/home/Perkategori/'.$row->id_kategori ?>"><?=($row->nama_kategori)?></a></li>
      <?php } ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?=site_url().'/home/caraPembayaran'?>">Cara Pembayaran</a></li>
      <li><a href="<?=site_url().'/home/caraPembelian'?>">Cara Pembelian</a></li>
      <li><a href="<?=site_url().'/home/about'?>">Tentang Kami</a></li>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
  </div>
 
</nav>
 <div class="container">
        
