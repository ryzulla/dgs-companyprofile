<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visimisi extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
				if ($this->session->userdata('level')!="Admin") {
					redirect('error');
				}
                $this->load->model('Visimisi_model');
        }

	public function index()
	{
		$visimisi=$this->Visimisi_model->listing();

		$valid=$this->form_validation;
		$valid->set_rules('visi','Visi Perusahaan','required',
			array('required'=>'Visi Perusahaan harus di isi!'));
			$valid->set_rules('misi','Misi Perusahaan','required',
				array('required'=>'Misi Perusahaan harus di isi!'));
		if($valid->run()==false){

		$data=array('title' => 'Visi Misi Perusahaan',
					'visimisi'	=> $visimisi,
					'isi'	=> 'admin/visimisi/list');
		$this->load->view('template/admin/wrapper',$data);
		}else{
			$i=$this->input;
			$data=array(
			'visi'=>$i->post('visi'),
			'misi'=>$i->post('misi'),
		);
		$this->Visimisi_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Visi Perusahaan telah diperbaharui');
		redirect(base_url('admin/visimisi'));
		}
	}


	public function edit($id_visimisi)
	{
		$visimisi=$this->Visimisi_model->detail($id_visimisi);

		$valid=$this->form_validation;
		$valid->set_rules('visi','Visi Perusahaan','required',
			array('required'=>'Visi Perusahaan harus di isi!'));
			$valid->set_rules('misi','Misi Perusahaan','required',
				array('required'=>'Misi Perusahaan harus di isi!'));
		if($valid->run()==false){

		$data=array('title' => 'Konten isi perusahaan',
					'visimisi'	=> $visimisi,
					'isi'	=> 'admin/visimisi/edit');
		$this->load->view('template/admin/wrapper',$data);
		}else{
			$i=$this->input;
			$data=array('id_visimisi'=>$id_visimisi,
			'visi'=>$i->post('visi'),
			'misi'=>$i->post('misi'));
		$this->Visimisi_model->edit($data);
		$this->session->set_flashdata('sukses', 'Konten About Perusahaan telah ditambah');
		redirect(base_url('admin/visimisi'));
		}
	}

}
