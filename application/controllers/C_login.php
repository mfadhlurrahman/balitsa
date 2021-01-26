<?php
	defined('BASEPATH') or die('not allowed direct access script');

	class C_login extends Ci_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('M_autentifikasi');
			$this->load->helper('url');
			$this->load->helper('form');
		}

    public function index()
  	{
  		$this->load->helper('url');
  		$this->load->view('v_login');
  	}

		public function login(){
			$data = array('username' => $this->input->post('username', TRUE),
						'password' => $this->input->post('password', TRUE),
						'otoritas' => $this->input->post('otorisasi', TRUE)
			);
			//$this->load->model('model_user'); // load model_user
			$hasil = $this->M_autentifikasi->proseslogin($data);
			if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['uid'] = $sess->uid;
				$sess_data['username'] = $sess->username;
				$sess_data['otoritas'] = $sess->otoritas;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('otoritas')=='admin') {
				redirect('search/tampil_admin');
				//redirect('admin/c_admin');
			}
			elseif ($this->session->userdata('otoritas')=='peneliti') {
				redirect('search/tampil_peneliti')	;
				//redirect('member/c_member');
			}
		}
		else {
			$this->session->set_flashdata('err','Gagal login: Cek username, password dan otoritas');
			redirect('');
			//echo "<script>alert('Gagal login: Cek username, password dan otoritas');history.go(-1);</script>";
			}
	 }
}

//
// public function index()
// {
// 	$this->load->helper('url');
// 	$this->load->view('v_login');
// }

// 	public function login()
// 	{
// 		$username = $this->input->post('username');
// 		$password = $this->input->post('password');
// 		$otoritas = $this->input->post('otorisasi');
// 		$cek = $this->M_permohonan->proseslogin($username,$password,$otoritas);
// 		$hasil=count($cek);
// 		if ($hasil>0) {
// 			if($otoritas == 'peneliti'){
// 					$select = $this->db->get_where('t_login',array('username'=>$username, 'password'=>$username,'otoritas'=>$otoritas))->row();
// 					$data = array('logged_in' =>true ,'loger'=> $username );
// 					$this->session->set_userdata($data);
//
// 					//$this->load->view('v_dPeneliti');
// 					redirect('search/tampil_peneliti')	;
//
//
// 		} else if($otoritas == 'admin'){
// 				$select = $this->db->get_where('t_login',array('username'=>$username, 'password'=>$username,'otoritas'=>$otoritas))->row();
// 						$data = array('logged_in' =>true ,'loger'=> $username );
// 				$this->session->set_userdata($data);
//
// 				//$this->load->view('v_dAdmin');
// 				redirect('search/tampil_admin');
//
// 	}
// 	// $this->form_validation->set_rules('username', 'Username', 'required');
// 	// $this->form_validation->set_rules('password', 'Password', 'required');
// 	// if ($this->form_validation->run() == FALSE)
// 	// {
// 	// 	redirect('c_permohonan/index')	;
// 	// }
// 	// else
// 	// {
// 	//
// 	// }
// 	}
//
// }

// public function login(){
// 	$data = array('username' => $this->input->post('username', TRUE),
// 				'password' => $this->input->post('password', TRUE),
// 				'otoritas' => $this->input->post('otorisasi', TRUE)
// 	);
// 	//$this->load->model('model_user'); // load model_user
// 	$hasil = $this->M_permohonan->proseslogin($data);
// 	if ($hasil->num_rows() == 1) {
// 	foreach ($hasil->result() as $sess) {
// 		$sess_data['logged_in'] = 'Sudah Loggin';
// 		$sess_data['uid'] = $sess->uid;
// 		$sess_data['username'] = $sess->username;
// 		$sess_data['otoritas'] = $sess->otoritas;
// 		$this->session->set_userdata($sess_data);
// 	}
// 	if ($this->session->userdata('otoritas')=='admin') {
// 		redirect('search/tampil_admin');
// 		//redirect('admin/c_admin');
// 	}
// 	elseif ($this->session->userdata('otoritas')=='peneliti') {
// 		redirect('search/tampil_peneliti')	;
// 		//redirect('member/c_member');
// 	}
// }
// else {
// 	echo "<script>alert('Gagal login: Cek username, password dan otoritas');history.go(-1);</script>";
// 	}
// }
