<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                if ($this->session->userdata('level')!="Admin") {
					redirect('auth');
				}
                $this->load->model('User_model');
        }

	public function index()
	{
		$user=$this->User_model->listing();
		$data=array('title' => 'Data User',
					'user'	=> $user,
					'isi'	=> 'admin/user/list');
		$this->load->view('template/admin/wrapper',$data);
	}

		public function delete($id_user){
		$user=$this->User_model->detail($id_user);
		if($user->gambar!="" && $user->gambar!="default.jpg"){
			unlink('./assets/admin/user/upload/image/'.$user->gambar);
			unlink('./assets/admin/user/upload/image/thumbs/'.$user->gambar);
		}
		$data=array('id_user'=>$id_user);
		$this->User_model->delete($data);
		$this->session->set_flashdata('sukses','Data user telah dihapus');
		redirect(base_url('admin/user'));
	}
	public function lihat($email){
		$user=$this->User_model->lihat($email);
		$data=array('title' => 'Lihat User',
					'user'	=> $user,
					'isi'	=> 'admin/user/lihat');
		$this->load->view('template/admin/wrapper',$data);
	}
	public function prof_user($id_user){
	$user=$this->User_model->detail($id_user);
		$data=array('title' => 'Lihat User',
					'user'	=> $user,
					'isi'	=> 'admin/user/profile_lihat_admin');
		$this->load->view('template/admin/wrapper',$data);
	}
	public function profile($id_user){
	$id_user=$this->session->userdata('id_user');
	$user=$this->User_model->detail($id_user);
		$data=array('title' => 'Lihat User',
					'user'	=> $user,
					'isi'	=> 'admin/user/profile_lihat');
		$this->load->view('template/admin/wrapper',$data);
	}
	public function tambah()
	{
		$valid=$this->form_validation;
		$valid->set_rules('email','Email','required|valid_email',
			array('required'=>'Email harus diisi',
				'valid_email'=>'Email harus benar'));
		$valid->set_rules('nama_user','Nama User','required',
			array('required'=>'Nama User harus diisi'));
			if($valid->run()) {

			$config['upload_path'] 		= './assets/admin/user/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|tiff';
			$config['max_size']			= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {


		$data=array('title' => 'Tambah User',
					'error'		=> $this->upload->display_errors(),
					'isi'	=> 'admin/user/tambah');
		$this->load->view('template/admin/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/admin/user/upload/image/'.$upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/admin/user/upload/image/thumbs/';
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
			$data = array(	'id_user'				=> $idreset,
							'nama_user'				=> $i->post('nama_user'),
							'email'					=> $i->post('email'),
							'password'				=> sha1($i->post('password')),
							'alamat'				=> $i->post('alamat'),
							'kota'					=> $i->post('kota'),
							'telp'					=> $i->post('telp'),
							'level'					=> 'Admin',
							'gambar'				=> $upload_data['uploads']['file_name']);
			$this->User_model->tambah($data);
			$this->session->set_flashdata('sukses','User telah ditambahkan');
			redirect(base_url('admin/user'));
		}}
		$data=array('title' => 'Tambah User',
					'isi'	=> 'admin/user/tambah');
		$this->load->view('template/admin/wrapper',$data);
	}

	public function profile_edit($id_user)
	{
		$user=$this->User_model->detail($id_user);
			$login = array('id_user'=>$user->id_user);
        	$hasil=$this->User_model->cek_user($login);
			if ($hasil->num_rows() == 1) {
		$valid=$this->form_validation;
		$valid->set_rules('email','Email','required|valid_email',
			array('required'=>'Email harus diisi',
				'valid_email'=>'Email harus benar'));
		$valid->set_rules('nama_user','Nama User','required',
			array('required'=>'Nama User harus diisi'));

			if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])){
			$config['upload_path'] 		= './assets/admin/user/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|tiff';
			$config['max_size']			= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {


		$data=array('title' => 'Edit User',
					'user'=>$user,
					'error'		=> $this->upload->display_errors(),
					'isi'	=> 'admin/user/profile_edit');
		$this->load->view('template/admin/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/admin/user/upload/image/'.$upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/admin/user/upload/image/thumbs/';
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

				if($user->gambar!="" && $user->gambar!="default.jpg"){
					unlink('./assets/admin/user/upload/image/'.$user->gambar);
					unlink('./assets/admin/user/upload/image/thumbs/'.$user->gambar);
				}


			$i = $this->input;
			$data = array(	'id_user'				=>$id_user,
							'nama_user'				=> $i->post('nama_user'),
							'email'					=> $i->post('email'),
							'alamat'				=> $i->post('alamat'),
							'kota'					=> $i->post('kota'),
							'telp'					=> $i->post('telp'),
							'gambar'				=> $upload_data['uploads']['file_name']);
			$this->User_model->edit($data);
			$this->session->set_flashdata('sukses','User telah diubah');
			redirect(base_url('admin/user/profile/'.$id_user));
		}}else{
			$i = $this->input;
			$data = array(	'id_user'				=>$id_user,
							'nama_user'				=> $i->post('nama_user'),
							'email'					=> $i->post('email'),
							'alamat'				=> $i->post('alamat'),
							'kota'					=> $i->post('kota'),
							'telp'					=> $i->post('telp'));
			$this->User_model->edit($data);
			$this->session->set_flashdata('sukses','User telah diubah');
			redirect(base_url('admin/user/profile/'.$id_user));
		}}


		$data=array('title' => 'Edit User',
					'user'=>$user,
					'isi'	=> 'admin/user/profile_edit');
		$this->load->view('template/admin/wrapper',$data);
	}else{
		redirect('error');
	}
	}

	public function profile_edit_admin($id_user)
	{
		$user=$this->User_model->detail($id_user);
			$login = array('id_user'=>$user->id_user);
        	$hasil=$this->User_model->cek_user($login);
			if ($hasil->num_rows() == 1) {
		$valid=$this->form_validation;
		$valid->set_rules('email','Email','required|valid_email',
			array('required'=>'Email harus diisi',
				'valid_email'=>'Email harus benar'));
		$valid->set_rules('nama_user','Nama User','required',
			array('required'=>'Nama User harus diisi'));

			if($valid->run()) {
			if(!empty($_FILES['gambar']['name'])){
			$config['upload_path'] 		= './assets/admin/user/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|svg|tiff';
			$config['max_size']			= '12000'; // KB
			$this->load->library('upload', $config);
			if(! $this->upload->do_upload('gambar')) {


		$data=array('title' => 'Edit User',
					'user'=>$user,
					'error'		=> $this->upload->display_errors(),
					'isi'	=> 'admin/user/profile_edit_admin');
		$this->load->view('template/admin/wrapper',$data);
		}else{
				$upload_data				= array('uploads' =>$this->upload->data());
				// Image Editor
				$config['image_library']	= 'gd2';
				$config['source_image'] 	= './assets/admin/user/upload/image/'.$upload_data['uploads']['file_name'];
				$config['new_image'] 		= './assets/admin/user/upload/image/thumbs/';
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

				if($user->gambar!="" && $user->gambar!="default.jpg"){
					unlink('./assets/admin/user/upload/image/'.$user->gambar);
					unlink('./assets/admin/user/upload/image/thumbs/'.$user->gambar);
				}


			$i = $this->input;
			$data = array(	'id_user'				=>$id_user,
							'nama_user'				=> $i->post('nama_user'),
							'email'					=> $i->post('email'),
							'alamat'				=> $i->post('alamat'),
							'kota'					=> $i->post('kota'),
							'telp'					=> $i->post('telp'),
							'gambar'				=> $upload_data['uploads']['file_name']);
			$this->User_model->edit($data);
			$this->session->set_flashdata('sukses','User telah diubah');
			redirect(base_url('admin/user/prof_user/'.$id_user));
		}}else{
			$i = $this->input;
			$data = array(	'id_user'				=>$id_user,
							'nama_user'				=> $i->post('nama_user'),
							'email'					=> $i->post('email'),
							'alamat'				=> $i->post('alamat'),
							'kota'					=> $i->post('kota'),
							'telp'					=> $i->post('telp'));
			$this->User_model->edit($data);
			$this->session->set_flashdata('sukses','User telah diubah');
			redirect(base_url('admin/user/prof_user/'.$id_user));
		}}


		$data=array('title' => 'Edit User',
					'user'=>$user,
					'isi'	=> 'admin/user/profile_edit_admin');
		$this->load->view('template/admin/wrapper',$data);
	}else{
		redirect('error');
	}
	}

		public function profile_edit_password($id_user)
	{
		$user=$this->User_model->detail($id_user);
		$password_lama=sha1($this->input->post('password_lama'));
		if($this->uri->segment('4')!=$this->session->userdata('id_user'))
		{
			redirect('error');
		}else{
			$login = array('id_user'=>$user->id_user);
        	$hasil=$this->User_model->cek_user($login);
			if ($hasil->num_rows() == 1) {
				$valid=$this->form_validation;
				$valid->set_rules('password_lama','Pasword Lama','required',
					array('required'=>'Password lama harus diisi'));
				$valid->set_rules('password','Pasword baru','required',
					array('required'=>'Password baru harus diisi'));
				$valid->set_rules('password2','Konfirmasi Pasword Baru','required|matches[password]',
					array('required'=>'Password lama harus diisi',
					'matches'=>'Re-Password harus sama dengan password'));
				if($valid->run()==false){

				$data=array('user'	=> $user,
							'isi'	=> 'admin/user/profile_edit_password');
				$this->load->view('template/admin/wrapper',$data);
				}else{

					if($password_lama!=$user->password){
					$this->session->set_flashdata('sukses','Password lama salah!');
					redirect(base_url('admin/user/profile/'.$id_user));
					}else{
					$i=$this->input;
					$data=array('id_user'=>$id_user,
					'password'=>sha1($i->post('password')));
					$this->session->set_flashdata('sukses','Password telah diubah');
					$this->User_model->edit($data);
					redirect(base_url('admin/user/profile/'.$id_user));
				}}
			}else{
				redirect('error');
			}
		}
	}
	public function profile_edit_password_admin($id_user)
	{
		$user=$this->User_model->detail($id_user);
		$password_lama=sha1($this->input->post('password_lama'));
			$login = array('id_user'=>$user->id_user);
        	$hasil=$this->User_model->cek_user($login);
			if ($hasil->num_rows() == 1) {
				$valid=$this->form_validation;
				$valid->set_rules('password_lama','Pasword Lama','required',
					array('required'=>'Password admin harus diisi'));
				$valid->set_rules('password','Pasword baru','required',
					array('required'=>'Password baru harus diisi'));
				$valid->set_rules('password2','Konfirmasi Pasword Baru','required|matches[password]',
					array('required'=>'Password lama harus diisi',
					'matches'=>'Re-Password harus sama dengan password'));
				if($valid->run()==false){

				$data=array('user'	=> $user,
							'isi'	=> 'admin/user/profile_edit_password_admin');
				$this->load->view('template/admin/wrapper',$data);
				}else{

					if($password_lama!=$this->session->userdata('password')){
					$this->session->set_flashdata('sukses','Password admin salah!, anda tidak dapat mengubah isi data ini!');
					redirect(base_url('admin/user/prof_user/'.$id_user));
					}else{
					$i=$this->input;
					$data=array('id_user'=>$id_user,
					'password'=>sha1($i->post('password')),
					'level'	=> 'Admin');
					$this->session->set_flashdata('sukses','Password telah diubah');
					$this->User_model->edit($data);
					redirect(base_url('admin/user/prof_user/'.$id_user));
				}}
			}else{
				redirect('error');
			}
	}

}
