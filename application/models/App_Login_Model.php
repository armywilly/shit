<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_Login_Model extends CI_Model {

	/*
		***	Model : app_login_model.php
		***	by Gede Lumbung
		***	http://gedelumbung.com
	*/

	public function getLoginData($data)
	{
		$login['username'] = $data['username'];
		$login['password'] = md5($data['password']);
		$cek = $this->db->get_where('t_users', $login);
		if($cek->num_rows()>0)
		{
			foreach($cek->result() as $qad)
			{
				$sess_data['logged_in'] = 'yesGetMeLoginBaby';
				$sess_data['id_user'] = $qad->id_user;
				$sess_data['username'] = $qad->username;
				$sess_data['nama'] = $qad->full_name;
				$sess_data['status'] = $qad->status;
				$this->session->set_userdata($sess_data);
			}
			header('location:'.base_url().'');
		}
		else
		{
			$this->session->set_flashdata('result_login', "Maaf, kombinasi username dan password yang anda masukkan tidak valid dengan database kami.");
			header('location:'.base_url().'');
		}
	}
}

/* End of file app_login_model.php */
/* Location: ./application/models/app_login_model.php */