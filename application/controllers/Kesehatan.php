<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kesehatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kesehatan_model');
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
            $config['base_url'] = base_url() . 'kesehatan/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kesehatan/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kesehatan/index.html';
            $config['first_url'] = base_url() . 'kesehatan/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kesehatan_model->total_rows($q);
        $kesehatan = $this->Kesehatan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kesehatan_data' => $kesehatan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['kesehatan_data']= $this->Kesehatan_model->gabung();
        $this->load->view('kesehatan/kesehatan_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kesehatan_model->get_by_id($id);
        if ($row) {
            $data = array(
		'kesehatan_id' => $row->kesehatan_id,
		'siswa_nama' => $row->siswa_nama,
		'kesehatan_darah' => $row->kesehatan_darah,
		'kesehatan_penyakit' => $row->kesehatan_penyakit,
		'kesehatan_kelainan_jasmani' => $row->kesehatan_kelainan_jasmani,
		'kesehatan_tinggi' => $row->kesehatan_tinggi,
		'kesehatan_berat' => $row->kesehatan_berat,
	    );
            $this->load->view('kesehatan/kesehatan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kesehatan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kesehatan/create_action'),
	    'kesehatan_id' => set_value('kesehatan_id'),
	    'kesehatan_siswa_id' => set_value('kesehatan_siswa_id'),
	    'kesehatan_darah' => set_value('kesehatan_darah'),
	    'kesehatan_penyakit' => set_value('kesehatan_penyakit'),
	    'kesehatan_kelainan_jasmani' => set_value('kesehatan_kelainan_jasmani'),
	    'kesehatan_tinggi' => set_value('kesehatan_tinggi'),
	    'kesehatan_berat' => set_value('kesehatan_berat'),
    );
        $data['data']=$this->Kesehatan_model->tampil_();
        $this->load->view('kesehatan/kesehatan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            $kesehatan_siswa_id = $this->input->post('kesehatan_siswa_id');
            $kesehatan_darah = $this->input->post('kesehatan_darah');
            $kesehatan_penyakit = $this->input->post('kesehatan_penyakit');
            $kesehatan_kelainan_jasmani = $this->input->post('kesehatan_kelainan_jasmani');
            $kesehatan_tinggi = $this->input->post('kesehatan_tinggi');
            $kesehatan_berat = $this->input->post('kesehatan_berat');

           $random = rand();
                    
            $data = array(
                "kesehatan_id" => $random, 
                "kesehatan_siswa_id" => $kesehatan_siswa_id,
                "kesehatan_darah"    => $kesehatan_darah,
                "kesehatan_penyakit" => $kesehatan_penyakit,
                "kesehatan_kelainan_jasmani"=> $kesehatan_kelainan_jasmani,
                "kesehatan_tinggi"   => $kesehatan_tinggi,
                "kesehatan_berat"    => $kesehatan_berat
            );

            $this->db->set('siswa_kesehatan_id', $random);
            $this->db->where('siswa_id', $kesehatan_siswa_id);
            $this->db->update('siswa');
            $this->Kesehatan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="badge badge-success">Data Berhasil Di Tambahkan</div>');
            redirect('kesehatan');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kesehatan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kesehatan/update_action'),
		'kesehatan_id' => set_value('kesehatan_id', $row->kesehatan_id),
		'kesehatan_siswa_id' => set_value('kesehatan_siswa_id', $row->kesehatan_siswa_id),
		'siswa_nama' => set_value('siswa_nama', $row->siswa_nama),
		'kesehatan_darah' => set_value('kesehatan_darah', $row->kesehatan_darah),
		'kesehatan_penyakit' => set_value('kesehatan_penyakit', $row->kesehatan_penyakit),
		'kesehatan_kelainan_jasmani' => set_value('kesehatan_kelainan_jasmani', $row->kesehatan_kelainan_jasmani),
		'kesehatan_tinggi' => set_value('kesehatan_tinggi', $row->kesehatan_tinggi),
		'kesehatan_berat' => set_value('kesehatan_berat', $row->kesehatan_berat),
        );
            
            $this->load->view('kesehatan/kesehatan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kesehatan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kesehatan_id', TRUE));
        } else {
            $data = array(
		'kesehatan_siswa_id' => $this->input->post('kesehatan_siswa_id',TRUE),
		'kesehatan_darah' => $this->input->post('kesehatan_darah',TRUE),
		'kesehatan_penyakit' => $this->input->post('kesehatan_penyakit',TRUE),
		'kesehatan_kelainan_jasmani' => $this->input->post('kesehatan_kelainan_jasmani',TRUE),
		'kesehatan_tinggi' => $this->input->post('kesehatan_tinggi',TRUE),
		'kesehatan_berat' => $this->input->post('kesehatan_berat',TRUE),
	    );

            $this->Kesehatan_model->update($this->input->post('kesehatan_id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="badge badge-info">Data Berhasil Di Update</div>');
            redirect(site_url('kesehatan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kesehatan_model->get_by_id($id);
        $siswa_id = $row->kesehatan_siswa_id;
        $reset = '1'; // Ubah di tabel siswa siswa menjadi 1 yaitu dengan nilai default
        if ($row) {
            $this->db->set('siswa_kesehatan_id', $reset);
            $this->db->where('siswa_id', $siswa_id);
            $this->db->update('siswa');
            $this->Kesehatan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="badge badge-danger">Data Berhasil Di Hapus</div>');
            redirect(site_url('kesehatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kesehatan'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kesehatan_siswa_id', 'kesehatan siswa id', 'trim|required');
	$this->form_validation->set_rules('kesehatan_darah', 'kesehatan darah', 'trim|required');
	$this->form_validation->set_rules('kesehatan_penyakit', 'kesehatan penyakit', 'trim|required');
	$this->form_validation->set_rules('kesehatan_kelainan_jasmani', 'kesehatan kelainan jasmani', 'trim|required');
	$this->form_validation->set_rules('kesehatan_tinggi', 'kesehatan tinggi', 'trim|required');
	$this->form_validation->set_rules('kesehatan_berat', 'kesehatan berat', 'trim|required');

	$this->form_validation->set_rules('kesehatan_id', 'kesehatan_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

}

/* End of file Kesehatan.php */
/* Location: ./application/controllers/Kesehatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-04 09:27:09 */
/* http://harviacode.com */