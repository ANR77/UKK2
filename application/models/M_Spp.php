<?php
class M_Spp extends CI_Model
{
    function getDataTabel(){
        $this->db->select('*');
        $this->db->from('spp');
        return $this->db->get()->result_array();
    }

    //ambil data Siswa
    function getKelasSiswa(){ 
        $this->db->select('id_kelas');
        $this->db->from('siswa');
        return $this->db->get()->result_array();
    }

    //ambil data kelas
    function getKelas(){ 
        return $this->db->query('SELECT kelas.id_kelas,kelas.tingkat_kelas, kejuruan.kompetensi_keahlian, kelas.nama_kelas
        FROM kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan')->result();
    }

    // ambil kelas untuk insert tabel spp BY tingkat
    function getKelasByTingkat($tingkat){
        $this->db->select('id_kelas');
        $this->db->from('kelas');
        $this->db->where('tingkat_kelas',$tingkat);
        return $this->db->get()->result_array();
    }

    // ambil data tingkat
    function getTingkat(){
        $this->db->select('*');
        $this->db->from('tingkat');
        return $this->db->get()->result_array();
    }

    // ambil kode entri spp
    function getKodeEntri(){
        return $this->db->order_by('kode_entri',"desc")
            ->limit(1)
            ->get('spp')
            ->row_array();
    }

    // ambil id_spp BY kode_entri, tingkat
    function getIdSppByEntri($tingkat, $kode_entri){
        $this->db->select('id_spp')
        ->from('spp')
        ->where('tingkat',$tingkat)
        ->where('kode_entri',$kode_entri);
        return $this->db->get()->row_array();
    }

    // ambil data siswa BY id_kelas
    function getIdSiswa($id_kelas){
        $this->db->select('id_siswa');
        $this->db->from('siswa');
        $this->db->where('id_kelas',$id_kelas);
        return $this->db->get()->result_array();
    }
}