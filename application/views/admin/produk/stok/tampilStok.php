 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Stok</h2>
              </div>
              <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                
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
                                        <th>Nama Produk</th>
                                        <th>Size</th>
                                        <th>Stok</th>
                                        <th>Keterangan</th>
                                        <th align="center">Aksi</th>
                                        
                                    </tr>
                                </thead>
                       
                                <tbody>
                                <?php 
                                $i=0;
                                foreach ($stok as $stok)
                                 { 
                                    $i++;
                                    $keterangan='';
                                    if ($stok->stok==0) {
                                        $keterangan='Stok habis';
                                    }else{
                                        $keterangan='Stok Tersedia';
                                    }
                                ?>                                                               
                                     <tr>
                                        <td><?=$i?></td>
                                        <td><?=$stok->nama?></td>
                                        <td><?=$stok->id_size?></td>
                                        <td><?=$stok->stok?></td>
                                        <td><?=$keterangan?></td>
                                        <td align="center">
                                        <a href="<?php echo site_url(); ?>/admin/stok/tambah/<?=$stok->id_produk ?>"><button class="btn btn-primary waves-effect">Stok</button></a> 
                                            
                                        </td>
                                        
                                    </tr>
                               <?php } ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>