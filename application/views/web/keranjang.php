<div class="row">
<div class="col-md-12">
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
			</tfoot>
		</table>
		<div align="center">
			<?= anchor('pesanan/bersih/','Bersihkan Keranjang',['class'=>'btn btn-danger']) ?> 
			<?= anchor(base_url(),'Lanjutkan Belanja',['class'=>'btn btn-primary']) ?> 
			<?= anchor('pesanan/checkout/','Check Out',['class'=>'btn btn-success']) ?>
		</div>
		</div>
		</div>
		<br>
		 </div>