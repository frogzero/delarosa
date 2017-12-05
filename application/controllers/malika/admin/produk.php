<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
              $this->load->model(array('model_produk','model_kategori','model_size','model_stok'));
      			$this->load->helper(array('form', 'url','download'));                          
        }

	public function tampil_produk()
	{
		$data['produk'] = $this->model_produk->tampilProduk();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/produk/menu',$data);
		$this->load->view('admin/footer');
		
	}
	public function tambah_produk()
	{	
		$data = array();
		$data['kode'] = $this->model_produk->kode_produk();
		$data['kategori'] = $this->model_kategori->tampilKategori();
		$data['size'] = $this->model_size->tampil_size();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/produk/tambahproduk',$data);
		$this->load->view('admin/footer');
	}

	public function simpan()
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

			$kode = $this->input->post('kode');
			$nama = $this->input->post('nama');
			$harga = $this->input->post('harga');
			$produk_info = $this->input->post('produk_info');
			$stok = $this->input->post('stok');
			$kategori = $this->input->post('kategori');
			$deskripsi = $this->input->post('deskripsi');
	        $url = $this->upload->data();
			$data_produk = array(
									'id_produk' => $kode,
									'nama' => $nama,
									'harga' => $harga, 
									'pembeli' => '0',
									'deskripsi' => $deskripsi,									
									'id_kategori' => $kategori,	
									'produk_info' => $produk_info,
									'gambar' => $url['file_name']
									
									);
		    $this->model_produk->simpan_produk($data_produk);


	        $stok = $this->input->post('stok');
	        $size = $this->input->post('size');

	        $jumlah_dipilih= count($stok);
	        for($x=0;$x<$jumlah_dipilih;$x++){

	        	 $datastok = array('id_produk' =>$kode , 
	        	 			'id_size' => $size[$x],
		    				'stok'=>$stok[$x]);
	        	 $this->model_stok->simpanSize($datastok);

	        }

			redirect('admin/produk/tampil_produk');
			}
	}
}

public function update($id_produk)
			{
			$this->form_validation->set_rules('nama','nama','required');
			$this->form_validation->set_rules('harga','harga','required');
			$this->form_validation->set_rules('deskripsi','deskripsi','required');


		$data['kategori'] = $this->model_kategori->tampilKategori();
		
				if($this->form_validation->run() == false){
				$data ['produk'] = $this->model_produk->find($id_produk);
				$this->load->view('admin/index');
				$this->load->view('admin/header');
				$this->load->view('admin/menukiri');
				$this->load->view('admin/headerkanan');
				$this->load->view('admin/produk/editproduk',$data);
				$this->load->view('admin/footer');
				}
				
				else{

				$nama = $this->input->post('nama');
				$harga = $this->input->post('harga');
				$kategori = $this->input->post('kategori');
				$deskripsi = $this->input->post('deskripsi');
				$produk_info = $this->input->post('produk_info');
				if($_FILES['pic']['name']==''){
				$data_produk = array(
										'nama' => $nama,
										'harga' => $harga, 
										'id_kategori' => $kategori,
										'produk_info' => $produk_info,
										'deskripsi' => $deskripsi 
									);

				$this->model_produk->update($id_produk,$data_produk);
				redirect('admin/produk/tampil_produk');
				}else{
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
				$kategori = $this->input->post('kategori');
				$kode = $this->input->post('kode');
				$nama = $this->input->post('nama');
				$harga = $this->input->post('harga');
				$deskripsi = $this->input->post('deskripsi');
		        $url = $this->upload->data();
				$data_produk = array(
										'nama' => $nama,
										'harga' => $harga, 
										'deskripsi' => $deskripsi,
										'id_kategori' => $kategori,
									    'produk_info' => $produk_info,
										'gambar' => $url['file_name'] 
									);

				$this->model_produk->update($id_produk,$data_produk);
				redirect('admin/produk/tampil_produk');
				}
			}
		}
		}
	}

public function hapus($id_produk)
{
	$this->model_produk->hapus($id_produk);
		redirect('admin/produk/tampil_produk');
}



}

/* End of file produk.php */
/* Location: ./application/controllers/produk.php */