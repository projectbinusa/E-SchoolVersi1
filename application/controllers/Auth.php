<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
    {
			parent::__construct();
			// Use main model
			$this->load->model('Main_model');
			// Set time zone
			date_default_timezone_set('Asia/Jakarta');
            // Use main helper
            $this->load->helper('Main_helper');;
			// Use session
			$this->load->library(['session']);
    }

    // Function login
	public function index()
	{
        if ($this->session->userdata('logged_in') == true && $this->session->userdata('role_id') == '1') {
            redirect(base_url('admin'));
        } elseif ($this->session->userdata('logged_in') == true && $this->session->userdata('role_id') == '2') {
            redirect(base_url('guru'));
        } else{
            $this->load->view('auth/login', [
                'failed' => $this->session->flashdata('error')
            ]);
        }
	}

    // Function API login
	public function aksi_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $query = $this->Main_model->get_where('user', ['email' => $email]);
        $result = $query->row_array();
        if (!empty($result) && md5($password) === $result['password']) {
            if ($result['role_id'] == '2' && get_kelas_guru($result['username']) !== NULL) {
                $data = [
                    'logged_in' => true,
                    'username' => $result['username'],
                    'role_id' => $result['role_id'],
                    'guru_id' => get_id_guru($result['username']),
                    'kelas_id' => get_kelas_guru($result['username']),
                    'id' => $result['id_user'],
                ];
            } else {
                $data = [
                    'logged_in' => true,
                    'username' => $result['username'],
                    'role_id' => $result['role_id'],
                    'guru_id' => get_id_guru($result['username']),
                    'id' => $result['id_user'],
                ];
            }
            
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

    // Function API logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}