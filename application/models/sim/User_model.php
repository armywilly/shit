<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

        public function get_all()
        {
                $this->db->select('users.*,roles.name as name');
                $this->db->join('roles','roles.id=users.role_id','left');
                $query = $this->db->get('users');
                return $query->result();
        }
        
        public function get_permission()
        {
                         $this->db->order_by("group");
                         $this->db->order_by("order");
                $query = $this->db->get('permissions');
                return $query->result();
        }

        function createUser($data){
            $this->db->join('roles','roles.id=users.role_id','left');
            $this->db->insert('users',$data);
        }
        // Edit Jabatan
        public function editUser($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('users',$data);
        } 
        // Detail User
        public function detailUser($id_jabatan) {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('id',$id);
            $this->db->order_by('username','ASC');
            $query = $this->db->get();
            return $query->row_array();
        }
        // Delete User
        function deleteUser($data) {
            $this->db->where('id',$data['id']);
            $this->db->delete('users',$data);
        }

       function aktifkan_user($user_id)
	   {
		$this->db->where('id', $user_id);
		$this->db->update('users', array(
			'activated'		=> 1
		));
	   }
        function nonaktifkan_user($user_id)
	   {
		$this->db->where('id', $user_id);
		$this->db->update('users', array(
			'activated'		=> 0
		));
	   }

        function createRole($data){
            $this->db->join('roles','roles.id=users.role_id','left');
            $this->db->insert('roles',$data);
        }
}
