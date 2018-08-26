<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permission extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('admins/Permission_model');
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }
    }

    Public function index() {
        if ($this->acl->has_permission('user-permission')) {
            $data = array(  'user_id'       => $this->tank_auth->get_user_id(),
                            'username'      => $this->tank_auth->get_username(),
                            'dataRole'      => $this->Permission_model->get_role(),
                            'isi'           => 'admins/permission/index');
            $this->load->view('admins/layout/wrapper',$data);
        }else{
            redirect('/auth/noaccess/');
        }
    }

    Public function edit($roleid) {
        if ($this->acl->has_permission('edit-permission')) {
            $data = array(  'role_id'       => $roleid,
                            'dataPermission'=> $this->Permission_model->get_permissionJoinRole($roleid),
                            'roleName'      => $this->Permission_model->get_role_by_id($roleid)->name,
                            'isi'           => 'admins/permission/edit');
            $this->load->view('admins/layout/wrapper',$data);
        }else{
            redirect('/auth/noaccess/');
        }
    }

    Public function submit($roleid,$roles) {
        if (!$this->acl->has_permission('edit-permission')) {

            $this->form_validation->set_rules('roles', 'roles', 'required');
            if ($this->form_validation->run()) {
                $roleid = $this->input->post('roleid');
                $roles = $this->input->post('roles');

                $this->Permission_model->add_roles($roleid, $roles);
                $this->session->set_userdata('okCekPermission', 'permission berhasil ditambahkan');
                redirect('/admins/permission/edit/' . $roleid);
            } else {
                $this->session->set_userdata('errorCekPermission', 'harap ceklis permission');
                $roleid = $this->input->post('roleid');
                redirect('/admins/permission/edit/' . $roleid);
            }
        } else{
            redirect('/auth/noaccess/');
        }
    }

}
