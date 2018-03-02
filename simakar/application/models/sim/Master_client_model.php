<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Clients Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Master_client_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Clients
        public function listMClients() {
            $this->db->select('*');
            $this->db->from('m_client');
            $this->db->join('t_users','t_users.id_user = m_client.id_user','LEFT');                        
            $this->db->order_by('id_master_client','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Client
        public function createMClient($data) {
            $this->db->insert('m_client',$data);
        }

        //Create Code NRK UNIK Otomatis
        public function get_nrk(){
            $this->db->select('Right(m_client.nrk,3) as unik ',false);
            $this->db->order_by('id_master_client', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('m_client');
            if($query->num_rows()<>0){
                $data = $query->row();
                $unik = intval($data->unik)+1;
            }else{
                $unik = "0001";

            }
            $kodemax = sprintf("%04s", $unik);
            $kd  = "KN".$kodemax;
            return $kd;

        }


        // Detail Client
        public function detailMClient($id_master_client) {
            $this->db->select('*');
            $this->db->from('m_client');
            $this->db->where('id_master_client',$id_master_client);
            $this->db->order_by('id_master_client','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Client
        public function editMClient($data) {
            $this->db->where('id_master_client',$data['id_master_client']);
            unset($kd['nrk']);
            $this->db->update('m_client',$data);
        }           

        // Delete Client
        public function deleteMClient($data) {
            $this->db->where('id_master_client',$data['id_master_client']);
            $this->db->delete('m_client',$data);
        }

        // End Client
        public function endMClient() {
            $this->db->select('*');
            $this->db->from('m_client');
            $this->db->order_by('id_master_client','DESC');
            $query = $this->db->get();
            return $query->row_array();
        }                      

    }

