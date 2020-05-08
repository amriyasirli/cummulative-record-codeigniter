<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Laporan extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->model('Kelas_model');
        $this->load->model('Kesehatan_model');
        $this->load->model('Permasalahan_model');
        $this->load->model('Psikologi_model');
        $this->load->model('Sosial_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('username')){
            redirect ('Auth/blocked');
        }
    }

    public function excel_siswa()
    {
        $this->load->helper('exportexcel');
        $namaFile = "siswa.xls";
        $judul = "siswa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nis");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Panggilan");
	xlsWriteLabel($tablehead, $kolomhead++, "Gender");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Tempat Lahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Ortu");
	xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	xlsWriteLabel($tablehead, $kolomhead++, "Hp");
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");
	xlsWriteLabel($tablehead, $kolomhead++, "Bahasa");
	xlsWriteLabel($tablehead, $kolomhead++, "Tinggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Anak Ke");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelas");
	xlsWriteLabel($tablehead, $kolomhead++, "Golongan Darah");
	xlsWriteLabel($tablehead, $kolomhead++, "Penyakit Diderita");
	xlsWriteLabel($tablehead, $kolomhead++, "Kelainan Jasmani");
    xlsWriteLabel($tablehead, $kolomhead++, "Tinggi");
    xlsWriteLabel($tablehead, $kolomhead++, "Berat");
    
    $data['siswa'] = $this->Siswa_model->gabung();
	foreach ($data['siswa'] as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->siswa_nis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_panggilan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_gender);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_tgl_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_tempat_lahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_ortu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_agama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_bahasa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_tinggal);
	    xlsWriteLabel($tablebody, $kolombody++, $data->siswa_anak_ke);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kelas_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kesehatan_darah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kesehatan_penyakit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kesehatan_kelainan_jasmani);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kesehatan_tinggi);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kesehatan_berat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function excel_kesehatan()
    {
        $this->load->helper('exportexcel');
        $namaFile = "kesehatan.xls";
        $judul = "kesehatan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kesehatan Siswa Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Kesehatan Darah");
	xlsWriteLabel($tablehead, $kolomhead++, "Kesehatan Penyakit");
	xlsWriteLabel($tablehead, $kolomhead++, "Kesehatan Kelainan Jasmani");
	xlsWriteLabel($tablehead, $kolomhead++, "Kesehatan Tinggi");
	xlsWriteLabel($tablehead, $kolomhead++, "Kesehatan Berat");
    $data['kesehatan'] = $this->Kesehatan_model->export();
	foreach ($data['kesehatan'] as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->siswa_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kesehatan_darah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kesehatan_penyakit);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kesehatan_kelainan_jasmani);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kesehatan_tinggi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kesehatan_berat);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function excel_psikologi()
    {
        $this->load->helper('exportexcel');
        $namaFile = "psikologi.xls";
        $judul = "psikologi";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Siswa Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Bakat");
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Minat");
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Hobi");
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Citacita");
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Sekolah Impian");
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Perguruan");
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Dunia Kerja");
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Ekskul");
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Pelajaran Suka");
	xlsWriteLabel($tablehead, $kolomhead++, "Psikologi Pelajaran Sulit");

    
    $data['psikologi'] = $this->Psikologi_model->export();
	foreach ($data['psikologi'] as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->siswa_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->psikologi_bakat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->psikologi_minat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->psikologi_hobi);
	    xlsWriteLabel($tablebody, $kolombody++, $data->psikologi_citacita);
	    xlsWriteLabel($tablebody, $kolombody++, $data->psikologi_sekolah_impian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->psikologi_perguruan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->psikologi_dunia_kerja);
	    xlsWriteLabel($tablebody, $kolombody++, $data->psikologi_ekskul);
	    xlsWriteLabel($tablebody, $kolombody++, $data->psikologi_pelajaran_suka);
	    xlsWriteLabel($tablebody, $kolombody++, $data->psikologi_pelajaran_sulit);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function excel_sosial()
    {
        $this->load->helper('exportexcel');
        $namaFile = "sosial.xls";
        $judul = "sosial";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Sosial Siswa Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Sosial Sifat Suka");
	xlsWriteLabel($tablehead, $kolomhead++, "Sosial Sifat Tdksuka");
	xlsWriteLabel($tablehead, $kolomhead++, "Sosial Motif Rumah");
	xlsWriteLabel($tablehead, $kolomhead++, "Sosial Motif Sekolah");

	$data['sosial'] = $this->Sosial_model->export();
	foreach ($data['sosial'] as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->siswa_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sosial_sifat_suka);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sosial_sifat_tdksuka);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sosial_motif_rumah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sosial_motif_sekolah);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function excel_permasalahan()
    {
        $this->load->helper('exportexcel');
        $namaFile = "permasalahan.xls";
        $judul = "permasalahan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Permasalahan Siswa Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Permasalahan Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "Permasalahan Keluarga");
	xlsWriteLabel($tablehead, $kolomhead++, "Permasalahan Masyarakat");
	xlsWriteLabel($tablehead, $kolomhead++, "Permasalahan Teman");
    $data['permasalahan'] = $this->Permasalahan_model->export();
	foreach ($data['permasalahan'] as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->siswa_nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->permasalahan_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->permasalahan_keluarga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->permasalahan_masyarakat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->permasalahan_teman);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

        
}
        
    /* End of file  Laporan.php */
        
                            