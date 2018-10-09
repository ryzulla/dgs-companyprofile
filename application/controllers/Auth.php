<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index() {
		$this->load->view('login');
	}

	public function cek_login() {
		$login = array('email' => $this->input->post('email', TRUE),
						'password' => sha1($this->input->post('password', TRUE))
			);
		 // load model_user

		$hasil = $this->User_model->cek_user($login);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess)
			{
						$sess_data['logged_in'] = 'Sudah Loggin';
						$sess_data['id_user'] = $sess->id_user;
						$sess_data['password'] = $sess->password;
						$sess_data['email'] = $sess->email;
						$sess_data['level'] = $sess->level;
						$this->session->set_userdata($sess_data);
			}
			redirect('admin/c_admin');
		}else{
				$this->load->view('login');
				$this->session->set_flashdata('warning','Oopss.. Username/password salah');

		 }
	}
}
