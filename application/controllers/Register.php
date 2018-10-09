<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
                $this->load->model('User_model');
        }
	public function index()
	{
		$this->load->view('register_view');
	}
	
	public function tambah()
	{
		$valid=$this->form_validation;
		$valid->set_rules('email','Email','required|valid_email',
			array('required'=>'Email harus diisi',
				'valid_email'=>'Email harus benar'));
		$valid->set_rules('nama_user','Nama User','required',
			array('required'=>'Nama User harus diisi'));
		$valid->set_rules('password','Password','required',
			array('required'=>'Password harus diisi'));
		$valid->set_rules('password2','Password2','required|matches[password]',
			array('required'=>'Retype password harus diisi',
				'matches'=>'Re-Password harus sama dengan password'));
			if($valid->run()) {
				$login = array('email'=>$this->input->post('email',TRUE));
				$hasil=$this->User_model->cek_user($login);
				$email=$this->input->post('email',TRUE);
				if ($hasil->num_rows() == 0) {
				$nama_user=$this->input->post('nama_user',TRUE);
			$pesan = "Hai ".$nama_user."!\n Selamat datang dan selamat bergabung dengan kami PotretLayanan \n	Dengan bergabung anda dapat memberikan informasi, pengaduan, serta saran terkait Layanan Publik disekitar anda\n
login dengan akun anda :\n Email : ".$email." \ndan kata sandi yang telah anda buat\nTerimakasih, Selamat bergabung dan jadilah pelopor kemajuan Indonesia\n
\n\nPESAN NO-REPLY\n\nRegards\nPotret Layanan";
				$config=Array(
	        		'protocol'=>'smtp',
	        		'smtp_host'=>'ssl://server.cloudnesia.com',
	        		'smtp_port'=>465,
	        		'smtp_user'=>'admin@potretlayanan.or.id',
	        		'smtp_pass'=>'Ryan.010495');
	        	$this->load->library('email', $config);

	        	$this->email->set_newline("\r\n");
	        	$this->email->from('admin@potretlayanan.or.id','potret layanan');
	        	$this->email->to($email);
	        	$this->email->subject('Selamat Bergabung');
	        	$this->email->message($pesan);

	        	if($this->email->send())
	        	{			
					$i = $this->input;
					$passed="1A2B4HTjsk5kwhadbwlff"; $panjang='8'; $len=strlen($passed);
					$started=$lened-$panjang;
					$xxed=rand('0',$started);
					$yyed=str_shuffle($passed);
					$idbaru=substr($yyed, $xxed, $panjang);
					$idreset=sha1($idbaru);
					$data = array(	'id_user'				=>$idreset,
									'nama_user'				=> $nama_user,
									'email'					=> $email,
									'password'				=> sha1($i->post('password')),
									'gambar'				=>"default.jpg",
									'level'					=> 'User');
					$this->User_model->tambah($data);
					$this->session->set_flashdata('sukses','Terimakasih telah mendaftar periksa email anda dan silahkan login');
					redirect(base_url('auth'));
				}
				else
				{
	        		show_error($this->email->print_debugger());
	        	}
	        }else{
	        	$this->session->set_flashdata('sukses','Email yang anda gunakan sudah terdaftar sebelumnya, Silahkan login dengan email dan password anda sebelumnya. Jika anda lupa password silahkan masuk ke menu Forgot Password');
				redirect(base_url('auth'));
	        }
		}
		$this->load->view('login');
	}

}
