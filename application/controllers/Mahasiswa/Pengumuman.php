<?php 
class Pengumuman extends CI_Controller { 
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
        $data['pengumuman'] = $this->model_pengumuman->read_data();
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/pengumuman', $data);
        $this->load->view('templates/mahasiswa/footer');
    }

    public function Detail($id) {
        $where = array('id' => $id);
        $data['pengumuman'] = $this->model_pengumuman->info_data($where, 'tbl_pengumuman');
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/detail_pengumuman', $data);
        $this->load->view('templates/mahasiswa/footer');
    }
}