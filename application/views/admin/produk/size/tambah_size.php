 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Ukuran Produk</h2>
              </div>
              <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Tambah Ukuran baru</h2>
                        </div>
                        <div class="body">
                         <?php echo form_open_multipart('admin/size/simpanSize', ['id'=>'form_validation'] ,['method'=>'post'])?>
                               <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="id_size" required>
                                        <label class="form-label">Ukuran Produk</label>
                                    </div>
                                </div>
                                 <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="deskripsi" required>
                                        <label class="form-label">Deskripsi Ukuran Produk</label>
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