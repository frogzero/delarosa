<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_size extends CI_Model {

public function tampil_size()
{
	$this->db->select('*');
	$this->db->from('ukuran');
	$query= $this->db->get();
	return $query->result();
}


public function simpanSize($datasize1,$datasize2,$datasize3,$datasize4)
 {
 	$this->db->insert('size', $datasize1);
 	$this->db->insert('size', $datasize2);
 	$this->db->insert('size', $datasize3);
 	$this->db->insert('size', $datasize4);
 }

 public function simpanUkuran($dataukuran)
 {
 	$this->db->insert('ukuran', $dataukuran);
 }
	
public function updateUkuran($id_size,$dataukuran)
{
	$this->db->where('id_size', $id_size)
			 ->update('ukuran', $dataukuran);
}

public function hapus($id_size)
{
	$this->db->where('id_size', $id_size)
			 ->delete('ukuran');
}

public function findSize($id_size)
{
	$hasil = $this->db->where('id_size', $id_size)
									->limit(1)
									->get('ukuran');
					if($hasil->num_rows>0){
						return $hasil->row();
					}else{
						return array();
					}
}
}

/* End of file model_size.php */
/* Location: ./application/models/model_size.php */