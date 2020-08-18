<?php 
class Model_Dosen extends CI_Model {
    public function read_data() {
        return $this->db->get('tbl_dosen');
    }

    public function count_data() {
        return $this->db->get('tbl_dosen')->num_rows();
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

       $new_number_mk = sprintf('%03s',$number_dosen);

        return $new_number_mk;
    }

    public function form_edit($id, $table) {
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

    public function get_matakuliah($id, $table) {
        $data = $this->db->where($id);
        $data = $this->db->from($table)     ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_perencanaan.kode_mk')
                                            ->join('tbl_kelas', 'tbl_kelas.id = tbl_perencanaan.kode_kelas')
                                            ->get();
        return $data;
       
    }
    
}