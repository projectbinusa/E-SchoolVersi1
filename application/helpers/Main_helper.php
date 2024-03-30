<?php

function get_kelas_guru($nama)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('nama', $nama)->get('guru');
    foreach ($result->result() as $c) {
        $tmt = $c->kelas_id;
        return $tmt;
    }
}

function get_id_guru($nama)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('nama', $nama)->get('guru');
    foreach ($result->result() as $c) {
        $tmt = $c->id;
        return $tmt;
    }
}

function get_nama_guru($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('guru');
    foreach ($result->result() as $c) {
        $tmt = $c->nama;
        return $tmt;
    }
}

function get_nama_siswa($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('siswa');
    foreach ($result->result() as $c) {
        $tmt = $c->nama_siswa;
        return $tmt;
    }
}

function get_id_user($guru) {
    $ci = &get_instance();
    $ci->load->database();
    return $ci->db->select('u.id as id')->join('guru as g', "u.username=g.nama")
    ->where(["g.id" => $guru])->get("user as u")->result()[0]->id;
}

function indonesian_date($date)
{
  // fungsi atau method untuk mengubah tanggal ke format indonesia
  // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
  $indonesian_month = array(
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember',
  );
  $year = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
  $month = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
  $currentdate = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
  $time = substr($date, 11);
  $result = $currentdate . ' ' . $indonesian_month[(int) $month - 1] . ' ' . $year;

  return $result;
}

?>