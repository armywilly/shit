<?php
	/*
    @Copyright Indra Rukmana
    @Class Name : Clients Model
	*/
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Master_kontrak_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Kontrak
        public function listMKontrak() {
            $this->db->select('*');
            $this->db->from('m_kontrak');
            $this->db->join('users','users.id = m_kontrak.id_user'); 
            $this->db->join('m_client','m_client.id_master_client = m_kontrak.id_master_client');
            $this->db->join('m_pa','m_pa.id_pa = m_kontrak.no_pa');                      
            $this->db->order_by('id_master_kk','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Kontrak Kerja Sama
        public function createMKontrak($data) {
            $this->db->join('m_client','m_client.id_master_client = m_kontrak.id_master_client');
            $this->db->join('m_pa','m_pa.id_pa = m_kontrak.no_pa');
            $this->db->insert('m_kontrak',$data);
        }

        //Create Code NRK UNIK Otomatis
        public function get_nr_k(){
            $this->db->select('Right(m_kontrak.nr_k,3) as unik ',false);
            $this->db->order_by('id_master_kk', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('m_kontrak');
            if($query->num_rows()<>0){
                $data = $query->row();
                $unik = intval($data->unik)+1;
            }else{
                $unik = "0001";

            }
            $kodemax = sprintf("%04s", $unik);
            $kd  = "KK".$kodemax;
            return $kd;

        }


        // Detail Kontrak
        public function detailMKontrak($id_master_kk) {
            $this->db->select('*');
            $this->db->from('m_kontrak');
            $this->db->where('id_master_kk',$id_master_kk);
            $this->db->join('m_client','m_client.id_master_client = m_kontrak.id_master_client'); 
            $this->db->join('m_pa','m_pa.id_pa = m_kontrak.no_pa');
            $this->db->order_by('id_master_kk','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Kontrak Kerja Sama
        public function editMKontrak($data) {
            $this->db->where('id_master_kk',$data['id_master_kk']);
            $this->db->update('m_kontrak',$data);
        }           

        // Delete Kontrak Kerja Sama
        public function deleteMKontrak($data) {
            $this->db->where('id_master_kk',$data['id_master_kk']);
            $this->db->delete('m_kontrak',$data);
        }                  

    }

