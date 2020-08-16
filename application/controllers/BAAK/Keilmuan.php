<?php 
class Keilmuan extends CI_Controller {
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
        $data['bidang_keilmuan']   = $this->model_keilmuan->read_data();
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/keilmuan', $data);
        $this->load->view('templates/baak/footer');
    }

    public function add() {
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $data['dosen']      = $this->model_dosen->read_data()->result();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/form_insert_keilmuan', $data);
        $this->load->view('templates/baak/footer');
    }   

    public function edit($id) {
        $where = array('id_keilmuan' => $id);
        $data['keilmuan']       = $this->model_keilmuan->form_edit($where, 'tbl_keilmuan');
        $data['matakuliah']     = $this->model_matakuliah->read_data()->result();
        $data['dosen']          = $this->model_dosen->read_data()->result();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/form_edit_keilmuan', $data);
        $this->load->view('templates/baak/footer');
    }   

    public function insert_keilmuan() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $kode_dosen     = $this->input->post('kode_dosen');
            $bidang_ilmu    = $this->input->post('bidang_ilmu');
            $kode_mk        = $this->input->post('kode_mk');
            $nama_kelas     = $this->input->post('nama_kelas');

            $data = array (
                'kode_dosen'    => $kode_dosen,
                'bidang_ilmu'   => $bidang_ilmu,
                'kode_mk'       => $kode_mk
            );

            $this->model_keilmuan->insert_data($data, 'tbl_keilmuan');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Bidang Keilmuan Berhasil di Buat.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('baak/keilmuan')); 
        }
    }

    public function update_keilmuan() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $id_keilmuan    = $this->input->post('id_keilmuan');
            $kode_dosen     = $this->input->post('kode_dosen');
            $bidang_ilmu    = $this->input->post('bidang_ilmu');
            $kode_mk        = $this->input->post('kode_mk');
            $nama_kelas     = $this->input->post('nama_kelas');


            $data = array (
                'kode_dosen'    => $kode_dosen,
                'bidang_ilmu'   => $bidang_ilmu,
                'kode_mk'       => $kode_mk
            ); 

            $where = array(
                'id_keilmuan' => $id_keilmuan
            );

            $this->model_keilmuan->update_data($where, $data, 'tbl_keilmuan');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <b>Bidang Keilmuan Berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('baak/keilmuan')); 
        }
    }

    public function delete($id) {
        $where = array('id_keilmuan' => $id);
        $this->model_keilmuan->delete_data($where, 'tbl_keilmuan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Bidang Keilmuan Kelas Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('baak/keilmuan'));  
    }

    public function filter_keilmuan() 
    {
        $id     = $_GET['keilmuan'];

        if ($id == "") 
        {
            $data   = $this->model_keilmuan->read_data();
        } 
        else 
        {
            $data   = $this->model_keilmuan->filter_data($id);
        }

        if (!empty($data)) 
        {
            $no = 1; 
            foreach($data as $_bidang_keilmuan): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $_bidang_keilmuan->nama_dosen ?></td>
                <td><?= $_bidang_keilmuan->bidang_ilmu ?></td>
                <td><?= $_bidang_keilmuan->nama_mk ?></td>
            </tr>
            <?php endforeach; ?> <?php
        } else 
        {
            ?>
                 <tr>
                    <td colspan="4" align="center">DATA TIDAK DI TEMUKAN</td>
                </tr>
            <?php
        }

    }

    public function _rules() {
        $this->form_validation->set_rules('kode_dosen', 'Kode Dosen', 'required');
        $this->form_validation->set_rules('bidang_ilmu', 'Bidang Ilmu', 'required');
        $this->form_validation->set_rules('kode_mk', 'Kode MK', 'required');
    }

}