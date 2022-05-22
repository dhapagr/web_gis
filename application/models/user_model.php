<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    function tampil_data_lokasi(){
		$query = $this->db->get('tb_lokasi');
		return $query;
	}
    public function tampil_data_kecelakaan()
	{
		$this->db->select('*');
		$this->db->from('tb_kecelakaan');
		$this->db->join('tb_kelurahan',  'tb_kecelakaan.id_kelurahan = tb_kelurahan.id_kelurahan');
		$this->db->join('tb_kecamatan',	'tb_kecelakaan.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->order_by('id_kecelakaan','DESC');
		return $this->db->get();
	}
    function get_filter_kec($kecelakaan)
	{
		$this->db->select('*');
		$this->db->from('tb_kecelakaan');
		$this->db->join('tb_kelurahan',  'tb_kecelakaan.id_kelurahan = tb_kelurahan.id_kelurahan');
		$this->db->join('tb_kecamatan',	'tb_kecelakaan.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->where('tb_kecamatan.id_kecamatan',$kecelakaan);
		return $this->db->get();
	}
    function get_filter_kel($kecelakaan)
	{
		$this->db->select('*');
		$this->db->from('tb_kecelakaan');
		$this->db->join('tb_kelurahan',  'tb_kecelakaan.id_kelurahan = tb_kelurahan.id_kelurahan');
		$this->db->join('tb_kecamatan',	'tb_kecelakaan.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->where('tb_kelurahan.id_kelurahan',$kecelakaan);
		return $this->db->get();
	}
    function get_kelurahan_where($id_kecamatan)
	{
		$this->db->select('*');
		$this->db->from('tb_kelurahan');
		$this->db->where('id_kecamatan', $id_kecamatan);
		return $this->db->get();
	}
}