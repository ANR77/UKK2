<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('Error404');
        }
    }

    // GET DATA FOR TABEL KELAS
    public function getDataTabel(){
        $this->load->model('M_Kelas');
        $dataKelas = array();
        $data = $this->M_Kelas->getKelas();
        foreach ($data as $key => $value) {
            $temp = array(
                'id_kelas' => $value->id_kelas,
                'kelas' => $value->tingkat_kelas." ".$value->kompetensi_keahlian." ".$value->nama_kelas
            );
            array_push($dataKelas, $temp);
        }
        // var_dump($dataKelas);
        // die;
        return $dataKelas;
    }

    // LOAD CREATE DATA
    public function create(){
        $this->load->model('M_Kelas');

        $data = array(
            'title' => 'Data Kelas',
            'dataTingkat' => $this->M_Kelas->getTingkat(),
            'dataKejuruan' => $this->M_Kelas->getKejuruan()
        );
        template('kelas/create',$data);
    }

    // CREATE DATA TO DATABASE
    public function createData(){
        if ($this->validation()) {
            $post = $this->input->post();
			$dataInput = array(
				'tingkat_kelas' => $post['tingkat'],
				'id_kejuruan' => $post['kejuruan'],
				'nama_kelas' => $post['nama'],
			);
            if ($this->db->insert('kelas',$dataInput)) {
                $this->session->set_flashdata('msg', 'success');
                redirect('kelas');
            } else {
                $this->session->set_flashdata('msg', 'fail');
                redirect('kelas');
            }
        } else {
            redirect('kelas/create');
        }
    }

    // LOAD EDIT DATA
    public function edit($id){
        $this->load->model('M_Kelas');

        $data = array(
            'title' => 'Data Kelas',
            'dataKelas' => $this->M_Kelas->getById($id),
            'dataTingkat' => $this->M_Kelas->getTingkat(),
            'dataKejuruan' => $this->M_Kelas->getKejuruan()
        );
        template('kelas/edit',$data);
    }

    //EDIT DATA TO DATABASE
    public function editData($id){
        if ($this->validation()) {
            $post = $this->input->post();
			$dataInput = array(
				'tingkat_kelas' => $post['tingkat'],
				'id_kejuruan' => $post['kejuruan'],
				'nama_kelas' => $post['nama'],
			);
            $this->db->where('id_kelas',$id);
            if ($this->db->update('kelas',$dataInput)) {
                $this->session->set_flashdata('msg', 'success');
                redirect('kelas');
            } else {
                $this->session->set_flashdata('msg', 'fail');
                redirect('kelas');
            }
        } else {
            redirect('kelas/edit');
        }
    }

    // DELETE DATA
    public function delete($id){
        $this->db->where('id_kelas', $id);
        if ($this->db->delete('kelas')) {
            $this->session->set_flashdata('msg', 'success');
            redirect('kelas');
        } else {
            $this->session->set_flashdata('msg', 'fail');
            redirect('kelas');
        }
    }
    
    // Validation Form
    public function validation(){
        $this->load->library('form_validation');
		$this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
		$this->form_validation->set_rules('kejuruan', 'Kejuruan', 'required');
		$this->form_validation->set_rules('nama', 'Password', 'required|max_length[10]');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_message('max_length', '{field} tidak boleh lebih dari {param} karakter.');
		
        if($this->form_validation->run()){
            return true;
        }
        else{
			return false;
		}
    }
    
	public function index(){
        $this->getDataTabel();
        $data = array(
            'title' => 'Data Kelas',
            'dataKelas' => $this->getDataTabel()
        );
        template('kelas/data',$data);
	}
}