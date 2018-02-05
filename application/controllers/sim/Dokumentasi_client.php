<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi_client extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('sim/Dokumentasi_client_model');
	}
	
	// Main Page Index
	public function index() {

		if ($this->tank_auth->is_logged_in()) {	
			$doc = $this->mDocs->listDocs();
			
			$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'doc'			=> $doc,
							'isi'			=> 'sim/dokumentasi/list');
			$this->load->view('sim/layout/wrapper',$data);
		}else{
			redirect('auth/login');
		}
	}

	// Upload File
	public function upload() {
		if ($this->tank_auth->is_logged_in()) {	
			$mc = $this->mMClients->listMClients();
		
			$v = $this->form_validation;
		
				if($v->run()) {
					
					$config['upload_path'] 		= './upload/klien/file/';
					$config['allowed_types'] 	= 'gif|jpg|png|pdf|rar|zip';
					$config['max_size']			= '20000'; // KB			
					$this->load->library('upload', $config);
					if(! $this->upload->do_upload('file')) {
						
					$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
									'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
									'instansi'		=> $this->config->item('nama_instansi'),
									'credit'		=> $this->config->item('credit_aplikasi'),
									'error'			=> $this->upload->display_errors(),
									'mc'			=> $mc,
									'isi'			=> 'sim/dokumentasi/upload');
					$this->load->view('sim/layout/wrapper',$data);
					}else{
						$upload_data				= array('uploads' =>$this->upload->data());
						$config['source_file'] 	= './upload/klien/file/'.$upload_data['uploads']['file_name']; 

						$i = $this->input;
						$data = array(	'mc'			=> $mc,							
										'file'			=> $upload_data['uploads']['file_name'],
										'keterangan'	=> $i->post('keterangan')								
						 			 );

						$this->mDocs->createDocs($data);
						$this->session->set_flashdata('sukses','Success');
						redirect(base_url('sim/dokumentasi_client/'));
					}
				}
				// Default page
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'mc'			=> $mc,
								'isi'			=> 'sim/dokumentasi/upload');
				$this->load->view('sim/layout/wrapper',$data);
				var_dump($data);
		}else{
			redirect('auth/login');
		}
	}

	// Edit File
	public function edit($id_dok) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

			$download	 = $this->mDownloads->detailDownload($download_id);
			$endDownload = $this->mDownloads->endDownload();						

			// Validation
			$v = $this->form_validation;
			$v->set_rules('file_name','File Name','required');
		
				if($v->run()) {
					if(!empty($_FILES['file']['name'])) {
					$config['upload_path'] 		= './upload/file/';
					$config['allowed_types'] 	= 'gif|jpg|png|pdf|rar|zip';
					$config['max_size']			= '1000'; // KB			
					$this->load->library('upload', $config);
					if(! $this->upload->do_upload('file')) {
				
					$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
									'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
									'instansi'		=> $this->config->item('nama_instansi'),
									'credit'		=> $this->config->item('credit_aplikasi'),
									'download'	=> $download,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/downloads/edit');
					$this->load->view('admin/layout/wrapper', $data);
					}else{
						$upload_data				= array('uploads' =>$this->upload->data());
						$config['source_image'] 	= './upload/file/'.$upload_data['uploads']['file_name']; 
						
					$i = $this->input;

					unlink('./upload/file/'.$download['file']);

					$slugDownload = $endDownload['download_id'].'-'.url_title($i->post('file_name'),'dash', TRUE);
					$data = array(	'download_id'	=> $download['download_id'],
									'slug_download'	=> $slugDownload,
									'id_user'		=> $this->session->userdata('id_user'),
									'file_name'		=> $i->post('file_name'),
									'date_upload'	=> $i->post('date_upload'),								
									'status'		=> $i->post('status'),								
									'file_description'	=> $i->post('file_description'),								
									'file'			=> $upload_data['uploads']['file_name']
								 );
					$this->mDownloads->editDownload($data);
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/downloads'));
					}}else{
					$i = $this->input;
					$slugDownload = $endDownload['download_id'].'-'.url_title($i->post('file_name'),'dash', TRUE);
					$data = array(	'download_id'	=> $download['download_id'],
									'slug_download'	=> $slugDownload,
									'id_user'		=> $this->session->userdata('id_user'),
									'file_name'		=> $i->post('file_name'),
									'date_upload'	=> $i->post('date_upload'),								
									'status'		=> $i->post('status'),								
									'file_description'	=> $i->post('file_description'),								
								 );
					$this->mDownloads->editDownload($data);
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/downloads'));	
					}
				}

				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'download'	=> $download,
								'site'		=> $site,
								'isi'		=> 'admin/downloads/edit');
				$this->load->view('admin/layout/wrapper', $data);
		}else{
			redirect('login');
		}
	}

	// Delete Download
	public function delete($download_id) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {
			$data = array('download_id'	=> $download_id);
			$this->mDownloads->deleteDownload($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/downloads'));
		}else{
			redirect('login');
		}
	}

}