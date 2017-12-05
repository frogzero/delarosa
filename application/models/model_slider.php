<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_slider extends CI_Model {

public function tampilSlider(){
	$query= $this->db->get('slider');
	return $query->result();
}

public function simpan_slider($data_slider)
{
			 			$this->db->insert('slider', $data_slider);
						 }	
public function hapus($id_slider)
{
	$this->db->where('id_slider', $id_slider)
			 ->delete('slider');
}

}

/* End of file model_slider.php */
/* Location: ./application/models/model_slider.php */