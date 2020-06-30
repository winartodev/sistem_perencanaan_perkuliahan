<?php
class Model_Baak extends CI_Model {
    public function read_data($table) {
        return $this->db->get($table);
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function form_edit($where, $table) {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }
}