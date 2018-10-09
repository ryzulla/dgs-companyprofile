<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}
	function index(){
		$pass="1A2B4HTjsk5kwhadbwlff"; $panjang='8'; $len=strlen($pass);
		$start=$len-$panjang;
		$xx=rand('0',$start);
		$yy=str_shuffle($pass);
		$passwordbaru=substr($yy, $xx, $panjang);
		$passwordreset=sha1($passwordbaru);

		$login = array('email'=>$this->input->post('email',TRUE));
		$hasil=$this->User_model->cek_user($login);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$email=$sess->email;
				$id_user=$sess->id_user;
				$nama_user=$sess->nama_user;
			}
			$pesan = "Kami telah mereset Ulang Kata sandi ".$nama_user." dari permintaan Recover password atau Forgot Password melalui web kami \n\n
			DETAIL AKUN ANDA SAAT INI :\n Email : ".$email." \n Kata sandi anda yang baru adalah: ".$passwordbaru."\n
			Silahkan login dengan password baru anda dan segera ganti password tersebut dengan password yang anda inginkan dan mudah anda ingat\n
			\n\nPESAN NO-REPLY\n\nRegards\nPT. DWI GUNA SENTOSA";

			$data1 = array('id_user'=>$id_user,
							'password'=>$passwordreset);
						$this->User_model->edit($data1);
						$config=Array(
			                    'protocol'=>'smtp',
			                    'smtp_host'=>'ssl://smtp.googlemail.com',
			                    'smtp_port'=>465,
			                    'smtp_user'=>'potret.layanan@gmail.com',
			                    'smtp_pass'=>'Ryan.010495');
			                $this->load->library('email', $config);
			                $this->email->set_newline("\r\n");
			                $this->email->from('potret.layanan@gmail.com','PT. DWI GUNA SENTOSA');
			                $this->email->to($email);
			                $this->email->subject('Selamat Bergabung');
			                $this->email->message($pesan);
			        	if($this->email->send()){
			        		$this->session->set_flashdata('sukses','Permintaan Reset Password telah terkirim ke email anda, Silahkan buka email anda dan login kembali');
			        		redirect('auth');
			        	}
			        	else{
			        		show_error($this->email->print_debugger());
			        	}
			        }else{
			        $this->session->set_flashdata('warning','Email tidak ditemukan');
			        redirect('auth');
			    }
        }
    }
