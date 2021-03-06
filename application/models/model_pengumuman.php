<?php
class Model_Pengumuman extends CI_Model {
    public function read_data() {
        return $this->db->get('tbl_pengumuman')->result();
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function form_edit($id, $table) {
        return $this->db->get_where($table, $id)->result();
    }

    public function info_data($id, $table) {
        return $this->db->get_where($table, $id)->result();
    }

    public function count_data() {
        return $this->db->get('tbl_pengumuman')->num_rows();
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