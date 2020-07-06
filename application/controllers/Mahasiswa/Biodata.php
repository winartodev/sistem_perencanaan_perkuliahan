<?php 
class Biodata extends CI_Controller { 
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

    public function Info($npm) {
        $where = array('npm' => $npm);
        $data['mahasiswa'] = $this->model_mahasiswa->form_info($where, 'tbl_mahasiswa');
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/biodata', $data);
        $this->load->view('templates/mahasiswa/footer');
    }

    public function email_mahasiswa($npm) {
        $where = array('npm' => $npm);
        $data['mahasiswa'] = $this->model_mahasiswa->form_info($where, 'tbl_mahasiswa');
        $this->check_email_mahasiswa($this->session->userdata('email'));
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/email_mahasiswa', $data);
        $this->load->view('templates/mahasiswa/footer');
    }

    public function ubah_password($npm) {
        $where = array('npm' => $npm);
        $data['mahasiswa'] = $this->model_mahasiswa->form_info($where, 'tbl_mahasiswa');
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/ubah_password', $data);
        $this->load->view('templates/mahasiswa/footer');
    }

    public function buat_email() {
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/buat_email');
        $this->load->view('templates/mahasiswa/footer');
    }

    public function check_email_mahasiswa($email) {
        if ($email && $this->session->userdata('email') != NULL) {
            $this->session->set_flashdata('cek_email','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <b>Anda Sudah Terdaftar, Email Anda : '. $this->session->userdata('email').'.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
        } else {
            $this->session->set_flashdata('cek_email','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    <b>Anda Belum Terdaftar, Klik <a href='.base_url('Mahasiswa/Biodata/buat_email').'  style="color:blue;" >link</a> Berikut Agar Bisa Membuat Email.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
        }
    }

    public function update_email() {
        $npm = $this->session->userdata('npm');
        $email = $this->input->post('email');

        $data = array (
            'npm'   => $npm,
            'email' => $email
        );

        $where = array(
            'npm' => $npm
        );

        $this->model_mahasiswa->update_data($where, $data, 'tbl_mahasiswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <b>Email Anda Berhasil Di Buat Silahkan <a href='.base_url('Guest/login').'  style="color:blue;" >Log Out</a> Terlebih dahulu.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span> 
                                                    </button>
                                                </div>');
        redirect(base_url('Mahasiswa/Biodata/email_mahasiswa/'.$this->session->userdata('npm'))); 
    }

    public function update_password() {
        $npm = $this->session->userdata('npm');
        $pass = MD5($this->input->post('pass'));

        $data = array (
            'npm'   => $npm,
            'pass'  => $pass
        );

        $where = array(
            'npm' => $npm
        );

        $this->model_mahasiswa->update_data($where, $data, 'tbl_mahasiswa');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <b>Password Anda Berhasil Di Buat Silahkan <a href='.base_url('Guest/login').'  style="color:blue;" >Log Out</a> Terlebih dahulu.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span> 
                                                    </button>
                                                </div>');
        redirect(base_url('Mahasiswa/Biodata/ubah_password/'.$this->session->userdata('npm'))); 
    }

}