<?php 
class Dashboard extends CI_Controller {
    public function index() {
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/dashboard');
        $this->load->view('templates/baak/footer');
    }
}