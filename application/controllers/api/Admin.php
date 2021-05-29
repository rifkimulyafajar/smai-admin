<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Admin extends REST_Controller
{
	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('model_admin');
	}

	public function guru_get()
	{
		# code...
		$id = $this->get('id_guru');

		if ($id === null) {
			# code...
			$guru = $this->model_admin->getGuru();
		}
		else {
			$guru = $this->model_admin->getGuru($id);
		}


		if ($guru) {
			# code...
			$this->response([
                    'status' => true,
                    'message' => 'Success',
                    'data' => $guru
                ], REST_Controller::HTTP_OK);
		}
		else {
			$this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function guru_delete()
	{
		# code...
		$id = $this->delete('id_guru');

		if ($id === null) {
			$this->response([
                    'status' => false,
                    'message' => 'provide an id!'
                ], REST_Controller::HTTP_BAD_REQUEST);
		}
		else {
			if ($this->model_admin->deleteGuru($id) > 0) {
				$this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'data deleted'
                ], REST_Controller::HTTP_OK);

    //             echo "<script>alert('Anda berhasil menghapus akun tersebut');</script>";
				// redirect('c_admin/akun_guru', 'refresh');
			}
			else {
				$this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

	public function guru_post()
	{
		# code...
		$data = [
	 		'nip' => $this->post('nip'),
	 		'nama' => $this->post('nama'),
	 		'mapel' => $this->post('mapel'),
	 		'username' => $this->post('nip'),
	 		'password' => $this->post('nip'),
	 		'level' => $this->post('level')
	 	];

	 	if ($this->model_admin->inputGuru($data) > 0) {
	 		# code...
	 		$this->response([
                'status' => true,
                'message' => 'data inputed'
            ], REST_Controller::HTTP_CREATED);

   //          echo "<script>alert('Anda berhasil menambahkan data guru');</script>";
			// redirect('C_admin/akun_guru', 'refresh');
		}
	 	else {
	 		$this->response([
                'status' => false,
                'message' => 'failed!'
            ], REST_Controller::HTTP_BAD_REQUEST);
	 	}
	}

	public function guru_put()
	{
		# code...
		$id = $this->put('id_guru');
		$data = [
	 		'nip' => $this->put('nip'),
	 		'nama' => $this->put('nama'),
	 		'mapel' => $this->put('mapel'),
	 		'username' => $this->put('username'),
	 		'password' => $this->put('password')
	 	];

	 	if ($this->model_admin->updateGuru($data, $id) > 0) {
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

// ===============================================================================

	public function siswa_get()
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

	public function siswa_post()
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

	public function siswa_delete()
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

	public function siswa_put()
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

// ===============================================================================

	public function materi_get()
	{
		# code...
		$id = $this->get('id_materi');

		if ($id === null) {
			# code...
			$materi = $this->model_admin->getMateri();
		}
		else {
			$materi = $this->model_admin->getMateri($id);
		}


		if ($materi) {
			# code...
			$this->response([
                    'status' => true,
                    'message' => 'Success',
                    'data' => $materi
                ], REST_Controller::HTTP_OK);
		}
		else {
			$this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}

	public function materi_post()
	{
		# code...
		$data = [
	 		'pengajar' => $this->post('nama_pengajar'),
	 		'mapel' => $this->post('nama_mapel'),
	 		'kelas' => $this->post('kelas'),
	 		'jurusan' => $this->post('jurusan'),
	 		'file1' => $this->post('file1'),
	 		'file2' => $this->post('file2'),
	 		'file3' => $this->post('file3')
	 	];

	 	if ($this->model_admin->inputMateri($data) > 0) {
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

	public function materi_delete()
	{
		# code...
		$id = $this->delete('id_materi');

		if ($id === null) {
			$this->response([
                    'status' => false,
                    'message' => 'provide an id!'
                ], REST_Controller::HTTP_BAD_REQUEST);
		}
		else {
			if ($this->model_admin->deleteMateri($id) > 0) {
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

	public function materi_put()
	{
		# code...
		$id = $this->put('id_materi');

		$data = [
	 		'pengajar' => $this->put('nama_pengajar'),
	 		'mapel' => $this->put('nama_mapel'),
	 		'kelas' => $this->put('kelas'),
	 		'jurusan' => $this->put('jurusan'),
	 		'file1' => $this->put('file1'),
	 		'file2' => $this->put('file2'),
	 		'file3' => $this->put('file3')
	 	];

	 	if ($this->model_admin->updateMateri($data, $id) > 0) {
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
}