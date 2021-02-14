<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('Error404');
        }
    }

    // GET DATA FOR SELECT KELAS
    public function getDataKelas(){
        $this->load->model('M_Spp');
        $dataKelas = array();
        $data = $this->M_Spp->getKelas();
        $dataSiswa = $this->M_Spp->getKelasSiswa();
        foreach ($data as $key => $value) {
            $jum = 0;
            for ($i=0; $i < count($dataSiswa); $i++) { 
                if ($dataSiswa[$i]['id_kelas']==$value->id_kelas) {
                    $jum++;
                }
            }
            if ($jum>0) {
                $temp = array(
                    'id_kelas' => $value->id_kelas,
                    'kelas' => $value->tingkat_kelas." ".$value->kompetensi_keahlian." ".$value->nama_kelas,
                    'jumlah_siswa' => $jum
                );
                array_push($dataKelas, $temp);
            }
        }
        return $dataKelas;
    }

    // GET KODE SPP
    public function getKodeSpp(){
        $this->load->model('M_Spp');
        if ($this->M_Spp->getKodeSpp()) {
            $kodeSpp = explode("-",$this->M_Spp->getKodeSpp()->kode_spp);
            $final = intval($kodeSpp[1])+1;
            $kode = $kodeSpp[0]."-".strval($final);
            return $kode;
        } else {
            return 'SPP-1';
        }
    }

    // LOAD CREATE DATA SPP
    public function create(){
        $data = array(
            'title' => 'Data SPP',
            'dataKelas' => $this->getDataKelas(),
            'kodeSpp' => $this->getKodeSpp()
        );
        template('spp/create',$data);
    }

    // CREATE DATA SPP
    public function createData(){
        $post = $this->input->post();
        $dataInputSpp = array(
            'kode_spp' => $post['kode_spp'],
            'keterangan' => $post['keterangan_spp'],
            'tahun' => $post['tahun'],
            'nominal' => $post['nominal'],
            'daftar_kelas' => implode(",", $post['to']),
            'data_created' => $post['data_created']
        );
        $dataSiswaSpp = $this->generateQuerySppSiswa($post['kode_spp'],$post['to'],$post['nominal']);
        // INSERTING DATA
        if ($this->db->insert('spp',$dataInputSpp)) {
            if ($this->db->insert_batch('siswa_spp', $dataSiswaSpp, $batch_size=100)) {
                $this->session->set_flashdata('msg', 'success');
                redirect('spp');
            } else {
                $this->db->delete('spp',array('kode_spp' => $post['kode_spp']));
                $this->session->set_flashdata('msg', 'fail');
                redirect('spp');
            }
        } else {
            $this->session->set_flashdata('msg', 'fail');
            redirect('spp');
        }
    }

    // GENERATE QUERY FOR INSERT siswa_spp
    public function generateQuerySppSiswa($kode_kelas,$kelas,$nominal){
        $data = array();
        $this->load->model('M_Spp');
        for ($i=0; $i < count($kelas); $i++) {
            $siswa = $this->M_Spp->getNisnSiswa($kelas[$i]);
            for ($j=0; $j < count($siswa); $j++) { 
                $data [] = array(
                    'nisn' => $siswa[$j]['nisn'],
                    'kode_spp' => $kode_kelas,
                    'nominal' => $nominal
                );
            }
        }
        return $data;
    }

	public function index(){
        $data = array(
            'title' => 'Data SPP'
        );
        template('spp/data',$data);
	}
}