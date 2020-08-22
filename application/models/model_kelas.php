<?php 
class Model_Kelas extends CI_Model {
    public function read_data() {
        return $this->db->get('tbl_kelas')->result(); 
    }

    public function get_nama_Kelompok() {
        return $this->db->get('tbl_kelompok')->result();
    }

    public function get_mahasiswa($id) {
        return $this->db->from('tbl_jadwal')->join('tbl_kelas', 'tbl_kelas.id = tbl_jadwal.kode_kelas')
                                            ->join('tbl_mahasiswa', 'tbl_mahasiswa.npm = tbl_jadwal.npm')
                                            ->where('kode_kelas', $id)                                            
                                            ->get();
    }

    public function count_angkatan($id,$angkatan, $table) {
        return $this->db->from($table)  ->join('tbl_mahasiswa', 'tbl_mahasiswa.npm = tbl_jadwal.npm')
                                        ->where('kode_kelas', $id)
                                        ->where('angkatan', $angkatan)
                                        ->get()->num_rows();
    }

    public function check_duplicate_data($data, $table) {
        $this->db->where($data);
        return $this->db->get($table);       
    }

    public function count_data() {
        return $this->db->get('tbl_kelas')->num_rows();
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function form_edit($id, $table) {
        $data = $this->db->where($id);
        $data = $this->db->get($table);
        return $data->result();
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