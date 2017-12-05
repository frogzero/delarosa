
  <div class="row">
    <div class="col-md-12">
    <div class="col-md-12" align="center" >
    <img src="<?php echo base_url()."assets/web/" ?>images/produkTerlaris.png" width="360px"><br>
    <br>
  </div>
                <div class="row">


                <?php foreach ($laris as  $a): ?>
                <div class="col-xs-6 col-md-2">

                         <div class="thumbnail" >
                         <div class="img-thumbnail">
                          <img src="<?php echo base_url(); ?>upload/<?php echo $a->gambar; ?>" height="200" width="100%" align="center">
                          </div>
                          <br>
                           <br>
                        
                            <div class="ratings" align="center">
                                <p><a href="<?php site_url()?>index.php/home/detail/<?=$a->id_produk ?>" class="btn btn-primary" role="button">Detail</a></p>
                            </div>
                        </div>
                    </div> 
                  <?php endforeach; ?>
                  <hr>

 <div class="col-md-12" align="center" >
<hr>
 <img src="<?php echo base_url()."assets/web/" ?>images/Produk.png" width="360px"><br>
    <hr>
  </div>


                <?php foreach ($produk as $produk): ?>
                    <div class="col-md-3">

                         <div class="thumbnail" >
                         <div class="img-thumbnail" >
                          <img src="<?php echo base_url(); ?>upload/<?php echo $produk->gambar; ?>" height="300" width="300">
                          </div>
                            <div class="caption">
                               <h4><a href="<?php echo site_url()?>/home/detail/<?=$produk->id_produk ?>"><?=$produk->nama ?></a> </h4>
                                <p><?=$produk->deskripsi ?></p>
                                 <h4 class="pull-center">Rp.<?=$produk->harga ?></h4>
                            </div>
                            <div class="ratings" align="center">
                                <p><a href="<?php echo site_url()?>/home/detail/<?=$produk->id_produk ?>" class="btn btn-primary" role="button">Detail</a>
                                 <a href="#"  data-toggle="modal" data-target="#<?=$produk->id_produk ?>" class="btn btn-danger" role="button">Beli</a></p>
                            </div>
                        </div>
                    </div> 
<div id="<?=$produk->id_produk ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Beli Produk Ini</h4>
            </div>
      <div class="modal-body col-md-12">
        <div class="col-md-4">
        <form action="<?php echo site_url(); ?>/pesanan/simpan_keranjang/<?=$produk->id_produk ?>" method="post">
               
                        <div class="thumbnail">
                      
                          <img src="<?php echo base_url(); ?>upload/<?php echo $produk->gambar; ?>" height="300" width="300">
                     
                            <div class="caption">
                                <h4>Rp.<?=$produk->harga ?></h4>
                                <h4><a href="#"><?=$produk->nama ?></a> </h4>
                                <p><?=$produk->deskripsi ?></p>
                            </div>
                         </div>
         
          </div>    
 <?php $i=0;
            $sql="SELECT * FROM stok

            WHERE id_produk='$produk->id_produk'
            order by id_size asc";
            $query = $this->db->query($sql); ?>  
       

  <div class="col-md-8">
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
   
   <b>Produk Info</b>
  <table>
      <tr>
        <td><?=$produk->produk_info ?></td>        
      </tr>
  </table>
  <br><br>


  
         
       <div class="row" >
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Ukuran</label>   
             <select  type="text" class="form-group" name="ukuran" >
             <?php foreach ($query->result() as $data) {?>
              <option value="<?=$data->id_size?>" ><?=$data->id_size?></option>

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
            <?php endforeach; ?>





                </div>
                
<?php echo $paginator; ?>
            </div>

        </div>
        </div>
    </div>
    <!-- /.container -->