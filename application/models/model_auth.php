<?php
class Model_Auth extends CI_Model {
    public function cek_login() {
        $username = set_value('username');
        $password = MD5(set_value('password'));

        $result = $this->db->where('username', $username)
                            ->where('password', $password)
                            ->limit(1)
                            ->get('tbl_user');
        
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array(); 
        }

    }
}