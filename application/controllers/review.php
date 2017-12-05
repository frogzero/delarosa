<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_komentar');
		$this->load->helper(array('form', 'url'));  
	}

	public function index()
	{
		$kode_review = $this->model_komentar->kode_review();
		$id_produk = $this->input->post('id_produk');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$komentar = $this->input->post('komentar');
		$data_review = array(
			'id_review' => $kode_review ,
			'id_produk' => $id_produk ,
			'nama' => $nama ,
			'email' => $email ,
			'komentar' => $komentar ,
			'status' => 'tidak tampilkan' 
			 );
		$this->model_komentar->simpanKomentar($data_review);
		echo '<script language="javascript">';
			echo 'alert("Terimakasih Atas Kometar anda")';
			echo '</script>';
		echo '<script>';
			echo 'window.location=history.go(-1);';
			echo '</script>';
	}

}

/* End of file review.php */
/* Location: ./application/controllers/review.php */