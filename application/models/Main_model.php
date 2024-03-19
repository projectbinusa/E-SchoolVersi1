<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	public function import_data_siswa($data){
		$this->db->insert_batch('siswa',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	public function import_data_guru($data){
		$this->db->insert_batch('guru',$data);
		if($this->db->affected_rows()>0)
		{
			return 1;
		}
		else{
			return 0;
		}
	}
	public function data_siswa()
	{
		$this->db->select('*');
		$this->db->from('siswa');
		$query=$this->db->get();
		return $query->result();
	}
}