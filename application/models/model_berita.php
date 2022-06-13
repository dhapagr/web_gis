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
        return $this->db->get();
    }

    public function get_berita_terbaru()
    {
        $this->db->select('*');
        $this->db->from('tb_berita');
        $this->db->where('status', 1);
        $this->db->order_by('created_at', 'desc');
        $this->db->limit(4);
        return $this->db->get();
    }
}