<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $data['pasien'] = $this->db->get_where('pendaftaran', ['rekam_medis' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        // $data['title'] = 'Pendaftaran';
        // $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // if ($this->form_validation->run() == false) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/sidebar', $data);
        //     $this->load->view('templates/topbar', $data);
        //     $this->load->view('pendaftaran/tambah', $data);
        //     $this->load->view('templates/footer');
        // } else {
        // $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $config = array();
        $config['upload_path'] =  "./assets/pasien/";
        $config['allowed_types'] = 'docx|doc|pdf';
        $this->load->library('upload', $config, 'berkas');
        $this->berkas->initialize($config);
        $berkas = '';

        if ($this->berkas->do_upload("berkas_pasien")) {
            $fileData = $this->berkas->data();
            $berkas = $fileData['file_name'];
        }

        $config1 = array();
        $config1['upload_path'] =  "./assets/register";
        $config1['allowed_types'] = 'docx|doc|pdf';
        $this->load->library('upload', $config1, 'berkas');
        $this->berkas->initialize($config1);
        $berkas1 = '';

        if ($this->berkas->do_upload("berkas_register")) {
            $fileData = $this->berkas->data();
            $berkas1 = $fileData['file_name'];
        }

        $config2 = array();
        $config2['upload_path'] =  "./assets/identitas pasien";
        $config2['allowed_types'] = 'jpg|jpeg|png|pdf';
        $this->load->library('upload', $config2, 'berkas');
        $this->berkas->initialize($config2);
        $berkas2 = '';

        if ($this->berkas->do_upload("berkas_identitas")) {
            $fileData = $this->berkas->data();
            $berkas2 = $fileData['file_name'];
        }

        $config3 = array();
        $config3['upload_path'] =  "./assets/ktp keluarga";
        $config3['allowed_types'] = 'jpg|jpeg|png|pdf';
        $this->load->library('upload', $config1, 'berkas');
        $this->berkas->initialize($config3);
        $berkas3 = '';

        if ($this->berkas->do_upload("ktp_keluarga")) {
            $fileData = $this->berkas->data();
            $berkas3 = $fileData['file_name'];
        }

        $config4 = array();
        $config4['upload_path'] =  "./assets/kartu keluarga";
        $config4['allowed_types'] = 'jpg|jpeg|png|pdf';
        $this->load->library('upload', $config4, 'berkas');
        $this->berkas->initialize($config4);
        $berkas4 = '';

        if ($this->berkas->do_upload("kk_keluarga")) {
            $fileData = $this->berkas->data();
            $berkas4 = $fileData['file_name'];
        }
        $this->form_validation->set_rules('no_rm', 'Rekam Medis', 'is_unique[pendaftaran.rekam_medis]', [
            'is_unique' => 'Data Rekam Medis Sudah Ada'
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="alert"  role="alert"> No Rekam Medis Sudah Ada</div>');
            redirect('pendaftaran/tambah');
        }else{
            $this->db->insert('pendaftaran', [
                'rekam_medis' => $this->input->post('no_rm'),
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama'),
                'jk' => $this->input->post('jk'),
                'pendidikan' => $this->input->post('pendidikan'),
                'no_hp' => $this->input->post('no_hp'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'agama' => $this->input->post('agama'),
                'suku' => $this->input->post('suku'),
                'pernikahan' => $this->input->post('status_menikah'),
                'pekerjaan' => $this->input->post('pekerjaan'),
                'alamat' => $this->input->post('alamat'),
                'golongan_darah' => $this->input->post('goldarah'),
                'umur' => $this->input->post('usia'),
            // 'no_hp' => $this->input->post('jabatan'),
                'dikirim_oleh' => $this->input->post('dikirim'),
                'tempat_rehab' => $this->input->post('tempat_rehab'),
                'lama_rehab' => $this->input->post('lama_rehab'),
                'metode_rehab' => $this->input->post('metode'),
                'nama_keluarga' => $this->input->post('nama_keluarga'),
                'hubungan' => $this->input->post('hubungan'),
                'alamat_keluarga' => $this->input->post('alamat_keluarga'),
                'no_hp_keluarga' => $this->input->post('no_telp'),
                'kasus_polisi' => $this->input->post('kasus'),
                'petugas' => $this->session->userdata('nip'),
                'tgl_daftar' => date('Y-m-d'),
                'berkas_pasien' => $berkas,
                'berkas_pendaftaran' => $berkas1,
                'berkas_identitas' => $berkas2,
                'ktp_keluarga' => $berkas3,
                'kk_keluarga' => $berkas4
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert" role="alert" id="alert">Data berhasil ditambahkan</div>');
            redirect('pendaftaran');
        }
        // }
    }

    public function ubah($id)
    {
        $data['title'] = 'Pendaftaran';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['pasien'] = $this->db->get_where('pendaftaran',  ['rekam_medis' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pendaftaran/ubah', $data);
        $this->load->view('templates/footer');
    }

    public function simpanubah()
    {
        // $data['title'] = 'Pendaftaran';
        // $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // if ($this->form_validation->run() == false) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/sidebar', $data);
        //     $this->load->view('templates/topbar', $data);
        //     $this->load->view('pendaftaran/tambah', $data);
        //     $this->load->view('templates/footer');
        // } else {
        // $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $config = array();
        $config['upload_path'] =  "./assets/pasien/";
        $config['allowed_types'] = 'docx|doc|pdf';
        $config['overwrite'] = true;
        $this->load->library('upload', $config, 'berkas');
        $this->berkas->initialize($config);
        $berkas = '';

        if ($this->berkas->do_upload("berkas_pasien")) {
            $fileData = $this->berkas->data();
            $berkas = $fileData['file_name'];
        }

        $config1 = array();
        $config1['upload_path'] =  "./assets/register";
        $config1['allowed_types'] = 'docx|doc|pdf';
        $config1['overwrite'] = true;
        $this->load->library('upload', $config1, 'berkas');
        $this->berkas->initialize($config1);
        $berkas1 = '';

        if ($this->berkas->do_upload("berkas_register")) {
            $fileData = $this->berkas->data();
            $berkas1 = $fileData['file_name'];
        }

        $config2 = array();
        $config2['upload_path'] =  "./assets/identitas pasien";
        $config2['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config2['overwrite'] = true;
        $this->load->library('upload', $config2, 'berkas');
        $this->berkas->initialize($config2);
        $berkas2 = '';

        if ($this->berkas->do_upload("berkas_identitas")) {
            $fileData = $this->berkas->data();
            $berkas2 = $fileData['file_name'];
        }

        $config3 = array();
        $config3['upload_path'] =  "./assets/ktp keluarga";
        $config3['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config3['overwrite'] = true;
        $this->load->library('upload', $config1, 'berkas');
        $this->berkas->initialize($config3);
        $berkas3 = '';

        if ($this->berkas->do_upload("ktp_keluarga")) {
            $fileData = $this->berkas->data();
            $berkas3 = $fileData['file_name'];
        }

        $config4 = array();
        $config4['upload_path'] =  "./assets/kartu keluarga";
        $config4['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config4['overwrite'] = true;
        $this->load->library('upload', $config4, 'berkas');
        $this->berkas->initialize($config4);
        $berkas4 = '';

        if ($this->berkas->do_upload("kk_keluarga")) {
            $fileData = $this->berkas->data();
            $berkas4 = $fileData['file_name'];
        }

        $data = [
            'rekam_medis' => $this->input->post('no_rm'),
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'pendidikan' => $this->input->post('pendidikan'),
            'no_hp' => $this->input->post('no_hp'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'agama' => $this->input->post('agama'),
            'suku' => $this->input->post('suku'),
            'pernikahan' => $this->input->post('status_menikah'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'alamat' => $this->input->post('alamat'),
            'golongan_darah' => $this->input->post('goldarah'),
            'umur' => $this->input->post('usia'),
            // 'no_hp' => $this->input->post('jabatan'),
            'dikirim_oleh' => $this->input->post('dikirim'),
            'tempat_rehab' => $this->input->post('tempat_rehab'),
            'lama_rehab' => $this->input->post('lama_rehab'),
            'metode_rehab' => $this->input->post('metode'),
            'nama_keluarga' => $this->input->post('nama_keluarga'),
            'hubungan' => $this->input->post('hubungan'),
            'alamat_keluarga' => $this->input->post('alamat_keluarga'),
            'no_hp_keluarga' => $this->input->post('no_telp'),
            'kasus_polisi' => $this->input->post('kasus'),
            'petugas' => $this->session->userdata('nip'),
            'tgl_daftar' => date('Y-m-d'),
            'berkas_pasien' => $berkas,
            'berkas_pendaftaran' => $berkas1,
            'berkas_identitas' => $berkas2,
            'ktp_keluarga' => $berkas3,
            'kk_keluarga' => $berkas4
        ];
        $this->db->where('rekam_medis', $this->input->post('no_rm'));
        $this->db->update('pendaftaran', $data);
        // 'petugas' => $this->input->post('jabatan'),
        // 'tgl_daftar' => $this->input->post('jabatan'),
        // 'file' => $this->input->post('jabatan')

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data berhasil dirubah</div>');
        redirect('pendaftaran');
        // }
    }

    public function hapus($id)
    {
        $data = $this->db->get_where('pendaftaran', ['rekam_medis' => $id])->row_array();
        $this->db->delete('pendaftaran', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data berhasil dihapus</div>');
        redirect('pendaftaran');
    }
}
