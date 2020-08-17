<?php
class Verifikasi_Perencanaan extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role_id') != '2') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <b>Anda Belum Login.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect(base_url('guest/login'));
        }
    }
    
    public function index() {
        $data['kelas'] = $this->model_verifikasi_perencanaan->read_data();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/verifikasi_perencanaan', $data);
        $this->load->view('templates/baak/footer');
    }

    public function info($id) {
        $where = array('id' => $id);
        $data['perencanaan'] = $this->model_verifikasi_perencanaan->info_kelas_baak($where, 'tbl_kelas');
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/info_kelas', $data);
        $this->load->view('templates/baak/footer');
    }

    public function verifikasi($id) {
        $kode_kelas = $id;
        $npm        =  $this->model_verifikasi_perencanaan->get_data_perencanaan($id, 'npm');
        $id_tmp = $this->model_verifikasi_perencanaan->get_data_perencanaan($id, 'id_tmp');

        $data = array (
            'kode_kelas'    => $kode_kelas,
            'npm'           => $npm,
        );

        $where = array (
            'id_tmp' => $id_tmp
        );

        $this->model_verifikasi_perencanaan->insert_data($data, 'tbl_jadwal');
        $this->model_verifikasi_perencanaan->delete_Data($where, 'tbl_verifikasi_perencanaan');

        $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    <b>Berhasil Di Verifikasi</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');

        redirect(base_url('baak/Verifikasi_Perencanaan')); 
    }
}