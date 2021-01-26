<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class C_logout extends CI_Controller{

		function __construct(){
			parent:: __construct();
			$this->load->model('M_autentifikasi');
		}

		public function logout()
		{
			$this->session->sess_destroy();
			redirect();
		}

	}
