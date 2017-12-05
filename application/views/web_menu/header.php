<?php if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){  ?>
	<!-- jika sudah login -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>
						<li><a href="<?=site_url('akun/tampilProfil')?>"><span class="glyphicon glyphicon-user"> </span>Akun</a></li>
						<li><a href="<?=site_url('home/statusPesan')?>"><span class="glyphicon glyphicon-user"> </span>Histori Pembelian</a></li>	
						<li><a href="<?=site_url('home/konfirmasi_pesanan')?>"><span class="glyphicon glyphicon-user"> </span>Konfirmasi Pembelian</a></li>	
						<li><a href="<?=site_url('akun/logout')?>"><span class="glyphicon glyphicon-user"> </span>Log Out</a></li>

					</ul>
				</div>
				<div class="header-right">
						<div class="cart box_1">						
								<h3>Total Isi Keranjang- Rp. <?= number_format($this->cart->total(),0,',','.'); ?><img src="<?=base_url()?>assets/delarosa/web/images/bag.png" alt=""></h3>						
							<p><a href="<?=site_url()?>/home/keranjang_belanja" class="simpleCart">Keranjang Belanja</a></p>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- selesai -->
	<?php } else{?>
	
	<!-- jika belum login -->
	<div class="header">
		<div class="header-top-strip">
			<div class="container">
				<div class="header-top-left">
					<ul>
						<li><a href="<?=site_url('home/login')?>"><span class="glyphicon glyphicon-user"> </span>Login</a></li>
						<li><a href="<?=site_url('home/register')?>"><span class="glyphicon glyphicon-lock"> </span>Create an Account</a></li>			
					</ul>
				</div>
				<div class="header-right">
						<div class="cart box_1">						
								<h3>Total Isi Keranjang- Rp. <?= number_format($this->cart->total(),0,',','.'); ?><img src="<?=base_url()?>assets/delarosa/web/images/bag.png" alt=""></h3>						
							<p><a href="<?=site_url()?>/home/keranjang_belanja" class="simpleCart">Keranjang Belanja</a></p>
							<div class="clearfix"> </div>
						</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- header-section-ends -->
	<?php } ?>