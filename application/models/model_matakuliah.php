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

    public function jumlah_mahasiswa($kode_mk) 
    {
        return $this->db->from('tbl_jadwal')->join('tbl_perencanaan', 'tbl_perencanaan.id_perencanaan = tbl_jadwal.id_perencanaan')
                                            ->where('tbl_perencanaan.kode_mk', $kode_mk)
                                            ->get()->num_rows();
    }

    public function info_matakuliah($kode_mk) 
    {
        return $this->db->from('tbl_matakuliah')    ->join('tbl_perencanaan', 'tbl_perencanaan.kode_mk = tbl_matakuliah.kode_mk')
                                                    ->join('tbl_kelas', 'tbl_kelas.id = tbl_perencanaan.kode_kelas')
                                                    ->where($kode_mk)
                                                    ->get();
    }

    public function get_mahasiswa($id) {
        return $this->db->from('tbl_matakuliah')    ->join('tbl_perencanaan', 'tbl_perencanaan.kode_mk = tbl_matakuliah.kode_mk')
                                                    ->join('tbl_jadwal', 'tbl_jadwal.id_perencanaan = tbl_perencanaan.id_perencanaan')
                                                    ->join('tbl_kelas', 'tbl_kelas.id = tbl_perencanaan.kode_kelas')
                                                    ->join('tbl_mahasiswa', 'tbl_mahasiswa.npm = tbl_jadwal.npm')
                                                    ->where($id)                                            
                                                    ->get();
    }

    // public function get_kode_mk() {
    //     $this->db->select_max('kode_mk');

    //     $last_number_mk = $this->db->get('tbl_matakuliah')->row_array()['kode_mk'];
    //     $number_rows_mk = $this->db->get('tbl_matakuliah')->num_rows();

    //     if ($number_rows_mk > 0) {
    //         $number_mk = (int) substr($last_number_mk, 4, 4);
    //         $number_mk++;
    //     } else {
    //         $number_mk = 1;
    //     } 
        
    //     $str_mk = "TIF";
    //     $year_mk = date('y')-1;

    //     $new_number_mk = $str_mk. sprintf('%03s',$number_mk). '-' .$year_mk ; 

    //     return $new_number_mk;
    // }

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

}