<?php
class Model_Matakuliah extends CI_Model {
    public function read_data() {
        return $this->db->get('tbl_matakuliah');
    }

    public function count_data() {
        return $this->db->get('tbl_matakuliah')->num_rows();
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function get_kode_mk() {
        $this->db->select_max('kode_mk');

        $last_number_mk = $this->db->get('tbl_matakuliah')->row_array()['kode_mk'];
        $number_rows_mk = $this->db->get('tbl_matakuliah')->num_rows();

        if ($number_rows_mk > 0) {
            $number_mk = (int) substr($last_number_mk, 4, 4);
            $number_mk++;
        } else {
            $number_mk = 1;
        } 
        
        $str_mk = "TIF";
        $year_mk = date('y')-1;

        $new_number_mk = $str_mk. sprintf('%03s',$number_mk). '-' .$year_mk ; 

        return $new_number_mk;
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