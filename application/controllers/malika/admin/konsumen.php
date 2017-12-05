<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konsumen extends CI_Controller {

	 public function __construct()
        {
      parent::__construct();
      $this->load->model('model_konsumen');
      $this->load->helper(array('form', 'url'));                          
        }

	public function index()
	{
		
		$data['konsumen'] = $this->model_konsumen->all();
		$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/konsumen/menu', $data);
		$this->load->view('admin/footer');
	}

	public function simpan(){
		

		$kode = $this->model_konsumen->kode_konsumen();
		$namaLengkap = $this->input->post('namaLengkap');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$provinsi = $this->input->post('provinsi');
		$i=0;
		if($provinsi==1){$i='bali';}
		elseif ($provinsi==2) {$i='Bangka Belitung';}
		elseif ($provinsi==3) {$i='Banten';}
		elseif ($provinsi==4) {$i='Bengkulu';}
		elseif ($provinsi==5) {$i='DI Yogyakarta';}
		elseif ($provinsi==6) {$i='DKI Jakarta';}
		elseif ($provinsi==7) {$i='Gorontalo';}
		elseif ($provinsi==8) {$i='Jambi';}
		elseif ($provinsi==9) {$i='Jawa Barat';}
		elseif ($provinsi==10) {$i='Jawa Tengah';}
		elseif ($provinsi==11) {$i='Jawa Timur';}
		elseif ($provinsi==12) {$i='Kalimantan Barat';}
		elseif ($provinsi==13) {$i='Kalimantan Selatan';}
		elseif ($provinsi==14) {$i='Kalimantan Tengah';}
		elseif ($provinsi==15) {$i='Kalimantan Timur';}
		elseif ($provinsi==16) {$i='Kalimantan Utara';}
		elseif ($provinsi==17) {$i='Kepulauan Riau';}
		elseif ($provinsi==18) {$i='Lampung';}
		elseif ($provinsi==19) {$i='Maluku';}
		elseif ($provinsi==20) {$i='Maluku Utara';}
		elseif ($provinsi==21) {$i='Nanggroe Aceh Darussalam (NAD)';}
		elseif ($provinsi==22) {$i='Nusa Tenggara Barat (NTB)';}
		elseif ($provinsi==23) {$i='Nusa Tenggara Timur';}
		elseif ($provinsi==24) {$i='Papua';}
		elseif ($provinsi==25) {$i='Papua Barat';}
		elseif ($provinsi==26) {$i='riau';}
		elseif ($provinsi==27) {$i='Sulawesi Barat';}
		elseif ($provinsi==28) {$i='Sulawesi Selatan';}
		elseif ($provinsi==29) {$i='Sulawesi Tengah';}
		elseif ($provinsi==30) {$i='Sulawesi Tenggara';}
		elseif ($provinsi==31) {$i='Sulawesi Utara';}
		elseif ($provinsi==32) {$i='Sumatera Barat';}
		elseif ($provinsi==33) {$i='Sumatera Selatan';}
		elseif ($provinsi==34) {$i='Sumatera Utara';}
		$kodepos = $this->input->post('kodepos');
		$nohp = $this->input->post('nohp');
		$data_konsumen = array(
								'id_konsumen' => $kode,
								'nama' => $namaLengkap,
								'email' => $email, 
								'username' => $username,
								'password' => $password,
								'alamat' => $alamat,
								'kota' => $kota,
								'provinsi' => $i,
								'kodepos' => $kodepos,
								'nohp' => $nohp						
							);
	    $this->model_konsumen->simpan($data_konsumen);
	    echo '<script language="javascript">';
			echo 'alert("Daftar Sukses, Silahkan Login")';
			echo '</script>';
		redirect(base_url());

	}
	public function hapusKonsumen($id_konsumen){
		$this->model_konsumen->hapus($id_konsumen);
		redirect('/admin/konsumen','refresh');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */