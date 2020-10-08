<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->form_validation->set_rules('nip', 'Nip', 'required|trim', [
			'required' => 'NIP harus diisi'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
			'required' => 'Password harus diisi',
			'min_length' => 'Password terlalu pendek'
		]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/index');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$nip = $this->input->post('nip'); //inputan di halaman login
		$password = $this->input->post('password'); //inputan di halaman login

		$user = $this->db->get_where('user', ['nip' => $nip])->row_array(); // ambil data inputan login
		// jika user ada
		if ($user) {
			// cek password
			if (password_verify($password, $user['password'])) {
				$data = [
					'nip' => $user['nip'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data); //simpan data kedalam session
				if ($user['role_id'] == 1) {
					redirect('admin');
				}
				if ($user['role_id'] == 2) {
					redirect('admin');
				}
				if ($user['role_id'] == 3) {
					redirect('admin');
				}
				if ($user['role_id'] == 4) {
					redirect('admin');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIP belum ada</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
			'required' => 'Harus Diisi'
		]);
		$this->form_validation->set_rules('nip', 'Nip', 'required|trim|is_unique[user.nip]', [
			'is_unique' => 'NIP ini sudah ada',
			'required' => 'Harus Diisi'
		]);
		$this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[3]|matches[pass2]', [
			'min_length' => 'Password terlalu pendek',
			'matches' => 'Password harus sama',
			'required' => 'Harus Diisi'
		]);
		$this->form_validation->set_rules('pass2', 'Password', 'required|trim|matches[pass1]');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Buat Akun';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'nama' => htmlspecialchars($this->input->post('nama'), true),
				'password' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'nip' => htmlspecialchars($this->input->post('nip'), true)
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dibuat</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your already logged out!</div>');
		redirect('auth');
	}
}
