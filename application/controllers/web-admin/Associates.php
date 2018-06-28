<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Associates extends CI_Controller {
	
	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Associates_model');
	}

	// Index
	public function index() {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

			$staff	  = $this->mAssociates->listAssociates();

			
			$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'staff'	=> $staff,
							'isi'	=> 'admin/associates/list');
			$this->load->view('admin/layout/wrapper',$data);
		}else{
			redirect('login');
		}
	}
		
	// Tambah
	public function create() {

		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

				//Load Model
				$products = $this->mProducts->listProducts();

				// Validasi
				$v = $this->form_validation;
				$v->set_rules('nama','Staff name','required');
				$v->set_rules('product_id','Product Name','required');
				
				if($v->run()) {
					
					$config['upload_path'] 		= './upload/image/';
					$config['allowed_types'] 	= 'gif|jpg|png|svg';
					$config['max_size']			= '500'; // KB	
					$this->load->library('upload', $config);
					if(! $this->upload->do_upload('gambar')) {
				
					$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
									'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
									'instansi'		=> $this->config->item('nama_instansi'),
									'products'	=> $products,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/associates/create');
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
										'product_id'	=> $i->post('product_id'),
										'pendidikan'	=> $i->post('pendidikan'),
										'sertifikat'	=> $i->post('sertifikat'),
										'email'			=> $i->post('email'),
										'isi'			=> $i->post('isi'),
										'gambar'		=> $upload_data['uploads']['file_name'],
										'id_user'		=> $this->session->userdata('status'),
										'status_staff'	=> $i->post('status_staff'),
										'keywords'		=> $i->post('keywords'),
										'urutan'		=> $i->post('urutan')
										);
						$this->mAssociates->tambah($data);
						$this->session->set_flashdata('sukses','Staff added successfully');
						redirect(base_url('admin/associates'));
					}
				}
				// End masuk database
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'products'		=> $products,
								'isi'			=> 'admin/associates/create');
				$this->load->view('admin/layout/wrapper', $data);
		}else{
			redirect('login');
		}
	}
	
	// Edit
	public function edit($id_staff) {

		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {
			// Dari database
			$staff		= $this->Associates_model->detail($id_staff);
			$products 	= $this->mProducts->listProducts();
			// Validasi
			$v = $this->form_validation;
			$v->set_rules('nama','Staff name','required');
			$v->set_rules('product_id','Product Name','required');
		
			if($v->run()) {
					if(!empty($_FILES->gambar['name'])) {
					$config['upload_path'] 		= './upload/image/';
					$config['allowed_types'] 	= 'gif|jpg|png|svg';
					$config['max_size']			= '12000'; // KB	
					$this->load->library('upload', $config);
					if(! $this->upload->do_upload('gambar')) {
				
					$data = array('title'	=> 'Edit Associates',
								'staff'		=> $staff,
								'products'	=> $products,
								'error'		=> $this->upload->display_errors(),
								'isi'		=> 'admin/associates/edit');
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
						$config['height'] 			= 600; // Pixel
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
									'product_id'	=> $i->post('product_id'),
									'pendidikan'	=> $i->post('pendidikan'),
									'sertifikat'	=> $i->post('sertifikat'),
									'email'			=> $i->post('email'),
									'isi'			=> $i->post('isi'),
									'gambar'		=> $upload_data['uploads']['file_name'],
									'id_user'		=> $this->session->userdata('id'),
									'status_staff'	=> $i->post('status_staff'),
									'keywords'		=> $i->post('keywords'),
									'urutan'		=> $i->post('urutan')
									);
					$this->mAssociates->edit($data);
					$this->session->set_flashdata('sukses','Staff data updated and photo replaced');
					redirect(base_url('admin/associates'));
					}
					}else{
					$i = $this->input;
					$data = array(	'id_staff'		=> $staff->id_staff,
									'ukuran'		=> $i->post('ukuran'),
									'nama'			=> $i->post('nama'),
									'jabatan'		=> $i->post('jabatan'),
									'product_id'	=> $i->post('product_id'),
									'pendidikan'	=> $i->post('pendidikan'),
									'sertifikat'	=> $i->post('sertifikat'),
									'email'			=> $i->post('email'),
									'isi'			=> $i->post('isi'),
									'id_user'		=> $this->session->userdata('id'),
									'status_staff'	=> $i->post('status_staff'),
									'keywords'		=> $i->post('keywords'),
									'urutan'		=> $i->post('urutan')
									);
					$this->mAssociates->edit($data);
					$this->session->set_flashdata('sukses','Staff data updated successfully');
					redirect(base_url('admin/associates'));			
					}
			}
				// End masuk database
				$data = array(	'title'		=> 'Edit Associates',
								'staff'		=> $staff,
								'products'	=> $products,
								'isi'		=> 'admin/associates/edit');
				$this->load->view('admin/layout/wrapper', $data);
		}else{
			redicrect('login');
		}
	}
	
	// Delete
	public function delete($id_staff) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {
				$staff		= $this->mAssociates->detail($id_staff);
				// Hapus gambar lama
				unlink('./upload/image/'.$staff->gambar);
				unlink('./upload/image/thumbs/'.$staff->gambar);
				// End hapus gambar lama
				$data = array('id_staff'	=> $id_staff);
				$this->mAssociates->delete($data);		
				$this->session->set_flashdata('sukses','Staff deleted successfully');
				redirect(base_url('admin/associates'));
		}else{
			redirect('login');
		}
	}
}