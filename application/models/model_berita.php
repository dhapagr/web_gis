<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_berita extends CI_Model
{
    public function get_berita_banner()
    {
        $this->db->select('*');
        $this->db->from('tb_berita');
        $this->db->where('status', 1);
        $this->db->order_by('created_at', 'desc');
        $this->db->limit(1);
        $data = $this->db->get();

        if($data->num_rows >= 0){
            return $data;
        }else{
            return false;
        }
    }

    public function get_berita_terbaru()
    {
        $this->db->select('*');
        $this->db->from('tb_berita');
        $this->db->where('status', 1);
        $this->db->order_by('created_at', 'desc');
        $this->db->limit(3);
        $data = $this->db->get();

        if($data->num_rows >= 0){
            return $data;
        }else{
            return false;
        }
    }

    public function get_video_berita()
    {
        $this->db->select('*');
        $this->db->from('tb_berita');
        $this->db->where('status', 1);
        $this->db->order_by('created_at', 'desc');
        $this->db->limit(4);
        $data = $this->db->get();

        if($data->num_rows >= 0){
            return $data;
        }else{
            return false;
        }
    }

    public function hitung_berita_kategori($param)
    {
        $this->db->select('*');
        $this->db->from('tb_berita');
        $this->db->like('tag_berita', $param);
        $this->db->order_by('created_at', 'desc');
        $data = $this->db->get()->result();
        return count($data);
    }

    function get_berita_kategori($number,$offset, $param)
	{
		$this->db->select('*');
		$this->db->where('status', 1);
		$this->db->order_by('created_at', 'desc');
        $this->db->like('tag_berita', $param);
		return $this->db->get('tb_berita',$number,$offset)->result_array();
	}
}