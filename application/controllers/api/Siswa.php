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
	
// ===================================================================
	
	public function login_post()
	{
		$username = $this->post('username');
        $pass = $this->post('password');
		// $password = password_verify($pass, 'password');

        if (!empty($username) && !empty($pass)) {
            $user = $this->Model_Siswa->login($username, $pass);
            if ($user) {
                $this->response([
                    'status' => true,
                    'data' => $user
                ], REST_Controller::HTTP_OK);
            }
            else{
                $this->response([
                    'status' => false,
                    'message' => 'user not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        } 
        else {
            $this->response([
                'success' => false,
                'message' => 'provide a data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
	}

// ===================================================================
	
	public function materi_get()
	{
		// code...
		$kls = $this->get('id_kelas');
		$jrs = $this->get('id_jurusan');

		$siswa = $this->Model_Siswa->getMat($kls, $jrs);

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
                    'message' => 'materi not found!'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	
// ===================================================================

    public function bankSoal_get()
	{
		// code...
		$id = $this->get('id_soal');
		$kls = $this->get('id_kelas');
		$jrs = $this->get('id_jurusan');

		$soal = $this->Model_Siswa->getBankSoal($id, $kls, $jrs);

		if ($soal) {
			# code...
			$this->response([
                    'status' => true,
                    'message' => 'Success',
                    'data' => $soal
                ], REST_Controller::HTTP_OK);
		}
		else {
			$this->response([
                    'status' => false,
                    'message' => 'bank soal not found!'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}
	
	public function siswa_put($id)
	{
		# code...
// 		$id = $this->put('id_siswa');
		$data = [
		  //  'id_siswa' => $this->put('id_siswa'),
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

	public function update_put() {
        $id = $this->put('id_siswa');
        $data = array(
	 		        'username' => $this->put('username'),
	 		        'password' => $this->put('password'));
        $this->db->where('id_siswa', $id);
        $update = $this->db->update('siswa', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

// ===================================================================

    public function ujian_get()
    {
    	// code...
    	$kls = $this->get('id_kelas');
		$jrs = $this->get('id_jurusan');

		$siswa = $this->Model_Siswa->getUjian($kls, $jrs);

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
                    'message' => 'ujian not found!'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
    }

    public function soalujian_get()
    {
    	// code...
    	$id = $this->get('id_ujian');

		$siswa = $this->Model_Siswa->getSoalUjian($id);

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
                    'message' => 'ujian not found!'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
    }

}