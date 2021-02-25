<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('Error404');
        }
    }

    public function getDataSpp($id_siswa){
        $this->load->model('M_Transaksi');
		echo json_encode($this->M_Transaksi->getSppByIdSiswa($id_siswa));
    }

	public function index(){
        $this->load->model('M_Transaksi');
        $data = array(
            'title' => 'Transaksi',
            'dataSiswa' => $this->M_Transaksi->getSiswa()
        );
        template('transaksi/index',$data);
	}
}