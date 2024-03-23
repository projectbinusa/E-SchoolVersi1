<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller {
	public function __construct()
    {
			parent::__construct();
			$this->load->model('Main_model');
			date_default_timezone_set('Asia/Jakarta');
    }

	public function index()
	{
		$this->load->view('admin/dashboard', [
			'siswa' => $this->Main_model->getSiswa(),
			'guru' => $this->Main_model->getGuru()
		  ]);
	}

	public function hapus_siswa_api($id) {
		$this->Main_model->remove('siswa', $id);
		redirect(base_url('admin/siswa'));
  	}

	public function hapus_guru_api($id) {
		$this->Main_model->remove('guru', $id);
		redirect(base_url('admin/guru'));
	}
  
	public function edit_siswa_api($id) {
		$this->Main_model->edit('siswa', [
				'nama_siswa' => $this->input->post("nama"),
				'nisn' => $this->input->post("nisn"),
				'kelas_id' => $this->input->post("kelas"),
				'ttl' => $this->input->post("ttl")
			], $id);
		redirect(base_url('admin/siswa'));
	}

	public function edit_guru_api($id) {
		$username = $this->Main_model->findById('guru', $id)->nama;
		$this->Main_model->edit('guru', [
			'nama' => $this->input->post('nama'),
			'nip' => $this->input->post('nip'),
			'mapel' => $this->input->post('mapel'),
			'kelas_id' => $this->input->post('kelas') == "NULL" ? null : $this->input->post('kelas'),
			'ttl' => $this->input->post('ttl'),
		], $id);
		$userdata = [
			'username' => $this->input->post('nama')
		];
		if ($this->input->post('password')) {
			$userdata['password'] = md5($this->input->post('password'));
		}
		$this->Main_model->editWhere('user', $userdata, [ 'username' => $username ]);
		redirect(base_url('admin/guru'));
	}

	public function guru()
	{
		$this->load->view('admin/guru', [
			'data' => $this->Main_model->getGuru()
		]);
	}
	public function siswa()
	{
		$this->load->view('admin/siswa', [
      'data' => $this->Main_model->getSiswa()
    ]);
	}

	public function edit_guru($id) {
		$data = [
			'data' => $this->Main_model->findById('guru', $id),
			'kelas' => $this->Main_model->getOptions('kelas')
		];
		$this->load->view('admin/guru_form', $data);
	}

	public function edit_siswa($id) {
		$this->load->view('admin/siswa_form', [
			'data' => $this->Main_model->findById('siswa', $id),
			'kelas' => $this->Main_model->getOptions('kelas')
		]);
	}

	public function spreadsheet_import_siswa()
	{
		$upload_file=$_FILES['upload_file']['name'];
		$extension=pathinfo($upload_file,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);
		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$nama_siswa=$sheetdata[$i][1];
				$nisn=$sheetdata[$i][2];
				$kelas=$sheetdata[$i][3];
				$ttl=$sheetdata[$i][4];
				$data[]=array(
					'nama_siswa'=>$nama_siswa,
					'nisn'=>$nisn,
					'kelas_id'=>$kelas,
					'ttl'=>$ttl,
				);
			}
			$inserdata=$this->Main_model->import_data_siswa($data);
			if($inserdata)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
				redirect('admin/siswa');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
				redirect('index');
			}
		}
	}

	public function format_siswa()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="format_siswa_esch.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama Siswa');
		$sheet->setCellValue('C1', 'NISN');
		$sheet->setCellValue('D1', 'Kelas');
		$sheet->setCellValue('E1', 'ttl');
		$sheet->setCellValue('F1', '');
		$sheet->mergeCells('G1:H1');
        $sheet->setCellValue('G1', 'daftar kelas');
		
		$data['data'] = $this->Main_model->get('kelas')->result(); 
    	$dataKelas = $data['data'];

    	$rowNum = 2;

    	foreach ($dataKelas as $data) {
        $sheet->setCellValue('A' . $rowNum, '');
        $sheet->setCellValue('B' . $rowNum, '');
        $sheet->setCellValue('C' . $rowNum, ''); // Replace with actual hadir status
        $sheet->setCellValue('D' . $rowNum, ''); // Replace with actual ijin status
        $sheet->setCellValue('E' . $rowNum, ''); // Replace with actual alpha status
        $sheet->setCellValue('F' . $rowNum, ''); // Replace with actual alpha status
        $sheet->setCellValue('G' . $rowNum, $data->id); // Replace with actual alpha status
        $sheet->setCellValue('H' . $rowNum, $data->nama); // Replace with additional keterangan

        $rowNum++;
    }
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}


	public function spreadsheet_import_guru()
	{
		$upload_file=$_FILES['upload_file']['name'];
		$extension=pathinfo($upload_file,PATHINFO_EXTENSION);
		if($extension=='csv')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Csv();
		} else if($extension=='xls')
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else
		{
			$reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		}
		$spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
		$sheetdata=$spreadsheet->getActiveSheet()->toArray();
		$sheetcount=count($sheetdata);
		if($sheetcount>1)
		{
			$data=array();
			for ($i=1; $i < $sheetcount; $i++) { 
				$nama=$sheetdata[$i][1];
				$nip=$sheetdata[$i][2];
				$mapel=$sheetdata[$i][3];
				$kelas_id=$sheetdata[$i][4];
				$ttl=$sheetdata[$i][5];
				$data[]=array(
					'nama'=>$nama,
					'nip'=>$nip,
					'mapel'=>$mapel,
					'kelas_id'=>$kelas_id,
					'ttl'=>$ttl
				);
			}
			$inserdata=$this->Main_model->import_data_guru($data);
			if($inserdata)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
				redirect('admin/guru');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
				redirect('index');
			}
		}
	}
	public function format_guru()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="format_guru_esch.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama Guru');
		$sheet->setCellValue('C1', 'NIP');
		$sheet->setCellValue('D1', 'Mapel');
		$sheet->setCellValue('E1', 'kelas');
		$sheet->setCellValue('F1', 'ttl');
		$sheet->setCellValue('G1', 'password');
		$sheet->setCellValue('H1', '');
		$sheet->mergeCells('I1:J1');
        $sheet->setCellValue('I1', 'daftar kelas');
		
		$data['data'] = $this->Main_model->get('kelas')->result(); 
    	$dataKelas = $data['data'];

    	$rowNum = 2;

    	foreach ($dataKelas as $data) {
        $sheet->setCellValue('A' . $rowNum, '');
        $sheet->setCellValue('B' . $rowNum, '');
        $sheet->setCellValue('C' . $rowNum, ''); 
        $sheet->setCellValue('D' . $rowNum, ''); 
        $sheet->setCellValue('E' . $rowNum, ''); 
        $sheet->setCellValue('F' . $rowNum, ''); 
        $sheet->setCellValue('G' . $rowNum, ''); 
        $sheet->setCellValue('G' . $rowNum, ''); 
        $sheet->setCellValue('H' . $rowNum, ''); 
        $sheet->setCellValue('I' . $rowNum, $data->id); 
        $sheet->setCellValue('J' . $rowNum, $data->nama); 

        $rowNum++;
    }
		$writer = new Xlsx($spreadsheet);
		$writer->save("php://output");
	}

	public function kelas()
	{
		$data['data'] = $this->Main_model->get('kelas')->result(); 
		$this->load->view('admin/kelas', $data);
	}

	function get_data_kelas()
    {
        header('Content-Type: application/json');
        $tables = "kelas";
        $search = array('nama');
		$isWhere = null;
		echo $this->Main_model->get_tables($tables,$search,$isWhere);
    }



	public function tambah_kelas() {
		$this->Main_model->insert('kelas', [
			'nama' => $this->input->post('nama'),
		]);
		redirect(base_url().'admin/kelas');
	}

	public function edit_kelas_api($id) {
		$this->Main_model->edit('kelas', [
			'nama' => $this->input->post('nama'),
		], $id);
		redirect(base_url().'admin/kelas');
	}

	public function edit_kelas($id) {
		$this->load->view('admin/kelas', [
			'data' => $this->Main_model->findById('kelas', $id)
		]);
	}
	public function hapus_kelas($id) {
		$this->Main_model->remove('kelas', $id);
		redirect(base_url().'admin/kelas');
	}
}