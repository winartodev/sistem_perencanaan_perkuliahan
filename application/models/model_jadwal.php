<?php 
class Model_Jadwal extends CI_Model {
    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function read_data($table) {
        return $this->db->get($table);
    }

    public function get_kode_kelas() {
        return $this->db->from('tbl_jadwal_tmp')    ->join('tbl_kelas', 'tbl_kelas.no = tbl_jadwal_tmp.kode_kelas')
                                                    ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_kelas.kode_mk')
                                                    ->get(); 
    } 

    public function delete_data($id, $table) {
        $this->db->where($id);
        $this->db->delete($table);
    }
}