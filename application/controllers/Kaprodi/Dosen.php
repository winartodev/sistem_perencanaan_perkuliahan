<?php
class Dosen extends CI_Controller {
    public function index() {
        $data['dosen'] = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/dosen', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function Add() {
        $data['kode_dosen'] = $this->model_dosen->get_kode_dsn();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_insert_dosen', $data);
        $this->load->view('templates/kaprodi/footer');
    }   

    public function Edit($kode_dosen) {
        $where = array('kode_dosen' => $kode_dosen);
        $data['dosen'] = $this->model_dosen->form_edit($where, 'tbl_dosen')->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_edit_dosen', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function insert_dosen() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $kode_dosen     = $this->input->post('kode_dosen');
            $nama_dosen     = $this->input->post('nama_dosen');
            $email          = $this->input->post('email');
            $no_telp        = $this->input->post('no_telp');

            $data = array (
                'kode_dosen'    => $kode_dosen,
                'nama_dosen'    => $nama_dosen,
                'email'         => $email,
                'no_telp'       => $no_telp
            );

            $this->model_dosen->insert_data($data, 'tbl_dosen');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Data Dosen berhasil di Simpan.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('Kaprodi/Dosen')); 
        }
    }

    public function update_dosen() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $kode_dosen     = $this->input->post('kode_dosen');
            $nama_dosen     = $this->input->post('nama_dosen');
            $email          = $this->input->post('email');
            $no_telp        = $this->input->post('no_telp');

            $data = array (
                'kode_dosen'    => $kode_dosen,
                'nama_dosen'    => $nama_dosen,
                'email'         => $email,
                'no_telp'       => $no_telp
            );

            $where = array(
                'kode_dosen'    => $kode_dosen
            );

            $this->model_dosen->update_data($where, $data, 'tbl_dosen');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <b>Data Dosen Berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('Kaprodi/Dosen')); 
        }
    }

    public function delete($kode_dosen) {
        $where = array('kode_dosen' => $kode_dosen);
        $this->model_dosen->delete_data($where, 'tbl_dosen');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Dosen Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('Kaprodi/Dosen')); 
    }

    public function _rules() {
        $this->form_validation->set_rules('kode_dosen', 'Kode Dosen', 'required');
        $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
    }

}