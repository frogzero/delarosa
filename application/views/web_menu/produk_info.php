    <!-- content-section-starts -->
  <div class="container">
     <div class="products-page">
      <div class="products">
        <div class="product-listy">
          <h2>our Products</h2>
          <ul class="product-list">
            <?php foreach ($kategori as $key => $row){?>
            <li><a href="<?=site_url()?>/home/perkategori/<?=$row->id_kategori?>"><?=$row->nama_kategori?></a></li>
            <?php } ?>
          </ul>
        </div>
   
      </div>
      <div class="new-product">
        <div class="col-md-5 zoom-grid">
          <div class="flexslider">

             <?php foreach ($produk as $key => $row) {?>
              <form action="<?php echo site_url(); ?>/pesanan/simpan_keranjang/<?=$row->id_produk ?>" method="post">
            <ul class="slides">       
              <li data-thumb="images/si.jpg">
                <div class="thumb-image"> <img src="<?=base_url()?>upload/<?=$row->gambar?>" data-imagezoom="true" class="img-responsive" alt="" /> </div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-md-7 dress-info">
          <div class="dress-name">
             <?php foreach ($produk as $key => $row) {?>
            <h3><?=$row->nama?></h3>
            <span>Rp. <?= number_format($row->harga,0,',','.'); ?></span>
            <div class="clearfix"></div>
            <p><?=$row->deskripsi?></p>
           </div>
          <div class="span span1">
            <b><p>STOK</p></b><hr>

            <table width="300px;">
            <tr><?php foreach ($stok as $key => $value) { ?>
                <th><?=$value->id_size?></th>
                <?php } ?>
            </tr>
            <tr><?php foreach ($stok as $key => $value) { ?>
                <th><?=$value->stok?></th>
                <?php } ?>

            </tr>
            </table>
            <hr>
             <div class="clearfix"></div>
          </div>
          <input type="text" name="id_produk" value="<?=$value->id_produk?>" hidden>
         
          <div class="span span4">
            <p class="left">Jumlah</p>
            <p class="right"><span class="selection-box"><select class="domains valid" name="jumlah" >
               <option value="1" selected >1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>

                     </select></span></p>
            <div class="clearfix"></div>
          </div>
             <div class="span span4">
            <p class="left">SIZE</p>
            <p class="right"><span class="selection-box"><select class="domains valid" name="ukuran" >
             <?php foreach ($stok as $key => $value) {?>
              <option value="<?=$value->id_size?>" ><?=$value->id_size?></option>

             <?php } ?>
            </select > 
                     </select></span></p>
            <div class="clearfix"></div>
          </div>
          <div class="purchase">

            <input type="submit" value="BELI" class="cbp-vm-icon cbp-vm-add item_add"/>
          </form>
            <div class="social-icons">
              <ul>
                <li><a class="facebook1" href="#"></a></li>
                <li><a class="twitter1" href="#"></a></li>
                <li><a class="googleplus1" href="#"></a></li>
              </ul>
            </div>
            <div class="clearfix"></div>
          </div>
        <script src="<?=base_url()?>assets/delarosa/web/js/imagezoom.js"></script>
          <!-- FlexSlider -->
          <script defer src="<?=base_url()?>assets/delarosa/web/js/jquery.flexslider.js"></script>
          <script>
            // Can also be used with $(document).ready()
            $(window).load(function() {
              $('.flexslider').flexslider({
              animation: "slide",
              controlNav: "thumbnails"
              });
            });
          </script>
        </div>
        <div class="clearfix"></div>
          <div class="reviews-tabs">
      <!-- Main component for a primary marketing message or call to action -->
      <ul class="nav nav-tabs responsive hidden-xs hidden-sm" id="myTab">
        <li class="test-class active"><a class="deco-none misc-class" href="#how-to"> Produk Info</a></li>
        <li class="test-class"><a class="deco-none" href="#source">Reviews</a></li>
      </ul>

      <div class="tab-content responsive hidden-xs hidden-sm">
        <div class="tab-pane active" id="how-to">
     <p class="tab-text"><?=$row->produk_info?></p>    
        </div>
      <div class="tab-pane" id="source">
        <?php foreach ($review as $key => $row) {?>
      <div class="response">
            <div class="media response-info">
              <div class="media-left response-text-left">
                <a href="#">
                  <img class="media-object" src="<?=base_url()?>assets/delarosa/web/images/icon1.png" alt="" />
                </a>
                <h5><a href="#"><?=$row->nama?></a></h5>
              </div>
              <div class="media-body response-text-right">
                <p><?=$row->komentar?></p>   
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
          <br><br>
          <!-- end -->
          <?php } ?>

          <form action="<?php echo site_url()."/review";?>" method="post">
       <div class="row" >
       <div class="form-group col-md-12">
            <input type="hidden" class="form-control"  value="<?php echo $row->id_produk; ?>" name="id_produk" >
          </div>
           <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="nama" name="nama" required>
          </div>
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required>
          </div>
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Komentar</label>
            <textarea type="text" class="form-control" id="exampleInputEmail1" placeholder="komentar" name="komentar" required></textarea>
          </div>
          <div class="form-group col-md-12" >
          <button type="submit"  class="btn btn-primary col-md-12" >Kirim Komentar</button>
          </div>
         </div>
         </form>          
        </div>
      </div>    
  </div>
 <?php } ?>
      </div>
      <div class="clearfix"></div>
      </div>
   </div>

<script src="<?=base_url()?>assets/delarosa/web/js/responsive-tabs.js"></script>
    <script type="text/javascript">
      $( '#myTab a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      $( '#moreTabs a' ).click( function ( e ) {
        e.preventDefault();
        $( this ).tab( 'show' );
      } );

      ( function( $ ) {
          // Test for making sure event are maintained
          $( '.js-alert-test' ).click( function () {
            alert( 'Button Clicked: Event was maintained' );
          } );
          fakewaffle.responsiveTabs( [ 'xs', 'sm' ] );
      } )( jQuery );

    </script>
