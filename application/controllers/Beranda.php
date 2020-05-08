<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Beranda extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect ('Auth/blocked');
        }
    }

    public function index(){
    /*
    |--------------------------------------------------------------------------
    | Membuat Persentasi (%) Data Yang Telah Di Isi Secara dinamis di beranda
    |--------------------------------------------------------------------------
    */
        $kes    =   $this->db->get_where('siswa', ['siswa_kesehatan_id'    => 1])->num_rows();
        $mslh   =   $this->db->get_where('siswa', ['siswa_permasalahan_id' => 1])->num_rows();
        $psi    =   $this->db->get_where('siswa', ['siswa_psikologi_id'    => 1])->num_rows();
        $sos    =   $this->db->get_where('siswa', ['siswa_sosial_id'       => 1])->num_rows();
        $jumlah =   $this->db->get('siswa')->num_rows();


        if($jumlah == 0){ // jika data siswa belum ada satu pun

            $data['kesehatan'] = 'Belum Ada Siswa ';
            $data['permasalahan'] = 'Belum Ada Siswa ';
            $data['psikologi'] = 'Belum Ada Siswa ';
            $data['sosial'] = 'Belum Ada Siswa ';
            
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('beranda', $data);
            $this->load->view('template/footer');
            
        } else{ // jika data siswa sudah ada
            
            
            $persen_kes = round($kes/$jumlah*100,0);
            $persen_mslh = round($mslh/$jumlah*100,0);
            $persen_psi = round($psi/$jumlah*100,0);
            $persen_sos = round($sos/$jumlah*100,0);
            $data['kesehatan'] =100-$persen_kes;
            $data['permasalahan'] =100-$persen_mslh;
            $data['psikologi'] =100-$persen_psi;
            $data['sosial'] =100-$persen_sos;
            
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('beranda', $data);
            $this->load->view('template/footer');

        }
    }
    
    public function laporan(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('laporan');
        $this->load->view('template/footer');
    }

    
}
        
    /* End of file  Beranda.php */
        
                            