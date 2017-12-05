<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diskon extends CI_Controller {

	public function __construct()
        {
      parent::__construct();
      $this->load->model('model_diskon');
      $this->load->helper(array('form', 'url'));                          
        }

	public function index()
	{
		$data['diskon'] = $this->model_diskon->tampilDiskon();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/diskon/menu',$data);
		$this->load->view('admin/footer');
	}
	public function tambah()
	{
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/diskon/tambahDiskon');
		$this->load->view('admin/footer');
	}
	public function simpan(){
		$kode_diskon  = $this->input->post('kodediskon');
		$jumlah = $this->input->post('jumlah');
		$data_diskon = array(
			'kode_diskon' => $kode_diskon,
			'jumlah' => $jumlah );
		$this->model_diskon->simpan($data_diskon);
		redirect('admin/diskon/','refresh');

	}

	public function hapus($id_diskon){
$this->model_diskon->hapus($id_diskon);
redirect('admin/diskon','refresh');
	}

}

/* End of file diskon.php */
/* Location: ./application/controllers/diskon.php */