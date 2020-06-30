<?php
class Guest extends CI_Controller {
    public function login() {
        $this->load->view('templates/auth_templates/header');
        $this->load->view('login');
        $this->load->view('templates/auth_templates/footer');
    }

    public function auth() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->login();
        } else {
            $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
            $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
     
            $cek_kaprodi=$this->model_auth->auth_kaprodi($username,$password);
            $cek_baak=$this->model_auth->auth_baak($username,$password);
            $cek_mahasiswa=$this->model_auth->auth_mahasiswa($username,$password);

            if ($cek_kaprodi->num_rows() > 0){
                $data=$cek_kaprodi->row_array();
                if ($data['role_id'] == '1') {
                    $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('kode',$data['kode']);
                    $this->session->set_userdata('nama',$data['nama']);
                    redirect(base_url('Kaprodi/Dashboard'));
                }               
            }else if ($cek_baak->num_rows() > 0) {
                $data=$cek_baak->row_array();
                if ($data['rolde_id'] == '2') {
                    $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('kode',$data['kode']);
                    $this->session->set_userdata('nama',$data['nama']);
                    redirect(base_url('BAAK/Dashboard'));
                }
            } else if($cek_mahasiswa->num_rows() > 0){
                $data=$cek_mahasiswa->row_array();
                if ($data['role_id'] == '3') {
                    $this->session->set_userdata('masuk',TRUE);
                    $this->session->set_userdata('akses','3');
                    $this->session->set_userdata('npm',$data['npm']);
                    $this->session->set_userdata('nama_mhs',$data['nama_mhs']);
                    redirect(base_url('Mahasiswa/Dashboard'));
                }
            } else {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Username atau Password Salah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
                $this->login();
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url('Guest/login'));
    }

    public function _rules() {
        $this->form_validation->set_rules('username', '','required');
        $this->form_validation->set_rules('password', '','required');
    }
}