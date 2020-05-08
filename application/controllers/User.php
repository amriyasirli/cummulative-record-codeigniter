<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('username')){
            redirect ('Auth/blocked');
        }
    }

    public function index()
    {
        $this->is_login();   
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user/user_list', $data);
    }

    public function is_login(){
        if($this->session->userdata('role_id') == 2){
            $this->session->set_flashdata('akses', '<div class="alert alert-danger" role="alert">Akses Kami Tolak, Hubungi Administrator Untuk Informasi Lebih Lanjut !</div>');
            redirect ('Beranda');
        }
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'user_id' => $row->user_id,
		'nama' => $row->nama,
		'username' => $row->username,
		'password' => $row->password,
		'foto' => $row->foto,
		'data_created' => $row->data_created,
		'role_id' => $row->role_id,
	    );
            $this->load->view('user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $this->is_login();
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'user_id' => set_value('user_id'),
	    'nama' => set_value('nama'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'foto' => set_value('foto'),
	    'data_created' => set_value('data_created'),
	    'role_id' => set_value('role_id'),
	);
        $this->load->view('user/user_form', $data);
    }

    public function tambah (){
        $this->is_login();
        if($this->input->post('tambah-user')) {
            $this->_rules(); //form validationnya

            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('user/user_tambah');    
                $this->load->view('template/footer'); 
            } else {     
                $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $role_id = $this->input->post('role_id');
                
                $upload_image = $_FILES['foto'];

                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/img-user/';
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $foto = $this->upload->data('file_name');                 
                    
                    $data = array(
                        "nama"     => $nama,
                        "username" => $username,
                        "password" => $password,
                        "role_id"  => $role_id,
                        "foto"     => $foto,
                        'data_created' => time()
                    );
                    $this->User_model->insert($data);
                    redirect('User', 'refresh');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('user/user_tambah');    
            $this->load->view('template/footer');
        }
    }
    
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'user_id' => set_value('user_id', $row->user_id),
		'nama' => set_value('nama', $row->nama),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'foto' => set_value('foto', $row->foto),
		'data_created' => set_value('data_created', $row->data_created),
		'role_id' => set_value('role_id', $row->role_id),
	    );
            $this->load->view('user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('user_id', TRUE));
        } else {
            $nama = $this->input->post('nama');
                $username = $this->input->post('username');
                $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
                $role_id = $this->input->post('role_id');
                
                $upload_image = $_FILES['foto'];
                $path		= './assets/img/img-user/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/img-user/';
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

					$foto = $this->upload->data('file_name');    
					// hapus foto pada direktori
					@unlink($path.$this->input->post('fotolama'));             
                    
                    $data = array(
                        "nama"     => $nama,
                        "username" => $username,
                        "password" => $password,
                        "role_id"  => $role_id,
                        "foto"     => $foto
                    );
                    $this->User_model->update($this->input->post('user_id', TRUE), $data);
                    redirect('User', 'refresh');
                } else {
                    $data = array(
                        "nama"     => $nama,
                        "username" => $username,
                        "password" => $password,
                        "role_id"  => $role_id
                        
                    );
                    $this->User_model->update($this->input->post('user_id', TRUE), $data);
                    redirect('User', 'refresh');
                }
        }
    }
    
    public function delete($id) 
    {
        $this->is_login();
        $row = $this->User_model->get_by_id($id);
        $path		= './assets/img/img-user/';
        $foto_user = $row->foto;

        if ($row) {
            @unlink($path.$foto_user); //hapus foto siswa pada direktori penyimpanan
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');

	$this->form_validation->set_rules('user_id', 'user_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }


}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-05 10:08:34 */
/* http://harviacode.com */