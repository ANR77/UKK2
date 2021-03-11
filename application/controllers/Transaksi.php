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

    public function bayar(){
        $post = $this->input->post();
        $dataInput = array(
            'id_siswa_spp' => $post['id-siswa-spp'],
            'id_siswa' => $post['id-siswa'],
            'id_spp' => $post['id-spp'],
            'nama_petugas' => $post['nama-petugas'],
            'tgl_bayar' => $post['tgl-bayar'],
            'bulan' => $post['bulan'],
            'jumlah_bayar' => $this->parsingUang($post['bayar']),
            'kembalian' => $this->parsingUang($post['kembalian']),
        );
        if ($this->db->insert('pembayaran',$dataInput)) {
            $this->db->set('angsuran',intval($post['angsuran'])+1);
            $this->db->where('id_siswa_spp',$post['id-siswa-spp']);
            if ($this->db->update('siswa_spp')) {
                $this->session->set_flashdata('status','success');
                $this->session->set_flashdata('pesan','Pembayaran berhasil!');
                redirect('transaksi');
            } else {
                $this->load->model('M_Transaksi');
                $id = $this->M_Transaksi->failPembayaran($dataInput);
                $this->db->where('id_pembayaran',$id['id_pembayaran']);
                $this->db->delete('pembayaran');
                $this->session->set_flashdata('status','fail');
                $this->session->set_flashdata('pesan','Pembayaran gagal!');
                redirect('transaksi');
            }
        } else {
            $this->session->set_flashdata('status','fail');
            $this->session->set_flashdata('pesan','Pembayaran gagal!');
            redirect('transaksi');
        }
    }

    // PARSE UANG
    function parsingUang($nominal){
        $final = explode(",",$nominal);
        $final = implode("",$final);
        return $final;
    }

	public function index(){
        $data = array(
            'title' => 'Transaksi'
        );
        template('transaksi/index',$data);
	}
}