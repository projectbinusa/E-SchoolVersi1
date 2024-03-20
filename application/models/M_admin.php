<?php 

class m_admin extends CI_Model {

  public function getSiswa() {
    return $this->db->select('siswa.*, kelas.nama as kelas')->join('kelas', "siswa.kelas_id = kelas.id")->get('siswa')->result();
  }

  public function edit($table, $data, $id) {
    $this->db->update($table, $data, ['id' => $id]);
  }

  public function remove($table, $id) {
    $this->db->delete($table, ['id' => $id]);
  }

  public function getGuru() {
    return $this->db->select('guru.*, kelas.nama as kelas')->join('kelas', "guru.kelas_id = kelas.id")->get('guru')->result();
  }

  public function import_data_siswa($data){
		$this->db->insert_batch('siswa',$data);
		if($this->db->affected_rows()>0) {
			return 1;
		}
    return 0;
	}
	public function import_data_guru($data){
		$this->db->insert_batch('guru',$data);
		if($this->db->affected_rows()>0) {
			return 1;
		}
    return 0;
	}

}

?>