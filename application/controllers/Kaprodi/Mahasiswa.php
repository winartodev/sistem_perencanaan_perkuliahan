<?php 
class Mahasiswa extends CI_Controller {
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
        $data['mahasiswa'] = $this->model_mahasiswa->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/mahasiswa', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function Info($npm) {
        $where = array('npm' => $npm);
        $data['mahasiswa'] = $this->model_mahasiswa->form_info($where, 'tbl_mahasiswa')->result();
        $data['matakuliah'] = $this->model_mahasiswa->get_matakuliah($npm)->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/info_mahasiswa', $data);
        $this->load->view('templates/kaprodi/footer');
    }
}