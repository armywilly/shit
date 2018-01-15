<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners_model extends CI_Model {
	
	public function __construct() {
		$this->load->database();
	}
	
	// Listing
	public function listPartners() {
		$this->db->select('*');
		$this->db->from('partners');
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Semua
	public function semua_staff($limit, $start) {
		$this->db->select('*');
		$this->db->from('partners');
		$this->db->where(array('status_staff'=>'Yes'));
		$this->db->limit($limit, $start);
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->result();
	}
	
	
	// Semua
	public function total_partners() {
		$this->db->select('*');
		$this->db->from('partners');
		$this->db->where(array('status_staff'=>'Ya'));
		$this->db->order_by('urutan','ASC');
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	// Listing Besar
	public function listing_besar() {
		$this->db->select('*');
		$this->db->from('partners');
		$this->db->where(array('status_staff'=>'Ya','ukuran' => 'Besar'));
		$this->db->order_by('id_staff','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Besar
	public function total_besar() {
		$this->db->select('*');
		$this->db->from('partners');
		$this->db->where(array('status_staff'=>'Ya','ukuran' => 'Besar'));
		$this->db->order_by('id_staff','DESC');
		$query = $this->db->get();
		return $query->num_rows();
	}
		
	// Detail
	public function detail($id_staff) {
		$this->db->select('*');
		$this->db->from('partners');
		$this->db->where('id_staff',$id_staff);
		$this->db->order_by('urutan','DESC');
		$query = $this->db->get();
		return $query->row();
	}
	
	
	// Tambah
	public function tambah($data) {
		$this->db->insert('partners',$data);
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id_staff',$data['id_staff']);
		$this->db->update('partners',$data);
	}
	
	// Check delete
	public function check($id_staff) {
		$query = $this->db->get_where('produk',array('id_staff' => $id_staff));
		return $query->num_rows();
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_staff',$data['id_staff']);
		$this->db->delete('partners',$data);
	}
}