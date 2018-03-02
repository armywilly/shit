<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Partnership_model extends CI_Model {

        public function __construct() {
            $this->load->database();
        }

        // Listing Kontrak
        public function listMPa() {
            $this->db->select('*');
            $this->db->from('m_pa'); 
            $this->db->join('m_client','m_client.id_master_client = m_pa.id_master_client');                      
            $this->db->order_by('id_pa','ASC');
            $query = $this->db->get();
            return $query->result_array();
        }

        // Create Kontrak Kerja Sama
        public function createMPa($data) {
            $this->db->insert('m_pa',$data);
        }

        //Create Code NRK UNIK Otomatis
        public function get_no_pa(){
            $this->db->select('Right(m_pa.no_pa,3) as unik ',false);
            $this->db->order_by('id_pa', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('m_pa');
            if($query->num_rows()<>0){
                $data = $query->row();
                $unik = intval($data->unik)+1;
            }else{
                $unik = "001";

            }
            $kodemax = sprintf("%04s", $unik);
            $kd  = "KK/MRP-PA/".$kodemax;
            return $kd;

        }


        // Detail Kontrak
        public function detailMPa($id_pa) {
            $this->db->select('*');
            $this->db->from('m_pa');
            $this->db->where('id_pa',$id_pa);
            $this->db->join('m_client','m_client.id_master_client = m_pa.id_master_client'); 
            $this->db->order_by('id_pa','DESC');
            $query = $this->db->get();
            return $query->row_array();
        } 

        // Edit Kontrak Kerja Sama
        public function editMPa($data) {
            $this->db->where('id_pa',$data['id_pa']);
            $this->db->update('m_pa',$data);
        }           

        // Delete Kontrak Kerja Sama
        public function deleteMPa($data) {
            $this->db->where('id_pa',$data['id_pa']);
            $this->db->delete('m_pa',$data);
        }                  

    }

