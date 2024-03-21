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

?>