<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Products
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Products_model');
	}
	
	// Main Page Products
	public function index() {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

			$products = $this->mProducts->listProducts();
			
			$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'products'		=> $products,
							'isi'			=> 'admin/product/list');
			$this->load->view('admin/layout/wrapper',$data);
		}else{
			redirect('login');
		}
	}

	// Create Product
	public function create() {
		
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {
			$v = $this->form_validation;
			$v->set_rules('product_name','Product Name','required');
		
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
									'isi'			=> 'admin/product/create');
					$this->load->view('admin/layout/wrapper',$data);
					}else{
						$upload_data				= array('uploads' =>$this->upload->data());
						$config['image_library']	= 'gd2';
						$config['source_image'] 	= './upload/image/'.$upload_data['uploads']['file_name']; 
						$config['new_image'] 		= './upload/image/thumbs/';
						$config['create_thumb'] 	= TRUE;
						$config['maintain_ratio'] 	= TRUE;
						$config['width'] 			= 600; // Pixel
						$config['height'] 			= 400; // Pixel
						$config['thumb_marker'] 	= '';
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						$i = $this->input;
						$slugProduct = url_title($this->input->post('product_name'), 'dash', TRUE);
						$data = array(	'slug_product'	=> $slugProduct,
										'id_user'		=> $this->session->userdata('id_user'),
										'product_name'	=> $i->post('product_name'),								
										'date'			=> $i->post('date'),								
										'status'		=> $i->post('status'),
										'urutan'		=> $i->post('urutan'),								
										'product_description' => $i->post('product_description'),								
										'image'			=> $upload_data['uploads']['file_name']
						 			 );

						$this->mProducts->createProduct($data);
						$this->session->set_flashdata('sukses','Success');
						redirect(base_url('admin/products/'));
					}
				}
				// Default page
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'isi'		=> 'admin/product/create');
				$this->load->view('admin/layout/wrapper',$data);
		}else{
			redirect('login');
		}
	}

	// Edit Product
	public function edit($product_id) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

			$product	= $this->mProducts->detailProduct($product_id);
			$endProduct	= $this->mProducts->endProduct();		

			// Validation
			$v = $this->form_validation;
			$v->set_rules('product_name','Product Name','required');
		
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
									'product'	=> $product,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/products/edit');
					$this->load->view('admin/layout/wrapper', $data);
					}else{
						$upload_data				= array('uploads' =>$this->upload->data());
						$config['image_library']	= 'gd2';
						$config['source_image'] 	= './upload/image/'.$upload_data['uploads']['file_name']; 
						$config['new_image'] 		= './upload/image/thumbs/';
						$config['create_thumb'] 	= TRUE;
						$config['quality'] 			= "100%";
						$config['maintain_ratio'] 	= FALSE;
						$config['width'] 			= 600; // Pixel
						$config['height'] 			= 400; // Pixel
						$config['x_axis'] 			= 0;
						$config['y_axis'] 			= 0;
						$config['thumb_marker'] 	= '';
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						
					$i = $this->input;

					unlink('./upload/image/'.$product['image']);
					unlink('./upload/image/thumbs/'.$product['image']);

					$slugProduct = $endProduct['product_id'].'-'.url_title($i->post('product_name'),'dash', TRUE);
					$data = array(	'product_id'			=> $product['product_id'],
									'slug_product'			=> $slugProduct,
									'id_user'				=> $this->session->userdata('id_user'),
									'product_name'			=> $i->post('product_name'),
									'product_description' 	=> $i->post('product_description'),
									'date'					=> $i->post('date'),
									'status'				=> $i->post('status'),
									'urutan'				=> $i->post('urutan'),
									'image'					=> $upload_data['uploads']['file_name']
									
									);
					$this->mProducts->editProduct($data);
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/products'));
					}}else{
					$i = $this->input;
					$slugProduct = $endProduct['product_id'].'-'.url_title($i->post('product_name'),'dash', TRUE);
					$data = array(	'product_id'		  => $product['product_id'],
									'slug_product'		  => $slugProduct,
									'id_user'			  => $this->session->userdata('id_user'),
									'product_name'		  => $i->post('product_name'),
									'product_description' => $i->post('product_description'),
									'date'				  => $i->post('date'),
									'status'			  => $i->post('status'),
									'urutan'			  => $i->post('urutan')
									);
					$this->mProducts->editProduct($data);
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/products'));			
					}
				}

				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'product'	=> $product,
								'isi'		=> 'admin/product/edit');
				$this->load->view('admin/layout/wrapper', $data);
		}else{
			redirect('login');
		}
	}	

	// Delete Product
	public function delete($product_id) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {
			$data = array('product_id'	=> $product_id);
			$this->mProducts->deleteProduct($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/products'));
		}else{
			redirect('login');
		}
	}		
}