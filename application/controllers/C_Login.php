<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('model_login');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['title'] = 'Login';

		$this->load->view('login', $data);
	}

	public function login_proses()
	{
		# code...
		$username = htmlspecialchars($this->input->post('username'));
		$pass = htmlspecialchars($this->input->post('password'));

		$password = password_verify($pass, 'password');

		$cek_login = $this->model_login->login($username, $password);

		if ($cek_login) {
			foreach ($cek_login as $row);
			$this->session->set_userdata('id_guru', $row->id_guru);
			$this->session->set_userdata('nama', $row->nama);
			$this->session->set_userdata('level', $row->level);

			if ($this->session->userdata('level') == "admin") {
				redirect('c_admin\index');
			} else if ($this->session->userdata('level') == "guru") {
				redirect('c_guru\index');
			}
		} else {
			$data['title'] = 'Login';
			$this->load->view('login', $data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		echo "<script>alert('Anda berhasil Logout');</script>";
		redirect('c_login/index', 'refresh');
	}
}
