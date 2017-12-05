 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Produk</h2>
              </div>
              <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Produk baru</h2>
                        </div>
                        <div class="body">
                         <?php echo form_open_multipart('admin/produk/simpan', ['id'=>'form_validation'] ,['method'=>'post'])?>
                               <div class="form-group form-float"> <label class="form-label"><?php echo $kode ?></label>
                                    <div class="form-line">
                                   

                                        <input type="hidden" class="form-control" name="kode" required value="<?php echo $kode ?>">
                                       
                                    </div>
                                </div>

                               <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" required>
                                        <label class="form-label">Nama Produk</label>
                                    </div>
                                </div>
                                
                       
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select name="kategori" class="form-control show-tick">
                                        <option value="">-- Please select --</option>
                                        <?php foreach ($kategori as $row) {?>
                                        <option value="<?=($row->id_kategori)?>"><?=($row->nama_kategori)?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                </div>
                                  
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" min="1" max="1000000000" class="form-control" name="harga" required>
                                        <label class="form-label">Harga : Rp.</label>
                                    </div>
                                </div>

                                <!---stok-->
                                <div class="row clearfix">
                                <div class="col-sm-3">
                                <div class="form-group form-float">
                                    <label class="form-label">Size</label>
                                    <div class="form-line">
                                    <?php foreach ($size as $ukuran) {?>
                                        <input type="text" class="form-control" name="size[]" value="<?=$ukuran->id_size?>">
                                        <?php } ?>
                                        
                                    </div>
                                </div>     
                                </div>  
                                <div class="col-sm-3">
                                <div class="form-group form-float">
                                 <label class="form-label">stok</label>
                                    <div class="form-line">
                                    <?php foreach ($size as $ukuran) {?>
                                        <input type="text" class="form-control" name="stok[]" placeholder="0">
                                        <?php } ?>

                                        </div>
                                </div>     
                                </div> 

                                </div> 
                                <!---End Stock -->
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="deskripsi" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Description</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="produk_info" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                        <label class="form-label">Produk Info</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                   
                                        <label>Upload Gambar</label>
                                        <input type="file"  name="pic" />
                                 
                                </div>

                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                           <?php form_close() ?>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
        </div>
    </section>