<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model(array('model_login','model_konsumen','model_kategori'));

	}

	public function admin_login()
	{
		$this->load->view('admin/index');
		$this->load->view('admin/login');
		$this->load->view('admin/footer');
	}

	function member_login(){
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$result_pelanggan = $this->model_login->login_pelanggan($nama,$password);
		if($result_pelanggan){

			$data_session = array(
				'name' => $nama,
				'level' => "konsumen",
				'status' => "login",
				'kd_user'=> $result_pelanggan[0]->id_konsumen
				);

			$this->session->set_userdata($data_session);
			redirect('','refresh');
			}else{
			
			echo '<script language="javascript">';
			echo 'alert("!!! Username Atau Password Salah")';
			echo '</script>';
			 echo '<script type="text/javascript">';    
     	  	  echo 'window.location.assign("'.base_url().'")'; 
      		  echo '</script>';  
					
			}
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
			 echo '<script type="text/javascript">';    
     	  	  echo 'window.location.assign("'.site_url().'/akun/admin_login")'; 
      		  echo '</script>';  
					
			}
	}


public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

public function tampilProfil($id_konsumen=''){
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
		$this->load->view('web/profil',$data);
		$this->load->view('web/footer');
	}else{
		echo '<script language="javascript">';
		echo 'alert("maaf Anda Harus Login dulu, Jika Belum Punya akun Silahkan Registrasi")';
		echo '</script>';
		 echo '<script type="text/javascript">';    
     	  	  echo 'window.location.assign("'.base_url().'")'; 
      		  echo '</script>';  
	}

}


public function registrasi(){
		

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
		 echo '<script type="text/javascript">';    
     	  	  echo 'window.location.assign("'.base_url().'")'; 
      		  echo '</script>';  

	}
public function ubah_akun($id_konsumen){
	    $nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$provinsi = $this->input->post('provinsi');
		$kodepos = $this->input->post('kodepos');
		$nohp = $this->input->post('nohp');
		$data_konsumen = array(
								'nama' => $nama,
								'alamat' => $alamat,
								'kota' => $kota,
								'provinsi' => $provinsi,
								'kodepos' => $kodepos,
								'nohp' => $nohp						
							);
	    $this->model_konsumen->update($id_konsumen,$data_konsumen);

	    	echo '<script language="javascript">';
			echo 'alert("Data Sudah di Ubah")';
			echo '</script>';
		 echo '<script type="text/javascript">';    
     	  	  echo 'window.location.assign("'.base_url().'")'; 
      		  echo '</script>';  

}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */