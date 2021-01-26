<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_permohonan extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_permohonan');
	}

	public function masuk(){
		$nip_user = $this->session->userdata('username');
		$data['pegawai'] = $this->M_permohonan->dataPemohon($nip_user);
		$data['blok'] = $this->M_permohonan->dataLahan();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kelompok', 'kelompok', 'required',
            array('required'=>' Kelompok Tidak Boleh Kosong'));
   		$this->form_validation->set_rules('penanggung', 'penanggung', 'required',
            array('required'=>' Penanggung Jawab Tidak Boleh Kosong'));

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('v_permohonan',$data);
                }
                else
                {
                        $this->M_permohonan->insert_permohonan();
						$this->load->view('v_dPeneliti');
                }
	}

	public function masuk_peminjaman(){
		$nip_user = $this->session->userdata('username');
		$data['pegawai'] = $this->M_permohonan->dataPemohon($nip_user);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kegiatan', 'kegiatan', 'required',
            array('required'=>'  Kode Kegiatan Tidak Boleh Kosong'));
   		$this->form_validation->set_rules('judul', 'judul', 'required',
            array('required'=>' Judul Kegiatan Jawab Tidak Boleh Kosong'));

		if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('v_peminjaman_aula',$data);
                }
                else
                {
                        $this->M_permohonan->insert_peminjaman();
						$this->load->view('v_dPeneliti');
                }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}


	public function tampil_konfirmasi()
	{
		$id = array(
				'no_permohonan' => $this->input->get('id')
			);
			$data['detail'] = $this->M_permohonan->data_konfirmasi($id,'t_permohonan')->result();
			$this->load->view('v_konfirmasi',$data);
	}

	public function tampil_detail()
	{
			$id = array(
				'no_permohonan' => $this->input->get('id')
			);
			$data['detail'] = $this->M_permohonan->data_konfirmasi($id,'t_permohonan')->result();
			$this->load->view('v_dataPermohonan',$data);
	}

	public function get_detail($id)
    {
        $data = $this->M_permohonan->get_data_permohonan($id);
        echo json_encode($data);
    }
    public function hapus_permohonan(){
		$id = $this->input->get('id');
		$this->M_permohonan->delete_permohonan($id);
		redirect('/search/tampil_permohonan');
	}

}
