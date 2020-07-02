<?php 
class Jadwal extends CI_Controller { 
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role_id') != '3') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <b>Anda Belum Login.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect(base_url('Guest/login'));
        }
    }

    public function index() {
        $data['jadwal'] = $this->model_jadwal->read_data();
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/jadwal', $data);
        $this->load->view('templates/mahasiswa/footer');
    }
}