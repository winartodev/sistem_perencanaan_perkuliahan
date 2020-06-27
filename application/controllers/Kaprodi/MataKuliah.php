<?php
class MataKuliah extends CI_Controller {
    public function index() {
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/matakuliah');
        $this->load->view('templates/kaprodi/footer');
    }
}