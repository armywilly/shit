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
        $this->load->helper(array('url','security','form'));
        $this->load->library('tank_auth');
        $this->load->model('tank_auth/users');
    }

    public function index() {
        if ($this->tank_auth->is_logged_in()) { 

            $um     = $this->mUsers->get_all_users();
            
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

    function add_user()
    {
        if ($this->tank_auth->is_logged_in()) {                             // logged in

            $use_username = $this->config->item('use_username', 'tank_auth');
            if ($use_username) {
                $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length['.$this->config->item('username_min_length', 'tank_auth').']|max_length['.$this->config->item('username_max_length', 'tank_auth').']|alpha_dash');
            }
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
            $this->form_validation->set_rules('role_id', 'Role', 'required');

            $data['errors'] = array();

            $email_activation = $this->config->item('email_activation', 'tank_auth');

            if ($this->form_validation->run()) {                                // validation ok
                if (!is_null($data = $this->tank_auth->create_user(
                        $use_username ? $this->form_validation->set_value('username') : '',
                        $this->form_validation->set_value('email'),
                        $this->form_validation->set_value('password'),
                        $email_activation,$this->form_validation->set_value('role_id')))) {     // success

                        $data['site_name'] = $this->config->item('website_name', 'tank_auth');
                        redirect(base_url('sim/user_managament'));

                    if ($email_activation) {                                    // send "activate" email
                        $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                        $this->_send_email('activate', $data['email'], $data);

                        unset($data['password']); // Clear password (just for any case)

                        $this->_show_message($this->lang->line('auth_message_registration_completed_1'));

                    } else {
                        if ($this->config->item('email_account_details', 'tank_auth')) {    // send "welcome" email

                            $this->_send_email('welcome', $data['email'], $data);
                        }
                        unset($data['password']); // Clear password (just for any case)

                        $this->_show_message($this->lang->line('auth_message_registration_completed_2').' '.anchor('auth/login/', 'Login'));
                    }
                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
                }
            }
            
                $this->load->model('sim/Permission_model');
                $data['use_username'] = $use_username;
                $data['dataRole'] = $this->Permission_model->get_role();
               // $data['captcha_registration'] = $captcha_registration;
                //$data['use_recaptcha'] = $use_recaptcha;
                $data['isi'] = 'sim/user-managament/create';
                $this->load->view('sim/layout/wrapper', $data);

        } else {
            redirect('auth/login');
            
        }
    }

    /**
     * Send activation email again, to the same or new email address
     *
     * @return void
     */
    public function send_again()
    {
        if ($this->tank_auth->is_logged_in()) {                      // not logged in or activated
            
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

            $data['errors'] = array();

            if ($this->form_validation->run()) {                                // validation ok
                if (!is_null($data = $this->tank_auth->change_email(
                        $this->form_validation->set_value('email')))) {         // success

                    $data['site_name']  = $this->config->item('website_name', 'tank_auth');
                    $data['activation_period'] = $this->config->item('email_activation_expire', 'tank_auth') / 3600;

                    $this->_send_email('activate', $data['email'], $data);

                    $this->_show_message(sprintf($this->lang->line('auth_message_activation_email_sent'), $data['email']));

                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/send_again_form', $data);          

        } else {
            redirect('auth/login');
            
        }
    }
        

    public function activate()
    {
        $user_id        = $this->uri->segment(3);
        $new_email_key  = $this->uri->segment(4);

        // Activate user
        if ($this->tank_auth->activate_user($user_id, $new_email_key)) {        // success
            $this->tank_auth->logout();
            $this->_show_message($this->lang->line('auth_message_activation_completed').' '.anchor('/auth/login/', 'Login'));

        } else {                                                                // fail
            $this->_show_message($this->lang->line('auth_message_activation_failed'));
        }
    }

    /**
     * Generate reset code (to change password) and send it to user
     *
     * @return void
     */
    public function forgot_password()
    {
        if ($this->tank_auth->is_logged_in()) {                                 // logged in

            $this->form_validation->set_rules('login', 'Email or login', 'trim|required|xss_clean');

            $data['errors'] = array();

            if ($this->form_validation->run()) {                                // validation ok
                if (!is_null($data = $this->tank_auth->forgot_password(
                        $this->form_validation->set_value('login')))) {

                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                    // Send email with password activation link
                    $this->_send_email('forgot_password', $data['email'], $data);

                    $this->_show_message($this->lang->line('auth_message_new_password_sent'));

                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/forgot_password_form', $data);

        } else {
            redirect('auth/login');
            
        }
    }

    /**
     * Replace user password (forgotten) with a new one (set by user).
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    public function reset_password()
    {
        $user_id        = $this->uri->segment(3);
        $new_pass_key   = $this->uri->segment(4);

        $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
        $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

        $data['errors'] = array();

        if ($this->form_validation->run()) {                                // validation ok
            if (!is_null($data = $this->tank_auth->reset_password(
                    $user_id, $new_pass_key,
                    $this->form_validation->set_value('new_password')))) {  // success

                $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                // Send email with new password
                $this->_send_email('reset_password', $data['email'], $data);

                $this->_show_message($this->lang->line('auth_message_new_password_activated').' '.anchor('/auth/login/', 'Login'));

            } else {                                                        // fail
                $this->_show_message($this->lang->line('auth_message_new_password_failed'));
            }
        } else {
            // Try to activate user by password key (if not activated yet)
            if ($this->config->item('email_activation', 'tank_auth')) {
                $this->tank_auth->activate_user($user_id, $new_pass_key, FALSE);
            }

            if (!$this->tank_auth->can_reset_password($user_id, $new_pass_key)) {
                $this->_show_message($this->lang->line('auth_message_new_password_failed'));
            }
        }
        $this->load->view('auth/reset_password_form', $data);
    }

    /**
     * Change user password
     *
     * @return void
     */
    public function change_password()
    {
        if ($this->tank_auth->is_logged_in()) {                           // not logged in or not activated

            $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('new_password', 'New Password', 'trim|required|xss_clean|min_length['.$this->config->item('password_min_length', 'tank_auth').']|max_length['.$this->config->item('password_max_length', 'tank_auth').']|alpha_dash');
            $this->form_validation->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean|matches[new_password]');

            $data['errors'] = array();

            if ($this->form_validation->run()) {                                // validation ok
                if ($this->tank_auth->change_password(
                        $this->form_validation->set_value('old_password'),
                        $this->form_validation->set_value('new_password'))) {   // success
                    $this->_show_message($this->lang->line('auth_message_password_changed'));

                } else {                                                        // fail
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/change_password_form', $data);

        } else {
            redirect('auth/login');
            
        }
    }

    /**
     * Change user email
     *
     * @return void
     */
    public function change_email()
    {
        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');

        } else {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');

            $data['errors'] = array();

            if ($this->form_validation->run()) {                                // validation ok
                if (!is_null($data = $this->tank_auth->set_new_email(
                        $this->form_validation->set_value('email'),
                        $this->form_validation->set_value('password')))) {          // success

                    $data['site_name'] = $this->config->item('website_name', 'tank_auth');

                    // Send email with new email address and its activation link
                    $this->_send_email('change_email', $data['new_email'], $data);

                    $this->_show_message(sprintf($this->lang->line('auth_message_new_email_sent'), $data['new_email']));

                } else {
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/change_email_form', $data);
        }
    }

    /**
     * Replace user email with a new one.
     * User is verified by user_id and authentication code in the URL.
     * Can be called by clicking on link in mail.
     *
     * @return void
     */
    public function reset_email()
    {
        $user_id        = $this->uri->segment(3);
        $new_email_key  = $this->uri->segment(4);

        // Reset email
        if ($this->tank_auth->activate_new_email($user_id, $new_email_key)) {   // success
            $this->tank_auth->logout();
            $this->_show_message($this->lang->line('auth_message_new_email_activated').' '.anchor('/auth/login/', 'Login'));

        } else {                                                                // fail
            $this->_show_message($this->lang->line('auth_message_new_email_failed'));
        }
    }

    /**
     * Delete user from the site (only when user is logged in)
     *
     * @return void
     */
    public function unregister()
    {
        if (!$this->tank_auth->is_logged_in()) {                                // not logged in or not activated
            redirect('/auth/login/');

        } else {
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

            $data['errors'] = array();

            if ($this->form_validation->run()) {                                // validation ok
                if ($this->tank_auth->delete_user(
                        $this->form_validation->set_value('password'))) {       // success
                    $this->_show_message($this->lang->line('auth_message_unregistered'));

                } else {                                                        // fail
                    $errors = $this->tank_auth->get_error_message();
                    foreach ($errors as $k => $v)   $data['errors'][$k] = $this->lang->line($v);
                }
            }
            $this->load->view('auth/unregister_form', $data);
        }
    }


    public function _show_message($message)
    {
        $this->session->set_flashdata('message', $message);
    }

  
    public function _send_email($type, $email, &$data)
    {
        $this->load->library('email');
        $this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
        $this->email->to($email);
        $this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
        $this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
        $this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
        $this->email->send();
    }


    // Delete User
    public function delete_user($user_id) {
        if ($this->tank_auth->is_logged_in()) { 
            $this->load->model('tank_auth/users');
            $this->users->delete_user($user_id);     
            $this->session->set_flashdata('sukses','Success');
            redirect(base_url('sim/user_managament'));
        }else{
            redirect('auth/login');
        }
    }       

    //Aktifasi User
    function aktifasi($user_id) {
        if (!$this->acl->has_permission('user-activate')) {
            redirect('/auth/noaccess/');
        } else {
            $this->User_model->aktifkan_user($userid);
            $this->session->set_userdata('okAktifkan', 'User berhasil diaktivasi');
            redirect('/User/');
        }
    }

    //Deaktifasi User
    function deaktifasi($user_id) {
        if (!$this->acl->has_permission('user-deactivate')) {
            redirect('/auth/noaccess/');
        } else {
            $this->User_model->nonaktifkan_user($userid);
            $this->session->set_userdata('okAktifkan', 'User berhasil dideaktivasi');
            redirect('/User/');
        }
    }


    // Tambah Role
    public function add_role() {
        
        if ($this->tank_auth->is_logged_in()) { 
            $v = $this->form_validation;
            $v->set_rules('name','Role Name','required');
        
                if($v->run()) {
                        
                    $data = array( 'judul_lengkap'     => $this->config->item('nama_aplikasi_full'),
                                    'judul_pendek'  => $this->config->item('nama_aplikasi_pendek'),
                                    'instansi'      => $this->config->item('nama_instansi'),
                                    'credit'        => $this->config->item('credit_aplikasi'),
                                    'isi'           => 'sim/user-managament/list');
                        $this->load->view('sim/layout/wrapper', $d);
                
                        $i = $this->input;
                        $data  = array( 'name'          => $i->post('name'),
                                        'description'   => $i->post('description'),            
                                     );

                        $this->mMuser->createRole($data);
                        $this->session->set_flashdata('sukses','Success');
                        redirect(base_url('sim/user_managament'));
                }
                // Default page
                $data = array(     'judul_lengkap'     => $this->config->item('nama_aplikasi_full'),
                                'judul_pendek'      => $this->config->item('nama_aplikasi_pendek'),
                                'instansi'          => $this->config->item('nama_instansi'),
                                'credit'            => $this->config->item('credit_aplikasi'),
                                'isi'               => 'sim/user-managament/list');
                $this->load->view('sim/layout/wrapper', $data);
        }else{
            redirect('auth/login');
        }
    }

}
