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
		$this->load->helper(['url', 'form', 'html']);
		$this->load->library(['session']);
		
    }
	public function index()
	{
		$this->load->view('guru/dashboard');
	}
	public function sikap()
	{
		$this->load->view('guru/sikap');
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
			'jam_masuk' => $this->input->post('masuk'),
			'jam_selesai' => $this->input->post('selesai'),
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
}