<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('tank_auth');
         }
         
	public function index()
	{
		if ($this->acl->has_permission('')) {

			$d = array(	
								'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'isi'			=> 'general/dashboard/index');
			$this->load->view('general/layout/wrapper',$d);

		}else{
			redirect('auth/login');
		}
	}
}
