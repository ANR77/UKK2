<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('Error404');
        }
    }

	public function index(){
        $this->load->model('M_Dashboard');
        $data = array(
            'title' => 'Dashboard',
            'dataTransaksi' => $this->M_Dashboard->getTransaksi(date('Y-m-d')),
            'jumlahSiswa' => $this->M_Dashboard->jumlahSiswa(),
            'jumlahKelas' => $this->M_Dashboard->jumlahKelas(),
            'jumlahPetugas' => $this->M_Dashboard->jumlahPetugas(),
        );
        template('dashboard/dashboard',$data);
	}
}