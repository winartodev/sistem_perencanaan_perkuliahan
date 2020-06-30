<?php
class Anggota extends CI_Controller {
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
    
    public function index () {
        $data['baak'] = $this->model_baak->read_data('tbl_baak')->result();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/anggota', $data);
        $this->load->view('templates/baak/footer');
    }

    public function Add() {
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/form_insert_anggota');
        $this->load->view('templates/baak/footer');
    }

    public function Edit($kode) {
        $where = array('kode' => $kode);
        $data['baak'] = $this->model_baak->form_edit($where, 'tbl_baak')->result();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/form_edit_anggota', $data);
        $this->load->view('templates/baak/footer');
    }

    public function insert_anggota() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $kode        = $this->input->post('kode');
            $nama   = $this->input->post('nama');
            $email      = $this->input->post('email');
        
            $data = array (
                'kode'      => $kode,
                'nama'      => $nama,
                'email'     => $email,
                'pass'      => MD5($kode)
            );

            $this->model_baak->insert_data($data, 'tbl_baak');
            
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Data Anggota BAAK berhasil di Simpan.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('BAAK/Anggota')); 
        }
    }

    public function update_anggota() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $kode       = $this->input->post('kode');
            $nama       = $this->input->post('nama');
            $email      = $this->input->post('email');
        
            $data = array (
                'kode'      => $kode,
                'nama'      => $nama,
                'email'     => $email,
            );

            $where = array(
                'kode' => $kode
            );

            $this->model_baak->update_data($where, $data, 'tbl_baak');
            
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <b>Data Anggota BAAK berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('BAAK/Anggota')); 
        }
    }

    public function delete($kode) {
        $where = array('kode' => $kode);
        $this->model_baak->delete_data($where, 'tbl_baak');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Anggota Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('BAAK/Anggota')); 
    }

    public function _rules() {
        $this->form_validation->set_rules('kode', '', 'required');
        $this->form_validation->set_rules('nama', '', 'required');
        $this->form_validation->set_rules('email', '', 'required');
    }
}