<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medis extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Catatan Medis';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $query = "SELECT a.*, b.nik,b.nama from assesment a, pendaftaran b where a.rekam_medis=b.rekam_medis AND tindak_lanjut='Medis'";
        $data['medis'] = $this->db->query($query)->result_array();
        // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('medis/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Catatan Medis';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $query = "SELECT count(*) as jumlah from catatan_medis where id_medis=$id";
        $data['jumlah'] = $this->db->query($query)->result_array();
        // // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $data['det_med'] = $this->db->get_where('catatan_medis', ['id_assesment' => $id])->result_array();
        $data['ass'] = $this->db->get_where('assesment', ['id_assesment' => $id])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('medis/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form Medis';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('medis/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function ambildata()
    {
        echo json_encode($this->db->get_where('catatan_medis', ['id_medis' => $_POST['id']])->row_array());
    }

    public function ubah()
    {
        $data = [
            'anamnesa' => $this->input->post('anamnesa'),
            'pemeriksaan_fisik' => $this->input->post('fisik'),
            'terapi' => $this->input->post('terapi'),
            'id_dokter' => $this->session->userdata('nip')
        ];
        $this->db->where('id_medis', $this->input->post('id_med'));
        $this->db->update('catatan_medis', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Catatan Medis berhasil diubah</div>');
        redirect('medis/detail/'.$this->input->post('idassesment'));
    }


    public function simpan()
    {
        $id = $this->input->post('idassesment');
        $data['title'] = 'Catatan Medis';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('medis/detail', $data);
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('id_medis', 'ID', 'is_unique[catatan_medis.id_medis]', [
            'is_unique' => 'Data Catatan Medis Sudah Ada'
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="alert"  role="alert"> Data Catatan Medis Sudah Ada</div>');
            redirect('medis/detail/'.$id);
        }else{
        $query = $this->db->insert('catatan_medis', [
            'id_medis' => $this->input->post('id_medis'),
            'id_assesment' => $this->input->post('idassesment'),
            'tgl_medis' => date('Y-m-d'),
            'anamnesa' => $this->input->post('anamnesa'),
            'pemeriksaan_fisik' => $this->input->post('fisik'),
            'terapi' => $this->input->post('terapi'),
            'id_dokter' => $this->session->userdata('nip')
        ]);
        if ($query == error_reporting()) {
            echo "SALAH";
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Catatan Medis berhasil ditambahkan</div>');
        redirect('medis/detail/' . $id);
    }
        // $data = $this->input->post('dokter');

    }

     public function hapus($id)
    {
        $di = $_GET['di'];
        $data = $this->db->get_where('catatan_medis', ['id_medis' => $id])->row_array();
        $this->db->delete('catatan_medis', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data berhasil dihapus</div>');
        redirect('medis/detail/'.$di);
    }
}
