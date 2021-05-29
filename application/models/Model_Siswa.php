<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Admin extends CI_Model {

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

//=========================================================================================

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

}