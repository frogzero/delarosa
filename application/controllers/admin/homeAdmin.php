<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HomeAdmin extends CI_Controller {

	public function index()
	{
		
			$this->load->view('admin/index');
		$this->load->view('admin/header');
		$this->load->view('admin/menukiri');
		$this->load->view('admin/headerkanan');
		$this->load->view('admin/menu');
		$this->load->view('admin/footer');
		
		/*	echo '<script language="javascript">';
			echo 'alert("!!! ANDA HARUS LOGIN DULU")';
			echo '</script>';
			 echo '<script type="text/javascript">';    
     	  	  echo 'window.location.assign("'.base_url().'")'; 
      		  echo '</script>';  
      		  */

		
		
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */