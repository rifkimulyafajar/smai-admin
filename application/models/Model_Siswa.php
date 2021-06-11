<?php
ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Siswa extends CI_Model {
    
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
        $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan', 'left');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getSiswa($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            $this->db->select('*');
            $this->db->from('siswa');
            $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
            $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
            $query = $this->db->get();

            return $query->result_array();
        } 
        else {
            $this->db->select('*');
            $this->db->from('siswa');
            $this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
            $this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
            $this->db->where('id_siswa', $id);
            $query = $this->db->get();

            return $query->row_array();
        }

    }

//=========================================================================================
    
    public function getMat($kls, $jrs)
    {
        // code...
        if ($kls != null & $jrs != null) {

            $this->db->select('*');
            $this->db->from('materi');
            $this->db->join('guru', 'materi.id_guru = guru.id_guru');
            $this->db->join('mapel', 'materi.id_mapel = mapel.id_mapel');
            $this->db->join('kelas', 'materi.id_kelas = kelas.id_kelas');
            $this->db->join('jurusan', 'materi.id_jurusan = jurusan.id_jurusan');
            $this->db->where('kelas.id_kelas', $kls);
            $this->db->where('jurusan.id_jurusan', $jrs);
            $query = $this->db->get();

            return $query->result_array();
        }
    }
    
//=========================================================================================
    
    public function getBankSoal($id, $kls, $jrs)
    {
        // code...
        if ($id == null & $kls != null & $jrs != null) {

            $this->db->select('*');
            $this->db->from('bank_soal');
            $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
            $this->db->join('mapel', 'bank_soal.id_mapel = mapel.id_mapel');
            $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas');
            $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan');
            $this->db->where('kelas.id_kelas', $kls);
            $this->db->where('jurusan.id_jurusan', $jrs);
            $query = $this->db->get();

            return $query->result_array();
        }

        elseif ($id != null & $kls == null & $jrs == null) {

            $this->db->select('*');
            $this->db->from('bank_soal');
            $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
            $this->db->join('mapel', 'bank_soal.id_mapel = mapel.id_mapel');
            $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas');
            $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan');
            $this->db->where('id_soal', $id);
            $query = $this->db->get();

            return $query->result_array();
        }
    }

}