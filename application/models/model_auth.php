<?php
class Model_Auth extends CI_Model {
    function auth_kaprodi($username,$password){
        $query=$this->db->query("SELECT * FROM tbl_kaprodi WHERE kode='$username' AND pass=MD5('$password') LIMIT 1");
        return $query;
    }
    
    function auth_baak($username,$password){
        $query=$this->db->query("SELECT * FROM tbl_baak WHERE kode='$username' AND pass=MD5('$password') LIMIT 1");
        return $query;
    }

    //cek nim dan password mahasiswa
    function auth_mahasiswa($username,$password){
        $query=$this->db->query("SELECT * FROM tbl_mahasiswa WHERE npm='$username' AND pass=MD5('$password') LIMIT 1");
        return $query;
    }
}