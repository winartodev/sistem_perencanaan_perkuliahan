<?php 
class Model_Rencana extends CI_Model {
    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function check_duplicate_data($data) {
        $this->db->where($data);
        return $this->db->get('tbl_perencanaan');       
    }

    public function read_data($table) {
        return $this->db->get($table);
    }

    public function get_kode_kelas() {
        return $this->db->from('tbl_perencanaan')   ->join('tbl_kelas', 'tbl_kelas.id = tbl_perencanaan.kode_kelas')
                                                    ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_kelas.kode_mk')
                                                    ->where('tbl_perencanaan.npm', $this->session->userdata('npm'))
                                                    ->get(); 
    } 

    public function delete_data($id, $table) {
        $this->db->where($id);
        $this->db->delete($table);
    }
}