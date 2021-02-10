<?php
class M_Siswa extends CI_Model
{
    //ambil data Siswa
    function getSiswa(){ 
        $this->db->select('*');
        $this->db->from('siswa');
        return $this->db->get()->result_array();
    }

    //ambil data kelas
    function getKelas(){ 
        return $this->db->query('SELECT kelas.id_kelas,kelas.tingkat_kelas, kejuruan.kompetensi_keahlian, kelas.nama_kelas
        FROM kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan')->result();
    }

    //ambil data where nisn
    function getById($nisn){
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('nisn',$nisn);
        return $this->db->get()->row();
    }
}