 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Slider</h2>
              </div>
              <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Slider Baru</h2>
                        </div>
                        <div class="body">
                         <?php echo form_open_multipart('admin/slider/simpan_slider', ['id'=>'form_validation'] ,['method'=>'post'])?>
                                  
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" required>
                                        <label class="form-label">Nama Gambar Slider</label>
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