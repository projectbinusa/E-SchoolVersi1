<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

  public function edit($table, $data, $id) {
    $this->db->update($table, $data, ['id' => $id]);
  }
  public function editWhere($table, $data, $where) {
    $this->db->update($table, $data, $where);
  }
  public function insert($table, $data) {
    $this->db->insert($table, $data);
    return $this->db->insert_id();
  }

  public function insertBatch($table, $data) {
    if (count($data) <= 0) return;
    $this->db->insert_batch($table, $data);
  }

  public function login($table, $where)
  {
      $data = $this->db->where($where)->get($table);
      return $data;
  }

  function get($table)
  {
      return $this->db->get($table);
  }

  public function remove($table, $id) {
    $this->db->delete($table, ['id' => $id]);
  }
  public function removeWhere($table, $where) {
    $this->db->delete($table, $where);
  }

  public function getOptions($table, $label = "nama", $where = null) {
    if ($where) {
      $this->db->where($where);
    }
  
    $queryRes = $this->db->get($table)->result();
    $res = [];
    foreach ($queryRes as $row) {
      array_push($res, ((object) ["label" => $row->{$label}, "id" => $row->id]));
    }
    return $res;
  }

  public function findById($table, $id) {
    return $this->db->where('id', $id)->get($table, 1)->result()[0];
  }

  public function getWhere($table, $query) {
    return $this->db->get_where($table, $query)->result();
  }


  public function getGuru() {
    return $this->db->select('guru.*, kelas.nama as kelas')->join('kelas', "guru.kelas_id = kelas.id", "left")->get('guru')->result();
  }

  public function getSiswa() {
    return $this->db->select('siswa.*, kelas.nama as kelas')->join('kelas', "siswa.kelas_id = kelas.id")->get('siswa')->result();
  }

  public function getPresensi() {
    $queryRes = $this->db->select('p.*, k.nama as kelas, ks.keterangan')
    ->join('kelas as k', 'p.kelas_id = k.id')
    ->join('kehadiran_siswa as ks', 'ks.presensi_id = p.id', 'left')->get('presensi as p')->result();

    function search($array, $id) {
      $i = 0;
      foreach ($array as $x) {
        if ($x->id == $id) return $i;
        $i++;
      }
      return false;
    }

    $res = [];
    foreach ($queryRes as $row) {
      $kelas = search($res, $row->id);
      if ($kelas === false) {
        array_push($res, (object) [
          'id' => $row->id,
          'tanggal' => $row->tanggal,
          'kelas' => $row->kelas,
          'izin' => 0,
          'bolos' => 0,
          'sakit' => 0
        ]);
        if (isset($row->keterangan))
        $res[count($res)-1]->{strtolower($row->keterangan)}++;
      } else {
        $res[$kelas]->{strtolower($row->keterangan)}++;
      }
    }
    return $res;
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

  public function getPresensiKelas($kelas) {
    if (count($kelas) >  0) {
      $this->db->where_not_in('id', $kelas);
    }
    $queryRes = $this->db->get('kelas')->result();
    $res = [];
    foreach ($queryRes as $row) {
      array_push($res, ((object) ["label" => $row->nama, "id" => $row->id]));
    }
    return $res;
  }
}