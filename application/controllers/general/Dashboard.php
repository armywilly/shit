<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('tank_auth');
         }
         
	public function index()
	{
		if ($this->tank_auth->('is_logged_in') !="" && $this->session->userdata('roles')=="general") {	

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
