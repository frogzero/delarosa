<?php
$id_produk = $produk->id_produk;
if($this->input->post('submitupdate')){
$nama = set_value('nama');
$harga = set_value('harga');

$kategori = set_value('kategori');
$dekripsi = set_value('deskripsi');
$produk_info= set_value('produk_info');
$url = set_value('pic');
}else{
$nama =$produk->nama;
$harga =$produk->harga;
$deskripsi = $produk->deskripsi;
$produk_info = $produk->produk_info;
}
?>


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
                            <h2>Edit Produk</h2>
                        </div>
                        <div class="body">
                        <?php echo validation_errors();?>
                         <?php echo form_open_multipart('admin/produk/update/'. $id_produk, ['id'=>'form_validation'] ,['method'=>'post'])?>
                               <div class="form-group form-float">
                                <label class="form-label">Nama Produk</label>
                                    <div class="form-line">
                                   
                                        <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" required>
                                        
                                        
                                    </div>
                                </div>


                         <div class="form-group form-float">
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select name="kategori">
                                        <option value="">-- Please select --</option>
                                        <?php foreach ($kategori as $row) {?>
                                        <option value="<?=($row->id_kategori)?>"><?=($row->nama_kategori)?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                </div>
                                </div>
                                <div class="form-group form-float">
                                <label class="form-label">Harga</label>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="harga"  value="<?php echo $harga; ?>"   required>
                                        
                                    </div>
                                </div>                               
                                <div class="form-group form-float">
                                 <label class="form-label">Description</label>
                                    <div class="form-line">
                                        <textarea name="deskripsi" cols="30" rows="5" class="form-control no-resize"  required><?php echo $deskripsi; ?></textarea>
                                       
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                 <label class="form-label">Produk Info</label>
                                    <div class="form-line">
                                        <textarea name="produk_info" cols="30" rows="5" class="form-control no-resize"  required><?php echo $produk_info; ?></textarea>
                                       
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                   
                                        <label>Upload Gambar</label>
                                        <input type="file"  name="pic" />
                                 
                                </div>
                                <input type="hidden" name="submitupdate" value="1"/>
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                           <?php form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
        </div>
    </section>