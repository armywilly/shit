<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Master_kontrak_kerja extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('sim/master_kontrak_model');
	}
	
	// Main Kontrak Kerja
	public function index() {
		if ($this->tank_auth->is_logged_in()) {	

			$mkk  	= $this->mMKontrak->listMKontrak();
			
			$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'mkk'			=> $mkk,
							'isi'			=> 'sim/master-kontrak-kerja/list');
			$this->load->view('sim/layout/wrapper',$data);
		}else{
			redirect('auth/login');
		}
	}

	// Read Kontrak Kerja
	public function detail($id_master_kk) {
		if ($this->tank_auth->is_logged_in()) {	

			$mkk 	= $this->mMKontrak->detailMKontrak($id_master_kk);                                           		
			
			$data  = array(		'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'mkk'			=> $mkk,
								'isi'			=> 'sim/master-kontrak-kerja/detail');
			$this->load->view('sim/layout/wrapper', $data);
		}else{
			redirect('auth/login');
		}	
	}

	// Create Kontrak Kerja
	public function create() {

		$kd['nr_k'] = $this->mMKontrak->get_nr_k();
		$mc 		= $this->mMClients->listMClients();
		$pa 		= $this->mMPa->listMPa();
		
		if ($this->tank_auth->is_logged_in()) {	
			$v = $this->form_validation;
			$v->set_rules('no_kontrak','No Kontrak','required');
		
				if($v->run()) {
					
					$config['upload_path'] 		= './upload/klien/file';
					$config['allowed_types'] 	= 'gif|jpg|png|pdf|rar|zip';
					$config['max_size']			= '20000'; // KB			
					$this->load->library('upload', $config);
					if(! $this->upload->do_upload('file')) {
						
					$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
									'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
									'instansi'		=> $this->config->item('nama_instansi'),
									'credit'		=> $this->config->item('credit_aplikasi'),
									'error'			=> $this->upload->display_errors(),
									'kd'			=> $kd,
									'mc'			=> $mc,
									'pa'			=> $pa,
									'isi'			=> 'sim/master-kontrak-kerja/create');
					$this->load->view('sim/layout/wrapper',$data);
					}else{
						$upload_data				= array('uploads' =>$this->upload->data());
						$config['source_file'] 	= './upload/klien/file/'.$upload_data['uploads']['file_name']; 

						$i = $this->input;
						$data = array(	'id_user'			=> $this->session->userdata('username'),
										'id_master_client'	=> $i->post('id_master_client'),
										'id_pa'				=> $i->post('id_pa'),
										'nr_k'				=> $kd['nr_k'],
										'probs'				=> $i->post('probs'),
										'tgl_kontrak'		=> $i->post('tgl_kontrak'),
										'start'				=> $i->post('start'),
										'due'				=> $i->post('due'),
										'stts_kontrak'		=> $i->post('stts_kontrak'),
										'file'				=> $upload_data['uploads']['file_name'],
										'date'				=> $i->post('date')
									);

						$this->mMKontrak->createMKontrak($data);
						$this->session->set_flashdata('sukses','Success');
						redirect(base_url('sim/master_kontrak_kerja/'));
					}
				}
				// Default page
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'kd'			=> $kd,
								'mc'			=> $mc,
								'pa'			=> $pa,
								'isi'			=> 'sim/master-kontrak-kerja/create');
				$this->load->view('sim/layout/wrapper',$data);
				var_dump($data);
		}else{
			redirect('auth/login');
		}
	}

	// Edit Client
	public function edit($id_master_kk) {
		if ($this->tank_auth->is_logged_in()) {	

			$mkk	   = $this->mMKontrak->detailMKontrak($id_master_kk);
			$mc  	   = $this->mMClients->listMClients();
			$kd['nrk'] = $this->mMClients->get_nrk();		

			// Validation
			$v = $this->form_validation;
			$v->set_rules('no_kontrak','No Kontrak','required');
				//Funtion Baca Data
				if($v->run()) {
					if(!empty($_FILES['image']['name'])) {
					$config['upload_path'] 		= './upload/klien/file';
					$config['allowed_types'] 	= 'gif|jpg|png|svg|pdf|rar|zip';
					$config['max_size']			= '20000'; // KB			
					$this->load->library('upload', $config);
					if(! $this->upload->do_upload('file')) {
				
					$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
									'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
									'instansi'		=> $this->config->item('nama_instansi'),
									'credit'		=> $this->config->item('credit_aplikasi'),
									'mkk'			=> $mkk,
									'kd'			=> $kd,
									'mc'			=> $mc,
									'error'			=> $this->upload->display_errors(),
									'isi'			=> 'sim/master-kontrak-kerja/edit');
					$this->load->view('sim/layout/wrapper', $data);
					}else{
						$upload_data				= array('uploads' =>$this->upload->data());
						$config['source_file'] 	= './upload/klien/file/'.$upload_data['uploads']['file_name']; 
						
					$i = $this->input;

					unlink('./upload/klien/file/'.$mkk['file']);
					unset($kd['nr_k']);

					$data = array(		'id_master_kk'		=> $mkk['id_master_kk'],
										'id_user'			=> $this->session->userdata('username'),
										'id_master_client'	=> $i->post('id_master_client'),
										'no_kontrak'		=> $i->post('no_kontrak'),
										'no_pa'				=> $i->post('no_pa'),
										'nr_k'				=> $kd['nr_k'],
										'probs'				=> $i->post('probs'),
										'tgl_kontrak'		=> $i->post('tgl_kontrak'),
										'start'				=> $i->post('start'),
										'due'				=> $i->post('due'),
										'stts_kontrak'		=> $i->post('stts_kontrak'),
										'file'				=> $upload_data['uploads']['file_name'],
										'date'				=> $i->post('date'));
					$this->mMKontrak->editMKontrak($data);
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('sim/master_kontrak_kerja'));
					}}else{
					//Funtion Insert data dan Redirect ke List
					$i = $this->input;

					$data = array(		'id_master_kk'		=> $mkk['id_master_kk'],
										'id_user'			=> $this->session->userdata('username'),
										'id_master_client'	=> $i->post('id_master_client'),
										'no_kontrak'		=> $i->post('no_kontrak'),
										'no_pa'				=> $i->post('no_pa'),
										'probs'				=> $i->post('probs'),
										'tgl_kontrak'		=> $i->post('tgl_kontrak'),
										'start'				=> $i->post('start'),
										'due'				=> $i->post('due'),
										'stts_kontrak'		=> $i->post('stts_kontrak'),
										'date'				=> $i->post('date'),
									);
					$this->mMKontrak->editMKontrak($data);
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('sim/master_kontrak_kerja'));			
					}
				}

				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'mkk'			=> $mkk,
								'kd'			=> $kd,
								'mc'			=> $mc,
								'isi'			=> 'sim/master-kontrak-kerja/edit');
				$this->load->view('sim/layout/wrapper', $data);
		}else{
			redirect('auth/login');
		}
	}	

	// Delete Client
	public function delete($id_master_kk) {
		if ($this->tank_auth->is_logged_in()) {	
			$data = array('id_master_kk' => $id_master_kk);
			$this->mMKontrak->deleteMKontrak($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('sim/master_kontrak_kerja'));
		}else{
			redirect('auth/login');
		}
	}		
}