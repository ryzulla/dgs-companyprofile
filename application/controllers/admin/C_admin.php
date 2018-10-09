<?php
class C_admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if ($this->session->userdata('level')!="Admin") {
			redirect('error');
		}
		
	}

	public function index()
	{
		$berita=$this->Berita_model->listing();
		$data=array('title' => 'Dashboard',
					'berita'=>$berita,
					'isi'	=> 'admin/dashboard_view');
		$this->load->view('template/admin/wrapper',$data);
	}

	public function logout() {
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('auth');
	}
}
