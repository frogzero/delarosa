<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_berita extends CI_Model {
	public function tampil_berita()
	{		
		$query = $this->db->get('berita');
		if ($query->num_rows()>=1){
			return $query->result();
		}else{
			return false;
		}

	}
	public function simpan_berita($data_berita)
	{
		$this->db->insert('berita', $data_berita);
		}
	function hapus_berita($id_berita)
	{
		$this->db->where('id_berita', $id_berita);
		$this->db->delete('berita');
	}
	

}

/* End of file model_berita.php */
/* Location: ./application/models/model_berita.php */