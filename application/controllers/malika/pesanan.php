<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {

		public function __construct(){
		parent::__construct();
		$this->load->model(array('model_produk','model_kategori','model_web','model_konsumen','model_stok','model_diskon'));
		$this->load->library('cart');
		$this->load->helper(array('form', 'url'));  
	}

	
	public function simpan_keranjang($produk_id)
	{
		$produk = $this->model_produk->find($produk_id);
		$id_produk=$produk->id_produk;
		$jumlah = $this->input->post('jumlah');
		$ukuran = $this->input->post('ukuran');
		$lihat_stok = $this->model_stok->cek_stok();
		foreach ($lihat_stok as  $stok) 
		{
			$stok_idproduk=$stok->id_produk;
			$stok_produk=$stok->stok;
			$stok_ukuran=$stok->id_size;
			if ($stok_idproduk==$id_produk&&$ukuran==$stok_ukuran&&$jumlah<=$stok_produk) 
		{

			$keranjang = $this->cart->contents();
			$rowid='';
			$ketersediaan=false;
			$i=0;

			foreach ($keranjang as $keranjang) {
				$i++;
				if ($keranjang['size']==$ukuran&&$keranjang['option']==$id_produk) {
					$ketersediaan=true;
					$rowid=$keranjang['rowid'];
				}
			}
			if ($ketersediaan) {
				$data = array(
					'rowid' => $rowid,
					'qty'   => $jumlah
				);
				
				$this->cart->update($data);
		echo '<script type="text/javascript">';
     	echo 'alert("Produk Berhasil Di Ubah")';
     	echo '</script>';    
     	echo '<script type="text/javascript">';    
       	echo 'window.location.assign("'.base_url().'")'; 
      	echo '</script>';
			}else{
				$data = array(
					'id'      => $i,
					'qty'     => $jumlah,
					'price'   => $produk->harga,
					'name'    => $produk->nama,
					'size'    => $ukuran,
					'option'  => $id_produk
				);
				
				$this->cart->insert($data);

		echo '<script type="text/javascript">';
     	echo 'alert("Produk Berhasil Di Inputkan ke keranjang")';
     	echo '</script>';    
     	echo '<script type="text/javascript">';    
       	echo 'window.location.assign("'.base_url().'")'; 
      	echo '</script>';

			}
		}
		}
		echo '<script type="text/javascript">';
     	echo 'alert("Maaf Stok Habis Untuk Ukuran ini")';
     	echo '</script>';    
     	echo '<script type="text/javascript">';    
       	echo 'window.location.assign("'.base_url().'")'; 
      	echo '</script>';
				
	}
		

public function bersih()
	{
		$this->cart->destroy();
		redirect('home/keranjang','refresh');

}

public function checkout($id_konsumen='')
	{
	    $data['kategori'] = $this->model_kategori->tampilKategori();
		if($id_konsumen==""){
		$id_konsumen = $this->session->userdata('kd_user');
		}
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){ 
		$result = $this->model_konsumen->get_detail_konsumen($id_konsumen);
		$subdata['result_detail_konsumen'] = $result;
		$data['content'] = $this->load->view('/web/checkoutNodiskon',$subdata,TRUE);		
		$this->load->view('web/index');
		$this->load->view('web/header');		
		$this->load->view('web/welcome');
		$this->load->view('web/kategori',$data);
		$this->load->view('web/checkoutNodiskon',$data);
		$this->load->view('web/footer');
	}else{
		echo '<script language="javascript">';
		echo 'alert("Maaf Anda Harus Login Dulu, Jika Belum Punya akun Silahkan Registrasi")';
		echo '</script>';
		  echo '<script type="text/javascript">';    
       echo 'window.location.assign("'.base_url().'")'; 
      echo '</script>';
	}

}

function kupon($kode='',$id_konsumen=''){
		$data['kategori'] = $this->model_kategori->tampilKategori();
		$kode = $this->input->post('kode');
		$result_pelanggan = $this->model_diskon->cek_kode_diskon($kode);
		$resultkp = $this->model_diskon->cek_kode_diskon($kode);
		$subdata['result_detail_kupon'] = $resultkp;
		$dataaa['content'] = $this->load->view('/web/checkoutNodiskon',$subdata,TRUE);

		if($result_pelanggan){
			if($id_konsumen==""){
		$id_konsumen = $this->session->userdata('kd_user');
		}
		$result = $this->model_konsumen->get_detail_konsumen($id_konsumen);
		$subdata['result_detail_konsumen'] = $result;
		$dataaa['content'] = $this->load->view('/web/checkoutNodiskon',$subdata,TRUE);	
		$this->load->view('web/index');
		$this->load->view('web/header');		
		$this->load->view('web/welcome');
		$this->load->view('web/kategori',$data);
		$this->load->view('web/checkoutdiskon',$dataaa);
		$this->load->view('web/footer');
		
			}else{
			echo '<script language="javascript">';
			echo 'alert("Maaf Kode Diskon Tidak Berlaku")';
			echo '</script>';
			  echo '<script type="text/javascript">';    
       echo 'window.location.assign("'.site_url('/pesanan/checkout/').'")'; 
      echo '</script>';
			
			}
}

}

/* End of file pesanan.php */
/* Location: ./application/controllers/pesanan.php */