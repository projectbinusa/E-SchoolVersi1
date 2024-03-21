<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Guru extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		$this->load->model('Main_model');
		date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('Main_helper');;
		$this->load->library(['session']);
		
    }
	public function index()
	{
		$this->load->view('guru/dashboard');
	}

	public function kbm()
	{
		$this->load->view('guru/kbm', [
			'data' => $this->Main_model->get('kbm')->result()
		]);
	}

	public function edit_kbm_api($id) {
		$this->Main_model->edit('kbm', [
			'jam_masuk' => $this->input->post('masuk'),
			'jam_selesai' => $this->input->post('selesai'),
			'materi' => $this->input->post('materi'),
			'keterangan' => $this->input->post('keterangan')
		], $id);
		redirect(base_url().'guru/kbm');
	}

	public function tambah_kbm_api() {
		$this->Main_model->insert('kbm', [
			'jam_masuk' => date('Y-m-d').' '.$this->input->post('masuk').':00',
			'jam_selesai' => date('Y-m-d').' '.$this->input->post('selesai').':00',
			'materi' => $this->input->post('materi'),
			'keterangan' => $this->input->post('keterangan')
		]);
		redirect(base_url().'guru/kbm');
	}

	public function hapus_kbm_api($id) {
		$this->Main_model->remove('kbm', $id);
		redirect(base_url().'guru/kbm');
	}

	public function tambah_kbm() {
		$this->load->view('guru/kbm_form', [
			'data' => (object) [
				"jam_masuk" => '',
				"jam_selesai" => '',
				"materi" => '',
				"keterangan" => ''
			]
		]);
	}

	public function edit_kbm($id) {
		$this->load->view('guru/kbm_form', [
			'data' => $this->Main_model->findById('kbm', $id)
		]);
	}

	public function presensi() {
		$this->load->view('guru/presensi');
	}

	public function tambah_presensi() {
		$kelas = array_map(function($x) {
			return $x->kelas_id;
		}, $this->Main_model->getWhere('presensi', ['tanggal' => date('Y-m-d')]));
		$this->load->view('guru/presensi_form', [
			'kelas' => $this->Main_model->getPresensiKelas($kelas)
		]);
	}

	public function edit_sikap_api($id) {
		$this->Main_model->edit('sikap', [
			'siswa_id' => $this->input->post('siswa_id'),
			'guru_id' => $this->session->userdata('guru_id'),
			'penilaian' => $this->input->post('penilaian'),
			'keterangan' => $this->input->post('keterangan')
		], $id);
		redirect(base_url().'guru/sikap');
	}

	public function tambah_sikap_api() {
		$this->Main_model->insert('sikap', [
			'siswa_id' => $this->input->post('siswa_id'),
			'guru_id' => $this->session->userdata('guru_id'),
			'penilaian' => $this->input->post('penilaian'),
			'keterangan' => $this->input->post('keterangan')
		]);
		redirect(base_url().'guru/sikap');
	}

	public function hapus_sikap_api($id) {
		$this->Main_model->remove('sikap', $id);
		redirect(base_url().'guru/sikap');
	}

	public function sikap()
	{
		$this->load->view('guru/sikap', [
			'data' => $this->Main_model->get('sikap')->result()
		]);
	}

	public function tambah_sikap() {
		$this->load->view('guru/sikap_form', [
			
			'data' => (object) [
				"siswa_id" => '',
				"penilaian" => '',
				"keterangan" => ''
			],
			'siswa' => $this->Main_model->getOptions('siswa', 'nama_siswa', ['kelas_id' => $this->session->userdata('kelas_id')])
		]);
	}

	public function edit_sikap($id) {
		$this->load->view('guru/sikap_form', [
			'data' => $this->Main_model->findById('sikap', $id),
			'siswa' => $this->Main_model->getOptions('siswa', 'nama_siswa', ['kelas_id' => $this->session->userdata('kelas_id')])
		]);
	}
}