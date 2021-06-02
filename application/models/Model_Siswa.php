<?php
ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Siswa extends CI_Model {

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

    public function getMateri($id = null)
    {
        # code...
        if ($id === null) {
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
        else {
            # code...
            $this->db->select('*');
            $this->db->from('materi');
            $this->db->join('guru', 'materi.id_guru = guru.id_guru');
            $this->db->join('mapel', 'materi.id_mapel = mapel.id_mapel');
            $this->db->join('kelas', 'materi.id_kelas = kelas.id_kelas');
            $this->db->join('jurusan', 'materi.id_jurusan = jurusan.id_jurusan');
            $this->db->where('id_materi', $id);
            $query = $this->db->get();

            return $query->result_array();
        }

    }

}