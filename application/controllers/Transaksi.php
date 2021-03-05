<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('Error404');
        }
    }

    // AJAX REQUEST RETURN DATA SPP
    public function getDataSpp($id_siswa){
        $this->load->model('M_Transaksi');
		echo json_encode($this->M_Transaksi->getSppByIdSiswa($id_siswa));
    }

    // AJAX REQUEST RETURN DATA SISWA
    public function getDataSiswa($condition){
        $this->load->model('M_Transaksi');
		echo json_encode($this->M_Transaksi->getSiswaByCondition($condition));
    }

	public function index(){
        $this->load->model('M_Transaksi');
        $data = array(
            'title' => 'Transaksi'
        );
        template('transaksi/index',$data);
	}
}