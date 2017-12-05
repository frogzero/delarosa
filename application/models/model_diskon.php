<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_diskon extends CI_Model {

	function cek_kode_diskon($kode){
		$this->db->where('kode_diskon',$kode);		
		$query = $this->db->get('diskon');
		if ($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

	function tampilDiskon(){
 $query = $this->db->get('diskon');
 return $query->result();
}


function simpan($data_diskon){
	$this->db->insert('diskon', $data_diskon);
}

function hapus($id_diskon){
	$this->db->where('id_diskon',$id_diskon)
			 ->delete('diskon');
}
}

/* End of file model_diskon.php */
/* Location: ./application/models/model_diskon.php */