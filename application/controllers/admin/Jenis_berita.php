<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_berita extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
				if ($this->session->userdata('level')!="Admin") {
					redirect('error');
				}
                $this->load->model('jenis_berita_model');
        }

	public function index()
	{
		$jenis_berita=$this->Jenis_berita_model->listing();

		$valid=$this->form_validation;
		$valid->set_rules('nama_jenis_berita','Nama jenis Berita','required|is_unique[jenis_berita.nama_jenis_berita]',
			array('required'=>'Nama jenis berita harus diisi',
				'is_unique'=>'Oops.. jenis berita: <strong>'.$this->input->post('nama_jenis_berita').'</strong> sudah ada. Buat jenis baru'));
		if($valid->run()==false){
		
		$data=array('title' => 'Data jenis berita',
					'jenis_berita'	=> $jenis_berita,
					'isi'	=> 'admin/jenis_berita/list');
		$this->load->view('template/admin/wrapper',$data);
		}else{
			$i=$this->input;
			$slug=url_title($this->input->post('nama_jenis_berita'),'dash',TRUE);
			$data=array('nama_jenis_berita'=>$i->post('nama_jenis_berita'),
			'slug_jenis_berita'=>$slug,
			'urutan'=>$i->post('urutan'),
			'keterangan'=>$i->post('keterangan'));
		$this->Jenis_berita_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data jenis berita telah ditambah');
		redirect(base_url('admin/jenis_berita'));
		}
	}

	public function delete($id_jenis_berita){
		$data=array('id_jenis_berita'=>$id_jenis_berita);
		$this->Jenis_berita_model->delete($data);
		$this->session->set_flashdata('sukses','Data jenis berita telah dihapus');
		redirect(base_url('admin/jenis_berita'));

	}

	public function edit($id_jenis_berita)
	{
		$jenis_berita=$this->Jenis_berita_model->detail($id_jenis_berita);

		$valid=$this->form_validation;
		$valid->set_rules('nama_jenis_berita','Nama jenis Berita','required',
			array('required'=>'Nama ujenis berita harus diisi'));
		if($valid->run()==false){
		
		$data=array('title' => 'Data jenis berita',
					'jenis_berita'	=> $jenis_berita,
					'isi'	=> 'admin/jenis_berita/edit');
		$this->load->view('template/admin/wrapper',$data);
		}else{
			$i=$this->input;
			$slug=url_title($this->input->post('nama_jenis_berita'),'dash',TRUE);
			$data=array('id_jenis_berita'=>$id_jenis_berita,
			'nama_jenis_berita'=>$i->post('nama_jenis_berita'),
			'slug_jenis_berita'=>$slug,
			'urutan'=>$i->post('urutan'),
			'keterangan'=>$i->post('keterangan'));
		$this->Jenis_berita_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data jenis berita telah ditambah');
		redirect(base_url('admin/jenis_berita'));
		}
	}

}