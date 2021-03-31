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

    // RETURN FOR AJAX REQUEST CEK PASSWORD
    public function cekPassword(){
        $id_petugas =  $this->uri->segment(3);
        $password =  $this->uri->segment(4);
        $this->load->model('M_Profil');
		echo json_encode($this->M_Profil->cekPassword($id_petugas,md5($password)));
    }

    // Ubah Password dari request ajax
    public function ubahPassword(){
        $id_petugas =  $this->uri->segment(3);
        $password =  $this->uri->segment(4);

        $this->db->set('password',md5($password));
        $this->db->where('id_petugas',$id_petugas);
        if ($this->db->update('petugas')) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    // Ubah data petugas
    public function ubahData($id_petugas){
        $post = $this->input->post();
        $dataInput = array(
            'nama_petugas' => $post['nama'],
            'username' => $post['username']
        );
        $this->db->where('id_petugas',$id_petugas);
        if ($this->db->update('petugas',$dataInput)) {
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('pesan','Data Berhasil Diedit');
            redirect('profil/petugas/'.$id_petugas);
        } else {
            $this->session->set_flashdata('status','fail');
            $this->session->set_flashdata('pesan','Pengeditan data gagal!');
            redirect('profil/petugas/'.$id_petugas);
        }
    }

    // RETURN FOR AJAX REQUEST CEK PASSWORD SISWA
    public function cekPasswordSiswa(){
        $id_petugas =  $this->uri->segment(3);
        $password =  $this->uri->segment(4);
        $this->load->model('M_Profil');
		echo json_encode($this->M_Profil->cekPasswordSiswa($id_petugas,md5($password)));
    }

    // Ubah Password dari request ajax
    public function ubahPasswordSiswa(){
        $id_siswa =  $this->uri->segment(3);
        $password =  $this->uri->segment(4);

        $this->db->set('password',md5($password));
        $this->db->where('id_siswa',$id_siswa);
        if ($this->db->update('siswa')) {
            echo json_encode(true);
        } else {
            echo json_encode(false);
        }
    }

    public function siswa($nisn){
        $bulan = array(
            "Juli", 
            "Agustus", 
            "September", 
            "Oktober", 
            "November", 
            "Desember", 
            "Januari", 
            "Februari", 
            "Maret", 
            "April", 
            "Mei", 
            "Juni"
        );
        $this->load->model('M_Profil');
        $data = array(
            'title' => 'Profil',
            'dataSiswa' => $this->M_Profil->getProfilSiswa($nisn),
            'dataSpp' => $this->M_Profil->getDataSpp($this->session->id_siswa),
            'bulan' => $bulan
        );
        template('profil/siswa',$data);
    }

	public function index(){
	}
}