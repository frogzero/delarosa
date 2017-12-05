
<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Keranjang Belanja
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
					<th>Produk</th>
					<th>Ukuran</th>
					<th>Jumlah</th>
					<th style="text-align: left;">Harga</th>
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
					<td>Rp. <?= number_format($items['price'],0,',','.') ?></td>
					<td align="right">Rp. <?= number_format($items['subtotal'],0,',','.') ?></td>
					<td></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
			<tfoot>
				<tr><td></td>
					<td align="right" colspan="4"><b>Total</b> </td>
					<td align="right">Rp. <?= number_format($this->cart->total(),0,',','.'); ?></td>
				</tr>
			</tfoot>
		</table>
		<div align="center">
			
			<?= anchor(site_url('home/all_produk'),'Lanjutkan Belanja',['class'=>'btn btn-primary']) ?> 
			<?= anchor('pesanan/bersih/','Bersihkan Keranjang',['class'=>'btn btn-danger']) ?> 
			<?= anchor('pesanan/checkout/','Check Out',['class'=>'btn btn-success']) ?>
		</div>
			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>

