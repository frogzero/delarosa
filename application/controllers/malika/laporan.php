<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('model_laporan');
	}

	public function laporan_produk()
	{
		ob_start();
		$data['produk'] = $this->model_laporan->laporanProduk();
		$this->load->view('admin/laporan/laporanProduk', $data);
		$html = ob_get_contents();
		ob_end_clean();

	    require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('Laporan Produk.pdf', 'D');
	}

	public function laporan_konsumen()
	{
		ob_start();
		$data['konsumen'] = $this->model_laporan->laporanKonsumen();
		$this->load->view('admin/laporan/laporanKonsumen', $data);
		$html = ob_get_contents();
		ob_end_clean();

	    require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('laporan konsumen.pdf', 'D');
	}

	public function laporan_pesanan()
	{
		ob_start();
		$data['pesanan'] = $this->model_laporan->laporanPesanan();
		$this->load->view('admin/laporan/laporanPesanan', $data);
		$html = ob_get_contents();
		ob_end_clean();

	    require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('L','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('laporan pesanan.pdf', 'D');
	}
	public function laporan_detail_pesanan()
	{
		ob_start();
		$data['pesanan'] = $this->model_laporan->laporanDetailPesanan();
		$this->load->view('admin/laporan/laporanDetailPesanan', $data);
		$html = ob_get_contents();
		ob_end_clean();

	    require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P','A4','en');
		$pdf->WriteHTML($html);
		$pdf->Output('laporan detail pesanan.pdf', 'D');
	}

}

/* End of file laporan_produk.php */
/* Location: ./application/controllers/laporan_produk.php */