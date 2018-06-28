<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {


	function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('tank_auth');
         }
         
	public function index()
	{
		if ($this->tank_auth->is_logged_in() !="" && $this->tank_auth->get_user_role('roles')="Finance & SDM") {	

			$d = array(	
								'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'isi'			=> 'finance/laporan/index');
			$this->load->view('finance/layout/wrapper',$d);

		}else{
			redirect('auth/login');
		}
	}

	/* LAPORAN CLIENTS */
	public function create_laporan_clients(){

	}

	public function update_laporan_clients(){

	}

	public function delete_laporan_clients(){

	}

	public function cetak_laporan_clients(){

	}


	/* LAPORAN KARYAWAN */
	public function create_laporan_karyawan(){

	}

	public function update_laporan_karyawan(){

	}

	public function delete_laporan_karyawan(){

	}

	public function cetak_laporan_karyawan(){
		
	}
}
