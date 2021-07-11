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

    public function updateSiswa($data, $id)
    {
        // code...
        $this->db->update('siswa', $data, ['id_siswa' => $id]);
        return $this->db->affected_rows();
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
    
    public function getBankSoal($kls, $jrs)
    {
        // code...
        if ($kls != null & $jrs != null) {

            $this->db->select('*');
            $this->db->from('bank_soal');
            $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
            $this->db->join('mapel', 'bank_soal.id_mapel = mapel.id_mapel');
            $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas');
            $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan');
            $this->db->where('kelas.id_kelas', $kls);
            $this->db->where('jurusan.id_jurusan', $jrs);
            $this->db->where('bank_soal.status', 'Latihan');
            $this->db->order_by('id_soal', 'RANDOM');
            $query = $this->db->get();

            return $query->result_array();
        }
    }

//=========================================================================================

    public function getUjian($kls, $jrs)
    {
        // code...
        if ($kls != null & $jrs != null) {
            $this->db->select('*');
            $this->db->from('ujian');
            $this->db->join('guru', 'ujian.id_guru = guru.id_guru');
            $this->db->join('mapel', 'ujian.id_mapel = mapel.id_mapel');
            $this->db->join('kelas', 'ujian.id_kelas = kelas.id_kelas');
            $this->db->join('jurusan', 'ujian.id_jurusan = jurusan.id_jurusan');
            $this->db->where('kelas.id_kelas', $kls);
            $this->db->where('jurusan.id_jurusan', $jrs);
            $query = $this->db->get();

            return $query->result_array();
        }
    }

    
    public function getSoalUjian($id, $jns)
    {
        // code...
        if ($jns == 'acak') {
            $this->db->select('*');
            $this->db->from('bank_soal');
            $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
            $this->db->join('mapel', 'bank_soal.id_mapel = mapel.id_mapel');
            $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas');
            $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan');
            $this->db->join('ujian', 'bank_soal.id_ujian = ujian.id_ujian');
            $this->db->where('bank_soal.status', 'Ujian');
            $this->db->where('ujian.id_ujian', $id);
            $this->db->order_by('id_soal', 'RANDOM');
            $query = $this->db->get();
    
            return $query->result_array();
        }
        else {
            $this->db->select('*');
            $this->db->from('bank_soal');
            $this->db->join('guru', 'bank_soal.id_guru = guru.id_guru');
            $this->db->join('mapel', 'bank_soal.id_mapel = mapel.id_mapel');
            $this->db->join('kelas', 'bank_soal.id_kelas = kelas.id_kelas');
            $this->db->join('jurusan', 'bank_soal.id_jurusan = jurusan.id_jurusan');
            $this->db->join('ujian', 'bank_soal.id_ujian = ujian.id_ujian');
            $this->db->where('bank_soal.status', 'Ujian');
            $this->db->where('ujian.id_ujian', $id);
            $query = $this->db->get();
    
            return $query->result_array();
        }
        
    }
    
//=========================================================================================

    public function getHasilUjian($id)
    {
        // code...
        $this->db->select('*');
        $this->db->from('ujian_hasil');
        $this->db->join('ujian', 'ujian_hasil.id_ujian = ujian.id_ujian');
        $this->db->join('guru', 'ujian.id_guru = guru.id_guru');
        $this->db->join('mapel', 'ujian.id_mapel = mapel.id_mapel');
        $this->db->join('kelas', 'ujian.id_kelas = kelas.id_kelas');
        $this->db->join('jurusan', 'ujian.id_jurusan = jurusan.id_jurusan');
        $this->db->where('ujian_hasil.id_siswa', $id);
        $this->db->group_by('ujian_hasil.id_ujian');
        $this->db->group_by('ujian_hasil.id_siswa');
        $this->db->order_by('ujian_hasil.id_ujian');
        $query = $this->db->get();

        return $query->result_array();
    }
    
//=========================================================================================

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

//=========================================================================================

    public function cek_siswa($idsiswa)
    {
        // code...
        $this->db->select('*');
        $this->db->from('ujian_hasil');
        $this->db->join('ujian', 'ujian.id_ujian = ujian_hasil.id_ujian');
        $this->db->where('id_siswa', $idsiswa);
        $query = $this->db->get();


        return $query->result_array();
    }

}
