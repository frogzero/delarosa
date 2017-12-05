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
                           <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Provinsi</th>
                                        <th>Kode Pos</th>
                                        <th>No hp</th>
                                        <th>Aksi</th>
                                        
                                    </tr>
                                </thead>
                       
                                <tbody>
                             
                                   <?php
                                   $i=0;
                                    foreach ($konsumen as $konsumen):
                                    $i++;    ?>
                                     <tr>
                                        <td><?=($i)?></td>
                                        <td><?=($konsumen->nama)?></td>
                                        <td><?=($konsumen->email)?></td>
                                        <td><?=($konsumen->alamat)?></td>
                                        <td><?=($konsumen->kota)?></td>
                                        <td><?=($konsumen->provinsi)?></td>
                                        <td><?=($konsumen->kodepos)?></td>
                                        <td><?=($konsumen->nohp)?></td>
                                        <td align="center">
                                    <a href="konsumen/hapusKonsumen/<?=$konsumen->id_konsumen ?>"  onclick="return confirm('Yakin Hapus ?')"><button class="btn btn-danger waves-effect">Hapus</button></a>
                                        </td>
                                  </tr>
                              <?php  endforeach ?>
                               
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>