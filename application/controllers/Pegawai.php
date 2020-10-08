<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Pegawai';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $data['pegawai'] = $this->db->get('pegawai')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $data = $this->db->get_where('pegawai', ['nip' => $id])->row_array();
        $this->db->delete('pegawai', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data berhasil dihapus</div>');
        redirect('pegawai');
    }

    public function tambah()
    {
        $data['title'] = 'Pegawai';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');

        $role = '';
        if ($this->input->post('jabatan') == 'Pegawai') {
            $role = '2';
        } else {
            $role = '1';
        }

        $this->form_validation->set_rules('nip', 'NIP', 'is_unique[pegawai.nip]', [
            'is_unique' => 'NIP Sudah Digunakan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="alert"  role="alert"> NIP Sudah Digunakan</div>');
            redirect('pegawai');
        }else{
        $data2 = [
            'nama' => htmlspecialchars($this->input->post('nama'), true),
            'password' => password_hash($this->input->post('nip'), PASSWORD_DEFAULT),
            'role_id' => $role,
            'nip' => htmlspecialchars($this->input->post('nip'), true)
        ];

        $this->db->insert('user', $data2);

        $data = $this->input->post('pegawai');
        $this->db->insert('pegawai', [
            'nama_pegawai' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'jk' => $this->input->post('jk'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'jabatan' => $this->input->post('jabatan')
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Pegawai berhasil ditambahkan</div>');
        redirect('pegawai');
    }
}   

    public function ambildata()
    {
        echo json_encode($this->db->get_where('pegawai', ['nip' => $_POST['nip']])->row_array());
    }

    public function ubah()
    {
        $data = [
            'nama_pegawai' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'jabatan' => $this->input->post('jabatan'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'jk' => $this->input->post('jk')
        ];
        $this->db->where('nip', $this->input->post('nip'));
        $this->db->update('pegawai', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Pegawai berhasil diubah</div>');
        redirect('pegawai');
    }

    public function detail($id)
    {
        $data['title'] = 'Pegawai';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $data['pegawai'] = $this->db->get_where('pegawai', ['nip' => $id])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/detail', $data);
        $this->load->view('templates/footer');
    }
}
