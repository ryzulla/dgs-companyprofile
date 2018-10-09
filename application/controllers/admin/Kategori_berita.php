<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
				if ($this->session->userdata('level')!="Admin") {
					redirect('error');
				}
                $this->load->model('Kategori_berita_model');
        }

	public function index()
	{
		$kategori_berita=$this->Kategori_berita_model->listing();

		$valid=$this->form_validation;
		$valid->set_rules('nama_kategori_berita','Nama Kategori Berita','required|is_unique[kategori_berita.nama_kategori_berita]',
			array('required'=>'Nama kategori berita harus diisi',
				'is_unique'=>'Oops.. Kategori berita: <strong>'.$this->input->post('nama_kategori_berita').'</strong> sudah ada. Buat kategori baru'));
		if($valid->run()==false){
		
		$data=array('title' => 'Data Kategori berita',
					'kategori_berita'	=> $kategori_berita,
					'isi'	=> 'admin/kategori_berita/list');
		$this->load->view('template/admin/wrapper',$data);
		}else{
			$i=$this->input;
			$slug=url_title($this->input->post('nama_kategori_berita'),'dash',TRUE);
			$data=array('nama_kategori_berita'=>$i->post('nama_kategori_berita'),
			'slug_kategori_berita'=>$slug,
			'urutan'=>$i->post('urutan'),
			'keterangan'=>$i->post('keterangan'));
		$this->Kategori_berita_model->tambah($data);
		$this->session->set_flashdata('sukses', 'Data kategori berita telah ditambah');
		redirect(base_url('admin/kategori_berita'));
		}
	}

	public function delete($id_kategori_berita){
		$data=array('id_kategori_berita'=>$id_kategori_berita);
		$this->Kategori_berita_model->delete($data);
		$this->session->set_flashdata('sukses','Data kategori berita telah dihapus');
		redirect(base_url('admin/kategori_berita'));

	}

	public function edit($id_kategori_berita)
	{
		$kategori_berita=$this->Kategori_berita_model->detail($id_kategori_berita);

		$valid=$this->form_validation;
		$valid->set_rules('nama_kategori_berita','Nama Kategori Berita','required',
			array('required'=>'Nama ukategori berita harus diisi'));
		if($valid->run()==false){
		
		$data=array('title' => 'Data Kategori berita',
					'kategori_berita'	=> $kategori_berita,
					'isi'	=> 'admin/kategori_berita/edit');
		$this->load->view('template/admin/wrapper',$data);
		}else{
			$i=$this->input;
			$slug=url_title($this->input->post('nama_kategori_berita'),'dash',TRUE);
			$data=array('id_kategori_berita'=>$id_kategori_berita,
			'nama_kategori_berita'=>$i->post('nama_kategori_berita'),
			'slug_kategori_berita'=>$slug,
			'urutan'=>$i->post('urutan'),
			'keterangan'=>$i->post('keterangan'));
		$this->Kategori_berita_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data kategori berita telah ditambah');
		redirect(base_url('admin/kategori_berita'));
		}
	}

}