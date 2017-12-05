<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

public function __construct()
        {
                parent::__construct();
                $this->load->model(array('model_slider'));
      			$this->load->helper(array('form', 'url','download'));                          
        }
	public function index()
	{
		$data['slider'] = $this->model_slider->tampilSlider();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/slider/menu',$data);
		$this->load->view('admin/footer');
		
	}

	public function tambah(){
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/slider/tambahSlider');
		$this->load->view('admin/footer');
		

	}

	public function simpan_slider(){
		$this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './upload/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '90480'; //maksimum besar file 2M
        $config['max_width']  = '50000'; //lebar maksimum 1288 px
        $config['max_height']  = '50000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if($_FILES['pic']['name'])
        {
            if ($this->upload->do_upload('pic'))
            {

			$nama = $this->input->post('nama');
	        $url = $this->upload->data();
			$data_slider = array(
									'nama' => $nama,
									'gambar' => $url['file_name']
									
									);
		    $this->model_slider->simpan_slider($data_slider);
		    redirect('admin/slider','refresh');
		}
	}

	}

	public function hapus($id_slider){
		$this->model_slider->hapus($id_slider);
		redirect('admin/slider/','refresh');
	}

}

/* End of file slider.php */
/* Location: ./application/controllers/admin/slider.php */