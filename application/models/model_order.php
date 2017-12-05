<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_order extends CI_Model {

function kode_pesanan()  {   
		$this->db->select('RIGHT(pesanan.id_pesan,6) as kode', FALSE);  
		$this->db->order_by('id_pesan','DESC');   $this->db->limit(1); 
		$query = $this->db->get('pesanan'); 
			 
			    if($query->num_rows() <> 0){ 
			 
			    $data = $query->row();   
			    $kode = intval($data->kode) + 1; 
			 
			  }else{ 
			 
			    $kode = 1; 
			 
			  } 
			  $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);   $kodejadi = "PS".$kodemax; 
			 
 		 return $kodejadi; 
  	 }

function kode_bayar()  {   
		$this->db->select('RIGHT(bayar.id_bayar,6) as kode', FALSE);  
		$this->db->order_by('id_bayar','DESC');   $this->db->limit(1); 
		$query = $this->db->get('bayar'); 
			 
			    if($query->num_rows() <> 0){ 
			 
			    $data = $query->row();   
			    $kode = intval($data->kode) + 1; 
			 
			  }else{ 
			 
			    $kode = 1; 
			 
			  } 
			  $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);   $kodejadi = "BY".$kodemax; 
			 
 		 return $kodejadi; 
  	 } 

public function simpan($data_pesanan){
				$this->db->insert('pesanan', $data_pesanan);
				 }
public function simpandetil($data){
				$this->db->insert('detail_pesan', $data);
				}
public function simpanbayar($data){
				$this->db->insert('bayar', $data);
				}

public function pembeli($pembeli,$id_produk){
				$this->db->query("update produk set pembeli=pembeli+$pembeli where id_produk='$id_produk'");			
				 }
	public function update_stok($jumlah_beli,$id_produk,$id_size){
				$this->db->query("update stok set stok=stok-$jumlah_beli where id_produk='$id_produk' and id_size='$id_size'");			
				 }

function lihat_kode()  {   
		$hasil = $this->db->select('max(id_pesan) as id');		
			$hasil = $this->db->get('pesanan');
			
			if($hasil->num_rows()>0){
			return $hasil->result();
			}
			else{
			return $hasil;
			}
  	 } 

public function lihat_email(){
	$this->db->select('email');
	$this->db->from('konsumen');
	$this->db->where('id_konsumen', $this->session->userdata('kd_user'));
	$hasil =$this->db->get();
	if($hasil->num_rows>0){
						return $hasil->row();
					}else{
						return array();
					}
}


function tampil_invoice($id_pesan){ 
	 $this->db->select('pesanan.id_pesan,produk.nama as namaProduk, detail_pesan.id_size as size, detail_pesan.jml_pesan as jumlah, produk.harga as harga,bayar.total_bayar as totBayar'); 
  	 $this->db->from('bayar');
 	 $this->db->join('pesanan', 'bayar.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('detail_pesan', 'detail_pesan.id_pesan = pesanan.id_pesan'); 
 	 $this->db->join('produk', 'detail_pesan.id_produk = produk.id_produk'); 
 	 $this->db->where('pesanan.id_pesan', $id_pesan);
 	  $query = $this->db->get(); 
	 return $query->result();
}


function tampilInv($id_pesanan){
 
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


}

/* End of file model_order.php */
/* Location: ./application/models/model_order.php */