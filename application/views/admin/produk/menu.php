 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Produk</h2>
              </div>
              <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tabel Produk
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
                        <a href="<?php echo site_url(); ?>/admin/produk/tambah_produk"><button class="btn btn-success waves-effect">Tambah Produk</button></a>
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th align="center">Aksi</th>
                                        
                                    </tr>
                                </thead>
                       
                                <tbody>
                                <?php 
                                $i=0;
                                foreach ($produk as $produk):  
                                $i++; 

                                  ?>
                                  <?php

                                  $file= $produk->gambar;
                                  ?>
                                   
                                     <tr>
                                        <td><?=$i ?></td>
                                        <td><?=$produk->nama ?></td>
                                        <td><?=$produk->harga ?></td>
                                        <td><?=$produk->deskripsi ?></td>
                                        <td>
                                        <?php  
                                        $product_image = [  'src'   => './upload/' . $produk->gambar,'height'    => '50'];
                                        echo img($product_image)
                                        ?>
                                            
                                        </td>
                                        <td align="center">
                                         <a href="<?php echo site_url(); ?>/admin/stok/tambah/<?=$produk->id_produk ?>"><button class="btn btn-primary waves-effect">Stok</button></a> |
                                            <a href="<?php echo site_url(); ?>/admin/produk/update/<?=$produk->id_produk ?>"><button class="btn btn-primary waves-effect">Edit</button></a> |
                                            <a href="<?php echo site_url(); ?>/admin/produk/hapus/<?=$produk->id_produk ?>"  onclick="return confirm('Yakin Hapus ?')"><button class="btn btn-danger waves-effect">Hapus</button></a>
                                        </td>
                                        
                                    </tr>
                                <?php endforeach; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>