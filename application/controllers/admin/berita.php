<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

public function __construct()
        {
      parent::__construct();
      $this->load->model('model_berita');
      $this->load->helper(array('form', 'url'));                          
        }

	public function tampil_berita()
	{
$data["berita"]=$this->model_berita->tampil_berita();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/berita/menu_berita',$data);
		$this->load->view('admin/footer');
	}

	public function tambah_berita()
	{
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/berita/tambah_berita');
		$this->load->view('admin/footer');
	}
	public function simpan_berita()
	{
		$this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './upload/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '3000'; //lebar maksimum 1288 px
        $config['max_height']  = '3000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if($_FILES['pic']['name'])
        {

            if ($this->upload->do_upload('pic'))
            {
     	 $url = $this->upload->data();
		$judul_berita= $this ->input->post('judul_berita');
		$isi_berita= $this ->input->post('isi_berita');
		$tanggal_posting= $this ->input->post('tanggal_posting');
		$data_berita = array('judul_berita' => $judul_berita ,
							 'isi_berita'=>$isi_berita,
							 'tanggal_posting'=>$tanggal_posting,
							 'gambar_berita' => $url['file_name'] );
		$this->model_berita->simpan_berita($data_berita);
		redirect('admin/berita/tampil_berita','refresh');
	}
	
	}$judul_berita= $this ->input->post('judul_berita');
		$isi_berita= $this ->input->post('isi_berita');
		$tanggal_posting= $this ->input->post('tanggal_posting');
		$data_berita = array('judul_berita' => $judul_berita ,
							 'isi_berita'=>$isi_berita,
							 'tanggal_posting'=>$tanggal_posting);
		$this->model_berita->simpan_berita($data_berita);
		redirect('admin/berita/tampil_berita','refresh');
}

public function hapus_berita($id_berita){
	$this->model_berita->hapus_berita($id_berita);
	redirect('admin/berita/tampil_berita','refresh');
}


}

/* End of file berita.php */
/* Location: ./application/controllers/admin/berita.php */