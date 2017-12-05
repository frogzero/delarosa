<html>
<head>
	<title>Laporan Produk</title>
</head>
<body>

<h4 style="text-align: center;">Laporan Data Produk</h4>
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

<table border="1" align="center" style="width:800px" >
<tr >
	<th>No</th>
	<th>Kode Produk</th>
	<th width="400px">Nama Produk</th>
	<th>Kategori</th>
	<th>Pembeli</th>
</tr>
<?php
if( ! empty($produk)){
	$no = 1;
	foreach($produk as $data){
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data->id_produk."</td>";
		echo "<td>".$data->nama."</td>";
		echo "<td>".$data->id_kategori."</td>";
		echo "<td>".$data->pembeli."</td>";
		echo "</tr>";
		$no++;
	}
}
?>
</table>

</body>
</html>
