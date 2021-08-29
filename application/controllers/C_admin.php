<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {

	public function __construct()
	{
		# code...
		parent::__construct();

		$this->load->model('Model_Admin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Admin - Dashboard';
			$data['guru'] = $this->Model_Admin->hitungGuru();
			$data['siswa'] = $this->Model_Admin->hitungSiswa();
			$data['materi'] = $this->Model_Admin->hitungMateri();
			$data['soal'] = $this->Model_Admin->hitungBankSoal();
			$data['ujian'] = $this->Model_Admin->hitungUjian();
			$data['hasil'] = $this->Model_Admin->hitungHasilUjian();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/index', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}



// ==============================================================================================================



	public function akun_guru()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Akun Guru';
			$data['guru'] = $this->Model_Admin->getAllGuru();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/akun_guru', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function tambah_guru()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Tambah Data Guru';
			$data['guru'] = $this->Model_Admin->getAllGuru();
			$data['mapel'] = $this->Model_Admin->getAllMapel();


			$this->form_validation->set_rules('nip', 'NIP', 'required|trim');
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('mapel', 'Mapel', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/akun_guru_tambah', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->Model_Admin->tambahGuru();
				echo "<script>alert('Anda berhasil menambahkan data guru');</script>";
				redirect('C_Admin/akun_guru', 'refresh');
			}
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function hapus_guru($id)
	{
		if (isset($_SESSION['id_guru'])) {

			if ($this->Model_Admin->hapusGuru($id)) {
				$this->session->set_flashdata('hapus_guru', true);
			} else {
				$this->session->set_flashdata('hapus_guru', false);
			}
			echo "<script>alert('Anda berhasil menghapus akun tersebut');</script>";
			redirect('C_Admin/akun_guru', 'refresh');
		} else {
			redirect('C_Login/index');
		}
	}

	public function edit_guru($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Data Guru';
			$data['guru'] = $this->Model_Admin->guruById($id);
			$data['mapel'] = $this->Model_Admin->getAllMapel();

			$this->form_validation->set_rules('nip', 'Nip', 'required|trim');
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('mapel', 'Mapel', 'required|trim');
			$this->form_validation->set_rules('username', 'Username', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/akun_guru_edit', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->Model_Admin->editGuru();
				echo "<script>alert('Anda berhasil mengedit akun guru');</script>";
				redirect('C_Admin/akun_guru', 'refresh');
			}
		}
	}



// ==============================================================================================================



	public function akun_siswa()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Akun Siswa';
			$data['siswa'] = $this->Model_Admin->getAllSiswa();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/akun_siswa', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function tambah_siswa()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Tambah Data Siswa';
			$data['siswa'] = $this->Model_Admin->getAllSiswa();
			$data['jurusan'] = $this->Model_Admin->getAllJurusan();
			$data['kelas'] = $this->Model_Admin->getAllKelas();

			$this->form_validation->set_rules('nis', 'NIS', 'required|trim');
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/akun_siswa_tambah', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->Model_Admin->tambahSiswa();
				echo "<script>alert('Anda berhasil menambahkan data siswa');</script>";
				redirect('C_Admin/akun_siswa', 'refresh');
			}
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function hapus_siswa($id)
	{
		if (isset($_SESSION['id_guru'])) {

			if ($this->Model_Admin->hapusSiswa($id)) {
				$this->session->set_flashdata('hapus_siswa', true);
			} else {
				$this->session->set_flashdata('hapus_siswa', false);
			}
			echo "<script>alert('Anda berhasil menghapus akun tersebut');</script>";
			redirect('C_Admin/akun_siswa', 'refresh');
		} else {
			redirect('C_Login/index');
		}
	}

	public function edit_siswa($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Data Siswa';
			$data['siswa'] = $this->Model_Admin->getSiswaById($id);
			$data['jurusan'] = $this->Model_Admin->getAllJurusan();
			$data['kelas'] = $this->Model_Admin->getAllKelas();

			$this->form_validation->set_rules('nis', 'Nis', 'required|trim');
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');
			$this->form_validation->set_rules('username', 'Username', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/akun_siswa_edit', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->Model_Admin->editSiswa();
				echo "<script>alert('Anda berhasil mengedit akun siswa');</script>";
				redirect('C_Admin/akun_siswa', 'refresh');
			}
		}
	}



// ==============================================================================================================



	public function soal_ujian()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Soal Ujian';
			$data['ujian'] = $this->Model_Admin->getUjian();
			$data['guru'] = $this->Model_Admin->getAllGuru();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/ujian', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function tambah_ujian($id)
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Buat Ujian Soal';
			$data['guru'] = $this->Model_Admin->guruById($id);
			$data['kelas'] = $this->Model_Admin->getAllKelas();
			$data['jurusan'] = $this->Model_Admin->getAllJurusan();

			$this->form_validation->set_rules('judul', 'Judul Ujian', 'required');
			$this->form_validation->set_rules('durasi', 'Durasi', 'required');
			$this->form_validation->set_rules('waktu_mulai', 'Waktu', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/ujian_tambah' , $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->Model_Admin->tambahUjian();
				echo "<script>alert('Ujian Berhasil Dibuat');</script>";
				redirect('C_Admin/soal_ujian', 'refresh');
			}
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function edit_ujian($id)
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Ujian';
			$data['ujian'] = $this->Model_Admin->getUjianById($id);
			$data['kelas'] = $this->Model_Admin->getAllKelas();
			$data['jurusan'] = $this->Model_Admin->getAllJurusan();
			$data['hitung'] = $this->Model_Admin->hitungSoalUjian($id);

			$this->form_validation->set_rules('judul', 'Judul Ujian', 'required');
			$this->form_validation->set_rules('durasi', 'Durasi', 'required');
			$this->form_validation->set_rules('waktu_mulai', 'Waktu', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/ujian_edit' , $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->Model_Admin->editUjian();
				echo "<script>alert('Ujian Berhasil Diupdate');</script>";
				redirect('C_Admin/soal_ujian', 'refresh');
			}
		}
	}

	public function tambahSoalUjian($id, $guru, $kelas, $jurusan)
	{
		$a = $this->input->post('kunci_a'); $b = $this->input->post('kunci_b'); $c = $this->input->post('kunci_c');
		$d = $this->input->post('kunci_d'); $e = $this->input->post('kunci_e');
		$ids = $this->id_soal = uniqid();
			
		if ($a == 'on' && $b == '' && $c == '' && $d == '' && $e == '') {
			if ($this->input->post('pilihan_a') != null) {
				$kunci = $this->input->post('pilihan_a');
				$this->form_validation->run() == TRUE;
				$this->Model_Admin->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} elseif ($this->Model_Admin->file_a($ids) != null) {
				$kunci = $this->Model_Admin->file_a($ids);
				$this->form_validation->run() == TRUE;
				$this->Model_Admin->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} else {
				$this->form_validation->set_rules('pilihan_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->set_rules('file_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->run() == FALSE;
			}
		} elseif ($a == '' && $b == 'on' && $c == '' && $d == '' && $e == '') {
			if ($this->input->post('pilihan_b') != null) {
				$kunci = $this->input->post('pilihan_b');
				$this->form_validation->run() == TRUE;
				$this->Model_Admin->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} elseif ($this->Model_Admin->file_b($ids) != null) {
				$kunci = $this->Model_Admin->file_b($ids);
				$this->form_validation->run() == TRUE;
				$this->Model_Admin->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} else {
				$this->form_validation->set_rules('pilihan_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->set_rules('file_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->run() == FALSE;
			}
		} elseif($a == '' && $b == '' && $c == 'on' && $d == '' && $e == '') {
			if ($this->input->post('pilihan_c') != null) {
				$kunci = $this->input->post('pilihan_c');
				$this->form_validation->run() == TRUE;
				$this->Model_Admin->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} elseif ($this->Model_Admin->file_c($ids) != null) {
				$kunci = $this->Model_Admin->file_c($ids);
				$this->form_validation->run() == TRUE;
				$this->Model_Admin->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} else {
				$this->form_validation->set_rules('pilihan_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->set_rules('file_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->run() == FALSE;
			}
		} elseif($a == '' && $b == '' && $c == '' && $d == 'on' && $e == '') {
			if ($this->input->post('pilihan_d') != null) {
				$kunci = $this->input->post('pilihan_d');
				$this->form_validation->run() == TRUE;
				$this->Model_Admin->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} elseif ($this->Model_Admin->file_d($ids) != null) {
				$kunci = $this->Model_Admin->file_d($ids);
				$this->form_validation->run() == TRUE;
				$this->Model_Admin->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} else {
				$this->form_validation->set_rules('pilihan_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->set_rules('file_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
				$this->form_validation->run() == FALSE;
			}
		} elseif($a == '' && $b == '' && $c == '' && $d == '' && $e == 'on') {
			if ($this->input->post('pilihan_e') != null) {
				$kunci = $this->input->post('pilihan_e');
				$this->form_validation->run() == TRUE;
				$this->Model_Admin->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
			} elseif ($this->Model_Admin->file_e($ids) != null) {
				$kunci = $this->Model_Admin->file_e($ids);
				$this->form_validation->run() == TRUE;
				$this->Model_Admin->tambahSoalUjian($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
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

		$this->Model_Admin->tambahSoalUjian($kunci);
		echo "<script>alert('Soal Berhasil Dibuat');</script>";
		redirect('C_Admin/pilih_soal_ujian/'.$id.'/'.$guru.'/'.$kelas.'/'.$jurusan.'', 'refresh');
	}

	public function pilih_soal_ujian($id, $guru, $kelas, $jurusan)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Buat Soal Ujian';
			$data['soal_u'] = $this->Model_Admin->getSoalUjian($id, $guru, $kelas, $jurusan);
			$data['soal_l'] = $this->Model_Admin->getSoalLatihan($guru, $kelas, $jurusan);
			$data['ujian'] = $this->Model_Admin->getUjianById($id);

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/soal_ujian_pilih', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function hapus_ujian($id)
	{
		// code...
		if (isset($_SESSION['id_guru'])) {

			if ($this->Model_Admin->hapusUjian($id)) {
				$this->session->set_flashdata('hapus_ujian', true);
			} else {
				$this->session->set_flashdata('hapus_ujian', false);
			}
			echo "<script>alert('Data Ujian Terhapus');</script>";
			redirect('C_Admin/soal_ujian', 'refresh');
		} else {
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
			redirect('C_Admin/pilih_soal_ujian/'.$id_ujian.'/'.$guru.'/'.$kls.'/'.$jrs.'' , 'refresh');
		}
		else {
			echo "<script>alert('gagal');</script>";
			redirect('C_Admin/pilih_soal_ujian/'.$id_ujian.'/'.$guru.'/'.$kls.'/'.$jrs.'' , 'refresh');
		}
	}


	public function pilih_soal_hapus($id_ujian, $guru, $kls, $jrs)
	{
		// code...
		$id = $this->input->post('pilih');
		
		for ($i=0 ; $i<count($id) ; $i++) {

			$result = $this->db->set('status', "")->set('id_ujian', null)->where('id_soal', $id[$i])->update('bank_soal');
		}

		if ($result) {
			echo "<script>alert('berhasil');</script>";
			redirect('C_Admin/pilih_soal_ujian/'.$id_ujian.'/'.$guru.'/'.$kls.'/'.$jrs.'' , 'refresh');
		}
		else {
			echo "<script>alert('gagal');</script>";
			redirect('C_Admin/pilih_soal_ujian/'.$id_ujian.'/'.$guru.'/'.$kls.'/'.$jrs.'' , 'refresh');
		}
	}

	public function hasil_ujian()
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Hasil Ujian';
			$data['ujian'] = $this->Model_Admin->getHasilUjian();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/hasil_ujian', $data);
			$this->load->view('v_admin/footer');
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
			$data['judul'] = $this->Model_Admin->judul_ujian($id);
			$data['ujian'] = $this->Model_Admin->getDetailHasilUjian($id);

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/hasil_ujian_detail', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}


// ==============================================================================================================



	public function bank_soal()
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Bank Soal';
			$data['guru'] = $this->Model_Admin->getAllGuru();
			$data['soal'] = $this->Model_Admin->getSoal();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/bank_soal', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function detail_soal($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Detail Soal';
			$data['soal'] = $this->Model_Admin->getSoalById($id);

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/bank_soal_detail', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function tambah_bank_soal($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Buat Soal Bank Soal';
			$data['guru'] = $this->Model_Admin->guruById($id);
			$data['mapel'] = $this->Model_Admin->getMapel();
			$data['kelas'] = $this->Model_Admin->getAllKelas();
			$data['jurusan'] = $this->Model_Admin->getAllJurusan();

			$this->form_validation->set_rules('id_guru', 'Guru', 'required');
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
					$this->Model_Admin->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->Model_Admin->file_a($id) != null) {
					$kunci = $this->Model_Admin->file_a($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif ($a == '' && $b == 'on' && $c == '' && $d == '' && $e == '') {
				if ($this->input->post('pilihan_b') != null) {
					$kunci = $this->input->post('pilihan_b');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->Model_Admin->file_b($id) != null) {
					$kunci = $this->Model_Admin->file_b($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == 'on' && $d == '' && $e == '') {
				if ($this->input->post('pilihan_c') != null) {
					$kunci = $this->input->post('pilihan_c');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->Model_Admin->file_c($id) != null) {
					$kunci = $this->Model_Admin->file_c($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == '' && $d == 'on' && $e == '') {
				if ($this->input->post('pilihan_d') != null) {
					$kunci = $this->input->post('pilihan_d');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->Model_Admin->file_d($id) != null) {
					$kunci = $this->Model_Admin->file_d($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == '' && $d == '' && $e == 'on') {
				if ($this->input->post('pilihan_e') != null) {
					$kunci = $this->input->post('pilihan_e');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->Model_Admin->file_e($id) != null) {
					$kunci = $this->Model_Admin->file_e($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->tambahSoal($kunci);
					echo "<script>alert('Soal Berhasil Dibuat');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
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
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/bank_soal_tambah' , $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->Model_Admin->tambahSoal($kunci);
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_Admin/bank_soal', 'refresh');
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
			$data['guru'] = $this->Model_Admin->getAllGuru();
			$data['soal'] = $this->Model_Admin->getSoalById($id);
			$data['kelas'] = $this->Model_Admin->getAllKelas();
			$data['jurusan'] = $this->Model_Admin->getAllJurusan();

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
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->Model_Admin->file_a($id) != null) {
					$this->id_soal = $post["id_soal"];
					$kunci = $this->Model_Admin->file_a($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->input->post('a') != null) {
					$kunci = $this->input->post('a');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_a', 'Jawaban A', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif ($a == '' && $b == 'on' && $c == '' && $d == '' && $e == '') {
				if ($this->input->post('pilihan_b') != null) {
					$kunci = $this->input->post('pilihan_b');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->Model_Admin->file_b($id) != null) {
					$this->id_soal = $post["id_soal"];
					$kunci = $this->Model_Admin->file_b($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->input->post('b') != null) {
					$kunci = $this->input->post('b');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_b', 'Jawaban B', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == 'on' && $d == '' && $e == '') {
				if ($this->input->post('pilihan_c') != null) {
					$kunci = $this->input->post('pilihan_c');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->Model_Admin->file_c($id) != null) {
					$kunci = $this->Model_Admin->file_c($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->input->post('c') != null) {
					$kunci = $this->input->post('c');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_c', 'Jawaban C', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == '' && $d == 'on' && $e == '') {
				if ($this->input->post('pilihan_d') != null) {
					$kunci = $this->input->post('pilihan_d');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->Model_Admin->file_d($id) != null) {
					$kunci = $this->Model_Admin->file_d($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->input->post('d') != null) {
					$kunci = $this->input->post('d');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} else {
					$this->form_validation->set_rules('pilihan_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->set_rules('file_d', 'Jawaban D', 'required', [ 'required' => 'Isi salah satu!!' ]);
					$this->form_validation->run() == FALSE;
				}
			} elseif($a == '' && $b == '' && $c == '' && $d == '' && $e == 'on') {
				if ($this->input->post('pilihan_e') != null) {
					$kunci = $this->input->post('pilihan_e');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->Model_Admin->file_e($id) != null) {
					$kunci = $this->Model_Admin->file_e($id);
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
				} elseif ($this->input->post('e') != null) {
					$kunci = $this->input->post('e');
					$this->form_validation->run() == TRUE;
					$this->Model_Admin->editSoal($kunci);
					echo "<script>alert('Soal Berhasil Diubah');</script>";
					redirect('C_Admin/bank_soal', 'refresh');
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
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/bank_soal_edit' , $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->Model_Admin->editSoal($kunci);
				echo "<script>alert('Soal Berhasil Diubah');</script>";
				redirect('C_Admin/bank_soal', 'refresh');
			}
		}
	}

	public function hapus_soal($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {

			if ($this->Model_Admin->hapusSoal($id)) {
				$this->session->set_flashdata('hapus_soal', true);
			} else {
				$this->session->set_flashdata('hapus_soal', false);
			}
			echo "<script>alert('Data Soal Terhapus');</script>";
			redirect('C_Admin/bank_soal', 'refresh');
		} else {
			redirect('C_Login/index');
		}
	}



// ==============================================================================================================



	public function materi()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Materi Siswa';
			$data['guru'] = $this->Model_Admin->getAllGuru();
			$data['materi'] = $this->Model_Admin->getAllMateri();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/materi', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function tambah_materi($id)
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Upload Materi';
			$data['guru'] = $this->Model_Admin->guruById($id);
			$data['jurusan'] = $this->Model_Admin->getAllJurusan();
			$data['kelas'] = $this->Model_Admin->getAllKelas();

			$this->form_validation->set_rules('id_guru', 'File Materi', 'required');
			if (empty($_FILES['file1']['name'])) {
			    $this->form_validation->set_rules('file1', 'Document', 'required');
			}

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/materi_tambah', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->Model_Admin->tambahMateri();
				echo "<script>alert('Anda berhasil mengupload materi');</script>";
				redirect('C_Admin/materi', 'refresh');
			}
		}
		else {
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

	public function edit_materi($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Materi';
			$data['materi'] = $this->Model_Admin->getMateriById($id);
			$data['guru'] = $this->Model_Admin->getAllGuru();
			$data['mapel'] = $this->Model_Admin->getAllMapel();
			$data['jurusan'] = $this->Model_Admin->getAllJurusan();
			$data['kelas'] = $this->Model_Admin->getAllKelas();

			$this->form_validation->set_rules('id_guru', 'Guru', 'required|trim');
			$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/materi_edit', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->Model_Admin->editMateri();
				echo "<script>alert('Anda berhasil mengedit materi');</script>";
				redirect('C_Admin/materi', 'refresh');
			}
		}
	}

	public function hapus_materi($id)
	{
		if (isset($_SESSION['id_guru'])) {

			if ($this->Model_Admin->hapusMateri($id)) {
				$this->session->set_flashdata('hapus_materi', true);
			} else {
				$this->session->set_flashdata('hapus_materi', false);
			}
			echo "<script>alert('Data Materi Terhapus');</script>";
			redirect('C_Admin/materi', 'refresh');
		} else {
			redirect('C_Login/index');
		}
	}





	public function rekap()
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Rekap Nilai Siswa';
			$data['guru'] = $this->Model_Admin->getAllGuru();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/rekap', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}

	}

	public function rekap_nilai($id_guru)
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Akun Guru';
			$data['jurusan'] = $this->Model_Admin->getAllJurusan();
			$data['kelas'] = $this->Model_Admin->getAllKelas();
			$data['guru'] = $this->Model_Admin->guruById($id_guru);

			if (isset($_POST['id_kelas']) && !empty($_POST['id_kelas']) && isset($_POST['id_jurusan']) && !empty($_POST['id_jurusan'])) {
				$kls = $_POST['id_kelas'];
				$jrs = $_POST['id_jurusan'];

				if ($kls == '1' && $jrs == '1') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '1' && $jrs == '2') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '1' && $jrs == '3') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '1' && $jrs == '4') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '1' && $jrs == '5') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '1' && $jrs == '6') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '2' && $jrs == '1') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '2' && $jrs == '2') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '2' && $jrs == '3') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '2' && $jrs == '4') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '2' && $jrs == '5') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '2' && $jrs == '6') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '3' && $jrs == '1') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '3' && $jrs == '2') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '3' && $jrs == '3') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '3' && $jrs == '4') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '3' && $jrs == '5') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
				else if ($kls == '3' && $jrs == '6') {
					# code...
					$tampilSiswa = $this->Model_Admin->getSiswaByKelJur($kls, $jrs);
				}
			}
			else {
				$tampilSiswa = $this->Model_Admin->getSiswaSudahUjian($id_guru);
			}

			$data['siswa'] = $tampilSiswa;

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/rekap_nilai', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function rekap_nilai_hasil($id_siswa, $id_guru)
	{
		// code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Hasil Nilai Ujian';
			$data['siswa'] = $this->Model_Admin->getSiswaById($id_siswa);
			$data['hitung'] = $this->Model_Admin->hitungHasilNilai($id_siswa, $id_guru);
			$data['nilai'] = $this->Model_Admin->getHasilNilai($id_siswa, $id_guru);

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/rekap_nilai_hasil', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

}
