<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_pesanan extends CI_Controller {

public function find($id_konsumen){
					$hasil = $this->db->where('id_konsumen', $id_konsumen)
									->limit(1)
									->get('id_konsumen');
					if($hasil->num_rows>0){
						return $hasil->row();
					}else{
						return array();
					}
			}


function getTransaksi(){
    $this->db->select
    ('detail_pesan.id_pesan as id_pesan, konsumen.nama as nama_konsumen, produk.nama as nama_produk, detail_pesan.jml_pesan, detail_pesan.id_size'); 
    $this->db->from('produk');
    $this->db->join('detail_pesan', 'produk.id_produk = detail_pesan.id_produk'); 
    $this->db->join('pesanan', 'detail_pesan.id_pesan = pesanan.id_pesan'); 
    $this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen');
 
    $query = $this->db->get(); 
        if ($query->num_rows() >0){ 
            foreach ($query->result() as $data) {
                # code...
                $hasilTransaksi[] = $data;
            }
        return $hasilTransaksi; 
        }
}

public function findBayar($kodeBayar){
				$hasil = $this->db->where('id_bayar', $kodeBayar)
									->limit(1)
									->get('bayar');
					if($hasil->num_rows>0){
						return $hasil->row();
					}else{
						return array();
					}
			}

public function konfirmasiPelanggan($kodeBayar,$data_konfirmasi){
				$this->db->where('id_bayar',$kodeBayar)
					 	 ->update('bayar',$data_konfirmasi);
			 }
public function batalPesanan($kodeBayar,$data_pesan){
				$this->db->where('id_bayar',$kodeBayar)
					 	 ->update('bayar',$data_pesan);
			 }


function tampil_bayar_sudah_diProses(){
 
	$this->db->select('bayar.id_bayar as kodeBayar,bayar.id_pesan as idPesan, pesanan.tgl_pesan as tanggalPesan, pesanan.nama_penerima as namaPem, bayar.total_bayar as totalBayar, bayar.status, bayar.resi,bayar.id_pesan as idBayar,konsumen.nama as namaKom,bayar.tanggal_konfirmasi as tanggalBayar'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen'); 
 	 $this->db->where('bayar.status','Di Konfirmasi');
 	 $this->db->order_by('bayar.status','DESC');
 	 $query = $this->db->get(); 
	return $query->result();
}

function tampil_Belum_konfirmasi(){
 
	$this->db->select('bayar.id_bayar as kodeBayar,bayar.id_pesan as idPesan, pesanan.tgl_pesan as tanggalPesan, pesanan.nama_penerima as namaPem, bayar.total_bayar as totalBayar, bayar.status, bayar.resi,bayar.id_pesan as idBayar,konsumen.nama as namaKom,bayar.tanggal_konfirmasi as tanggalBayar'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen'); 
 	 $this->db->where('bayar.status','Belum Konfirmasi');
 	 $this->db->order_by('bayar.status','DESC');
 	 $query = $this->db->get(); 
	return $query->result();
}

function tampil_sudah_konfirmasi(){
 
	$this->db->select('
		bayar.id_bayar as kodeBayar,
		bayar.id_pesan as idPesan, 
		pesanan.tgl_pesan as tanggalPesan,
	 pesanan.nama_penerima as namaPem, 
	 bayar.total_bayar as totalBayar, 
	 bayar.status, 
	 bayar.resi,
	 bayar.id_pesan as idBayar, 
	 bayar.catatan as catatan,
	 bayar.atasNama as atasNama,
	 konsumen.nama as namaKom,bayar.tanggal_konfirmasi as tanggalBayar'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen'); 
 	 $this->db->where('bayar.status','Sudah Konfirmasi');
 	 $this->db->order_by('bayar.status','DESC');
 	 $query = $this->db->get(); 
	return $query->result();
}

function tampilSemuaPesanan(){
 
	$this->db->select('bayar.id_bayar as kodeBayar,bayar.id_pesan as idPesan, pesanan.tgl_pesan as tanggalPesan, pesanan.nama_penerima as namaPem, bayar.total_bayar as totalBayar, bayar.status, bayar.resi,bayar.id_pesan as idBayar,konsumen.nama as namaKom,bayar.tanggal_konfirmasi as tanggalBayar'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen'); 
 	 $this->db->order_by('bayar.status','DESC');
 	 $query = $this->db->get(); 
	return $query->result();
}


function tampilNota($id_pesanan){
 
	$this->db->select('bayar.id_bayar as kodeBayar,
		bayar.id_pesan as idPesan, 
		bayar.total_bayar as totalBayar,
		bayar.status, 
		bayar.resi,
		bayar.id_pesan as idBayar,
		bayar.tanggal_konfirmasi as tanggalBayar,
		konsumen.nama as namaKom,
		konsumen.alamat as alamatKom,
		konsumen.kota as kotaKom,
		konsumen.provinsi as provinsiKom,
		konsumen.kodepos as kodeposKom,
		konsumen.nohp as nohpKom,
		pesanan.tgl_pesan as tanggalPesan, 
		pesanan.nama_penerima as namaPem,
		pesanan.alamat as alamatPem,
		pesanan.kota as kotaPem, 
		pesanan.provinsi as provinsiPem,
		pesanan.kodepos as kodeposPem,
		pesanan.no_hp as noHpPem
				'); 
	  	$this->db->from('bayar');
	 	$this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan');
	 	$this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen'); 
	 	$this->db->where('bayar.id_pesan', $id_pesanan);
	 	$query = $this->db->get(); 
		return $query->result();
}

function tampilProdukNota($id_pesan){ 
	 $this->db->select('pesanan.id_pesan,produk.nama as namaProduk, detail_pesan.id_size as size, detail_pesan.jml_pesan as jumlah, produk.harga as harga'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('detail_pesan', 'detail_pesan.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('produk', 'detail_pesan.id_produk = produk.id_produk'); 
 	 $this->db->where('pesanan.id_pesan', $id_pesan);
 	  $query = $this->db->get(); 
	 return $query->result();
}

public function proses_pesanan($kodeBayar,$data_pesanan){
				$this->db->where('id_bayar',$kodeBayar)
					 	 ->update('bayar',$data_pesanan);
			 }

public function hapusPesanan($id_pesan){

				$this->db->where('id_pesan',$id_pesan)
					 	 ->delete('bayar');

				$this->db->where('id_pesan',$id_pesan)
					 	 ->delete('pesanan');

				$this->db->where('id_pesan',$id_pesan)
					 	 ->delete('detail_pesan');
					 	 
}

public function batal_proses($kodeBayar,$data_pesanan)
{
	$this->db->where('id_bayar',$kodeBayar)
					 	 ->update('bayar',$data_pesanan);
}
function tampil_status_pesanan($id_konsumen){
	 $this->db->select('bayar.id_bayar as kodeBayar,pesanan.tgl_pesan as tanggalPesan, pesanan.nama_penerima as namaPem, bayar.total_bayar as totalBayar, bayar.status, bayar.resi,bayar.kurir,bayar.id_pesan as idBayar'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen'); 
 	 $this->db->where('konsumen.id_konsumen',$id_konsumen);
 	 $this->db->order_by('bayar.status','DESC');
 	 $query = $this->db->get(); 
	return $query->result();
}
function tampil_bayar_belum_konfirmasi($id_konsumen){
 
	 $this->db->select('pesanan.id_pesan as id_pesan, bayar.id_bayar as kodeBayar, bayar.total_bayar as totalBayar, bayar.status, bayar.resi, bayar.id_pesan as idBayar'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen'); 
 	 $this->db->where('bayar.status','Belum Konfirmasi');
 	 $this->db->where('konsumen.id_konsumen',$id_konsumen);
 	 $this->db->order_by('bayar.id_bayar','DESC');
 	  $query = $this->db->get(); 
	return $query->result();
}


public function cariResi($id_pesan){
					$hasil = $this->db->where('id_pesan', $id_pesan)
									->limit(1)
									->get('bayar');
					if($hasil->num_rows>0){
						return $hasil->row();
					}else{
						return array();
					}
			}
public function simpanResi($id_pesan,$data_resi){
				$this->db->where('id_pesan',$id_pesan)
					 	 ->update('bayar',$data_resi);
			}


function tampil_bayar_resi_pengiriman(){
	$this->db->select('bayar.id_bayar as kodeBayar,bayar.id_pesan as idPesan, pesanan.tgl_pesan as tanggalPesan, pesanan.nama_penerima as namaPem, bayar.total_bayar as totalBayar, bayar.status, bayar.resi,bayar.id_pesan as idBayar,konsumen.nama as namaKom,bayar.tanggal_konfirmasi as tanggalBayar'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('konsumen', 'pesanan.id_konsumen = konsumen.id_konsumen'); 
 	 $this->db->order_by('bayar.status','DESC');
 	 $query = $this->db->get(); 
	return $query->result();
}
}