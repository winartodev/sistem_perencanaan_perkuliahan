<?php
class Perencanaan extends CI_Controller {
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
        $data['perencanaan'] = $this->model_perencanaan->read_data();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/perencanaan', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function add() {
        $data['kelompok']   = $this->model_kelas->get_nama_Kelompok();
        // $data['kelas']   = $this->model_kelas->read_data();
        // $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        // $data['dosen']      = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_insert_perencanaan', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function edit($id) {
        $where = array('id_perencanaan' => $id);
        $data['perencanaan']    = $this->model_perencanaan->form_edit($where, 'tbl_perencanaan');
        $data['kelompok']       = $this->model_perencanaan->get_nama_Kelompok();
        $data['matakuliah']     = $this->model_matakuliah->read_data()->result();
        $data['kelas']          = $this->model_kelas->read_data();
        $data['dosen']          = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_edit_perencanaan', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function info($id) {
        $where = array('id' => $id);
        $data['kelas']      = $this->model_perencanaan->form_edit($where, 'tbl_perencanaan');
        $data['mahasiswa']  = $this->model_perencanaan->get_mahasiswa($id)->result();
        $data['A15']        = $this->model_perencanaan->count_angkatan($id,'15','tbl_jadwal');
        $data['A16']        = $this->model_perencanaan->count_angkatan($id,'16','tbl_jadwal');
        $data['A17']        = $this->model_perencanaan->count_angkatan($id,'17','tbl_jadwal');
        $data['A18']        = $this->model_perencanaan->count_angkatan($id,'18','tbl_jadwal');
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/info_kelas', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function insert_perencanaan() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $kode_kelompok      = $this->input->post('kode_kelompok');
            $angkatan           = $this->input->post('angkatan');
            $semester           = $this->input->post('semester');
            $kode_mk            = $this->input->post('kode_mk');
            $kode_dosen         = $this->input->post('kode_dosen');
            $kode_kelas         = $this->input->post('kode_kelas');

            $data = array (
                'kode_kelompok'         => $kode_kelompok,
                'angkatan_perencanaan'              => $angkatan,
                'semester_perencanaan'  => $semester,
                'kode_mk'               => $kode_mk,
                'kode_dosen'            => $kode_dosen,
                'kode_kelas'            => $kode_kelas,
                'status_perencanaan'      => 'belum_verifikasi'
            );

            $this->model_perencanaan->insert_data($data, 'tbl_perencanaan');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Perencanaan Berhasil di Buat.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('kaprodi/perencanaan')); 
        }
    }

    public function filter_matakuliah () 
    {
        $angkatan = $this->input->post('angkatan');
        $semester = $this->input->post('semester');

        $data = $this->model_perencanaan->filter_matakuliah($angkatan, $semester);

        if ($angkatan || $semester) 
        {
            ?> 
                <option value="">Pilih Matakuliah</option>
            <?php
            foreach($data as $row): ?>
                <option value="<?= $row->kode_mk ?>"><?= $row->nama_mk ?></option>
            <?php endforeach; ?> <?php
        }
    }

    public function filter_dosen () 
    {
        $kode_mk = $this->input->post('kode_mk');

        $data = $this->model_perencanaan->filter_dosen($kode_mk);

        if ($kode_mk) 
        {
            ?> 
                <option value="">Pilih Dosen</option>
            <?php
            foreach($data as $row): ?>
                <option value="<?= $row->kode_dosen ?>"><?= $row->nama_dosen?></option>
            <?php endforeach; ?> <?php
        }
    }

    public function filter_kelas () 
    {
        $angkatan = $this->input->post('angkatan');

        $data = $this->model_perencanaan->filter_kelas($angkatan);

        if ($angkatan) 
        {
            ?> 
                <option value="">Pilih Kelas</option>
            <?php
            foreach($data as $row): ?>
                <option value="<?= $row->id ?>"><?= $row->nama_kelas?></option>
            <?php endforeach; ?> <?php
        }
    }

    public function update_perencanaan() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            // $this->edit($this->input->post('id'));
            var_dump('ERROR');
        } else {
            $id                 = $this->input->post('id');
            $kode_kelompok      = $this->input->post('kode_kelompok');
            $angkatan           = $this->input->post('angkatan');
            $semester           = $this->input->post('semester');
            $kode_mk            = $this->input->post('kode_mk');
            $kode_dosen         = $this->input->post('kode_dosen');
            $kode_kelas         = $this->input->post('kode_kelas');

            $data = array (
                'kode_kelompok'         => $kode_kelompok,
                'angkatan_perencanaan'              => $angkatan,
                'semester_perencanaan'  => $semester,
                'kode_mk'               => $kode_mk,
                'kode_dosen'            => $kode_dosen,
                'kode_kelas'            => $kode_kelas,
                'status_perencanaan'      => 'belum_verifikasi'
            );

            $where = array(
                'id_perencanaan' => $id
            );

            $this->model_perencanaan->update_data($where, $data, 'tbl_perencanaan');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <b>Kelas Berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('kaprodi/perencanaan')); 
        }
    }

    public function verifikasi($id) 
    {
        $id_perencanaan = $id;  

        $data = array (
            'status_perencanaan'      => 'sudah_verifikasi'
        );

        $where = array(
            'id_perencanaan' => $id_perencanaan
        );

        $this->model_perencanaan->update_data($where, $data, 'tbl_perencanaan');
        $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <b>Perencanaan Berhasil di Verifikasi.</b>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>');
        redirect(base_url('kaprodi/perencanaan'));        
    }

    public function delete($id) {
        $where = array('id_perencanaan' => $id);
        $this->model_perencanaan->delete_data($where, 'tbl_perencanaan');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data Kelas Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('kaprodi/perencanaan'));  
    }


    public function _rules() {
        $this->form_validation->set_rules('kode_kelompok', 'Nama Kelompok', 'required');
        // $this->form_validation->set_rules('angkatan', 'Angkatan', 'required');
        // $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('kode_mk', 'Mata Kuliah', 'required');
        $this->form_validation->set_rules('kode_dosen', 'Dosen', 'required');
        $this->form_validation->set_rules('kode_kelas', 'Kode Kelas', 'required');
    }

}