<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('Error404');
        }
    }

	public function index(){
        $data = array(
            'title' => 'Riwayat Pembayaran',
            // 'dataPetugas' => $this->getDataTabel()
        );
        template('riwayat/index',$data);
	}
}