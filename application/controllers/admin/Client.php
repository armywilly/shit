<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Clients
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	
	// Main Page Clients
	public function index() {

		$client  	= $this->mClients->listClients();
		
		$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'client'		=> $client,
						'isi'			=> 'admin/client/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Create Product
	public function create() {
		
		
		$v = $this->form_validation;
		$v->set_rules('client_name','Client Name','required');
		
		if($v->run()) {
			
			$config['upload_path'] 		= './upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png';
			$config['max_size']			= '300'; // KB			
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('image')) {
				
		$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/client/create');
		$this->load->view('admin/layout/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './upload/image/'.$upload_data['uploads']['file_name']; 
				$config['new_image'] 		= './upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 150; // Pixel
				$config['height'] 			= 150; // Pixel
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$i = $this->input;
				$slugClient = url_title($this->input->post('client_name'), 'dash', TRUE);
				$data = array(	'slug_client'	=> $slugClient,
								'id_user'		=> $this->session->userdata('status'),
								'client_name'	=> $i->post('client_name'),								
								'date'			=> $i->post('date'),								
								'status'		=> $i->post('status'),								
								'website' 		=> $i->post('website'),								
								'image'			=> $upload_data['uploads']['file_name']
				 			 );

				$this->mClients->createClient($data);
				$this->session->set_flashdata('sukses','Success');
				redirect(base_url('admin/client/'));
		}}
		// Default page
		$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'isi'		=> 'admin/client/create');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Edit Client
	public function edit($client_id) {

		$client	= $this->mClients->detailClient($client_id);
		$endClient	= $this->mClients->endClient();		

		// Validation
		$v = $this->form_validation;
		$v->set_rules('client_name','Client Name','required');
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
						'client'	=> $client,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/client/edit');
		$this->load->view('admin/layout/wrapper', $data);
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

			unlink('./upload/image/'.$client['image']);
			unlink('./upload/image/thumbs/'.$client['image']);

			$slugClient = $endClient['client_id'].'-'.url_title($i->post('client_name'),'dash', TRUE);
			$data = array(	'client_id'     => $client['client_id'],
							'slug_client'	=> $slugClient,
							'id_user'		=> $this->session->userdata('id_user'),
							'client_name'	=> $i->post('client_name'),								
							'date'			=> $i->post('date'),								
							'status'		=> $i->post('status'),								
							'website' 		=> $i->post('website'),								
							'image'			=> $upload_data['uploads']['file_name']
				 			 );
			$this->mClients->editClient($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/client'));
		}}else{
			//Funtion Insert data dan Redirect ke List
			$i = $this->input;
			$slugClient = $endClient['client_id'].'-'.url_title($i->post('client_name'),'dash', TRUE);
			$data = array(	'client_id'     => $client['client_id'],
							'slug_client'	=> $slugClient,
							'id_user'		=> $this->session->userdata('id_user'),
							'client_name'	=> $i->post('client_name'),								
							'date'			=> $i->post('date'),								
							'status'		=> $i->post('status'),								
							'website' 		=> $i->post('website'),								
				 			 );
			$this->mClients->editClient($data);
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/client'));			
		}}

		$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'client'	=> $client,
						'isi'		=> 'admin/client/edit');
		$this->load->view('admin/layout/wrapper', $data);
	}	

	// Delete Client
	public function delete($client_id) {
		$data = array('client_id' => $client_id);
		$this->mClients->deleteClient($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/client'));
	}		
}