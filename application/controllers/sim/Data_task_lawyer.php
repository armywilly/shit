<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data_task_lawyer extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('sim/Data_task_lawyer_model');
	}
	
	// Main Page Jabatan
	public function index() {

		$dt = $this->mDtlawyer->listDatatask();
		$mt = $this->mMtkaryawan->listTask();
		$k 	= $this->mKaryawan->listKaryawan();
		
		$d  = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'dt'			=> $dt,
						'isi'			=> 'sim/data-task-lawyer/list');
		$this->load->view('sim/layout/wrapper', $d);
	}

	// Create Jabatan
	public function create() {
		
		$mt = $this->mMtkaryawan->listTask();
		$k 	= $this->mKaryawan->listKaryawan();


		$v = $this->form_validation;
		$v->set_rules('id_staff','Name','required');
		
		if($v->run()) {
				
			$d = array(	'judul_lengkap'		=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'k'				=> $k,
							'mt'			=> $mt,
							'isi'			=> 'sim/data-task-lawyer/create');
				$this->load->view('sim/layout/wrapper', $d);
		
				$i = $this->input;
				$d  = array(	'id_staff'		=> $i->post('id_staff'),
								'id_master_task'=> $i->post('id_master_task'),								
								'date'			=> $i->post('date'),				
				 			 );

				$this->mDtlawyer->createDatatask($d);
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('sim/data_task_lawyer'));
		}
		// Default page
		$d = array(		'judul_lengkap'		=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'		=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'			=> $this->config->item('nama_instansi'),
						'credit'			=> $this->config->item('credit_aplikasi'),
						'k'					=> $k,
						'mt'				=> $mt,
						'isi'				=> 'sim/data-task-lawyer/create');
		$this->load->view('sim/layout/wrapper', $d);
	}

	// Edit Client
	public function edit($id_task) {

		$dt		= $this->mDtlawyer->detailDatatask($id_task);
		$mt 	= $this->mMtkaryawan->listTask();
		$k 		= $this->mKaryawan->listKaryawan();	

		// Validation
		$v = $this->form_validation;
		$v->set_rules('name','Name','required');
		//Funtion Baca Data
		if($v->run()) {
		
			$d = array(		'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'dt'			=> $dt,
							'mt'			=> $mt,
							'k'				=> $k,
							'isi'			=> 'sim/data-task-lawyer/edit');
			$this->load->view('sim/layout/wrapper', $d);

			//Funtion Insert data dan Redirect ke List
			$i = $this->input;
			$d = array(		'id_task'		=> $dt['id_task'],
							'id_staff'		=> $k('name'),
							'id_master_task'=> $mt('name'),							
							'date'			=> $i->post('date')								
				 			 );
			$this->mMtkaryawan->editDatatask($d);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('sim/master_task_karyawan'));			
		}

		$d = array(	'judul_lengkap'			=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'		=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'			=> $this->config->item('nama_instansi'),
						'credit'			=> $this->config->item('credit_aplikasi'),
						'dt'				=> $dt,
						'mt'				=> $mt,
						'k'					=> $k,
						'isi'				=> 'sim/data-task-lawyer/edit');
		$this->load->view('sim/layout/wrapper', $d);
	}	

	// Delete Client
	public function delete($id_task) {
		$d = array('id_task' => $id_task);
		$this->mDtlawyer->deleteDatatask($d);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('sim/data_task_lawyer'));
	}		
}