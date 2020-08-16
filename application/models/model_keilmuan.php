<?php
class Model_Keilmuan extends CI_Model {
    public function read_data() {
        return $this->db->from('tbl_keilmuan')  ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_keilmuan.kode_mk')
                                                ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_keilmuan.kode_dosen')
                                                ->get()->result(); 
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function form_edit($id, $table) {
        $data = $this->db->where($id);
        $data = $this->db->from($table) ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_keilmuan.kode_mk')
                                        ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_keilmuan.kode_dosen')
                                        ->get(); 
        return $data->result();
    }

    public function filter_data($id) 
    {
        $data = $this->db->from('tbl_keilmuan') ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_keilmuan.kode_mk')
                                                ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_keilmuan.kode_dosen')
                                                ->where('tbl_keilmuan.kode_mk', $id)
                                                ->get(); 
        return $data->result();
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
}