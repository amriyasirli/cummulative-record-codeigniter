<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sosial extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sosial_model');
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
            $config['base_url'] = base_url() . 'sosial/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sosial/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sosial/index.html';
            $config['first_url'] = base_url() . 'sosial/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sosial_model->total_rows($q);
        $sosial = $this->Sosial_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sosial_data' => $sosial,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['sosial_data']= $this->Sosial_model->gabung();
        $this->load->view('sosial/sosial_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Sosial_model->get_by_id($id);
        if ($row) {
            $data = array(
		'sosial_id' => $row->sosial_id,
		'siswa_nama' => $row->siswa_nama,
		'sosial_sifat_suka' => $row->sosial_sifat_suka,
		'sosial_sifat_tdksuka' => $row->sosial_sifat_tdksuka,
		'sosial_motif_rumah' => $row->sosial_motif_rumah,
		'sosial_motif_sekolah' => $row->sosial_motif_sekolah,
	    );
            $this->load->view('sosial/sosial_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sosial'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sosial/create_action'),
	    'sosial_id' => set_value('sosial_id'),
	    'sosial_siswa_id' => set_value('sosial_siswa_id'),
	    'sosial_sifat_suka' => set_value('sosial_sifat_suka'),
	    'sosial_sifat_tdksuka' => set_value('sosial_sifat_tdksuka'),
	    'sosial_motif_rumah' => set_value('sosial_motif_rumah'),
	    'sosial_motif_sekolah' => set_value('sosial_motif_sekolah'),
    );
        $data['data']=$this->Sosial_model->tampil_();
        $this->load->view('sosial/sosial_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $random = rand(); //membuat id dengan nomor acak
            $sosial_siswa_id = $this->input->post('sosial_siswa_id',TRUE);

            $data = array(
		'sosial_id' => $random,
		'sosial_siswa_id' => $this->input->post('sosial_siswa_id',TRUE),
		'sosial_sifat_suka' => $this->input->post('sosial_sifat_suka',TRUE),
		'sosial_sifat_tdksuka' => $this->input->post('sosial_sifat_tdksuka',TRUE),
		'sosial_motif_rumah' => $this->input->post('sosial_motif_rumah',TRUE),
		'sosial_motif_sekolah' => $this->input->post('sosial_motif_sekolah',TRUE),
        );

            $this->db->set('siswa_sosial_id', $random);
            $this->db->where('siswa_id', $sosial_siswa_id);
            $this->db->update('siswa');

            $this->Sosial_model->insert($data);
            $this->session->set_flashdata('message', '<div class="badge badge-success">Data Berhasil Di Tambahkan</div>');
            redirect('sosial');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Sosial_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sosial/update_action'),
		'sosial_id' => set_value('sosial_id', $row->sosial_id),
        'sosial_siswa_id' => set_value('sosial_siswa_id', $row->sosial_siswa_id),
        'siswa_nama' => set_value('siswa_nama', $row->siswa_nama),
		'sosial_sifat_suka' => set_value('sosial_sifat_suka', $row->sosial_sifat_suka),
		'sosial_sifat_tdksuka' => set_value('sosial_sifat_tdksuka', $row->sosial_sifat_tdksuka),
		'sosial_motif_rumah' => set_value('sosial_motif_rumah', $row->sosial_motif_rumah),
		'sosial_motif_sekolah' => set_value('sosial_motif_sekolah', $row->sosial_motif_sekolah),
	    );
            $this->load->view('sosial/sosial_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sosial'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('sosial_id', TRUE));
        } else {
            $data = array(
		'sosial_siswa_id' => $this->input->post('sosial_siswa_id',TRUE),
		'sosial_sifat_suka' => $this->input->post('sosial_sifat_suka',TRUE),
		'sosial_sifat_tdksuka' => $this->input->post('sosial_sifat_tdksuka',TRUE),
		'sosial_motif_rumah' => $this->input->post('sosial_motif_rumah',TRUE),
		'sosial_motif_sekolah' => $this->input->post('sosial_motif_sekolah',TRUE),
	    );

            $this->Sosial_model->update($this->input->post('sosial_id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="badge badge-info">Data Berhasil Di Update</div>');
            redirect(site_url('sosial'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sosial_model->get_by_id($id);
        $siswa_id = $row->sosial_siswa_id;
        $reset = '1';
        if ($row) {
            $this->db->set('siswa_sosial_id', $reset);
            $this->db->where('siswa_id', $siswa_id);
            $this->db->update('siswa');
            $this->Sosial_model->delete($id);
            $this->session->set_flashdata('message', '<div class="badge badge-danger">Data Berhasil Di Hapus</div>');
            redirect(site_url('sosial'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sosial'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('sosial_siswa_id', 'sosial siswa id', 'trim|required');
	$this->form_validation->set_rules('sosial_sifat_suka', 'sosial sifat suka', 'trim|required');
	$this->form_validation->set_rules('sosial_sifat_tdksuka', 'sosial sifat tdksuka', 'trim|required');
	$this->form_validation->set_rules('sosial_motif_rumah', 'sosial motif rumah', 'trim|required');
	$this->form_validation->set_rules('sosial_motif_sekolah', 'sosial motif sekolah', 'trim|required');

	$this->form_validation->set_rules('sosial_id', 'sosial_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=sosial.doc");

        $data = array(
            'sosial_data' => $this->Sosial_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('sosial/sosial_doc',$data);
    }

}

/* End of file Sosial.php */
/* Location: ./application/controllers/Sosial.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-04 09:27:09 */
/* http://harviacode.com */