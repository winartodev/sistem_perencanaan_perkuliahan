<?php
class MataKuliah extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
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
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/matakuliah', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function Add() {
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $data['kode_mk'] = $this->model_matakuliah->get_kode_mk();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_insert_matakuliah', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function Edit($kode_mk) {
        $where = array('kode_mk' => $kode_mk);
        $data['matakuliah'] = $this->model_matakuliah->form_edit($where, 'tbl_matakuliah')->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_edit_matakuliah', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function insert_mk() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $kode_mk    = $this->input->post('kode_mk');
            $nama_mk    = $this->input->post('nama_mk');
            $sks        = $this->input->post('sks');
            $semester   = $this->input->post('semester');

            $data = array (
                'kode_mk'       => $kode_mk,
                'nama_mk'       => $nama_mk,
                'sks'           => $sks,
                'semester'      => $semester
            );

            $this->model_matakuliah->insert_data($data, 'tbl_matakuliah');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Mata Kuliah berhasil di Simpan.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('Kaprodi/MataKuliah')); 
        }
    }

    public function update_mk() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $kode_mk    = $this->input->post('kode_mk');
            $nama_mk    = $this->input->post('nama_mk');
            $sks        = $this->input->post('sks');
            $semester   = $this->input->post('semester');

            $data = array (
                'kode_mk'       => $kode_mk,
                'nama_mk'       => $nama_mk,
                'sks'           => $sks,
                'semester'      => $semester
            );

            $where = array(
                'kode_mk' => $kode_mk
            );

            $this->model_matakuliah->update_data($where, $data, 'tbl_matakuliah');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <b>Mata Kuliah Berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('Kaprodi/MataKuliah')); 
        }
    }

    public function delete($kode_mk) {
        $where = array('kode_mk' => $kode_mk);
        $this->model_matakuliah->delete_data($where, 'tbl_matakuliah');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Mata Kuliah Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('Kaprodi/MataKuliah')); 
    }

    public function _rules() {
        $this->form_validation->set_rules('kode_mk', 'Kode Mata Kuliah', 'required');
        $this->form_validation->set_rules('nama_mk', 'Nama Mata Kuliah', 'required');
        $this->form_validation->set_rules('sks', 'SKS', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
    }
}