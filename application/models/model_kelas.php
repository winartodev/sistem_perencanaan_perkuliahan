<?php 
class Model_Kelas extends CI_Model {
    public function read_data() {
        return $this->db->from('tbl_kelas') ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_kelas.kode_mk')
                                            ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_kelas.kode_dosen')
                                            ->join('tbl_kelompok', 'tbl_kelompok.kode_kelompok = tbl_kelas.kode_kelompok')
                                            ->order_by('no', 'asc')
                                            ->get(); 
    }

    public function get_nama_Kelompok() {
        return $this->db->get('tbl_kelompok');
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function form_edit($id, $table) {
        $data = $this->db->where($id);
        $data = $this->db->from($table) ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_kelas.kode_mk')
                                        ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_kelas.kode_dosen')
                                        ->join('tbl_kelompok', 'tbl_kelompok.kode_kelompok = tbl_kelas.kode_kelompok')
                                        ->get(); 
        return $data;
    }

    public function update_data($id, $data, $table) {
        $this->db->where($id);
        $this->db->update($table, $data);
    }

    public function delete_data($id, $table) {
        $this->db->where($id);
        $this->db->delete($table);
    }

}