<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konseling extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Konseling';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $query = "SELECT a.*, b.nik,b.nama from assesment a, pendaftaran b where a.rekam_medis=b.rekam_medis AND tindak_lanjut='Konseling'";
        $data['konseling'] = $this->db->query($query)->result_array();
        // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('konseling/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Konseling';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $query = "SELECT count(*) as jumlah from konseling where id_assesment=$id";
        $data['jumlah'] = $this->db->query($query)->result_array();
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

    public function ubah()
    {
        $data = [
            'catatan' => $this->input->post('catatan'),
            'terapi' => $this->input->post('terapi'),
            'id_dokter' => $this->session->userdata('nip')
        ];
        $this->db->where('id_konseling', $this->input->post('id_kons'));
        $this->db->update('konseling', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Konseling berhasil diubah</div>');
        redirect('konseling/detail/'.$this->input->post('idassesment'));
    }

    public function ambildata()
    {
        echo json_encode($this->db->get_where('konseling', ['id_konseling' => $_POST['id']])->row_array());
    }

    public function simpan()
    {
        $id = $this->input->post('idassesment');
        $data['title'] = 'Konseling';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        
        $this->load->view('konseling/detail', $data);
        $this->load->view('templates/footer');
        $this->form_validation->set_rules('id_konseling', 'ID', 'is_unique[konseling.id_konseling]', [
            'is_unique' => 'Data Konseling Sudah Ada'
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="alert"  role="alert"> Data Konseling Sudah Ada</div>');
            redirect('konseling/detail/'.$id);
        }else{
        // $data = $this->input->post('dokter');

            $this->db->insert('konseling', [
                'id_konseling' => $this->input->post('id_konseling'),
                'id_assesment' => $this->input->post('idassesment'),
                'tgl_konseling' => date('Y-m-d'),
                'catatan' => $this->input->post('catatan'),
                'terapi' => $this->input->post('terapi'),
                'id_dokter' => $this->session->userdata('nip')
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Konseling berhasil ditambahkan</div>');
            redirect('konseling/detail/' .$id);
        }
    }
    
    public function hapus($id)
    {
        $di = $_GET['di'];
        $data = $this->db->get_where('konseling', ['id_konseling' => $id])->row_array();
        $this->db->delete('konseling', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data berhasil dihapus</div>');
        redirect('konseling/detail/'.$di);
    }
}
