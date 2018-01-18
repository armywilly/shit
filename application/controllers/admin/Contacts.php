<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Contacts_model');
	}
	
	// Inbox Contacts
	public function inbox() {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {

			$contacts = $this->mContacts->listContacts();
			
			$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
							'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
							'instansi'		=> $this->config->item('nama_instansi'),
							'credit'		=> $this->config->item('credit_aplikasi'),
							'contacts'	=> $contacts,
							'isi'		=> 'admin/message/list');
			$this->load->view('admin/layout/wrapper',$data);
		}else{
			redirect('login');
		}
	}

	// Delete Message
	public function delete($message_id) {
		if($this->session->userdata('logged_in')!="" && $this->session->userdata('status')=="administrator") {
			$data = array('message_id'	=> $message_id);
			$this->mContacts->deleteMessage($data);		
			$this->session->set_flashdata('sukses','Success');
			redirect(base_url('admin/contacts/inbox'));
		}else{
			redirect('login');
		}
	}	
}