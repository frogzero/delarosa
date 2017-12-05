<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_laporan extends CI_Model {

 public function laporanProduk(){
 	$query = $this->db->get('produk');
 	return $query->result();
 }
	
public function laporanKonsumen(){
 	$query = $this->db->get('konsumen');
 	return $query->result();
 }

public function laporanPesanan(){
 	$this->db->select('
 		pesanan.id_konsumen as id_konsumen,
 		pesanan.id_pesan as idPesan,
 		konsumen.nama as namaKonsumen,
 		bayar.total_bayar as totalBayar,
 		pesanan.tgl_pesan as tanggalPesan,
 		pesanan.nama_penerima as nama_penerima,
 		pesanan.alamat as alamat_penerima,
 		pesanan.kota as kota_penerima,
 		pesanan.provinsi as provinsi_penerima,
 		pesanan.no_hp as no_hp_penerima,
 		bayar.status as status_bayar
 	'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen');
 	 $query = $this->db->get(); 
	return $query->result();
 }

 public function laporanDetailPesanan(){
 	$this->db->select('
 		pesanan.id_konsumen as id_konsumen,
 		pesanan.id_pesan as idPesan,
 		konsumen.nama as namaKonsumen,
 		produk.nama as namaProduk,
 		detail_pesan.jml_pesan as jumlahPesan,
 		detail_pesan.id_size as ukuran,
 		bayar.total_bayar as totalBayar,
 		pesanan.tgl_pesan as tanggalPesan,
 		bayar.status as status
 	'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen');

 	 $this->db->join('detail_pesan', 'pesanan.id_pesan = detail_pesan.id_pesan');
 	 $this->db->join('produk', 'detail_pesan.id_produk = produk.id_produk', 'left');
 	 $query = $this->db->get(); 
	return $query->result();
 }



}

/* End of file model_laporan.php */
/* Location: ./application/models/model_laporan.php */