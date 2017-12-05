<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kategori extends CI_Model {


public function findKategori($id_kategori){
				$hasil = $this->db->where('id_kategori', $id_kategori)
									->limit(1)
									->get('kategori_produk');
					if($hasil->num_rows>0){
						return $hasil->row();
					}else{
						return array();
					}
			}


public function tampilKategori(){	
			$hasil = $this->db->get('kategori_produk');
			if($hasil->num_rows()>0){
			return $hasil->result();
			}
			else{
			return array();
			}
						
 }
 function kode_kategori()  {   
		$this->db->select('RIGHT(kategori_produk.id_kategori,6) as kode', FALSE);  
		$this->db->order_by('id_kategori','DESC');   $this->db->limit(1); 
		$query = $this->db->get('kategori_produk'); 
			 
			    if($query->num_rows() <> 0){ 
			 
			    $data = $query->row();   
			    $kode = intval($data->kode) + 1; 
			 
			  }else{ 
			 
			    $kode = 1; 
			 
			  } 
			  $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);   $kodejadi = "KA".$kodemax; 
			 
 		 return $kodejadi; 
  	 } 

function simpanKategori($data_kategori)
{
 	$this->db->insert('kategori_produk', $data_kategori);
}

public function hapusKategori($id_kategori){
			 	$this->db->where('id_kategori',$id_kategori)
			 			 ->delete('kategori_produk');
			 }

public function updateKategori($id_kategori,$data_kategori){
				$this->db->where('id_kategori',$id_kategori)
					 	 ->update('kategori_produk',$data_kategori);
			 }

}

/* End of file model_kategori.php */
/* Location: ./application/models/model_kategori.php */