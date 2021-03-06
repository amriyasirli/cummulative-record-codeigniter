<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kesehatan_model extends CI_Model
{

    public $table = 'kesehatan';
    public $id = 'kesehatan_id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    public function gabung(){
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->join('kelas', 'kelas.kelas_id = siswa.siswa_kelas_id');
        $this->db->join('kesehatan', 'kesehatan.kesehatan_id = siswa.siswa_kesehatan_id');
        $this->db->join('permasalahan', 'permasalahan.permasalahan_id = siswa.siswa_permasalahan_id');
        $this->db->join('psikologi', 'psikologi.psikologi_id = siswa.siswa_psikologi_id');
        $this->db->join('sosial', 'sosial.sosial_id = siswa.siswa_sosial_id');
        return $this->db->get()->result();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->join('siswa', 'siswa.siswa_id = kesehatan.kesehatan_siswa_id');
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kesehatan_id', $q);
	$this->db->or_like('kesehatan_siswa_id', $q);
	$this->db->or_like('kesehatan_darah', $q);
	$this->db->or_like('kesehatan_penyakit', $q);
	$this->db->or_like('kesehatan_kelainan_jasmani', $q);
	$this->db->or_like('kesehatan_tinggi', $q);
	$this->db->or_like('kesehatan_berat', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kesehatan_id', $q);
	$this->db->or_like('kesehatan_siswa_id', $q);
	$this->db->or_like('kesehatan_darah', $q);
	$this->db->or_like('kesehatan_penyakit', $q);
	$this->db->or_like('kesehatan_kelainan_jasmani', $q);
	$this->db->or_like('kesehatan_tinggi', $q);
	$this->db->or_like('kesehatan_berat', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    public function tampil_(){
        
        return $this->db->get_where('siswa', array(
            'siswa_kesehatan_id' => 1
        ));
        
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    public function export(){
        $this->db->select('*');
        $this->db->from('kesehatan');
        $this->db->join('siswa', 'siswa.siswa_id = kesehatan.kesehatan_siswa_id');
        return $this->db->get()->result();
    }

}

/* End of file Kesehatan_model.php */
/* Location: ./application/models/Kesehatan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-05-04 09:27:09 */
/* http://harviacode.com */