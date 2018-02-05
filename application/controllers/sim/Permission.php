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
        $this->load->model('Permission_model');
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }
    }

    function index() {
        if (!$this->acl->has_permission('user-permission')) {
            redirect('/auth/noaccess/');
        } else {
            $data['user_id'] = $this->tank_auth->get_user_id();
            $data['username'] = $this->tank_auth->get_username();
            $data['dataRole'] = $this->Permission_model->get_role();
            $data['main'] = 'permission/v_role';
            $this->load->view('welcome', $data);
        }
    }

    function editPermission($roleid) {
        if (!$this->acl->has_permission('user-editpermission')) {
            redirect('/auth/noaccess/');
        } else {
            $data['role_id'] = $roleid;
            $data['dataPermission'] = $this->Permission_model->get_permissionJoinRole($roleid);
            $data['roleName'] = $this->Permission_model->get_role_by_id($roleid)->name;
            $data['main'] = 'permission/v_rolePermission';
            $this->load->view('welcome', $data);
        }
    }

    function submitPermission() {
        if (!$this->acl->has_permission('user-editpermission')) {
            redirect('/auth/noaccess/');
        } else {
            $this->form_validation->set_rules('roles[]', 'roles', 'required');
            if ($this->form_validation->run()) {
                $roleid = $this->input->post('roleid');
                $roles = $this->input->post('roles');

                $this->Permission_model->add_roles($roleid, $roles);
                $this->session->set_userdata('okCekPermission', 'permission berhasil ditambahkan');
                redirect('/permission/editPermission/' . $roleid);
            } else {
                $this->session->set_userdata('errorCekPermission', 'harap ceklis permission');
                $roleid = $this->input->post('roleid');
                redirect('/permission/editPermission/' . $roleid);
            }
        }
    }

}
