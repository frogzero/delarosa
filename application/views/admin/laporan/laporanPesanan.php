<html>
<head>
	<title>Laporan Pesanan</title>
</head>
<body>

<h4 style="text-align: center;">Laporan Data Pesanan</h4>
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
	<th>Nama Penerima</th>
	<th>Alamat Penerima</th>
	<th>Total Pesan</th>
	<th>Tanggal Pesan</th>
	<th>Status</th>
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
		echo "<td>".$data->nama_penerima."</td>";
		echo "<td>".$data->alamat_penerima.",<br>
		".$data->kota_penerima.",".$data->provinsi_penerima.",".$data->no_hp_penerima."
		</td>";
		echo "<td>".$data->totalBayar."</td>";
		echo "<td>".$data->tanggalPesan."</td>";
		echo "<td>".$data->status_bayar."</td>";
		echo "</tr>";
		$no++;
	}
}
?>
</table>

</body>
</html>
