<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
    {
			parent::__construct();
			$this->load->model('Main_model');
			date_default_timezone_set('Asia/Jakarta');
    }
	public function index()
	{
		$this->load->view('auth/login');
	}

	public function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = ['username' => $username];
        $query = $this->Main_model->login('user', $data);
        $result = $query->row_array();
        if (!empty($result) && md5($password) === $result['password']) {
            $data = [
                'logged_in' => true,
                'username' => $result['username'],
                'role_id' => $result['role_id'],
                'id' => $result['id_user'],
            ];
            if ($result['role_id'] == '1') {
                $this->session->set_userdata($data);
                redirect(base_url('admin'));
            } else {
                $data['walikelas'] = $this->Main_model->getWhere('guru', ['nama' => $data['username']])[0]->kelas_id;
                $this->session->set_userdata($data);
                redirect(base_url('guru'));
            }
        } else {
            $this->session->set_flashdata('error' , 'error ');
            redirect(base_url());
        }
    }
}