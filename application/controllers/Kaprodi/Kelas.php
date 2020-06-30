<?php
class Kelas extends CI_Controller {
    public function index() {
        $data['kelas'] = $this->model_kelas->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function Add() {
        $data['kelompok']   = $this->model_kelas->get_nama_Kelompok()->result();
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $data['dosen']      = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_insert_kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function Edit($no) {
        $where = array('no' => $no);
        $data['kelas']      = $this->model_kelas->form_edit($where, 'tbl_kelas')->result();
        $data['kelompok']   = $this->model_kelas->get_nama_Kelompok()->result();
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $data['dosen']      = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_edit_kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function info($no) {
        $where = array('no' => $no);
        $data['kelas']      = $this->model_kelas->form_edit($where, 'tbl_kelas')->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/info_kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function insert_kls() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $kode_kelompok      = $this->input->post('kode_kelompok');
            $kode_mk            = $this->input->post('kode_mk');
            $kode_dosen         = $this->input->post('kode_dosen');
            $angkatan           = $this->input->post('angkatan');
            $nama_kelas         = $this->input->post('nama_kelas');

            $data = array (
                'kode_kelompok'     => $kode_kelompok,
                'kode_mk'           => $kode_mk,
                'kode_dosen'        => $kode_dosen,
                'angkatan'          => $angkatan,
                'nama_kelas'        => $nama_kelas
            );

            $this->model_kelas->insert_data($data, 'tbl_kelas');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Kelas Berhasil di Buat.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('Kaprodi/Kelas')); 
        }
    }

    public function update_kls() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $no                 = $this->input->post('no');
            $kode_kelompok      = $this->input->post('kode_kelompok');
            $kode_mk            = $this->input->post('kode_mk');
            $kode_dosen         = $this->input->post('kode_dosen');
            $angkatan           = $this->input->post('angkatan');
            $nama_kelas         = $this->input->post('nama_kelas');

            $data = array (
                'no'                => $no,
                'kode_kelompok'     => $kode_kelompok,
                'kode_mk'           => $kode_mk,
                'kode_dosen'        => $kode_dosen,
                'angkatan'          => $angkatan,
                'nama_kelas'        => $nama_kelas
            ); 

            $where = array(
                'no' => $no
            );

            $this->model_kelas->update_data($where, $data, 'tbl_kelas');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <b>Kelas Berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('Kaprodi/Kelas')); 
        }
    }

    public function delete($no) {
        $where = array('no' => $no);
        $this->model_kelas->delete_data($where, 'tbl_kelas');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Kelas Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('Kaprodi/Kelas'));  
    }


    public function _rules() {
        $this->form_validation->set_rules('kode_kelompok', 'Nama Kelompok', 'required');
        $this->form_validation->set_rules('kode_mk', 'Mata Kuliah', 'required');
        $this->form_validation->set_rules('kode_dosen', 'Dosen', 'required');
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
    }

}