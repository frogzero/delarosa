<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_pesanan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('model_komentar','model_produk','model_kategori','model_web','model_konsumen','model_pesanan'));
		$this->load->library('cart');
		$this->load->helper(array('form', 'url'));  
	}

	public function Konfirmasi($kodeBayar)
	{
		$today = date('Y-m-d');
		$data['kategori'] = $this->model_kategori->tampilKategori();
		$this->form_validation->set_rules('nama','nama','required');
		$dataa['kode'] = $this->model_konsumen->kode_konsumen();
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){
		if($this->form_validation->run() == false){
		$data ['bayar'] = $this->model_pesanan->findBayar($kodeBayar);
		$this->load->view('web/index');
		$this->load->view('web/header',$dataa);
		$this->load->view('web/welcome');
		$this->load->view('web/kategori',$data);
		$this->load->view('web/konfirmasiPelanggan',$data);
		$this->load->view('web/footer');
				}
				else{
				$catatan = $this->input->post('catatan');

				$atas_nama = $this->input->post('atas_nama');
				$data_konfirmasi= array(
										'catatan' => $catatan,
										'tanggal_konfirmasi' => $today,
										'status' => 'Sudah Konfirmasi',
										'atasNama' => $atas_nama
									);
					$this->model_pesanan->konfirmasiPelanggan($kodeBayar,$data_konfirmasi);		
			echo '<script language="javascript">';
			echo 'alert("Terimakasih. Pesanan anda akan segera kami proses.")';
			echo '</script>';
		    echo '<script>';
			echo 'window.location=("'.site_url('home/statusPesan/').'");';
			echo '</script>'; 
				}
	}else{
		$this->load->view('web/index');
		$this->load->view('web/headerlogin',$dataa);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/konfirmasiPelanggan');
		$this->load->view('web/footer');

	}
}

public function pesanbatal($kodeBayar)
	{	
				$data_pesan= array(
										'status' => 'Pesanan Dibatalkan'
									);

				$this->model_pesanan->batalPesanan($kodeBayar,$data_pesan);
				redirect(base_url('index.php/home/Konfirmasi/'));
				
}

}

/* End of file konfirmasi_pesanan.php */
/* Location: ./application/controllers/konfirmasi_pesanan.php */