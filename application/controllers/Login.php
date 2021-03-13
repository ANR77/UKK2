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

	// VALIDASI LOGIN
	public function loginValidation(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[25]');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_message('max_length', '{field} tidak boleh lebih dari {param} karakter.');
		
        if($this->form_validation->run()){
            return true;
        }
        else{
			return false;
		}
	}

	// PROSES LOGIN
	public function auth(){
		if ($this->loginValidation()) {	
			$post = $this->input->post();
			$data = array(
				'username' => $post['username'],
				'password' => md5($post['password'])
			);
			$this->load->model('M_Login');

			$user = $this->M_Login->authPetugas($data['username'],$data['password']);
			if ($user->level == "admin") {
				$this->session->set_userdata('login', TRUE);
				$this->session->set_userdata('id', $user->id_petugas);
				$this->session->set_userdata('nama', $user->nama_petugas);
				$this->session->set_userdata('level', $user->level);
				redirect('dashboard');
			} 
			elseif ($user->level == "petugas") {
				$this->session->set_userdata('login', TRUE);
				$this->session->set_userdata('id', $user->id_petugas);
				$this->session->set_userdata('nama', $user->nama_petugas);
				$this->session->set_userdata('level', $user->level);
				redirect('transaksi');
			} 
			else {
				$this->session->set_userdata('error_login', TRUE);
				redirect('/');
			}
		} else {
			redirect('/');
		}
	}

	public function loginSiswa(){
		$post = $this->input->post();
		$data = array(
			'nisn' => $post['nisn'],
			'nis' => $post['nis']
		);
		$this->load->model('M_Login');

		$user = $this->M_Login->authSiswa($data['nisn'],$data['nis']);
		if ($user) {
			// $user['PASSWORD'] == md5($password)
			$this->session->set_userdata('login', TRUE);
			$this->session->set_userdata('nisn', $user->nisn);
			$this->session->set_userdata('nama', $user->nama);
			$this->session->set_userdata('level', 'siswa');
			redirect('riwayat/siswa/'.$user->nisn);
			return;
		} else {
			$this->session->set_userdata('error_login', TRUE);
			redirect('/');
		}
	}

	// LOGOUT
	public function logout(){
		// $this->session_destroy;
		$this->session->sess_destroy();
        redirect('/');
	}
}
