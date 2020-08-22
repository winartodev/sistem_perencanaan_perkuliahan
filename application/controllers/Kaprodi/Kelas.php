<?php
class Kelas extends CI_Controller {
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
    
    public function index() {
        $data['kelas'] = $this->model_kelas->read_data();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function add() {
        $data['kelompok']   = $this->model_kelas->get_nama_Kelompok();
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $data['dosen']      = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_insert_kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function edit($id) {
        $where = array('id' => $id);
        $data['kelas']      = $this->model_kelas->form_edit($where, 'tbl_kelas');
        $data['kelompok']   = $this->model_kelas->get_nama_Kelompok();
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $data['dosen']      = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_edit_kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function info($id) {
        $where = array('id' => $id);
        $data['kelas']      = $this->model_kelas->form_edit($where, 'tbl_perencanaan');
        $data['mahasiswa']  = $this->model_kelas->get_mahasiswa($id)->result();
        $data['A15']        = $this->model_kelas->count_angkatan($id,'15','tbl_jadwal');
        $data['A16']        = $this->model_kelas->count_angkatan($id,'16','tbl_jadwal');
        $data['A17']        = $this->model_kelas->count_angkatan($id,'17','tbl_jadwal');
        $data['A18']        = $this->model_kelas->count_angkatan($id,'18','tbl_jadwal');
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/info_kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function insert_kelas() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $angkatan           = $this->input->post('angkatan');
            $nama_kelas         = $this->input->post('nama_kelas');
            $nama_kelas_concat  = 'IF ' . $angkatan . ' ' . $nama_kelas;

            $data = array (
                'angkatan'          => $angkatan,
                'nama_kelas'        => $nama_kelas_concat
            );

            $check_kelas = $this->model_kelas->check_duplicate_data($data, 'tbl_kelas')->result();

            foreach ($check_kelas as $row) 
            {
                if ($row->nama_kelas == $nama_kelas_concat) 
                {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                <b>Kelas '.$nama_kelas_concat.' Sudah ada.</b>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>');
                    redirect(base_url('kaprodi/kelas')); 
                } 
            }

            $this->model_kelas->insert_data($data, 'tbl_kelas');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Kelas Berhasil di Buat.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('kaprodi/kelas')); 



        }
    }

    public function update_kelas() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $id                 = $this->input->post('id');
            $angkatan           = $this->input->post('angkatan');
            $nama_kelas         = $this->input->post('nama_kelas');

            $data = array (
                'angkatan'          => $angkatan,
                'nama_kelas'        => 'IF' + $angkatan + $nama_kelas
            ); 

            $where = array(
                'id' => $id
            );

            $this->model_kelas->update_data($where, $data, 'tbl_kelas');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <b>Kelas Berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('kaprodi/kelas')); 
        }
    }

    public function delete($id) {
        $where = array('id' => $id);
        $this->model_kelas->delete_data($where, 'tbl_kelas');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Kelas Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('kaprodi/kelas'));  
    }


    public function _rules() {
        $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
    }

}