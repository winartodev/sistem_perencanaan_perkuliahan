<?php 
class Biodata extends CI_Controller { 
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <b>Anda Belum Login.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect(base_url('guest/login'));
        }
    }

    public function info($id) {
        $where = array('id' => $id);
        $data['kaprodi'] = $this->model_kaprodi->form_info($where, 'tbl_kaprodi');
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/biodata', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function user_email($id) {
        $where = array('id' => $id);
        $data['kaprodi'] = $this->model_kaprodi->form_info($where, 'tbl_kaprodi');
        $this->check_user_email($this->session->userdata('email'));
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/user_email', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function ubah_password($id) {
        $where = array('id' => $id);
        $data['kaprodi'] = $this->model_mahasiswa->form_info($where, 'tbl_kaprodi');
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/ubah_password', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function buat_email() {
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/buat_email');
        $this->load->view('templates/kaprodi/footer');
    }

    public function check_user_email($email) {
        if ($email && $this->session->userdata('email') != NULL) {
            $this->session->set_flashdata('cek_email','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <b>Anda Sudah Terdaftar, Email Anda : '. $this->session->userdata('email').'.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
        } else {
            $this->session->set_flashdata('cek_email','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    <b>Anda Belum Terdaftar, Klik <a href='.base_url('kaprodi/biodata/buat_email').'  style="color:blue;" >link</a> Berikut Agar Bisa Membuat Email.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
        }
    }

    public function update_email() {
        $id = $this->session->userdata('id');
        $email = $this->input->post('email');

        $data = array (
            'id'   => $id,
            'email' => $email
        );

        $where = array(
            'id' => $id
        );

        $this->model_kaprodi->update_data($where, $data, 'tbl_kaprodi');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <b>Email Anda Berhasil Di Buat Silahkan <a href='.base_url('guest/login').'  style="color:blue;" >Log Out</a> Terlebih dahulu.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span> 
                                                    </button>
                                                </div>');
        redirect(base_url('kaprodi/biodata/user_email/'.$this->session->userdata('id'))); 
    }

    public function update_password() {
        $id = $this->session->userdata('id');
        $pass = MD5($this->input->post('pass'));

        $data = array (
            'id'   => $id,
            'pass'  => $pass
        );

        $where = array(
            'id' => $id
        );

        $this->model_kaprodi->update_data($where, $data, 'tbl_kaprodi');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <b>Password Anda Berhasil Di Buat Silahkan <a href='.base_url('guest/login').'  style="color:blue;" >Log Out</a> Terlebih dahulu.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span> 
                                                    </button>
                                                </div>');
        redirect(base_url('kaprodi/biodata/ubah_password/'.$this->session->userdata('id'))); 
    }

}