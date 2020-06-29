<?php
class Matakuliah extends CI_Controller {
    public function index() {
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/matakuliah');
        $this->load->view('templates/mahasiswa/footer');
    }
}