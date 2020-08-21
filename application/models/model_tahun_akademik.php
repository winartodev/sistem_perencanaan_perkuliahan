<?php 
class Model_Tahun_Akademik extends CI_Model {
    public function read_data() 
    {
        return $this->db->get('tbl_tahun_akademik');
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function form_edit($id, $table) 
    {
        return $this->db->get_where($table, $id)->result();
    }

    public function update_data($id, $data, $table) {
        $this->db->where($id);
        $this->db->update($table, $data);
    }

    public function count_data() {
        return $this->db->get('tbl_tahun_akademik')->num_rows();
    }

    public function get_tahun_akademik() {
       return $this->db->get('tbl_tahun_akademik')->row_array()['tahun_akademik'];
    }

    public function get_semester() {
        return $this->db->get('tbl_tahun_akademik')->row_array()['semester'];
     }
}