<?php 
class TahunAkademik extends CI_Controller {
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
        $data['check_tahun_akademik'] = $this->check_tahun_akademik();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/tahunakademik', $data);
        $this->load->view('templates/baak/footer');
    }

    public function check_tahun_akademik() 
    {
        $tahun_akademik = $this->model_tahun_akademik->count_data();
        $data = $this->model_tahun_akademik->read_data();
        if ($tahun_akademik == 0) 
        {
            $this->session->set_flashdata('check_tahun_akademik','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <b>Tahun Akademik Belum di Isi Silahkan di Isi Terlebih dahulu </b>
                                                <br><br>
                                                <a class="btn btn-primary btn-sm" href='.base_url('baak/tahunakademik/buat_tahun_akademik').'> 
                                                Buat Tahun Akademik
                                                </a>        
                                            </div>');
        } 
        else 
        {
            $this->session->set_flashdata('check_tahun_akademik','<div>
                                                <b>Tahun Akademik '.$this->model_tahun_akademik->get_tahun_akademik().' Semester '.$this->model_tahun_akademik->get_semester().'</b>
                                                <br><br>
                                                <a class="btn btn-info btn-sm mr-3" href='.base_url('baak/penginputan/input_tanggal_perencanaan').'> 
                                                Buat Tanggal Perencanaan
                                                </a> 
                                                <a class="btn btn-danger btn-sm" href='.base_url('baak/tahunakademik/ubah_tahun_akademik/'. 6).'> 
                                                Ubah Tahun Akademik
                                                </a> 
                                            </div>');
        }
    }

    public function buat_tahun_akademik() 
    {
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/buat_tahun_akademik');
        $this->load->view('templates/baak/footer');
    }

    public function ubah_tahun_akademik($id) 
    {
        $where = array('id_ta' => $id);
        $data['tahun_akademik']    = $this->model_tahun_akademik->form_edit($where, 'tbl_tahun_akademik');
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/ubah_tahun_akademik', $data);
        $this->load->view('templates/baak/footer');
    }

    public function insert_tahun_akademik() 
    {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->buat_tahun_akademik();
        } else {
            $tahun_akademik     = $this->input->post('tahun_akademik');
            $semester   = $this->input->post('semester');

            $data = array (
                'tahun_akademik'    => $tahun_akademik,
                'semester'  => $semester,
            );

            $this->model_tahun_akademik->insert_data($data, 'tbl_tahun_akademik');
            
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Tahun Akademik berhasil di Buat.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('baak/tahunakademik')); 
        }
    }

    public function update_tahun_akademik() 
    {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->ubah_tahun_akademik();
        } else {
            $id_ta     = $this->input->post('id_ta');
            $tahun_akademik     = $this->input->post('tahun_akademik');
            $semester   = $this->input->post('semester');

            $data = array (
                'tahun_akademik'    => $tahun_akademik,
                'semester'  => $semester,
            );

            $where = array (
                'id_ta' => $id_ta
            );

            $this->model_tahun_akademik->update_data( $where, $data,'tbl_tahun_akademik');
            
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Tahun Akademik berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('baak/tahunakademik')); 
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('tahun_akademik', 'tahun akademik', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
    }
}