<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Data_task_lawyer_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Jabatan
        public function listDatatask() {
            $this->db->select('*');
            $this->db->from('d_case');
            $this->db->join('m_case','m_case.id_master_task = d_case.id_master_task');
            $this->db->join('m_karyawan','m_karyawan.id_staff = d_case.id_staff');                       
            $this->db->order_by('id_task','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Jabatan
        public function createDatatask($d) {
            $this->db->insert('d_case',$d);
        }

        // Detail Jabatan
        public function detailDatatask($id_task) {
            $this->db->select('*');
            $this->db->from('d_case');
            $this->db->where('id_task',$id_task);
            $this->db->order_by('id_task','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Jabatan
        public function editDatatask($d) {
            $this->db->where('id_task',$d['id_task']);
            $this->db->join('m_case','m_case.id_master_task = d_case.id_master_task');
            $this->db->join('m_karyawan','m_karyawan.id_staff = d_case.id_staff');
            $this->db->update('d_case',$d);
        }           

        // Delete Jabatan
        public function deleteDatatask($d) {
            $this->db->where('id_task',$d['id_task']);
            $this->db->delete('d_case',$d);
        }                    

    }
