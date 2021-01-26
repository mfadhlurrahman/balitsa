<?php
Class Laporanpdf extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('M_permohonan');

    }
    
    function index(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(300,10,'BALAI PENELITIAN TANAMAN DAN SAYURAN',0,1,'C');
        //$pdf->SetFont('Arial','B',12);
        //$pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(23);
        $pdf->Cell(30,6,'No. Permohonan',1,0);
        $pdf->Cell(75,6,'Nama Peneliti',1,0);
        //$pdf->Cell(27,6,'NIP',1,0);
        //$pdf->Cell(32,6,'Kelompok Peneliti',1,0);
        //$pdf->Cell(25,6,'Penanggung Jawab Di Lapangan',1,0);
        //$pdf->Cell(25,6,'Sumber Dana',1,0);
        //$pdf->Cell(55,6,'Judul Kegiatan',1,0);
        //$pdf->Cell(25,6,'Kode Kegiatan',1,0);
        $pdf->Cell(25,6,'Waktu Mulai',1,0);
        $pdf->Cell(25,6,'Waktu Selesai',1,0);
        $pdf->Cell(25,6,'Komoditas',1,0);
        $pdf->Cell(25,6,'Blok',1,0);
        $pdf->Cell(25,6,'Nomor',1,1);
        //$pdf->Cell(25,6,'Luas Lahan',1,0);
        //$pdf->Cell(25,6,'Tanaman Sebelumnya',1,0);
        //$pdf->Cell(25,6,'Keterangan',1,1);

        $pdf->SetFont('Arial','',10);

        $mahasiswa = $this->db->get('t_permohonan')->result();
        foreach ($mahasiswa as $row){
            $pdf->Cell(23);
            $pdf->Cell(30,6,$row->no_permohonan,1,0);
            $pdf->Cell(75,6,$row->nm_peneliti,1,0);
            //$pdf->Cell(27,6,$row->nip,1,0);
            //$pdf->Cell(32,6,$row->klmpok_peneliti,1,0);
            //$pdf->Cell(25,6,$row->penanggung_jawab,1,0);
            //$pdf->Cell(25,6,$row->sumber_dana,1,0);
            //$pdf->Cell(55,6,$row->judul_kegiatan,1,0);
            //$pdf->Cell(25,6,$row->kd_kegiatan,1,0);
            $pdf->Cell(25,6,$row->waktu_mulai,1,0);
            $pdf->Cell(25,6,$row->waktu_selesai,1,0);
            $pdf->Cell(25,6,$row->komoditas,1,0);
            $pdf->Cell(25,6,$row->blok,1,0);
            $pdf->Cell(25,6,$row->no_lahan,1,1);
            //$pdf->Cell(25,6,$row->luas_lahan,1,0);
            //$pdf->Cell(25,6,$row->tanaman_sebelumnya,1,0);
            //$pdf->Cell(25,6,$row->keterangan,1,1); 
        }

        $pdf->Output();
    }
    public function cetak(){
        $data['cariberdasarkan'] = $this->input->post('cariberdasarkan');
        $data['yangdicari'] = $this->input->post('yangdicari');
        
        $data = $this->M_permohonan->search($data['cariberdasarkan'],$data['yangdicari'])->result();

        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(300,10,'BALAI PENELITIAN TANAMAN DAN SAYURAN',0,1,'C');
        //$pdf->SetFont('Arial','B',12);
        //$pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);

        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(23);
        $pdf->Cell(30,6,'No. Permohonan',1,0);
        $pdf->Cell(75,6,'Nama Peneliti',1,0);
        //$pdf->Cell(27,6,'NIP',1,0);
        //$pdf->Cell(32,6,'Kelompok Peneliti',1,0);
        //$pdf->Cell(25,6,'Penanggung Jawab Di Lapangan',1,0);
        //$pdf->Cell(25,6,'Sumber Dana',1,0);
        //$pdf->Cell(55,6,'Judul Kegiatan',1,0);
        //$pdf->Cell(25,6,'Kode Kegiatan',1,0);
        $pdf->Cell(25,6,'Waktu Mulai',1,0);
        $pdf->Cell(25,6,'Waktu Selesai',1,0);
        $pdf->Cell(25,6,'Komoditas',1,0);
        $pdf->Cell(25,6,'Blok',1,0);
        $pdf->Cell(25,6,'Nomor',1,1);
        //$pdf->Cell(25,6,'Luas Lahan',1,0);
        //$pdf->Cell(25,6,'Tanaman Sebelumnya',1,0);
        //$pdf->Cell(25,6,'Keterangan',1,1);

        $pdf->SetFont('Arial','',10);
        // $data['cariberdasarkan'] = $this->input->post('cariberdasarkan');
        // $data['yangdicari'] = $this->input->post('yangdicari');
        // echo $cariberdasarkan;
        // echo $yangdicari;
        // $data['data'] = $this->M_permohonan->search($data['cariberdasarkan'],$data['yangdicari'])->result_array();
        foreach ($data as $row){
            $pdf->Cell(23);
            $pdf->Cell(30,6,$row->no_permohonan,1,0);
            $pdf->Cell(75,6,$row->nm_peneliti,1,0);
            //$pdf->Cell(27,6,$row->nip,1,0);
            //$pdf->Cell(32,6,$row->klmpok_peneliti,1,0);
            //$pdf->Cell(25,6,$row->penanggung_jawab,1,0);
            //$pdf->Cell(25,6,$row->sumber_dana,1,0);
            //$pdf->Cell(55,6,$row->judul_kegiatan,1,0);
            //$pdf->Cell(25,6,$row->kd_kegiatan,1,0);
            $pdf->Cell(25,6,$row->waktu_mulai,1,0);
            $pdf->Cell(25,6,$row->waktu_selesai,1,0);
            $pdf->Cell(25,6,$row->komoditas,1,0);
            $pdf->Cell(25,6,$row->blok,1,0);
            $pdf->Cell(25,6,$row->no_lahan,1,1);
            //$pdf->Cell(25,6,$row->luas_lahan,1,0);
            //$pdf->Cell(25,6,$row->tanaman_sebelumnya,1,0);
            //$pdf->Cell(25,6,$row->keterangan,1,1); 
        }

       $pdf->Output();
    }
}