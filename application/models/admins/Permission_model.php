<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Permission_model extends CI_Model {
    
        public function get_role()
        {
                $query = $this->db->get('roles');
                return $query->result();
        }
        
        public function get_permission()
        {
                         $this->db->order_by("group");
                         $this->db->order_by("order");
                $query = $this->db->get('permissions');
                return $query->result();
        }
        public function get_permissionJoinRole($roleid)
        {
            $sql="SELECT a.id,a.key,a.description,a.group,a.order,b.role_id FROM permissions a LEFT JOIN role_permissions b ON a.id=b.permission_id AND b.role_id=$roleid ORDER BY a.group,a.order";
            $query = $this->db->query($sql);
            return $query->result();
        }
        public function get_permission_by_role($roleid)
        {
                $this->db->where('role_id=',$roleid);
                $query = $this->db->get('role_permissions');
                return $query->result();
        }
        public function get_role_by_id($roleid)
        {
                $this->db->where('id=',$roleid);
                $query = $this->db->get('roles');
                return $query->row();
        }
        
        public function add_roles($roleid,$permission =array())
        {
            $sql="delete from role_permissions where role_id=$roleid";
            $query = $this->db->query($sql);
            foreach($permission as $dt){
                $sql="insert into role_permissions values(null,$roleid,$dt)";
                $query = $this->db->query($sql);
            }
           
        }
}
