 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Berita</h2>
              </div>
              <!-- Basic Validation -->
       <?php $tanggal= date('Y-m-d')?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Berita baru</h2>
                        </div>
                        <div class="body">
                         <?php echo form_open_multipart('admin/berita/simpan_berita', ['id'=>'form_validation'] ,['method'=>'post'])?>
                               <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="judul_berita" required>
                                        <label class="form-label">Judul Berita</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="isi_berita" class="form-control"></textarea>
                                        <label class="form-label">Isi Berita</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="tanggal_posting" value="<?=$tanggal?>" readonly="">
                                        
                                    </div>
                                </div>
                                  <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="pic" >
                                        
                                    </div>
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