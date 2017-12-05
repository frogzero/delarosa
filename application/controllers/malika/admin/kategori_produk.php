<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
              $this->load->model('model_kategori');
      			$this->load->helper(array('form', 'url','download'));                          
        }
 

public function tampil_kategori()
	{

		$data['kategori'] = $this->model_kategori->tampilKategori();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/produk/kategori/menu_kategori',$data);
		$this->load->view('admin/footer');
	}

public function findKategori($id_kategori){
				$hasil = $this->db->where('id_kategori', $id_kategori)
									->limit(1)
									->get('kategori_produk');
					if($hasil->num_rows>0){
						return $hasil->row();
					}else{
						return array();
					}
			}


public function tambahKategori()
	{	
		$data = array();
		$data['kode'] = $this->model_kategori->kode_kategori();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/produk/kategori/tambah_kategori',$data);
		$this->load->view('admin/footer');
	}

public function simpanKategori(){
			$kode = $this->input->post('kode');
			$nama_kategori = $this->input->post('kategori');
			$data_kategori = array('id_kategori' => $kode,
									'nama_kategori' => $nama_kategori
								 );
			$this->model_kategori->simpanKategori($data_kategori);
			redirect('admin/kategori_produk/tampil_kategori','refresh');

}

public function hapusKategori($id_kategori){
			$this->model_kategori->hapusKategori($id_kategori);
			redirect('admin/kategori_produk/tampil_kategori','refresh');

}

public function updateKategori($id_kategori){
	$this->form_validation->set_rules('kategori','kategori','required');
	if($this->form_validation->run() == false){
				$data ['kategori'] = $this->model_kategori->findKategori($id_kategori);
				$this->load->view('admin/index');
				$this->load->view('admin/header');
				$this->load->view('admin/menukiri');
				$this->load->view('admin/headerkanan');
				$this->load->view('admin/produk/kategori/edit_kategori',$data);
				$this->load->view('admin/footer');
				}
				
				else{
			$kategori = $this->input->post('kategori');
			$data_kategori = array('nama_kategori' => $kategori
								 );
			$this->model_kategori->updateKategori($id_kategori, $data_kategori);
			redirect('admin/kategori_produk/tampil_kategori','refresh');
				}
}


}

/* End of file kategori_produk.php */
/* Location: ./application/controllers/kategori_produk.php */