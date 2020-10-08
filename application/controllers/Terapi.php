<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Terapi extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Group Teraphy';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $query = "SELECT a.*, b.nik,b.nama from assesment a, pendaftaran b where a.rekam_medis=b.rekam_medis AND tindak_lanjut='Terapi'";
        $data['terapi'] = $this->db->query($query)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('terapi/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Group Teraphy';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // // ambil data datbase berdasarkan session
        // $data['pendaftaran'] = $this->db->get('pendaftaran')->result_array();
        $query = "SELECT count(*) as jumlah from grup_terapi where id_assesment=$id";
        $data['jumlah'] = $this->db->query($query)->result_array();
        $data['det_ter'] = $this->db->get_where('grup_terapi', ['id_assesment' => $id])->result_array();
        $data['ass'] = $this->db->get_where('assesment', ['id_assesment' => $id])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('terapi/detail', $data);
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
        echo json_encode($this->db->get_where('grup_terapi', ['id_grup' => $_POST['id']])->row_array());
    }

    public function ubah()
    {
        $data = [
            'catatan' => $this->input->post('catatan'),
            'terapi' => $this->input->post('terapi'),
            'id_dokter' => $this->session->userdata('nip')
        ];
        $this->db->where('id_grup', $this->input->post('id_ter'));
        $this->db->update('grup_terapi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Grup Terapi berhasil diubah</div>');
        redirect('terapi/detail/'.$this->input->post('idassesment'));
    }

    public function simpan()
    {
        $id = $this->input->post('idassesment');
        $data['title'] = 'Group Teraphy';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('terapi/detail', $data);
        $this->load->view('templates/footer');
        $this->form_validation->set_rules('id_grup', 'ID', 'is_unique[grup_terapi.id_grup]', [
            'is_unique' => 'Data Grup Terapi Sudah Ada'
        ]);
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert" id="alert"  role="alert"> Data Grup Terapi Sudah Ada</div>');
            redirect('terapi/detail/'.$id);
        }else{
        // $data = $this->input->post('dokter');
            $this->db->insert('grup_terapi', [
                'id_grup' => $this->input->post('id_grup'),
                'id_assesment' => $this->input->post('idassesment'),
                'tanggal' => date('Y-m-d'),
                'catatan' => $this->input->post('catatan'),
                'terapi' => $this->input->post('terapi'),
                'id_dokter' => $this->session->userdata('nip')
            ]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>Konseling berhasil ditambahkan</div>');
            redirect('terapi/detail/' . $id);
        }
}
        public function hapus($id)
        {
            $di = $_GET['di'];
            $data = $this->db->get_where('grup_terapi', ['id_grup' => $id])->row_array();
            $this->db->delete('grup_terapi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"  role="alert" id="alert">Data berhasil dihapus</div>');
            redirect('terapi/detail/'.$di);
        }
    }
