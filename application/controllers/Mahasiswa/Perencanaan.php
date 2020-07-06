<?php
class Perencanaan extends CI_Controller {
    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role_id') != '3') {
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
        $data['kelas'] = $this->model_kelas->read_data();
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/perencanaan_kuliah', $data);
        $this->load->view('templates/mahasiswa/footer');
    }

    public function Detail_Rencana() {
        $data['jadwal'] = $this->model_rencana->get_kode_kelas()->result();
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/detail_perencanaan', $data);
        $this->load->view('templates/mahasiswa/footer');
    }

    public function Daftar($id) {
        $kode_kelas = $id;
        $npm        = $this->session->userdata('npm');
        $angkatan   = $this->session->userdata('angkatan');

        $array = array(
            'kode_kelas'    => $kode_kelas, 
            'npm'           => $npm
        );

        $check1 = $this->model_rencana->check_duplicate_data($array, 'tbl_perencanaan');
        $check2 = $this->model_rencana->check_duplicate_data($array, 'tbl_jadwal');
        $num1 = $check1->num_rows();
        $num2 = $check2->num_rows();

        if ($num1 == 1 || $num2 == 1) {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <b>Anda Sudah Mengambil Perkuliahan Ini.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
            redirect(base_url('Mahasiswa/Perencanaan')); 
        } else {
            $data = array (
                'npm'           => $npm,
                'kode_kelas'    => $kode_kelas,
                'angkatan'      => $angkatan,
                'status'        => 'Di Proses',
            );
    
            $this->model_rencana->insert_data($data, 'tbl_perencanaan');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Rencana Perkuliahan Anda Berhasil Di Tambah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('mahasiswa/perencanaan')); 
        }       
    }

    public function Batal($id) {
        $where = array('id_tmp' => $id);
        $this->model_rencana->delete_data($where, 'tbl_perencanaan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <b>Rencana Perkuliahan Anda Berhasil di Batalkan.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
        redirect(base_url('mahasiswa/perencanaan/detail_rencana')); 
    }


}