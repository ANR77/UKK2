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

    function getKodeSpp(){
        $this->db->select('kode_spp');
        $this->db->from('spp');
        return $this->db->get()->last_row();
    }

    function getNisnSiswa($id_kelas){
        $this->db->select('nisn');
        $this->db->from('siswa');
        $this->db->where('id_kelas',$id_kelas);
        return $this->db->get()->result_array();
    }
}