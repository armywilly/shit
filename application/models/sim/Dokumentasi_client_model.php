<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Downloads Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dokumentasi_client_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Documentasi
        public function listDocs() {
            $this->db->select('*');
            $this->db->from('m_dokumentasi');
            $this->db->join('m_client','m_client.id_master_client = m_dokumentasi.id_master_client');
            $this->db->order_by('id_dok','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }       

        // Create Documentasi
        public function createDocs($data) {
            $this->db->insert('m_dokumentasi',$data);
        }

        // Detail Documentasi
        public function detailDocs($id_dok) {
            $this->db->select('*');
            $this->db->from('m_dokumentasi');
            $this->db->where('id_dok',$id_doks);
            $this->db->order_by('id_dok','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Documentasi
        public function editDocs($data) {
            $this->db->where('id_dok',$data['id_dok']);
            $this->db->join('m_client','m_client.id_master_client = m_dokumentasi.id_master_client');
            $this->db->update('m_dokumentasi',$data);
        }           

        // Delete Documentasi
        public function deleteDocs($data) {
            $this->db->where('id_dok',$data['id_dok']);
            $this->db->delete('m_dokumentasi',$data);
        }                 

    }
