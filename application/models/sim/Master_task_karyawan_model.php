<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Master_task_karyawan_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Jabatan
        public function listTask() {
            $this->db->select('*');
            $this->db->from('s_task');
            $this->db->join('t_users','t_users.id_user = s_task.id_user','LEFT');                        
            $this->db->order_by('id_master_task','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Jabatan
        public function createTask($d) {
            $this->db->insert('s_task',$d);
        }

        // Detail Jabatan
        public function detailTask($id_master_task) {
            $this->db->select('*');
            $this->db->from('s_task');
            $this->db->where('id_master_task',$id_master_task);
            $this->db->order_by('id_master_task','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Jabatan
        public function editTask($d) {
            $this->db->where('id_master_task',$d['id_master_task']);
            $this->db->update('s_task',$d);
        }           

        // Delete Jabatan
        public function deleteTask($d) {
            $this->db->where('id_master_task',$d['id_master_task']);
            $this->db->delete('s_task',$d);
        }

        // End Jabatan
        public function endTask() {
            $this->db->select('*');
            $this->db->from('s_task');
            $this->db->order_by('id_master_task','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }                      

    }
