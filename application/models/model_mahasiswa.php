<?php
class Model_Mahasiswa extends CI_Model {
    public function read_data() {
        return $this->db->get('tbl_mahasiswa');
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function form_edit($id, $table) {
        return $this->db->get_where($table, $id);
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