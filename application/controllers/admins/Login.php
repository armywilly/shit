<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	// Main Page Clients
	public function index() {

			$this->load->view('login/login1');	
	}
}