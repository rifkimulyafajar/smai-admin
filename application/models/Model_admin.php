<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {

//=============================================RestServer============================================================

    public function getGuru($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            return $this->db->get('guru')->result_array();
        } 
        else {
            return $this->db->get_where('guru', ['id_guru' => $id])->result_array();
        }

    }

    public function inputGuru($data)
    {
        # code...
        $this->db->insert('guru', $data);
        return $this->db->affected_rows();
    }

    public function deleteGuru($id)
    {
        # code...
        $this->db->delete('guru', ['id_guru' => $id]);
        return $this->db->affected_rows();
    }

    public function updateGuru($data, $id)
    {
        # code...
        $this->db->update('guru', $data, ['id_guru' => $id]);
        return $this->db->affected_rows();
    }

//=================================================================

    public function getSiswa($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            return $this->db->get('siswa')->result_array();
        } 
        else {
            return $this->db->get_where('siswa', ['id_siswa' => $id])->result_array();
        }

    }

    public function inputSiswa($data)
    {
        # code...
        $this->db->insert('siswa', $data);
        return $this->db->affected_rows();
    }

    public function deleteSiswa($id)
    {
        # code...
        $this->db->delete('siswa', ['id_siswa' => $id]);
        return $this->db->affected_rows();
    }

    public function updateSiswa($data, $id)
    {
        # code...
        $this->db->update('siswa', $data, ['id_siswa' => $id]);
        return $this->db->affected_rows();
    }

//=================================================================

    public function getMateri($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            return $this->db->get('materi')->result_array();
        } 
        else {
            return $this->db->get_where('materi', ['id_materi' => $id])->result_array();
        }

    }

    public function inputMateri($data)
    {
        # code...
        $this->db->insert('materi', $data);
        return $this->db->affected_rows();
    }

    public function deleteMateri($id)
    {
        # code...
        $this->db->delete('materi', ['id_materi' => $id]);
        return $this->db->affected_rows();
    }

    public function updateMateri($data, $id)
    {
        # code...
        $this->db->update('materi', $data, ['id_materi' => $id]);
        return $this->db->affected_rows();
    }

//=============================================RestServer============================================================

    public function hitungGuru()
    {
        # code...
        $this->db->where('level', "guru");
        $this->db->from("guru");
        return $this->db->count_all_results();
    }

    public function hitungSiswa()
    {
        # code...
        return $this->db->count_all('siswa');
    }

    public function hitungBankSoal()
    {
        # code...
        return $this->db->count_all('input_banksoal');
    }

    public function hitungMateri()
    {
        # code...
        return $this->db->count_all('materi');
    }

    public function getAllKelas()
    {
        # code...
        $query = $this->db->get('kelas');
        return $query->result_array();
    }

    public function getMapel()
    {
        // code...
        return $this->db->get('mapel')->result_array();
        // return $query->result_array();
    }

  	public function getAllGuru()
    {
        // return $this->db->get_where('guru', array('level' => 'guru'))->result_array();

        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mapel', 'guru.id_mapel = mapel.id_mapel');
        $this->db->where('level', 'guru');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getGuruById($id)
    {
        # code...
        return $this->db->get_where('guru', array('level', 'id_guru' => 'guru', $id))->result_array();
    }

    public function guruById($id)
    {
        # code...
        return $this->db->get_where('guru', array('id_guru' => $id))->row_array();
    }

    public function tambahGuru()
    {
    	# code...
    	$this->id_guru = uniqid();
    	$data = [
    		"nip" => $this->input->post('nip', true),
    		"nama" => $this->input->post('nama', true),
            "id_mapel" => $this->input->post('mapel', true),
            "username" => $this->input->post('nip', true),
            "password" => $this->input->post('nip', true),
            "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
    		"level" => $this->input->post('level', true)
    	];

    	$this->db->insert('guru', $data);
    }

    public function hapusGuru($id)
    {
        # code...
        return $this->db->delete('guru', array("id_guru" => $id));
    }

    public function editGuru()
    {
        # code...
        $post = $this->input->post();

        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->id_mapel = $post["mapel"];
        $this->username = $post["username"];

        if (!empty($post["password"])) {
            $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        } else {
            $this->password = $post["password_lama"];
        }

        $this->db->update('guru', $this, array('id_guru' => $post["id_guru"]));
    }

//============================================================================================================

    public function getAllSiswa()
    {
    	$query = $this->db->get('siswa');
        return $query->result_array();
    }

    public function getSiswaById($id)
    {
        # code...
        return $this->db->get_where('siswa', array('id_siswa' => $id))->row_array();

    }

    public function tambahSiswa()
    {
    	# code...
    	$this->id_siswa = uniqid();
    	$data = [
    		"nis" => $this->input->post('nis', true),
    		"nama" => $this->input->post('nama', true),
            "kelas" => $this->input->post('kelas', true),
            "jurusan" => $this->input->post('jurusan', true),
            "username" => $this->input->post('nis', true),
            "password" => password_hash($this->input->post('password', true), PASSWORD_DEFAULT)
    	];

    	$this->db->insert('siswa', $data);
    }

    public function hapusSiswa($id)
    {
        # code...
        return $this->db->delete('siswa', array("id_siswa" => $id));
    }

    public function editSiswa()
    {
        # code...
        $post = $this->input->post();

        $this->nis = $post["nis"];
        $this->nama = $post["nama"];
        $this->kelas = $post["kelas"];
        $this->jurusan = $post["jurusan"];
        $this->username = $post["username"];
        
        if (!empty($post["password"])) {
            $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        } else {
            $this->password = $post["password_lama"];
        }

        $this->db->update('siswa', $this, array('id_siswa' => $post["id_siswa"]));
    }

//============================================================================================================

    public function getAllMapel()
    {
    	# code...
    	$query = $this->db->get('mapel');
        return $query->result_array();
    }

//============================================================================================================

    public function getAllJurusan()
    {
    	# code...
    	$query = $this->db->get('jurusan');
        return $query->result_array();
    }

//============================================================================================================

    public function getAllMateri()
    {
    	# code...
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('guru', 'materi.id_guru = guru.id_guru');
        $this->db->join('mapel', 'materi.id_mapel = mapel.id_mapel');
        $this->db->join('kelas', 'materi.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'materi.id_jurusan = jurusan.id_jurusan');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getMateriById($id)
    {
        # code...
        $query = $this->db->get_where('materi', array('id_materi' => $id));
        return $query->row_array();
    }

    public function tambahMateri()
    {
    	# code...
    	$this->id_materi = uniqid();
    	$data = [
            "id_guru" => $this->input->post('id_guru', true),
            "id_mapel" => $this->input->post('id_mapel', true),
    		"id_kelas" => $this->input->post('id_kelas', true),
    		"id_jurusan" => $this->input->post('id_jurusan', true),
    		"file1" => $this->uploadFile1(),
    		"file2" => $this->uploadFile2(),
    		"file3" => $this->uploadFile3()
    	];

    	$this->db->insert('materi', $data);
    }

    public function editMateri()
    {
        # code...
        $post = $this->input->post();

        $this->id_materi = $post["id_materi"];
        $this->id_mapel = $post["id_mapel"];
        $this->id_guru = $post["id_guru"];
        $this->id_kelas = $post["kelas"];
        $this->id_jurusan = $post["jurusan"];

        if (!empty($_FILES["file1"]["name"])) {
            $this->file1 = $this->uploadFile1();
        } else {
            $this->file1 = $post["old_f1"];
        }

        if (!empty($_FILES["file2"]["name"])) {
            $this->file2 = $this->uploadFile2();
        } else {
            $this->file2 = $post["old_f2"];
        }

        if (!empty($_FILES["file3"]["name"])) {
            $this->file3 = $this->uploadFile3();
        } else {
            $this->file3 = $post["old_f3"];
        }

        $this->db->update('materi', $this, array('id_materi' => $post["id_materi"]));
    }

    public function hapusMateri($id)
    {
        return $this->db->delete('materi', array("id_materi" => $id));
    }

    public function uploadFile1()
    {
    	# code...
    	$config['upload_path'] = './upload/materi/';
    	$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx|doc|pptx|xls|xlsx';
    	$config['filename'] = $this->id_materi;
    	$config['overwrite'] = true;
    	// $config['max_size'] = 10128;

    	$this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file1')) {
            return $this->upload->data("file_name");
        }
    }

    public function uploadFile2()
    {
    	# code...
    	$config['upload_path'] = './upload/materi/';
    	$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx|doc|pptx|xls|xlsx';
    	$config['filename'] = $this->id_materi;
    	$config['overwrite'] = true;
    	// $config['max_size'] = 10128;

    	$this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file2')) {
            return $this->upload->data("file_name");
        }
    }

    public function uploadFile3()
    {
    	# code...
    	$config['upload_path'] = './upload/materi/';
    	$config['allowed_types'] = 'jpg|jpeg|png|pdf|docx|doc|pptx|xls|xlsx';
    	$config['filename'] = $this->id_materi;
    	$config['overwrite'] = true;
    	// $config['max_size'] = 10128;

    	$this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file3')) {
            return $this->upload->data("file_name");
        }
    }

//============================================================================================================

    public function getSoal()
    {
        # code...
        $this->db->select('*');
        $this->db->from('input_banksoal');
        $this->db->join('guru', 'input_banksoal.id_guru = guru.id_guru');
        $this->db->join('mapel', 'input_banksoal.id_mapel = mapel.id_mapel');
        $this->db->join('kategori', 'input_banksoal.id_kategori = kategori.id_kategori', 'left');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSoalById($id)
    {
        # code...
        $this->db->select('*');
        $this->db->from('input_banksoal');
        $this->db->join('mapel', 'input_banksoal.id_mapel = mapel.id_mapel');
        $this->db->join('guru', 'input_banksoal.id_guru = guru.id_guru');
        $this->db->where('id_soal', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function tambahSoal()
    {
        # code...
        $this->id_soal = uniqid();
        $data = [
            "id_guru" => $this->input->post('id_guru', true),
            "id_mapel" => $this->input->post('id_mapel', true),
            "id_kategori" => $this->input->post('id_kategori', true),
            "status" => $this->input->post('status', true),
            "soal" => $this->input->post('soal', true),
            "file_soal" => $this->file_soal(),
            "pilihan_a" => $this->input->post('pilihan_a', true),
            "file_a" => $this->file_a(),
            "pilihan_b" => $this->input->post('pilihan_b', true),
            "file_b" => $this->file_b(),
            "pilihan_c" => $this->input->post('pilihan_c', true),
            "file_c" => $this->file_c(),
            "pilihan_d" => $this->input->post('pilihan_d', true),
            "file_d" => $this->file_d(),
            "pilihan_e" => $this->input->post('pilihan_e', true),
            "file_e" => $this->file_e(),
            "kunci" => $this->input->post('kunci', true),
            "tanggal" => $this->input->post('tanggal', true)
        ];

        $this->db->insert('input_banksoal', $data);
    }

    public function editSoal()
    {
        # code...
        $post = $this->input->post();

        $this->id_soal = $post["id_soal"];
        $this->id_guru = $post["id_guru"];
        $this->status = $post["status"];
        
        if (!empty($post["soal"])) {
            $this->soal = $post["soal"];
        } else {
            $this->soal = $post["s"];
        }

        if (!empty($_FILES["file_soal"]["name"])) {
            $this->file_soal = $this->file_soal();
        } else {
            $this->file_soal = $post["fs"];
        }

        $this->pilihan_a = $post["pilihan_a"];
        if (!empty($_FILES["file_a"]["name"])) {
            $this->file_a = $this->file_a();
        } else {
            $this->file_a = $post["a"];
        }

        $this->pilihan_b = $post["pilihan_b"];
        if (!empty($_FILES["file_b"]["name"])) {
            $this->file_b = $this->file_b();
        } else {
            $this->file_b = $post["b"];
        }

        $this->pilihan_c = $post["pilihan_c"];
        if (!empty($_FILES["file_c"]["name"])) {
            $this->file_c = $this->file_c();
        } else {
            $this->file_c = $post["c"];
        }

        $this->pilihan_d = $post["pilihan_d"];
        if (!empty($_FILES["file_d"]["name"])) {
            $this->file_d = $this->file_d();
        } else {
            $this->file_d = $post["d"];
        }

        $this->pilihan_e = $post["pilihan_e"];
        if (!empty($_FILES["file_e"]["name"])) {
            $this->file_e = $this->file_e();
        } else {
            $this->file_e = $post["e"];
        }

        $this->kunci = $post["kunci"];
        $this->tanggal = $post["tanggal"];

        $this->db->update('input_banksoal', $this, array('id_soal' => $post["id_soal"]));
    }

    public function file_soal()
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $this->id_soal;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file_soal')) {
            return $this->upload->data("file_name");
        }
    }
    public function file_a()
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $this->id_soal;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file_a')) {
            return $this->upload->data("file_name");
        }
    }
    public function file_b()
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $this->id_soal;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file_b')) {
            return $this->upload->data("file_name");
        }
    }
    public function file_c()
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $this->id_soal;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file_c')) {
            return $this->upload->data("file_name");
        }
    }
    public function file_d()
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $this->id_soal;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file_d')) {
            return $this->upload->data("file_name");
        }
    }
    public function file_e()
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $this->id_soal;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file_e')) {
            return $this->upload->data("file_name");
        }
    }

    public function hapusSoal($id)
    {
        # code...
        return $this->db->delete('input_banksoal', array("id_soal" => $id));
    }

}