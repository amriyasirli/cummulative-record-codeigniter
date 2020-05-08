<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guru extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
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
            $config['base_url'] = base_url() . 'guru/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'guru/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'guru/index';
            $config['first_url'] = base_url() . 'guru/index';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Guru_model->total_rows($q);
        $guru = $this->Guru_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'guru_data' => $guru,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('guru/guru_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Guru_model->get_by_id($id);
        if ($row) {
            $data = array(
		'guru_id' => $row->guru_id,
		'guru_nip' => $row->guru_nip,
		'guru_nama' => $row->guru_nama,
		'guru_golongan' => $row->guru_golongan,
		'guru_gender' => $row->guru_gender,
		'guru_jabatan' => $row->guru_jabatan,
	    );
            $this->load->view('guru/guru_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guru'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('guru/create_action'),
	    'guru_id' => set_value('guru_id'),
	    'guru_nip' => set_value('guru_nip'),
	    'guru_nama' => set_value('guru_nama'),
	    'guru_golongan' => set_value('guru_golongan'),
	    'guru_gender' => set_value('guru_gender'),
	    'guru_jabatan' => set_value('guru_jabatan'),
	);
        $this->load->view('guru/guru_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'guru_nip' => $this->input->post('guru_nip',TRUE),
		'guru_nama' => $this->input->post('guru_nama',TRUE),
		'guru_golongan' => $this->input->post('guru_golongan',TRUE),
		'guru_gender' => $this->input->post('guru_gender',TRUE),
		'guru_jabatan' => $this->input->post('guru_jabatan',TRUE),
	    );

            $this->Guru_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('guru'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Guru_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('guru/update_action'),
		'guru_id' => set_value('guru_id', $row->guru_id),
		'guru_nip' => set_value('guru_nip', $row->guru_nip),
		'guru_nama' => set_value('guru_nama', $row->guru_nama),
		'guru_golongan' => set_value('guru_golongan', $row->guru_golongan),
		'guru_gender' => set_value('guru_gender', $row->guru_gender),
		'guru_jabatan' => set_value('guru_jabatan', $row->guru_jabatan),
	    );
            $this->load->view('guru/guru_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guru'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('guru_id', TRUE));
        } else {
            $data = array(
		'guru_nip' => $this->input->post('guru_nip',TRUE),
		'guru_nama' => $this->input->post('guru_nama',TRUE),
		'guru_golongan' => $this->input->post('guru_golongan',TRUE),
		'guru_gender' => $this->input->post('guru_gender',TRUE),
		'guru_jabatan' => $this->input->post('guru_jabatan',TRUE),
	    );

            $this->Guru_model->update($this->input->post('guru_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('guru'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Guru_model->get_by_id($id);

        if ($row) {
            $this->Guru_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('guru'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guru'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('guru_nip', 'guru nip', 'trim|required');
	$this->form_validation->set_rules('guru_nama', 'guru nama', 'trim|required');
	$this->form_validation->set_rules('guru_golongan', 'guru golongan', 'trim|required');
	$this->form_validation->set_rules('guru_gender', 'guru gender', 'trim|required');
	$this->form_validation->set_rules('guru_jabatan', 'guru jabatan', 'trim|required');

	$this->form_validation->set_rules('guru_id', 'guru_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "guru.xls";
        $judul = "guru";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Guru Nip");
	xlsWriteLabel($tablehead, $kolomhead++, "Guru Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Guru Golongan");
	xlsWriteLabel($tablehead, $kolomhead++, "Guru Gender");
	xlsWriteLabel($tablehead, $kolomhead++, "Guru Jabatan");

	foreach ($this->Guru_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->guru_nip);
	    xlsWriteLabel($tablebody, $kolombody++, $data->guru_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->guru_golongan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->guru_gender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->guru_jabatan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=guru.doc");

        $data = array(
            'guru_data' => $this->Guru_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('guru/guru_doc',$data);
    }

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-05 12:20:10 */
/* http://harviacode.com */