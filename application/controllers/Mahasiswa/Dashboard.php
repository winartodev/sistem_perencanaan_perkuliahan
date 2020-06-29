<?php
class Dashboard extends CI_Controller {
    public function index() {
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/dashboard');
        $this->load->view('templates/mahasiswa/footer');
    }
}