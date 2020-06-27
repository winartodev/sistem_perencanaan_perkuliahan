<?php 
class Model_Dosen extends CI_Model {
    public function read_data() {
        return $this->db->get('tbl_dosen');
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function get_kode_dsn() {
        $this->db->select_max('kode_dosen');

       $last_number_dosen = $this->db->get('tbl_dosen')->row_array()['kode_dosen'];
       $number_rows_dosen = $this->db->get('tbl_dosen')->num_rows();
       if ($number_rows_dosen == 0) {
           $number_dosen = 1;
       } else {
           $number_dosen = (int) substr($last_number_dosen, -4, 4);
           $number_dosen++;
       }

       $new_number_mk = 'DSN'.sprintf('%03s',$number_dosen);

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