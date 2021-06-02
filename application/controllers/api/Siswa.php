<?php
ob_start();
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Siswa extends REST_Controller {

	public function __construct()
	{
		# code...
		parent::__construct();
		$this->load->model('Model_Siswa');
	}

	public function index_get()
	{
		# code...
		$id = $this->get('id_siswa');

		if ($id === null) {
			# code...
			$siswa = $this->Model_Siswa->getSiswa();
		}
		else {
			$siswa = $this->Model_Siswa->getSiswa($id);
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

	public function index_put()
	{
		# code...
		$id = $this->put('id_siswa');
		$data = [
	 		'nis' => $this->put('nis'),
	 		'nama' => $this->put('nama'),
	 		'username' => $this->put('username'),
	 		'password' => $this->put('password')
	 	];

	 	if ($this->Model_Siswa->updateSiswa($data, $id) > 0) {
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
			$siswa = $this->Model_Siswa->getMateri();
		}
		else {
			$siswa = $this->Model_Siswa->getMateri($id);
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