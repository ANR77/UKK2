<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('login')) {
			$data = array(
				'title' => 'Login'
			);
            $this->load->view('login/login',$data);
        } else {
            redirect('dashboard');
        }
	}

	public function auth(){
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

		$this->load->model('M_Login');

		$user = $this->M_Login->authPetugas($username,$password);
		if ($user) {
			// $user['PASSWORD'] == md5($password)
			$this->session->set_userdata('login', TRUE);
			$this->session->set_userdata('nama', $user->nama_petugas);
			$this->session->set_userdata('level', $user->level);
			redirect('dashboard');
			return;
		} else {
			redirect('/');
		}
	}

	public function logout(){
		// $this->session_destroy;
		$this->session->unset_userdata('login');
        $this->session->unset_userdata('level');
        redirect('/');
	}
}
