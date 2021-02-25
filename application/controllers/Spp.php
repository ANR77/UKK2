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
        $this->load->model('M_Spp');
        $data = array(
            'title' => 'Data SPP',
            'dataTingkat' => $this->M_Spp->getTingkat()
        );
        template('spp/create',$data);
    }

    // CREATE DATA SPP
    public function createData(){
        $post = $this->input->post();
        $this->load->model('M_Spp');
        $kode_entri = $this->M_Spp->getKodeEntri();
        $kode_entri = ($kode_entri['kode_entri'] == null) ? 0 : intval($kode_entri['kode_entri']) ;
        $dataSpp = $this->generateQuerySpp($post, $kode_entri);
        // INSERTING DATA
        if ($this->db->insert_batch('spp',$dataSpp)) {
            $dataSiswaSpp = $this->generateQuerySppSiswa($post['tingkat'],$kode_entri,$this->parsingAngsuran($post['jumlah_angsuran']));
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

    // GENERATE QUERY FOR INSERT spp
    public function generateQuerySpp($post, $kode_entri){
        $data = array();
        for ($i=0; $i < count($post['tingkat']); $i++) { 
            $data [] = array(
                'tingkat' => $post['tingkat'][$i],
                'keterangan' => $post['keterangan_spp'],
                'tahun' => $post['tahun'],
                'jumlah_angsuran' => $this->parsingAngsuran($post['jumlah_angsuran']),
                'nominal_angsuran' => $this->parsingAngsuran($post['nominal_angsuran']),
                'data_created' => $post['data_created'],
                'nama_petugas' => $this->session->nama,
                'kode_entri' => $kode_entri+1
            );
        }
        return $data;
    }
    
    // GENERATE QUERY FOR INSERT siswa_spp
    public function generateQuerySppSiswa($tingkat,$kode_entri,$jumlah_angsuran){
        $this->load->model('M_Spp');
        $kode_entri = ($kode_entri == 0) ? 1 : $kode_entri+1;
        $data = array();
        for ($i=0; $i < count($tingkat); $i++) { 
            $id_spp = $this->M_Spp->getIdSppByEntri($tingkat[$i],$kode_entri);
            $kelas = $this->M_Spp->getKelasByTingkat($tingkat[$i]);
            for ($j=0; $j < count($kelas); $j++) { 
                $siswa = $this->M_Spp->getIdSiswa($kelas[$j]['id_kelas']);
                for ($k=0; $k < count($siswa); $k++) { 
                    $data [] = array(
                        'id_siswa' => $siswa[$k]['id_siswa'],
                        'id_spp' => intval($id_spp['id_spp']),
                        'jumlah_angsuran' => $jumlah_angsuran,
                        'angsuran' => 0
                    );
                }
            }
        }
        return $data;
    }

    // PARSE UANG ANGSURAN
    function parsingAngsuran($nominal){
        $final = explode(",",$nominal);
        $final = implode("",$final);
        return $final;
    }

	public function index(){
        $this->load->model('M_Spp');
        $data = array(
            'title' => 'Data SPP',
            'dataSpp' => $this->M_Spp->getDataTabel()
        );
        template('spp/data',$data);
	}
}