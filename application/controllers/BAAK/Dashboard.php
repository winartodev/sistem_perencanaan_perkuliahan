<?php 
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <b>Anda Belum Login.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect(base_url('guest/login'));
        }
    }
    
    public function index() {
        $data['jumlah_mahasiswa'] = $this->model_mahasiswa->count_data();
        $data['jumlah_konfirmasi'] = $this->model_rencana->count_data();
        $data['jumlah_pengumuman'] = $this->model_pengumuman->count_data();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/dashboard', $data);
        $this->load->view('templates/baak/footer');
    }
}