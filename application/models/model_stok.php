<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_stok extends CI_Model {

public function cek_stok()
		{
			$this->db->select('*');
			$this->db->from('stok');
			 $hasil = $this->db->get();
			if($hasil->num_rows()>0){
			return $hasil->result();
			}
			else{
			return array();
			}

					}
	
public function simpanSize($datastok)
 {
 	$this->db->insert('stok', $datastok);
 }

 public function hapusStok($id_produk)
 {
 	$this->db->where('id_produk',$id_produk)
			 		->delete('stok');
 }

 public function tampilStok($id_produk){
 	$this->db->select('*')
 			 ->from('stok')
 			 ->where('id_produk',$id_produk);
 	$query=$this->db->get();
 	return $query->result();
 }

 public function cekStok($id_produk){
 	$hasil = $this->db->where('id_produk', $id_produk)
									->limit(1)
									->get('stok');
					if($hasil->num_rows>0){
						return $hasil->row();
					}else{
						return array();
					}
 }

 function ketersediaanStok(){
 	$this->db->select('*');
 	$this->db->from('stok');
 	$this->db->join('produk', 'stok.id_produk = produk.id_produk');
 	$hasil= $this->db->get();
 	return $hasil->result();
 }

}

/* End of file model_stok.php */
/* Location: ./application/models/model_stok.php */