<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
              $this->load->model(array('model_produk','model_kategori','model_size','model_stok'));
      			$this->load->helper(array('form', 'url','download'));                          
        }
	public function tambah($id_produk)
	{

		$data['size'] = $this->model_stok->tampilStok($id_produk);
		$data['produk'] = $this->model_stok->cekStok($id_produk);
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/produk/stok/menu',$data);
		$this->load->view('admin/footer');
	}

	public function simpanStok($id_produk){
			$produk = $this->input->post('produk');
			$stok = $this->input->post('stok');
	        $size = $this->input->post('size');
	        $jumlah_dipilih= count($stok);

	        $this->model_stok->hapusStok($id_produk);

	        for($x=0;$x<$jumlah_dipilih;$x++){
	        	$datastok = array('id_produk' =>$produk[$x] , 
	        	 			'id_size' => $size[$x],
		    				'stok'=>$stok[$x]);

	        	$this->model_stok->simpanSize($datastok);

	        }
			redirect('admin/produk/tampil_produk');
	}

	public function ketersediaanStok()
	{
		$data['stok'] = $this->model_stok->ketersediaanStok();	
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/produk/stok/tampilStok',$data);
		$this->load->view('admin/footer');

	}

}

/* End of file stok.php */
/* Location: ./application/controllers/stok.php */