<?php 

class M_admin extends CI_Model {

  public function getSiswa() {
    return $this->db->get('siswa');
  }

  public function editSiswa($id, $data) {
    $this->db->update('siswa', $data, ['id' => $id]);
  }

  public function deleteSiswa($id) {
    $this->db->delete('siswa', ['id' => $id]);
  }

}

?>