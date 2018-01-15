<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Master_jabatan extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('sim/Master_jabatan_model');
	}
	
	// Main Page Jabatan
	public function index() {

		$mj = $this->mMjabatan->listJabatan();
		
		$d  = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'mj'			=> $mj,
						'isi'			=> 'sim/master-jabatan/list');
		$this->load->view('sim/layout/wrapper', $d);
	}

	// Create Jabatan
	public function create() {
		
		
		$v = $this->form_validation;
		$v->set_rules('name','Name','required');
		
		if($v->run()) {
				
			$d = array(	'judul_lengkap'		=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'isi'			=> 'sim/master-jabatan/create');
				$this->load->view('sim/layout/wrapper', $d);
		
				$i = $this->input;
				$slugmj = url_title($this->input->post('name'), 'dash', TRUE);
				$d  = array(	'slug_jabatan'	=> $slugmj,
								'id_user'		=> $this->session->userdata('id_user'),
								'name'			=> $i->post('name'),
								'isi'			=> $i->post('isi'),								
								'date'			=> $i->post('date')				
				 			 );

				$this->mMjabatan->createJabatan($d);
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('sim/master_jabatan'));
		}
		// Default page
		$d = array(		'judul_lengkap'		=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'		=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'			=> $this->config->item('nama_instansi'),
						'credit'			=> $this->config->item('credit_aplikasi'),
						'isi'				=> 'sim/master-jabatan/create');
		$this->load->view('sim/layout/wrapper', $d);
	}

	// Edit Client
	public function edit($id_jabatan) {

		$mj		= $this->mMjabatan->detailJabatan($id_jabatan);
		$endmj	= $this->mMjabatan->endJabatan();		

		// Validation
		$v = $this->form_validation;
		$v->set_rules('name','Name','required');
		//Funtion Baca Data
		if($v->run()) {
		
			$d = array(		'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'mj'			=> $mj,
							'isi'			=> 'sim/master-jabatan/edit');
			$this->load->view('sim/layout/wrapper', $d);

			//Funtion Insert data dan Redirect ke List
			$i = $this->input;
			$slugmj = $endmj['id_jabatan'].'-'.url_title($i->post('name'),'dash', TRUE);
			$d = array(		'id_jabatan'    => $mj['id_jabatan'],
							'slug_jabatan'	=> $slugmj,
							'id_user'		=> $this->session->userdata('id_user'),
							'name'			=> $i->post('name'),
							'isi'			=> $i->post('isi'),							
							'date'			=> $i->post('date')								
				 			 );
			$this->mMjabatan->editjabatan($d);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('sim/master_jabatan'));			
		}

		$d = array(	'judul_lengkap'			=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'		=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'			=> $this->config->item('nama_instansi'),
						'credit'			=> $this->config->item('credit_aplikasi'),
						'mj'				=> $mj,
						'isi'				=> 'sim/master-jabatan/edit');
		$this->load->view('sim/layout/wrapper', $d);
	}	

	// Delete Client
	public function delete($id_jabatan) {
		$d = array('id_jabatan' => $id_jabatan);
		$this->mMjabatan->deleteJabatan($d);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('sim/master_jabatan'));
	}		
}