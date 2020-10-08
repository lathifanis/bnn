<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        // ambil data datbase berdasarkan session
        $query = "SELECT count(*) as jumlah from pendaftaran";
        $data['pasien'] = $this->db->query($query)->result_array();
        
        $query = "SELECT count(*) as jumlah from assesment";
        $data['assesment'] = $this->db->query($query)->result_array();
        
        $query = "SELECT count(*) as jumlah from assesment where tindak_lanjut='Konseling'";
        $data['konseling'] = $this->db->query($query)->result_array();
        
        $query = "SELECT count(*) as jumlah from assesment where status='selesai'";
        $data['selesai'] = $this->db->query($query)->result_array();

        $query = "SELECT count(*) as jumlah from assesment where status='belum'";
        $data['belum'] = $this->db->query($query)->result_array();

        $query = "SELECT count(*) as jumlah from surat_keterangan";
        $data['bebas'] = $this->db->query($query)->result_array();

        $query = "SELECT count(*) as jumlah from assesment where tindak_lanjut='Terapi'";
        $data['terapi'] = $this->db->query($query)->result_array();
        
        $query = "SELECT count(*) as jumlah from assesment where tindak_lanjut='Medis'";
        $data['medis'] = $this->db->query($query)->result_array();
        
        $query = "SELECT count(*) as jumlah from assesment where tindak_lanjut='Rawat Jalan'";
        $data['rawat'] = $this->db->query($query)->result_array();
        
        $query = "SELECT count(*) as jumlah from pegawai";
        $data['petugas'] = $this->db->query($query)->result_array();
        
        $query = "SELECT count(*) as jumlah from dokter";
        $data['dokter'] = $this->db->query($query)->result_array();
        
        $query = "SELECT count(*) as jumlah from perawat";
        $data['perawat'] = $this->db->query($query)->result_array();
        // $query = "SELECT count(*) as jumlah from perawat, pegawai, dokter";
        // $data['jumlah_pegawai'] = $this->db->query($query)->result_array();
        $data['pegawai1'] = $this->db->get('pegawai')->row_array();
        $data['pegawai'] = $this->db->get('pegawai')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
