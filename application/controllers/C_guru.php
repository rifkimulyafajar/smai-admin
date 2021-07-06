<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Guru extends CI_Controller {

	public function __construct()
	{
		# code...
		parent::__construct();

		$this->load->model('Model_Guru');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Guru - Dashboard';
			$data['materi'] = $this->Model_Guru->hitungMateri($_SESSION['id_guru']);
			$data['soal'] = $this->Model_Guru->hitungSoal($_SESSION['id_guru']);
			$data['ujian'] = $this->Model_Guru->hitungUjian($_SESSION['id_guru']);
			$data['hasil'] = $this->Model_Guru->hitungHasilUjian($_SESSION['id_guru']);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/index', $data);
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}



// ==========================================================================================================================



	public function soal_ujian()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Soal Ujian';
			$data['ujian'] = $this->Model_Guru->getUjianGuru($_SESSION['id_guru']);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/ujian', $data);
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function buat_ujian()
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Buat Ujian';
			$data['guru'] = $this->Model_Guru->getGuru($_SESSION['id_guru']);
			$data['kelas'] = $this->Model_Guru->getAllKelas();
			$data['jurusan'] = $this->Model_Guru->getAllJurusan();

			$this->form_validation->set_rules('judul', 'Judul Ujian', 'required');
			$this->form_validation->set_rules('durasi', 'Durasi', 'required');
			$this->form_validation->set_rules('waktu_mulai', 'Waktu', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_guru/header', $data);
				$this->load->view('v_guru/ujian_tambah', $data);
				$this->load->view('v_guru/footer');
			} else {
				$this->Model_Guru->tambahUjian();
				echo "<script>alert('Ujian Berhasil Dibuat');</script>";
				redirect('C_Guru/soal_ujian', 'refresh');
			}

		}
		else {
			redirect('C_Login/index');
		}
	}

	public function hapus_ujian($id)
	{
		// code...
		if (isset($_SESSION['id_guru'])) {

			if ($this->Model_Guru->hapusUjian($id)) {
				$this->session->set_flashdata('hapus_soal', true);
			} else {
				$this->session->set_flashdata('hapus_soal', false);
			}
			echo "<script>alert('Data Ujian Terhapus');</script>";
			redirect('C_Guru/soal_ujian', 'refresh');
		} else {
			redirect('C_Login/index');
		}
	}

	public function edit_ujian($id)
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Ujian';
			$data['ujian'] = $this->Model_Guru->getUjianById($id);
			$data['guru'] = $this->Model_Guru->getGuru($_SESSION['id_guru']);
			$data['kelas'] = $this->Model_Guru->getAllKelas();
			$data['jurusan'] = $this->Model_Guru->getAllJurusan();
			$data['hitung'] = $this->Model_Guru->hitungSoalUjian($id);

			$this->form_validation->set_rules('judul', 'Judul Ujian', 'required');
			$this->form_validation->set_rules('durasi', 'Durasi', 'required');
			$this->form_validation->set_rules('waktu_mulai', 'Waktu', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_guru/header', $data);
				$this->load->view('v_guru/ujian_edit' , $data);
				$this->load->view('v_guru/footer');
			} else {
				$this->Model_Guru->editUjian();
				echo "<script>alert('Soal Berhasil Diupdate');</script>";
				redirect('C_Guru/soal_ujian', 'refresh');
			}
		}
	}

	public function tambahSoalUjian($id, $guru, $kelas, $jurusan)
	{
		// code...
		$a = $this->input->post('kunci_a'); $b = $this->input->post('kunci_b'); $c = $this->input->post('kunci_c');
		$d = $this->input->post('kunci_d'); $e = $this->input->post('kunci_e');
		$ids = $this->id_soal = uniqid();
			
		if ($a == 'on' && $b == '' && $c == '' && $d == '' && $e == '') {
			if ($this->input->post('pilihan_a') != null) {
				$kunci = $this->input->post('pilihan_a');
				$this->form_validation->run() == TRUE;
				$this->Model_Guru->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} elseif ($this->Model_Guru->file_a($ids) != null) {
				$kunci = $this->Model_Guru->file_a($ids);
				$this->form_validation->run() == TRUE;
				$this->Model_Guru->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} else {
				$this->form_validation->set_rules('pilihan_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->set_rules('file_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->run() == FALSE;
			}
		} elseif ($a == '' && $b == 'on' && $c == '' && $d == '' && $e == '') {
			if ($this->input->post('pilihan_b') != null) {
				$kunci = $this->input->post('pilihan_b');
				$this->form_validation->run() == TRUE;
				$this->Model_Guru->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} elseif ($this->Model_Guru->file_b($ids) != null) {
				$kunci = $this->Model_Guru->file_b($ids);
				$this->form_validation->run() == TRUE;
				$this->Model_Guru->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} else {
				$this->form_validation->set_rules('pilihan_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->set_rules('file_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->run() == FALSE;
			}
		} elseif($a == '' && $b == '' && $c == 'on' && $d == '' && $e == '') {
			if ($this->input->post('pilihan_c') != null) {
				$kunci = $this->input->post('pilihan_c');
				$this->form_validation->run() == TRUE;
				$this->Model_Guru->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} elseif ($this->Model_Guru->file_c($ids) != null) {
				$kunci = $this->Model_Guru->file_c($ids);
				$this->form_validation->run() == TRUE;
				$this->Model_Guru->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} else {
				$this->form_validation->set_rules('pilihan_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->set_rules('file_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->run() == FALSE;
			}
		} elseif($a == '' && $b == '' && $c == '' && $d == 'on' && $e == '') {
			if ($this->input->post('pilihan_d') != null) {
				$kunci = $this->input->post('pilihan_d');
				$this->form_validation->run() == TRUE;
				$this->Model_Guru->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} elseif ($this->Model_Guru->file_d($ids) != null) {
				$kunci = $this->Model_Guru->file_d($ids);
				$this->form_validation->run() == TRUE;
				$this->Model_Guru->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} else {
				$this->form_validation->set_rules('pilihan_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->set_rules('file_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->run() == FALSE;
			}
		} elseif($a == '' && $b == '' && $c == '' && $d == '' && $e == 'on') {
			if ($this->input->post('pilihan_e') != null) {
				$kunci = $this->input->post('pilihan_e');
				$this->form_validation->run() == TRUE;
				$this->Model_Guru->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} elseif ($this->Model_Guru->file_e($ids) != null) {
				$kunci = $this->Model_Guru->file_e($ids);
				$this->form_validation->run() == TRUE;
				$this->Model_Guru->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} else {
				$this->form_validation->set_rules('pilihan_e', 'Jawaban E', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->set_rules('file_e', 'Jawaban E', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->run() == FALSE;
			}
		} else {
			$this->form_validation->set_rules('kunci_a', 'Kunci', 'required', 'min_length[5]',
				[
					'required' => 'Pilih salah satu!!',
					'min_length' => 'Pilih salah satu!!'
				]);
			$this->form_validation->set_rules('kunci_b', 'Kunci', 'required', 'min_length[5]',
				[
					'required' => 'Pilih salah satu!!',
					'min_length' => 'Pilih salah satu!!'
				]);
			$this->form_validation->set_rules('kunci_c', 'Kunci', 'required', 'min_length[5]',
				[
					'required' => 'Pilih salah satu!!',
					'min_length' => 'Pilih salah satu!!'
				]);
			$this->form_validation->set_rules('kunci_d', 'Kunci', 'required', 'min_length[5]',
				[
					'required' => 'Pilih salah satu!!',
					'min_length' => 'Pilih salah satu!!'
				]);
			$this->form_validation->set_rules('kunci_e', 'Kunci', 'required', 'min_length[5]',
				[
					'required' => 'Pilih salah satu!!',
					'min_length' => 'Pilih salah satu!!'
				]);
			$this->form_validation->run() == FALSE;
		}

		$this->Model_Guru->tambahSoalUjian($kunci);
		echo "<script>alert('Soal Berhasil Dibuat');</script>";
		redirect('C_Guru/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
	}

	public function pilih_soal_ujian($id, $guru, $kelas, $jurusan)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Pilih Soal Ujian';
			$data['soal_u'] = $this->Model_Guru->getSoalUjian($guru, $kelas, $jurusan);
			$data['soal_l'] = $this->Model_Guru->getSoalLatihan($guru, $kelas, $jurusan);
			$data['ujian'] = $this->Model_Guru->getUjianById($id);
			$data['total'] = $this->Model_Guru->hitungSoalById($id);
			$data['kat'] = $this->Model_Guru->getKategori($guru);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/soal_ujian_pilih', $data);
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function pilih_soal_tambah($id_ujian, $guru, $kls, $jrs)
	{
		// code...
		$id = $this->input->post('pilih');
		
		for ($i=0 ; $i<count($id) ; $i++) { 
				
			$result = $this->db->set('status', 'Ujian')->set('id_ujian', $id_ujian)->where('id_soal', $id[$i])->update('bank_soal');
		}

		if ($result) {
			echo "<script>alert('berhasil');</script>";
			redirect('C_Guru/pilih_soal_ujian/'.$id_ujian.'/'.$guru.'/'.$kls.'/'.$jrs.'' , 'refresh');
		}
		else {
			echo "<script>alert('gagal');</script>";
			redirect('C_Guru/pilih_soal_ujian/'.$id_ujian.'/'.$guru.'/'.$kls.'/'.$jrs.'' , 'refresh');
		}
	}

	public function pilih_soal_hapus($id_ujian, $guru, $kls, $jrs)
	{
		// code...
		$id = $this->input->post('pilih');
		
		for ($i=0 ; $i<count($id) ; $i++) {

			$result = $this->db->set('status', null)->set('id_ujian', null)->where('id_soal', $id[$i])->update('bank_soal');
		}

		if ($result) {
			echo "<script>alert('berhasil');</script>";
			redirect('C_Guru/pilih_soal_ujian/'.$id_ujian.'/'.$guru.'/'.$kls.'/'.$jrs.'' , 'refresh');
		}
		else {
			echo "<script>alert('gagal');</script>";
			redirect('C_Guru/pilih_soal_ujian/'.$id_ujian.'/'.$guru.'/'.$kls.'/'.$jrs.'' , 'refresh');
		}
	}

	public function hasil_ujian()
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Hasil Ujian';
			$data['ujian'] = $this->Model_Guru->getHasilUjian($_SESSION['id_guru']);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/hasil_ujian', $data);
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function detail_hasil_ujian($id)
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Hasil Ujian';
			$data['judul'] = $this->Model_Guru->judul_ujian($id);
			$data['ujian'] = $this->Model_Guru->getDetailHasilUjian($id);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/hasil_ujian_detail', $data);
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}



// ==========================================================================================================================



	public function bank_soal()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Bank Soal';
			$data['guru'] = $this->Model_Guru->getGuru($_SESSION['id_guru']);
			$data['soal'] = $this->Model_Guru->getSoal($_SESSION['id_guru']);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/bank_soal', $data);
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function tambah_bank_soal()
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Buat Soal Bank Soal';
			$data['guru'] = $this->Model_Guru->getGuru($_SESSION['id_guru']);
			$data['kategori'] = $this->Model_Guru->kategori($_SESSION['id_guru']);
			$data['kat'] = $this->Model_Guru->getKategori($_SESSION['id_guru']);
			$data['kelas'] = $this->Model_Guru->getAllKelas();
			$data['jurusan'] = $this->Model_Guru->getAllJurusan();

			$this->form_validation->set_rules('guru', 'Guru', 'required');
			$this->form_validation->set_rules('soal', 'Soal', 'required');
			$this->form_validation->set_rules('kunci', 'Kunci', 'required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
			$this->form_validation->set_rules('nilai', 'Nilai Soal', 'required');

			$a = $this->input->post('kunci_a'); $b = $this->input->post('kunci_b'); $c = $this->input->post('kunci_c');
			$d = $this->input->post('kunci_d'); $e = $this->input->post('kunci_e');
			$id = $this->id_soal = uniqid();
			
			if ($a == 'on' && $b == '' && $c == '' && $d == '' && $e == '') {
				if ($this->input->post('pilihan_a') != null) {
					$kunci = $this->input->post('pilihan_a');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->Model_Guru->file_a($id) != null) {
					$kunci = $this->Model_Guru->file_a($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif ($a == '' && $b == 'on' && $c == '' && $d == '' && $e == '') {
				if ($this->input->post('pilihan_b') != null) {
					$kunci = $this->input->post('pilihan_b');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->Model_Guru->file_b($id) != null) {
					$kunci = $this->Model_Guru->file_b($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == 'on' && $d == '' && $e == '') {
				if ($this->input->post('pilihan_c') != null) {
					$kunci = $this->input->post('pilihan_c');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->Model_Guru->file_c($id) != null) {
					$kunci = $this->Model_Guru->file_c($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == '' && $d == 'on' && $e == '') {
				if ($this->input->post('pilihan_d') != null) {
					$kunci = $this->input->post('pilihan_d');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->Model_Guru->file_d($id) != null) {
					$kunci = $this->Model_Guru->file_d($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == '' && $d == '' && $e == 'on') {
				if ($this->input->post('pilihan_e') != null) {
					$kunci = $this->input->post('pilihan_e');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->Model_Guru->file_e($id) != null) {
					$kunci = $this->Model_Guru->file_e($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_e', 'Jawaban E', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_e', 'Jawaban E', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} else {
				$this->form_validation->set_rules('kunci_a', 'Kunci', 'required', 'min_length[5]',
					[
						'required' => 'Pilih salah satu!!',
						'min_length' => 'Pilih salah satu!!'
					]);
				$this->form_validation->set_rules('kunci_b', 'Kunci', 'required', 'min_length[5]',
					[
						'required' => 'Pilih salah satu!!',
						'min_length' => 'Pilih salah satu!!'
					]);
				$this->form_validation->set_rules('kunci_c', 'Kunci', 'required', 'min_length[5]',
					[
						'required' => 'Pilih salah satu!!',
						'min_length' => 'Pilih salah satu!!'
					]);
				$this->form_validation->set_rules('kunci_d', 'Kunci', 'required', 'min_length[5]',
					[
						'required' => 'Pilih salah satu!!',
						'min_length' => 'Pilih salah satu!!'
					]);
				$this->form_validation->set_rules('kunci_e', 'Kunci', 'required', 'min_length[5]',
					[
						'required' => 'Pilih salah satu!!',
						'min_length' => 'Pilih salah satu!!'
					]);
				$this->form_validation->run() == FALSE;
			}

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_guru/header', $data);
				$this->load->view('v_guru/bank_soal_tambah' , $data);
				$this->load->view('v_guru/footer');
			} else {
				$this->Model_Guru->tambahSoal();
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Guru/bank_soal', 'refresh');
			}
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function edit_soal($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Soal';
			$data['soal'] = $this->Model_Guru->getSoalById($id);
			$data['guru'] = $this->Model_Guru->getGuru($_SESSION['id_guru']);
			$data['kat'] = $this->Model_Guru->getKategori($_SESSION['id_guru']);
			$data['kelas'] = $this->Model_Guru->getAllKelas();
			$data['jurusan'] = $this->Model_Guru->getAllJurusan();

			$this->form_validation->set_rules('id_guru', 'Guru', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('kunci', 'Kunci', 'required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

			$a = $this->input->post('kunci_a'); $b = $this->input->post('kunci_b'); $c = $this->input->post('kunci_c');
			$d = $this->input->post('kunci_d'); $e = $this->input->post('kunci_e');
			
			if ($a == 'on' && $b == '' && $c == '' && $d == '' && $e == '') {
				if ($this->input->post('pilihan_a') != null) {
					$kunci = $this->input->post('pilihan_a');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->Model_Guru->file_a($id) != null) {
					$this->id_soal = $post["id_soal"];
					$kunci = $this->Model_Guru->file_a($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->input->post('a') != null) {
					$kunci = $this->input->post('a');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif ($a == '' && $b == 'on' && $c == '' && $d == '' && $e == '') {
				if ($this->input->post('pilihan_b') != null) {
					$kunci = $this->input->post('pilihan_b');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->Model_Guru->file_b($id) != null) {
					$this->id_soal = $post["id_soal"];
					$kunci = $this->Model_Guru->file_b($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->input->post('b') != null) {
					$kunci = $this->input->post('b');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == 'on' && $d == '' && $e == '') {
				if ($this->input->post('pilihan_c') != null) {
					$kunci = $this->input->post('pilihan_c');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->Model_Guru->file_c($id) != null) {
					$kunci = $this->Model_Guru->file_c($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->input->post('c') != null) {
					$kunci = $this->input->post('c');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == '' && $d == 'on' && $e == '') {
				if ($this->input->post('pilihan_d') != null) {
					$kunci = $this->input->post('pilihan_d');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->Model_Guru->file_d($id) != null) {
					$kunci = $this->Model_Guru->file_d($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->input->post('d') != null) {
					$kunci = $this->input->post('d');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == '' && $d == '' && $e == 'on') {
				if ($this->input->post('pilihan_e') != null) {
					$kunci = $this->input->post('pilihan_e');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->Model_Guru->file_e($id) != null) {
					$kunci = $this->Model_Guru->file_e($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} elseif ($this->input->post('e') != null) {
					$kunci = $this->input->post('e');
					$this->form_validation->run() == TRUE;
					$this->Model_Guru->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Guru/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_e', 'Jawaban E', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_e', 'Jawaban E', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} else {
				$this->form_validation->set_rules('kunci_a', 'Kunci', 'required', 'min_length[5]',
					[
						'required' => 'Pilih salah satu!!',
						'min_length' => 'Pilih salah satu!!'
					]);
				$this->form_validation->set_rules('kunci_b', 'Kunci', 'required', 'min_length[5]',
					[
						'required' => 'Pilih salah satu!!',
						'min_length' => 'Pilih salah satu!!'
					]);
				$this->form_validation->set_rules('kunci_c', 'Kunci', 'required', 'min_length[5]',
					[
						'required' => 'Pilih salah satu!!',
						'min_length' => 'Pilih salah satu!!'
					]);
				$this->form_validation->set_rules('kunci_d', 'Kunci', 'required', 'min_length[5]',
					[
						'required' => 'Pilih salah satu!!',
						'min_length' => 'Pilih salah satu!!'
					]);
				$this->form_validation->set_rules('kunci_e', 'Kunci', 'required', 'min_length[5]',
					[
						'required' => 'Pilih salah satu!!',
						'min_length' => 'Pilih salah satu!!'
					]);
				$this->form_validation->run() == FALSE;
			}

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_guru/header', $data);
				$this->load->view('v_guru/bank_soal_edit' , $data);
				$this->load->view('v_guru/footer');
			} else {
				$this->Model_Guru->editSoal();
				echo "<script>alert('Soal Berhasil Diedit');</script>";
				redirect('C_Guru/bank_soal', 'refresh');
			}
		}
	}

	public function detail_soal($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Detail Soal';
			$data['soal'] = $this->Model_Guru->getSoalById($id);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/bank_soal_detail', $data);
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function hapus_soal($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {

			if ($this->Model_Guru->hapusSoal($id)) {
				$this->session->set_flashdata('hapus_soal', true);
			} else {
				$this->session->set_flashdata('hapus_soal', false);
			}
			echo "<script>alert('Data Soal Terhapus');</script>";
			redirect('C_Guru/bank_soal', 'refresh');
		} else {
			redirect('C_Login/index');
		}
	}

	public function tambah_kategori()
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			
			$this->form_validation->set_rules('kategori', 'Kategori', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_guru/header', $data);
				$this->load->view('v_guru/bank_soal' , $data);
				$this->load->view('v_guru/footer');
			} else {
				$this->Model_Guru->tambahKategori();
				echo "<script>alert('Berhasil menambah kategori soal baru');</script>";
				redirect('C_Guru/tambah_bank_soal', 'refresh');
			}
		}
	}

	public function hapus_kategori($id)
	{
		// code...
		if (isset($_SESSION['id_guru'])) {

			if ($this->Model_Guru->hapusKategori($id)) {
				$this->session->set_flashdata('hapus_soal', true);
			} else {
				$this->session->set_flashdata('hapus_soal', false);
			}
			echo "<script>alert('Data Kategori Soal Terhapus');</script>";
			redirect('C_Guru/tambah_bank_soal', 'refresh');
		} else {
			redirect('C_Login/index');
		}
	}

	public function edit_kategori()
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Soal';

			$this->form_validation->set_rules('kategori', 'Kategori', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_guru/header', $data);
				$this->load->view('v_guru/bank_soal_tambah' , $data);
				$this->load->view('v_guru/footer');
			} else {
				$this->Model_Guru->editKategori();
				echo "<script>alert('Kategori Berhasil Diedit');</script>";
				redirect('C_Guru/tambah_bank_soal', 'refresh');
			}
		}
	}



// ==========================================================================================================================
	


	public function materi()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Materi Siswa';
			$data['materi'] = $this->Model_Guru->getAllMateri($_SESSION['id_guru']);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/materi', $data);
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function tambah_materi()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Upload Materi';
			$data['mapel'] = $this->Model_Guru->getAllMapel();
			$data['jurusan'] = $this->Model_Guru->getAllJurusan();
			$data['kelas'] = $this->Model_Guru->getAllKelas();
			$data['guru'] = $this->Model_Guru->getGuru($_SESSION['id_guru']);

			$this->form_validation->set_rules('kelas', 'Kelas', 'required');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_guru/header', $data);
				$this->load->view('v_guru/materi_tambah', $data);
				$this->load->view('v_guru/footer');
			} else {
				$this->Model_Guru->tambahMateri();
				echo "<script>alert('Anda berhasil mengupload materi');</script>";
				redirect('C_Guru/materi', 'refresh');
			}
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function edit_materi($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Materi';
			$data['materi'] = $this->Model_Guru->getMateriById($id);
			$data['mapel'] = $this->Model_Guru->getAllMapel();
			$data['jurusan'] = $this->Model_Guru->getAllJurusan();
			$data['kelas'] = $this->Model_Guru->getAllKelas();

			$this->form_validation->set_rules('kelas', 'Kelas', 'required');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_guru/header', $data);
				$this->load->view('v_guru/materi_edit', $data);
				$this->load->view('v_guru/footer');
			} else {
				$this->Model_Guru->editMateri();
				echo "<script>alert('Anda berhasil mengedit materi');</script>";
				redirect('C_Guru/materi', 'refresh');
			}
		}
	}

	public function hapus_materi($id)
	{
		if (isset($_SESSION['id_guru'])) {

			if ($this->Model_Guru->hapusMateri($id)) {
				$this->session->set_flashdata('hapus_materi', true);
			} else {
				$this->session->set_flashdata('hapus_materi', false);
			}
			redirect('C_Guru/materi', 'refresh');
		} else {
			redirect('C_Login/index');
		}
	}

	public function downloadF1($id)
	{
		# code...
		$data = $this->db->get_where('materi', ['id_materi'=>$id])->row();
		force_download('upload/materi/'.$data->file1,NULL);
	}
	public function downloadF2($id)
	{
		# code...
		$data = $this->db->get_where('materi', ['id_materi'=>$id])->row();
		force_download('upload/materi/'.$data->file2,NULL);
	}
	public function downloadF3($id)
	{
		# code...
		$data = $this->db->get_where('materi', ['id_materi'=>$id])->row();
		force_download('upload/materi/'.$data->file3,NULL);
	}



// ==========================================================================================================================



	public function akun_saya($id)
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Ganti Akun Saya';
			$data['guru'] = $this->Model_Guru->getGuru($id);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/akun_saya', $data);
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function update_akun($id)
	{
		# code...
		$data['title'] = 'Ganti Akun Saya';
		$data['guru'] = $this->Model_Guru->getGuru($_SESSION['id_guru']);

		$this->form_validation->set_rules('nip', 'Nip', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/akun_saya', $data);
			$this->load->view('v_guru/footer');
		} else {
			$this->Model_Guru->update_akun($id);
			echo "<script>alert('Anda berhasil mengedit data');</script>";
			redirect('C_Guru/akun_saya/'.$_SESSION['id_guru'], 'refresh');
		}

	}

}
