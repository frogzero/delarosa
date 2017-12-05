 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Konsumen</h2>
              </div>
              <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tabel Konsumen
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
                        <a href="produk/tambah"><button class="btn btn-success waves-effect">Tambah Produk</button></a>
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id pesan</th>
                                        <th>Nama Konsumen</th>
                                        <th>Produk</th>
                                        <th>Sotal</th>
                                        <th>size</th>
                                       
                                        
                                    </tr>
                                </thead>
                       
                                <tbody>
                                <?php 
                                $i=0;
                                foreach ($hasilTransaksi as $hasilTransaksi):  
                                $i++; 

                                  ?>
                                   
                                     <tr>
                                        <td><?=$i ?></td>
                                        <td><?=$hasilTransaksi->id_pesan ?></td>
                                         <td><?=$hasilTransaksi->nama_konsumen ?></td>
                                        <td><?=$hasilTransaksi->nama_produk ?></td>
                                        <td><?=$hasilTransaksi->jml_pesan ?></td>
                                        <td><?=$hasilTransaksi->size ?></td>
                                        
                                        
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