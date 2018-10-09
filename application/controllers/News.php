<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->config->load('pagination',TRUE);
                $this->load->model('Berita_model');
                $this->load->model('Jenis_berita_model');
        }

     public function index(){
        $per_page=$this->config->item('per_page','pagination');
        $row =$this->uri->segment(3);
     	$berita=$this->Berita_model->news($per_page,$row);
     	$data = array (
     					'berita'	=>$berita);
     	$this->load->view('news/index',$data);
     }

     public function read($slug_berita){
        $berita=$this->Berita_model->read($slug_berita);
        $data = array ('title'      => $berita->judul,
                        'isi'       => 'news/detail',
                        'berita'    =>$berita);
        $this->load->view('news/lengkap',$data);
     }
 }
