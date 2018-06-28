<?php defined('BASEPATH') OR exit('No direct script access allowed');

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
	public function index()
	{
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

					$d = array(	
								'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'clients'		=> $this->mStats->clients(),
								'associates'	=> $this->mStats->associates(),
								'partners'		=> $this->mStats->partners(),
								'blog'			=> $this->mStats->blog(),
								'products'		=> $this->mStats->products(),
								'contacts'		=> $this->mStats->contacts(),
								'downloads'		=> $this->mStats->downloads(),
								'isi'			=> 'admin/dashboard/index');
			$this->load->view('admin/layout/wrapper',$d);

		}else{
			redirect('login');
		}
	}
}
