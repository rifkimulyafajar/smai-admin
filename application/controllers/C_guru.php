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
			$data['soal'] = $this->Model_Guru->hitungSoalById($_SESSION['id_guru']);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/index', $data);
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

// ===============================================================================

	public function soal_ujian()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Soal Ujian';

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/soal_ujian');
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

	public function tambah_soal_ujian()
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Buat Soal Ujian';
			$data['soal'] = $this->Model_Guru->getSoal($_SESSION['id_guru']);

			$this->load->view('v_guru/header', $data);
			$this->load->view('v_guru/soal_ujian_tambah');
			$this->load->view('v_guru/footer');
		}
		else {
			redirect('C_Login/index');
		}
	}

// ===============================================================================

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

			// $this->form_validation->set_rules('kategori', 'Kategori', 'required');
			$this->form_validation->set_rules('guru', 'Guru', 'required');
			$this->form_validation->set_rules('soal', 'Soal', 'required');
			$this->form_validation->set_rules('kunci', 'Kunci', 'required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

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

// ===============================================================================	
	
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

// ===============================================================================

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
