<?php
ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Admin extends CI_Model {

    public function hitungGuru()
    {
        # code...
        $this->db->where('level', 'guru');
        $this->db->from('guru');
        return $this->db->count_all_results();
    }

    public function hitungSiswa()
    {
        # code...
        return $this->db->count_all_results('siswa');
    }

    public function hitungBankSoal()
    {
        # code...
        return $this->db->count_all('bank_soal');
    }

    public function hitungMateri()
    {
        # code...
        return $this->db->count_all('materi');
    }

    public function hitungUjian()
    {
        // code...
        return $this->db->count_all('ujian');
    }
    
    public function hitungHasilUjian()
    {
        // code...
        $this->db->from('ujian_hasil');
        $this->db->group_by('id_ujian');
        return $this->db->count_all_results();
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

    public function getAllMapel()
    {
        # code...
        $query = $this->db->get('mapel');
        return $query->result_array();
    }

    public function getAllJurusan()
    {
        # code...
        $query = $this->db->get('jurusan');
        return $query->result_array();
    }

//============================================================================================================

    public function getAllGuru()
    {
        // return $this->db->get_where('guru', array('level' => 'guru'))->result_array();

        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mapel', 'guru.id_mapel = mapel.id_mapel', 'left');
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
        // return $this->db->get_where('guru', array('id_guru' => $id))->row_array();

        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mapel', 'guru.id_mapel = mapel.id_mapel', 'left');
        $this->db->where('id_guru', $id);
        $query = $this->db->get();

        return $query->row_array();
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
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSiswaById($id)
    {
        # code...
        // return $this->db->get_where('siswa', array('id_siswa' => $id))->row_array();

        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
        $this->db->where('id_siswa', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function tambahSiswa()
    {
        # code...
        $this->id_siswa = uniqid();
        $data = [
            "nis" => $this->input->post('nis', true),
            "nama" => $this->input->post('nama', true),
            "id_kelas" => $this->input->post('kelas', true),
            "id_jurusan" => $this->input->post('jurusan', true),
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
        $this->id_kelas = $post["kelas"];
        $this->id_jurusan = $post["jurusan"];
        $this->username = $post["username"];
        
        if (!empty($post["password"])) {
            $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        } else {
            $this->password = $post["password_lama"];
        }

        $this->db->update('siswa', $this, array('id_siswa' => $post["id_siswa"]));
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
        $this->id_guru = $post["id_guru"];
        $this->id_mapel = $post["id_mapel"];
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
        $this->db->from('bank_soal');
        $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
        $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->join('mapel', 'bank_soal.id_mapel = mapel.id_mapel');
        $this->db->join('kategori', 'bank_soal.id_kategori = kategori.id_kategori', 'left');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSoalById($id)
    {
        # code...
        $this->db->select('*');
        $this->db->from('bank_soal');
        $this->db->join('mapel', 'bank_soal.id_mapel = mapel.id_mapel');
        $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
        $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->where('id_soal', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function tambahSoal($kunci)
    {
        # code...
        $this->id_soal = uniqid();
        $data = [
            "id_guru" => $this->input->post('id_guru', true),
            "id_mapel" => $this->input->post('id_mapel', true),
            "id_kategori" => $this->input->post('id_kategori', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "id_jurusan" => $this->input->post('id_jurusan', true),
            "status" => $this->input->post('status', true),
            "soal" => $this->input->post('soal', true),
            "file_soal" => $this->file_soal(),
            "pilihan_a" => $this->input->post('pilihan_a', true),
            "file_a" => $this->file_a($this->id_soal),
            "pilihan_b" => $this->input->post('pilihan_b', true),
            "file_b" => $this->file_b($this->id_soal),
            "pilihan_c" => $this->input->post('pilihan_c', true),
            "file_c" => $this->file_c($this->id_soal),
            "pilihan_d" => $this->input->post('pilihan_d', true),
            "file_d" => $this->file_d($this->id_soal),
            "pilihan_e" => $this->input->post('pilihan_e', true),
            "file_e" => $this->file_e($this->id_soal),
            "kunci" => $kunci,
            "nilai" => $this->input->post('nilai', true),
            "tanggal" => $this->input->post('tanggal', true)
        ];

        $this->db->insert('bank_soal', $data);
    }

    public function editSoal($kunci)
    {
        # code...
        $post = $this->input->post();

        $this->id_soal = $post["id_soal"];
        $this->id_guru = $post["id_guru"];
        $this->id_kelas = $post["id_kelas"];
        $this->id_jurusan = $post["id_jurusan"];

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
            $this->file_a = $this->file_a($this->id_soal);
        } else {
            $this->file_a = $post["a"];
        }

        $this->pilihan_b = $post["pilihan_b"];
        if (!empty($_FILES["file_b"]["name"])) {
            $this->file_b = $this->file_b($this->id_soal);
        } else {
            $this->file_b = $post["b"];
        }

        $this->pilihan_c = $post["pilihan_c"];
        if (!empty($_FILES["file_c"]["name"])) {
            $this->file_c = $this->file_c($this->id_soal);
        } else {
            $this->file_c = $post["c"];
        }

        $this->pilihan_d = $post["pilihan_d"];
        if (!empty($_FILES["file_d"]["name"])) {
            $this->file_d = $this->file_d($this->id_soal);
        } else {
            $this->file_d = $post["d"];
        }

        $this->pilihan_e = $post["pilihan_e"];
        if (!empty($_FILES["file_e"]["name"])) {
            $this->file_e = $this->file_e($this->id_soal);
        } else {
            $this->file_e = $post["e"];
        }

        $this->kunci = $kunci;
        $this->nilai = $post["nilai"];
        $this->tanggal = $post["tanggal"];

        $this->db->update('bank_soal', $this, array('id_soal' => $post["id_soal"]));
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
    public function file_a($id)
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $id;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file_a')) {
            return $this->upload->data("file_name");
        }
    }
    public function file_b($id)
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $id;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file_b')) {
            return $this->upload->data("file_name");
        }
    }
    public function file_c($id)
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $id;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file_c')) {
            return $this->upload->data("file_name");
        }
    }
    public function file_d($id)
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $id;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file_d')) {
            return $this->upload->data("file_name");
        }
    }
    public function file_e($id)
    {
        # code...
        $config['upload_path'] = './upload/soal/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['filename'] = $id;
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
        return $this->db->delete('bank_soal', array("id_soal" => $id));
    }


//============================================================================================================

    

    public function getSoalLatihan($guru, $kelas, $jurusan)
    {
        // code...
        $this->db->select('*');
        $this->db->from('bank_soal');
        $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
        $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan');
        $this->db->join('kategori', 'bank_soal.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('bank_soal.id_guru', $guru);
        $this->db->where('bank_soal.id_kelas', $kelas);
        $this->db->where('bank_soal.id_jurusan', $jurusan);
        $this->db->where('bank_soal.id_ujian', null);
        $this->db->where_not_in('bank_soal.status', "Latihan");
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSoalUjian($id)
    {
        // code...
        $this->db->select('*');
        $this->db->from('bank_soal');
        $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
        $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan');
        $this->db->join('kategori', 'bank_soal.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('bank_soal.status', 'Ujian');
        $this->db->where('bank_soal.id_ujian', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getUjian()
    {
        // code...
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('guru', 'ujian.id_guru = guru.id_guru');
        $this->db->join('mapel', 'ujian.id_mapel = mapel.id_mapel');
        $this->db->join('kelas', 'ujian.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'ujian.id_jurusan = jurusan.id_jurusan', 'left');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getUjianById($id)
    {
        // code...
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('guru', 'ujian.id_guru = guru.id_guru');
        $this->db->join('mapel', 'ujian.id_mapel = mapel.id_mapel');
        $this->db->join('kelas', 'ujian.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'ujian.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->where('id_ujian', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function hitungSoalUjian($id)
    {
        // code...
        $this->db->where('id_ujian', $id);
        $this->db->where('bank_soal.status', 'Ujian');
        $this->db->from('bank_soal');
        return $this->db->count_all_results();
    }

    public function tambahSoalUjian($kunci)
    {
        // code...
        $this->id_soal = uniqid();
        $data = [
            "id_guru" => $this->input->post('id_guru', true),
            "id_mapel" => $this->input->post('id_mapel', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "id_jurusan" => $this->input->post('id_jurusan', true),
            "id_ujian" => $this->input->post('id_ujian', true),
            "status" => $this->input->post('status', true),
            "soal" => $this->input->post('soal', true),
            "file_soal" => $this->file_soal(),
            "pilihan_a" => $this->input->post('pilihan_a', true),
            "file_a" => $this->file_a($this->id_soal),
            "pilihan_b" => $this->input->post('pilihan_b', true),
            "file_b" => $this->file_b($this->id_soal),
            "pilihan_c" => $this->input->post('pilihan_c', true),
            "file_c" => $this->file_c($this->id_soal),
            "pilihan_d" => $this->input->post('pilihan_d', true),
            "file_d" => $this->file_d($this->id_soal),
            "pilihan_e" => $this->input->post('pilihan_e', true),
            "file_e" => $this->file_e($this->id_soal),
            "kunci" => $kunci,
            "nilai" => $this->input->post('nilai', true),
            "tanggal" => $this->input->post('tanggal', true)
        ];

        $this->db->insert('bank_soal', $data);
    }

    public function buatUjian($id)
    {
        // code...
        $this->id_ujian = uniqid();

        $data = array(
            'id_guru' => $id
        );

        $this->db->insert('ujian', $data);
    }

    public function tambahUjian()
    {
        // code...
        $a = $this->input->post('waktu_mulai');
        $b = strtotime($a);

        $d = $this->input->post('durasi');
        $e = 60 * $d;

        $x = $b + $e;
        $z = date("Y-m-d H:i:s", $x);

        $this->id_ujian = uniqid();
        $data = [
            "judul_ujian" => $this->input->post('judul', true),
            "id_guru" => $this->input->post('id_guru', true),
            "id_mapel" => $this->input->post('id_mapel', true),
            "id_kelas" => $this->input->post('kelas', true),
            "id_jurusan" => $this->input->post('jurusan', true),
            "durasi" => $this->input->post('durasi', true),
            "jenis" => $this->input->post('jenis', true),
            "waktu_mulai" => $this->input->post('waktu_mulai', true),
            "waktu_selesai" => $z,
            "token" => $this->input->post('token', true),
        ];

        $this->db->insert('ujian', $data);
    }

    public function editUjian()
    {
        // code...
        $a = $this->input->post('waktu_mulai');
        $b = strtotime($a);

        $d = $this->input->post('durasi');
        $e = 60 * $d;

        $x = $b + $e;
        $z = date("Y-m-d H:i:s", $x);

        $post = $this->input->post();

        $this->judul_ujian = $post["judul"];
        $this->id_ujian = $post["id_ujian"];
        $this->id_guru = $post["id_guru"];
        $this->id_mapel = $post["id_mapel"];
        $this->id_kelas = $post["id_kelas"];
        $this->id_jurusan = $post["id_jurusan"];
        $this->durasi = $post["durasi"];
        $this->jenis = $post["jenis"];
        $this->waktu_mulai = $post["waktu_mulai"];
        $this->waktu_selesai = $z;
        $this->token = $post["token"];

        $this->db->update('ujian', $this, array('id_ujian' => $post["id_ujian"]));
    }

    public function hapusUjian($id)
    {
        // code...
        return $this->db->delete('ujian', array("id_ujian" => $id));
    }
    
    public function getHasilUjian()
    {
        // code...
        $this->db->select('*');
        $this->db->from('ujian_hasil');
        $this->db->join('ujian', 'ujian_hasil.id_ujian = ujian.id_ujian');
        $this->db->join('guru', 'ujian.id_guru = guru.id_guru');
        $this->db->join('mapel', 'ujian.id_mapel = mapel.id_mapel');
        $this->db->join('kelas', 'ujian.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'ujian.id_jurusan = jurusan.id_jurusan');
        $this->db->group_by('ujian_hasil.id_ujian');
        $this->db->order_by('ujian_hasil.id_ujian');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function judul_ujian($id)
    {
        // code...
        return $this->db->get_where('ujian', array('id_ujian' => $id))->row_array();
    }

    public function getDetailHasilUjian($id)
    {
        // code...
        $this->db->select('*');
        $this->db->from('ujian_hasil');
        $this->db->join('ujian', 'ujian_hasil.id_ujian = ujian.id_ujian');
        $this->db->join('siswa', 'ujian_hasil.id_siswa = siswa.id_siswa');
        $this->db->join('mapel', 'ujian.id_mapel = mapel.id_mapel');
        $this->db->join('kelas', 'ujian.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'ujian.id_jurusan = jurusan.id_jurusan');
        $this->db->where('ujian.id_ujian', $id);
        $this->db->group_by('ujian_hasil.id_siswa');
        $this->db->order_by('ujian_hasil.nilai', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    
    
    
    
    public function getSiswaByKelJur($kls, $jrs)
    {
        // code...
        $this->db->select('*');
        $this->db->from('ujian_hasil');
        $this->db->join('siswa', 'ujian_hasil.id_siswa = siswa.id_siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
        $this->db->where('siswa.id_kelas', $kls);
        $this->db->where('siswa.id_jurusan', $jrs);
        $this->db->group_by('siswa.id_siswa');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function getSiswaSudahUjian($id_guru) {
        $this->db->select('*');
        $this->db->from('ujian_hasil');
        $this->db->join('ujian', 'ujian_hasil.id_ujian = ujian.id_ujian');
        $this->db->join('siswa', 'ujian_hasil.id_siswa = siswa.id_siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
        $this->db->where('ujian.id_guru', $id_guru);
        $this->db->group_by('siswa.id_siswa');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function getHasilNilai($id_siswa, $id_guru)
    {
        // code...
        $this->db->select('ujian.judul_ujian, hsl.nilai, s.nama');
        $this->db->from('ujian_hasil hsl');
        $this->db->join('ujian', 'hsl.id_ujian = ujian.id_ujian');
        $this->db->join('siswa s', 'hsl.id_siswa = s.id_siswa');
        $this->db->join('guru g', 'ujian.id_guru = g.id_guru');
        $this->db->join('mapel', 'g.id_mapel = mapel.id_mapel');
        $this->db->where('s.id_siswa', $id_siswa);
        $this->db->where('g.id_guru', $id_guru);
        $this->db->group_by('ujian.id_ujian');
        $this->db->order_by('hsl.id', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
    
    public function hitungHasilNilai($id_siswa, $id_guru)
    {
        // code...
        // $this->db->select('*');
        $this->db->where('siswa.id_siswa', $id_siswa);
        $this->db->where('guru.id_guru', $id_guru);
        $this->db->from('ujian_hasil');
        $this->db->join('ujian', 'ujian_hasil.id_ujian = ujian.id_ujian');
        $this->db->join('siswa', 'ujian_hasil.id_siswa = siswa.id_siswa');
        $this->db->join('guru', 'ujian.id_guru = guru.id_guru');
        $this->db->join('mapel', 'guru.id_mapel = mapel.id_mapel');
        // $this->db->group_by('ujian.id_ujian');
        return $this->db->count_all_results();
    }

}