<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Master_jabatan_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Jabatan
        public function listJabatan() {
            $this->db->select('*');
            $this->db->from('s_jabatan');
            $this->db->join('t_users','t_users.id_user = s_jabatan.id_user','LEFT');                        
            $this->db->order_by('id_jabatan','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Jabatan
        public function createJabatan($d) {
            $this->db->insert('s_jabatan',$d);
        }

        // Detail Jabatan
        public function detailJabatan($id_jabatan) {
            $this->db->select('*');
            $this->db->from('s_jabatan');
            $this->db->where('id_jabatan',$id_jabatan);
            $this->db->order_by('id_jabatan','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Jabatan
        public function editJabatan($d) {
            $this->db->where('id_jabatan',$d['id_jabatan']);
            $this->db->update('s_jabatan',$d);
        }           

        // Delete Jabatan
        public function deleteJabatan($d) {
            $this->db->where('id_jabatan',$d['id_jabatan']);
            $this->db->delete('s_jabatan',$d);
        }

        // End Jabatan
        public function endJabatan() {
            $this->db->select('*');
            $this->db->from('s_jabatan');
            $this->db->order_by('id_jabatan','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }                      

    }
