<?php
class Pengajuan extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role_id') != '3') {
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
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/pengajuan_kuliah');
        $this->load->view('templates/mahasiswa/footer');
    }

    public function insert_pengajuan() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $npm                = $this->input->post('npm');
            $nama_mahasiswa     = $this->input->post('nama');
            $konten             = $this->input->post('konten');
        
            $data = array (
                'npm'               => $npm,
                'nama_mahasiswa'    => $nama_mahasiswa,
                'konten'            => $konten
            );

            $this->model_penginputan->insert_data($data, 'tbl_pengajuan');
            
            // $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
            //                                             <b>Pengajuan Kuliah Berhasil Terkirim.</b>
            //                                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                                             <span aria-hidden="true">&times;</span>
            //                                             </button>
            //                                         </div>');
            redirect(base_url('mahasiswa/dashboard')); 
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('npm', '', 'required');
        $this->form_validation->set_rules('nama', '', 'required');
        $this->form_validation->set_rules('konten', '', 'required');
        // $this->form_validation->set_rules('email', '', 'required');
    }
}