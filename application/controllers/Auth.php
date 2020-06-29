<?php
class Auth extends CI_Controller {
    public function index() {
        $this->load->view('templates/auth_templates/header');
        $this->load->view('auth');
        $this->load->view('templates/auth_templates/footer');
    }
}