<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('Error404');
        }
    }

    // GET DATA FOR VIEW TABEL PETUGAS
    public function getDataTabel(){
        $this->load->model('M_Petugas');
        $data = $this->M_Petugas->getPetugas();
        return $data;
    }

    // LOAD CREATE DATA
    public function create(){
        $data = array(
            'title' => 'Data Petugas',
        );
        template('petugas/create',$data);
    }

    // CREATE DATA TO DATABASE
    public function createData(){
        if ($this->validation()) {
            $post = $this->input->post();
			$dataInput = array(
				'username' => $post['username'],
				'password' => md5($post['password']),
				'nama_petugas' => $post['nama_petugas'],
				'level' => $post['level'],
			);
            if ($this->db->insert('petugas',$dataInput)) {
                $this->session->set_flashdata('msg', 'success');
                redirect('petugas');
            } else {
                $this->session->set_flashdata('msg', 'fail');
                redirect('petugas');
            }
        } else {
            redirect('petugas/create');
        }
    }

    // LOAD EDIT DATA
    public function edit($id){
        $this->load->model('M_Petugas');

        $data = array(
            'title' => 'Data Petugas',
            'dataPetugas' => $this->M_Petugas->getById($id)
        );
        template('petugas/edit',$data);
    }

    //EDIT DATA TO DATABASE
    public function editData($id){
        if ($this->validationEdit()) {
            $post = $this->input->post();
			$dataInput = array(
				'username' => $post['username'],
				'nama_petugas' => $post['nama_petugas'],
				'level' => $post['level'],
			);
            $this->db->where('id_petugas',$id);
            if ($this->db->update('petugas',$dataInput)) {
                $this->session->set_flashdata('msg', 'success');
                redirect('petugas');
            } else {
                $this->session->set_flashdata('msg', 'fail');
                redirect('petugas');
            }
        } else {
            redirect('petugas/edit');
        }
    }

    // DELETE DATA
    public function delete($id){
        $this->db->where('id_petugas', $id);
        if ($this->db->delete('petugas')) {
            $this->session->set_flashdata('msg', 'success');
            redirect('petugas');
        } else {
            $this->session->set_flashdata('msg', 'fail');
            redirect('petugas');
        }
    }
    
    // Validation Form
    public function validation(){
        $this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[25]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|max_length[35]');
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '{field} tidak boleh kosong');
		$this->form_validation->set_message('max_length', '{field} tidak boleh lebih dari {param} karakter.');
		
        if($this->form_validation->run()){
            return true;
        }
        else{
			return false;
		}
    }
    
    // Validation Form
    public function validationEdit(){
        $this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|max_length[25]');
		$this->form_validation->set_rules('nama_petugas', 'Nama Petugas', 'required|max_length[35]');
		$this->form_validation->set_rules('level', 'Level', 'required');

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
        $data = array(
            'title' => 'Data Petugas',
            'dataPetugas' => $this->getDataTabel()
        );
        template('petugas/data',$data);
	}
}