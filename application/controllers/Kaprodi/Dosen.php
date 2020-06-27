<?php
class Dosen extends CI_Controller {
    public function index() {
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/dosen');
        $this->load->view('templates/kaprodi/footer');
    }
}