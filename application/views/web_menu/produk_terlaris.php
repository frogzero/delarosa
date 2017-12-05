		<!-- content-section-starts-here -->
		<div class="container">
			<div class="main-content">
				<div class="online-strip" align="text-center">
				<a href="http://instagram.com/" target="_blank"><img src="https://lh3.googleusercontent.com/oPGxU6ruivgxatqLyYq1x7CYsl0Wdv2zs4K0QeDnu0eTleoecv1Q6og1C0iZq93wcr4=w300" class="img-square" alt="Cinque Terre" width="50" height="50">&nbsp;&nbsp;</a> 
				 <img src="https://static-id.zacdn.com/cms/orignal-Logo-ZALORA-Indonesia.jpg" class="img-square" alt="Cinque Terre" width="50" height="50" >&nbsp;&nbsp;
				 <img src="https://lh3.googleusercontent.com/oPGxU6ruivgxatqLyYq1x7CYsl0Wdv2zs4K0QeDnu0eTleoecv1Q6og1C0iZq93wcr4=w300" class="img-square" alt="Cinque Terre" width="50" height="50" >&nbsp;&nbsp;
				 <img src="https://lh3.googleusercontent.com/oPGxU6ruivgxatqLyYq1x7CYsl0Wdv2zs4K0QeDnu0eTleoecv1Q6og1C0iZq93wcr4=w300" class="img-square" alt="Cinque Terre" width="50" height="50">&nbsp;&nbsp;
				 <img src="https://lh3.googleusercontent.com/oPGxU6ruivgxatqLyYq1x7CYsl0Wdv2zs4K0QeDnu0eTleoecv1Q6og1C0iZq93wcr4=w300" class="img-square" alt="Cinque Terre" width="50" height="50" style="box-shadow: 0 0 10px #FF0000, 0 0 10px #0000FF;">&nbsp;&nbsp;

					<div class="clearfix"></div>
				</div>
				<div class="products-grid">
				<header>
					<h3 class="head text-center">Best Seller</h3>
				</header>
				<?php foreach ($laris as $num_rows => $row) {?>
					<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="<?=site_url()?>/home/produk_info/<?=$row->id_produk?>"><img src="<?=base_url()?>upload/<?=$row->gambar?>" alt="" height="350px"/></a>
						<div class="mask">
							<a href="single.html">Quick View</a>
						</div>
						<a class="product_name" href="<?=site_url()?>/home/produk_info/<?=$row->id_produk?>"><?=$row->nama?></a>
						<p><a class="item_add" href="#"><i></i> <span class="item_price">Rp. <?= number_format($row->harga,0,',','.'); ?></span></a></p>
					</div>
				<?php } ?>
					<div class="clearfix"></div>
				</div>
			</div>

		</div>
