<?php 
class Model_Perencanaan extends CI_Model {
    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function check_duplicate_data($data, $table) {
        $this->db->where($data);
        return $this->db->get($table);       
    }

    public function count_data() {
        return $this->db->get('tbl_verifikasi_perencanaan')->num_rows();
    }

    public function read_data() {
        return $this->db->from('tbl_perencanaan')   ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_perencanaan.kode_mk')
                                                    ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_perencanaan.kode_dosen')
                                                    ->join('tbl_kelompok', 'tbl_kelompok.kode_kelompok = tbl_perencanaan.kode_kelompok')
                                                    ->join('tbl_kelas', 'tbl_kelas.id = tbl_perencanaan.kode_kelas')
                                                    ->order_by('id_perencanaan', 'asc')
                                                    ->get()->result(); 
    }

    public function get_nama_Kelompok() {
        return $this->db->get('tbl_kelompok')->result();
    }

    public function get_kode_kelas() {
        return $this->db->from('tbl_verifikasi_perencanaan')    ->join('tbl_perencanaan', 'tbl_perencanaan.id_perencanaan = tbl_verifikasi_perencanaan.id_perencanaan')
                                                                ->join('tbl_kelas', 'tbl_kelas.id = tbl_perencanaan.kode_kelas')
                                                                ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_perencanaan.kode_mk')
                                                                ->where('tbl_verifikasi_perencanaan.npm', $this->session->userdata('npm'))
                                                                ->get(); 
    } 

    public function form_edit($id, $table) {
        $data = $this->db->where($id);
        $data = $this->db->from($table) ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_perencanaan.kode_mk')
                                        ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_perencanaan.kode_dosen')
                                        ->join('tbl_kelompok', 'tbl_kelompok.kode_kelompok = tbl_perencanaan.kode_kelompok')
                                        ->join('tbl_kelas', 'tbl_kelas.id = tbl_perencanaan.kode_kelas')
                                        ->get(); 
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