<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Master_task_karyawan_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Task
        public function listTask() {
            $this->db->select('*');
            $this->db->from('m_case');
            $this->db->join('t_users','t_users.id_user = m_case.id_user','LEFT');                        
            $this->db->order_by('id_master_task','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Task
        public function createTask($d) {
            $this->db->insert('m_case',$d);
        }

        // Detail Task
        public function detailTask($id_master_task) {
            $this->db->select('*');
            $this->db->from('m_case');
            $this->db->where('id_master_task',$id_master_task);
            $this->db->join('t_users','t_users.id_user = m_case.id_user'); 
            $this->db->order_by('id_master_task','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Task
        public function editTask($d) {
            $this->db->where('id_master_task',$d['id_master_task']);
            $this->db->update('m_case',$d);
        }           

        // Delete Task
        public function deleteTask($d) {
            $this->db->where('id_master_task',$d['id_master_task']);
            $this->db->delete('m_case',$d);
        }

        // End Task
        public function endTask() {
            $this->db->select('*');
            $this->db->from('m_case');
            $this->db->order_by('id_master_task','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }                      

    }
