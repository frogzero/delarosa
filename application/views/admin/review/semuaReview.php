 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Komentar</h2>
              </div>
              <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tabel Komentar
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
                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Produk</th>
                                        <th align="center">Nama </th>           
                                        <th>email</th>
                                        <th align="right">komentar</th>
                                        <th align="right">Aksi</th>                                     
                                    </tr>
                                </thead>
                       <?php $i=0;
                       foreach ($komentar as $row): $i++; 
                        ?>
                                <tbody>                            
                                     <tr>
                                        <td><?=($i)?></td>
                                        <td><?=($row->id_produk)?></td>
                                        <td><?=($row->nama)?></td>
                                        <td><?=($row->email)?></td>
                                        <td><?=($row->komentar)?></td>
                                        <td align="center">
                                            <a href="<?php echo site_url().'/admin/review/tampilkan/'.$row->id_review; ?>"><button class="btn btn-primary waves-effect">Tampilkan</button></a> |
                                            <a href="<?php echo site_url().'/admin/review/hapusKomentar/'.$row->id_review; ?>"  onclick="return confirm('Yakin Hapus ?')"><button class="btn btn-danger waves-effect">Hapus</button></a>
                                        </td>
                                        
                                    </tr>
                                    
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>