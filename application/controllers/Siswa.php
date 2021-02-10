<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('Error404');
        }
    }

    // GET DATA FOR VIEW TABEL SISWA
    public function getDataTabel(){
        $this->load->model('M_Siswa');
        $dataKelas = $this->getDataKelas();
        $data = $this->M_Siswa->getSiswa();
        for ($i=0; $i < count($data); $i++) { 
            for ($j=0; $j < count($dataKelas); $j++) { 
                if ($data[$i]['id_kelas'] == $dataKelas[$j]['id_kelas']) {
                    $data[$i]['kelas'] = $dataKelas[$j]['kelas'];
                }
            }
        }
        return $data;
    }

    // GET DATA FOR KELAS
    public function getDataKelas(){
        $dataKelas = array();
        $data = $this->M_Siswa->getKelas();
        foreach ($data as $key => $value) {
            $temp = array(
                'id_kelas' => $value->id_kelas,
                'kelas' => $value->tingkat_kelas." ".$value->kompetensi_keahlian." ".$value->nama_kelas
            );
            array_push($dataKelas, $temp);
        }
        return $dataKelas;
    }

    // LOAD CREATE DATA
    public function create(){
        $this->load->model('M_Siswa');
        $data = array(
            'title' => 'Data Petugas',
            'dataSiswa' => $this->M_Siswa->getSiswa(),
            'dataKelas' => $this->getDataKelas(),
        );
        template('siswa/create',$data);
    }

    // CREATE DATA TO DATABASE
    public function createData(){
        if ($this->validation()) {
            $post = $this->input->post();
			$dataInput = array(
				'nisn' => $post['nisn'],
				'nis' => $post['nis'],
				'nama' => $post['nama'],
				'id_kelas' => $post['kelas'],
				'alamat' => $post['alamat'],
				'no_telp' => $post['no_telp'],
			);
            if ($this->db->insert('siswa',$dataInput)) {
                $this->session->set_flashdata('msg', 'success');
                redirect('siswa');
            } else {
                $this->session->set_flashdata('msg', 'fail');
                redirect('siswa');
            }
        } else {
            redirect('siswa/create');
        }
    }

    // LOAD EDIT DATA
    public function edit($nisn){
        $this->load->model('M_Siswa');
        $data = array(
            'title' => 'Data Siswa',
            'dataSiswa' => $this->M_Siswa->getById($nisn),
            'dataKelas' => $this->getDataKelas(),
        );
        template('siswa/edit',$data);
    }

    //EDIT DATA TO DATABASE
    public function editData($nisn){
        if ($this->validation()) {
            $post = $this->input->post();
			$dataInput = array(
				'nisn' => $post['nisn'],
				'nis' => $post['nis'],
				'nama' => $post['nama'],
				'id_kelas' => $post['kelas'],
				'alamat' => $post['alamat'],
				'no_telp' => $post['no_telp'],
			);
            $this->db->where('nisn',$nisn);
            if ($this->db->update('siswa',$dataInput)) {
                $this->session->set_flashdata('msg', 'success');
                redirect('siswa');
            } else {
                $this->session->set_flashdata('msg', 'fail');
                redirect('siswa');
            }
        } else {
            redirect('siswa/edit');
        }
    }

    // DELETE DATA
    public function delete($nisn){
        $this->db->where('nisn', $nisn);
        if ($this->db->delete('siswa')) {
            $this->session->set_flashdata('msg', 'success');
            redirect('siswa');
        } else {
            $this->session->set_flashdata('msg', 'fail');
            redirect('siswa');
        }
    }
    
    // Validation Form
    public function validation(){
        $this->load->library('form_validation');
		$this->form_validation->set_rules('nisn', 'NISN', 'required|max_length[10]|numeric');
		$this->form_validation->set_rules('nis', 'NIS', 'required|max_length[8]|numeric');
		$this->form_validation->set_rules('nama', 'Nama Siswa', 'required|max_length[35]');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_message('numeric', '{field} harus angka');
		$this->form_validation->set_message('max_length', '{field} tidak boleh lebih dari {param} karakter.');
		
        if($this->form_validation->run()){
            return true;
        }
        else{
			return false;
		}
    }
    
	public function index(){
        $data = array(
            'title' => 'Data Siswa',
            'dataSiswa' => $this->getDataTabel()
        );
        template('siswa/data',$data);
	}
}