<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_komentar');
	}

	public function index()
	{
		$data['komentar'] = $this->Model_komentar->tampilKomentarBaru();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/review/menuKomentar',$data);
		$this->load->view('admin/footer');
		
	}
	public function semuaReview()
	{
		$data['komentar'] = $this->Model_komentar->tampilSemuaReview();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/review/semuaReview',$data);
		$this->load->view('admin/footer');
		
	}

	public function tampilkan($id_review)
	{
		$status= array('status' => 'tampilkan' );
		$this->Model_komentar->tampilkan($id_review,$status);
		redirect('admin/review/semuaReview','refresh');
	}
	public function hapusKomentar($id_review)
	{
		
		$this->Model_komentar->hapusKomentar($id_review);
		redirect('admin/review/semuaReview','refresh');
	}

}

/* End of file review.php */
/* Location: ./application/controllers/admin/review.php */