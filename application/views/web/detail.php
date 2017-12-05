
<div class="row">
<div class="container-fluid">
    <div class="content-wrapper">	
		<div class="item-container">	
			<div class="container">
				<div class="col-md-12">
				<?php foreach ($produk as $row) { ?>
					
				<div class="product-title"><?php echo $row->nama; ?></div>
				
				<br>
					<div class="col-md-3">
					<div id="carousel-example" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example" data-slide-to="1"></li>
                                <li data-target="#carousel-example" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="<?php echo base_url()."upload/" ?><?php echo $row->gambar; ?>">
                                    </div>
                                                            </div>
                            <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                        </br>
                        <div class="col-md-12" align="center">
                        <div class="product-stock">Rp.<?php echo $row->harga; ?> &nbsp;
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#<?php echo $row->id_produk; ?>">Beli</button>

						</div>
					</div>
							
                      
					</div>

	
	<div class="container-fluid">		
			<div class="col-md-7">
					<ul id="myTab" class="nav nav-tabs nav_tabs">
						
						<li class="active"><a href="#service-one" data-toggle="tab">PRODUK INFO</a></li>
						<li><a href="#service-two" data-toggle="tab">DESKRIPSI</a></li>
						<li><a href="#service-three" data-toggle="tab">REVIEW</a></li>
						<li><a href="#service-4" data-toggle="tab">TULIS KOMENTAR</a></li>
						
					</ul>
				<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade in active" id="service-one">
						 
							<section class="container product-info">
							<?php echo $row->deskripsi; ?>
								
							</section>
										  
						</div>
					<div class="tab-pane fade" id="service-two">
						
						<section class="container">
								<?php echo $row->produk_info; ?>
						</section>
						
					</div>
					<div class="tab-pane fade" id="service-three">
					<br>
          <?php foreach ($review as $key ) {?>
					<div class="media">
						  <div class="media-body">
						    <h4 class="media-heading"><b><?php echo $key->nama; ?></b></h4>
						    <p><?php echo $key->komentar; ?>
						    </p>
						     </div>
						</div>	
            </hr>
            <?php  } ?>											
					</div>
					<div class="tab-pane fade" id="service-4">
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
				<hr>
			</div>
		</div>
		
					
</div>
</div>
</div>
</div>
		</div>

                        <!-- Modal -->
  <div class="modal fade" id="<?php echo $row->id_produk; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body col-md-12">
        <div class="col-md-4">            
         <form action="<?php echo site_url(); ?>/pesanan/simpan_keranjang/<?=$row->id_produk ?>" method="post">   
                        <div class="thumbnail">
                        <img src="<?php echo base_url().'upload/'. $row->gambar; ?>" height="300" width="300">
                            <div class="caption">
                                <h4>Rp.<?=$row->harga ?></h4>
                                <h4><a href="#"><?=$row->nama ?></a> </h4>
                                <p><?=$row->deskripsi ?></p>
                            </div>
                        </div>
                        </div>
  <div class="col-md-8">

<b>Produk Info</b>
<hr>
    
        <th><?=$row->produk_info ?></th>        
      </tr>
  
   <?php $i=0;
            $sql="SELECT * FROM stok
            WHERE id_produk='$row->id_produk'";
            $query = $this->db->query($sql); ?>

            <b>Stok</b>
  <hr>
  <table width="300px;">
  <tr>
  <?php foreach ($query->result() as $data) {?>
    <th><?=$data->id_size?></th>
    <?php }?>
  </tr>
  <tr>
  <?php foreach ($query->result() as $data) {?>
    <td><?=$data->stok?></td>
    <?php }?>
  </tr>
  </table>
  <hr>
  <br><br>
         
       <div class="row" >
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Ukuran</label>   
             <select  type="text" class="form-group" name="ukuran" >
             <?php foreach ($query->result() as $data) {?>
              <option value="<?=$data->id_size?>" selected ><?=$data->id_size?></option>

             <?php } ?>
            </select > 
            </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Jumlah</label>
         
            <select  type="text" class="form-group" name="jumlah" >
               <option value="1" selected >1</option>
               <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
               <option value="5">5</option>

            </select >
          </div>
          <button type="submit" class="btn btn-success col-md-12 ">Beli</button>
         </div>
         </form>

  
                            </div>
               
            
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
            <?php } ?>
		</div>
		<br>
		 </div>

