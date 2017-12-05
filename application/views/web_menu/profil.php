
<div class="container">
		<div class="login-page">
			    <div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Login
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.html">Back to Previous Page</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="account_grid">

			   	


  <?php foreach($result_detail_konsumen as $num_row=>$row){?>
                 <hr>
          <h3>Profil</h3>
       <form action="<?php echo site_url(); ?>/akun/ubah_akun/<?=$row->id_konsumen?>" method="POST">
       <div class="row" >
           <div class="form-group col-md-12">

            <label for="exampleInputEmail1">Profil</label>
            <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?php echo $row->nama; ?>" required >
          </div>
          <div class="form-group col-md-12">
            <label for="exampleInputEmail1">Alamat</label>
            <textarea name="alamat"  class="form-control" id="alamat"  placeholder="Masukan alamat pengiriman" ><?php echo $row->alamat; ?></textarea>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Kota</label>
            <input type="text" class="form-control" id="kota" placeholder="kota" name="kota" value="<?php echo $row->kota; ?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" placeholder="provinsi" name="provinsi" value="<?php echo $row->provinsi; ?>"required>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Kode pos</label>
            <input type="text" class="form-control" id="kodepos" placeholder="kode pos" name="kodepos"  value="<?php echo $row->kodepos; ?>" required>
          </div>
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">No hp</label>
            <input type="text" class="form-control" id="nohp" placeholder="No Hp" name="nohp" value="<?php echo $row->nohp; ?>" required>
          </div>
         </div>      
         <?php } ?>
            <button class="form-group btn btn-success col-md-12" type="submit">Ubah Profil</button> <br><br>

                </form>



			   <div class="clearfix"> </div>
			 </div>
		   </div>
</div>  
