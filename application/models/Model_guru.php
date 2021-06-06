<?php
ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Guru extends CI_Model {

    public function getAllKelas()
    {
        # code...
        $query = $this->db->get('kelas');
        return $query->result_array();
    }

//============================================================================================================

    public function getGuru($id)
    {
    	# code...
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mapel', 'guru.id_mapel = mapel.id_mapel');
        $this->db->where('id_guru', $id);
        $query = $this->db->get();

        return $query->row_array();
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



    public function hitungMateri($id)
    {
        # code...
        $this->db->where('id_guru', $id);
        $this->db->from("materi");
        return $this->db->count_all_results();
    }

    public function getAllMateri($id)
    {
    	# code...
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('guru', 'materi.id_guru = guru.id_guru');
        $this->db->join('mapel', 'materi.id_mapel = mapel.id_mapel', 'left');
        $this->db->join('kelas', 'materi.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'materi.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->where('materi.id_guru', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getMateriById($id)
    {
        # code...
        $this->db->select('*');
        $this->db->from('materi');
        $this->db->join('guru', 'materi.id_guru = guru.id_guru');
        $this->db->join('mapel', 'materi.id_mapel = mapel.id_mapel', 'left');
        $this->db->join('kelas', 'materi.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'materi.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->where('materi.id_materi', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function tambahMateri()
    {
    	# code...
    	$this->id_materi = uniqid();
    	$data = [
    		"id_guru" => $this->input->post('id_guru', true),
            "id_mapel" => $this->input->post('id_mapel', true),
    		"id_kelas" => $this->input->post('kelas', true),
    		"id_jurusan" => $this->input->post('jurusan', true),
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

    	$this->upload->initialize($config);

        $this->load->library('upload', $config);
        
        if ($this->upload->do_upload('file3')) {
            return $this->upload->data("file_name");
        }
    }



//============================================================================================================



    public function update_akun($id)
    {
    	# code..
        $post = $this->input->post();

        $this->nip = $post["nip"];
        $this->nama = $post["nama"];
        $this->username = $post["username"];
    		
        if (!empty($post["password"])) {
            $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        } else {
            $this->password = $post["password_lama"];
        }

        $this->db->update('guru', $this, array('id_guru' => $post["id_guru"]));
    }



//============================================================================================================



    public function hitungSoalById($id)
    {
        # code...
        $this->db->where('id_guru', $id);
        $this->db->from("bank_soal");
        return $this->db->count_all_results();
    }

    public function getSoal($id)
    {
        # code...
        $this->db->select('*');
        $this->db->from('bank_soal');
        $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
        $this->db->join('mapel', 'bank_soal.id_mapel = mapel.id_mapel');
        $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->join('kategori', 'bank_soal.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('guru.id_guru', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function totalSoalUjian($id)
    {
        // code...
        $this->db->select('*');
        $this->db->from('bank_soal');
        $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
        $this->db->join('mapel', 'bank_soal.id_mapel = mapel.id_mapel');
        $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->join('kategori', 'bank_soal.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('guru.id_guru', $id);
        $this->db->where('status', 'Ujian');

        return $this->db->count_all_results();
    }

    public function getSoalById($id)
    {
        # code...
        $this->db->select('*');
        $this->db->from('bank_soal');
        $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
        $this->db->join('mapel', 'bank_soal.id_mapel = mapel.id_mapel');
        $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->join('kategori', 'bank_soal.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('id_soal', $id);
        $query = $this->db->get();

        return $query->row_array();
    }

    public function kategori($id)
    {
        // code...
        $this->db->where('id_guru', $id);
        $this->db->from("kategori");
        return $this->db->count_all_results();
    }

    public function getKategori($id)
    {
        // code...
        return $this->db->get_where('kategori', array('id_guru' => $id))->result_array();
    }

    public function tambahKategori()
    {
        // code...
        $this->id_kategori = uniqid();
        $data = [
            "kategori" => $this->input->post('kategori', true),
            "id_guru" => $this->input->post('id_guru', true)
        ];

        $this->db->insert('kategori', $data);
    }

    public function hapusKategori($id)
    {
        // code...
        return $this->db->delete('kategori', array("id_kategori" => $id));
    }

    public function editKategori()
    {
        // code...
        $post = $this->input->post();

        $this->id_kategori = $post["id_kategori"];
        $this->kategori = $post["kategori"];

        $this->db->update('kategori', $this, array('id_kategori' => $post["id_kategori"]));
    }

    public function hapusSoal($id)
    {
        # code...
        return $this->db->delete('bank_soal', array("id_soal" => $id));
    }

    public function tambahSoal()
    {
        # code...
        $this->id_soal = uniqid();
        $data = [
            "id_guru" => $this->input->post('guru', true),
            "id_mapel" => $this->input->post('id_mapel', true),
            "id_kategori" => $this->input->post('id_kategori', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "id_jurusan" => $this->input->post('id_jurusan', true),
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

        $this->db->insert('bank_soal', $data);
    }

    public function editSoal()
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



//============================================================================================================



    public function getUjianGuru($id)
    {
        // code...
        $this->db->select('*');
        $this->db->from('ujian');
        $this->db->join('guru', 'ujian.id_guru = guru.id_guru');
        $this->db->join('mapel', 'ujian.id_mapel = mapel.id_mapel');
        $this->db->join('kelas', 'ujian.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'ujian.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->where('guru.id_guru', $id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function tambahUjian()
    {
        // code...
        $this->id_ujian = uniqid();
        $data = [
            "id_guru" => $this->input->post('id_guru', true),
            "id_mapel" => $this->input->post('id_mapel', true),
            "id_kelas" => $this->input->post('kelas', true),
            "id_jurusan" => $this->input->post('jurusan', true),
            "jumlah_soal" => $this->input->post('jumlah', true),
            "durasi" => $this->input->post('durasi', true),
            "jenis" => $this->input->post('jenis', true),
            "waktu_mulai" => $this->input->post('waktu_mulai', true),
            "token" => $this->input->post('token', true),
        ];

        $this->db->insert('ujian', $data);
    }
}