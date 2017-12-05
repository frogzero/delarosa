<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

public function find($id_produk){
				$hasil = $this->db->where('id_produk', $id_produk)
									->limit(1)
									->get('produk');
					if($hasil->num_rows>0){
						return $hasil->row();
					}else{
						return array();
					}
			}



public function all($limit,$offset){
			$this->db->order_by('id_produk','DESC');
			$this->db->limit($limit,$offset);		
			$hasil = $this->db->get('produk');
			if($hasil->num_rows()>0){
			return $hasil->result();
			}
			else{
			return array();
			}
						
 }

 




public function tampilProduk()
{	
			$hasil = $this->db->get('produk');
			if($hasil->num_rows()>0){
			return $hasil->result();
			}
			else{
			return array();
			}
}

function kode_produk()  {   
		$this->db->select('RIGHT(produk.id_produk,6) as kode', FALSE);  
		$this->db->order_by('id_produk','DESC');   $this->db->limit(1); 
		$query = $this->db->get('produk'); 
			 
			if($query->num_rows() <> 0){ 
			 
			    $data = $query->row();   
			    $kode = intval($data->kode) + 1; 
			 
			  }else{ 
			 
			    $kode = 1; 
			 
			  } 
			  $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);   $kodejadi = "PK".$kodemax; 
			 
 		 return $kodejadi; 
  	 } 

public function simpan_produk($data_produk)
{
			 			$this->db->insert('produk', $data_produk);
						 }
						 
 public function hapus($id_produk){
			 	$this->db->where('id_produk',$id_produk)
			 			 ->delete('produk');
			 	 $this->db->where('id_produk',$id_produk)
			 			 ->delete('stok');
			 }
public function update($id_produk,$data_produk){
				$this->db->where('id_produk',$id_produk)
					 	 ->update('produk',$data_produk);
			 }

}

/* End of file produk.php */
/* Location: ./application/models/produk.php */