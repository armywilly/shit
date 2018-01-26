<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
	
	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('sim/Karyawan_model');
	}

	// Index
	public function index() {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="support") {
			$k	= $this->mKaryawan->listKaryawan();
			$mj = $this->mMjabatan->listJabatan();
			
			$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'k'				=> $k,
							'mj'			=> $mj,
							'isi'			=> 'sim/karyawan/list');
			$this->load->view('sim/layout/wrapper',$data);
		}else{
			redirect('login');
		}
	}
		
	// Tambah
	public function create() {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="support") {
			//Load Model
			$mj = $this->mMjabatan->listJabatan();
			$kd['nip']=  $this->mKaryawan->get_nip();

			// Validasi
			$v = $this->form_validation;//Set V as variable of form_validation
			$v->set_rules('nama','Karyawan name','required');
			$v->set_rules('jabatan','jabatan','required');
				if($v->run()) { //Eksekusi setelah validasi run, maka
					
					$config['upload_path'] 		= './upload/image/';
					$config['allowed_types'] 	= 'gif|jpg|png|svg';
					$config['max_size']			= '500'; // KB	
					$this->load->library('upload', $config);
					if(! $this->upload->do_upload('image')) {
				
					$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
									'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
									'instansi'		=> $this->config->item('nama_instansi'),
									'credit'		=> $this->config->item('credit_aplikasi'),
									'error'			=> $this->upload->display_errors(),
									'mj'			=> $mj,
									'kd'			=> $kd,
									'isi'			=> 'sim/karyawan/create');
					$this->load->view('sim/layout/wrapper', $data);
					// Masuk database
					}else{
						$upload_data				= array('uploads' =>$this->upload->data());
						// Image Editor
						$config['image_library']	= 'gd2';
						$config['source_image'] 	= './upload/image/'.$upload_data['uploads']['file_name']; 
						$config['new_image'] 		= './upload/image/thumbs/';
						$config['create_thumb'] 	= TRUE;
						$config['maintain_ratio'] 	= FALSE;
						$config['max_width'] 		= 1024; // Pixel
						$config['max_height'] 		= 700; // Pixel
						$config['x_axis'] 			= 0;
						$config['y_axis'] 			= 0;
						$config['thumb_marker'] 	= '';
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

					//Data input Begin	
					$i = $this->input;
					$data = array(	'nip'				=> $kd['nip'],
									'nama'				=> $i->post('nama'),
									'gender'			=> $i->post('gender'),
									'tempat_lahir'		=> $i->post('tempat_lahir'),
									'tgl_lahir'			=> $i->post('tgl_lahir'),
									'npwp'				=> $i->post('npwp'),
									'bpjs'				=> $i->post('bpjs'),
									'jabatan'			=> $i->post('jabatan'),
									'pendidikan'		=> $i->post('pendidikan'),
									'sertifikat'		=> $i->post('sertifikat'),
									'email'				=> $i->post('email'),
									'biodata'			=> $i->post('biodata'),
									'image'				=> $upload_data['uploads']['file_name'],
									'id_user'			=> $this->session->userdata('id_user'),
									'status_staff'		=> $i->post('status_staff'),
									'keyword'			=> $i->post('keyword'),
									'ukuran'			=> $i->post('ukuran'),
									'status_karyawan'	=> $i->post('status_karyawan'),
									'tanggal'			=> $i->post('tanggal'),
									);
					$this->mKaryawan->tambah($data);
					$this->session->set_flashdata('success','Staff added successfully');
					redirect(base_url('sim/karyawan'));
					}
				}
				// End masuk database
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'mj'			=> $mj,
								'kd'			=> $kd,
								'isi'			=> 'sim/karyawan/create');
				$this->load->view('sim/layout/wrapper', $data);
		}else{
			redirect('login');
		}
	}
	
	// Edit
	public function edit($id_staff) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="support") {
			// Dari database
			$k		  = $this->mKaryawan->detail($id_staff);
			$kd['nip']=  $this->mKaryawan->get_nip();
			$mj 	  = $this->mMjabatan->listJabatan();
			// Validasi
			$v 		  = $this->form_validation;
			$v->set_rules('nama','Staff name','required');
		
				if($v->run()) {
					if(!empty($_FILES->gambar['name'])) {
					$config['upload_path'] 		= './upload/image/';
					$config['allowed_types'] 	= 'gif|jpg|png|svg';
					$config['max_size']			= '500'; // KB	
					$this->load->library('upload', $config);
						if(! $this->upload->do_upload('image')) {
				
							$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
											'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
											'instansi'		=> $this->config->item('nama_instansi'),
											'credit'		=> $this->config->item('credit_aplikasi'),
											'k'				=> $k,
											'mj'			=> $mj,
											'kd'			=> $kd,
											'error'			=> $this->upload->display_errors(),
											'isi'			=> 'sim/karyawan/edit');
							$this->load->view('sim/layout/wrapper', $data);
						// Masuk database
						}else{

						$upload_data				= array('uploads' =>$this->upload->data());
						// Image Editor
						$config['image_library']	= 'gd2';
						$config['source_image'] 	= './upload/image/'.$upload_data['uploads']['file_name']; 
						$config['new_image'] 		= './upload/image/thumbs/';
						$config['create_thumb'] 	= TRUE;
						$config['maintain_ratio'] 	= 1024; // Pixel
						$config['height'] 			= 700; // Pixel
						$config['x_axis'] 			= 0;
						$config['y_axis'] 			= 0;
						$config['thumb_marker'] 	= '';
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						
						$i = $this->input;
						// Hapus gambar lama
						unlink('./upload/image/'.$k['image']);
						unlink('./upload/image/thumbs/'.$k['image']);
						// End hapus gambar lama
						$data = array(	'id_staff'			=> $k['id_staff'],
										'nip'				=> $kd('nip'),
										'nama'				=> $i->post('nama'),
										'gender'			=> $i->post('gender'),
										'tempat_lahir'		=> $i->post('tempat_lahir'),
										'tgl_lahir'			=> $i->post('tgl_lahir'),
										'npwp'				=> $i->post('npwp'),
										'bpjs'				=> $i->post('bpjs'),
										'jabatan'			=> $i->post('jabatan'),
										'pendidikan'		=> $i->post('pendidikan'),
										'sertifikat'		=> $i->post('sertifikat'),
										'email'				=> $i->post('email'),
										'biodata'			=> $i->post('biodata'),
										'image'				=> $upload_data['uploads']['file_name'],
										'id_user'			=> $this->session->userdata('id_user'),
										'status_staff'		=> $i->post('status_staff'),
										'keyword'			=> $i->post('keyword'),
										'ukuran'			=> $i->post('ukuran'),
										'status_karyawan'	=> $i->post('status_karyawan'),
										'tanggal'			=> $i->posy('tanggal'),
										);
						$this->mKaryawan->edit($data);
						$this->session->set_flashdata('sukses','Staff data updated and photo replaced');
						redirect(base_url('sim/karyawan'));
						}
					}else{

					$i = $this->input;
					$data = array(	'id_staff'			=> $k['id_staff'],
									'nip'				=> $kd['nip'],
									'nama'				=> $i->post('nama'),
									'gender'			=> $i->post('gender'),
									'tempat_lahir'		=> $i->post('tempat_lahir'),
									'tgl_lahir'			=> $i->post('tgl_lahir'),
									'npwp'				=> $i->post('npwp'),
									'bpjs'				=> $i->post('bpjs'),
									'jabatan'			=> $i->post('jabatan'),
									'pendidikan'		=> $i->post('pendidikan'),
									'sertifikat'		=> $i->post('sertifikat'),
									'email'				=> $i->post('email'),
									'biodata'			=> $i->post('biodata'),
									'id_user'			=> $this->session->userdata('id_user'),
									'status_staff'		=> $i->post('status_staff'),
									'keyword'			=> $i->post('keyword'),
									'ukuran'			=> $i->post('ukuran'),
									'status_karyawan'	=> $i->post('status_karyawan'),
									'tanggal' 			=> $i->post('tanggal'),
									);
					$this->mKaryawan->edit($data);
					$this->session->set_flashdata('sukses','Staff data updated successfully');
					redirect(base_url('sim/Karyawan'));			
					}
				}
				// End masuk database
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'k'				=> $k,
								'mj'			=> $mj,
								'kd'			=> $kd,
								'isi'			=> 'sim/karyawan/edit');
				$this->load->view('sim/layout/wrapper', $data);
		}else{
			redirect('login');
		}
	}
	
	// Delete
	public function delete($id_staff) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="support") {
			$k		= $this->mKaryawan->detail($id_staff);
			// Hapus gambar lama
			unlink('./upload/image/'.$k['image']);
			unlink('./upload/image/thumbs/'.$k['image']);
			// End hapus gambar lama
			$data = array('id_staff'	=> $id_staff);
			$this->mKaryawan->deleteKaryawan($data);		
			$this->session->set_flashdata('sukses','Staff deleted successfully');
			redirect(base_url('sim/karyawan'));
		}else{
			redirect('login');
		}

	}
}