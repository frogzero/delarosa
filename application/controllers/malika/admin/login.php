<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('model_login');

	}

	public function Admin_login()
	{
		$this->load->view('admin/index');
		$this->load->view('admin/login');
		$this->load->view('admin/footer');
	}

	public function Cek_LoginAdmin(){
		$nama = $this->input->post('name');
		$password = $this->input->post('password');
		$result_pelanggan = $this->model_login->login_admin($nama,$password);
		if($result_pelanggan){
			$data_session = array(
				'name' => $nama,
				'level' => "admin",
				'status' => "login",
				'kd_user'=> $result_pelanggan[0]->id_admin
				);

			$this->session->set_userdata($data_session);
			redirect('admin/homeAdmin','refresh');

			}else{
			echo '<script language="javascript">';
			echo 'alert("!!! Username Atau Password Salah")';
			echo '</script>';
			echo '<script>';
			echo 'window.location=history.go(-1);';
			echo '</script>';
					
			}
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */