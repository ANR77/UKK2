<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('Error404');
        }
    }

    public function petugas($id){
        $this->load->model('M_Profil');
        $data = array(
            'title' => 'Profil',
            'dataPetugas' => $this->M_Profil->getProfilPetugas($id)
        );
        template('profil/petugas',$data);
    }

    public function siswa($nisn){
        $this->load->model('M_Profil');
        $data = array(
            'title' => 'Profil',
            'dataSiswa' => $this->M_Profil->getProfilSiswa($nisn),
        );
        template('profil/siswa',$data);
    }

	public function index(){
	}
}