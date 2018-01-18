<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Master_task_karyawan extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('sim/Master_task_karyawan_model');
	}
	
	// Main Page Jabatan
	public function index() {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="support") {

			$mt = $this->mMtkaryawan->listTask();
			
			$d  = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'mt'			=> $mt,
							'isi'			=> 'sim/master-task-karyawan/list');
			$this->load->view('sim/layout/wrapper', $d);
		}else{
			redirect('login');
		}
	}

	// Create Jabatan
	public function create() {
		
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="support") {
			$v = $this->form_validation;
			$v->set_rules('name','Name','required');
		
				if($v->run()) {
						
					$d = array(	'judul_lengkap'		=> $this->config->item('nama_aplikasi_full'),
									'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
									'instansi'		=> $this->config->item('nama_instansi'),
									'credit'		=> $this->config->item('credit_aplikasi'),
									'isi'			=> 'sim/master-task-karyawan/create');
						$this->load->view('sim/layout/wrapper', $d);
				
						$i = $this->input;
						$slugmt = url_title($this->input->post('name'), 'dash', TRUE);
						$d  = array(	'slug_task'		=> $slugmt,
										'id_user'		=> $this->session->userdata('id_user'),
										'name'			=> $i->post('name'),
										'isi'			=> $i->post('isi'),								
										'tgl_mulai'		=> $i->post('tgl_mulai'),
										'tgl_berakhir'	=> $i->post('tgl_berakhir'),
										'date'			=> $i->post('date'),				
						 			 );

						$this->mMtkaryawan->createTask($d);
						$this->session->set_flashdata('sukses','Success');
						redirect(base_url('sim/master_task_karyawan'));
				}
				// Default page
				$d = array(		'judul_lengkap'		=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'		=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'			=> $this->config->item('nama_instansi'),
								'credit'			=> $this->config->item('credit_aplikasi'),
								'isi'				=> 'sim/master-task-karyawan/create');
				$this->load->view('sim/layout/wrapper', $d);
		}else{
			redirect('login');
		}
	}

	// Edit Client
	public function edit($id_master_task) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="support") {

			$mt		= $this->mMtkaryawan->detailTask($id_master_task);
			$endmt	= $this->mMtkaryawan->endTask();		

			// Validation
			$v = $this->form_validation;
			$v->set_rules('name','Name','required');
				//Funtion Baca Data
				if($v->run()) {
				
					$d = array(		'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
									'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
									'instansi'		=> $this->config->item('nama_instansi'),
									'credit'		=> $this->config->item('credit_aplikasi'),
									'mt'			=> $mt,
									'isi'			=> 'sim/master-task-karyawan/edit');
					$this->load->view('sim/layout/wrapper', $d);

					//Funtion Insert data dan Redirect ke List
					$i = $this->input;
					$slugmt = $endmt['id_master_task'].'-'.url_title($i->post('name'),'dash', TRUE);
					$d = array(		'id_master_task'=> $mt['id_master_task'],
									'slug_task'		=> $slugmt,
									'id_user'		=> $this->session->userdata('id_user'),
									'name'			=> $i->post('name'),
									'isi'			=> $i->post('isi'),
									'tgl_mulai'		=> $i->post('tgl_mulai'),
									'tgl_berakhir'	=> $i->post('tgl_berakhir'),							
									'date'			=> $i->post('date')								
						 			 );
					$this->mMtkaryawan->editTask($d);
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('sim/master_task_karyawan'));			
				}

				$d = array(	'judul_lengkap'			=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'		=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'			=> $this->config->item('nama_instansi'),
								'credit'			=> $this->config->item('credit_aplikasi'),
								'mt'				=> $mt,
								'isi'				=> 'sim/master-task-karyawan/edit');
				$this->load->view('sim/layout/wrapper', $d);
		}else{
			redirect('login');
		}
	}	

	// Delete Client
	public function delete($id_master_task) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="support") {
			$d = array('id_master_task' => $id_master_task);
			$this->mMtkaryawan->deleteTask($d);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('sim/master_task_karyawan'));
		}else{
			redirect('login');
		}
	}		
}