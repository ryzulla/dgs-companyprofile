<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	        {
	                parent::__construct();
	                $this->load->model('Berita_model');
	                $this->load->model('Jenis_berita_model');
									$this->load->model('About_model');
									$this->load->model('Visimisi_model');
	        }

	     public function index(){
	     	$berita=$this->Berita_model->berita_home();
				$about=$this->About_model->listing();
				$visimisi=$this->Visimisi_model->listing();
	     	$data = array ('title'		=> 'PT. DWI GUNA SENTOSA',
	     					'berita'	=>$berita,
							'about' =>$about,
						'visimisi' =>$visimisi);
	     	$this->load->view('home/index',$data);
			}
			public function news(){
			 $berita=$this->Berita_model->berita_home();
			 $about=$this->About_model->listing();
			 $visimisi=$this->Visimisi_model->listing();
			 $data = array ('title'		=> 'PT. DWI GUNA SENTOSA',
							 'berita'	=>$berita,
						 'about' =>$about,
					 'visimisi' =>$visimisi);
			 $this->load->view('news/index',$data);
		 }

}
