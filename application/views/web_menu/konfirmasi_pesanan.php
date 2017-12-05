
<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="<?=base_url()?>" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Konfirmasi Pesanan
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
					<th>Kode pesan</th>
					<th>Total Bayar</th>
					<th>Detail Produk Yang Di pesan</th>
					<th>Status</th>
					<th style="text-align: center;">Aksi</th>
					
				</tr>
			</thead>
			
			<?php $i=0;foreach($result_detail_bayar as $num_row=>$row) {
			$i++;	?>
			<tbody>
			
				<tr>
					<td><?php echo $i; ?></td>
					<td><?=($row->kodeBayar)?></td>
					<td><?=($row->totalBayar)?></td>
					<td><a href="#" data-toggle="modal" data-target="#<?=($row->idBayar)?>"><button class="btn btn-danger">Detail</button></a></td>
					<td><?=($row->status)?></td>
					<td align="right">

					<a href="<?php echo site_url(); ?>/order/Lihatinvoice/<?=$row->id_pesan ?>" target="_blank" >Invoice</a>
					<a href="<?php echo site_url(); ?>/konfirmasi_pesanan/pesanbatal/<?=$row->kodeBayar ?>" onclick="return confirm('Yakin batalkan ?')">
					<button class="btn btn-danger">Batalkan Pesanan</button></a>
					<a href="<?php echo site_url(); ?>/konfirmasi_pesanan/konfirmasi/<?=$row->kodeBayar ?>"><button class="btn btn-primary waves-effect">Konfirmasi</button></a>
<?php } ?>

					</td>
				</tr>
			</tbody>
		</table>


<?php $i=0;foreach($result_detail_bayar as $num_row=>$row) {
			$i++;	?>

	<div id="<?=($row->idBayar)?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Daftar pesanan</h4>
      </div>
      <div class="modal-body">
       
      <table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Size</th>
					<th>Jumlah</th>
					<th>Harga Satuan</th>		
				</tr>
			</thead>
			
			<?php $i=0;
			$id_pesan=$row->idBayar;
			$sql="SELECT produk.nama as namaProduk, detail_pesan.id_size as size, detail_pesan.jml_pesan as jumlah, produk.harga as harga
			FROM bayar
			JOIN pesanan
			ON bayar.id_pesan=pesanan.id_pesan 
			JOIN detail_pesan
			ON detail_pesan.id_pesan=pesanan.id_pesan
			JOIN produk
			ON detail_pesan.id_produk=produk.id_produk
			WHERE bayar.id_pesan='$id_pesan'";
			$query = $this->db->query($sql);			
			foreach ($query->result() as $data){
			$i++;	?>
			<tbody>
			
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $data->namaProduk; ?></td>
					<td><?php echo $data->size; ?></td>
					<td><?php echo $data->jumlah; ?></td>
					<td><?php echo $data->harga; ?></td>
					
		
	
				</tr>
			</tbody>
			<?php } ?>
		</table>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>	 
<?php } ?>
			  







			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>

