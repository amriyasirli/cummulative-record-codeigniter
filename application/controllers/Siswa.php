<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Kelas_model');
        $this->load->library('form_validation');

        // ------Authentication-------
        if(!$this->session->userdata('username')){
            redirect ('Auth/blocked');
        }
        
        // ----------------------------
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'siswa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'siswa/index.html';
            $config['first_url'] = base_url() . 'siswa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Siswa_model->total_rows($q);
        $siswa = $this->Siswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'siswa_data' => $siswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
		);
		$data['siswa_data']= $this->Siswa_model->gabung();
        $this->load->view('siswa/siswa_list', $data);
    }

    public function is_login(){
        if($this->session->userdata('role_id') == 2){
            $this->session->set_flashdata('akses', '<div class="alert alert-danger" role="alert">Akses Kami Tolak, Hanya Untuk Administrator dan anda hanya bisa Lihat Detail Siswa !</div>');
            redirect ('Siswa');
        }
    }

    public function read($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'siswa_id' => $row->siswa_id,
		'siswa_nis' => $row->siswa_nis,
		'siswa_nama' => $row->siswa_nama,
		'siswa_panggilan' => $row->siswa_panggilan,
		'siswa_gender' => $row->siswa_gender,
		'siswa_tgl_lahir' => $row->siswa_tgl_lahir,
		'siswa_tempat_lahir' => $row->siswa_tempat_lahir,
		'siswa_ortu' => $row->siswa_ortu,
		'siswa_alamat' => $row->siswa_alamat,
		'siswa_hp' => $row->siswa_hp,
		'siswa_agama' => $row->siswa_agama,
		'siswa_bahasa' => $row->siswa_bahasa,
		'siswa_tinggal' => $row->siswa_tinggal,
		'siswa_anak_ke' => $row->siswa_anak_ke,
		'siswa_foto' => $row->siswa_foto,
		'kelas_id' => $row->kelas_id,
		//data kelas
		'kelas_nama' => $row->kelas_nama,

		//data kesehatan
		'kesehatan_darah' => $row->kesehatan_darah,
		'kesehatan_penyakit' => $row->kesehatan_penyakit,
		'kesehatan_kelainan_jasmani' => $row->kesehatan_kelainan_jasmani,
		'kesehatan_tinggi' => $row->kesehatan_tinggi,
		'kesehatan_berat' => $row->kesehatan_berat,

		//data permasalahan
		'permasalahan_sekolah' => $row->permasalahan_sekolah,
		'permasalahan_keluarga' => $row->permasalahan_keluarga,
		'permasalahan_masyarakat' => $row->permasalahan_masyarakat,
		'permasalahan_teman' => $row->permasalahan_teman,

		//data psikolog
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

		//data sosia
		'sosial_sifat_suka' => $row->sosial_sifat_suka,
		'sosial_sifat_tdksuka' => $row->sosial_sifat_tdksuka,
		'sosial_motif_rumah' => $row->sosial_motif_rumah,
		'sosial_motif_sekolah' => $row->sosial_motif_sekolah
	    );
            $this->load->view('siswa/siswa_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="badge badge-secondary">Data Tidak Di Temukan !</div>');
            redirect(site_url('siswa'));
        }
    }

    public function create() 
    {
        $this->is_login();
        $data = array(
            'button' => 'Create',
            'action' => site_url('siswa/create_action'),
	    'siswa_id' => set_value('siswa_id'),
	    'siswa_nis' => set_value('siswa_nis'),
	    'siswa_nama' => set_value('siswa_nama'),
	    'siswa_panggilan' => set_value('siswa_panggilan'),
	    'siswa_gender' => set_value('siswa_gender'),
	    'siswa_tgl_lahir' => set_value('siswa_tgl_lahir'),
	    'siswa_tempat_lahir' => set_value('siswa_tempat_lahir'),
	    'siswa_ortu' => set_value('siswa_ortu'),
	    'siswa_alamat' => set_value('siswa_alamat'),
	    'siswa_hp' => set_value('siswa_hp'),
	    'siswa_agama' => set_value('siswa_agama'),
	    'siswa_bahasa' => set_value('siswa_bahasa'),
	    'siswa_tinggal' => set_value('siswa_tinggal'),
	    'siswa_anak_ke' => set_value('siswa_anak_ke'),
	    'siswa_foto' => set_value('siswa_foto'),
	    'siswa_kelas_id' => set_value('kelas'),
	    'kelas_nama' => set_value('kelas_nama'),
	    'siswa_kesehatan_id' => set_value('siswa_kesehatan_id'),
	    'siswa_permasalahan_id' => set_value('siswa_permasalahan_id'),
	    'siswa_psikologi_id' => set_value('siswa_psikologi_id'),
	    'siswa_sosial_id' => set_value('siswa_sosial_id'),
    );
        
		$data['kelas']=$this->db->get('kelas')->result();
        $this->load->view('siswa/siswa_form', $data);
	}
	

	public function tambah(){
        $this->is_login();
        if($this->input->post('simpan-siswa')) {
            $this->form_validation->set_rules(
                'nis',
                'Nis',
                'required|trim|is_unique[siswa.siswa_nis]',
                [
                    'is_unique' => 'Nis Sudah Digunakan !',
                ]
            );

            if($this->form_validation->run() == FALSE) {
                $data['data']=$this->db->get('kelas')->result();
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('siswa/siswa_tambah', $data);    
                $this->load->view('template/footer'); 
            } else {     
                $siswa_nis = $this->input->post('nis');
                $siswa_nama = $this->input->post('nama');
                $siswa_panggilan = $this->input->post('panggilan');
                $siswa_gender = $this->input->post('gender');
                $siswa_tgl_lahir = $this->input->post('tgl_lahir');
                $siswa_tempat_lahir = $this->input->post('tempat_lahir');
                $siswa_ortu = $this->input->post('ortu');
                $siswa_alamat = $this->input->post('alamat');
                $siswa_hp = $this->input->post('hp');
                $siswa_agama = $this->input->post('agama');
                $siswa_bahasa = $this->input->post('bahasa');
                $siswa_tinggal = $this->input->post('tinggal');
                $siswa_anak_ke = $this->input->post('anak_ke');
                $kelas = $this->input->post('kelas');
                $upload_image = $_FILES['foto'];

                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/img-siswa/';
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {

                    $foto = $this->upload->data('file_name');                 
                    
                    $data = array(
                        "siswa_nis"       => $siswa_nis,
                        "siswa_nama"      => $siswa_nama,
                        "siswa_panggilan" => $siswa_panggilan,
                        "siswa_gender"    => $siswa_gender,
                        "siswa_tgl_lahir" => $siswa_tgl_lahir,
                        "siswa_tempat_lahir"=> $siswa_tempat_lahir,
                        "siswa_ortu"      => $siswa_ortu,
                        "siswa_alamat"    => $siswa_alamat,
                        "siswa_hp"        => $siswa_hp,
                        "siswa_agama"     => $siswa_agama,
                        "siswa_bahasa"    => $siswa_bahasa,
                        "siswa_tinggal"   => $siswa_tinggal,
                        "siswa_anak_ke"   => $siswa_anak_ke,
                        "siswa_foto"      => $foto,
                        "siswa_kelas_id"  => $kelas,
                        "siswa_permasalahan_id" => 1,
                        "siswa_kesehatan_id" => 1,
                        "siswa_psikologi_id" => 1,
                        "siswa_sosial_id" => 1
                    );
                    $this->Siswa_model->insert($data);
                    $this->session->set_flashdata('message', '<div class="badge badge-success">Data Berhasil Di Tambahkan</div>');
                    redirect('Siswa', 'refresh');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        } else {
            $data['data']=$this->db->get('kelas')->result();
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('siswa/siswa_tambah', $data);    
            $this->load->view('template/footer');
        }
    
    }
    
    
    public function update($id) 
    {
        $this->is_login();
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('siswa/update_action'),
		'siswa_id' => set_value('siswa_id', $row->siswa_id),
		'siswa_nis' => set_value('siswa_nis', $row->siswa_nis),
		'siswa_nama' => set_value('siswa_nama', $row->siswa_nama),
		'siswa_panggilan' => set_value('siswa_panggilan', $row->siswa_panggilan),
		'siswa_gender' => set_value('siswa_gender', $row->siswa_gender),
		'siswa_tgl_lahir' => set_value('siswa_tgl_lahir', $row->siswa_tgl_lahir),
		'siswa_tempat_lahir' => set_value('siswa_tempat_lahir', $row->siswa_tempat_lahir),
		'siswa_ortu' => set_value('siswa_ortu', $row->siswa_ortu),
		'siswa_alamat' => set_value('siswa_alamat', $row->siswa_alamat),
		'siswa_hp' => set_value('siswa_hp', $row->siswa_hp),
		'siswa_agama' => set_value('siswa_agama', $row->siswa_agama),
		'siswa_bahasa' => set_value('siswa_bahasa', $row->siswa_bahasa),
		'siswa_tinggal' => set_value('siswa_tinggal', $row->siswa_tinggal),
		'siswa_anak_ke' => set_value('siswa_anak_ke', $row->siswa_anak_ke),
		'siswa_foto' => set_value('siswa_foto', $row->siswa_foto),
		'siswa_kelas_id' => set_value('siswa_kelas_id', $row->siswa_kelas_id),
		'siswa_kesehatan_id' => set_value('siswa_kesehatan_id', $row->siswa_kesehatan_id),
		'siswa_permasalahan_id' => set_value('siswa_permasalahan_id', $row->siswa_permasalahan_id),
		'siswa_psikologi_id' => set_value('siswa_psikologi_id', $row->siswa_psikologi_id),
		'siswa_sosial_id' => set_value('siswa_sosial_id', $row->siswa_sosial_id),
        );

            
            $data['data']=$this->db->get('kelas')->result();
            $this->load->view('siswa/siswa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan !');
            redirect(site_url('siswa'));
        }
    }
    
    public function update_action() 
    {
        $this->is_login();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('siswa_id', TRUE));
        } else {
            $siswa_nis = $this->input->post('siswa_nis');
                $siswa_nama = $this->input->post('siswa_nama');
                $siswa_panggilan = $this->input->post('siswa_panggilan');
                $siswa_gender = $this->input->post('siswa_gender');
                $siswa_tgl_lahir = $this->input->post('siswa_tgl_lahir');
                $siswa_tempat_lahir = $this->input->post('siswa_tempat_lahir');
                $siswa_ortu = $this->input->post('siswa_ortu');
                $siswa_alamat = $this->input->post('siswa_alamat');
                $siswa_hp = $this->input->post('siswa_hp');
                $siswa_agama = $this->input->post('siswa_agama');
                $siswa_bahasa = $this->input->post('siswa_bahasa');
                $siswa_tinggal = $this->input->post('siswa_tinggal');
                $siswa_anak_ke = $this->input->post('siswa_anak_ke');
                $siswa_kelas_id = $this->input->post('siswa_kelas_id');
				$upload_image = $_FILES['siswa_foto'];
				
				$path		= './assets/img/img-siswa/';

                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/img-siswa/';
                $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('siswa_foto')) {

					$foto = $this->upload->data('file_name');    
					// hapus foto pada direktori
					@unlink($path.$this->input->post('fotolama'));             
                    
                    $data = array(
                        "siswa_nis"       => $siswa_nis,
                        "siswa_nama"      => $siswa_nama,
                        "siswa_panggilan" => $siswa_panggilan,
                        "siswa_gender"    => $siswa_gender,
                        "siswa_tgl_lahir" => $siswa_tgl_lahir,
                        "siswa_tempat_lahir"=> $siswa_tempat_lahir,
                        "siswa_ortu"      => $siswa_ortu,
                        "siswa_alamat"    => $siswa_alamat,
                        "siswa_hp"        => $siswa_hp,
                        "siswa_agama"     => $siswa_agama,
                        "siswa_bahasa"    => $siswa_bahasa,
                        "siswa_tinggal"   => $siswa_tinggal,
                        "siswa_anak_ke"   => $siswa_anak_ke,
                        "siswa_kelas_id"   => $siswa_kelas_id,
                        "siswa_foto"      => $foto
                    );
                    $this->Siswa_model->update($this->input->post('siswa_id', TRUE), $data);
                    $this->session->set_flashdata('message', '<div class="badge badge-info">Data Berhasil Di Update</div>!');
                    redirect('Siswa', 'refresh');
                } else {
                    $data = array(
                        "siswa_nis"       => $siswa_nis,
                        "siswa_nama"      => $siswa_nama,
                        "siswa_panggilan" => $siswa_panggilan,
                        "siswa_gender"    => $siswa_gender,
                        "siswa_tgl_lahir" => $siswa_tgl_lahir,
                        "siswa_tempat_lahir"=> $siswa_tempat_lahir,
                        "siswa_ortu"      => $siswa_ortu,
                        "siswa_alamat"    => $siswa_alamat,
                        "siswa_hp"        => $siswa_hp,
                        "siswa_agama"     => $siswa_agama,
                        "siswa_bahasa"    => $siswa_bahasa,
                        "siswa_tinggal"   => $siswa_tinggal,
                        "siswa_anak_ke"   => $siswa_anak_ke,
                        "siswa_kelas_id"   => $siswa_kelas_id
                    );
                    $this->Siswa_model->update($this->input->post('siswa_id', TRUE), $data);
                    $this->session->set_flashdata('message', '<div class="badge badge-info">Data Berhasil Di Update</div>!');
                    redirect('Siswa', 'refresh');
                }
        }
    }
    
    public function delete($id) 
    {
        $this->is_login();
        $row = $this->Siswa_model->get_by_id($id);
        $path		= './assets/img/img-siswa/';
        $siswa_foto = $row->siswa_foto;

        if ($row) {
            @unlink($path.$siswa_foto); //hapus foto siswa pada direktori penyimpanan
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Data Dihapus');
            redirect(site_url('siswa'));
        } else {
            $this->session->set_flashdata('message', 'Data Tidak Ditemukan');
            redirect(site_url('siswa'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_message('required', 'Tidak Boleh Kosong');
    $this->form_validation->set_message('is_unique', 'Nis Sudah Digunakan');
	$this->form_validation->set_rules('siswa_nis', 'siswa nis', 'trim|required|is_unique[siswa.siswa_nis]');
	$this->form_validation->set_rules('siswa_nama', 'siswa nama', 'trim|required');
	$this->form_validation->set_rules('siswa_panggilan', 'siswa panggilan', 'trim|required');
	$this->form_validation->set_rules('siswa_gender', 'siswa gender', 'trim|required');
	$this->form_validation->set_rules('siswa_tgl_lahir', 'siswa tgl lahir', 'trim|required');
	$this->form_validation->set_rules('siswa_tempat_lahir', 'siswa tempat lahir', 'trim|required');
	$this->form_validation->set_rules('siswa_ortu', 'siswa ortu', 'trim|required');
	$this->form_validation->set_rules('siswa_alamat', 'siswa alamat', 'trim|required');
	$this->form_validation->set_rules('siswa_hp', 'siswa hp', 'trim|required');
	$this->form_validation->set_rules('siswa_agama', 'siswa agama', 'trim|required');
	$this->form_validation->set_rules('siswa_bahasa', 'siswa bahasa', 'trim|required');
	$this->form_validation->set_rules('siswa_tinggal', 'siswa tinggal', 'trim|required');
	$this->form_validation->set_rules('siswa_anak_ke', 'siswa anak ke', 'trim|required');
	$this->form_validation->set_rules('siswa_id', 'siswa_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

    

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=siswa.doc");

        $data = array(
            'siswa_data' => $this->Siswa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('siswa/siswa_doc',$data);
    }

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-04 09:27:09 */
/* http://harviacode.com */