<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
				if ($this->session->userdata('level')!="Admin") {
					redirect('error');
				}
                $this->load->model('About_model');
        }

	public function index()
	{
		$about=$this->About_model->listing();

		$valid=$this->form_validation;
		$valid->set_rules('isi_about','Konten About Perusahaan','required',
			array('required'=>'Konten About Perusahaan harus di isi!'));
		if($valid->run()==false){

		$data=array('title' => 'Konten About Perusahaan',
					'about'	=> $about,
					'isi'	=> 'admin/about/list');
		$this->load->view('template/admin/wrapper',$data);
		}else{
			$i=$this->input;
			$data=array(
			'isi_about'=>$i->post('isi_about'));
		$this->About_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Konten About Perusahaan telah diperbaharui');
		redirect(base_url('admin/about'));
		}
	}


	public function edit($id_about)
	{
		$about=$this->About_model->detail($id_about);

		$valid=$this->form_validation;
		$valid->set_rules('isi_about','Isi Konten About Perusahaan','required',
			array('required'=>'Konten About Perusahaan harus diisi'));
		if($valid->run()==false){

		$data=array('title' => 'Konten isi perusahaan',
					'about'	=> $about,
					'isi'	=> 'admin/about/edit');
		$this->load->view('template/admin/wrapper',$data);
		}else{
			$i=$this->input;
			$data=array('id_about'=>$id_about,
			'isi_about'=>$i->post('isi_about'));
		$this->About_model->edit($data);
		$this->session->set_flashdata('sukses', 'Konten About Perusahaan telah ditambah');
		redirect(base_url('admin/about'));
		}
	}

}
