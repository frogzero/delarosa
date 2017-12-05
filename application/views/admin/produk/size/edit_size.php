<?php
$id_size = $size->id_size;
if($this->input->post('submitupdate')){
$deskripsi = set_value('deskripsi');
}else{
$deskripsi =$size->deskripsi;
}
?>


 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Kategori</h2>
              </div>
              <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Produk baru</h2>
                        </div>
                        <div class="body">
                        <?php echo validation_errors();?>
                         <?php echo form_open_multipart('admin/size/updateSize/'. $id_size, ['id'=>'form_validation'] ,['method'=>'post'])?>
                               <div class="form-group form-float">
                                <label class="form-label">Deskripsi</label>
                                    <div class="form-line">
                                   
                                        <input type="text" class="form-control" name="deskripsi" value="<?php echo $deskripsi; ?>" required>
                                        
                                        
                                    </div>
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