<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends CI_Controller {
	
	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('Partners_model');
	}

	// Index
	public function index() {
		$staff	= $this->mPartners->listPartners();
		
		$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'staff'			=> $staff,
						'isi'			=> 'admin/partners/list');
		$this->load->view('admin/layout/wrapper',$data);
	}
		
	// Tambah
	public function create() {
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('nama','Staff name','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '500'; // KB	
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
		$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/partners/create');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= FALSE;
				$config['width'] 			= 600; // Pixel
				$config['height'] 			= 400; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;
			$data = array(	'ukuran'		=> $i->post('ukuran'),
							'nama'			=> $i->post('nama'),
							'jabatan'		=> $i->post('jabatan'),
							'pendidikan'	=> $i->post('pendidikan'),
							'sertifikat'	=> $i->post('sertifikat'),
							'email'			=> $i->post('email'),
							'isi'			=> $i->post('isi'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'id_user'		=> $this->session->userdata('id_user'),
							'status_staff'	=> $i->post('status_staff'),
							'keywords'		=> $i->post('keywords'),
							'urutan'		=> $i->post('urutan')
							);
			$this->Partners_model->tambah($data);
			$this->session->set_flashdata('sukses','Staff added successfully');
			redirect(base_url('admin/partners'));
		}}
		// End masuk database
		$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'isi'		=> 'admin/partners/create');
		$this->load->view('admin/layout/wrapper', $data);
	}
	
	// Edit
	public function edit($id_staff) {
		// Dari database
		$staff		= $this->Partners_model->detail($id_staff);
		// Validasi
		$v = $this->form_validation;
		$v->set_rules('nama','Staff name','required');
		
		if($v->run()) {
			if(!empty($_FILES->gambar['name'])) {
			$config['upload_path'] 		= './upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg';
			$config['max_size']			= '500'; // KB	
		$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {
		
		$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'staff'	=> $staff,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/partners/edit');
		$this->load->view('admin/layout/wrapper', $data);
		// Masuk database
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= 600; // Pixel
				$config['height'] 			= 400; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				
			$i = $this->input;
			// Hapus gambar lama
			unlink('./upload/image/'.$staff->gambar);
			unlink('./upload/image/thumbs/'.$staff->gambar);
			// End hapus gambar lama
			$data = array(	'id_staff'		=> $staff->id_staff,
							'ukuran'		=> $i->post('ukuran'),
							'nama'			=> $i->post('nama'),
							'jabatan'		=> $i->post('jabatan'),
							'pendidikan'	=> $i->post('pendidikan'),
							'sertifikat'	=> $i->post('sertifikat'),
							'email'			=> $i->post('email'),
							'isi'			=> $i->post('isi'),
							'gambar'		=> $upload_data['uploads']['file_name'],
							'id_user'		=> $this->session->userdata('id_user'),
							'status_staff'	=> $i->post('status_staff'),
							'keywords'		=> $i->post('keywords'),
							'urutan'		=> $i->post('urutan')
							);
			$this->Partners_model->edit($data);
			$this->session->set_flashdata('sukses','Staff data updated and photo replaced');
			redirect(base_url('admin/partners'));
		}}else{
			$i = $this->input;
			$data = array(	'id_staff'		=> $staff->id_staff,
							'ukuran'		=> $i->post('ukuran'),
							'nama'			=> $i->post('nama'),
							'jabatan'		=> $i->post('jabatan'),
							'pendidikan'	=> $i->post('pendidikan'),
							'sertifikat'	=> $i->post('sertifikat'),
							'email'			=> $i->post('email'),
							'isi'			=> $i->post('isi'),
							'id_user'		=> $this->session->userdata('id_user'),
							'status_staff'	=> $i->post('status_staff'),
							'keywords'		=> $i->post('keywords'),
							'urutan'		=> $i->post('urutan')
							);
			$this->Partners_model->edit($data);
			$this->session->set_flashdata('sukses','Staff data updated successfully');
			redirect(base_url('admin/partners'));			
		}}
		// End masuk database
		$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'staff'	=> $staff,
						'isi'		=> 'admin/partners/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}
	
	// Delete
	public function delete($id_staff) {
		$staff		= $this->Partners_model->detail($id_staff);
		// Hapus gambar lama
		unlink('./upload/image/'.$staff->gambar);
		unlink('./upload/image/thumbs/'.$staff->gambar);
		// End hapus gambar lama
		$data = array('id_staff'	=> $id_staff);
		$this->Partners_model->delete($data);		
		$this->session->set_flashdata('sukses','Staff deleted successfully');
		redirect(base_url('admin/partners'));

	}
}