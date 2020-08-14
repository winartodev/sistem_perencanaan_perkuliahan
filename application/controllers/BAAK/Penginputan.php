<?php
class Penginputan extends CI_Controller {
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

    public function input_tanggal_perencanaan() 
    {
        $data['check_tanggal_perencanaan'] = $this->check_tanggal_perencanaan();
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/input_tanggal_perencanaan', $data);
        $this->load->view('templates/baak/footer');
    }

    public function ubah_tanggal_perencanaan() 
    {
        $where = array('jenis_penginputan' => 'Buat_Perencanaan');
        $data['tanggal_perencanaan'] = $this->model_penginputan->read_data_tanggal_perencanaan($where);
        $this->load->view('templates/baak/header');
        $this->load->view('templates/baak/sidebar');
        $this->load->view('baak/form_ubah_tanggal_perencanaan', $data);
        $this->load->view('templates/baak/footer');
    }

    public function check_tanggal_perencanaan() 
    {
        $tanggal_perencanaan = $this->model_penginputan->check_tanggal('Buat_Perencanaan');

        if (!$tanggal_perencanaan) 
        {   
            $this->session->set_flashdata('check_tanggal_perencanaan','<form method="POST" action='.base_url('baak/penginputan/insert_tanggal_perencanaan').'
                                                                        enctype="multipart/form-data">
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label>Tanggal Mulai Penginputan Perencanaan</label>
                                                                                <input type="date" name="tanggal_mulai" class="form-control">
                                                                                '.form_error('tanggal_mulai', '<div class="text-small text-danger">', '</div>').'
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Tanggal Akhir Penginputan Perencanaan</label>
                                                                                <input type="date" name="tanggal_akhir" class="form-control">
                                                                                '.form_error('tanggal_akhir', '<div class="text-small text-danger">', '</div>').'
                                                                            </div>
                                                                            <div class="card-footer text-right">
                                                                                <button class="btn btn-danger" type="reset"> <i
                                                                                        class="fa fa-undo mr-1"></i>Reset</button>
                                                                                <button class="btn btn-primary mr-2" type="submit"> <i
                                                                                        class="fa fa-save mr-1"></i>Save</button>

                                                                            </div>
                                                                        </div>
                                                                    </form>');
        } 
        else 
        {
            $this->session->set_flashdata('check_tanggal_perencanaan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                        <b>Batas Tanggal Penginputan Perencanaan Sudah di Buat.</b>
                                                                        <br><br>
                                                                        <a type="button" class="btn btn-warning btn-sm" href='.base_url('baak/penginputan/ubah_tanggal_perencanaan').'>Ubah Tanggal Penginputan</a>
                                                                        </button>
                                                                    </div>');
        } 
    }

    public function insert_tanggal_perencanaan() 
    {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->input_tanggal_perencanaan();
        } else {
            $tanggal_mulai   = $this->input->post('tanggal_mulai');
            $tanggal_akhir   = $this->input->post('tanggal_akhir');

            $data = array (
                'jenis_penginputan' => 'Buat_Perencanaan',
                'tanggal_mulai'     => $tanggal_mulai,
                'tanggal_akhir'     => $tanggal_akhir
            );

            $this->model_penginputan->insert_data($data, 'tbl_penginputan');
            
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Tahun Perencanaan berhasil di Buat.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('baak/tahunakademik')); 
        }
    } 

    public function update_tanggal_perencanaan() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $id_penginputan     = $this->input->post('id_penginputan');
            $tanggal_mulai      = $this->input->post('tanggal_mulai');
            $tanggal_akhir      = $this->input->post('tanggal_akhir');


            $data = array (
                'tanggal_mulai'     => $tanggal_mulai,
                'tanggal_akhir'     => $tanggal_akhir
            );

            $where = array(
                'id_penginputan' => $id_penginputan
            );

            $this->model_penginputan->update_data($where, $data, 'tbl_penginputan');
            
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Tanggal Perencanaan Berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('baak/tahunakademik')); 
        }
    } 

    public function _rules() {
        $this->form_validation->set_rules('tanggal_mulai', 'tanggal mulai', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'tanggal akhir', 'required');
    }
}
   