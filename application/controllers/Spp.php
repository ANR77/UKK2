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
            'dataTingkat' => $this->M_Spp->getTingkat(),
            'tgl' => date('Y'),
            'tgl_full' => date('Y-m-d')
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
        // CEK DUPLICATE ROW SPP
        $duplicate = array();
        for ($i=0; $i < count($post['tingkat']); $i++) { 
            if ($this->M_Spp->cekSpp($post['tingkat'][$i],$post['tahun'])) {
                array_push($duplicate,$post['tingkat'][$i]);
            }
        }
        // INSERTING DATA
        if (count($duplicate) == 0) {// here
            if ($this->db->insert_batch('spp',$dataSpp)) { // INSERT KE spp
                $dataSiswaSpp = $this->generateQuerySppSiswa($post['tingkat'],$kode_entri,$this->parsingAngsuran($post['jumlah_angsuran']));
                if ($dataSiswaSpp) {
                    if ($this->db->insert_batch('siswa_spp', $dataSiswaSpp, $batch_size=100)) { // insert ke siswa_spp
                        $this->session->set_flashdata('status','success');
                        $this->session->set_flashdata('pesan','Input data berhasil!');
                        redirect('spp');
                    } else {
                        $this->db->delete('spp',array('kode_entri' => $kode_entri+1));
                        $this->session->set_flashdata('status','fail');
                        $this->session->set_flashdata('pesan','Input data gagal!');
                        redirect('spp');
                    }
                } else {
                    $this->session->set_flashdata('status','success');
                    $this->session->set_flashdata('pesan','Input data berhasil!');
                    redirect('spp');
                }
            } else {
                $this->session->set_flashdata('status','fail');
                $this->session->set_flashdata('pesan','Input data gagal!');
                redirect('spp');
            }
        } else {
            $txt=join(",",$duplicate);
            $this->session->set_flashdata('status','fail');
            $this->session->set_flashdata('pesan','SPP pada tingkat '.$txt.' pada tahun '.$post['tahun'].' sudah ada!');
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
            if ($kelas) {
                for ($j=0; $j < count($kelas); $j++) { 
                    $siswa = $this->M_Spp->getIdSiswa($kelas[$j]['id_kelas']);
                    if ($siswa) {
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
            }
        }
        return $data;
    }

    // LOAD EDIT
    public function edit($id_spp){
        $this->load->model('M_Spp');
        $data = array(
            'title' => 'Data SPP',
            'dataSpp' => $this->M_Spp->getSppById($id_spp)
        );
        template('spp/edit',$data);
    }

    //EDIT DATA TO DATABASE
    public function editData($id_spp){
        $post = $this->input->post();
        $dataInput = array(
            'keterangan' => $post['keterangan']
        );
        $this->db->where('id_spp',$id_spp);
        if ($this->db->update('spp',$dataInput)) {
            $this->session->set_flashdata('status','success');
            $this->session->set_flashdata('pesan','Pengeditan data berhasil!');
            redirect('spp');
        } else {
            $this->session->set_flashdata('status','fail');
            $this->session->set_flashdata('pesan','Pengeditan data gagal!');
            redirect('spp');
        }
    }

    // PARSE UANG ANGSURAN
    function parsingAngsuran($nominal){
        $final = explode(",",$nominal);
        $final = implode("",$final);
        return $final;
    }

    // LOAD LAPORAN SPP
    public function laporan($id_spp){
        $this->load->model('M_Spp');
        $data = array(
            'title' => 'Data SPP',
            'dataKelas' => $this->M_Spp->getKelasTingkat($id_spp),
            'idSpp' => $id_spp
        );
        template('spp/laporan',$data);
    }

    // Generate Laporan
    public function generateLaporan(){
        $this->load->model('M_Spp');
        $id_spp =  $this->uri->segment(3);
        $id_kelas =  $this->uri->segment(4);
        $jumlah_tagihan = 0;
        $jumlah_angsuran = 0;
        $jumlah_tanggungan = 0;
        $dataSpp = $this->M_Spp->getDataLaporan($id_spp,$id_kelas);
        for ($i=0; $i < count($dataSpp); $i++) { 
            $jumlah_tagihan = $jumlah_tagihan + $dataSpp[$i]['jumlah_tagihan'];
            $jumlah_angsuran = $jumlah_angsuran + $dataSpp[$i]['jumlah_angsuran'];
            $jumlah_tanggungan = $jumlah_tanggungan + $dataSpp[$i]['jumlah_tanggungan'];
            $dataSpp[$i]['jumlah_tagihan'] = "Rp. ".number_format($dataSpp[$i]['jumlah_tagihan']);
            $dataSpp[$i]['jumlah_angsuran'] = "Rp. ".number_format($dataSpp[$i]['jumlah_angsuran']);
            $dataSpp[$i]['jumlah_tanggungan'] = "Rp. ".number_format($dataSpp[$i]['jumlah_tanggungan']);
        }
        $spp = $this->M_Spp->getDataSpp($id_spp);
        $kelas = $this->M_Spp->getKelasById($id_kelas);
        $data = array(
            'title' => 'Laporan '.$spp['keterangan'].' '.$spp['tahun'].' - '.$kelas['kelas_full'],
            'dataSpp' => $dataSpp,
            'jumlah_tagihan' => "Rp. ".number_format($jumlah_tagihan),
            'jumlah_angsuran' => "Rp. ".number_format($jumlah_angsuran),
            'jumlah_tanggungan' => "Rp. ".number_format($jumlah_tanggungan),
            'kelas' =>  $kelas,
            'spp' => $spp

        );
        $this->load->view('spp/excel',$data);
    }

    // GET LAPORAN BY AJAX RETURN JSON
    public function getLaporan(){
        $id_spp =  $this->uri->segment(3);
        $id_kelas =  $this->uri->segment(4);
        $this->load->model('M_Spp');
		echo json_encode($this->M_Spp->getDataLaporan($id_spp,$id_kelas));
    }

    // Delete Spp
    public function delete($id_spp){
        $this->load->model('M_Spp');
        if ($this->M_Spp->delSppPembayaran($id_spp)) {
            if ($this->M_Spp->delSiswaSpp($id_spp)) {
                $this->db->where('id_spp', $id_spp);
                if ($this->db->delete('spp')) {
                    $this->session->set_flashdata('status','success');
                    $this->session->set_flashdata('pesan','Data berhasil dihapus!');
                    redirect('spp');
                } else {
                    $this->session->set_flashdata('status','fail');
                    $this->session->set_flashdata('pesan','Data gagal dihapus!');
                    redirect('spp');
                }
            } else {
                $this->session->set_flashdata('status','fail');
                $this->session->set_flashdata('pesan','Data gagal dihapus!');
                redirect('spp');
            }
        } else {
            $this->session->set_flashdata('status','fail');
            $this->session->set_flashdata('pesan','Data gagal dihapus!');
            redirect('spp');
        }
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