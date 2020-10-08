<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bebas extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Surat Keterangan Bebas Narkoba';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // $query = "SELECT a.*, b.nik,b.nama from assesment a, pendaftaran b where a.rekam_medis=b.rekam_medis AND tindak_lanjut='Konseling'";
        // $data['konseling'] = $this->db->query($query)->result_array();
        // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $query = "SELECT a.*, b.nik,b.nama from assesment a, pendaftaran b where a.rekam_medis=b.rekam_medis AND a.status='selesai'";
        $data['ass'] = $this->db->query($query)->result_array();
        $query = "SELECT a.no_surat, a.tgl_surat, b.rekam_medis,b.nama FROM surat_keterangan a, pendaftaran b, assesment c where a.id_assesment=c.id_assesment AND c.rekam_medis=b.rekam_medis";
        $data['surat'] = $this->db->query($query)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bebas/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Konseling';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $data['det_kon'] = $this->db->get_where('konseling', ['id_assesment' => $id])->result_array();
        $data['ass'] = $this->db->get_where('assesment', ['id_assesment' => $id])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('konseling/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form Konseling';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('konseling/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        // $kode1="000";
        $kode = 0;
        $tahun = date('Y');
        $query = "SELECT count(no_surat) as kode from surat_keterangan";
        $data = $this->db->query($query)->result_array();
        // print_r($data[0]['kode']);
        // die;      //cek dulu apakah ada sudah ada kode di tabel.    
        if ($data[0]['kode'] > 0) {
            //jika kode ternyata sudah ada.      
            $kode2 = $data[0]['kode'] + 1;
        } else {
            //jika kode belum ada      
            $kode2 = 1;
        }
        if ($kode2 < 10) {
            $kode4 = "0";
            $kode2 = $kode4 . $kode2;
        }
        if ($kode2 < 100) {
            $kode4 = "0";
            $kode2 = $kode4 . $kode2;
        }

        $data['title'] = 'Konseling';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['pimpinan'] = $this->db->get_where('pegawai', ['jabatan' => 'Pimpinan'])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('konseling/detail', $data);
        $this->load->view('templates/footer');

        $this->db->insert('surat_keterangan', [
            'no_surat' => 'S.KET/' . $kode2 . '/I/KA/RH.00/' . $tahun . '/BNNK-PKU',
            'id_assesment' => $this->input->post('id_assesment'),
            'tgl_surat' => date('Y-m-d'),
            'nip' => $data['pimpinan']['nip']
        ]);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>Konseling berhasil ditambahkan</div>');
        redirect('bebas');
    }

    public function cetak()
    {
        $id = $_GET['q'];
        $query = "SELECT a.no_surat,a.tgl_surat,b.rekam_medis,b.nama,b.tempat_lahir,b.tgl_lahir,b.jk,b.agama,b.alamat,c.tindak_lanjut,c.tgl_kedatangan FROM surat_keterangan a, pendaftaran b, assesment c WHERE a.id_assesment=c.id_assesment AND c.rekam_medis=b.rekam_medis AND c.status='selesai' AND a.no_surat='$id'";
        $data['surat'] = $this->db->query($query)->result_array();
        $query = "SELECT * FROM pegawai where jabatan='pimpinan'";
        $data['pimpinan'] = $this->db->query($query)->result_array();
        $mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
        $html = $this->load->view('bebas/cetak', $data, true, []);
        $mpdf->WriteHTML($html);
        $mpdf->Output($data['surat'][0]['rekam_medis'] . "." . pdf, "I");
    }
}
