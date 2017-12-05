 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Berita</h2>
              </div>
              <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tabel Berita
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <a href="<?php echo site_url(); ?>/admin/berita/tambah_berita"><button class="btn btn-success waves-effect">Tambah Berita</button></a>
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Berita</th>
                                        <th>Isi Berita</th>
                                        <th>Tanggal Posting</th>
                                        <th>Gambar Berita</th>
                                        <th align="center">Aksi</th>                                       
                                    </tr>
                                </thead>
                       
                                <tbody>
                                <?php $no=0;foreach ($berita as $key => $row) {$no++; ?>
                               <tr>
                                        <td><?=$no?></td>
                                         <td><?=$row->judul_berita?></td>
                                         <td><?= substr($row->isi_berita, 0,500)?></td>
                                        <td><?=$row->tanggal_posting?></td>
                                        <td><?=$row->gambar_berita?></td>
                                        <td align="center">
                                        <a href="<?=site_url('/admin/berita/hapus_berita/'.$row->id_berita)?>"  onclick="return confirm('Yakin Hapus ?')"><button class="btn btn-danger waves-effect">Hapus</button></a>
                                        </td>
                                        
                                    </tr>

                                <?php }  ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>