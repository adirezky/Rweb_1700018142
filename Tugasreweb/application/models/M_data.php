<?php

class M_data extends CI_Model{
	public function data_pengunguman(){
		$query = $this->db->query("SELECT * FROM pengumuman");
		return $query->result();
	}
	public function input_data($data){
		$this->db->insert('pengumuman',$data);
	}
}

?>