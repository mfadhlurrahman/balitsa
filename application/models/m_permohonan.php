<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permohonan extends CI_Model {
	public function InsertData($tabelName,$data){
		$res = $this->db->insert($tabelName,$data);
		return $res;
	}

	public function dataPemohon($nip_user){

		 return $this->db->query("SELECT * FROM t_login tl INNER JOIN t_peneliti tp ON tp.nip = tl.nip WHERE tp.nip = '${nip_user}'")->result();
	}

	public function data_permohonan_peneliti(){
		 return $this->db->query("SELECT * FROM t_permohonan ")->result();
	}

	public function data_peminjaman(){
		 return $this->db->query("SELECT * FROM t_peminjaman_aula ")->result();
	}

	public function dataLahan(){
		return $this->db->query('SELECT * FROM t_blok')->result();
	}



	public function dataLuasLahan(){
		return $this->db->query('SELECT * FROM t_lahan')->result();
	}

	public function insert_permohonan(){
		$no = $this->input->post('no');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$kelompok = $this->input->post('kelompok');
		$penanggung = $this->input->post('penanggung');
		$sumber = $this->input->post('sumber');
		$judul = $this->input->post('judul');
		$kode = $this->input->post('kode');
		$mulai = $this->input->post('mulai');
		$akhir = $this->input->post('akhir');
		$komoditas = $this->input->post('komoditas');
		$kode_lahan = $this->input->post('kode_lahan');
		$luas = $this->input->post('luas');
		$blok = $this->input->post('blok');
		$no_lahan = $this->input->post('no_lahan');
		$tanaman = $this->input->post('tanaman');
		$object = array(
				'no_permohonan'=> $no,
				'nip'=> $nip,
				'nm_peneliti'=> $nama,
				'klmpok_peneliti'=> $kelompok,
				'penanggung_jawab'=> $penanggung,
				'sumber_dana'=>$sumber,
				'judul_kegiatan'=> $judul,
				'kd_kegiatan'=> $kode,
				'waktu_mulai'=>$mulai,
				'waktu_selesai'=>$akhir,
				'komoditas'=> $komoditas,
				'kd_lahan'=>$kode_lahan,
				'blok'=>$blok,
				'no_lahan'=>$no_lahan,
				'luas_lahan'=>$luas,
				'tanaman_sebelumnya'=> $tanaman,
				'keterangan'=> 'Belum Acc',
				'status'=>0
			);
		$object1 = array(
  					'status' => 1,
  					'tanaman_sebelumnya'=> $komoditas);
  		$this->db->where('kd_lahan',$kode_lahan);
		$this->db->update('t_lahan',$object1);
		return $this->db->insert('t_permohonan',$object);

	}

	public function insert_peminjaman(){
		$no = $this->input->post('no');
		$nip = $this->input->post('nip');
		$nama = $this->input->post('nama');
		$kegiatan = $this->input->post('kegiatan');
		$judul = $this->input->post('judul');
		$nm_aula = $this->input->post('nm_aula');
		$jumlah = $this->input->post('jumlah');
		$waktu = $this->input->post('waktu');
		$kode_aula = $this->input->post('kode_aula');
		$object = array(
				'no_peminjaman'=> $no,
				'nip'=> $nip,
				'penanggung_jawab'=> $nama,
				'kd_kegiatan'=> $kegiatan,
				'judul_kegiatan'=> $judul,
				'nm_aula' => $nm_aula,
				'waktu_kegiatan'=>$waktu,
				'jumlah' => $jumlah,
				'kd_aula' => $kode_aula,
				'keterangan' => 'Belum Acc',
				'status'=>0
			);
		$object1 = array(
  					'status' => 1);
  		$this->db->where('kd_aula',$kode_aula);
		$this->db->update('t_aula',$object1);
		return $this->db->insert('t_peminjaman_aula',$object);

	}

	public function data_permohonan(){
		return $this->db->get('t_permohonan');
	}

  public function data_konfirmasi($kode,$table) {
        return $this->db->get_where($table,$kode);
    }

  function get_data_permohonan($id){
		$hasil=$this->db->query("SELECT * FROM t_permohonan WHERE no_permohonan='$id'");
		return $hasil->result();
	}

	public function getPengguna(){
		return $this->db->get('t_login');
	}

	public function getLahan(){
		return $this->db->get('t_lahan');
	}

	public function getAula(){
		return $this->db->get('t_aula');
	}

	public function getPeneliti(){
		return $this->db->get('t_peneliti');
	}


	public function insert_lahan(){
  	$kode = $this->input->post('kode');
  	$nama = $this->input->post('nama');
  	$blok = $this->input->post('blok');
  	$nomor = $this->input->post('no');
  	$panjang = $this->input->post('panjang');
  	$lebar = $this->input->post('lebar');
  	$luas = $this->input->post('luas');
  	$sebelum = $this->input->post('sebelum');
  	$obj = array(
  					'kd_lahan'=> $kode,
  					'nm_lahan'=> $nama,
  					'blok'=> $blok,
  					'nomor'=> $nomor,
  					'panjang'=> $panjang,
  					'lebar'=> $lebar,
  					'luas'=> $luas,
  					'status'=>0,
  					'tanaman_sebelumnya'=> $sebelum
  		);
  	return $this->db->insert('t_lahan',$obj);

  }

  public function insert_aula(){
  	$kode = $this->input->post('kode');
  	$nama = $this->input->post('nama');
  	$tampung = $this->input->post('tampung');
  	$status = $this->input->post('status');
  	$obj = array(
  					'kd_aula'=> $kode,
  					'nm_aula'=> $nama,
  					'daya_tampung'=> $tampung,
  					'status'=>0
  		  		);
  	return $this->db->insert('t_aula',$obj);

  }

  public function insert_user(){
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
  	return $this->db->insert('t_login',$obj);

  }

  public function insert_peneliti(){
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

  	
  	return $this->db->insert('t_peneliti',$obj);

  }
  
   public function get_edit_lahan($kode,$table) {
        return $this->db->get_where($table,$kode);
    }

    public function get_edit_aula($kode,$table) {
        return $this->db->get_where($table,$kode);
    }

    public function get_edit_peminjaman($kode,$table) {
        return $this->db->get_where($table,$kode);
    }

    public function get_edit_user($kode,$table) {
        return $this->db->get_where($table,$kode);
    }

    public function get_edit_peneliti($kode,$table) {
        return $this->db->get_where($table,$kode);
    }
    public function get_edit_permohonan($kode,$table) {
				return $this->db->get_where($table,$kode);
		}

		public function up_data_permohonan($no,$object){
		$this->db->where('no_permohonan',$no);
		$this->db->update('t_permohonan',$object);
	}

    public function up_data_lahan($kode,$object){
		$this->db->where('kd_lahan',$kode);
		$this->db->update('t_lahan',$object);
	}

	public function up_data_aula($kode,$object){
		$this->db->where('kd_aula',$kode);
		$this->db->update('t_aula',$object);
	}

	public function up_data_peminjaman($kode,$object){
		$this->db->where('no_peminjaman',$kode);
		$this->db->update('t_peminjaman_aula',$object);
	}

	public function up_data_user($username,$object){
		$this->db->where('username',$username);
		$this->db->update('t_login',$object);
	}

	public function up_data_peneliti($nip,$object){
		$this->db->where('nip',$nip);
		$this->db->update('t_peneliti',$object);
	}
	
  public function delete_lahan($kode){
		$this->db->where('kd_lahan', $kode);
		$this->db->delete('t_lahan');
	}

	 public function delete_peminjaman($kode){
		$this->db->where('no_peminjaman', $kode);
		$this->db->delete('t_peminjaman_aula');
	}

	public function delete_aula($kode){
		$this->db->where('kd_aula', $kode);
		$this->db->delete('t_aula');
	}

	public function delete_user($kode){
		$this->db->where('username', $kode);
		$this->db->delete('t_login');
	}

	public function delete_peneliti($kode){
		$this->db->where('nip', $kode);
		$this->db->delete('t_peneliti');
	}

	public function delete_permohonan($id){
		$this->db->where('no_permohonan', $id);
		$this->db->delete('t_permohonan');
	}

	public function search($cariberdasarkan,$yangdicari){
		$this->db->from('t_permohonan');
		$this->db->like($cariberdasarkan,$yangdicari);
		return $this->db->get();
	}

}
