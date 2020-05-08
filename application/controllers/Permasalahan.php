<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Permasalahan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Permasalahan_model');
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
            $config['base_url'] = base_url() . 'permasalahan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'permasalahan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'permasalahan/index.html';
            $config['first_url'] = base_url() . 'permasalahan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Permasalahan_model->total_rows($q);
        $permasalahan = $this->Permasalahan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'permasalahan_data' => $permasalahan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['permasalahan_data']= $this->Permasalahan_model->gabung();
        $this->load->view('permasalahan/permasalahan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Permasalahan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'permasalahan_id' => $row->permasalahan_id,
		'siswa_nama' => $row->siswa_nama,
		'permasalahan_sekolah' => $row->permasalahan_sekolah,
		'permasalahan_keluarga' => $row->permasalahan_keluarga,
		'permasalahan_masyarakat' => $row->permasalahan_masyarakat,
		'permasalahan_teman' => $row->permasalahan_teman,
	    );
            $this->load->view('permasalahan/permasalahan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permasalahan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('permasalahan/create_action'),
	    'permasalahan_id' => set_value('permasalahan_id'),
	    'permasalahan_siswa_id' => set_value('permasalahan_siswa_id'),
	    'permasalahan_sekolah' => set_value('permasalahan_sekolah'),
	    'permasalahan_keluarga' => set_value('permasalahan_keluarga'),
	    'permasalahan_masyarakat' => set_value('permasalahan_masyarakat'),
	    'permasalahan_teman' => set_value('permasalahan_teman'),
    );
        $data['data']=$this->Permasalahan_model->tampil_();
        $this->load->view('permasalahan/permasalahan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $random = rand(); //membuat id dengan nomor acak
            $permasalahan_siswa_id = $this->input->post('permasalahan_siswa_id',TRUE);

            $data = array(
		'permasalahan_id' => $random,
		'permasalahan_siswa_id' => $this->input->post('permasalahan_siswa_id',TRUE),
		'permasalahan_sekolah' => $this->input->post('permasalahan_sekolah',TRUE),
		'permasalahan_keluarga' => $this->input->post('permasalahan_keluarga',TRUE),
		'permasalahan_masyarakat' => $this->input->post('permasalahan_masyarakat',TRUE),
		'permasalahan_teman' => $this->input->post('permasalahan_teman',TRUE),
	    );
            $this->db->set('siswa_permasalahan_id', $random);
            $this->db->where('siswa_id', $permasalahan_siswa_id);
            $this->db->update('siswa');
            $this->Permasalahan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="badge badge-success">Data Berhasil Di Tambahkan</div>');
            redirect('permasalahan');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Permasalahan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('permasalahan/update_action'),
		'permasalahan_id' => set_value('permasalahan_id', $row->permasalahan_id),
        'permasalahan_siswa_id' => set_value('permasalahan_siswa_id', $row->permasalahan_siswa_id),
        'siswa_nama' => set_value('siswa_nama', $row->siswa_nama),
		'permasalahan_sekolah' => set_value('permasalahan_sekolah', $row->permasalahan_sekolah),
		'permasalahan_keluarga' => set_value('permasalahan_keluarga', $row->permasalahan_keluarga),
		'permasalahan_masyarakat' => set_value('permasalahan_masyarakat', $row->permasalahan_masyarakat),
		'permasalahan_teman' => set_value('permasalahan_teman', $row->permasalahan_teman),
	    );
            $this->load->view('permasalahan/permasalahan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permasalahan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('permasalahan_id', TRUE));
        } else {
            $data = array(
		'permasalahan_siswa_id' => $this->input->post('permasalahan_siswa_id',TRUE),
		'permasalahan_sekolah' => $this->input->post('permasalahan_sekolah',TRUE),
		'permasalahan_keluarga' => $this->input->post('permasalahan_keluarga',TRUE),
		'permasalahan_masyarakat' => $this->input->post('permasalahan_masyarakat',TRUE),
		'permasalahan_teman' => $this->input->post('permasalahan_teman',TRUE),
	    );

            $this->Permasalahan_model->update($this->input->post('permasalahan_id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="badge badge-info">Data Berhasil Di Update</div>');
            redirect(site_url('permasalahan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Permasalahan_model->get_by_id($id);
        $siswa_id = $row->permasalahan_siswa_id;
        $reset = '1'; // Ubah di tabel siswa siswa menjadi 1 yaitu dengan nilai default

        if ($row) {
            $this->db->set('siswa_permasalahan_id', $reset);
            $this->db->where('siswa_id', $siswa_id);
            $this->db->update('siswa');
            $this->Permasalahan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="badge badge-danger">Data Berhasil Di Hapus</div>');
            redirect(site_url('permasalahan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('permasalahan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('permasalahan_siswa_id', 'permasalahan siswa id', 'trim|required');
	$this->form_validation->set_rules('permasalahan_sekolah', 'permasalahan sekolah', 'trim|required');
	$this->form_validation->set_rules('permasalahan_keluarga', 'permasalahan keluarga', 'trim|required');
	$this->form_validation->set_rules('permasalahan_masyarakat', 'permasalahan masyarakat', 'trim|required');
	$this->form_validation->set_rules('permasalahan_teman', 'permasalahan teman', 'trim|required');

	$this->form_validation->set_rules('permasalahan_id', 'permasalahan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=permasalahan.doc");

        $data = array(
            'permasalahan_data' => $this->Permasalahan_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('permasalahan/permasalahan_doc',$data);
    }

}

/* End of file Permasalahan.php */
/* Location: ./application/controllers/Permasalahan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-04 09:27:09 */
/* http://harviacode.com */