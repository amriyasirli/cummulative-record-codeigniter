<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Psikologi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Psikologi_model');
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');

        // ------Authentication-------
        if(!$this->session->userdata('username')){
            redirect ('Auth/blocked');
        }
        if($this->session->userdata('role_id') == 2){
            redirect ('Beranda');
        }
        // ----------------------------
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'psikologi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'psikologi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'psikologi/index.html';
            $config['first_url'] = base_url() . 'psikologi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Psikologi_model->total_rows($q);
        $psikologi = $this->Psikologi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'psikologi_data' => $psikologi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['psikologi_data']= $this->Psikologi_model->gabung();
        $this->load->view('psikologi/psikologi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Psikologi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'psikologi_id' => $row->psikologi_id,
		'siswa_nama' => $row->siswa_nama,
		'psikologi_bakat' => $row->psikologi_bakat,
		'psikologi_minat' => $row->psikologi_minat,
		'psikologi_hobi' => $row->psikologi_hobi,
		'psikologi_citacita' => $row->psikologi_citacita,
		'psikologi_sekolah_impian' => $row->psikologi_sekolah_impian,
		'psikologi_perguruan' => $row->psikologi_perguruan,
		'psikologi_dunia_kerja' => $row->psikologi_dunia_kerja,
		'psikologi_ekskul' => $row->psikologi_ekskul,
		'psikologi_pelajaran_suka' => $row->psikologi_pelajaran_suka,
		'psikologi_pelajaran_sulit' => $row->psikologi_pelajaran_sulit,
	    );
            $this->load->view('psikologi/psikologi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('psikologi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('psikologi/create_action'),
	    'psikologi_id' => set_value('psikologi_id'),
	    'psikologi_siswa_id' => set_value('psikologi_siswa_id'),
	    'psikologi_bakat' => set_value('psikologi_bakat'),
	    'psikologi_minat' => set_value('psikologi_minat'),
	    'psikologi_hobi' => set_value('psikologi_hobi'),
	    'psikologi_citacita' => set_value('psikologi_citacita'),
	    'psikologi_sekolah_impian' => set_value('psikologi_sekolah_impian'),
	    'psikologi_perguruan' => set_value('psikologi_perguruan'),
	    'psikologi_dunia_kerja' => set_value('psikologi_dunia_kerja'),
	    'psikologi_ekskul' => set_value('psikologi_ekskul'),
	    'psikologi_pelajaran_suka' => set_value('psikologi_pelajaran_suka'),
	    'psikologi_pelajaran_sulit' => set_value('psikologi_pelajaran_sulit'),
    );
        $data['data']=$this->Psikologi_model->tampil_();
        $this->load->view('psikologi/psikologi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $random = rand(); //membuat id dengan nomor acak
            $psikologi_siswa_id = $this->input->post('psikologi_siswa_id',TRUE);
           
            $data = array(
		'psikologi_id' => $random,
		'psikologi_siswa_id' => $this->input->post('psikologi_siswa_id',TRUE),
		'psikologi_bakat' => $this->input->post('psikologi_bakat',TRUE),
		'psikologi_minat' => $this->input->post('psikologi_minat',TRUE),
		'psikologi_hobi' => $this->input->post('psikologi_hobi',TRUE),
		'psikologi_citacita' => $this->input->post('psikologi_citacita',TRUE),
		'psikologi_sekolah_impian' => $this->input->post('psikologi_sekolah_impian',TRUE),
		'psikologi_perguruan' => $this->input->post('psikologi_perguruan',TRUE),
		'psikologi_dunia_kerja' => $this->input->post('psikologi_dunia_kerja',TRUE),
		'psikologi_ekskul' => $this->input->post('psikologi_ekskul',TRUE),
		'psikologi_pelajaran_suka' => $this->input->post('psikologi_pelajaran_suka',TRUE),
		'psikologi_pelajaran_sulit' => $this->input->post('psikologi_pelajaran_sulit',TRUE),
	    );
            $this->db->set('siswa_psikologi_id', $random);
            $this->db->where('siswa_id', $psikologi_siswa_id);
            $this->db->update('siswa');
            $this->Psikologi_model->insert($data);
            $this->session->set_flashdata('message', '<div class="badge badge-success">Data Berhasil Di Tambahkan</div>');
            redirect('psikologi');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Psikologi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('psikologi/update_action'),
		'psikologi_id' => set_value('psikologi_id', $row->psikologi_id),
        'psikologi_siswa_id' => set_value('psikologi_siswa_id', $row->psikologi_siswa_id),
        'siswa_nama' => set_value('siswa_nama', $row->siswa_nama),
		'psikologi_bakat' => set_value('psikologi_bakat', $row->psikologi_bakat),
		'psikologi_minat' => set_value('psikologi_minat', $row->psikologi_minat),
		'psikologi_hobi' => set_value('psikologi_hobi', $row->psikologi_hobi),
		'psikologi_citacita' => set_value('psikologi_citacita', $row->psikologi_citacita),
		'psikologi_sekolah_impian' => set_value('psikologi_sekolah_impian', $row->psikologi_sekolah_impian),
		'psikologi_perguruan' => set_value('psikologi_perguruan', $row->psikologi_perguruan),
		'psikologi_dunia_kerja' => set_value('psikologi_dunia_kerja', $row->psikologi_dunia_kerja),
		'psikologi_ekskul' => set_value('psikologi_ekskul', $row->psikologi_ekskul),
		'psikologi_pelajaran_suka' => set_value('psikologi_pelajaran_suka', $row->psikologi_pelajaran_suka),
		'psikologi_pelajaran_sulit' => set_value('psikologi_pelajaran_sulit', $row->psikologi_pelajaran_sulit),
	    );
            $this->load->view('psikologi/psikologi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('psikologi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('psikologi_id', TRUE));
        } else {
            $data = array(
		'psikologi_siswa_id' => $this->input->post('psikologi_siswa_id',TRUE),
		'psikologi_bakat' => $this->input->post('psikologi_bakat',TRUE),
		'psikologi_minat' => $this->input->post('psikologi_minat',TRUE),
		'psikologi_hobi' => $this->input->post('psikologi_hobi',TRUE),
		'psikologi_citacita' => $this->input->post('psikologi_citacita',TRUE),
		'psikologi_sekolah_impian' => $this->input->post('psikologi_sekolah_impian',TRUE),
		'psikologi_perguruan' => $this->input->post('psikologi_perguruan',TRUE),
		'psikologi_dunia_kerja' => $this->input->post('psikologi_dunia_kerja',TRUE),
		'psikologi_ekskul' => $this->input->post('psikologi_ekskul',TRUE),
		'psikologi_pelajaran_suka' => $this->input->post('psikologi_pelajaran_suka',TRUE),
		'psikologi_pelajaran_sulit' => $this->input->post('psikologi_pelajaran_sulit',TRUE),
	    );

            $this->Psikologi_model->update($this->input->post('psikologi_id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="badge badge-info">Data Berhasil Di Update</div>');
            redirect(site_url('psikologi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Psikologi_model->get_by_id($id);
        $siswa_id = $row->psikologi_siswa_id;
        $reset = '1'; // Ubah di tabel siswa siswa menjadi 1 yaitu dengan nilai default
        if ($row) {
            $this->db->set('siswa_psikologi_id', $reset);
            $this->db->where('siswa_id', $siswa_id);
            $this->db->update('siswa');
            $this->Psikologi_model->delete($id);
            $this->session->set_flashdata('message', '<div class="badge badge-danger">Data Berhasil Di Hapus</div>');
            redirect(site_url('psikologi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('psikologi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('psikologi_siswa_id', 'psikologi siswa id', 'trim|required');
	$this->form_validation->set_rules('psikologi_bakat', 'psikologi bakat', 'trim|required');
	$this->form_validation->set_rules('psikologi_minat', 'psikologi minat', 'trim|required');
	$this->form_validation->set_rules('psikologi_hobi', 'psikologi hobi', 'trim|required');
	$this->form_validation->set_rules('psikologi_citacita', 'psikologi citacita', 'trim|required');
	$this->form_validation->set_rules('psikologi_sekolah_impian', 'psikologi sekolah impian', 'trim|required');
	$this->form_validation->set_rules('psikologi_perguruan', 'psikologi perguruan', 'trim|required');
	$this->form_validation->set_rules('psikologi_dunia_kerja', 'psikologi dunia kerja', 'trim|required');
	$this->form_validation->set_rules('psikologi_ekskul', 'psikologi ekskul', 'trim|required');
	$this->form_validation->set_rules('psikologi_pelajaran_suka', 'psikologi pelajaran suka', 'trim|required');
	$this->form_validation->set_rules('psikologi_pelajaran_sulit', 'psikologi pelajaran sulit', 'trim|required');

	$this->form_validation->set_rules('psikologi_id', 'psikologi_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=psikologi.doc");

        $data = array(
            'psikologi_data' => $this->Psikologi_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('psikologi/psikologi_doc',$data);
    }

}

/* End of file Psikologi.php */
/* Location: ./application/controllers/Psikologi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-04 09:27:09 */
/* http://harviacode.com */