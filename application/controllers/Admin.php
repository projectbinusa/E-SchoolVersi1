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
		$this->load->view('admin/siswa', [
      'data' => $this->Main_model->getSiswa()
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
				$ttl=$sheetdata[$i][3];
				$data[]=array(
					'nama_siswa'=>$nama_siswa,
					'nisn'=>$nisn,
					'ttl'=>$ttl,
				);
			}
			$inserdata=$this->Main_model->import_data_siswa($data);
			if($inserdata)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
				redirect('admin/index_siswa');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
				redirect('index');
			}
		}
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
				// $kelas=$sheetdata[$i][4];
				$data[]=array(
					'nama'=>$nama,
					'nip'=>$nip,
					'mapel'=>$mapel,
					// 'kelas'=>$kelas
				);
			}
			$inserdata=$this->Main_model->import_data_guru($data);
			if($inserdata)
			{
				$this->session->set_flashdata('message','<div class="alert alert-success">Successfully Added.</div>');
				redirect('admin/index_guru');
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger">Data Not uploaded. Please Try Again.</div>');
				redirect('index');
			}
		}
	}
}