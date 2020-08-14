<?php
class Model_Penginputan extends CI_Model {

    public function insert_data($data, $table) {
        $this->db->insert($table, $data);
    }

   public function check_tanggal($filed) 
   {
        $data = array('jenis_penginputan' => $filed);

        $this->db->select('jenis_penginputan');
        $this->db->where('jenis_penginputan', $filed);
        $query = $this->db->get('tbl_penginputan')->row_array();
        
        if ($query == $data)
        {
            return TRUE;
        }
        else 
        {
            return FALSE;
        }
   }

   public function read_data_tanggal_perencanaan($id) 
   {
       return $this->db->get_where('tbl_penginputan', $id)->result();
   }

   public function update_data($id, $data, $table) {
    $this->db->where($id);
    $this->db->update($table, $data);
}
}