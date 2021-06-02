<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Siswa extends REST_Controller {

	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('model_siswa');
	}

	public function index_get()
	{
		# code...
		$id = $this->get('id_siswa');

		if ($id === null) {
			# code...
			$siswa = $this->model_admin->getSiswa();
		}
		else {
			$siswa = $this->model_admin->getSiswa($id);
		}


		if ($siswa) {
			# code...
			$this->response([
                    'status' => true,
                    'message' => 'Success',
                    'data' => $siswa
                ], REST_Controller::HTTP_OK);
		}
		else {
			$this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function index_post()
	{
		# code...
		$data = [
	 		'nis' => $this->post('nis'),
	 		'nama' => $this->post('nama'),
	 		'kelas' => $this->post('kelas'),
	 		'jurusan' => $this->post('jurusan'),
	 		'username' => $this->post('nis'),
	 		'password' => $this->post('nis')
	 	];

	 	if ($this->model_admin->inputSiswa($data) > 0) {
	 		# code...
	 		$this->response([
                'status' => true,
                'message' => 'data inputed'
            ], REST_Controller::HTTP_CREATED);

			// echo "<script>alert('Anda berhasil menambahkan data guru');</script>";
			// redirect('C_admin/akun_guru', 'refresh');
		}
	 	else {
	 		$this->response([
                'status' => false,
                'message' => 'failed!'
            ], REST_Controller::HTTP_BAD_REQUEST);
	 	}
	}

	public function index_delete()
	{
		# code...
		$id = $this->delete('id_siswa');

		if ($id === null) {
			$this->response([
                    'status' => false,
                    'message' => 'provide an id!'
                ], REST_Controller::HTTP_BAD_REQUEST);
		}
		else {
			if ($this->model_admin->deleteSiswa($id) > 0) {
				$this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'data deleted'
                ], REST_Controller::HTTP_OK);
			}
			else {
				$this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

	public function index_put()
	{
		# code...
		$id = $this->put('id_siswa');
		$data = [
	 		'nis' => $this->put('nis'),
	 		'nama' => $this->put('nama'),
	 		'kelas' => $this->put('kelas'),
	 		'jurusan' => $this->put('jurusan'),
	 		'username' => $this->put('username'),
	 		'password' => $this->put('password')
	 	];

	 	if ($this->model_admin->updateSiswa($data, $id) > 0) {
	 		# code...
	 		$this->response([
                'status' => true,
                'message' => 'data updated'
            ], REST_Controller::HTTP_OK);
		}
	 	else {
	 		$this->response([
                'status' => false,
                'message' => 'failed!'
            ], REST_Controller::HTTP_BAD_REQUEST);
	 	}
	}

// ===================================================================

	public function materi_get()
	{
		# code...
		$id = $this->get('id_materi');

		if ($id === null) {
			# code...
			$siswa = $this->model_siswa->getMateri();
		}
		else {
			$siswa = $this->model_siswa->getMateri($id);
		}


		if ($siswa) {
			# code...
			$this->response([
                    'status' => true,
                    'message' => 'Success',
                    'data' => $siswa
                ], REST_Controller::HTTP_OK);
		}
		else {
			$this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}
}