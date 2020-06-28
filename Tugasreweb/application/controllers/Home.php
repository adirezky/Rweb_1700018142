<?php

/**
* 
*/
class Home extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_data');
		if($this->session->userdata('login')==null){
			redirect('login');
		}
	}

	public function index(){
		$data = array(

			'judul'=>'Data Pengumuman', 
			'data_pengunguman'=> $this->m_data->data_pengunguman(),

		);
		
		$this->load->view('v_home',$data);
	}

	public function tambah_data(){
		$judul =$this->input->post('judul');
		$isi =$this->input->post('isi');

		$data = array(

			'judul_pengumuman' => $judul,
			'isi_pengumuman' => $isi,


		);
		$this->m_data->input_data($data,'pengumuman');
		redirect('http://localhost/Tugasreweb/home');

	}
}

?> 