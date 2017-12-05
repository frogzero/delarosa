<html>
<head>
	<title>Laporan Konsumen</title>
</head>
<body>

<h4 style="text-align: center;">Laporan Data Konsumen</h4>
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
	<th>Nama Konsumen</th>
	<th>Username</th>
	<th>Alamat</th>
	<th>Provinsi</th>
	<th>Kota</th>
	<th>Kode Pos</th>
	<th>No hp</th>
</tr>
<?php
if( ! empty($konsumen)){
	$no = 1;
	foreach($konsumen as $data){
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data->id_konsumen."</td>";
		echo "<td>".$data->nama."</td>";
		echo "<td>".$data->username."</td>";
		echo "<td>".$data->alamat."</td>";
		echo "<td>".$data->provinsi."</td>";
		echo "<td>".$data->kota."</td>";

		echo "<td>".$data->kodepos."</td>";
		echo "<td>".$data->nohp."</td>";
		echo "</tr>";
		$no++;
	}
}
?>
</table>

</body>
</html>
