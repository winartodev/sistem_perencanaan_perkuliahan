<?php 
class Dashboard extends CI_Controller {
    public function index() {
        $data['matakuliah'] = $this->model_matakuliah->count_data();
        $data['dosen']      = $this->model_dosen->count_data();
        $data['kelas']      = $this->model_kelas->count_data();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/dashboard', $data);
        $this->load->view('templates/kaprodi/footer');
    }
}