<?php
class M_Kelas extends CI_Model
{
    //ambil data kelas
    function getKelas(){ 
        return $this->db->query('SELECT kelas.id_kelas,kelas.tingkat_kelas, kejuruan.kompetensi_keahlian, kelas.nama_kelas
        FROM kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan')->result();
    }

    // ambil data tingkat
    function getTingkat(){
        $this->db->select('*');
        $this->db->from('tingkat');
        return $this->db->get()->result();
    }

    // ambil data kejuruan
    function getKejuruan(){
        $this->db->select('*');
        $this->db->from('kejuruan');
        return $this->db->get()->result();
    }

    //ambil data where id
    function getById($id){
        $this->db->select('*');
        $this->db->from('kelas');
        $this->db->where('id_kelas',$id);
        return $this->db->get()->row();
    }
    
    //ambil data Siswa
    function getKelasSiswa(){ 
        $this->db->select('id_kelas');
        $this->db->from('siswa');
        return $this->db->get()->result_array();
    }

}