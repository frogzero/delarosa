<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php foreach ($pesan as $pesanan) {?>
<title>Nota_<?=($pesanan->idPesan)?></title>
<?php }?>
</head>
<style>

.a{
    border: 1px solid black;
    border-collapse: collapse;
}
</style>



<body>

<table width="794"  border-style="solid" align="center">
  <tr>
    <td height="888" valign="top"><table width="100%" border="0">
      <tr>
        <td height="86" colspan="2" align="center"><p>DELAROSA BOUTIQUE </p>
          <p>IKI DI GANTI ALAMAT GON MU<br />
          </p>
          <hr /></td>
        </tr>
      <tr>
      <?php foreach ($pesan as $pesanan) {?>
        <td height="100" colspan="2" align="right" valign="top" style="padding-right:20px;"><p><b>Tanggal Pesanan:</b> <?=($pesanan->tanggalPesan) ?></p>
          <p><b>Id Pesanan : </b><?=($pesanan->idPesan) ?></p></td>
        </tr>
      <tr>
        <td height="71" valign="top">
        <p align="center">Data Konsumen</p>
          <p><b>Nama Konsumen : </b><?=($pesanan->namaKom) ?></p>
          <p><b>Kota :</b><?=($pesanan->kotaKom) ?></p>
          <p><b>Alamat :</b><?=($pesanan->alamatKom) ?></p>
          
          <p><b>provinsi : </b><?=($pesanan->provinsiKom) ?></p>
          <p><b>Kode pos : </b><?=($pesanan->kodeposKom) ?></p>
          <p><b>No Hp :</b><?=($pesanan->nohpKom) ?></p></td>
        <td valign="top">
        <p align="center">Data Penerima</p>
          <p><b>Nama Penerima :</b><?=($pesanan->namaPem) ?></p>
          <p><b>Kota :</b><?=($pesanan->kotaPem) ?></p>
          <p><b>Alamat :</b><?=($pesanan->alamatPem) ?></p>
         
          <p><b>provinsi :</b><?=($pesanan->provinsiPem) ?></p>
          <p><b>Kode pos : </b><?=($pesanan->kodeposPem) ?></p>
          <p><b>No Hp :</b><?=($pesanan->noHpPem) ?></p></td>
      </tr>
      <tr>
        <td height="134" colspan="2" valign="top"><table width="100%" border="1" style=" border: 1px solid black;
    border-collapse: collapse;" >
    
          <tr>
            <td><b>No</td>
            <td><b>Nama Produk</td>
            <td><b>Size</td>
            <td><b>Jumlah</td>
            <td><b>Harga Satuan</td>
            <td><b>Sub Total</td>
          </tr>

         <?php
         $totalHarga='';
         $i=0;
         foreach ($produk as $produk) {
          $i++;
         $subTotal=$produk->harga*$produk->jumlah;
         $totalHarga+=$subTotal;
          ?>
          <tr>
            <td><?=($i) ?></td>
            <td><?=($produk->namaProduk) ?></td>
            <td><?=($produk->size) ?></td>
            <td><?=($produk->jumlah) ?></td>
            <td>Rp.<?=($produk->harga) ?></td>
            <td>Rp.<?=($subTotal) ?></td>
          </tr>
           <?php }?>

          <tr>
         <tr>
            <td rowspan="2" colspan="4">&nbsp;</td>
            <td>total</td>
            <td>Rp.<?=($totalHarga) ?></td>
          </tr>
          <tr>
            <td>Total bayar</td>
            <td>Rp.<?=($pesanan->totalBayar) ?></td>
          </tr>
         
        </table></td>
        </tr>
            <?php } ?>
    </table></td>

  </tr>

</table>



</body>
<script>
function Print() {
    window.print();
}
</script>
</html>
