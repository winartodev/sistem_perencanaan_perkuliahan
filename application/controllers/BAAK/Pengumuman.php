<?php
class Pengumuman extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
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
        $data['pengumuman'] = $this->model_pengumuman->read_data()->result();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/pengumuman', $data);
        $this->load->view('templates/baak/footer');
    }

    public function Add() {
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/form_insert_pengumuman');
        $this->load->view('templates/baak/footer');
    }

    public function Edit($no) {
        $where = array('no' => $no);
        $data['pengumuman'] = $this->model_pengumuman->form_edit($where, 'tbl_pengumuman')->result();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/form_edit_pengumuman', $data);
        $this->load->view('templates/baak/footer');
    }

    public function insert_pengumuman() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $judul     = $this->input->post('judul');
            $tanggal   = $this->input->post('tanggal');
            $konten    = $this->input->post('konten');

            $data = array (
                'judul'    => $judul,
                'tanggal'  => $tanggal,
                'konten'   => $konten
            );

            $this->model_mahasiswa->insert_data($data, 'tbl_pengumuman');
            
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Pengumuman berhasil di Simpan.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('BAAK/Pengumuman')); 
        }
    } 

    public function update_pengumuman() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $no        = $this->input->post('no');
            $judul     = $this->input->post('judul');
            $tanggal   = $this->input->post('tanggal');
            $konten    = $this->input->post('konten');

            $data = array (
                'no'       => $no,
                'judul'    => $judul,
                'tanggal'  => $tanggal,
                'konten'   => $konten
            );

            $where = array(
                'no' => $no
            );

            $this->model_mahasiswa->update_data($where, $data, 'tbl_pengumuman');
            
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Pengumuman berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('BAAK/Pengumuman')); 
        }
    } 

    public function delete($no) {
        $where = array('no' => $no);
        $this->model_pengumuman->delete_data($where, 'tbl_pengumuman');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Pengumuman Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('BAAK/Pengumuman')); 
    }

    public function _rules() {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
    }

}