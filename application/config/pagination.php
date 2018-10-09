<?php defined('BASEPATH') OR exit('No direct script access allowed.');
$this->CI = &get_instance();

$config['base_url'] = base_url().'news/index';
$config['total_rows'] = $this->CI->db->get('berita')->num_rows();
$config['per_page'] = 6;
$config['num_links'] = 3;
$config['full_tag_open']='<ul id="flat-pagination">';
$config['full_tag_close']='</ul>';
$config['next_link']='<li>Next</li>';
$config['prev_link']='<li>Prev</li>';
