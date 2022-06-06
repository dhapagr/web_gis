<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function cek_user($data) {
		$query = $this->db->get_where('tb_user', $data);
		return $query;
	}
	public function get_dataById($id)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id])->result_array();
    }
	function where($where){		
		//$this->db->join('tab_akses_menu','tab_akses_menu.id_posisi=karyawan.id_posisi');
		return $this->db->get_where('tb_admin',$where);
    }
	function get_table_where($table, $where)
	{
		$this->db->where($where);
		$query	= $this->db->get($table);
		if ($this->db->_error_message()) header('Location: ../');
		return $query->result_array();
	}
	function update_table($table, $data, $where)
	{
		$this->db->where($where);
		$query	= $this->db->update($table, $data);
		return $query;
	}
	function tampil_data_lokasi(){
		$query = $this->db->get('tb_lokasi');
		return $query;
	}
	function tampil_data_kecamatan()
	{
		return $this->db->get("tb_kecamatan");
	}
	function get_data_kecelakaan()
	{
		$this->db->select('*');
		$this->db->from('tb_kecelakaan');
		$this->db->order_by('id_kecelakaan', 'ASC');
		$query	= $this->db->get();
		return $query->result_array();
	}
	function tampil_data_kelurahan()
	{
		return $this->db->get("tb_kelurahan");
	}
	function get_kelurahan_where($id_kecamatan)
	{
		$this->db->select('*');
		$this->db->from('tb_kelurahan');
		$this->db->where('id_kecamatan', $id_kecamatan);
		return $this->db->get();
	}
	function get_tema()
	{
		return $this->db->get("tb_tema");
	}

	public function tampil_data_wilayah()
	{
		$this->db->select('*');
		$this->db->from('tb_kecamatan');
		$this->db->join('tb_kelurahan', 'tb_kelurahan.id_kecamatan = tb_kecamatan.id_kecamatan', 'right');
		$this->db->order_by('id_kelurahan','DESC');
		return $this->db->get();
	}
	public function tampil_data_KecTaman()
	{
		$this->db->select('*');
		$this->db->from('tb_kecamatan');
		$this->db->join('tb_kelurahan', 'tb_kelurahan.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->where('tb_kecamatan.id_kecamatan',1);
		$this->db->order_by('id_kelurahan','DESC');
		return $this->db->get();
	}
	public function tampil_data_Kecmanguharjo()
	{
		$this->db->select('*');
		$this->db->from('tb_kecamatan');
		$this->db->join('tb_kelurahan', 'tb_kelurahan.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->where('tb_kecamatan.id_kecamatan',2);
		$this->db->order_by('id_kelurahan','DESC');
		return $this->db->get();
	}
	public function tampil_data_KecKartoharjo()
	{
		$this->db->select('*');
		$this->db->from('tb_kecamatan');
		$this->db->join('tb_kelurahan', 'tb_kelurahan.id_kecamatan = tb_kecamatan.id_kecamatan');
		$this->db->where('tb_kecamatan.id_kecamatan',3);
		$this->db->order_by('id_kelurahan','DESC');
		return $this->db->get();
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
	public function get_dtkec($id)
	{	
		$this->db->select('*');
		$this->db->from('tb_kecelakaan');
		$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_kecelakaan.id_kecamatan');
		$this->db->join('tb_kelurahan', 'tb_kelurahan.id_kelurahan = tb_kecelakaan.id_kelurahan');
		$this->db->where('tb_kecelakaan.id_kecelakaan', $id);
		return $this->db->get();
	}
	public function get_dtkec2($id)
	{	
		$this->db->select('*');
		$this->db->from('tb_kecelakaan');
		$this->db->join('tb_kecamatan', 'tb_kecamatan.id_kecamatan = tb_kecelakaan.id_kecamatan');
		$this->db->join('tb_kelurahan', 'tb_kelurahan.id_kelurahan = tb_kecelakaan.id_kelurahan');
		$this->db->join('tb_wkt', 'tb_wkt.id_waktukej = tb_kecelakaan.id_waktu');
		$this->db->join('tb_jeniskendaraan', 'tb_jeniskendaraan.id_jenis = tb_kecelakaan.id_jenis');
		$this->db->join('tb_profesikorban', 'tb_profesikorban.id_profesi = tb_kecelakaan.id_profesi');
		$this->db->join('tb_umurkorban', 'tb_umurkorban.id_umur = tb_kecelakaan.id_umur');
		$this->db->join('tb_typekejadian', 'tb_typekejadian.id_type = tb_kecelakaan.id_type');
		$this->db->where('tb_kecelakaan.id_kecelakaan', $id);
		return $this->db->get();
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
	public function get_dtberita($id)
	{	
		$this->db->select('*');
		$this->db->from('tb_berita');
		$this->db->where('tb_berita.id_berita', $id);
		$this->db->join('tb_tag', 'tb_tag.id_tag = tb_berita.tag_berita');
		return $this->db->get();
	}
	function select($select)
	{
		$data = explode(',', $select);
		for($i=0; $i<count($data); $i++){
			$this->db->select('*');
			$this->db->from('tb_tag');
			$this->db->like('id_tag', $data[$i]);
			$data2[$i] = $this->db->get()->result_array();
		}
		return $data2;
	}
	public function get_pengaduan()
	{
		$this->db->select('*');
		$this->db->from('tb_pengaduan');
		$this->db->order_by('tanggal_pengaduan', 'desc');
		return $this->db->get();
	}
}    