<?php
class Model_Baak extends CI_Model {
    public function read_data() {
        return $this->db->get('tbl_baak')->result();
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function form_edit($id, $table) {
        return $this->db->get_where($table, $id)->result();
    }
    public function update_data($id, $data, $table) {
        $this->db->where($id);
        $this->db->update($table, $data);
    }

    public function delete_data($id, $table) {
        $this->db->where($id);
        $this->db->delete($table);
    }

    public function info_kelas_baak ($id, $table) {
        $data = $this->db->where($id);
        $data = $this->db->from($table) ->join('tbl_perencanaan', 'tbl_perencanaan.kode_kelas = tbl_kelas.id')
                                        ->get(); 
        return $data->result();
    }

    public function get_data_perencanaan($id, $filed) {
        $this->db->select($filed);
        $this->db->where('kode_kelas', $id);
        $res = $this->db->get('tbl_perencanaan');

        return $res->row()->$filed;
    }
}