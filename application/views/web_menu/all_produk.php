<!-- content-section-starts -->
	<div class="container">
	   <div class="products-page">
			<div class="products">
				<div class="product-listy">
					<h2>our Products</h2>
					<ul class="product-list">
						<?php foreach ($kategori as $key => $row) {?>
						<li><a href="<?=site_url()?>/home/perkategori/<?=$row->id_kategori?>"><?=$row->nama_kategori?></a></li>
						<?php } ?>
						
					</ul>
				</div> 

				<br>

				<div class="product-listy">
					<h2>our Partner</h2>
					<ul class="product-list">
						<?php foreach ($kategori as $key => $row) {?>
						<li align="center"><img src="http://www.freeiconspng.com/uploads/facebook-text-transparent-logo-23.png" width="180px" align="center"></li>
						<?php } ?>
						
					</ul>
				</div> 	
				<br>

				<div class="product-listy">
					<h2>our Partner</h2>
					<ul class="product-list">
						<?php foreach ($kategori as $key => $row) {?>
						<li align="center"><img src="http://www.freeiconspng.com/uploads/facebook-text-transparent-logo-23.png" width="180px" align="center"></li>
						<?php } ?>
						
					</ul>
				</div> 	




			</div>
			<div class="new-product">
				<div class="new-product-top">
					<ul class="product-top-list">
						<li><a href="<?=base_url()?>">Home</a>&nbsp;<span>&gt;</span></li>
						<li><span class="act">Semua produk</span>&nbsp;</li>
					</ul>
					
					<div class="clearfix"></div>
				</div>
				<div class="mens-toolbar">
		    	      
	               		 <div class="clearfix"></div>		
			        </div>
			        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
					</div>
					<div class="clearfix"></div>
					<ul>
						<?php foreach ($produk as $key => $row) {?>
					  <li>
							<a class="cbp-vm-image" href="single.html">
								<div class="simpleCart_shelfItem">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
								<a href="<?=site_url()?>/home/produk_info/<?=$row->id_produk?>">	<img src="<?=base_url()?>upload/<?=$row->gambar?>" class="img-responsive" alt=""/></a>
									<div class="mask">
			                       		<div class="info">Lihat Detail</div>
					                  </div>
									<div class="product_container">
									   <div class="cart-left">
										 <p class="title"><?=$row->nama?></p>
									   <div class="clearfix"></div>
									   </div>
								    </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>
		                    <br>
		                    <b>
		                    <i>
		                    <div class="harga">
										   <span class="item_price">Rp. <?= number_format($row->harga,0,',','.'); ?></span>
									   <div class="clearfix"></div>
							</div>
							</b>
							</i>

							<div class="cbp-vm-details">
								<?=$row->deskripsi?>
							</div>
							<a class="cbp-vm-icon cbp-vm-add item_add" href="<?=site_url()?>/home/produk_info/<?=$row->id_produk?>">Add to cart</a>
							</div>
						</li>
						<?php } ?>

					</ul>
				</div>
				<?php echo $paginator; ?>
				<script src="<?=base_url()?>assets/delarosa/web/js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="<?=base_url()?>assets/delarosa/web/js/classie.js" type="text/javascript"></script>
			</div>
			<div class="clearfix"></div>
		</div>
			<div class="clearfix"></div>
   </div>