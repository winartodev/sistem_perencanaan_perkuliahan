<?php
class Pra_Perencanaan extends CI_Controller {
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
        $data['kelas'] = $this->model_perencanaan->read_data();
        $data['penginputan'] = $this->model_penginputan->read_data();
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/perencanaan_kuliah', $data);
        $this->load->view('templates/mahasiswa/footer');
    }

    public function detail_rencana() {
        $data['jadwal'] = $this->model_perencanaan->get_kode_kelas()->result();
        $this->load->view('templates/mahasiswa/header');
        $this->load->view('templates/mahasiswa/sidebar');
        $this->load->view('mahasiswa/detail_perencanaan', $data);
        $this->load->view('templates/mahasiswa/footer');
    }

    public function daftar($id) {
        $id_perencanaan = $id;
        $npm            = $this->session->userdata('npm');
        $angkatan       = $this->session->userdata('angkatan');

        $array = array(
            'id_perencanaan'    => $id_perencanaan, 
            'npm'               => $npm
        );

        $check1 = $this->model_perencanaan->check_duplicate_data($array, 'tbl_verifikasi_perencanaan');
        $check2 = $this->model_perencanaan->check_duplicate_data($array, 'tbl_jadwal');
        $check3 = $this->model_perencanaan->jumlah_mahasiswa($id_perencanaan);
        $num1 = $check1->num_rows();
        $num2 = $check2->num_rows();

        $kelas = $this->model_perencanaan->read_data();
        foreach ($kelas as $row) 
        {
            if ($check3 == $row->jumlah_mahasiswa) 
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <b>Kelas Sudah Penuh.</b>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>');
                redirect(base_url('mahasiswa/pra_perencanaan')); 
            } 
            else {
                if ($num1 == 1 || $num2 == 1) {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            <b>Anda Sudah Mengambil Perkuliahan Ini.</b>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>');
                    redirect(base_url('mahasiswa/pra_perencanaan')); 
                } else {
                    $data = array (
                        'npm'               => $npm,
                        'id_perencanaan'    => $id_perencanaan,
                        'angkatan'          => $angkatan,
                        'status'            => 'Di Proses',
                    );
            
                    $this->model_perencanaan->insert_data($data, 'tbl_verifikasi_perencanaan');
                    $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                <b>Rencana Perkuliahan Anda Berhasil Di Tambah.</b>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>');
                    redirect(base_url('mahasiswa/pra_perencanaan')); 
                }       
            }
        }
        
       
    }

    public function batal($id) {
        $where = array('id_tmp' => $id);
        $this->model_perencanaan->delete_data($where, 'tbl_verifikasi_perencanaan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <b>Rencana Perkuliahan Anda Berhasil di Batalkan.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
        redirect(base_url('mahasiswa/pra_perencanaan/detail_rencana')); 
    }


}