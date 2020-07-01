<?php
class Kelas extends CI_Controller {
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
    
    public function index() {
        $data['kelas'] = $this->model_kelas->read_data();
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/pendaftaran_kelas', $data);
        $this->load->view('templates/mahasiswa/footer');
    }

    public function jadwal() {
        $data['jadwal'] = $this->model_jadwal->get_kode_kelas()->result();
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/jadwal_kelas', $data);
        $this->load->view('templates/mahasiswa/footer');
    }

    public function Daftar($no) {
        $kode_kelas = $no;
        $npm        = $this->session->userdata('npm');
        $semester   = $this->session->userdata('semester');

        $data = array (
            'npm'           => $npm,
            'kode_kelas'    => $kode_kelas,
            'semester'      => $semester,
            'status'        => 'Di Proses',
        );

        $this->model_jadwal->insert_data($data, 'tbl_jadwal_tmp');
        $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                    <b>Mata Kuliah berhasil di Daftarkan.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
        redirect(base_url('Mahasiswa/Kelas')); 
    }

    public function Batal($id) {
        $where = array('id' => $id);
        $this->model_jadwal->delete_data($where, 'tbl_jadwal_tmp');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <b>Mata Kuliah Berhasil di Batalkan.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
        redirect(base_url('Mahasiswa/Kelas/Jadwal')); 
    }


}