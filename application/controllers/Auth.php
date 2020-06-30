<?php
class Auth extends CI_Controller {
    public function index() {
        $this->load->view('templates/auth_templates/header');
        $this->load->view('auth');
        $this->load->view('templates/auth_templates/footer');
    }

    public function login() {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $auth =$this->model_auth->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Username atau Password Salah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
                $this->index();
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);

                switch($auth->role_id) {
                     case 1 : 
                        redirect(base_url('Kaprodi/Dashboard'));
                     break;
                     case 2 :
                        redirect(base_url('BAAK/Dashboard'));
                     break;
                     case 3 : 
                        redirect(base_url('Mahasiswa/Dashboard'));
                     break;
                    default:
                    break;
                }

            }
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('username', '','required');
        $this->form_validation->set_rules('password', '','required');
    }




}