<?php 
class Model_Kurikulum extends CI_Model {
    public function read_data() {
        return $this->db->from('tbl_kurikulum') ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_kurikulum.kode_mk')
                                                ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_kurikulum.kode_dosen')
                                                ->join('tbl_tahun_akademik', 'tbl_tahun_akademik.id_ta = tbl_kurikulum.id_tahun_akademik')
                                                ->order_by('id_kurikulum', 'asc')
                                                ->get()->result(); 
    }

    public function filter($kode_mk) 
    {
        $query = $this->db->from('tbl_keilmuan')    ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_keilmuan.kode_dosen')
                                                    ->where('tbl_keilmuan.kode_mk', $kode_mk)
                                                    ->get()->result(); 
        return $query;
    }

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

    public function form_edit($id, $table) {
        $data = $this->db->from('tbl_kurikulum')    ->join('tbl_matakuliah', 'tbl_matakuliah.kode_mk = tbl_kurikulum.kode_mk')
                                                    ->join('tbl_dosen', 'tbl_dosen.kode_dosen = tbl_kurikulum.kode_dosen')
                                                    ->join('tbl_tahun_akademik', 'tbl_tahun_akademik.id_ta = tbl_kurikulum.id_tahun_akademik')
                                                    ->where($id)
                                                    ->get(); 
        return $data;
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