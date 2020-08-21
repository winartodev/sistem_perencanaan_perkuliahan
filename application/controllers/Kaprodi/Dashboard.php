<?php 
class Dashboard extends CI_Controller {
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
        $data['pengajuan']  = $this->db->get('tbl_pengajuan')->result();
        $data['matakuliah'] = $this->model_matakuliah->count_data();
        $data['dosen']      = $this->model_dosen->count_data();
        $data['kelas']      = $this->model_kelas->count_data();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/dashboard', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function delete_pengajuan($id) 
    {
        $where = array('id_pengajuan' => $id);
        $this->model_perencanaan->delete_data($where, 'tbl_pengajuan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Dosen Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('kaprodi/dashboard')); 
    }
}