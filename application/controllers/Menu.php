<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        // ambil data datbase berdasarkan session
        $this->form_validation->set_rules('menu', 'Menu', 'required|is_unique[user_menu.menu]', [
            'required' => 'Nama menu belum diisi',
            'is_unique' => 'Nama menu sudah tersedia'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Added</div>');
            redirect('menu');
        }
    }

    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu` FROM `user_menu` JOIN `user_sub_menu` ON `user_menu`.`id` = `user_sub_menu`.`menu_id`";
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['submenu'] = $this->db->query($query)->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_sub_menu', [
                'menu_id' => $this->input->post('menu'),
                'title' => $this->input->post('title'),
                'icon' => $this->input->post('icon'),
                'url' => $this->input->post('url'),

            ]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu Added</div>');
            redirect('menu/submenu');
        }
    }

    public function hapus($id)
    {
        $data = $this->db->get_where('user_menu' . `menu`, ['id' => $id])->row_array();
        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil dihapus</div>');
        redirect('menu');
    }
}
