<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use Dompdf\Dompdf;
use Dompdf\Options;	

class Guru extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
		if ($this->session->userdata('role_id') !== '2') {
			redirect(base_url());
		}
		// Use main model
		$this->load->model('Main_model');
		// Set time zone
		date_default_timezone_set('Asia/Jakarta');
		// Use main helper
		$this->load->helper('Main_helper');
		// Use session
		$this->load->library(['session']);
		
    }

	// Function dashboard guru
	public function index()
	{
		$data['kbm'] = $this->Main_model->getWhere('kbm', ['guru_id' => $this->session->userdata('guru_id')]);
		usort($data['kbm'], function($a, $b) {
			return $b->id - $a->id;
		});
		$this->load->view('guru/dashboard', $data);
	}

	// Function KBM
	public function kbm()
	{
		$data['kbm'] = $this->Main_model->getWhere('kbm', ['guru_id' => $this->session->userdata('guru_id')]);
		usort($data['kbm'], function($a, $b) {
			return $b->id - $a->id;
		});
		$this->load->view('guru/kbm', $data);
	}

	// Function API edit KBM
	public function edit_kbm_api($id) {
		$this->Main_model->edit('kbm', [
			'jam_masuk' => $this->input->post('masuk'),
			'jam_selesai' => $this->input->post('selesai'),
			'materi' => $this->input->post('materi'),
			'keterangan' => $this->input->post('keterangan')
		], $id);
		redirect(base_url().'guru/kbm');
	}

	// Function API tambah KBM
	public function tambah_kbm_api() {
		$this->Main_model->insert('kbm', [
			'guru_id' => $this->session->userdata('guru_id'),
			'jam_masuk' => date('Y-m-d').' '.$this->input->post('masuk').':00',
			'jam_selesai' => date('Y-m-d').' '.$this->input->post('selesai').':00',
			'materi' => $this->input->post('materi'),
			'keterangan' => $this->input->post('keterangan')
		]);
		redirect(base_url().'guru/kbm');
	}

	// Function API hapus KBM
	public function hapus_kbm_api($id) {
		$this->Main_model->remove('kbm', $id);
		redirect(base_url().'guru/kbm');
	}

	// Function form tambah KBM
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

	// Function form edit KBM
	public function edit_kbm($id) {
		$this->load->view('guru/kbm_form', [
			'data' => $this->Main_model->findById('kbm', $id)
		]);
	}

	// Function piket
	public function piket() {
		$this->load->view('guru/presensi', [
			'data' => $this->Main_model->getPresensi()
		]);
	}

	// Function form tambah piket
	public function tambah_piket() {
		$kelas = array_map(function($x) {
			return $x->kelas_id;
		}, $this->Main_model->getWhere('presensi', ['tanggal' => date('Y-m-d')]));
		$this->load->view('guru/presensi_form', [
			'kelas' => $this->Main_model->getPresensiKelas($kelas),
			'data' => (object) [
				'tanggal' => '',
				'kelas_id' => '',
			],
			'kehadiran' => []
		]);
	}

	// Function form edit piket
	public function edit_piket($id) {
		$data = $this->Main_model->findById('presensi', $id);
		$kelas = array_map(function($x) {
			return $x->kelas_id;
		}, $this->Main_model->getWhere('presensi', ['tanggal' => $data->tanggal]));
		unset($kelas[array_search($data->kelas_id, $kelas)]);

		$this->load->view('guru/presensi_form', [
			'data' => $data,
			'kelas' => $this->Main_model->getPresensiKelas($kelas),
			'kehadiran' => $this->Main_model->getWhere('kehadiran_siswa', ['presensi_id' => $id]),
		]);
	}

	// Function API edit presensi
	public function edit_presensi_api($id) {
		$this->Main_model->edit('presensi', [
			'kelas_id' => $this->input->post('kelas'),
			'tanggal' => $this->input->post('tanggal'),
		], $id);
		$this->Main_model->removeWhere('kehadiran_siswa', ['presensi_id' => $id]);
		$kehadiran = [];
		for ($i=0; $i < $this->input->post('jumlah_siswa'); $i++) { 
			$hadir = $this->input->post('kehadiran'.$i);
			if (!$hadir) continue; 
			array_push($kehadiran, [
				'presensi_id' => $id,
				'siswa_id' => $this->input->post('siswa'.$i),
				'keterangan' => $hadir
			]);
		}
		$this->Main_model->insertBatch('kehadiran_siswa', $kehadiran);
		redirect('guru/piket');
	}

	// Function API tambah presensi
	public function tambah_presensi_api() {
		$presensi_id = $this->Main_model->insert('presensi', [
			'kelas_id' => $this->input->post('kelas'),
			'tanggal' => $this->input->post('tanggal')
		]);
		$kehadiran = [];
		for ($i=0; $i < $this->input->post('jumlah_siswa'); $i++) { 
			$hadir = $this->input->post('kehadiran'.$i);
			if (!$hadir) continue; 
			array_push($kehadiran, [
				'presensi_id' => $presensi_id,
				'siswa_id' => $this->input->post('siswa'.$i),
				'keterangan' => $hadir
			]);
		}
		$this->Main_model->insertBatch('kehadiran_siswa', $kehadiran);
		redirect('guru/piket');
	}

	// Function API hapus presensi
	public function hapus_presensi_api($id) {
		$this->Main_model->removeWhere('kehadiran_siswa', ['presensi_id' => $id]);
		$this->Main_model->remove('presensi', $id);
		redirect('guru/piket');
	}

	// Function get siswa by id kelas
	public function get_siswas_bykelas($id) {
		echo json_encode($this->Main_model->getWhere('siswa', ['kelas_id' => $id]));
	}

	// Function API edit sikap
	public function edit_sikap_api($id) {
		if ($this->session->userdata('kelas_id') == null) {
				redirect(base_url('guru'));
		}
		$this->Main_model->edit('sikap', [
			'siswa_id' => $this->input->post('siswa_id'),
			'guru_id' => $this->session->userdata('guru_id'),
			'penilaian' => $this->input->post('penilaian'),
			'keterangan' => $this->input->post('keterangan')
		], $id);
		redirect(base_url().'guru/sikap');
	}

	// Function API tambah sikap
	public function tambah_sikap_api() {
		if ($this->session->userdata('kelas_id') == null) {
				redirect(base_url('guru'));
		}
		$this->Main_model->insert('sikap', [
			'siswa_id' => $this->input->post('siswa_id'),
			'guru_id' => $this->session->userdata('guru_id'),
			'penilaian' => $this->input->post('penilaian'),
			'keterangan' => $this->input->post('keterangan')
		]);
		redirect(base_url().'guru/sikap');
	}

	// Function API hapus sikap
	public function hapus_sikap_api($id) {
		if ($this->session->userdata('kelas_id') == null) {
				redirect(base_url('guru'));
		}
		$this->Main_model->remove('sikap', $id);
		redirect(base_url().'guru/sikap');
	}

	// Function sikap
	public function sikap()
	{
		if ($this->session->userdata('kelas_id') == null) {
				redirect(base_url('guru'));
		}
		$this->load->view('guru/sikap', [
			'data' => $this->Main_model->get('sikap')
		]);
	}

	// Function form tambah sikap
	public function tambah_sikap() {
		if ($this->session->userdata('kelas_id') == null) {
				redirect(base_url('guru'));
		}
		$this->load->view('guru/sikap_form', [
			
			'data' => (object) [
				"siswa_id" => '',
				"penilaian" => '',
				"keterangan" => ''
			],
			'siswa' => $this->Main_model->getOptions('siswa', 'nama_siswa', ['kelas_id' => $this->session->userdata('kelas_id')])
		]);
	}

	// Function form edit sikap
	public function edit_sikap($id) {
		if ($this->session->userdata('kelas_id') == null) {
				redirect(base_url('guru'));
		}
		$this->load->view('guru/sikap_form', [
			'data' => $this->Main_model->findById('sikap', $id),
			'siswa' => $this->Main_model->getOptions('siswa', 'nama_siswa', ['kelas_id' => $this->session->userdata('kelas_id')])
		]);
	}

	// Function export presensi (PDF)
	public function pdf_presensi($id){

		$options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
		$presensi = $this->Main_model->findById('presensi', $id);
		$temp = $this->Main_model->getWhere('kehadiran_siswa', ['presensi_id' => $id]);
		$res = [];
		foreach ($temp as $row) {
			$res[$row->siswa_id] = $row->keterangan;
		}

        // Isi konten PDF (misalnya, HTML)
		$content = $this->load->view('guru/laporan_pdf', [
			'presensi' => $presensi,
			'kehadiran' => $res,
			'kelas' => $this->Main_model->findById('kelas', $presensi->kelas_id),
			'siswa' => $this->Main_model->getWhere('siswa', ['kelas_id' => $presensi->kelas_id]),
		], true);
        $dompdf->loadHtml($content);

        // Render PDF
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream('example.pdf', array('Attachment' => 0));
	}

	// Function export presensi by tanggal (PDF)
	public function pdf_presensi_tgl(){
		$tgl = $this->input->get('taggal');
		$options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);
		$presensi = $this->Main_model->getWhere('presensi', ['tanggal' => $tgl], "id DESC");
		$kehadiran = [];
		$kelas = [];
		foreach ($presensi as $piket) {
			array_push($kelas, $this->Main_model->findById('kelas', $piket->kelas_id));
			array_push($kehadiran, $this->Main_model->getKehadiranKelas($piket->id));
		}

        // Isi konten PDF (misalnya, HTML)
		$content = $this->load->view('guru/laporan_pdf_tgl', [
			'presensi' => $presensi,
			'kehadiran' => $kehadiran,
			'kelas' => $kelas,
			'tgl' => $tgl
		], true);
        $dompdf->loadHtml($content);

        // Render PDF
        $dompdf->render();

        // Output PDF ke browser
        $dompdf->stream('example.pdf', array('Attachment' => 0));
	}

	// Function get kelas
	public function get_kelas_presensi($id) {
		$query_res = $this->Main_model->getWhere('presensi', ['tanggal' => $this->input->get('tanggal')]);
		$kelas = array_map(function($x) {
			return $x->kelas_id;
		}, $query_res);
		unset($kelas[array_search($id, $kelas)]);
		echo json_encode($this->Main_model->getPresensiKelas($kelas));
	}
}