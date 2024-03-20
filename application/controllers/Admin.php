<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller {
	public function __construct()
    {
			parent::__construct();
			$this->load->model('m_admin');
			date_default_timezone_set('Asia/Jakarta');
    }
	public function index()
	{
		$this->load->view('admin/siswa');
	}

	public function hapus_siswa_api($id) {
    $this->m_admin->remove('siswa', $id);
    redirect(base_url('admin/siswa'));
  }
  
  public function edit_siswa_api($id) {
    $this->m_admin->edit('siswa', $this->input->post("data"), $id);
    redirect(base_url('admin/siswa'));
  }

	public function guru()
	{
		$this->load->view('admin/guru', [
			'data' => $this->m_admin->getGuru()
		]);
	}
	public function siswa()
	{
		$this->load->view('admin/siswa', [
      'data' => $this->m_admin->getSiswa()
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