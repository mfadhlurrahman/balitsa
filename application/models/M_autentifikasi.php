<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_autentifikasi extends CI_Model {

	public function proseslogin($data){
		$query = $this->db->get_where('t_login', $data);
		return $query;
	}

}
