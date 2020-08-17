<?php
class Model_Verifikasi_Perencanaan extends CI_Model {

    public function read_data() {
        return $this->db->from('tbl_verifikasi_perencanaan')    ->join('tbl_kelas', 'tbl_verifikasi_perencanaan.kode_kelas = tbl_kelas.id')
                                                                ->join('tbl_matakuliah', 'tbl_kelas.kode_mk = tbl_matakuliah.kode_mk')
                                                                ->join('tbl_dosen', 'tbl_kelas.kode_dosen = tbl_dosen.kode_dosen')
                                                                ->join('tbl_mahasiswa', 'tbl_verifikasi_perencanaan.npm = tbl_mahasiswa.npm')
                                                                ->get()->result(); 
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function form_edit($id, $table) {
        return $this->db->get_where($table, $id)->result();
    }

    public function form_info($id, $table) {
        return $this->db->get_where($table, $id);
    }

    public function update_data($id, $data, $table) {
        $this->db->where($id);
        $this->db->update($table, $data);
    }

    public function delete_data($id, $table) {
        $this->db->where($id);
        $this->db->delete($table);
    }

    public function info_kelas_baak ($id, $table) {
        $data = $this->db->where($id);
        $data = $this->db->from($table) ->join('tbl_verifikasi_perencanaan', 'tbl_verifikasi_perencanaan.kode_kelas = tbl_kelas.id')
                                        ->get(); 
        return $data->result();
    }

    public function get_data_perencanaan($id, $filed) {
        $this->db->select($filed);
        $this->db->where('kode_kelas', $id);
        $res = $this->db->get('tbl_verifikasi_perencanaan');

        return $res->row()->$filed;
    }
}