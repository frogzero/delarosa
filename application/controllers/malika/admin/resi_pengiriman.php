<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resi_pengiriman extends CI_Controller {

	 public function __construct()
        {
      parent::__construct();
      $this->load->model('model_pesanan');
      $this->load->helper(array('form', 'url'));                          
        }

	
	public function resi()
	{		
		$data['sudahKonfirmasi'] = $this->model_pesanan->tampil_bayar_resi_pengiriman();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/resi/menu_resi', $data);
		$this->load->view('admin/footer');
	}

	public function tambahResi($id_pesan){
	$this->form_validation->set_rules('kurir','kurir','required');
	if($this->form_validation->run() == false){
				$data ['pesanan'] = $this->model_pesanan->cariResi($id_pesan);
				$this->load->view('admin/index');
				$this->load->view('admin/header');				
				$this->load->view('admin/menukiri');
				$this->load->view('admin/headerkanan');
				$this->load->view('admin/resi/tambah_resi',$data);
				$this->load->view('admin/footer');
				}
				
				else{
			$kurir= $this->input->post('kurir');
			$resi= $this->input->post('resi');
			$data_resi = array(
										'kurir' => $kurir,
										'resi' => $resi
								 );
			$this->model_pesanan->simpanResi($id_pesan, $data_resi);
			redirect('/admin/resi_pengiriman/resi/','refresh');
				}
}

}

/* End of file resi_pengiriman.php */
/* Location: ./application/controllers/resi_pengiriman.php */