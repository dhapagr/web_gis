<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Superadmin_model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }
	public function cek_user($data) {
		$query = $this->db->get_where('tb_user', $data);
		return $query;
	}
	public function get_dataById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->result_array();
    }
    function get_tema()
	{
		return $this->db->get("tb_tema");
	}
    function tampil_data_kelurahan()
	{
		return $this->db->get("tb_kelurahan");
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
	function get_data_admin()
	{
		$this->db->select('*');
		$this->db->from("tb_user");
		$this->db->where('role_user', 'admin');
		return  $this->db->get();
	}
	function get_data_superadmin()
	{
		$this->db->select('*');
		$this->db->from("tb_user");
		$this->db->where('role_user', 'superadmin');
		return  $this->db->get();
	}
	function insert_table($table, $data)
	{
		$query	= $this->db->insert($table, $data);
		return $query;
	}
	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	function tampil_data_lokasi(){
		$query = $this->db->get('tb_lokasi');
		return $query;
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