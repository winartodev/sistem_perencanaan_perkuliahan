<?php
class Model_Jadwal extends CI_Model {
    public function read_data() {
        return $this->db->from('tbl_jadwal')    ->join('tbl_kelas', 'tbl_kelas.id = tbl_jadwal.kode_kelas')
                                                ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_kelas.kode_dosen')
                                                ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_kelas.kode_mk')
                                                ->where('npm', $this->session->userdata('npm'))
                                                ->get()->result();
    }
}