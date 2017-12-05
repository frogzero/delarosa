<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Login
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">
			         <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Product</th>
          <th>Ukuran</th>
          <th>Jumlah</th>
          <th style="text-align: right;">Harga</th>
          <th style="text-align: right;">Subtotal</th>
          <th style="text-align: right;"></th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $i=0;
          foreach ($this->cart->contents() as $items) : 
          $i++;
        ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $items['name'] ?></td>
          <td><?= $items['size'] ?></td>
          <td><?= $items['qty'] ?></td>
          <td><?= number_format($items['price'],0,',','.') ?></td>
          <td align="right"><?= number_format($items['subtotal'],0,',','.') ?></td>
          <td></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
            <tfoot>
                <tr><td></td>
                    <td align="right" colspan="4"><b>Total</b> </td>
                    <td align="right"><?= number_format($this->cart->total(),0,',','.'); ?></td>
                </tr>
                <tr>
                </tr>                                     
                  <tr><td></td>
                    <form action="<?php echo site_url(); ?>/Order/" method="POST">
                    <input type="text" name="totalpesan" value="<?= $this->cart->total() ?>" hidden />
                </tr>
            </tfoot>
        </table>	

         <hr>
         <h3>Data konsumen</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Provinsi</th>
                    <th>Kota</th>
                    <th>Email</th>
                    <th>No Hp</th>
                 </tr>
            </thead>

            <?php foreach($result_detail_konsumen as $num_row=>$row){?>
    <tbody>
      <tr>
        <td><?=($row->nama)?></td>
        <td><?=($row->alamat)?></td>
        <td><?=($row->provinsi)?></td>
        <td><?=($row->kota)?></td>
        <td><?=($row->email)?></td>
        <td><?=($row->nohp)?></td>

      </tr>
     
     <?php }?> 
             </tbody>
        </table>
                 <hr>
        <h3>Data Penerima</h3>
       <form action="<?php echo site_url(); ?>/Order/" method="POST" target="_blank"  >
       <div class="row" >
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Atas Nama : </label>
             <label for="exampleInputEmail1"></label>
           </div>
           <div class="form-group col-md-12">
           <button class="form-group btn btn-success"  onclick="ClearFields()">Tambah Baru </button><br><br>  Klik Tombol di atas jika ingin menambahkan Alamat baru<br>
           </div>
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Nama Penerima</label>
            <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?php echo $row->nama; ?>" required >
          </div>
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea name="alamat"  class="form-control" id="alamat"  placeholder="Masukan alamat pengiriman" ><?php echo $row->alamat; ?></textarea>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Kota</label>
            <input type="text" class="form-control" id="kota" placeholder="kota" name="kota" value="<?php echo $row->kota; ?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" placeholder="provinsi" name="provinsi" value="<?php echo $row->provinsi; ?>"required>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Kode pos</label>
            <input type="text" class="form-control" id="kodepos" placeholder="kode pos" name="kodepos"  value="<?php echo $row->kodepos; ?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">No hp</label>
            <input type="text" class="form-control" id="nohp" placeholder="No Hp" name="nohp" value="<?php echo $row->nohp; ?>" required>
          </div>
         </div>      
            <button class="form-group btn btn-success col-md-12" type="submit" onclick="myFunction()">Simpan</button> <br>

<script>
function myFunction() {
    window.open("<?php echo site_url('home/all_produk'); ?>");
}

</script>

<script>
function ClearFields() {
     document.getElementById("nama").value = "";
     document.getElementById("alamat").value = "";
     document.getElementById("kota").value = "";
     document.getElementById("provinsi").value = "";
     document.getElementById("kodepos").value = "";
     document.getElementById("nohp").value = "";


}
</script>

                </form>



			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>