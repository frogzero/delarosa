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


			</div>
			<div class="new-product">
			        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="clearfix"></div>
					
						<div class="media">
						  <div class="media-body">
						    <h4 class="media-heading"><a href=""></a></h4>
						    <p>IKI DI ISI Tentang Kami</p>
						  </div>
						</div>
				</div>
				<script src="<?=base_url()?>assets/delarosa/web/js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="<?=base_url()?>assets/delarosa/web/js/classie.js" type="text/javascript"></script>
			</div>
			<div class="clearfix"></div>
		</div>
			<div class="clearfix"></div>
   </div>]