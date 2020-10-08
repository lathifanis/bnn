<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assesment extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Assesment';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $all = "SELECT a.*,b.nama FROM assesment a, pendaftaran b WHERE a.rekam_medis=b.rekam_medis";
        $data['assesment'] = $this->db->query($all)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('assesment/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Assesment';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // // ambil data datbase berdasarkan session

        $dokter = "SELECT $id, b.nama_dokter FROM assesment a, dokter b WHERE a.id_dokter = b.id_dokter AND a.id_assesment = $id";
        $data['dokter'] = $this->db->query($dokter)->row_array();

        $perawat = "SELECT  $id, b.nama_perawat FROM assesment a, perawat b WHERE a.id_perawat = b.id_perawat AND a.id_assesment = $id";
        $data['perawat'] = $this->db->query($perawat, ['id_perawat' => $id])->row_array();

        $all = "SELECT a.*,b.nama FROM assesment a, pendaftaran b WHERE a.id_assesment = $id AND a.rekam_medis=b.rekam_medis AND id_assesment=$id";
        $data['assesment'] = $this->db->query($all)->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('assesment/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Assesment';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $rekam_medis = "SELECT rekam_medis,nama FROM pendaftaran";
        $data['rekam_medis'] = $this->db->query($rekam_medis)->result_array();

        $dokter = "SELECT nama_dokter, id_dokter FROM dokter";
        $data['dokter'] = $this->db->query($dokter)->result_array();

        $perawat = "SELECT  nama_perawat, id_perawat FROM perawat";
        $data['perawat'] = $this->db->query($perawat)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('assesment/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data['title'] = 'Assesment';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $config = array();
        $config['upload_path'] =  "./assets/a/";
        $config['allowed_types'] = 'docx|doc|pdf';
        $this->load->library('upload', $config, 'berkas');
        $this->berkas->initialize($config);
        $berkas = '';

        if ($this->berkas->do_upload("berkas_pernyataan")) {
            $fileData = $this->berkas->data();
            $berkas = $fileData['file_name'];
        }

        $config1 = array();
        $config1['upload_path'] =  "./assets/b/";
        $config1['allowed_types'] = 'docx|doc|pdf';
        $this->load->library('upload', $config1, 'berkas');
        $this->berkas->initialize($config1);
        $berkas1 = '';

        if ($this->berkas->do_upload("berkas_asesmen")) {
            $fileData = $this->berkas->data();
            $berkas1 = $fileData['file_name'];
        }

        // $this->input->post('')
        $dataasses = [
            'rekam_medis' => $this->input->post('norm'),
            'tgl_kedatangan' => date('Y-m-d'),
            'kesimpulan' => $this->input->post('kesimpulan'),
            'tindak_lanjut' => $this->input->post('tindaklanjut'),
            'petugas' => $this->session->userdata('nip'),
            'id_dokter' => $this->input->post('dokter'),
            'id_perawat' => $this->input->post('perawat'),
            'surat_pernyataan' => $berkas,
            'file' => $berkas1,
            'status'=>"belum",
            'diagnosa' => $this->input->post('diagnosa'),
            'urin' => $this->input->post('urin')
        ];

        $this->db->insert('assesment', $dataasses);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data Assesment berhasil ditambahkan</div>');
        redirect('assesment');
    }

    public function ubah($id)
    {
        $data['title'] = 'Assesment';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $data['as'] = $this->db->get_where('assesment', ['id_assesment' => $id])->row_array();

        $query = "SELECT rekam_medis FROM pendaftaran";
        $data['rekam_medis'] = $this->db->query($query)->result_array();

        $dok = "SELECT id_dokter, nama_dokter FROM dokter";
        $data['dokter'] = $this->db->query($dok)->result_array();

        $per = "SELECT id_perawat, nama_perawat FROM perawat";
        $data['perawat'] = $this->db->query($per)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('assesment/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function status()
    {
        $data = [
            'status' => $this->input->post('status')
        ];

        $this->db->where('id_assesment', $this->input->post('idassesment'));
        $this->db->update('assesment', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>Data berhasil dirubah</div>');
        redirect('konseling');
    }

    public function simpanubah()
    {
        $data = [
            'rekam_medis' => $this->input->post('norm'),
            'id_dokter' => $this->input->post('dokter'),
            'id_perawat' => $this->input->post('perawat'),
            'kesimpulan' => $this->input->post('kesimpulan'),
            'tindak_lanjut' => $this->input->post('tindaklanjut')
        ];

        $this->db->where('rekam_medis', $this->input->post('norm'));
        $this->db->update('assesment', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>Data berhasil dirubah</div>');
        redirect('assesment');
    }

    public function hapus($id)
    {
        $data = $this->db->get_where('assesment', ['id_assesment' => $id])->row_array();
        $this->db->delete('assesment', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data Assesment berhasil dihapus</div>');
        redirect('assesment');
    }
}
