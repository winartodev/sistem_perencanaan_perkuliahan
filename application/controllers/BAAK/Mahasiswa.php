<?php 
class Mahasiswa extends CI_Controller {
    public function index() {
        $data['mahasiswa'] = $this->model_mahasiswa->read_data()->result();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/mahasiswa', $data);
        $this->load->view('templates/baak/footer');
    }

    public function Add() {
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/form_insert_mahasiswa');
        $this->load->view('templates/baak/footer');
    }

    public function Edit($npm) {
        $where = array('npm' => $npm);
        $data['mahasiswa'] = $this->model_mahasiswa->form_edit($where, 'tbl_mahasiswa')->result();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/form_edit_mahasiswa', $data);
        $this->load->view('templates/baak/footer');
    }

    public function Info($npm) {
        $where = array('npm' => $npm);
        $data['mahasiswa'] = $this->model_mahasiswa->form_info($where, 'tbl_mahasiswa')->result();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/info_mahasiswa', $data);
        $this->load->view('templates/baak/footer');
    }

    public function insert_mahasiswa() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $npm        = $this->input->post('npm');
            $nama_mhs   = $this->input->post('nama_mhs');
            $email      = $this->input->post('email');
            $no_telp    = $this->input->post('no_telp');
            $semester   = $this->input->post('semester');

            $data_mhs = array (
                'npm'       => $npm,
                'nama_mhs'  => $nama_mhs,
                'email'     => $email,
                'no_telp'   => $no_telp,
                'semester'  => $semester,
                'password'  => MD5($npm)
            );

            $this->model_mahasiswa->insert_data($data_mhs, 'tbl_mahasiswa');
            
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Data Mahasiswa berhasil di Simpan.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('BAAK/Mahasiswa')); 
        }
    }

    public function update_mahasiswa() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $npm        = $this->input->post('npm');
            $nama_mhs   = $this->input->post('nama_mhs');
            $email      = $this->input->post('email');
            $no_telp    = $this->input->post('no_telp');
            $semester   = $this->input->post('semester');

            $data = array (
                'npm'       => $npm,
                'nama_mhs'  => $nama_mhs,
                'email'     => $email,
                'no_telp'   => $no_telp,
                'semester'  => $semester
            );

            $where = array(
                'npm' => $npm
            );

            $this->model_mahasiswa->update_data($where ,$data, 'tbl_mahasiswa');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <b>Data Mahasiswa berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('BAAK/Mahasiswa')); 
        }
    }

    public function delete($npm) {
        $where = array('npm' => $npm);
        $this->model_mahasiswa->delete_data($where, 'tbl_mahasiswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Mahasiswa Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('BAAK/Mahasiswa')); 
    }

    public function _rules() {
        $this->form_validation->set_rules('npm', 'NPM', 'required');
        $this->form_validation->set_rules('nama_mhs', 'Nama Mahasiswa', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
    }
}