<?php
$kodeBayar = $bayar->id_bayar;
if($this->input->post('submitupdate')){
$catatan = set_value('catatan');
}
?>

<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Histori Pesanan
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">

			   	<?php echo validation_errors();?>
<?php echo form_open('konfirmasi_pesanan/konfirmasi/'. $kodeBayar , ['id'=>'form_validation'] ,['method'=>'post'])?>
       <div class="row" >
           <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Kode Pesanan</label><br>
      <input type="text" hidden="true" placeholder="nama" name="nama" value="<?php echo $kodeBayar; ?>" >
       <label for="exampleInputEmail1"><u><?php echo $kodeBayar; ?></u></label>
          </div>
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Transfer Atas Nama</label>
            <input type="text" class="form-control" name="atas_nama" required>
          </div> 
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Catatan Pengiriman</label>
            <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="Catatan Pengiriman. etc. Mohon Packing Yang rapi" name="catatan" required></textarea>
          </div>  
          <div class="form-group col-md-12" >
           <input type="hidden" name="submitupdate" value="1"/>
          <button type="submit"  class="btn btn-primary col-md-12" >Konfirmasi Pesanan</button>
          </div>
         </div>
         <?php form_close() ?>




			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>

