<?php
class Kelas extends CI_Controller {
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
        $data['kelas'] = $this->model_kelas->read_data();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function Add() {
        $data['kelompok']   = $this->model_kelas->get_nama_Kelompok();
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $data['dosen']      = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_insert_kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function Edit($id) {
        $where = array('id' => $id);
        $data['kelas']      = $this->model_kelas->form_edit($where, 'tbl_kelas');
        $data['kelompok']   = $this->model_kelas->get_nama_Kelompok();
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $data['dosen']      = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_edit_kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function info($id) {
        $where = array('id' => $id);
        $data['kelas']      = $this->model_kelas->form_edit($where, 'tbl_kelas');
        $data['mahasiswa']  = $this->model_kelas->get_mahasiswa($id)->result();
        $data['A15']        = $this->model_kelas->count_angkatan($id,'15','tbl_jadwal');
        $data['A16']        = $this->model_kelas->count_angkatan($id,'16','tbl_jadwal');
        $data['A17']        = $this->model_kelas->count_angkatan($id,'17','tbl_jadwal');
        $data['A18']        = $this->model_kelas->count_angkatan($id,'18','tbl_jadwal');
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/info_kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function insert_kelas() {
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

    public function update_kelas() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $id                 = $this->input->post('id');
            $kode_kelompok      = $this->input->post('kode_kelompok');
            $kode_mk            = $this->input->post('kode_mk');
            $kode_dosen         = $this->input->post('kode_dosen');
            $angkatan           = $this->input->post('angkatan');
            $nama_kelas         = $this->input->post('nama_kelas');

            $data = array (
                'id'                => $id,
                'kode_kelompok'     => $kode_kelompok,
                'kode_mk'           => $kode_mk,
                'kode_dosen'        => $kode_dosen,
                'angkatan'          => $angkatan,
                'nama_kelas'        => $nama_kelas
            ); 

            $where = array(
                'id' => $id
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

    public function delete($id) {
        $where = array('id' => $id);
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