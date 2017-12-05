<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	function login_admin($nama,$password){
		$this->db->where('nama',$nama);		
		$this->db->where('password',$password);
		$query = $this->db->get('admin');
		if ($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}

	function login_pelanggan($nama,$password){
		$this->db->where('username',$nama);		
		$this->db->where('password',$password);
		$query = $this->db->get('konsumen');
		if ($query->num_rows()==1){
			return $query->result();
		}else{
			return false;
		}
	}


}

/* End of file model_admin.php */
/* Location: ./application/models/model_admin.php */