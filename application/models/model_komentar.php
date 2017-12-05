<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_komentar extends CI_Model {

public function tampilKomentarBaru(){
	$this->db->select('*');
	$this->db->from('review');	
	$this->db->where('status', 'Tidak Tampilkan');
	$query = $this->db->get();
	return $query->result();
}

public function tampilSemuaReview(){
	$this->db->select('*');
	$this->db->from('review');	
	$query = $this->db->get();
	return $query->result();
}
public function tampilkan($id_review,$status)
{
	$this->db->where('id_review', $id_review);
	$this->db->update('review',$status);
}
	
	public function hapusKomentar($id_review){
		$this->db->where('id_review', $id_review);
	$this->db->delete('review');
	}


	public function tampilReview($id_produk){
	 $this->db->select('*'); 
  	 $this->db->from('review');
 	 $this->db->where('id_produk',$id_produk);
 	  $this->db->where('status','tampilkan');
 	  $this->db->limit(3);
 	 $query = $this->db->get(); 
	return $query->result();
			 }

 function kode_review()  {   
		$this->db->select('RIGHT(review.id_review,6) as kode', FALSE);  
		$this->db->order_by('id_review','DESC');   
		$this->db->limit(1); 
		$query = $this->db->get('review'); 
			 
			    if($query->num_rows() <> 0){ 
			 
			    $data = $query->row();   
			    $kode = intval($data->kode) + 1; 
			 
			  }else{ 
			 
			    $kode = 1; 
			 
			  } 
			  $kodemax = str_pad($kode, 6, "0", STR_PAD_LEFT);   $kodejadi = "RE".$kodemax; 
			 
 		 return $kodejadi; 
  	 } 


	public function simpanKomentar($data_review){
		$this->db->insert('review', $data_review);
	}

}

/* End of file model_komentar.php */
/* Location: ./application/models/model_komentar.php */