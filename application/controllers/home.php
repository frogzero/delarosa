<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('model_komentar','model_produk','model_kategori','model_web','model_konsumen','model_pesanan','model_slider','model_stok'));
		$this->load->library('cart');
		$this->load->helper(array('form', 'url'));  
	}

	public function index()
	{
		$data['laris'] = $this->model_web->tampilProdukTerlaris();
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/baner');
		$this->load->view('web_menu/produk_terlaris',$data);
		$this->load->view('web_menu/footer');
	}
	public function register()
	{
		//$data['laris'] = $this->model_web->tampilProdukTerlaris();
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/register');
		$this->load->view('web_menu/footer');
		
	}

public function konfirmasi_pesanan($id_konsumen='')
	{
		if($id_konsumen==""){
		$id_konsumen = $this->session->userdata('kd_user');
		}		
		$result = $this->model_pesanan->tampil_bayar_belum_konfirmasi($id_konsumen);
		$subdata['result_detail_bayar'] = $result;
		$dataa['content'] = $this->load->view('/web/konfirmasi',$subdata,TRUE);
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/konfirmasi_pesanan',$dataa);
		$this->load->view('web_menu/footer');

}
	public function login()
	{
		//$data['laris'] = $this->model_web->tampilProdukTerlaris();
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/login');
		$this->load->view('web_menu/footer');
		
	}

	public function keranjang_belanja()
	{

		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/keranjang');
		$this->load->view('web_menu/footer');
	}
	public function akun_login()
	{
		//$data['laris'] = $this->model_web->tampilProdukTerlaris();
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header_akun');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/login');
		$this->load->view('web_menu/footer');
		
	}

	public function produk_info($id_detail)
	{
		$data['produk'] = $this->model_web->lihatDetail($id_detail);
		$dataa['kode'] = $this->model_konsumen->kode_konsumen();
		$data['review'] = $this->model_komentar->tampilReview($id_detail);
		$data['stok'] = $this->model_web->tampilStok($id_detail);
		$data['slider'] = $this->model_web->tampilSlider();
        $data['laris'] = $this->model_web->tampilProdukTerlaris();
		$data['kategori'] = $this->model_kategori->tampilKategori();
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/produk_info',$data);
		$this->load->view('web_menu/slide_all_produk',$data);
		$this->load->view('web_menu/footer');
	}

	public function all_produk()
	{
		$this->load->library('pagination');
		$page=$this->uri->segment(3);
      	$limit=6;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$tot_hal = $this->model_web->hitung_isi_tabel('produk','');
		$config['base_url'] = site_url().'/home/all_produk';
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
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/all_produk',$data);
		$this->load->view('web_menu/slide_all_produk',$data);
		$this->load->view('web_menu/footer');
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
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/all_produk',$data);
		$this->load->view('web_menu/slide_all_produk',$data);
		$this->load->view('web_menu/footer');
		}

public function statusPesan($id_konsumen='')
	{
		$data['kategori'] = $this->model_kategori->tampilKategori();
		if($id_konsumen==""){
		$id_konsumen = $this->session->userdata('kd_user');
		}
		
		$result = $this->model_pesanan->tampil_status_pesanan($id_konsumen);
		$subdata['result_detail_status'] = $result;
		$dataa['content'] = $this->load->view('/web/status_pesanan',$subdata,TRUE);

		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/histori_pesanan',$dataa);
		$this->load->view('web_menu/footer');
	}

	public function artikel()
	{
		$this->load->library('pagination');
		$page=$this->uri->segment(3);
      	$limit=6;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$tot_hal = $this->model_web->hitung_isi_tabel_berita('berita','');
		$config['base_url'] = site_url().'/home/berita';
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
		$data['berita'] = $this->model_web->all_artikel($limit,$offset);
		$konsumen['kode'] = $this->model_konsumen->kode_konsumen();
		$data['slider'] = $this->model_web->tampilSlider();
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/artikel',$data);
		$this->load->view('web_menu/slide_all_produk',$data);
		$this->load->view('web_menu/footer');
	}

	public function baca_artikel($id_artikel)
	{
		$this->load->library('pagination');
		$page=$this->uri->segment(3);
      	$limit=6;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$tot_hal = $this->model_web->hitung_isi_tabel_berita('berita','');
		$config['base_url'] = site_url().'/home/berita';
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
		$data['berita'] = $this->model_web->baca_artikel($id_artikel);
		$konsumen['kode'] = $this->model_konsumen->kode_konsumen();
		$data['slider'] = $this->model_web->tampilSlider();
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/baca_artikel',$data);
		$this->load->view('web_menu/slide_all_produk',$data);
		$this->load->view('web_menu/footer');
	}


	public function cara_pembelian()
	{
        $data['laris'] = $this->model_web->tampilProdukTerlaris();
		$data['kategori'] = $this->model_kategori->tampilKategori();
		$konsumen['kode'] = $this->model_konsumen->kode_konsumen();
		$data['slider'] = $this->model_web->tampilSlider();
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/cara_pembelian',$data);
		$this->load->view('web_menu/slide_all_produk',$data);
		$this->load->view('web_menu/footer');
	}
	public function tentang_kami()
	{
        $data['laris'] = $this->model_web->tampilProdukTerlaris();
		$data['kategori'] = $this->model_kategori->tampilKategori();
		$konsumen['kode'] = $this->model_konsumen->kode_konsumen();
		$data['slider'] = $this->model_web->tampilSlider();
		$this->load->view('web_menu/index');
		$this->load->view('web_menu/header');
		$this->load->view('web_menu/sub_header');
		$this->load->view('web_menu/tentang_kami',$data);
		$this->load->view('web_menu/slide_all_produk',$data);
		$this->load->view('web_menu/footer');
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */