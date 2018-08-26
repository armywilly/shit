<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Partnership_ag extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->helper('url');
		$this->load->model('admins/partnership_model');
	}
	
	// Main Kontrak Kerja
	public function index() {
		if ($this->tank_auth->is_logged_in()) {	

			$pa  	= $this->mMPa->listMPa();
			
			$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'pa'			=> $pa,
							'isi'			=> 'admins/partnership/list');
			$this->load->view('admins/layout/wrapper',$data);
		}else{
			redirect('auth/login');
		}
	}


	// Create Kontrak Kerja
	public function create() {
		if ($this->acl->has_permission('add-pa')) {

			$kd['no_pa'] = $this->mMPa->get_no_pa();
			$mc 		= $this->mMClients->listMClients();
			$v = $this->form_validation;
			$v->set_rules('id_master_client','id master client','required');
		
				if($v->run()) {

						$i = $this->input;
						$data = array(	'id_master_client'	=> $i->post('id_master_client'),
										'no_pa'				=> $kd['no_pa'],
										'tanggal'			=> $i->post('tanggal')
									);

						$this->mMPa->createMPa($data);
						$this->session->set_flashdata('sukses','Success');
						redirect(base_url('admins/partnership_ag/'));
				}
				// Default page
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'kd'			=> $kd,
								'mc'			=> $mc,
								'isi'			=> 'admins/partnership/create');
				$this->load->view('admins/layout/wrapper',$data);
		}else{
			redirect('auth/login');
		}
	}

	// Edit Client
	public function edit($id_pa) {
		if ($this->acl->has_permission('edit-pa')) {

			$pa 		= $this->mMPa->detailMPa($id_pa);
			$mc  	   	= $this->mMClients->listMClients();
			$kd['no_pa']= $this->mMPa->get_no_pa();		

			// Validation
			$v = $this->form_validation;
			$v->set_rules('id_master_client','id master client','required');
				//Funtion Baca Data
				if($v->run()) {

					unset($kd['no_pa']);
					$i = $this->input;

					$data = array(		'id_pa'				=> $pa['id_pa'],
										'id_master_client'	=> $i->post('id_master_client'),
										'tanggal'			=> $i->post('tanggal'));
					$this->mMPa->editMpa($data);
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admins/partnership_ag'));
				}

				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'kd'			=> $kd,
								'mc'			=> $mc,
								'pa'			=> $pa,
								'isi'			=> 'admins/partnership/edit');
				$this->load->view('admins/layout/wrapper', $data);
		}else{
			redirect('auth/noaccess');
		}
	}	

	// Delete Client
	public function delete($id_pa) {
		if ($this->acl->has_permission('delete-pa')) {	
			$data = array('id_pa' => $id_pa);
			$this->mMPa->deleteMPa($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admins/partnership_ag'));
		}else{
			redirect('auth/noaccess');
		}
	}		
}