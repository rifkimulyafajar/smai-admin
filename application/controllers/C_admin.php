<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Admin extends CI_Controller {

	public function __construct()
	{
		# code...
		parent::__construct();

		$this->load->model('model_admin');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Admin - Dashboard';
			$data['guru'] = $this->model_admin->hitungGuru();
			$data['siswa'] = $this->model_admin->hitungSiswa();
			$data['materi'] = $this->model_admin->hitungMateri();
			$data['soal'] = $this->model_admin->hitungBankSoal();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/index', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_login/index');
		}
	}

// ===============================================================================

	public function akun_guru()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Akun Guru';
			$data['guru'] = $this->model_admin->getAllGuru();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/akun_guru', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_login/index');
		}
	}

	public function tambah_guru()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Tambah Data Guru';
			$data['guru'] = $this->model_admin->getAllGuru();
			$data['mapel'] = $this->model_admin->getAllMapel();


			$this->form_validation->set_rules('nip', 'NIP', 'required|trim');
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('mapel', 'Mapel', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/akun_guru_tambah', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->model_admin->tambahGuru();
				echo "<script>alert('Anda berhasil menambahkan data guru');</script>";
				redirect('C_admin/akun_guru', 'refresh');
			}
		}
		else {
			redirect('C_login/index');
		}
	}

	public function hapus_guru($id)
	{
		if (isset($_SESSION['id_guru'])) {

			if ($this->model_admin->hapusGuru($id)) {
				$this->session->set_flashdata('hapus_guru', true);
			} else {
				$this->session->set_flashdata('hapus_guru', false);
			}
			echo "<script>alert('Anda berhasil menghapus akun tersebut');</script>";
			redirect('C_admin/akun_guru', 'refresh');
		} else {
			redirect('C_login/index');
		}
	}

	public function edit_guru($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Data Guru';
			$data['guru'] = $this->model_admin->guruById($id);
			$data['mapel'] = $this->model_admin->getAllMapel();

			$this->form_validation->set_rules('nip', 'Nip', 'required|trim');
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
			$this->form_validation->set_rules('mapel', 'Mapel', 'required|trim');
			$this->form_validation->set_rules('username', 'Username', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/akun_guru_edit', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->model_admin->editGuru();
				echo "<script>alert('Anda berhasil mengedit akun guru');</script>";
				redirect('C_admin/akun_guru', 'refresh');
			}
		}
	}

// ===============================================================================

	public function akun_siswa()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Akun Siswa';
			$data['siswa'] = $this->model_admin->getAllSiswa();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/akun_siswa', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_login/index');
		}
	}

	public function tambah_siswa()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Tambah Data Siswa';
			$data['siswa'] = $this->model_admin->getAllSiswa();
			$data['jurusan'] = $this->model_admin->getAllJurusan();
			$data['kelas'] = $this->model_admin->getAllKelas();

			$this->form_validation->set_rules('nis', 'NIS', 'required|trim');
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/akun_siswa_tambah', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->model_admin->tambahSiswa();
				echo "<script>alert('Anda berhasil menambahkan data siswa');</script>";
				redirect('C_admin/akun_siswa', 'refresh');
			}
		}
		else {
			redirect('C_login/index');
		}
	}

	public function hapus_siswa($id)
	{
		if (isset($_SESSION['id_guru'])) {

			if ($this->model_admin->hapusSiswa($id)) {
				$this->session->set_flashdata('hapus_siswa', true);
			} else {
				$this->session->set_flashdata('hapus_siswa', false);
			}
			echo "<script>alert('Anda berhasil menghapus akun tersebut');</script>";
			redirect('C_admin/akun_siswa', 'refresh');
		} else {
			redirect('C_login/index');
		}
	}

	public function edit_siswa($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Data Siswa';
			$data['siswa'] = $this->model_admin->getSiswaById($id);
			$data['jurusan'] = $this->model_admin->getAllJurusan();
			$data['kelas'] = $this->model_admin->getAllKelas();

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
				$this->model_admin->editSiswa();
				echo "<script>alert('Anda berhasil mengedit akun siswa');</script>";
				redirect('C_admin/akun_siswa', 'refresh');
			}
		}
	}

// ===============================================================================

	public function soal_ujian()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Soal Ujian';

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/soal_ujian');
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_login/index');
		}
	}

	public function tambah_soal_ujian()
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Buat Soal Ujian';
			$data['soal'] = $this->model_admin->getSoalUjian();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/soal_ujian_tambah', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_login/index');
		}
	}

	public function pilih_soal()
	{
		// code...
		$id = $this->input->post('pilih');
		
		for ($i=0 ; $i<count($id) ; $i++) { 
			// $result = $this->db->set('status', 'Ujian')->where(['bank_soal.id_soal', $id[$i]])->update('bank_soal');

			$result = $this->db->where(['bank_soal.id_soal', $id[$i]])->update('bank_soal',[
				'status' => 'Ujian'
			]);
		}

		if ($result) {
			echo "<script>alert('berhasil');</script>";
			redirect('C_Admin/tambah_soal_ujian', 'refresh');
		}
		else {
			echo "<script>alert('gagal');</script>";
			redirect('C_Admin/tambah_soal_ujian', 'refresh');
		}
	}

// ===============================================================================

	public function bank_soal()
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Bank Soal';
			$data['soal'] = $this->model_admin->getSoal();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/bank_soal', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_login/index');
		}
	}

	public function detail_soal($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Detail Soal';
			$data['soal'] = $this->model_admin->getSoalById($id);

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/bank_soal_detail', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_login/index');
		}
	}

	public function tambah_bank_soal()
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Buat Soal Bank Soal';
			$data['guru'] = $this->model_admin->getAllGuru();
			$data['mapel'] = $this->model_admin->getMapel();
			$data['kelas'] = $this->model_admin->getAllKelas();
			$data['jurusan'] = $this->model_admin->getAllJurusan();

			$this->form_validation->set_rules('id_guru', 'Guru', 'required');
			$this->form_validation->set_rules('soal', 'Soal', 'required');
			$this->form_validation->set_rules('kunci', 'Kunci', 'required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/bank_soal_tambah' , $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->model_admin->tambahSoal();
				echo "<script>alert('Soal Berhasil Dibuat');</script>";
				redirect('C_admin/bank_soal', 'refresh');
			}
		}
		else {
			redirect('C_login/index');
		}
	}

	public function edit_soal($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {
			
			$data['title'] = 'Edit Soal';
			$data['guru'] = $this->model_admin->getAllGuru();
			$data['soal'] = $this->model_admin->getSoalById($id);
			$data['kelas'] = $this->model_admin->getAllKelas();
			$data['jurusan'] = $this->model_admin->getAllJurusan();

			$this->form_validation->set_rules('id_guru', 'Guru', 'required');
			$this->form_validation->set_rules('status', 'Status', 'required');
			$this->form_validation->set_rules('kunci', 'Kunci', 'required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/bank_soal_edit' , $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->model_admin->editSoal();
				echo "<script>alert('Soal Berhasil Diedit');</script>";
				redirect('C_admin/bank_soal', 'refresh');
			}
		}
	}

	public function hapus_soal($id)
	{
		# code...
		if (isset($_SESSION['id_guru'])) {

			if ($this->model_admin->hapusSoal($id)) {
				$this->session->set_flashdata('hapus_soal', true);
			} else {
				$this->session->set_flashdata('hapus_soal', false);
			}
			echo "<script>alert('Data Soal Terhapus');</script>";
			redirect('C_admin/bank_soal', 'refresh');
		} else {
			redirect('C_login/index');
		}
	}

// ===============================================================================	

	public function materi()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Materi Siswa';
			$data['materi'] = $this->model_admin->getAllMateri();

			$this->load->view('v_admin/header', $data);
			$this->load->view('v_admin/materi', $data);
			$this->load->view('v_admin/footer');
		}
		else {
			redirect('C_login/index');
		}
	}

	public function tambah_materi()
	{
		if (isset($_SESSION['id_guru'])) {
			# code...
			$data['title'] = 'Upload Materi';
			$data['guru'] = $this->model_admin->getAllGuru();
			$data['mapel'] = $this->model_admin->getAllMapel();
			$data['jurusan'] = $this->model_admin->getAllJurusan();
			$data['kelas'] = $this->model_admin->getAllKelas();

			$this->form_validation->set_rules('id_guru', 'Guru', 'required|trim');
			$this->form_validation->set_rules('id_kelas', 'Kelas', 'required|trim');
			$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/materi_tambah', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->model_admin->tambahMateri();
				echo "<script>alert('Anda berhasil mengupload materi');</script>";
				redirect('C_admin/materi', 'refresh');
			}
		}
		else {
			redirect('C_login/index');
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
			$data['materi'] = $this->model_admin->getMateriById($id);
			$data['guru'] = $this->model_admin->getAllGuru();
			$data['mapel'] = $this->model_admin->getAllMapel();
			$data['jurusan'] = $this->model_admin->getAllJurusan();
			$data['kelas'] = $this->model_admin->getAllKelas();

			$this->form_validation->set_rules('id_guru', 'Guru', 'required|trim');
			$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
			$this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim');

			if ($this->form_validation->run() == FALSE) {
				$this->load->view('v_admin/header', $data);
				$this->load->view('v_admin/materi_edit', $data);
				$this->load->view('v_admin/footer');
			} else {
				$this->model_admin->editMateri();
				echo "<script>alert('Anda berhasil mengedit materi');</script>";
				redirect('C_admin/materi', 'refresh');
			}
		}
	}

	public function hapus_materi($id)
	{
		if (isset($_SESSION['id_guru'])) {

			if ($this->model_admin->hapusMateri($id)) {
				$this->session->set_flashdata('hapus_materi', true);
			} else {
				$this->session->set_flashdata('hapus_materi', false);
			}
			echo "<script>alert('Data Materi Terhapus');</script>";
			redirect('C_admin/materi', 'refresh');
		} else {
			redirect('C_login/index');
		}
	}

}
