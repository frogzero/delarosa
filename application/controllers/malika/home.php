<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('model_komentar','model_produk','model_kategori','model_web','model_konsumen','model_pesanan','model_slider'));
		$this->load->library('cart');
		$this->load->helper(array('form', 'url'));  
	}

	public function index($offset=NULL)
	{
		$this->load->library('pagination');
		$page=$this->uri->segment(3);
      	$limit=8;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$tot_hal = $this->model_web->hitung_isi_tabel('produk','');
		
		$config['base_url'] = site_url().'/home/index';
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		
		//config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
        $data['laris'] = $this->model_web->tampilProdukTerlaris();
		$data['kategori'] = $this->model_kategori->tampilKategori();
		$data['produk'] = $this->model_produk->all($limit,$offset);
		$konsumen['kode'] = $this->model_konsumen->kode_konsumen();
		$data['slider'] = $this->model_web->tampilSlider();
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){ 
		$this->load->view('web/index');
		$this->load->view('web/header',$konsumen);
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/menu', $data);
		$this->load->view('web/footer');
	}else{
		$this->load->view('web/index');
		$this->load->view('web/headerlogin',$konsumen);
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		
		$this->load->view('web/menu', $data);
		$this->load->view('web/footer');

	}
}

public function Perkategori($id_kategori,$offset=NULL)
	{
		$this->load->library('pagination');
		$page=$this->uri->segment(4);
      	$limit=8;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$tot_hal = $this->model_web->hitung_isi_tabel_perkategori('produk','',$id_kategori);
		
		$config['base_url'] = site_url().'/home/Perkategori/'.$id_kategori;
        $config['total_rows'] = $tot_hal->num_rows();
        $config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		
		//config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Prev';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
        $data['laris'] = $this->model_web->tampilProdukTerlaris();
		
		$data['kategori'] = $this->model_kategori->tampilKategori();
		$data['produk'] = $this->model_web->tampilPerKategori($id_kategori,$limit,$offset);
		$dataa['kode'] = $this->model_konsumen->kode_konsumen();
		$dataLaris['laris'] = $this->model_web->tampilProdukTerlaris();
		$data['slider'] = $this->model_web->tampilSlider();
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){ 
		$this->load->view('web/index');
		$this->load->view('web/header',$dataa);
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/menu', $data);
		$this->load->view('web/footer');
	}else{
		$this->load->view('web/index');
		$this->load->view('web/headerlogin',$dataa);
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/menu', $data);
		$this->load->view('web/footer');

	}
}

public function keranjang()
	{

		$data['kategori'] = $this->model_kategori->tampilKategori();
		$data['slider'] = $this->model_web->tampilSlider();
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){
		$this->load->view('web/index');
		$this->load->view('web/header');
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/keranjang');
		$this->load->view('web/footer');
		}else{
		$this->load->view('web/index');
		$this->load->view('web/headerlogin');
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/keranjang');	
		$this->load->view('web/footer');

	}

}

public function statusPesan($id_konsumen='')
	{
		$data['kategori'] = $this->model_kategori->tampilKategori();
		if($id_konsumen==""){
		$id_konsumen = $this->session->userdata('kd_user');
		}
		
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){
		$result = $this->model_pesanan->tampil_status_pesanan($id_konsumen);
		$subdata['result_detail_status'] = $result;
		$dataa['content'] = $this->load->view('/web/status_pesanan',$subdata,TRUE);
		$this->load->view('web/atasPesanan');
		$this->load->view('web/header');
		$this->load->view('web/welcome');
		$this->load->view('web/kategori',$data);
		$this->load->view('web/status_pesanan', $dataa);
		$this->load->view('web/footerPesanan');
		}else{
		$this->load->view('web/index');
		$this->load->view('web/headerlogin');
		$this->load->view('web/slider');
		$this->load->view('web/kategori',$data);
		$this->load->view('web/menu');	
		$this->load->view('web/footer');

	}

}
public function konfirmasi($id_konsumen='')
	{
		$data['kategori'] = $this->model_kategori->tampilKategori();
		if($id_konsumen==""){
		$id_konsumen = $this->session->userdata('kd_user');
		}
		
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){
		$result = $this->model_pesanan->tampil_bayar_belum_konfirmasi($id_konsumen);
		$subdata['result_detail_bayar'] = $result;
		$dataa['content'] = $this->load->view('/web/konfirmasi',$subdata,TRUE);
		$this->load->view('web/index');
		$this->load->view('web/header');
		$this->load->view('web/welcome');
		$this->load->view('web/kategori',$data);
		$this->load->view('web/konfirmasi', $dataa);
		$this->load->view('web/footer');
		}else{
		$this->load->view('web/index');
		$this->load->view('web/headerlogin');
		$this->load->view('web/slider');
		$this->load->view('web/kategori',$data);
		$this->load->view('web/menu');	
		$this->load->view('web/footer');

	}

}

public function detail($id_detail)
	{
		
		$data['kategori'] = $this->model_kategori->tampilKategori();
		$data['produk'] = $this->model_web->lihatDetail($id_detail);
		$dataa['kode'] = $this->model_konsumen->kode_konsumen();
		$data['review'] = $this->model_komentar->tampilReview($id_detail);
		$data['slider'] = $this->model_web->tampilSlider();
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){ 
		$this->load->view('web/index');
		$this->load->view('web/header',$dataa);
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/detail',$data);
		$this->load->view('web/footer');
	}else{
		$this->load->view('web/index');
		$this->load->view('web/headerlogin',$dataa);
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/detail',$data);
		$this->load->view('web/footer');

	}
}


public function caraPembelian()
	{

		$data['kategori'] = $this->model_kategori->tampilKategori();
		$data['slider'] = $this->model_web->tampilSlider();
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){
		$this->load->view('web/index');
		$this->load->view('web/header');
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/caraPembelian');
		$this->load->view('web/footer');
		}else{
		$this->load->view('web/index');
		$this->load->view('web/headerlogin');
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/caraPembelian');	
		$this->load->view('web/footer');

	}

}

public function caraPembayaran()
	{

		$data['kategori'] = $this->model_kategori->tampilKategori();
		$data['slider'] = $this->model_web->tampilSlider();
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){
		$this->load->view('web/index');
		$this->load->view('web/header');
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/caraPembayaran');
		$this->load->view('web/footer');
		}else{
		$this->load->view('web/index');
		$this->load->view('web/headerlogin');
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/caraPembayaran');	
		$this->load->view('web/footer');

	}

}

public function about()
	{
$data['slider'] = $this->model_web->tampilSlider();
		$data['kategori'] = $this->model_kategori->tampilKategori();
		if(($this->session->userdata('name'))&&($this->session->userdata('level') == "konsumen")){
		$this->load->view('web/index');
		$this->load->view('web/header');
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/about');
		$this->load->view('web/footer');
		}else{
		$this->load->view('web/index');
		$this->load->view('web/headerlogin');
		$this->load->view('web/slider',$data);
		$this->load->view('web/kategori',$data);
		$this->load->view('web/about');	
		$this->load->view('web/footer');

	}

}



}

/* End of file home.php */
/* Location: ./application/controllers/home.php */