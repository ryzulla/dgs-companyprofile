<?php defined('BASEPATH') OR exit('No direct script access allowed.');

class Posts_model extends CI_Model{
	function __construct()
	{
		$this->load->library('pagination');
	}

	function get($limit = null, $start = null)
	{
		$DB = $this->db->from('berita')
		->limit($limit, $start)
		->order_by('tanggal', 'desc');
		return $DB->get()->result();
	}
	function paging()
	{
		$url = 'news';
		$total = $this->db->count_all('berita');
		$paging = $this->pagination->paging($url, $total);
		return $paging;
	}
}