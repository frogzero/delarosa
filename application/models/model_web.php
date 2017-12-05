<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_web extends CI_Model {

function hitung_isi_tabel($tabel,$seleksi)
		{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
		}

function hitung_isi_tabel_berita($tabel,$seleksi)
		{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
		}

function hitung_isi_tabel_perkategori($tabel,$seleksi,$id_kategori)
		{
		$q = $this->db->query("SELECT * from $tabel $seleksi where id_kategori='$id_kategori'");
		return $q;
		}


public function baca_artikel($id_artikel){
			$this->db->where('id_berita',$id_artikel);	
			$hasil = $this->db->get('berita');
			if($hasil->num_rows()>0){
			return $hasil->result();
			}
			else{
			return array();
			}
						
 }


public function all_artikel($limit,$offset){
			$this->db->order_by('id_berita','DESC');
			$this->db->limit($limit,$offset);		
			$hasil = $this->db->get('berita');
			if($hasil->num_rows()>0){
			return $hasil->result();
			}
			else{
			return array();
			}
						
 }


public function tampil_artikel($limit,$offset){
			$this->db->order_by('id_berita','DESC');
			$this->db->limit($limit,$offset);		
			$hasil = $this->db->get('berita');
			if($hasil->num_rows()>0){
			return $hasil->result();
			}
			else{
			return array();
			}
						
 }


public function tampilProdukTerlaris(){
	       $this->db->select('*');			
		   $this->db->from('produk');
		   $this->db->order_by('pembeli','DESC');
		   $this->db->limit(6);
		    $query = $this->db->get(); 
	return $query->result();
		}
public function tampilStok($id_produk){
 	$this->db->select('*')
 			 ->from('stok')
 			 ->where('id_produk',$id_produk);
 	$query=$this->db->get();
 	return $query->result();
 }
		
public function tampilPerKategori($id_kategori,$limit,$offset){
			$this->db->order_by('id_produk','DESC');
			$this->db->where('id_kategori', $id_kategori);
			$this->db->limit($limit,$offset);		
			$hasil = $this->db->get('produk');
			if($hasil->num_rows()>0){
			return $hasil->result();
			}
			else{
			return array();
			}
						
 }
 public function lihatDetail($id_produk){
	 $this->db->select('*'); 
  	 $this->db->from('produk');
 	 $this->db->where('id_produk',$id_produk);
 	 $query = $this->db->get(); 
	return $query->result();
			 }

public function tampilSlider(){
	$query= $this->db->get('slider');
	return $query->result();
}

	

}

/* End of file model_web.php */
/* Location: ./application/models/model_web.php */