<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Contacts
	*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacts extends CI_Controller {

	// Load database
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Contacts_model');
	}
	
	// Inbox Contacts
	public function inbox() {

		$contacts = $this->mContacts->listContacts();
		
		$data = array(	'judul_lengkap'	=> $this->config->item('nama_aplikasi_full'),
						'judul_pendek'	=> $this->config->item('nama_aplikasi_pendek'),
						'instansi'		=> $this->config->item('nama_instansi'),
						'credit'		=> $this->config->item('credit_aplikasi'),
						'contacts'	=> $contacts,
						'isi'		=> 'admin/message/list');
		$this->load->view('admin/layout/wrapper',$data);
	}

	// Delete Message
	public function delete($message_id) {
		$data = array('message_id'	=> $message_id);
		$this->mContacts->deleteMessage($data);		
		$this->session->set_flashdata('sukses','Success');
		redirect(base_url('admin/contacts/inbox'));
	}	
}