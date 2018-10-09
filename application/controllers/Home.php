<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('Berita_model');
                $this->load->model('Kategori_berita_model');
                $this->load->model('Jenis_berita_model');
        }

     public function index(){
     	$berita=$this->Berita_model->berita_home();
     	$data = array ('title'		=> 'Potret Layanan | Amati dan Laporkan',
     					'isi'		=> 'home/list',
     					'berita'	=>$berita);
     	$this->load->view('template/visitor/wrapper',$data);
     }
 }

