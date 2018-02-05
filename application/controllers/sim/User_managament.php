<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_managament extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->model('sim/User_model');
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        }
    }

    public function index() {
        if ($this->tank_auth->is_logged_in()) { 

            $um     = $this->mMuser->get_all();
            
            $data = array(  'judul_lengkap' => $this->config->item('nama_aplikasi_full'),
                            'judul_pendek'  => $this->config->item('nama_aplikasi_pendek'),
                            'instansi'      => $this->config->item('nama_instansi'),
                            'credit'        => $this->config->item('credit_aplikasi'),
                            'um'            => $um,
                            'isi'           => 'sim/user-managament/list');
            $this->load->view('sim/layout/wrapper',$data);
        }else{
            redirect('auth/login');
        }
    }

    // Tambah
    public function create() {
        if ($this->tank_auth->is_logged_in()) { 

            // Validasi
            $v = $this->form_validation;//Set V as variable of form_validation
            $v->set_rules('username','Username','required');
            $v->set_rules('password','Password','required');
            $v->set_rules('email','Email','required');
                if($v->run()) { //Eksekusi setelah validasi run, maka
                    
                
                    $data = array(  'judul_lengkap' => $this->config->item('nama_aplikasi_full'),
                                    'judul_pendek'  => $this->config->item('nama_aplikasi_pendek'),
                                    'instansi'      => $this->config->item('nama_instansi'),
                                    'credit'        => $this->config->item('credit_aplikasi'),
                                    'isi'           => 'sim/user-managament/create');
                    $this->load->view('sim/layout/wrapper', $data);
                    // Masuk database

                    //Data input Begin  
                    $i = $this->input;
                    $data = array(  'username'      => $i->post('username'),
                                    'password'      => $i->post('password'),
                                    'email'         => $i->post('email'),
                                    'role_id'       => $i->post('role_id'),
                                    );
                    $this->mMuser->createUser($data);
                    $this->session->set_flashdata('success','User added successfully');
                    redirect(base_url('sim/user_managament'));
                }
                // End masuk database
                $data = array(  'judul_lengkap' => $this->config->item('nama_aplikasi_full'),
                                'judul_pendek'  => $this->config->item('nama_aplikasi_pendek'),
                                'instansi'      => $this->config->item('nama_instansi'),
                                'credit'        => $this->config->item('credit_aplikasi'),
                                'isi'           => 'sim/user-managament/create');
                $this->load->view('sim/layout/wrapper', $data);
                var_dump($data);
        }else{
            redirect('auth/login');
        }
    }

    function aktifasi($userid) {
        if (!$this->acl->has_permission('user-activate')) {
            redirect('/auth/noaccess/');
        } else {
            $this->User_model->aktifkan_user($userid);
            $this->session->set_userdata('okAktifkan', 'User berhasil diaktivasi');
            redirect('/User/');
        }
    }

    function deaktifasi($userid) {
        if (!$this->acl->has_permission('user-deactivate')) {
            redirect('/auth/noaccess/');
        } else {
            $this->User_model->nonaktifkan_user($userid);
            $this->session->set_userdata('okAktifkan', 'User berhasil dideaktivasi');
            redirect('/User/');
        }
    }

}
