<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Master_client extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->helper('url');
		$this->load->model('sim/master_client_model');
	}
	
	// Main Page Clients
	public function index() {
		if ($this->tank_auth->is_logged_in()) {	

			$mc  	= $this->mMClients->listMClients();
			
			$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'mc'			=> $mc,
							'isi'			=> 'sim/master-client/list');
			$this->load->view('sim/layout/wrapper',$data);
		}else{
			redirect('auth/login');
		}
	}

	// Read Karyawan
	public function detil($id_master_client) {
		if ($this->tank_auth->is_logged_in()) {	

			$mc 	= $this->mKaryawan->detailMClient($id_master_clien);                                           		
			
			$data  = array(		'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'mc'			=> $mc,
								'isi'			=> 'sim/master-client/detail');
			$this->load->view('sim/layout/wrapper', $data);
		}else{
			redirect('auth/login');
		}	
	}

	// Create Product
	public function create() {

		$kd['nrk'] = $this->mMClients->get_nrk();
		
		if ($this->tank_auth->is_logged_in()) {	
			$v = $this->form_validation;
			$v->set_rules('nama_client','Nama Client','required');
		
				if($v->run()) {
					
					$config['upload_path'] 		= './upload/klien/';
					$config['allowed_types'] 	= 'gif|jpg|png|pdf|rar|zip';
					$config['max_size']			= '20000'; // KB
					$config['overwrite']		= 'FALSE';			
					$this->load->library('upload', $config);
					if($this->upload->do_upload('multiple')) {
						
					$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
									'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
									'instansi'		=> $this->config->item('nama_instansi'),
									'credit'		=> $this->config->item('credit_aplikasi'),
									'error'			=> $this->upload->display_errors(),
									'kd'			=> $kd,
									'isi'			=> 'sim/master-client/create');
					$this->load->view('sim/layout/wrapper',$data);
					}else{
						$upload_data				= array('uploads' =>$this->upload->data());

						$i = $this->input;
						$slugmc = url_title($this->input->post('nama_client'), 'dash', TRUE);
						$data = array(	'slug_mc'		=> $slugmc,
										'id_user'		=> $this->session->userdata('username'),
										'nama_client'	=> $i->post('nama_client'),
										'nrk'			=> $kd['nrk'],
										'alamat_client'	=> $i->post('alamat_client'),
										'no_telp_client'=> $i->post('no_telp_client'),
										'no_fax_client'	=> $i->post('no_fax_client'),
										'pic'			=> $i->post('pic'),
										'email_client'	=> $i->post('email_client'),
										'npwp_client'	=> $i->post('npwp_client'),								
										'tanggal'		=> $i->post('tanggal'),								
										'image'			=> $upload_data['uploads']['file_name'],
										'file_1'		=> $upload_data['uploads']['file_name'],						 			 );

						$this->mMClients->createMClient($data);
						$this->session->set_flashdata('sukses','Success');
						redirect(base_url('sim/master_client/'));
					}
				}
				// Default page
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'kd'			=> $kd,
								'isi'			=> 'sim/master-client/create');
				$this->load->view('sim/layout/wrapper',$data);
		}else{
			redirect('auth/login');
		}
	}

	// Edit Client
	public function edit($id_master_client) {
		if ($this->tank_auth->is_logged_in()) {	

			$mc	= $this->mMClients->detailMClient($id_master_client);
			$endmc	= $this->mMClients->endMClient();
			$kd['nrk'] = $this->mMClients->get_nrk();		

			// Validation
			$v = $this->form_validation;
			$v->set_rules('nama_client','Nama Client','required');
				//Funtion Baca Data
				if($v->run()) {
					if(!empty($_FILES['image']['name'])) {
					$config['upload_path'] 		= './upload/image/';
					$config['allowed_types'] 	= 'gif|jpg|png|svg';
					$config['max_size']			= '300'; // KB			
					$this->load->library('upload', $config);
					if(! $this->upload->do_upload('image')) {
				
					$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
									'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
									'instansi'		=> $this->config->item('nama_instansi'),
									'credit'		=> $this->config->item('credit_aplikasi'),
									'mc'			=> $mc,
									'kd'			=> $kd,
									'error'			=> $this->upload->display_errors(),
									'isi'			=> 'sim/master-client/edit');
					$this->load->view('sim/layout/wrapper', $data);
					}else{
						$upload_data				= array('uploads' =>$this->upload->data());
						$config['image_library']	= 'gd2';
						$config['source_image'] 	= './upload/image/'.$upload_data['uploads']['file_name']; 
						$config['new_image'] 		= './upload/image/thumbs/';
						$config['create_thumb'] 	= TRUE;
						$config['quality'] 			= "100%";
						$config['maintain_ratio'] 	= FALSE;
						$config['width'] 			= 150; // Pixel
						$config['height'] 			= 150; // Pixel
						$config['x_axis'] 			= 0;
						$config['y_axis'] 			= 0;
						$config['thumb_marker'] 	= '';
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						
					$i = $this->input;

					unlink('./upload/image/'.$mc['image']);
					unlink('./upload/image/thumbs/'.$mc['image']);
					unset($kd['nrk']);

					$slugmc = $endmc['id_master_client'].'-'.url_title($i->post('nama_client'),'dash', TRUE);
					$data = array(	'id_master_client'     => $mc['id_master_client'],
									'slug_mc'		=> $slugmc,
									'id_user'		=> $this->session->userdata('username'),
									'nama_client'	=> $i->post('nama_client'),
									'nrk'			=> $kd['nrk'],
									'alamat_client'	=> $i->post('alamat_client'),
									'no_telp_client'=> $i->post('no_telp_client'),
									'no_fax_client'	=> $i->post('no_fax_client'),
									'pic'			=> $i->post('pic'),
									'email_client'	=> $i->post('email_client'),
									'npwp_client'	=> $i->post('npwp_client'),								
									'tanggal'		=> $i->post('tanggal'),								
									'image'			=> $upload_data['uploads']['file_name']
						 			 );
					$this->mMClients->editMClient($data);
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('sim/master_client'));
					}}else{
					//Funtion Insert data dan Redirect ke List
					$i = $this->input;
					$slugmc = $endmc['id_master_client'].'-'.url_title($i->post('nama_client'),'dash', TRUE);
					$data = array(	'id_master_client'     => $mc['id_master_client'],
									'slug_mc'		=> $slugmc,
									'id_user'		=> $this->session->userdata('username'),
									'nama_client'	=> $i->post('nama_client'),
									'alamat_client'	=> $i->post('alamat_client'),
									'no_telp_client'=> $i->post('no_telp_client'),
									'no_fax_client'	=> $i->post('no_fax_client'),
									'pic'			=> $i->post('pic'),
									'email_client'	=> $i->post('email_client'),
									'npwp_client'	=> $i->post('npwp_client'),								
									'tanggal'		=> $i->post('tanggal'),								
						 			 );
					$this->mMClients->editMClient($data);
					$this->session->set_flashdata('sukses','Success');
					redirect('sim/master_client');			
					}
				}

				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'mc'			=> $mc,
								'isi'			=> 'sim/master-client/edit');
				$this->load->view('sim/layout/wrapper', $data);
		}else{
			redirect('auth/login');
		}
	}	

	// Delete Client
	public function delete($id_master_client) {
		if ($this->tank_auth->is_logged_in()) {	
			$data = array('id_master_client' => $id_master_client);
			$this->mMClients->deleteMClient($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('sim/master_client'));
		}else{
			redirect('auth/login');
		}
	}		
}