<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size extends CI_Controller {

		public function __construct()
        {
                parent::__construct();
              $this->load->model(array('model_produk','model_kategori','model_size','model_stok'));
      			$this->load->helper(array('form', 'url','download'));                          
        }

	public function index()
	{

		$data['ukuran'] = $this->model_size->tampil_size();

		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/produk/size/menu',$data);
		$this->load->view('admin/footer');
		
	}
	public function tambahSize()
	{
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/produk/size/tambah_size');
		$this->load->view('admin/footer');
	}

	public function simpanSize(){
		$id_size = $this->input->post('id_size');
		$deskripsi_ukuran = $this->input->post('deskripsi');
		$dataukuran = array(
			'id_size' => $id_size,
			'deskripsi' =>$deskripsi_ukuran);
		
		$this->model_size->simpanUkuran($dataukuran);
		redirect('admin/size/','refresh');
	}

	public function updateSize($id_size){

	$this->form_validation->set_rules('deskripsi','deskripsi','required');
	if($this->form_validation->run() == false){
		$data ['size'] = $this->model_size->findSize($id_size);
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		//$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/produk/size/edit_size',$data);
		$this->load->view('admin/footer');
				}
				
				else{
			$deskripsi = $this->input->post('deskripsi');
			$dataukuran = array('deskripsi' => $deskripsi
								 );
			$this->model_size->updateUkuran($id_size, $dataukuran);
			redirect('admin/size/','refresh');

	}
}

public function hapusSize($id_size){
$this->model_size->hapus($id_size);
			redirect('admin/size/','refresh');
}

}

/* End of file size.php */
/* Location: ./application/controllers/size.php */