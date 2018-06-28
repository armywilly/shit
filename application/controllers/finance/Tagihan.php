<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagihan extends CI_Controller {


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
								'isi'			=> 'finance/invoice/index_invoice');
			$this->load->view('finance/layout/wrapper',$d);

		}else{
			redirect('auth/login');
		}
	}

	/* INVOICE CLIENTS */
	public function create_invoice(){

	}

	public function update_invoice(){

	}

	public function delete_invoice(){

	}

	public function cetak_invoice(){

	}


}
