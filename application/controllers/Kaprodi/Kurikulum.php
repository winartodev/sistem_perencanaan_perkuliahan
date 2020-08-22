<?php
class Kurikulum extends CI_Controller {
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
        $data['kurikulum'] = $this->model_kurikulum->read_data();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/kurikulum', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function add() {
        $data['tahun_akademik'] = $this->model_tahun_akademik->read_data()->result();
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $data['dosen']      = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_insert_kurikulum', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function edit($id) {
        $where = array('id_kurikulum' => $id);
        $data['kurikulum']  = $this->model_kurikulum->form_edit($where, 'tbl_kurikulum')->result();
        $data['tahun_akademik'] = $this->model_tahun_akademik->read_data()->result();
        $data['matakuliah'] = $this->model_matakuliah->read_data()->result();
        $data['dosen']      = $this->model_dosen->read_data()->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/form_edit_kurikulum', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function info($id_kurikulum) {
        $where = array('id_kurikulum' => $id_kurikulum);
        $data['kurikulum'] = $this->model_kurikulum->form_edit($where, 'tbl_kurikulum')->result();
        $this->load->view('templates/kaprodi/header');
        $this->load->view('templates/kaprodi/sidebar');
        $this->load->view('kaprodi/info_kurikulum', $data);
        $this->load->view('templates/kaprodi/footer');
    }

    public function filter_dosen() 
    {
        $data = $this->model_kurikulum->filter($this->input->post('kode_mk'));

        if ($this->input->post('kode_mk')) 
        {
            foreach($data as $_dosen): ?>
                <option value="<?= $_dosen->kode_dosen ?>"><?= $_dosen->nama_dosen ?></option>
            <?php endforeach; ?> <?php
        }
    }

    public function insert_kurikulum() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $tahun_akademik     = $this->input->post('tahun_akademik');
            $angkatan           = $this->input->post('angkatan');
            $semester           = $this->input->post('semester');
            $kode_mk            = $this->input->post('kode_mk');
            $kode_dosen         = $this->input->post('kode_dosen');

            $data = array (
                'id_tahun_akademik'     => $tahun_akademik,
                'angkatan_kurikulum'              => $angkatan,
                'semester_kurikulum'    => $semester,
                'kode_mk'               => $kode_mk,
                'kode_dosen'            => $kode_dosen
            );

            $this->model_kurikulum->insert_data($data, 'tbl_kurikulum');
            $this->session->set_flashdata('pesan','<div class="alert alert-info alert-dismissible fade show" role="alert">
                                                        <b>Kurikulum Berhasil di Buat.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('kaprodi/kurikulum')); 
        }
    }

    public function update_kurikulum() {
        $this->_rules();
             
        if ($this->form_validation->run() == FALSE) {
            $this->add();
        } else {
            $id_kurikulum       = $this->input->post('id_kurikulum');
            $tahun_akademik     = $this->input->post('tahun_akademik');
            $angkatan           = $this->input->post('angkatan');
            $semester           = $this->input->post('semester');
            $kode_mk            = $this->input->post('kode_mk');
            $kode_dosen         = $this->input->post('kode_dosen');


            $data = array (
                'id_tahun_akademik'     => $tahun_akademik,
                'angkatan_kurikulum'              => $angkatan,
                'semester_kurikulum'    => $semester,
                'kode_mk'               => $kode_mk,
                'kode_dosen'            => $kode_dosen
            ); 

            $where = array(
                'id_kurikulum'          => $id_kurikulum
            );

            $this->model_kurikulum->update_data($where, $data, 'tbl_kurikulum');
            $this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <b>kurikulum Berhasil di Ubah.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
            redirect(base_url('kaprodi/kurikulum')); 
        }
    }

    public function delete($id) {
        $where = array('id_kurikulum' => $id);
        $this->model_kurikulum->delete_data($where, 'tbl_kurikulum');
        $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                        <b>Data kurikulum Berhasil di Hapus.</b>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>');
        redirect(base_url('kaprodi/kurikulum'));  
    }

    public function filter_angkatan_with_semester()
    {
        $angkatan     = $_GET['angkatan'];
        $semester     = $_GET['semester'];

        if ($semester == "" && $angkatan == "") 
        {
            $data   = $this->model_kurikulum->read_data();
        } 
        else if ($semester != "" && $angkatan == "") 
        {
            $data   = $this->model_kurikulum->filter_semester($semester);

        } else if ($semester == "" && $angkatan != "") 
        {
            $data   = $this->model_kurikulum->filter_angkatan($angkatan);
        } else
        {
            $data   = $this->model_kurikulum->filter_angkatan_with_semester($angkatan, $semester);

        }

        if (!empty($data)) 
        {
            $no = 1; 
            foreach($data as $_kurikulum):  ?>
            <tr>
            	<td><?= $no++ ?></td>
            	<td><?= $_kurikulum->tahun_akademik ?></td>
            	<td><?= $_kurikulum->angkatan_kurikulum ?></td>
            	<td><?= $_kurikulum->semester_kurikulum ?></td>
            	<!-- <td><?= $_kurikulum->nama_dosen ?></td> -->
            	<td><?= $_kurikulum->nama_mk ?></td>
            	<td>
            		<?= anchor(base_url('kaprodi/kurikulum/info/'. $_kurikulum->id_kurikulum), '<div class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Info" href=""><i class="fas fa-search-plus"></i></div>')?>
            		<?= anchor(base_url('kaprodi/kurikulum/edit/'. $_kurikulum->id_kurikulum), '<div class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href=""><i class="fas fa-pencil-alt"></i></div>')?>
            		<?= anchor(base_url('kaprodi/kurikulum/delete/'. $_kurikulum->id_kurikulum), '<div class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></div>')?>
            	</td>
            </tr>
            <?php endforeach; ?> <?php
        } else 
        {
            ?>
                 <tr>
                    <td colspan="7" align="center">DATA TIDAK DI TEMUKAN</td>
                </tr>
            <?php
        }
    }


    public function _rules() {
        $this->form_validation->set_rules('tahun_akademik', 'tahun akademik', 'required');
        $this->form_validation->set_rules('angkatan', 'angkatan', 'required');
        $this->form_validation->set_rules('semester', 'semester', 'required');
        $this->form_validation->set_rules('kode_mk', 'matakuliah', 'required');
        $this->form_validation->set_rules('kode_dosen', 'dosen', 'required');
    }

}