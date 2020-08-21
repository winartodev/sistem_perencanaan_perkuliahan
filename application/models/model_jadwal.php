<?php
class Model_Jadwal extends CI_Model {
    public function read_data() {
        return $this->db->from('tbl_jadwal')    ->join('tbl_perencanaan', 'tbl_perencanaan.id_perencanaan = tbl_jadwal.id_perencanaan')
                                                ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_perencanaan.kode_dosen')
                                                ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_perencanaan.kode_mk')
                                                ->join('tbl_kelas', 'tbl_kelas.id = tbl_perencanaan.kode_kelas')
                                                ->where('npm', $this->session->userdata('npm'))
                                                ->get()->result();
    }

    public function jumlah_mahasiswa($id)
    {
        $data =  $this->db->get_where('tbl_jadwal', array('id_perencanaan' => $id))->num_rows();

        return $data;
    }
}