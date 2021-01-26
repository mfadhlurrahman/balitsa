<?php
	defined('BASEPATH') or die('not allowed direct access script');

	class Search extends Ci_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('M_permohonan');
			$this->load->helper('url');
			$this->load->helper('form');
		}

	public function tampil(){
		$nip_user = $this->session->userdata('username');
		$data['pegawai'] = $this->M_permohonan->dataPemohon($nip_user);
		$data['blok'] = $this->M_permohonan->dataLahan();
		$this->load->helper('url');
		$this->load->view('v_permohonan',$data);
	}

	public function tampil_peminjaman(){
		$nip_user = $this->session->userdata('username');
		$data['pegawai'] = $this->M_permohonan->dataPemohon($nip_user);
		$this->load->helper('url');
		$this->load->view('v_peminjaman_aula',$data);
	}

	public function tampil_htu(){
					$this->load->view('v_HowToUse');
		}

	public function tampil_permohonan(){
		$data['data']= $this->M_permohonan->data_permohonan()->result_array();
		$this->load->helper('url');
		$this->load->view('v_dataPermohonan',$data);
	}

	public function tampil_permohonan_permohonan_cetak(){
		$data['data']= $this->M_permohonan->data_permohonan()->result_array();
		$this->load->helper('url');
		$this->load->view('v_dataPermohonan_bytgl',$data);
	}

	public function cari(){
		$data['cariberdasarkan'] = $this->input->post('cariberdasarkan');
		$data['yangdicari'] = $this->input->post('yangdicari');
		
		$data['data'] = $this->M_permohonan->search($data['cariberdasarkan'],$data['yangdicari'])->result_array();

		$this->load->view('v_dataPermohonan',$data);
	}

	public function tampil_peneliti(){
		$this->load->view('v_dPeneliti');
	}

	public function tampil_admin(){
		$this->load->view('v_dAdmin');
	}

	public function data_permohonan_user(){
		$nip_user = $this->session->userdata('username');
		$data['laporan'] = $this->M_permohonan->data_permohonan_peneliti();
		$this->load->helper('url');
		//print_r($data);
		$this->load->view('v_data_permohonan_peneliti',$data);
	}

	public function data_peminjaman(){
		$data['peminjaman'] = $this->M_permohonan->data_peminjaman();
		$this->load->helper('url');
		//print_r($data);
		$this->load->view('v_data_peminjaman',$data);
	}

	public function data_peminjaman_admin(){
		$data['peminjaman'] = $this->M_permohonan->data_peminjaman();
		$this->load->helper('url');
		//print_r($data);
		$this->load->view('v_data_peminjaman_admin',$data);
	}

	public function tampil_pengguna(){
		$data['data']= $this->M_permohonan->getPengguna()->result_array();
		$this->load->helper('url');
		$this->load->view('v_dataPengguna',$data);
	}

	public function tampil_lahan(){
		$data['data']= $this->M_permohonan->getLahan()->result_array();
		$this->load->helper('url');
		$this->load->view('v_dataLahan',$data);
	}

	public function tampil_aula(){
		$data['data']= $this->M_permohonan->getAula()->result_array();
		$this->load->helper('url');
		$this->load->view('v_data_aula',$data);
	}

	public function tampil_data_peneliti(){
		$data['data']= $this->M_permohonan->getPeneliti()->result_array();
		$this->load->helper('url');
		$this->load->view('v_dataPeneliti',$data);
	}

	public function tambah_lahan(){
		$this->form_validation->set_rules('kode', 'Kode', 'required', array('required'=>'Kode Tidak Boleh Kosong'));
		$this->form_validation->set_rules('nama', 'Nama', 'required',array('required'=>'Nama Tidak Boleh Kosong'));
		$this->form_validation->set_rules('blok', 'blok', 'required', array('required'=>'Kode Tidak Boleh Kosong'));
		$this->form_validation->set_rules('no', 'no', 'required', array('required'=>'Nomor Tidak Boleh Kosong'));
		$this->form_validation->set_rules('panjang', 'panjang', 'required', array('required'=>'Panjang Tidak Boleh Kosong'));
		$this->form_validation->set_rules('lebar', 'lebar', 'required', array('required'=>'Lebar Tidak Boleh Kosong'));
		$this->form_validation->set_rules('luas', 'luas', 'required', array('required'=>'Luas Tidak Boleh Kosong'));
		$this->form_validation->set_rules('sebelum', 'sebelum', 'required', array('required'=>'Tanaman Sebelumnya Tidak Boleh Kosong'));
		if ($this->form_validation->run() == FALSE) {
			// redirect('/search/tampil_tambah_lahan');
			$this->load->view('v_tambah_lahan');
		} else {
		$this->M_permohonan->insert_lahan();
		redirect('/search/tampil_lahan');

		}
	}

	public function tambah_aula(){
		$this->form_validation->set_rules('kode', 'Kode', 'required', array('required'=>'Kode Tidak Boleh Kosong'));
		$this->form_validation->set_rules('nama', 'Nama', 'required',array('required'=>'Nama Tidak Boleh Kosong'));
		$this->form_validation->set_rules('tampung', 'tampung', 'required', array('required'=>'Daya Tampung Tidak Boleh Kosong'));
		$this->form_validation->set_rules('status', 'status', 'required', array('required'=>'Status Tidak Boleh Kosong'));
	
		if ($this->form_validation->run() == FALSE) {
			// redirect('/search/tampil_tambah_lahan');
			$this->load->view('v_tambah_aula');
		} else {
		$this->M_permohonan->insert_aula();
		redirect('/search/tampil_aula');

		}
	}

	public function tambah_user(){
		$this->form_validation->set_rules('nip', 'nip', 'required', array('required'=>'NIP Tidak Boleh Kosong'));
		$this->form_validation->set_rules('username', 'username', 'required', array('required'=>'Username Tidak Boleh Kosong'));
		$this->form_validation->set_rules('pass', 'pass', 'required', array('required'=>'Password Tidak Boleh Kosong'));
		if ($this->form_validation->run() == FALSE) {
			//redirect('/search/tampil_tambah_user');
			$this->load->view('v_tambah_user');
		} else {
		$this->M_permohonan->insert_user();
		redirect('/search/tampil_pengguna');

		}
	}

	public function tambah_peneliti(){
		$this->form_validation->set_rules('nip', 'nip', 'required', array('required'=>'NIP Tidak Boleh Kosong'));
		$this->form_validation->set_rules('nama', 'nama', 'required', array('required'=>'Nama Peneliti Tidak Boleh Kosong'));
		$this->form_validation->set_rules('terakhir', 'terakhir', 'required', array('required'=>'Pendidikan Terakhir Tidak Boleh Kosong'));
		$this->form_validation->set_rules('nama_sekolah', 'nama_sekolah', 'required', array('required'=>'Nama Sekolah/Universitas Tidak Boleh Kosong'));
		$this->form_validation->set_rules('tahun', 'tahun', 'required', array('required'=>'Tahun Lulus Tidak Boleh Kosong'));
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required', array('required'=>'Fakultas Tidak Boleh Kosong'));
		$this->form_validation->set_rules('jurusan', 'jurusan', 'required', array('required'=>'Jurusan Tidak Boleh Kosong'));
		if ($this->form_validation->run() == FALSE) {
			//redirect('/search/tampil_tambah_peneliti');
			$this->load->view('v_tambah_peneliti');
		} else {
		$this->M_permohonan->insert_peneliti();
		redirect('/search/tampil_data_peneliti');

		}
	}

	public function tampil_tambah_lahan(){
    $this->load->helper('url');
    $this->load->view('v_tambah_lahan');
  }

  public function tampil_tambah_aula(){
    $this->load->helper('url');
    $this->load->view('v_tambah_aula');
  }

  public function tampil_tambah_peneliti(){
    $this->load->helper('url');
    $this->load->view('v_tambah_peneliti');
  }

  public function tampil_tambah_user(){
    $this->load->helper('url');
    $this->load->view('v_tambah_user');
  }

  public function edit_lahan(){
		$kode = array(
			'kd_lahan' => $this->input->get('kode')
		);
		$data['lahan'] = $this->M_permohonan->get_edit_lahan($kode,'t_lahan')->result();
		$this->load->view('v_edit_lahan',$data);

	}

	public function edit_aula(){
		$kode = array(
			'kd_aula' => $this->input->get('kode')
		);
		$data['aula'] = $this->M_permohonan->get_edit_aula($kode,'t_aula')->result();
		$this->load->view('v_edit_aula',$data);

	}

	public function edit_peminjaman(){
		$kode = array(
			'no_peminjaman' => $this->input->get('kode')
		);
		$data['peminjaman'] = $this->M_permohonan->get_edit_peminjaman($kode,'t_peminjaman_aula')->result();
		$this->load->view('v_edit_peminjaman',$data);

	}

	public function edit_user(){
		$kode = array(
			'username' => $this->input->get('kode')
		);
		$data['user'] = $this->M_permohonan->get_edit_user($kode,'t_login')->result();
		//print_r($data);
		$this->load->view('v_edit_user',$data);


	}

	public function edit_peneliti(){
		$kode = array(
			'nip' => $this->input->get('kode')
		);
		$data['peneliti'] = $this->M_permohonan->get_edit_peneliti($kode,'t_peneliti')->result();
		//print_r($data);
		$this->load->view('v_edit_peneliti',$data);


	}

	public function edit_permohonan(){
		$id = array(
				'no_permohonan' => $this->input->get('id')
			);
			$data['detail'] = $this->M_permohonan->get_edit_permohonan($id,'t_permohonan')->result();
			$this->load->view('v_konfirmasi',$data);

	}

	public function update_permohonan(){
  	$no = $this->input->post('no');
  	$nip = $this->input->post('nip');
  	$nama = $this->input->post('nama');
  	$kelompok = $this->input->post('kelompok');
  	$penanggung = $this->input->post('penanggung');
  	$dana = $this->input->post('dana');
  	$judul = $this->input->post('judul');
  	$kode = $this->input->post('kode');
  	$waktu_mulai = $this->input->post('mulai');
  	$waktu_selesai = $this->input->post('akhir');
  	$komoditas = $this->input->post('komoditas');
  	//$kd_lahan = $this->input->post('kd_lahan');
  	$luas = $this->input->post('luas');
  	$tanaman = $this->input->post('tanaman');
  	$keterangan = $this->input->post('keterangan');
  	$obj = array(
			'no_permohonan'=> $no,
			'nip'=> $nip,
			'nm_peneliti'=> $nama,
			'klmpok_peneliti'=> $kelompok,
			'penanggung_jawab'=> $penanggung,
			'sumber_dana'=>$dana,
			'judul_kegiatan'=> $judul,
			'kd_kegiatan'=> $kode,
			'waktu_mulai'=>$waktu_mulai,
			'waktu_selesai'=>$waktu_selesai,
			'komoditas'=> $komoditas,
			//'kd_lahan'=>$kd_lahan,
			'luas_lahan'=>$luas,
			'tanaman_sebelumnya'=> $tanaman,
			'keterangan'=> $keterangan
			//'status'=

  		);

  	$this->M_permohonan->up_data_permohonan($no,$obj);
  	redirect('/search/tampil_permohonan');

  }

	public function update_lahan(){
  	$kode = $this->input->post('kode');
  	$nama = $this->input->post('nama');
  	$blok = $this->input->post('blok');
  	$nomor = $this->input->post('no');
  	$panjang = $this->input->post('panjang');
  	$lebar = $this->input->post('lebar');
  	$luas = $this->input->post('luas');
  	$status = $this->input->post('status');
  	$sebelum = $this->input->post('sebelum');
  	$obj = array(
  					'kd_lahan'=> $kode,
  					'nm_lahan'=> $nama,
  					'blok'=> $blok,
  					'nomor'=> $nomor,
  					'panjang'=> $panjang,
  					'lebar'=> $lebar,
  					'luas'=> $luas,
  					'status'=>$status,
  					'tanaman_sebelumnya'=> $sebelum
  		);
  	$this->M_permohonan->up_data_lahan($kode,$obj);
  	redirect('/search/tampil_lahan');

  }

  public function update_aula(){
  	$kode = $this->input->post('kode');
  	$nama = $this->input->post('nama');
  	$tampung = $this->input->post('tampung');
  	$status = $this->input->post('status');
  	$obj = array(
  					'kd_aula'=> $kode,
  					'nm_aula'=> $nama,
  					'daya_tampung'=> $tampung,
  					'status'=> $status
  		  		);
  	$this->M_permohonan->up_data_aula($kode,$obj);
  	redirect('/search/tampil_aula');

  }

  public function update_peminjaman(){
		$kode = $this->input->post('no');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$kegiatan = $this->input->post('kegiatan');
		$judul = $this->input->post('judul');
		$jumlah = $this->input->post('jumlah');
		$waktu = $this->input->post('waktu');
		$kode_aula = $this->input->post('kode_aula');
		$keterangan = $this->input->post('keterangan');
		$status = $this->input->post('status');
		$obj = array(
				'no_peminjaman'=> $kode,
				'nip'=> $nip,
				'penanggung_jawab'=> $nama,
				'kd_kegiatan'=> $kegiatan,
				'judul_kegiatan'=> $judul,
				'waktu_kegiatan'=>$waktu,
				'jumlah' => $jumlah,
				'kd_aula' => $kode_aula,
				'keterangan' => $keterangan,
				'status'=>$status
			);
	$this->M_permohonan->up_data_peminjaman($kode,$obj);
  	redirect('/search/data_peminjaman_admin');

	}

  public function update_user(){
  	$nip = $this->input->post('nip');
  	$username = $this->input->post('username');
  	$pass = $this->input->post('pass');
  	$otoritas = $this->input->post('otoritas');
  	$obj = array(
  					'nip'=> $nip,
  					'username'=> $username,
  					'password'=> $pass,
  					'otoritas'=> $otoritas
  		);
  	$this->M_permohonan->up_data_user($username,$obj);
  	redirect('/search/tampil_pengguna');
  }

  public function update_peneliti(){
  	$nip = $this->input->post('nip');
  	$nama = $this->input->post('nama');
  	$terakhir = $this->input->post('terakhir');
  	$nama_sekolah = $this->input->post('nama_sekolah');
  	$tahun = $this->input->post('tahun');
  	$fakultas = $this->input->post('fakultas');
  	$jurusan = $this->input->post('jurusan');
  	$obj = array(
  					'nip'=> $nip,
  					'nm_peneliti'=> $nama,
  					'pendidikan_akhir'=> $terakhir,
  					'nm_sekolah_universitas'=> $nama_sekolah,
  					'tahun_lulus'=> $tahun,
  					'fakultas'=> $fakultas,
  					'jurusan'=> $jurusan
  		);
  	$this->M_permohonan->up_data_peneliti($nip,$obj);
  	redirect('/search/tampil_data_peneliti');
  }

  // public function update_user(){
  // 	$nip = $this->input->post('nip');
  // 	$username = $this->input->post('username');
  // 	$pass = $this->input->post('pass');
  // 	$otoritas = $this->input->post('otoritas');
  // 	$obj = array(
  // 					'nip'=> $nip,
  // 					'username'=> $username,
  // 					'password'=> $pass,
  // 					'otoritas'=> $otoritas
  // 		);
  // 	$this->M_permohonan->up_data_user($kode,$obj);
  // 	redirect('/search/tampil_pengguna');

  // }

	public function hapus_lahan(){
		$kode = $this->input->get('kode');
		$this->M_permohonan->delete_lahan($kode);
		redirect('/search/tampil_lahan');
	}

	public function hapus_aula(){
		$kode = $this->input->get('kode');
		$this->M_permohonan->delete_aula($kode);
		redirect('/search/tampil_aula');
	}

	public function hapus_peminjaman(){
		$kode = $this->input->get('kode');
		$this->M_permohonan->delete_peminjaman($kode);
		redirect('/search/data_peminjaman_admin');
	}

	public function hapus_user(){
		$kode = $this->input->get('kode');
		$this->M_permohonan->delete_user($kode);
		redirect('/search/tampil_pengguna');
	}
	public function hapus_peneliti(){
		$kode = $this->input->get('kode');
		$this->M_permohonan->delete_peneliti($kode);
		redirect('/search/tampil_data_peneliti');
	}

	public function status () {
		$this->db->query("UPDATE t_permohonan SET status = 1");
		// 'select * from t_permohonan where no_permohonan = 1 
	}

}
