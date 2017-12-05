
        <!-- Footer -->
<div id="footer" style="background:#183544; padding-top: 20px; padding-bottom: 20px; color: #ffffff;" >
<div class="container">
  <div class="row">
    
      <div class="col-sm-6">
      <table>
      
      <tr><img src="<?php echo base_url()."assets/web/" ?>images/BRI.png" width="100px"></tr>
      </table>
      </div><!--/col-sm-3-->
    <div class="col-sm-6" align="right">
    <table align="left">
     <tr><img src="<?php echo base_url()."assets/web/" ?>images/FB.png" width="40px"></tr>
      <tr><img src="<?php echo base_url()."assets/web/" ?>images/ig.png" width="40px"></tr>
      </table>
    </div>
    
    </div><!--/row-->
  </div>
  </div><!--/container-->
</div><!--/footer--></div>


            <div id="push"></div>


<div id="footer" style="background:#11252F; padding-top: 20px; color: #ffffff;" >
<div class="container">
  <div class="row">
    
      <div class="col-sm-3">
        <div class="foot-header">
          Our Shop <img src="http://200.27.156.170/ean_default/img/cocha/icon-cocha.png">
        </div>
        <div class="foot-links">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.5882212077104!2d110.37792531432355!3d-7.7272509944301975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNDMnMzguMSJTIDExMMKwMjInNDguNCJF!5e0!3m2!1sid!2sid!4v1486957149121" width="250" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
      </div><!--/col-sm-3-->
       <div class="col-sm-3">
      <div class="foot-header">
        Menu <img src="http://200.27.156.170/ean_default/img/cocha/card-icon.png">
      </div>
      <div class="foot-links">
        <a href="<?=site_url().'/home/caraPembayaran'; ?>">Cara Pembayaran</a><br>
        <a href="<?=site_url().'/home/caraPembelian'; ?>">Cara Pembelian</a><br>
        <a href="<?php echo site_url().'/home/keranjang'; ?>">Keranjang Belanja</a><br>
        <a href="<?=site_url().'/home/about'; ?>">About</a><br>
        <a href="<?php echo site_url().'/akun/admin_login'; ?>" target="_blank">Login Admin</a><br>
      </div>
    </div><!--/col-sm-3-->
     <div class="col-sm-3">
      <div class="foot-header">
        CEK RESI PENGIRIMAN <img src="http://200.27.156.170/ean_default/img/cocha/card-icon.png">
      </div>
      <div class="foot-links">
       <form method="get" action="http://www.cekresi.com" target="_BLANK">
      <input type="text" placeholder="Masukkan no resi..." name="noresi" style="color: black;" />
      <input type="submit" value="cek resi" style="color: black;" />
      <br />
     <a href="http://www.cekresi.com" target="_BLANK"></a>
      </form>
      </div>
    </div><!--/col-sm-3-->
     <div class="col-sm-3">
      <div class="foot-header">Alamat Kami<img src="http://200.27.156.170/ean_default/img/cocha/servicio-al-cliente-icon.png"></div>
       </p>Jl.Palagan Tentara Pelajar KM.10 
       </p>Ngetiran Sariharjo, Ngaglik, Sleman. 
       </p>Yogyakarta, 55581
    </div>
    
    </div><!--/row-->
  </div>
  </div><!--/container-->
</div><!--/footer--></div>



  

            <div id="push"></div>


                  <!-- Footer -->
<div id="footer" style="background:#183544; padding-top: 10px; padding-bottom: 10px; color: #ffffff;" >
<div class="container">
  <div class="row">
    
      <div class="col-sm-12" align="center">
      Copyright: Malika Mode
    </div>
    
    </div><!--/row-->
  </div>
  </div><!--/container-->
</div><!--/footer--></div>
  

    
    <!-- /.container -->
<script type="text/javascript" src="<?php echo base_url()."assets/web/" ?>js/JQery.min.js"></script>
    <!-- jQuery -->
    <script src="<?php echo base_url()."assets/web/" ?>js/jquery.js"></script>
    <script src="<?php echo base_url()."assets/web/" ?>js/jquerywizard.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()."assets/web/" ?>js/bootstrap.min.js"></script>


<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/JQuery.min.js"></script>

<script>
$(document).ready(function(){

    $("#propinsi_asal").click(function(){
        $.post("<?php echo base_url(); ?>index.php/rajaongkir/getCity/"+$('#propinsi_asal').val(),function(obj){
            $('#origin').html(obj);
        });
            
    });

    $("#propinsi_tujuan").click(function(){
        $.post("<?php echo base_url(); ?>index.php/rajaongkir/getCity/"+$('#propinsi_tujuan').val(),function(obj){
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
</body>

</html>