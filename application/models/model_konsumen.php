<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_konsumen extends CI_Model {

 public function all(){
					$hasil = $this->db->get('konsumen');
					if($hasil->num_rows()>0){
						return $hasil->result();
						}
						else{
							return array();
						}

				 }


	function kode_konsumen()  {   
		$this->db->select('RIGHT(konsumen.id_konsumen,6) as kode', FALSE);  
		$this->db->order_by('id_konsumen','DESC');   $this->db->limit(1); 
		$query = $this->db->get('konsumen'); 
			 
			    if($query->num_rows() <> 0){ 
			 
			    $data = $query->row();   
			    $kode = intval($data->kode) + 1; 
			 
			  }else{ 
			 
			    $kode = 1; 
			 
			  } 
			  $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);   $kodejadi = "KS".$kodemax; 
			 
 		 return $kodejadi; 
  	 } 

 public function simpan($data_konsumen){
			 
				$this->db->insert('konsumen', $data_konsumen);
						 }


function get_detail_konsumen($id_konsumen){ //mengambil detail data dari tabel produk
		$this->db->where('id_konsumen',$id_konsumen); 
		$query = $this->db->get('konsumen');
		return $query->result();
	}

public function update($id_konsumen,$data_konsumen){
			$this->db->where('id_konsumen',$id_konsumen)
				 	 ->update('konsumen',$data_konsumen);
						 }
			 
		public function hapus($id_konsumen){
			 	$this->db->where('id_konsumen',$id_konsumen)
			 			 ->delete('konsumen');
			 }

}

/* End of file model_konsumen.php */
/* Location: ./application/models/model_konsumen.php */