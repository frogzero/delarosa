<?php
$id_pesan = $pesanan->id_pesan;
if($this->input->post('submitupdate')){
$kurir = set_value('kurir');
$resi = set_value('resi');
}else{
$kurir =$pesanan->kurir;
$resi =$pesanan->resi;
}
?>

 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Resi Pengiriman</h2>
              </div>
              <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Kategori baru</h2>
                        </div>
                        <div class="body">
                         <?php echo form_open_multipart('admin/resi_pengiriman/tambahResi/'. $id_pesan, ['id'=>'form_validation'] ,['method'=>'post'])?>
                               <div class="form-group form-float"> <label class="form-label"><?php echo $id_pesan; ?></label>
                                    <div class="form-line">
                                      <input type="hidden" class="form-control" name="kode" required value="">
                                       
                                    </div>
                                </div>

                               <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="kurir" required>
                                        <label class="form-label">Nama Kuir</label>
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="resi" required>
                                        <label class="form-label">Resi Pengiriman</label>
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