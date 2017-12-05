  <!-- content-section-ends -->
		<div class="other-products">
		<div class="container">
			<h3 class="like text-center">Featured Collection</h3>        			
				     <ul id="flexiselDemo3">
				     	<?php foreach ($laris as $key => $row) {?>
						<li><a href="single.html"><img src="<?=base_url()?>upload/<?=$row->gambar?>" class="img-responsive"/></a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="single.html">Perfectly simple</a>
							<p><a class="item_add" href="#"><i></i> <span class=" item_price"><?=$row->harga?></span></a></p>
							</div>
						</li>
						<?php } ?>
			
				     </ul>
				    <script type="text/javascript">
					 $(window).load(function() {
						$("#flexiselDemo3").flexisel({
							visibleItems: 4,
							animationSpeed: 1000,
							autoPlay: true,
							autoPlaySpeed: 3000,    		
							pauseOnHover: true,
							enableResponsiveBreakpoints: true,
					    	responsiveBreakpoints: { 
					    		portrait: { 
					    			changePoint:480,
					    			visibleItems: 1
					    		}, 
					    		landscape: { 
					    			changePoint:640,
					    			visibleItems: 2
					    		},
					    		tablet: { 
					    			changePoint:768,
					    			visibleItems: 3
					    		}
					    	}
					    });
					    
					});
				   </script>
				   <script type="text/javascript" src="<?=base_url()?>assets/delarosa/web/js/jquery.flexisel.js"></script>
				   </div>
				   </div>
		<!-- content-section-ends-here -->