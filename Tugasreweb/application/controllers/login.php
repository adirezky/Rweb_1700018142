<?php

class login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	function index(){
		$this->load->view('v_login');
	}

	public function aksi(){

		$this->form_validation->set_rules('email', 'email', 'required',array('required' => "<div align='center'><font color='red'>Email tidak boleh kosong.</font></div>"));
		$this->form_validation->set_rules('password', 'password', 'required',array('required' => "<div align='center'><font color='red'>Password tidak boleh kosong.</font></div>"));
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$data_login = $this->m_login->cek_akun($email, $password);

		if($this->form_validation->run() != false){

			if($data_login){
				$this->session->set_userdata('id', $data_login['id']);
				$this->session->set_userdata('nama', $data_login['nama']);
				$this->session->set_userdata('login', true);
				redirect('http://localhost/Tugasreweb/home');
			}else{
				$this->session->set_flashdata('pesan_flash', "<div align='center'><font color='red'>Akun anda tidak ditemukan</font></div>");
				$this->load->view('v_login2');
			}
		}else{
			$this->load->view('v_login2');
		}
	}


	public function logout(){
		$this->session->sess_destroy();
        redirect('http://localhost/Tugasreweb/login');
	}
}


?>