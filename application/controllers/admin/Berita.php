<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
            	if ($this->session->userdata('level')!="Admin") {
				redirect('error');
				}
                $this->load->model('Berita_model');
                $this->load->model('Kategori_berita_model');
                $this->load->model('Jenis_berita_model');
        }

	public function index()
	{
		$berita=$this->Berita_model->listing();
		$data=array('title' => 'Berita',
					'berita'=> $berita,
					'isi'	=> 'admin/berita/list');
		$this->load->view('template/admin/wrapper',$data);
	}

	public function lihat_kategori($jenis_berita){
		$berita=$this->Berita_model->jenis_berita($jenis_berita);
		$data=array('berita'	=> $berita,
					'isi'	=> 'admin/berita/lihat_kategori_v');
		$this->load->view('template/admin/wrapper',$data);
	}
	// 	public function lihat_jenis($kategori_berita){
	// 	$berita=$this->Berita_model->kategori_berita($kategori_berita);
	// 	$data=array('berita'	=> $berita,
	// 				'isi'	=> 'admin/berita/lihat_kategori_v');
	// 	$this->load->view('template/admin/wrapper',$data);
	// }
		public function laporan_saya($id_user){
		$berita=$this->Berita_model->jenis_laporan($id_user);
		if($this->uri->segment('4')!=$this->session->userdata('id_user'))
		{
			redirect('error');
		}else{
		$data=array('berita'	=> $berita,
					'isi'	=> 'admin/berita/lihat_laporan_saya');
		$this->load->view('template/admin/wrapper',$data);
	}
	}
		public function draft_saya($id_user){
		$berita=$this->Berita_model->draft($id_user);
		if($this->uri->segment('4')!=$this->session->userdata('id_user'))
		{
			redirect('error');
		}else{
		$data=array('berita'	=> $berita,
					'isi'	=> 'admin/berita/lihat_laporan_saya');
		$this->load->view('template/admin/wrapper',$data);
	}
	}

	public function delete($id_berita){
		$berita=$this->Berita_model->detail($id_berita);
		if($berita->gambar!=""){
			unlink('./assets/upload/image/'.$berita->gambar);
			unlink('./assets/upload/image/thumbs/'.$berita->gambar);
		}


		$data=array('id_berita'=>$id_berita);
		$this->Berita_model->delete($data);
		$this->session->set_flashdata('sukses','Data berita telah dihapus');
		redirect(base_url('admin/c_admin'));
	}

	public function tambah()
	{
		// $kategori   =$this->Kategori_berita_model->listing();
		$jenis      =$this->Jenis_berita_model->listing();
		$akhir		= $this->Berita_model->akhir();

		$valid=$this->form_validation;
		$valid->set_rules('judul','Judul Berita','required',
			array('required'=>'Judul Berita harus diisi'));
		$valid->set_rules('isi','Isi Berita','required',
			array('required'=>'Isi berita harus diisi'));
		$valid->set_rules('lokasi','Lokasi','required',
			array('required'=>'Lokasi harus diisi'));
			if($valid->run()) {

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|tiff';
			$config['max_size']			= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {


		$data=array('title' => 'Tambah Berita',
					// 'kategori'	=> $kategori,
					'jenis'	=> $jenis,
					'isi'	=> 'admin/berita/tambah');
		$this->load->view('template/admin/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 360; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

			$i = $this->input;
			$pass="1A2B4HTjsk5kwhadbwlff"; $panjang='8'; $len=strlen($pass);
			$start=$len-$panjang;
			$xx=rand('0',$start);
			$yy=str_shuffle($pass);
			$idbaru=substr($yy, $xx, $panjang);
			$idreset=sha1($idbaru);
			$url_akhir	= $akhir->id_berita+1;
			$slug = $url_akhir.'-'.url_title($i->post('judul'),'dash', TRUE);
			$data = array(	'id_berita'				=> $idreset,
							'slug_berita'			=> $slug,
							'judul'					=> $i->post('judul'),
							'lokasi'				=> $i->post('lokasi'),
							// 'id_kategori_berita'	=> $i->post('kategori_berita'),
							'isi'					=> $i->post('isi'),
							'gambar'				=> $upload_data['uploads']['file_name'],
							'id_user'				=> $this->session->userdata('id_user'),
							'status_berita'			=> $i->post('status_berita'),
							'id_jenis_berita'			=> $i->post('jenis_berita')
							);
			$this->Berita_model->tambah($data);
			$this->session->set_flashdata('sukses','Berita telah ditambahkan');
			redirect(base_url('admin/c_admin'));
		}}
		$data=array('title' => 'Tambah Berita',
					// 'kategori'	=> $kategori,
					'jenis'	=> $jenis,
					'isi'	=> 'admin/berita/tambah');
		$this->load->view('template/admin/wrapper',$data);
	}


	public function edit($id_berita)
	{
		$berita=$this->Berita_model->detail($id_berita);
		$jenis      =$this->Jenis_berita_model->listing();
		// $kategori   =$this->Kategori_berita_model->listing();
		$akhir	= $this->Berita_model->akhir();
		$log = array('id_berita'=>$berita->id_berita);
        	$hasil=$this->Berita_model->cek_berita($log);
		if ($hasil->num_rows() == 1) {

		$valid=$this->form_validation;
		$valid->set_rules('judul','Judul Berita','required',
			array('required'=>'Judul Berita harus diisi'));
		$valid->set_rules('isi','Isi Berita','required',
			array('required'=>'Isi berita harus diisi'));
		$valid->set_rules('lokasi','Lokasi','required',
			array('required'=>'Lokasi harus diisi'));

			if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])){
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|tiff';
			$config['max_size']			= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {


		$data=array('title' => 'Edit Berita',
					// 'kategori'	=> $kategori,
					'jenis'	=> $jenis,
					'berita'=>$berita,
					'error'		=> $this->upload->display_errors(),
					'isi'	=> 'admin/berita/edit');
		$this->load->view('template/admin/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/upload/image/'.$upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/upload/image/thumbs/';
				$config['create_thumb'] 	= TRUE;
				$config['quality'] 			= "100%";
				$config['maintain_ratio'] 	= TRUE;
				$config['width'] 			= 360; // Pixel
				$config['height'] 			= 360; // Pixel
				$config['x_axis'] 			= 0;
				$config['y_axis'] 			= 0;
				$config['thumb_marker'] 	= '';
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				if($berita->gambar!=""){
					unlink('./assets/upload/image/'.$berita->gambar);
					unlink('./assets/upload/image/thumbs/'.$berita->gambar);
				}


			$i = $this->input;
			$data = array(	'id_berita'				=> $id_berita,
							'judul'					=> $i->post('judul'),
							'lokasi'				=> $i->post('lokasi'),
							// 'id_kategori_berita'	=> $i->post('kategori_berita'),
							'isi'					=> $i->post('isi'),
							'gambar'				=> $upload_data['uploads']['file_name'],
							'status_berita'			=> $i->post('status_berita'),
							'id_jenis_berita'		=> $i->post('jenis_berita'),
							);
			$this->Berita_model->edit($data);
			$this->session->set_flashdata('sukses','Berita telah diubah');
			redirect(base_url('admin/c_admin'));
		}}else{
			$i = $this->input;
							$data = array(	'id_berita'		=> $id_berita,
							'judul'					=> $i->post('judul'),
							'lokasi'				=> $i->post('lokasi'),
							// 'id_kategori_berita'	=> $i->post('kategori_berita'),
							'isi'					=> $i->post('isi'),
							'status_berita'			=> $i->post('status_berita'),
							'id_jenis_berita'		=> $i->post('jenis_berita'),
							);
			$this->Berita_model->edit($data);
			$this->session->set_flashdata('sukses','Berita telah diubah');
			redirect(base_url('admin/c_admin'));
		}}


		$data=array('title' => 'Edit Berita',
					// 'kategori'	=> $kategori,
					'jenis'	=> $jenis,
					'berita'=>$berita,
					'isi'	=> 'admin/berita/edit');
		$this->load->view('template/admin/wrapper',$data);
	}else{
		redirect('error');
	}
	}

}
