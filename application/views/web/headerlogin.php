
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
  <div class="container">
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
    <li><?php
     
        $text_cart_url  = '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>';
        $text_cart_url .= ' Keranjang Belanja ';
      ?>

      <?=anchor('/home/keranjang', $text_cart_url)?></li>
      <li><a href="#" data-toggle="modal" data-target="#myModal">Register</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<span class="caret"></span> </a>
        <ul class="dropdown-menu pull-right" style="padding: 15px; padding-bottom: 10px;">
          <form class="form-horizontal"  method="post" accept-charset="UTF-8" action="<?php echo site_url('akun/member_login')?>">
                    <input id="nama" class="form-control login" type="text" name="nama" placeholder="Username.." /><br>
                    <input id="password" class="form-control login" type="password" name="password" placeholder="Password.."/><br>
                    <input class="btn btn-primary" type="submit" name="submit" value="login" />
                </form>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
  </div>
</nav>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Silahkan Registrasi</h4>
      </div>
      <div class="modal-body">
       
       <form action="<?php echo site_url()."/akun/registrasi/";?>" method="post">
       <div class="row" >
           <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Lengkap" name="namaLengkap" required>
          </div>

          <div class="form-group col-md-6">
            <label for="exampleInputPassword1">username</label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" name="username" required>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
          </div>

          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required>
          </div>
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="alamat" name="alamat" required></textarea>
          </div>
          <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Provinsi</label>
           <select class="form-control" name="provinsi" id="propinsi_asal">
            <option value="" selected="" disabled="">Pilih Provinsi</option>
            <?php $this->load->view('web/rajaongkir/getProvince'); ?>
        
          </select>
          </div>
        <div class="form-group col-md-6">
         <label for="exampleInputEmail1">Kota</label>

          <select class="form-control" name="kota" id="origin">
            <option value="" selected="" disabled="">Pilih Kota</option>
          </select>
          </div>
       

          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Kode pos</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="kode pos" name="kodepos" required>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">No hp</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="No Hp" name="nohp" required>
          </div>
          <div class="form-group col-md-12" >
          <button type="submit"  class="btn btn-primary col-md-12" >Daftar</button>
          </div>
         </div>
         </form>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
$(document).ready(function(){

  $("#propinsi_asal").click(function(){
    $.post("<?php echo base_url(); ?>web/rajaongkir/getCity/"+$('#propinsi_asal').val(),function(obj){
      $('#origin').html(obj);
    });
      
  });

  $("#propinsi_tujuan").click(function(){
    $.post("<?php echo base_url(); ?>index.php/web/rajaongkir/getCity/"+$('#propinsi_tujuan').val(),function(obj){
      $('#destination').html(obj);
    });
      
  });

  /*
  $("#cari").click(function(){
    $.post("<?php echo base_url(); ?>index.php/rajaongkir/getCost/"+$('#origin').val()+'&dest='+$('#destination').val()+'&berat='+$('#berat').val()+'&courier='+$('#courier').val(),function(obj){
      $('#hasil').html(obj);
    });
  });

  */

  
});
</script>