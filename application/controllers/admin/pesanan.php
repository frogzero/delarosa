<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesanan extends CI_Controller {

	 public function __construct()
        {
      parent::__construct();
      $this->load->model('model_pesanan');
      $this->load->helper(array('form', 'url'));                          
        }

	public function index()
	{		
		$data['hasilTransaksi'] = $this->model_pesanan->getTransaksi();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/pesanan/menu', $data);
		$this->load->view('admin/footer');
	}
	public function pesananSudahProses()
	{		
		$data['sudahKonfirmasi'] = $this->model_pesanan->tampil_bayar_sudah_diProses();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/pesanan/pesananSudahProses', $data);
		$this->load->view('admin/footer');
	}
	public function pesananBelumKonfirmasi()
	{		
		$data['sudahKonfirmasi'] = $this->model_pesanan->tampil_Belum_konfirmasi();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/pesanan/pesananBelumKonfirmasi', $data);
		$this->load->view('admin/footer');
	}
	public function pesananSudahKonfirmasi()
	{		
		$data['sudahKonfirmasi'] = $this->model_pesanan->tampil_sudah_konfirmasi();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/pesanan/pesananSudahKonfirmasi', $data);
		$this->load->view('admin/footer');
	}
	public function semuaPesanan()
	{		
		$data['sudahKonfirmasi'] = $this->model_pesanan->tampilSemuaPesanan();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/pesanan/semuaPesanan', $data);
		$this->load->view('admin/footer');
	}
	public function notaPesanan($id_pesan)
	{		
		$data['pesan'] = $this->model_pesanan->tampilNota($id_pesan);
		$data['produk'] = $this->model_pesanan->tampilProdukNota($id_pesan);
		$this->load->view('admin/pesanan/Nota/nota',$data);
	}
	
	public function cetak($id_pesan)
	{		
		$data['pesan'] = $this->model_pesanan->tampilNota($id_pesan);
		$data['produk'] = $this->model_pesanan->tampilProdukNota($id_pesan);
		$this->load->view('admin/pesanan/Nota/print',$data);
	}


	function batalPesanan($kodeBayar){
		$data_pesanan= array(
										'status' => 'Belum Konfirmasi'
									);
				$this->model_pesanan->batal_proses($kodeBayar,$data_pesanan);
				redirect('/admin/pesanan/pesananSudahProses','refresh');

	}


public function konfirmasi_pesanan($kodeBayar)
	{	
				$data_pesanan= array(
										'status' => 'Di Konfirmasi'
									);

				$this->model_pesanan->proses_pesanan($kodeBayar,$data_pesanan);
				redirect('/admin/pesanan/pesananSudahProses','refresh');
				
}


public function hapusPesanan($id_pesan){
	$this->model_pesanan->hapusPesanan($id_pesan);
	redirect('/admin/homeAdmin/','refresh');
}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */