<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Blogs_model','admin/Categories_model');
	}
	
	// Main Page Blogs
	public function index() {

		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

			$blogs = $this->mBlogs->listBlogs();
			
			$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'blogs'		=> $blogs,
							'isi'		=> 'admin/blog/list');
			$this->load->view('admin/layout/wrapper',$data);
		}else{
			redirect('login');
		}
	}

/* 
	Function Create
*/

	// Main Page Categories Blogs
	public function categories() {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {
		
			$categories	= $this->mCategories->listCategories();		
			
			// Validasi
			$valid = $this->form_validation;
			$valid->set_rules('category_name','Category Name','required');
			$valid->set_rules('order_category','Order Category','required');
		
				if($valid->run() === FALSE) {
				
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'categories'	=> $categories,
								'isi'			=> 'admin/categories/list');
				$this->load->view('admin/layout/wrapper',$data);
				}else{
					$i = $this->input;
					$slug = url_title($this->input->post('category_name'), 'dash', TRUE);
					$data = array(	'slug_category'			=> $slug,
									'id_user'				=> $this->session->userdata('id_user'),
									'category_name'			=> $i->post('category_name'),
									'order_category'		=> $i->post('order_category'),
									'category_description'	=> $i->post('category_description'),
									'date_category'			=> $i->post('date_category'),
								);
					$this->mCategories->createCategory($data);		
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/blog/categories'));
				}
		}else{
			redirect('login');
		}
	}
		
				
	// Create Blog
	public function create() {
		
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {
			$categories = $this->mCategories->listCategories();
			$endBlog  = $this->mBlogs->endBlog();
			
			$v = $this->form_validation;
			$v->set_rules('category_id','Category Blog','required');
			$v->set_rules('title','Title Blog','required');
			$v->set_rules('content','Content Blog','required');
		
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
									'categories'	=> $categories,
									'error'			=> $this->upload->display_errors(),
									'isi'			=> 'admin/blog/create');
					$this->load->view('admin/layout/wrapper',$data);

					}else{
						$upload_data				= array('uploads' =>$this->upload->data());
						// Image Editor
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
						$slug_blog = url_title($this->input->post('title'), 'dash', TRUE);
						$data = array(	'category_id'	=> $i->post('category_id'),
										'slug_blog'		=> $slug_blog,
										'id_user'		=> $this->session->userdata('id_user'),
										'title'			=> $i->post('title'),
										'content'		=> $i->post('content'),
										'date_post'		=> $i->post('date_post'),
										'status'		=> $i->post('status'),
										'keywords'		=> $i->post('keywords'),
										'image'			=> $upload_data['uploads']['file_name']
						 			 );

						$this->mBlogs->createBlog($data);
						$this->session->set_flashdata('sukses','Success');
						redirect(base_url('admin/blog/'));
					}
				}
				// Default page
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'categories'=> $categories,
								'isi'		=> 'admin/blog/create');
				$this->load->view('admin/layout/wrapper',$data);
		}else{
			redirect('login');
		}
	}	


	// Edit Categories Blogs
	public function edit_category($category_id) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

			$category 	 = $this->mCategories->detailCategory($category_id);
			$endCategory = $this->mCategories->endCategory();

			// Validation
			$valid = $this->form_validation;
			$valid->set_rules('category_name','Category Name','required');
			$valid->set_rules('order_category','Order Category','required');

				if($valid->run() === FALSE) {
				
				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'category'	=> $category,
								'isi'		=> 'admin/categories/edit');
				$this->load->view('admin/layout/wrapper',$data);
				}else{
					$i = $this->input;
					$slug_category = $endCategory['category_id'].'-'.url_title($i->post('category_name'),'dash', TRUE);
					$data = array(	'category_id'		=> $category['category_id'],
									'slug_category'		=> $slug_category,		
									'category_name'		=> $i->post('category_name'),		
									'order_category'	=> $i->post('order_category'),					
									'date_category'		=> $i->post('date_category'),					
								);
					$this->mCategories->editCategory($data);		
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/blog/categories'));
				}
		}else{
			redirect('login');
		}
	}

	// Edit Blogs
	public function edit($blog_id) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

			$blog		= $this->mBlogs->detailBlog($blog_id);
			$endBlog	= $this->mBlogs->endBlog();		
			$category	= $this->mCategories->listCategories();

			// Validation
			$v = $this->form_validation;
			$v->set_rules('category_id','Category Blog','required');
			$v->set_rules('title','Title Blog','required');
			$v->set_rules('content','Content Blog','required');
				
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
									'category'	=> $category,
									'blog'		=> $blog,
									'error'		=> $this->upload->display_errors(),
									'isi'		=> 'admin/blog/edit');
					$this->load->view('admin/layout/wrapper', $data);
					}else{
						$upload_data				= array('uploads' =>$this->upload->data());
						$config['image_library']	= 'gd2';
						$config['source_image'] 	= './upload/image/'.$upload_data['uploads']['file_name']; 
						$config['new_image'] 		= './upload/image/thumbs/';
						$config['create_thumb'] 	= TRUE;
						$config['quality'] 			= "100%";
						$config['maintain_ratio'] 	= FALSE;
						$config['width'] 			= 360; // Pixel
						$config['height'] 			= 200; // Pixel
						$config['x_axis'] 			= 0;
						$config['y_axis'] 			= 0;
						$config['thumb_marker'] 	= '';
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						
					$i = $this->input;

					unlink('./upload/image/'.$blog['image']);
					unlink('./upload/image/thumbs/'.$blog['image']);

					$slugBlog = $endBlog['blog_id'].'-'.url_title($i->post('title'),'dash', TRUE);
					$data = array(	'blog_id'		=> $blog['blog_id'],
									'slug_blog'		=> $slugBlog,
									'id_user'		=> $this->session->userdata('id_user'),
									'title'			=> $i->post('title'),
									'content'		=> $i->post('content'),
									'date_post'		=> $i->post('date_post'),
									'status'		=> $i->post('status'),
									'keywords'		=> $i->post('keywords'),
									'image'			=> $upload_data['uploads']['file_name']
									);
					$this->edit_model->edit_biz($data);
					$this->session->set_flashdata('sukses','Blog telah diedit dan gambar telah diganti');
					redirect(base_url('admin/blog'));

					}}else{
					$i = $this->input;
					$slugBlog = $endBlog['blog_id'].'-'.url_title($i->post('title'),'dash', TRUE);
					$data = array(	'blog_id'		=> $blog['blog_id'],
									'slug_blog'		=> $slugBlog,
									'id_user'		=> $this->session->userdata('id_user'),
									'title'			=> $i->post('title'),
									'content'		=> $i->post('content'),
									'date_post'		=> $i->post('date_post'),
									'status'		=> $i->post('status'),
									'keywords'		=> $i->post('keywords'),
									);
					$this->mBlogs->editBlog($data);
					$this->session->set_flashdata('sukses','Success');
					redirect(base_url('admin/blog'));			
					}
				}

				$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
								'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
								'instansi'		=> $this->config->item('nama_instansi'),
								'credit'		=> $this->config->item('credit_aplikasi'),
								'category'		=> $category,
								'blog'			=> $blog,
								'isi'			=> 'admin/blog/edit');
				$this->load->view('admin/layout/wrapper', $data);
		}else{
			redirect('login');
		}
	}			

/* 
	Function Delete
*/

	// Delete Blog
	public function delete_blog($blog_id) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

			$data = array('blog_id'	=> $blog_id);
			$this->mBlogs->deleteBlog($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/blog'));
		}else{
			redirect('login');
		}
	}

	// Delete Category Blog
	public function delete_category($category_id) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

			$data = array('category_id'	=> $category_id);
			$this->mCategories->deleteCategory($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/blog/categories'));
		}else{
			redirect('login');
		}
	}
					
}