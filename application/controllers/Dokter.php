<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dokter';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $data['dokter'] = $this->db->get('dokter')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $data = $this->db->get_where('dokter', ['id_dokter' => $id])->row_array();
        $this->db->delete('dokter', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"  role="alert" id="alert">Data berhasil dihapus</div>');
        redirect('dokter');
    }

    public function tambah()
    {
        $data['title'] = 'Dokter';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/index', $data);
        $this->load->view('templates/footer');
        $this->form_validation->set_rules('nip', 'NIP', 'is_unique[dokter.id_dokter]', [
            'is_unique' => 'ID Sudah Digunakan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="alert"  role="alert"> ID Sudah Digunakan</div>');
            redirect('dokter');
        }else{
        $data2 = [
            'nama' => htmlspecialchars($this->input->post('nama'), true),
            'password' => password_hash($this->input->post('nip'), PASSWORD_DEFAULT),
            'role_id' => 3,
            'nip' => htmlspecialchars($this->input->post('nip'), true)
        ];

        $this->db->insert('user', $data2);

        // $data = $this->input->post('dokter');
        $this->db->insert('dokter', [
            'id_dokter' => $this->input->post('nip'),
            'nama_dokter' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat')
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" id="alert" role="alert"  role="alert">Dokter berhasil ditambahkan</div>');
        redirect('dokter');
    }
}
    public function ambildata()
    {
        echo json_encode($this->db->get_where('dokter', ['id_dokter' => $_POST['id']])->row_array());
    }

    public function ubah()
    {
        $data = [
            'id_dokter' => $this->input->post('nip'),
            'nama_dokter' => $this->input->post('nama'),
            'jk' => $this->input->post('jk'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat')
        ];
        $this->db->where('id_dokter', $this->input->post('nip'));
        $this->db->update('dokter', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data Dokter berhasil diubah</div>');
        redirect('dokter');
    }

    public function detail($id)
    {
        $data['title'] = 'Dokter';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $data['dokter'] = $this->db->get_where('dokter', ['id_dokter' => $id])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dokter/detail', $data);
        $this->load->view('templates/footer');
    }
}
