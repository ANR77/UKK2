<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('Error404');
        }
    }

    // GET JSON DETAIL DATA PEMBAYARAN
    public function getDetail($id){
        $this->load->model('M_Riwayat');
		echo json_encode($this->M_Riwayat->getDetailPembayaran($id));
    }

    public function siswa($nisn){
        $this->load->model('M_Riwayat');
        $data = array(
            'title' => 'Riwayat Pembayaran',
            'dataRiwayat' => $this->M_Riwayat->getDataTabelSiswa($nisn)
        );
        template('riwayat/index',$data);
    }

	public function index(){
        $this->load->model('M_Riwayat');
        $data = array(
            'title' => 'Riwayat Pembayaran',
            'dataRiwayat' => $this->M_Riwayat->getDataTabel()
        );
        template('riwayat/index',$data);
	}
}