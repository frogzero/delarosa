<html>
<head>
	<title>Laporan Detail Pesanan</title>
</head>
<body>

<h4 style="text-align: center;">Data Detail pesanan</h4>
<hr>
<p>Dibuat Tanggal : <?=date('Y-m-d');?></p>

<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>

<table border="1" align="center">
<tr>
	<th>No</th>
	<th>Id Konsumen</th>
	<th>Id Pesan</th>
	<th>Nama Konsumen</th>
	<th>Produk</th>
	<th>jumlah Pesan</th>
	<th>Ukuran Produk</th>
	<th>Total Harga</th>
	<th>Tanggal Pesan</th>
</tr>
<?php
if( ! empty($pesanan)){
	$no = 1;
	foreach($pesanan as $data){
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data->id_konsumen."</td>";
		echo "<td>".$data->idPesan."</td>";
		echo "<td>".$data->namaKonsumen."</td>";
		echo "<td>".$data->namaProduk."</td>";
		echo "<td>".$data->jumlahPesan."</td>";
		echo "<td>".$data->ukuran."</td>";
		echo "<td>".$data->totalBayar."</td>";
		echo "<td>".$data->tanggalPesan."</td>";
		echo "</tr>";
		$no++;
	}
}
?>
</table>

</body>
</html>
