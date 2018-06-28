<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Master_gaji extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->helper('url');
	}
	
	// Main Page Jabatan
	public function index() {
		if ($this->tank_auth->is_logged_in()) {	

			//$mj = $this->mMgaji->listgaji_karyawan();
			
			$data  = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'isi'			=> 'admins/master-gaji/list');
			$this->load->view('admins/layout/wrapper', $data);
		}else{
			redirect('auth/login');
		}
	}
		
}