<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('login');

        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //user ada
        if ($user) {
                //cek passwordnya
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'user_id' => $user['user_id'],
                        'nama' => $user['nama'],
                        'username' => $user['username'],
                        'data_created' => $user['data_created'],
                        'foto' => $user['foto'],
                        'role_id' => $user['role_id'],
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role_id'] == 1) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Datang, '.$this->session->userdata('nama').' !</div>');
                        redirect('Beranda');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat Datang, '.$this->session->userdata('nama').' !</div>');
                        redirect('Beranda');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                    redirect('auth');
                }

        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Username Tidak Terdaftar !</div>');
            redirect('auth');
        }
    }


    // public function registration()
    // {
    //     //validasi data terlebih dahulu
    //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     $this->form_validation->set_rules(
    //         'username',
    //         'username',
    //         'required|trim|valid_username|is_unique[user.username]',
    //         [
    //             'is_unique' => 'username already Registered !',
    //         ]
    //     );
    //     $this->form_validation->set_rules(
    //         'password1',
    //         'Password',
    //         'required|trim|min_length[5]|matches[password2]',
    //         [
    //             'min_length' => 'Password too short',
    //             'matches' => 'Password dont match !',
    //         ]
    //     );
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    //     if ($this->form_validation->run() == false) {
    //         $data['title']   = 'User Registration';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/registration');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $data = [
    //             'name'        => htmlspecialchars($this->input->post('name'), true),
    //             'username'       => htmlspecialchars($this->input->post('username'), true),
    //             'image'       => 'default.jpg',
    //             'password'    => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'role_id'     => 2,
    //             'is_active'   => 1,
    //             'data_created' => time()
    //         ];
    //         $this->db->insert('user', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation. Your account has been registered, get Login now !</div>');
    //         redirect('auth');
    //     }
    // }


    public function logout()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Logout Berhasil !</div>');
        redirect('auth');
    }


    public function blocked()
    {

        $this->load->view('template/header');
        $this->load->view('block');
        $this->load->view('template/footer');
    }
}
