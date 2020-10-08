<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perawat extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Perawat';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $data['perawat'] = $this->db->get('perawat')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('perawat/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $data = $this->db->get_where('perawat', ['id_perawat' => $id])->row_array();
        $this->db->delete('perawat', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data berhasil dihapus</div>');
        redirect('perawat');
    }

    public function tambah()
    {
        $data['title'] = 'perawat';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('perawat/index', $data);
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('nip', 'NIP', 'is_unique[perawat.id_perawat]', [
            'is_unique' => 'ID Sudah Digunakan'
        ]);

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="alert"  role="alert"> ID Sudah Digunakan</div>');
            redirect('perawat');
        }else{

        // $data = $this->input->post('perawat');
        $this->db->insert('perawat', [
            'nama_perawat' => $this->input->post('nama'),
            'id_perawat' => $this->input->post('nip'),
            'jk' => $this->input->post('jk'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat_perawat' => $this->input->post('alamat'),
        ]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>Data Perawat berhasil ditambahkan</div>');
        redirect('perawat');
    }
}

    public function ambildata()
    {
        echo json_encode($this->db->get_where('perawat', ['id_perawat' => $_POST['id']])->row_array());
    }

    public function ubah()
    {
        $data = [
            'nama_perawat' => $this->input->post('nama'),
            'id_perawat' => $this->input->post('nip'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat_perawat' => $this->input->post('alamat'),
            'jk' => $this->input->post('jk')
        ];
        $this->db->where('id_perawat', $this->input->post('nip'));
        $this->db->update('perawat', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>Data Perawat berhasil diubah</div>');
        redirect('perawat');
    }

    public function detail($id)
    {
        $data['title'] = 'perawat';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $data['perawat'] = $this->db->get_where('perawat', ['id_perawat' => $id])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('perawat/detail', $data);
        $this->load->view('templates/footer');
    }
}
