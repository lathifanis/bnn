<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rawat extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Rawat Jalan';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $query = "SELECT a.*, b.nik,b.nama from assesment a, pendaftaran b where a.rekam_medis=b.rekam_medis AND tindak_lanjut='Rawat Jalan'";
        $data['rawat'] = $this->db->query($query)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rawat/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Rawat Jalan';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $query = "SELECT a.*,b.nama from rawat_jalan a, user b where b.nip = a.id_dokter";
        $data['raw_det'] = $this->db->query($query)->result_array();
        $data['ass'] = $this->db->get_where('assesment', ['id_assesment' => $id])->result_array();
        $query = "SELECT count(*) as jumlah from rawat_jalan where id_assesment=$id";
        $data['jumlah'] = $this->db->query($query)->result_array();
        $data['ass'] = $this->db->get_where('assesment', ['id_assesment' => $id])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rawat/detail', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Form Rawat Jalan';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rawat/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function ambildata()
    {
        echo json_encode($this->db->get_where('rawat_jalan', ['id_rawat' => $_POST['id']])->row_array());
    }

    public function ubah()
    {
        $data = [
            'catatan' => $this->input->post('catatan'),
            'tindakan' => $this->input->post('tindakan'),
            'lokasi' => $this->input->post('lokasi'),
            'id_dokter' => $this->session->userdata('nip')
        ];
        $this->db->where('id_rawat', $this->input->post('id_raw'));
        $this->db->update('rawat_jalan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Rawat Jalan berhasil diubah</div>');
        redirect('rawat/detail/'.$this->input->post('idassesment'));
    }

    public function simpan()
    {
        $id = $this->input->post('idassesment');
        $data['title'] = 'Rawat Jalan';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rawat/detail', $data);
        $this->load->view('templates/footer');

        $this->form_validation->set_rules('id_rawat', 'ID', 'is_unique[rawat_jalan.id_rawat]', [
            'is_unique' => 'Data Rawat Jalan Sudah Ada'
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="alert"  role="alert"> Data Rawat Jalan Sudah Ada</div>');
            redirect('rawat/detail/'.$id);
        }else{
        // $data = $this->input->post('dokter');
            $query = $this->db->insert('rawat_jalan', [
                'id_rawat' => $this->input->post('id_rawat'),
                'id_assesment' => $this->input->post('idassesment'),
                'tanggal' => date('Y-m-d'),
                'id_dokter' => $this->session->userdata('nip'),
                'catatan' => $this->input->post('catatan'),
                'tindakan' => $this->input->post('tindakan'),
                'lokasi' => $this->input->post('lokasi')
            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Rawat Jalan berhasil ditambahkan</div>');
            redirect('rawat/detail/' . $id);
        }
    }

    public function hapus($id)
    {
        $di = $_GET['di'];
        $data = $this->db->get_where('rawat_jalan', ['id_rawat' => $id])->row_array();
        $this->db->delete('rawat_jalan', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data berhasil dihapus</div>');
        redirect('rawat/detail/'.$di);
    }
}
