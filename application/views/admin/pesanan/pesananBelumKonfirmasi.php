 <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Menu Pesanan</h2>
              </div>
              <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tabel pesanan Belum Konfirmasi
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
                                        <th>Id pesan</th>
                                        <th>Nama Konsumen</th>
                                        <th>Detail Produk</th>
                                        <th>Total</th>
                                        <th>Tanggal Pesan</th>
                                        <th>Detail Pesanan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                      
                                <tbody>
                                 <?php
                       $i=0; 
                       foreach ($sudahKonfirmasi as $numrows => $row) {
                       $i++; ?>
                            
                                     <tr>
                                        <td><?=($i) ?></td>
                                        <td><?=($row->idPesan) ?></td>
                                         <td><?=($row->namaKom) ?></td>
                                        <td><button type="button" class="btn btn-success waves-effect m-r-20" data-toggle="modal" data-target="#<?=($row->idPesan) ?>">Detail</button></td>
                                        <td><?=($row->totalBayar) ?></td>
                                        <td><?=($row->tanggalPesan) ?></td>                                        
                                        <th>
                                        <a href="<?php echo site_url().'/admin/pesanan/notaPesanan/'.$row->idPesan; ?>" target="_blank">lihat</a>|
                                        <a class="glyphicon glyphicon-print" href="<?php echo site_url().'/admin/pesanan/cetak/'.$row->idPesan; ?>" target="_blank">-Cetak</a>
                                        </th>
                                        <th>
                                        <a href="<?php echo site_url(); ?>/admin/pesanan/hapusPesanan/<?=$row->idPesan ?>" onclick="return confirm('Yakin Hapus ?')">
                                            <button class="btn btn-success waves-effect ">Hapus</button></a>
                                        <a href="<?php echo site_url(); ?>/admin/pesanan/konfirmasi_pesanan/<?=$row->kodeBayar ?>" >
                                            <button class="btn btn-success waves-effect ">Proses</button></a>
                                        </th>
                                        
                                        
                                    </tr>      <?php } ?>                            
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
  <?php
                       $i=0; 
                       foreach ($sudahKonfirmasi as $numrows => $row) {
                       $i++; ?>
        <div class="modal fade" id="<?=($row->idPesan) ?>" tabindex="-1" role="dialog">
       
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                           <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Size</th>
                                    <th>Jumlah</th>                                    
                                </tr>
                            </thead>
            <?php $i=0;
            $id_pesan=$row->idBayar;
            $sql="SELECT produk.nama as namaProduk, detail_pesan.id_size as size, detail_pesan.jml_pesan as jumlah, produk.harga as harga
            FROM bayar
            JOIN pesanan
            ON bayar.id_pesan=pesanan.id_pesan 
            JOIN detail_pesan
            ON detail_pesan.id_pesan=pesanan.id_pesan
            JOIN produk
            ON detail_pesan.id_produk=produk.id_produk
            WHERE bayar.id_pesan='$id_pesan'";
            $query = $this->db->query($sql);            
            foreach ($query->result() as $data){
            $i++;   ?>
                            <tbody>          
                               <td><?php echo $i; ?></td>
                                <td><?php echo $data->namaProduk; ?></td>
                                <td><?php echo $data->size; ?></td>
                                <td><?php echo $data->jumlah; ?></td>
                              
                              
                            </tbody>  
                            <?php } ?>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>
             <?php } ?>
    </section>